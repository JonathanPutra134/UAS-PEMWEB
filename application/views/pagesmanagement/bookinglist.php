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
      

       <table id="tblMovie" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
			
		
        	foreach($request as $data)
			{
				$base_url = base_url();
                
				$CI     = & get_instance();
                $id = $data["id_request"];
				$FacilityName = $CI->GetFacilitiesName($data['id_facilities']);
				$FacilityName = $FacilityName [0];
                $RequesterName = $CI->RequesterName($data['id_user']);
				$RequesterName = $RequesterName [0];
				$status = 0;
				echo "<tr>";
					echo "<td>" .$count++."</td>";
                      echo "<td>" . $RequesterName['Name']."</td>";
				    echo "<td>" . $FacilityName['Name']."</td>";
                    	echo "<td>" .$data['ReservationDate'] ."</td>";
                        	echo "<td>" .$data['StartTime'] ."</td>";
                            	echo "<td>" .$data['EndTime'] ."</td>";
                                
                   
			    	echo "<td>";
					if($data['status'] == 'Waiting for approval!'){
						echo "<a href='".base_url("index.php/Management/ApproveRequest?id=$id")."'
								style='margin-right:10px;color:rgb(255,215,0);'>";
							echo "<button class='btn btn-primary'>";
								echo "<span >Approve</span>";
							echo "</button>";
                        echo "<a href='".base_url("index.php/Management/RejectRequest?id=$id")."'
								style='margin-right:10px;color:rgb(255,215,0);'>";
							echo "<button class='btn btn-danger'>";
								echo "<span >Reject</span>";
							echo "</button>";
					
							
						echo "</a>";
					}else if($data['status'] == 'REJECTED!') {
						echo "Request telah direject";
					}else {
						echo "Request sudah diapprove!";
					}
					echo "</td>";
					
				echo "</tr>";
				
				//BUTTON DELETE & EDIT
				
				echo "</tr>";
         
			}


?>
    </tbody>
      
      

          
      
        
</body>
</html>