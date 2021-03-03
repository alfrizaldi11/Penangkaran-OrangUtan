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
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="profil.php" class="nav-link">Profil</a></li>
					<li class="nav-item"><a href="artikel.php" class="nav-link">Artikel</a></li>
					<li class="nav-item"><a href="galeri.php" class="nav-link">Galeri</a></li>
					<li class="nav-item"><a href="kontak.php" class="nav-link">Kontak</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">Administrator</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<div class="hero-wrap" style="background-image: url('https://source.unsplash.com/TwSlFj4rHEc');"
		data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="overlay-2"></div>
		<div class="container">
			<div class="row no-gutters slider-text justify-content-center align-items-center">
				<div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
					<div class="text text-center w-100">
						<h1 class="mb-4">Selamat Datang <br>Di Penangkaran Orangutan Pulau Kaja</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
<br>
    <section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img" id="section-counter">
    <div class="container">
      <div class="row">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Populasi</span>
					<h2 class="mb-2">Orangutan Kalimantan</h2>
				</div>
        <div class="col-md-6 col-lg-5 justify-content-center counter-wrap ftco-animate">
          <div class="block-18 py-4 mb-3">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="16013600">0</strong>
              <span>Hektare <br>Luas Habitat</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
          <div class="block-18 py-4 mb-3">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="57350">0</strong>
              <span>Individu <br>Orangutan</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18 py-4 mb-3">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="42">0</strong>
              <span>Kantong <br>Populasi</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Galeri</span>
					<h2 class="mb-2">Penangkaran Orangutan</h2>
				</div>
			</div>
			<div class="row">
            <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 3; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM galeri LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>
                    <div class="col-md-4">
                        <div class="listing-wrap img rounded d-flex align-items-end"
                            style="background-image: url(admin/image/galeri/<?php echo $data['foto']; ?>);">
                            <div class="location">
                                <span class="rounded">Pulau Kaja</span>
                            </div>
                            <div class="text">
                                <h3><?php echo $data['nama_galeri']; ?></h3>
                                <a href="galeri.php" class="btn-link">Lihat selengkapnya <span
                                        class="ion-ios-arrow-round-forward"></span></a>
                            </div>
                        </div>
                    </div>
                <?php
                        $no++; 
                        }
                        ?>

			</div>
		</div>
	</section>



	<section class="ftco-section ftco-no-pt">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Read</span>
					<h2>Artikel</h2>
				</div>
            </div>
            
			<div class="row d-flex">
            <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 4; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM artikel LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="blog-entry justify-content-end">
						<div class="text">
							<a href="artikel.php" class="block-20 img"
								style="background-image: url('images/ot-2.jpg');">
							</a>
							<h3 class="heading"><a href="detail_artikel.php?&id=<?php echo $data['id_artikel']; ?>"><?php echo $data['nama_artikel']; ?></a></h3>
						</div>
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