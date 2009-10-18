<?php

class FtpAccount extends BaseFtpAccount
{
        public function getUserFullname()
        {
                $userid = $this->getUserId();
                // Serves as an intermediary between the users and tbe databbase
                $user = UserPeer::retrieveByPk($userid);
                return $user->__toString();
        }
        public function saveUpBandwidth()
        {
                $up = $this->getUpBandwidth()."s";
                $this->setUpBandwidth($up);
                $this->save();
        }
}
