<?php
include '../../assets/koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM pemasukan_bulanan WHERE id=$id");
header("Location: index.php");
