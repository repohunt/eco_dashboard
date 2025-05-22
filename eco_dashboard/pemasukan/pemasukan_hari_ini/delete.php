<?php
include '../../assets/koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM pemasukan_hari_ini WHERE id=$id");

header("Location: index.php");

