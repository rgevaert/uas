<?php

class LoginForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
    'login'             =>new sfWidgetFormInputText(),
    'password'         =>new sfWidgetFormInputPassword(),
    ));
    
    $this->widgetSchema->setLabels(array(
    'login'              => 'Username',
    'password'          => 'Password',
    ));

    $this->validatorSchema['login'] = new sfValidatorAnd(array(
		new sfValidatorString(array('required' => true)),
		new uasValidatorLoginExists()
		));
    $this->validatorSchema['password'] = new sfValidatorAnd(array(
		new sfValidatorString(array('required' => true)),
		new uasValidatorPasswordIsCorrect(array('login' => 'credentials[login]'))
		));
    
    $this->widgetSchema->setNameFormat('credentials[%s]');  
  }
}