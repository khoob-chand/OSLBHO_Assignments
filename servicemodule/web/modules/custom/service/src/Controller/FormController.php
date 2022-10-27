<?php

namespace Drupal\service\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\service\Entity\serviceentityInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;



class FormController extends ControllerBase{
  public function content($id = NULL){
    $entity = \Drupal::routeMatch()->getParameter('id');
    $node = \Drupal::entityTypeManager()->getStorage('serviceentity')->load($entity);
    $page_title = $node->field_title->value;
    $page_body = strip_tags($node->field_description->value);
    $paragraph = $node->field_card->getValue();
    $card = [];
    foreach ($paragraph as $key => $element) {
      $p = \Drupal\paragraphs\Entity\Paragraph::load($element['target_id']);
      $card[$key] = [
        'ptitle' => $p->field_title->getString(),
        'pimage' => $p->field_image->entity->getFileUri(),
        'pdesc' => $p->field_descri->value,
        'plink'=>$p->field_link->title,
        'url'=>$p->field_link->uri,
      ];
    }
    return [
      '#theme' => 'mylist',
      '#title' => $page_title,
      '#desc' => $page_body,
      '#data' => $card,
      
    ];
  }
}
