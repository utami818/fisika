<!-- membuat navbar pada halaman -->
<div class="transparent-navbar fixed-top">
	<!-- container untuk membuat wadah navbar -->
	<div class="container">
		<nav class="navbar navbar-expand-lg text-warning navbar-dark bg-transparent" style="background-color: #e3f2fd";>
  <a href="#" class="navbar-brand text-warning">Animasi dan Fisika</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#listTarget" aria-controls="listTarget" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<!-- collapsible content -->
			 <div class="collapse navbar-collapse" id="listTarget">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
			          	<a class="nav-link active" href="home.php"><i class="fas fa-home"> Home <span class="sr-only">(current)</span></i></a>
			        </li>
					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-book"> Materi</i></a>
				          <div class="dropdown-menu">
				            <a class="dropdown-item page-scroll" href="list_materi.php#1">Kelas 10</a>
				            <a class="dropdown-item page-scroll" href="list_materi.php#2">Kelas 11</a>
				            <a class="dropdown-item page-scroll" href="list_materi.php#3">Kelas 12</a>
				          </div>
        			</li>
					<li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-book"> Soal</i></a>
				          <div class="dropdown-menu">
				            <a class="dropdown-item" href="quest.php#soal1">Kelas 10</a>
				            <a class="dropdown-item" href="quest.php#soal2">Kelas 11</a>
				            <a class="dropdown-item" href="quest.php#soal3">Kelas 12</a>
				          </div>
        			</li>
					<li class="nav-item">
			          <a class="nav-link" href="contact.php"><i class="fas fa-mail">Kontak <span class="sr-only">(current)</span></i></a>
			        </li>

				</ul>
				<form rol="search" class="form-inline my-2 my-lg-0" action="home.php" method="POST">
					<div class="form-group">
						<input class="form-control mr-sm-2" type="text" name="text" autofocus placeholder="Tulis judul materi..." autocomplete="off">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
					</div>	
				</form>
				<form action="logout.php" class="form-inline my-2 my-lg-0" method="POST">
					<div class="form-group">
						<button type="submit" class="btn btn-outline-info" nama="submit">LogOut</button>
					</div>
				</form>	
			</div>
			<!--end collapsible content -->
		</nav>
		<!-- end navbar -->
	</div>
	 <!--end container/wadah  -->
</div>
	<!-- end navbar -->
