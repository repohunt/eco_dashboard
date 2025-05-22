<?php
$koneksi = new mysqli("localhost", "root", "", "eco_dashboard");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM pengeluaran_harian WHERE id = $id");
}

header("Location: read.php");
exit;
?>
