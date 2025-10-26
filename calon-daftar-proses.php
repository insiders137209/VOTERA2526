<?php
session_start();
include('connection.php');
include('kawalan-admin.php');

if (!empty($_POST)) {
    $nama_calon = mysqli_real_escape_string($condb, $_POST['nama_calon_baru']);
    $jawatan_calon = $_POST['jawatan_calon_baru'];

    $target_dir = "gambar/";
    $ext = strtolower(pathinfo($_FILES['gambar_calon']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, ['jpg','jpeg','png','gif'])) {
        echo "<script>alert('Hanya fail gambar (JPG, JPEG, PNG, GIF) dibenarkan');window.history.back();</script>";
        exit;
    }

    $nama_fail = date("Ymd_His").'.'.$ext;
    $target_file = $target_dir.$nama_fail;

    if (move_uploaded_file($_FILES['gambar_calon']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO calon (nama_calon, kod_jawatan, gambar)
                VALUES ('$nama_calon', '$jawatan_calon', '$nama_fail')";
        if (mysqli_query($condb, $sql)) {
            echo "<script>alert('Calon berjaya didaftarkan');window.location.href='calon-senarai.php';</script>";
        } else {
            echo "<script>alert('Pendaftaran calon gagal');window.location.href='calon-senarai.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal memuat naik gambar');window.history.back();</script>";
    }
} else {
    echo "<script>alert('Sila isi semua maklumat');window.location.href='calon-senarai.php';</script>";
}
?>
