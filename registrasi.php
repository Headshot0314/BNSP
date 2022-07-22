<?php

require 'function.php';
// jika tombol sign in di klik maka proses akan dijalankan
if( isset ($_POST["signin"])) {

    if( regist($_POST) > 0 ) {
    echo " <script>
            alert('User Berhasil Ditambahkan!');
            document.location.href = 'tmbhprofile.php';
            </script>";
    } else{
        echo mysqli_error($conn);
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="tugas.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <div class = "container-fluid">
    <h1><b>Registrasi</b></h1>
        <div class="card">
			<div class="card-body">
				<form method="post" action="">
                <div class="form-group">
						<label>Email</label>
						<input type="email" name="EMAIL" id="EMAIL" class="form-control" placeholder=	"Input Email!" required>
					</div>
                    <div class="form-group">
						<label>Username</label>
						<input type="text" name="USERNAME" id="USERNAME" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="PASSWORD" id="PASSWORD" class="form-control" placeholder=	"Password" required>
					</div>
                    <div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" name="PASSWORD2" id="PASSWORD2" class="form-control" placeholder=	"Password" required>
					</div>
					</br>
					<button type="submit" class="btn btn-light" name="signin">Sign In</button>
                </form>
			</div>
        </div>
    </div>

    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>