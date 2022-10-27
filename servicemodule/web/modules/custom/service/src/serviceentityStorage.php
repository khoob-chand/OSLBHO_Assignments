<?php

namespace Drupal\service;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class serviceentityStorage extends SqlContentEntityStorage implements serviceentityStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(serviceentityInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {serviceentity_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {serviceentity_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(serviceentityInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {serviceentity_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('serviceentity_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
