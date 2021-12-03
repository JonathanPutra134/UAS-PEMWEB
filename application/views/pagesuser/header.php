<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header" style="padding:0 5%">
        <?php
        $UserID = $_SESSION['loggedInAccount']['id_user']; 
    
        ?>
            <a class="navbar-brand" href="<?php echo base_url("index.php/User")?>">Facilities Booking</a>
       
            <a class="navbar-brand" href="<?php echo base_url("index.php/User")?>">Facilities</a>
            <a class="navbar-brand" href="<?php echo base_url("index.php/User/BookingList?UserID=$UserID")?>">Request</a>
        </div>
            <!-- UNTUK USERNAME PAS ADMIN UDAH LOGIN -->
           <p class='navbar-brand'><?php echo $_SESSION['loggedInAccount']['Name'];?></p>
            <!-- UNTUK PROFILE IMG -->
            <img src=<?php echo base_url($_SESSION['loggedInAccount']['ProfilePicture']);?> height="50px" width="50px" alt="image">
          
            <!-- TOMBOL SIGN OUT -->
            <ul class = "nav navbar-nav navbar-right" style="padding:0 5%">
            <li ><a class="btn btn-danger" href="<?php echo base_url("index.php/Home/logout") ?>">Sign Out</a></li>
            </ul>
</div>
</nav>