<?php

class SambaAccountPeer extends BaseSambaAccountPeer
{
	public function getActiveAccounts()
	{
		
		$criteria = new Criteria();
		// active users
		$criteria->addJoin(SambaAccountPeer::USER_ID, UserPeer::ID, Criteria::INNER_JOIN);
		$criteria->add(UserPeer::STATUS, 'activated');
		
		$active_accounts = self::doSelect($criteria);
		
		return $active_accounts;
	}
}
