<?php
$koneksi = new mysqli("localhost", "root", "", "eco_dashboard");

// Ambil data dari tabel menu
$result = $koneksi->query("SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menu</title>
      <link rel="stylesheet" href="../style.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
</head>
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
    <h2>📖 Daftar Menu Restoran Padang</h2>
    
    <div class="main-hyperlink">
        <a class="add-btn" href="create.php">Tambah Menu</a>
        <a class="del-all-btn" href="delete_all.php" onclick="return confirm('Hapus semua menu?')">🗑️ Hapus Semua</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Jenis Menu (Makanan + Harga)</th>
            <th>Aksi</th>
        </tr>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['jenis_menu']) ?></td>
                    <td>
                        <div id="secondary-hyperlink">
                            <a class="add-btn" href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                            <a class="del-all-btn" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="3">Belum ada menu tersedia.</td></tr>
        <?php endif; ?>
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
