<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    echo $js;
    echo $css;
  ?>

  <style>
    body {
      background-image: url(https://wallpaperaccess.com/full/658353.jpg);
      background-size: cover;
    }
  </style>
  <title>Register an Account</title>
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
  <div class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
    <div class="card bg-light bg-opacity-75" style="width: 30rem;">
      <div class="card-body">
        <?php echo form_open_multipart('Home/AddData'); ?>
          <h4><b>Register</b></h4>
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
            <label for="Email" class="form-label">Email</label>
            <input type="Email" class="form-control" id="Email" name="Email">
            <?php
              echo "<font color='red'>";
              echo form_error('Email'); 
              echo "</font>"; 
            ?>
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="Password" name="Password" class="form-control" id="Password" >
               <?php
              echo "<font color='red'>";
              echo form_error('Password'); 
              echo "</font>"; 
            ?>
            
          </div>
          <div class="mb-3">
            <label for="ProfilePicture" class="form-label">Profile Picture</label>
            <input type="File" name="ProfilePicture" class="form-control" id="ProfilePicture" >
             <?php echo "<font color='red'>";
          if(isset($error)){
		      echo $error;
          }
		    
		      echo "</font>"; ?>
          </div>
          <div class="g-recaptcha" data-sitekey="6Le0yHUdAAAAAPrVbaowd2OVHPNLQzIshKa4ynYM" style="margin-bottom:10px;"></div>
          <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-dark btn-outline-light">Register</button>
            <a class="btn btn-secondary btn-outline-light" href="<?php echo base_url("index.php/Home");?>">Back</a>
          </div>
        </form>
      </div> 
    </div>
  </div>
</body>
</html>