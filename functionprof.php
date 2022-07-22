<?php

include 'koneksi.php';
//function agar query yang masuk tersusun rapih
function query($query1) {
	global $conn;
	
	$result1 = mysqli_query($conn, $query1);

	if(mysqli_num_rows($result1) == 1){
		return mysqli_fetch_assoc($result1);
	}

	$tampungan = [];
	
	while ($det = mysqli_fetch_assoc($result1) ){
		$tampungan[] = $det;
	}
	
	return $tampungan;
} 

//function untuk menyimpan value rofile kedalam database
function tambaprofile($data){
	global $conn;
    $NAMA = htmlspecialchars($data["NAMA"]);
    $BIO = htmlspecialchars($data["BIO"]);
	
	$GAMBAR = upload();
	if( $GAMBAR === false){
		return false;
	}
	
	$query = "INSERT INTO profiles VALUES ('', '$NAMA', '$BIO', '$GAMBAR')";
	
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
//function untuk uplod gambar dimana di cek dulu apakah sudah memenuhi kriteria gambar atau tidak
function upload() {
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

//function edit value yang ada di database table "profiles"
function editprof($data){
	global $conn;

	$NAMA = htmlspecialchars($data["NAMA"]);
    $BIO = htmlspecialchars($data["BIO"]);
	$GAMBAROLD = htmlspecialchars($data["GAMBAROLD"]);

	//mengupload gambar baru
	if( $_FILES['GAMBAR'] ['error'] === 4) {
		$GAMBAR = $GAMBAROLD;
	} else {
		$GAMBAR = upload();
	}
	
	//query untuk mengupdate value profile
	$query10 = "UPDATE profiles SET 
			NAMA = '$NAMA', 
			BIO = '$BIO',
			GAMBAR = '$GAMBAR'
			";
	
	mysqli_query($conn, $query10);
	return mysqli_affected_rows($conn);
}

?>