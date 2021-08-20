$(document).ready(function(){
	//calls login.php
$(".body").ready(function(){
        $.ajax({url: "login.php",
        success: function(result){
            $("#ppp").html(result);
        }});
    });
	//Enter button assigned to #signin on field focus
$(".topmenu").on("keyup", "#pass, #email", function(event){
    if(event.keyCode == 13){
        $("#signin").click();
    }
});
	//creates variables to be sent to login.php on click of signin.
$(".topmenu").on("click", "#signin", function(){
		var user = $("#email").val();
		var pwd = $("#pass").val();
			if( !$('#email').val() ) {
			alert('Email field empty'); 
			return false; }
			if( !$('#pass').val() ) {
			alert('Password field empty'); }
	//ajax that sends variables to login.php and throws alert on login.php error line 51
$.ajax({
  url: "login.php",
  type: "POST",
  data: {email: user , pass: pwd},
			success: function(result){
	            $("#ppp").html(result);
			},
   error: function () {
        alert("Incorrect Email or Password");       
			}
			});
    });
	//calls registerForm.php on signup click
$(".topmenu").on("click", "#signup", function(){
$.ajax({
  url: "registerForm.php",
  type: "GET",
			success: function(result){
	            $(".contents").html(result);
			}});
    });
	//Creates variables to be sent to registerForm.php
$(".body").on("click", "#register", function(){
    var name = $("#namer").val();
    var email = $("#emailr").val();
	var pass = $("#passr").val(); 
	//Ajax to send variables to registerForm.php
$.ajax({
  type: "POST",
  url: "register.php",
  data: {
	  name: name,
	  email: email,
	  pass: pass,
	  captcha: grecaptcha.getResponse()
	  },
		success: function(result) {
	            $(".contents").html(result);
      }
  });
});
	//Creates and serialize search criteria to be sent to draw_page.php
$(".sidebar").on("click", "#submit", function(){
var form = $("#gform").serialize();
	//Ajax sending variables to draw_page.php
$.ajax({
  type: "POST",
  url: "draw_page.php",
      data: form,
		success: function(result){
	   $(".contents").html(result);
      }
  });
});
	//Search bar sliding function
$(document).ready(function(){
		$("#dropbtn").click(function(){
		$("#myDropdown").slideToggle(500);
    });
});
	//Review/guides videos animation
$(".body").ready(function(){
	$("#revbutt").animate({width: '100%', opacity: '1'},"fast",function(){
		$("#gudbutt").animate({width: '50%', opacity: '0.5'}, 1);
	});
});
	//Review/guides videos animation
$(document).ready(function(){
		$("#revbutt").click(function(){
		    $("#revbutt").animate({width: '100%',opacity: '1'},"fast",function(){
		        $("#gudbutt").animate({width: '50%', opacity: '0.5'},"fast",function(){
		$(".guidedropwdown").slideUp("fast", function(){
		$(".revdropwdown").slideDown(500);
                });
            });
        });
	});
});
	//Review/guides videos animation
$(document).ready(function(){
		$("#gudbutt").click(function(){
		    $("#gudbutt").animate({width: '100%', opacity: '1'},"fast",function(){
		        $("#revbutt").animate({width: '50%', opacity: '0.5'},"fast",function(){
		$(".revdropwdown").slideUp("fast", function(){
		$(".guidedropwdown").slideDown(500);
		}
    );
});
});
})});
	//user menu animation
$(".topmenu").on("click", ".userbt", function(){
   $(".userdropdown").slideToggle(500);
});
});
