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
class uasValidatorPasswordIsStrong extends sfValidatorBase
{
  protected function configure($options = array(), $messages = array())
  {
	$this->addOption('login');
    parent::configure($options, $messages);
  }

  protected function doClean($value)
  {
	$password = $_POST['changepassword']['new_password'];
    
    if( preg_match_all('/[a-z]/', $password, $small_letter_match) > 1 &&
        preg_match_all('/[0-9]/', $password, $number_match) > 1 &&
        preg_match_all('/[&\$@#\)\(\[\]\?><!]/', $password, $special_char_match) > 1 &&
        preg_match_all('/[A-Z]/', $password, $cap_letter_match) > 1  &&
        strlen($password) > 7 )
    {
        return true;
    }

/*
    if( preg_match_all('/[a-z]/', $password, $small_letter_match) < 2 ) die("$password small"); 
    if( preg_match_all('/[0-9]/', $password, $number_match) < 2) die("$password number"); 
    if( preg_match_all('/[&\$@#\)\(\[\]\?><!]/', $password, $special_char_match) < 2) die("$password char"); 
    if( preg_match_all('/[A-Z]/', $password, $cap_letter_match) < 2 ) die("$password cap"); 
    if( strlen($password) < 8 ) die("$password len");
*/
    return false;

  }
}

?>
