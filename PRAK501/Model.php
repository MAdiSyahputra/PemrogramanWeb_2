<?php
require('./Koneksi.php');

function GetAllData($tabel) {
    $sql = "SELECT * FROM $tabel";
    $statement = Koneksi()->query($sql);
    $alldata = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($alldata)) {
        foreach ($alldata as $value) {
            echo "<tr>";
            foreach ($value as $key => $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "<td>";
            echo "<a href='Form" . ucfirst($tabel) . ".php?id_" . $tabel . "=" . $value['id_' . $tabel] . "'>edit</a>";
            echo " | ";
            echo "<a href='" . ucfirst($tabel) . ".php?id_" . $tabel . "=" . $value['id_' . $tabel] . "' onclick=\"return confirm('Yakin Hapus?')\">Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
    }
}

function AddMember($nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (:nama_member, :nomor_member, :alamat, :tgl_mendaftar, :tgl_terakhir_bayar)";
    $stmt = Koneksi()->prepare($sql);
    $stmt->execute([
        ':nama_member' => $nama_member,
        ':nomor_member' => $nomor_member,
        ':alamat' => $alamat,
        ':tgl_mendaftar' => $tgl_mendaftar,
        ':tgl_terakhir_bayar' => $tgl_terakhir_bayar
    ]);
    header('location:Member.php');
}

function AddBuku($judul, $penulis, $penerbit, $tahun_terbit) {
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (:judul_buku, :penulis, :penerbit, :tahun_terbit)";
    $stmt = Koneksi()->prepare($sql);
    $stmt->execute([
        ':judul_buku' => $judul,
        ':penulis' => $penulis,
        ':penerbit' => $penerbit,
        ':tahun_terbit' => $tahun_terbit
    ]);
    header('location:Buku.php');
}

function AddPeminjaman($id_peminjaman, $tgl_pinjam, $tgl_kembali) {
    $sql = "INSERT INTO peminjaman (id_peminjaman, tgl_pinjam, tgl_kembali) VALUES (:id_peminjaman, :tgl_pinjam, :tgl_kembali)";
    $stmt = Koneksi()->prepare($sql);
    $stmt->execute([
        ':id_peminjaman' => $id_peminjaman,
        ':tgl_pinjam' => $tgl_pinjam,
        ':tgl_kembali' => $tgl_kembali
    ]);
    header('location:Peminjaman.php');
}

function GetMember($id_member) {
    $stmt = Koneksi()->prepare("SELECT * FROM member WHERE id_member = :id_member");
    $stmt->execute([':id_member' => $id_member]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function GetBuku($id_buku) {
    $stmt = Koneksi()->prepare("SELECT * FROM buku WHERE id_buku = :id_buku");
    $stmt->execute([':id_buku' => $id_buku]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function GetPeminjaman($id_peminjaman) {
    $stmt = Koneksi()->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = :id_peminjaman");
    $stmt->execute([':id_peminjaman' => $id_peminjaman]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function UpdateMember($id_member, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $sql = "UPDATE member SET nama_member = :nama_member, nomor_member = :nomor_member, alamat = :alamat, tgl_mendaftar = :tgl_mendaftar, tgl_terakhir_bayar = :tgl_terakhir_bayar WHERE id_member = :id_member";
    $stmt = Koneksi()->prepare($sql);
    $stmt->execute([
        ':id_member' => $id_member,
        ':nama_member' => $nama_member,
        ':nomor_member' => $nomor_member,
        ':alamat' => $alamat,
        ':tgl_mendaftar' => $tgl_mendaftar,
        ':tgl_terakhir_bayar' => $tgl_terakhir_bayar
    ]);
    header('location:Member.php');
}

function UpdateBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit) {
    $sql = "UPDATE buku SET judul_buku = :judul_buku, penulis = :penulis, penerbit = :penerbit, tahun_terbit = :tahun_terbit WHERE id_buku = :id_buku";
    $stmt = Koneksi()->prepare($sql);
    $stmt->execute([
        ':id_buku' => $id_buku,
        ':judul_buku' => $judul_buku,
        ':penulis' => $penulis,
        ':penerbit' => $penerbit,
        ':tahun_terbit' => $tahun_terbit
    ]);
    header('location:Buku.php');
}

function UpdatePeminjaman($id_peminjaman, $tgl_pinjam, $tgl_kembali) {
    $sql = "UPDATE peminjaman SET id_peminjaman = :id_peminjaman, tgl_pinjam = :tgl_pinjam, tgl_kembali = :tgl_kembali WHERE id_peminjaman = :id_peminjaman";
    $stmt = Koneksi()->prepare($sql);
    $stmt->execute([
        ':id_peminjaman' => $id_peminjaman,
        ':tgl_pinjam' => $tgl_pinjam,
        ':tgl_kembali' => $tgl_kembali
    ]);
    header('location:Peminjaman.php');
}

function DeleteMember($id_member) {
    $stmt = Koneksi()->prepare("DELETE FROM member WHERE id_member = :id_member");
    $stmt->execute([':id_member' => $id_member]);
    header('location:Member.php');
}

function DeleteBuku($id_buku) {
    $stmt = Koneksi()->prepare("DELETE FROM buku WHERE id_buku = :id_buku");
    $stmt->execute([':id_buku' => $id_buku]);
    header('location:Buku.php');
}

function DeletePeminjaman($id_peminjaman) {
    $stmt = Koneksi()->prepare("DELETE FROM peminjaman WHERE id_peminjaman = :id_peminjaman");
    $stmt->execute([':id_peminjaman' => $id_peminjaman]);
    header('location:Peminjaman.php');
}
?>
