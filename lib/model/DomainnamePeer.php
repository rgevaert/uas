<?php

class DomainnamePeer extends BaseDomainnamePeer
{
        static public function getUserCount(Criteria $criteria = null)
         {
                return self::doCount($criteria);
         }

}   
