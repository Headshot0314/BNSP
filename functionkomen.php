<?php

include 'koneksi.php';
//function agar query yang masuk tersusun rapih
function query($query) {
	global $conn;
	
	$result1 = mysqli_query($conn, $query);

	if(mysqli_num_rows($result1) == 1){
		return mysqli_fetch_assoc($result1);
	}

	$tampungan = [];
	
	while ($det = mysqli_fetch_assoc($result1) ){
		$tampungan[] = $det;
	}
	
	return $tampungan;
} 
//function untuk menyimpan value komentar kedalam database
function tambahkomen($data){
	global $conn;
    $USERNAME = htmlspecialchars($data["USERNAME"]);
    $KOMEN = htmlspecialchars($data["KOMEN"]);

    $query = "INSERT INTO komentar VALUES ('', '$USERNAME', '$KOMEN')";
	
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapuskomen($ID) {
	global $conn;
	mysqli_query($conn, "DELETE FROM komentar WHERE IDKOMENTAR = '$ID'");
	
	return mysqli_affected_rows($conn);
}
function editkomen($data) {
	global $conn;

	$IDKOMENTAR = $data["IDKOMENTAR"];
	$USERNAME = htmlspecialchars($data["USERNAME"]);
    $KOMEN = htmlspecialchars($data["KOMEN"]);
	
	$query = "UPDATE komentar SET 
			USERNAME = '$USERNAME', 
			KOMEN = '$KOMEN'
			WHERE IDKOMENTAR = $IDKOMENTAR
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}