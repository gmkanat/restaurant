<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/add.css">
<div class="recover_pop" id = "recover_pop">
   <div class="container">
      <div class="frame">
         <div class="nav">
            <ul class="links">
               <li class="signin-active"><a class="btn">Восстановление пароля</a></li>
            </ul>
         </div>
         <div class="loader">
               <img src="images/loader.gif" alt="">
            </div>
         <div>
            <form class="form-signin" action="index" method="post" name="form">
               <label for="username">Email</label>
               <input class="form-styling" type="text" name="username" placeholder="" id="loguser"/>
               <div class="btn-animate">
                  <a class="btn-signin">Отправить ссылку</a>
               </div>
            </form>
            <div class="success">
               <img src="images/thanks.gif" alt="">
               <div class="successtext">
                  <p> Thanks for signing up! Check your email for confirmation.</p>
               </div>
            </div>
         </div>
         <div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="js/recover.js"></script>