<?php
$koneksi = new mysqli("localhost", "root", "", "eco_dashboard");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenis_menu = $_POST['jenis_menu'];

    $stmt = $koneksi->prepare("INSERT INTO menu (jenis_menu) VALUES (?)");
    $stmt->bind_param("s", $jenis_menu);
    $stmt->execute();

    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { max-width: 400px; margin: auto; }
        label, input, textarea { display: block; width: 100%; margin-top: 10px; }
        input[type="text"], textarea {
            padding: 8px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<h2> Tambah Menu Restoran</h2>

<form method="post">
    <label for="jenis_menu">Jenis Menu (Contoh: Rendang - Rp 25.000):</label>
    <input type="text" name="jenis_menu" id="jenis_menu" required>

    <button type="submit">Simpan</button>
</form>

<a href="read.php">⬅️ Kembali ke Daftar Menu</a>

</body>
</html>
