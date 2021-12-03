<!DOCTYPE html>
<html>
<head>
    <?php
        echo $js;
        echo $css;
    ?>

    <style>
        body {
            background-image: url(https://www.wallpaperup.com/uploads/wallpapers/2014/01/13/225694/46fb357ff87f9c078427f55828619f82.jpg);
            background-size: cover;
        }
    </style>
    <title>Facility Booking Website</title>
</head>
<body>
    <div class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
        <div class="card bg-light text-center pt-4 pb-4 ps-4 pe-4 bg-opacity-75">
            <div class="card-body">
                <h1 class="card-title"><b>Facility Booking</b></h1>
                <h4 class="card-title mb-5">Welcome to facility booking page</h4>

                <!-- nanti cara nampilin nama account yang lagi aktifnya begini jo -->
                <p class="card-text">Account yang sedang login sekarang :<br><b><i>
                    <?php
                        if(isset($_SESSION['loggedInAccount'])) {
                            echo "{$_SESSION['loggedInAccount']['Name']}";
                        } else {
                            echo "Tidak Ada";
                        }
                    ?>
                </i></b></p>
            
                <?php
                    if(isset($_SESSION['loggedInAccount'])) {
                ?>
                        <a class="btn btn-light btn-outline-danger" href="<?php echo base_url("index.php/Home/Logout");?>">Logout</a>
                          <a class="btn btn-light btn-outline-danger" href="<?php echo base_url("index.php/Home/Login");?>">Login</a>
                <?php 
                    } else {
                        ?>
                    <div class="btn-group" role="group">
                        <a class="btn btn-light <?php echo (isset($_SESSION['loggedInAccount'])) ? 'btn-outline-danger' : 'btn-outline-dark'; ?>" href="<?php echo base_url("index.php/Home/Logout");?>"><?php echo (isset($_SESSION['loggedInAccount'])) ? 'Logout' : 'Login'; ?></a>
                        <a class="btn btn-light btn-outline-dark" href="<?php echo base_url("index.php/Home/Register");?>">Register</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>