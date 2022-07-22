<?php
//login
session_start();

if (  isset($_SESSION["login"])){
  header("location: index.php");
  exit;
}

require 'koneksi.php';
// jika tombol login di klik maka proses akan dijalankan
if( isset($_POST["login"]) ) {

  $EMAIL = $_POST["EMAIL"];
  $USERNAME = $_POST["USERNAME"];
  $PASSWORD = $_POST["PASSWORD"];
  
  $result = mysqli_query($conn, "SELECT * FROM user WHERE USERNAME = '$USERNAME'");
  if( mysqli_num_rows($result) === 1){

    $row = mysqli_fetch_assoc($result);
    if ( password_verify($PASSWORD, $row["PASSWORD"])){
      $_SESSION["login"] = true;
      header("Location: index.php");
      exit;
    }
  }

    $error = true;
}

?>

<!doctype html>
<html lang="en">
  <head>
     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="bnsp.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <div class="container">
      <div class = "row justify-content-center">
        <div class = "col-lg-5">
        <h1 class="text-center">LOGIN</h1>
          <center>
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header bg-dark text-white">
            <?php if( isset($error)) : ?>
              <p style="color: red; font-syle: italic;"> username / password salah</p>
            <?php endif;?>
            </div>
            <div class="card-body">
              <form method="post" action="">
              <div class="form-group">
                  <label>EMAIL</label>
                  <input type="EMAIL" name="EMAIL" id="EMAIL" class="form-control" placeholder="USERNAME" required>
                </div>  
              <div class="form-group">
                  <label>USERNAME</label>
                  <input type="text" name="USERNAME" id="USERNAME" class="form-control" placeholder="USERNAME" required>
                </div>
                <div class="form-group">
                  <label>PASSWORD</label>
                  <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" placeholder=	"PASSWORD" required>
                </div>
                </br>
                <a href="registrasi.php" class="btn btn-light"> Sign Up </a>
                <button type="submit" class="btn btn-light" name="login">login</button>
              </form>
            </div>
          </div>
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