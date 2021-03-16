<?php
    include 'includes/config.php';
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $mail = $_COOKIE['recover'];
    $sql = "UPDATE users SET password='$password' WHERE mail='$mail'";
	mysqli_query($con, $sql);
    echo "Пароль успешно сменён";
?>