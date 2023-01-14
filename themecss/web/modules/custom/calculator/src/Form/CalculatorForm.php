<?php

namespace Drupal\calculator\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * This example demonstrates a simple form with a singe text input element. We
 * extend FormBase which is the simplest form base class used in Drupal.
 */
class CalculatorForm extends FormBase {
public function getFormId() {
    return 'calc_form';
  }
public function buildForm(array $form, FormStateInterface $form_state) {
    $form['num2'] = [
      '#type' => 'number',
      '#length'=>20,
      '#title'=>'first number',
      '#description' => $this->t('must contain interger.'),

    ];
  
    $form['num1'] = [
      '#type' => 'number',
      '#length'=>20,
      '#title' => $this->t('Second number'),
      '#description' => $this->t('must contain integer'),
      '#required' => TRUE,
    ];
  
    $form['actions'] = [
      '#type' => 'actions',
    ];
  
    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
  
    return $form;
  }  

 public function validateForm(array &$form, FormStateInterface $form_state) {
    $num = $form_state->getValue('num1');
    $num2 = $form_state->getValue('num2');
    if (is_int($num)) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('num1', $this->t('integer only.'));
    }
    if (is_int($num2)) {
        // Set an error for the form element with a key of "title".
        $form_state->setErrorByName('num2', $this->t('integer only'));
      }

  }

 
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $num1 = $form_state->getValue('num1');
    $num2 = $form_state->getValue('num2');
    $calculate = \Drupal::service('calculator.kuch');
    $sum = $calculate->sum($num1,$num2);
    $this->messenger()->addStatus($this->t('You specified a title of %title.', ['%title' => $sum]));
    
  }


}
