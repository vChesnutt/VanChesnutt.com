<?php
session_start();
$error='';
if($_SERVER['REQUEST_METHOD']=='POST'){
     
    if(isset($_SESSION["CaptchaCode"]) && $_SESSION["CaptchaCode"]!=$_POST["security_code"]){
        $error='Invalid captcha code';
    }else{
        //Your code 
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>How to Create Captcha Code</title>
</head>
<body>
<form action="" method="post">
<?php
if(isset($error) && $error !=''){
    echo $error;    
}
?>
<input type="text" name="security_code" />&nbsp;<img id="LoadNewCaptcha" src="captcha.php" />
<input type="button" onClick="getNewCaptcha()" value="Generate New Image" />
<input type="submit" value="Submit" />
</form>
</body>
</html>