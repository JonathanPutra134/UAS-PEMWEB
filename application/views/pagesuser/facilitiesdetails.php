<!DOCTYPE html>
<html>
    <head>
        <?php
            echo $js;
            echo $css;
        ?>
        <title>UAS</title>
</head>
<body>
       <?php 
       echo $header; 	
	  
       ?>
      
		<h1>FACILITIES DETAILS</h1>

     
    <?php
            $count = 1;
			
		   foreach($details as $data)
			{
				
                $id = $data['id_facilities'];
				
		

?>
 
  <div class="card flex" style="width: 18rem;">
  <img src="<?php echo base_url($data["Image"])?>" width="200" height="200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data["Name"];?></h5>
    <p class="card-text"><?php echo $data["Description"]?></p>
    <a href="<?php echo base_url("index.php/User/BookForm")?>" class="btn btn-primary">Book Now!</a>
  </div>
</div>
   <a class="btn btn-danger" href="<?php echo base_url("index.php/User");?>">Back to Listing</a>
<?php
			}
?>
    
 

          
      
        
</body>
</html>