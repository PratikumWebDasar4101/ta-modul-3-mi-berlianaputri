<?php
	Session_start();
	
	if(!isset($_SESSION['Login'])){
		$_SESSION['Pesan'] = "Anda harus login !!";
		header('Location: index.php');
	}
?>
<html>
	<head>
		<title>User Data | <?php echo $_SESSION['Nim']; ?></title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="stylesheet" type="text/css" href="main-style.css">
	</head>
	
	<body>
		<div class="header">
			<span class="greet"><?php echo "Hello ".$_SESSION['Nim']; ?></span>
			<form action="logout.php" method="POST" class="logout">
				<input type="hidden" name="tiket-logout" value="true">
				<input type="submit" value="Logout" class="log-out">
			</form>
		</div>
		<div class="content">
			<h2>Input User</h2>
			
			<form action="simpan.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="nama" placeholder="Nama lengkap"> <br>
				<input type="text" name="nim" placeholder="NIM"> <br>
				<input type="password" name="password" placeholder="Password"> <br>
				<select name="fakultas">
					<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
					<option value="Fakultas Teknik Elektro">Fakultas Teknik Elektro</option>
					<option value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri</option>
					<option value="Fakultas Industri Kreatif">Fakultas Industri Kreatif</option>
				</select> <br>
				<input type="radio" name="jk" value="Laki Laki" checked> Male
				<input type="radio" name="jk" value="Perempuan"> Female <br>
				Gambar : <input type="file" name="gambar"> <br>
				<input type="submit" value="Simpan" class="simpan">
			</form>
		</div>
		
		<div class="content">
			<h2>Data User</h2>
			
			<table border=1 class="tabel">
				<tr>
					<td>NIM</td>
					<td>Nama</td>
					<td>Fakultas</td>
					<td>Jenis Kelamin</td>
					<td>Gambar</td>
				</tr>
				<?php
					$db = new mysqli("localhost", "root", "", "webdas");
					$sql="select * from mahasiswa";
					$result = $db->query($sql);
					
					if ($result->num_rows > 0){
						while($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>".$row['nim']."</td>";
							echo "<td>".$row['nama']."</td>";
							echo "<td>".$row['fakultas']."</td>";
							echo "<td>".$row['jk']."</td>";
							echo "<td><img src='upload/".$row['gambar']."' width=100px height=100px></td>";
							echo "</tr>";
						}
					}
				?>
			</table>
		</div>
	</body>
</html>