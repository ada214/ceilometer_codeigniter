<html>
<head>
<?php echo link_tag('css/home.css'); ?>

</head>
<div style="position:fixed;
overflow:scroll;
margin-top:27px;">


<ul>
<li><a class="active" href="<?php echo site_url("pages/index") ?>          ">Home</a></li>
<li><a href=" <?php  echo site_url("pages/view")   ?>                ">Vm List</a></li>
<li><a href=" <?php  echo site_url("pages/meterlist")   ?>                       ">Meter List</a></li>
<li><a href=" <?php  echo site_url("pages/alarmlist")  ?>">Show Alarms</a></li>
<li><a href="   <?php  echo site_url("pages/createalarm")  ?>" >Create Alarm</a></li>
<li><a href="   <?php  echo site_url("pages/deletealarm")  ?>">Delete Alarm</a></li>
<li><a href="<?php echo site_url("pages/updatealarm") ?>   ">Update Alarm</a></li>
</ul>

</div>

</html>
