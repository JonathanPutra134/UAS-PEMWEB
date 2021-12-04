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
  <?php
  echo $header;

  ?>
  <div class="container">
  <h1 style="text-align: center;">FACILITIES DETAILS</h1>
  </div>


  <?php
  $count = 1;

  foreach ($details as $data) {

    $id = $data['id_facilities'];



  ?>
    <div class="container" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="card flex">
    <h5 class="card-title" style="text-align: center; margin-top: 5px;"><?php echo $data["Name"]; ?></h5>
      <img style="margin-left: 40%;" src="<?php echo base_url($data["Image"]) ?>" width="20%"  alt="...">
      <div class="card-body">
        <p class="card-text" style="text-align: justify; margin-top: 5px; padding-left: 10%; padding-right: 10%"><?php echo $data["Description"] ?></p>
      </div>
      <br>
      <a  style="width: 20%;"  href="<?php echo base_url("index.php/User/BookForm?id=$id") ?>" class="container btn btn-primary">Book Now!</a>
      <br>
      <a style="width: 20%;"  class=" container btn btn-danger" href="<?php echo base_url("index.php/User"); ?>">Back to Listing</a>
      <br>
    </div>
    
    </div>

  <?php
  }
  ?>






</body>

</html>