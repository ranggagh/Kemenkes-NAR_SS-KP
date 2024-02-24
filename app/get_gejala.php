<?php
include "../conf/config.php";

$id_sindrom = isset($_GET['id_sindrom']) ? $_GET['id_sindrom'] : '';

$options = "<option value='' selected>--Pilih--</option>";
if($id_sindrom !== '') {
    $sql = "SELECT g.id_gejala, g.nama_gejala 
            FROM gejala g
            INNER JOIN gejala_sindrom gs ON g.id_gejala = gs.id_gejala
            WHERE gs.id_sindrom = '".$id_sindrom."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $options .= "<option value='".$row['nama_gejala']."'>".$row['nama_gejala']."</option>";
        }
    }
}
echo $options;
?>


