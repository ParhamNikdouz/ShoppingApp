<?php
/**
* Include config Class
 */
require_once '~/config/config.php';
/**
 * Mysqli Connect Class
 */
class mysqlConnectClass extends config
{
  public $connectionString;
  public $dataSet;
  private $sqlQuery;

  protected $dbName;
  protected $serverName;
  protected $userName;
  protected $passWord;

  function __construct()
  {
    $this->connectionString=NULL;
    $this->dataSet=NULL;
    $this->sqlQuery=NULL;

    $dbPara=new config();
    $this->dbName=$dbPara->dbName;
    $this->serverName=$dbPara->serverName;
    $this->userName=$dbPara->userName;
    $this->passWord=$dbPara->passWord;
    $dbPara=NULL;
  }
  public function dbConnect()
  {
    $this->connectionString=new mysqli($this->serverName, $this->userName, $this->passWord, $this->dbName);
    return $this->connectionString;
  }
  public function dbDisconnect()
  {
    $this->connectionString=NULL;
    $this->dataSet=NULL;
    $this->sqlQuery=NULL;

    $this->dbName=NULL;
    $this->serverName=NULL;
    $this->userName=NULL;
    $this->passWord=NULL;

    $this->connectionString->close();
  }
  public function SelectAll($tableName)
  {
    $this->sqlQuery='SELECT * FROM'.$this->dbName.'.'.$tableName;
    $this->connectionString->query('set names utf8');
    $this->dataSet=$this->connectionString->query($this->sqlQuery);
    return $this->dataSet;
  }
  public function SelectWhere($tableName, $rowName, $operator, $value, $valueType)
  {
    $this->sqlQuery='SELECT * FROM'.$this->dbName.'.'.$tableName.'WHERE'.$rowName.' '.$operator.' ';
    if ($valueType=='int') {
      $this->sqlQuery.=$value;
    }
    else if($valueType=='char') {
      $this->sqlQuery.="'".$value."'";
    }
    $this->connectionString->query('set names utf8');
    $this->dataSet=$this->connectionString->query($this->sqlQuery);
    $this->sqlQuery=NULL;
    return $this->dataSet;
  }
  public function InsertInto($tableName, $values)
  {
    $i=0;
    $this->sqlQuery='SELECT * FROM'.$this->dbName.'.'.$tableName.'VALUES (';
    while ($values[$i]["val"]!=NULL && $values[$i]["type"]!=NULL) {
      if ($values[$i]["type"]=='char') {
        $this->sqlQuery.="'";
        $this->sqlQuery.=$values[$i]["val"];
        $this->sqlQuery.="'";
      }
      else if($values[$i]["type"]=='int') {
          $this->sqlQuery.=$values[$i]["val"];
      }
      $i++;
      if ($values[$i]["val"]!=NULL) {
        $this->sqlQuery.=',';
      }
    }
    $this->sqlQuery.=')';

    $this->connectionString->query('set names utf8');
    $this->dataSet=$this->connectionString->query($this->sqlQuery);
    return $this->sqlQuery;
    $this->sqlQuery=NULL;
  }
  public function SelectFreeRun($query)
  {
    $this->connectionString->query('set names utf8');
    $this->dataSet=$this->connectionString->query($query);
    return $this->dataSet;
  }
  public function FreeRun($query)
  {
    return $this->connectionString->query($query);
  }
}
?>
