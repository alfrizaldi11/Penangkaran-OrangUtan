<?php 

include '../config/koneksiadmin.php';
  session_start();

  $nama_galeri = $_POST['nama_galeri'];
  $video = $_POST['video'];

  
  $lokasi_file    = $_FILES['foto']['tmp_name'];
  $nama_file      = $_FILES['foto']['name'];
  $tipe_foto      = $_FILES['foto']['type'];
  $direktori1 = "image/galeri/$nama_file";
  // Apabila ada gambar yang diupload

    
 $sql="SELECT * FROM galeri WHERE nama_galeri='$nama_galeri'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nama Galeri $nama_galeri sudah terdaftar'); window.location='kelola_galeri.php';</script>";
	} else {
 if(empty($lokasi_file)){

			$query = "INSERT INTO galeri (nama_galeri)VALUES ('$nama_galeri')";
	}
	elseif (empty($nama_galeri)) {
     echo "<script> alert('Masukkan Nama Galeri'); window.location='kelola_galeri.php';</script>";
}
			
	 elseif(!empty($lokasi_file)){
	 if($tipe_foto != 'image/jpeg'){
			echo "<script>alert('Proses Tambah Gagal, foto Harus Format JPEG'); window.location='kelola_galeri.php';</script>";
		} else {
 move_uploaded_file($lokasi_file,'image/galeri/'.$nama_file);
 $query = "INSERT INTO galeri (foto, nama_galeri, video) VALUES ('$nama_file', '$nama_galeri', '$video')";
		}
	 }		
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Galeri berhasil disimpan');
  window.location = 'kelola_galeri.php'</script>";
 }else{ 
 echo "<script> alert ('Data Galeri Gagal disimpan');
window.location = 'kelola_galeri.php'</script>";
 }}
 
 ?>  