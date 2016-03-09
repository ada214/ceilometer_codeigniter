<html>

<body>
<?php
echo link_tag("css/table.css"); ?>

<?php include 'nav.php' ?>

<?php
echo ' <table border="1" style="position: relative;
    top: 20px;z-index:-1"> <tr> 
<td> Meter name </td>
<td> Type </td>
<td> Unit </td>
<td> Resource Id </td>
</tr>';

$t=count($type);
$n =count($name);
$u = count($unit);

#echo "The ty length are :  ".$t.$n.$u;

#echo "********";


$length = count($unique_meter);
$len = count($unique_resource);
#echo "\n\n\n";
#echo "length is ".$length;
#echo "Second is ".$len;
#echo "\n\n\n";
#echo "\n\n\n";



#var_dump($unique_meter);
#var_dump($unique_resource);


for($i=0;$i<$length;$i++){
//if(isset($unique_meter[$i])){

echo "<tr>";
#echo "<td>". $meter_list[$i]." </td>";
echo "<td>". $name[$i]." </td>";
echo "<td>". $type[$i]." </td>";
echo "<td>". $unit[$i]." </td>";
echo "<td>". $resource_list[$i]." </td>";

#echo "<td>". $unique_resource[$i]." </td>";
echo "</tr>";
//}
}
echo "</table>";
echo br(2);

?>

</body>

</html>
