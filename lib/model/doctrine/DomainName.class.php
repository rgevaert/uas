<?php

/**
 * DomainName
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class DomainName extends BaseDomainName
{
	public function getUserCount()
	{
		return count($this->getUsers());
	}
}
