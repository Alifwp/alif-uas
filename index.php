<?php
session_start();

// Jika session username tidak ada, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Satwa</title>
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

        /* Header Styles */
        .header {
            background: linear-gradient(135deg,rgb(118, 101, 9),rgb(118, 101, 9));
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 5px solidrgb(118, 101, 9);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }

        .header p {
            margin: 10px 0 0;
            font-size: 1.2rem;
            font-weight: 300;
        }

        a {
            color:rgb(118, 101, 9);
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color:rgb(118, 101, 9);
            color: white;
        }

        .btn-logout {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 12px;
            background-color:rgb(118, 101, 9);
            color: white;
            text-align: center;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background-color:rgb(118, 101, 9);
        }

        .actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Daftar Satwa</h1>
    <p>Selamat datang staf, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
</div>

<div class="container">
    <h2>Daftar Satwa</h2>
    <a href="tambah_satwa.php">Tambah Satwa</a>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Satwa</th>
                <th>Kategori</th>
                <th>Umur</th>
                <th>Asal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'db.php';

            // Ambil data dari tabel satwa
            $result = $conn->query("SELECT * FROM satwa");

            // Validasi jika tabel kosong atau terjadi error
            if ($result && $result->num_rows > 0) {
                $no = 1; 
                while ($row = $result->fetch_assoc()): 
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['Satwa']) ?></td>
                    <td><?= htmlspecialchars($row['Kategori']) ?></td>
                    <td><?= htmlspecialchars($row['Umur']) ?> Tahun</td>
                    <td><?= htmlspecialchars($row['Asal']) ?></td>
                    <td class="actions">
                        <a href="edit_satwa.php?id=<?= $row['id'] ?>">Edit</a> | 
                        <a href="hapus_satwa.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus satwa ini?')">Hapus</a>
                    </td>
                </tr>
            <?php 
                endwhile; 
            } else {
                echo "<tr><td colspan='6'>Tidak ada data satwa.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tombol logout di bawah -->
    <a href="logout.php">
        <button class="btn-logout">Logout</button>
    </a>
</div>

</body>
</html>
