<!DOCTYPE html>
<html>

<head>
    <?php
    echo $js;
    echo $css;
    ?>
    <title>UAS</title>
    <style>
        body {
            background-image: url(https://www.darkfield.london/wp-content/uploads/header-background-hotel-savoy-dark.jpg);
            background-size: cover;
            background-position-y: 30%;
        }
    </style>
</head>

<body>
    <?php
    echo $header;

    ?>
    
    <div class="container align-center justify-content-center mt-5 align-middle" style="padding-top: 200px;">
        <h1 class="text-center text-white"><b>Fasilitas berhasil di booking!<br>
                Silahkan cek detailnya di bagian request!</br>
    </div>
    <div class="container" style="width: 200px;">
        <a class="justify-content-center d-flex btn btn-secondary" href="<?php echo base_url("index.php/User"); ?>">Back to Home</a>
    </div>









</body>

</html>