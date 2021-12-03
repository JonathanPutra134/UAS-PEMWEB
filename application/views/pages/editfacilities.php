<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
      echo $js;
      echo $css;
      $id = $_GET["id"];
      
      echo $header;
      $details = $details[0];
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
  <title>Document</title>
</head>
<body>
<div class="container d-flex justify-content-sm-center">
  <div class="card bg-dark text-light bg-opacity-75" style="width: 30rem;">
    <div class="card-body">
    	<?php echo form_open_multipart("Admin/UpdateFacilities?id=$id"); ?>
        <h4><b>Edit Facilities</b></h4>
        <div class="mb-3">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $details['Name'];?>">
          <?php 
            echo "<font color='red'>";
		        echo form_error('Name'); 
		        echo "</font>"; 
          ?>
        </div>
        <div class="mb-3">
          <label for="ProfilePicture" class="form-label">Current Image:</label><br>
          <img class="mb-2" style="margin-bottom:10px;" src="<?= base_url("") . $details["Image"] ?>" alt="Image" width="200" height="200">
        </div>
        <div class="mb-3">
          <label for="poster">Change Poster</label>
          <input type="file" value="<?= $details['Image'] ?>" class="form-control" name="Image" id="Image" placeholder="Image">
          <?php 
            echo "<font color='red'>";
            if(isset($error)){
		          echo $error;
            }
		        echo "</font>";
          ?>
        </div>
        <div class="mb-3">
          <label for="Image" class="form-label">Description</label>
          <textarea rows="5" name="Description" class="form-control" id="Description" >
          <?php echo $details['Description']; ?></textarea>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="submit" name="submit" class="btn btn-dark" style="width: 100%;">Confirm</button>
          </div>
          <div class="col-6">
            <a class="btn btn-secondary" style="width: 100%;" href="<?php echo base_url("index.php/Admin/Facilities");?>">Back</a>
          </div>
      </form>
    </div>
     
     
      
    </div>

        </div>
 </div>
</div>

</body>
</html>