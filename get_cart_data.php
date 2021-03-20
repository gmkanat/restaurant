<?php
    session_start();
    include 'includes/config.php';
    if(isset($_SESSION['foods'])){
        $arr = explode("s", $_SESSION["foods"]);
        $sum = 0;
        foreach ($arr as $value) {
            $food = "SELECT * FROM foods WHERE id='$value'";
            $result = mysqli_query($con, $food);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    $sum = $sum + $row["price"];
                }
            }
        }
        echo $sum;
    }else{
        echo 0;
    }
    
?>