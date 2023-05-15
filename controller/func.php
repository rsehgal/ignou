<?php
require "../model/Symposia.php";
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
               return "<div>ServeLogin function called..........</div><br/>".$_POST['username'];
}

if (isset($_POST['function_name'])) {
  $function_name = $_POST['function_name'];
  if (function_exists($function_name)) {
    $response_data = call_user_func($function_name);
    echo $response_data;
  }
}

?>
