<?php

namespace Drupal\postapi\services;
use Drupal\media\Entity\Media;
use Drupal\file\Entity\File;




class Demopostapi
{


  public function postdata($data)
  {
    // You must to implement the logic of your REST Resource here.
    // Use current user after pass authentication to validate access.$profile_type = 'profile_1';
    $user_id = 1;
    $profile_type = 'student';
    $current_user = \Drupal\user\Entity\User::load($user_id);

    $active_profile = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($current_user, $profile_type);
    $term_id =  $active_profile->get('field_abo')->target_id;
    
    $term = \Drupal::entityTypeManager()->getStorage('paragraph')->load($term_id);
    
    $term->get('field_biodata')->value = $data['bio'];
    $term->get('field_address')->value = $data['postal_code'];
    $term->get('field_dob')->value = $data['dob'];

   

    $term->save();

    return $term;
  }

  public function getdata()
  {
  $paras = [];


    $data = 'Api worked';

    $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadMultiple();



    $paras[0] = $entity_manager[1]->get('field_abo')->entity->get('field_address')->value;
    $paras[1] = $entity_manager[1]->get('field_abo')->entity->get('field_biodata')->value;
    $paras[2] = $entity_manager[1]->get('field_abo')->entity->get('field_dob')->value;
    $paras[3] = $entity_manager[1]->get('field_education')->entity->get('field_degree')->value;
    $paras[4] = $entity_manager[1]->get('field_education')->entity->get('field_college')->value;
    $paras[5] = $entity_manager[1]->get('field_education')->entity->get('field_year')->value;

    $paras[6] =  $entity_manager[1]->get('field_education')->entity->get('field_document')->entity->getFileUri();
    
   


    return $paras;
  }
}
