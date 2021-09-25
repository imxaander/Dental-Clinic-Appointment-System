<?php
include "includes/con_db.inc.php";
session_start();
$Patient_Id = $_SESSION["Patient_Id"] ?? "";
$Branch = $_SESSION["Branch"] ?? "";
if ($_SESSION["Verified"] == "0")
{
    header("Location: verify_page.php?error=Please check your email and click the link from us to verify. Check your spam if necessary.");
    exit();

}
else
{
?>
<html>
<head>
  <link rel="icon"
      type="image/png"
      href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Clicker%20Script' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href='styles/indexstylesmobile.css' />
<link rel="stylesheet" type="text/css" href='styles/indexstylespc.css' />
<link rel="stylesheet" href="styles/teststyle.css">
<link rel="stylesheet" href="styles/minigallery.css">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>J Gonzales Dental Center</title>
<script src="scripts/slideshow.js"></script>
    <script src="scripts/indexscripts.js"></script>
    <script type="text/javascript">
    function ProfilePatient(){
      window.open('about:blank','popup','width=400,height=400')
    document.getElementById('PatientProfile').submit();
    }
    </script>
    <script src="https://kit.fontawesome.com/6b9c8a6e93.js"></script>
    <script type="text/javascript" src="scripts/minigallery.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="qtfS508k"></script>


</head>
<body>
<input type="hidden" name="" id="user_idP" value="<?php echo $_SESSION["Patient_Id"]; ?>">
<div id="darken" onclick="closeSideBar()"></div>
<div class="top-logo-pc">
  <div class="logo-div">
    <img src="https://media.discordapp.net/attachments/793749939430621194/870198473633452042/unknown.png" alt="" style="height: 90;" class="logo-pc">
  </div>
  <div class="acc-div" style="padding-top: 10px;">
    <?php if (isset($_SESSION["Patient_Id"]))
    { ?>
    <a class="tablinks" href="#Profile_Page" onclick="openCity(event, 'Profile_Page')"><i class="far fa-user-circle"></i> <?php echo $_SESSION["First_Name"] . " " . $_SESSION["Last_Name"] ?></a>
    <hr>
    <a class="tablinks" href="PHP/logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a><br>
    <?php
  }
   ?>
    <?php if (empty($_SESSION["Branch"]))
    { ?>
    <a class="tablinks" href="login_page.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Login</a>
    <hr>
    <a class="tablinks" href="register_page.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Register</a><br>
    <?php
    } ?>
    <?php if (isset($_SESSION["Staff_Id"]))
    { ?>
    <a class="tablinks" ><i class="far fa-user-circle"></i> <?php echo $_SESSION["Branch"] . " Staff" ?></a>
    <hr>
    <a class="tablinks" href="PHP/logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a><br>
    <?php
    } ?>
  </div>


</div>
<div class="topbarpc">
    <div id="top-bar-pc">
      <div class="tablinkspcbar">


        <a class="tablinkspc" href="#" onclick="openCity(event, 'Home')"><i class="fas fa-home"></i> Home</a>

        <a class="tablinkspc" href="#" onclick="openCity(event, 'Services')"><i class="fas fa-clipboard-list"></i> Services</a>

        <a class="tablinkspc" href="#" onclick="openCity(event, 'Doctors')"><i class="fas fa-user-md"></i> Doctors</a>

        <a class="tablinkspc" href="#" onclick="openCity(event, 'Gallery')"><i class="far fa-images"></i> Gallery</a>

        <a class="tablinkspc" href="#" onclick="openCity(event, 'Contact_Us')"><i class="fas fa-phone"></i> About Us</a><?php if (isset($_SESSION["Staff_Id"]))
    { ?>
            <a class="tablinkspc" href="#" onclick="openCity(event, 'Staff_Panel')"><i class="fas fa-users-cog"></i> Staff Panel</a><br>

        <?php
    } ?>
    <?php //
    if (isset($_SESSION["Patient_Id"]))
    { ?>
            <a class="tablinkspc" href="#" onclick="openCity(event, 'Appointments')"><i class="fas fa-calendar-check"></i> Appointments</a>
            <a class="tablinkspc" href="#" onclick="openCity(event, 'Profile_Page')"><i class="far fa-user-circle"></i> Profile</a>
            <?php
    } ?>

    <a class="tablinkspc appinsertbtnpc"  style="position: absolute;
    background-color: black;
    padding: 10px;
    right: 0%;
    width: 150;
    margin-top: -10px;
    margin-right: 1%;"onclick="<?php if(!empty($_SESSION["Email"])){
echo 'openappinsert()';

}else{
  echo 'registertocontinue()';
} ?>" id="" href="#"><i class="fas fa-book"> </i> Book Now!</a></div>


    </div>
    <div class="">

    </div>
    </div>

    <div class="topbarmobile" style="">


      <div class="logo">
        <h1>J Gonzales</h1>
      </div>
        <div id="top-bar" style="">
            <p><i class="fas fa-bars" id="menu-btn" onclick="openSideBar()"></i>   <span id="Page_Section" style="font-size: 34px;"></span><i class="fas fa-book" id="appinsert-btn" onclick="<?php if(!empty($_SESSION["Email"])){
        echo 'openappinsert()';

        }else{
          echo 'registertocontinue()';
        } ?>"> </i><br>


        </div>
        </div>


    <div id="side-bar">
        <div id="side-bar-head">
			<?php //
    if (isset($_SESSION["Patient_Id"]))
    { ?>
            <div id="profile">
                <span><img id="profile-picture" src="<?php echo $_SESSION["Image"]; ?>"></span>
                <p id="profile-name"><?php echo $_SESSION["First_Name"]; ?> <?php echo $_SESSION["Last_Name"]; ?></p>
            </div>
            <?php
    }
    else if (isset($_SESSION["Staff_Id"]))
    { ?>
            <div id="profile">
                <span><img id="profile-picture" src="<?php echo $_SESSION["Image"]; ?>"></span>
                <p id="profile-name"><?php echo $_SESSION["Branch"]; ?> Staff </p>
            </div>

			<?php
    }
    else
    { ?>
                <br>
				<a href="login_page.php" class="no-acc"><i class="fas fa-sign-out-alt"></i>Login</a></p><hr style="width : 50%">
                <a href="register_page.php" class="no-acc"><i class="fas fa-sign-out-alt"></i>Register</a></p>
			<?php
    } ?>
        </div>

		<br>
        <a class="tablinks" href="#" onclick="openCity(event, 'Home')"><i class="fas fa-home"></i> Home</a><br>

        <a class="tablinks" href="#" onclick="openCity(event, 'Services')"><i class="fas fa-clipboard-list"></i> Services</a><br>

        <a class="tablinks" href="#" onclick="openCity(event, 'Doctors')"><i class="fas fa-user-md"></i> Doctors</a><br>

        <a class="tablinks" href="#" onclick="openCity(event, 'Gallery')"><i class="far fa-images"></i> Gallery</a><br>

        <a class="tablinks" href="#" onclick="openCity(event, 'Contact_Us')"><i class="fas fa-phone"></i> Contact Us</a><br>

		<?php //
    if (isset($_SESSION["Patient_Id"]))
    { ?>
            <a class="tablinks" href="#Appointments" onclick="openCity(event, 'Appointments')"><i class="fas fa-calendar-check"></i> Appointments</a><br>
            <a class="tablinks" href="#Profile_Page" onclick="openCity(event, 'Profile_Page')"><i class="fas fa-phone"></i>  Profile</a><br>
            <?php
    } ?>

        <?php if (isset($_SESSION["Staff_Id"]))
    { ?>
            <a class="tablinks" href="#Staff_Panel" onclick="openCity(event, 'Staff_Panel')"><i class="fas fa-users-cog"></i> Staff Panel</a><br>
        <?php
    } ?>
        <?php if (isset($_SESSION["Email"]))
    { ?>
        <a class="tablinks" href="PHP/logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a><br>
        <?php
    } ?>


    </div>
    <div id="tabs">
      <?php if (isset($_SESSION["Staff_Id"]))
  { ?>

      <div class="tabcontent" id="Staff_Panel">
          <input type="hidden" name="" id="Branch" value="<?php echo $_SESSION["Branch"] ?>">
            <?php  if (isset($_SESSION["Staff_Id"])) { ?>
              <button type="button" class="Staff_Btn" onclick="AppPanelOpen()">Appointments</button><button type="button" class="Staff_Btn" onclick="UserPanelOpen()">Patients</button><button type="button" class="Staff_Btn" onclick="StaffAccountOpen()">Staff Account</button>
<div id="filterApp">
<p>Filters : </p>
<input  class="filterinputs" type="text" placeholder="Search..">
<input  class="datefilter" type="date"  placeholder="Search..">
<input  class="timefilter" type="time"  placeholder="Search..">
</div>
<br>
  <?php } ?><br>
  <div id="AppPanel">

<div class="AppPanel" style="margin-bottom:10px;">

</div>
<div class="AppInfo">

</div>
            </div>

            <script>
            $(document).ready(function(){
              $(".filterinputs").on("change", function() {
                var value = $(this).val().toLowerCase();
                $(".AppPanel *").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
              $(".datefilter").on("change", function() {
                var value = $(this).val().toLowerCase();
                $(".AppPanel *").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
              $(".timefilter").on("change", function() {
                var value = $(this).val().toLowerCase();
                $(".AppPanel *").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });

            });
            </script>



        </div>
        <div id="UserPanel" class="tabcontent">
          <p>Patient Panel</p>

        <?php
        $query = "SELECT * FROM patients";
        $result = mysqli_query($con, $query);

echo "<table id='patient_panel_table'>";
echo "<tr><th> First Name</th><th>Last_Name</th><th>Action</th></tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr><td>" . $row['First_Name'] . "</td><td>" . $row['Last_Name'] . "</td><td>".'<i class="far fa-comments" data-role="send_message" data-id='. $row["chat_id"] . '> </i>'.'</td></tr>';  //$row['index'] the index here is a field name
}

echo "</table>";  ?>
<div id="message_container">
  <p align="center" style="font-size: 20px; color: white; background-color: #00b4d8; margin: 0; padding: 20; border-top-left-radius: 25px; border-top-right-radius: 25px; "><?php echo $_SESSION["Branch"] ?> Admin  <i class="far fa-times-circle" id="closemessagesbtn" onclick="closemessages()" style="float: right;"></i></p>


  <div id="message_history">


    <i class="fas fa-spinner" style="font-size: 50px;"></i>


  </div>
  <form id="send_message_form" method="post">
    <textarea style="resize: none;" name="message_content" required="true" id="message_content"></textarea>
    <i class="fas fa-paper-plane" name="send_message" id="send_message_btn"></i>
    <input type="hidden" name="message_id" id="message_id" value="<?php echo uniqid("MSG") ?>">
    <input type="hidden" name="display_name" id="display_name" value="<?php echo $_SESSION['Branch']; ?> Staff">

    <input type="hidden" name="chat_id" id="chat_id" value="<?php echo $_SESSION["chat_id"]; ?>">
    <input type="hidden" name="author_id" id="author_id" value="<?php if (isset($_SESSION["Patient_Id"])) {
      echo $_SESSION["Patient_Id"];
    }elseif (isset($_SESSION["Staff_Id"])){
      echo $_SESSION["Staff_Id"];
    }else{
      echo '';
    } ?>">

  </form>


</div>
        </div>
<div id="StaffAccount" class="tabcontent">
  <?php if ($_SESSION["Branch"] != 'All') { ?>
    <div class="">

    </div>
  <?php }else{ ?>
    <form class="" action="PHP/staffaccountcreate.php" method="post">
      Email :
      <input type="text" id="staffemailinput" value="">
      <p>This is how it looks like <span id="emailpreview" style="color: green;"></span> </p>
      <input type="hidden" id="usernamestaff"name="User_Name" value="">
      Branch :
      <select class="" name="Branch">
        <option value=""></option>
        <option value="Cupang">Cupang</option>
        <option value="Paranaque">Paranaque</option>
        <option value="Makati">Makati</option>
      </select>
      <input type="hidden" name="Verified" value="1"><br><br>
      Password :
      <input type="text" name="Password" value="">
      <input type="submit" name="" value="create staff account">
    </form>
    <table border=1>
        <tr>
          <td>Email</td>
          <td>Branch</td>
          <td>Action</td>
        </tr>

          <?php
            $sql = "SELECT * FROM staffs";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
              <td>
                <?php echo $row["User_Name"] ?>
              </td>
              <td>
                <?php echo $row["Branch"] ?>
              </td>
              <td>
                <?php if ($row["Branch"] != 'All'){ ?>
                  <button type="button" data-role="dltstacc" data-id="<?php echo $row["Staff_Id"] ?>" name="button">Delete</button>
                <?php }else{ ?>
                  admin account.
                <?php } ?>

              </td>
              </tr>
          <?php }?>


    </table>
  <?php } ?>
</div>
      </div>
<?php
  } ?>

<!--
tab contents
-->
        <div class="tabcontent" id="Home" style="position: relative;">

            <div class="home-content" style="background-color: 	#71c7ec; ">

              <div id="slideshow">
                <div class="slideshow-container">
                    <section><img src="img/clinic_side_view.jpg" alt=""> </section>
                      <section><img src="img/patient_with_doctor.jpg" alt=""></section>
                      <section><img src="img/table_1.jpg" alt=""></section>
                      <section><img src="img/table_1.jpg" alt=""></section>


                </div>
                <br>

              <br>
</div>

            <p style="text-indent: 50px; margin: 20px;">Our dental team at J Gonzales Dental Center aims to provide a positive experience at the dentist when our patients visit. We strive for the quality of care you receive must meet your personal standards of health and comfort. We guarantee to provide you with the utmost gentle care that you deserve, from routine procedures such as simple as  general cleaning to a complicated wisdom tooth surgery and provide every service with a smile. </p>

            <p style="text-indent: 50px; margin: 20px;">In this pandemic we are ensuring safe and effective oral care for patients coming from all walks of life. We provide quality treatments at an affordable price.</p>
            </div>

            <div class="fb-page-div">
            <div class="fb-page" data-href="https://www.facebook.com/jgonzalesdentalcenter" data-tabs="timeline" data-width="500" data-height="630px" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/jgonzalesdentalcenter" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jgonzalesdentalcenter">J Gonzales Dental Center</a></blockquote></div>
            </div>
            <div class="awards">
              <h3 >Awards</h3>
              <div class="award-list">
<?php
$sql = "SELECT * FROM awards;";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)){ ?>
  <img src="<?php echo $row["image"] ?>" alt="">
  <p><?php echo $row["award_id"] ?></p>
<?php
}
?>
              </div>
            </div>
            <div class="info">
              <h3>Info</h3>
            </div>


        </div>
        <div class="tabcontent" id="Services" >
            <?php

            $sql = "SELECT * FROM service ORDER BY service ASC";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {?>
              <div id="darkenSvc" onclick="serviceClose('<?php echo "SERVICE" . $row["service_id"]; ?>')"></div>
            <div class="services" style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 180, 216, 0.73)), url('<?php echo $row['image1']; ?>');" onclick="serviceOpen('<?php echo "SERVICE" . $row["service_id"]; ?>')">
              <h3 align="center"> <?php echo $row["service"]; ?> <?php if (!empty($row["type"])) {
                  echo '(' . $row["type"] . ')' ;
                }?></h3>

                <?php if (!empty($row["fixed_price"])){ ?>
                                  <p style="margin: 20px; position: absolute; bottom: 5%; " >Fixed Price : <?php echo $row["fixed_price"] ?></p>
                                <?php }?>
                                <?php if (!empty($row["estimated_price"])){ ?>
                                  <p style="margin: 20px; position: absolute; bottom: 5%; " >Estimated Price : <?php echo $row["estimated_price"] ?></p>
                                <?php }?>

            </div>

<div class="services-big" id="SERVICE<?php echo $row["service_id"] ?>" style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 180, 216, 0.73)), url('<?php echo $row['image1']; ?>');">
  <div id="<?php echo "CAROUSEL" . $row["service_id"] ?>" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo $row["image1"] ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $row["image2"] ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $row["image3"] ?>" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <p style="text-align: center;"> <b> <?php echo $row["service"] ?></b></p>
  <p style="margin: 10px;">Type : <?php echo $row["type"] ?></p>
  <?php if (!empty($row["fixed_price"])){ ?>
    <p style="margin: 20px; " >Fixed Price : <?php echo $row["fixed_price"] ?></p>
  <?php }?>
  <?php if (!empty($row["estimated_price"])){ ?>
    <p style="margin: 20px;" >Starting <?php echo $row["estimated_price"] ?></p>
  <?php }?>
  <p style="margin: 10px;">Description : <?php echo $row["description"] ?></p>

</div>
            <?php } ?>

        </div>
        <div class="tabcontent" id="Doctors">
            <h4>Doctors</h4>
        </div>
        <div class="tabcontent" id="Gallery">
            <h4>Gallery</h4>
        </div>

        <div class="tabcontent" id="Contact_Us">
            <h4>Contact Us</h4>
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FManila&src=ai5nb256YWxlcy5kZW50YWxjbGluaWNAZ21haWwuY29t&src=ZW4ucGhpbGlwcGluZXMjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%230B8043&showTitle=0&showPrint=0&showTz=0" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
        <?php if (isset($_SESSION["Patient_Id"]))
    { ?>
        <div class="tabcontent" id="Appointments">
            <p>Your Appointments</p>
            <?php if (isset($_GET["success"]))
        { ?>
		<p class="success"><?php echo $_GET["success"]; ?></p>
	        <?php
        } ?>

          <?php if (isset($_GET["error"]))
        { ?>
  <p class="error"><?php echo $_GET["error"]; ?></p>
        <?php
        } ?>

<div class="appointment_list">
  <div class="appointment-listing">
  </div>
  <div class="appointment-info">
    <div style="margin: auto; width: 50%; ">
<p align="center">Select an appointment to manage.</p>
    </div>
  </div>
</div>

<div id="message_container">
  <p align="center" style="font-size: 20px; color: white; background-color: #00b4d8; margin: 0; padding: 20; border-top-left-radius: 25px; border-top-right-radius: 25px; "><?php echo $_SESSION["Branch"] ?> Admin  <i class="far fa-times-circle" id="closemessagesbtn" onclick="closemessages()" style="float: right;"></i></p>


  <div id="message_history">


    <i class="fas fa-spinner" style="font-size: 50px;"></i>


  </div>
  <form id="send_message_form" method="post">
    <textarea style="resize: none;" name="message_content" required="true" id="message_content"></textarea>
    <i class="fas fa-paper-plane" name="send_message" id="send_message_btn"></i>
    <input type="hidden" name="message_id" id="message_id" value="<?php echo uniqid("MSG") ?>">
    <input type="hidden" name="display_name" id="display_name" value="<?php echo $_SESSION['First_Name']; ?>">

    <input type="hidden" name="chat_id" id="chat_id" value="<?php echo $_SESSION["chat_id"] ?>">
    <input type="hidden" name="author_id" id="author_id" value="<?php if (isset($_SESSION["Patient_Id"])) {
      echo $_SESSION["Patient_Id"];
    }elseif (isset($_SESSION["Staff_Id"])){
      echo $_SESSION["Staff_Id"];
    }else{
      echo '';
    } ?>">

  </form>

</div>
<i class="far fa-comments" id="openmessagesbtn" onclick="openmessages()"> </i>
        </div>
        <div class="tabcontent" id="Profile_Page">
            <br>

          	<div style="box-shadow: 0 0 25px rgba(0, 0, 0, 0.25); width: 90%; position:relative; left: 5%;" >
              <br>
              <img src="https://www.tech101.in/wp-content/uploads/2018/07/blank-profile-picture.png" style="border-radius: 50%; width : 100px; display: block;height : 100px; margin-left: auto; margin-right: auto;">
              <br>
              <p style="text-align: center;">Name : <?php echo $_SESSION["First_Name"]; ?> <?php echo $_SESSION["Last_Name"]; ?></p>
              <p style="text-align: center;">Age : <?php echo $_SESSION["Age"]; ?></p>
              <p style="text-align: center;">Gender : <?php echo $_SESSION["Gender"]; ?></p>
              <p style="text-align: center;">Contact No : <?php echo $_SESSION["Contact_No"]; ?></p>
              <p style="text-align: center;">Address : <?php echo $_SESSION["Address"]; ?></p>
              <p style="text-align: center;">Civil Status : <?php echo $_SESSION["Civil_Status"]; ?></p>
      <br>
          	</div>
        </div>
        <?php
    } ?>

    </div>
<!-- insertapp -->
    <form action="PHP/insertapp.php" method="POST" id="appinsert" >
      <input type="hidden" name="Appointment_Id" value="<?php echo uniqid("AP"); ?>">

<input type="hidden" name="Patient_Id" value="<?php echo $_SESSION["Patient_Id"]; ?>">

 <input type="hidden" name="Branch" value="<?php echo $_SESSION["Branch"]; ?>">
      <div id="insertappslider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active insertapp-input-div">
        <p>What service do you want?</p>
        <select class="" name="Service" id="svcs">

          <?php

          $sql = "SELECT * FROM service";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row["service"].'">'.$row["service"].'</option>';
          }

          ?>
        </select>
        <div class="service-details" >

        </div>
        <button id="timedateinput" class="insert-slides-btn" data-bs-target="#insertappslider" data-bs-slide="next">
  Time and date - >
  </button>
      </div>
      <div class="carousel-item insertapp-input-div">
        <p> Preffered Time : <span><input type="time"  onchange="Time24()" name="Time" id="timeinput" min="10:00" max="17:00"></span></p>
    <p> Preffered Date : <span><input type="date" id="dateinput"name="Date" min="<?php echo date("Y-m-d"); ?>"></span></p>
      <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FManila&src=ai5nb256YWxlcy5kZW50YWxjbGluaWNAZ21haWwuY29t&src=ZW4ucGhpbGlwcGluZXMjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%230B8043&showTitle=0&showPrint=0&showTz=0" style="border:solid 1px #777" width="350" height="350" frameborder="0" scrolling="no"></iframe>
        <button  id="medicalinputbtn"class="insert-slides-btn" data-bs-target="#insertappslider" data-bs-slide="next">
medical history - >
  </button>
  <button class="insert-slides-btn"style="display: block;" data-bs-target="#insertappslider" data-bs-slide="prev">
 <- service
</button>
      </div>
      <div class="carousel-item insertapp-input-div">
        <p> Medical History : <span><input type="text" id="medicalinput"name="Medical_History"></span></p>
          <p> Message : <span><textarea type="text" name="Message"></textarea></span></p>
        <button class="insert-slides-btn"style="display: block;"  data-bs-target="#insertappslider" data-bs-slide="prev">
       <- time and date
      </button>
      <input type="submit" name="" style="display: none;" id="appoint-btn"value="Appoint">
      </div>

    </div>
    <!--
    <button class="carousel-control-prev" type="button" data-bs-target="#insertappslider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#insertappslider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  -->
  </div>
    </form>
<script src="scripts/jqueryscripts.js">
</script>
</body>
</html>
<?php
}
?>
