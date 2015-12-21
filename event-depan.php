<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Event | KM-ITB </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/association.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/half-slider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/stylestwitter.css">
		<?php
			include_once 'dbconfig.php';
			if(!$user->is_loggedin())
			{
				$user->redirect('index.php');
			}
			$user_id = $_SESSION['user_session'];
			$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
			$stmt->execute(array(":user_id"=>$user_id));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
		?>
	</head>
	<body>
		 <!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="title">
						<a class="navbar-brand" href="index.html">KM-ITB</a>
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

		<div class="grey">
		<div class="tambahevent">
		<div class="button-form"> <a class="white" href="1-column.php">Advanced Search</a></div>
		<div class="button-form"> <a class="white" href="1-columnCal.php">Kalender Akademik</a></div>
		<div class="button-form"> <a class="white" href="1-columnCSV.php">Event Via CSV </a></div>
		</div>
		</div>
		
    
    
        <!-- ****recomended event caraousel*** -->
            <style>
                .carousel-inner{
                    background-color: white;
                }
            </style>
        <div id="recommendation-carousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#recommendation-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#recommendation-carousel" data-slide-to="1"></li>
            <li data-target="#recommendation-carousel" data-slide-to="2"></li>
          </ol>
        <!-- /Indicators -->
		<?php
			$recommended_events = file_get_contents('http://localhost/event/newapi.php?action=get_recommendations&person='.$userRow['user_name']); // "andra" diganti sama variabel username dari user yang sedang login
			$recommended_events= json_decode($recommended_events, true);
		?>
          <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a href ="">
                        <img src="img/default-Event.jpg" alt="eventdiitb" class="center-block">
                    </a>
                    <div class="overlay-carousel">
                    </div>
                  <div class="carousel-caption">
                        <h3>Event on ITB</h3>
                        <p>See all event you want!</p>
                  </div>
                </div>
				<?php
					if (is_array($recommended_events) || is_object($recommended_events)){
					foreach($recommended_events as $event): ?>
                <div class="item">
                    <a href="event-detail.php?id=<?php echo $event['id_event'];?>&action=get_event">
						<?php echo '<img class="gambarmedium center-block" src="data:image/jpeg;base64,'.$event['media'].'"/>';?>
                    </a>
                    <div class="overlay-carousel">
                    </div>
                  <div class="carousel-caption">
                        <a href="event-detail.php?id=<?php echo $event['id_event'];?>&action=get_event"><h3><?php echo $event["nama"];?></h3></a>
                        <p><?php echo $event["deskripsi"];?></p>
                  </div>
                </div>
				<?php endforeach;} ?>
            </div>
            <!-- Wrapper for slides -->
            
            <!-- Controls -->
            <a class="left carousel-control" href="#recommendation-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#recommendation-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
            <!-- /Controls -->
          </div>
        <!-- ****/recomended event caraousel*** -->
        
    
        
		<div class="satu">
		<div class="container-event">

	


<?php
	if (isset($_GET["action"]) && isset($_GET["action"]) == "get_all") {
	$info = file_get_contents('http://localhost/event/event-api.php?action=get_all');
	$info = json_decode($info,true);
	foreach ($info as $result) {
?> 
		<div class="tampilhomeevent">
		<a href="event-detail.php?id=<?php echo $result['id_event'];?>&action=get_event">
		<?php
			echo '<img class = "gambar" src="data:image/jpeg;base64,'.$result['media'].'"/>', '<br>';
		?>
		<div class = "namaevent">
			<?php echo $result['nama'].' ';?>
		</div>
			<?php
				for ($i=1;$i<=$result['rating'];$i++)
				{
					echo '<img class="starimage" src="assets/star.png">';
				}
				$blankstar = 5-$result['rating'];
				for ($i=1;$i<=$blankstar;$i++)
				{
					echo '<img class="starimage" src="assets/blankstar.png">';
				}	
			  ?>
		</a>
		</div>
		<?php
	}
} 
?>		</div>
		<hr>

		<?php /* Start session Crawling Twitter -007 -011 */ ?>
		<div class="twittercrawler">
		<center><fieldset style="width:500px">
		<legend align="center"> <font face = "courier" font size = "5"> <b> Twitter Crawling </b> </font> </legend> 
		<div class="scrollingtweet">
		<?php

		date_default_timezone_set('Asia/Shanghai');

		$info = file_get_contents('http://localhost/event/twitter3.php');
		$info = json_decode($info);
		echo "<table>";
		foreach($info as $row) {
			echo "<tr>";
				echo "<table border class = 'boldtable'>";
					echo "<td>";
						echo '<img src="' . $row->pic . '">';
					echo "</td>";
					echo "<td>";
						echo "<table>";
							echo "<tr>";
								echo "<td>";
									echo "<table>";
										echo "<tr>";
											echo "<td>";
												echo '@' . $row->username . ' - ';
											echo "</td>";
											echo "<td>";
												echo $row->date[8] . $row->date[9] . ' ' . $row->date[4] . $row->date[5] . $row->date[6] . ' ' . $row->date[26] . $row->date[27] . $row->date[28] . $row->date[29] . '   ' . $row->date[11] . $row->date[12] . ':' . $row->date[14] . $row->date[15] . ':' . $row->date[17] . $row->date[18] .'<br>';
											echo "</td>";
										echo "</tr>";
									echo "</table>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo $row->text . '<br>';
								echo "</td>";
							echo "</tr>";
						echo "</table>";
					echo "</td>";
				echo "</table>";
			echo "</tr>";
		}
		echo "</table>";
		?>
		</div>
		</fieldset></center>
		</div>
		<?php /* End session Crawling Twitter -007 -011 */ ?>

		<div class="grey">
		<div class="tambahevent">
			Kamu punya event? Silahkan tambah eventmu!
			<div class="button-form"> <a class="white" href="event-client.php">Tambah Event</a></div>
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
