<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){;

var data={};

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
<select name="cars" id="tablename">
  <option value="user_credentials">user_credentials</option>
  <option value="testuser">testuser</option>
</select>
<div id='result'/>
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../model/Symposia.php";

?>

</body>
</html>
