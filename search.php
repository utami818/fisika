<ul>
	<?php 
		$dir ='../materi'; //nam direktori yang memuat file materi
		$file = scandir($dir); //mengambil nama-nama file yang ada didalam direktori materi
		?>
		<?php for($i=2; $i < count($files); $i++) : ?>
			<?php 
				$file = str_replace('_', ' ', substr($files[$i], 0, -4)); //menyesuaikan tampilan teks agar enak dilihat

			 ?>
			 <li><a href="<?=$files[$i]?>#1"><?=$file?></a></li> <!-- menampilkan list materi -->
	<?php endfor ?>
</ul>