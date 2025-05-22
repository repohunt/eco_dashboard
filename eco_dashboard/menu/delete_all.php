<?php
$koneksi = new mysqli("localhost", "root", "", "eco_dashboard");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$sql = "DELETE FROM menu";

if ($koneksi->query($sql)) {
    // Redirect ke halaman utama
    header("Location: index.php"); // Ganti sesuai halaman kamu
    exit(); // Penting! Agar script tidak lanjut jalan
} else {
    echo "❌ Gagal menghapus data: " . $koneksi->error;
}

$koneksi->close();
?>
