<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>Facilities Booking</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url("index.php/Admin"); ?>">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled">Disabled</a>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url("index.php/Admin/Facilities"); ?>"><b>Facilities Booking</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php if ($this->uri->segment(3, NULL) == NULL || $this->uri->segment(3, NULL) == 'Admin') echo 'active'; ?>">
                    <a class="navbar-brand " href="<?php echo base_url("index.php/Admin"); ?>">Users</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="<?php echo base_url("index.php/Admin/Facilities"); ?>">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="<?php echo base_url("index.php/Admin/BookingList"); ?>">Request</a>
                </li>
            </ul>
        </div>
        
            <!-- UNTUK USERNAME PAS ADMIN UDAH LOGIN -->
           <p class='navbar-brand'><?php echo $_SESSION['loggedInAccount']['Name'];?></p>
            <!-- UNTUK PROFILE IMG -->
            <img src=<?php echo base_url($_SESSION['loggedInAccount']['ProfilePicture']);?> height="50px" width="50px" alt="image">
          
            <!-- TOMBOL SIGN OUT -->
            <ul class = "nav navbar-nav navbar-right" style="padding:0 5%">
            <li><a class="btn btn-danger" href="<?php echo base_url("index.php/Home/logout") ?>">Sign Out</a></li>
            </ul>
</div>
</nav>