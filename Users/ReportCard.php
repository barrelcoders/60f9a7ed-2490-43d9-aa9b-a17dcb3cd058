<?php include '../connection.php';?>
<?php
echo "<br><br><center><b>Coming Soon...<br>Click <a href='Notices.php'>here</a> to go back";
exit();
session_start();
$class = $_SESSION['StudentClass'];
$StudentRollNo = $_SESSION['StudentRollNo'];


if ($_REQUEST["cboSearchSem"]!="")
{
	$Sem=$_REQUEST["cboSearchSem"];
	$ssql="SELECT `subject`,`marks`,`remarks`,`Grade`,`Position`";
	$ssql=$ssql . " FROM `report_card`";
	$ssql=$ssql . " WHERE `sclass` = '$class' and `srollno` ='$StudentRollNo' and `testtype`='$Sem'";
}
else if ($_REQUEST["cboTestType"]!="")
{
	$TstType=$_REQUEST["cboTestType"];
	$ssql="SELECT `subject`,`marks`,`remarks`,`Grade`,`Position`";
	$ssql=$ssql . " FROM `report_card`";
	$ssql=$ssql . " WHERE `sclass` = '$class' and `srollno` ='$StudentRollNo' and `testtype`='$TstType'";
	
	
	$sqlmax = "SELECT `MaxMarks` FROM `exam_master` WHERE `examtype`='$TstType'";
    $resultmax = mysql_query($sqlmax, $Con);
   	while($row = mysql_fetch_assoc($resultmax ))
   				{
   					$MaxMarks=$row['MaxMarks'];
   					//echo $MaxMarks;
   					//exit();
   				}
   

	
}
else
{
	
	$ssql="SELECT `subject`,`marks`,`remarks`,`Grade`,`Position`";
	$ssql=$ssql . " FROM `report_card`";
	$ssql=$ssql . " WHERE `sclass` = '$class' and `srollno` ='$StudentRollNo' and `testtype`='unit1'";
}	

$rs= mysql_query($ssql);
$num_rows=0;

$rsTestType=mysql_query("select `testtype` from (SELECT distinct `testtype`,max(`datetime`) datetime FROM `report_card` where `sclass`='$class' and `srollno`='$StudentRollNo' group by `testtype`)x order by `datetime` desc");


$msmaxmarks=mysql_query("select `MaxMarks` from exam_master;");
$ms= mysql_query($msmaxmarks);


?>
<script language ="javascript">
	function fnlSearByTestType()
	{
		if (document.getElementById("cboTestType").value !="Select One")
		{
			document.getElementById("frmTestType").submit();
		}
	}
	function fnlredirect()
	{
		var sstr;
		sstr="DateSheet.php?testtype=" + document.getElementById("cboTestType").value;
		//alert(sstr);
		//window.location(sstr);
		window.location.assign(sstr);
		return;
	}
</script>
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
<div class="wrapper col1">
  <div id="header">
    <?php include("includes/logo.php");?>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.php">Home</a></li>
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
		<li class="current"><a href="#">School News</a></li>
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
     




<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000" id="table4">
	<tr>
		<td bgcolor="#FA6800">
		<p style="margin-left: 10px">
		<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;color:#FFFFFF;">
		Report Card</span></td>
	</tr>
	<tr>
		<td>
		<table border="1" width="100%" id="table2" style="border-collapse: collapse; border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px" bordercolor="#000000">
			<form name ="frmTestType" id="frmTestType" method="POST" action="ReportCard.php">
			<tr>
				<td width="129" height="35" align="center" style="border-bottom:medium none #000000; border-top-color: #000000; border-top-width: 1px; " bgcolor="#FFFFFF">
					<select size="1" name="cboTestType" id="cboTestType" onchange ="fnlSearByTestType();" style="width: 102px">
					<option selected value="Select One">Select Term</option>
				<?php
				while($row1 = mysql_fetch_row($rsTestType))
				{
					$TestType=$row1[0];			
				?>
				<option value="<?php echo $TestType; ?>" 
				<?php 
				if ($_REQUEST["cboTestType"]!="")
				{
					if ($_REQUEST["cboTestType"]==$TestType)
					{echo "selected";}
				}
				else if ($_REQUEST["cboSearchSem"]!="")
				{
					if ($_REQUEST["cboSearchSem"]==$TestType)
					{echo "selected";}
				}
				else
				{
					if ($TestType=="unit1")
					{echo "selected";}
				}
				?>
				><?php echo $TestType; ?></option>
				<?php 
				}
				?>

					</select>
				</td>
				<!--<td width="129" height="35" align="center" style="border-bottom:medium none #000000; border-top-color: #000000; border-top-width: 1px; " bgcolor="#DCBA7B">
				<a href="SearchReportCard.php"><font color="#CC0033"><b>
				<span style="text-decoration: none">Previous</span></b></font></a></td>-->
				<td width="129" height="35" align="center" style="border-top:medium none #000000; border-bottom:medium none #000000; border-right-style:none; border-right-width:medium">
				&nbsp;</td>
				<td height="35" style="border-style:none; border-width:medium; ">
				<p align="right">
				<input type="button" value="Exam Date Sheet" name="btnDataSheet" style="color: #000000; font-weight: bold" onclick ="Javascript: fnlredirect();">
				</td>
			</tr>
			</form>
		</table>
		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table5">
			<tr>
				<td height="35" width="278" bgcolor="#FFFFFF" align="center">
				<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
				Subject</span></td>
				<td height="35" width="278" bgcolor="#FFFFFF" align="center">
				<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
				Max. Marks</span></td>
				<td height="35" width="279" bgcolor="#FFFFFF" align="center">
				<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
				Marks Obtained</span></td>
				<td height="35" bgcolor="#FFFFFF" align="center" width="279">
				<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
				Grade</span></td>
			</tr>
			<?php
				while($row = mysql_fetch_row($rs))
				{
					$Subject=$row[0];
					$Marks=$row[1];
					$Remarks=$row[3];
					$Grade=$row[3];
					$Position=$row[4];
			?>
			<tr>
				<td height="35" width="278" align="center">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $Subject; ?></span></td>
				<td height="35" width="278" align="center">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $MaxMarks; ?></span></td>
				<td height="35" width="279" align="center">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $Marks; ?></span></td>
				<td height="35" width="279" align="center">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $Grade; ?></span></td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td height="35" width="278" align="center">&nbsp;</td>
				<td height="35" width="278" align="center">&nbsp;</td>
				<td height="35" width="279" align="center">&nbsp;</td>
				<td height="35" width="279" align="center">&nbsp;</td>
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
    
    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>