<?php include '../connection.php';?>


<?php
session_start();

$StudentName = $_SESSION['StudentName'];


$StudentClass = $_SESSION['StudentClass'];
$StudentRollNo = $_SESSION['StudentRollNo'];


$class=$_SESSION['StudentClass'];

/*
if ($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `sclass`,`subject` , `syllabus` , `month` FROM `course_curriculam` a where  a.`sclass`='$class'";
	
	if($_REQUEST["cboSubject"] !="All")
	{
		$SelectedSubject=$_REQUEST["cboSubject"];
		$ssql=$ssql . " and `subject`='$SelectedSubject'";		
	}
	
	$ssql=$ssql . "  ORDER BY STR_TO_DATE(  `month` ,  '%M' )";
	$rs= mysql_query($ssql);
}
*/

$ssql="select `class`,`remark`,`assignmentdate`,`assignmentURL` from  `course_curriculam` where `class`='$class' order by `assignmentdate` desc";
$reslt = mysql_query($ssql , $Con);

$ssqlSubject="SELECT distinct `subject` FROM `course_curriculam` a where  a.`sclass`='$class'";
$rsSubject= mysql_query($ssqlSubject);

$num_rows=0;


?>
<script language="javascript">
function Validate2()
{
	document.getElementById("frmCourseCurri").submit();
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

	color: #000000;

}

.auto-style3 {
	color: #000000;
}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style3 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
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
      <li><a href="Notices.php">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">Session Plan</a></li>
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

<table border="1" width="100%" cellspacing="1" style="border-width:0px; border-collapse: collapse" height="80" bordercolor="#000000" id="table1">
	<tr>
		<td style="border-style: none; border-width: medium">
		<table border="1" width="100%" id="table2" bordercolor="#000000" class="auto-style2" height="58">
			<tr>
				<td width="300" height="58" class="auto-style1" bgcolor="#E51400">
				<font color="#FFFFFF" style="font-size: 14pt">
				<strong>Course Curriculum Details</strong></font></td>
			</tr>
			<!--
			<tr>
				<td width="300" height="47" class="auto-style1">
	
	
	<table class="auto-style7" style="border-width:0px; width: 400px">
		<form name="frmCourseCurri" id="frmCourseCurri" method="post" action="CourseCurriculam.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	<td class="auto-style6" style="width: 113px; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">
				<strong>Select Subject</strong></td>
	
	<td class="auto-style10" style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboSubject" id="cboSubject" style="width: 62px;">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsSubject))
		{
					$Subject=$row1[0];
		?>
		<option value="<?php echo $Subject; ?>"><?php echo $Subject; ?></option>
		<?php
		}
		?>
		</select></span></td>
	
	<td style="width: 130px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style8">
				<img border="0" src="../Admin/images/SearchImg.jpg" width="106" height="37" onclick ="Javascript:Validate2();"></td>
	</form>
	</table>
	
				</td>
			</tr>
			-->
		</table>
		<table width="100%" bordercolor="#000000" id="table7" class="style1" style="border-color: #000000">
			<!--
			<tr>
				<td width="199" bgcolor="#FFFFFF" align="center" style="width: 100%" class="style2">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
				Syllabus ( <?php echo $_REQUEST["cboSubject"];?> )</span></td>
				</tr>
			-->
			
			<tr>
				<td align="center" style="width: 31px" class="style2">
				<span style="font-family: Cambria; font-size: 15px; font-weight: 700; font-style: normal; text-decoration: none; ">
				<font color="#000000">SrNo</font></span></td>
				
				<td  align="center" style="width: 282px" class="style2">
				<span style="font-family: Cambria; font-size: 15px; font-weight: 700; font-style: normal; text-decoration: none; ">
				<font color="#000000">Class</font></span></td>
				
				<td  align="center" style="width: 283px" class="style2">
				<span style="font-family: Cambria; font-size: 15px; font-weight: 700; font-style: normal; text-decoration: none; ">
				<font color="#000000">Remarks</font></span></td>
				
				<td  align="center" style="width: 283px" class="style2">
				<span style="font-family: Cambria; font-size: 15px; font-weight: 700; font-style: normal; text-decoration: none; ">
				<font color="#000000">Date</font></span></td>
				
				<td  align="center" style="width: 283px" class="style2">
				<span style="font-family: Cambria; font-size: 15px; font-weight: 700; font-style: normal; text-decoration: none; ">
				<font color="#000000">Download</font></span></td>
				
			</tr>
			
			<?php
				$num_rows=1;
				while($row = mysql_fetch_row($reslt))
				{
					$class=$row[0];
					$remark=$row[1];
					$assignmentdate=$row[2];
					$assignmentURL=$row[3];
					
					$num_rows=$num_rows+1;
			?>
			<tr>
				<td align="center" style="width: 31px" class="style3">
				<?php echo $num_rows;?>.</td>
				
				<td  align="center" style="width: 282px" class="style3">
				<?php echo $class;?></td>
				
				<td  align="center" style="width: 283px" class="style3">
				<?php echo $remark;?></td>
				
				<td  align="center" style="width: 283px" class="style3">
				<?php echo $assignmentdate;?></td>
				
				<td  align="center" style="width: 283px" class="style3">
				<a href="<?php echo $assignmentURL;?>" target="_blank">Download</a></td>
				
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
    
    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>