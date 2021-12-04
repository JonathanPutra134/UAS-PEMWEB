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
  <h1 class="text-white" style="text-align: center;">FACILITIES DETAILS</h1>
  </div>


  <?php
  $count = 1;

  foreach ($details as $data) {

    $id = $data['id_facilities'];



  ?>
    <div class="container">
    <div class=" card flex bg-secondary bg-gradient " style="--bs-bg-opacity: .7;">
    <h2 class="card-title text-white" style="text-align: center; margin-top: 5px;"><b><?php echo $data["Name"]; ?></b></h2>
      <img style="align-self: center;" src="<?php echo base_url($data["Image"]) ?>" width="40%"  alt="...">
      <div class="card-body">
        <p class="card-text text-white" style="text-align: justify; margin-top: 5px; padding-left: 10%; padding-right: 10%"><b><?php echo $data["Description"] ?></b></p>
      </div>
      <br>
      <a  style="width: 20%;"  href="<?php echo base_url("index.php/User/BookForm?id=$id") ?>" class="container btn btn-dark">Book Now!</a>
      <br>
      <a style="width: 20%;"  class="container btn btn-light" href="<?php echo base_url("index.php/User"); ?>">Back to Listing</a>
      <br>
    </div>
    
    </div>

  <?php
  }
  ?>






</body>

</html>