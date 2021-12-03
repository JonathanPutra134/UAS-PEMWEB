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
            $id = $_GET["id"];
         
              echo $header;
           $details = $details[0];
        
        
        ?>
</head>
<body>
<div style="margin-top: 100px;" class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
  <div class="card">
    <div class="card-body">

    	<?php echo form_open_multipart("Admin/UpdateFacilities?id=$id"); ?>
        <h4><b>Edit Facilities</b></h4>

          <div class="mb-3">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $details['Name'];?>">
          <?php echo "<font color='red'>";
		        echo form_error('Name'); 
		        echo "</font>"; ?>
          </div>
         

          <div class="form-group">
          <p><b>Current Image : </b></p>
          <img class="mb-2" style="margin-bottom:10px;" src="<?= base_url("") . $details["Image"] ?>" alt="Image" width="200" height="200">
          <br>
          <label for="poster">Change Poster</label>
          <input type="file" value="<?= $details['Image'] ?>" class="form-control" name="Image" id="Image" placeholder="Image">
        </div>
             <?php echo "<font color='red'>";
          if(isset($error)){
		      echo $error;
          }
		    
		      echo "</font>"; ?>
        </div>

        </div>

        <div class="mb-3">
          <label for="Image" class="form-label">Description</label>
          <textarea cols="50" rows="5" name="Description" class="form-control" id="Description" >
          <?php echo $details['Description'];?></textarea>
        </div>
     
   
     
        <div style="padding: 30px;"></div>
        <button type="submit" name="submit" class="btn btn-dark">Edit</button>
        </div>
     
      </form>
     
      
        <a class="btn btn-danger" href="<?php echo base_url("index.php/Admin");?>">Back</a>
     
      
    
        
        
<?php
           
?>
      
 </div>
</div>

</body>
</html>