<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/loginstyles.css">
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<div id="top-bar">
        <p style="color: white;">J Gonzales Dental Clinic</p>
    </div>
	<div style="height: 40px">

	</div>
	
	<form action="" method="" id="login-form">
	
	<div class="login_text">
		<p>Please Verify your Email.</p>
	</div>
	<?php if(isset($_GET['error'])){?>
		<p class="error"><?php echo $_GET['error'];?>!</p>
	<?php } ?>
	<?php if(isset($_GET['success'])){?>
		<p class="success"><?php echo $_GET['success'];?>!</p>
	<?php } ?>
<br><br>
	<a class="tablinks" href="PHP/logout.php" id="logout-btn" style="text-align: center;"><i class="fas fa-sign-out-alt"></i> Logout</a>
	<br><br>
	</form>
	
</body>
</html>