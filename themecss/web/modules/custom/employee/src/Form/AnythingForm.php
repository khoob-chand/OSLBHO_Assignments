<?php

 namespace Drupal\employee\Form;
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;
 use Drupal\Core\Database\database;

 class AnythingForm extends FormBase{

    
    public function getFormId(){
        return "myform";
    }
    public function buildForm(array $form ,FormStateInterface $form_state){

        $gender=array(
            'choose'=>'select gender',
            'male'=>'male',
            'female'=>'female'

        );
        $form['name']=array(
            '#type'=>'textfield',
            '#title'=>'name'

        );
        $form['age']=array(
            '#type'=>'number',
            '#title'=>'Enter your age',
            
        );
        $form['gender']=array(

            '#type'=>'select',
            '#title'=>'gender',
            '#options'=>$gender

        );
        $form['save']=array(
            '#type'=>'submit',
            '#title'=>'Submit',
            '#value'=>'submit'

        );
        $form['textar']=array(
            '#type'=>'textarea',
            '#title'=>'textarea'

        );
        return $form;
    }


        public function submitForm(array &$form, FormStateInterface $form_state)
        {
            $postData=$form_state->getValues();
            // echo "<pre>";
            // print_r($postData);
            // echo "<pre>";
            // exit;
            unset($postData['op'],$postData['save'],$postData['form_build_id'],$postData['form_token'],$postData['form_id']);
            $query=\Drupal::database();
            $query->insert('employee')->fields($postData)->execute();

            // drupal_set_message(t('successfully inserted'),'status',TRUE);

            
        }
        public function validateForm(array &$form, FormStateInterface $form_state)
        {
            $name=$form_state->getValue('name');
            $gender=$form_state->getValue('gender');
            $text=$form_state->getValue('textar');

            if($name==""){
                $form_state->setErrorByName('name',$this->t('name field required'));
            }
            if($gender=='choose'){
                $form_state->setErrorByName('gender',$this->t('gender field required'));

            }
        }
        
    

 }
 ?>
 