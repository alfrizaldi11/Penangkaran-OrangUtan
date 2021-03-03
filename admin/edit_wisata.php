<?php 
include '../config/koneksi.php';
session_start ();
if (empty ($_SESSION['username']) AND empty ($_SESSION['password']) ){
  echo "<script> alert('Anda harus login terlebih dahulu');
  window.location = '../login.php'</script>";
}
if($_SESSION['level']!="admin"){
  die("404 Not Found");
}




?>

<!DOCTYPE html>
<html lang="en">

<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

    <?php
    include 'head.php';

    ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

      <?php
    include 'sidebar.php';

    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

            <?php
      include 'topbar.php';

      ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <section class="content-header">
      
     
    </section>

	<?php
	$edit=mysqli_query($koneksi,"SELECT * FROM objek_wisata where id_wisata ='$_GET[id]'");
  $hasil = mysqli_fetch_array($edit);
	$id_wisata = $hasil['id_wisata'];
  $judul = $hasil['judul'];
  $isi = $hasil['isi'];
  $harga = $hasil['harga'];
  $foto = $hasil['foto'];
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Edit Album</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_edit_wisata.php" method="POST">
            <input type="hidden" name="id_wisata" value="<?php echo $id_wisata; ?>"/>
              <div class="box-body">
				        
				<div class="form-group">
                  <label>Judul</label>
                  <input value="<?php echo $judul; ?>"name="judul" type="text" class="form-control" placeholder="Masukkan Judul (jika kosong masukan '-')" required>
                </div>
                
                <div class="form-group">
                  <label>Isi</label>
                  <textarea name="isi"  class="ckeditor" required><?php echo $isi; ?></textarea>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input value="<?php echo $harga; ?>" name="harga" type="number" max="1000000" class="form-control" required>
                </div>
				        
				        <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto" id="foto" value="<?php echo $foto; ?>"required>

                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
        <!--/.col (right) -->
</section>

      </div>
      <!-- End of Main Content -->

      <?php
        include 'footer.php';

        ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
        include 'logout_modals.php';

    ?>

  <script>CKEDITOR.replace( 'isi' );</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>

</html>