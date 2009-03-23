<?php

class myUser extends sfBasicSecurityUser
{
    public function addUserToHistory(User $user)
    {
        $ids = $this->getAttribute('user_history', array());
        if (!in_array($user->getId(), $ids))
        {
            array_unshift($ids, $user->getId());
           
            $this->setAttribute('user_history', array_slice($ids, 0, 5));
        }  
    }
    
    public function getUserHistory()
    {
        $ids = $this->getAttribute('user_history', array());
        return UserPeer::retrieveByPKs($ids);
    }
    public function resetUserHistory()
    {
        $this->getAttributeHolder()->remove('user_history');
    }
    
    public function isFirstRequest($boolean = null)
    {
        if (is_null($boolean))
        {
            return $this->getAttribute('first_request', true);
        }
        else
        {
            $this->setAttribute('first_request', $boolean);
        }
}
}
