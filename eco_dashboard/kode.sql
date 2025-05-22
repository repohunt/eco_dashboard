CREATE DATABASE eco_dashboard;
USE eco_dashboard;

-- Tabel Menu
CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis_menu VARCHAR(255) NOT NULL
);

-- Dummy data menu restoran Padang
INSERT INTO menu (jenis_menu) VALUES
('Rendang - 20000'),
('Ayam Pop - 18000'),
('Gulai Ikan - 22000'),
('Telur Balado - 15000'),
('Sayur Nangka - 10000');

-- Tabel pemasukan_hari_ini
CREATE TABLE pemasukan_hari_ini (
    id INT AUTO_INCREMENT PRIMARY KEY,
    waktu_transaksi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    jenis_menu VARCHAR(255),
    kuantitas INT,
    total_harga INT
);

-- pemasukan_harian
CREATE TABLE pemasukan_harian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hari_tanggal DATE,
    jumlah_pesanan INT,
    total_harga INT
);

-- pemasukan_mingguan
CREATE TABLE pemasukan_mingguan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jangka_waktu VARCHAR(100),
    jumlah_pesanan INT,
    total_harga INT
);

-- pemasukan_bulanan
CREATE TABLE pemasukan_bulanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jangka_waktu VARCHAR(50),
    jumlah_pesanan INT,
    total_harga INT
);

-- pemasukan_tahunan
CREATE TABLE pemasukan_tahunan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jangka_waktu VARCHAR(100),
    jumlah_pesanan INT,
    total_harga INT
);

-- Tabel pengeluaran (belum dijelaskan secara rinci, bisa ditambah sesuai kebutuhan)
CREATE TABLE pengeluaran_hari_ini (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deskripsi VARCHAR(255),
    jumlah INT,
    tanggal DATE
);

CREATE TABLE pengeluaran_harian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    deskripsi TEXT NOT NULL,
    jumlah INT NOT NULL
);

CREATE TABLE pengeluaran_mingguan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jangka_waktu VARCHAR(50) NOT NULL,
    total_pengeluaran INT NOT NULL
);
