<?php
/**
 * 
*@Send File to channel

 * A custom form.
 */
namespace Drupal\customform\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class CustomFormController extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'event_form';
  }
  /**
   * {@inheritdoc}
   */
//   public function buildForm(array $form, FormStateInterface $form_state) {
//     $form['firstname'] = [
//         '#type' => 'textfield',
//         '#title' => t('First name'),
//         '#size' => 25,
//         '#description' => t("enter your firstname"),
//         '#required' => TRUE,
//       ];
//       $form['lastname'] = [
//         '#type' => 'textfield',
//         '#title' => t('Last name'),
//         '#size' => 25,
//         '#description' => t("enter  your lastname"),
//         '#required' => TRUE,
//       ];
    //   $user = \Drupal::currentUser();
    // //  $userid = \Drupal::currentUser()->id();
    //   $roles = $user->getRoles();
    // //  dd($roles);
    // if($roles=="professor"){
    //     $form['studentid'] = [
    //         '#type' => 'textfield',
    //         '#title' => t('profestudentid'),
    //         '#size' => 25,
    //         '#description' => t("enter student id"),
    //         '#required' => TRUE,
    //       ];
    // }
    // if($userid==2 || $userid==3){
    //     $form['employeeid'] = [
    //         '#type' => 'textfield',
    //         '#title' => t('Employee ID'),
    //         '#size' => 25,
    //         '#description' => t("enter your Employee ID"),
    //         '#required' => TRUE,
    //       ];
    // }
//     $userCurrent = \Drupal::currentUser();
//     $uid = $userCurrent->id();
//     $userx = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties([
//       'uid' => $uid
//     ]);
//     $user = reset($userx);
//      dd($user);
//     if ($x = $user->hasRole('student')) {
//         $form['student_id'] = array(
//           '#type' => 'textfield',
//           '#title' => t('Student ID:'),
//           '#required' => TRUE,
//         );
//     $form['submit'] = [
//         '#type' => 'submit',
//         '#value' => t('submit'),
//       ];
//      //return $form;
//   }}
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $userCurrent = \Drupal::currentUser();
    $uid = $userCurrent->id();
    $userx = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties([
      'uid' => $uid
    ]);
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('event1');
    
  
    foreach ($terms as $term) {
      $title[] = $term->name;
      

      }

    $user = reset($userx);
   
    
    
    
    
    
    // dd($x);
    $form['first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name:'),
      '#required' => TRUE,
    );
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name:'),
      '#required' => TRUE,
    );
    if ($x=$user->hasRole('student')) {
      $form['student_id'] = array(
        '#type' => 'textfield',
        '#title' => t('Student ID:'),
        '#required' => TRUE,
      );
      $form['event_list'] = array(
        '#type' => 'checkboxes',
        '#title' => ('Event list student:(multiple)'),
        '#options' => $title,
       
       
      );
    }
    elseif ($x=$user->hasRole('professor')) {
        $form['employee_id'] = array(
            '#type' => 'textfield',
            '#title' => t('Employee ID:'),
            '#required' => TRUE,
          );
          $form['event_list'] = array(
            '#type' => 'checkboxes',
            '#title' => ('Event list organiser:(multiple)'),
            '#options' => $title,
           
           
          );

    }
    elseif ($x=$user->hasRole('hod')) {
        $form['employee_id'] = array(
            '#type' => 'textfield',
            '#title' => t('Employee ID:'),
            '#required' => TRUE,
          );
          $form['event_list'] = array(
            '#type' => 'checkboxes',
            '#title' => ('Event list judge:(multiple)'),
            '#options' => $title,
           
           
          );
    }
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Register'),
      '#button_type' => 'primary',
    );
    return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // $first_name = $form_state->getValue('first_name');
    // $last_name = $form_state->getValue('last_name');
    // $student_id = $form_state->getValue('student_id');
    // $employee_id = $form_state->getValue('employee_id');
    // $events = $form_state->getValue('event_list');
    // $event_voc = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($events);
    // $users = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    // $event_id = $event_voc->id();
    // $event_term = \Drupal\taxonomy\Entity\Term::load($event_id);
    // $user = $users->getRoles();
    // if ($user[1] == "hod") {
    //   $event_users = $event_term->get('field_judge')->getValue();
    //   array_push($event_users, array('target_id' => $users->id()));
    //   $event_term->set('field_judge', $event_users);
    //   $event_term->save();
    // }
    // if ($user[1] == "professor") {
    //   $event_users = $event_term->get('field_organise')->getValue();
    //   array_push($event_users, array('target_id' => $users->id()));
    //   $event_term->set('field_manager', $event_users);
    //   $event_term->save();
    // }
    // if ($user[1] == "student") {
    //   $event_users = $event_term->get('field_participant')->getValue();
    //   array_push($event_users, array('target_id' => $users->id()));
    //   $event_term->set('field_participant', $event_users);
    //   $event_term->save();
    // }
    // //set taxonomy term
    // $this->messenger()->addStatus($this->t(' your form is working'));
   
    

   
  



    
  }
}