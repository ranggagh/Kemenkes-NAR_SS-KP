<?php
session_start();
require_once "../conf/config.php";

if (isset($_POST['simpan1'])) { // Pastikan 'simpan1' sesuai dengan nama tombol submit pada form pemeriksaan
    // Data pasien dari form (sesi)
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kelamin = $_POST['kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // Data pemeriksaan dari form
    $krit_sindrom = $_POST['krit_sindrom'];
    $daftar_gejala = $_POST['daftar_gejala'];
    $faktor_resiko = $_POST['faktor_resiko'];

    // Query untuk menyimpan data
    $sql = "INSERT INTO pasien VALUES ('$nik', '$nama', '$tgl_lahir', '$kelamin', '$no_hp', '$alamat', '$krit_sindrom', '$daftar_gejala', '$faktor_resiko')";
    mysqli_query($conn, $sql);

    // Bersihkan sesi data pasien setelah disimpan
    unset($_SESSION['data_pasien']);

    // Arahkan ke halaman laporan atau yang lainnya
    header("Location: index.php?page=riwayat-pemeriksaan");
    exit;
}
?>
