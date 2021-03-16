<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/add.css">
<?php
    if(isset($_COOKIE["recover"]) && isset($_GET["user"]) && $_COOKIE["recover"] == $_GET["user"]){
?>
<div class="recover_pop" id = "recover_pop">
   <div class="container">
      <div class="frame">
         <div class="nav">
            <ul class="links">
               <li class="signin-active"><a class="btn">Смена пароля</a></li>
            </ul>
         </div>
         <div class="loader">
               <img src="images/loader.gif" alt="">
            </div>
         <div>
            <form class="form-signin" action="" method="post" name="form">
               <label for="password">Password</label>
               <input class="form-styling" type="password" name="password" placeholder="" id="logword"/>
               <label for="password">Повторите пароль</label>
               <input class="form-styling" type="password" name="password" placeholder="" id="confirm"/>
               <div class="btn-animate">
                  <a class="btn-signin">Изменить</a>
               </div>
            </form>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="js/change_password.js"></script>
<?php
    }else{
        echo "Ошибка";
    }
?>