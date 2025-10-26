<?php
session_start();
include('header.php');
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
// Mengambil data daripada Borang di bawah
$notel = mysqli_real_escape_string(Scondb, $_POST['notel']);
$katalaluan = mysqli_real_escape_string(Scondb, $_POST['katalaluan']);
// Proses login pengguna
$query = "SELECT notel, nama, jenis_pengguna
FROM pengguna
WHERE notel = 'Snotel' AND katalaluan = '$katalaluan'";
$result = mysqli_query($condb, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION['notel'] = $row['notel'];
    $_SESSION['jenis_pengguna'] = Srow['jenis_pengguna'];

    echo "<script> alert('Login berjaya!'); </script>";
    header ("Location: index.php");
    exit;

} else {
    $err = "<p style='color:red;'>Login Gagal<br>
            Semak No Telefon dan Katalaluan</p>";
}
?>

<!--Bahagaian Borang Log Masuk-->
<h3>Daftar Masuk Pengguna (LOGIN)</h3>
<p>Assalamualaikum. Untuk Meneruskan, Sila Lengkapkan Maklumat di Bawah:</p>
<form method = 'POST' action= ''>
    <table border='0'>
        <tr>
            <td> No Telefon: </td>
            <td><input type='text' name='notel' required></td>
        </tr>
        <tr>
            <td> Nama: </td>
            <td><input type='text' name='nama' required></td>
        </tr>
        <tr>
            <td> Katalaluan: </td>
            <td><input type='password' name='katalaluan' required></td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type='submit'> Daftar Masuk</button>
        </td>
        </tr>
</table>
</form>
<?php include('footer.php');
?>