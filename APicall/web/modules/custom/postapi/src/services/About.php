<?php 
namespace Drupal\postapi\services;
use Drupal\paragraphs\Entity\Paragraph;



class About implements Postinterface{
  public function create($data,$uid){


  }
  public function delete($data,$uid){
    $user_id = $uid;
    $profile_name = 'student';
    $cuuser = \Drupal\user\Entity\User::load($user_id);
    $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($cuuser, $profile_name);

    $para = $data['id'];
    $p = \Drupal\paragraphs\Entity\Paragraph::load($para);
    $p->delete();
    return "hello";
    
  }
  public function update($data,$uid){
    $user_id = $uid;
    $profile_type = 'student';
    $current_user = \Drupal\user\Entity\User::load($user_id);


    $active_profile = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($current_user, $profile_type);
    $para = $active_profile->get('field_abo')->getValue();

    $term_id = $data['id'];
    $term = \Drupal::entityTypeManager()->getStorage('paragraph')->load($term_id);
   

    if ($term == "") {
      return "paragraph not found to be updated ";
    } 
   else {
      $term->get('field_address')->value = $data['address'];
      $term->get('field_biodata')->value = $data['biodata'];
      $term->get('field_dob')->value = $data['dob'];
      $term->save();
     
    }
    return "Paragraph updated";

  }
  public function read($uid){
    $paras = [];


    $data = 'Api worked';

    $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadMultiple();


    $target=$entity_manager[$uid]->get('field_abo')->target_id;
    $paras[0] = $entity_manager[$uid]->get('field_abo')->entity->get('field_address')->value;
    $paras[1] = $entity_manager[$uid]->get('field_abo')->entity->get('field_biodata')->value;
    $paras[2] = $entity_manager[$uid]->get('field_abo')->entity->get('field_dob')->value;

    $datas['About']=[
      'address' => $paras[0],
      'biodata'=>$paras[1],
      'dateofbirth'=>$paras[2],
      'id'=>$target,

    ];
   

   


    return $datas;

  }
  

}