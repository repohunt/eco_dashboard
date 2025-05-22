<?php
include '../../assets/koneksi.php';
mysqli_query($conn, "DELETE FROM pemasukan_tahunan");
header("Location: index.php");
