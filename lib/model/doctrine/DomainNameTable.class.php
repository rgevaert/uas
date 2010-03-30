<?php

class DomainNameTable extends Doctrine_Table
{
	static public function getDefaultDomainname()
	{
		return Doctrine::getTable('DomainName')->findOneByName(sfConfig::get('app_default_domain_name'));
	}
}
