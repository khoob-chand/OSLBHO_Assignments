<?php

namespace Drupal\postapi\Plugin\rest\resource;

use Drupal\node\Entity\Node;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "dummy_api",
 *   label = @Translation("Get Dummy API"),
 *   uri_paths = {
 *   
 *     "create" = "/api/dummy"
 *   }
 * )
 */
class Demo extends ResourceBase {
/**
*
*A current user instance.
*
*@var \Drupal\Core\Session\AccountProxyInterface
*/
protected $currentUser;
/**

*{@inheritdoc}
*/
public static function create(
ContainerInterface $container,
array $configuration,
$plugin_id,
$plugin_definition
) {
$instance = parent::create(
$container,
$configuration,
$plugin_id,
$plugin_definition
);
$instance->logger = $container->get('logger.factory')->get('propertydetails');
$instance->currentUser = $container->get('current_user');
return $instance;
}
/**

*Responds to GET requests.

*@param string $nid

*String for Node ID.

*@return \Drupal\rest\ResourceResponse

*The HTTP response object.

*@throws \Symfony\Component\HttpKernel\Exception\HttpException

*Throws exception expected.
*/
public function post() {
 
  $node = Node::create(
    array(
      'type' => 'page',
      'title' => "basicpage",
      'field_title'=>'Course name',
      'body' => [
        'summary' => '',
        'value' => "Course Description",
       'description'=>"Course Description",
      ],
      'field_course_date_range'=>'Course date range',
      'field_professors'=>'professor',
      'field_course_timing'=>'Course Time'
      
    ),
  );
  $node->save();
  return new ResourceResponse($node,200);
}
}
