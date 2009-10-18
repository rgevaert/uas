<?php

class Domainname extends BaseDomainname
{
	public function getUserCount()
	{
		// select count(*) from user where domainname_id = $this->getId()
		$criteria = new Criteria();
		$criteria->add(UserPeer::DOMAINNAME_ID, $this->getId());

		// do the counting on the user model
		return UserPeer::doCount($criteria);
	}

	public function __toString()
	{
		return $this->getName();
	}

}
