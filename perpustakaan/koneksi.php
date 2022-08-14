<?php
try{
$dbh = new PDO('mysql:host=localhost;dbname=perpustakaan', 
"root", "");
echo "koneksi berhasil";
} catch (PDOException $mesaage)
{
   echo "koneksi gagal".$message->getMessage();
}

?>