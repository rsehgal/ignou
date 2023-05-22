<?php
require "../model/Symposia.php";
require "../view/Forms.php";
require_once "helpers.php";

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
	session_start();
	//return "FileUplaoded...";
	//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//echo $_FILES['file']."<br/>";
	//echo $_FILES['file']['error']."<br/>";
	//return;
	if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
		        $targetDirectory = $_POST['loc']; // Specify the target directory where the file will be saved
			$categoryId = $_POST['categoryid'];
			$topicId = $_POST['topicid'];
			$authorNamesList=$_POST['authornameslist'];
			$authorEmailsList=$_POST['authoremailslist'];
			//echo $targetDirectory."<br/>";
			//echo basename($_FILES['file']['name'])."<br/>";

			//select count(*) as count from contributions where Filename like '%paper_3_1%'			
				$obj = new DB();
		                //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
                		//$obj->Connect();

			$query='select count(*) as count from contributions where Filename like "%paper_'.$topicId.'_'.$categoryId.'%"';
				$result=$obj->GetQueryResult($query);
				$row = $result->fetch_assoc();
				$count=$row["count"];
				$count++;
			$renamedFileName=$_SESSION["username"].'_paper_'.$topicId.'_'.$categoryId.'_'.$count.'.pdf';
			//$targetFilePath = $targetDirectory . basename($_FILES['file']['name']); // Get the file path
			$targetFilePath = $targetDirectory.$renamedFileName; // Get the file path
			//echo "Taget file path :".$targetFilePath."<br/>";
			if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
				//echo 'File uploaded successfully.<br/>';
				$query='insert into contributions values("'.$_SESSION["username"].'","'.$topicId.'","'.$categoryId.'","'.$_POST["title"].'","'.$renamedFileName.'","submitted","'.$authorNamesList.'","'.$authorEmailsList.'")';
				//echo $query."<br/>";
								$obj->GetQueryResult($query);
				return Message("File uploaded successfully with name : $renamedFileName","alert-success");
			} else {
			        echo Message('Error uploading the file.','alert-danger');
									        }
	} else {
		echo Message('No file uploaded.','alert-danger');
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
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
	$obj->GetQueryResult($query);
	return $obj->GetTableData($tableName);
}

function ShowTable(){
	$tableName = $_POST['tablename'];
	$obj = new DB();
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
	return $obj->GetTableData($tableName,1,1);
}

function ServeSignup(){
		$obj = new DB();
		//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
		//$obj->Connect();	
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
	session_start();
	$obj = new DB();
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
	
	$uname=$_POST["username"];
	$passwd=$_POST["password"];

	
	$query = "select passwd from user_credentials where uname='".$uname."'";
	//return $query;
	$result = $obj->GetQueryResult($query);
	
	$row = $result->fetch_assoc();
	//return "Hello Raman";
	if($row["passwd"]==$passwd){
		$_SESSION["loggedin"]=TRUE;
		$_SESSION["username"]=$uname;
		return "<div><h3 class='alert alert-success' role='alert'> Welcome User : ".$uname."</h3><br/>";
		//return "<div><h3 class='text-success'> Welcome User : ".$uname."</h3><br/>";
	}
	else
		return "<div><h3 class='alert alert-danger text-center' role='alert'> Authenication failure : Please check your credentials.</h3> <br/>";
		
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
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
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

function Upload_Contribution(){
	return Message("Will be available soon.","alert-warning");
	session_start();
	$returnVal="";
	if(isset($_SESSION["loggedin"])){
		//return "Hello <br/>";
		//return "<h3 class='alert alert-success' role='alert'>Welcome user : ".$_SESSION["username"]."</h3><br/>";
		return NewSubmission();
		//return "Dear $_SESSION["username"], Please upload your Contribution <br/>";
	}
	else{
		return Message("Please login before uploading.");
		//return "<h3 class='alert alert-danger text-center' role='alert'>Please login before uploading.</h3><br/>";
	}
}

function Message($message,$colorClass="alert-danger"){
return "<h3 class='alert ".$colorClass." text-center' role='alert'>".$message."</h3><br/>";

}
function NewSubmission(){
	$obj = new DB();
        //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
        //$obj->Connect();
	$fieldNames = $obj->GetFieldNames("contributions");
	//return count($fieldNames);

	$forms = new Forms();
	return $forms->NewSubmission($fieldNames);
}

function FillCategory(){
$tablename = $_POST["topic"];
return GetDropDown($tablename,"category").'
<script>
$(".category").on("click",function(event){
                        //alert("Category Clicked...");
			$("#categoryText").val($(this).attr("id"));
			dataUp.append("categoryid",$(this).attr("catid"));
                });
</script>
';
}
/*
function View_Contribution(){
return "Returned from View_Contribution...";
}
 */

function GetSubmitterName(){
	session_start();
	$obj = new DB();
	$query='select firstname,lastname from user_credentials where uname="'.$_SESSION["username"].'"';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	return $row["firstname"]." ".$row["lastname"];
}
function GetUploadFolderName($volume){
	session_start();
	$obj = new DB();
	$query='select UploadLocation from symposium where volume='.$volume;
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	return $row["UploadLocation"];
}

function Resubmit_Contribution(){
	return Message("Will be available soon.","alert-warning");
}
function View_Contribution(){
	return Message("Will be available soon.","alert-warning");
	session_start();
	if(isset($_SESSION["loggedin"])){
	$submitterName = GetSubmitterName();
	$query = 'select * from contributions where uname="'.$_SESSION["username"].'"';
 	//return $query;	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	//return $query;
	
	$retValue="";
	$retTable='<table class="table table-striped table-bordered">';
	$retTable.='<tr><td>uname</th>
			<th>Name</th>
			<th>Title</th>
			<th>Topic</th>
			<th>Category</th>
			<th>Author names</th>
			<th>Author Emails</th>
			<th>Uploaded File</th>
			</tr>';
	while($row = $result->fetch_assoc()){
		$retTable.='<tr>';
		//$retValue.=$row["Topic"]." : ".$row["Category"]."<br/>";
		//$retValue.="Hello <br/>";
		$paperTitle=$row["Title"];
		$authorNamesList=$row["AuthorNamesList"];
		$authorEmailsList=$row["AuthorEmailsList"];
		$fileName=$row["Filename"];
		$queryTopic=$row["Topic"];
		$queryCategory=$row["Category"];
		//$retValue.=GetTopic($queryTopic)." : ";
		//$retValue.=GetCategory($queryTopic,$queryCategory);
		$selectedTopic=GetTopic($queryTopic);
		$retValue.=$selectedTopic." : ";
		$selectedCategory=GetCategory($selectedTopic,$queryCategory);
		$retValue.=$selectedCategory;
		$retValue.="<br/>";
		$retTable.='<td>'.$_SESSION["username"].'</td>';
		$retTable.='<td>'.$submitterName.'</td>';
		$retTable.='<td>'.$paperTitle.'</td>';
		$retTable.='<td>'.$selectedTopic.'</td>';
		$retTable.='<td>'.$selectedCategory.'</td>';
		$retTable.='<td>'.$authorNamesList.'</td>';
		$retTable.='<td>'.$authorEmailsList.'</td>';
		$retTable.='<td><a href="../'.$_SESSION["uploadlocation"].'/'.$fileName.'">'.$fileName.'</a></td>';
		$retTable.='</tr>';
	}
	//return $retValue;
	return $retTable;
}else{

		return Message("Please login to view your submissions.");
}
	
}

function GetTopic($topic){
	$query='select topic from topics where code="'.$topic.'"';
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	$row = $result->fetch_assoc();
	return $row["topic"];
}

function GetCategory($topic,$category){
	$query='select category from '.$topic.' where code="'.$category.'"';
	//return $query;
	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	$row = $result->fetch_assoc();
	return $row["category"];
	

}

function Poster(){
    /*var iframe = $('<iframe>');
    iframe.attr('src','../docs/poster.pdf');
    return iframe;
    //$('#result').html(iframe);*/
    echo '<iframe src="../docs/poster.pdf"></iframe>';
}

function Topic(){
return Message("Will be Available soon.","alert-warning");
}

function Venue(){

return '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.7182437572383!2d72.92505781147418!3d19.0321333532724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c5c3527b0327%3A0x8a63274e6c3dbdc0!2sD.A.E%20Convention%20Center!5e0!3m2!1sen!2sin!4v1684738238291!5m2!1sen!2sin" width="300" height="225" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
}

function NASI(){
//return "<div class='w-75 p-3 bg-success'>
//return "<div class='d-flex justify-content-center'>
//	<div class='w-75 p-3 bg-success'>

/*return "<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
<h3>The <raman class='text-primary font-weight-bold'>National Academy of Sciences, India </raman> (initially called “The Academy of Sciences of United Provinces of Agra and Oudh”) was founded in the year 1930, with the objectives to provide a national forum for the publication of research work carried out by Indian scientists and to provide opportunities for exchange of views among them. 
<br/><br/><p><raman class='text-primary font-weight-bold'>93<sup>rd</sup></raman> Annual Session  along with the scientific sessions on Physical and Biological sciences will be held from <raman class='text-primary font-weight-bold'>03 Dec. to 05 Dec 2023</raman> at  
<raman class='font-weight-bold'>DAE Convention Centre, Bhabha Atomic Research Centre, Mumbai.</raman>
<br/>
<br/>
The Scientific Sessions will be held in two sections. The scientific papers are presented by selected researchers/scientists in scientific sessions, for which prior submission of the Abstract(s)/Paper(s) is necessary .
</h3>
</div></div>
";
*/
return HomeNASI();
//return "Hello";
}

function Home(){
return NASI();
}

function Accommodation(){
return Message("Will be available soon.","alert-warning");
}

if (isset($_POST['function_name'])) {
  $function_name = $_POST['function_name'];
  if (function_exists($function_name)) {
    $response_data = call_user_func($function_name);
    echo $response_data;
  }
}

?>
