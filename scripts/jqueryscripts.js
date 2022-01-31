$(document).ready(function(){
console.log("jquery is working")
  //cancel appointment
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
}
});
  //set to done appointment
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

}
});
  //delete appointment
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

}
});

//set to ongoing appointment
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
}
});

//update time and date appointment
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
}
});

//send messages
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

$('#message_content').keypress(function(event){
  console.log("message sent.")
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
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
  }
});


//refresh messages and open message panel
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

//scroll to the bottom message,
setInterval(function(){
var newmsg = $('.Message').length;
if (newmsg > currmsg) {
  currmsg = newmsg;
$("#message_history").scrollTop($("#message_history")[0].scrollHeight);

}else{
}
}, 10);


//fetch appointments patient
function fetchappointments(){
  $('.appointment-listing').load("./PHP/fetchappointments.php", {Patient_Id: $('#user_idP').val()});
  console.log("Appointment Refreshed.");
}
fetchappointments();

//fetch appointments for a branch
function fetchbranchappointments(){
  $('.AppPanel').load("./PHP/fetchbranchappointments.php", {Branch: $('#Branch').val()}).fadeIn("slow");
  console.log("Appointment Refreshed.");
}

//fetch appointments for a branch
fetchbranchappointments();
$(document).on('click','div[data-role="loadinfo"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.appointment-info').load("./PHP/fetchappointmentinfo.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");
});

//fetch a appointment information all information
$(document).on('click','div[data-role="loadinfo"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.AppInfo').load("./PHP/fetchappointmentinfo.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");
});

//kload informations for patient
$(document).on('click','div[data-role="loadinfopatient"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.appointment-info').load("./PHP/fetchappointmentinfopatient.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");
});

//kload informations for patient
$(document).on('click','div[data-role="loadinfopatient"]',function() {
  var Appointment_Id = $(this).data('id');
  $('.AppInfo').load("./PHP/fetchappointmentinfopatient.php", {Appointment_Id: Appointment_Id}).fadeIn("slow");
});

//view notifications
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

//delte accounts delete for allvbranch
$(document).on('click', 'button[data-role="dltstacc"]', function () {
        let Staff_Id = $(this).data('id');
        console.log(Staff_Id);
        $.ajax({
            url: "./PHP/staffaccountdelete.php",
            method: "POST",
            data: { Staff_Id: Staff_Id },
            success: function (data) {
                console.log("success");
                location.reload();
            }
        });
});
    //onchange service, should output something.
    $('#svcs').on('change', function () {
        document.getElementById('timedateinput').style.display = "block";
        var service = this.value;
        $('.service-details').load("./PHP/fetchservicedetails.php", { service: service }).fadeIn("slow");
    });

  //onchange time, should output something.
    $('#timeinput').on('change', function () {
        document.getElementById('dateinput').style.display = "block";
    });
    //onchange date, should output something.
    $('#dateinput').on('change', function () {
        document.getElementById('medicalinputbtn').style.display = "block";
    });
    //onchange medicalcondition, should output something.
    $('#medicalinput').on('change', function () {
        document.getElementById('appoint-btn').style.display = "block";
    });

    //onchange staffemail for all brancdh, change in text..
    $('#staffemailinput').on('keyup', function () {
        var w1 = this.value;
        $('#emailpreview').text(w1 + '@jgonzales.com');
        $('#usernamestaff').val(w1 + '@jgonzales.com');
    });

    $('#extAppAdd').on('click', function () {
        //add guest??
    });


    var preftime = $('#timeinput');
    var prefdate = $('#dateinput');

    console.log(preftime);

    //*** This code is copyright 2002-2003 by Gavin Kistner, !@phrogz.net
    //*** It is covered under the license viewable at http://phrogz.net/JS/_ReuseLicense.txt

    Date.prototype.customFormat = function (formatString) {
        var YYYY, YY, MMMM, MMM, MM, M, DDDD, DDD, DD, D, hhhh, hhh, hh, h, mm, m, ss, s, ampm, AMPM, dMod, th;
        YY = ((YYYY = this.getFullYear()) + "").slice(-2);
        MM = (M = this.getMonth() + 1) < 10 ? ('0' + M) : M;
        MMM = (MMMM = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][M - 1]).substring(0, 3);
        DD = (D = this.getDate()) < 10 ? ('0' + D) : D;
        DDD = (DDDD = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][this.getDay()]).substring(0, 3);
        th = (D >= 10 && D <= 20) ? 'th' : ((dMod = D % 10) == 1) ? 'st' : (dMod == 2) ? 'nd' : (dMod == 3) ? 'rd' : 'th';
        formatString = formatString.replace("#YYYY#", YYYY).replace("#YY#", YY).replace("#MMMM#", MMMM).replace("#MMM#", MMM).replace("#MM#", MM).replace("#M#", M).replace("#DDDD#", DDDD).replace("#DDD#", DDD).replace("#DD#", DD).replace("#D#", D).replace("#th#", th);
        h = (hhh = this.getHours());
        if (h == 0) h = 24;
        if (h > 12) h -= 12;
        hh = h < 10 ? ('0' + h) : h;
        hhhh = hhh < 10 ? ('0' + hhh) : hhh;
        AMPM = (ampm = hhh < 12 ? 'am' : 'pm').toUpperCase();
        mm = (m = this.getMinutes()) < 10 ? ('0' + m) : m;
        ss = (s = this.getSeconds()) < 10 ? ('0' + s) : s;
        return formatString.replace("#hhhh#", hhhh).replace("#hhh#", hhh).replace("#hh#", hh).replace("#h#", h).replace("#mm#", mm).replace("#m#", m).replace("#ss#", ss).replace("#s#", s).replace("#ampm#", ampm).replace("#AMPM#", AMPM);
    };

    //add time choices.
    for (let i = 0; i < 7; i++) {
        let tym = 60 * i;
        let baseTym = 7240000;
        let lastTym = new Date(baseTym + (tym * 60000));
        let finalTym = lastTym.customFormat('#hh# : #mm# #AMPM#');
        let optionTC = document.createElement("option");
        let optionTT = document.createTextNode(finalTym);
        optionTC.setAttribute("value", lastTym.customFormat('#hhh#:#mm#'));
        optionTC.appendChild(optionTT);
        $('#timeinput').append(optionTC);
        console.log(finalTym);
    }// Append the text to <li>




    //convert time to 24 hour format
    function Time24() {
        var x = document.getElementById("myTime").value;
        document.getElementById("myTime").value = x;
    }

    //auto styling on the buttons on tablinks
    $('.tablinkspc').on('click', function () {
        $('.tablinkspc').removeClass('selected');
        $(this).addClass('selected');
    });

    //saving technique



    //add first calendar

    var userBranch = $('#user_Branch').val();
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridWeek',
        events: `PHP/fetchevents.php?Branch=${userBranch}`,

        eventMaxStack: 3,

        dayPopoverFormat: {
          month: 'long',
          day: 'numeric',
          year: 'numeric'
        },
        themeSystem: 'Lux',
        dateClick: function(info) {
          alert('Clicked on: ' + info.dateStr);
          alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
          alert('Current view: ' + info.view.type);
          // change the day's background color just for fun
          info.dayEl.style.backgroundColor = 'red';
        }
    });

    //render it
    calendar.render();
    calendar.updateSize();


    //little calendar
    var calendar2Element = document.getElementById("calendar2");
    var calendar2 = new FullCalendar.Calendar(calendar2Element, {
        initialView: 'dayGridWeek',
        events: `PHP/fetchevents.php?Branch=${userBranch}`,
        dayMaxEvents: true,

    });

    //render it
    calendar2.render();
    calendar2.updateSize();

    function refreshAllCalendars() {
        calendar.render();
        calendar.updateSize();
        calendar2.render();
        calendar2.updateSize();
    }

    $('.clrefresh').on('click', function () {
        calendar.render();
        calendar.updateSize();
        calendar2.render();
        calendar2.updateSize();
        console.log("calendars are update.", Date())
    });

    $('.tablinks').on('click', function () {
        calendar.render();
        calendar.updateSize();
        calendar2.render();
        calendar2.updateSize();
        console.log("calendars are update.", Date())
    });

    $('#extAppAdd').on('click', ()=>{
      console.log("hu");
      openExtAppInsert();
    })

    $('#opencalendarbtn').on('click', ()=>{
      document.getElementById("darken").style.display = "block";
      document.getElementById('calendar').style.display = 'block';
      calendar.render();
      calendar.updateSize();
    })




//dynamic concept
// first, take this actions as a loop through the list of branches
// branchlist = ["etc", "tec", "cte"];
// for(branch of branchlist){
// var calendar = new FullCalendar.Calendar(calendar${branch}, {
// initialView: 'dayGridMonth',
// events: 'PHP/fetchevents.php?${branch}'
//  });
    //}


    //awards scrolling
    var awardContainer = document.getElementById('award-list');

    let pos = { top: 0, left: 0, x: 0, y: 0 };

    const mouseDownHandler = function (e) {
        pos = {
            // The current scroll
            left: awardContainer.scrollLeft,
            top: awardContainer.scrollTop,
            // Get the current mouse position
            x: e.clientX,
            y: e.clientY,
        };

        document.addEventListener('mousemove', mouseMoveHandler);
        document.addEventListener('mouseup', mouseUpHandler);
    };

    const mouseMoveHandler = function (e) {
        // How far the mouse has been moved
        const dx = e.clientX - pos.x;
        const dy = e.clientY - pos.y;

        // Scroll the element
        awardContainer.scrollTop = pos.top - dy;
        awardContainer.scrollLeft = pos.left - dx;
    };

    const mouseUpHandler = function () {
        document.removeEventListener('mousemove', mouseMoveHandler);
        document.removeEventListener('mouseup', mouseUpHandler);

        awardContainer.style.cursor = 'grab';
        awardContainer.style.removeProperty('user-select');
    };
    awardContainer.addEventListener('mousedown', mouseDownHandler);

    //validations


});


function awardOpen(image) {
  let awardView = document.getElementById('award-view');
  let darkend = document.getElementById("darken");
  console.log(image.src);
  awardView.src = image.src;
  awardView.style.display = 'block';
  darkend.style.display = 'block';
  /*
  let imageId = image.id;
  let imageDom = document.getElementById(imageId);
  imageDom.style.position = "fixed";
  imageDom.style.width = "100px";
  */
}
