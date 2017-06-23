<?php
session_start();
include '../../connection.php';
?>
<?php
$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`smobile`,`ProfilePhoto` FROM `NewStudentRegistration` WHERE `sclass`='PREP'");
//$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`Sex` FROM `NewStudentRegistration` WHERE `status`='Selected' and `Location`='N.I.T NO-3' order by `Sex`");


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
.style14 {
	text-align: right;
}
</style>

<?php
$cnt=0;
while($row = mysql_fetch_row($rs))
{
	$profilepic="";
	$ApplicantName=$row[0];
	$sfathername=$row[1];
	$RegistrationNo=$row[2];
	$Mobile=$row[3];
	$profilepic=$row[4];
	
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
		<td colspan="2" style="border-top-color: #C0C0C0; border-top-width: 1px" height="82">
		<table style="width: 100%" cellpadding="0" class="style2">
			<tr>
				<td style="width: 80px; height: 65px;">
				<img src="../images/logo1.png" height="81" width="80">
				</td>
				<td class="style3" style="height: 65px">
				<p align="center"><font face="Cambria" style="font-size: 16pt; font-weight: 700">DELHI PUBLIC SCHOOL</font><br>
				<b>
				<font face="Cambria">PRE ADMISSION TEST</font></b><font face="Cambria"><b>
				- 2016-17</b></font><br>&nbsp;<b><font face="Cambria">Class PREP</font></b></td>
				<td style="width: 80px" class="style14"></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
				<b><font face="Cambria">IDENTITY CARD</font></b></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Applicant Name :</strong></font></td>
		<td class="style1" style="width: 300px"><span class="style10"><?php echo $ApplicantName;?></span><span class="style12"></span></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Father's Name :</strong></font></td>
		<td class="style13" style="width: 300px"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Reg. No. :</strong></font></td>
		<td class="style13" style="width: 300px"><?php echo $RegistrationNo;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Mobile No :</strong></font></td>
		<td class="style13" style="width: 300px"><?php echo $Mobile;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7" colspan="2"><font face="Cambria"><strong>Room No :</strong></font></td>
			</tr>
	<tr>
		<td style="width: 300px;" colspan="2" class="style8">
		<p align="left" class="style9"><font face="Cambria"><strong></strong></font></td>
		
	</tr>
</table>
</td>
<?php
	$ApplicantName="";
	$sfathername="";
	$RegistrationNo="";
	$Mobile="";
	$profilepic="";
	$row = mysql_fetch_row($rs);
		$ApplicantName=$row[0];
		$sfathername=$row[1];
		$RegistrationNo=$row[2];
		$Mobile=$row[3];
		$profilepic=$row[4];	
?>
<td style="width: 20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td style="width: 414px">
<?php 
if($ApplicantName !="")
{
?>
<table border="1" width="100%" cellspacing="0" cellpadding="0" class="style5">
	<tr>
		<td colspan="2" style="border-top-color: #C0C0C0; border-top-width: 1px" height="85">
		<table style="width: 100%" cellpadding="0" class="style2">
			<tr>
				<td style="width: 80px; height: 65px;">
				<img src="../images/logo1.png" height="75" width="80">
				</td>
				<td class="style3" style="height: 65px">
				<p align="center"><font face="Cambria" style="font-size: 16pt; font-weight: 700">DELHI PUBLIC SCHOOL</font><br>
				<b>
				<font face="Cambria">PRE ADMISSION TEST</font></b><font face="Cambria"><b>
				- 2016-17</b></font><br>&nbsp;<b><font face="Cambria">Class PREP</font></b></td>
				<td style="width: 80px" class="style14"></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
				<b><font face="Cambria">IDENTITY CARD</font></b></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Applicant Name :</font></td>
		<td class="style13" style="width: 366px"><?php echo $ApplicantName;?></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Father's Name :</font></td>
		<td class="style13" style="width: 366px"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Reg. No. :</font></td>
		<td class="style13" style="width: 366px"><?php echo $RegistrationNo;?></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">Mobile No :</font></td>
		<td class="style13" style="width: 366px"><?php echo $Mobile;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7" colspan="2"><font face="Cambria"><strong>Room No :</strong></font></td>
		
	</tr>
	<tr>
		<td align="center" colspan="2" style="border-top-style: none; border-top-width: medium; width: 366px;" class="style10">
		<p align="left" class="style11"><font face="Cambria"></font></td>
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