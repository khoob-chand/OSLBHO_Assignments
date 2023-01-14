<?php

namespace Drupal\custom_template\Controller;
use Drupal\Core\Controller\ControllerBase;







 class CustomRouteController extends ControllerBase{
    public function content() {
        $value = \Drupal::routeMatch()->getParameter('title');
        $value2 = '/'.$value;
        $path = \Drupal::service('path_alias.manager')->getPathByAlias($value2);
        if(preg_match('/node\/(\d+)/', $path, $matches)) {
            $node = \Drupal\node\Entity\Node::load($matches[1]);
        
            $body = strip_tags($node->body->value);
            
           
            // $image = reset($node)->field_image_1->entity ? ImageStyle::load('search_result_list_large')->buildUrl(reset($node)->field_image_1->entity->getFileUri()) : '';
            $img = $node->field_image->entity->getFileUri();


        }
            return [
                    '#theme' => 'my_template',
                    '#test_var' => $this->t('Test Value'),
                    '#body' => $body,
                    '#title'=>$value,
                    '#image'=>$img,
                ];
            }
        }   
    
    

    
 

  


 

