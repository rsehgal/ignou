<?php
function SendMail($from,$to,$subject,$body){
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

ini_set("include_path", '/home/nasiin/php:' . ini_get("include_path") );


require_once "Mail.php";

//$from = "nasiin@nasi2023.in";
//$to = "sc.ramansehgal@gmail.com";//$NewEmail;
//$subject = "Hello from Sympnp";//$SubjNewMail;
//$body = "Hello , this is just a text msg";//$Msg;


$from.="@nasi2021.in";
$host = "mail.nasi2023.in";
$username = $from;//"admin@nasi2023.in";
$password = "nasi123by!#*";


 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'socket_options' => array('ssl' => array('verify_peer_name' => false, 'allow_self_signed' => true)),
     'username' => $username,
     'password' => $password));
     
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<H3><p>Message successfully sent!</p></H3>");
  }

}
?>
