<?php 
include 'koneksi.php';
//function agar query yang masuk tersusun rapih
function query($query12) {
	global $conn;
	$result = mysqli_query($conn, $query12);
	$rows = [];
	
	while ($row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	
	return $rows;
} 
//function untuk sign up atau daftar, memasukan username, email, password.
function regist($data){
	global $conn;

	$USERNAME = strtolower(stripslashes($data["USERNAME"]));
	$EMAIL = htmlspecialchars($data["EMAIL"]);
	$PASSWORD = mysqli_real_escape_string($conn, $data["PASSWORD"]);
	$PASSWORD2 = mysqli_real_escape_string($conn, $data["PASSWORD2"]);

	$result = mysqli_query($conn, "SELECT USERNAME FROM user WHERE USERNAME = '$USERNAME'");

	if(mysqli_fetch_assoc($result)) {
		echo " 
			<script>
            	alert('Username Sudah Terdaftar');
            </script>
			";
		return false;
	}
	//Jika password pertama dan kedua tidak sesuai maka tidak bisa daftar, password harus sama
	if( $PASSWORD !== $PASSWORD2){
		echo " <script>
            alert('Password Tidak Sesuai');
            </script>";

		return false;
	}
	//enkripsi password
	$PASSWORD = password_hash($PASSWORD, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES ('$EMAIL', '$USERNAME', '$PASSWORD')");

	return mysqli_affected_rows($conn);
}

?>