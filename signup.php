<?php
include ('header.php');
include ('connection.php' );

if ($_SERVER ['REQUEST_METHOD'] == 'POST');
    $nama   =   mysql_real_escape_string($condb, $_POST ['nama']);
    $notel  =   mysql_real_escape_string($condb, $_POST[ 'notel']);
    $katalaluan =   mysql_real_escape_string($condb, $_POST ['katalaluan']);

    #Data Validation: Had Atas
    if(strlen($notel) > 12){
        die("<script>
        alert('no telefon lebih daripada 12 digit');
        location.href='signup.php;
        </script> ");
    }

    #data validation: had bawah
        if(strlen($notel) > 10){
        die("<script
        alert('no telefon kurang daripada 10 digit');
        location.href='signup.php;
        </script> ");}

        #semak semula notel dah wujud dalam data base ke belum

        $sql_semak = "select notel from pengguna where notel = '$notel ";
        $laksana_semak = mysql_query($condb,$sql_semak);
        if(mysql_num_rows($laksana_semak)==1){
            die("<script>
                        alert ('No telefon telah digunakan. Sila Tukar No Telefon Yang Lain');
                        location.href='signup.php
                        </script>"); }

//simpan data pengguna baru
    $query = "INSERT INTO pengguna
    (notel, nama, katalaluan, jenis_pengguna)
    VALUES ('$notel, $nama, $katalaluan, $jenis_pengguna, 'pengundi)";
    if (mysql_query($condb, $query)) {
        echo "<script>
                alert('Alhamdulilah, Pendaftaran Berjaya');
                location.href = 'login.php';
                </script>";
    } else {
        echo "<script> alert ('Allahu, Pendaftaran Gagal. Istighfar dan Bismillah Cuba Lagi.'); </script>";
        echo $sql_simpan.mysqli_error($condb);

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
<?php include('footer.php'); ?>