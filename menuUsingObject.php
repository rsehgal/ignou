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

if (isset($_GET['function']) && $_GET['function'] == 'Signup') {
    // call the function
	//$myClass->myFunction();
	echo $forms->Signup();
}
if (isset($_GET['function']) && $_GET['function'] == 'Login') {
    // call the function
	//$myClass->myFunction();
	echo $forms->Login();
}

//echo $forms->Signup();
?>

</body>
</html>
