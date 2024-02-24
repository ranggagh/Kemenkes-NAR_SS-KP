
<?php
include "../conf/config.php";

$id_sindrom = isset($_GET['id_sindrom']) ? $_GET['id_sindrom'] : '';

$options = "<option value='' selected>--Pilih--</option>";
if($id_sindrom !== '') {
    $sql = "SELECT g.id_resiko, g.nama_resiko 
            FROM resiko g
            INNER JOIN resiko_sindrom gs ON g.id_resiko = gs.id_resiko
            WHERE gs.id_sindrom = '".$id_sindrom."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $options .= "<option value='".$row['nama_resiko']."'>".$row['nama_resiko']."</option>";
        }
    }
}
echo $options;
?>
