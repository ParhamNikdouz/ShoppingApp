<?php
/**
* Include mysqlConnectClass
 */
require_once 'mysqlConnectClass.php';
/**
* Include inputClass
 */
require_once 'inputClass.php';
/**
 * Post Class
 */
class postClass extends mysqlConnectClass
{
  private $postTitle;
  private $postAbstract;
  private $postMainText;
  private $postCategory;
  private $postDate;
  private $pageDescription;
  private $postKeyWords;
  private $postImageName;
  private $postViewers;
  private $postLikes;

  protected $sql;
  protected $stmt;
  protected $row;

  function __construct()
  {
    $this->postTitle=NULL;
    $this->postAbstract=NULL;
    $this->postMainText=NULL;
    $this->postCategory=NULL;
    $this->postDate=NULL;
    $this->pageDescription=NULL;
    $this->postKeyWords=NULL;
    $this->postImageName=NULL;
  }
  public function CreatePost()
  {
    $dbConnection=new mysqlConnectClass();
    if ($dbConnection->dbConnect()) {
      $inputVal=new inputClass();
      $this->postTitle=$inputVal->postTitle;
      $this->postCategory=$inputVal->postCategory;
      $this->postAbstract=$inputVal->postAbstract;
      $this->postMainText=$inputVal->postMainText;
      $this->postDate=$inputVal->postDate;
      $this->pageDescription=$inputVal->pageDescription;
      $this->postKeyWords=$inputVal->postKeyWords;
      $this->postImageName=$inputVal->postImageName;

      $this->sql='INSERT INTO `Posts` (`PostTitle`, `PostCategoryId`,
                 `PostAbstract`, `PostMainText`, `PostDate`, `PageDescription`,
                 `PostKeyWords`, `Status`)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
      $this->stmt=$connect->stmt_init();
      $this->stmt->prepare($this->sql);
      $this->stmt->bind_param('sisssssi', $this->postTitle, $this->postCategory,
                             $this->postAbstract, $this->postMainText,
                             $this->postDate, $this->pageDescription,
                             $this->PostKeyWords, 1);
      $this->stmt->execute();
      $this->sql=NULL;
    }
  }
  public function SetPostImage()
  {
    if (isset($_GET['id'])) {
      $dbConnection=new mysqlConnectClass();
      if ($dbConnection->dbConnect()) {
        $this->sql='INSERT INTO `PostImages` (`PostImageName`, `PostId`)
                   VALUES (?, ?)';
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('si', $this->postImageName, $_GET['id']);
        $this->stmt->execute();
        $this->sql=NULL;
      }
    }
  }
  public function CreateCategoryPost()
  {
    $dbConnection=new mysqlConnectClass();
    if ($dbConnection->dbConnect()) {
      $inputVal=new inputClass();
      $this->postCategoryTitle=$inputVal->postCategoryTitle;
      $this->sql='INSERT INTO `PostCategory` (`CategoryTitle`)
                 VALUES (?)';
      $this->stmt=$connect->stmt_init();
      $this->stmt->prepare($this->sql);
      $this->stmt->bind_param('s', $this->postCategoryTitle);
      $this->stmt->execute();
      $this->sql=NULL;
    }
  }
  public function ShowPost()
  {

  }
  public function ShowCategoryPost()
  {
    $dbConnection=new mysqlConnectClass();
    if ($dbConnection->dbConnect()) {
      $this->sql='SELECT `CategoryTitle` FROM `PostCategory`';
      $this->stmt=$connect->stmt_init();
      $this->stmt->prepare($this->sql);
      $this->stmt->execute();
      while ($this->row=$this->stmt->fetch()) {
        echo $this->row['CategoryTitle'];
      }
    }
  }
  public function EditPost()
  {
    if (isset($_GET['id'])) {
      $dbConnection=new mysqlConnectClass();
      if ($dbConnection->dbConnect()) {
        $this->sql="UPDATE `Posts` SET `PostTitle`=?, `PostCategoryId`=?,
                   `PostAbstract`=?, `PostMainText`=?, `PostDate`=?,
                   `PageDescription`=?, `PostKeyWords`=?,
                    WHERE `PostId`=$_GET['id']";
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('sisssss', $this->postTitle, $this->postCategory,
                               $this->postAbstract, $this->postMainText,
                               $this->postDate, $this->pageDescription,
                               $this->PostKeyWords);
        $this->stmt->execute();
        $this->sql=NULL;

        $this->sql="UPDATE `PostImages` SET `PostImageName`=?
                    WHERE `PostId`=$_GET['id']";
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('sisssss', $this->postTitle, $this->postCategory,
                               $this->postAbstract, $this->postMainText,
                               $this->postDate, $this->pageDescription,
                               $this->PostKeyWords);
        $this->stmt->execute();
        $this->sql=NULL;
      }
  }
  public function DeletePost()
  {
    if (isset($_GET['id'])) {
      $dbConnection=new mysqlConnectClass();
      if ($dbConnection->dbConnect()) {
        $this->sql="DELETE FROM `Posts` WHERE `PostId`=$_GET['id']";
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->execute();
      }
    }
  }
}
?>
