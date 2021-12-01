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
        ?>
</head>
<body>
<h1>Booking Form</h1>
<div style="margin-top: 100px;" class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
<div class="card">
    <div class="card-body">
    	<?php echo form_open_multipart('Admin/AddFacilities'); ?>
      
        <div class="mb-3">
          <label for="Name" class="form-label">Facility ID</label>
          <input type="text" class="form-control" id="Name" name="Name">
        
       </div>
         

        <div class="mb-3">
          <label for="Image" class="form-label">Reservation Date</label>
          <input type="Date" name="Image" class="form-control" id="Image" >
        </div>

        <div class="mb-3">
          <label for="Image" class="form-label">Start Time</label>
          <textarea cols="50" rows="5" name="Description" class="form-control" id="Description" ></textarea>
        </div>

         <div class="mb-3">
          <label for="Image" class="form-label">End Time</label>
          <textarea cols="50" rows="5" name="Description" class="form-control" id="Description" ></textarea>
        </div>
     
        <div style="padding: 30px;"></div>
        <button type="submit" name="submit" class="btn btn-dark">Add</button>
    </div>
     
    
     
      </form>
     
      
        <a class="btn btn-danger" href="<?php echo base_url("index.php/Management");?>">Back</a>
        
        

      
 </div>
</div>

</body>
</html>