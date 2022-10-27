<?php
namespace Drupal\customtable\Controller;
use Drupal\Core\Database\Database;
use Drupal\Core\Controller\ControllerBase;
class FirstcustomController extends ControllerBase {
        public function content($id) {
            $select = \Drupal::database()->select('main', 'S')
           // dd($ourservices);
                 ->fields('S', array( 'title', 'description','fid'))
        //   $fields=$ourservices->fields( array('title','description'));
       //    dd($fields);
                ->condition('S.id',$id)
                
                ->execute()->fetchAllAssoc('id');
               $fid= $select[""]->fid;
            //  dd($select);
                $connection = \Drupal::database();
                $query = $connection->select('card', 'C');
              //  $query->condition('C.cid',$cid);
                $query->fields('C',['image', 'title','description','link','fid']);
                $query->condition('C.fid',$fid);
                // use fetchAllKeyed
                $cards = $query->execute()->fetchAll();
// dd($result);
                return [
                        '#theme' => 'mylist',
                        '#ourservices' => $select,
                        '#cards'=>$cards,
                      ];
}
}