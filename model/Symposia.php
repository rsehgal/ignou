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

function AddMenuEntry($entry){
	return '<li class="nav-item">
          <a class="nav-link" href="?function='.$entry.'"><h4>'.$entry.'</h4></a>
        </li>';

}

function Menu(){
	$obj = new DB();
	$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
        $obj->Connect();
	

	$title='';
              /*'
		      <h2 class="display-4 bg-warning">
			<p class="text-center">Test symposium on HPC</p>
		     </h2>
   		<br/>';*/


	$sympTitle = $obj->GetParameter(1,"title");
	$sympVenue = $obj->GetParameter(1,"venue");
	$sympDateFrom = $obj->GetParameter(1,"datefrom");
	$sympDateTo = $obj->GetParameter(1,"dateto");
	$parsed_date_from = date_parse($sympDateFrom);
	$parsed_date_to = date_parse($sympDateTo);

	$result = $title.'<br/>
<nav class="navbar navbar-expand-lg navbar-light bg-warning justify-content-center">
    <a class="navbar-brand bg-warning" href="#" >
      <div class="text-center">
      <h4 class="display-4 font-weight-bolder">'.
      $sympTitle.'
	<h1>
	<p  class="small text-center"><br/>'.$sympVenue.'<br/>'.$parsed_date_from["day"].' '.(new DateTime($sympDateFrom))->format("F").'-'.$parsed_date_to["day"]." ".(new DateTime($sympDateTo))->format("F").", ".$parsed_date_to["year"].'</p>
	</h1>
	</h4>
	</div>
   </a>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">'.
        $this->AddMenuEntry("Home").
	$this->AddMenuEntry("About");

	if(isset($_SESSION["logged"]))
		$result.=$this->AddMenuEntry("Services");
	$result.=
	$this->AddMenuEntry("Signup").
	$this->AddMenuEntry("Login").
	$this->AddMenuEntry("Contact").'
      </ul>
    </div>
  </nav>
';

return $result;
}

}

class DB{
private $sname;
private $uname;
private $passwd;
private $dbname;
private $tablename;
private $conn;

function __construct() {
  //echo "Constructor called...........<br/>";
  $this->sname='localhost';
  $this->uname='sympadmin';
  $this->passwd='sympadmin';
  $this->dbname='symposia';    
}

public function Set($servName,$userName,$passWord,$databaseName){
	//echo "Reached Set";
	$this->sname=$servName;
	$this->uname=$userName;
	$this->passwd=$passWord;
	$this->dbname=$databaseName;
	//echo "Exiting SEt function...<br/>"; 
}

public function Connect(){
	//echo "$this->sname : $this->uname : $this->passwd : $this->dbname <br/>";
	$this->conn = new mysqli($this->sname, $this->uname, $this->passwd, $this->dbname);
	// Check for connection errors
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//echo "Connection Established...<br/>";
}

public function GetFieldNames($tableName){
	//echo "GetFieldName called.... <br/>";
	$query = "SELECT * FROM $tableName LIMIT 1";
	$result = $this->GetQueryResult($query);// $this->conn->query($query);
	if ($result->num_rows > 0) {
	    $fieldNames = [];
	        $row = $result->fetch_assoc();
	    foreach ($row as $fieldName => $value) {
		    //echo $fieldName;
			        $fieldNames[] = $fieldName;
	    }
	return $fieldNames;
	}
}

public function GetParameter($volume,$fieldName){
	$query = "select $fieldName from symposium where volume=".$volume;
	//return $query;
	$result = $this->GetQueryResult($query);
	$row = $result->fetch_assoc();
	return $row[$fieldName];
}

public function GetQueryResult($query){

$result = $this->conn->query($query);
return $result;
}

public function MakeTableRow($row){
	$tabrow="<tr>";
	$fieldNames = GetFieldNames($tablename);
	for($i=0;$i<sizeof($fieldNames);$i++){
	$rowData = "<td>Hello</td>";
	$tabrow.=$rowData;
	}
	echo $tabrow;
	return $tabrow."</tr>";
}

public function GetTableData($tableName,$showUname=0,$allowDeletion=0){
	$table="<table border='1' class='table table-striped'>";
	$columnNames = $this->GetFieldNames($tableName);
	$query = "SELECT * FROM $tableName";
	$result = $this->conn->query($query);
	//echo
	$table.="<tr class='table-warning'>";
	        foreach ($columnNames as $columnName) {
	//echo
		if($columnName=='uname'){
		if($showUname==1){
		$table.="<th >" . $columnName . "</th>";
		}
		}else{
		$table.="<th >" . $columnName . "</th>";
		}
		}
		if($allowDeletion==1)
		$table.="<td>Update</td>";
	//echo
	       $table.="</tr>";
	while ($row = $result->fetch_assoc()) {
		//echo 
		$table.= "<tr>";
		foreach ($columnNames as $columnName) {
			//echo

			 if($columnName=='uname'){
			if($showUname==1)
				$table.="<td>" . $row[$columnName] . "</td>";
			}else{
				$table.="<td>" . $row[$columnName] . "</td>";
			}
		}
		if($allowDeletion==1)
		$table.="<td><input type='button' class='deleteEntry' oftable='".$tableName."' id='".$row['uname']."' value='Delete'></input></td>";
		//echo 
		$table.="</tr>";
	}
			//echo
	/*if($showUname==1)
	$table.="</table><br/>"."ShowUname set <br/>";
	else
	$table.="</table><br/>"."ShowUname NOT set <br/>";*/
	return $table;
}
/*
public function GetTableData($tablename){
	echo "tableData..... <br/>";
	$fieldNames = GetFieldNames($tablename);
	$query = "select * from $tablename";
	$result = $this->conn->query($query);//GetQueryResult($query);
	echo "Num of rows : ".$result->num_rows."<br/>";
	
	$table = "<table border='2'>";
	$tabrow="";
	$numofrows=$result->num_rows;
	echo "Num of rows : ".$numofrows."<br/>";
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			//echo "Hello";
			//$tabrow.= MakeTableRow($row);
			echo "Size : ".sizeof($fieldNames);
		}
	}
	return $table.$tabrow."</table>";
	
}
*/
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
