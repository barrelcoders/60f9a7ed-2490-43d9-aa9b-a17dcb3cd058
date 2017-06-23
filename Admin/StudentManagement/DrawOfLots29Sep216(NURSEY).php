<?php
session_start();
include '../../connection.php';
?>
<?php
$DrawClass=$_REQUEST["cboClass"];
$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`smobile`,`ProfilePhoto`  FROM `NewStudentRegistration`  WHERE `sclass`='$DrawClass' order by `ApplicantName`");
//$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`Sex` FROM `NewStudentRegistration` WHERE `status`='Selected' and `Location`='N.I.T NO-3' order by `Sex`");

//echo "SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`smobile`,`ProfilePhoto`  FROM `NewStudentRegistration`  WHERE `sclass`='$DrawClass'";
//exit();

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
.style16 {
	font-size: 12pt;
}

.style17 {

	height: 75px;
	width: 420px;
	background-repeat-x: no-repeat;
	background-repeat-y: no-repeat;
}

</style>

<?php
$cnt=0;
$recno=0;
while($row = mysql_fetch_row($rs))
{
	$profilepic="";
	$ApplicantName=$row[0];
	$sfathername=$row[1];
	$RegistrationNo=$row[2];
	$Mobile=$row[3];
	$profilepic=$row[4];
	$recno= $recno+1;
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
		<td colspan="4" style="border-top-color: #C0C0C0; border-top-width: 1px" height="67">
		<table style="width: 100%" cellpadding="0" class="style2">
			<tr>
			<td style="width: 100px; height: 65px;">
				<img src="../images/logo1.png" height="65" width="60">
				</td>
	
				<td style="height: 67px;" class="style17">
			<p align="center">
				<font face="Cambria" style="font-weight: 700" class="style16">
				&nbsp;DELHI PUBLIC SCHOOL, FARIDABAD</font><br>
				<b>
				<font size="2" face="Cambria">&nbsp;PRE ADMISSION TEST</font></b><font face="Cambria"><b><font size="2"> 
				- 2016-17</font></b></font><font size="2"><br></font>&nbsp;<font size="2" face="Cambria"><b>&nbsp; </b></font>
				<font class="style16">
				<font style="font-weight: 700" face="Cambria">December 22,2015</font></font></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center">
				&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7" colspan="2"><font face="Cambria"><strong>&nbsp;Name :</strong></font></td>
		<td class="style1" style="width: 300px" colspan="2"><span class="style10"><?php echo $ApplicantName;?></span><span class="style12"></span></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7" colspan="2"><font face="Cambria"><strong>Father's Name :</strong></font></td>
		<td class="style13" style="width: 300px" colspan="2"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>
		S.No :</strong></font></td>
		<td style="width: 300px" class="style7"><?php echo $recno;?></td>
		<td class="style13" style="width: 300px"><b>Reg. No :</b></td>
		<td class="style13" style="width: 300px"><?php echo $RegistrationNo;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7" colspan="2"><strong>Appearing for Class</strong><font face="Cambria"><strong>:</strong></font></td>
		<td class="style13" style="width: 300px" colspan="2"><?php echo $DrawClass;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7" colspan="4">&nbsp;</td>
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
		$recno= $recno+1;

?>
<td style="width: 20px">
&nbsp;</td>
<td style="width: 414px" align="right">
<?php 
if($ApplicantName !="")
{
?>
<table border="1" width="100%" cellspacing="0" cellpadding="0" class="style5">
	<tr>
		<td colspan="4" style="border-top-color: #C0C0C0; border-top-width: 1px" height="67">
		<table style="width: 100%" cellpadding="0" class="style2">
			<tr>
			<td style="width: 100px; height: 65px;">
				<img src="../images/logo1.png" height="65" width="60">
				</td>
	
				<td style="height: 67px;" class="style17">
			<p align="center">
				<font face="Cambria" style="font-weight: 700" class="style16">
				&nbsp;DELHI PUBLIC SCHOOL, FARIDABAD</font><br>
				<b>
				<font size="2" face="Cambria">&nbsp;PRE ADMISSION TEST</font></b><font face="Cambria"><b><font size="2"> 
				- 2016-17</font></b></font><font size="2"><br></font>
				<font class="style16">
				<font style="font-weight: 700" face="Cambria">&nbsp; December 
				22,2015&nbsp;</font></font></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center">
				&nbsp;</td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px" colspan="2"><font face="Cambria">&nbsp;Name :</font></td>
		<td class="style13" style="width: 366px" colspan="2"><?php echo $ApplicantName;?></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px" colspan="2"><font face="Cambria">Father's Name :</font></td>
		<td class="style13" style="width: 366px" colspan="2"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px"><font face="Cambria">S.No : </font></td>
		<td class="style4" style="width: 366px"><span style="font-weight: 400"><?php echo $recno;?></span></td>
		<td class="style13" style="width: 366px"><b>Reg. No :`</b></td>
		<td class="style13" style="width: 366px"><?php echo $RegistrationNo;?></td>
	</tr>
	<tr>
		<td class="style4" style="width: 366px" colspan="2"><strong>Appearing for Class</strong><font face="Cambria"></font></td>
		<td class="style13" style="width: 366px" colspan="2"><?php echo $DrawClass;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7" colspan="4" height="21">&nbsp;</td>
		
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