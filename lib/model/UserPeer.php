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

}
