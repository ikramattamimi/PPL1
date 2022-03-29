<?php
// session_start();
// if ($_SESSION['status'] != "berhasil_login") {
// 	header("location:loginform.php?pesan=belum_login");
// }
?>
<html>

<head>
	<title>Latihan 11</title>
</head>

<body>
	<h2>
		<center>Silahkan Login Terlebih Dahulu
			<center />
	</h2>

	<!-- cek pesan notifikasi -->
	<?php
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") {
			echo "<p align=center>Login gagal! username atau password salah! ";
		} else if ($_GET['pesan'] == "logout") {
			echo "<p align=center>Logout berhasil!";
		} else if ($_GET['pesan'] == "belum_login") {
			echo "<p align=center>Anda harus login untuk mengakses halaman data siswa";
		}
	}
	?>
	<br />
	<br />
	<form method="post" action="login.php">
		<table align="center">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="text" name="password" placeholder="Masukkan password"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="LOGIN"></td>
			</tr>
		</table>
	</form>
</body>

</html>