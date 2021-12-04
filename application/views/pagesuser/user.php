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
      background-image: url(https://www.wallpapertip.com/wmimgs/190-1900175_beach-resort-wallpaper-iphone.jpg);
      background-size: cover;
      background-position-y: 30%;
    }
  </style>
  </head>

  <body>
    <?php
    echo $header;

    ?>
    <div class="container">
      <h1 class="text-center"><b>FACILITIES LIST</b></h1>
      <div style="margin-left:5%" class="row row-cols-1 row-cols-md-3 g-4">
        <?php

        $count = 1;
        foreach ($facilities as $data) {

          $id = $data['id_facilities'];



        ?>
          <div class="col">
            <div class="card" style="width: 20rem;">
              <img style="padding: 5px;" src="<?php echo base_url($data["Image"]) ?>" width="200px" height="200px" class="container" alt="...">
              <div class="card-body">
                <h5 class="card-title" style="text-align: center;"><b><?php echo $data["Name"]; ?></b></h5>
                <a href="<?php echo base_url("index.php/User/ShowDetails?id=$id") ?>" class="container btn btn-primary">See Details</a>
              </div>
            </div>
          </div>


        <?php
        }
        ?>
      </div>
    </div>




  </body>

  </html>