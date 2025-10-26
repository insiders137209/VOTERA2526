<?php
session_start();
include('header.php');
include('kawalan-admin.php');
?>
<h3 align="center">Muat Naik Data (*.txt)</h3>
<form action="" method="POST" enctype="multipart/form-data" style="text-align:center;">
<p><b>Sila pilih fail TXT yang ingin dimuat naik</b></p>
<input type="file" name="data_pengguna" required><br><br>
<button type="submit" name="upload">Muat Naik</button>
</form>
<?php include('footer.php'); ?>

<?php
if (isset($_POST['upload'])) {
    include('connection.php');
    $failsementara = $_FILES["data_pengguna"]["tmp_name"];
    $namafail = $_FILES["data_pengguna"]["name"];
    $jenisfail = pathinfo($namafail, PATHINFO_EXTENSION);

    if ($_FILES["data_pengguna"]["size"] > 0 && $jenisfail == "txt") {
        $fail = fopen($failsementara, "r");
        $bil = 0;
        while (!feof($fail)) {
            $baris = fgets($fail);
            $pecah = explode("|", $baris);
            if (count($pecah) < 3) continue;
            list($notel, $nama, $katalaluan) = array_map('trim', $pecah);
            $semak = mysqli_query($condb, "SELECT * FROM pengguna WHERE notel='$notel'");
            if (mysqli_num_rows($semak) == 0) {
                $sql = "INSERT INTO pengguna (notel, nama, katalaluan, jenis_pengguna)
                        VALUES ('$notel', '$nama', '$katalaluan', 'pengundi')";
                mysqli_query($condb, $sql);
                $bil++;
            }
        }
        fclose($fail);
        echo "<script>alert('Import data selesai. Sebanyak $bil rekod disimpan.');window.location.href='pengguna-senarai.php';</script>";
    } else {
        echo "<script>alert('Hanya fail TXT dibenarkan.');</script>";
    }
}
?>
