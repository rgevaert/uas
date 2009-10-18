<?php

class changeLoginTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));
        

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'uas';
    $this->name             = 'changeLogin';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [changeLogin|INFO] task does things.
Call it with:

  [php symfony changeLogin|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    // add your code here
    $from = $arguments['from'] ? $arguments['from'] : '';
    $to = $arguments['to'] ? $arguments['to'] : '';
  
  	$connection = Propel::getConnection();
  	$query = "SELECT login FROM " . UserPeer::TABLE_NAME . " WHERE length(login) < 5 or login like '%/%'" ;
	$result = $connection->query($query);
    while($row = $result->fetch())
    {
        $user = UserPeer::getUserFromLogin(($row['login']));
        echo $user->setLogin($user->generateLogin());
        echo " ";
        echo $user->getLogin();
        echo "\n";
        $user->save();
        
    }
 
   
  }
}
