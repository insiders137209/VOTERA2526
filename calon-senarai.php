<?php
session_start();
Include('header.php");
include('connection.php');
include("kawalan-admin.php");
?>
<h3 align='center'>Pendaftaran Calon Baru</h3>
-- Borang Pendaftaran Calon -->
<table align='center'>
<form action= calon-daftar-proses.php method="POST" enctype="multipart/form-data'>
 <tr>
<td>Nama Calon</td>
<td>
<input type="text" name="nama_calon_baru' placeholder= Nama calon baru' required>
$t/td,$
</tr>
<tr>
<td>Jawatan</td>
<td>
<select name= jawatan_calon_baru required>
$c/tr$
option value=" disabled selectedsPilih Jawatan /option>
<?php
// Papar senarai jawatan daripada jadual 'jawatan'
Sjawatan_query = "SELECT FROM jawatan ORDER BY kod jawatan";
 Sjawatan_result = mysqli_query(\$condb, \$jawatan_query);
while (\$jawatan = mysqli_fetch_array(\$jawatan_result)) {
 echo " option value=".\$jawatan['kod_jawatan  .  s
  .Sjawatan 'nama_jawatan']."</option>"; }
</select>
<a href='jawatan-tambah.php"> $s[*]</a\rangle$
</td>
<tr>
<td>Gambar Calon /td>
<td><input type  file' name= ganbar_calon' accept  Image/ required></td>
</tr><tr>
<td></td>
<td><input type  submit" value  Daftar ></td>
</tr>
</form>
</table>
Paparan Senarai Calon-->
ch3 align  center'>Senarai Calon</h3>
<table aligns center width="100%"
tr bgcolors cyan'>
<td colspan= '1'
border  1' id='saiz'>
<form action   method= POST style="margin:0; padding:0;">
<input type="text name= nama_calon placeholder Carian Nama calon'>
<input type= submit' value='Cari'>
</form>
</td>
<td colspan= 4 align='right'>
<?php include('butang-saiz.php'); ?>
</td>
</tr>
<tr bgcolor= yellow'>
<td width='10% >Gambar</td>
<td width="35%'>Nama</td>
<td width='10% >Jawatan Calon</td>
<td width='20%' >Tindakan</td>
</tr>
<?php
// tambahkan pada syarat SQL untuk carian nama calon
Stambahan
lempty(\$_POST['nama_calon'])?"
AND calon.nama_calon LIKE '%".\$ POST['nama_calon']."'":"";
// Papar calon berserta jawatan mereka
Sarahan papar
"SELECT FROM calon, jawatan
WHERE calon.kod_jawatan jawatan.kod_jawatan
\$tambahan ORDER BY jawatan.kod_jawatan";
\$laksana
mysqli_query(\$condb, \$arahan_papar);
while (\$m
mysqli_fetch_array(\$laksana)) {
echo "<tr>
<td><img src= gambar/".\$m['gambar']."" style='width: 100px; height: 100px;'>
</td>
<td>".\$m[ nama_calon']."</td>
<td>".\$m['nama_jawatan']."</td>
<td> <a href='calon-padam.php?id_calon=".\$m[ id_calon ].
onClick="return confirm( Anda pasti anda ingin memadam data ini.')\">Hapus</a> |
</td></tr>";
} ?>
</table>
<?php include('footer.php'); ?>