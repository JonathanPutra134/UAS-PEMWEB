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
<div style="margin-top: 100px;" class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
  <div class="card">
    <div class="card-body">
    	<?php echo form_open('Home/Login'); ?>
            <h4><b>Welcome back!</b></h4>
        <div class="mb-3">
          <label for="Email" class="form-label">Email</label>
          <input type="Email" class="form-control" id="Email" name="Email">
       </div>
         
        <div style="padding: 30px;"></div>
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
     
        <div style="padding: 30px;"></div>
        <button type="submit" name="submit" class="btn btn-dark">Login</button>
    </div>
     
    
     
    
      </form>
     
      
        <a class="btn btn-danger" href="<?php echo base_url("index.php/Home");?>">Back</a>
        
        

      
 </div>
</div>

</body>
</html>