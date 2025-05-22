<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Minimalist Dashboard</title>
  <link rel="stylesheet" href="assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <style>
        canvas {
          max-width: 600px;
          max-height: 200px
        }

        .card {
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          gap: 16px;
          margin: 16px;
        }

        header {
          margin-bottom: 32px;
        }

        .cl-container h1 {
          padding: 12px;
          font-size: 16px;
          margin: 0 auto;
          width: fit-content;
          border-bottom: 4px solid ;
        }

        .wave {
        animation-name: wave-animation;  /* Refers to the name of your @keyframes element below */
        animation-duration: 2.5s;        /* Change to speed up or slow down */
        animation-iteration-count: infinite;  /* Never stop waving :) */
        transform-origin: 70% 70%;       /* Pivot around the bottom-left palm */
        display: inline-block;
      }
 
      @keyframes wave-animation {
          0% { transform: rotate( 0.0deg) }
        10% { transform: rotate(14.0deg) }  /* The following five values can be played with to make the waving more or less extreme */
        20% { transform: rotate(-8.0deg) }
        30% { transform: rotate(14.0deg) }
        40% { transform: rotate(-4.0deg) }
        50% { transform: rotate(10.0deg) }
        60% { transform: rotate( 0.0deg) }  /* Reset for the last half to pause */
        100% { transform: rotate( 0.0deg) }
      }
      </style>
</head>
<body>
  <aside>
    <nav>  
      <ul>
        <li>
          <a href="index.php" onclick="toggleMenu(event)">Home</a>
        </li>
        <li>
          <a href="/../../eco_dashboard/menu/read.php" onclick="toggleMenu(event)">Menu</a>
          <div class="submenu">
            <a href="menu/read.php">Kelola</a>
          </div>
        </li>
        <li>
        </li>
        <li>
          <a href="#" onclick="toggleMenu(event)">Pemasukan</a>
          <div class="submenu">
            <a href="pemasukan/pemasukan_hari_ini/index.php">Hari Ini</a>
            <a href="pemasukan/pemasukan_harian/index.php">Harian</a>
            <a href="pemasukan/pemasukan_mingguan/index.php">Mingguan</a>
            <a href="pemasukan/pemasukan_bulanan/index.php">Bulanan</a>
            <a href="pemasukan/pemasukan_tahunan/index.php">Tahunan</a>
          </div>
        </li>
        <li>
          <a href="#" onclick="toggleMenu(event)">Pengeluaran</a>
          <div class="submenu">
            <a href="pengeluaran/pengeluaran_hari_ini/read.php">Hari Ini</a>
            <a href="pengeluaran/pengeluaran_harian/read.php">Harian</a>
            <a href="pengeluaran/pengeluaran_mingguan/read.php">Mingguan</a>
            <a href="pengeluaran/pengeluaran_bulanan/index.php">Bulanan</a>
            <a href="pengeluaran/pengeluaran_tahunan/index.php">Tahunan</a>
          </div>
        </li>
      </ul>
    </nav>
  </aside>
    <header>
        <h3>Rumah Makan Minang Anim </h3>
    </header>

      <div class="cl-container">
          <h1>Hi, Selamat Datang di Eco Dashboard <span class="wave">👋</span> </h1>
        <div class="card">
              <h2>Grafik Pemasukan Hari Ini</h2>
        <canvas id="chartHarian" width="600" height="300"></canvas>

        <?php
        $koneksi = new mysqli("localhost", "root", "", "eco_dashboard");

        // Ambil data dari pemasukan_hari_ini per jam
        $query = $koneksi->query("
            SELECT 
                DATE_FORMAT(waktu_transaksi, '%H:00') AS jam,
                SUM(total_harga) AS total
            FROM pemasukan_hari_ini
            GROUP BY HOUR(waktu_transaksi)
            ORDER BY jam ASC
        ");

        $labels = [];
        $data = [];

        while ($row = $query->fetch_assoc()) {
            $labels[] = $row['jam'];
            $data[] = $row['total'];
        }
        ?>


        </div>
        </div>

  </main>

  <footer>
    &copy; 2025 Dashboard Minimalis. All rights reserved.
  </footer>


      <script>
        
    function toggleMenu(e) {
      e.preventDefault();
      const li = e.target.closest('li');
      li.classList.toggle('open');
    }

        const ctx = document.getElementById('chartHarian').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar', // bisa diganti ke 'line'
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Total Pemasukan per Jam',
                    data: <?= json_encode($data) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Jam Transaksi'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
