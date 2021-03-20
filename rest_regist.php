<?php
    include 'header.php';
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" placeholder="Write link..." name="country"><br>
    <input type="text" placeholder="Write link..." name="city"><br>
    <input type="text" placeholder="Write link..." name="name"><br>
    <button type="submit">OK</button>
</form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $file = $_POST["country"]."/".$_POST["city"]."/".$_POST["name"]."/index.php";
        if(!is_dir($_POST["country"])){
            mkdir($_POST["country"]);
            if(!is_dir($_POST["country"]."/".$_POST["city"])){
                mkdir($_POST["country"]."/".$_POST["city"]);
                if(!is_dir($_POST["country"]."/".$_POST["city"]."/".$_POST["name"])){
                    mkdir($_POST["country"]."/".$_POST["city"]."/".$_POST["name"]);
                }
            }
        }else{
            if(!is_dir($_POST["country"]."/".$_POST["city"])){
                mkdir($_POST["country"]."/".$_POST["city"]);
                if(!is_dir($_POST["country"]."/".$_POST["city"]."/".$_POST["name"])){
                    mkdir($_POST["country"]."/".$_POST["city"]."/".$_POST["name"]);
                }
            }else{
                if(!is_dir($_POST["country"]."/".$_POST["city"]."/".$_POST["name"])){
                    mkdir($_POST["country"]."/".$_POST["city"]."/".$_POST["name"]);
                }
            }
        }
        $myfile = fopen($file, "w");
        include 'includes/config.php';
        $sql = "SELECT * FROM rests WHERE link='$file'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            echo "Пользователь с таким именем или email уже существует";
        }else{
            $name = $_POST["name"];
            $path = $_POST["country"]."/".$_POST["city"]."/".$_POST["name"]."/";
            $query = "INSERT INTO rests (name, link) VALUES ('$name', '$path')";
            mysqli_query($con, $query);
        }
        header("Location: ".$_POST["country"]."/".$_POST["city"]."/".$_POST["name"]);
    }
?>
