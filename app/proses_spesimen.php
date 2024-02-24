

<?php
session_start();
require_once "../conf/config.php";


// Cek apakah form telah disubmit
if (isset($_POST['simpan2'])) {
    // Ambil data dari form
    
    $tgl_spesimen = mysqli_real_escape_string($conn, $_POST['tgl_spesimen']);
    $swab_tonsil = mysqli_real_escape_string($conn, $_POST['swab_tonsil']);
    $cairan_lesi = mysqli_real_escape_string($conn, $_POST['cairan_lesi']);
    $crusta = mysqli_real_escape_string($conn, $_POST['crusta']);
    $serum = mysqli_real_escape_string($conn, $_POST['serum']);
    $diagnosis = mysqli_real_escape_string($conn, $_POST['diagnosis']);

 
    // NIK diambil dari form, pastikan field NIK ada di form dan dikirim bersama data lainnya
   
    $nik = mysqli_real_escape_string($conn, $_POST['nik']);

 
   // Query untuk menyimpan data ke dalam tabel 'pemeriksaan'
    $sql = "INSERT INTO pemeriksaan (tgl_spesimen, swab_tonsil, cairan_lesi, crusta, serum, diagnosis, nik) VALUES ('$tgl_spesimen', '$swab_tonsil', '$cairan_lesi', '$crusta', '$serum', '$diagnosis', '$nik')";

    
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil menyimpan data, arahkan ke halaman spesimen lab dengan NIK
        header("Location: index.php?page=spesimen-lab&nik=$nik");
        exit;
      } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    exit;
}
?>




