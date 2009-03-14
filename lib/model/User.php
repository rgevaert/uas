<?php

class User extends BaseUser
{

     public function __construct()
	{
		parent::__construct();                
                $this->setExpiresAt(time() + 360*86400);
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
           $this->addNtPassword();
        }
       parent::save(); 

	}
	public function addNtPassword()
    {
    $password = substr(md5(rand()), 0, 6);
    $this->setNtPassword($password);
    return $password;
    }
	
}
