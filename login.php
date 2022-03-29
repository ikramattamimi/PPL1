<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$data = mysqli_query($conn, "select * from admin where username='$username' and password='$password'");
$cek_ada_data = mysqli_num_rows($data);

if ($cek_ada_data > 0) {
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "berhasil_login";
	header("location:index.php");
} else {
	header("location:loginform.php?pesan=gagal");
}
