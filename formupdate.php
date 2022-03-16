<? if (isset($_GET['NIM'])) {
    $nim = $_GET['NIM'];
} else {
    die("Error! NIM tidak ditemukan");
}
$query = mysqli_query($connection, "SELECT*FROM mahasiswa WHERE NIM = '$nim'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
</head>

<body>
<?php
    session_start();
    if ($_SESSION['status'] != "berhasil_login") {
        header("location:loginform.php?pesan=belum_login");
    }
    ?>
    <h2>Update Data Mahasiswa</h2>
    <form action="datasiswaupdate.php?NIM=<?= $nim ?>" method="post">
        
        <li>
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </li>

        <li>
            <label>Umur</label>
            <input type="number" name="umur" class="form-control">
        </li>
        
        <input type="submit" class="btn btn-primary" name="Update" value="Update">
    </form>
    <?php
    if (isset($_POST['Update'])) {
        $Nama = $_POST['nama'];
        $Umur = $_POST['umur'];
        if($Nama == '' && $Umur == ''){
            echo "Inputan kosong, tidak dilakukan update apapun terhadap data";
        }
        else{
            if ($Nama == '') {
                $Nama = $data["nama"];
            } else if ($Umur == '') {
                $Umur = $data["umur"];
            }
            // query SQL untuk insert data
            $query = "UPDATE mahasiswa SET nama='$Nama', umur='$Umur' WHERE NIM = '$nim'";
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo "Update berhasil, silahkan tekan tombol refresh atau kembali untuk melihat perubahan";
            } else {
                echo "Update gagal";
            }
        }
    }
    ?>
    <br>
</body>

</html>

<!-- <?php
        include 'print.php';
        ?> -->