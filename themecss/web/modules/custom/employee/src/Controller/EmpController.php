<?php


namespace Drupal\employee\Controller;
namespace Drupal\employee\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\employee\Form\AnythingForm;

class EmpController extends ControllerBase {

   

	public function content() {
		$simpleform = \Drupal::formBuilder()->getForm('Drupal\employee\Form\AnythingForm');
		

		return [
            '#theme'=>'employee',
            '#items'=>$simpleform,
            '#title'=>''
        ];

	}

    public function getemployee(){
        $query=\Drupal::database();
        $result=$query->select('employee','e')
                ->fields('e',['id','name','age','gender','textar'])
                ->execute()->fetchAll(\PDO::FETCH_OBJ);
    
    $data=[];
    foreach($result as $row){

        $data[]=[
            'id'=>$row->id,        
            'name'=>$row->name,        
            'age'=>$row->age,        
            'gender'=>$row->gender,        
            'text'=>$row->textar,
            'edit'=>$this->t("<a href='edit-employee/$row->id'>Edit</a>"),
            'delete'=>$this->t("<a href='delete-employee/$row->id'>Delete</a>")


        ] ;
        }       
        $header=array('id','Name','age','Gender','text','Edit','Delete');

        $build['table']=[
            '#type'=>'table',
            '#header'=>$header,
            '#rows'=>$data

        ];
        return[
            $build,
            '#title'=>"employee data"
        ];

    }
    
            public function deleteController($id){
                $query=\Drupal::database();
                $query->delete('employee')
                ->condition('id',$id,'=')
                ->execute();
        
                $response=new \Symfony\Component\HttpFoundation\RedirectResponse('../employee');
                $response->send();
            } 
        
        
    
    
    
    
    
            

    

}