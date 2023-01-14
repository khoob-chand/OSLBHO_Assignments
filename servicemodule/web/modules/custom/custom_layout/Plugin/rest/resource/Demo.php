<?php

namespace Drupal\custom_layout\Plugin\rest\resource;

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
 *     "canonical" = "/api/dummy/{nid}"
 *   }
 * )
 */
class Demo extends ResourceBase {
/**

*A current user instance.

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
/** composer require 'drupal/restui:^1.21'

*Responds to GET requests.

*@param string $nid

*String for Node ID.

*@return \Drupal\rest\ResourceResponse

*The HTTP response object.

*@throws \Symfony\Component\HttpKernel\Exception\HttpException

*Throws exception expected.
*/
public function get($nid = NULL) {
$data="hello";

$node_storage = \Drupal::entityTypeManager()->getStorage('node');
$node = $node_storage->load($nid);
// $data= $node->get('title')->value;

$response = new ModifiedResourceResponse($data, 200);
return $response;
}}
