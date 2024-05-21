<?php
require('./Model.php');
if (isset($_GET['id_peminjaman'])) {
    DeletePeminjaman($_GET['id_peminjaman']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <style>
        :root {
            --main-bg-color: #e8eff1;
            --main-text-color: #333; 
            --table-bg-color: #ffffff; 
            --header-bg-color: #008891; 
            --table-hover-color: #f0f7fa; 
            --button-bg-color: #008891; 
            --button-hover-color: #005f6b;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--main-bg-color);
            margin: 0;
            padding: 0;
            color: var(--main-text-color);
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: var(--table-bg-color);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: var(--header-bg-color);
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f8f8f8;
        }
        tr:hover {
            background-color: var(--table-hover-color);
        }
        .action-btns {
            text-align: center;
        }
        .button {
            display: inline-block;
            padding: 8px 15px;
            color: white;
            background-color: var(--button-bg-color);
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .button:hover {
            background-color: var(--button-hover-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .footer {
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: var(--header-bg-color); 
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id Peminjaman</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Edit/Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?= GetAllData("peminjaman") ?>
        </tbody>
    </table>
    <div class="footer">
        <a href="FormPeminjaman.php" class="button">Tambah Data</a>
        <a href="index.php" class="button">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
