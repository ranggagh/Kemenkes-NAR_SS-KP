<?php

include "../conf/config.php";
$sql_sindrom = "SELECT id_sindrom, nama_sindrom FROM sindrom";
$result_sindrom = $conn->query($sql_sindrom);

$sql_gejala = "SELECT id_gejala, nama_gejala FROM gejala";
$result_gejala = $conn->query($sql_gejala);

$sql_resiko = "SELECT id_resiko, nama_resiko FROM resiko";
$result_resiko = $conn->query($sql_resiko);
?>
 
<?php
 
// Di awal file laporan.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data yang dikirimkan melalui form
    $nik = isset($_POST['nik']) ? htmlspecialchars($_POST['nik']) : '';
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
    $tgl_lahir = isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : '';
    $kelamin = isset($_POST['kelamin']) ? $_POST['kelamin'] : '';
    $no_hp = isset($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : '';
    $alamat = isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '';

    // Tampilkan data
    echo "NIK: " . $nik . "<br>";
    echo "Nama: " . $nama . "<br>";
    echo "Tanggal Lahir: " . $tgl_lahir . "<br>";
    echo "Jenis Kelamin: " . $kelamin . "<br>";
    echo "No. HP: " . $no_hp . "<br>";
    echo "Alamat: " . $alamat . "<br>";
    // Lanjutkan dengan kode untuk memproses data atau menampilkan formulir lanjutan
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-left:0px; margin-top:-25px;">
            <h2 class="mt-4">Form Entry Identitas Pasien</h2>

            <form action="proses_pemeriksaan.php" method="POST" enctype="multipart/form-data">
                <!-- Data Pasien dari Session -->
                <input type="hidden" name="nik" value="<?php echo isset($_SESSION['data_pasien']['nik']) ? $_SESSION['data_pasien']['nik'] : ''; ?>">
                <input type="hidden" name="nama" value="<?php echo isset($_SESSION['data_pasien']['nama']) ? $_SESSION['data_pasien']['nama'] : ''; ?>">
                <input type="hidden" name="tgl_lahir" value="<?php echo isset($_SESSION['data_pasien']['tgl_lahir']) ? $_SESSION['data_pasien']['tgl_lahir'] : ''; ?>">
                <input type="hidden" name="kelamin" value="<?php echo isset($_SESSION['data_pasien']['kelamin']) ? $_SESSION['data_pasien']['kelamin'] : ''; ?>">
                <input type="hidden" name="no_hp" value="<?php echo isset($_SESSION['data_pasien']['no_hp']) ? $_SESSION['data_pasien']['no_hp'] : ''; ?>">
                <input type="hidden" name="alamat" value="<?php echo isset($_SESSION['data_pasien']['alamat']) ? $_SESSION['data_pasien']['alamat'] : ''; ?>">


            <form action="proses_pemeriksaan.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i>Tambah Pasien</span>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="row">
                                <div class="col-8">

                                <div class="mb-3 row">
                                        <label for="kriteria_sindrom" class="col-form-label-sm col-sm fs-6">Kriteria Sindrom</label>
                                        <div class="col-sm-8">


                                            <select name="krit_sindrom" id="krit_sindrom" class="form-select border border-bottom" style="width: 60%" onchange="getGejala(this.value), getResiko(this.value)">

                                                <option value="" selected>--Pilih--</option>
                                                <?php if ($result_sindrom->num_rows > 0) :
                                                    while ($row = $result_sindrom->fetch_assoc()) : ?>
                                                        <option value="<?php echo $row['id_sindrom']; ?>">
                                                            <?php echo htmlspecialchars($row['nama_sindrom']); ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                <?php else : ?>
                                                    <option value="">Tidak ada data sindrom</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="daftar_gejala" class="col-form-label-sm col-sm fs-6">Daftar Gejala</label>
                                        <div class="col-sm-8">
                                            <select name="daftar_gejala" id="daftar_gejala" class="form-select border border-bottom" style="width: 60%;">
                                                <option value="" selected>--Pilih--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="faktor_risiko" class="col-form-label-sm col-sm fs-6">Faktor Risiko</label>
                                        <div class="col-sm-8">
                                            <select name="faktor_resiko" id="faktor_resiko" class="form-select border border-bottom" style="width: 60%;">
                                                <option value="" selected>--Pilih--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function getGejala(sindromId) {
                                            if (sindromId == "") {
                                                document.getElementById("daftar_gejala").innerHTML = "<option value=''>--Pilih--</option>";
                                                return;
                                            }
                                            const xhttp = new XMLHttpRequest();
                                            xhttp.onload = function() {
                                                document.getElementById("daftar_gejala").innerHTML = this.responseText;
                                            }
                                            xhttp.open("GET", "get_gejala.php?id_sindrom=" + sindromId);
                                            xhttp.send();
                                         }
                                    </script>

                                    <script>
                                        function getResiko(sindromId) {
                                            if (sindromId == "") {
                                                document.getElementById("faktor_resiko").innerHTML = "<option value=''>--Pilih--</option>";
                                                return;
                                            }
                                            const xhttp = new XMLHttpRequest();
                                            xhttp.onload = function() {
                                                document.getElementById("faktor_resiko").innerHTML = this.responseText;
                                            }
                                            xhttp.open("GET", "get_resiko.php?id_sindrom=" + sindromId);
                                            xhttp.send();
                                        }
                                    </script>
                                    
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" name="simpan1" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>

                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rectangle-xmark"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

