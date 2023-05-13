<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../../components/Components.php";
//require "../../model/Symposia.php";

$obj = new Components();
echo $obj->RenderFileUpload();
?>

</body>
</html>
