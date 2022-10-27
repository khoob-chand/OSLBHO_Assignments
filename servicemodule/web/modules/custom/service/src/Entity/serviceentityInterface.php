<?php

namespace Drupal\service\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Serviceentity entities.
 *
 * @ingroup service
 */
interface serviceentityInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Serviceentity name.
   *
   * @return string
   *   Name of the Serviceentity.
   */
  public function getName();

  /**
   * Sets the Serviceentity name.
   *
   * @param string $name
   *   The Serviceentity name.
   *
   * @return \Drupal\service\Entity\serviceentityInterface
   *   The called Serviceentity entity.
   */
  public function setName($name);

  /**
   * Gets the Serviceentity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Serviceentity.
   */
  public function getCreatedTime();

  /**
   * Sets the Serviceentity creation timestamp.
   *
   * @param int $timestamp
   *   The Serviceentity creation timestamp.
   *
   * @return \Drupal\service\Entity\serviceentityInterface
   *   The called Serviceentity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Serviceentity revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Serviceentity revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\service\Entity\serviceentityInterface
   *   The called Serviceentity entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Serviceentity revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Serviceentity revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\service\Entity\serviceentityInterface
   *   The called Serviceentity entity.
   */
  public function setRevisionUserId($uid);

}
