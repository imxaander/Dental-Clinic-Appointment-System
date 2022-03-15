<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/loginstyles.css">
	<link href='https://fonts.googleapis.com/css?family=Clicker%20Script' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
	<script defer src="scripts/loginscripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
	<link rel="stylesheet" href="styles/fonts.css">
	<meta charset="utf-8">
	<script src="http://www.thimbleopensource.com/download/jquery/jquery.filter_input.js"></script>
	<title>Forgot Password - J Gonzales Dental Center</title>
</head>
<body>
	<?php
		if (isset($_GET["register"])) {
			
		
	?>
	<script>
		$(document).ready(()=>{
			switchToReg();
		})
		
	</script>
	<?php
	}
	?>
	<div id="main-content">

	<div id="bigpicture">
	<img src="https://cdn.discordapp.com/attachments/881553422946537513/881554158770069605/unknown.png" alt="" id="picture-left">
	</div>


	<div id="main-form">
	<div id="title_text" >
		<p class="header-text centered-text jgTitles1" style="margin: 0; color:#00b4d8" id="tltxt">Forgot Password</p>
	</div>
	<form action="PHP/sendlinkforgot.php" method="POST" id="login-form" style="">
	
	<?php if(isset($_GET['error'])){?>
		<p class="error"><?php echo $_GET['error'];?>!</p>
	<?php } ?>
	<?php if(isset($_GET['success'])){?>
		<p class="success"><?php echo $_GET['success'];?>!</p>
	<?php } ?>
	<div style="padding: 10px;">
	<p class="subheader-text jgPara1" > We need you to enter your email and we will check and send to you a link for you to change your password. Please enter your Email.</p>
	<input type="email" name="Email" placeholder="Email..." class="input-boxes" required="true">
	
	<br><br>
	<input type="submit" id="login-btn" class="submits subheader-text" value="Send Link">
	</div>
	<br><br>
	</form>


	<!-- Register -->
	
	
</body>
<!-- 
	<div id="top-bar">
		<div class="logo">
			<a href="index.php" style="color: white; text-decoration: none; font-family: 'Clicker Script'"><p  >J Gonzales Dental Clinic</p></a>		</div>
    </div>
	-->
</html>
