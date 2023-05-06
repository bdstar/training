// Disable form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            //console.log("submitted");
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();


$(document).ready(function(){
  $("select#institution-id").change(function(){
      var selectedCountry = $(this).children("option:selected").val();
      //console.log("You have selected the country - " + selectedCountry);
      if(selectedCountry==178){
        //console.log("You have selected OTHER - " + selectedCountry);
        $("#other-institution-box").css("display", "block");
      }
      else{
        $("#other-institution-box").css("display", "none");
      }
  });


  $("input[name='profession_id']").click(function(){
    var radioValue = $("input[name='profession_id']:checked").val();
    //console.log("Your are a - " + radioValue);
    if(radioValue==2){
        //console.log("Your are a professional - " + radioValue);
        $("#other-professional-box").css("display", "block");
    }else{
      $("#other-professional-box").css("display", "none");
    }
  });



  /*----------- START: Countdown Timer -------------*/
  /*let expiryDateTime = "6 May 2023 10:30:25";

  window.addEventListener('load', function(event){
    countdownTimer(expiryDateTime);
  });
  
  function countdownTimer(expiryDateTime){
  
    var countdownDateTime = new Date(expiryDateTime).getTime();
      
    var timeInterval = setInterval(function() {
      var currentDateTime = new Date().getTime();  
      var remainingDayTime = countdownDateTime - currentDateTime;

      var totalDays = Math.floor(remainingDayTime / (1000 * 60 * 60 * 24));
      var totalHours = Math.floor((remainingDayTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var totalMinutes = Math.floor((remainingDayTime % (1000 * 60 * 60)) / (1000 * 60));
      var totalSeconds = Math.floor((remainingDayTime % (1000 * 60)) / 1000);

      document.getElementById("days").innerHTML = totalDays;
      document.getElementById("hours").innerHTML = totalHours;
      document.getElementById("minutes").innerHTML = totalMinutes;
      document.getElementById("seconds").innerHTML = totalSeconds;

      if (remainingDayTime < 0) {
        clearInterval(timeInterval);
        document.getElementById("countdownTimer").innerHTML = "Deal ended";
      }
   }, 1000);
  }*/
  /*----------- END: Countdown Timer -------------*/
});





/*window.onload = function() {
  console.log("test");
  debugger;
  var divs = document.getElementsByTagName('div');
  for (var i = 0; i < divs.length; i++) {
    var div = divs[i];
    var javascriptAttr = div.getAttribute('javascript');
    if (javascriptAttr) {
      var params = javascriptAttr.match(/'(.*?)'/g);
      if (params && params.length >= 3) {
        var expiryDateTime = params[0].replace(/'/g, '');
        var id = params[1].replace(/'/g, '');
        var text = params[2].replace(/'/g, '');
        countdownTimer(expiryDateTime, id, text);
      }
    }
  }
};*/


window.onload = function() {
  // set up the countdown timers from the HTML div tags
  var countdownDivs = document.getElementsByClassName('countdown');
  for (var i = 0; i < countdownDivs.length; i++) {
    var expiryDateTime = countdownDivs[i].getAttribute('data-expiry');
    var id = countdownDivs[i].getAttribute('data-id');
    var text = countdownDivs[i].getAttribute('data-text');
    countdownTimer(expiryDateTime, id, text);
  }
};



function countdownTimer(expiryDateTime, id, text){
  console.log(`Countdown for ${id} with expiry date ${expiryDateTime} and text "${text}"`);
  
  var countdownDateTime = new Date(expiryDateTime).getTime();
    
  var timeInterval = setInterval(function() {
    var currentDateTime = new Date().getTime();  
    var remainingDayTime = countdownDateTime - currentDateTime;

    var totalDays = Math.floor(remainingDayTime / (1000 * 60 * 60 * 24));
    var totalHours = Math.floor((remainingDayTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var totalMinutes = Math.floor((remainingDayTime % (1000 * 60 * 60)) / (1000 * 60));
    var totalSeconds = Math.floor((remainingDayTime % (1000 * 60)) / 1000);

    document.getElementById("days-"+id).innerHTML = totalDays;
    document.getElementById("hours-"+id).innerHTML = totalHours;
    document.getElementById("minutes-"+id).innerHTML = totalMinutes;
    document.getElementById("seconds-"+id).innerHTML = totalSeconds;

    if (remainingDayTime < 0) {
      clearInterval(timeInterval);
      document.getElementById("countdownTimer-"+id).innerHTML = text;
    }
 }, 1000);
}
/*----------- END: Countdown Timer -------------*/






