<?php
/**
* Filter Data
*/
class filterInputClass
{
  protected $data;

  function __construct()
  {
    $this->data=NULL;
  }
  public function SetData($data)
  {
    $this->data=$data;
  }
  public function GetData()
  {
      return $this->data;
  }
  public function SanitizeString($this->data)
  {
    $this->data=strip_tags($this->data);
    $this->data=trim($this->data);
    $this->data=htmlentities($this->data, ENT_COMPAT, 'UTF-8');
    $this->data=filter_var($this->data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $this->data=stripslashes($this->data);
    $this->data=htmlspecialchars($this->data);
    $this->data=str_replace("/", " ", $this->data);
    $this->data=str_replace("\\", " ", $this->data);
    $this->data=str_replace("^", " ", $this->data);
    $this->data=str_replace("~", " ", $this->data);
    $this->data=str_replace("etc", " ", $this->data);
    $this->data=str_replace("passwd", " ", $this->data);
    $this->data=real_scape_string($this->data);
    return $this->data;
  }
  public function EmptyCheck($input)
  {
    if (empty($input)) {
      return false;
    }
    else {
      return true;
    }
  }
  public function FilterInteger($this->data)
  {
    if (filter_var($this->data, FILTER_VALIDATE_INT)===0 ||
       !filter_var($this->data, FILTER_VALIDATE_INT)===false){
        return true;
    }
    else{
        return false;
    }
  }
  public function FilterIp($this->data)
  {
    if (!filter_var($this->data, FILTER_VALIDATE_IP)===false){
        return true;
    }
    else{
        return false;
    }
  }
  public function FilterEmail($this->data)
  {
    $this->data=filter_var($this->data, FILTER_SANITIZE_EMAIL); // remove characters are gheyremojaz;
    if (!filter_var($this->data, FILTER_VALIDATE_EMAIL)===false){
        return true;
    }
    else{
        return false;
    }
  }
  /* Sanitize And Validte URL */
  public function FilterURL($this->data)
  {
    $this->data=filter_var($this->data, FILTER_SANITIZE_URL);
    if (!filter_var($this->data, FILTER_VALIDATE_URL)===false){
        return true;
    }
    else{
        return false;
    }
  }
}
?>
