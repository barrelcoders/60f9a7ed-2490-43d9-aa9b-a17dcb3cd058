<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedname=$_REQUEST["txtname"];
	$Selectedregno=$_REQUEST["txtregno"];
	$Selectedclass=$_REQUEST["txtclass"];
	$Selectedmotheredu=$_REQUEST["txtmotheredu"];
	$Selectedfatheredu=$_REQUEST["txtfatheredu"];
	
	

	$ssql="select `srno` ,`RegistrationNo`,`RegistrationDate`,`sname`,`DOB`,`PlaceOfBirth`,`Age`,`Sex`,`Category`,`MotherTongue`,`Nationality`,`ResidentialAddress`,
`PermanentAddress`,`Distance`,`PhoneNo`,`smobile`,`sclass`,`MasterClass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,
`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherOccupatoin`,`MotherDesignation`,
`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,
`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`ContributionArea`,
`StudentWeeknessStrength`,`SpecialAttentionDetail`,`StudetnPreviousHistory`,`RealBroSisName`,`RealBroSisSchool`,`RealBroSisClass`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`EmergencyContactNo`,`RegistrationFormNo`,`simei`,`suser`,`spassword`,`email`,
`routeno`,`ProfilePhoto`,`GCMAccountId`,`status`,`Remarks`,`FeeSubmissionType`,`DiscontType`,`quarter`,`FinancialYear`,`SchoolId` from `NewStudentRegistration` where 1=1";


	//echo $ssql;
	//exit();
	if($Selectedname!="Select One")
	{
		$ssql=$ssql." and `sname`='$Selectedname'";
	}
	if($Selectedregno!="Select One")
	{
		$ssql=$ssql." and `RegistrationNo`='$Selectedregno'";
	}

	if($Selectedclass!="")

	{

		$ssql=$ssql." and `sclass`='".$Selectedclass."'";

	}
	if($Selectedmotheredu!="")

	{

		$ssql=$ssql." and `MotherEducation`='".$Selectedmotheredu."'";

	}
	if($Selectedfatheredu!="")

	{

		$ssql=$ssql." and `FatherEducation`='".$Selectedfatheredu."'";

	}


$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Student Registration Report</title>

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
<p><b><font face="Cambria">New Student Registration Report</font></b></p>

<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="NewStudentRegistrationReport1.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 278px">
<p align="center"><font face="Cambria">Name of Applicant.</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtname" type="text"></font>
</td>
<td style="width: 278px"><p align="center"><font face="Cambria">Registration No.</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtregno" type="text"></font></td>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">
<span style="font-family: sans-serif; font-weight: 700; font-size: 13px; letter-spacing: normal; background-color: #FFFFFF">
Class</span></td>
<td style="width: 278px">	<font face="Cambria">
<input name="txtclass" type="text"></font></td>
<td style="width: 278px"><p align="center">
<span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: bold; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">
Mother Education</span></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtmotheredu" type="text"></font></td>
</tr>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">
<span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: bold; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">
Father Education</span></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtfatheredu" type="text"></font></td>
<td style="width: 278px"><p align="center">&nbsp;</td>
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
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
<table width="1779" style="border-collapse: collapse;" border="1">
<tr>
<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">RegistrationNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RegistrationDate</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sname</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">DOB</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">PlaceOfBirth</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Age</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Sex</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Category</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherTongue</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Nationality</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">ResidentialAddress</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">PermanentAddress</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Distance</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">PhoneNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">smobile</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sclass</font></b></td>
		   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">MasterClass</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">LastSchool</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sfathername</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sfatherage</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherEducation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherOccupation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherDesignation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherAnnualIncome</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherCompanyName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherOfficeAddress</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherOfficePhoneNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherMobileNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherEmailId</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherAge</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherEducation</font></b></td>
		   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">MotherOccupatoin</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherDesignation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MontherAnnualIncome</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherCompanyName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherOfficeAddress</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherOfficePhone</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherMobile</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherEmail</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianAge</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradinaEducation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianOccupation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianDesignation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianAnnualIncome</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianCompanyName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianOfficialAddress</font></b></td>
		   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">GuradianOfficialPhNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GuradianMobileNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">TransportAvail</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">SafeTransport</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">ContributionArea</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">StudentWeeknessStrength</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">SpecialAttentionDetail</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">StudetnPreviousHistory</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RealBroSisName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RealBroSisSchool</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RealBroSisClass</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniFatherName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniSchoolName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniPassingYear</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">EmergencyContactNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RegistrationFormNo</font></b></td>
		   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">simei</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">suser</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">spassword</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">email</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">routeno</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">ProfilePhoto</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">GCMAccountId</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">status</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Remarks</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FeeSubmissionType</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">DiscontType</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">quarter</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FinancialYear</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">SchoolId</font></b></td>
		
</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[0];
?>
<tr>
<td style="width: 45px" font="Cambria"><?php echo $row[0];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[1];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[2];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[3];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[4];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[5];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[6];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[7];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[8];?></td>
<td style="width: 56px" font="Cambria"><?php echo $row[9];?></td>
<td style="width: 86px" font="Cambria"><?php echo $row[10];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[11];?></td>
<td style="width: 43px" font="Cambria"><?php echo $row[12];?></td>
<td style="width: 78px" font="Cambria"><?php echo $row[13];?></td>
<td style="width: 57px" font="Cambria"><?php echo $row[14];?></td>
<td style="width: 47px" font="Cambria"><?php echo $row[15];?></td>
<td style="width: 30px" font="Cambria"><?php echo $row[16];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[17];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[18];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[19];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[20];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[21];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[22];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[23];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[24];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[25];?></td>
<td style="width: 56px" font="Cambria"><?php echo $row[26];?></td>
<td style="width: 86px" font="Cambria"><?php echo $row[27];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[28];?></td>
<td style="width: 43px" font="Cambria"><?php echo $row[29];?></td>
<td style="width: 78px" font="Cambria"><?php echo $row[30];?></td>
<td style="width: 57px" font="Cambria"><?php echo $row[31];?></td>
<td style="width: 47px" font="Cambria"><?php echo $row[32];?></td>
<td style="width: 30px" font="Cambria"><?php echo $row[33];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[34];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[35];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[36];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[37];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[38];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[39];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[40];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[41];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[42];?></td>
<td style="width: 56px" font="Cambria"><?php echo $row[43];?></td>
<td style="width: 86px" font="Cambria"><?php echo $row[44];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[45];?></td>
<td style="width: 43px" font="Cambria"><?php echo $row[46];?></td>
<td style="width: 78px" font="Cambria"><?php echo $row[47];?></td>
<td style="width: 57px" font="Cambria"><?php echo $row[48];?></td>
<td style="width: 47px" font="Cambria"><?php echo $row[49];?></td>
<td style="width: 30px" font="Cambria"><?php echo $row[50];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[51];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[52];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[53];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[58];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[59];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[60];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[61];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[62];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[63];?></td>
<td style="width: 56px" font="Cambria"><?php echo $row[64];?></td>
<td style="width: 86px" font="Cambria"><?php echo $row[65];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[66];?></td>
<td style="width: 43px" font="Cambria"><?php echo $row[67];?></td>
<td style="width: 78px" font="Cambria"><?php echo $row[68];?></td>
<td style="width: 57px" font="Cambria"><?php echo $row[69];?></td>
<td style="width: 47px" font="Cambria"><?php echo $row[70];?></td>
<td style="width: 30px" font="Cambria"><?php echo $row[71];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[72];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[73];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[74];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[75];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[76];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[77];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[78];?></td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld 
		Technologies LLP</font></div>
</div>
</body>
</html>