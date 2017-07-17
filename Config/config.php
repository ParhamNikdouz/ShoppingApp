<?php
/**
 * Config Class For This Website
 */
class config
{
  public $title;
  public $url;
  protected $serverName;
  protected $userName;
  protected $passWord;
  protected $dbName;

  function __construct()
  {

  }
  public function Config()
  {
    $this->title = 'گروه صنعتی';
    $this->url = 'http://localhost/phptest';
  }
  public function DbConfig()
  {
    $this->serverName = 'localhost';
    $this->userName = 'root';
    $this->passWord = '13461353';
    $this->dbName = 'phpTest';
  }
}
?>
