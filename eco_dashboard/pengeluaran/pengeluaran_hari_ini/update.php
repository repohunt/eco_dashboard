<?php
$koneksi = new mysqli("localhost", "root", "", "eco_dashboard");

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pengeluaran_hari_ini WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    $stmt = $koneksi->prepare("UPDATE pengeluaran_hari_ini SET keterangan=?, jumlah=? WHERE id=?");
    $stmt->bind_param("sii", $keterangan, $jumlah, $id);
    $stmt->execute();

    header("Location: read.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Pemasukan Hari Ini</title>
  <link rel="stylesheet" href="../../style.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
      <style>
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 64px;
        }
        h2 {
           margin: 0 auto;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border: 3px solid;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        select:focus,
        input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            font-size: 15px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
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
    <h2>Edit Pemasukan</h2>

<form method="post">
    Keterangan: <input type="text" name="keterangan" value="<?= $data['keterangan'] ?>" required><br>
    Jumlah: <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required><br>
    <button type="submit">Update</button>
</form>

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

