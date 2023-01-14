<?php

 namespace Drupal\employee\Form;
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;
 use Drupal\Core\Database\database;

 class EditEmployee extends FormBase{

    
    public function getFormId(){
        return "myeditform";
    }
    public function buildForm(array $form ,FormStateInterface $form_state){
        $id=\Drupal:: routeMatch()->getParameter('id');
        $query=\Drupal::database();
        $data=$query->select('employee','e')
               ->fields('e',['id','name','age','gender','textar']) 
               ->condition('e.id',$id)
               ->execute()->fetchAll(\PDO::FETCH_OBJ);

        $gender=array(
            'choose'=>'select gender',
            'male'=>'male',
            'female'=>'female',
            '#default_value'=>$data[0]->gender
           

        );
        $form['name']=array(
            '#type'=>'textfield',
            '#title'=>'name',
            '#default_value'=>$data[0]->name

        );
        $form['age']=array(
            '#type'=>'number',
            '#title'=>'Enter your age',
            '#default_value'=>$data[0]->age
            
        );
        $form['gender']=array(

            '#type'=>'select',
            '#title'=>'gender',
            '#options'=>$gender

        );
        $form['update']=array(
            '#type'=>'submit',
            '#title'=>'Submit',
            '#value'=>'update'

        );
        $form['textar']=array(
            '#type'=>'textarea',
            '#title'=>'textarea',
            '#default_value'=>$data[0]->textar

        );
        return $form;
    }


        public function submitForm(array &$form, FormStateInterface $form_state)
        {        $id=\Drupal:: routeMatch()->getParameter('id');

            $postData=$form_state->getValues();
            // echo "<pre>";
            // print_r($postData);
            // echo "<pre>";
            // exit;
            unset($postData['op'],$postData['update'],$postData['form_build_id'],$postData['form_token'],$postData['form_id']);
            $query=\Drupal::database();
            $query->update('employee')->fields($postData)
                  ->condition('id',$id)
                  ->execute();

            // drupal_set_message(t('successfully inserted'),'status',TRUE);
            $response= new \Symfony\Component\HttpFoundation\RedirectResponse('../employee');
            $response->send();
            
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
 