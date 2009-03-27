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
		throw new sfValidatorError($this, 'No such user');
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
		throw new sfValidatorError($this, 'invalid');
    }

    return $value;
  }

}
class uasValidatorPasswordIsStrong extends sfValidatorBase
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);
  }

  protected function doClean($value)
  {
	
	$password = $value;
    
    if( preg_match_all('/[a-z]/', $password, $junk) > 1 &&
        preg_match_all('/[0-9]/', $password, $junk) > 1 &&
        preg_match_all('/[&\$@#\)\(\[\]\?><!]/', $password, $junk) > 1 &&
        preg_match_all('/[A-Z]/', $password, $junk) > 1  &&
        strlen($password) > 7 )
    {
        return $value;
    } else {
		throw new sfValidatorError($this, 'invalid');
	}
  }
}

?>
