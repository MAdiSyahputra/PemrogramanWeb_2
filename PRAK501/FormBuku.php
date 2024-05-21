<?php 
require('./Model.php');
if (isset($_GET['id_buku'])) {
    EditBuku();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e8eff1; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width: 40%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; 
        }
        .input-group {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 2px solid #ccc; 
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #00b4d8; 
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #00b4d8; 
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0077b6; 
        }
        label {
            font-weight: bold;
            display: block;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="input-group">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["judul_buku"] . "'" : "value=''"; ?> required>
        </div>
        <div class="input-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["penulis"] . "'" : "value=''"; ?> required>
        </div>
        <div class="input-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["penerbit"] . "'" : "value=''"; ?> required>
        </div>
        <div class="input-group">
            <label for="tahunterbit">Tahun Terbit</label>
            <input type="text" id="tahunterbit" name="tahunterbit" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["tahun_terbit"] . "'" : "value=''"; ?> required>
        </div>
        <?php
        if (isset($_GET['id_buku'])) {
            echo "<button type=\"submit\" name=\"edit\">Update</button>";
        } else {
            echo "<button type=\"submit\" name=\"submit\">Tambah</button>";
        }
        ?>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        AddBuku($_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahunterbit']);
    }
    if (isset($_POST['edit'])) {
        UpdateBuku($_GET['id_buku'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahunterbit']);
    }
    ?>
</body>
</html>
