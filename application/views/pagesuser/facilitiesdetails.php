<!DOCTYPE html>
<html>

<head>
  <?php
  echo $js;
  echo $css;
  ?>
  <title>Facility Details</title>
  <style>
    body {
      background-image: url(https://images.wallpaperscraft.com/image/single/leaves_green_dark_145996_3840x2400.jpg);
      background-size: cover;
    }

    .col-6 {
      padding: 0 5px;
    }
  </style>
</head>

<body>
  <?php
    echo $header;
  ?>

  <?php
    $count = 1;

    foreach ($details as $data) {
      $StartTime=substr($data['StartTime'],0,-3);
      $EndTime=substr($data['EndTime'],0,-3);
      $id = $data['id_facilities'];
  ?>

    <div class="container d-flex justify-content-center" data-aos="zoom-in">
      <div class="card flex bg-dark p-3" style="width: 60%;">
        <h2 class="card-title text-white text-center"><b><?php echo $data["Name"]; ?></b></h2>
        <img src="<?php echo base_url($data["Image"]) ?>" class="card-img-top" width="40%"  alt="...">
        <div class="card-body">
          <p class="card-text text-white text-center"><?php echo $data["Description"] ?></p>
        </div>
        <p class="card-title text-white text-center" style="font-size: 1.5rem;"><b><?php echo "<i class='bi bi-alarm'></i>     "; 
          echo $StartTime;
          echo " - ";
          echo $EndTime; ?>
        </b></p>
        <div class="row">
          <div class="col-6">
            <a href="<?php echo base_url("index.php/User/BookForm?id=$id") ?>" class="btn btn-light" style="width: 100%;">Book Now!</a>
          </div>
          <div class="col-6">
            <a class="btn btn-secondary" style="width: 100%;" href="<?php echo base_url("index.php/User"); ?>">Back</a>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>
</body>

</html>