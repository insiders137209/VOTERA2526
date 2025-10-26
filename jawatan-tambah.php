<?php
session_start();
include('header.php');
include('connection.php');
include('kawalan-admin.php');

if (!empty($_POST['nama_jawatan_baru'])) {
    $nama_jawatan_baru = mysqli_real_escape_string($condb, $_POST['nama_jawatan_baru']);
    $sql = "INSERT INTO jawatan (nama_jawatan) VALUES ('$nama_jawatan_baru')";
    if (mysqli_query($condb, $sql)) {
        echo "<script>alert('Jawatan berjaya ditambah');window.location.href='jawatan-tambah.php';</script>";
    } else {
        echo "<script>alert('Tambah jawatan gagal');</script>";
    }
}

if (!empty($_GET['kod_jawatan'])) {
    $kod = mysqli_real_escape_string($condb, $_GET['kod_jawatan']);
    $padam = "DELETE FROM jawatan WHERE kod_jawatan='$kod'";
    if (mysqli_query($condb, $padam)) {
        echo "<script>alert('Jawatan berjaya dipadam');window.location.href='jawatan-tambah.php';</script>";
    } else {
        echo "<script>alert('Padam jawatan gagal');window.location.href='jawatan-tambah.php';</script>";
    }
}
?>
<h3 align='center'>Senarai Jawatan</h3>
<form method='POST' align='center'>
<input type='text' name='nama_jawatan_baru' placeholder='Nama Jawatan Baru' required>
<input type='submit' value='Tambah'>
</form>
<table align='center' width='50%' border='1'>
<tr bgcolor='yellow'><th>Nama Jawatan</th><th>Tindakan</th></tr>
<?php
$q = mysqli_query($condb, "SELECT * FROM jawatan ORDER BY kod_jawatan");
while ($j = mysqli_fetch_array($q)) {
    echo "<tr><td>{$j['nama_jawatan']}</td>
    <td><a href='jawatan-tambah.php?kod_jawatan={$j['kod_jawatan']}' onclick=\"return confirm('Padam jawatan ini?')\">Hapus</a></td></tr>";
}
?>
</table>
<?php include('footer.php'); ?>
