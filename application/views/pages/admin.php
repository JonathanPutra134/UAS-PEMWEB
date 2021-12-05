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
  <title>Users</title>
</head>
<body>
	<?php echo $header ?>

	<div class="container">
		<table id="tblMovie" class="table table-striped table-bordered table-dark table-hover table-responsive" cellspacing="0" width="100%" data-aos="fade-down">
			<thead>
				<tr>
					<th> # </th>
					<th> Name </th>
					<th> Email </th>
					<th> Role </th>
					<th> Operation </th>
				</tr>
			</thead>
			<tbody>
			<?php
				$count = 1;

				foreach($user as $data) {
					$id = $data['id_user'];
					echo "<tr>";
						echo "<td>" . $count++ ."</td>";
						echo "<td>" . $data['Name'] ."</td>";
						echo "<td>" . $data['Email'] ."</td>";
						echo "<td>" . $data['Role'] ."</td>";			
					
					//BUTTON DELETE & EDIT
						echo "<td>";
							echo "<a href='" . base_url("index.php/Admin/Edit?id=$id") . "' class='btn btn-secondary me-1'>Edit</a>";
							echo "<a href='" . base_url("index.php/Admin/Delete?id=$id") . "' class='btn btn-danger'>Delete</a>";
						echo "</td>";
					echo "</tr>";  
				}
			?>
			</tbody>
		</table>
	</div>
</body>
</html>