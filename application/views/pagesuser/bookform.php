<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a Facility</title>
  <?php
  echo $js;
  echo $css;

  $UserID = $_SESSION['loggedInAccount']['id_user'];
  $details = $details[0];
  $FacilityID = $details['id_facilities'];

  ?>
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
  <div class="container" data-aos="zoom-in">
    <h1 class="text-center text-white"><b>Facility Booking Form</b></h1>
    <div class="card bg-dark text-white bg-opacity-75" style="width: 36rem; margin: auto;">
      <div class="card-body">
      <img style="width: 100%;" src="<?php echo base_url($details["Image"]) ?>" class="card-img-top">
      <h5 class="card-title text-center m-2"><b><?php echo $details["Name"]; ?></b></h5>
      <?php echo form_open_multipart("User/RequestBooking?id_user=$UserID&id_facilities=$FacilityID"); ?>
        <div class="mb-3">
          <label for="FacilityID" class="form-label">Facility ID</label>
          <input type="text" class="form-control" id="FacilityID" name="FacilityID" value="<?php echo $FacilityID; ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="ReservationDate" class="form-label">Reservation Date</label>
          <input type="Date" name="ReservationDate" class="form-control" id="ReservationDate">
          <?php
          echo "<font color='red'>";
          echo form_error('ReservationDate');
          echo "</font>";
          ?>
        </div>
        <div class="mb-3">
          <label for="StartTime" class="form-label">Start Time</label>
          <input type="Time" name="StartTime" class="form-control" id="StartTime">
          <?php
          echo "<font color='red'>";
          echo form_error('StartTime');
          echo "</font>";
          ?>
        </div>
        <div class="mb-3">
          <label for="EndTime" class="form-label">End Time</label>
          <input type="Time" name="EndTime" class="form-control" id="EndTime">
          <?php
          echo "<font color='red'>";
          echo form_error('EndTime');
          echo "</font>";
          ?>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="submit" name="submit" class="btn btn-dark" style="width: 100%;">Book</button>
          </div>
          <div class="col-6">
            <a class="btn btn-secondary" style="width: 100%;" href="<?php echo base_url("index.php/User/ShowDetails?id=$FacilityID"); ?>">Back</a>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</body>
</html>