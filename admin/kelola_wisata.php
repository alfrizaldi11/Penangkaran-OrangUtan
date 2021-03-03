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




$data_wisata = mysqli_query($koneksi,"SELECT * FROM objek_wisata order by id_wisata DESC");

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
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Kelola Objek Wisata</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_tambah_wisata.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label>Judul</label>
                  <input name="judul" type="text" class="form-control" placeholder="Masukkan Judul (jika kosong masukan '-')" required>
                </div>
                
                <div class="form-group">
                  <label>Isi</label>
                  <textarea name="isi"  class="ckeditor" required> </textarea>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input name="harga" type="number" max="1000000" class="form-control" required>
                </div>
				        
				<div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto" id="foto" required>
                </div>

                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                    <input type="reset" value="Reset" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                    </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
        <!--/.col (right) -->
</section>
<br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Objek Wisata</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Harga</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>

                  <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($data_wisata)) {
                  ?>
                  

                  <tr>

                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['isi']; ?></td>
                    <td><?php echo "Rp " . number_format($data['harga'], 0, ",", ".");?> </td>
                    <td align="center"> <image src="image/wisata/<?php echo $data['foto']; ?>" style="width: 200px; height: 150px;"></td>

                    <td align="center">
                      <div>
                        <a class="btn btn-success btn-circle" 
                          href="edit_wisata.php?id=<?php echo $data['id_wisata'];?>"><i class="fas fa-info-circle"></i></a>
                      </div>
                      <br>
                      <div>
                        <a class="btn btn-danger btn-circle"
                          href="aksi_hapus_wisata.php?&id=<?php echo $data['id_wisata'];?>" 
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

<!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script> -->

</body>

</html>