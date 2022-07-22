<?php
require 'functionposting.php';
if( isset($_POST["submit"]) ){
    //jika proses tambahposting yaang ada di functionposting berhasil maka notif muncul dan akan diarahkan ke profile.php
	if( tambahposting($_POST) > 0 ) {
		echo " 
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'profile.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'posting.php';
		</script> 
		";
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
    <h1><b>BUAT POSTINGAN</b></h1>
        <div class="card">
			<div class="card-body">
				<form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-group">
                        <label>Caption</label>
                            <textarea class="form-control" name="CAPTION" id="CAPTION" rows="3"></textarea>
                    </div>
                    <div class="form-group">
						<label>FILE FOTO</label>
						<input type="file" name="GAMBAR" id="GAMBAR" class="form-control" placeholder=	"800 x 600" required>
					</div>
					</br>
					<button type="submit" class="btn btn-light" name="submit">SIMPAN</button>
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

