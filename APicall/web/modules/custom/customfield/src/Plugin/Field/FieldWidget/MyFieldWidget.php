<?php
namespace Drupal\customfield\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Datetime\Entity\DateFormat;
use Drupal\Core\Field\WidgetInterface;


/**
 * Plugin implementation of the 'MyFieldWidget' widget.
 *
 * @FieldWidget(
 *   id = "MyFieldWidget",
 *   label = @Translation("My Field widget"),
 *   field_types = {
 *     "myfield"
 *   }
 * )
 */

class MyFieldWidget extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $field_settings = $this->getFieldSettings();
    if ($field_settings['yearonly_to'] == 'now') {
      $field_settings['yearonly_to'] = date('Y');
    }

    
    $options = array_combine(range(1900, date('Y') ), range(1900, date('Y') ));
    
    $element['value'] = $element + [
      '#type' => 'select',
      '#options' => $options,
      '#empty_value' => '',
     
      '#default_value' => 'YYYY',

      '#description' => $this->t('Select year'),
      
    ];
    return $element;
  }

}
