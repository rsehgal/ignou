<?php
function my_function() {
  // Your function logic here
  $data = array("Hello", "Ha ha aha d");
  return json_encode(array("data" => implode(" ", $data)));
}
function ServeSignup(){
               return "<div>ServeSignup function called..........</div>";
}

function ServeLogin(){
               return "<div>ServeLogin function called..........</div>";
}

if (isset($_POST['function_name'])) {
  $function_name = $_POST['function_name'];
  if (function_exists($function_name)) {
    $response_data = call_user_func($function_name);
    echo $response_data;
  }
}

?>
