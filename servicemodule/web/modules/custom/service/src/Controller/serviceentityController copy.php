<?php

namespace Drupal\service\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\service\Entity\serviceentityInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class serviceentityController.
 *
 *  Returns responses for Serviceentity routes.
 */
class serviceentityController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  protected $dateFormatter;

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\Renderer
   */
  protected $renderer;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->dateFormatter = $container->get('date.formatter');
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * Displays a Serviceentity revision.
   *
   * @param int $serviceentity_revision
   *   The Serviceentity revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($serviceentity_revision) {
    $serviceentity = $this->entityTypeManager()->getStorage('serviceentity')
      ->loadRevision($serviceentity_revision);
    $view_builder = $this->entityTypeManager()->getViewBuilder('serviceentity');

    return $view_builder->view($serviceentity);
  }

  /**
   * Page title callback for a Serviceentity revision.
   *
   * @param int $serviceentity_revision
   *   The Serviceentity revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($serviceentity_revision) {
    $serviceentity = $this->entityTypeManager()->getStorage('serviceentity')
      ->loadRevision($serviceentity_revision);
    return $this->t('Revision of %title from %date', [
      '%title' => $serviceentity->label(),
      '%date' => $this->dateFormatter->format($serviceentity->getRevisionCreationTime()),
    ]);
  }

  /**
   * Generates an overview table of older revisions of a Serviceentity.
   *
   * @param \Drupal\service\Entity\serviceentityInterface $serviceentity
   *   A Serviceentity object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(serviceentityInterface $serviceentity) {
    $account = $this->currentUser();
    $serviceentity_storage = $this->entityTypeManager()->getStorage('serviceentity');

    $langcode = $serviceentity->language()->getId();
    $langname = $serviceentity->language()->getName();
    $languages = $serviceentity->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $serviceentity->label()]) : $this->t('Revisions for %title', ['%title' => $serviceentity->label()]);

    $header = [$this->t('Revision'), $this->t('Operations')];
    $revert_permission = (($account->hasPermission("revert all serviceentity revisions") || $account->hasPermission('administer serviceentity entities')));
    $delete_permission = (($account->hasPermission("delete all serviceentity revisions") || $account->hasPermission('administer serviceentity entities')));

    $rows = [];

    $vids = $serviceentity_storage->revisionIds($serviceentity);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\service\Entity\serviceentityInterface $revision */
      $revision = $serviceentity_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = $this->dateFormatter->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $serviceentity->getRevisionId()) {
          $link = Link::fromTextAndUrl($date, new Url('entity.serviceentity.revision', [
            'serviceentity' => $serviceentity->id(),
            'serviceentity_revision' => $vid,
          ]))->toString();
        }
        else {
          $link = $serviceentity->toLink($date)->toString();
        }

        $row = [];
        $column = [
          'data' => [
            '#type' => 'inline_template',
            '#template' => '{% trans %}{{ date }} by {{ username }}{% endtrans %}{% if message %}<p class="revision-log">{{ message }}</p>{% endif %}',
            '#context' => [
              'date' => $link,
              'username' => $this->renderer->renderPlain($username),
              'message' => [
                '#markup' => $revision->getRevisionLogMessage(),
                '#allowed_tags' => Xss::getHtmlTagList(),
              ],
            ],
          ],
        ];
        $row[] = $column;

        if ($latest_revision) {
          $row[] = [
            'data' => [
              '#prefix' => '<em>',
              '#markup' => $this->t('Current revision'),
              '#suffix' => '</em>',
            ],
          ];
          foreach ($row as &$current) {
            $current['class'] = ['revision-current'];
          }
          $latest_revision = FALSE;
        }
        else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
              Url::fromRoute('entity.serviceentity.translation_revert', [
                'serviceentity' => $serviceentity->id(),
                'serviceentity_revision' => $vid,
                'langcode' => $langcode,
              ]) :
              Url::fromRoute('entity.serviceentity.revision_revert', [
                'serviceentity' => $serviceentity->id(),
                'serviceentity_revision' => $vid,
              ]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.serviceentity.revision_delete', [
                'serviceentity' => $serviceentity->id(),
                'serviceentity_revision' => $vid,
              ]),
            ];
          }

          $row[] = [
            'data' => [
              '#type' => 'operations',
              '#links' => $links,
            ],
          ];
        }

        $rows[] = $row;
      }
    }

    $build['serviceentity_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

}
