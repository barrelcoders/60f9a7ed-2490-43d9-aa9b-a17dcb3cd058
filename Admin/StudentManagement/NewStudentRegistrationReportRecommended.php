<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

	$Selectedname=$_REQUEST["txtname"];
	$Selectedregno=$_REQUEST["txtregno"];
	$Selectedclass=$_REQUEST["cboClass"];
	$Selectedmotheredu=$_REQUEST["txtMotherEducation"];
	$Selectedfatheredu=$_REQUEST["txtFatherEducation"];
	$Selecteddistance=$_REQUEST["txtdistance"];
	$Selectedfatheralumni=$_REQUEST["cbofatheralumni"];
	$Selectedmotheralumni=$_REQUEST["cbomotheralumni"]; 
	$Selectedage=$_REQUEST["txtage"]; 
	$Selectedsibling=$_REQUEST["txtsibling"]; 
	$Selectedlocation=$_REQUEST["txtlocation"]; 
	$SelectedFatherIncome=$_REQUEST["txtFatherAnnualIncome"]; 
	$SelectedMotherIncome=$_REQUEST["txtMotherAnnualIncome"]; 
	
	

	$ssql="SELECT `srno`, `RegistrationNo`, `RegistrationDate`, `sname`, `slastname`, `DOB`, `PlaceOfBirth`, `Age`, `AgeYear`, `AgeMonth`, `AgeDays`, `Sex`, `Sibling`, 
	`Father_DPS_Alumni`, `Mother_DPS_Alumni`, `Single_Parent`, `Special_Needs`, `Staff`, `OtherCategory`, `MotherTongue`, `Nationality`, `ResidentialAddress`, `Location`,
	 `Distance`, `PhoneNo`, `smobile`, `sclass`, `MasterClass`, `LastSchool`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherQualificationDuration`, `FatherOccupation`, 
	 `FatherDesignation`, `FatherAnnualIncome`, `FatherCompanyName`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `FatherMobileNo`, `FatherEmailId`, `MotherName`, `MotherAge`, 
	 `MotherEducation`, `MotherQualificationDuration`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`, `MotherCompanyName`, `MotherOfficeAddress`, `MotherOfficePhone`,
	  `MotherMobile`, `MotherEmail`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation`, `GuradianAnnualIncome`, `GuradianCompanyName`,
	   `GuradianOfficialAddress`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `TransportAvail`, `SafeTransport`, '' as `SpecialAttentionDetail`, `RealBroSisName`, `RealBroSisAdmissionNo`, 
	   `RealBroSisClass`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `EmergencyContactNo`,
	    `RegistrationFormNo`, `email`, '' as `routeno`, `ProfilePhoto`, `status`, `Remarks`, `quarter`, `FinancialYear`, `SchoolId`, `TxnAmount`, `TxnId`, `TxnStatus`, `BirthCertificate`, 
	    `ScoreCard`,`SystemDateTime` FROM `NewStudentRegistration` WHERE `Remarks`='Recommended' and sclass='Nursery'";


	//echo $ssql;
	//exit();
	

//echo $ssql;
//exit();
$ssql=$ssql." order by `SystemDateTime` desc limit 50";
$rs= mysql_query($ssql);



?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Student Registration Report</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

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
<br>
<br>
<table width="100%" class="CSSTableGenerator" border="1">
<tr>
        <td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">RegistrationNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">ProfilePhoto</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">BirthCertificate</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RegistrationDate</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sname</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">slastname</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">DOB</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">PlaceOfBirth</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Age</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AgeYear</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AgeMonth</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AgeDays</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Sex</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Sibling</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Father_DPS_Alumni</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Mother_DPS_Alumni</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Single_Parent</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Special_Needs</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Staff</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">OtherCategory</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherTongue</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Nationality</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">ResidentialAddress</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Location</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Distance</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">PhoneNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">smobile</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sclass</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">MasterClass</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">LastSchool</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sfathername</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">sfatherage</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherEducation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FatherQualificationDuration</font></b></td>
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
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">MotherQualificationDuration</font></b></td>
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
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">SpecialAttentionDetail</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RealBroSisName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RealBroSisAdmissionNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RealBroSisClass</font></b></td>
	    <td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniFatherName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniSchoolName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniPassingYear</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniMotherName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniMotherSchoolName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">AlumniMotherPassingYear</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">EmergencyContactNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">RegistrationFormNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">email</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">routeno</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">status</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Remarks</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">quarter</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">FinancialYear</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">SchoolId</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">TxnAmount</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">TxnId</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">TxnStatus</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">ScoreCard</font></b></td>
		
	
		
		
</tr>
<?php
	$RecCount=1;
	while($row = mysql_fetch_row($rs))
	{
	//$EmpId=$row[0];
	
?>
<tr>
<td style="width: 45px" font="Cambria"><?php echo $RecCount;?></td>
<td style="width: 40px" font="Cambria"><a href="FilledRegistrationForm.php?RegNo=<?php echo $row[1];?>" target="_blank"><?php echo $row[1];?></a></td>
<td style="width: 31px" font="Cambria"><a href="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $row[79];?>" target="_blank">Show Pic.</a></td>
<td style="width: 31px" font="Cambria"><a href="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $row[88];?>" target="_blank">Show Doc.</a></td>
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
<td style="width: 51px" font="Cambria"><?php echo $row[54];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[55];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[56];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[57];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[58];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[59];?></td>
<td style="width: 56px" font="Cambria"><?php echo $row[60];?></td>
<td style="width: 86px" font="Cambria"><?php echo $row[61];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[62];?></td>
<td style="width: 43px" font="Cambria"><?php echo $row[63];?></td>
<td style="width: 78px" font="Cambria"><?php echo $row[64];?></td>
<td style="width: 57px" font="Cambria"><?php echo $row[65];?></td>
<td style="width: 47px" font="Cambria"><?php echo $row[66];?></td>
<td style="width: 30px" font="Cambria"><?php echo $row[67];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[68];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[69];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[70];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[71];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[72];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[73];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[74];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[75];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[76];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[77];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[78];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[80];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[81];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[82];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[83];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[84];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[85];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[86];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[87];?></td>
<td style="width: 48px" font="Cambria"><a href="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $row[89];?>" target="_blank"><?php echo $row[89];?></a></td>
</tr>
<?php
$RecCount=$RecCount+1;
	}
?>
</table>

<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>