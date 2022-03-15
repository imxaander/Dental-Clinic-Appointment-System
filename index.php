<?php
include "includes/con_db.inc.php";
session_start();
$Patient_Id = $_SESSION["Patient_Id"] ?? "";
$Branch = $_SESSION["Branch"] ?? "";

$debugging = true;
if($debugging == true){
  error_reporting(0);
  ini_set('display_errors', 0);
}

if ($_SESSION["Verified"] == "0")
{
    session_destroy();
    header("Location: /login_page.php?error=Please check your email and click the link from us to verify. Check your spam if necessary.");
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

      <script   src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <link  href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <script href="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>


<link href='https://fonts.googleapis.com/css?family=Clicker%20Script' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=News%20Cycle' rel='stylesheet'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css" href='styles/indexstylesmobile.css' />
<link rel="stylesheet" type="text/css" href='styles/indexstylespc.css' />
<link rel="stylesheet" href="styles/teststyle.css">
<link rel="stylesheet" href="styles/minigallery.css">
<script src="scripts/slideshow.js"></script>
<script src="scripts/indexscripts.js"></script>
<script type="text/javascript" src="scripts/minigallery.js"></script>

<script src="https://malsup.github.io/jquery.form.js"></script>

<script src="https://kit.fontawesome.com/6b9c8a6e93.js"></script>


<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="qtfS508k"></script>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="stylesheet" href="styles/fonts.css">
<title>J Gonzales Dental Center</title>
</head>

<body>


<!--calendar initiation-->
<?php
        if (isset($_SESSION["Branch"])) {

        ?>
        <div id="calendar"> </div>
        <?php
        }
        ?>



<input type="hidden" id="user_idP" value='<?php echo $_SESSION["Patient_Id"]?>'>
<input type="hidden" id="user_Branch" value='<?php echo $_SESSION["Branch"]?>'>
<div id="darken" onclick="closeSideBar()"></div>
<div class="top-logo-pc">

  <!-- logo div -->
  <div class="logo-div">
    <img src="https://media.discordapp.net/attachments/793749939430621194/870198473633452042/unknown.png" alt="" style="height: 90;" class="logo-pc">
  </div>



  <!-- accountinf div -->

  <!-- if its patient id -->
  <div class="acc-div" style="padding-top: 10px;">
    <?php if (isset($_SESSION["Patient_Id"]))
    { ?>
    <a class="tablinks" href="#Profile_Page" onclick="openCity(event, 'Profile_Page')"><i class="far fa-user-circle"></i> <?php echo $_SESSION["First_Name"] . " " . $_SESSION["Last_Name"] ?></a>
    <hr>
    <a class="tablinks" href="PHP/logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a><br>
    <?php
  }
   ?>

  <!-- if no branch  -->
    <?php if (empty($_SESSION["Branch"]))
    { ?>
    <a class="tablinks" href="login_page.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Login</a>
    <hr>
    <a class="tablinks" href="login_page.php?register=1" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Register</a><br>
    <?php
    } ?>

    <!-- if its staff id -->
    <?php if (isset($_SESSION["Staff_Id"]))
    { ?>
    <a class="tablinks" ><i class="far fa-user-circle"></i> <?php echo $_SESSION["Branch"] . " Staff" ?></a>
    <hr>
    <a class="tablinks" href="PHP/logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a><br>
    <?php
    } ?>
  </div>

<!-- div top logo pc end -->
</div>



<!-- top bar pc start-->
<div class="topbarpc">

    <!-- top bar pc start-->
    <div id="top-bar-pc">

      <!-- collection of tablinks-->
      <div class="tablinkspcbar">


        <a class="tablinkspc jgTitles2" href="#" onclick="openCity(event, 'Home')"><i class="fas fa-home"></i> Home</a>

        <a class="tablinkspc jgTitles2" href="#" onclick="openCity(event, 'Services')"><i class="fas fa-clipboard-list"></i> Services</a>

        <!-- <a class="tablinkspc" href="#" onclick="openCity(event, 'Doctors')"><i class="fas fa-user-md"></i> Doctors</a> -->

        <a class="tablinkspc jgTitles2" href="#" onclick="openCity(event, 'Gallery')"><i class="far fa-images"></i> Photos </a>

        <a class="tablinkspc clrefresh jgTitles2" href="#" onclick="openCity(event, 'Contact_Us')"><i class="fas fa-phone"></i> About Us</a>

        <!-- if it does have staff, add staff panel  -->
        <?php if (isset($_SESSION["Staff_Id"]))
        { ?>
        <a class="tablinkspc jgTitles2" href="#" onclick="openCity(event, 'Staff_Panel')"><i class="fas fa-users-cog"></i> Staff Panel</a><br>
        <?php
        } ?>


        <?php //
        if (isset($_SESSION["Patient_Id"]))
        { ?>
            <a class="tablinkspc jgTitles2" href="#" onclick="openCity(event, 'Appointments')"><i class="fas fa-calendar-check"></i> Appointments</a>

            <a class="tablinkspc jgTitles2" href="#" onclick="openCity(event, 'Profile_Page')"><i class="far fa-user-circle"></i> Profile</a>

        <?php
        } ?>

        <?php
        if(isset($_SESSION["Staff_Id"]))
        {?>

        <?php
        }else{
          ?>

        <a class="tablinkspc appinsertbtnpc clrefresh"  style="
        background-color: black;
        padding: 5px;
        float: right;
        width: 150;
        color: #00b4d8;
        background-color: white;
        margin-top: -5px;
        margin-right: 1%;"onclick="<?php
          if(!empty($_SESSION["Email"])){
          echo 'openappinsert()';
        }else{
          echo 'registertocontinue()';
        } ?>"
        id=""
        href="#">
        <i class="fas fa-book"></i> Book Now!
        </a>

    <?php }?>
      <!-- tablinks pc bar end -->
      </div>

    <!-- top bar pc id end -->
</div>


<!-- topbar pc class end -->
    </div>


<!-- topbar mobile class start -->
<div class="topbarmobile" style="">

        <!-- topbar mobile logostart -->
      <div class="logo">
        <h1>J Gonzales</h1>
        <h1>Dental Center</h1>
      </div>

        <!-- topbar mobile class start -->
      <div id="top-bar" style="">
        <p><i class="fas fa-bars" id="menu-btn" onclick="openSideBar()"></i>
        <span id="Page_Section" style="font-size: 34px;"></span><i class="fas fa-book" id="appinsert-btn" onclick="<?php if(!empty($_SESSION["Email"])){
        echo 'openappinsert()';
        }else{
          echo 'registertocontinue()';
        } ?>"> </i><br>
        </div>

</div>

<!-- side bar  start-->
<div id="side-bar">

<!-- side bar head which contains the little photo and name -->
  <div id="side-bar-head">

    <?php
    if (isset($_SESSION["Patient_Id"]))
    { ?>
            <div id="profile">
                <span><img id="profile-picture" src="<?php echo 'img/patients/' . $_SESSION["Image"]; ?>"></span>
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
                <a href="login_page.php?register=1" class="no-acc"><i class="fas fa-sign-out-alt"></i>Register</a></p>
            <?php
    } ?>

<!-- the divs are complete, end of side bar head -->
  </div>

        <br>
<!-- tablinks, choices at the side -->
<a class="tablinks" href="#" onclick="openCity(event, 'Home')"><i class="fas fa-home"></i> Home</a><br>
<a class="tablinks" href="#" onclick="openCity(event, 'Services')"><i class="fas fa-clipboard-list"></i> Services</a><br>
<a class="tablinks" href="#" onclick="openCity(event, 'Gallery')"><i class="far fa-images"></i> Photos</a><br>
<a class="tablinks clrefresh" href="#" onclick="openCity(event, 'Contact_Us')"><i class="fas fa-phone"></i> About us</a><br>

<!-- if its patient, add also these links -->
    <?php
    if (isset($_SESSION["Patient_Id"]))
    { ?>
            <a class="tablinks" href="#Appointments" onclick="openCity(event, 'Appointments')"><i class="fas fa-calendar-check"></i> Appointments</a><br>
            <a class="tablinks" href="#Profile_Page" onclick="openCity(event, 'Profile_Page')"><i class="fas fa-phone"></i>  Profile</a><br>
            <a class="tablinks" href="#notifications" onclick="openCity(event, 'Notifications')" data-role="viewnotif" data-id="<?php echo $Patient_Id ?>"><i class="far fa-user-circle"></i> Notifications <span style="background-color: white; color: black; padding: 5px; border-radius: 6px;"><?php
            $sql = "SELECT * FROM notifications WHERE viewed = '0' AND patient_id = '$Patient_Id' ";
            $result = mysqli_query($con, $sql);

            echo mysqli_num_rows($result);

             ?><span></a>

    <?php
    } ?>

    <!-- if its a staff-->
    <?php if (isset($_SESSION["Staff_Id"]))
    { ?>
            <a class="tablinks" href="#Staff_Panel" onclick="openCity(event, 'Staff_Panel')"><i class="fas fa-users-cog"></i> Staff Panel</a><br>
    <?php
    } ?>

    <!-- if it does have an email, add logout-->
    <?php if (isset($_SESSION["Email"]))
    { ?>
    <br>
    <br>
        <a class="tablinks" href="PHP/logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a><br>
    <?php
    } ?>

<!-- end of side bar -->
</div>

<!-- tabs starting div -->
<div id="tabs">

  <?php if (isset($_SESSION["Staff_Id"]))
  { ?>
    <div class="tabcontent" id="Staff_Panel">
    <i class="fa fa-calendar" style="position:fixed; bottom: 5%; right:5%; "id="opencalendarbtn" onclick=""> </i>
    <input type="hidden" name="" id="Branch" value="<?php echo $_SESSION["Branch"] ?>">

  <?php  if (isset($_SESSION["Staff_Id"])) { ?>




    <?php if($Branch !== 'All'){?>
      <button type="button" class="Staff_Btn" onclick="AppPanelOpen()">Appointments</button>
      <button type="button" class="Staff_Btn" onclick="UserPanelOpen()">Patients</button>
      <button type="button" class="Staff_Btn" onclick="StaffAccountOpen()">Staff Account</button>
    <?php }else{ ?>
      <button type="button" class="Staff_Btn" onclick="AppPanelOpen()" style="width: 33%;">Appointments</button>
      <button type="button" class="Staff_Btn"  style="width: 33%" onclick="UserPanelOpen()">Patients Info</button>
      <button type="button" class="Staff_Btn" onclick="StaffAccountOpen()" style="width: 33%;">Staff Account</button>
    <?php } ?>


    <!-- filter app-->

    <div id="filterApp">
    <p>Filters : </p>
    <input  class="filterinputs" type="text" id="filterinputt" placeholder="Search..">
    <input  class="datefilter" type="date"  placeholder="Search..">
    <input  class="timefilter" type="time"  placeholder="Search..">
    <button id="clear-filters" onclick="clearFilters()"> Clear Filters</button>
    <?php
      if($Branch != 'All'){
        echo '<input id="extAppAdd"type="button" value="Add an Appointment">';
      }
    ?>

    <!-- filter app end -->
    </div>
  <?php } ?>
  <br>

  <div id="AppPanel">

        <div class="AppPanel" style="margin-bottom:10px;"> </div>

        <div class="AppInfo"> </div>


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

    <!-- end of staff panel -->
</div>


<!-- start of user panel-->
<?php
if($Branch != 'All'){?>


<div id="UserPanel" class="tabcontent">
  <?php
    $query = "SELECT * FROM patients WHERE Branch = '$Branch'";
    $result = mysqli_query($con, $query);
echo "<table id='patient_panel_table'>";
echo "<tr><th> First Name</th><th>Last_Name</th><th>Action</th></tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr><td>" . $row['First_Name'] . "</td><td>" . $row['Last_Name'] . "</td><td>".'<i class="far fa-comments" data-role="send_message" data-id='. $row["chat_id"] . '> </i> <i class="fas fa-info-circle" data-role="viewProfileP" data-id='. $row["Patient_Id"] . '> </i>'.'</td></tr>';  //$row['index'] the index here is a field name
}
echo "</table>";  ?>

<!-- message container -->
  <div id="message_container">
        <p align="center" style="font-size: 20px; color: white; background-color: #00b4d8; margin: 0; padding: 20; border-top-left-radius: 25px; border-top-right-radius: 25px; "><?php echo $_SESSION["Branch"] ?> Admin  <i class="far fa-times-circle" id="closemessagesbtn" onclick="closemessages()" style="float: right;"></i></p>
        <div id="message_history">
        <img src="img/jgSpinner.svg"  class="jgLoading" alt="">
        </div>
    <form id="send_message_form" method="post">
      <div id="send_type">
        <textarea style="resize: none;" name="message_content" required="true" id="message_content"></textarea>
        <div class="sendcenter"><label id="imagesendlabel" for="img_content">+</label></div>

        <button type="button" id="send_message_btn"> send </button>


      </div>

      <input type="hidden" name="display_name" id="display_name" value="<?php echo $_SESSION['Branch']; ?> Staff">
      <input type="hidden" name="chat_id" id="chat_id" value="<?php if(isset($_SESSION["chat_id"])){ echo $_SESSION["chat_id"];}?>">
      <input type="hidden" name="author_id" id="author_id" value="<?php if (isset($_SESSION["Patient_Id"])) {
      echo $_SESSION["Patient_Id"];
      }elseif (isset($_SESSION["Staff_Id"])){
      echo $_SESSION["Staff_Id"];
      }else{
      echo '';
      } ?>">
  </form>
  <form id="send_image_form" method="post" enctype="multipart/form-data" action="PHP/sendimage.php">
  <!--message form-->

    <input type="file" name="message_content" required="true" id="img_content" style="display: none">


    <input type="hidden" name="type" id="img_type" value="image">
    <input type="hidden" name="message_id" id="img_id" value="<?php echo uniqid("MSG") ?>">
    <input type="hidden" name="display_name" id="display_name" value="<?php echo $_SESSION['Branch']; ?> Staff">

    <input type="hidden" name="chat_id" id="chat_ids" value="<?php echo $_SESSION["chat_id"] ?>">
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

<!-- end of userpanel or the patient's list -->

<?php
}else{?>
<div id="UserPanel" class="tabcontent">
  <?php
    $query = "SELECT * FROM patients";
    $result = mysqli_query($con, $query);
echo "<table id='patient_panel_table'>";
echo "<tr><th> First Name</th><th>Last_Name</th><th>Action</th></tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr><td>" . $row['First_Name'] . "</td><td>" . $row['Last_Name'] . "</td><td>".'<i class="far fa-comments" data-role="send_message" data-id='. $row["chat_id"] . '> </i> <i class="fas fa-info-circle" data-role="viewProfileP" data-id='. $row["Patient_Id"] . '> </i>'.'</td></tr>';  //$row['index'] the index here is a field name
}
echo "</table>";?>

<!-- message container -->
  <div id="message_container">
        <p align="center" style="font-size: 20px; color: white; background-color: #00b4d8; margin: 0; padding: 20; border-top-left-radius: 25px; border-top-right-radius: 25px; "><?php echo $_SESSION["Branch"] ?> Admin  <i class="far fa-times-circle" id="closemessagesbtn" onclick="closemessages()" style="float: right;"></i></p>
        <div id="message_history">
        <img src="img/jgSpinner.svg"  class="jgLoading" alt="">
        </div>
    <form id="send_message_form" method="post">
      <div id="send_type">
        <textarea style="resize: none;" name="message_content" required="true" id="message_content"></textarea>
        <button type="button" id="send_message_btn"> send </button>
        <div><label id="imagesendlabel" for="img_content">+</label></div>
      </div>

      <input type="hidden" name="display_name" id="display_name" value="<?php echo $_SESSION['Branch']; ?> Staff">
      <input type="hidden" name="chat_id" id="chat_id" value="<?php if(isset($_SESSION["chat_id"])){ echo $_SESSION["chat_id"];}?>">
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

<!-- end of userpanel or the patient's list -->

<?php
}
?>

<div id="StaffAccount" class="tabcontent">
  <?php if ($_SESSION["Branch"] != 'All') {
    echo "hi";
    ?>

    <br>

            <div style="box-shadow: 0 0 25px rgba(0, 0, 0, 0.25); width: 90%; position:relative; left: 5%;" >
              <br>
              <img src="<?php echo $_SESSION["Image"] ?>" style="border-radius: 50%; width : 100px; display: block;height : 100px; margin-left: auto; margin-right: auto;">
              <br>
              <p style="text-align: center;">Staff Id : <?php echo $_SESSION["Staff_Id"]; ?></p>
              <p style="text-align: center;">Username : <?php echo $_SESSION["Email"]; ?></p>
              <p style="text-align: center;">Branch : <?php echo $_SESSION["Branch"]; ?></p>

      <br>
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
        <option value="Taguig">Taguig</option>
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

            <p style="text-indent: 50px; margin: 20px; text-align: justify;
  text-justify: inter-word;" class="jgPara1">Our dental team at J Gonzales Dental Center aims to provide a positive experience at the dentist when our patients visit. We strive for the quality of care you receive must meet your personal standards of health and comfort. We guarantee to provide you with the utmost gentle care that you deserve, from routine procedures such as simple as  general cleaning to a complicated wisdom tooth surgery and provide every service with a smile. </p>

            <p style="text-indent: 50px; margin: 20px;" class="jgPara1">In this pandemic we are ensuring safe and effective oral care for patients coming from all walks of life. We provide quality treatments at an affordable price.</p>

            </div>

            <div class="fb-page-div">
            <div class="fb-page" data-href="https://www.facebook.com/jgonzalesdentalcenter" data-tabs="timeline" data-width="500" data-height="630px" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/jgonzalesdentalcenter" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jgonzalesdentalcenter">J Gonzales Dental Center</a></blockquote></div>
            </div>
  <br>
            <div style="grid-area: fbttl">
            <p class="jgTitles1" style="text-align:center; background-color: white;" id="feedback-title-p">Feedbacks</p>
            </div>

            <div class="awards">


              <div class="feedbacks">
                <div class="feedback-header" >
                  <p class="jgPara1"><b>Engrid Cenas</b></p>
                </div>
              <img class="feedback-img"src="https://media.discordapp.net/attachments/793749939430621194/932242866477076530/feedback_1.png">

                <div class="feedback-content">

                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <br><br>
                    <p class="jgPara2">"Nagpagawa ako ng pustiso last month at okay at mabilis ang pagkakagawa sa pustiso ko. Mababait din mga staff pati ang dentis duon. Thank you doc!"</p>

                </div>
              </div>
              <div class="feedbacks">
                <div class="feedback-header">
                  <p class="jgPara1"><b>Pewee Dela Cruz</b></p>
                </div>
                <img class="feedback-img" src="https://media.discordapp.net/attachments/793749939430621194/932242866695208960/feedback_2.png">
                <div class="feedback-content">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <br><br>
                    <p class="jgPara2">"Shoutout sa magaling na dentista and kay Doc Jen! ;) Sobrang worth it magpa linis and bunot dito kasi affordable tapos maganda pa quality ng service. Thank you po and more power po sa dental busienss nyo!"</p>

                </div>
              </div>
              <div class="feedbacks">
                <div class="feedback-header">
                  <p class="jgPara1"><b>Amirah Dagani</b></p>
                </div>
                <img class="feedback-img" src="https://cdn.discordapp.com/attachments/793749939430621194/932242866925875240/feedback_3.jpg">
                <div class="feedback-content">

                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <br><br>


                  <p class="jgPara2">"Mabaet at approachable po yung mga staff. The facility is well maintained and clean."</p>

                </div>
              </div>
              <br>
            </div>

            <div class="info">
              <br>
            <p class="jgTitles1" style="text-align:center;">Branches</p>
              <br>
              <div id="info-container">
                  <div class="branch-infos">
                  <h3> <b> <i class="fas fa-building"></i> Muntinlupa Branch </b></h3>
                  <p> <i class="fas fa-clock"></i> 11:00 AM - 6:00 PM</p>
                  <p> <i class="fas fa-calendar-week"></i> Tuesday to Saturday </p>
                  <p> <i class="fas fa-phone"></i> 09158420620 / 09224261426 </p>
                  <p> <i class="fas fa-map-marker-alt"></i> 500-A Manuel L Quezon St. Cupang Muntinlupa City </p>
                  <a style="font-size: 30px;" href="https://www.facebook.com/jgonzalesdentalcentermuntinlupa/"><p><i class="fab fa-facebook-square"></i><p></a>

                  </div>
                <div class="branch-infos">
                  <h3> <b> <i class="fas fa-building"></i> Paranaque Branch </b></h3>
                  <p> <i class="fas fa-clock"></i> 11:00 AM - 6:00 PM</p>
                  <p> <i class="fas fa-calendar-week"></i> Monday, Friday, Saturday, Sunday </p>
                  <p> <i class="fas fa-tty"></i> 8132584 </p>
                  <p> <i class="fas fa-map-marker-alt"></i> 248 Palanyag Road Brgy. San Dionisio Parañaque City </p>
                  <a style="font-size: 30px;" href="https://www.facebook.com/jgonzalesdentalcenter/"><p><i class="fab fa-facebook-square"></i></p></a>

                  </div>
                <div class="branch-infos">
                  <h3> <b> <i class="fas fa-building"></i> Taguig Branch </b></h3>
                  <br>
                  <br>
                  <h4> <b> Under Construction... </b></h4>
                  </div>
              </div>
            </div>


        </div>
        <div class="tabcontent" id="Services" >

            <?php
            $imgDirTmp= 'img/services/';
            $sql = "SELECT * FROM service ORDER BY service ASC";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {?>
              <div id="darkenSvc" onclick="serviceClose('<?php echo "SERVICE" . $row["service_id"]; ?>')"></div>
            <div class="services" style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 180, 216, 0.73)), url('<?php echo  $imgDirTmp . $row['image1']; ?>');" onclick="serviceOpen('<?php echo "SERVICE" . $row["service_id"]; ?>')">
              <h3 align="center" class="service-titles-small"> <?php echo $row["service"]; ?> </h3>



            </div>


<div class="services-big" id="SERVICE<?php echo $row["service_id"] ?>" style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 180, 216, 0.73)), url('<?php echo $imgDirTmp . $row['image1']; ?>');">
  <div id="<?php echo "CAROUSEL" . $row["service_id"] ?>" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#<?php echo "CAROUSEL" . $row["service_id"] ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo $imgDirTmp . $row["image1"] ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $imgDirTmp . $row["image2"] ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $imgDirTmp . $row["image3"] ?>" class="d-block w-100" alt="...">
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

  <!--service detail div-->
  <div class="service-details-container">
  <p style="text-align: center;" class="jgTitles2"> <b> <?php echo $row["service"] ?></b></p>

  <p style="margin: 10px;" class="jgPara1">Description : <?php echo $row["description"] ?></p>
  </div>

</div>
            <?php } ?>

        </div>

        <div class="tabcontent" id="Gallery">
          <br>
            <div id="gallery-parent">

              <?php

                  $patientPicturesDir = "img/gallery/patients/";
                  $galleryImgListPatients = glob($patientPicturesDir."*.jpg");
                  foreach($galleryImgListPatients as $patientsImage) { ?>
                 <div class="gallery-pictures-container" style="
                      background-image : url('<?php echo $patientsImage?>');
                      ">
                      <img src="<?php echo $patientsImage?>" class="gallery-pictures" width="100%">
                    </div>
                <?php
                }
              ?>
              <?php

                  $otherPicturesDir = "img/gallery/others/";
                  $galleryImgListOther = glob($otherPicturesDir."*.jpg");
                  foreach($galleryImgListOther as $otherImages) { ?>
                 <div class="gallery-pictures-container" style="
                      background-image : url('<?php echo $otherImages?>');
                      ">
                      <img src="<?php echo $otherImages?>" class="gallery-pictures" width="100%">
                    </div>
                <?php
                }
              ?>
            </div>
        </div>

        <div class="tabcontent" id="Contact_Us">


        <div style="background-color:#71c7ec;">
        <br>
        <h3 style="text-align: center">Awards & Certificates</h3>

              <div id="award-list">
              <?php

                  $awardsDir = "img/awards/";
                  $awardLists = glob($awardsDir."*.jpg");
                  $awardCounter = 1;
                  foreach($awardLists as $awardImages) { ?>
                 <img draggable="false" class="award-img" id="<?php echo $awardCounter++;?>" src="<?php echo $awardImages;?>" onclick="awardOpen(this)">
                <?php
                }
              ?>


              </div>
              <br>
              </div>
              <br>
              <div id="allMaps">
                <div class="branchLocations" id="pqueBranchInfo">
                  <div>
                  <iframe class="branch-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d574.2644784250107!2d120.99920569583867!3d14.474608021381131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ce7ab18663ad%3A0xfae00f9dcdfc897!2sJ%20Gonzales%20Dental%20Center!5e0!3m2!1sen!2sph!4v1642388908331!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>

                  <div>
                  <img class="branchImg" src="https://cdn.discordapp.com/attachments/793749939430621194/932599479046123530/20210811_155845.jpg">
                  </div>

                  <div style="display: table;  overflow: hidden;">
                    <div class="branch-info-about" style="display: table-cell; vertical-align: middle;">
                  <h3  align="center"> <b> <i class="fas fa-building"></i> Paranaque Branch </b></h3>
                  <br>
                  <p> <i class="fas fa-clock"></i> 11:00 AM - 6:00 PM</p>
                  <p> <i class="fas fa-calendar-week"></i> Monday, Friday, Saturday, Sunday </p>
                  <p> <i class="fas fa-tty"></i> 8132584 </p>
                  <p> <i class="fas fa-map-marker-alt"></i> 248 Palanyag Road Brgy. San Dionisio Parañaque City </p>
                  <a  style="font-size: 30px; text-align:center;" href="https://www.facebook.com/jgonzalesdentalcenter/%22%3E"><p><i align="center" class="fab fa-facebook-square"></i></p></a>
                    </div>
                  </div>

                </div>

                    <br>

                <div style="background-color: #71c7ec; ">
                <br>

                <div class="branchLocations" id="cupangBranchInfo" >


                <div>
                <iframe class="branch-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.867511491664!2d121.04796371352025!3d14.434797870904474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d10e089edb1d%3A0x588f74803c59bcde!2sJ%20Gonzales%20Dental%20Center%20Muntinlupa%20Branch!5e0!3m2!1sen!2sph!4v1642398375199!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <div>

                <img class="branchImg" src="https://media.discordapp.net/attachments/793749939430621194/932574664054702110/unknown.png?width=917&height=683">
                </div>

                <div style="display: table;  overflow: hidden;">
                  <div style="display: table-cell; vertical-align: middle;">
                <h3 align="center"> <b> <i class="fas fa-building"></i> Muntinlupa Branch </b></h3>
                <br>
                  <p> <i class="fas fa-clock"></i> 11:00 AM - 6:00 PM</p>
                  <p> <i class="fas fa-calendar-week"></i> Tuesday to Saturday </p>
                  <p> <i class="fas fa-phone"></i> 09158420620 / 09224261426 </p>
                  <p> <i class="fas fa-map-marker-alt"></i> 500-A Manuel L Quezon St. Cupang Muntinlupa City </p>
                  <a style="font-size: 30px; text-align:center;" href="https://www.facebook.com/jgonzalesdentalcentermuntinlupa/%22%3E"><p><i class="fab fa-facebook-square"></i><p></a>
                  </div>
                </div>




              </div>
              <br>
        </div>
                </div>

                </div>


            <img src="" id="award-view" class="imgViews" onclick="closeSideBar()">
            <img src="" id="img-view" class="imgViews" onclick="closeItself(this)">

        <?php if (isset($_SESSION["Patient_Id"]))
    { ?>
        <div class="tabcontent" id="Appointments">
        <br>
        <?php
  if (isset($Patient_Id)) {
  ?>
  <div id="menubtns">
 <a  style="color: white;" data-role="viewnotif" data-id="<?php echo $Patient_Id; ?>" id="opennotifpc"  onclick="openNotification()"><i class="far fa-bell" style="text-indent: -4;"> </i>  </a>
             <br>

            <i class="far fa-comments" id="openmessagesbtn" onclick="openmessages()"> </i>
            <br><br>
            <i class="fa fa-calendar" id="opencalendarbtn" onclick=""></i>

  </div>

  <?php
  }
  ?>

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
  <img src="img/jgSpinner.svg"  class="jgLoading" alt="">
  </div>
  <div class="appointment-info">
    Appointment Details
    <div style="margin: auto; width: 50%; ">
<p align="center">Select an appointment to manage.</p>
    </div>
  </div>
</div>
</div>

<div id="message_container">
  <p align="center" style="font-size: 20px; color: white; background-color: #00b4d8; margin: 0; padding: 20; border-top-left-radius: 25px; border-top-right-radius: 25px; "><?php echo $_SESSION["Branch"] ?> Admin  <i class="far fa-times-circle" id="closemessagesbtn" onclick="closemessages()" style="float: right;"></i></p>


  <div id="message_history">


  <img src="img/jgSpinner.svg"  class="jgLoading" alt="">


  </div>
  <form id="send_message_form" method="post" enctype="multipart/form-data">
  <!--message form-->
  <div id="send_type">
    <textarea style="resize: none;" name="message_content" required="true" id="message_content"></textarea>
    <div style="height:10" class="sendcenter"> <label for="img_content" id="imagesendlabel" >+</label> </div>
    <button type="button" id="send_message_btn"> send </button>

      </div>
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

  <form id="send_image_form" method="post" enctype="multipart/form-data" action="PHP/sendimage.php">
  <!--message form-->

    <input type="file" name="message_content" required="true" id="img_content" style="display:none;">

    <input type="hidden" name="type" id="img_type" value="image">
    <input type="hidden" name="message_id" id="img_id" value="<?php echo uniqid("MSG") ?>">
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
  </div>
  </div>
        <div class="tabcontent" id="Profile_Page">
            <br>

            <div style="box-shadow: 0 0 25px rgba(0, 0, 0, 0.25); width: 90%; position:relative; left: 5%;" >
              <br>
              <img src="<?php echo 'img/patients/' . $_SESSION["Image"]; ?>" style="border-radius: 50%; width : 100px; display: block;height : 100px; margin-left: auto; margin-right: auto;">
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
        <!-- notifications -->
        <div class="tabcontent" id="Notifications">
            <div id="notification-container" >
              <?php
              $sql = "SELECT * FROM notifications WHERE patient_id = '$Patient_Id' ORDER BY date DESC, time DESC";
              $result = mysqli_query($con, $sql);

              while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="notif" <?php if(!$row["viewed"] == 1){ ?>
                  style="background-color:  #00b4d8;
                  <?php } ?>">
                  <h5><?php echo $row["notif_title"] ?></h5>
                  <p class="notif-desc"><?php echo $row["notif_desc"] ?></p>
                  <p class="notif-td"><?php echo $row["time"] ?> <?php echo $row["date"] ?></p>
                </div>
                <hr>
                <?php }?>


            </div>


        </div>
        <?php
    } ?>

    </div>
<!-- insertapp -->
    <form action="PHP/insertapp.php" method="POST" id="appinsert" >
    <div id="appformheader">
    <h3 class="jgTitles1"> Book an Appointment</h3>
    </div>
      <input type="hidden" name="Appointment_Id" value="<?php echo uniqid("AP"); ?>">

<input type="hidden" name="Patient_Id" value="<?php echo $_SESSION["Patient_Id"]; ?>">

 <input type="hidden" name="Branch" value="<?php echo $_SESSION["Branch"]; ?>">


      <div id="insertappslider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active insertapp-input-div">
        <p class="jgTitles2">What service do you want?</p>
        <select class="" name="Service" id="svcs">

          <?php

          $sql = "SELECT * FROM service ";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_array($result)) {
            echo '<option class="jgPara1" value="'.$row["service"].'">'.$row["service"].'</option>';
          }

          ?>
        </select>
        <div class="service-details" >

        </div>
        <button id="timedateinput" class="insert-slides-btn right-btns clrefresh" data-bs-target="#insertappslider" data-bs-slide="next">
  Time and date
  </button>
      </div>
      <div class="carousel-item insertapp-input-div">
          <div>
        </div>
        <p class="right-btns"> Preffered Date : <span><input type="date" id="dateinput"name="Date" min="<?php echo date("Y-m-d"); ?>"></span></p>
        <p classs="left-btns"> Preffered Time :<select class="" name="Time" id="timeinput" id="svcs"> <option value=""></option> </select> </p>
        <!-- <input type="time"  onchange="Time24()" name="Time" id="timeinput" min="10:00" max="17:00">  -->
        <br>
          <br>
     <!-- app form calendar -->
     <div id="calendar2"> </div>
     <br>
        <button  id="medicalinputbtn"class="insert-slides-btn right-btns" data-bs-target="#insertappslider" data-bs-slide="next">
medical history
  </button>
  <button class="insert-slides-btn"style="display: block;" data-bs-target="#insertappslider" data-bs-slide="prev">
  Service
</button>
      </div>
      <div class="carousel-item insertapp-input-div">
        <p> Medical History : <span><input type="text" class="msg-txta"id="medicalinput"name="Medical_History"></span></p>
          <p> Message : <span><textarea type="text" class="msg-txta" name="Message" cols="50%"></textarea></span></p>
          <input type="submit" name=""  class="right-btns insert-slides-btn"style="display: none;" id="appoint-btn"value="Appoint">
        <button class="insert-slides-btn"style="display: block;"  data-bs-target="#insertappslider" data-bs-slide="prev">
        Time and Date
      </button>

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
  <br>
    </form>
          <?php
          if($Branch != 'All'){ ?>

    <!-- account creation to oncall appointments -->
    <form action="PHP/extappinsert.php" method="POST" id="extappinsert">
          <div id="extappinsertheader">
            <h3>Add an Appointment</h3>
        </div>
        <div id="extappinsertbody">
          Guest Id :
          <input type="text" name="ext_id" id="extid" onchange="updateGuestProfiles()"><br>
          <br>
          <input type="button" onclick="ProfileGuest()" value="Guest Info">

          Note: Add Guest Id if you want to add appointment to existing guest.<br><br>
            Name :
            <input type="text" name="extfirst_name" placeholder="First Name...">
            <input type="text" name="extmiddle_name"  placeholder="Middle Name...">
            <input type="text" name="extlast_name"  placeholder="Last Name...">
            Age :
            <input type="number" name="extage" >
            <br><br>
            Gender :
            <select name="extgender" class="input-boxes" >
        <option value=""></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br><br>
            Time and Date :
            <input type="date" name="extdate" required="true">
            <input type="time" name="exttime" required="true">
            Address :
            <input type="text" name="extaddress" required="true">
            <br><br>
            Branch :
            Current Branch : <input type="text" name="extbranch" readonly value="<?php echo $_SESSION['Branch'];?>">
            <br><br>
            Service :
            <select class="" name="extservice" id="svcs" required="true">

          <?php

          $sql = "SELECT * FROM service";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row["service"].'">'.$row["service"].'</option>';
          }

          ?>
            </select>
            Contact No. :
            <input type="text" name="extcontact" pattern="\d*" maxlength="11" minlength="11" placeholder="11 Digit number" class="input-boxes" required="true">
            <br><br>
            Info:
            <br>
            <textarea type="text" name="extinfo" cols="86" rows="9">
            Have you had any illness this past week ?

            Have you had any contact with someone who was ill this past week ?

            Where do you live ?

            Have you travel this past few weeks ?
            </textarea>
            <input style="float: right;" type="submit" value="Add this.">
        </div>
    </form>
    <?php
          }
          ?>


    <form method="post" target="popup" id="GuestProfile" style="display:none" action="profile.php" >
<input type="hidden" id="pprofileInput" name="Patient_Id" value="" />
<input type="hidden" name="Staff_Id" value="<?php echo $_SESSION["Staff_Id"] ?>" />
</form>
<script defer src="scripts/jqueryscripts.js">
</script>
</body>
</html>
<?php
}
?>
