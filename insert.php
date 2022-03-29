<?php
session_start();
if ($_SESSION['status'] != "berhasil_login") {
    header("location:loginform.php?pesan=belum_login");
}
?>
<h2>Tambah Data Baru</h2>
<form method="post" enctype="multipart/form-data">
    <label>NIM&nbsp&nbsp&nbsp</label> <input type="text" name="nim"><br />
    <label>Nama&nbsp</label> <input type="text" name="nama"><br />
    <label>Umur&nbsp</label> <input type="number" name="umur"><br />
    <label>Foto&nbsp</label> <input type="file" name="foto" /><br />
    <input type="submit" class="btn btn-primary" name="submit" value="submit" />
</form>
<br>

<?php

if (isset($_POST['submit'])) {
    $name_file = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    $local_image = "foto/";
    move_uploaded_file($tmp_name, $local_image . $name_file);

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $foto = $_FILES['foto']['name'];

    include 'connection.php';

    $sql = "INSERT INTO mahasiswa (nim,nama,umur,foto)
    VALUES ('$nim','$nama','$umur', '$foto')";
    if (mysqli_query($conn, $sql)) {
        // echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>