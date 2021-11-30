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
       <?php echo $header ?>
       <table id="tblMovie" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
        	foreach($user as $data)
			{
				$base_url = base_url();
                
				echo "<tr>";
					echo "<td>" .$count++."</td>";
					echo "<td>" .$data['Name'] ."</td>";
					echo "<td>" .$data['Email'] ."</td>";
                    echo "<td>" .$data['Role'] ."</td>";
			
				
			
					echo "<td>";
						echo "<a href='".base_url("index.php/Home/Delete?id=$id")."'
								style='margin-right:10px;color:rgb(255,215,0);'>";
							echo "<button class='btn btn-danger'>";
								echo "<span >X</span>";
							echo "</button>";
						echo "</a>";
					echo "</td>";
				echo "</tr>";
         
			}


?>
    </tbody>
      
      

          
      
        
</body>
</html>