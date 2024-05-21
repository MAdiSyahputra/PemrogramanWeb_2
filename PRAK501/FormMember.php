<?php
require 'Model.php';

if (isset($_GET['id_member'])) {
    $result = GetMember($_GET['id_member']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8eff1;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        td {
            padding: 10px;
        }
        input[type="text"], input[type="date"], input[type="datetime-local"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: none;
        }
        button {
            background-color: #008891;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #005f6b;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nama Member</td>
                <td><input type="text" name="nama_member" value="<?php echo isset($result) ? $result[0]["nama_member"] : ""; ?>" required></td>
            </tr>
            <tr>
                <td>Nomor Member</td>
                <td><input type="text" name="nomor_member" value="<?php echo isset($result) ? $result[0]["nomor_member"] : ""; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" cols="30" rows="10" required><?php echo isset($result) ? $result[0]["alamat"] : ""; ?></textarea></td>
            </tr>
            <tr>
                <td>Tanggal Daftar</td>
                <td><input type="datetime-local" name="tgl_daftar" value="<?php echo isset($result) ? date('Y-m-d\TH:i', strtotime($result[0]["tgl_mendaftar"])) : ""; ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Bayar</td>
                <td><input type="date" name="tgl_terakhir_bayar" value="<?php echo isset($result) ? $result[0]["tgl_terakhir_bayar"] : ""; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php
                    if (isset($_GET['id_member'])) {
                        echo "<button type='submit' name='update'>Update</button>";
                    } else {
                        echo "<button type='submit' name='submit'>Tambah</button>";
                    }
                ?></td>
            </tr>
        </table>
    </form>
    <div class="footer">
        <button onclick="window.location.href='Member.php';">Kembali Ke Halaman Utama</button>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $tgl_daftar = date_create($_POST['tgl_daftar']);
    $tgl_daftar = date_format($tgl_daftar, "Y-m-d H:i:s");
    AddMember($_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_daftar, $_POST['tgl_terakhir_bayar']);
}
if (isset($_POST['update'])) {
    $tgl_daftar = date('Y-m-d H:i:s', strtotime($_POST['tgl_daftar']));
    UpdateMember($_GET['id_member'], $_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_daftar, $_POST['tgl_terakhir_bayar']);
}
?>
