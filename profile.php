<?php 

require 'functionprof.php';


$prof = query("SELECT * FROM profiles");
$post = query("SELECT * FROM posting");
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
        <div id="content">
            <div class="jumbotron jumbotron-fluid">
                <div class="container text-center">
                    <img src="images/<?= $prof["GAMBAR"]; ?>" width = "240" height = "260" class="rounded-circle">
                    <a href="editprofile.php"><small>Edit Profile</small></a>
                </div>
                    <h1><?=$prof['NAMA']?></h1>
                    "<?=$prof['BIO']?>"
            </div>
            <div><a href="posting.php" class="btn btn-primary"> posting</a></div>
            <br></br>
                <div class ="container">
                    <div class= "row">
                        <h3>Postingan</h3>
                    </div>
                    <!-- perulangan, value di table posting akan di tampilkan -->
                    <?php foreach ($post as $postingan): ?>
                    <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text" ><?=$prof['NAMA']?></p>
                                <p class="card-text"><small class="text-muted"><?=$postingan['CAPTION']?></small></p>
                            </div>
                        <img class="card-img-top" src="images/<?= $postingan["GAMBAR"]; ?>" alt="Card image cap">
                        <br>
                        <a href="deletepost.php?IDPOSTING=<?=$postingan['IDPOSTING']?>" type="button" >~hapus~</a>
                        <a href="editpost.php?IDPOSTING=<?=$postingan['IDPOSTING']?>" type="button" >~edit~</a>
                        <div class="card w-75">
                        <a href="komen.php">
                            komentar...
                        </a>
                            <!-- perulangan, value komentar -->
                            <?php foreach ($komen as $komentar): ?>
                                <div class="card-body">
                                    <?=$komentar['USERNAME']?>
                                    <p class="card-text"><?=$komentar['KOMEN']?></p>
                                    <a href="deletekomen.php?IDKOMENTAR=<?=$komentar['IDKOMENTAR']?>" onclick="return confirm('yakin ingin menghapus');"  type="button" class="btn btn-light">delete</a>
                                    <a href="editkomen.php?IDKOMENTAR=<?=$komentar['IDKOMENTAR']?>" type="button" class="btn btn-light">edit</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                
            </div>
        </div>
        <footer>
            <div class = "text-dark text-center">
                Copyright @2021 - Lathief Sentika Widjaja
            </div>
        </footer>

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