<?php
require 'functionkomen.php';

$ID=$_GET['IDKOMENTAR'];

if( hapuskomen($ID) > 0) {
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