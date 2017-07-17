<?php
/**
 * Cookie Class
 */
class cookieClass
{
  private $cookieName;
  private $cookieValue;
  private $cookieTime;

  function __construct()
  {
    $this->cookieName=NULL;
    $this->cookieValue=NULL;
    $this->cookieTime=NULL;
  }
  public function TestCookie()
  {
    setcookie("test_cookie", "test", time() + 3600 , '/');
    if (count($_COOKIE)>0) {
      return true;
    }
    else {
      return false;
    }
  }
  public function SetCookie($this->cookieName, $this->cookieValue, $this->cookieTime)
  {
    $cookie_Name=$this->cookieName;
    $cookie_Value=$this->cookieValue;
    $cookie_Time=$this->cookieTime;
    setcookie($cookie_Name, $cookie_Value, time() + $cookie_Time, '/');
  }
  public function DeleteCookie($inputName)
  {
    setcookie($inputName, "", time() - 3600);
  }
}
?>
