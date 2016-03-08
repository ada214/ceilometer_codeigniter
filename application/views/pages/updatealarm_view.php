<html>
<head>
<!--
<?php echo link_tag('css/form.css'); ?>

-->


<?php echo link_tag('css/alarm.css'); ?>
<?php echo link_tag('css/update.css');?>



<script>

function validate(){
    var threshold = document.forms['updatealarm']['threshold'].value;
    var comparison_operator = document.forms['updatealarm']['comparison_operator'].value;
//    alert( typeof comparison_operator);
 //   alert( typeof "gt");
    var statistic = document.forms['updatealarm']['statistic'].value;

    if(isNaN(threshold)){
            alert(" Threshold is not a number");
            return false;
    }
    
if(comparison_operator !== "gt" && comparison_operator !== "lt" && comparison_operator !== "ge" && comparison_operator !== "eq" && comparison_operator !== "ne" && comparison_operator !== "le" ){
      alert('Comparision Operator is not valid');
      return false;
    }
    if(statistic !== "count" &&  statistic !== "min" &&  statistic !== "max" &&  statistic !== "avg" && statistic !== "sum"){

      alert('Statistic is not valid value');
      return false;

    }
  //  return true;

}


</script>





</head>

<body>




<!--
<?php echo heading("Update alarm"); ?>
-->

<?php 
include('nav.php');
$form_attr = array("name"=>"updatealarm","onsubmit"=>"return validate()","class"=>"form");

echo form_open('pages/updatealarm_script',$form_attr); ?>
<fieldset>
<legend>  Update Alarm  </legend>
<?php 
$options = array_combine($alarm_id,$alarm_name);

?>

<?php 

echo form_label("Alarm ","alarm_id");
echo form_dropdown("alarm_id",$options); ?>


<?php 

$threshold = array("name"=>"threshold", "value"=>"", "required"=>"true","placeholder"=>"Ex : 20" );
echo form_label(" Threshold ","threshold");
echo form_input($threshold); 

?>

<?php
echo form_label("Comparision-Operator","comparison_operator");

$comparison = array("name"=>"comparison_operator", "value"=>"", "required"=>"true", "placeholder"=>" Ex: ge, gt, eq, ne, lt, le");

echo form_input($comparison);

?>

<?php 



$statistic = array("name"=>"statistic", "value"=>"", "placeholder"=> "ex: count, avg, sum, min, max" );
echo form_label("Statistic","statistic");
echo form_input($statistic);
echo br(2);

?>

<?php echo  form_submit("submit","Submit"); ?>
</fieldset>
<?php echo form_close(); ?>

</body>



</html>
