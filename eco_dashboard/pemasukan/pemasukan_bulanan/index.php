<?php
include '../../assets/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM pemasukan_tahunan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
</head>
<body>
 <aside>
    <nav>  
      <ul>
        <li>
          <a href="/../../eco_dashboard/index.php" onclick="toggleMenu(event)">Home</a>
           <div class="submenu">
            <a href="/../../eco_dashboard/index.php">Home Page</a>
          </div>
        <li>
          <a href="/../../eco_dashboard/menu/read.php" onclick="toggleMenu(event)">Menu</a>
          <div class="submenu">
            <a href="/../../eco_dashboard/menu/read.php">Kelola</a>
          </div>
        </li>
        <li>
        </li>
        <li>
          <a href="#" onclick="toggleMenu(event)">Pemasukan</a>
          <div class="submenu">
            <a href="/../../eco_dashboard/pemasukan/pemasukan_hari_ini/index.php">Hari Ini</a>
            <a href="/../../eco_dashboard/pemasukan/pemasukan_harian/index.php">Harian</a>
            <a href="/../../eco_dashboard/pemasukan/pemasukan_mingguan/index.php">Mingguan</a>
            <a href="/../../eco_dashboard/pemasukan/pemasukan_bulanan/index.php">Bulanan</a>
            <a href="/../../eco_dashboard/pemasukan/pemasukan_tahunan/index.php">Tahunan</a>
          </div>
        </li>
        <li>
          <a href="#" onclick="toggleMenu(event)">Pengeluaran</a>
          <div class="submenu">
            <a href="/../../eco_dashboard/pengeluaran/pengeluaran_hari_ini/read.php">Hari Ini</a>
            <a href="/../../eco_dashboard/pengeluaran/pengeluaran_harian/read.php">Harian</a>
            <a href="/../../eco_dashboard/pengeluaran/pengeluaran_mingguan/read.php">Mingguan</a>
            <a href="/../../eco_dashboard/pengeluaran/pengeluaran_bulanan/index.php">Bulanan</a>
            <a href="/../../eco_dashboard/pengeluaran/pengeluaran_tahunan/index.php">Tahunan</a>
          </div>
        </li>
      </ul>
    </nav>
  </aside>

  <header>
    <h3>Rumah Makan Minang Anim </h3>
  </header>

<main>
    <h2>Daftar Pemasukan Bulanan</h2>
    <div class="main-hyperlink">
        <a class="del-all-btn" href="delete_all.php" onclick="return confirm('Hapus semua data?')">Hapus Semua</a>
    </div>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Jangka Waktu</th>
        <th>Jumlah Pesanan</th>
        <th>Total Harga</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['jangka_waktu'] ?></td>
        <td><?= $row['jumlah_pesanan'] ?></td>
        <td><?= $row['total_harga'] ?></td>
        <td>
            <a class="del-all-btn" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</main>
<footer>
    Eco-Dashboard / Website Sample
</footer>

  <script>
    function toggleMenu(e) {
      e.preventDefault();
      const li = e.target.closest('li');
      li.classList.toggle('open');
    }
  </script>

</body>
</html>



