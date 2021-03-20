<link rel="stylesheet" href="css/rest_view.css">
<div id="rest_view_modal">
    <img src="images/loader.gif" alt="">
</div>
<?php
    session_start();
    if(empty($_SESSION["foods"])){
        $_SESSION['foods'] = "0";
    }
    $exist_foods_list = explode("s", $_SESSION['foods']);
    include 'header.php';
    include 'includes/config.php';
    $name = 'Test';
    $sql = "SELECT * FROM rests WHERE name='$name'";
    $parse_foods = "";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            echo $row['work_time'];
            $rest_name = $row['name'];
            $parse_foods = "SELECT * FROM foods WHERE rest_name='$rest_name'";
        }
    }else{
        echo "Пользователь с таким email не найден";
    }
    $result = mysqli_query($con, $parse_foods);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
?>
<div class="card">
    <img src="<?php echo $row['img_path']?>" alt="">
    <div class="food_name"><?php echo $row['name']?></div>
    <div class="food_price">
        <div class="money" id="<?php echo "p".$row['id']?>"><?php echo $row['price']?></div>
        <button class="add_to_cart" id="<?php echo $row['id']?>">Добавить в корзину</button>
        <button class="remove_from_cart" id="<?php echo "r".$row['id']?>" style="display:none;">Убрать из корзину</button>
    </div>
</div>
<?php
        }
    }else{
        echo "Пользователь с таким email не найден";
    }
?>
<div class="cart">
    <p id="sum">0</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="js/add_to_cart.js"></script>