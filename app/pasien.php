<?php
include "../conf/config.php";
$sql_sindrom = "SELECT id_sindrom, nama_sindrom FROM sindrom";
$result_sindrom = $conn->query($sql_sindrom);

$sql_gejala = "SELECT id_gejala, nama_gejala FROM gejala";
$result_gejala = $conn->query($sql_gejala);

$sql_resiko = "SELECT id_resiko, nama_resiko FROM resiko";
$result_resiko = $conn->query($sql_resiko);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-left:0px; margin-top:-25px;">
            <h2 class="mt-4">Form Entry Identitas Pasien</h2>

            <form action="proses_pasien.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i>Tambah Pasien</span>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-3 row">
                                        <label for="swabDate" class="col-form-label-sm col-sm fs-6">NIK</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nik" id="nik" class="form-control border border-bottom" style="width: 60%;" placeholder="Masukkan NIK Anda">
                                        </div>

                                        <script>
                                            // Get the input element
                                            var input = document.getElementById("nik");

                                            // Restrict input to only allow numbers
                                            input.addEventListener("keypress", function(event) {
                                                var key = event.which || event.keyCode;
                                                if (key < 48 || key > 57) {
                                                    event.preventDefault();
                                                }
                                            });
                                        </script>

                                    </div>
                                    <div class="mb-3 row">
                                        <label for="swabType" class="col-form-label-sm col-sm fs-6">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama" id="nama" class="form-control border border-bottom" style="width: 60%;" placeholder="Masukkan Nama Anda">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="lesionType" class="col-form-label-sm col-sm fs-6">Tanggal Lahir</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control border border-bottom" id="tgl_lahir" name="tgl_lahir" style="width: 60%;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="crustaType" class="col-form-label-sm col-sm fs-6">Jenis Kelamin</label>
                                        <div class="col-sm-8">
                                            <select name="kelamin" id="kelamin" class="form-select border border-bottom" style="width: 60%;">
                                                <option value="" selected>--Pilih--</option>
                                                <option value="Pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div> 

                                    <div class="mb-3 row">
                                        <label for="serumType" class="col-form-label-sm col-sm fs-6">No. HP</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="no_hp" id="no_hp" class="form-control border border-bottom" style="width: 60%;" placeholder="Masukkan Nomor Handphone Anda">
                                        </div>

                                        <script>
                                            var input = document.getElementById("no_hp");
                                            input.addEventListener("keypress", function(event) {
                                                var key = event.which || event.keyCode;
                                                if (key < 48 || key > 57) {
                                                    event.preventDefault();
                                                }
                                            });
                                        </script>

                                    </div>
                                    <div class="mb-3 row">
                                        <label for="labDestination" class="col-form-label-sm col-sm fs-6">Alamat</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="alamat" id="alamat" class="form-control border border-bottom" style="width: 60%;" placeholder="Masukkan Alamat Anda">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Selanjutnya</button>

                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rectangle-xmark"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>