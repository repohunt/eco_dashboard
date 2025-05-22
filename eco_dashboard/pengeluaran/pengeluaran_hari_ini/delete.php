<?php
$koneksi = new mysqli("localhost", "root", "", "eco_dashboard");

$id = $_GET['id'];
$koneksi->query("DELETE FROM pengeluaran_hari_ini WHERE id=$id");

header("Location: read.php");
exit();
