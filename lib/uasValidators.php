<?php
class uasValidatorLoginExists extends sfValidatorBase
{
  protected function doClean($login)
  {
	$user = UserPeer::getUserFromLogin($login);

    if (!$user)
    {
		throw new sfValidatorError($this, 'No such user');
    }
    return $login;
  }
}

class uasValidatorPasswordIsCorrect extends sfValidatorBase
{
  protected function configure($options = array(), $messages = array())
  {
	$this->addOption('login');
    parent::configure($options, $messages);
  }

  protected function doClean($password)
  {
	$login = $_POST['credentials']['login'];
	$user = UserPeer::getUserFromLogin($login);

    if (!$user->checkPassword(new Password($password)))
    {
		throw new sfValidatorError($this, 'invalid');
    }
    return $password;
  }
}

class uasValidatorPasswordIsStrong extends sfValidatorBase
{
  protected function doClean($password)
  {
	    
    if(
        preg_match_all('/[0-9]/', $password, $junk) > 1 &&
        preg_match_all('/[&\$@#\)\(\[\]\?%=!]/', $password, $junk) > 1 &&
        strlen($password) > 7 )
    {
        return $password;
    } else {
		throw new sfValidatorError($this, 'invalid');
	}
  }
}

?>
