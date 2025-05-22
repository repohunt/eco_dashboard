<?php
include '../../assets/koneksi.php';

$id = $_POST['id'];
$jenis_menu = $_POST['jenis_menu'];
$kuantitas = $_POST['kuantitas'];

// Ambil harga dari string menu (misal: "Rendang - 20000")
$parts = explode(" - ", $jenis_menu);
$harga = intval($parts[1]);

$total = $harga * $kuantitas;

mysqli_query($conn, "UPDATE pemasukan_hari_ini SET 
    jenis_menu = '$jenis_menu', 
    kuantitas = $kuantitas, 
    total_harga = $total 
    WHERE id = $id");

header("Location: index.php");
