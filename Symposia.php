<?php
class Symposium {
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

class Symposia{

function __construct(){

}

function Menu(){
	return '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Test symposium on HPC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
	</li>
	<li class="nav-item">
          <a class="nav-link" href="?function=Signup">Signup</a>
	</li>
	<li class="nav-item">
          <a class="nav-link" href="?function=Login">Login</a>
	</li>


       
      </ul>
    </div>
  </nav>
';
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
