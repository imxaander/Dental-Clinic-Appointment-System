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
	<meta charset="utf-8">
	<title>Login or Register - J Gonzales Dental Center</title>
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
		<p class="header-text centered-text" style="margin: 0; color:#00b4d8" id="tltxt">Login</p>
	</div>
	<form action="PHP/login.php" method="POST" id="login-form" style="">
	
	<?php if(isset($_GET['error'])){?>
		<p class="error"><?php echo $_GET['error'];?>!</p>
	<?php } ?>
	<?php if(isset($_GET['success'])){?>
		<p class="success"><?php echo $_GET['success'];?>!</p>
	<?php } ?>
	<div style="padding: 10px;">
	<p class="subheader-text">Email: </p><input type="email" name="Email" placeholder="Email..." class="input-boxes" required="true">

	<p class="subheader-text">Password: </p> <input type="password" name="Password" placeholder="Password..." class="input-boxes" required="true">
	<br><br>
	<a class="switches subheader-text" data-role="switchForms" data-id="login"><u>Create an account.</u></a>
	<input type="submit" class="submits subheader-text" value="Login">
	</div>
	<br><br>
	</form>


	<!-- Register -->
	<form action="PHP/register.php" method="POST" id="register-form">
	<?php if(isset($_GET['error'])){?>
		<p class="error"><?php echo $_GET['error'];?>!</p>
	<?php } ?>
	<?php if(isset($_GET['success'])){?>
		<p class="success"><?php echo $_GET['success'];?>!</p>
	<?php } ?>
	
	<div class="input-email">
	<p class="subheader-text" >Email : </p>
	<span> <input type="email" name="Email" placeholder="Email..." class="input-boxes" size="50" required="true"></span>
	</div>

	<input size="50" type="hidden" value="<?php echo uniqid("PT");  ?>" name="Patient_Id">
	<input type="hidden" value="0" name="Verified">

	<div class="input-password">
	<p class="subheader-text" >Password : </p>
	<span><input size="50" type="password" name="Password" placeholder="Password..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-firstname">
	<p class="subheader-text" >First_Name : </p>
	<span> <input size="50" type="text" name="First_Name" placeholder="First_Name..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-middlename">
	<p class="subheader-text" >Middle Name : </p>
	<span> <input size="50" type="text" name="Middle_Name" placeholder="Middle Name..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-lastname">
	<p class="subheader-text" >Last_Name : </p>
	<span> <input size="50" type="text" name="Last_Name" placeholder="Last_Name..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-age">
	<p class="subheader-text" >Age : </p>
	<span> <input size="50" type="number" name="Age" placeholder="Age..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-address">
	<p class="subheader-text" >Address : </p>
	<span> <input size="50" type="text" name="Address" placeholder="Address..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-birthdate">
	<p class="subheader-text" > Date of Birth : </p>
	<span><input size="50" type="date" name="Date_of_Birth" placeholder="Date of Birth"  class="input-boxes" max="<?php echo date("Y-m-d") ?>" required="true"></span>
	</div>

	<div class="input-gender">
	<p class="subheader-text" > Gender : </p>
	<span><select name="Gender" class="input-boxes" required="true">
        <option value=""></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select></span>
	</div>

	<div class="input-occupation">
	<p class="subheader-text" >Occupation : </p>
	<span> <input type="text" name="Occupation" placeholder="Occupation..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-branch" required="true">
	<p class="subheader-text" > Branch : </p>
	<span><select name="Branch" class="input-boxes" required="true">
        <option value=""></option>
        <option value="Cupang">Cupang</option>
        <option value="Paranaque">Paranaque</option>
		<option value="Makati">Makati</option>
    </select></span>
    </div>

    <div class="input-civilstatus">
	<p class="subheader-text" >Civil Status : </p>
	<span> <input type="text" name="Civil_Status" placeholder="Civil_Status..." class="input-boxes" required="true"></span>
	</div>

	<div class="input-contactno">
	<p class="subheader-text" >Contact No. : </p>
	<span><input type="text" name="Contact_No" pattern="\d*" maxlength="11" minlength="11" placeholder="11 Digit number" class="input-boxes" required="true"></span>
	</div>

	<div class="input-image">
	<p class="subheader-text" >Image : </p>
	<span> <input type="file" id="avatar" name="Image" accept="image/png, image/jpeg"></span>
	</div>
	<div class="input-submitbtn">
		<a class="switches subheader-text" data-role="switchForms" data-id="register"><u>Already have an account? Login.</u></a>
	<input type="submit" class="submits subheader-text" value="Register">
	</div>
	<br><br>

	</form>
	</div>

	</div>
</body>
<!-- 
	<div id="top-bar">
		<div class="logo">
			<a href="index.php" style="color: white; text-decoration: none; font-family: 'Clicker Script'"><p  >J Gonzales Dental Clinic</p></a>		</div>
    </div>
	-->
</html>
