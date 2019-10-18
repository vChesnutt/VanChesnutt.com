<?php
/* [VERIFY CAPTCHA FIRST] */
$secret = '6Lf0U7IUAAAAAEZ5ptQKsZ9mN0a0TQIQePdwxomI'; // CHANGE THIS TO YOUR OWN!
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
$verify = json_decode(file_get_contents($url));

/* [PROCESS YOUR FORM] */
if ($verify->success) {
  $to = "vsches@frontier.com"; // CHANGE THIS TO YOUR OWN!
  $subject = "Contact Form";
  $message = "Name - " . $_POST['name'] . "<br>";
  $message .= "Email - " . $_POST['email'] . "<br>";
  $message .= "Message - " . $_POST['message'] . "<br>";
  
  echo $to " " $subject " " message;

  if (@mail($to, $subject, $message)) {
    // Send mail OK
    echo "OK";
  } else {
    // Send mail error
    echo "ERROR - Send mail failed";
  }
} else {
  // Invalid captcha
  echo "ERROR - Invalid Captcha";
}
?>