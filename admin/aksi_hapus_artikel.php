<?php
error_reporting(0);
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM artikel WHERE id_artikel='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Galeri Berhasil');
window.location='kelola_galeri.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Galeri Gagal');
history.back(); </script>";
}
?>