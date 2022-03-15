<?php
include "includes/con_db.inc.php";

if (isset($_POST["Patient_Id"]) && isset($_POST["Staff_Id"])) {
  if(substr($_POST["Patient_Id"], 0, 2) == "PT"){
    $Patient_Id = $_POST["Patient_Id"];

  $sql = "SELECT * FROM patients WHERE Patient_Id = '$Patient_Id'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="styles/loginstyles.css">
        <link rel="stylesheet" href="styles/profilestyle.css">
    	<meta charset="utf-8">
    	<title><?php echo $row["First_Name"]; ?>'s Profile </title>
    </head>
    <body>
    	<div id="top-bar" >
            <p style="color: white; font-size: 20px;"><?php echo $row["First_Name"]; ?>'s Profile</p>
        </div><br>
    	<div style="box-shadow: 0 0 25px rgba(0, 0, 0, 0.25); width: 90%; position:relative; left: 5%;">
        <br>
        <img src="<?php echo 'img/patients/' . $row["Image"]; ?>" style="border-radius: 50%; width : 25%; height : 25%; margin-left: 37.5%;">
        <br>
        <p style="text-align: center;">Name : <?php echo $row["First_Name"]; ?> <?php echo $row["Last_Name"]; ?></p>
        <p style="text-align: center;">Age : <?php echo $row["Age"]; ?></p>
        <p style="text-align: center;">Gender : <?php echo $row["Gender"]; ?></p>
        <p style="text-align: center;">Contact No : <?php echo $row["Contact_No"]; ?></p>
        <p style="text-align: center;">Address : <?php echo $row["Address"]; ?></p>
        <p style="text-align: center;">Civil Status : <?php echo $row["Civil_Status"]; ?></p>
<br>
    	</div>
    </body>
    </html>


    <?php
    }
  }else{
    #guests
    $Patient_Id = $_POST["Patient_Id"];

    $sql = "SELECT * FROM guests WHERE guest_id = '$Patient_Id'";
    $result = mysqli_query($con, $sql);
  
    if ($result) {
      $row = mysqli_fetch_assoc($result);
      ?>
      <!DOCTYPE html>
      <html>
      <head>
      <link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/loginstyles.css">
        <link rel="stylesheet" href="styles/profilestyle.css">
        <meta charset="utf-8">

        <title><?php echo $row["first_name"]; ?>'s Profile (Guest)</title>
      </head>
      <body>
        <div id="top-bar" >
              <p style="color: white; font-size: 20px;"><?php echo $row["first_name"]; ?>'s Profile</p>
          </div><br>
        <div style="box-shadow: 0 0 25px rgba(0, 0, 0, 0.25); width: 90%; position:relative; left: 5%;" >
          <br>
          <img src="https://www.tech101.in/wp-content/uploads/2018/07/blank-profile-picture.png" style="border-radius: 50%; width : 25%; height : 25%; margin-left: 37.5%;">
          <br>
          <p style="text-align: center;">Name : <?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></p>
          <p style="text-align: center;">Age : <?php echo $row["age"]; ?></p>
          <p style="text-align: center;">Gender : <?php echo $row["gender"]; ?></p>
          <p style="text-align: center;">Contact No : <?php echo $row["contact_no"]; ?></p>
          <p style="text-align: center;">Address : <?php echo $row["address"]; ?></p>
          <p style="text-align: center;">Info : <?php echo $row["info"]; ?></p>
  <br>
        </div>
      </body>
      </html>
  
  
      <?php
      }
  }

}else{
  if(isset($_GET["patientId"])){
   
    $Patient_Id = $_GET["patientId"];

    $sql = "SELECT * FROM patients WHERE Patient_Id = '$Patient_Id'";
    $result = mysqli_query($con, $sql);
  
    if ($result) {
      $row = mysqli_fetch_assoc($result);
      ?>
      <!DOCTYPE html>
      <html>
      <head>
      <link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/loginstyles.css">
          <link rel="stylesheet" href="styles/profilestyle.css">
        <meta charset="utf-8">
        <title><?php echo $row["First_Name"]; ?>'s Profile </title>
      </head>
      <body>
        <div id="top-bar" >
              <p style="color: white; font-size: 20px;"><?php echo $row["First_Name"]; ?>'s Profile</p>
          </div><br>
        <div style="box-shadow: 0 0 25px rgba(0, 0, 0, 0.25); width: 90%; position:relative; left: 5%;">
          <br>
          <img src="<?php echo 'img/patients/' . $row["Image"]; ?>" style="border-radius: 50%; width : 25%; height : 25%; margin-left: 37.5%;">
          <br>
          <p style="text-align: center;">Name : <?php echo $row["First_Name"]; ?> <?php echo $row["Last_Name"]; ?></p>
          <p style="text-align: center;">Age : <?php echo $row["Age"]; ?></p>
          <p style="text-align: center;">Gender : <?php echo $row["Gender"]; ?></p>
          <p style="text-align: center;">Contact No : <?php echo $row["Contact_No"]; ?></p>
          <p style="text-align: center;">Address : <?php echo $row["Address"]; ?></p>
          <p style="text-align: center;">Civil Status : <?php echo $row["Civil_Status"]; ?></p>
  <br>
        </div>
      </body>
      </html>
  
  
      <?php
    }
  }
}
?>
