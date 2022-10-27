<?php

namespace Drupal\service\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EditorialContentEntityBase;
use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Serviceentity entity.
 *
 * @ingroup service
 *
 * @ContentEntityType(
 *   id = "serviceentity",
 *   label = @Translation("Serviceentity"),
 *   bundle_label = @Translation("Serviceentity type"),
 *   handlers = {
 *     "storage" = "Drupal\service\serviceentityStorage",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\service\serviceentityListBuilder",
 *     "views_data" = "Drupal\service\Entity\serviceentityViewsData",
 *     "translation" = "Drupal\service\serviceentityTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\service\Form\serviceentityForm",
 *       "add" = "Drupal\service\Form\serviceentityForm",
 *       "edit" = "Drupal\service\Form\serviceentityForm",
 *       "delete" = "Drupal\service\Form\serviceentityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\service\serviceentityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\service\serviceentityAccessControlHandler",
 *   },
 *   base_table = "serviceentity",
 *   data_table = "serviceentity_field_data",
 *   revision_table = "serviceentity_revision",
 *   revision_data_table = "serviceentity_field_revision",
 *   show_revision_ui = TRUE,
 *   translatable = TRUE,
 *   permission_granularity = "bundle",
 *   admin_permission = "administer serviceentity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "revision" = "vid",
 *     "bundle" = "type",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
*   revision_metadata_keys = {
*     "revision_user" = "revision_uid",
*     "revision_created" = "revision_timestamp",
*     "revision_log_message" = "revision_log"
*   },
 *   links = {
 *     "canonical" = "/admin/structure/serviceentity/{serviceentity}",
 *     "add-page" = "/admin/structure/serviceentity/add",
 *     "add-form" = "/admin/structure/serviceentity/add/{serviceentity_type}",
 *     "edit-form" = "/admin/structure/serviceentity/{serviceentity}/edit",
 *     "delete-form" = "/admin/structure/serviceentity/{serviceentity}/delete",
 *     "version-history" = "/admin/structure/serviceentity/{serviceentity}/revisions",
 *     "revision" = "/admin/structure/serviceentity/{serviceentity}/revisions/{serviceentity_revision}/view",
 *     "revision_revert" = "/admin/structure/serviceentity/{serviceentity}/revisions/{serviceentity_revision}/revert",
 *     "revision_delete" = "/admin/structure/serviceentity/{serviceentity}/revisions/{serviceentity_revision}/delete",
 *     "translation_revert" = "/admin/structure/serviceentity/{serviceentity}/revisions/{serviceentity_revision}/revert/{langcode}",
 *     "collection" = "/admin/structure/serviceentity",
 *   },
 *   bundle_entity_type = "serviceentity_type",
 *   field_ui_base_route = "entity.serviceentity_type.edit_form"
 * )
 */
class serviceentity extends EditorialContentEntityBase implements serviceentityInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function urlRouteParameters($rel) {
    $uri_route_parameters = parent::urlRouteParameters($rel);

    if ($rel === 'revision_revert' && $this instanceof RevisionableInterface) {
      $uri_route_parameters[$this->getEntityTypeId() . '_revision'] = $this->getRevisionId();
    }
    elseif ($rel === 'revision_delete' && $this instanceof RevisionableInterface) {
      $uri_route_parameters[$this->getEntityTypeId() . '_revision'] = $this->getRevisionId();
    }

    return $uri_route_parameters;
  }

  /**
   * {@inheritdoc}
   */
  public function preSave(EntityStorageInterface $storage) {
    parent::preSave($storage);

    foreach (array_keys($this->getTranslationLanguages()) as $langcode) {
      $translation = $this->getTranslation($langcode);

      // If no owner has been set explicitly, make the anonymous user the owner.
      if (!$translation->getOwner()) {
        $translation->setOwnerId(0);
      }
    }

    // If no revision author has been set explicitly,
    // make the serviceentity owner the revision author.
    if (!$this->getRevisionUser()) {
      $this->setRevisionUserId($this->getOwnerId());
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('user_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('user_id', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('user_id', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);
    
  //   $fields['isbn'] = BaseFieldDefinition::create('integer')
  //    ->setLabel(t('ISBN'))
  //    ->setDescription(t('ISBN of the Book'))
  //    ->setRevisionable(TRUE)
  //    ->setTranslatable(TRUE)
  //    ->setDisplayOptions('form', array(
  //      'type' => 'string_textfield',
  //      'settings' => array(
  //        'display_label' => TRUE,
  //      ),
  //    ))
  //   ->setDisplayOptions('view', array(
  //      'label' => 'hidden',
  //      'type' => 'string',
  //    ))
  //    ->setDisplayConfigurable('form', TRUE)
  //    ->setRequired(TRUE);    
    
  //  $fields['author'] = BaseFieldDefinition::create('string')
  //    ->setLabel(t('Author'))
  //    ->setDescription(t('Author(s) of the book'))
  //    ->setRevisionable(TRUE)
  //    ->setTranslatable(TRUE)
  //    ->setDisplayOptions('form', array(
  //      'type' => 'string_textfield',
  //      'settings' => array(
  //        'display_label' => TRUE,
  //      ),
  //    ))
  //   ->setDisplayOptions('view', array(
  //      'label' => 'hidden',
  //      'type' => 'string',
  //    ))
  //    ->setDisplayConfigurable('form', TRUE)
  //    ->setRequired(TRUE);


  //  $fields['price'] = BaseFieldDefinition::create('float')
  //    ->setLabel(t('Price'))
  //    ->setDescription(t('Price of the Book'))
  //    ->setRevisionable(TRUE)
  //    ->setTranslatable(TRUE)
  //    ->setDisplayOptions('form', array(
  //      'type' => 'string_textfield',
  //      'settings' => array(
  //        'display_label' => TRUE,
  //      ),
  //    ))
  //   ->setDisplayOptions('view', array(
  //      'label' => 'hidden',
  //      'type' => 'string',
  //    ))
  //    ->setDisplayConfigurable('form', TRUE)
  //    ->setRequired(TRUE);

    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Authored by'))
      ->setDescription(t('The user ID of author of the Serviceentity entity.'))
      ->setRevisionable(TRUE)
      ->setSetting('target_type', 'user')
      ->setSetting('handler', 'default')
      ->setTranslatable(TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'author',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 5,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'autocomplete_type' => 'tags',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Serviceentity entity.'))
      ->setRevisionable(TRUE)
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Serviceentity is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    $fields['revision_translation_affected'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Revision translation affected'))
      ->setDescription(t('Indicates if the last edit of a translation belongs to current revision.'))
      ->setReadOnly(TRUE)
      ->setRevisionable(TRUE)
      ->setTranslatable(TRUE);

    return $fields;
  }

}
