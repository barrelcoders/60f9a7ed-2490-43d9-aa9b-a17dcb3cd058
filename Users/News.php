<?php include '../connection.php';?>
<?php include '../AppConf.php';?>
<?php
session_start();

$class = $_SESSION['StudentClass'];

$StudentRollNo = $_SESSION['StudentRollNo'];
	//$MonthName=$_REQUEST["cboSearchMonth"];
	$ssql="select `srno`,`newstitle`,`news`,`imageurl`,DATE_FORMAT(`date`,'%d-%b-%y') from `school_news` order by `date` desc";

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
<script language="javascript">
function ShowPreviewNews(SrNo)
{
	var myWindow = window.open("ShowNews.php?srno=" + SrNo ,"","width=800,height=800");
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>School Education | Full Width</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
<!--
.auto-style4 {
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
	text-align: center;
}
.auto-style5 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
	text-align: center;
}
.style3 {
	text-align: center;
	border-width: 1px;
}

.style2 {
	text-align: center;
}
.auto-style6 {
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
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">Administration</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>

-->
<!-- ####################################################################################################### -->
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
      <li>&#187;</li>
      <li><a href="Notices.php">Home</a></li>
      <li>&#187;</li>
		<li class="current"><a href="News.php">School News</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- Div  for News ####################################################################################################### -->
<!--<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>-->
<table width="100%" border="0">
			<tr>
				<td>
<div id="column" style="Float:left"><?php include 'SideMenu.php'; ?></div> 
</td>


<!-- ####################################################################################################### -->


<!-- ####################################################################################################### -->

   

<td>


<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000" id="table1">

	<tr>

		<td bgcolor="#1BA1E2">

		<p class="auto-style2">

		<font color="#FFFFFF">

		<strong>Newsletter</strong></font></td>

	</tr>

	<tr>

		<td>

		

		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table3">

			<tr>

				<td height="35" width="50" bgcolor="#FFFFFF" class="auto-style4" align="center">

				<strong>Sr.No.</strong></td>
				
				<td height="35" bgcolor="#FFFFFF" class="auto-style4" style="width: 100px" align="center">

				<strong>News Date</strong></td>

				<td height="35" bgcolor="#FFFFFF" class="auto-style4" style="width: 500px" align="center">

				<strong>News Title</strong></td>

				<td height="35" bgcolor="#FFFFFF" class="auto-style4" style="width: 100px" align="center">

				<strong>News Preview</strong></td>
				
				<td height="35" width="100" bgcolor="#FFFFFF" class="auto-style4" align="center">

				<strong>Image of News Event</strong></td>

			</tr>

			<?php
				$row_num=0;
				while($row = mysql_fetch_row($rs))
				{

					$SrNo=$row[0];
					$newsdate=$row[4];
					$newstitle=$row[1];
					$News=$row[2];
					if ($row[3]=="")
					{
						$imageurl="No Image";
					}
					else
					{
						$imageurl=$row[3];
					}
					$row_num=$row_num+1;

			?>

			<tr>

				<td height="35" width="50" align="left">

				<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#CC0033;"><?php echo $row_num; ?></span><font face="Cambria"><br><br>
				</font></td>
				
				<td height="35" style="width: 100px" class="style3">
				<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#CC0033;"><?php echo $newsdate; ?></span><font face="Cambria">
				</font>
				</td>

				<td height="35" align="left" style="width: 500px">

				<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#CC0033;"><?php echo $newstitle; ?></span><font face="Cambria"><br><br>
				</font></td>

				<td height="35" style="width: 100px" class="style2">
				
				<font face="Cambria">
				
				<a href="Javascript:ShowPreviewNews(<?php echo $SrNo ?>);" class="style2">
				<span class="auto-style6">Preview</span></a>				
				<br><br></font></td>
				
				<td height="35" width="100" class="style2">
				<font face="Cambria">
				<?php 
					if ($row[3] != "http://dpsfbd.info/Admin/Academics/NewsImage/")
					{
				?>
				<a href="<?php echo $imageurl; ?>">
				<img src="<?php echo $imageurl; ?>" height="50" width="100"></a>
				<?php
					}
					else
					{
						echo "No Image";
						
					}
				?>

				
				</span></span><br><br></font></td>


			</tr>

			<?php

			}

			?>

			

		</table>

		</td>

	</tr>

</table>
<php include"footer.php";>
</td>


	</div>
</div>
<!-- ####################################################################################################### -->

</body>

</html>
