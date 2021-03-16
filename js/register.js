$(".loader").hide()
$(function() {
  $(".btn").click(function() {
    $(".form-signin").toggleClass("form-signin-left");
    $(".form-signup").toggleClass("form-signup-left");
    $(".frame").toggleClass("frame-long");
    $(".signup-inactive").toggleClass("signup-active");
    $(".signin-active").toggleClass("signin-inactive");
    $(".forgot").toggleClass("forgot-left");   
    $(this).removeClass("idle").addClass("active");
  });
});

$(function() {
  $(".btn-signup").click(function() {
    var fullname = $("#fullname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    var stat = 0;
    if(password != "" && password == confirm && password.length >= 8 && password.length <= 100){
      stat += 1;
    }else{
      alert("Пароль очень простой");
    }
    if(fullname != "" && fullname.length <= 200){
      stat += 1;
    }else{
      alert("Имя неправилен");
    }
    if(email != "" && email.length <= 200 && email.includes("@")){
      stat += 1;
    }else{
      alert("Почта неправилен");
    }
    if(stat == 3){
      $.ajax({
          url: "reg.php",
          method: "POST",
          data: {name: fullname, mail: email, pass: password},
          beforeSend: function(){
            $(".nav").toggleClass("nav-up");
            $(".form-signup-left").toggleClass("form-signup-down");
            $(".frame").toggleClass("frame-short");
            $(".loader").show();
          },
          complete: function(){
            $(".loader").hide();
          },
          success: function(data){
            if(data == "Успех"){
              $(".success").toggleClass("success-left"); 
            }else{
              alert(data);
              $(".nav").toggleClass("nav-up");
              $(".form-signup-left").toggleClass("form-signup-down");
              $(".frame").toggleClass("frame-short");
            }
          }
      });
    }
  });
});

$(function() {
  $(".btn-signin").click(function() {
    var loguser = $("#loguser").val();
    var logword = $("#logword").val();
    if(loguser != "" && logword != ""){
      $.ajax({
        url: "login.php",
        method: "POST",
        data: {name: loguser, pass: logword},
        beforeSend: function(){
          $(".loader").show();
        },
        complete: function(){
          $(".loader").hide();
        },
        success: function(data){
          if(data != "Неправильный email или пароль" && data != "Пользователь с таким email не найден"){
            $(".btn-animate").toggleClass("btn-animate-grow");
            $(".welcome").toggleClass("welcome-left");
            $(".cover-photo").toggleClass("cover-photo-down");
            $(".profile-photo").toggleClass("profile-photo-down");
            $(".btn-goback").toggleClass("btn-goback-up");
            location.reload();
          }else{
            alert(data);
          }
        }
      });
    }else{
      alert("Заполните все поля");
    }
    
  });
});

// открыть по кнопке
$('.btn_login').click(function() { 
  
  $('.register_pop').fadeIn();
  // $('.js-overlay-campaign').addClass('disabled');
});


// закрыть по клику вне окна
$(document).mouseup(function (e) { 
  var popup = $('.register_pop');
  if (e.target!=popup[0]&&popup.has(e.target).length === 0){
    $('.register_pop').fadeOut();
  }
});