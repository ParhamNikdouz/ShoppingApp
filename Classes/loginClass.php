<?php
/**
* Include cookieClass
 */
require_once 'cookieClass.php';
/**
* Include mysqlConnectClass
 */
require_once 'mysqlConnectClass.php';
/**
* Include inputClass
 */
require_once 'inputClass.php';
/**
 * Login Class
 */
class loginClass extends inputClass
{
  private $sql;
  private $stmt;
  private $row;

  protected $email;
  protected $passWord;

  function __construct()
  {
    $inputVal=new inputClass();
    $this->email=NULL;
    $this->passWord=NULL;
  }
  public function Login()
  {
    $dbConnection=new mysqlConnectClass();
    if ($dbConnection->dbConnect()) {
      $inputVal=new inputClass();
      $this->email=$inputVal->email;
      $this->passWord=md5(sha1($inputVal->passWord));

      $this->sql="SELECT * FROM `Users` WHERE `Email`=? AND `Password`=?";
      $this->stmt=$connect->stmt_init();
      $this->stmt->prepare($this->sql);
      $this->stmt->bind_param('ss', $this->email, $this->passWord);
      $this->stmt->bind_result($Email, $Password);
      while ($this->row=$this->stmt->fetch()) {
        if ($this->row==0) {
          echo 'Your Email Or Password Is Incorrect!';
          return false;
        }
        else {
          ob_start();
          session_start();
          $_SESSION['__ue']=$this->email;
          $_SESSION['__up']=$this->passWord;

          header("location: index.php");
          ob_end_flush();
          return true;
        }
      }
    }
  }
  public function RememberMe()
  {
    $cookie=new cookieClass();
    if ($cookie->TestCookie()) {
      $cookie->SetCookie('_ue', $this->email, 86400*3);
      $cookie->SetCookie('_up', $this->passWord, 86400*3);
    }
  }
}
?>
