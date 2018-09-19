<?php

	$db = new mysqli("localhost", "root", "", "webdas");
	session_start();
	
	$nim = $_POST["nim"];
	$pass = $_POST["password"];
	
	$sql = "SELECT nim, password FROM mahasiswa where nim='$nim' and password='$pass'";
	$result = $db->query($sql);
	
	if ($result->num_rows > 0){
		$_SESSION['Login'] = "True";
		$_SESSION['Nim'] = $nim;
		
		header('Location: main.php');
	}else{
		$_SESSION['Pesan'] = "Login Gagal !!";
		
		header('Location: index.php');
	}

?>