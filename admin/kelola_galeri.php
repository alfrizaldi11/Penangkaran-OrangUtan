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






$data_galeri = mysqli_query($koneksi,"SELECT * FROM galeri order by id_galeri DESC");

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

            <section class="content">
                <div class="row">
                <div class="col-md-12">
                  <!-- general form elements -->
                          <div class="card shadow mb-4">
                            <div class="card-header py-3">
                              <h4 class="font-weight-bold text-primary">Kelola Galeri</h4>
                            </div>
                                 <div class="card-body">
                                    <form enctype='multipart/form-data' action="aksi_tambah_galeri.php" method="POST"  id="form_tambah_galeri">

                                          <div class="form-group">
                                              <label>Nama Galeri</label>
                                                  <input class="form-control"placeholder="Masukkan Nama Galeri "name="nama_galeri"required>
                                          </div>

                                          <div class="form-group">
                                            <label>Foto</label>
                                                  <input type="file" name="foto" id="foto" required>
                                          </div>

                                          <div class="form-group">
                                              <label>Video</label>
                                                  <input class="form-control" type="text" placeholder="Masukkan Link Video (jika kosong masukan '#')" name="video" required>
                                          </div>

                                          <div class="form-actions">
                                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                                              <input type="reset" value="Reset" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
                                          </div>
                    
                                            </form> 
                                        </div>

                                    </div>

                                </div>

                            </div>

                </section>
                <br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Galeri</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Galeri</th>
            <th>Foto</th>
            <th>Video</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

        <?php
          $no = 1;
          while ($data = mysqli_fetch_array($data_galeri)) {
        ?>

        <tr>

          <td><?php echo $no++; ?></td>
          <td><?php echo $data['nama_galeri']; ?></td>
          <td align="center"><image src="image/galeri/<?php echo $data['foto']; ?>" style="width: 200px; height: 150px;"></td>
          <td><?php echo $data['video']; ?></td>

          <td align="center">
            <div>
              <a class="btn btn-success btn-circle" 
                href="edit_galeri.php?id=<?php echo $data['id_galeri'];?>"><i class="fas fa-info-circle"></i></a>
            </div>
            <br>
            <div>
              <a class="btn btn-danger btn-circle"
                href="aksi_hapus_galeri.php?&id=<?php echo $data['id_galeri'];?>" 
                onclick="return confirm('Yakin akan dihapus ?');"><i class="fas fa-trash"></i></a>
            </div>
          </td>


        </tr>

        <?php } ?>

        </tbody>
      </table>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>