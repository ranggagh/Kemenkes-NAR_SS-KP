<?php
include "../conf/config.php";

// Query untuk mengambil semua data pasien dari database
$query = "SELECT * FROM pasien";
$result = mysqli_query($conn, $query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-left:0px; margin-top:-25px;">
            <h2 class="mt-4">Form Riwayat Pemeriksaan</h2>
   
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa fa-list-ul"></i> Data Pasien</span>
                </div>
                <table class="table table-hover" id="#tabel1">
                    <thead>
                        <tr>
                            <th scope="col"><center>No</center></th>
                            <th scope="col"><center>Nik</center></th>
                            <th scope="col"><center>Nama</center></th>
                            <th scope="col"><center>Tgl lahir</center></th>
                            <th scope="col"><center>Kelamin</center></th>
                            <th scope="col"><center>No.HP</center></th>
                            <th scope="col"><center>Alamat</center></th>
                            <th scope="col"><center>Sindrom</center></th>
                            <th scope="col"><center>Gejala</center></th>
                            <th scope="col"><center>Resiko</center></th>
                            <th scope="col"><center>Operasi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'><center>" . $no++ . "</center></th>";
                            // Gunakan fungsi substr untuk membatasi tampilan data
                            echo "<td><center>" . (strlen($row['nik']) > 10 ? substr($row['nik'], 0, 20) . "..." : $row['nik']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['nama']) > 10 ? substr($row['nama'], 0, 10) . "..." : $row['nama']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['tgl_lahir']) > 10 ? substr($row['tgl_lahir'], 0, 10) . "..." : $row['tgl_lahir']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['kelamin']) > 10 ? substr($row['kelamin'], 0, 10) . "..." : $row['kelamin']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['no_hp']) > 10 ? substr($row['no_hp'], 0, 5) . "..." : $row['no_hp']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['alamat']) > 10 ? substr($row['alamat'], 0, 5) . "..." : $row['alamat']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['krit_sindrom']) > 10 ? substr($row['krit_sindrom'], 0, 5) . "..." : $row['krit_sindrom']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['daftar_gejala']) > 10 ? substr($row['daftar_gejala'], 0, 5) . "..." : $row['daftar_gejala']) . "</center></td>";
                            echo "<td><center>" . (strlen($row['faktor_resiko']) > 10 ? substr($row['faktor_resiko'], 0, 5) . "..." : $row['faktor_resiko']) . "</center></td>";
                            echo "<td><center>";
                        
                            echo "<div class='btn-group' role='group' aria-label='Basic example'>";
                            echo "<a href='index.php?page=detail-laporan&nik=" . $row['nik'] . "' class='btn btn-sm btn-primary' title='Detail Riwayat'><i class='fa fa-eye'></i></a>";

                            echo "</div>";

                            
                        }
                        
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
        
    </main>
</div>
