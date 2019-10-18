<?php
require_once "Mail.php";

$from = "Sandra Sender <grusshayes@gmail.com>";
$to = "Van Chesnutt <vsches@frontier.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you? SSL2";

$host = "ssl://cmx5.my-hosting-panel.com";
$port = "465";
//$host = "cmx5.my-hosting-panel.com";
$username = "van@vanchesnutt.com";
$password = "1Vanspassword!";

$subject = "VanChesnutt.com message";
$email = $_REQUEST['email'];
$name = $_REQUEST['name'];
$body = $_REQUEST['message'];

$from = $name . " <grusshayes@gmail.com>";
echo("<p> From: " . $name . "</p>");
echo("<p> To: " . $to . "</p>");
//echo("<p> Subject: " . $subject . "</p>");
echo("<p> Email: " . $email . "</p>");

$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);

$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'port' => $port,	
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body . "\r\n\r\nFrom: " . $name . "\r\nEmail: " . $email );

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");

 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>

