<?php
	session_start();
	
	if($_POST['tiket-logout']=="true"){
		Session_destroy();
		header('Location: index.php');
	}else{
		header('Location: main.php');
	}
	
?>