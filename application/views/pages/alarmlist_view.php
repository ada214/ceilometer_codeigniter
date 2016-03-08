<html>

<title>
</title>
<body>

<?php
echo link_tag("css/table.css");
include('nav.php');
echo ' <table border="1"> <tr> <td> Alarm Name </td>
<td> Alarm description  </td>
<td> Alarm Id </td>
<td> Alarm State </td>
<td> Meter Name </td>
</tr>';

$length = count($alarm_name);

for($i=0;$i<$length;$i++){
echo "<tr>";
echo "<td>". $alarm_name[$i]." </td>";
echo "<td>". $alarm_desc[$i]." </td>";
echo "<td>". $alarm_id[$i]." </td>";
echo "<td>". $alarm_state[$i]." </td>";
echo "<td>". $alarm_meter_name[$i]." </td>";
echo "</tr>";
}


echo "</table>";
echo br(2);

?>




</body>

</html>
