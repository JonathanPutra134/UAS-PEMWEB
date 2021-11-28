<div style="margin-bottom:200px;" class="container">
<table id = "dataTable" class ="table table-striped table-bordered dataTable">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Salary</th>
      <th scope="col">No.Telpon</th>
       <th scope="col">Alamat</th>
      
    </tr>
  </thead>
  <tbody>
   <?php
    $nama = array(
      "Agung W.Chandranata" => array("Jabatan"=>"Trainer", "Salary" => "Rp. 2.100.000", "No Telpon" => "087883505580", "Alamat" =>"Newton Timur No.28"),
      "Ryan Pramana" => array("Jabatan"=>"Trainer", "Salary" => "Rp. 700.000", "No Telpon" => "087883606680", "Alamat" => "Newton Barat No.29"),
      "Johannes Immanuel" => array("Jabatan"=>"Trainer", "Salary" => "Rp. 1.400.000", "No Telpon" => "082883626682", "Alamat" => "Newton Utara No.12"),
      "Monica Devi Kristiadi" => array("Jabatan"=>"Trainer", "Salary" => "Rp. 2.800.000", "No Telpon" => "087443606640", "Alamat" => "Newton Selatan No.1"),
      "Wendy" => array("Jabatan"=>"Coordinator", "Salary" => "Rp. 5.700.000", "No Telpon" => "0812139927805", "Alamat" => "Newton Pusat No.14"),
    
    );
    $count = 1;
    foreach ($nama as $product => $attributes){
      echo "<tr>";
      
      echo "<td>" .$count++. "</td>";
      echo "<td> $product </td>";
      echo "<td>" . $nama [$product]["Jabatan"] . "</td>";
      echo "<td>" . $nama [$product]["Salary"] . "</td>";
      echo "<td>" . $nama [$product]["No Telpon"] . "</td>";
       echo "<td>" . $nama [$product]["Alamat"] . "</td>";
      
      echo "</tr>";
      

    } 
    
?>
  </tbody>
    <tfoot>
        <tr>
       <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Salary</th>
      <th scope="col">No.Telpon</th>
       <th scope="col">Alamat</th>
  </tr>



  </tfoot>
</table>


 <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
  </script>
    </div>