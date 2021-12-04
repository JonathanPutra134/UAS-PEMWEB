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
  <div class="container">
    <h1 class="text-center text-light"><b>FACILITIES LIST</b></h1>
    <div style="margin-left:5%" class="row row-cols-1 row-cols-md-3 g-4">
      <?php

      $count = 1;
      foreach ($facilities as $data) {

        $id = $data['id_facilities'];



      ?>
        <div class="col">
          <div class="card box lamp  bg-dark bg-gradient" style="width: 20rem;">
            <img style="padding: 5px;" src="<?php echo base_url($data["Image"]) ?>" width="200px" height="200px" class="container" alt="...">
            <div class="card-body">
              <h5 class="card-title text-white-50" style="text-align: center;"><b><?php echo $data["Name"]; ?></b></h5>
              <a  href="<?php echo base_url("index.php/User/ShowDetails?id=$id") ?>" class="lamp container btn btn-secondary">See Details</a>
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