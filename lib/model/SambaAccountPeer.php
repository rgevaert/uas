<?php

class SambaAccountPeer extends BaseSambaAccountPeer
{
	public function getHostnames($value='')
	{
		$criteria = new Criteria();
	 	$criteria->clearSelectColumns();
	    $criteria->addSelectColumn(self::HOSTNAME);
		$criteria->setDistinct();

		$stmt = self::doSelectStmt($criteria);
		while($host = $stmt->fetchColumn(0))
		{
		      $results[] = $host;
		}
		
		return $results;
	}

	public function getActiveAccounts($hostname)
	{
		
		$criteria = new Criteria();
		// active users
		$criteria->addJoin(self::USER_ID, UserPeer::ID, Criteria::INNER_JOIN);
		$criteria->add(UserPeer::STATUS, 'activated');
		$criteria->add(self::HOSTNAME, $hostname);
		
		$active_accounts = self::doSelect($criteria);
		
		return $active_accounts;
	}
}
