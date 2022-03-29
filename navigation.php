<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
if ($_SESSION['status'] != "berhasil_login") {
    header("location:loginform.php?pesan=belum_login");
}

if (isset($_GET['navigation'])) {
    if ($_GET['navigation'] == "home") {
        include 'home.php';
    } else if ($_GET['navigation'] == "berita") {
        include 'berita.php';
    } else if ($_GET['navigation'] == "datasiswa") {
        include 'datasiswa.php';
    } else if (isset($_GET['NIM'])) {
        if ($_GET['navigation'] == "detail") {
            include 'detail.php';
        } else if ($_GET['navigation'] == "update") {
            include 'detail.php';
            include 'formupdate.php';
        } else if ($_GET['navigation'] == "delete") {
            include 'delete.php';
        }
    } else if ($_GET['navigation'] == "insert") {
        include 'insert.php';
    }
} else {
    include 'home.php';
}
