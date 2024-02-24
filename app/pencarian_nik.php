
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-left:0px; margin-top:-25px;">
            <h2 class="mt-4">Form Entry Identitas Pasien</h2>

            <form action="proses_riwayat.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i>Masukan NIK yang ingin ditambah Spesimen</span>
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
                                
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" name="simpan5" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Selanjutnya</button>

                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rectangle-xmark"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>