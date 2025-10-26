<?php
session_start();
include('kawalan-admin.php');

if (!empty($_GET['id_calon'])) {
    include('connection.php');
    $id_calon = mysqli_real_escape_string($condb, $_GET['id_calon']);
    $sql = "DELETE FROM calon WHERE id_calon='$id_calon'";
    if (mysqli_query($condb, $sql)) {
        echo "<script>alert('Alhamdulilah. Padam data berjaya');window.location.href='calon-senarai.php';</script>";
    } else {
        echo "<script>alert('Ralat! Padam data gagal');window.location.href='calon-senarai.php';</script>";
    }
} else {
    die("<script>alert('Ralat! akses tidak sah');window.location.href='calon-senarai.php';</script>");
}
?>
