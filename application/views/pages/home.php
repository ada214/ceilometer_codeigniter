<html>
<head>

<?php echo link_tag('css/home.css'); ?>
<?php echo link_tag('css/header.css'); ?>

<!--

<?php echo heading("Ceilometer apis based alarm creation, updation and deletion",2)  ?>

-->

</head>


<body>


<header style="position: fixed;
    top: 0px;
        width: 90%;
           ">
<h1> Ceilometer apis based alarm creation, updation and deletion </h1>
</header>


<ul style="position: relative;
    top: 10px;">
<li><a class="active" href="  <?php echo site_url("pages/index")?>           ">Home</a></li>
<li><a href=" <?php  echo site_url("pages/view")   ?>                       ">Vm List</a></li>
<li><a href=" <?php  echo site_url("pages/meterlist")   ?>                       ">Meter List</a></li>
<li><a href=" <?php  echo site_url("pages/alarmlist")  ?>">Show Alarms</a></li>
<li><a href="   <?php  echo site_url("pages/createalarm")  ?>" >Create Alarm</a></li>
<li><a href="   <?php  echo site_url("pages/deletealarm")  ?>">Delete Alarm</a></li>
<li><a href="<?php echo site_url("pages/updatealarm") ?>   ">Update Alarm</a></li>
</ul>




<section>


<div style=" position: fixed;
    top: 117px;
        left: 406px; /*padding:1px 16px;height:100px;*/">


<p>Used php for making rest calls and performed CRUD operations.<p>
<p>Used MVC based codeigniter framework for development.</p>
<p>Provided functionality to see list of existing vms on ICO 2.4.0.2 server for authenticated users.</p>
<p>Provided functionality for displaying list of existing alarms using ICO openstack ceilometer apis</p>
<p>Provided functionality for user interface based alarm creation using openstack ceilometer apis </p>
<p>Provided functionality for alarm update as well as delete.</p>

</section>

</body>


<div style="position: fixed;
    bottom: 0px;
        width: 90%;
            left: 98px;
                background-color: LightSteelBlue;
                    color: white;
                        /* clear: both; */
                            text-align: center;
                                padding: 5px;"> 
GsLab
 <em>&copy; 2016</em>
 <a href=" <?php  echo site_url()   ?> ">HOME</a>
</div>

<html>

