<?php

class UserPeer extends BaseUserPeer
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
		$connection = Propel::getConnection();
		$query = "SELECT MAX(" . UserPeer::UID . ") AS max FROM " . UserPeer::TABLE_NAME;
		$result = $connection->query($query);
		$row = $result->fetch();
		return $row['max'];
	}

	static public function check_if_login_exists($login = "")
	{
		$criteria = new Criteria();
		$criteria->add(self::LOGIN, $login);
		$count = self::doCount($criteria);
		if($count == 0){
			return true;
		} else {
			return false;
		}
	}

    static public function check_if_local_part_exists($local_part = "")
    {
      	$criteria = new Criteria();
    	$criteria->add(self::EMAIL_LOCAL_PART, $local_part);
    	$count = self::doCount($criteria);
    	if($count == 0){
            return true;
        } else {
            return false;
        }
    }

	static public function getUserFromLogin($login)
	{
	     $c = new Criteria();
          $c->add(self::LOGIN, $login);
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
