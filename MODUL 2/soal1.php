<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    $nama1 = '';
    $nama2 = '';
    $nama3 = '';
    $hasil = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama1 = $_POST['nama1'];
        $nama2 = $_POST['nama2'];
        $nama3 = $_POST['nama3'];

        // Mengurutkan nama sesuai urutan abjad
        $nama_terkecil = $nama1;
        $nama_tengah = $nama2;
        $nama_terbesar = $nama3;

        // Menemukan nama terkecil
        if ($nama2 < $nama_terkecil) {
            $nama_terkecil = $nama2;
            $nama_tengah = $nama1;
        }
        if ($nama3 < $nama_terkecil) {
            $nama_terkecil = $nama3;
            $nama_tengah = $nama2;
            $nama_terbesar = $nama1;
        }

        // Menemukan nama terbesar
        if ($nama1 > $nama_terbesar) {
            $nama_terbesar = $nama1;
            $nama_tengah = $nama2;
        }
        if ($nama2 > $nama_terbesar) {
            $nama_terbesar = $nama2;
            $nama_tengah = $nama3;
            $nama_terkecil = $nama1;
        }

        $hasil = "Nama-nama setelah diurutkan secara alfabetikal: <br>";
        $hasil .= $nama_terkecil . "<br>";
        $hasil .= $nama_tengah . "<br>";
        $hasil .= $nama_terbesar . "<br>";
    }
    ?>
    <form action="" method="post">
        Nama 1 : <input type="text" name="nama1" value="<?php echo $nama1; ?>"> <br>
        Nama 2 : <input type="text" name="nama2" value="<?php echo $nama2; ?>"><br>
        Nama 3 : <input type="text" name="nama3" value="<?php echo $nama3; ?>"><br>
        <input type="submit" name="submit" value="urutkan">
    </form>

    <?php echo $hasil; ?>
</body>

</html>
