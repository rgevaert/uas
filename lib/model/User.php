<?php

class User extends BaseUser
{
        public function __toString()
        {
              return $this->getName(). ' '. $this->getFathersName(). ' ('. $this->getEmailLocalPart().')';
                
        }
}
