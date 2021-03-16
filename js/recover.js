$(".loader").hide()
//$(".success").hide();
$(function() {
$(".btn-signin").click(function() {
    var email = $("#loguser").val();
    var stat = 0;
    if(email != "" && email.length <= 200 && email.includes("@")){
        stat += 1;
    }else{
        alert("Почта неправилен");
    }
    if(stat == 1){
    $.ajax({
        url: "password_recover.php",
        method: "POST",
        data: {mail: email},
        beforeSend: function(){
            $(".loader").show();
            $(".form-signin").hide();
        },
        complete: function(){
            $(".loader").hide();
            $(".success").show();
        },
        success: function(data){
            $(".success").show();
            alert(data)
        }
    });
    }
});
});