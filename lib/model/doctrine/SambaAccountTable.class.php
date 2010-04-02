<?php

class SambaAccountTable extends Doctrine_Table
{
	public function getHostnames($value='')
	{
		$hosts = Doctrine::getTable('SambaAccount')->createQuery()
			->distinct($flag = true)
			->select('hostname')
			->fetchArray();

		print_r($hosts);
		return $hosts;
	}

	public function getActiveAccounts($hostname)
	{
		return Doctrine::getTable('SambaAccount')->createQuery()
			->leftJoin('User u')
			->andWhere('status = ?', 'activated')
			->andWhere('hostname = ?', $hostname)
			->execute();
	}
}
