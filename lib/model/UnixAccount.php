<?php

class UnixAccount extends BaseUnixAccount
{
	public function getUserLogin()
	{
		return $this->getUser()->getLogin();
	}
}
