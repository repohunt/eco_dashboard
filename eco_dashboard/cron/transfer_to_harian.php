<?php
include 'koneksi.php';

// Ambil data total
$query = mysqli_query($conn, "
    SELECT SUM(kuantitas) as total_pesanan, SUM(total_harga) as total_harga 
    FROM pemasukan_hari_ini
");

$data = mysqli_fetch_assoc($query);
$total_pesanan = $data['total_pesanan'] ?? 0;
$total_harga = $data['total_harga'] ?? 0;

if ($total_pesanan > 0 && $total_harga > 0) {
    // Simpan ke tabel pemasukan_harian
    mysqli_query($conn, "
        INSERT INTO pemasukan_harian (jumlah_pesanan, total_harga)
        VALUES ($total_pesanan, $total_harga)
    ");
}

// Kosongkan tabel pemasukan_hari_ini
mysqli_query($conn, "DELETE FROM pemasukan_hari_ini");
