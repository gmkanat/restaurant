$(".loader").hide()
$(function() {
    $(".btn-signin").click(function() {
        var pass = $("#logword").val();
        var confirm = $("#confirm").val();
        var stat = 0;
        if(pass == confirm){
            stat += 1;
        }else{
            alert("Почта неправилен");
        }
        if(stat == 1){
        $.ajax({
            url: "password_change.php",
            method: "POST",
            data: {password: pass},
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
                location.href = "."
            }
        });
        }
    });
    });