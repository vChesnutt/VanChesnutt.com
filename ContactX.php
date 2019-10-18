<!DOCTYPE html>
<html lang="en">
<head>
	<title>Van Chesnutt-Contact</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<style type="text/css">
		.navbar-default {
			background-color: #CC0000;
			border-radius: 0;
		}

		.navbar-default .navbar-brand,
		.navbar-default .navbar-brand:hover,
		.navbar-default .navbar-brand:focus {
			color: #FFF;
		}

		.navbar-default .navbar-nav > li > a {
			color: #FFF;
		}

		.navbar-default .navbar-nav > li > a:hover,
		.navbar-default .navbar-nav > li > a:focus {
			color: red;
		}

		.navbar-default .navbar-nav > .active > a,
		.navbar-default .navbar-nav > .active > a:hover,
		.navbar-default .navbar-nav > .active > a:focus {
			color: red;
		}

		.navbar-default .navbar-text {
			color: #FFF;
		}

		.navbar-default .navbar-toggle {
			border-color: red;
		}

		.navbar-default .navbar-toggle:hover,
		.navbar-default .navbar-toggle:focus {
			background-color: red;
		}

		.navbar-default .navbar-toggle .icon-bar {
			background-color: #FFF;
		}
   </style>
</head>
	
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:black; color:white;">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="default.html">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="default.html">Van Chesnutt</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="About.html">ABOUT</a></li>
			<li><a href="Contact.html">CONTACT</a></li>
		  </ul>
		</div>
	  </div>
	</nav>

	<!-- !PAGE CONTENT! -->
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2>Contact</h2> 
				<p>Send your message in the form below and I will get back to you as early as possible. </p>
			</div>
		</div>
			
		<?php

		require_once "Mail.php";

		/* [VERIFY CAPTCHA FIRST] */
		$secret = "6Lf0U7IUAAAAAEZ5ptQKsZ9mN0a0TQIQePdwxomI";
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
		$verify = json_decode(file_get_contents($url));
		if ($verify->success) 
			{ 
				require_once "Mail.php";

				$from = "Sandra Sender <grusshayes@gmail.com>";
				$to = "Van Chesnutt <vsches@frontier.com>";
				$subject = "Hi!";
				$body = "Hi,\n\nHow are you? SSL2";
		  
				//Email information
				//$host = "cmx5.my-hosting-panel.com";
				$host = "ssl://cmx5.my-hosting-panel.com";
				$port = "465";
				$username = "van@vanchesnutt.com";
				$password = "1Vanspassword!";
				
				$subject = "VanChesnutt.com message";
				$email = $_REQUEST['email'];
				$name = $_REQUEST['name'];
				$body = $_REQUEST['message'];
				
				$from = $name . " <grusshayes@gmail.com>";
									  
				$to = "Van Chesnutt <vsches@frontier.com>";
				$subject = $_REQUEST['subject'];
				$body = $_REQUEST['message'];
				
				$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);

				$smtp = Mail::factory('smtp',
				  array ('host' => $host,
					'auth' => true,
					'port' => $port,
					'username' => $username,
					'password' => $password));

				$mail = $smtp->send($to, $headers, $body . "\r\n\r\nFrom: " . $name . "\r\nEmail: " . $email );

				if (PEAR::isError($mail)) {
					echo("<p>Error: " . $mail->getMessage() . "</p>");
				 }  else {
					echo("<p>Message successfully sent!</p>");
				 }

			}
			?>		
			<form action="?" method="post">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">			
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
							 <input class="w3-input w3-border" type="text" name="message" required>
						 </div>
						 <div class="w3-section">
							 <div class="g-recaptcha" data-sitekey="6Lf0U7IUAAAAAKmyfa1mBfzHy_2R7mNKtTtGXSXS"></div>
						 </div>
						 <input type="submit" value="Submit" class="btn btn-lg btn-default pull-right" />
						 <!--<button type="submit" value="Submit" class="btn btn-lg btn-default pull-right" id="btnContactUs">Send</button> -->
					</div>
				</div>
			</form>
		<?php
		  }
		?>
    </div>
	
    <div>&nbsp;</div>
	<br /><br />
	<div id="footer">
		<div class="row text-center" style="background-color:black; color:white;">
		  <div class="col-xs-12"><p>&copy; 2019 - vanchesnutt.com</p></div>
		</div>
	</div>	
    
</body>
</html>
