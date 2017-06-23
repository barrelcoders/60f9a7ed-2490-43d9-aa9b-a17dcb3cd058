<?php
include '../connection.php';
session_start();
	$StudentClass = $_SESSION['StudentClass'];
	$class= $_SESSION['StudentClass'];
	$StudentRollNo = $_SESSION['StudentRollNo'];
	if($class=="")
	{
		echo "<br><br><center><b>Session has bee expired<br>Click <a href='../studentlogin.php'>here</a> to re-login!";
		exit();
	}
	$ssqlClass="SELECT distinct `class` FROM `class_master`";
	$rsClass= mysql_query($ssqlClass);
?>

<?php
$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];

	$ssql="select `srno`,DATE_FORMAT(`NoticeDate`,'%d-%b-%y') as `datetime`,`notice`,`noticetitle` from `student_notice` where (`sclass` ='$class' and `srollno`='$StudentRollNo') or `sclass`='All' or (`sclass` ='$class' and `srollno`='All')  order by `NoticeDate` desc";
	


$rs= mysql_query($ssql);



$num_rows=0;

?>

<script language="javascript">



	function fnlAck(SrNo)

	{

		//alert(SrNo);

		var myWindow = window.open("Ack.php?SrNo="+SrNo,"MsgWindow","width=300,height=200");

		return;

	}

	function ShowPreviewNotice(SrNo)

	{

  		//var myWindow = window.open("ShowNotice.php?srno=" + SrNo ,"","width=600,height=700");

  		var myWindow = window.open("ShowNotice.php?srno=" + SrNo ,"","fullscreen=yes,location=no");

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
      <li class="first"><a href="">You Are Here</a></li>
      <li>»</li>
      <li><a href="">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">Notices</a></li>
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
      <?php include 'SideMenu.php'; ?>
    </div>
    </td>
           
    
    
<!-- #########################################Navigation TD Close ############################################################## -->    

<!-- #########################################Content TD Open ############################################################## -->    


				<td>
			
    
<div>
  <div>
    <div>







<table border="1" width="100%" cellspacing="1" style="border-width:0px; border-collapse: collapse" height="80" bordercolor="#000000" id="table1">


	<tr>



		<td bgcolor="#76608A" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">



		<p style="margin-left: 10px">



		<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;color:#FFFFFF;">



		Important Notice For Students</span></td>



	</tr>



	<tr>


		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table3">



			<tr>



				<td height="35" align="center" class="auto-style1" style="width: 242px">



				<strong>Date</strong></td>



				<td height="35" align="center" class="auto-style1" style="width: 1571px">



				<strong>Notice Title</strong></td>



				<td height="35" align="center" class="auto-style2" style="width: 631px">



				<strong>View</strong></td>



			</tr>



			<?php

	
				$row_num=0;
				while($row = mysql_fetch_row($rs))
				{



					$SrNo=$row[0];



					$datetime=$row[1];



					$notice=$row[2];

					$noticetitle=$row[3];
					$row_num=$row_num+1;

										



			?>



			<tr>



				<td height="35" align="left" style="width: 242px">



				<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#000000;"><?php echo $datetime; ?></span><br><br></td>



				<td height="35" align="left" style="width: 1571px">



				<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#000000;"><?php echo $noticetitle; ?></span></td>



				<td height="35" style="width: 631px" class="style1">



				<font face="Cam'">



				<a href="Javascript:ShowPreviewNotice(<?php echo $SrNo ?>);">
				<span class="auto-style3">Preview</span></a></font></td>



			</tr>



			<?php



			}



			?>



			<tr>



				<td height="35" align="center" style="width: 242px">&nbsp;</td>



				<td height="35" align="center" style="width: 1571px">&nbsp;</td>



				<td height="35" align="center" style="width: 631px">&nbsp;</td>



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