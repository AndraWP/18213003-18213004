<?php

# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# File		: event-api.php

session_start();

	function addDataEvent($namaevent,$tanggal,$waktu,$lokasi,$biaya,$deskripsi,$penyelenggaraacara,$targetpeserta,$media){
		include 'connectdb.php';
		$namaevent = mysqli_real_escape_string($con, $_POST['namaevent']);
		$tanggal = mysqli_real_escape_string($con, $_POST['tanggal']);
		$waktu = mysqli_real_escape_string($con, $_POST['waktu']);
		$lokasi = mysqli_real_escape_string($con, $_POST['lokasi']);
		$biaya = mysqli_real_escape_string($con, $_POST['biaya']);
		$deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);
		$penyelenggaraacara = mysqli_real_escape_string($con, $_POST['penyelenggaraacara']);
		$targetpeserta = mysqli_real_escape_string($con, $_POST['targetpeserta']);
		$twitter = mysqli_real_escape_string($con, $_POST['twitter']);
		if(getimagesize($_FILES['media']['tmp_name']) == TRUE)
		{
			$image= addslashes(file_get_contents($_FILES['media']['tmp_name']));
			$media = $image;
		}
		$sql= "INSERT INTO detil_event1 (nama,tanggal,waktu,lokasi,biaya,deskripsi,penyelenggara_acara,target_peserta,twitter,media) VALUES ('$namaevent','$tanggal','$waktu','$lokasi','$biaya','$deskripsi','$penyelenggaraacara','$targetpeserta','$twitter','{$media}')";
		if (mysqli_query($con,$sql))
		{
			header("Location: suksesform.php");
		}
		else
		{
			echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
		}
	}
		
	function get_event_by_id($id) {
		$info = array();
		include 'connectdb.php';
		$result = mysqli_query($con, 'SELECT * FROM detil_event1 WHERE id_event = ' . $id);
		$info = mysqli_fetch_array ($result, MYSQL_ASSOC); 
		$info['media'] = base64_encode($info['media']);
		return $info; 
	}
	
	function get_event_all() {
		$info = array();
		include 'connectdb.php';
		$result = mysqli_query($con, 'SELECT * FROM detil_event1');
		while ($row = mysqli_fetch_array ($result, MYSQL_ASSOC)) {
		$row['media'] = base64_encode($row['media']);
		$info[] = $row;
		}
		return $info; 
	}
	
	function addDataKader($nimkader,$organisasi,$acara,$posisi,$tahunmulai,$tahunberakhir){
		include 'connectdb.php';
		$nimkader = mysqli_real_escape_string($con, $_POST['nimkader']);
		$organisasi = mysqli_real_escape_string($con, $_POST['organisasi']);
		$acara = mysqli_real_escape_string($con, $_POST['acara']);
		$posisi = mysqli_real_escape_string($con, $_POST['posisi']);
		$tahunmulai = mysqli_real_escape_string($con, $_POST['tahunmulai']);
		$tahunberakhir = mysqli_real_escape_string($con, $_POST['tahunberakhir']);
	
		$sql= "INSERT INTO tabel_data_kader (NIM,Organisasi,Acara,Posisi,Tahun_Mulai,Tahun_Berakhir) VALUES ('$nimkader','$organisasi','$acara','$posisi','$tahunmulai','$tahunberakhir')";
		if (mysqli_query($con,$sql))
		{
			header("Location: suksesform.php");
		}
		else
		{
			echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
		}
	}
	
	function get_datakader_by_nim($nimkader) {
		$info = array();
		include 'connectdb.php';
		$result = mysqli_query($con, 'SELECT tabel_data_kader.NIM, Nama_Mahasiswa, Organisasi, Posisi, Acara FROM tabel_mahasiswa, tabel_data_kader WHERE tabel_data_kader.NIM = ' . $nimkader . ' AND tabel_mahasiswa.NIM = ' . $nimkader);
		$info = mysqli_fetch_all ($result, MYSQL_ASSOC);
		return $info;
	}
	
	function addDataKomunitas($namalembaga,$deskripsikomunitas,$kategori,$alamatkomunitas,$lat,$lng,$cp,$posisi,$nomortelepon,$website,$medsos,$linkgambar){
		include 'connectdb.php';
		$namalembaga = mysqli_real_escape_string($con, $_POST['namalembaga']);
		$deskripsikomunitas = mysqli_real_escape_string($con, $_POST['deskripsikomunitas']);
		$kategori = mysqli_real_escape_string($con, $_POST['kategori']);
		$alamatkomunitas = mysqli_real_escape_string($con, $_POST['alamatkomunitas']);
		$lat = mysqli_real_escape_string($con, $_POST['lat']);
		$lng = mysqli_real_escape_string($con, $_POST['lng']);
		$cp = mysqli_real_escape_string($con, $_POST['cp']);
		$posisi = mysqli_real_escape_string($con, $_POST['posisi']);
		$nomortelepon = mysqli_real_escape_string($con, $_POST['nomortelepon']);
		$website = mysqli_real_escape_string($con, $_POST['website']);
		$medsos = mysqli_real_escape_string($con, $_POST['medsos']);
		$linkgambar = mysqli_real_escape_string($con, $_POST['linkgambar']);
		
		$sql= "INSERT INTO komunitas (nama_lembaga,deskripsi,kategori,alamat,lat,lng,contact_person,posisi,nomor_telepon,website,media_sosial,link_gambar) VALUES ('$namalembaga','$deskripsikomunitas','$kategori','$alamatkomunitas','$lat','$lng','$cp','$posisi','$nomortelepon','$website','$medsos','$linkgambar')";
		if (mysqli_query($con,$sql))
		{
			header("Location: suksesform.php");
		}
		else
		{
			echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
		}
	}		
		
		function get_komunitas_by_id($id){
			$komunitas_info = array();
			include 'connectdb.php';
			$result = mysqli_query($con, 'SELECT * FROM komunitas WHERE id= ' . $id);
			$komunitas_info = mysqli_fetch_assoc($result);
			return $komunitas_info;
		 }
		 	 
		function get_komunitas_all(){
			$komunitas_list=array();
			include 'connectdb.php';
			$komunitas_info=mysqli_query($con, 'SELECT * FROM komunitas');
			while($temp=mysqli_fetch_assoc($komunitas_info)){
			  $komunitas_list[]=$temp;
			}
			return $komunitas_list;
		 }
		 
		 function get_komunitas_by_keyword($keyword){
			$komunitas_list=array();
			include 'connectdb.php';
			$komunitas_info = mysqli_query($con, "SELECT * FROM komunitas WHERE id LIKE '%" . $keyword . "%' OR nama_lembaga LIKE '%" . $keyword . "%' OR deskripsi LIKE '%" . $keyword . "%' OR contact_person LIKE '%" . $keyword . "%' OR website LIKE '%" . $keyword . "%'");
			while($temp=mysqli_fetch_assoc($komunitas_info)){
			  $komunitas_list[]=$temp;
			}
			return $komunitas_list;
		 }
		
		include 'connectdb.php';
		if (isset($_POST["submit"])){
					if ($_POST['captcha_input'] == $_SESSION['captcha']['code']) {
						// Captcha benar
						$value = addDataEvent($_POST["namaevent"],$_POST["tanggal"],$_POST["waktu"],$_POST["lokasi"],$_POST["biaya"],$_POST["deskripsi"],$_POST["penyelenggaraacara"],$_POST["targetpeserta"], $_FILES["media"]);
					} else {
						// Captcha salah
						header('Location: event-client.php');
					}
		}
		else if (isset($_POST["submitKader"])){
					if ($_POST['captcha_input'] == $_SESSION['captcha']['code']) {
						$value = addDataKader($_POST["nimkader"],$_POST["organisasi"],$_POST["acara"],$_POST["posisi"],$_POST["tahunmulai"],$_POST["tahunberakhir"]);
					} else {
						// Captcha salah
						header('Location: mahasiswa-client.php');
					}	
		}
		else if (isset($_POST["submitKomunitas"])){
					if ($_POST['captcha_input'] == $_SESSION['captcha']['code']) {
						$value = addDataKomunitas($_POST["namalembaga"],$_POST["deskripsikomunitas"],$_POST["kategori"],$_POST["alamatkomunitas"],$_POST["lat"],$_POST["lng"],$_POST["cp"],$_POST["posisi"],$_POST["nomortelepon"],$_POST["website"],$_POST["medsos"],$_POST["linkgambar"]);
					} else {
						// Captcha salah
						header('Location: komunitas-client.php');
					}
		}
		
		else if (isset($_GET["action"])) {
			switch ($_GET["action"]) {
				case "get_event";
					if (isset($_GET["id"])) 
						$value = get_event_by_id($_GET["id"]);
					else
						$value = "ERROR";
					break;
				case "get_all";
					$value = get_event_all();
					break;
				case "get_datakader";
					if (isset($_GET["nimkader"]))
						$value = get_datakader_by_nim($_GET["nimkader"]);
					else
						$value = "ERROR";
					break;
				case "get_komunitas";
					if (isset($_GET["id"]))
						$value = get_komunitas_by_id($_GET["id"]);
					else
						$value = "ERROR";
					break;
				case "get_komunitas_keyword";
					if (isset($_GET["keyword"]))
						$value = get_komunitas_by_keyword($_GET["keyword"]);
					else
						$value = "ERROR";
					break;
				case"get_komunitasall";
						$value = get_komunitas_all();
					break;
			}
			exit(json_encode($value));
		}else
					$value = "ERROR";
	
		
				
?>
