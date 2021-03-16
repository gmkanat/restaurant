<?php
	$status = 0;
	if (isset($_COOKIE['username'])) {
		setcookie('username', null, time());
		$status += 1; 
	}	
	if (isset($_COOKIE['mail'])) {
		setcookie('mail', null, time());
		$status += 1; 
	}
	if ($status>0) {
		header("Location: .");
	}
    if(empty($_COOKIE['mail']) && empty($_COOKIE['username'])){
        header("Location: .");
    }
?>
asdf