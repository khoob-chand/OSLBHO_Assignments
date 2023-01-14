<?php
namespace Drupal\postapi\services;

class user implements postinterface{
  public function delete($data,$uid){
    return true;

  }
  public function update($data,$uid){
    return true;

  }
  public function read($uid){

   
    $current_user = \Drupal\user\Entity\User::loadMultiple();
      $name = $current_user[$uid]->get('name')->value;
      $email = $current_user[$uid]->get('mail')->value;
    $datas['user_datails']=[
      "user_name"=>$name,
      "user_email"=>$email,
    ];
      return $datas;

 
  }
  public function create($data,$uid){
    return true;
     }


}