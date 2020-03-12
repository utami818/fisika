<?php
require_once("asset/koneksi.php");
require_once("asset/head.php");
require_once("helper/function.php");
session_start();

?>
	<title>Belajar Fisika Menyenangkan</title>
</head>
<body>
<?php 
require_once("asset/navbar1.php"); 
require_once("asset/jumbotron.php");
?>	
<div class="sinopsis" id="sinopsis">
	<div class="container-fluid">
		<div class="row">
			<div class="col text-center">
				<H1></H1>
				<p><a href="index.php">fisika3D</a> adalah website yang menyediakan pembelajaran fisika beserta peragaan model dalam setiap materi. Peragaan model tersebut berupa gambar dan video, video yang disediakan berupa video pendek animasi 3D untuk mempermudah user memahami materi dengan melihat model yang disediakan pada tiap subbabnya. Tersedia juga contoh soal, soal dan latihan untuk dikerjakan pada tiap-tiap materi.</p>
			</div>
		</div>
	</div>
	<br>
		<div class=container-fluid>
			<div class="row text-center">
				<div class="col-sm-1 offset-sm-5">
					<a href="#login" class="page-scroll"><b>Login</b></a>
				</div>


				<div class="col-sm-1 offset-sm-0">
					<a href="#daftar" class="page-scroll"><b>Registrasi</b></a>
				</div>
			</div>
		</div>
		<br>
</div>
<section class="login" id="login">
<?php
$cek_username = '';
$cek_pass = '';
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM datamasuk WHERE username='$username'";
	$cek_user = mysqli_query($link, $query);
		if(mysqli_num_rows($cek_user) > 0){
			while($row = mysqli_fetch_assoc($cek_user)){
				$pass_db = $row['password'];
				$nama = $row['nama'];
				if($password == $pass_db){
					$_SESSION['login_status'] = true;
					$_SESSION['nama'] = $nama;
					$_SESSION['user_verif'] = $row['user_verif'];
					header("location: home.php");
				
				}else{
					$cek_pass = '<p class="form_error">Password yang anda masukkan salah!!</p>';
				}
			}
		}else{
			$cek_username = '<p class="form_error">username belum terdaftar!!</p>';
	}
}

?>
	<!-- form login -->
		<div class="container-fluid">
			<div class="row" style="background-color:#282e44;">
				<div class="col text-center" style="color:white;">
					<h1 class="text-warning">LOGIN</h1>
					<p>Sudah pernah masuk di website ini, silahkan langsung login</p>
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					
				<br>
					<form  action="#login" method="POST">
						<div class="form-group">
							<label for="username">Username</label>
							<?php echo $cek_username; ?>
								<input type="text" id="username" class="form-control" placeholder="masukkan username" name="username">
							<ul><li><p style="color:#020ffc;">masukkan nama panjang tanpa spasi</p></li></ul>
						
							<label for="password">Password</label>
							<?php echo $cek_pass; ?>
								<input type="password" id="password" class="form-control" placeholder="masukkan password" name="password">
							<ul><li><p style="color:#020ffc;">masukkan password dengan benar dapat menggunakan karakter huruf dan angka max 200 karakter</p></li></ul>
						<br><br>
							<button type="submit" class="btn btn-primary" name="login">Login</button>
						</div>
						<br>
						<br>
						<p>belum memiliki akun?<a href="#daftar" style="color:#020ffc;">Daftar Gratis</a></p>
					</form>
				</div>
			</div>
		
		</div>
		<!-- akhir login -->
	
</section>
<section class="daftar" id="daftar">
	<div class="container-fluid">
		<div class="row" style="background-color:#282e44;">
			<div class="col text-center" style="color:white;">
				<h1 class="text-warning">REGISTRASI</h1>
				<p>Bagi yang belum pernah mendaftar silahkan daftar gratis di website ini</p>
			
			</div>
		</div>
	</div>
<?php 

$nama = "";
$username = "";

$email = "";
$password = "";
$pass_konfirm = "";
$namaErr = "";
$usernameErr = "";

$emailErr = "";
$passwordErr = "";
$username_valid = true;
$username_valid_msg = "";
$name_valid = true;
$name_valid_msg = "";
$valid_panjang_pass = true;
$valid_pass_konfirm = true;
$valid_panjang_pass_msg = "";
$valid_pass_konfirm_msg = "";
$email_use = true;
$email_use_msg = '';
$username_use = true;
$username_use_msg = '';

		
// cek form sudah di klik submit/belum

if(isset($_POST['daftar'])){
$nama = trim(strip_tags($_POST['nama']));
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$pass_konfirm = trim($_POST['passkonfirm']);

// cek input kosong
if(empty($nama)){
	$namaErr = '<p class="form_error">Nama masih kosong!</p>';
}

if(!preg_match("/^[a-zA-Z ]*$/",$nama)){
 	$name_valid = false;
	$name_valid_msg = '<p class="form_error">Hanya huruf dan spasi yg dibolehkan!</p>';
 }

if(empty($username)){
	$usernameErr = '<p class="form_error">Username masih kosong!</p>';
}


if(empty($email)){
	$emailErr = '<p class="form_error">Email masih kosong.</p>';
}
if(empty($password)){
	$passwordErr = '<p class="form_error">password masih kosong.</p>';
}

 if(!preg_match("/^[a-zA-Z]*$/",$username)){
 	$username_valid = false;
 	$username_valid_msg = '<p class="form_error">hanya huruf yang diizinkan, dan tidak boleh menggunakan spasi.</p>';
 }
 //cek minimal karakter password (minimal 8 digit)
 if(strlen($password) < 8){
 	$valid_panjang_pass = false;
 	$valid_panjang_pass_msg = '<p class="form_error">password minimal 8 digit.</p>';
 }
 // cek konfirmasi password sama atau tidak
 if($password != $pass_konfirm){
 	$valid_pass_konfirm = false;
 	$valid_pass_konfirm_msg = '<p class="form_error">password knfirm tidak sama.</p>';
 }

 //cek email register empty db
 if( !empty($email) ){
 	$query = "SELECT email FROM `datamasuk` WHERE email='$email'";
	if( $result = mysqli_query($link, $query)){
		$row_count = mysqli_num_rows($result);
		if($row_count > 0){
			$email_use = false;
			$email_use_msg = '<p class="from-error">Email sudah terdaftar. </p>';
		}
	}
 }

 //cek username register empty db
 if( !empty($username) ){
 	$query = "SELECT username FROM `datamasuk` WHERE username='$username'";
	if( $result = mysqli_query($link, $query)){
		$row_count = mysqli_num_rows($result);
		if($row_count > 0){
			$username_use = false;
			$username_use_msg = '<p class="from-error">Username sudah digunakan. </p>';
		}
	}
 }

 // cek semua input sudah diisi apa belum
	if(!empty($nama) and !empty($username) and !empty($email) and !empty($password) and $username_valid and $valid_panjang_pass and $valid_pass_konfirm and $name_valid and $email_use and $username_use){
		echo "selamat semua input sudah diisi.<br>";
		$kode_ver = rand(1000, 9999);
		$query = "INSERT INTO datamasuk(nama, username, email, password, user_verif, kode_verif) VALUES('$nama', '$username', '$email', '$password', 0, $kode_ver)";
		if(mysqli_query($link, $query)){
			$_SESSION['email'] = $email;
			
			//mengirim kode konfirmasi email
			kirim_konfirmasi_email($email, $kode_ver); 
			header('location: verif_email.php');
		}
	}
}	

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
			<br>
				<h4>Masukkan data diri</h4>
			<form action="#daftar" method="post">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" id="nama" class="form-control" placeholder="masukkan nama" name="nama" value="<?php echo $nama; ?>"><?php echo $namaErr.$name_valid_msg; ?>
				
				<label for="username">Username</label>
				<input type="text" id="nama" class="form-control" placeholder="masukkan nama panjang tanpa spasi" name="username" value="<?php echo $username; ?>"><?php echo $usernameErr.$username_valid_msg.$username_use_msg; ?>
				
				
				<label for="email">Email</label>
				<input type="email" id="email" class="form-control" placeholder="masukkan email" name="email" value="<?php echo $email; ?>"><?php echo $emailErr.$email_use_msg; ?>
				
				<label for="password">Password</label>
				<input type="password" id="password" class="form-control" placeholder="masukkan password" name="password" value="<?php echo $password; ?>"><?php echo $passwordErr.$valid_panjang_pass_msg; ?>
					
					<ul>
						<li><p style="color:#020ffc;">Bukan password google account. Buat password untuk masuk web ini</p></li>
					</ul>
				<label for="password">Konfirm Password</label>
				<input type="password" id="password" class="form-control" placeholder="konfirmasi ulang password" name="passkonfirm" value="<?php echo $pass_konfirm; ?>"><?php echo $valid_pass_konfirm_msg; ?>

				<button type="submit" class="btn btn-primary" name="daftar" >Daftar</button>
			</div>
			</form>
			
		</div>
	</div>
</div>
</section>



 <?php
require_once("asset/footer.php");  
require_once("asset/script.php");
 ?>
 

</body>
</html>