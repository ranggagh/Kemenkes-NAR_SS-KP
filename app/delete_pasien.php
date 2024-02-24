<?php
include "../conf/config.php";

$nik = $_GET['nik'];

mysqli_query($conn, "DELETE FROM pasien WHERE nik = '$nik'");

echo "<script>
        alert('Data berhasil dihapus..');
        document.location.href= 'index.php?page=riwayat-pemeriksaan';
        </script>";
return;

?>
