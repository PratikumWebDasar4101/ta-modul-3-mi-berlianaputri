<?php

	$dir = "upload/";

	$nama = $_POST['nama'];
	$nim = $_POST['nim'];
	$password = $_POST['password'];
	$fakultas = $_POST['fakultas'];
	$jk = $_POST['jk'];
	$gam = $_FILES['gambar']['tmp_name'];
	$gambar = basename($_FILES['gambar']['name']);
	
	
	$db = new mysqli("localhost", "root", "", "webdas");
	
	$sql = "insert into mahasiswa (nim, password, nama, fakultas, jk, gambar) values ('$nim', '$password', '$nama', '$fakultas', '$jk', '$gambar')";
	
	if ($db->query($sql) === TRUE) {
		move_uploaded_file($gam, "$dir/$gambar");
		header('Location: main.php');
	}else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
?>