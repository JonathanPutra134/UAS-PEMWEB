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
       <a  href="<?php echo base_url("index.php/Management/AddFacilitiesPage");?>" class="btn btn-primary">Add</a>


       <table id="tblMovie" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    <thead>
		<tr>

			<th> # </th>
			<th> Image </th>
			<th> Name </th>
			<th> Operation </th>
		
		</tr>
	</thead>
	<tbody>
    <?php
            $count = 1;
			
		
        	foreach($facilities as $data)
			{
				$base_url = base_url();
                $id = $data['id_facilities'];
				echo "<tr>";
					echo "<td>" .$count++."</td>";
				    echo "<td><img src=".base_url($data['Image'])." height='200px' width='200px' alt='image'></td>";
					echo "<td>" .$data['Name'] ."</td>";
                   
			
				
				//BUTTON DELETE & EDIT
					echo "<td>";
						echo "<a href='".base_url("index.php/Management/DeleteFacilities?id=$id")."'
								style='margin-right:10px;color:rgb(255,215,0);'>";
							echo "<button class='btn btn-danger'>";
								echo "<span >Delete</span>";
							echo "</button>";
							echo "<a href='".base_url("index.php/Management/EditFacilities?id=$id")."'
								style='margin-right:10px;color:rgb(255,215,0);'>";
							echo "<button class='btn btn-primary'>";
								echo "<span >Edit</span>";
							echo "</button>";
							
						echo "</a>";
					echo "</td>";
				echo "</tr>";
         
			}


?>
    </tbody>
      
      

          
      
        
</body>
</html>