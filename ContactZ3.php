<title>Fanbird Technologies</title>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://www.google.com/recaptcha/api.js"></script>
<style>
    body, h1, h2, h3, h4, h5 {
        font-family: "Poppins", sans-serif
    }
 
    body {
        font-size: 16px;
    }
 
    .w3-half img {
        margin-bottom: -6px;
        margin-top: 16px;
        cursor: pointer
    }
 
        .w3-half img:hover {
            opacity: 1
        }
 
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #f1f1f1;
        color: black;
        text-align: center;
    }
</style>
<body>
 
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold; background-color:#011D33; color:white;" id="mySidebar">
        <br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container">
            <h3 class="w3-padding-64"><b>Fanbird<br>Technologies</b></h3>
        </div>
        <div class="w3-bar-block">
            <a href="Home.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
            <a href="Overview.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Overview</a>
            <a href="Sevices.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Services</a>
            <a href="Competencies.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Competencies</a>
            <a href="Customers.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Customers</a>
            <a href="Portfolio.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Portfolio</a>
            <a href="Contact.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
        </div>
    </nav>
 
    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-hide-large w3-xlarge w3-padding" style="background-color:#011D33; color:white;">
        <a href="javascript:void(0)" style="background-color:#011D33; color:white;" class="w3-button w3-margin-right" onclick="w3_open()">☰</a>
        <span style="font-size:medium;">Fanbird Technologies</span>
    </header>
 
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
 
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:340px;margin-right:40px; ">
 
        <!-- Contact -->
        <div class="w3-container" id="contact" style="margin-top:75px; margin-bottom:100px;">
            <h1 class="w3-xxxlarge w3-text-red"><b>Contact</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
            <p><h3>To contact us, please complete the following form and send us a message.</h3> </p>
            </div>
<?php
                /* [VERIFY CAPTCHA FIRST] */
$secret = '6Lf0U7IUAAAAAEZ5ptQKsZ9mN0a0TQIQePdwxomI'; // CHANGE THIS TO YOUR OWN!
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
$verify = json_decode(file_get_contents($url));

if ($verify->success) {     
	//if "email" variable is filled out, send email
	if (isset($_REQUEST['email']))  {
  
	//Email information
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
 
  }
}
  
  //if "email" variable is not filled out, display the form
  else  {
?>
 
<form action="?" method="post">
     <div class="w3-section">
         <label>Your Name</label>
         <input class="w3-input w3-border" type="text" name="name" required>
     </div>
     <div class="w3-section">
         <label>Your Email Address</label>
         <input class="w3-input w3-border" type="text" name="email" required>
     </div>
     <div class="w3-section">
         <label>Subject</label>
         <input class="w3-input w3-border" type="text" name="subject" required>
     </div>
     <div class="w3-section">
         <label>Please provide a brief message</label>
         <input class="w3-input w3-border" type="text" name="comment" required>
     </div>
                <div class="w3-section">
         <div class="g-recaptcha" data-sitekey="6Lf0U7IUAAAAAKmyfa1mBfzHy_2R7mNKtTtGXSXS"></div>
     </div>
     <input type="submit" value="Submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" />
  </form>
  
<?php
  }
?>
        </div>
                <div>&nbsp;</div>
    <div class="footer" style="margin-top:75px;padding-right:58px">
        <p class="w3-right">
            &copy;
            <script type="text/javascript">document.write(new Date().getFullYear());</script> Fanbird Technologies
        </p>
    </div>
 
    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }
 
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
</body>
</html>
