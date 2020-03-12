
<?php
 
require_once("asset/koneksi.php");
require_once("asset/head.php");
require_once("asset/navbar1.php");
session_start();

//Menampilkan pesan pengiriman email konfirmasi
if(!empty($_SESSION['email_register_send']) && !empty($_SESSION['email'])){
	if($_SESSION['email_register_send'] == 1){
		$msg = "<p>Kode konfirmasi email berhasil dikirim ke email kamu</p>";
	}else if($_SESSION['email_register_send'] == 0){
		$msg = "<p>Kami mengalami masalah mengiirim email ke email kamu</p>";
	}
}else{
	header('location: index.php');
}


//Verifikasi email user
$kode_msg='';
if(!empty($_POST['submit'])){

	$kode_verif = $_POST['kode_verif'];
	$email_user = $_SESSION['email'];

	$query = "SELECT * FROM datamasuk WHERE email='$email_user'";
	$cek_user = mysqli_query($link, $query);
	if(mysqli_num_rows($cek_user) > 0){		
		while($row = mysqli_fetch_assoc($cek_user)){

			if($row['kode_verif'] == $kode_verif){
				$query_update_user = "UPDATE datamasuk SET kode_verif=0, user_verif=1 WHERE email='$email_user'";
				mysqli_query($link, $query_update_user);
				if(mysqli_affected_rows($link) > 0 ){
					$_SESSION['login_status'] = true;
					$_SESSION['nama'] = $nama;
					$_SESSION['user_verif'] = 1;
				}
				header("location: home.php");
			}else{
				$kode_msg = '<p class="form_error">Kode yang kamu masukkan salah</p>';
			}
		}
	}
}



?>

	<title>konfirmasi email</title>
</head>
<body>
	<div class="container" style="padding-top:10px;">
		<div class="alert alert-info" role="alert">
			<h3 class="alert-heading">Verifikasi Email</h3>
			<hr>
			<p style="text-align:justify;">kode verifikasi telah dikirim melalui email anda<br>
			segera cek email untuk konfirmasi dan masukkan kode di kolom bawah ini.</p>
			<br><br>
			
					<form method="post" action="verif_email.php">
						<label for="kode">Kode verifikasi e-mail:</label>
						<div class="row">
							<div class="form-group">
								<input type="text" name="kode_verif" class="form-control" id="colFormLabelSm" placeholder="masukkan kode">
								<?php echo $kode_msg;?>
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Konfirmasi" class="btn btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
