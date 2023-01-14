<?php 
namespace Drupal\postapi\services;

use Drupal\Core\File\FileSystemInterface;
use Drupal\paragraphs\Entity\Paragraph;
class Document implements Postinterface {
  

 public function create($data,$uid)
  {

    $user_id = $uid;
    $profile_type = 'student';
    $current_user = \Drupal\user\Entity\User::load($user_id);


    $active_profile = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($current_user, $profile_type);
    $para = $active_profile->get('field_document')->getValue();
  $paragraph = Paragraph::create([
      'type' => 'document',
      'field_date' => $data["dob"],
      'field_document_type' => $data["type"],
      

    


    ]);
    $url = $data['field_file'];
    $data = file_get_contents($url);

    $file = \Drupal::service('file.repository')->writeData($data, "public://image".rand().".png", FileSystemInterface::EXISTS_REPLACE);
  

    $field_doc = array(
      'target_id' => $file->id(),
      'alt' => "My 'alt'",
      'title' => "My 'title'",
    );
    $paragraph->field_upload_file =$field_doc;

  
   



    $paragraph->save();

    $user_id = $uid;
    $profile_name = 'student';
    $cuuser = \Drupal\user\Entity\User::load($user_id);
    $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadByUser($cuuser, $profile_name);
    $para = $entity_manager->get('field_document')->appendItem($paragraph);
    $entity_manager->save();


    return "created document paragraph";
  }
  public function delete($data,$uid)
  {
  }
  public function update($data,$uid)
  {
  }
  public function read($uid){
    $paras = [];


    $data = 'Api worked';

    $entity_manager = \Drupal::entityTypeManager()->getStorage('profile')->loadMultiple();
    $target=$entity_manager[$uid]->get('field_document')->target_id;



    $paras[0] = $entity_manager[$uid]->get('field_document')->entity->get('field_document_type')->value;
    $paras[1] = $entity_manager[$uid]->get('field_document')->entity->get('field_date')->value;
    $paras[2] = $entity_manager[$uid]->get('field_document')->entity->get('field_upload_file')->entity->get('uri')->value;

    $datas['Document']=[
      'document_type' => $paras[0],
      'year of expiry'=>$paras[1],
      'file'=>$paras[2],
      'id'=>$target,

    ];
   

   


    return $datas;
  }
}