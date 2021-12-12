function openSideBar() {
  if ($(window).width() < 700) {
    document.getElementById("side-bar").style.width = "70%";
    document.getElementById("darken").style.display = "block";

}
else {
  document.getElementById("side-bar").style.width = "20%";
  document.getElementById("darken").style.display = "block";

}

}

function closeSideBar() {
    document.getElementById("side-bar").style.width = "0%";
    document.getElementById("darken").style.display = "none";
    document.getElementById('appinsert').style.display = "none";
    if (document.getElementById('message_container')) {
      document.getElementById('message_container').style.display = "none";
    }

    var elems = document.getElementsByClassName('services-big');
for (var i=0;i<elems.length;i+=1){
  elems[i].style.display = 'none !important';
}

}

//tab contents
function openCity(evt, cityName) {

    if ($(window).width() < 740) {
      closeSideBar();
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
    } else {

      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");

    }



    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    if (cityName == 'Home') {
document.getElementById(cityName).style.display = "grid";
}else if(cityName == 'Services'){
  document.getElementById(cityName).style.display = "grid";
}else{
  document.getElementById(cityName).style.display = "block";
}


    evt.currentTarget.className += " active";
    document.getElementById('Page_Section').innerHTML = String(cityName);


}

function book_open(){
    document.getElementById("darken").style.display = "block";
    document.getElementById("appinsert").style.display = "block";

}
function serviceOpen(serviceid){
  document.getElementById(serviceid).style.display = "block";
  document.getElementById("darkenSvc").style.display = "block";
}
function serviceClose(serviceid){
  var elems = document.getElementsByClassName('services-big');
for (var i=0;i<elems.length;i+=1){
elems[i].style.display = 'none';
}
  document.getElementById("darkenSvc").style.display = "none";
}

function AppPanelOpen(){
  document.getElementById('AppPanel').style.display ='grid';
  document.getElementById('UserPanel').style.display ='none';
  document.getElementById('StaffAccount').style.display = 'none';
  document.getElementById('filterApp').style.display = 'block';
}
function UserPanelOpen(){
  document.getElementById('AppPanel').style.display ='none';
  document.getElementById('UserPanel').style.display ='block';
  document.getElementById('StaffAccount').style.display = 'none';
  document.getElementById('filterApp').style.display = 'none';
}

function StaffAccountOpen(){
  document.getElementById('AppPanel').style.display ='none';
  document.getElementById('UserPanel').style.display ='none';
  document.getElementById('StaffAccount').style.display = 'block';
  document.getElementById('filterApp').style.display = 'none';
}
function openappinsert(){
  document.getElementById('appinsert').style.display = "block";
  document.getElementById('darken').style.display = "block";
}
function closeappinsert(){
  document.getElementById('appinsert').style.display = "none";
  document.getElementById('darken').style.display = "none";
  console.log("document.getElementById('darken').style.display = hidde");
}
function openmessages(){
  document.getElementById('message_container').style.display = "block";
  document.getElementById('darken').style.display = "block";
  $("#message_history").scrollTop($("#message_history")[0].scrollHeight);
}
function closemessages(){
  document.getElementById('message_container').style.display = "none";
  document.getElementById('darken').style.display = "none";
}

if (document.getElementById('Home').style.display == 'block') {
document.getElementById('Home').style.display = 'grid';
}
function registertocontinue(){
  window.location.replace("/login_page.php?error=Register to Book an Appointment");
}
