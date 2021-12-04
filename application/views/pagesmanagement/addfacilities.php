<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    echo $js;
    echo $css;
    echo $header;
  ?>
  
  <style>
    body {
			background-image: url(https://wallpaperforu.com/wp-content/uploads/2021/07/Aesthetic-Black-Wallpaper382048x1152.jpg);
			background-size: cover;
		}
    .col-6 {
      padding: 0 5px;
    }
  </style>
  <title>Add Facilities</title>
</head>
<body>
  <div class="container d-flex justify-content-sm-center">
    <div class="card bg-dark text-light bg-opacity-75" style="width: 30rem;">
      <div class="card-body">
        <h4><b>Add Facilities</b></h4>
        
        <?php echo form_open_multipart('Management/AddFacilities'); ?> 
          <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name">
            <?php 
              echo "<font color='red'>";
              echo form_error('Name'); 
              echo "</font>"; 
            ?>
          </div>
          <div class="mb-3">
            <label for="Image" class="form-label">Image</label>
            <input type="File" name="Image" class="form-control" id="Image" >
            <?php
              if(isset($error)){ 
                echo "<font color='red'>";
                echo $error;
              }
              echo "</font>"; 
            ?>
          </div>
          <div class="mb-3">
            <label for="Image" class="form-label">Description</label>
            <textarea rows="5" name="Description" class="form-control" id="Description"></textarea>
            <?php 
              echo "<font color='red'>";
              echo form_error('Description'); 
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
              <button type="submit" name="submit" class="btn btn-dark" style="width: 100%;">Add</button>
            </div>
            <div class="col-6">
              <a class="btn btn-secondary" style="width: 100%;" href="<?php echo base_url("index.php/Management");?>">Back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>