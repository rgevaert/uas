<?php

class SambaAccountTable extends Doctrine_Table
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
		return $this->createQuery()
			->leftJoin('User u')
			->andWhere('status = ?', 'activated')
			->andWhere('hostname = ?', $hostname)
			->execute();
	}
}
