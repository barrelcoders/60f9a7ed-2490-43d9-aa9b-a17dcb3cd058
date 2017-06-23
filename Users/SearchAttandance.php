<?php include '../connection.php';?>



<?php



session_start();



$class = $_SESSION['StudentClass'];



$StudentRollNo = $_SESSION['StudentRollNo'];



$ssql="SELECT DISTINCT DATE_FORMAT( `attendancedate` , '%M-%Y' ) MonthYear FROM `attendance`";







$rsAttan= mysql_query($ssql);



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
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>


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
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="../../Admin/images/logo.png" height="76" width="300" ></img></h1>
    
    </div>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="#">Home</a></li>
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
      <li><a href="Notices.php">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">Search Attendacne</a></li>
    </ul>
  </div>
</div>


<!-- ######################################Div for News ################################################################# -->

<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>

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
     


		<b>







<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000" id="table4">



	<tr>



		<td bgcolor="#5B3AB6">



		<p style="margin-left: 10px">



		<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;color:#FFFFFF;">



		Search Previous Attendance</span></td>



	</tr>



	<tr>



		<td>



		<table border="1" width="1010" id="table2" style="border-collapse: collapse; border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px" bordercolor="#000000">



			<tr>



				<td width="205" style="border-style: solid; border-width: 1px" align="center">	<font face="Cambria"> <a href="Attendance.php" class="auto-style2">



				<strong>Attendance</strong></a></font></td>



				<td width="205" align="center">	<font face="Cambria"><b>Search Previous</b></font></td>



				



				<td width="588" align="center">	&nbsp;</td>



				



			</tr>



		</table>



		<table border="0" width="100%" style="border-collapse: collapse" id="table5">



		<form name="frmSearch" id="frmSearch" method ="post" action="Attandance.php">



			<tr>



				<td width="278" align="left">



				<p style="margin-left: 40px">



				<span style="font-family:Cambria;font-size:12pt;font-weight:bold;font-style:normal;text-decoration:none;color:#000000">



				Search By Month</span></td>



				<td width="278" align="left">



				<select size="1" name="cboSearchMonth" id="cboSearchMonth">



				<option selected value="Select One">Select One</option>



				<?php



					while($row = mysql_fetch_row($rsAttan))



					{



						$MonthYear=$row[0];						



				?>



					<option value="<?php echo $MonthYear; ?>"><?php echo $MonthYear; ?></option>



				<?php } ?>



				</select></td>



				<td width="837" align="center" rowspan="3">



				<p align="left">



				<font face="Cambria">



				<!--<img border="0" src="images/SearchImg.jpg" width="106" height="37" onclick ="Javascript:Validate1();">-->
				<input type="button" name="btnSearch" id="btnSearch" value="Submit" onclick ="Javascript:Validate1();">
				</font><p align="left">



				&nbsp;<b><p align="left">



				<font face="Cambria">



				<!--<img border="0" src="images/SearchImg.jpg" width="106" height="37">-->
				<input type="button" name="btnSearch1" id="btnSearch1" value="Submit">
				</font></td>



			</tr>



			



			<tr>



				<td width="278" align="left">



				<p style="margin-left: 40px">



				<span style="font-family:Cambria;font-size:12pt;font-weight:bold;font-style:normal;text-decoration:none;color:#000000">



				Or</span></td>



				<td width="278" align="left">&nbsp;</td>



			</tr>



			



			<tr>



				<td width="278" align="left" height="87">



				<p style="margin-left: 40px">



				<span style="font-family:Cambria;font-size:12pt;font-weight:bold;font-style:normal;text-decoration:none;color:#000000">



				Select Date</span></td>



				<td width="278" align="left" height="87">



				<input type="text" name="txtFromDate" size="15" value="From Date" class="tcal">  



				<input type="text" name="txtToDate" size="15" value="To Date" class="tcal"></td>



			</tr>



			



			</form>



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
    
    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>