<!DOCTYPE html>
<html>

<head>
	<?php
	echo $js;
	echo $css;
	?>
	<title>Request List</title>
	<style>
		body {
			background-image: url(https://images.wallpaperscraft.com/image/single/leaves_green_dark_145996_3840x2400.jpg);
			background-size: cover;
		}
	</style>
</head>

<body>
	<?php
	echo $header;

	?>
	<div class="container">
	<h2 class="text-center text-white"><b>Request List</b></h2>
		<table id="tblMovie" class="box table table-striped table-bordered table-dark table-hover table-responsive" cellspacing="0" width="100%" data-aos="fade-down">
			<thead>
				<tr>
					<th> # </th>
					<th> Requested Facility </th>
					<th> Date </th>
					<th> Start Time </th>
					<th> End Time </th>
					<th> Approve Status </th>

				</tr>
			</thead>
			<tbody>
				<?php
				$count = 1;

				foreach ($request as $data) {
					$base_url = base_url();
					$CI     = &get_instance();
					$FacilityName = $CI->GetFacilitiesName($data['id_facilities']);
					$FacilityName = $FacilityName[0];

					echo "<tr>";
						echo "<td>" . $count++ . "</td>";
						echo "<td>" . $FacilityName['Name'] . "</td>";
						echo "<td>" . $data['ReservationDate'] . "</td>";
						echo "<td>" . $data['StartTime'] . "</td>";
						echo "<td>" . $data['EndTime'] . "</td>";
						if($data['status'] == 'approved!'){ 
							echo "<td style='color: lightgreen;'>Approved!</td>";
						} else if($data['status'] == 'REJECTED!'){
							echo "<td style='color: red;'>Rejected!</td>";
						} else {
							echo "<td>Waiting for approval</td>";
						}
					echo "</tr>";
				}
				?>
			</tbody>
	</div>
</body>

</html>