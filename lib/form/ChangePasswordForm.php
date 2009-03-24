<?php

class ChangePasswordForm extends sfForm
{
  public function configure()
  {
    
    $this->setWidgets(array(
    'password'             =>new sfWidgetFormInputPassword(),
    'new_password'         =>new sfWidgetFormInputPassword(),
    'confirm_new_password' =>new sfWidgetFormInputPassword(),
    ));
    $this->widgetSchema->setLabels(array(
    'password'      => 'Your Current Password',
    'new_password'          => 'Your New Password',
    'confirm_new_password'  => 'Confirm Your New Password',
    ));
    
    
   $this->validatorSchema->setPreValidator(
        new sfValidatorSchemaCompare('new_password',               
                                      sfValidatorSchemaCompare::EQUAL, 
                                      'confirm_new_password',
                                      array('throw_global_error' => false),
                                      array('invalid' => 'Pass does not match' ))
                                );
    
  }
}
