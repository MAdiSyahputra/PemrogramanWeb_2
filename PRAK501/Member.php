<?php
require('./Model.php');
if (isset($_GET['id_member'])) {
    DeleteMember($_GET['id_member']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <style>
        :root {
            --header-bg-color: #008891; 
            --button-bg-color: #008891;
            --button-hover-color: #005f6b;
            --main-bg-color: #e8eff1; 
            --text-color: #ffffff; 
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--main-bg-color);
            margin: 0;
            padding: 0;
        }
        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: var(--header-bg-color);
            color: var(--text-color);
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f0f7fa;
        }
        .action-btns {
            text-align: center;
        }
        .button {
            display: inline-block;
            padding: 8px 15px;
            color: var(--text-color);
            background-color: var(--button-bg-color);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            font-size: 16px;
            margin: 5px;
        }
        .button:hover {
            background-color: var(--button-hover-color);
        }
        .footer {
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id Member</th>
                <th>Nama Member</th>
                <th>Nomor Member</th>
                <th>Alamat</th>
                <th>Tanggal mendaftar</th>
                <th>Tanggal terakhir bayar</th>
                <th>Edit/Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?= GetAllData("member") ?>
        </tbody>
    </table>
    <div class="footer">
        <a href="FormMember.php" class="button">Tambah Data</a>
        <a href="index.php" class="button">Kembali Ke Halaman Utama</a>
    </div>
</body>
</html>
