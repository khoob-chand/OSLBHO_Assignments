<?php

namespace Drupal\customfield\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'MyFieldFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "MyFieldFormatter",
 *   label = @Translation("My Field Formatter"),
 *   field_types = {
 *     "myfield"
 *   }
 * )
 */

class MyFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->value,
      ];
    }

    return $element;
  }

}
