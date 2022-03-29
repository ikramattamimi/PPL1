<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

if (isset($_GET['NIM'])) {
    $nim = $_GET['NIM'];
} else {
    die("Error! NIM tidak ditemukan");
}

$query = mysqli_query($connection, "SELECT*FROM mahasiswa WHERE NIM = '$nim'");
$data = mysqli_fetch_array($query);
?>

<html>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "berhasil_login") {
        header("location:loginform.php?pesan=belum_login");
    }
    ?>
    
    <h2 align="center">Detail Data Mahasiswa</h2>
    <table border=0 cellpadding="4">
        <tr>
            <td>NIM</td>
            <td>: <?php echo $data["nim"]; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $data["nama"]; ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>: <?php echo $data["umur"]; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> <a href="?navigation=datasiswa">Kembali</a></td>
        </tr>
    </table>

</body>

</html>