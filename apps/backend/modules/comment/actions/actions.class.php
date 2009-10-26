<?php

require_once dirname(__FILE__).'/../lib/commentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/commentGeneratorHelper.class.php';

/**
 * comment actions.
 *
 * @package    symfony
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class commentActions extends autoCommentActions
{
  public function executeListShow(sfWebRequest $request)
  {      
   $this->user = $this->getRoute()->getObject();        
  }
    
    
  public function executeListDelete(sfWebRequest $request)
  {
        /*$id = $request->getParameter('id'); 
        $user = UserPeer::retrieveByPk($id);
       
        $user->listDelete();
        $this->getUser()->setFlash('notice', 'User Account has been Deleted from Database');
        $this->redirect('@user');*/
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@comment');   
  }    
}
