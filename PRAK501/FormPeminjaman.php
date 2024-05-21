<?php 
require('./Model.php');
if (isset($_GET['id_peminjaman'])) {
    $result = GetPeminjaman($_GET['id_peminjaman']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width: 40%;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            background-color: #008891; 
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #005f6b; 
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #008891;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="input-group">
            <label for="id_buku">ID Peminjaman</label>
            <input type="text" id="id_buku" name="id_buku" value="<?php echo isset($result) ? $result[0]["id_buku"] : ""; ?>" required>
        </div>
        <div class="input-group">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="<?php echo isset($result) ? $result[0]["tgl_pinjam"] : ""; ?>" required>
        </div>
        <div class="input-group">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="date" id="tgl_kembali" name="tgl_kembali" value="<?php echo isset($result) ? $result[0]["tgl_kembali"] : ""; ?>" required>
        </div>
        <?php
        if (isset($_GET['id_peminjaman'])) {
            echo "<button type='submit' name='update'>Update</button>";
        } else {
            echo "<button type='submit' name='submit'>Tambah</button>";
        }
        ?>
    </form>
    <div class="footer">
        <button onclick="location.href='Peminjaman.php'">Kembali Ke Halaman Utama</button>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        AddPeminjaman($_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    }
    if (isset($_POST['update'])) {
        UpdatePeminjaman($_GET['id_peminjaman'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    }
    ?>
</body>
</html>
