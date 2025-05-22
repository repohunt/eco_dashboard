<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../koneksi.php';

$tahun_ini = date('Y');

// Ambil semua data bulanan dari tahun ini
$query = mysqli_query($conn, "
    SELECT SUM(jumlah_pesanan) as total_pesanan, SUM(total_harga) as total_harga
    FROM pemasukan_bulanan
    WHERE jangka_waktu LIKE '%$tahun_ini%'
");

$data = mysqli_fetch_assoc($query);
$total_pesanan = $data['total_pesanan'] ?? 0;
$total_harga = $data['total_harga'] ?? 0;

if ($total_pesanan > 0 && $total_harga > 0) {
    $jangka_waktu = "Januari - Desember $tahun_ini";

    mysqli_query($conn, "
        INSERT INTO pemasukan_tahunan (jangka_waktu, jumlah_pesanan, total_harga)
        VALUES ('$jangka_waktu', $total_pesanan, $total_harga)
    ");

    // Hapus semua data bulanan tahun ini
    mysqli_query($conn, "
        DELETE FROM pemasukan_bulanan WHERE jangka_waktu LIKE '%$tahun_ini%'
    ");

    echo "✅ Data tahun $tahun_ini berhasil dipindahkan ke tahunan.";
} else {
    echo "❌ Tidak ada data bulanan untuk tahun $tahun_ini.";
}
