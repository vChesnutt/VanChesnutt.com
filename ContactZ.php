<?php
require_once "Mail.php";

$from = "Sandra Sender <grusshayes@gmail.com>";
$to = "Ramona Recipient <vsches@frontier.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you? SSL2";

$host = "ssl://cmx5.my-hosting-panel.com";
$port = "465";
//$host = "cmx5.my-hosting-panel.com";
$username = "van@vanchesnutt.com";
$password = "1Vanspassword!";

$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);

//    'port' => $port,
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'port' => $port,	
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");

 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>

