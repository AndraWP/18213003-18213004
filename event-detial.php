<?php
if (isset($_GET["action"]) && isset($_GET["id"]) && isset($_GET["action"]) == "get_event") {
	$info = file_get_contents('http://localhost/event/event-api.php?action=get_event&id=' . $_GET["id"]);
	$info = json_decode($info,true);
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Detail | KM-ITB </title>
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
			<div class="container-event">
				<?php echo '<img class="gambarmedium" src="data:image/jpeg;base64,'.$info['media'].'"/>';?>
				<div class="columndetail-right">
					<div class="namaevent">
						<div class="labela"><b>Nama</b></div><div class="tab">: <?php echo $info['nama'];?></div>
					</div>
					<div class="detail-right">
						<div class="labela"><b>Tanggal</b></div><div class="tab">: <?php echo $info['tanggal'];?></div>
						<br>
						<div class="labela"><b>Waktu</b></div><div class="tab">: <?php echo $info['waktu'];?></div>
						<br>
						<div class="labela"><b>Lokasi</b></div><div class="tab">: <?php echo $info['lokasi'];?></div>
						<br>
						<div class="labela"><b>Biaya</b></div><div class="tab">: <?php echo $info['biaya'];?></div>
						<br>
						<div class="labela"><b>Penyelenggara</b></div><div class="tab">: <?php echo $info['penyelenggara_acara'];?></div>
						<br>
						<div class="labela"><b>Target</b></div><div class="tab">: <?php echo $info['target_peserta'];?></div>
						<br>
						<br>
						<div class="namaevent">
							<b>Rating</b><br>
							<?php
								for ($i=1;$i<=$info['rating'];$i++)
								{
									echo '<img class="starimage" src="assets/star.png">';
								}
								$blankstar = 5-$info['rating'];
								for ($i=1;$i<=$blankstar;$i++)
								{
									echo '<img class="starimage" src="assets/blankstar.png">';
								}	
							 ?>
						</div>
						<br>
						<div class="button-form"> <a class="white" href="rating.html">Ubah Rating</a></div>
						<br><br>
						<div class="button-form"> <a class="white" href="updateevent.php?id_event=<?php echo $info['id_event']; ?>">Update</a></div>
						<br><br>
						<div class="button-form"> <a class="white" href="delete.php?id_event=<?php echo $row_Event['id_event']; ?>" onClick="return confirm('Yakin menghapus?')">Delete</a></div>
					</div>
				</div>
				
				<div class="columndetail-bottom namaevent">
					<b>Deskripsi</b>
					<?php echo $info['deskripsi'];?>
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
