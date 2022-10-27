<?php

/**
 * @file
 * Contains serviceentity.page.inc.
 *
 * Page callback for Serviceentity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Serviceentity templates.
 *
 * Default template: serviceentity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_serviceentity(array &$variables) {
  // Fetch serviceentity Entity Object.
  $serviceentity = $variables['elements']['#serviceentity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
