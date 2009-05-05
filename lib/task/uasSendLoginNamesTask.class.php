<?php

class uasSendLoginNamesTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addArguments(array(
      new sfCommandArgument('message', sfCommandArgument::REQUIRED, 'MESSAGE'),
    )); 

    $this->addArguments(array(
      new sfCommandArgument('to', sfCommandArgument::OPTIONAL, 'TO'),
    ));    

    $this->addArguments(array(
      new sfCommandArgument('all', sfCommandArgument::OPTIONAL, 'ALL'),
    ));        

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'uas';
    $this->name             = 'sendLoginNames';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [uas:sendLoginNames|INFO] task does things.
Call it with:

  [php symfony uas:sendLoginNames|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    $to = $arguments['to'] ? $arguments['to'] : '';
	$message2 = $arguments['message'] ? $arguments['message'] : '';
    
    // TODO : get login, localparts names

     $subject = "Notification";
     $headers = 'From: ICT <support@ju.edu.et>';
     $message = <<<EOF
Hello #FIRSTNAME# #FATHERSNAME#,

We would like to inform you about the following.

Your login name for the User Adminitration System is: #LOGIN# 

Please go to http://mail.ju.edu.et/uas/ to use it.  The password to log in
is the same as for the email system.

Login in into the email system is still done with your email address.

Thank you for your cooperation.  We hope you will enjoy the UAS.
Expect us to expand its functionality in the future.

The ICT Development office
EOF;
 
     $users = array();
     if($to != '')
     {
               $a = explode("@",$to);
               $users[] = UserPeer::getUserFromEmailLocalPart($a[0]);
               
     }
     else
     {
               $users = UserPeer::getEmailAccounts();
     }
	
	 if($message2 != '')
	 {
		$handle = fopen($message2, 'r');
		$Data = fread($handle, filesize($message2));
		fclose($handle);
		//echo $Data;
	 }
	 else
	 {
		echo "You must provide file that has text";
	 }



     foreach($users as $user)
     {       
          $login = $user->getLogin(); 
          $search  = array("#LOGIN#", "#FIRSTNAME#", "#FATHERSNAME#", "#EMAILADDRESS#");
          $replace = array($user->getLogin(), $user->getName(), $user->getFathersName(), $user->getEmailAddress());
		  echo str_replace($search, $replace, $Data);
          //if(!mail($user->getEmailAddress(), $subject, str_replace($search, $replace, $message2), $headers))
          //{
               //echo "message failed";
          //}    
     }

	 //echo $message2;

    
  }
}
