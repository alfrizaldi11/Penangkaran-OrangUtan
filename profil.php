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
					<li class="nav-item active"><a href="profil.php" class="nav-link">Profil</a></li>
					<li class="nav-item"><a href="artikel.php" class="nav-link">Artikel</a></li>
					<li class="nav-item"><a href="galeri.php" class="nav-link">Galeri</a></li>
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
          <h1 class="mb-3 bread">Profil</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Profil <i
                class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>


  <?php 
    include "config/koneksi.php";

    $data_profil = mysqli_query($koneksi,"SELECT * FROM profil");
    $data=mysqli_fetch_array($data_profil);
    ?>
  <section class="ftco-section ftco-no-pb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center"
          style="background-image: url(https://source.unsplash.com/K0jsxDCj6qE);">
        </div>
        <div class="col-md-6 wrap-about pl-md-5 ftco-animate">
          <div class="heading-section">
            <h2 class="mb-4">Sejarah Penangkaran Orangutan Pulau Kaja</h2>

            <p><?php echo $data['sejarah']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Visi Misi</span>
            <h2 class="mb-2">Penangkaran Pulau Kaja</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-9 align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon justify-content-center align-items-center"><span class="flaticon-floor-plan"></span></div>
              <div class="media-body py-md-4">
                <h3>Visi dan Misi</h3>
                <p><?php echo $data['visi_misi']; ?></p>
              </div>
            </div>      
          </div>

        </div>
      </div>
    </section>


    <section class="ftco-section ftco-fullwidth">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Services</span>
            <h2 class="mb-2">Layanan dan Fasilitas</h2>
          </div>
        </div>
    	</div>
    	<div class="container-fluid px-0">
    		<div class="row d-md-flex text-wrapper align-items-stretch">
					<div class="one-half img d-flex align-self-stretch" style="background-image: url('https://source.unsplash.com/7h4yibuV3Ms');"></div>
					<div class="one-half half-text d-flex justify-content-end align-items-center">
						<div class="text-inner pl-md-5">
							<div class="row d-flex">
			          <div class="col-md-12 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services-wrap d-flex">
			            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-piggy-bank"></span></div>
			              <div class="media-body pl-4">
			                <h3>Layanan</h3>
			                <p><?php echo $data['layanan']; ?></p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-12 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services-wrap d-flex">
			            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-wallet"></span></div>
			              <div class="media-body pl-4">
			                <h3>Fasilitas</h3>
			                <p><?php echo $data['fasilitas']; ?></p>
			              </div>
			            </div>      
			          </div>

            </div>
					</div>
    		</div>
    	</div>
    </section>


  <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Maps</span>
          <h2 class="mb-3">Lokasi Penangkaran</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="col-md-12 align-items-stretch d-flex">
          <iframe src="<?php echo $data['lokasi_wisata']; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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