<?php

class UserTable extends Doctrine_Table
{
    static public $status_types = array (
        'activated' => 'Activated',
        'disactivated' => 'Disactivated',
        'preregistered' => 'Preregistered',
        );
    static public $gid_types = array (
        '2000' => 'User',
        '2001' => 'System',
        '2002' => 'Other',
        );

    static public function getMaxUid()
	{
		$result = Doctrine::getTable('User')->createQuery('c')->select('MAX(c.uid) AS uid')->fetchArray();
		return $result[0]['uid'];
	}

	static public function check_if_login_exists($login = "")
	{
		return Doctrine::getTable('User')->createQuery('q')->where('login = ?', $login)->count() == 0;
	}

    static public function check_if_local_part_exists($local_part = "")
    {
		$data = Doctrine::getTable('User')->findOneByEmailLocalPart($local_part);
    	return !$data;
    }

	static public function getUserFromLogin($login)
	{
		return Doctrine::getTable('User')->findOneByLogin($login);
	}
	
	static public function getUserFromEmailLocalPart($email_local_part)
	{
	     $c = new Criteria();
          $c->add(self::EMAIL_LOCAL_PART, $email_local_part);
          return self::doSelectOne($c);	   
	}	
	
	public function getEmailAccounts()
	{
	     $criteria = new Criteria();
         	$criteria->add(self::STATUS, 'activated');
         	$criteria->addOr(self::STATUS, 'disactivated');
      
         	return self::doSelect($criteria);
         	
	}
}
