<?php
include '../../assets/koneksi.php';
mysqli_query($conn, "DELETE FROM pemasukan_bulanan");
header("Location: index.php");
