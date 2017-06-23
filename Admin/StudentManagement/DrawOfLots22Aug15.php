<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$rs=mysql_query("SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo` FROM `NewStudentRegistration` WHERE `L2ApprovalStatus`='Approved'");


$cnt=0;
/*
while($row = mysql_fetch_row($rs))
{
	$ApplicantName=$row[0];
	$sfathername=$row[1];
	$RegistrationNo=$row[2];
	$cnt=$cnt+1;
	if($cnt % 2 ==0)
	{
		//line break
	}
	echo $ApplicantName."/".$sfathername."/".$RegistrationNo."<br>";
	$row = mysql_fetch_row($rs);
	$ApplicantName=$row[0];
	$sfathername=$row[1];
	$RegistrationNo=$row[2];
	
	echo $ApplicantName."/".$sfathername."/".$RegistrationNo."<br>";
	
}
*/
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
</style>
<table width="100%" border="0" cellpadding="0" class="style2">
<?php
$cnt=0;
while($row = mysql_fetch_row($rs))
{
	$ApplicantName=$row[0];
	$sfathername=$row[1];
	$RegistrationNo=$row[2];
	
	//if($cnt % 2 ==0)
	//{
		//line break
	//}
	//echo $ApplicantName."<br>";
	//$row = mysql_fetch_row($rs);
	//$ApplicantName=$row[0];
	//echo $ApplicantName."<br>";

?>
<tr>
<td>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top-width: 0px">
	<tr>
		<td colspan="2" style="border-top-color: #C0C0C0; border-top-width: 1px">
		<p align="center">
		<font face="Cambria" style="font-size: 16pt; font-weight: 700">DELHI 
		PUBLIC SCHOOL</font></td>
	</tr>
	<tr>
		<td colspan="2">
		<p align="center"><font face="Cambria"><b>SECTOR - 19, FARIDABAD</b></font></td>
	</tr>
	<tr>
		<td colspan="2">
		<p align="center"><font face="Cambria"><b>DRAW OF LOTS - 2016-17</b></font></td>
	</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td width="589"><font face="Cambria"><b>Applicant Name :</b></font></td>
		<td width="590" class="style1"><?php echo $ApplicantName;?></td>
	</tr>
	<tr>
		<td width="589"><font face="Cambria"><b>Father's Name :</b></font></td>
		<td width="590"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td width="589"><font face="Cambria"><b>Reg. No. :</b></font></td>
		<td width="590"><?php echo $RegistrationNo;?></td>
	</tr>
	<tr>
		<td width="589">&nbsp;</td>
		<td width="590">&nbsp;</td>
	</tr>
	<tr>
		<td width="1179" align="center" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="589" align="center" style="border-top-style: none; border-top-width: medium">
		<p align="left"><font face="Cambria"><b>Parent Signature</b></font></td>
		<td width="590" align="center" style="border-top-style: none; border-top-width: medium">
		<p align="right"><font face="Cambria"><b>Registration Desk</b></font></td>
	</tr>
</table>
</td>
<?php
	$ApplicantName="";
	$sfathername="";
	$RegistrationNo="";
	$row = mysql_fetch_row($rs);
		$ApplicantName=$row[0];
		$sfathername=$row[1];
		$RegistrationNo=$row[2];	
?>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td>
<?php 
if($ApplicantName !="")
{
?>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top-width: 0px">
	<tr>
		<td colspan="2" style="border-top-color: #C0C0C0; border-top-width: 1px">
		<p align="center">
		<font face="Cambria" style="font-size: 16pt; font-weight: 700">DELHI 
		PUBLIC SCHOOL</font></td>
	</tr>
	<tr>
		<td colspan="2">
		<p align="center"><font face="Cambria"><b>SECTOR - 19, FARIDABAD</b></font></td>
	</tr>
	<tr>
		<td colspan="2">
		<p align="center"><font face="Cambria"><b>DRAW OF LOTS - 2016-17</b></font></td>
	</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td width="589"><font face="Cambria"><b>Applicant Name :</b></font></td>
		<td width="590"><?php echo $ApplicantName;?> </td>
	</tr>
	<tr>
		<td width="589"><font face="Cambria"><b>Father's Name :</b></font></td>
		<td width="590"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td width="589"><font face="Cambria"><b>Reg. No. :</b></font></td>
		<td width="590"><?php echo $RegistrationNo;?></td>
	</tr>
	<tr>
		<td width="589">&nbsp;</td>
		<td width="590">&nbsp;</td>
	</tr>
	<tr>
		<td width="100%" align="center" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="589" align="center" style="border-top-style: none; border-top-width: medium">
		<p align="left"><font face="Cambria"><b>Parent Signature</b></font></td>
		<td width="590" align="center" style="border-top-style: none; border-top-width: medium">
		<p align="right"><font face="Cambria"><b>Registration Desk</b></font></td>
	</tr>
</table>
<?php
}
?>


</td>
</tr>
<tr>
<td>
&nbsp;</td>
<td>&nbsp;</td>
<td>
&nbsp;</td>
</tr>
<?php
	$cnt=$cnt+1;
	if($cnt==3)
	{
		$cnt=0;
		echo '<p style="page-break-before: always">';
	}

}
?>
</table>
</div>

<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a>

	</font>

	</div>
</body>
</html>