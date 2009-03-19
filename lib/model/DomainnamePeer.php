<?php

class DomainnamePeer extends BaseDomainnamePeer
{
	static function getDefaultDomainname()
	{
		$criteria = new Criteria();
		$criteria->add(self::NAME, sfConfig::get('app_default_domain_name'));
		return self::doSelectOne($criteria);
	}
}   
