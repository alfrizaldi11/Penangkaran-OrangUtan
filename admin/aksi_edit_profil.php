<?php 
session_start();
include '../config/koneksiadmin.php';
//error_reporting(0);
if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

$id_profil=$_POST['id_profil'];
$visi_misi = $_POST['visi_misi'];
$sejarah = $_POST['sejarah'];
$layanan = $_POST['layanan'];
$fasilitas = $_POST['fasilitas'];
$lokasi_wisata = $_POST['lokasi_wisata'];

 
if(empty($visi_misi)) {
  echo "<script> alert('Tidak ada visi dan misi yang di masukkan'); window.location='kelola_profil.php';</script>";
}

  else{
	
		 $update="UPDATE profil set visi_misi='$visi_misi', sejarah='$sejarah', layanan='$layanan', fasilitas='$fasilitas', lokasi_wisata='$lokasi_wisata' where id_profil='$id_profil'";
  }
 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data Profil Berhasil Diubah');
  window.location = 'kelola_profil.php'</script>";
 }else{ 
 echo "<script> alert ('Data Profil Gagal Diubah');
window.location = 'kelola_profil.php'</script>";
  }}
 
?>
