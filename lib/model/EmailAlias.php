<?php

class EmailAlias extends BaseEmailAlias
{
    public function __toString()
    {
        return $this->getLocalPart() . '@' . $this->getDomainName();
    }
    
    public function getEmailAlias()
    {
        //return $this->__toString()."   &Rarr;";
        return $this->__toString()."   --->";
    }
}
