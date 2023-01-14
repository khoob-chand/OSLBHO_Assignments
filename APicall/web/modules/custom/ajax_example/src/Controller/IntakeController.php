<?php

namespace Drupal\ajax_example\Controller;

use Drupal\Core\Link;
use Drupal\Core\Url;


use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class IntakeController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content() {
    $flag=false;
    $count=0;

    $simpleform = \Drupal::formBuilder()->getForm('Drupal\ajax_example\Form\ListingFilter');
    $college_name = \Drupal::request()->query->get('college_name');
    $content = \Drupal::request()->query->get('content');
    $start2 = \Drupal::request()->query->get('start');

    $output = [];
    $collegename = [];
    $title = [];
    $newarr = [];
    $new = [];
    $editpage = [];

    $values = [
      'type' => 'csvimporter',
    ];

    $nodes = \Drupal::entityTypeManager()
      ->getStorage('node')
      ->loadByProperties($values);

    // dd($nodes);
    foreach ($nodes as $i) {
      $nid = $i->id();

      $url = Url::fromRoute('entity.node.edit_form', ['node' => $nid]);

      $links = Link::fromTextAndUrl('edit', $url);

      array_push($editpage, $links);

      $gettitle = $i->getTitle();
      $link = $i->toLink();
      $edit = $i->toLink();
      $edit->setText('Edit');
      $link->setText($gettitle);

      array_push($title, $link);

      $college = $i->field_college_name->value;
      array_push($collegename, $college);

      $get = $i->field_intake->getValue();
      $get = $i->field_intake->target_id;

      $term = \Drupal::entityTypeManager()->getStorage('paragraph')->load($get);

      $start = $term->field_duration[0]->value;
      $end = $term->field_duration[0]->end_value;

      array_push($newarr, $start);
      array_push($new, $end);

    }

    $header = [
      'col1' => $this->t('Title'),
      'col2' => $this->t('Start_Date'),
      'col3' => $this->t('End_Date'),
      'col4' => $this->t('College_Name'),
      'col5' => $this->t('Edit'),

    ];
    
    $output = [$newarr, $new, $collegename, $title, $editpage];

    for ($i = 0; $i < count($newarr); $i++) {
      $select[] = "";
     
     
     if($collegename[$i] != $college_name) {
     $rows[$i]=[$title[$i],$newarr[$i],$new[$i],$collegename[$i],$editpage[$i]];
     $count++;
     }
   
      elseif($title[$i]->getText() == $content && $collegename[$i] == $college_name) {
        $count--;
       

        $select[$i] = [
          $title[$i],
          $newarr[$i],
          $new[$i],
          $collegename[$i],
          $editpage[$i],
        ];
        break;
      }
     
      

    }
    if($count==count($newarr) ){
      return [
      $simpleform,
      [
        '#type' => 'table',
        '#header' => $header,
       
        '#rows' => $rows,
        
      ],
    
    ];

    }
   
 else {
  return [

    $simpleform,

    [
      '#type' => 'table',
      '#header' => $header,
     
      '#rows' => $select,
      
      
    ],
    

];

}
   

  }

}
