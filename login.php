<?php
	include 'includes/config.php';
    $mail = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $sql = "SELECT * FROM users WHERE mail='$mail'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row['password'] == $password) {
                setcookie('username', $row['name'], time()+86400*30);
                setcookie('mail', $mail, time()+86400*30);
                echo $row['name'];
                break;
            }else{
                echo "Неправильный email или пароль";
            }
        }
    }else{
        echo "Пользователь с таким email не найден";
    }
?>