<?php
    session_start();
    $_SESSION['foods'] = $_SESSION['foods']."s".$_POST["id"];
    echo "Успех";
?>