<?php

namespace Drupal\cron_queworker_demo\Plugin\QueueWorker;

use Drupal\node\NodeInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use  \Drupal\file\FileRepositoryInterface;


/**
 * A Node Publisher that publishes nodes on CRON run.
 *
 * @QueueWorker(
 *   id = "cron_node_publisher",
 *   title = @Translation("Cron Node Publisher"),
 *   cron = {"time" = 10}
 * )
 */
class CronNodePublisher extends QueueWorkerBase
{

  public function processItem($id)
  {
    $node = \Drupal\node\Entity\Node::load($id);
    if (!$node->isPublished()) {
      $this->publishedNode($node);
    }
  }

  public function publishedNode($node)
  {

    $url = $node->get('field_link')->uri;
    $data = file_get_contents($url);

    $file = \Drupal::service('file.repository')->writeData($data, "public://image".rand().".png", FileSystemInterface::EXISTS_REPLACE);
    
    // dd($file);

    $field_image = array(
      'target_id' => $file->id(),
      'alt' => "My 'alt'",
      'title' => "My 'title'",
    );
    $node->field_image = $field_image;
    $node->setPublished(TRUE);
    $node->save();
  }
}
