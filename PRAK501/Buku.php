<?php
require('./Model.php');
if (isset($_GET['id_buku'])) {
    DeleteBuku($_GET['id_buku']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <style>
        :root {
            --main-bg-color: #e8eff1;
            --main-text-color: #505d68;
            --header-bg-color: #008891;
            --button-bg-color: #008891;
            --button-hover-color: #005f6b;
            --table-bg-color: #ffffff;
            --table-hover-color: #f0f7fa;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--main-bg-color);
            margin: 0;
            padding: 0;
            color: var(--main-text-color);
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
            margin-top: 10px;
        }
        .footer .button {
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Edit/Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?= GetAllData("buku") ?>
        </tbody>
    </table>
    <div class="footer">
        <a href="FormBuku.php" class="button">Tambah Data</a>
        <a href="index.php" class="button">Kembali Ke Halaman Utama</a>
    </div>
</body>
</html>
