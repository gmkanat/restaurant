<?php
    session_start();
    $food = $_POST["id"];
    $foods = explode("s", $_SESSION["foods"]);
    for ($i=0; $i < count($foods); $i++) { 
        if($foods[$i] == $food){
            unset($foods[$i]);
            break;
        }
    }
    $out = "";
    foreach ($foods as $value) {
        $out .= "s".$value;
    }
    $_SESSION["foods"] = $out;
    echo "Успех";
?>