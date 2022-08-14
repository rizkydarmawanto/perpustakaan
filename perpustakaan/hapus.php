<?php

try {
    $koneksi = new PDO('mysql:host=localhost;dbname=perpustakaan', "root", "");
    if (isset($_GET["kode_buku"])) {
        $kode_buku=$_GET["kode_buku"];
        $sql = "delete from buku where kode_buku=:kode_buku";
        $query = $koneksi->prepare($sql);
        $query->bindParam(":kode_buku",$kode_buku);
        $query->execute();
        header("location:tampil.php");
    }else
    {
        echo 'gagal hapus';
    }
} catch (PDOExcetion $mesaage) {
    echo "koneksi gagal" . $message->getMessage();
}