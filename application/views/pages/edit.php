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
            echo $header;
            $id = $_GET["id"];
            $user = $user[0];
        ?>
</head>
<body>
<div style="margin-top: 100px;" class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
  <div class="card">
    <div class="card-body">
    	<?php echo form_open_multipart("Admin/UpdateUser?id=$id"); ?>
            <h4><b>Edit data</b></h4>
        <div class="mb-3">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $user["Name"];?>">
            <?php echo "<font color='red'>";
		        echo form_error('Name'); 
		        echo "</font>"; ?>
       </div>
        <div class="mb-3">
          <label for="Email" class="form-label">Email</label>
          <input type="Email" class="form-control" id="Email" name="Email" value="<?php echo $user["Email"];?>">
             
       </div>
  

          <div class="form-group">
          <p><b>Current ProfilePicture : </b></p>
          <img class="mb-2" style="margin-bottom:10px;" src="<?= base_url("") . $user["ProfilePicture"] ?>" alt="ProfilePicture" width="200" height="200">
          <br>
          <label for="ProfilePicture">Change Poster</label>
          <input type="file" value="<?= $user['ProfilePicture'] ?>" class="form-control" name="ProfilePicture" id="ProfilePicture" placeholder="ProfilePicture">
        </div>
             <?php echo "<font color='red'>";
          if(isset($error)){
		      echo $error;
          }
		    
		      echo "</font>"; ?>
        </div>
     
        <div style="padding: 30px;"></div>
        <button type="submit" name="submit" class="btn btn-dark">Register</button>
    </div>
     
    
     
      </form>
     
      
        <a class="btn btn-danger" href="<?php echo base_url("index.php/Admin");?>">Back</a>
        
        

      
 </div>
</div>

</body>
</html>