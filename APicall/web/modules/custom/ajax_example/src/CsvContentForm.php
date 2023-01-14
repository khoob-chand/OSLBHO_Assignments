<?php

namespace Drupal\ajax_example;

use Drupal\node\Entity\Node;
use Drupal\paragraphs\Entity\Paragraph;

/**
 *
 */
class CsvContentForm {

  /**
   *
   */
  public static function addImportContentItem($item, &$context) {
    $context['sandbox']['current_item'] = $item;
    $message = 'Creating ' . $item['title'];
    $results = [];
    create_node($item);
    $context['message'] = $message;
    $context['results'][] = $item;
  }

  /**
   *
   */
  public function addImportContentItemCallback($success, $results, $operations) {
    // The 'success' parameter means no fatal PHP errors were detected. All
    // other error management should be handled using 'results'.
    if ($success) {
      $message = \Drupal::translation()->formatPlural(
        count($results),
        'One item processed.', '@count items processed.'
      );
      $this->messenger->addMessage('Hello world');
    }
    else {
      $message = t('Finished with an error.');
    }
    $this->messenger->addMessage($message);
  }

}

$paragraph;

/**
 * This function actually creates each item as a node as type 'Page'.
 */
function create_node($item) {
  dpm($item);
  $newarr = [];
  $intake = 'field_course_name';
  $p = 0;
  foreach ($item as $key) {
    if (str_contains($key, $intake)) {
      $p++;
    }

  }
  dpm($p);
  $year = [];
  // $year["value"]=$item['field_duration_value'];
  // $year["end_value"]=$item['field_duration_end_value'];
  // dd($year);
  for ($i = 0; $i < $p; $i++) {
    $paragraph = Paragraph::create([
      'type' => 'intake',
      $year["value"] = $item['field_duration_value' . $i],
      $year["end_value"] = $item['field_duration_end_value' . $i],

      'field_course_name' => $item['field_course_name' . $i],
      'field_duration' => $year,
      'field_location' => $item["field_location" . $i],

    ]);
    $paragraph->save();
    array_push($newarr, $paragraph);
    dpm($newarr);
    $node_data['field_intake'] = $newarr;

  }

  // dpm($paragraph);
  // $newarr->save();
  // dpm($paragraph);
  $node_data['type'] = 'csvimporter';
  $node_data['title'] = $item['title'];
  $node_data['field_college_name'] = $item['field_college_name'];
  $node_data['field_foundation_year'] = $item['field_college_name'];

  $node_data['field_intake'] = $paragraph;

  // $node_data['body']['value'] = $item['field_location'];
  // Setting a simple textfield to add a unique ID so we can use it to query against if we want to manipulate this data again.
  // $node_data['field_unique_id']['value'] = $item['id'];.
  $node = Node::create($node_data);
  $node->setPublished(TRUE);
  $node->save();
}
