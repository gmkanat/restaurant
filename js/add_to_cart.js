$("#rest_view_modal").hide();
load_cart_data();
load_remover_details();
function load_cart_data(){
    $.ajax({
    url: "get_remover_data.php",
    method: "POST",
    data: {id: 1},
    beforeSend: function(){
      $("#rest_view_modal").show();
    },
    complete: function(){
        $("#rest_view_modal").hide();
    },
    success: function(data){
        var arr = data.split("s");
        var sum = 0;
        for(var i = 0; i < arr.length; i++)
        {
            if(arr[i] != 0){
                var price = document.getElementById("p"+arr[i]).innerHTML;
                sum += parseInt(price);
            }
        }
        document.getElementById("sum").innerHTML = sum;
    }
    });
}
function load_remover_details(){
    $.ajax({
    url: "get_remover_data.php",
    method: "POST",
    data: {id: 1},
    beforeSend: function(){
      $("#rest_view_modal").show();
    },
    complete: function(){
        $("#rest_view_modal").hide();
    },
    success: function(data){    
        var foods = document.getElementsByClassName("remove_from_cart");
        for(var i = 0; i < foods.length; i++)
        {
            foods[i].style.display = "none";
        }
        var arr = data.split("s");
        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }
        arr = arr.filter(onlyUnique);
        arr.forEach(myFunction);
        function myFunction(item, index) {
            if(item != "0" && item != ""){
                document.getElementById("r"+item).style.display = "block";
            }
        }
    }
    });
}
var elements = document.getElementsByClassName("add_to_cart");
for(var i = 0; i < elements.length; i++)
{
    elements[i].onclick = function(){
        /*for (var j = 0; j < elements.length; j++) {
            elements[j].classList.remove("bak");
        }*/
        var food_id = this.id;
        $.ajax({
        url: "add_to_cart.php",
        method: "POST",
        data: {id: food_id},
        beforeSend: function(){
          $("#rest_view_modal").show();
        },
        complete: function(){
            $("#rest_view_modal").hide();
        },
        success: function(data){
            if(data == "Успех"){
                load_cart_data();
                load_remover_details();
            }
        }
        });
    };
}
var elements = document.getElementsByClassName("remove_from_cart");
for(var i = 0; i < elements.length; i++)
{
    elements[i].onclick = function(){
        /*for (var j = 0; j < elements.length; j++) {
            elements[j].classList.remove("bak");
        }*/
        var food_id = this.id.slice(1);
        $.ajax({
        url: "remove_from_cart.php",
        method: "POST",
        data: {id: food_id},
        beforeSend: function(){
          $("#rest_view_modal").show();
        },
        complete: function(){
            $("#rest_view_modal").hide();
        },
        success: function(data){
            if(data == "Успех"){
                load_cart_data();
                load_remover_details();
            }
        }
        });
    };
}