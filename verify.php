<?php
    if(isset($_GET["code"]) && isset($_COOKIE["username"]) && isset($_COOKIE["mail"])){
        echo "Успех";
    }else{
        echo "Неудача";
    }
?>