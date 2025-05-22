<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../koneksi.php';

// Cari tanggal awal dan akhir minggu saat ini
$start_week = date('Y-m-d', strtotime('monday this week'));
$end_week = date('Y-m-d', strtotime('sunday this week'));

// Ambil total pesanan dan harga dari pemasukan_harian untuk minggu ini
$query = mysqli_query($conn, "
    SELECT SUM(jumlah_pesanan) AS total_pesanan, SUM(total_harga) AS total_harga
    FROM pemasukan_harian
    WHERE tanggal BETWEEN '$start_week' AND '$end_week'
");

$data = mysqli_fetch_assoc($query);
$total_pesanan = $data['total_pesanan'] ?? 0;
$total_harga = $data['total_harga'] ?? 0;

if ($total_pesanan > 0 && $total_harga > 0) {
    $jangka_waktu = "$start_week s/d $end_week";

    // Simpan ke pemasukan_mingguan
    mysqli_query($conn, "
        INSERT INTO pemasukan_mingguan (jangka_waktu, jumlah_pesanan, total_harga)
        VALUES ('$jangka_waktu', $total_pesanan, $total_harga)
    ");

    // Hapus data mingguan yang sudah dimasukkan dari pemasukan_harian
    mysqli_query($conn, "
        DELETE FROM pemasukan_harian
        WHERE tanggal BETWEEN '$start_week' AND '$end_week'
    ");

    echo "Data mingguan berhasil dipindahkan.";
} else {
    echo "Tidak ada data pemasukan harian untuk minggu ini.";
}
