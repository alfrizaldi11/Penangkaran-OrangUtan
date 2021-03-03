<?php 

include '../config/koneksiadmin.php';
  session_start();

  $nama_artikel = $_POST['nama_artikel'];
  $isi_artikel = $_POST['isi_artikel'];


    
 $sql="SELECT * FROM artikel WHERE nama_artikel='$nama_artikel'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nama Artikel $nama_artikel sudah terdaftar'); window.location='kelola_artikel.php';</script>";
	} else {
            $query = "INSERT INTO artikel (nama_artikel, isi_artikel) VALUES ('$nama_artikel', '$isi_artikel')";
		}
	 
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Artikel berhasil disimpan');
  window.location = 'kelola_artikel.php'</script>";
 }else{ 
 echo "<script> alert ('Data Artikel Gagal disimpan');
window.location = 'kelola_artikel.php'</script>";
 }
 
 ?>  