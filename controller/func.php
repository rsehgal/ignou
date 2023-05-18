<?php
require "../model/Symposia.php";
require "../view/Forms.php";


function Contact(){
$forms = new Forms();
  return $forms->Contact();
//return "Returned from Ajax Contat...";
}
function Login(){
$forms = new Forms();
  return $forms->Login();
}
function Signup(){
$forms = new Forms();
  return $forms->Signup();
}

function my_function() {
  // Your function logic here
  $data = array("Hello", "Ha ha aha d");
  return json_encode(array("data" => implode(" ", $data)));
}

function Upload(){
	//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//echo $_FILES['file']."<br/>";
	echo $_FILES['file']['error']."<br/>";
	return;
	if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
		        $targetDirectory = $_POST['loc']; // Specify the target directory where the file will be saved
			echo $targetDirectory."<br/>";
			echo basename($_FILES['file']['name'])."<br/>";
			$targetFilePath = $targetDirectory . basename($_FILES['file']['name']); // Get the file path
			echo $targetFilePath."<br/>";
			if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
				echo 'File uploaded successfully.';
			} else {
			        echo 'Error uploading the file.';
									        }
	} else {
		echo 'No file uploaded.';
		}
	//}
}

function Delete(){
	$username=$_POST['username'];
	$tableName = $_POST['tablename'];
	$function_name = $_POST['function_name'];	
	$query = 'delete from '.$tableName.' where uname="'.$username.'"';
	echo $query."<br/>";
	$obj = new DB();
	$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	$obj->Connect();
	$obj->GetQueryResult($query);
	return $obj->GetTableData($tableName);
}

function ShowTable(){
	$tableName = $_POST['tablename'];
	$obj = new DB();
	$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	$obj->Connect();
	return $obj->GetTableData($tableName,1,1);
}

function ServeSignup(){
		$obj = new DB();
		$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
		$obj->Connect();	
 		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query = "insert into user_credentials values('$username','$password','$firstname','$lastname','$email')";
		echo $query."<br/>";
		$obj->GetQueryResult($query);
		echo "$username : $password : $firstname : $lastname : $email";	
               return "<div>ServeSignup function called..........</div><br/>".$_POST['firstname'];
}

function ServeLogin(){
	$obj = new DB();
	$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	$obj->Connect();
	
	$uname=$_POST["username"];
	$passwd=$_POST["password"];

	
	$query = "select passwd from user_credentials where uname='".$uname."'";
	//return $query;
	$result = $obj->GetQueryResult($query);
	
	$row = $result->fetch_assoc();
	//return "Hello Raman";
	if($row["passwd"]==$passwd)
		return "<div> Fetched Password : ".$row["passwd"]."<br/>";
	else
		return "<div> Authenication failure... <br/>";
		
}

function Council_Officers(){
	//return "Council Officers...";
	return "<h3 class='display text-primary'>Council Officers</h3><br/><table class='table table-striped table-bordered'>".ShowCommittee("CounOff")."</table>";
}
function Council_Members(){
	//return "Council Officers...";
	return "<h3 class='display text-primary'>Council Members</h3><br/><table class='table table-striped table-bordered'>".ShowCommittee("CounMem")."</table>";
}
function Organizing_Committee(){
	//return "Council Officers...";
	return "<h3 class='display text-primary'>Organizing Committee</h3><br/><table class='table table-striped table-bordered'>".ShowCommittee("OrgMem")."</table>";
}

function ShowCommittee($comm){

	$obj = new DB();
	$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	$obj->Connect();
	$name = $comm."Name";
	$affil = $comm."Affil";
	$query = "select $name,$affil from committees";
	$result = $obj->GetQueryResult($query);
	$table="<tr class='bg-dark text-light'><th>Name</th><th>Affiliation</th></tr>";

	while ($row = $result->fetch_assoc()) {
		if($row[$name]==""){
		}else{
		 $table.= "<tr>";
		 $table.="<td>" . $row[$name] . "</td>";
		 $table.="<td>" . $row[$affil] . "</td>";
		 $table.="</tr>";
		}
	}
	return $table;
}
if (isset($_POST['function_name'])) {
  $function_name = $_POST['function_name'];
  if (function_exists($function_name)) {
    $response_data = call_user_func($function_name);
    echo $response_data;
  }
}

?>
