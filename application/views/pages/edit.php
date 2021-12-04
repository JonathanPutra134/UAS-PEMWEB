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
    $id = $_GET["id"];
    $user = $user[0];
  ?>

  <style>
    body {
			background-image: url(https://wallpaperforu.com/wp-content/uploads/2021/07/Aesthetic-Black-Wallpaper382048x1152.jpg);
			background-size: cover;
      background-position-y: 30%;
		}
    .col-6 {
      padding: 0 5px;
    }
  </style>
  <title>Edit User</title>
</head>
<body>
<div class="container d-flex justify-content-sm-center">
  <div class="card bg-dark text-light bg-opacity-75" style="width: 30rem;">
    <div class="card-body">
    	<?php echo form_open_multipart("Admin/UpdateUser?id=$id"); ?>
        <h4><b>Edit data</b></h4>
        <div class="mb-3">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $user["Name"];?>">
          <?php 
            echo "<font color='red'>";
            echo form_error('Name');
            echo "</font>";
          ?>
        </div>
        <div class="mb-3">
          <label for="Email" class="form-label">Email</label>
          <input type="Email" class="form-control" id="Email" name="Email" value="<?php echo $user["Email"];?>">
        </div>
        <div class="mb-3">
          <label for="ProfilePicture" class="form-label">Current Profile Picture:</label><br>
          <img src="<?= base_url("") . $user["ProfilePicture"] ?>" alt="ProfilePicture" width="200" height="200">
        </div>
        <div class="mb-3">
          <label for="ProfilePicture">Change Poster</label>
          <input type="file" value="<?= $user['ProfilePicture'] ?>" class="form-control" name="ProfilePicture" id="ProfilePicture" placeholder="ProfilePicture">
          <?php 
            echo "<font color='red'>";
            if(isset($error)){
              echo $error;
            }
            echo "</font>"; 
          ?>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="submit" name="submit" class="btn btn-dark" style="width: 100%;">Register</button>
          </div>
          <div class="col-6">
            <a class="btn btn-secondary" style="width: 100%;" href="<?php echo base_url("index.php/Admin");?>">Back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>