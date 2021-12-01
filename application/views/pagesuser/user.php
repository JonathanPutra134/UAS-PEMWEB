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
		<h1>FACILITIES LIST</h1>

     
    <?php
            $count = 1;
			
		   foreach($facilities as $data)
			{
				
                $id = $data['id_facilities'];
				
		

?>
  
  <div class="card" style="width: 18rem;">
  <img src="<?php echo base_url($data["Image"])?>" width="200" height="200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data["Name"];?></h5>
  
    <a href="<?php echo base_url("index.php/User/ShowDetails?id=$id")?>" class="btn btn-primary">See Details</a>
  </div>
</div>
<?php
			}
?>
    
 

          
      
        
</body>
</html>