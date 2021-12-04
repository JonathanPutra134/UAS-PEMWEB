<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid" style="padding: 0 5%;">
    <?php
        $UserID = $_SESSION['loggedInAccount']['id_user']; 
    
        ?>
        <a class="navbar-brand" href="<?php echo base_url("index.php/User")?>"><b>Facilities Booking</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class=" nav-link <?php if ($this->uri->segment(2, NULL) == NULL || $this->uri->segment(2, NULL) == 'User') echo 'active'; ?>" href="<?php echo base_url("index.php/User"); ?>">Facilities </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2, NULL) == "BookingList") echo 'active'; ?>" href="<?php echo base_url("index.php/User/BookingList?UserID=$UserID")?>">Request</a>
                </li>
            </ul>
            
            <!-- UNTUK USERNAME PAS ADMIN UDAH LOGIN -->
            <div class="navbar-nav">
                <!-- UNTUK PROFILE IMG -->
                <img src=<?php echo base_url($_SESSION['loggedInAccount']['ProfilePicture']);?> class="me-2 " height="40px" width="40px" alt="image">
                <li class=" nav-item dropdown">
                    <a class=" nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['loggedInAccount']['Name'];?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- TOMBOL SIGN OUT -->
                        <li class="bg-secondary"><a class=" lamp text-center text-dark dropdown-item" href="<?php echo base_url("index.php/Home/logout") ?>">Log Out</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>