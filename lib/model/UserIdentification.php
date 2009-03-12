<?php

class UserIdentification extends BaseUserIdentification
{
        public function getUserFullname()
        {
                $userid = $this->getUserId();
                // Serves as an intermediary between the users and tbe databbase
                $user = UserPeer::retrieveByPk($userid);
                return $user->__toString();
        }
}
