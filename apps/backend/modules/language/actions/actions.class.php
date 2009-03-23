<?php

/**
 * language actions.
 *
 * @package    uas
 * @subpackage language
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class languageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeChangeLanguage(sfWebRequest $request)
  {
    $form = new sfFormLanguage(
      $this->getUser(),
      array('languages' => array('en', 'ti'))
    );
 
    $form->process($request);
 
    return $this->redirect('@localized_homepage');
  }
    
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
}
