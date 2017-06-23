<?php include '../connection.php';?>
<?php
session_start();
	$StudentClass = $_SESSION['StudentClass'];
	$class = $_SESSION['StudentClass'];
	$StudentRollNo = $_SESSION['StudentRollNo'];
	$ssqlClass="SELECT distinct `class` FROM `class_master`";
	$rsClass= mysql_query($ssqlClass);
        
        
if ($_REQUEST["cboSearchMonth"]!="")
{
	$MonthName=$_REQUEST["cboSearchMonth"];
	$ssql="select x.*,";
	$ssql=$ssql . "(select count(distinct `attendancedate`) from `attendance` where `attendance`='P' and DATE_FORMAT( `attendancedate` , '%M-%Y' )=x.MonthYear and `srollno` ='$StudentRollNo' AND `sclass` ='$class') Attandance,";
	$ssql=$ssql . "(select count(distinct `attendancedate`) from `attendance` where `attendance`='L' and DATE_FORMAT( `attendancedate` , '%M-%Y' )=x.MonthYear and `srollno` ='$StudentRollNo' AND `sclass` ='$class') Leave1 ";
	$ssql=$ssql . "from ";
	$ssql=$ssql . "(";
	$ssql=$ssql . "SELECT DISTINCT DATE_FORMAT( `attendancedate` , '%M-%Y' ) MonthYear, count( distinct `attendancedate` ) TotalWorkingDays";
	$ssql=$ssql . " FROM `attendance`";
	$ssql=$ssql . " WHERE `srollno` ='$StudentRollNo'";
	$ssql=$ssql . " AND `sclass` ='$StudentClass' and DATE_FORMAT( `attendancedate` , '%M-%Y')='$MonthName'";
	$ssql=$ssql . " GROUP BY DATE_FORMAT( `attendancedate` , '%M-%Y')";
	$ssql=$ssql . " ORDER BY  `attendancedate`) x ";
	//$ssql=$ssql . " order by `attendancedate`";

}

else

{

	$ssql="select x.*,";

	$ssql=$ssql . "(select count(distinct `attendancedate`) from `attendance` where `attendance`='P' and DATE_FORMAT( `attendancedate` , '%M-%Y' )=x.MonthYear and `srollno` ='$StudentRollNo' AND `sclass` ='$class') Attandance,";
	$ssql=$ssql . "(select count(distinct `attendancedate`) from `attendance` where `attendance`='L' and DATE_FORMAT( `attendancedate` , '%M-%Y' )=x.MonthYear and `srollno` ='$StudentRollNo' AND `sclass` ='$class') Leave1 ";
	$ssql=$ssql . "from ";
	$ssql=$ssql . "(";
	$ssql=$ssql . "SELECT DISTINCT DATE_FORMAT( `attendancedate` , '%M-%Y' ) MonthYear, count( distinct `attendancedate` ) TotalWorkingDays";
	$ssql=$ssql . " FROM `attendance`";
	$ssql=$ssql . " WHERE `srollno` ='$StudentRollNo'";
	$ssql=$ssql . " AND `sclass` ='$StudentClass'";
	$ssql=$ssql . " GROUP BY DATE_FORMAT( `attendancedate` , '%M-%Y')";
	$ssql=$ssql . " ORDER BY  `attendancedate`) x";

	//$ssql=$ssql . " order by `attendancedate`";

}

//echo $ssql;
//exit();

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
<head>
<title>Daily Classwork and Homework</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
    <br>
  </div>
</div>
</div>





 <!-- ####################################################################################################### -->

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li> >> </li>
      <li><a href="Notices.php">Home</a></li>
      <li> >> </li>
		<li class="current"><a href="#">Attendance</a></li>
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
				
	 <div id="column">
     <?php  include 'SideMenu.php'; ?>
    </div>
    </td>
    
    
<!-- #########################################Navigation TD Close ############################################################## --> 

<!-- #########################################Content TD Open ############################################################## -->    


				<td>
			
    
<div>
  <div>
    <div>
    <table border="1" width="48%" cellspacing="1" style="border-width:0px; border-collapse: collapse" height="80" bordercolor="#000000" id="table2">



	<tr>



		<td bgcolor="#0b462d" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium" colspan="3">



		<p style="margin-left: 10px">



		<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;color:#FFFFFF;">



		Late Coming Information</span></td>



	</tr>
   



			<tr>



				<td height="35" align="center" class="auto-style1" style="width: 290px">



				<strong>Date</strong></td>



				<td height="35" align="center" class="auto-style1" style="width: 1571px">



				<strong>Reason</strong></td>



				<td height="35" align="center" class="auto-style2" style="width: 631px">



				<strong>Time</strong></td>



			</tr>



			<?php
$ssqlLate="SELECT `Date` ,`Reason`,`Time`FROM `late_comers` where (`Class` ='$class' and `Rollno`='$StudentRollNo')  order by `Date` desc";

$data=  mysql_query($ssqlLate);
while($result=mysql_fetch_array($data)){


?>
			<tr>



				<td height="35" align="left" style="width: 242px">



				<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#000000;"><?php echo $result['Date']; ?></span><br><br></td>



				<td height="35" align="left" style="width: 1571px">



				<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#000000;"><?php echo $result['Reason']; ?></span></td>



				<td height="35" style="width: 631px" class="style1">



				<font face="Cam'">


				<span class="auto-style3"><?php echo $result['Time']; ?></span></a></font></td>



			</tr>


<?php } ?>



			<tr>



				<td height="35" align="center" style="width: 242px">&nbsp;</td>



				<td height="35" align="center" style="width: 1571px">&nbsp;</td>



				<td height="35" align="center" style="width: 631px">&nbsp;</td>



			</tr>



		</table>
    
    
      <table border="1" width="100%" cellspacing="1" style="border-width:0px; border-collapse: collapse" height="80" bordercolor="#000000" id="table4">

	<tr>

		<td bgcolor="#5B3AB6" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">

		<p style="margin-left: 10px">

		<font color="#FFFFFF">

		<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;">

		Attendance Report</span></font></td>

	</tr>

	<tr>

		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">

		<table border="1" width="100%" id="table2" style="border-collapse: collapse; border-right-width:0px; border-top-width:0px; border-bottom-width:0px" bordercolor="#000000">

			<tr>
				<td width="129" style="border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium"></td>

				<td style="border-style:none; border-width:medium; ">

				<p align="right">
                                <a href="Apply-leave.php">
				<input type="button" value="Apply Leave" name="btnHolidayCalendar" style="font-weight: bold"></a>      
				<a href="Holiday.php">
				<input type="button" value="Holiday Calendar" name="btnHolidayCalendar" style="font-weight: bold"></a>

				</td>

			</tr>

		</table>

		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table5">

			<tr>

				<td width="278" bgcolor="#FFFFFF" align="center">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Month</span></td>

				<td width="278" bgcolor="#FFFFFF" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Total Work Days</span></td>

				<td width="279" bgcolor="#FFFFFF" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Days Present</span></td>

				<td bgcolor="#FFFFFF" align="center" width="279">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Days Leave</span></td>

				<td bgcolor="#FFFFFF" align="center" width="279">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Days Absent</span></td>

				<td bgcolor="#FFFFFF" align="center" width="279">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Percentage %</span></td>

			</tr>

			<?php

				while($row = mysql_fetch_row($rs))

				{

					$MonthYear=$row[0];

					$TotalWorkingDays=$row[1];

					$Attandance=$row[2];
					$Leave=$row[3];

					$Percentage=(($Attandance+$Leave)/$TotalWorkingDays)*100;

			?>

			<tr>

				<td width="278" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $MonthYear; ?></span></td>

				<td width="278" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $TotalWorkingDays; ?></span></td>

				<td width="279" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Attandance; ?></span></td>

				<td width="279" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Leave; ?></span></td>

				<td width="279" align="center">
				<font face="Cambria">
				<?php echo ($TotalWorkingDays-($Attandance+$Leave)); ?>
				</font>
				</td>

				<td width="279" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo round($Percentage,2); ?>%</span></td>

			</tr>

			<?php

			}

			?>

			<tr>

				<td width="278" align="center">&nbsp;</td>

				<td width="278" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>

			</tr>

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
    
    <p align="center">Powered By Eduworld Technologies LLP |   <a target="_blank" href="http://www.eduworldtech.com" title="Eduworld Technologies LLP">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>