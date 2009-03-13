<?php

class Domainname extends BaseDomainname
{
        public function getUserCount()
        {
          $criteria = new Criteria();
          $criteria->add(DomainnamePeer::ID, $this->getId());
          return DomainnamePeer::getUserCount($criteria);
        }


        public function __toString()
        {
                return $this->getName();
        }
}
