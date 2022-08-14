<?php
try {

    $koneksi = new PDO('mysql:host=localhost;dbname=perpustakaan', "root", "");
} catch (PDOExcetion $mesaage) {
    echo "koneksi gagal" . $message->getMessage();
}

$sql = "select * from buku";
$query = $koneksi->query($sql);
if (!isset($_GET['kode_buku'])) {
    die("Error: kode buku tidak ditemukan");
}
$query = $koneksi->prepare("SELECT * FROM buku WHERE kode_buku = :kode_buku");
$query->bindParam(":kode_buku", $_GET['kode_buku']);
$query->execute();
if ($query->rowCount() == 0) {
    die("Error: Buku tidak ditemukan.");
} else {
    $data = $query->fetch();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PDO</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>EDIT DATA</h2>
        <form method="post" action="edit.php">
            <table width="546" border="0">
                <tr>
                    <td >Kode Buku</td>
                    <td >:</td>
                    <td >
                        <input type="text" name="kode_buku" value="<?php echo $data['kode_buku'] ?>" readonly="readonly"> 
                    </td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td >:</td>
                    <td >
                        <input type="text" name="judul" value="<?php echo $data['judul'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>:</td>
                    <td>
                        <input name="pengarang" type="text" size="50" value="<?php echo $data['pengarang'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td>:</td>
                    <td>
                        <input name="isbn" type="text" size="50" value="<?php echo $data['isbn'] ?>">
                    </td>
                </tr>
                <tr>
                    <td height="42"> </td>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="EDIT">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>