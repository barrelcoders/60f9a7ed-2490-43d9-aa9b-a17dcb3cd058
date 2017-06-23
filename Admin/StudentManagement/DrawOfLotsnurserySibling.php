<?php
session_start();
include '../../connection.php';
?>
<?php
$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`Sex` FROM `NewStudentRegistration` WHERE   `RegistrationNo` in ('N655','N657') ORDER BY `srno` DESC ");

//$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`Sex` FROM `NewStudentRegistration` WHERE   `sclass`='Nursery' and `Sex`='Male' and `FinalScore` >=55 ");
//$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`, FROM `NewStudentRegistration` WHERE `status`='Selected' and `Location`='N.I.T NO-3' order by `Sex`");


$cnt=0;
?>
<script language="javascript">
	function printDiv() 
	{
	        //Get the HTML of div
	        var divElements = document.getElementById("MasterDiv").innerHTML;
	        //Get the HTML of whole page
	        var oldPage = document.body.innerHTML;
	        //Reset the page's HTML with div's HTML only
	        document.body.innerHTML = "<html><head><title></title></head><body>" + 
	          divElements + "</body>";
	        //Print Page
	        window.print();
	        //Restore orignal HTML
	        document.body.innerHTML = oldPage;
	 }
</script>
<html>
<head>
	<meta http-equiv="Content-Language" content="en-us">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<meta name="author" content="gencyolcu" />

	<title>Draw of Lots</title>
	
</head>

<body>
<div id="MasterDiv">
<style type="text/css">
.style1 {
	font-family: Cambria;
}
.style2 {
	border-collapse: collapse;
}
.style3 {
	text-align: center;
}
.style4 {
	font-weight: bold;
	border-width: 1px;
	font-size: 11pt;
}
.style5 {
	border-collapse: collapse;
	border-top-width: 0px;
}
.style7 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 11pt;
}
.style8 {
	font-family: Cambria;
	font-size: x-small;
}
.style9 {
	font-size: 11pt;
	font-weight: normal;
}
.style10 {
	font-size: 11pt;
}
.style11 {
	font-size: 11pt;
	font-weight: bold;
}
.style12 {
	font-size: 11pt;
}
.style13 {
	font-family: Cambria;
	font-size: 11pt;
}
</style>

<?php
$cnt=0;
while($row = mysql_fetch_row($rs))
{
	$ApplicantName=$row[0];
	$sfathername=$row[1];
	$RegistrationNo=$row[2];
	$Gender=$row[3];

	
	//if($cnt % 2 ==0)
	//{
		//line break
	//}
	//echo $ApplicantName."<br>";
	//$row = mysql_fetch_row($rs);
	//$ApplicantName=$row[0];
	//echo $ApplicantName."<br>";

?>
<table width="100%" border="0" cellpadding="0" class="style2">
<tr>
<td style="width: 414px">
<table border="1" width="100%" cellspacing="0" cellpadding="0" class="style5">
	<tr>
		<td colspan="2" style="border-top-color: #C0C0C0; border-top-width: 1px">
		<table style="width: 100%" cellpadding="0" class="style2">
			<tr>
				<td style="width: 80px; height: 65px;">
				<img src="../images/logo1.png" height="64" width="80">
				</td>
				<td class="style3" style="height: 65px">
				<p align="center"><font face="Cambria" style="font-size: 16pt; font-weight: 700">DELHI PUBLIC SCHOOL</font><br><font face="Cambria"><b>SECTOR - 19, FARIDABAD</b></font><br><font face="Cambria"><b>
		DRAW OF LOTS - 2017-18</b></font>
				</td>
				<td style="width: 80px"></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Applicant Name :</strong></font></td>
		<td class="style1" style="width: 300px">
		<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">
		VIAAN SATIJA,AARAV SATIJA</span></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Father's Name :</strong></font></td>
		<td class="style13" style="width: 300px"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Reg. No. :</strong></font></td>
		<td class="style13" style="width: 300px">N657,N655</td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Gender :</strong></font></td>
		<td class="style13" style="width: 300px">Male</td>
	</tr>
	<tr>
		<td class="style8" colspan="2">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 300px;" class="style8">
		<p align="left" class="style9"><font face="Cambria"><strong>Parent Signature</strong></font></td>
		<td style="width: 300px;">
		<p align="right" class="style10"><font face="Cambria"><strong>Registration Desk</strong></font></td>
	</tr>
</table>
</td>
<?php
	$ApplicantName="";
	$sfathername="";
	$RegistrationNo="";
	$Gender="";
	$sclass="";

	$row = mysql_fetch_row($rs);
		$ApplicantName=$row[0];
		$sfathername=$row[1];
		$RegistrationNo=$row[2];
		$Gender=$row[3];	
	
?>
<td style="width: 20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td style="width: 414px">
<?php 
if($ApplicantName !="")
{
?>
<table border="1" width="100%" cellspacing="0" cellpadding="0" class="style5">
	<tr>
		<td colspan="2" style="border-top-color: #C0C0C0; border-top-width: 1px">
		<table style="width: 100%" cellpadding="0" class="style2">
			<tr>
				<td style="width: 80px; height: 64px;">
				<img src="../images/logo1.png" height="64" width="80">
				</td>
				<td class="style3" style="height: 64px"><p align="center"><font face="Cambria" style="font-size: 16pt; font-weight: 700">DELHI PUBLIC SCHOOL</font><br><font face="Cambria"><b>SECTOR - 19, FARIDABAD</b></font><br><font face="Cambria"><b>
		DRAW OF LOTS - 2017-18</b></font></td>
				<td style="width: 80px; height: 64px;">&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Applicant Name :</font></td>
		<td class="style13" style="width: 366px">
		<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none">
		AARAV SATIJA,</span><span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">VIAAN 
		SATIJA</span></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Father's Name :</font></td>
		<td class="style13" style="width: 366px"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Reg. No. :</font></td>
		<td class="style13" style="width: 366px">N655,N657</td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Gender :</font></td>
		<td class="style13" style="width: 366px">Male</td>
	</tr>
	<tr>
		<td align="center" style="border-top-style: none; border-top-width: medium; " class="style10" colspan="2">
		&nbsp;</td>
	</tr>
	<tr>
		<td align="center" style="border-top-style: none; border-top-width: medium; width: 366px;" class="style10">
		<p align="left" class="style11"><font face="Cambria">Parent Signature</font></td>
		<td align="center" style="border-top-style: none; border-top-width: medium; width: 366px;">
		<p align="right" class="style11"><font face="Cambria">Registration Desk</font></td>
	</tr>
</table>
<?php
}
?>


</td>
</tr><br>
<!--<tr>
<td>
&nbsp;</td>
<td>&nbsp;</td>
<td>
&nbsp;</td>
</tr>-->
</table>

<?php
	$cnt=$cnt+1;
	if($cnt==3)
	{
		$cnt=0;
?>		
<p style="page-break-before: always">		
<?php
	}
}
?>


</div>

<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a>

	</font>

	</div>
</body>
</html>