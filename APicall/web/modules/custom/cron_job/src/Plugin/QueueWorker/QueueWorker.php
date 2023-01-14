<?php 

namespace Drupal\cron_job\Plugin\QueueWorker;
use Drupal\node\NodeInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Queue\QueueWorkerBase;
/**
 * A Node Publisher that publishes nodes on CRON run.
 *
 * @QueueWorker(
 *   id = "cron_node_publisher",
 *   title = @Translation("Cron Node Publisher"),
 *   cron = {"time" = 10}
 * )
 */
class QueueWorker extends QueueWorkerBase {
  public function processItem($id)
  {
    // dd($id);
    $node = \Drupal\node\Entity\Node::load($id);
    if(!$node->isPublished()){
      $this->publishedNode($node);
    }
  
    }
    public function publishedNode($node){
      $url = $node->get('field_link')->uri;
    
      $data = file_get_contents($url);
    
      $file = file_save_data($data, "public://image2".rand()."png", FileSystemInterface::EXISTS_REPLACE);
     
      $field_image = array(
        'target_id' => $file->id(),
        'alt' => "My 'alt'",
        'title' => "My 'title'",
      );
      $node->field_image = $field_image;
      dd($node->field_image);
      $node->setPublished(TRUE);
      $node->save();
    }
  }