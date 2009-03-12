<?php

class User extends BaseUser
{

    public function __toString()
    {
        return $this->getName(). ' '. $this->getFathersName(). ' ('. $this->getEmailLocalPart().')';
                
    }

    public function getFullName()
    {
        return $this->getName() . " " . $this->getFathersName() . " " . $this->getGrandFathersName();
    }
    
    
    /*
    public function executeBatchToggle_status()
    {
        return true ;
    }
*/
}
