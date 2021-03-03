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
					<li class="nav-item active"><a href="artikel.php" class="nav-link">Artikel</a></li>
					<li class="nav-item"><a href="galeri.php" class="nav-link">Galeri</a></li>
					<li class="nav-item"><a href="kontak.php" class="nav-link">Kontak</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">Administrator</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('https://source.unsplash.com/84n7c9cLEKM');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
            <h1 class="mb-3 bread">Artikel</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Artikel <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">

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

            <div class="row mt-7">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <!-- LINK FIRST AND PREV -->
                            <?php
                            if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                            ?>
                                <li class="disable"><a>&laquo;</a></li>
                                <li class="disable"><a>&lt;</a></li>
                            <?php
                            }else{ // Jika page bukan page ke 1
                                $link_prev = ($page > 1)? $page - 1 : 1;
                            ?>
                                <li><a href="artikel.php?page=1">&laquo;</a></li>
                                <li><a href="artikel.php?page=<?php echo $link_prev; ?>">&lt;</a></li>
                            <?php
                            }
                            ?>
                            
                            <!-- LINK NUMBER -->
                            <?php
                            // Buat query untuk menghitung semua jumlah data
                            $sql2 = mysqli_query($connect, "SELECT COUNT(*) AS jumlah FROM artikel");
                            $get_jumlah = mysqli_fetch_array($sql2);
                            
                            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                            
                            for($i = $start_number; $i <= $end_number; $i++){
                                $link_active = ($page == $i)? ' class="active"' : '';
                            ?>
                                <li <?php echo $link_active; ?>><a href="artikel.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                            }
                            ?>
                            
                            <!-- LINK NEXT AND LAST -->
                            <?php
                            // Jika page sama dengan jumlah page, maka disable link NEXT nya
                            // Artinya page tersebut adalah page terakhir 
                            if($page == $jumlah_page){ // Jika page terakhir
                            ?>
                                <li class="disable"><a>&gt;</a></li>
                                <li class="disable"><a>&raquo;</a></li>
                            <?php
                            }else{ // Jika Bukan page terakhir
                                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                            ?>
                                <li><a href="artikel.php?page=<?php echo $link_next; ?>">&gt;</a></li>
                                <li><a href="artikel.php?page=<?php echo $jumlah_page; ?>">&raquo;</a></li>
                            <?php
                            }
                            ?>
                    </ul>
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