<?php

//Fungsi untuk mengirim email register
function kirim_konfirmasi_email($tujuan_email, $kode_verifikasi){
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
		// menampilkan semua error kecuali deprecated dan notice
		require 'PHPMailer/PHPMailerAutoload.php';
		//mengambil isi pesan dari file HTML yaitu pesan.html
		$message = 
		"
		<p>Halo $tujuan_email di website belajar fisika.</p>
		<p>Berikut adalah kode verifikasi pendaftaran kamu <b>$kode_verifikasi</b></p>

		";

		// membuat objek phpmailer
		$mail = new PHPMailer(true);

		//memberi class untuk menggunakan konfigurasi SMTP
		$mail->isSMTP();
		$mail->SMTPDebug = 0;

		//mengaktifkan otentikasi SMTP
		$mail->SMTPAuth = true;

		// untuk gmail
		//MENETAPKAN PREFIX KE SERVER
		$mail->SMTPSecure = 'ssl';

		//atur gmail sebagai server SMTP
		$mail->Host = 'smtp.gmail.com';

		//atur server SMTP untuk server Gmail
		$mail->Port = 465;
		$mail->Username = 'utamieinzwei@gmail.com';
		$mail->Password = 'einzwei12';
		$mail->Subject = 'Kode Konfirmasi Email';


		$mail->setFrom('utamieinzwei@gmail.com', 'utami wijaya');

		$mail->addAddress($tujuan_email);

		$mail->MsgHTML($message);


		//kirim email
		try{
			//kirim email
		$mail->Send();
		$_SESSION['email_register_send'] = 1;

		} catch (phpmailerException $e){
			$msg = $e->getMessage();
			$_SESSION['email_register_send'] = 0;
		} catch (Exception $e){
			$msg = $e->getMessage();
			$_SESSION['email_register_send'] = 0;
		}
}

?>