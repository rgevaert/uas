<?php

/**
 * Comment form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CommentForm extends BaseCommentForm
{
  public function configure_specific()
  { 
    $this->widgetSchema['message'] = new sfWidgetFormTextarea();	   
    //$this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
    //$current_id = new User();
    //$current_user = $this->getObject()->getUser();
    //var_dump($current_user);
    //echo "current id=" . $current_user."\n";
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(), array('value' =>1));
    //die();
    $this->validatorSchema['subject'] = new sfValidatorString(array(
        'max_length'=>255), array(
        'invalid' => 'Should not exceed 255 characters'
    ));
    $this->validatorSchema['message'] = new sfValidatorString(array(
        'max_length'=>500), array(
        'invalid' => 'Message should not exceed 500 characters'
    ));
    
  }  
  public function configure()
  {
    parent::configure();
	unset($this['created_at'], $this['updated_at']);
    $this->configure_specific();  
  }
}
