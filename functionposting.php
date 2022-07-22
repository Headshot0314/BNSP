<?php

include 'koneksi.php';
//function agar query yang masuk tersusun rapih
function query($query3) {
	global $conn;
	
	$result1 = mysqli_query($conn, $query3);

	if(mysqli_num_rows($result1) == 1){
		return mysqli_fetch_assoc($result1);
	}

	$tampungan = [];
	
	while ($det = mysqli_fetch_assoc($result1) ){
		$tampungan[] = $det;
	}
	
	return $tampungan;
} 
//function untuk menyimpan value postingan kedalam database
function tambahposting($data){
	global $conn;
    $CAPTION = htmlspecialchars($data["CAPTION"]);
	$GAMBAR = upload1();
	if( $GAMBAR === false){
		return false;
	}
	
	$query = "INSERT INTO posting VALUES ('', '$CAPTION', '$GAMBAR')";
	
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
//function untuk uplod gambar dimana di cek dulu apakah sudah memenuhi kriteria gambar atau tidak
function upload1() {
	$namafoto = $_FILES['GAMBAR']['name'];
	$ukuranfoto = $_FILES['GAMBAR']['size'];
	$error = $_FILES['GAMBAR']['error'];
	$tmpfoto = $_FILES['GAMBAR']['tmp_name'];

	if($error === 4){
		echo "
		<script>
			alert('Anda Tidak menginputkan Gambar');
		</scripts>";

		return false;
	}
    //di cek  apakah sudah memenuhi kriteria gambar atau tidak
	$ekstenvalid = ['jpg', 'jpeg', 'png'];
	$ekstengambar = explode('.', $namafoto);
	$ekstengambar = strtolower(end($ekstengambar));

	if(!in_array($ekstengambar, $ekstenvalid)){
		echo "
		<script>
			alert('Yang anda upload Bukan Gambar');
		</scripts>";
		
		return false;
	}
    //jika  ukuran file melebihi yang sudah di tetapkan maka file tidak bisa di upload
	if ($ukuranfoto >3000000 ) {
		echo "
		<script>
			alert('Ukuran Gambar Terlalu Besar!');
		</script>";

		return false;
	}

	$namafotonew = uniqid();
	$namafotonew .= '.';
	$namafotonew .= $ekstengambar; 

    //memasukan  file gambar kedalam folder images
	move_uploaded_file($tmpfoto, 'images/' . $namafotonew);

	return $namafotonew;
}

function hapuspost($IDPOSTING) {
	global $conn;
	mysqli_query($conn, "DELETE FROM posting WHERE IDPOSTING= '$IDPOSTING'");
	
	return mysqli_affected_rows($conn);
}
function editpost($data){
	global $conn;

	$IDPOSTING = $data["IDPOSTING"];
	$CAPTION = htmlspecialchars($data["CAPTION"]);
	$GAMBAROLD = htmlspecialchars($data["GAMBAROLD"]);

	//mengupload gambar baru
	if( $_FILES['GAMBAR'] ['error'] === 4) {
		$GAMBAR = $GAMBAROLD;
	} else {
		$GAMBAR = upload();
	}
	
	//query untuk mengupdate value profile
	$query = "UPDATE profiles SET 
			CAPTION = '$CAPTION',
			GAMBAR = '$GAMBAR'
			WHERE IDPOSTING = $IDPOSTING
			";
	
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
?>