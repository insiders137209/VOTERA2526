<?php
session_start();
include('header.php');
include('kawalan-admin.php');
include('connection.php');

if (empty($_GET['notel'])) {
    die("<script>window.location.href='pengguna-senarai.php';</script>");
}

$notel = mysqli_real_escape_string($condb, $_GET['notel']);
$sql = "SELECT * FROM pengguna WHERE notel='$notel'";
$laksana = mysqli_query($condb, $sql);
$m = mysqli_fetch_array($laksana);
?>
<h3 align="center">Kemaskini Maklumat Pengguna</h3>
<form action="pengguna-kemaskini-proses.php?notel_lama=<?= $notel ?>" method="POST">
<table align="center">
<tr><td>Nama:</td><td><input type="text" name="nama" value="<?= $m['nama'] ?>" required></td></tr>
<tr><td>No. Telefon:</td><td><input type="text" name="notel" value="<?= $m['notel'] ?>" required></td></tr>
<tr><td>Katalaluan:</td><td><input type="text" name="katalaluan" value="<?= $m['katalaluan'] ?>" required></td></tr>
<tr><td>Jenis Pengguna:</td>
<td>
<select name="jenis_pengguna" required>
<option value="<?= $m['jenis_pengguna'] ?>"><?= $m['jenis_pengguna'] ?></option>
<?php
$arahan_sql = "SELECT jenis_pengguna FROM pengguna GROUP BY jenis_pengguna";
$laksana_arahan = mysqli_query($condb, $arahan_sql);
while ($n = mysqli_fetch_array($laksana_arahan)) {
    if ($n['jenis_pengguna'] != $m['jenis_pengguna']) {
        echo "<option value='{$n['jenis_pengguna']}'>{$n['jenis_pengguna']}</option>";
    }
}
?>
</select>
</td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Kemaskini"></td></tr>
</table>
</form>
<?php include('footer.php'); ?>
