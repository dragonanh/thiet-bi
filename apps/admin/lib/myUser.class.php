<?php

class myUser extends sfGuardSecurityUser
{
  public function setIpAddress($ip) {
    $this->setAttribute('IpAddress', $ip);
  }

  public function getIpAddress() {
    return $this->getAttribute('IpAddress', null);
  }

  public function setUserAgent($userAgent) {
    $this->setAttribute('UserAgent', $userAgent);
  }

  public function getUserAgent() {
    return $this->getAttribute('UserAgent', null);
  }

  public function checkPermission($permissions){
    if($this->getGuardUser()->getIsSuperAdmin()){
      return true;
    }else{
      if(is_array($permissions)){
        foreach ($permissions as $permission){
          if($this->hasPermission($permission)){
            return true;
          }
        }
      }else{
        if($this->hasPermission($permissions))
          return true;
      }
    }
    return false;
  }
}
