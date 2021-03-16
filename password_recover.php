<?php
    include 'includes/config.php';
    $mail = mysqli_real_escape_string($con, $_POST['mail']);
    $sql = "SELECT * FROM users WHERE mail='$mail'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        $sub = "Смена пароля в FoodExpress";
        $msg = "Ссылка на смену пароля http://localhost/freelance/milkomas/change_password?user=".$mail;
        if (mail($mail, $sub, $msg)) {
            echo "Мы отправили вам ссылку на смену пароля";
            setcookie('recover', $mail, time()+86400);
        }
    }else{
        echo "Пользователь с таким email не найден";
    }
?>