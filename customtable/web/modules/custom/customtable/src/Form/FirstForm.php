<?php
/**
 * 
*@Send File to channel

 * Contains \Drupal\ourservice\Form\MainForm.
 */
namespace Drupal\customtable\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class FirstForm extends FormBase {
      public function getFormId() {
    return 'main_form';
  }
  
public function buildForm(array $form, FormStateInterface $form_state) {
    
      
    $form['#tree'] = TRUE;
    $i = 0;
    $num_rows = $form_state->get('num_rows');
    $form['form_title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#required' => TRUE,
    );
    $form['form_description'] = array(
      '#type' => 'textfield',
      '#title' => t('Description'),
      '#required' => TRUE,
    );
    $form['actions']['#type'] = 'actions';
    $form['book_row'] = [
        '#type' => 'details',
        '#title' => $this->t('Images'),
        '#prefix' => '<div id="book-row-wrapper">',
        '#suffix' => '</div>',
        '#attributes' => array('class'=>array('container-inline')),
        '#open'  =>  TRUE,
    ];
    if (empty($num_rows)) {
        $num_rows = $form_state->set('num_rows', 1);
    }
    for ($i = 0; $i < $num_rows; $i++) {
        $form['book_row']['book_content'][$i] = [
            '#type' => 'fieldset',
        ];
        /******** You can add as many fields you want here *********/
        $form['book_row']['book_content'][$i]['profile_image'][$i] = [
            '#type' => 'managed_file',
            '#title' => $this->t('Image'),
            '#upload_location' => 'public://upload/profile'
        ];
     
              $form['book_row']['book_content'][$i]['title'][$i] = [
        '#type' => 'textfield',
        '#title' => t('Title'),
        // '#required' => TRUE, // Added
              ];
              $form['book_row']['book_content'][$i]['body'][$i] = [
        '#type' => 'textfield',
        '#title' => t('Description'),
        // '#required' => TRUE, // Added
              ];
              $form['book_row']['book_content'][$i]['link'][$i]=[
                '#type'=>'textfield',
                '#title'=>'read more',
    
    
            ];
        if ($i == 0) {
            $form['book_row']['book_content'][$i]['actions']['add_row'] = [
                '#type' => 'submit',
                '#value' => t('Add more'),
                '#submit' => array('::addOne'),
                '#limit_validation_errors' => array(),
                '#ajax' => [
                    'callback' => '::addmoreCallback',
                    'wrapper' => 'book-row-wrapper',
                ],
            ];
        }
        if ($i > 0) {
            $form['book_row']['book_content'][$i]['actions']['remove_name'][$i] = [
                '#type' => 'submit',
                '#value' => t('Remove'),
                '#submit' => array('::removeCallback'),
                '#limit_validation_errors' => array(),
                '#ajax' => [
                    'callback' => '::addmoreCallback',
                    'wrapper' => 'book-row-wrapper',
                ],
            ];
        }
    }
    $form_state->setCached(FALSE);
    $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Save'),
        '#button_type' => 'primary',
    );
    return $form;
}
/**
* Callback for both ajax-enabled buttons.
*
* Selects and returns the fieldset with the names in it.
*/
public function addmoreCallback(array &$form, FormStateInterface $form_state) {
$name_field = $form_state->get('num_rows');
return $form['book_row'];
}
/**
* Submit handler for the "add-one-more" button.
*
* Increments the max counter and causes a rebuild.
*/
public function addOne(array &$form, FormStateInterface $form_state) {
$name_field = $form_state->get('num_rows');
$add_button = $name_field + 1;
$form_state->set('num_rows', $add_button);
$form_state->setRebuild();
}
/**
* Submit handler for the "remove one" button.
*
* Decrements the max counter and causes a form rebuild.
*/
public function removeCallback(array &$form, FormStateInterface $form_state) {
$name_field = $form_state->get('num_rows');
if ($name_field > 1) {
  $remove_button = $name_field - 1;
  $form_state->set('num_rows', $remove_button);
}
$form_state->setRebuild();
}

public function submitForm(array &$form, FormStateInterface $form_state) {
    $rand=rand(111111,9999999);
     $title=$form_state->getValue('form_title');
    $description=$form_state->getValue('form_description');
    $query=\Drupal::database('main');

    $query->insert('main')->fields(['title','description','fid'])->values([$title,$description,$rand])->execute();
    for($i=0;$i<count($form_state->getValue('book_row')['book_content']);$i++){
        $title=  $form_state->getValue('book_row')['book_content'][$i]['title'][$i];
        $body= $form_state->getValue('book_row')['book_content'][$i]['body'][$i];
        $link= $form_state->getValue('book_row')['book_content'][$i]['link'][$i];
        $image= $form_state->getValue('book_row')['book_content'][$i]['profile_image'][$i];
            $image1=$image[0];
            $file = \Drupal\file\Entity\File::load($image1);
            $filename = $file->getFileURI();
            $cardquery=\Drupal::database()->insert('card');
          $cardquery->fields(array(
                'image'  ,              
                'title',
               'description',
               'link',
                // 'image',
               'fid',
          ));
           $cardquery->values(array(
               
            $filename,
            $title,
            $body,
               
            $link,

               $rand,
            ));
           $cardquery->execute();
    }
  }
}









   
    
    // $title=$form_state->getValue('form_title');
    // $description=$form_state->getValue('form_description');
    // $query=\Drupal::database('main');
    // $query->insert('main')->fields(['title','description'])->values([$title,$description])->execute();

    // $query2=\Drupal::database('card');

 
    // $title2= $form_state->getValue('book_row')['book_content'][0]['title'][0];
    // $description2=$form_state->getValue('book_row')['book_content'][0]['body'][0];
    // // $image=$form_state->getValue('book_row')['book_content'][0]['profile_image'][0];
    // // $image=$form_state->getValues();
    // $form_submit_result=$form_state->getValues('profile_image');
    // dd($form_submit_result);
    
  
    // // dd($image);
    
    
    // // dd($form['book_row']);
    // // dd($description2);
    // // dd($title2);
    // $query2->insert('card')->fields(['image','title','description'])->values([$card_image,$title2,$description2])->execute();

  