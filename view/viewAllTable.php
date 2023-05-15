<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){;

var data={};
$(document).on('click','.deleteEntry', function(){

	//alert("DeleteEntry called....");
	data['tablename']=$(this).attr('oftable');
	data['username']=$(this).attr('id');
	data["function_name"]="Delete";
	console.log(data);
	$.ajax({
        	url: "../controller/func.php",
                method: "POST",
	        data : data,
	        success: function(response) {
		         console.log(response);
		         $("#result").html(response);
		         }
	});      

});

$(".tablename").click(function(){
	data["function_name"]="ShowTable";
	//alert($(this).attr("value"));
	data[$(this).attr('class')]=$(this).attr("value");//val();
	$("#parentDropDown").prop('value',$(this).attr("value"));
	$("#selectedTable").val($(this).attr("value"));


$.ajax({
    url: "../controller/func.php",
	        method: "POST",
		data : data,
		success: function(response) {
			console.log(response);
                	$("#result").html(response);
                }
});
});

$("#tablename").change(function(){
	data["function_name"]="ShowTable";
	alert($(this).val());
	data[$(this).attr('id')]=$(this).val();


$.ajax({
    url: "../controller/func.php",
	        method: "POST",
		data : data,
		success: function(response) {
			console.log(response);
                	$("#result").html(response);
                }
});
});
});
	        
</script>

</head>
<body>
<!-- <select name="cars" id="tablename" class="form-select">
  <option value="user_credentials">user_credentials</option>
  <option value="testuser">testuser</option>
</select>
-->
<div id='heading' class='text-center border bg-warning'><h2>Table Visualizer</h2></div>
<table border="1" class="table">
<tr>
<td>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="parentDropDown">Select the table to view
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../model/Symposia.php";
$obj = new DB();
$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
$obj->Connect();
$query='show tables;';
$result=$obj->GetQueryResult($query);
$dbname='symposia';
while ($row = $result->fetch_assoc()) {
	//echo $row["Tables_in_" . $dbname] . "<br>";
$tabname=$row["Tables_in_". $dbname]; 
//echo $tabname."<br/>";
echo '<li><a href="#" class="tablename" id='.$tabname.' value='.$tabname.'>'.$tabname.'</a></li>';
}
echo ' </ul></div></td>';
echo '<td>
<input type="text" id="selectedTable" readonly></input>
</td>
</tr>
</table>
<div id="result"/>'
;

?>

</body>
</html>
