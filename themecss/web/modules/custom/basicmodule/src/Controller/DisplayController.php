<?php
  namespace Drupal\basicmodule\Controller;
  use Drupal\Core\Controller\ControllerBase;


  class DisplayController extends ControllerBase{
    public function  show(){
        return [
            '#title'=>'page is shown',
            '#markup'=>'<h2>paragraph heading page</h2>'
        ];
    }
    public function information(){

        $data=array(
            'name'=>'khoob',
            'email'=>'email@gmail.com'
        );
        return [
            '#title'=>'information page',
            '#theme'=>'info',
            '#items'=>$data
        ];
    }
}



?>