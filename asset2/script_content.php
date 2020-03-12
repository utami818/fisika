<!--bootstrap Javascript-->
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!--end bawah bootstrap script-->
    <!-- membuat page scroll pada halaman -->

	<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
   		<script type="text/javascript">
   //event pada saat link di klik
 	$(document).ready(function(e){
 		$("a").click(function(e){
 			var hash = this.hash;
 			//pindahkan scroll
 			$('html').animate({
 				scrollTop: $(hash).offset().top - 45
 			}, 1250, "easeInOutCirc");

 		});
 		e.prevenDefault();
 	});
 	</script>
    