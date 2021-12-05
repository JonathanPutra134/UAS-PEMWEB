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
			background-size: cover;
		}
	</style>
  <title>Booking List</title>
</head>
<body>
	<?php echo $header; ?>

	<div class="container">
		<table id="tblMovie" class="table table-striped table-bordered table-dark table-hover table-responsive" cellspacing="0" width="100%" data-aos="fade-down">
	    <thead>
				<tr>
					<th> # </th>
					<th> Requester </th>
					<th> Requested Facility </th>
					<th> Date </th>
					<th> Start Time </th>
					<th> End Time </th>
					<th> Operation </th>
				</tr>
			</thead>
			<tbody>
    	<?php
				$count = 1;
				foreach($request as $data) {        
					$CI = & get_instance();
					$id = $data["id_request"];
					$FacilityName = $CI->GetFacilitiesName($data['id_facilities']);
					$FacilityName = $FacilityName [0];
					$RequesterName = $CI->RequesterName($data['id_user']);
					$RequesterName = $RequesterName [0];
					
					echo "<tr>";
						echo "<td>" . $count++ . "</td>";
						echo "<td>" . $RequesterName['Name'] . "</td>";
						echo "<td>" . $FacilityName['Name'] . "</td>";
						echo "<td>" . $data['ReservationDate'] . "</td>";
						echo "<td>" . $data['StartTime'] . "</td>";
						echo "<td>" . $data['EndTime'] . "</td>";
						// BUTTON DELETE 
						echo "<td>";
							echo "<a href='" . base_url("index.php/Admin/DeleteRequest?id=$id") . "' class='btn btn-danger'>Delete</a>";
						echo "</td>";
					echo "</tr>";         
				}
			?>
    	</tbody>
		</table>
	</div>  
</body>
</html>