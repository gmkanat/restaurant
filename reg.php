<?php
    include 'includes/config.php';
    $user =mysqli_real_escape_string($con, $_POST["name"]);
    $mail =mysqli_real_escape_string($con, $_POST["mail"]);
    $password =mysqli_real_escape_string($con, $_POST["pass"]);
    $sql = "SELECT * FROM users WHERE mail='$mail' OR name='$user'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        echo "Пользователь с таким именем или email уже существует";
    }else{
        $query = "INSERT INTO users (name, mail, password) VALUES ('$user', '$mail', '$password')";
        mysqli_query($con, $query);
        setcookie('username', $user, time()+86400*30);
        setcookie('mail', $mail, time()+86400*30);
        $code = "";
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $code = $randomString;
        $msg = "Ссылка на верификацию: http://localhost/freelance/milkomas/verify?code=".$code;
        $sub = "Верификация аккаунта в сайте FoodExpress";
        if (mail($mail, $sub, $msg)) {
            $_SESSION['time_code'] = $code;
            echo "Успех";
        }else{
            echo "Ошибка. Попробуйте еще раз";
        }
    }
?>