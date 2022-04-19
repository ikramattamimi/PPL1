<?php

session_start();
if ($_SESSION['status'] != "berhasil_login") {
    header("location:loginform.php?pesan=belum_login");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Ikram = "ikram";
$sql = "SELECT * FROM `mahasiswa` ";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<body>
    <table class="table table-striped">
        <tr>
            <br/>
            <p align='center' >
            <form method="POST">
                <input type="text" name="hasilInput" placeholder="Masukkan Nama">
            </form>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="index.php?navigation=insert">Insert</a>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="excel/export.php">Export</a>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="index.php?navigation=excel">Read From Excel</a>
        </tr>
        <tr align="center">
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Foto</th>
            <th>Detail</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        if (isset($_POST['hasilInput'])) {
            $hasilInput = $_POST['hasilInput'];
            $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$hasilInput%'";
        } else {
            $sql = "SELECT * FROM mahasiswa";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td>
                        <center><?php echo $row["nim"] ?></center>
                    </td>
                    <td>
                        <center><?php echo $row["nama"] ?></center>
                    </td>
                    <td>
                        <center><?php echo $row["umur"] ?></center>
                    </td>
                    <td>
                        <?php echo "<img src='foto/$row[foto]' width='70' />"; ?></td>
                    </td>
                    <td>
                        <button class="button1">
                        <a class = a1 href="index.php?navigation=detail&NIM=<?= $row['nim'] ?>">Detail</a>
                        </button>
                    </td>
                    <td>
                        <button class="button2">
                        <a class = a1 href="index.php?navigation=update&NIM=<?= $row['nim']?>">Update</a>
                        </button>
                    </td>
                    <td>
                        <button class="button3">
                        <a class = a1 href="index.php?navigation=delete&NIM=<?= $row['nim'] ?>">Delete</a>
                        </button>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>