<?
session_start();
if (isset($_GET['NIM'])) {
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
    if ($_SESSION['status'] != "berhasil_login") {
        header("location:loginform.php?pesan=belum_login");
    }
    ?>
    <br>
    <h2 align="center">Update Data Mahasiswa</h2>
    <form method="post" enctype="multipart/form-data" align="center">
        <label>NIM&nbsp&nbsp&nbsp</label> <input type="text" name="nim"><br />
        <label>Nama&nbsp</label> <input type="text" name="nama" maxlength="25"><br />
        <label>Umur&nbsp</label> <input type="number" name="umur" min="0"><br />
        <label>Foto&nbsp</label> <input type="file" name="foto" /><br />
        <input type="submit" class="btn btn-primary" name="Update" value="submit" />
    </form>
    <br>
    <?php
    if (isset($_POST['Update'])) {

        $name_file = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];

        echo $name_file;

        $local_image = "foto/";
        move_uploaded_file($tmp_name, $local_image . $name_file);

        $Nama = $_POST['nama'];
        $Umur = $_POST['umur'];
        $foto = $_FILES['foto']['name'];

        if ($Nama == '' && $Umur == '' && $foto == '') {
            echo "Inputan kosong, tidak dilakukan update apapun terhadap data";
        } else {
            if ($Nama == '') {
                $Nama = $data["nama"];
            }
            if ($Umur == '') {
                $Umur = $data["umur"];
            }
            if ($foto != ''){
                unlink("foto/$data[foto]");
            }
            else if ($foto == '') {
                $foto = $data["foto"];
            }

            $query = "UPDATE mahasiswa SET nama='$Nama', umur='$Umur', foto='$foto' WHERE NIM = '$nim'";
            $result = mysqli_query($connection, $query);
            header('location:?navigation=datasiswa');
        }
    }
    ?>
    <br>
</body>

</html>