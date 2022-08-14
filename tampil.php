<?php
try {
    $koneksi = new PDO('mysql:host=localhost;dbname=perpustakaan', "root", "");
    //  echo "koneksi berhasil";
} catch (PDOExcetion $mesaage) {
    echo "koneksi gagal" . $message->getMessage();
}

$sql = "select * from buku";
$query = $koneksi->query($sql);
?>
<h2>Data Buku</h2>
<table border="1" width="60%" cellpadding="2">
    <tr>
        <th>Kode</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>ISBN</th>
        <th colspan="3">Aksi</th>
    </tr>
    <?php
    while ($baris = $query->fetch(PDO::FETCH_NUM)) {
        echo "<tr>";
        echo "<td>" . $baris[0] . "</td>";
        echo "<td>" . $baris[1] . "</td>";
        echo "<td>" . $baris[2] . "</td>";
        echo "<td>" . $baris[3] . "</td>";
        echo "<td><a href=form_edit.php?kode_buku=$baris[0]>Edit</a></td>";
        echo "<td><a href=hapus.php?kode_buku=$baris[0]>Hapus</a></td>";
        echo "<td><a href=form_simpan.php?kode_buku=$baris[0]>Tambah</a></td>";
        echo "</tr>";
    }
    ?>

</table>