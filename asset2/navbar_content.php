<!-- membuat navbar pada halaman -->
<div class="transparent-navbar fixed-top">
	<!-- container untuk membuat wadah navbar -->
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-transparent"> 
			 
			<a class="navbar-brand text-warning" href="../index.php">Animasi dan Fisika</a>
				<!-- collapsible button -->
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#target-list" aria-controls="target-list" aria-expanded="false" aria-label="Toggle navigation">
					<!-- untuk membuat icon toggler -->
					<span class="navbar-toggler-icon"></span>
				</button>

			<!-- collapsible content -->
			<div class="collapse navbar-collapse" id="target-list">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="../home.php"><i class="fas fa-home"> Home<span class="sr-only">(current)</span></i></a>
					</li>
					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-book"> Materi</i></a>
				        <!-- membuat list tersembunyi -->
				          <div class="dropdown-menu">

				            <a class="dropdown-item" href="../list_materi.php#1">kelas 10</a>
				            <a class="dropdown-item" href="../list_materi.php#2">kelas 11</a>
				            <a class="dropdown-item" href="../list_materi.php#1">kelas 12</a>
				          </div>
				         <!-- end list tersembunyi -->
			        </li>
					<li class="nav-item">
						<a class="nav-link" href="../quest.php#soal_momentum_linier_dan_impuls"><i class="fas fa-book"> Soal</i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../contact.php#soal_momentum_linier_dan_impuls"><i class="fas fa-mail"> Kontak</i></a>
					</li>

				</ul>
				
					
			</div>
			<!--end collapsible content -->
		</nav>
		<!-- end navbar -->
	</div>
	 <!--end container/wadah  -->
</div>
	<!-- end navbar -->
<?php 
	$value = $_POST ? $_POST["text"] : false; //mengambil value yang dicari
	if($value){ //jika value sudah di input
		$dir = 'materi';
		$files = scandir($dir); //mengambil nama-nam file yang ada di dalam folder materi
		for($i=0; $i < count($files); $i++){
			if(preg_match("#$value#i", $files[$i])){ //periksa nama file didalam direktori apakah sama dengan value yang dicari
				$file = str_replace('_', ' ', substr($files[$i], 0, -4)); //sesuakan tampilan nama file agar enak dilihat
				
				echo "<li><a href='materi/$files[$i]'>$file</a></li>"; //tampilan hasil pencarian

			}
		}
	}

 ?>