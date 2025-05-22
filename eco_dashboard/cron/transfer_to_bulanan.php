<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../koneksi.php';

// Deteksi bulan & tahun sekarang
$bulan_ini = date('m');
$tahun_ini = date('Y');

// Ambil semua data dari bulan ini
$query = mysqli_query($conn, "
    SELECT SUM(jumlah_pesanan) as total_pesanan, SUM(total_harga) as total_harga
    FROM pemasukan_mingguan
    WHERE jangka_waktu LIKE '%$tahun_ini-%$bulan_ini%'
");

$data = mysqli_fetch_assoc($query);
$total_pesanan = $data['total_pesanan'] ?? 0;
$total_harga = $data['total_harga'] ?? 0;

if ($total_pesanan > 0 && $total_harga > 0) {
    $nama_bulan = date('F Y'); // Misalnya: "May 2025"

    mysqli_query($conn, "
        INSERT INTO pemasukan_bulanan (jangka_waktu, jumlah_pesanan, total_harga)
        VALUES ('$nama_bulan', $total_pesanan, $total_harga)
    ");

    // Hapus semua data mingguan dari bulan ini
    mysqli_query($conn, "
        DELETE FROM pemasukan_mingguan WHERE jangka_waktu LIKE '%$tahun_ini-%$bulan_ini%'
    ");

    echo "✅ Data bulan $nama_bulan berhasil dipindahkan.";
} else {
    echo "❌ Tidak ada data mingguan untuk bulan ini.";
}
