<?php
session_start();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
The National Academy of Sciences, India, NASI-2023.
</title>
  <!-- Bootstrap CSS -->
<!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
 <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
.btn-custom {
  font-size: 24px;
}

#loadingGif {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  /* Add any additional styling you need */
}
</style>
<script>
$(document).ready(function(){
	//This block control the hover color of drop down menus
	$(".dropdown-item").hover(function(){
		$(".dropdown-item").each(function(){
			$(this).css("background-color","white");
		});
		$(this).css("background-color","ffaf33");
	});
	//-----------------------------------------------------

	setTimeout(function(){
	$("refereeUpdateStatus").alert("close");
	},2000);
//--------------------------------------------------
//this block is just to read the home text using ajax
var dataHome={};
dataHome['function_name']="NASI";
$.ajax({
            url: "../controller/func.php",
            method: "POST",
            data : dataHome,
            success: function(response) {
            $("#result").html(response);
            }
          });
//-------------------------------------------------

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

//$('.Submissions').on('click',function(event){
$('.menuCommon').on('click',function(event){
	//alert(" Menu clicked.......");
	//alert($(this).attr("id"));
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

$('.Accommodation').on('click',function(event){
	//alert(" Menu clicked.......");
	//alert($(this).attr("id"));
	
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName=$(this).attr("functionName");

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

/*$('#Poster').click(function(){

    var iframe = $('<iframe>');
    iframe.attr('src','../docs/poster.pdf');
    $('#result').html(iframe);
});*/
$("#logout").on("click",function(e){
      //e.preventDefault();
      //alert("logout");
	var data={};
	data["function_name"]="Logout";
        $.ajax({
            url: "../controller/func.php",
            method: "POST",
            data : data,
            success: function(response) {
            $("#loginstatus").html(response);
            }
          });

});

});
var dataUp=new FormData();
                        //var data={};
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
//require_once "../controller/helpers.php";
//$_SESSION["loggedin"]=TRUE;
//$_SESSION["username"]="ABCD";
//session_write_close();
//$_SESSION['logged']=TRUE;
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require "../globals.php";
require "../model/Symposia.php";
require "Forms.php";
require "footer.php";
$objSympo = new Symposia();
echo $objSympo->Menu();
echo "<div id='container'>";
echo "<div id='refereeUpdateStatus'class='alert alert-dismissible fade show' ></div>";

echo "<div id='result' ></div>";
echo "<div id='loginstatus' ></div>";
echo '<img id="loadingGif" src="../images/loadingTransparent.gif" style="display: none;" alt="Loading...">';
//echo HomeNASI();


/*echo "<hr/><br/><div class='align-items-center justify-content-center'>
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

//if($_SESSION["loggedin"])
//echo "<br/><div id='sessionDiv'>user ".$_SESSION["username"]." already logged in.</div> <br/>";
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

echo DisplayFooter();
?>

</body>
</html>

