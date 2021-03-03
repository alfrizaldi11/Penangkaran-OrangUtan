<?php 

include '../config/koneksiadmin.php';
  session_start();
 $judul    = $_POST['judul'];
 $isi    = $_POST['isi'];
 $harga  = $_POST['harga'];
  
  $lokasi_file    = $_FILES['foto']['tmp_name'];
  $nama_file      = $_FILES['foto']['name'];
  $tipe_foto      = $_FILES['foto']['type'];
  $direktori1 = "image/wisata/$nama_file";
  // Apabila ada gambar yang diupload

    
 $sql="SELECT * FROM objek_wisata WHERE judul ='$judul'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nama wisata $judul sudah terdaftar'); window.location='wisata.php';</script>";
	} else {
 if(empty($lokasi_file)){

			$query = "INSERT INTO objek_wisata (judul, isi, harga)VALUES ('$judul', '$isi', '$harga')";
	}
	elseif (empty($judul)) {
     echo "<script> alert('Masukkan Judul'); window.location='kelola_wisata.php';</script>";
}
			
elseif (!empty($lokasi_file)){
	if ($tipe_foto != "image/jpeg"){
     echo "<script>window.alert('Proses Ubah Gagal, Foto Harus Format JPEG');
       window.location='kelola_profil.php'</script>";
	}else{
	move_uploaded_file($lokasi_file,'image/wisata/'.$nama_file);
 $query = "INSERT INTO objek_wisata (foto, judul, isi, harga)VALUES ('$nama_file', '$judul', '$isi', '$harga')";
		}
	 }		
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Wisata berhasil disimpan');
  window.location = 'kelola_wisata.php'</script>";
 }else{ 
 echo "<script> alert ('Data Wisata Gagal disimpan');
window.location = 'kelola_wisata.php'</script>";
 }}
 
 ?>  