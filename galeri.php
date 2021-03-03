<!DOCTYPE html>
<html lang="en">

<?php
include 'head.php';


?>

<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="images/logo-kaja.png" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="profil.php" class="nav-link">Profil</a></li>
					<li class="nav-item"><a href="artikel.php" class="nav-link">Artikel</a></li>
					<li class="nav-item active"><a href="galeri.php" class="nav-link">Galeri</a></li>
					<li class="nav-item"><a href="kontak.php" class="nav-link">Kontak</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">Administrator</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight"
    style="background-image: url('https://source.unsplash.com/84n7c9cLEKM');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
          <h1 class="mb-3 bread">Galeri</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Galeri <i
                class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Penangkaran Orangutan</span>
					<h2 class="mb-2">Foto</h2>
				</div>
			</div>
			<div class="row">
            <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM galeri");
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>
                    <div class="col-md-4">
                        <div class="listing-wrap img rounded d-flex align-items-end"
                            style="background-image: url(admin/image/galeri/<?php echo $data['foto']; ?>);">
                            <div class="location">
                                <span class="rounded">Pulau Kaja</span>
                            </div>
                            <div class="text">
                                <a href="admin/image/galeri/<?php echo $data['foto']; ?>" class="btn-link"><?php echo $data['nama_galeri']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                        ?>

			</div>
		</div>
    </section>
    

    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Penangkaran Orangutan</span>
					<h2 class="mb-2">Video</h2>
				</div>
			</div>
			<div class="row justify-content-center">
            <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 2; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM galeri LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>
                    <div class="col-md-6">
                        <div class="listing-wrap img rounded d-flex align-items-end">
                            <iframe width="560" height="315" src="<?php echo $data['video']; ?>"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php
                $no++; 
                        }
                        ?>

			</div>
		</div>
	</section>


	<?php
include 'footer.php';


?>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
	</script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>