<?php

class createEmailDirectoriesTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    $this->addArguments(array(
      new sfCommandArgument('dirdeleted', sfCommandArgument::OPTIONAL, 'DirDeleted'),
    ));
    $this->addArguments(array(
      new sfCommandArgument('dir', sfCommandArgument::OPTIONAL, 'Dir'),
    ));
    
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
    $this->name             = 'createEmailDirectories';
    $this->briefDescription = 'Create the home directories for the email accounts.';
    $this->detailedDescription = <<<EOF
The [createEmailDirectories|INFO] task creates the home directories for the email accounts for accounts that are enabled or disabled.

Call it with:

  [php symfony uas:createEmailDirectories [--Dir=<path> --DirDeleted=<path>]]
  
  Dir          location of the email accounts, by default '/home/vmail'
  DirDeleted   location of the deleted email accounts, by default '/home/vmail_deleted'
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    // add your code here

     $dir_for_deleted_accounts = $arguments['dirdeleted'] ? $arguments['dirdeleted'] : '/home/vmail_deleted';
     $dir = $arguments['dir'] ? $arguments['dir'] : '/home/vmail';

     $db_email_addresses = array();
     $domains_on_system = array();
     $system_email_addresses = array();
     
     foreach  (UserPeer::getEmailAccounts() as $user)
     {
        $db_email_addresses[] =  $user->getEmailAddress();          
     }
     
     if ($handle_domain = opendir($dir)) {
         while (false !== ($domain_dir = readdir($handle_domain))) {
             if ($domain_dir != "." && $domain_dir != "..") 
             {
               if(is_dir($dir ."/". $domain_dir)){
                    $domains_on_system[$domain_dir] = 1;
                    if ($handle_local_part = opendir($dir ."/". $domain_dir)) {
                         while (false !== ($local_part_dir = readdir($handle_local_part))) {
                               if ($local_part_dir != "." && $local_part_dir != "..") {
                                   //is $local_part_dir is directory
                                   if(is_dir($dir . "/" . $domain_dir. "/".$local_part_dir)){                     
                                        // put email accounts on array
                                        $system_email_addresses[] = "$local_part_dir@$domain_dir";
                                        //echo "$subfile@$file\n";
                                   }
                                   else
                                   {
                                        echo $dir ."/".$domain_dir. "/".$local_part_dir;
                                        die("Not a directory");
                                   }
                               }
                         }
                    }
        	     }
        	     else
        	    {
        	          die($dir . $domain_dir ." not directory");
        	    } 
             }
         }
         closedir($handle_domain);
     }else
     {
          die($dir . "does not exist");
     }
     
     if(sizeof($domains_on_system) == 0)
     {
          die("Please create the domain names under $dir\n");
     }
     
     // Create domain name directory where we store deleted accounts
     foreach(array_keys($domains_on_system) as $domain_on_system)
     {
          if(!is_dir($dir_for_deleted_accounts. "/".$domain_on_system))
          {
               exec("mkdir ".$dir_for_deleted_accounts. "/".$domain_on_system);
          }
     }
  
     // Compute accounts to be deleted.
     
     if(sizeof($system_email_addresses) == 0)
     {
          $deleted_accounts = array();
     }else
     {
          $deleted_accounts = array_diff($system_email_addresses, $db_email_addresses);
     }
     
     foreach($deleted_accounts as $deleted_account)
     {
          // Get the local part and domain name from the email address
          $a = explode("@",$deleted_account);             
          $local_part = $a[0];
          $domain = $a[1];
          $path = $domain . "/" .$local_part;
          exec("mv ${dir}/$path ${dir_for_deleted_accounts}/$path");
          echo("mv ${dir}/$path ${dir_for_deleted_accounts}/$path\n");
     }
     
     //Accounts to have home directory created.

     $create_accounts = array_diff($db_email_addresses, $system_email_addresses);

     foreach($create_accounts as $create_account)
     {
          // Get the local part and domain name from the email address
          $a = explode("@",$create_account);             
          $local_part = $a[0];
          $domain = $a[1];
          $path = $domain . "/" .$local_part;
          exec("mkdir -p ${dir}/$path");
          chown("${dir}/$path","vmail";
          chgrp("${dir}/$path","vmail";
          echo("mkdir -p ${dir}/$path\n");
     }     


  }
}
