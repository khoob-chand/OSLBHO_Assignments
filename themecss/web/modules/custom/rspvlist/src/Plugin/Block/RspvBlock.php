<?php 
namespace Drupal\rspvlist\Plugin\Block;
/**
 * @file
 * create block 
*/ 




use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;



 /** 
  *    @Block(
   *  id="rspv_block",
    * admin_label=@Translation("My Rspv Block ")
  * )
 */
  
 


class RspvBlock extends BlockBase{
    /** // {@interitance} */
    public function build(){
      
          return \Drupal::formBuilder()->getForm('Drupal\rspvlist\Form\FirstForm');
 
    }

    public function blockAccess(AccountInterface $account){
        $node=\Drupal::routeMatch()->getParameter('node');

        if(!(is_null($node))){

            return AccessResult::allowedIfHasPermission($account,'permitcontent');
        }
        return AccessResult::forbidden();

}    

}
