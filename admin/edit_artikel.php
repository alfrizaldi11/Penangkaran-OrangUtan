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
	$edit=mysqli_query($koneksi,"SELECT * FROM artikel where id_artikel ='$_GET[id]'");
    $hasil = mysqli_fetch_array($edit);
    $id_artikel = $hasil['id_artikel'];
    $nama_artikel = $hasil['nama_artikel'];
	$isi_artikel = $hasil['isi_artikel'];
	
	
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Edit Artikel</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_edit_artikel.php" method="POST">
            <input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>"/>
              <div class="box-body">

                <div class="form-group">
                  <label>Nama Artikel</label>
                  <input value="<?php echo $nama_artikel; ?>" name="nama_artikel" type="text" class="form-control" placeholder="Masukkan Nama Galeri(jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Isi Artikel</label>
                  <textarea name="isi_artikel"  class="ckeditor" required><?php echo $isi_artikel; ?></textarea>
                </div>

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

  <script>CKEDITOR.replace( 'isi_artikel' );</script>
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