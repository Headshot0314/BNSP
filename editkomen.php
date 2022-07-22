<?php
require 'functionkomen.php'; 

$ID=$_GET['IDKOMENTAR'];

$kmn = query("SELECT * FROM komentar WHERE IDKOMENTAR = $ID");

// cek ketika tombol submit ditekan atau belum
if( isset($_POST["simpan"]) ){
    //jika proses ubahkomen berhasil atau tidak
	if( editkomen($_POST) > 0 ) {
		echo " 
		<script>
			alert('data berhasil diubah!');
			document.location.href = profile.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'profile.php';
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
    <h1><b>BUAT PROFILE</b></h1>
        <div class="card">
			<div class="card-body">
				<form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <input type ="hidden" name="IDKOMENTAR" value = "<?=$kmn["IDKOMENTAR"];?>">
                    <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" name="USERNAME" id="USERNAME" value = "<?php echo $kmn ["USERNAME"]; ?>" class="form-control" placeholder="USERNAME" required>
                    </div>
                    <div class="form-group">
                        <label for="KOMEN"> Komentar Muu</label>
                            <textarea class="form-control" name="KOMEN" id="KOMEN" value = "<?php echo $kmn ["KOMEN"]; ?>" rows="3"></textarea>
                    </div>
					<button type="submit" class="btn btn-light" name="simpan">SIMPAN</button>
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