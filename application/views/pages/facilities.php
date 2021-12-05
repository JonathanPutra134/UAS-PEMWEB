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
			background-image: url(https://www.teahub.io/photos/full/63-636781_wallpaper-leaves-branch-dark-green-glossy-plant-dark.jpg);
			background-size: contain;
		}
	</style>
  <title>Facilities</title>
</head>
<body>
	<?php echo $header; ?>

	<div class="container" data-aos="fade-down">
		<div class="d-grid d-md-flex justify-content-md-end">
			<a href="<?php echo base_url("index.php/Admin/AddFacilitiesPage");?>" class="btn btn-light mb-2"><i class="bi bi-plus-lg"></i> Add</a>
		</div>

		<table id="tblMovie" class="table table-striped table-bordered table-dark table-hover table-responsive" cellspacing="0" width="100%">
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
				foreach($facilities as $data) {
					$id = $data['id_facilities'];
					
					echo "<tr>";
						echo "<td>" .$count++."</td>";
				    echo "<td><img src=".base_url($data['Image'])." height='200px' width='200px' alt='image'></td>";
						echo "<td>" .$data['Name'] ."</td>";
        		
						//BUTTON DELETE & EDIT
						echo "<td>";
							echo "<a href='" . base_url("index.php/Admin/EditFacilities?id=$id") . "' class='btn btn-secondary me-1	'>Edit</a>";
							echo "<a href='" . base_url("index.php/Admin/DeleteFacilities?id=$id") . "' class='btn btn-danger'>Delete</a>";
						echo "</td>";
					echo "</tr>";
         
			}


?>
    </tbody>
			 </table>
			</div>
		
      

          
      
        
</body>
</html>