<?php

# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# File		: datakader-client.php

session_start();
$_SESSION = array();

$captcha = file_get_contents('http://localhost/mahasiswa/captcha_service.php?action=get_captcha');
$captcha = json_decode($captcha,true);

$_SESSION['captcha'] = $captcha;
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Tambah Data Kader | KM-ITB </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/association.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/half-slider.css" rel="stylesheet">
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="title">
						<a class="navbar-brand" href="#">KM-ITB</a>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				   </div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="menu-bar">
						<div class= "logo">
							<img id="logo-img" src="assets/logo.gif"></img>
						</div>
						<div class= "menu">
								<ul class="nav nav-pills">
									<li><a href="http://localhost/home/index.php">Home</a></li>
									<li><a href="http://localhost/event/event-depan.php?action=get_all">Event</a></li>
									<li><a href="http://localhost/komunitas/od.html">Open Data</a></li>
									<li><a href="http://localhost/mahasiswa/datakader.html">Kader</a></li>
									
									<!-- authentication service -->
									<li><a href="/authentication/logout.php?logout=true">Logout</a></li>
								</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="satu">
		
		<div class="borderform">
		<div class="judulatas">
			<h1 class="judulh1">Data Kader Management</h1>
			<h2 class="judulh2">Form untuk Memasukkan Data Kader</h2>
		</div>
	<div class="formevent">	
	<form method="POST" action="http://localhost/mahasiswa/event-api.php" enctype="multipart/form-data">
	  <label class="labeljudul">Nama</label><br>
	  <input type="text" name="namakader" placeholder="Andra Wahyu Purnomo" required>
	  <br>
	  <label class="labeljudul">NIM</label><br>
	  <input type="text" name="nimkader" placeholder="18213004" required>
	  <br>
	  <label class="labeljudul">Unit/Himpunan/Organisasi</label><br>
	  <input type="text" name="organisasi" placeholder="HMIF" required>
	  <br>
	  <label class="labeljudul">Event Kepanitiaan 1</label><br>
	  <input type="text" name="acara1" placeholder="Pemilu HMIF 2016">
	  <br>
	  <label class="labeljudul">Posisi 1</label><br>
	  <input type="text" name="posisi1" placeholder="Ketua">
	  <br>
	  <label class="labeljudul">Tahun Mulai 1</label><br>
	  <input type="text" name="tahunmulai1" placeholder="2013">
	  <br>
	  <label class="labeljudul">Tahun Berakhir 1</label><br>
	  <input type="text" name="tahunberakhir1" placeholder="2015">
	  <br>
	  <label class="labeljudul">Event Kepanitiaan 2</label><br>
	  <input type="text" name="acara2" placeholder="Pemilu HMIF 2016"  >
	  <br>
	  <label class="labeljudul">Posisi 2</label><br>
	  <input type="text" name="posisi2" placeholder="Ketua"  >
	  <br>
	  <label class="labeljudul">Tahun Mulai 2</label><br>
	  <input type="text" name="tahunmulai2" placeholder="2013">
	  <br>
	  <label class="labeljudul">Tahun Berakhir 2</label><br>
	  <input type="text" name="tahunberakhir2" placeholder="2015">
	  <br>
	  <label class="labeljudul">Event Kepanitiaan 3</label><br>
	  <input type="text" name="acara3" placeholder="Pemilu HMIF 2016"  >
	  <br>
	  <label class="labeljudul">Posisi 3</label><br>
	  <input type="text" name="posisi3" placeholder="Ketua"  >
	  <br>
	  <label class="labeljudul">Tahun Mulai 3</label><br>
	  <input type="text" name="tahunmulai3" placeholder="2013">
	  <br>
	  <label class="labeljudul">Tahun Berakhir 3</label><br>
	  <input type="text" name="tahunberakhir3" placeholder="2015">
	  
	  <p>
		Please fill the CAPTCHA below:
      </p>

      <p>
        <?php
        echo '<img src="data:image/jpeg;base64,'.$_SESSION['captcha']['image_src'].'"/>';

        ?>
      </p>
	                   
		<input type="text" name="captcha_input" />
	  
	  <input type="submit" value="Submit" name="submitKader">
	</form> 
	</div>
	</div>
	</div>
	
	<!-- Page Content -->
    <div class="container">
	<div class="center">
		<div class="social-media">
			<a href='https://www.facebook.com/ITB.KM'><img id="icon-fb" src="assets/home/icon-fb.png"></img></a>
			<a href='http://mail.google.com'><img id="icon-mail" src="assets/home/icon-mail.png"></img></a>
			<a href='https://www.instagram.com/km_itb/'><img id="icon-ig" src="assets/home/icon-ig.png"></img></a>	
		</div>
	</div>
	</div>
	
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="copyright">
						<p>Sistem dan Teknologi Informasi 2013</p>
					</div>
            </div>
            <!-- /.row -->
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	</body>
</html>
