<!DOCTYPE html>
<html>
    <head>
        <?php
            echo $js;
            echo $css;
        ?>
        <title>UAS</title>
</head>
<body>
        <h1>Facility Booking</h1>
        <h3>Welcome to facility booking page</h3>

        <!-- nanti cara nampilin nama account yang lagi aktifnya begini jo -->
        <h3>Account yang sedang login sekarang : </h3>
        <?php

            if(isset($_SESSION['loggedInAccount'])) {
         
                echo "<h3>{$_SESSION['loggedInAccount']['Name']}</h3>";
            } else {
                echo "<h3>Tidak ada</h3>";
            }
        ?>
       
        <a class="btn btn-primary" href="<?php echo base_url("index.php/Home/Login");?>">Login</a>
        
        
     
        <a class="btn btn-primary" href="<?php echo base_url("index.php/Home/Register");?>">Register</a>
        <a class="btn btn-primary" href="<?php echo base_url("index.php/Home/logout");?>">Logout</a>
     
        
</body>
</html>