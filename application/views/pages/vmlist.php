<html>
<head>


<div class="vmlist">


<?php
echo link_tag("css/table.css");
include('nav.php');

 #$v_vm_name  = $this->table->make_columns($vm_name,0);
 #$v_zone = $this->table->make_columns($zone,0);

echo ' <table border="1"> <tr> <td> Vm Name </td> 
<td> Zone </td> 
<td> IP Address  </td> 
<td> Status </td>
<td> Region </td>
</tr>';






 $temp = array($vm_name,$zone);
 $length = count($vm_name);



for($i=0;$i<$length;$i++){
echo "<tr>";
echo "<td>". $vm_name[$i]." </td>";
echo "<td>". $zone[$i]." </td>";
echo "<td>". $ipaddress[$i]." </td>";
echo "<td>". $status[$i]." </td>";
echo "<td>". $region[$i]." </td>";
echo "</tr>";



}



echo "</table>";

 #print_r($vm_name);
# $this->load->library('table');

# echo  $this->table->generate($temp);

#echo "this  is ".$vm_name[0];


#echo $this->table->generate($vm_name);


 #echo "Size of vmlisy is ".count($vm_name);

 #echo "Data type of array is".gettype($vm_name);
 #echo "Yhe\n\n";

 #echo "\n\n";

 echo br(2);

 ?>
</div>
</body>


<html>
