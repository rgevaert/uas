<?php

class Domainname extends BaseDomainname
{
        public function __toString()
        {
                return $this->getName();
        }
}
