<?php
$koneksi = mysqli_connect('localhost','root','','db_kemenkes');
// // mengecek koneksi
// if(!$koneksi){
//     die("Koneksi Gagal". mysqli_connect_error());
// }
// else{
//     echo "Koneksi Berhasil";
// }
?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_kemenkes";


$conn = new mysqli($host, $username, $password, $dbname);


?>