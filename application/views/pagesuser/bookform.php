<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <?php
            echo $js;
            echo $css;
        
            $UserID = $_SESSION['loggedInAccount']['id_user'];
            $details = $details[0];
            $FacilityID = $details['id_facilities'];
           
        ?>
</head>
<body>
<h1>Booking Form</h1>
<div style="margin-top: 100px;" class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
<div class="card">
    <div class="card-body">
    	<?php echo form_open_multipart("User/RequestBooking?id_user=$UserID&id_facilities=$FacilityID"); ?>
      
        <div class="mb-3">
          <label for="FacilityID" class="form-label">Facility ID</label>
          <input type="text" class="form-control" id="FacilityID" name="FacilityID" value="<?php echo $FacilityID;?>" disabled>
        
       </div>
         

        <div class="mb-3">
          <label for="ReservationDate" class="form-label">Reservation Date</label>
          <input type="Date" name="ReservationDate" class="form-control" id="ReservationDate" >
        </div>

        <div class="mb-3">
          <label for="StartTime" class="form-label">Start Time</label>
              <input type="Time" name="StartTime" class="form-control" id="StartTime" >
        </div>

         <div class="mb-3">
          <label for="EndTime" class="form-label">End Time</label>
              <input type="Time" name="EndTime" class="form-control" id="EndTime" >
        </div>
     
        <div style="padding: 30px;"></div>
        <button type="submit" name="submit" class="btn btn-dark">Book</button>
    </div>
     
    
     
      </form>
     
      
        <a class="btn btn-danger" href="<?php echo base_url("index.php/Management");?>">Back</a>
        
        

      
 </div>
</div>

</body>
</html>