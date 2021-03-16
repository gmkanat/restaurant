<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FoodExpress</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    </head>
    <header>
        <div class="header">
            <div class="logo">
                <a href="." class="header_logo">
                    <img src="images/logo.png" alt="">
                </a>
                
            </div>
            <div class="search">
                <input type="text" placeholder="Поиск">
            </div>
            <div class="register_form">
                
                <?php
                    if(isset($_COOKIE["username"]) && isset($_COOKIE["mail"])){
                 ?>
                <div class="register_signup">
                     <div class="btn_signup" onclick="location.href = 'profile?user=<?php echo $_COOKIE['username'];?>'">
                <?php
                    echo $_COOKIE["username"];
                ?>
                    </div> 
                </div>
                 <?php
                    }else{
                 ?>
                 <div class="register_login">
                    <div class="btn_login">
                        Log in
                    </div>      
                </div>
                 <?php
                    }
                ?>
                <div class="register_lang">
                    <select name="lang" id="lang">
                        <option value="eng">English</option>
                        <option value="rus">Русский</option>
                    </select>
                </div>
            </div>
        </div>
    </header>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <?php
        if(empty($_COOKIE["username"]) && empty($_COOKIE["mail"])){
            include 'includes/register.php';
        }
    ?>
</html>