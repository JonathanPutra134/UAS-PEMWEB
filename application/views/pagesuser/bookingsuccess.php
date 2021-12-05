<!DOCTYPE html>
<html>

<head>
    <?php
    echo $js;
    echo $css;
    ?>
    <title>Booking Success</title>
    <style>
        body {
            background-image: url(https://images.wallpaperscraft.com/image/single/leaves_green_dark_145996_3840x2400.jpg);
            background-size: cover;
        }
    </style>
</head>

<body>
    <?php
    echo $header;
    ?>
    
    <div class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
        <div class="card box bg-light bg-opacity-75" style="padding: 0 2%;">
            <div class="card-body">
                <h1 class="text-center">
                    <b>Fasilitas berhasil di booking!<br>
                    Silahkan cek detailnya di bagian request!</b><br>
                    <a class="btn btn-light btn-outline-dark" href="<?php echo base_url("index.php/User"); ?>">Back to Home</a>
                </h1>
            </div>
        </div>
    </div>
</body>
</html>