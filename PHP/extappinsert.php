<?php
include "../includes/con_db.inc.php";

if(!empty($_POST["ext_id"])){
		$Appointment_Id = uniqid('AP');
		$Guest_Id = $_POST["ext_id"];
		$Service = $_POST["extservice"];
		$Time = $_POST["exttime"];
		$Date = $_POST["extdate"];
		$Status = "Pending";
		$Branch = $_POST["extbranch"];
		$Appointment_Type = "Oncall";
		  
		$addGuestAppointment = "INSERT INTO appointments(Appointment_Id, Patient_Id, Service, Time, Date, Status, Branch, type) VALUES('$Appointment_Id', '$Guest_Id', '$Service', '$Time', '$Date', '$Status', '$Branch', '$Appointment_Type')";
		$addGuestAppointmentResult = mysqli_query($con, $addGuestAppointment);

		if($addGuestAppointmentResult){
			echo "hey";
		}

}elseif(isset($_POST["extfirst_name"])){
	#guest values etc,
	$guestId = uniqid('GT');
	$guestfname = $_POST["extfirst_name"];
	$guestmname = $_POST["extmiddle_name"];
	$guestlname = $_POST["extlast_name"];
	$guestage = $_POST["extage"];
	$guestgender = $_POST["extgender"];
	$guestaddress = $_POST["extaddress"];
	$guestcontact = $_POST["extcontact"];
	$guestinfo = $_POST["extinfo"];

	$addGuest = "INSERT INTO guests(guest_id, first_name, middle_name, last_name, age, gender, address, contact_no, info) VALUES('$guestId', '$guestfname', '$guestmname', '$guestlname', '$guestage', '$guestgender', '$guestaddress', '$guestcontact', '$guestinfo')";
	$addGuestResult = mysqli_query($con, $addGuest);

	if($addGuestResult){
		$Appointment_Id = uniqid('AP');
		$Guest_Id = $guestId;
		$Service = $_POST["extservice"];
		$Time = $_POST["exttime"];
		$Date = $_POST["extdate"];
		$Status = "Pending";
		$Branch = $_POST["extbranch"];
		$Appointment_Type = "Oncall";
		
		$addGuestAppointment = "INSERT INTO appointments(Appointment_Id, Patient_Id, Service, Time, Date, Status, Branch, type) VALUES('$Appointment_Id', '$Guest_Id', '$Service', '$Time', '$Date', '$Status', '$Branch', '$Appointment_Type')";
		$addGuestAppointmentResult = mysqli_query($con, $addGuestAppointment);

		if($addGuestAppointmentResult){
			echo "hey";
		}
	}else{
		echo "failed sql(addguestt)";
	}
}