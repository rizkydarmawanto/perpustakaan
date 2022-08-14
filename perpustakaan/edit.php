<?php

try {
    $koneksi = new PDO('mysql:host=localhost;dbname=perpustakaan', "root", "");
} catch (PDOExcetion $mesaage) {
    echo "koneksi gagal" . $message->getMessage();
}
if (!isset($_POST['kode_buku'])) {
    die("Error: kode buku tidak ditemukan");
}
if (isset($_POST['submit'])) {
    $sql_ubah = "UPDATE buku SET judul=:judul,pengarang=:pengarang,isbn=:isbn WHERE kode_buku=:kode_buku";
    $query = $koneksi->prepare($sql_ubah);
    $query->bindParam(":judul", $_POST['judul']);
    $query->bindParam(":pengarang", $_POST['pengarang']);
    $query->bindParam(":isbn", $_POST['isbn']);
    $query->bindParam(":kode_buku", $_POST['kode_buku']);
    $query->execute();
    header("location: tampil.php");
}
?>