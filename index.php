<link rel="stylesheet" href="css/index.css">
<?php
	include 'header.php';
	include 'includes/config.php';
	$sql = "SELECT * FROM rests";
	$result = mysqli_query($con, $sql);
?>
<div class="restourants">
<?php
	while ($row = mysqli_fetch_array($result)) {
?>
<div class="resto">
	<p><?php echo $row['name']; ?></p>
	<a href="<?php echo $row['link'];?>">Перейти</a>
</div>
<?php
	}
?>
</div>