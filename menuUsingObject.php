<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Menu Example</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<?php

require "Symposia.php";
require "Forms.php";

$objSympo = new Symposia();
echo $objSympo->Menu();


$forms = new Forms();

$funcName="";

if (isset($_GET['function']) && $_GET['function'] == 'Signup') {
	$funcName='Signup';
    // call the function
	//$myClass->myFunction();
	echo $forms->Signup();
}
if (isset($_GET['function']) && $_GET['function'] == 'Login') {
	$funcName='Login';
	// call the function
	//$myClass->myFunction();
	echo $forms->Login();
}

/*
 * For every form that needs to be processed at the backend
 * add a function in the Forms.php, and a correponding
 * block below
 */
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Signup') {
                    // call the function to process the form data
                    echo $forms->ServeSignup();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Login') {
                    // call the function to process the form data
                    echo $forms->ServeLogin();
}
//echo $forms->Signup();
?>

</body>
</html>

