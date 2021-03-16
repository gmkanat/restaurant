<?php
    include 'header.php';
    if(empty($_COOKIE['mail']) && empty($_COOKIE['username'])){
        header("Location: .");
    }
?>
<a href="logout">Выйти</a>