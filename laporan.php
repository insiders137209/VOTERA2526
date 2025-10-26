<?php
session_start();
include('header.php');
include('connection.php');
?>
<h3 align='center'>Laporan Keputusan Undian</h3>
<form method='POST' align='center'>
<select name='kod_jawatan' required>
<option value='' disabled selected>Pilih Jawatan</option>
<option value='semua'>KEPUTUSAN UNDIAN SEMUA</option>
<?php
$qj = mysqli_query($condb, "SELECT * FROM jawatan ORDER BY kod_jawatan");
while ($j = mysqli_fetch_array($qj)) {
    echo "<option value='{$j['kod_jawatan']}'>{$j['nama_jawatan']}</option>";
}
?>
</select>
<input type='submit' value='Papar'>
</form>
<?php
if (!empty($_POST['kod_jawatan'])) {
    $kod = mysqli_real_escape_string($condb, $_POST['kod_jawatan']);
    if ($kod === 'semua') {
        echo "<h3 align='center'>Pemenang Setiap Jawatan</h3>";
        $qj = mysqli_query($condb, "SELECT * FROM jawatan ORDER BY kod_jawatan");
        while ($jaw = mysqli_fetch_array($qj)) {
            echo "<h4 align='center'>{$jaw['nama_jawatan']}</h4>";
            echo "<table border='1' align='center' width='50%'>
            <tr><th>Calon</th><th>Bilangan Undian</th></tr>";
            $qc = mysqli_query($condb, "
                SELECT calon.nama_calon,
                (SELECT COUNT(*) FROM undian WHERE undian.id_calon = calon.id_calon) AS bil
                FROM calon WHERE calon.kod_jawatan='{$jaw['kod_jawatan']}' ORDER BY bil DESC
            ");
            while ($c = mysqli_fetch_array($qc)) {
                echo "<tr><td>{$c['nama_calon']}</td><td align='center'>{$c['bil']}</td></tr>";
            }
            echo "</table><br>";
        }
    } else {
        $jaw = mysqli_fetch_array(mysqli_query($condb, "SELECT * FROM jawatan WHERE kod_jawatan='$kod'"));
        echo "<h3 align='center'>Keputusan Undian: {$jaw['nama_jawatan']}</h3>
        <table border='1' align='center' width='50%'>
        <tr><th>Calon</th><th>Bilangan Undian</th></tr>";
        $qc = mysqli_query($condb, "
            SELECT calon.nama_calon,
            (SELECT COUNT(*) FROM undian WHERE undian.id_calon = calon.id_calon) AS bil
            FROM calon WHERE calon.kod_jawatan='$kod' ORDER BY bil DESC
        ");
        while ($c = mysqli_fetch_array($qc)) {
            echo "<tr><td>{$c['nama_calon']}</td><td align='center'>{$c['bil']}</td></tr>";
        }
        echo "</table>";
    }
}
include('footer.php');
?>