 <html>
 <head>

<?php echo link_tag('css/form.css'); ?>
 <title>Create Contact Form Using CodeIgniter</title>

<script>

function validate(){

    var alarmname = document.forms['alarmpara']['alarmname'].value;
    var threshold = document.forms['alarmpara']['threshold'].value;
    var description = document.forms['alarmpara']['description'].value;
    var statistic = document.forms['alarmpara']['statistic'].value;
    var comparison_operator = document.forms['alarmpara']['comparison_operator'].value;

//    alert(comparison_operator);


    if(isNaN(threshold)){
        alert("Threshold is not a number");
        return false;

    }
   if (statistic !== "count" && statistic !== "avg" && statistic !== "min" && statistic !== "max" && statistic !== "sum") {

        alert("This is not valid statistic ");
        return false;
   }
 if(comparison_operator !== "gt" && comparison_operator !== "lt" && comparison_operator !== "ge" && comparison_operator !== "eq" && comparison_operator !== "ne" && comparison_operator !== "le" ){
       alert('Comparision Operator is not valid');
             return false;
  }

   


}

</script>


</head>

<body>

<?php 
include('nav.php');
$options = array("name"=> "alarmpara","onsubmit"=>"return validate() ","class"=>"form");
echo form_open('pages/saveinput',$options); ?>
<?php echo heading(' Alarm input parameteres '); ?>
 <fieldset>

Alarm name:<br>
     <input type="text" name="alarmname" value="" required="" ><br>

Description:<br>
    <input type="text" name="description" value="" placeholder="ex: CPU high usage"><br>

 Existing meters : <br>
<select name="meter_name">


<?php foreach($meterlist as $meter) : ?> 

    <option value= "<?php echo $meter; ?> "  >   <?php echo $meter;  ?>  </option>

<?php endforeach; ?>

</select>   

<br>    Threshold:<br>
<input type="text" name="threshold" value="" required="ex : 20, 30 ,40"> <br>

Comparison-operator:<br>
<input type="text" name="comparison_operator" value="" required="" placeholder="ex:ge, gt, eq, ne, lt, le"><br>

Statistic:<br>
<input type="text" name="statistic" value=""  placeholder = "ex: count, avg, sum, min, max" ><br>


Resource id:<br>

<select name="resource_id">


<?php foreach($resourceid as $resource) :     ?>

<option value= "<?php echo $resource; ?> "  >   <?php echo $resource;  ?>  </option>

<?php endforeach; ?>

</select>   

<br><br>

    
<input type="submit" value="Submit" name="submit" >
</fieldset>

<?php echo form_close(); ?>

</body>

</html>
