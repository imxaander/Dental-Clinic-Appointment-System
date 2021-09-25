$(document).ready(function(){

$(document).on('click','a[data-role="cancel"]',function() {
  var Appointment_Id = $(this).data('id');
  var confirm = window.confirm("You sure want to cancel your appointment?")
if (confirm) {
    $.ajax({
        url : './PHP/cancel.php',
        method : 'post',
        data : {Appointment_Id : Appointment_Id },
        success: function (result){
          fetchappointments();
          fetchbranchappointments();
        }
    });
}else{

}
});
$(document).on('click','a[data-role="done"]',function() {
  var Appointment_Id = $(this).data('id');
  var confirm = window.confirm("Mark this as done?")
if (confirm) {
    $.ajax({
        url : './PHP/done.php',
        method : 'post',
        data : {Appointment_Id : Appointment_Id },
        success: function (result){
          fetchappointments();
          fetchbranchappointments();
        }
    });

}else{

}
});
$(document).on('click','a[data-role="delete"]',function() {
  var Appointment_Id = $(this).data('id');
  var confirm = window.confirm("delete this appointment??")
if (confirm) {
    $.ajax({
        url : './PHP/delete.php',
        method : 'post',
        data : {Appointment_Id : Appointment_Id },
        success: function (result){
          fetchappointments();
          fetchbranchappointments();
        }
    });

}else{

}
});
$(document).on('click','a[data-role="ongoing"]',function() {
  var Appointment_Id = $(this).data('id');
  var confirm = window.confirm("Mark this as Ongoing?")
if (confirm) {
    $.ajax({
        url : './PHP/ongoing.php',
        method : 'post',
        data : {Appointment_Id : Appointment_Id},
        success: function (result){
          fetchappointments();
          fetchbranchappointments();
        }
    });
}else{


}

});
$(document).on('click','button[data-role="updatetd"]',function() {
  var Appointment_Id = $(this).data('id');
  var etime = $('#etime').val();
  var edate = $('#edate').val();
  var confirm = window.confirm("Update time and date??");
if (confirm) {
    $.ajax({
        url : './PHP/editappointment.php',
        method : 'post',
        data : {Appointment_Id : Appointment_Id, etime : etime, edate: edate },
        success: function (result){
          fetchappointments();
          fetchbranchappointments();
        }
    });
}else{


}

});
$('#send_message_btn').click(function(){
  var message_content = $('#message_content').val();
  var chat_id = $('#chat_id').val();
  var author_id = $('#author_id').val();
  var message_id = $('#message_id').val();
var display_name = $('#display_name').val();
  if ($.trim(message_content) != '') {
    $.ajax({
      url: "./PHP/sendmessage.php",
      method: "POST",
      data: {message_content: message_content, chat_id: chat_id, author_id: author_id, message_id: message_id, display_name: display_name},
      success:function(data){
        $('#message_content').val("");
      }
    });
  }
});

$(document).on('click','i[data-role="send_message"]',function() {
  var chat_id = $(this).data('id');
  $('#chat_id').val(chat_id);

  openmessages();
  $("#message_history").scrollTop($("#message_history")[0].scrollHeight);
});
setInterval(function(){
  $('#message_history').load("./PHP/fetchmessages.php", {chat_id: $('#chat_id').val()}).fadeIn("slow");
  console.log($('.Message').length);

}, 500);

var currmsg = '0';
setInterval(function(){
var newmsg = $('.Message').length;
if (newmsg > currmsg) {
  currmsg = newmsg;
$("#message_history").scrollTop($("#message_history")[0].scrollHeight);


}else{

}
}, 10);

function fetchappointments(){
  $('.appointment-listing').load("./PHP/fetchappointments.php", {Patient_Id: $('#user_idP').val()}).fadeIn("slow");
  console.log("Appointment Refreshed.");
}
fetchappointments();

function fetchbranchappointments(){
  $('.AppPanel').load("./PHP/fetchbranchappointments.php", {Branch: $('#Branch').val()}).fadeIn("slow");
  console.log("Appointment Refreshed.");
}
fetchbranchappointments();
$(document).on('click','div[data-role="loadinfo"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.appointment-info').load("./PHP/fetchappointmentinfo.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");
});

$(document).on('click','div[data-role="loadinfo"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.AppInfo').load("./PHP/fetchappointmentinfo.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");

});
$(document).on('click','div[data-role="loadinfopatient"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.appointment-info').load("./PHP/fetchappointmentinfopatient.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");
});
$(document).on('click','div[data-role="loadinfopatient"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.AppInfo').load("./PHP/fetchappointmentinfopatient.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");
});


$('#svcs').on('change', function(){
  document.getElementById('timedateinput').style.display = "block";
  var service = this.value;
  $('.service-details').load("./PHP/fetchservicedetails.php", {service: service}).fadeIn("slow");
});
$('#timeinput').on('change', function(){
  document.getElementById('dateinput').style.display = "block";
});
$('#dateinput').on('change', function(){
  document.getElementById('medicalinputbtn').style.display = "block";
});
$('#medicalinput').on('change', function(){
  document.getElementById('appoint-btn').style.display = "block";
});
$('#staffemailinput').on('keyup', function(){
  var w1 = this.value;
  $('#emailpreview').text(w1 + '@jgonzales.com');
  $('#usernamestaff').val(w1 + '@jgonzales.com');
});

});



function Time24() {
      var x = document.getElementById("myTime").value;
        document.getElementById("myTime").value = x;
  }

  $('.tablinkspc').on('click', function(){
    $('.tablinkspc').removeClass('selected');
    $(this).addClass('selected');


});
