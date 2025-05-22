<?php
include '../../assets/koneksi.php';

$jenis_menu = $_POST['jenis_menu'];
$kuantitas = $_POST['kuantitas'];

// Ambil harga dari string menu (misal: "Rendang - 20000")
$parts = explode(" - ", $jenis_menu);
$harga = intval($parts[1]);

$total = $harga * $kuantitas;

mysqli_query($conn, "INSERT INTO pemasukan_hari_ini (jenis_menu, kuantitas, total_harga) 
    VALUES ('$jenis_menu', $kuantitas, $total)");

header("Location: index.php");
