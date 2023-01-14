<?php

namespace Drupal\postapi\services;

use Drupal\paragraphs\Entity\Paragraph;



class Education implements Postinterface
{
  public function create($data, $uid)
  {
    $paragraph = Paragraph::create([
      'type' => 'education',
      'field_degree' => $data["degree"],
      'field_college' => $data["college"],
      'field_year' => $data["year"],


    ]);
    $paragraph->save();

    $user_id = $uid;
    $profile_name = 'student';
    $cuuser = \Drupal\user\Entity\User::load($user_id);
    $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($cuuser, $profile_name);
    $para = $entity_manager->get('field_education')->appendItem($paragraph);
    $entity_manager->save();


    return $entity_manager;
  }
  public function delete($data, $uid)

  {
    $user_id = $uid;
    $profile_name = 'student';
    $cuuser = \Drupal\user\Entity\User::load($user_id);
    $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($cuuser, $profile_name);

    $para = $data['id'];
    $p = \Drupal\paragraphs\Entity\Paragraph::load($para);
    if ($p == "") {
      return 'paragraph not present';
    } else {
      $p->delete();
    }


    return "deleted paragraph";
  }
  public function update($data, $uid)

  {

    $user_id = $uid;
    $profile_type = 'student';
    $current_user = \Drupal\user\Entity\User::load($user_id);


    $active_profile = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($current_user, $profile_type);
    $para = $active_profile->get('field_education')->getValue();

    $term_id = $data['id'];
    $term = \Drupal::entityTypeManager()->getStorage('paragraph')->load($term_id);
    $college = $term->hasField('field_college');
    $degree = $term->hasField('field_degree');
    $dob = $term->hasField('field_dob');

    if ($term == "") {
      return "paragraph not found to be updated ";
    } elseif ($college == "false" || $degree == "false" || $dob == "false") {
      return "field_not found";
    } else {
      $term->get('field_college')->value = $data['college'];
      $term->get('field_degree')->value = $data['degree'];
      $term->get('field_dob')->value = $data['dob'];
      $term->save();
      return "Paragraph updated";
    }
  }

  public function read($uid)
  {

    $list=[];

    $user_id = $uid;
    $profile_type = 'student';
    $current_user = \Drupal\user\Entity\User::load($user_id);

    $active_profile = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($current_user, $profile_type);

    $education = $active_profile->get('field_education');


    foreach($education as $item){
      $arr=[
         "clg"=>$item->entity->get('field_college')->value,
         "Degree"=>$item->entity->get('field_degree')->value,
         "Passing year"=>$item->entity->get('field_year')->value,
        // "document"=>$item->entity->get('field_document')->entity->get('uri')->value,


      ];
      array_push($list,$arr);
     
    }



    return $list;
  }
}
