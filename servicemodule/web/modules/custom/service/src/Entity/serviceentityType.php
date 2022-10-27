<?php

namespace Drupal\service\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Serviceentity type entity.
 *
 * @ConfigEntityType(
 *   id = "serviceentity_type",
 *   label = @Translation("Serviceentity type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\service\serviceentityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\service\Form\serviceentityTypeForm",
 *       "edit" = "Drupal\service\Form\serviceentityTypeForm",
 *       "delete" = "Drupal\service\Form\serviceentityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\service\serviceentityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_export = {
 *     "id",
 *     "label"
 *   },
 *   config_prefix = "serviceentity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "serviceentity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/serviceentity_type/{serviceentity_type}",
 *     "add-form" = "/admin/structure/serviceentity_type/add",
 *     "edit-form" = "/admin/structure/serviceentity_type/{serviceentity_type}/edit",
 *     "delete-form" = "/admin/structure/serviceentity_type/{serviceentity_type}/delete",
 *     "collection" = "/admin/structure/serviceentity_type"
 *   }
 * )
 */
class serviceentityType extends ConfigEntityBundleBase implements serviceentityTypeInterface {

  /**
   * The Serviceentity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Serviceentity type label.
   *
   * @var string
   */
  protected $label;

}
