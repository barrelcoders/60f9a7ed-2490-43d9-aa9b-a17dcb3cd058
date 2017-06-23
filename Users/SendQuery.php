<?php include '../connection.php';?>
<?php include '../AppConf.php';?>
<?php
session_start();
$StudentName = $_SESSION['StudentName'];
$class = $_SESSION['StudentClass'];
$StudentRollNo = $_SESSION['StudentRollNo'];
$AdmissionId=$_SESSION['userid'];
$ssql="SELECT `srno`,`sname` ,`srollno`, `sclass` ,`parentquery`,`queryresponse`,`datetime`,`query_type` FROM `parent_query` as `a` where a.`sadmission`= '$AdmissionId' order by datetime desc";

$rs= mysql_query($ssql);
$num_rows=0;

	$isSubmit=$_REQUEST["isSubmit"];
	if($isSubmit=="yes")
	{
	//echo $AdmissionId=$_SESSION['userid'];
	//exit();
	
		$subject1 = $_REQUEST["cboSubject"];
		if ($subject1=="Studies Related")
		{
			$to1 = "principal@dpsfsis.com";
		}
		if ($subject1=="Transport")
		{
			$to1 = "principal@dpsfsis.com";
		}
		if ($subject1=="Admin")
		{
			$to1 = "vikaspuri@dpsfsis.com";
		}
		if ($subject1=="Fee")
		{
			$to1 = "accounts@dpsfsis.com";
		}
		if ($subject1=="Report Card")
		{
			$to1 = "principal@dpsfsis.com";
		}
		if ($subject1=="Sick Leave")
		{
			$to1 = "admin@dpsfsis.com";
		}		
			
		$subject = $_REQUEST["cboSubject"] . " ,Name:" . $StudentName . ",Class:" . $class . ",Roll No:" . $StudentRollNo;
		$message = $_REQUEST["txtQuery"];
		$from = "query@dpsfsis.com";
		$headers = "From:" . $from;
		mail($to1,$subject,$message,$headers);
		$ssql="INSERT INTO `parent_query` (`sadmission`,`sname`,`srollno`,`sclass`,`parentquery`,`query_type`) VALUES ('$AdmissionId','$StudentName','$StudentRollNo','$class','$message','$subject1')";
			//echo $ssql;
		mysql_query($ssql) or die(mysql_error());
		//echo "<br><br><center><b>Mail Sent Successfully";
		$Msg="<center><b>Mail Sent Successfully";
		//exit();
	}

?>



<script language="javascript">

	function fnlAck(SrNo)

	{
		//alert(SrNo);
		var myWindow = window.open("ExtraCarricularAck.php?SrNo="+SrNo,"MsgWindow","width=300,height=200");
		return;
	}

	function Validate()
	{
		if (document.getElementById("txtQuery").value=="Type your query here :")
		{
			alert("Message is mandatory");
			return;
		}
		document.getElementById("frmEMail").submit();
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
<head>
<title>Daily Classwork and Homework</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />

<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
<!--

.auto-style1 
{
	font-family: Calibri;
	font-size: 12pt;
}

.style4 
{
	border-top: medium none #000000;
	border-bottom: medium none #000000;
	font-family: Calibri;
	font-size: 12pt;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
}

.style2 
{
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top: medium none #000000;
	border-bottom: medium none #000000;
}

.style3 
{
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top: medium none #000000;
	border-bottom: medium none #000000;
}

.auto-style4 
{
	color: #000000;
}

.auto-style3 
{
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
}

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
      <li>&#187;</li>
      <li><a href="Notices.php">Home</a></li>
      <li>&#187;</li>
      <li>Send Query / Feedback To School</li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<!--<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>-->

<!-- ####################################################################################################### -->


 <div id="column" style="Float:left"><?php include 'SideMenu.php'; ?></div>
   
<div class="wrapper col3">
  <div id="container">
    <div id="content" style="width: 750px;">
      <h1>Send Query / Feedback to School</h1>&nbsp;
	  <table id="table2" bordercolor="#000000" class="auto-style8" style="width: 100%; border-top-width:0px">
	  
		<tr>
			<td height="35" align="center" style="border-top:1px solid #CCCCCC; border-bottom:medium none #000000; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium" class="auto-style1" colspan="4"><p align="left" class="auto-style2"><font face="Cambria">Dear Parent,</font></td>

		</tr>

		<tr>
			<td width="100%" height="35" align="center" style="border-top:medium none #000000; border-bottom:medium none #000000; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px" colspan="4" class="auto-style1"><p align="left" class="auto-style2"><font face="Cambria">We always welcome feedback from you and are always eager to listen from you.</font></td>
		</tr>

		<tr>
			<td width="100%" height="35" align="center" style="border-top:medium none #000000; border-bottom:medium none #000000; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px" colspan="4" class="auto-style1"><p align="left" class="auto-style2"><font face="Cambria">If you have any feedback, please share the same&nbsp;and we will respond to your queries as soon as possible. However, issues pertaining to policy of school should be availed in order to increase efficiency and would request each parent to go through the almanac before raising any such issues.</font></td>
		</tr>

		<tr>
			<td width="285" height="35" align="left" style="width: 48%; border-bottom-style:solid; border-bottom-width:1px; border-top-style:solid; border-top-width:1px" class="style4"><p align="left" class="auto-style2" style="width: 406px"><font face="Cambria"><strong>Student Name : <?php echo $_SESSION['StudentName']; ?></strong></font></td>
			
			<td width="142" height="35" align="left" style="border-top:1px solid #000000; border-bottom:1px solid #000000; border-right-style:none; border-right-width:medium; border-left-style:none; border-left-width:medium" bgcolor="#FFFFFF" colspan="2"><p align="left" class="auto-style2" style="width: 204px"><font face="Cambria"><strong>Class <?php echo $_SESSION['StudentClass']; ?></strong></font></td>

			<td width="100%" height="35" align="left" style="border-top:1px solid #000000; border-bottom:1px solid #000000; border-right-style:solid; border-right-width:1px; border-left-style:none; border-left-width:medium; width: 27%"><p align="left" class="auto-style2"><font face="Cambria"><strong>Roll No. <?php echo $_SESSION['StudentRollNo']; ?></strong></font></td>

		</tr>

		<form name="frmEMail" id="frmEMail" method="post" action="">
		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

			<tr>
				<td width="100%" height="35" align="left" style="width: 666px; colspan="2" class="style3"><font face="Cambria"><strong>Select&nbsp; subject of your query (*)</strong></font></td>
				<td width="100%" height="35" align="left" style="width: 666px; colspan="2" class="style3"><font face="Cambria">
					<select name="cboSubject" id="cboSubject">
						<option selected="" value="Studies Related">Studies Related</option>
						<option value="Transport">Transport</option>
						<option value="Admin">Admin</option>
						<option value="Fee">Fee</option>
						<option value="Report Card">Report Card</option>
						<option value="General Feedback">General Feedback</option>
						<option value="General Query">General Query</option>
					</select>
					</font>
				</td>
			</tr>
	
			<tr>
				<td width="1333" height="35" align="center" style="border-top:medium none #000000; border-bottom:medium none #000000; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px" colspan="4" class="auto-style4"><p align="left"><textarea rows="10" name="txtQuery" id="txtQuery" style="border: 1px solid #C0C0C0; width: 100%;" value="Subject :" onFocus="if (this.value == 'Type your query here :') { this.value=''; }" onBlur="if (this.value == '') { this.value='Type your query here :'; }" class="auto-style3" cols="20">Type your query here :</textarea></td>
	
			</tr>
	
			<tr>
				<td width="100%" height="35" align="center" style="border-top:medium none #000000; border-bottom:1px solid #000000; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px" colspan="4"><p align="left"><input type="button" value="Submit" name="btnSubmit" style="font-family: calibri; font-size: 11pt; color: #000000" onclick ="Javascript:Validate();"></td>
	
			</tr>

		</form>

		</table>

		<table border="1" width="100%" id="table4" style="border-collapse: collapse; border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px" bordercolor="#000000">
			<tr>
				<td height="35" align="center" style="border-bottom:medium none #000000; border-top-color: #000000; border-top-width: 1px; " bgcolor="#FFFFFF"><font face="Cambria"><b><span style="text-decoration: none">Previous Queries</span></b></font></font></td>
			</tr>
		</table>
		
		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table3">
			<tr>
				<td height="35" width="20" bgcolor="#FFFFFF"><span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">SrNo</span></td>
				<td height="35" width="50" bgcolor="#FFFFFF" align="center"><span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">Name</span></td>
				<td height="35" width="400" bgcolor="#FFFFFF" align="center"><span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">Subject of the Query</span></td>
				<td height="35" width="400" bgcolor="#FFFFFF" align="center"><span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">Parent Query</span></td>
				<td height="35" bgcolor="#FFFFFF" width="400" align="center"><span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">Query Response</span></td>
			</tr>
			
			<?php
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sname=$row[1];
					$sclass=$row[2];
					$srollno=$row[3];
					$parentquery=$row[4];
					$queryresponse=$row[5];
					$datetime=$row[6];
					$QueryType=$row[7];
					$num_rows=$num_rows+1;
			?>
			<tr>
				<td height="35" width="20" align="center"><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000"><?php echo $srno; ?></span></td>
				<td height="35" width="80" align="center"><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000"><?php echo $sname; ?></span></td>
				<td height="35" width="400" align="left"><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000"><?php echo $QueryType; ?></span></td>
				<td height="35" width="400" align="left"><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000"><?php echo $parentquery; ?></span></td>
				<td height="35" width="400" align="left"><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000"><?php echo $queryresponse; ?></span></td>
			</tr>
			
				<?php
				}
				?>
						
		</table>



		<div id="respond"></div>
    </div>
	<div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright" style="width: 100%; height: 30px">
    
    <p align="center">Powered By Online School Planet   |   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>