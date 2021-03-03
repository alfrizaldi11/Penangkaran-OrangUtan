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


$data_artikel=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM artikel"));
$data_galeri=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM galeri"));

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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-4">
                      <div class="text-xxl font-weight-bold text-success text-uppercase mb-2">Data Artikel</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $data_artikel ?> Artikel</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bookmark fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-4">
                      <div class="text-xxl font-weight-bold text-warning text-uppercase mb-2">Data Galeri</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $data_galeri ?> foto</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-camera-retro fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
        <!-- /.container-fluid -->

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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
