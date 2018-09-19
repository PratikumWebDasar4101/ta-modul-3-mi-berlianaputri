<?php
	session_start();
	
	if(isset($_SESSION['Login'])){
		header('Location: main.php');
	}
?>

<html>
	<head>
		<title>User Data | Login</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	
	<body>
		<div class="login">
		<?php 
			if(isset($_SESSION['Pesan'])){
				echo $_SESSION['Pesan'];
				session_destroy();
			} 
		?>
			<form action="login.php" method="POST" class="log">
				<input type="text" name="nim" placeholder="Masukan NIM anda"> <br>
				<input type="password" name="password" placeholder="Masukan Password anda"> <br>
				<input type="submit" value="Login" class="sub">
			</form>
		</div>
	</body>
</html>