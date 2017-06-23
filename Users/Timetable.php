<?php include '../connection.php';?>
<?php
session_start();
//$srollno= $_REQUEST["srollno"];
$sclass=$_SESSION['StudentClass'];
//$MonthName=$_REQUEST["MonthName"];
//$YearName=$_REQUEST["YearName"];
$ssql="select `srno`,`sclass`,`subject`,`weekday`,`daytime`,`datetime` from `time_table` where `sclass` = '$sclass'";

if ($_REQUEST["weekday"]=="")
{
$ssql=$ssql . " and weekday='Monday'";
$fontcolor="#FFFFFF";
$bgcolor="#FFFFFF";
}


if ($_REQUEST["weekday"]==1)
{
$ssql=$ssql . " and weekday='Monday'";
$fontcolor="#FFFFFF";
$bgcolor="#FFFFFF";
}

if ($_REQUEST["weekday"]==2)
{
$ssql=$ssql . " and weekday='Tuesday'";
$fontcolor="#FFFFFF";
}
if ($_REQUEST["weekday"]==3)
{
$ssql=$ssql . " and weekday='Wednesday'";
$fontcolor="#FFFFFF";
}
if ($_REQUEST["weekday"]==4)
{
$ssql=$ssql . " and weekday='Thursday'";
$fontcolor="#FFFFFF";
}
if ($_REQUEST["weekday"]==5)
{
$ssql=$ssql . " and weekday='Friday'";
$fontcolor="#FFFFFF";
}
if ($_REQUEST["weekday"]==6)
{
$ssql=$ssql . " and weekday='Saturday'";
$fontcolor="#FFFFFF";
}

if (!$result = mysql_query($ssql))     die("Record Not Found");   

$rs= mysql_query($ssql);

$num_rows=0;





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: School Education
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Daily Classwork and Homework</title>

<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />

<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
<!--
.auto-style32 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;

	font-family: Cambria;

}

.auto-style35 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

	text-align: center;

}





.style8 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

}



.auto-style1 {
	border-width: 1px;
	color: #000000;
	font-family: Cambria;
	font-size: 15px;
}

.auto-style2 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	font-style: normal;
	text-decoration: none;
	color: #000000;
}

.style1 {

	text-align: center;

	color: #0000FF;

}

.auto-style3 {
	color: #000000;
}
.auto-style4 {
	border-collapse: collapse;
	border-right-width: 0px;
	border-top-width: 0px;
	border-bottom-width: 0px;
}
.style3 {
	color: #000000;
	font-weight: bold;
}
.auto-style6 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.auto-style5 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.auto-style7 {
	text-align: center;
}
-->
</style>
</head>
<body>
<!--
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>Nullamlacus dui ipsum</h2>
        <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque congue magnis vestibulum quismodo nulla et feugiat. Adipisciniapellentum leo ut consequam ris felit elit id nibh sociis malesuada.</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
      <div class="topbox">
        <h2>Teachers Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Teachers Login Form</legend>
            <label for="teachername">Username:
              <input type="text" name="teachername" id="teachername" value="" />
            </label>
            <label for="teacherpass">Password:
              <input type="password" name="teacherpass" id="teacherpass" value="" />
            </label>
            <label for="teacherremember">
              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="teacherlogin" id="teacherlogin" value="Login" />
              &nbsp;
              <input type="reset" name="teacherreset" id="teacherreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>Pupils Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Pupils Login Form</legend>
            <label for="pupilname">Username:
              <input type="text" name="pupilname" id="pupilname" value="" />
            </label>
            <label for="pupilpass">Password:
              <input type="password" name="pupilpass" id="pupilpass" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="pupillogin" id="pupillogin" value="Login" />
              &nbsp;
              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">Log In Here &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">Administration</a><a id="closeit" style="display:none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
-->
<!-- ####################################################################################################### -->
 <table width="100%" style="border-width: 0px"> 

<tr>

<td style="border-style: none; border-width: medium">
<div class="wrapper col0">
  <div id="topbar">
    <div id="loginpanel">
      <ul>
        <li class="left">Welcome <?php echo $_SESSION['StudentName'];?></li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel"></a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>

<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="../../Admin/images/logo.png" height="76" width="300" ></img></h1>
    
    </div>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="Notices.php">Home</a></li>
        <li><a href="Notices.php">Events and Notices</a></li>
        <li><a href="News.php">News</a></li>
		<li><a href="logoff.php">Logout</li>
        <li class="last"></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
</div>



    
<!-- ####################################################################################################### -->

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>»</li>
      <li><a href="index.php">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">Time Table</a></li>
    </ul>
  </div>
</div>


<!-- ######################################Div for News ################################################################# -->

<!--<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>-->

</td>

</tr>

</table>

<table width="100%" border="0">
			<tr>
				<td>
				
	 <div id="column"><?php include 'SideMenu.php'; ?></div>
    </td>
    
    
<!-- #########################################Navigation TD Close ############################################################## -->    

<!-- #########################################Content TD Open ############################################################## -->    


				<td>
			
    
<div>
  <div>
    <div>
     


<table border="1" width="100%" cellspacing="1" style="border-width:0px; border-collapse: collapse" height="80" bordercolor="#000000" id="table4">

	<tr>

		<td bgcolor="#008080" style="border-style: none; border-width: medium">

		<p style="margin-left: 10px">

		<span style="font-family: Cambria; font-weight: 700; font-size: 18px; color: #FFFFFF">

		Timetable</span></td>

	</tr>

	<tr>

		<td style="border-style: none; border-width: medium">

		<table border="1" bgcolor="#FFFFFF" width="858" id="table2" bordercolor="#000000" class="auto-style4" style="border-left-width: 0px">

			<tr>

				<td width="143"  align="center" style="border-bottom:1px border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px" bgcolor="<?php echo $bgcolor; ?>">

				<font color="<?php echo $fontcolor; ?>">

				<span style="text-decoration: none">
				<a href="Timetable.php?weekday=1" class="auto-style2">
				<span class="style3">Monday</span></a>
				</span></font></td>
				
				<td width="143"  align="center" style="border-bottom:1px border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px" bgcolor="<?php echo $bgcolor; ?>">

				<font color="<?php echo $fontcolor; ?>">
				<span style="text-decoration: none">
				<a href="Timetable.php?weekday=2" class="auto-style2">
				<span class="style3">Tuesday</span></a></span></font></td>

<td width="143"  align="center" style="border-bottom:1px border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px" bgcolor="<?php echo $bgcolor; ?>">



				<font color="<?php echo $fontcolor; ?>">



				<span style="text-decoration: none">
				<a href="Timetable.php?weekday=3" class="auto-style2">
				<span class="style3">Wednesday</span></a></span></font></td>

<td width="143"  align="center" style="border-bottom:1px border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px" bgcolor="<?php echo $bgcolor; ?>">



				<font color="<?php echo $fontcolor; ?>">



				<span style="text-decoration: none">
				<a href="Timetable.php?weekday=4" class="auto-style2">
				<span class="style3">Thursday</span></a></span></font></td>

<td width="143"  align="center" bgcolor="<?php echo $bgcolor; ?>" class="auto-style3" style="border-style: solid; border-width: 1px">



				<font color="<?php echo $fontcolor; ?>">



				<span style="text-decoration: none">
				<a href="Timetable.php?weekday=5" class="auto-style2">
				<span class="style3">Friday</span></a></span></font></td>


<td width="143"  align="center" class="auto-style6" style="border-style: solid; border-width: 1px">
				<font color="white">

				<span style="text-decoration: none">
				<a href="Timetable.php?weekday=6">
				<strong><span class="auto-style1">Saturday</span></strong></a></span></font></td>

			</tr>

		</table>

		<table border="1" width="858" style="border-collapse: collapse" bordercolor="#000000" id="table5">

			<tr>

				<td  width="285" bgcolor="#FFFFFF" class="auto-style7">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">

				Subject</span></td>

				<td  width="285" bgcolor="#FFFFFF" class="auto-style7">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">

				Day</span></td>

				<td  width="286" bgcolor="#FFFFFF" class="auto-style7">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">

				Time</span></td>

				
			</tr>

			<?php

				while($row = mysql_fetch_row($rs))

				{

					$srno=$row[0];

					$subject=$row[2];

					$weekday=$row[3];

					$daytime=$row[4];

								

					

					$num_rows=$num_rows+1;

			?>
	
			<tr>

				<td  width="285" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $subject; ?></span></td>

				<td  width="285" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $weekday; ?></span></td>

				<td  width="286" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $daytime; ?></span></td>

				
			</tr>

			<?php

			}

			?>

			

		</table>

		</td>

	</tr>

</table>



		</td>

<!--####################################Content TD close ################################################### -->
    
</tr>

</table>

<div class="wrapper col5">
  <div id="copyright" style="width: 100%; height: 58px">
    
    <p align="center"><font color="#FFFFFF">Powered By Online School Planet |
	</font>   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">
	<font color="#FFFFFF">Education ERP Platform</font></a></p>
    <br class="clear" />
  </div>
</div>

</body>
</html>