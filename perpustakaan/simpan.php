<?php
try {
    $koneksi = new PDO('mysql:host=localhost;dbname=perpustakaan', "root", "");
    echo "koneksi berhasil";
} catch (PDOExcetion $mesaage) {
    echo "koneksi gagal" . $message->getMessage();
}

$sql = "insert into buku (kode_buku,judul,pengarang,isbn) values (:kode_buku,:judul,:pengarang,:isbn)";
$query=$koneksi->prepare($sql);
$query->bindParam(':kode_buku', $_POST['kode_buku']);
$query->bindParam(':judul', $_POST['judul']);
$query->bindParam(':pengarang', $_POST['pengarang']);
$query->bindParam(':isbn', $_POST['isbn']);
$query->execute();
header("location:tampil.php");
?>