<?php

namespace Drupal\postapi\Plugin\rest\resource;


use Drupal\rest\Plugin\ResourceBase;

use Drupal\rest\ModifiedResourceResponse;



/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "dummy_api",
 *   label = @Translation("Get Dummy API"),
 *   uri_paths = {
 *   
 *    
 *         
 *           "canonical" = "/dummy/get/{uid}",
 *           "create" = "/dummy/postget/{uid}"
 *    
 *    
 * 
 *   }
 * )
 */
class Demo extends ResourceBase
{
  /**
   *
   *A current user instance.
   *
   *@var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;
  /**

   *{@inheritdoc}
 

   *Responds to GET requests.

   *@param string $nid

   *String for Node ID.

   *@return \Drupal\rest\ResourceResponse

   *The HTTP response object.

   *@throws \Symfony\Component\HttpKernel\Exception\HttpException

   *Throws exception expected.
   */
  public function post($data, $uid)
  {
    $education = "";
    // $a = "";


    switch ($data['label']) {
      case 'education':
        switch ($data['operation']) {
          case 'create':
            $education = \Drupal::service('postapi.education')->create($data, $uid);
            break;
          case 'update':
            $education = \Drupal::service('postapi.education')->update($data, $uid);
            break;
          case "delete":
            $education = \Drupal::service('postapi.education')->delete($data, $uid);
            break;
          default:
            $education = "Invalid Argument";
        }

      case 'about':
        switch ($data['operation']) {
          case 'update':
            $education = \Drupal::service('postapi.about')->update($data, $uid);
            break;
          case 'delete':
            $education = \Drupal::service('postapi.about')->delete($data, $uid);
            $education = "para deleted successfully";
            break;
          default:
            $education = "Invalid Argument";
        }

      case 'document':
        switch ($data['operation']) {
          case 'create':
            $education = \Drupal::service('postapi.document')->create($data, $uid);
            break;
          case 'update':
            $education = \Drupal::service('postapi.document')->update($data, $uid);
            break;
          case "delete":
            $education = \Drupal::service('postapi.document')->delete($data, $uid);
            break;
          default:
            $education = "Invalid Argument";
        }

      case 'test':
        switch ($data['operation']) {
          case 'create':
            $education = \Drupal::service('postapi.test')->create($data, $uid);
            break;
          case 'update':
            $education = \Drupal::service('postapi.test')->update($data, $uid);
            break;
          case "delete":
            $education = \Drupal::service('postapi.test')->delete($data, $uid);
            break;
          default:
            $education = "Invalid Argument";
        }
    }

    $node = "api worked";



    // $response = new ModifiedResourceResponse($education, 200);
    $response = new ModifiedResourceResponse($education, 200);

    // $response = new ModifiedResourceResponse($a, 200);
    return $response;
  }

  public function get($uid)
  {

    $about = \Drupal::service('postapi.about')->read($uid);
    $education = \Drupal::service('postapi.education')->read($uid);
    $user = \Drupal::service('postapi.user')->read($uid);
    $test = \Drupal::service('postapi.test')->read($uid);
    $document = \Drupal::service('postapi.document')->read($uid);

    $arr = [$about, $education, $user, $test, $document];


    $response = new ModifiedResourceResponse($arr, 200);
    return $response;
  }
}
