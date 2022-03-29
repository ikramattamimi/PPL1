<?php
    session_start();
    if ($_SESSION['status'] != "berhasil_login") {
        header("location:loginform.php?pesan=belum_login");
    }
    ?>
<h3 align="center"> INI HOME <h3>