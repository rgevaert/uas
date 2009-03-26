<?php

class uasGeneratesmbpasswdTask extends sfBaseTask
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

    // add your code here
	$c = new Criteria();
	$all_samba_accounts = SambaAccountPeer::doSelect($c);
		
	foreach($all_samba_accounts as $samba_account){
		if($samba_account->getUser()->getStatus() != 'activated') continue;
		echo $samba_account->getUser()->getLogin() . ':';
		echo $samba_account->getUser()->getUid() . ':';
		echo $samba_account->getUser()->getLmPassword();
		echo "\n";
	}
  }
}
