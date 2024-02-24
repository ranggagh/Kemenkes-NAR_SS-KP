<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_kemenkes";


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<?php
$sql_gejala = "SELECT id_gejala, nama_gejala FROM gejala";
$result_gejala = $conn->query($sql_gejala);

$sql_resiko = "SELECT id_resiko, nama_resiko FROM resiko";
$result_resiko = $conn->query($sql_resiko);

$sql_diagnosis = "SELECT id_diagnosis, nama_diagnosis FROM diagnosis";
$result_diagnosis = $conn->query($sql_diagnosis);

$sql_spesimen = "SELECT id_spesimen, jenis_spesimen FROM spesimen";
$result_spesimen = $conn->query($sql_spesimen);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="box-shadow: 0px 2px 5px white;">
            <h2 class="mt">Tabel Master Database</h2>
            <div class="card">
                <div class="card-header ">
                    <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i>List Tabel Master</span>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="swabDate" class="col-form-label-sm col-sm fs-6"> Gejala</label>
                                    <div class="col-sm-8">
                                    <select name="gejala" id="gejala" class="form-select border border-bottom" style="width: 60%;">
                                        <option value="" selected>--Pilih--</option>
                                        <?php if ($result_gejala->num_rows > 0) :
                                            while ($row = $result_gejala->fetch_assoc()) :
                                                // Memotong nama gejala jika lebih dari 30 karakter dan menambahkan "..."
                                                $nama_gejala_display = substr($row["nama_gejala"], 0, 30);
                                                if (strlen($row["nama_gejala"]) > 30) {
                                                    $nama_gejala_display .= "...";
                                                }
                                                ?>
                                                <option value="<?php echo htmlspecialchars($row['id_gejala']); ?>" title="<?php echo htmlspecialchars($row['nama_gejala']); ?>">
                                                    <?php echo htmlspecialchars($nama_gejala_display); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <option value="">Tidak ada data gejala</option>
                                        <?php endif; ?>
                                    </select>

                                            
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="swabType" class="col-form-label-sm col-sm fs-6">Risiko</label>
                                    <div class="col-sm-8">
                                    <select name="gejala" id="gejala" class="form-select border border-bottom" style="width: 60%;">

                                        <option value="" selected>--Pilih--</option>
                                        <?php if ($result_resiko->num_rows > 0) :
                                            while ($row = $result_resiko->fetch_assoc()) :
                                                // Memotong nama gejala jika lebih dari 30 karakter dan menambahkan "..."
                                                $nama_resiko_display = substr($row["nama_resiko"], 0, 30);
                                                if (strlen($row["nama_resiko"]) > 30) {
                                                    $nama_resiko_display .= "...";
                                                }
                                                ?>
                                                <option value="<?php echo htmlspecialchars($row['id_resiko']); ?>" title="<?php echo htmlspecialchars($row['nama_resiko']); ?>">
                                                    <?php echo htmlspecialchars($nama_resiko_display); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <option value="">Tidak ada data gejala</option>
                                        <?php endif; ?>
                                    </select>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="serumType" class="col-form-label-sm col-sm fs-6">Diagnosis</label>
                                    <div class="col-sm-8">
                                    <select name="gejala" id="gejala" class="form-select border border-bottom" style="width: 60%;">

                                    <option value="" selected>--Pilih--</option>
                                        <?php if ($result_diagnosis->num_rows > 0) :
                                            while ($row = $result_diagnosis->fetch_assoc()) :
                                                // Memotong nama gejala jika lebih dari 30 karakter dan menambahkan "..."
                                                $nama_diagnosis_display = substr($row["nama_diagnosis"], 0, 30);
                                                if (strlen($row["nama_diagnosis"]) > 30) {
                                                    $nama_diagnosis_display .= "...";
                                                }
                                                ?>
                                                <option value="<?php echo htmlspecialchars($row['id_diagnosis']); ?>" title="<?php echo htmlspecialchars($row['nama_diagnosis']); ?>">
                                                    <?php echo htmlspecialchars($nama_diagnosis_display); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <option value="">Tidak ada data gejala</option>
                                        <?php endif; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="labDestination" class="col-form-label-sm col-sm fs-6">Spesimen</label>
                                    <div class="col-sm-8">
                                    <select name="gejala" id="gejala" class="form-select border border-bottom" style="width: 60%;">
                                    <option value="" selected>--Pilih--</option>
                                        <?php if ($result_spesimen->num_rows > 0) :
                                            while ($row = $result_spesimen->fetch_assoc()) :
                                                // Memotong nama gejala jika lebih dari 30 karakter dan menambahkan "..."
                                                $nama_spesimen_display = substr($row["jenis_spesimen"], 0, 30);
                                                if (strlen($row["jenis_spesimen"]) > 30) {
                                                    $nama_spesimen_display .= "...";
                                                }
                                                ?>
                                                <option value="<?php echo htmlspecialchars($row['id_spesimen']); ?>" title="<?php echo htmlspecialchars($row['jenis_spesimen']); ?>">
                                                    <?php echo htmlspecialchars($nama_spesimen_display); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <option value="">Tidak ada data gejala</option>
                                        <?php endif; ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: white;">
                            <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rectangle-xmark"></i> Reset</button>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </main>
</div>