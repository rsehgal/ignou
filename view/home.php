<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Menu Example</title>
  <!-- Bootstrap CSS -->
<!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
 <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
$('.signupForm').each(function() {
  //Perform operations on each element here
	   console.log($(this).attr("id")); // Example operation: log the text content of each element
 });
			
/*$('.symposiaForms').on('submit',function(event){
	//alert('hahahaa');
	alert($(this).attr('id'));
});*/
/*
$('.sympFormSubmit').on('submit',function(event){
	console.log("jlkjkljkljkjkljkl");
	alert('hahahaa');
	//alert($(this).attr('id'));
});
 */
$('.nasiMenu').on('click',function(event){
	//alert("Nasi Menu clicked.......");
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName=$(this).attr("id");
	//alert(funcName);
	data['function_name']=funcName;

	$.ajax({
	    url: "../controller/func.php",
	    method: "POST",
	    data : data,
	    success: function(response) {
	    $("#result").html(response);
	    }
	  });

});

$('.Committees').on('click',function(event){
	//alert("Committees Menu clicked.......");
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName=$(this).attr("id");
	//alert(funcName);
	data['function_name']=funcName;
	console.log(data);

	$.ajax({
	    url: "../controller/func.php",
	    method: "POST",
	    data : data,
	    success: function(response) {
	    $("#result").html(response);
	    }
	  });

});

$('.symposiaForms').on('submit',function(event){
	alert("Submit of Signup clicke....");
	event.preventDefault();
	var funcName="";
	var data={};
	$('.signupForm').each(function() {
		console.log($(this).val()); 
		data[$(this).attr('id')]=$(this).val();
	});
	$('.loginForm').each(function() {
		console.log($(this).val()); 
		data[$(this).attr('id')]=$(this).val();
	});


if($(this).attr('id')=="login"){
	funcName="ServeLogin";
	data['function_name']=funcName;

}
if($(this).attr('id')=="signup"){
	var funcName="ServeSignup";
	data['function_name']=funcName;
	
}
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

$('#Poster').click(function(){

    var iframe = $('<iframe>');
    iframe.attr('src','../docs/poster.pdf');
    $('#result').html(iframe);
});

});

</script>

<style>
    iframe{
        width: 100%;
	height: 100%;
        border: 2px solid #ccc;
    }
</style>

</head>
<body>
<?php
session_start();
$_SESSION['logged']=TRUE;
require "../globals.php";
require "../model/Symposia.php";
require "Forms.php";
$objSympo = new Symposia();
echo $objSympo->Menu();
echo "<div id='container'>";
echo "<div id='result' ></div>";

/*
$forms = new Forms();

if (isset($_GET['function']) && $_GET['function'] == 'Signup') {
	$funcName='Signup';
    // call the function
	//$myClass->myFunction();
	echo $forms->Signup();
}
if (isset($_GET['function']) && $_GET['function'] == 'Login') {
	$funcName='Login';
	//echo $funcName."<br/>";
	// call the function
	//$myClass->myFunction();
	echo $forms->Login();
	//GenJs();
}*/
/*if (isset($_GET['function']) && $_GET['function'] == 'Contact') {
	$funcName='Contact';
	//echo $funcName."<br/>";
	//$myClass->myFunction();
	echo $forms->Contact();
	//GenJs();
}*/

echo "</div>";
function GenJs(){ return "<script> alert('Hello Raman') </script>";}

//require "FormServers.php";
//echo $funcName;

/*
 * For every form that needs to be processed at the backend
 * add a function in the Forms.php, and a correponding
 * block below
 */
/*
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Signup') {
                    // call the function to process the form data
                    echo $forms->ServeSignup();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Login') {
                    // call the function to process the form data
                    echo $forms->ServeLogin();
}
 */
//echo $forms->Signup();
?>

</body>
</html>

