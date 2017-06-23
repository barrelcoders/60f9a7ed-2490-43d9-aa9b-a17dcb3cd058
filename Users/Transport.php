<?php include '../connection.php';?>




<?php

session_start();

	$sadmission=$_SESSION['userid'];

$class = $_SESSION['StudentClass'];

$StudentRollNo = $_SESSION['StudentRollNo'];

 


$ssql="SELECT `sname`,`srollno`,`sclass`,`routeno`,(select `bus_no` from `RouteMaster` where `routeno`=a.`routeno`) as `bus_no`,(select `timing` from `RouteMaster` where `routeno`=a.`routeno`) as `timing`,(select `driver_name` from `RouteMaster` where `routeno`=a.`routeno`) as `driver_name`,(select `driver_mobile` from `RouteMaster` where `routeno`=a.`routeno`) as `driver_mobile` FROM `student_master` a where `sclass` ='$class' and `srollno`='$StudentRollNo'";
$rs= mysql_query($ssql);
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
      <li>»</li>
      <li><a href="Notices.php">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">Transport</a></li>
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
     




<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="style2">
	<tr>
		<td width=50% bgcolor="#ECB836"><font color="#FFFFFF">
		<font face="Cambria">
		<span style="; font-weight: 700; font-size: 14pt; ">Transport Details</span></font><span style="font-size: 14pt">
		</span>
		</font></td>

	<tr>
		<td style="border-style: none; border-width: medium">
		<table width="100%" bordercolor="#000000" id="table5" class="style2" border="1">
			<tr>
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 164px" class="auto-style1">Name</td>
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 165px" class="auto-style1">Roll No</td>
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 165px" class="auto-style1">Class</td>
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 165px" class="auto-style1">Bus Route No</td>
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 165px" class="auto-style1">Bus No</td>
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 165px" class="auto-style1">Driver Name</td>
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 165px" class="auto-style1">Driver Mobile No</td>
			</tr>

			<?php

		
				while($row = mysql_fetch_row($rs))
				{

					$sname=$row[0];					
					$srollno=$row[1];					
					$sclass=$row[2];					
					$routeno=$row[3];	
					$bus_no=$row[4];					
					$timing=$row[5];					
					$driver_name=$row[6];					
					$driver_mobile=$row[7];					
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="35" align="center" style="width: 164px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $sname; ?></span> </td>
				<td height="35" align="center" style="width: 165px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $srollno; ?></span> </td>
				<td height="35" align="center" style="width: 165px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $sclass; ?></span> </td>
				<td height="35" align="center" style="width: 165px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $routeno; ?></span> </td>
				<td height="35" align="center" style="width: 165px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $bus_no; ?></span> </td>
				<td height="35" align="center" style="width: 165px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $driver_name; ?></span> </td>
				<td height="35" align="center" style="width: 165px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $driver_mobile; ?></span> </td>
			</tr>

			<?php

			}

			?>


		</td>
	</tr>
</table>

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