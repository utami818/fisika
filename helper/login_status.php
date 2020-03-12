<?php
session_start();
if(!empty($_SESSION['login_status']) && !empty($_SESSION['user_verif'])){
	if($_SESSION['login_status']){
		if($_SESSION['user_verif'] == 0){
			header("location: verif_email.php");
		}
	}else{
		header("location: index.php");
	}
}else{
	header("location: index.php");
}

?>