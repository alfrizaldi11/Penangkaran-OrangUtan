<?php
error_reporting(0); 
include '../config/koneksiadmin.php';
  session_start();

 $nama_lengkap = ltrim($_POST['nama_lengkap']);
 $username = ltrim($_POST['username']);
 $password = ltrim($_POST['password']);
 $email = ltrim($_POST['email']);
 
if (empty($username)) {
     echo "<script> alert('Tidak ada username yang di masukkan'); window.location='kelola_admin.php';</script>";
}
		else {
			$update="UPDATE admin set nama_lengkap='$nama_lengkap', username='$username', password='$password', email='$email'";
		
	}
$cek = mysqli_query($connect, $update);

if($cek){
    
 
	echo "<script> alert ('data Admin berhasil di ubah');
	window.location = 'kelola_admin.php'</script>";
	} else {
		echo "<script> alert ('data Admin gagal di ubah');
		window.location = 'kelola_admin.php'</script>";
}
?>
