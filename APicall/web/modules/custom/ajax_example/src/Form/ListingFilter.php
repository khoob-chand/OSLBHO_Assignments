<?php

namespace Drupal\ajax_example\Form;

use Drupal\Core\Url;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 */
class ListingFilter extends FormBase {

  /**
   *
   */
  public function getFormId() {
    return "Filter";
  }

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $listing = [];
    $collegename = [];
    $start = [];

    $values = [
      'type' => 'csvimporter',
    ];

    $nodes = \Drupal::entityTypeManager()
      ->getStorage('node')
      ->loadByProperties($values);
    foreach ($nodes as $k) {
      $get = $k->field_intake->getValue();
      $get = $k->field_intake->target_id;

      $term = \Drupal::entityTypeManager()->getStorage('paragraph')->load($get);
      // dpm($term);
      $date = $term->field_duration[0]->value;

      // dpm($k);
      array_push($start, $date);
      // dpm($date);
      // dpm($date);
      // dpm($k);
      $m = $k->getTitle();
      array_push($listing, $m);
      $college = $k->field_college_name->value;
      array_push($collegename, $college);
    }

    $form['content'] = [
      '#type' => 'select',
      '#title' => $this->t(' Select Title'),
      '#options' => $listing,
    ];
    $form['college_name'] = [
      '#type' => 'select',
      '#title' => $this->t('Select College Name'),
      '#options' => $collegename,
      '#default_value' => 'none',
    ];
    $form['start'] = [
      '#type' => 'select',
      '#title' => $this->t('Select Start date'),
      '#options' => $start,

      '#default_value' => 'none',
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    $form['pager']=[
      '#type'=>'pager',
      '#weight'=>3,
    ];
   

    return $form;

  }

  /**
   *
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $data = $form_state->getValue('college_name');

    $s2 = $form['college_name']['#options'][$data];
    $title = $form_state->getValue('content');
    $start = $form_state->getValue('start');
    $d = $form['content']['#options'][$title];
    $d2 = $form['start']['#options'][$start];

    $url = Url::fromRoute('custom_db_form_ajax_csv_list', [], ['query' => ['college_name' => $s2, 'content' => $d, 'start' => $d2]]);
    $form_state->setRedirectUrl($url);
    // $arr=[];
    // //  $d= $form['content']['#options']->value;
    //       $s= $form_state->getValues();
    //       // dpm($s);
    //       $content=$s['content'];
    //       $college=$s['college_name'];
    //       $start=$s['start'];
    //       // dpm($m);
    //       $store=$form['content']['#options'][$content];
    //       $s2=$form['college_name']['#options'][$college];
    //       $s3=$form['start']['#options'][$start];
    //      array_push($arr,$store);
    //      array_push($arr,$s2);
    //      array_push($arr,$s3);
    //      dpm($arr);
    //      $param = \Drupal::request()->query->get('content');
    //     //  dpm($para);
    //       // $m=$s["value"];
    // //  dpm($arr);
    // // foreach($form_state->getValues() as $key => $value) {
    //       // dpm($value);
    //       // $v=$this->messenger->addMessage($key . ': ' . $value);
    // //  }
    //   // drupal_set_message(t('successfully inserted'),'status',TRUE);
    // foreach($arr as $result){
    //     echo "<pre>";
    //     print("hello on submit");
    //     echo $result;
    //     echo "</pre>";.
    // }
    // $param= \Drupal::request()->query->get('keys');
    //  dpm($param);
    //   // dpm("hello");
    //       //  $form_state['redirect']='./intake';
    //     //  $get= $form_state->setRedirect('custom_db_form_ajax_csv_list');
    //     //  $result=[$get,$arr];
    //     //  return $result;
    return $data;

    // // }
  }

}
