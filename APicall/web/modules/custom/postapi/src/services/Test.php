<?php 
namespace Drupal\postapi\services;
class Test implements Postinterface {
  public function create($data,$uid)
  {


  }
  public function delete($data,$uid)
  {
  }
  public function update($data,$uid)
  {
  }
  public function read($uid){
    $user_id = $uid;
    $profile_name = 'student';
    $cuuser = \Drupal\user\Entity\User::load($user_id);
    $active_profile = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($cuuser, $profile_name);


$test_Name =  $active_profile->get('field_exam')->entity->name->value;
    $test_name =  $active_profile->get('field_exam')->getvalue();
    $td = $test_name[0]['target_id'];
    $exam_field = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($td);
    $vid = $exam_field->vid[0]->target_id;
    $parent_tid = $td; // the parent term id
    $depth = 1; // 1 to get only immediate children, NULL to load entire tree
    $load_entities = FALSE; // True will return loaded entities rather than ids
    $child_terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid, $parent_tid, $depth, $load_entities);

    // $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadMultiple();
    // $target=$entity_manager[$uid]->get('field_test')->target_id;
    // $paras = $entity_manager[$uid]->get('field_test')->entity->get('field_testname')->entity->name->value;
    
    $sub_terms = [];
    foreach ($child_terms as $child_term) {
      $sub_terms[] = $child_term->name;
    }
    $datas=["paper"=>$sub_terms,
    

    ];
    return $datas ;

  }




}