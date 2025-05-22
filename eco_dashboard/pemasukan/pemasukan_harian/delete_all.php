<?php
include 'koneksi.php';

mysqli_query($conn, "DELETE FROM pemasukan_harian");

header("Location: index.php");
