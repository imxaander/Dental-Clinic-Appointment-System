<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/loginstyles.css">
	<link href='https://fonts.googleapis.com/css?family=Clicker%20Script' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

  <link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<div id="top-bar">
		<div class="logo">
			<a href="index.php" style="color: white; text-decoration: none; font-family: 'Clicker Script'"><p  >J Gonzales Dental Clinic</p></a>		</div>
    </div>
	<div style="height: 10%;">

	</div>
<br>
<br><br>
	<form action="PHP/login.php" method="POST" id="login-form" style="">

	<div class="login_text" style="margin: 0;">
		<p style="margin: 0;">Login</p>
	</div>
	<?php if(isset($_GET['error'])){?>
		<p class="error"><?php echo $_GET['error'];?>!</p>
	<?php } ?>
	<?php if(isset($_GET['success'])){?>
		<p class="success"><?php echo $_GET['success'];?>!</p>
	<?php } ?>
	<div style="padding: 10px;">
	<p>Email: <span> <input type="email" name="Email" placeholder="Email..." class="input-boxes" ></span></p>

	<p>Password:<span><input type="password" name="Password" placeholder="Password..." class="input-boxes"></span></p>
	<a href="register_page.php" style="text-decoration: none; color: #00b4d8;"><u>Create an account.</u></a>
	<input type="submit" class="submits" value="Login">
	</div>
	<br><br>
	</form>

</body>
</html>
