<?php
include 'db.php';

// Ambil ID dari parameter GET
$id = $_GET['id'];

// Ambil data satwa berdasarkan ID
$result = $conn->query("SELECT * FROM satwa WHERE id=$id");
$Satwa = $result->fetch_assoc();

// Proses form ketika data dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Satwa_name = $_POST['Satwa'];
    $Kategori = $_POST['Kategori'];
    $Umur = $_POST['Umur'];
    $Asal = $_POST['Asal'];

    // Update data satwa
    $sql = "UPDATE satwa SET Satwa='$Satwa_name', Kategori='$Kategori', Umur=$Umur, Asal='$Asal' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Satwa</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color:rgb(118, 101, 9);
        }

        label {
            font-size: 1.1rem;
            margin: 10px 0;
            display: inline-block;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color:rgb(118, 101, 9); /* Ungu pada saat fokus */
        }

        button {
            background-color:rgb(118, 101, 9); /* Pink */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color:rgb(118, 101, 9); /* Warna pink lebih gelap saat hover */
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
        }

        .back-link a {
            color:rgb(118, 101, 9); /* Ungu */
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Data Satwa</h1>
    <form action="" method="POST">
        <label for="Satwa">Nama Satwa:</label>
        <input type="text" name="Satwa" id="Satwa" value="<?= htmlspecialchars($Satwa['Satwa']) ?>" required><br>

        <label for="Kategori">Kategori:</label>
        <input type="text" name="Kategori" id="Kategori" value="<?= htmlspecialchars($Satwa['Kategori']) ?>" required><br>

        <label for="Umur">Umur:</label>
        <input type="number" name="Umur" id="Umur" value="<?= htmlspecialchars($Satwa['Umur']) ?>" required><br>

        <label for="Asal">Asal:</label>
        <input type="text" name="Asal" id="Asal" value="<?= htmlspecialchars($Satwa['Asal']) ?>" required><br>

        <button type="submit">Simpan</button>
    </form>

    <!-- Link Kembali ke Index -->
    <div class="back-link">
        <a href="index.php">Kembali ke Daftar Satwa</a>
    </div>
</div>

</body>
</html>
