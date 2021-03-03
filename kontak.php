<?php 
include 'config/koneksi.php';
session_start();


?>

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
					<li class="nav-item"><a href="galeri.php" class="nav-link">Galeri</a></li>
					<li class="nav-item active"><a href="kontak.php" class="nav-link">Kontak</a></li>
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
          <h1 class="mb-3 bread">Kontak</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Kontak <i
                class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

    <?php
	$kontak=mysqli_query($koneksi,"SELECT a.*, k.* FROM kontak k LEFT JOIN admin a ON k.`id_admin` = a.`id_admin` order by k.id_kontak");
    $hasil = mysqli_fetch_array($kontak);
    $id_admin = $hasil['id_admin'];
    $id_kontak = $hasil['id_kontak'];
	?>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info justify-content-center">
        	<div class="col-md-8">
        		<div class="row mb-5">

                <?php
                  $tampil_admin=mysqli_query($koneksi,"SELECT * FROM admin where id_admin='$id_admin'");
                  $data_admin=mysqli_fetch_array($tampil_admin);
                  $no_hp=$data_admin['no_hp'];
                  $email=$data_admin['email'];
                  ?>

		          <div class="col-md-6 text-center py-1">
		          	<div class="icon mb-1 d-flex align-items-center justify-content-center">
		          		<span class="icon-mobile-phone"></span>
		          	</div>
		            <p><span>Phone:</span> <a href="tel://<?php echo $no_hp; ?>"><?php echo $no_hp; ?></a></p>
		          </div>
		          <div class="col-md-6 text-center py-1">
		          	<div class="icon mb-1 d-flex align-items-center justify-content-center">
		          		<span class="icon-envelope-o"></span>
		          	</div>
		            <p><span>Email:</span> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
		          </div>
                </div>
                
          </div>
        </div>

      </div>
    </section>
		

	<?php
include 'footer.php';


?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>