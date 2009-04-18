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
      new sfCommandArgument('to', sfCommandArgument::OPTIONAL, 'TO'),
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

     $to = $arguments['to'] ? $arguments['to'] : 'eyuel.gessese@ju.edu.et';
    
    // TODO : get login, localparts names

     foreach  (UserPeer::getEmailAccounts() as $user)
     {
          if($user->getEmailAddress()==$to){
               
               $login = $user->getLogin($user->getEmailAddress())."\n"; 
               $subject = "Notification";
               $headers = 'From: ICT <support@ju.edu.et>' . "\r\n";
               $message = "Hello there, your login is : $login";
               if(mail($to, $subject, $message, $headers))
               {
                    echo "message sent";
               }
               else
               {
                    echo "message failed";
               }
          }
     }
    
    // Send login names to each mail users
  }
}
