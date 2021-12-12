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
        success: function (data){
          fetchappointments();
          fetchbranchappointments();
          console.log(data);
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
  $('.appointment-listing').load("./PHP/fetchappointments.php", {Patient_Id: $('#user_idP').val()});
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

$(document).on('click','a[data-role="viewnotif"]',function() {
  var Patient_Id = $(this).data('id');
  $.ajax({
    url: "./PHP/viewnotif.php",
    method: "POST",
    data: {Patient_Id: Patient_Id},
    success:function(data){
      console.log(data);
    }
  });

});
$(document).on('click','button[data-role="dltstacc"]',function() {
  let Staff_Id = $(this).data('id');
  console.log(Staff_Id);
  $.ajax({
    url: "./PHP/staffaccountdelete.php",
    method: "POST",
    data: {Staff_Id: Staff_Id},
    success:function(data){
      console.log("success");
      location.reload();
    }
  });
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

var preftime = $('#timeinput');
var prefdate = $('#dateinput');

console.log(preftime);

//*** This code is copyright 2002-2003 by Gavin Kistner, !@phrogz.net
//*** It is covered under the license viewable at http://phrogz.net/JS/_ReuseLicense.txt

Date.prototype.customFormat = function(formatString){
  var YYYY,YY,MMMM,MMM,MM,M,DDDD,DDD,DD,D,hhhh,hhh,hh,h,mm,m,ss,s,ampm,AMPM,dMod,th;
  YY = ((YYYY=this.getFullYear())+"").slice(-2);
  MM = (M=this.getMonth()+1)<10?('0'+M):M;
  MMM = (MMMM=["January","February","March","April","May","June","July","August","September","October","November","December"][M-1]).substring(0,3);
  DD = (D=this.getDate())<10?('0'+D):D;
  DDD = (DDDD=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][this.getDay()]).substring(0,3);
  th=(D>=10&&D<=20)?'th':((dMod=D%10)==1)?'st':(dMod==2)?'nd':(dMod==3)?'rd':'th';
  formatString = formatString.replace("#YYYY#",YYYY).replace("#YY#",YY).replace("#MMMM#",MMMM).replace("#MMM#",MMM).replace("#MM#",MM).replace("#M#",M).replace("#DDDD#",DDDD).replace("#DDD#",DDD).replace("#DD#",DD).replace("#D#",D).replace("#th#",th);
  h=(hhh=this.getHours());
  if (h==0) h=24;
  if (h>12) h-=12;
  hh = h<10?('0'+h):h;
  hhhh = hhh<10?('0'+hhh):hhh;
  AMPM=(ampm=hhh<12?'am':'pm').toUpperCase();
  mm=(m=this.getMinutes())<10?('0'+m):m;
  ss=(s=this.getSeconds())<10?('0'+s):s;
  return formatString.replace("#hhhh#",hhhh).replace("#hhh#",hhh).replace("#hh#",hh).replace("#h#",h).replace("#mm#",mm).replace("#m#",m).replace("#ss#",ss).replace("#s#",s).replace("#ampm#",ampm).replace("#AMPM#",AMPM);
};


for(let i = 0; i < 7; i++){
  let tym = 60 * i;
  let baseTym = 7240000;
  let lastTym = new Date(baseTym + (tym * 60000));
  let finalTym = lastTym.customFormat('#hhh# : #mm# #AMPM#');
  let optionTC = document.createElement("option");
  let optionTT = document.createTextNode(finalTym);
  optionTC.setAttribute("value", lastTym.customFormat('#hhh#:#mm#'));
  optionTC.appendChild(optionTT);
  $('#timeinput').append(optionTC);
  console.log(finalTym);
}// Append the text to <li>

});



function Time24() {
      var x = document.getElementById("myTime").value;
        document.getElementById("myTime").value = x;
  }

  $('.tablinkspc').on('click', function(){
    $('.tablinkspc').removeClass('selected');
    $(this).addClass('selected');


//saving technique

var savebtn = $('#save-btn');

savebtn.on('click', () =>{
  var sharednotes = $('#sharednotes').val();
  var notesbranch = $('#user_Branch').val();

  
  document.getElementById('save-btn').innerHTML = 'Saving...';
  $.ajax({
    url : './PHP/savenotes.php',
    method : 'post',
    data : {Content : sharednotes, Branch : notesbranch},
    success: function (result){
      document.getElementById('save-btn').innerHTML = 'Saved.';
      console.log(result);
    }
});
})


});
//calendar
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    events: 'PHP/fetchevents.php'
  });
  calendar.render();
});
