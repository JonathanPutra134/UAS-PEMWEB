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
    	<?php echo form_open_multipart('Home/AddData'); ?>
            <h4><b>Register</b></h4>
        <div class="mb-3">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="Name" name="Name">
          <?php echo "<font color='red'>";
		        echo form_error('Name'); 
		        echo "</font>"; ?>
       </div>
        <div class="mb-3">
          <label for="Email" class="form-label">Email</label>
          <input type="Email" class="form-control" id="Email" name="Email">
              <?php echo "<font color='red'>";
		        echo form_error('Email'); 
		        echo "</font>"; ?>
       </div>
         
        <div style="padding: 30px;"></div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="Password" name="Password" class="form-control" id="Password" >
        </div>

        <div class="mb-3">
          <label for="ProfilePicture" class="form-label">Profile Picture</label>
          <input type="File" name="ProfilePicture" class="form-control" id="ProfilePicture" >
        </div>
     
        <div style="padding: 30px;"></div>
        <button type="submit" name="submit" class="btn btn-dark">Register</button>
    </div>
     
    
     
      </form>
     
      
        <a class="btn btn-danger" href="<?php echo base_url("index.php/Home");?>">Back</a>
        
        

      
 </div>
</div>

</body>
</html>