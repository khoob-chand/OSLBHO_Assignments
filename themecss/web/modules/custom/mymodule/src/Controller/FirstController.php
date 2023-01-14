<?php

    namespace Drupal\mymodule\Controller;

    use Drupal\Core\Controller\ControllerBase;
    class FirstController extends ControllerBase{
        public function simplecontent(){
            return [
                '#type'=>'markup',
                // '#markup'=>"<h6>this is the first controller file</h6>"
                '#markup'=>"<a href='https://www.google.com'>heloo world</a>"
            ];

    }
        public function variable($name1,$name2){
            return [
                '#type'=>'markup',
                '#markup'=>t('say heloo to @a and @b',['@a'=>$name1 , '@b'=>$name2])
            ];
        }
      

    }

