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
      background-image: url(https://www.wallpapertip.com/wmimgs/190-1900175_beach-resort-wallpaper-iphone.jpg);
      background-size: cover;
      background-position-y: 30%;
    }
  </style>
  <title>Login to an Account</title>
</head>
<body>
<div class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
  <div class="card bg-light bg-opacity-75" style="width: 30rem;">
    <div class="card-body">
    	<?php echo form_open('Home/Login'); ?>
        <h4><b>Welcome back!</b></h4>
        <div class="mb-3">
          <label for="Email" class="form-label">E-mail</label>
          <input type="Email" class="form-control" id="Email" name="Email">
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="Password" name="Password" class="form-control" id="Password" >
        </div>
        <?php
          if(isset($_SESSION['gagalLogin'])) {
            echo "<p style='color:red;'>{$_SESSION['gagalLogin']}</p>";
            session_unset();
            session_destroy();
          }
        ?>
        <div class="d-grid gap-2">
          <button type="submit" name="submit" class="btn btn-dark btn-outline-light">Login</button>
          <a class="btn btn-secondary btn-outline-light" href="<?php echo base_url("index.php/Home");?>">Back</a>
        </div>
      </form>
    </div>
        
        

      
 </div>
</div>

</body>
</html>