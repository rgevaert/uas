<?php

class User extends BaseUser
{
     public $password;

     public function __construct()
	{
		parent::__construct();                
                $this->setExpiresAt(time() + 365*86400);
	}

    public function __toString()
    {
        return $this->getName(). ' '. $this->getFathersName(). ' ('. $this->getEmailAddress() . ')';
    }

    public function getFullName()
    {
        return $this->getName() . " " . $this->getFathersName() . " " . $this->getGrandFathersName();
    }
    
    public function getEmailAddress()
    {
        return $this->getEmailLocalPart(). '@' . $this->getDomainName();
    }    
    
    public function ToggleStatus()
    {
        if($this->getStatus()=='activated')
        {
            $this->setStatus('disactivated');
        }
        elseif($this->getStatus()=='preregistered')
        {
            $this->setStatus('activated');
        }
        else
        {
            $this->setStatus('activated');
        }
        $this->save();
    }

    public function displayExtendExpiresAt()
    {
        $extend = time() + 360*86400;
        $this->setExpiresAt($extend);        
        echo $extend;
        //return true;
    }

    
    
    public function save(PropelPDO $con = null)
	{
       if(!$this->getId())
        {       
           $this->setUid(UserPeer::getMaxUid() + 1);
           $password = new Password();
           $this->setNtPassword($password->getNtHash());
           $this->setUnixPassword($password->getNtHash());
           $this->setCryptPassword($password->getCryptHash());
           $this->setLmPassword($password->getLmHash());

        }
		if(!$this->getDomainnameId()){
			// get the default domainname
			$domainname = DomainnamePeer::getDefaultDomainname();
			$this->setDomainnameId($domainname->getId());
		}

		if(!$this->getLogin()) $this->generateLogin();
		
       parent::save(); 

	}

	protected function get_all_possible_logins($suffix = "")
	{		
		$a = array(
			$this->getName() . $suffix,
			$this->getName() . $this->getFathersname() . $suffix			
			);
			
		return $a;
	}

	public function generateLogin()
	{
		$logins_to_try = $this->get_all_possible_logins();
		$counter = 0;

		$login_to_try = array_shift($logins_to_try);		
		while(!UserPeer::check_if_login_exists($login_to_try)){
			if(count($logins_to_try) == 0){
				$counter++;
				$logins_to_try = $this->get_all_possible_logins($counter);
			}

			$login_to_try = array_shift($logins_to_try);

			// todo: make this better, maybe through a user->flash
			if($counter == 5){
				die('Too many attempts to find a login');
			}
		}

		$this->setLogin($login_to_try);
		return $login_to_try;
	}	
}
