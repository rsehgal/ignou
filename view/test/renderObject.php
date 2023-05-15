<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
	var data=new FormData();
	//alert("Upload page ready...");
	/*
	$("#uploadFile").on('change',function(){
	alert("Change event detected....");
	});
	*/
	//$(document).on('change','.uploadFile', function(){
	$("#uploadFile").on('change',function(){
	for (const key of Object.keys(data)) {
	  alert(key);
	  data.delete(key);
	}

	//	alert($(this).attr("id"));
	var fileInput = document.getElementById($(this).attr("id"));
	alert(fileInput.files[0].name);	
	console.log(fileInput);
	data.append('file',fileInput.files[0]);
	data.append('loc',$(this).attr('loc'));
	data.append('function_name',"Upload");
	//data['loc']=$(this).attr('loc');
	//data["function_name"]="Upload";
	//data['file']=fileInput.files[0];
	console.log(data);
	
	$.ajax({
		url: "../../controller/func.php",
		method: "POST",
		data : data,
		processData : false,
		contentType : false,
		success: function(response) {
			$("#result").html(response);
		}
	});
	//data.clear();

       

	});

});
</script>

</head>
<body>
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../../components/Components.php";
//require "../../model/Symposia.php";

$obj = new Components();
echo $obj->RenderFileUpload();//null,null,null,null,"/var/www/html/Symposia/Uploads/");
echo $obj->RenderSubmitButton("","","uploadForm","SubmitButton");

echo "<div id='result'></div>";
?>

</body>
</html>
