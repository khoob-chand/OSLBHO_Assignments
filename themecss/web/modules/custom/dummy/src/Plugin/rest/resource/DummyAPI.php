<?php

namespace Drupal\dummy\Plugin\rest\resource;
use Symfony\Component\HttpFoundation\JsonResponse;

use Drupal\node\Entity\Node;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\media\Entity\Media;
use Drupal\file\Entity\File;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "dummy_api",
 *   label = @Translation("Get Dummy API"),
 *   uri_paths = {
 *     "canonical"="/api/dummy/{nid}",
 *     "create" = "/api/dummy"
 *     
 *      
 *   }
 * )
 */
class DummyAPI extends ResourceBase
{
    /**
     *•
     *A current user instance.
     */
    protected $currentUser;
    /**
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
     */
    public function get($nid = NULL)
    {
       

        try {
            $node = \Drupal\node\Entity\Node::load($nid);
            if ($node->bundle() == 'article') {
                $title_field = $node->get('title');
                $title = $title_field->value;
                $body =  $node->get('body')->getValue();
                // $body = $node->body->value;
                $owner = $node->getOwnerId();
                $user = \Drupal\user\Entity\User::load($owner);
                $owner = $user->get('name')->value;
                $image = $node->field_image;
                $date=$node->field_date->value;
                 

                $created = $node->created->value;
                $data = [
                    'title' => $title,
                    'body' => $body,
                    'owner' => $owner,
                    'date' => $date,
                    'image' => $image,
                    'created' => $created,
                ];
                $response = new ModifiedResourceResponse($data, 200);
                // $response = new ModifiedResourceResponse($created);

                return $response;
            }

            else{
                return new JsonResponse("Invalid content type");
            }
        } catch (\Exception $e) {
            \Drupal::messenger()->addStatus($this->t('Unable to access the database. Please try again later.'));
            return NULL;
        }
    }
    // public function post($data) {
    //     foreach ($data as $key => $value) {
    //         $node = Node::create(
    //           [
    //             'type' => 'article',
    //             'title' => $value['title'],
    //             'body' => [
    //             'summary' => '',
    //             'value' => $value['body'],
    //             'format' => 'full_html',
    //             ],
    //           ]
    //         );
    //         $node->enforceIsNew();
    //         $node->save();
    //         $this->logger->notice($this->t("Node with nid @nid saved!\n", ['@nid' => $node->id()]));
    //         $nodes[] = $node->id();
    //       }
    //       $message = $this->t("New Nodes Created with nids : @message", ['@message' => implode(",", $nodes)]);
    //       return new ResourceResponse($message, 200);
    //     }

    public function post($data)
    {


        // try{
        foreach ($data as $key => $value) {
            $count = $value['count'];
            for ($i = 0; $i < $count; $i++) {
                $node = Node::create(
                    [
                        'type' => 'article',
                        'title' => $value['title'],
                        'body' => $value['body'],
                        'langcode' => 'en',
                        'status' => 0,
                    ]
                );
                $node->save();
            }
            return new ResourceResponse("Successfully created node");
        }

       


    }
    /**
   * Responds to DELETE requests.
   *
   * @param string $uuid
   *   UUID of user.
   *
   * @return \Drupal\rest\ModifiedResourceResponse
   *   The HTTP response object.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   *   Throws exception expected.
   */
  public function delete($nid) {
  
    $node=Node::load($nid);
    $node->delete();

    // return new ModifiedResourceResponse("Successfully deleted node");
    return new JsonResponse("suceesfully deleted ");
  }    
}
