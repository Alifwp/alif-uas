<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $satwa = $_POST['satwa'];
    $kategori = $_POST['kategori'];
    $umur = $_POST['umur'];
    $asal = $_POST['asal'];

    $sql = "INSERT INTO satwa (satwa, kategori, umur, asal) VALUES ('$satwa', '$kategori', '$umur', '$asal')";
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
    <title>Tambah Satwa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background2.jpg'); /* Path gambar */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: rgba(255, 255, 255, 0.9); /* Background putih transparan */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background-color: rgb(118, 101, 9);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: rgb(95, 85, 7);
        }

        .btn-back {
            background-color: rgb(118, 101, 9);
        }

        .btn-back:hover {
            background-color: rgb(95, 85, 7);
        }

        @media (max-width: 600px) {
            .btn-group {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Satwa</h1>
        <form action="" method="POST">
            <label for="satwa">Nama Satwa:</label>
            <input type="text" name="satwa" id="satwa" placeholder="Masukkan nama satwa" required>

            <label for="kategori">Kategori:</label>
            <input type="text" name="kategori" id="kategori" placeholder="Masukkan kategori satwa" required>

            <label for="umur">Umur:</label>
            <input type="number" name="umur" id="umur" placeholder="Masukkan umur satwa (tahun)" required>

            <label for="asal">Asal:</label>
            <input type="text" name="asal" id="asal" placeholder="Masukkan asal satwa" required>

            <div class="btn-group">
                <button type="submit">Tambah Satwa</button>
                <a href="index.php">
                    <button type="button" class="btn-back">Kembali</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
