<?php 
require_once("asset/koneksi.php");

$_SESSION['login_status'] = '';
unset($_SESSION['login_status']);
session_unset();
session_destroy();
header("location: index.php");

 ?>