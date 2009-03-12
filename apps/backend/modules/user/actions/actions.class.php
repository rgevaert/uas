<?php

require_once dirname(__FILE__).'/../lib/userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/userGeneratorHelper.class.php';

/**
 * user actions.
 *
 * @package    uas
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class userActions extends autoUserActions
{
    public function executeListToggleStatus(sfWebRequest $request)
    {
        //$user = UserPeer::retrieveByPk($request->getParameter('id'));
       // $user = $this->getRoute()->getObject();
        $id = $request->getParameter('id'); 
        $user = UserPeer::retrieveByPk($id);
       
        $user->ToggleStatus();
        $this->getUser()->setFlash('notice', 'Status is changed successfully.');
        $this->redirect('@user');  
    }
    
    
    public function executeBatchToggle_status(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids'); 
        $users = UserPeer::retrieveByPks($ids);
        
        foreach ($users as $user)
        {
            $user->ToggleStatus();        
        }
       
       $this->getUser()->setFlash('notice', 'Status is changed successfully.');
       $this->redirect('@user');
       
    }
}
