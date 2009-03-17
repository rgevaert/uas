<?php

class LoginForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(), 
      'password' => new sfWidgetFormInputPassword() 
    ));

    $this->widgetSchema->setNameFormat('login[%s]');

    $this->setValidators(array(
      'username' => new sfValidatorChoice(array('required' => true, 'choices' => array('admin'))), 
      'password' => new sfValidatorChoice(array('required' => true, 'choices' => array('pass')))
    ));
  }
}

