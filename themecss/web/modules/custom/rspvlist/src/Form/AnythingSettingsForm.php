<?php

/**
 * @file
 
 */
namespace Drupal\rspvlist\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class AnythingSettingsForm extends ConfigFormBase{
    /**
     * {@inheritdoc}
     */
    public function getFormid(){
        return 'rspvlist_admin_settings';
    }
    

    protected function getEditableConfigNames()
    {
        return[
            'rspvlist.settings'
        ];
    }
    /**
     * {@inheritdoc}
     */

     public function buildForm(array $form, FormStateInterface $form_state)
     {
        $types=node_type_get_names();
        $config=$this->config('rspvlist.settings');
        $form['rspvtypes']=[
            '#types'=>'checkboxes',
            '#title'=>$this->t('content types enabled'),
            '#default_value'=>$config->get('allowed_types'),
            '#options'=>$types,
            '#description'=>$this->t('specific nodes type')
        ];

        return parent::buildForm($form,$form_state);
     }
     /**
      * {@inheritdoc}
      */

      public function submitForm(array &$form, FormStateInterface $form_state)
      {
        $select=array_filter($form_state->getValue('rspvtypes'));
        sort($select);
        $this->config('rspvlist.settings')
        ->set('allowed_types',$select)
        ->save();
        parent::submitForm($form,$form_state);
      }

     
}

