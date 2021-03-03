<?php
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM objek_wisata WHERE id_wisata='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Wisata Berhasil');
window.location='kelola_wisata.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Wisata Gagal');
history.back(); </script>";
}
?>