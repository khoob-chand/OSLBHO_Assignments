<?php

namespace Drupal\moduledevel\Controller;
use Drupal\Core\Controller\ControllerBase;

class FirstController extends ControllerBase{

    

    public function content(){
        
        return[
            '#type'=>'markup',
            '#markup'=>$this->t('<h2>Welcome to the page</h2>'),
        ];
    }
}
