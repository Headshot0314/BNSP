<?php
require 'functionposting.php';

$IDPOSTING = $_GET["IDPOSTING"];

if( hapuspost($IDPOSTING) > 0) {
	echo " 
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'profile.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'profile.php';
		</script> 
		";
	}
?>