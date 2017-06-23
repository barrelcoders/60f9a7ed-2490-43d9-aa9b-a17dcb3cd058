<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>


<?php

	$SelectedRegistrationNo=$_REQUEST["RegNo"];
	$SelectedFinancialYear=$_REQUEST["FinancialYear"];

	
if($SelectedFinancialYear=="2016")
{
	$ssql="SELECT `srno`, `RegistrationNo`, `RegistrationDate`, `sname`, `slastname`, DATE_FORMAT(`DOB`,'%d-%m-%Y') as `DOB`, `PlaceOfBirth`, `Age`, `AgeYear`, `AgeMonth`, `AgeDays`, `Sex`, `Sibling`,`Father_DPS_Alumni`, `Mother_DPS_Alumni`, `Single_Parent`, `Special_Needs`, `Staff`, `OtherCategory`, `MotherTongue`, `Nationality`, `ResidentialAddress`, `Location`, `Distance`,`PhoneNo`, `smobile`, `sclass`, `MasterClass`, `LastSchool`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherQualificationDuration`, `FatherOccupation`, `FatherDesignation`,`FatherAnnualIncome`, `FatherCompanyName`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `FatherMobileNo`, `FatherEmailId`, `MotherName`, `MotherAge`, `MotherEducation`,`MotherQualificationDuration`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`, `MotherCompanyName`, `MotherOfficeAddress`, `MotherOfficePhone`, `MotherMobile`,`MotherEmail`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation`, `GuradianAnnualIncome`, `GuradianCompanyName`,`GuradianOfficialAddress`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `TransportAvail`, `SafeTransport`, '' as `SpecialAttentionDetail`, `RealBroSisName`, `RealBroSisAdmissionNo`,`RealBroSisClass`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`,`AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `EmergencyContactNo`, `RegistrationFormNo`, `email`, '' as `routeno`, `ProfilePhoto`, `status`, `Remarks`, `quarter`,`FinancialYear`, `SchoolId`, `TxnAmount`, `TxnId`, `TxnStatus`, `BirthCertificate`, `ScoreCard`, `SystemDateTime`,`AdmissionFeeReceipt`,`sadmission`,DATE_FORMAT(`AdmissionDate`,'%d-%m-%Y') as `AdmissionDate`,`FatherPhoto`,`MotherPhoto`,`AddressProofPhoto`  FROM `NewStudentAdmission` as `a` WHERE 1=1 ";

}
else
{


	$ssql="SELECT `srno`, `RegistrationNo`, `RegistrationDate`, `sname`, `slastname`, DATE_FORMAT(`DOB`,'%d-%m-%Y') as `DOB`, `PlaceOfBirth`, `Age`, `AgeYear`, `AgeMonth`, `AgeDays`, `Sex`, `Sibling`,`Father_DPS_Alumni`, `Mother_DPS_Alumni`, `Single_Parent`, `Special_Needs`, `Staff`, `OtherCategory`, `MotherTongue`, `Nationality`, `ResidentialAddress`, `Location`, `Distance`,`PhoneNo`, `smobile`, `sclass`, `MasterClass`, `LastSchool`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherQualificationDuration`, `FatherOccupation`, `FatherDesignation`,`FatherAnnualIncome`, `FatherCompanyName`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `FatherMobileNo`, `FatherEmailId`, `MotherName`, `MotherAge`, `MotherEducation`,`MotherQualificationDuration`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`, `MotherCompanyName`, `MotherOfficeAddress`, `MotherOfficePhone`, `MotherMobile`,`MotherEmail`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation`, `GuradianAnnualIncome`, `GuradianCompanyName`,`GuradianOfficialAddress`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `TransportAvail`, `SafeTransport`, '' as `SpecialAttentionDetail`, `RealBroSisName`, `RealBroSisAdmissionNo`,`RealBroSisClass`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`,`AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `EmergencyContactNo`, `RegistrationFormNo`, `email`, '' as `routeno`, `ProfilePhoto`, `status`, `Remarks`, `quarter`,`FinancialYear`, `SchoolId`, `TxnAmount`, `TxnId`, `TxnStatus`, `BirthCertificate`, `ScoreCard`, `SystemDateTime` ,DATE_FORMAT(`AdmissionDate`,'%d-%m-%Y') as `AdmissionDate`,`sadmission`,`AdmissionDate`,`FatherPhoto`,`MotherPhoto`,`AddressProofPhoto`  FROM `NewStudentAdmission` as `a` WHERE 1=1 ";
	}
	if($SelectedRegistrationNo!="")
	{
		$ssql=$ssql." and `RegistrationNo`='$SelectedRegistrationNo' and `FinancialYear`='$SelectedFinancialYear'";

	}
	if($Selectedregno!="")
	{
		$ssql=$ssql." and `RegistrationNo`='$Selectedregno' and `FinancialYear`='$SelectedFinancialYear'";
	}

$rs= mysql_query($ssql);
$rs1= mysql_query($ssql1);

while($row = mysql_fetch_row($rs))
	{
					
				$srno=$row[0];
				$RegistrationNo=$row[1];
				$RegistrationDate=$row[2];
				$sname=$row[3];
				$slastname=$row[4];
				$DOB=$row[5];
				$PlaceOfBirth=$row[6];
				$Age=$row[7];
				$AgeYear=$row[8];
				$AgeMonth=$row[9];
				$AgeDays=$row[10];
				$Sex=$row[11];
				$Sibling=$row[12];
				$Father_DPS_Alumni=$row[13];
				$Mother_DPS_Alumni=$row[14];
				$Single_Parent=$row[15];
				$Special_Needs=$row[16];
				$Staff=$row[17];
				$OtherCategory=$row[18];
				$MotherTongue=$row[19];
				$Nationality=$row[20];
				$ResidentialAddress=$row[21];
				$Location=$row[22];
				$Distance=$row[23];
				$PhoneNo=$row[24];
				$smobile=$row[25];
				$sclass=$row[26];
				$MasterClass=$row[27];
				$LastSchool=$row[28];
				$sfathername=$row[29];
				$sfatherage=$row[30];
				$FatherEducation=$row[31];
				$FatherQualificationDuration=$row[32];
				$FatherOccupation=$row[33];
				$FatherDesignation=$row[34];
				$FatherAnnualIncome=$row[35];
				$FatherCompanyName=$row[36];
				$FatherOfficeAddress=$row[37];
				$FatherOfficePhoneNo=$row[38];
				$FatherMobileNo=$row[39];
				$FatherEmailId=$row[40];
				$MotherName=$row[41];
				$MotherAge=$row[42];
				$MotherEducation=$row[43];
				$MotherQualificationDuration=$row[44];
				$MotherOccupatoin=$row[45];
				$MotherDesignation=$row[46];
				$MontherAnnualIncome=$row[47];
				$MotherCompanyName=$row[48];
				$MotherOfficeAddress=$row[49];
				$MotherOfficePhone=$row[50];
				$MotherMobile=$row[51];
				$MotherEmail=$row[52];
				$GuradianName=$row[53];
				$GuradianAge=$row[54];
				$GuradinaEducation=$row[55];
				$GuradianOccupation=$row[56];
				$GuradianDesignation=$row[57];
				$GuradianAnnualIncome=$row[58];
				$GuradianCompanyName=$row[59];
				$GuradianOfficialAddress=$row[60];
				$GuradianOfficialPhNo=$row[61];
				$GuradianMobileNo=$row[62];
				$TransportAvail=$row[63];
				$SafeTransport=$row[64];
				$SpecialAttentionDetail=$row[65];
				$RealBroSisName=$row[66];
				$RealBroSisAdmissionNo=$row[67];
				$RealBroSisClass=$row[68];
				$AlumniFatherName=$row[69];
				$AlumniSchoolName=$row[70];
				$AlumniPassingYear=$row[71];
				$AlumniFatherPassingClass=$row[72];
				$AlumniMotherName=$row[73];
				$AlumniMotherSchoolName=$row[74];
				$AlumniMotherPassingYear=$row[75];
				$AlumniMotherPassingClass=$row[76];
				$EmergencyContactNo=$row[77];
				$RegistrationFormNo=$row[78];
				$email=$row[79];
				$routeno=$row[80];
				$status=$row[82];
				$Remarks=$row[83];
				$quarter=$row[84];
				$FinancialYear=$row[85];
				$SchoolId=$row[86];
				$TxnAmount=$row[87];
				$TxnId=$row[88];
				$TxnStatus=$row[89];
				
				$SystemDateTime=$row[92];
				$AdmissionFeeReceipt=$row[93];
				$sadmission=$row[94];
				$AdmissionDate=$row[95];
				$FatherPhoto=$row[96];
				$MotherPhoto=$row[97];
				$AddressProofPhoto=$row[98];
                $ProfilePhoto=$row[81];
	            $BirthCertificate=$row[90];
				$ScoreCard=$row[91];

				break;
	}



?>
<script language="javascript">
	function printDiv() 
	{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 	}
</script>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Registration</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="Admin/tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="Admin/css/style.css" />

	<script type="text/javascript" src="Admin/tcal.js"></script>




</head>
<body>

<div id="MasterDiv">
<style type="text/css">
.style7 {
	border-left-style: none;
	border-left-width: medium;
	text-align: center;
}
.style12 {
	border-left-width: 0px;
	border-right-width: 0px;
	border-top-width: 0px;
}
.auto-style1 {
	border-collapse: collapse;
	border: 0px solid #000000;
}
.auto-style6 {
	font-size: small;
}
.auto-style7 {
	border-collapse: collapse;
	border-width: 0px;
}

.auto-style11 {

	border-style: none;

	border-width: medium;

}

.auto-style16 {

	font-size: 12pt;

	color: #000000;

	margin-left: 13px;

	font-family: Calibri;

}

.auto-style18 {

	font-weight: bold;

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style19 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style20 {

	font-weight: normal;

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style21 {

	font-family: Calibri;

	font-weight: normal;

	font-size: 12pt;

	color: #000000;

}

.auto-style23 {

	font-size: 12pt;

}

.auto-style25 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style26 {

	border-style: none;

	border-width: medium;

	font-size: 12pt;

	font-family: Calibri;

}







.auto-style30 {

	border: medium solid #FFFFFF;

	color: #000000;

}

.auto-style5 {

	text-align: left;

	font-family: Calibri;

	color: #000000;

	text-decoration: underline;

	font-size: medium;

}

.auto-style3 {

	color: #000000;

}

.auto-style31 {

	font-family: Calibri;

}

.auto-style32 {

	font-size: small;

	font-family: Calibri;

	color: #000000;

}

.auto-style33 {

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style34 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

}

.auto-style35 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Calibri;

	font-weight: bold;

	font-size: 18px;

	color: #000000;

}
.auto-style36 {

	border-style: none;

	border-width: medium;

	text-align: right;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style38 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Calibri;

	font-size: medium;

	color: #000000;

}

.auto-style17 {

	font-family: Calibri;

	font-size: 11pt;

	color: #000000;

}

.auto-style39 {

	border-style: none;

	border-width: medium;

	text-align: left;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style40 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 11pt;

	color: #000000;

}

.auto-style41 {

	border-style: none;

	border-width: medium;

	text-align: left;

}
.auto-style47 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #99CCFF;

}

.auto-style48 {

	border-style: none;

	border-width: medium;

	color: #000000;

	background-color: #99CCFF;

}

.auto-style49 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #99CCFF;

}
.style14 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
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
        font-family: Calibri;
        font-weight:bold;

}
.style15 {
	border-collapse: collapse;
}
.style21 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}
.style22 {
	text-align: center;
	background-color: #E4E4E4;
}
.style23 {
	text-align: center;
}
.style24 {
	text-align: center;
	background-color: #E4E4E4;
	font-family: Cambria;
}
.style25 {
	font-family: Cambria;
}
.style26 {
	font-family: Calibri;
	font-size: 12pt;
	color: #CC3300;
}
.style27 {
	color: #CC3300;
}
.style28 {
	border-style: solid;
	border-width: 0;
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	text-align: center;
}
.style29 {
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	text-align: left;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
}
.style30 {
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	text-align: left;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style31 {
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	text-align: center;
	border-left-style: solid;
	border-left-width: 0;
	border-right-style: solid;
	border-right-width: 0;
	border-top-style: solid;
	border-top-width: 0;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
</style>
	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%; border-left-width:0px; border-right-width:0px">
	<tr>
		<td style="height: 10; " class="style28" colspan="2">
<img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px">
</td>

		</tr>
	
		
		<tr>
		<td style="height: 10; " class="style28" colspan="2">
&nbsp;</td>

		</tr>
	
		
		<tr>
		<td style="height: 10; " class="style28" colspan="2">
<font face="cambria"><b><?php echo $SchoolAddress; ?></b></font>
</td>

		</tr>
		<tr>
		<td style="height: 10; " class="style28" colspan="2">
	<font face="cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font>
	</td>

		</tr>
	
		
		<tr>
		<td style="height: 10; " class="style28" colspan="2">
	<font face="cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font>
	</td>

		</tr>
	
		
		<tr>
		<td style="height: 10; " class="style28" colspan="2">
<strong><font face="Cambria" style="font-size: 14pt">Admission</font></strong><font face="Cambria" style="font-size: 14pt"><strong> Form - Session 
2016 - 17</strong></font></td>

		</tr>
		<tr>
		<td style="height: 10; " class="style31" colspan="2">
		&nbsp;</td>

		</tr>
		<tr>
		<td style="height: 10; " class="style30" colspan="2">
		&nbsp;</td>

		</tr>
	
		
		<tr>
		<td style="height: 10; " class="style29">
<span style="text-decoration: none; font-weight: 700">Admission No-  <?php echo $sadmission; ?></span></td>

		<td style="height: 10; " class="style29">
<span style="text-decoration: none; font-weight: 700">Admission Date <?php echo $AdmissionDate; ?></span></td>

		</tr>


		<tr>
		<td style="height: 10; border-top-style:solid; border-top-width:1px" class="auto-style47" colspan="2">
		<font face="Cambria">
		<strong>Student Details:</strong></font></td>

		<font face="Cambria">
		<br class="auto-style31">

		<br class="auto-style31">
		</font>

		</tr>


		<tr>



		<td style="height: 29px;" class="auto-style23" colspan="2">
		<table style="width: 100%" class="style14">
			<tr>

				<td class="auto-style11" colspan="2">
				<img src="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $ProfilePhoto;?>" width="100" height="100">
				</td>

				<td style="width: 3%; border-bottom-style:solid; border-bottom-width:1px" class="auto-style34">&nbsp;</td>

				<td style="width: 159px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 13%; border-bottom-style:solid; border-bottom-width:1px" class="auto-style26">&nbsp;</td>
				<td style="width: 263px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 223px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style26">&nbsp;</td>
				<td style="width: 20%; border-bottom-style:solid; border-bottom-width:1px" class="auto-style26">&nbsp;</td>

			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 16%" class="auto-style11">

		<span class="auto-style21"><font face="Cambria">1. First Name Of 
		Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="border-style:solid; border-width:1px; width: 16%" class="auto-style11">

		<?php echo $sname;?>&nbsp;&nbsp;<?php echo $slastname;?></td>
				<td style="border-style:solid; border-width:1px; width: 3%" class="auto-style11">

				<span class="auto-style31"><font size="3" face="Cambria">

				&nbsp;</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 159px" class="auto-style11" colspan="2">

		<span class="auto-style21">

		<span class="auto-style25"><font face="Cambria">2. Date Of Birth*</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:<br>
		(mm/dd/yyyy)</font></span></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="border-style:solid; border-width:1px; width: 13%" class="auto-style11">







		&nbsp;<?php echo $DOB;?></td>



				<td style="border-style:solid; border-width:1px; width: 263px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 223px" class="auto-style19">







				<font face="Cambria">3. Place of Birth</font><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 20%" class="auto-style41">







				&nbsp;<?php echo $PlaceOfBirth;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="10">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 16%" class="auto-style11">







				<span class="auto-style21"><font face="Cambria">4. Age as on 
				(01.04.2016)*

				</font>

				<span style="color: #000000" class="auto-style33">



				<font face="Cambria">:</font></span></span></td>



				<td style="border-style:solid; border-width:1px; width: 16%" class="auto-style11">


				&nbsp;<?php $Age;?></td>
				<td style="border-style:solid; border-width:1px; width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 159px" class="auto-style11" colspan="2">
				<span class="auto-style33"><font face="Cambria">5</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">. 
				Gender*:</font></span><span class="auto-style31"><font size="3" face="Cambria"> </font>







				</span>







				</td>



				<td style="border-style:solid; border-width:1px; width: 13%" class="auto-style11">







		&nbsp;<?php echo $Sex;?></td>



				<td style="border-style:solid; border-width:1px; width: 263px" class="auto-style11" colspan="2">

				&nbsp;</td>
				<td class="auto-style19" style="border-style: solid; border-width: 1px">

				<span style="color: #000000" class="auto-style33">

				<font face="Cambria">6. Mother Tongue* :</font></span></td>



				<td class="auto-style19" style="border-style: solid; border-width: 1px">







				&nbsp;<?php echo $MotherTongue;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="10">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 16%" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">7. Nationality</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 16%" class="auto-style11">







		&nbsp;<?php echo $Nationality;?></td>



				<td style="width: 3%; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 159px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" class="auto-style19" colspan="2">







		<font face="Cambria">8. Class

				</font>

				<span style="color: #000000" class="auto-style33">



				<font face="Cambria">Applied For*:</font></span></td>



				<td class="auto-style11" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px">







				&nbsp;<?php echo $sclass;?></td>



				<td class="auto-style11" colspan="2" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px">







				&nbsp;</td>



				<td class="auto-style11" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px">







				<font face="Cambria">9. Last School Attended*:</font></td>



				<td class="auto-style11" style="border-style: solid; border-width: 1px">







				&nbsp;<?php echo $LastSchool;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="10">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="10">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 16%" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">10. Residential Address* 
		</font></span>

				</td>



				<td class="auto-style11" colspan="3" style="border-style: solid; border-width: 1px">







				<font face="Cambria">







				<?php echo $ResidentialAddress;?></font></td>



				<td class="style21" colspan="3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">







				11. Select Locality*</td>



				<td class="auto-style11" colspan="3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">







		






				&nbsp;<?php echo $Location;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="10">







		&nbsp;</td>



			</tr>



			</table>







		</td>







			</tr>



		



		<tr>



		







		<td class="auto-style33" style="border-style:solid; border-width:1px; " colspan="2">

		&nbsp;</td>
			</tr>



			



			



		



			<tr>



			



			



		







		<td style="border-style:solid; border-width:1px; height: 46px" class="auto-style23" colspan="2">







		<table style="width: 100%" class="style14">



			<tr>



				<td class="auto-style11" colspan="6">







		<font face="Cambria"><b>(A) Father Details:</b></font></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Father's Name*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		&nbsp;<?php echo $sfathername;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







		&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















		&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Age:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">
		&nbsp;<?php echo $sfatherage;?></td>
			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<font face="Cambria">







		<span class="auto-style25">Father's Education*:</span></font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		&nbsp;<?php echo $FatherEducation;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				<table style="width: 100%" cellpadding="0" class="style15">
					<tr>
						<td><span class="auto-style25"><font face="Cambria">
						Highest Qualification Duration*: </font></span></td>
						<td>















		<?php echo $FatherQualificationDuration;?></td>
					</tr>
				</table>
				</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Occupation*:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;<?php echo $FatherOccupation;?></td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Designation:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		&nbsp;<?php echo $FatherDesignation;?></td>
				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">


		<span class="auto-style25"><font face="Cambria">Father's Annual Income*:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">

		&nbsp;<?php echo $FatherAnnualIncome;?></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">
		&nbsp;</td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">Father's Company Name :</font></span></td>
				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">
		&nbsp;<?php echo $FatherCompanyName;?></td>
				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">Father's Official 
		Address :</font></span></td>
				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">
		&nbsp;<?php echo $FatherOfficeAddress;?></td>
			</tr>
			<tr>
			<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">
		&nbsp;</td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">Father's Home Landline 
		no :</font></span></td>
				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">
		&nbsp;<?php echo $FatherOfficePhoneNo;?></td>
				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">

			&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">
		<font face="Cambria">Father's Mobile No *:</font></td>
				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">
		&nbsp;<?php echo $FatherMobileNo;?></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">
		&nbsp;</td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">
		<font face="Cambria">Father's Email Id *:</font></td>
				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">
		<?php echo $FatherEmailId;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>

<p style="page-break-before: always">

			<tr>



				<td class="auto-style11" colspan="6" style="border-style:solid; border-width:1px; ">







		<b><font face="Cambria">(B)</font></b><font face="Cambria"><b> Mother's 
		Details:</b></font></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		&nbsp;<?php echo $MotherName;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Age:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;<?php echo $MotherAge;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<font face="Cambria">







		<span class="auto-style25">Mother's Education:<br>&nbsp;</span></font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		
		
		&nbsp;<?php echo $MotherEducation;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				<table style="width: 100%">
					<tr>
						<td><span class="auto-style25"><font face="Cambria">
						Duration*:</font></span></td>
						<td>
						














		<?php echo $MotherQualificationDuration;?></td>
					</tr>
				</table>
				</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Occupation*:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;<?php echo $MotherOccupatoin;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Designation (If 
		employed):</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		&nbsp;<?php echo $MotherDesignation;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Annual Income 
		(If employed):</font></span></td>
				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">
		














		<?php echo $MontherAnnualIncome;?></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">
	&nbsp;&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Company Name (If 
		employed):</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		&nbsp;<?php echo $MotherCompanyName;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Official 
		Address (If employed):</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;<?php echo $MotherOfficeAddress;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Home Landline. 
		no :</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		<?php echo $MotherOfficePhone;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<font face="Cambria">Mother's Mobile No</font></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		<?php echo $MotherMobile;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<font face="Cambria">Mother's Email id</font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		<?php echo $MotherEmail;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>


<p style="page-break-before: always">
			<tr>



				<td class="auto-style11" colspan="6" style="border-style:solid; border-width:1px; ">







		<b><font face="Cambria">13. Guardian's</font></b><font face="Cambria"><b> 
		Details (If Applicable):</b></font></td>



				</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		&nbsp;<?php echo $GuradianName;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Age:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;<?php echo $GuradianAge;?></td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Education:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		<?php echo $GuradinaEducation;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Occupation:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		<?php echo $GuradianOccupation;?></td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Designation (If 
		employed):</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		<?php echo $GuradianDesignation;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Annual Income (If 
		employed):</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		<?php echo $GuradianAnnualIncome;?></td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Company Name (If 
		employed):</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		<?php echo $GuradianCompanyName;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Official Address (If 
		employed):</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		<?php echo $GuradianOfficialAddress;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Official Landline. no :</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		<?php echo $GuradianOfficialPhNo;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<font face="Cambria">Mobile No</font></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		<?php echo $GuradianMobileNo;?></td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6" style="border-style: solid; border-width: 1px">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px; " class="auto-style11">







		<font face="Cambria"><b>14. </b>School Transport required</font></td>



				<td class="auto-style11" colspan="2" style="border-style:solid; border-width:1px; ">















		<?php echo $TransportAvail;?></td>



				<td style="border-style:solid; border-width:1px; width: 28px; " class="auto-style11">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 217px; " class="auto-style11" id="tdTransport">
				<!--<font face="Cambria">If No, are you in position to provide safe transportation to the applicant to and fro from School :</font>-->
				</td>
				<td style="border-style:solid; border-width:1px; width: 158px; " class="auto-style11">
		














		<?php echo $SafeTransport;?></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">
		&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style11" colspan="6" bgcolor="#A9D0F5" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><strong>15. Category</strong></font><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				</tr>
			<tr>



				<td class="auto-style11" colspan="6" style="border-style: solid; border-width: 1px">

		<table style="width: 100%" cellpadding="0" class="style15">
			<tr>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>
				Sibling Studying in DPS</strong></td>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>
				Father DPS Alumni</strong></td>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>
				Mother DPS Alumni</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style22">
				S<span class="style25"><strong>ingle Parent</strong></span></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>
				Special Needs</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>
				DPS Staff</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>
				Others</strong></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkSibling" id="chkSibling" readonly type="checkbox" value="<?php echo $Sibling;?>" <?php if($Sibling=="Yes") { ?>checked="checked" <?php }?>></td>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkFatherAlumni" id="chkFatherAlumni" readonly type="checkbox" value="<?php echo $Father_DPS_Alumni;?>" <?php if($Father_DPS_Alumni=="Yes") { ?>checked="checked" <?php }?>></td>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkMotherAlumni" id="chkMotherAlumni" type="checkbox" readonly value="<?php echo $Mother_DPS_Alumni;?>" <?php if($Mother_DPS_Alumni=="Yes") { ?>checked="checked" <?php }?>></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkSingleParent" id="chkSingleParent" type="checkbox" readonly value="<?php echo $Single_Parent;?>" <?php if($Single_Parent=="Yes") { ?>checked="checked" <?php }?>></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkSpecialNeed" id="chkSpecialNeed" type="checkbox" readonly value="<?php echo $Special_Needs;?>" <?php if($Special_Needs=="Yes") { ?>checked="checked" <?php }?>></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkDPSStaff" id="chkDPSStaff" type="checkbox" readonly value="<?php echo $Staff;?>" <?php if($Staff=="Yes") { ?>checked="checked" <?php }?>></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" readonly value="<?php echo $OtherCategory;?>" <?php if($OtherCategory=="Yes") { ?>checked="checked" <?php }?>></td>
			</tr>
		</table>
		</td>



				</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6" style="border-style: solid; border-width: 1px">







		<font face="Cambria"><b>16.</b> <strong>Details of Siblings Studying in <?php echo $SchoolName; ?>, 
		Faridabad</strong></font></td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Real Brother / Sister 
		Name:</font></span></td>



				<td class="auto-style11" colspan="2" style="border-style: solid; border-width: 1px">















		<?php echo $RealBroSisName;?></td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Real Brother / Sister 
		Class:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		<?php echo $RealBroSisClass;?></td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Real Brother / Admission 
		No:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11">















		<?php echo $RealBroSisAdmissionNo;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" height="23" colspan="6">







		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" height="23" colspan="6">







		<font face="Cambria"><b>17. Details of Father / Mother, if Alumni of <?php echo $SchoolName; ?></b></font></td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" height="23" colspan="6">







		&nbsp;</td>



			</tr>
			


			<tr>



				<td class="auto-style11" height="23" colspan="6" style="border-style: solid; border-width: 1px">







		<u><b><font face="Cambria">Father Alumni Details:</font></b></u></td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Alumni Name (Father)</font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11" height="23">















		<?php echo $AlumniFatherName;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11" height="23">







		<font face="Cambria">Name Of DPS School (Father)</font></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11" height="23">















		<font face="Cambria">

		<!--<input name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" type="text" size="20" readonly="readonly">-->















		<?php echo $AlumniSchoolName;?></font></td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" height="23" colspan="6">







		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Passout Year (Father)</font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11" height="23">
		<?php echo $AlumniPassingYear;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Last Passout Class from DPS</font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11" height="23">
		














		<?php echo $AlumniFatherPassingClass;?></td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" height="23" colspan="6">







		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11" height="23">







		<u><font face="Cambria"><b>Mother Alumni Details:</b></font></u></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11" height="23">







				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11" height="23">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11" height="23">
		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Alumni Name (Mother)</font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11" height="23">
		<?php echo $AlumniMotherName;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11" height="23">







				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11" height="23">
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; width: 217px" class="auto-style11" height="23">
		<font face="Cambria">Name Of DPS School (Mother)</font></td>



				<td style="border-style:solid; border-width:1px; width: 158px" class="auto-style11" height="23">
		<!--<input name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" type="text" size="20" readonly="readonly">-->















		<?php echo $AlumniMotherSchoolName;?></td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" height="23" colspan="6">







		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Passout Year (Mother)</font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11" height="23">
		<?php echo $AlumniMotherPassingYear;?></td>



				<td style="border-style:solid; border-width:1px; width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Last Passout Class from DPS</font></td>



				<td style="border-style:solid; border-width:1px; width: 172px" class="auto-style11" height="23">
		














		<?php echo $AlumniMotherPassingClass;?></td>



			</tr>
			


			</table>



		</td>



</tr>	







			



		



			<tr>



			



			



		







		<td style="height: 46px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style23" colspan="2">







		&nbsp;</td>



</tr>	







<tr>			



		







		<td style="height: 10; border-top-width:1px; background-color:#A9D0F5; border-top-style:solid" class="auto-style47" colspan="2">







		<font face="Cambria">







		<strong>18. Contact Details for all Admission Related Information:</strong></font></td>







			</tr>



		



		<tr>







		<td style="height: 29px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style23" colspan="2">







		<table style="width: 100%" class="style14">



			<tr>



				<td style="border-style:solid; border-width:1px; width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Contact No*:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 221px" class="auto-style11">







		<?php echo $EmergencyContactNo;?></td>



				<td style="border-style:solid; border-width:1px; width: 221px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mobile No*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 221px" class="auto-style11">







		<?php echo $smobile;?></td>



				<td style="border-style:solid; border-width:1px; width: 221px" class="auto-style26">







		<span class="auto-style25"><font face="Cambria">E-mail Id*</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="border-style:solid; border-width:1px; width: 222px" class="auto-style26">







		<?php echo $email;?></td>



			</tr>



			<tr>



				<td style="border-style:solid; border-width:1px; " class="auto-style11" colspan="6">







				&nbsp;</td>



			</tr>
		</table>
		</td>

		</tr>


		<tr>



		<td style="border-top-width: 1px; border-top-style:solid" >
		<p>
		<font face="Cambria">1. Copy of Birth Certificate (Duly Attested) issued 
		by Municipal Corporation : <br>
		<img src="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $BirthCertificate;?>" width="400" height="400">
		<p>
		<font face="Cambria">
		
		2. Child Photograph :<br>
		</font>
		<img src="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $ProfilePhoto;?>" width="100" height="100">
		<p>
		<font face="Cambria">3. Previous Class Score Card (Applicable Only for 
		Admission for Class Prep to IXth) :<br>
		</font>
		<?php
		if($ScoreCard !="")
		{
		?>
		<img src="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $ScoreCard;?>" width="400" height="400">
		<?php
		}
		?>
		<font face="Cambria">
		
		4. Father Photograph :<br>
		</font>
		<img src="http://dpsfsis.com/Admin/StudentManagement/StudentPhotos/<?php echo $FatherPhoto;?>" width="100" height="100">
		<font face="Cambria">
	
		5. Mother Photograph :<br>
		</font>
		<img src="http://dpsfsis.com/Admin/StudentManagement/StudentPhotos/<?php echo $MotherPhoto;?>" width="100" height="100">
		</td>

</tr>



		<tr>



		<td style="border-bottom-width: 1px" colspan="2">
		&nbsp;</td>


</tr>
		<tr>
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;" colspan="2">
		<u><b><font face="Cambria">20. Declaration:</font></b></u><p>
		<font face="Cambria">1. I am aware of the rules and regulation laid down 
		by the school and am desirous of having my child / ward educated in 
		Delhi Public School, Sector - 19, Faridabad, Haryana. I hereby agree to 
		abide by them. I have made a careful note of various details regarding 
		the payment of School Fees and will abide by the decision of school 
		regarding revision of the fee structure in future. I shall make 
		satisfactory arrangement for the remittance of School Fees within due 
		dates without waiting for reminder from the School. I will pay the 
		School Fees through Online payment mode by due date as mentioned in the 
		fee bill/statement of fee.</font></p>
		<p><font face="Cambria">2. If I choose to withdraw my ward after taking 
		admission, fee upto the month of withdrawal and one month notice fee 
		will be charged.</font></p>
		<p><font face="Cambria">3. I further declare that I shall not make any 
		request for a change either in the date of birth of name of my ward.</font></p>
		<p><font face="Cambria">4. I hereby confirm to the above declarations.</font></p>
		<p><font face="Cambria">5. By submitting this I agree with all admission 
		guidelines laid down by School.</font></p>
		<p><font face="Cambria"><b>Place</b></font> :
		<p><b><font face="Cambria">
		Date :<?php echo $currentdate;?>
		</font></b>
		<p>&nbsp;</td>


</tr>



		<tr>



		<td colspan="2">
		<p align="center">


		&nbsp;</td>


</tr>



<tr>



		<td style="height: 29px" class="style7" colspan="2">

		&nbsp;</td>


	</tr>

<tr>



		<td style="height: 29px" class="style7" colspan="2">


		&nbsp;</td>

	</tr>
</table>

</div>

<div id="divPrint">
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	
</font> 
	
</div>

</body>
</html>




