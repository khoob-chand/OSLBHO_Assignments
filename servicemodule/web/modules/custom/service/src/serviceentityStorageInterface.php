<?php

namespace Drupal\service;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\service\Entity\serviceentityInterface;

/**
 * Defines the storage handler class for Serviceentity entities.
 *
 * This extends the base storage class, adding required special handling for
 * Serviceentity entities.
 *
 * @ingroup service
 */
interface serviceentityStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Serviceentity revision IDs for a specific Serviceentity.
   *
   * @param \Drupal\service\Entity\serviceentityInterface $entity
   *   The Serviceentity entity.
   *
   * @return int[]
   *   Serviceentity revision IDs (in ascending order).
   */
  public function revisionIds(serviceentityInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Serviceentity author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Serviceentity revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\service\Entity\serviceentityInterface $entity
   *   The Serviceentity entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(serviceentityInterface $entity);

  /**
   * Unsets the language for all Serviceentity with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
