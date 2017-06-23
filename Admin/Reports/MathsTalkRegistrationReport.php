
<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedschoolname=$_REQUEST["CboSchoolName"];
	
	

	$ssql="SELECT `srno`, `sname`, `sfathername`, `sclass`, `School`, `SchoolAddress`, `smobile`, `semailId`, `PrincipalName`, `PrincipalEmailId`, `PrincipalMobileNo`, `MathsTeacherName`, `MathsTeacherMobileNo`, `MathsTeacherEmailiId`, `PrincipalRecommendationStatus`, `MathsTeacherRecommendationStatus`, `AttendanceStatus` FROM `MathTalk_Registration` WHERE 1=1";

	//echo $ssql;
	//exit();
	if($Selectedschoolname!="Select One")
	{
		$ssql=$ssql." and `School`='$Selectedschoolname'";
	}
	


$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Maths Talk Registration</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

.style1 {

	text-align: center;

}

.footer {

    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;

}   

.footer_contents 

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;

}


</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Maths Talk Registration Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="MathsTalkRegistrationReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px">
<p align="left"><font face="Cambria">School Name:</font></td>
<td style="width: 305px"><font face="Cambria">
	 <select name="CboSchoolName" id="CboSchoolName" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `School` FROM `MathTalk_Registration`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select> </font>
</td>
<td style="width: 359px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 305px">&nbsp;</td>
<td style="width: 359px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700"></font></td>
</tr>
</form>
</table>
<font face="Cambria">
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
</font>
<table width="100%" style="border-collapse: collapse;" border="1" class="CSSTableGenerator">
<tr>
<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" >
		<b><font face="Cambria">Student Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Father Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">School Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b>S<font face="Cambria">chool Address</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Mobile No</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Email Id</font></b></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Principal Name</b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Principal Email Id</b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Principal Mobile </b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Math Teacher Name</b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Math Teacher Email Id </b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Math Teacher Mobile</b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Principal Recommendation</b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Math Teacher Recommendation</b></font></td>
		
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><b>Attendance</b></font></td>
		
		
		
</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[0];
?>
<tr>
<td style="width: 45px" font="Cambria"><font face="Cambria"><?php echo $row[0];?></font></td>
<td style="width: 40px" font="Cambria"><font face="Cambria"><?php echo $row[1];?></font></td>
<td style="width: 31px" font="Cambria"><font face="Cambria"><?php echo $row[2];?></font></td>
<td style="width: 75px" font="Cambria"><font face="Cambria"><?php echo $row[3];?></font></td>
<td style="width: 48px" font="Cambria" ><font face="Cambria"><?php echo $row[4];?></font></td>
<td style="width: 46px" font="Cambria"><font face="Cambria"><?php echo $row[5];?></font></td>
<td style="width: 78px" font="Cambria"><font face="Cambria"><?php echo $row[6];?></font></td>
<td style="width: 57px" font="Cambria"><font face="Cambria"><?php echo $row[7];?></font></td>
<td style="width: 47px" font="Cambria"><font face="Cambria"><?php echo $row[8];?></font></td>
<td style="width: 45px" font="Cambria"><font face="Cambria"><?php echo $row[9];?></font></td>
<td style="width: 40px" font="Cambria"><font face="Cambria"><?php echo $row[10];?></font></td>
<td style="width: 31px" font="Cambria"><font face="Cambria"><?php echo $row[11];?></font></td>
<td style="width: 75px" font="Cambria"><font face="Cambria"><?php echo $row[12];?></font></td>
<td style="width: 48px" font="Cambria"><font face="Cambria"><?php echo $row[13];?></font></td>
<td style="width: 46px" font="Cambria"><font face="Cambria"><?php echo $row[14];?></font></td>
<td style="width: 78px" font="Cambria"><font face="Cambria"><?php echo $row[15];?></font></td>
<td style="width: 78px" font="Cambria"><font face="Cambria"><?php echo $row[16];?></font></td>

</tr>
<?php
	}
?>
</table>
<font face="Cambria">
<?php
}
?>
</font>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>
