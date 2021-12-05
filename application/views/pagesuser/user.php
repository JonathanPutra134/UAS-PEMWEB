<!DOCTYPE html>
<html>

<head>
  <?php
  echo $js;
  echo $css;
  ?>
  <title>Facility List</title>

  <style>
    body {
      background-image: url(https://images.wallpaperscraft.com/image/single/leaves_green_dark_145996_3840x2400.jpg);
      background-size: auto;
    }
  </style>
</head>

<body>
  <?php
    echo $header;
  ?>
  <div class="container">
    <h1 class="text-center text-light"><b>FACILITIES LIST</b></h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      $count = 1;
      foreach ($facilities as $data) {
        $StartTime=substr($data['StartTime'],0,-3);
        $EndTime=substr($data['EndTime'],0,-3);
        $id = $data['id_facilities'];
      ?>
        <div class="col" data-aos="zoom-in">
          <div class="card box lamp bg-dark">
            <img src="<?php echo base_url($data["Image"]) ?>" width="200px" height="200px" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-title text-white text-center"><b><?php echo $data["Name"]; ?></b></h4>
              <p class="card-title text-white text-center"><?php echo "<i class='bi bi-alarm'></i>     "; 
                echo $StartTime;
                echo " - ";
                echo $EndTime; ?>
              </p>
              <a href="<?php echo base_url("index.php/User/ShowDetails?id=$id") ?>" class=" container btn btn-secondary">See Details</a>
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