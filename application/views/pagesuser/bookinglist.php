<!DOCTYPE html>
<html>

<head>
	<?php
	echo $js;
	echo $css;
	?>
	<title>UAS</title>
	<style>
		body {
			background-image: url(https://www.darkfield.london/wp-content/uploads/header-background-hotel-savoy-dark.jpg);
			background-size: cover;
			background-position-y: 30%;
		}
	</style>
</head>

<body>
	<?php
	echo $header;

	?>

	<h2 class="text-center text-white"><b>Here your request</b></h2>
	<div class="container">
		<table id="tblMovie" class="box table table-striped table-bordered table-dark table-hover table-responsive" cellspacing="0" width="100%">
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
					if($data['status'] == 'approved!'){ ?>
						<td style="color:green;">Approved !</td>
					<?php
					}else if($data['status'] == 'REJECTED!'){ ?>
						<td style="color:red;">Rejected !</td>
					<?php
					}else{ ?>
						<td style="color:white;">Waiting for Approval</td>
					<?php
					}
					



					//BUTTON DELETE & EDIT

					echo "</tr>";
				}


				?>
			</tbody>
	</div>
</body>

</html>