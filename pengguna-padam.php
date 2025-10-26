<?php
session_start();
include('kawalan-admin.php');

if (!empty($_GET['notel'])) {
    include('connection.php');
    $notel = mysqli_real_escape_string($condb, $_GET['notel']);
    $arahan = "DELETE FROM pengguna WHERE notel='$notel'";
    if (mysqli_query($condb, $arahan)) {
        echo "<script>alert('Padam data berjaya');window.location.href='pengguna-senarai.php';</script>";
    } else {
        echo "<script>alert('Padam data gagal');window.location.href='pengguna-senarai.php';</script>";
    }
} else {
    die("<script>alert('Ralat! Akses tidak sah');window.location.href='pengguna-senarai.php';</script>");
}
?>