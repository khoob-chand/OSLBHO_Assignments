<?php

 namespace Drupal\rspvlist\Form;
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;
 use Drupal\Core\Database\database;
// use Symfony\Component\Validator\Constraints\NotNull;

 class FirstForm extends FormBase{

    
    public function getFormId(){
        return "first_form";
    }
    public function buildForm(array $form ,FormStateInterface $form_state){
        $path=\Drupal::routeMatch()->getParameter('node');

        if(!(is_null($path))){
            $nid=$path->id();
        }
        else{
            $nid=0;
        }
        $form['email']=[
            '#type'=>'textfield',
            '#title'=>'Email',
            '#size'=>30,
            '#description'=>'Please type valid Email',
            
        ];
        $form['submit']=['#type'=>'submit','#value'=>'Save'];
        $form['nid']=['#type'=>'hidden','#value'=>$nid];
        return $form;
    }
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        $value=$form_state->getValue('email');
        if(!(\Drupal::service('email.validator')->isValid($value))){
            $form_state->setErrorByName('email',$this->t('invalid email @k',['@k'=>$value]));
            
        }
        
    }

    public function submitForm(array &$form, FormStateInterface $form_state){
    //     $email=$form_state->getValue('email');
    //     $this->messenger()->addMessage($this->t('you entered @entry',['@entry'=>$email]));
        try{
            $uid=\Drupal::currentUser()->id();

            $nid=$form_state->getValue('nid');
            $email=$form_state->getValue('email');
            $current=\Drupal::time()->getRequesttime();
            $query=\Drupal::database()->insert('rspvlist');
            $query->fields([
                'uid','nid','mail','created',
            ]);
            $query->values([
                $uid,$nid,$email,$current,
            ]);
            $query->execute();
            \Drupal::messenger()->addMessage($this->t('Thank for submitted to the data'));

        }
        catch(\Exception $e){
            \Drupal::messenger()->addError($this->t('Unable to submitted to the data'));

        }



}


        
        
    

 }
 ?>
 