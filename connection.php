<?php
// menyambungkan fail php kepada pangkalan data
$pangkalan_data = 'VoteX';
$condb = mysqli_connect('localhost', 'root', '');
mysqli_select_db($condb, $pangkalan_data);
?>
