<?php
session_start();
include('logout/logout_popup.php');
// unset($_SESSION['nama']);
// unset($_SESSION['level']);
session_destroy();
header('location: ../');
exit;
?>