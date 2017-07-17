<?php
/**
* Include mysqlConnectClass
 */
require_once 'mysqlConnectClass.php';

/**
 * Session Class
 */
class sessionClass extends mysqlConnectClass
{
  private $sql;
  private $stmt;
  private $row;
  private $email_Check;
  private $password_Check;
  private $email_Session;
  private $password_Session;

  function __construct()
  {
    $this->sql=NULL;
    $this->stmt=NULL;
    $this->row=NULL;
    $this->email_Check=NULL;
    $this->password_Check=NULL;
    $this->email_Session=NULL;
    $this->password_Session=NULL;
  }
  public function SessionLogin()
  {
    $dbConnection=new mysqlConnectClass();
    if ($dbConnection->dbConnect()) {
      ob_start();
      session_start();
      $this->email_Check=$_SESSION['__ue'];
      $this->password_Check=$_SESSION['__up'];

      $this->sql="SELECT * FROM `Users` WHERE `Email`=? AND `Password`=?";
      $this->stmt=$connect->stmt_init();
      $this->stmt->prepare($this->sql);
      $this->stmt->bind_param('ss', $this->email_Check, $this->password_Check);
      $this->stmt->bind_result($Email, $Password);
      while($this->row=$this->stmt->fetch()){
        if ($this->row==0) {
          header("location: login.php");
          return false;
        }
        else {
          $this->email_Session = $row['__ue'];
          $this->password_Session = $row['__up'];
          return true;
        }
      }
      ob_end_flush();
    }
  }
  public function SessionDestroy()
  {
    session_destroy();
  }
  public function SessionUnset()
  {
    session_unset();
  }
}
?>
