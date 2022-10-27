<?php

namespace Drupal\service\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class serviceentityTypeForm.
 */
class serviceentityTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $serviceentity_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $serviceentity_type->label(),
      '#description' => $this->t("Label for the Serviceentity type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $serviceentity_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\service\Entity\serviceentityType::load',
      ],
      '#disabled' => !$serviceentity_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $serviceentity_type = $this->entity;
    $status = $serviceentity_type->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Serviceentity type.', [
          '%label' => $serviceentity_type->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Serviceentity type.', [
          '%label' => $serviceentity_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($serviceentity_type->toUrl('collection'));
  }

}
