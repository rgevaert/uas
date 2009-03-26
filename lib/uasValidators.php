<?php
class uasValidatorLoginExists extends sfValidatorBase
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);
  }

  protected function doClean($value) // $value = 'bernard'
  {
	$user = UserPeer::getUserFromLogin($value);

    if (!$user)
    {
      throw new sfException('No such user');
    }

    return $value;
  }
}

class uasValidatorPasswordIsCorrect extends sfValidatorBase
{
  protected function configure($options = array(), $messages = array())
  {
	$this->addOption('login');
    parent::configure($options, $messages);
  }

  protected function doClean($value) // $value = 'bernard'
  {
	$login = $_POST['credentials']['login'];
	$user = UserPeer::getUserFromLogin($login);

    if (!$user->checkPassword(new Password($value)))
    {
      throw new sfException('The password is not correct');
    }

    return $value;
  }
}

?>
