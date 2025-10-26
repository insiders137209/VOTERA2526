3php
<?php
// hanya membenarkan pengguna berdaftar sahaja yang boleh akses fail
if(empty(_SESSION['jenis_pengguna']) ||_SESSION['jenis_pengguna'] != "pengundi") {
    die("<script>alert('Sila login.');
    window.location.href='logout.php';</script>");
}
?>