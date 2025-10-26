<?php
session_start();
include('connection.php');
include('kawalan-pengguna.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script>alert('Sila buat undian terlebih dahulu');window.location.href='undi-calon.php';</script>";
    exit;
}

foreach ($_POST as $jawatan => $id_calon) {
    $id_calon = mysqli_real_escape_string($condb, $id_calon);
    $notel = $_SESSION['notel'];
    $arahan_undi = "INSERT INTO undian (notel, id_calon) VALUES ('$notel', '$id_calon')";
    if (!mysqli_query($condb, $arahan_undi)) {
        echo "<script>alert('Proses undian gagal');window.location.href='undi-calon.php';</script>";
        exit;
    }
}

echo "<script>alert('Undian berjaya direkodkan');window.location.href='undi-calon.php';</script>";
?>
