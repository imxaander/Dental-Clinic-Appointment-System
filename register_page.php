<?php
session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Clicker%20Script' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/loginstyles.css">
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<div id="top-bar">
        <a href="index.php" style="color: white; text-decoration: none;font-family: 'Clicker Script'"><p  >J Gonzales Dental Clinic</p></a>
    </div>
	<div style="height: 40px">

	</div>

	<form action="PHP/register.php" method="POST" id="register-form">

	<div class="login_text">
		
		<p>Register</p>
	<?php if(isset($_GET['error'])){?>
		<p class="error"><?php echo $_GET['error'];?>!</p>
	<?php } ?>
	<?php if(isset($_GET['success'])){?>
		<p class="success"><?php echo $_GET['success'];?>!</p>
	<?php } ?>
	</div>

	<div class="input-email">
	<p>Email : </p>
	<span> <input type="email" name="Email" placeholder="Email..." class="input-boxes" size="50"></span>
	</div>

	<input size="50" type="hidden" value="<?php echo uniqid("PT");  ?>" name="Patient_Id">
	<input type="hidden" value="0" name="Verified">

	<div class="input-password">
	<p>Password : </p>
	<span><input size="50" type="password" name="Password" placeholder="Password..." class="input-boxes"></span>
	</div>

	<div class="input-firstname">
	<p>First_Name : </p>
	<span> <input size="50" type="text" name="First_Name" placeholder="First_Name..." class="input-boxes" ></span>
	</div>

	<div class="input-middlename">
	<p>Middle Name : </p>
	<span> <input size="50" type="text" name="Middle_Name" placeholder="Middle Name..." class="input-boxes" ></span>
	</div>

	<div class="input-lastname">
	<p>Last_Name : </p>
	<span> <input size="50" type="text" name="Last_Name" placeholder="Last_Name..." class="input-boxes" ></span>
	</div>

	<div class="input-age">
	<p>Age : </p>
	<span> <input size="50" type="number" name="Age" placeholder="Age..." class="input-boxes" ></span>
	</div>

	<div class="input-address">
	<p>Address : </p>
	<span> <input size="50" type="text" name="Address" placeholder="Address..." class="input-boxes" ></span>
	</div>

	<div class="input-birthdate">
	<p> Date of Birth : </p>
	<span><input size="50" type="date" name="Date_of_Birth" placeholder="Date of Birth"  class="input-boxes" max="<?php echo date("Y-m-d") ?>"></span>
	</div>

	<div class="input-gender">
	<p> Gender : </p>
	<span><select name="Gender" class="input-boxes">
        <option value=""></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select></span>
	</div>

	<div class="input-occupation">
	<p>Occupation : </p>
	<span> <input type="text" name="Occupation" placeholder="Occupation..." class="input-boxes" ></span>
	</div>

	<div class="input-branch">
	<p> Branch : </p>
	<span><select name="Branch" class="input-boxes">
        <option value=""></option>
        <option value="Cupang">Cupang</option>
        <option value="Gatchalian">Gatchalian</option>
		<option value="Makati">Makati</option>
    </select></span>
    </div>

    <div class="input-civilstatus">
	<p>Civil Status : </p>
	<span> <input type="text" name="Civil_Status" placeholder="Civil_Status..." class="input-boxes" ></span>
	</div>

	<div class="input-contactno">
	<p>Contact No. : </p>
	<span><input type="text" name="Contact_No" pattern="\d*" maxlength="11" minlength="11" placeholder="11 Digit number" class="input-boxes"></span>
	</div>

	<div class="input-image">
	<p>Image : </p>
	<span> <input type="file" id="avatar" name="Image" accept="image/png, image/jpeg"></span>
	</div>
	<div class="input-submitbtn">
		<a href="login_page.php" style="text-decoration: none; color: #00b4d8;"><u>Already have an account? Login.</u></a>
	<input type="submit" class="submits" value="Register">
	</div>
	<br><br>

	</form>

</body>
</html>
