<?php 
session_start();
include '../config/koneksiadmin.php';
//error_reporting(0);
if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

$id_wisata = $_POST['id_wisata'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$harga = $_POST['harga'];

 $lokasi_file    = $_FILES['foto']['tmp_name'];
 $nama_file      = $_FILES['foto']['name'];
 $tipe_foto      = $_FILES['foto']['type'];
 
if(empty($lokasi_file)){
		$update="UPDATE objek_wisata set judul='$judul' where id_wisata='$id_wisata'";
}
elseif (empty($judul)) {
     echo "<script> alert('Masukkan Judul'); window.location='kelola_wisata.php';</script>";
}

elseif (!empty($lokasi_file)){
	if ($tipe_foto != "image/jpeg"){
     echo "<script>window.alert('Proses Ubah Gagal, Foto Harus Format JPEG');
       window.location='kelola_wisata.php'</script>";
	}else{
	move_uploaded_file($lokasi_file,'image/wisata/'.$nama_file);
	
		 $update="UPDATE objek_wisata set judul='$judul', isi='$isi', harga='$harga', foto='$nama_file' where id_wisata='$id_wisata'";
}}
 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data Wisata Berhasil Diubah');
  window.location = 'kelola_wisata.php'</script>";
 }else{ 
 echo "<script> alert ('Data Wisata Gagal Diubah');
window.location = 'kelola_wisata.php'</script>";
  }}
 
?>
