<?php
include "../conf/config.php";

// Mengecek apakah ada nik yang diterima
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Query untuk mengambil data pasien berdasarkan nik
    $query_pasien = "SELECT * FROM pasien WHERE nik = '$nik'";
    $result_pasien = mysqli_query($conn, $query_pasien);
    $row_pasien = mysqli_fetch_assoc($result_pasien);

    // Query untuk mengambil data pemeriksaan berdasarkan nik
    $query_pemeriksaan = "SELECT * FROM pemeriksaan WHERE nik = '$nik'";
    $result_pemeriksaan = mysqli_query($conn, $query_pemeriksaan);
    $row_pemeriksaan = mysqli_fetch_assoc($result_pemeriksaan);

    if (!$row_pasien) {
        echo "<script>alert('Data tidak ditemukan'); window.location.href='riwayat.php';</script>";
    }
} else {
    // Redirect kembali ke halaman riwayat jika tidak ada nik yang diterima
    header("Location: riwayat.php");
}
?>

<!DOCTYPE html>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-left:0px; margin-top:-25px;">
            <h2 class="mt-4">Detail Riwayat Pasien</h2>
            <div class="card">
                <div class="card-header">
                    <span class="h4 my-4"> Detail Pasien</span>
                </div>
                <div class="card-body">
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['nik']; ?></span>
                        </div>
                    </div>
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['nama']; ?></span>
                        </div>
                    </div>
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['tgl_lahir']; ?></span>
                        </div>
                    </div>
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['kelamin']; ?></span>
                        </div>
                    </div>
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">No. HP</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['no_hp']; ?></span>
                        </div>
                    </div>
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['alamat']; ?></span>
                        </div>
                    </div>
                    
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">Kriteria Sindrom</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['krit_sindrom']; ?></span>
                        </div>
                    </div>
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">Faktor Resiko</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['faktor_resiko']; ?></span>
                        </div>
                    </div>
                    <div class="mb row">
                        <label class="col-sm-3 col-form-label">Daftar Gejala</label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <span class="me-2">:&nbsp;</span>
                            <span><?php echo $row_pasien['daftar_gejala']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <span class="h4 my-2">Detail Pemeriksaan</span>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <?php if ($row_pemeriksaan) { ?>
                            <label class="col-sm-3 col-form-label">Tanggal Ambil Spesimen</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <span class="me-2">:&nbsp;</span>
                                <?php echo $row_pemeriksaan['tgl_spesimen']; ?>
                            </div>
                            <label class="col-sm-3 col-form-label">Swab Tonsil / Orofaring</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <span class="me-2">:&nbsp;</span>
                                <?php echo $row_pemeriksaan['swab_tonsil']; ?>
                            </div>
                            <label class="col-sm-3 col-form-label">Cairan Lesi</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <span class="me-2">:&nbsp;</span>
                                <?php echo $row_pemeriksaan['cairan_lesi']; ?>
                            </div>
                            <label class="col-sm-3 col-form-label">Keropeng / Crusta</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <span class="me-2">:&nbsp;</span>
                                <?php echo $row_pemeriksaan['crusta']; ?>
                            </div>
                            <label class="col-sm-3 col-form-label">Serum</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <span class="me-2">:&nbsp;</span>
                                <?php echo $row_pemeriksaan['serum']; ?>
                            </div>
                            <label class="col-sm-3 col-form-label">Diagnosis</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <span class="me-2">:&nbsp;</span>
                                <?php echo $row_pemeriksaan['diagnosis']; ?>
                            </div>
                        <?php } else { ?>
                            <div class="col-sm-9">
                                <p>Belum ada data pemeriksaan untuk pasien ini.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            

            <div class="row mt-4">
                <div class="col-sm-9 offset-sm-3">
                    <a href="index.php?page=riwayat-pemeriksaan" class="btn btn-primary">Kembali ke Daftar Riwayat</a>
                    <a href="index.php?page=pencarian-nik" class="btn btn-success ms-2">Pengambilan Spesimen Lab</a>
                    <a href="index.php?page=pencarian-nik2" class="btn btn-success ms-2">Pengambilan Spesimen Fas/Din</a>
                </div>
            </div>
        </div>
    </main>
</div>