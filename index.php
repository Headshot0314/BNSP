<?php
//session login, jadi ketika aplikasi dijalankan akan langsung diarahkan dulu ke login.php
session_start();

if ( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}

require 'functionprof.php';
//mengambil table profiles dan komentarS
$prof1 = query("SELECT * FROM profiles");
$komen = query("SELECT * FROM komentar");
 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>BNSP</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="bnsp.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
				<img src="property\medsos.jpg" alt="" width="50" height="50" class="rounded-circle" class="d-inline-block align-text-top">
                <h4>Bnsp Medsos</h4>
            </div>

            <ul class="list-unstyled components">
				<li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <a href="profile.php">PROFILE</a>
                </li>
                <li>
                    <a href="logout.php">LOG OUT</a>
                </li>
            </ul>   
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="card-body">
                <div class="container">
                    <!-- mengambil file gambar di folder images yang sesuai dengan data di database  -->
                <img src="images/<?= $prof1["GAMBAR"]; ?>" alt="" width="28" height="24" class="rounded-circle" class="d-inline-block align-text-top">
                <!-- mengaambil value nama dari table profiles  -->
                <?=$prof1['NAMA']?>
                </div>
			</div>
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- mengaambil value nama dari table profiles  -->
                        <p class="card-text" ><?=$prof1['NAMA']?></p>
                        <p class="card-text"><small class="text-muted">caption</small></p>
                    </div>
                    <!-- mengambil file gambar di folder images yang sesuai dengan data di database  -->
                    <img class="card-img-top" src="images/<?= $prof1["GAMBAR"]; ?>" alt="Card image cap">
                    <a href="komen.php">Komentar</a>
                    <div class="card w-75">
                        <!-- perulangan, value username dan komentar akan ditampilkan -->
                        <?php foreach ($komen as $komentar): ?>
                            <div class="card-body">
                                <?=$komentar['USERNAME']?>
                                <p class="card-text"><?=$komentar['KOMEN']?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <br>
            <footer>
                <div class = "text-dark text-center">
                    Copyright @2021 - Lathief Sentika Widjaja
                </div>
            </footer>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

   
</body>

</html>