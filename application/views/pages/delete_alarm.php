 <head>
 <body>


<?php echo link_tag('css/form.css'); ?>

<?php echo form_open('pages/deletealarm_script'); ?>

<fieldset>
    <legend><h2>Delete alarm </h2></legend>

Alarm names : <?php echo br(1); ?>



<?php 

$options = array_combine($alarm_id,$alarm_name);
echo form_dropdown("alarm_id",$options);


?>


<!--

<select name="alarm_id">
<?php $length = count($alarm_name); ?> 
<?php for ($i=0;$i<$length;$i++): ?>

<option value="<?php echo$alarm_id[$i] ;?>">   <?php echo $alarm_name[$i];?>   </option>

<?php endfor; ?>
</select>
-->


<?php echo form_submit("submit","Submit");  ?>

<!--

 <input type="submit" value="Submit" name="submit">


 -->
</fieldset>



<?php form_close();?>


 </body>
 </head>
