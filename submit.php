<?php
/* [VERIFY CAPTCHA FIRST] */
$secret = '6Lf0U7IUAAAAAEZ5ptQKsZ9mN0a0TQIQePdwxomI'; // CHANGE THIS TO YOUR OWN!
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
$verify = json_decode(file_get_contents($url));

/* [PROCESS YOUR FORM] */
//require_once './vendor/autoload.php';



use FormGuide\Handlx\FormHandler;




$pp = new FormHandler(); 


$validator = $pp->getValidator();

$validator->fields(['name','email'])->areRequired()->maxLength(50);

$validator->field('email')->isEmail();

$validator->field('message')->maxLength(6000);






$pp->sendEmailTo('vsches@frontier.com'); // ← Your email here



echo $pp->process($_POST)
?>