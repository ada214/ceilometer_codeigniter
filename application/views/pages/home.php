<html>
<head>

<?php echo link_tag('css/home.css'); ?>
<?php echo link_tag('css/header.css'); ?>

<!--

<?php echo heading("Ceilometer apis based alarm creation, updation and deletion",2)  ?>

-->

</head>


<body>


<header>
<h1> Ceilometer apis based alarm creation, updation and deletion </h1>
</header>


<ul>
<li><a class="active" href="#home">Home</a></li>
<li><a href=" <?php  echo site_url("pages/view")   ?>                       ">Vm List</a></li>
<li><a href=" <?php  echo site_url("pages/meterlist")   ?>                       ">Meter List</a></li>
<li><a href=" <?php  echo site_url("pages/alarmlist")  ?>">Show Alarms</a></li>
<li><a href="   <?php  echo site_url("pages/createalarm")  ?>" >Create Alarm</a></li>
<li><a href="   <?php  echo site_url("pages/deletealarm")  ?>">Delete Alarm</a></li>
<li><a href="<?php echo site_url("pages/updatealarm") ?>   ">Update Alarm</a></li>
</ul>




<section>


<div style="margin-left:25%;padding:1px 16px;height:100px;">


<p>Used php for making rest calls and performed CRUD operations.<p>
<p>Used MVC based codeigniter framework for development.</p>
<p>Provided functionality to see list of existing vms on ICO 2.4.0.2 server for authenticated users.</p>
<p>Provided functionality for displaying list of existing alarms using ICO openstack ceilometer apis</p>
<p>Provided functionality for user interface based alarm creation using openstack ceilometer apis </p>
<p>Provided functionality for alarm update as well as delete.</p>

</section>

</body>


<div id="fixedfooter"> 
GsLab
 <em>&copy; 2015</em>
 <a href=" <?php  echo site_url()   ?> ">HOME</a>
</div>

<html>

