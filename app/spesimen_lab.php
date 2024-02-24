<?php
require_once "../conf/config.php";

$sql = "SELECT id_spesimen, jenis_spesimen FROM spesimen"; // Query untuk mengambil data
$result = $conn->query($sql);

$spesimen_options = array(); // Inisialisasi array untuk menyimpan opsi spesimen

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Membatasi panjang teks yang ditampilkan menjadi 30 karakter
        $jenis_spesimen_display = substr($row["jenis_spesimen"], 0, 30);
        if (strlen($row["jenis_spesimen"]) > 30) {
            $jenis_spesimen_display .= "...";
        }
        // Menambahkan opsi spesimen ke array
        $spesimen_options[] = '<option value="' . $row["jenis_spesimen"] . '" title="' . $row["jenis_spesimen"] . '">' . $jenis_spesimen_display . '</option>';
    }
} else {
    // Jika tidak ada data spesimen
    $spesimen_options[] = '<option value="">Tidak ada data spesimen</option>';
}

$sql = "SELECT id_diagnosis, nama_diagnosis FROM diagnosis"; // Query untuk mengambil data
$result = $conn->query($sql);

$diagnosis_options = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nama_diagnosis_display = substr($row["nama_diagnosis"], 0, 30);
        if (strlen($row["nama_diagnosis"]) > 30) {
            $nama_diagnosis_display .= "...";
        }
        $diagnosis_options[] = '<option value="' . $row["nama_diagnosis"] . '" title="' . $row["nama_diagnosis"] . '">' . $nama_diagnosis_display . '</option>';
    }
} else {
    $diagnosis_options[] = '<option value="">Tidak ada data spesimen</option>';
}

$sql = "SELECT id_test, pilihan FROM test"; // Query untuk mengambil data
$result = $conn->query($sql);

$test_options = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nama_test_display = substr($row["pilihan"], 0, 30);
        if (strlen($row["pilihan"]) > 30) {
            $nama_test_display .= "...";
        }
        $test_options[] = '<option value="' . $row["pilihan"] . '" title="' . $row["pilihan"] . '">' . $nama_test_display . '</option>';
    }
} else {
    $test_options[] = '<option value="">Tidak ada data spesimen</option>';
}
?>


<?php
$sql = "SELECT jenis_spesimen, jenis_spesimen FROM spesimen"; // Query untuk mengambil data
$result = $conn->query($sql);
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-left:0px; margin-top:-25px;">
            <h2 class="mt-4">Form Entry Spesimen Level Akses Operator Laboratorium</h2>

            <form action="proses_spesimen.php" method="POST" enctype="multipart/form-data">
                <!-- Data Pasien dari Session -->
                <input type="hidden" name="nik" value="<?php echo isset($_SESSION['data_pasien']['nik']) ? $_SESSION['data_pasien']['nik'] : ''; ?>">

                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Spesimen</span>
                    </div>
                    <div class="card-body">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-3 row">
                                        <label for="swabDate" class="col-form-label-sm col-sm fs-6">Tanggal Ambil Spesimen</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control border border-bottom" id="tgl_spesimen" name="tgl_spesimen" style="width: 134%; height: 30px;">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="swabType" class="col-form-label-sm col-sm-4 fs-6">Swab tonsil / orofaring</label>
                                        <div class="col-sm-4">
                                            <select name="swab_tonsil" id="swab_tonsil" class="form-select border border-bottom" style="width: 125%; height: 30px">
                                                <option value="" selected>-- Pilih --</option>
                                                <?php echo implode('', $test_options); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="swab_tonsil" id="swab_tonsil" style=" width: 125%; margin-left: 100px; height: 30px; ">
                                                <option value="" selected>-- Pilih Spesimen --</option>
                                                <?php echo implode('', $spesimen_options); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="lesionType" class="col-form-label-sm col-sm fs-6">Cairan lesi</label>
                                        <div class="col-sm-4">
                                            <select name="cairan_lesi" id="cairan_lesi" class="form-select border border-bottom" style="width: 125%; height: 30px">
                                                <option value="" selected>-- Pilih --</option>
                                                <?php echo implode('', $test_options); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="cairan_lesi" id="cairan_lesi" style=" width: 125%; margin-left: 100px; height: 30px; ">
                                                <option value="" selected>-- Pilih Spesimen --</option>
                                                <?php echo implode('', $spesimen_options); ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="crustaType" class="col-form-label-sm col-sm fs-6">Keropeng / crusta</label>
                                        <div class="col-sm-4">
                                            <select name="crusta" id="crusta" class="form-select border border-bottom" style="width: 125%; height: 30px">
                                                <option value="" selected>-- Pilih --</option>
                                                <?php echo implode('', $test_options); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">

                                            <select name="crusta" id="crusta" style=" width: 125%; margin-left: 100px; height: 30px; ">
                                                <option value="" selected>-- Pilih Spesimen --</option>
                                                <?php echo implode('', $spesimen_options); ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="serumType" class="col-form-label-sm col-sm fs-6">Serum</label>
                                        <div class="col-sm-4">
                                            <select name="serum" id="serum" class="form-select border border-bottom" style="width: 125%; height: 30px">
                                                <option value="" selected>-- Pilih --</option>
                                                <?php echo implode('', $test_options); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="serum" id="serum" style=" width: 125%; margin-left: 100px; height: 30px; ">
                                                <option value="" selected>-- Pilih Spesimen --</option>
                                                <?php echo implode('', $spesimen_options); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="diagnosis" class="col-form-label-sm col-sm fs-6">Diagnosis Suspek</label>
                                        <div class="col-sm-4">
                                            <select name="diagnosis" id="diagnosis" style="width: 125%; height: 30px; margin-left: -210px;">
                                                <option value="" selected>-- Pilih --</option>
                                                <?php echo implode('', $diagnosis_options); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            var selectElements = document.querySelectorAll("select");
                                            selectElements.forEach(function(selectElement) {
                                                selectElement.addEventListener("change", function() {
                                                    var selectedValue = this.value;
                                                    var nextSelectElement = this.parentNode.nextElementSibling.querySelector("select");
                                                    if (selectedValue === "Ya") {
                                                        nextSelectElement.disabled = false;
                                                    } else {
                                                        nextSelectElement.disabled = true;
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                </div>
                            </div>
                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" name="simpan2" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Siimpan</button>
                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rectangle-xmark"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </main>
</div>