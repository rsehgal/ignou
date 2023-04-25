<?php
class Symposia {
  public $variable1;
  private $variable2;

    function __construct($var1, $var2) {
    $this->variable1 = $var1;
    $this->variable2 = $var2;
  }

  public function getVariable1() {
    return $this->variable1;
  }

  private function getVariable2() {
    return $this->variable2;
  }
}

class DB{
private $sname;
private $uname;
private $passwd;
private $dbname;
private $tablename;

function __construct() {
  echo "Constructor called...........<br/>";
  $this->sname='localhost';
  $this->uname='sympadmin';
  $this->passwd='sympadmin';
  $this->dbname='symposia';    
}

public function Connect(){
$conn = new mysqli($this->sname, $this->uname, $this->passwd, $this->dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection Established...<br/>";

}
/*
public function Connect($servername,$username,$password,$databasename){
$this->sname = $servername;
$this->uname = $username;
$this->passwd = $password;
$this->dbname = $databasename;
$conn = new mysqli($sname, $uname, $passwd, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection Established...";
}
 */
}
?>
