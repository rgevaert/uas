<?php

class uasGeneratesmbpasswdTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    $this->addArguments(array(
      new sfCommandArgument('hostname', sfCommandArgument::REQUIRED, 'Hostname'),
    ));
    $this->addArguments(array(
      new sfCommandArgument('path', sfCommandArgument::OPTIONAL, 'Path where we put smbpasswd files'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'uas';
    $this->name             = 'generate-smbpasswd';
    $this->briefDescription = 'Generating the smbpasswd file';
    $this->detailedDescription = <<<EOF
The [uas:generate-smbpasswd|INFO] task does things.
Call it with:

  [php symfony uas:generate-smbpasswd|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

	$hostname = $arguments['hostname'];
    $path = $arguments['path'] ? $arguments['path'] : '/tmp';
    
	if($hostname == 'all'){
	  	$hostnames = SambaAccountTable::getHostnames();		
	} else {
		$hostnames[] = $hostname;
	}


	foreach($hostnames as $hostname){

		$fh = fopen($path . '/' . $hostname . '.smbpasswd', 'w');
		foreach(SambaAccountTable::getActiveAccounts($hostname) as $samba_account){
			fwrite($fh, $samba_account->getSmbpasswdLine() . "\n");
		}
		fclose($fh);
  	}
  }
}
