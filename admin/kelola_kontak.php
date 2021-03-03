<?php 
include '../config/koneksi.php';
session_start();
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
	$edit=mysqli_query($koneksi,"SELECT a.*, k.* FROM kontak k LEFT JOIN admin a ON k.`id_admin` = a.`id_admin` order by k.id_kontak");
    $hasil = mysqli_fetch_array($edit);
    $id_admin = $hasil['id_admin'];
    $id_kontak = $hasil['id_kontak'];
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Kelola Kontak</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="#" method="POST">
            <input type="hidden" name="id_kontak" value="<?php echo $id_kontak; ?>"/>
              <div class="box-body">
              <?php
                  $tampil_admin=mysqli_query($koneksi,"SELECT * FROM admin where id_admin='$id_admin'");
                  $data_admin=mysqli_fetch_array($tampil_admin);
                  $no_hp=$data_admin['no_hp'];
                  $email=$data_admin['email'];
                  ?>
              <div class="form-group">
                  <label>Nomor Hp</label>
                  <input value="<?php echo $no_hp; ?>" name="no_hp" type="text" class="form-control" required>
              </div>

              <div class="form-group">
                  <label>Email</label>
                  <input value="<?php echo $email; ?>" name="email" type="text" class="form-control" required>
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