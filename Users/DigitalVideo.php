<?php
session_start();
include '../connection.php';
	$StudentClass = $_SESSION['StudentClass'];
	$class= $_SESSION['StudentClass'];
	$StudentRollNo = $_SESSION['StudentRollNo'];
	$ssqlClass="SELECT distinct `MasterClass` FROM `class_master` where `class`='$StudentClass'";
	$rsMasterClass= mysql_query($ssqlClass);
	$rowMasterClass=mysql_fetch_row($rsMasterClass);
	$MasterClass=$rowMasterClass[0];
?>
<?php
//echo "select distinct `Subject` from `DigitalVideo_URL` where `Class`='$MasterClass'";
//exit();
	$rsSubject=mysql_query("select distinct `Subject` from `DigitalVideo_URL` where `Class`='$MasterClass'");

	
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

	function fnlRedirect()
	{
		window.location.href ="DigitalVideoURL.php?Subject=" + document.getElementById("cboSubject").value;
		
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

}.style8 {

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
      <li class="first">You Are Here</li>
      <li>»</li>
      <li><a href="index.php">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">Digital Video</a></li>
    </ul>
  </div>
</div><!-- ######################################Div for News ################################################################# -->

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

<!-- #########################################Content TD Open ############################################################## -->    				<td>
			
    
<div>
  <div>
    <div>

<table border="1" width="100%" cellspacing="1" style="border-width:0px; border-collapse: collapse" height="80" bordercolor="#000000" id="table1">
	<tr>
		<td bgcolor="#76608A" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">
		<p style="margin-left: 10px">
		<span style="font-family: Cambria; font-weight: 700; font-size: 18px; color: #FFFFFF">
		Digital Video Library</span></td>
	</tr>
	<tr>		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">
		<p style="margin-left: 10px">&nbsp;</p>
		<table border="1" width="1012" height="131">
			<tr>
				<td colspan="2" align="center" height="38"><b><font face="Cambria">Subject 
				Selection</font></b></td>
			</tr>
			<tr>
				<td align="center" width="505" height="32"><b><font face="Cambria">
				Select Your Subject</font></b></td>
				<td align="center" width="505" height="32">
				<select size="1" name="cboSubject" id="cboSubject" onchange="fnlRedirect();">
				<option selected="" value="Select One">Select One</option>
				<?php
				while ($row=mysql_fetch_row($rsSubject))
				{
					$Subject=$row[0];
				
				?>
				<option  value="<?php echo $Subject;?>"><?php echo $Subject;?></option>
				<?php
				}
				?>
				</select></td>
			</tr>
			<tr>
				<td align="center" colspan="2">&nbsp;</td>
			</tr>
		</table>
		<p style="margin-left: 10px">&nbsp;</td>
	</tr>
</table>

</td>

<!--####################################Content TD close ################################################### -->
    
</tr>

</table>

<div class="wrapper col5">
  <div id="copyright" style="width: 100%; height: 58px">
    
    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.onlineschoolplanet.com" title="Online School Planet">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>