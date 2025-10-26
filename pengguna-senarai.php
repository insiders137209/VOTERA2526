<?php
session_start();
include('header.php');
include('connection.php');
include('kawalan-admin.php');
?>
<h3 align='center'>Senarai Pengguna</h3>
<form method='POST' action='' style='text-align:center;'>
<input type='text' name='nama' placeholder='Carian Nama Pengguna'>
<input type='submit' value='Cari'>
</form>
<a href='pengguna-upload.php'>Muat Naik Data Pengundi</a>
<table border='1' width='100%' align='center'>
<tr bgcolor='yellow'>
<th>Nama</th>
<th>No Telefon</th>
<th>Katalaluan</th>
<th>Jenis Pengguna</th>
<th>Tindakan</th>
</tr>
<?php
$tambahan = !empty($_POST['nama']) ? " WHERE nama LIKE '%".$_POST['nama']."%'" : "";
$arahan_papar = "SELECT * FROM pengguna $tambahan ORDER BY jenis_pengguna";
$laksana = mysqli_query($condb, $arahan_papar);
while ($m = mysqli_fetch_array($laksana)) {
    echo "<tr>
    <td>{$m['nama']}</td>
    <td>{$m['notel']}</td>
    <td>{$m['katalaluan']}</td>
    <td>{$m['jenis_pengguna']}</td>
    <td>
        <a href='pengguna-kemaskini-borang.php?notel={$m['notel']}'>Kemaskini</a> |
        <a href='pengguna-padam.php?notel={$m['notel']}' onclick=\"return confirm('Anda pasti ingin memadam data ini?')\">Hapus</a>
    </td>
    </tr>";
}
?>
</table>
<?php include('footer.php'); ?>
