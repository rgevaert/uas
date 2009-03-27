<?php

class SambaAccount extends BaseSambaAccount
{
	public function getSmbpasswdLine()
	{
		return $this->getUser()->getLogin() . ":" .
			$this->getUser()->getUid() . ":" .
			$this->getUser()->getLmPassword() . ":" .
			$this->getUser()->getNtPassword() . ":" .
			"[U          ]:" .
			"LCT-" . dechex(strtotime($this->getUser()->getUpdatedAt()));
	}
}
