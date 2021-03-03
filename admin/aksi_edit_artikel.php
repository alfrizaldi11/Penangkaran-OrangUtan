<?php 
session_start();
include '../config/koneksiadmin.php';

if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

     $id_artikel=$_POST['id_artikel'];
     $nama_artikel = $_POST['nama_artikel'];
     $isi_artikel = $_POST['isi_artikel'];

 
if (empty($nama_artikel)) {
     echo "<script> alert('Masukkan Nama Artikel'); window.location='kelola_artikel.php';</script>";
}else{
		 $update="UPDATE artikel SET nama_artikel='$nama_artikel', isi_artikel='$isi_artikel' where id_artikel='$id_artikel'";
    }
 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data Galeri Berhasil Diubah');
  window.location = 'kelola_artikel.php'</script>";
 }else{ 
 echo "<script> alert ('Data Galeri Gagal Diubah');
window.location = 'kelola_artikel.php'</script>";
}}
 
?>