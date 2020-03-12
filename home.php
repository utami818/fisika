<?php
require_once("helper/login_status.php");  
require_once("asset/koneksi.php");
require_once("asset/head.php");
require_once("asset/navbar2.php");
?>
<?php
if($_SESSION['login_status'] == false){
	header('location: index.php#login');
}
$nama = $_SESSION['nama'];
 ?>

	<title>SELAMAT DATANG</title>
</head>
<body>
 	

	<div class="row">
		

		<div class="col-sm-3">
			
			<div class="container">
				<?php echo "<h1> Selamat Datang! $nama </h1>"; ?>
				<hr>
			<h3>Judul Materi</h3>
			<p class="text-info">silahkan melakukan pencarian atau klik pada menu materi...</p>
			 <?php 
		$value = $_POST ? $_POST["text"] : false; //mengambil value yang dicari
		if($value){ //jika value sudah di input
			$dir = 'materi';
			$files = scandir($dir); //mengambil nama-nam file yang ada di dalam folder materi
			for($i=0; $i < count($files); $i++){
				if(preg_match("#$value#i", $files[$i])){ //periksa nama file didalam direktori apakah sama dengan value yang dicari
					$file = str_replace('_', ' ', substr($files[$i], 0, -4)); //sesuakan tampilan nama file agar enak dilihat
					
					echo "<ul><li><a href='materi/$files[$i]#1'>$file</a></li></ul>"; //tampilan hasil pencarian

				}
			}
		}

	 ?>
				</div>	
		</div>
		<div class="col-sm-9">
			<br>
			<h3>Bapak Fisika</h3>
			<hr>
			<b>Albert Einstein Gerbang Fisika Modern</b>
			<br>
			<img src="img/a.jpg" width="20%">
			<p>&nbsp;&nbsp;&nbsp;&nbsp; Pada dasarnya ALbert Einstein bukanlah seorang fisikawan beliau adalah seseorang bergelut di bidang matematika,
			persamaaan dan penjabaran Hukum Newton berhasil menjawab semua yang terjadi mengenai gerak. Einstein memilikipandangan dengan ruang lingkup imajinasi. Di dunia fisika hampir tidak satupun orang yang percaya dengan Hukum-Hukum Fisika Klasik belum menjelaskan segalanya. Adanya fakta miris dalam perkembangan ilmu pada masa Einstein. Ilmuan jerman mendapat cemooh mengenai pengembangan ilmu pengetahuan untuk pengembangan senjata pemusnah dunia menambah antipati terhadapa pemikiran Einstein dan Plank yang sulit untuk di terima.
			<details>
			<summary>baca selanjutnya...</summary> 
			<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Einstein  juga Newton menberikan hukum yang tidak lengkap mengenai gerak yang terjadi pada tata surya. Fisikawan Inggris menutup mata mengenai gerak Merkurius yang berlawanan dengan teman-temannya. Einstein berpendapat merkurius tidaklah salah dan merkurius tetap tunduk pada hukum alam. Einstein menyangkal pendapat yang dikemukakan Newton mengenai bentuk <i>steady state</i> tata surya. Pendapat ini yang kemudian menarik perhatian dari seorang ilmuan Inggris Edington, yang nantinya akan membuat Einstein dikenal dan diakui Fisikawan Inggris dan juga membuatnya terkenal hingga saat ini.</p>
			</details>
			<br><br><br><br>
		</div>
	</div>

<?php
require_once("asset/footer.php");
require_once("asset/script.php");
?>
</body>
</html>