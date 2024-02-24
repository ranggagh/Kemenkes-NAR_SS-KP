
<?php
session_start(); // Memulai sesi
require_once "../conf/config.php";

if (isset($_POST['simpan5'])) {
    // Simpan data pasien ke sesi
    $_SESSION['data_pasien'] = [ 
        'nik' => trim(htmlspecialchars($_POST['nik'])),
        'nama' => trim(htmlspecialchars($_POST['nama'])),
        'tgl_lahir' => trim(htmlspecialchars($_POST['tgl_lahir'])),
        'kelamin' => $_POST['kelamin'],
        'no_hp' => trim(htmlspecialchars($_POST['no_hp'])),
        'alamat' => trim(htmlspecialchars($_POST['alamat']))
    ];

    // Arahkan ke halaman pemeriksaan
    header("Location: index.php?page=spesimen-faskes-dinkes");
    exit;
}
?>
