<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>


<?php

	$SelectedRegistrationNo=$_REQUEST["RegNo"];

	
	$ssql="SELECT `srno`, `RegistrationNo`, `RegistrationDate`, `sname`, `slastname`, `DOB`, `PlaceOfBirth`, `Age`, `AgeYear`, `AgeMonth`, `AgeDays`, `Sex`, `Sibling`,
	 `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `Single_Parent`, `Special_Needs`, `Staff`, `OtherCategory`, `MotherTongue`, `Nationality`, `ResidentialAddress`, `Location`, `Distance`,
	  `PhoneNo`, `smobile`, `sclass`, `MasterClass`, `LastSchool`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherQualificationDuration`, `FatherOccupation`, `FatherDesignation`,
	   `FatherAnnualIncome`, `FatherCompanyName`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `FatherMobileNo`, `FatherEmailId`, `MotherName`, `MotherAge`, `MotherEducation`, 
	   `MotherQualificationDuration`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`, `MotherCompanyName`, `MotherOfficeAddress`, `MotherOfficePhone`, `MotherMobile`,
	    `MotherEmail`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation`, `GuradianAnnualIncome`, `GuradianCompanyName`, 
	    `GuradianOfficialAddress`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `TransportAvail`, `SafeTransport`, `SpecialAttentionDetail`, `RealBroSisName`, `RealBroSisAdmissionNo`, 
	    `RealBroSisClass`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`, 
	    `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `EmergencyContactNo`, `RegistrationFormNo`, `email`, `routeno`, `ProfilePhoto`, `status`, `Remarks`, `quarter`,
	     `FinancialYear`, `SchoolId`, `TxnAmount`, `TxnId`, `TxnStatus`, `BirthCertificate`, `ScoreCard`, `SystemDateTime` FROM `NewStudentRegistration` WHERE 1=1 ";


	


	if($SelectedRegistrationNo!="")
	{
		$ssql=$ssql." and `RegistrationNo`='$SelectedRegistrationNo'";
	}
	if($Selectedregno!="")
	{
		$ssql=$ssql." and `RegistrationNo`='$Selectedregno'";
	}



echo $ssql;
exit();
$rs= mysql_query($ssql);

	while($row = mysql_fetch_row($rs))
	{
	
					
					$srno=row[0];
				$RegistrationNo=row[1];
				$RegistrationDate=row[2];
				$sname=row[3];
				$slastname=row[4];
				$DOB=row[5];
				$PlaceOfBirth=row[6];
				$Age=row[7];
				$AgeYear=row[8];
				$AgeMonth=row[9];
				$AgeDays=row[10];
				$Sex=row[11];
				$Sibling=row[12];
				$Father_DPS_Alumni=row[13];
				$Mother_DPS_Alumni=row[14];
				$Single_Parent=row[15];
				$Special_Needs=row[16];
				$Staff=row[17];
				$OtherCategory=row[18];
				$MotherTongue=row[19];
				$Nationality=row[20];
				$ResidentialAddress=row[21];
				$Location=row[22];
				$Distance=row[23];
				$PhoneNo=row[24];
				$smobile=row[25];
				$sclass=row[26];
				$MasterClass=row[27];
				$LastSchool=row[28];
				$sfathername=row[29];
				$sfatherage=row[30];
				$FatherEducation=row[31];
				$FatherQualificationDuration=row[32];
				$FatherOccupation=row[33];
				$FatherDesignation=row[34];
				$FatherAnnualIncome=row[35];
				$FatherCompanyName=row[36];
				$FatherOfficeAddress=row[37];
				$FatherOfficePhoneNo=row[38];
				$FatherMobileNo=row[39];
				$FatherEmailId=row[40];
				$MotherName=row[41];
				$MotherAge=row[42];
				$MotherEducation=row[43];
				$MotherQualificationDuration=row[44];
				$MotherOccupatoin=row[45];
				$MotherDesignation=row[46];
				$MontherAnnualIncome=row[47];
				$MotherCompanyName=row[48];
				$MotherOfficeAddress=row[49];
				$MotherOfficePhone=row[50];
				$MotherMobile=row[51];
				$MotherEmail=row[52];
				$GuradianName=row[53];
				$GuradianAge=row[54];
				$GuradinaEducation=row[55];
				$GuradianOccupation=row[56];
				$GuradianDesignation=row[57];
				$GuradianAnnualIncome=row[58];
				$GuradianCompanyName=row[59];
				$GuradianOfficialAddress=row[60];
				$GuradianOfficialPhNo=row[61];
				$GuradianMobileNo=row[62];
				$TransportAvail=row[63];
				$SafeTransport=row[64];
				$SpecialAttentionDetail=row[65];
				$RealBroSisName=row[66];
				$RealBroSisAdmissionNo=row[67];
				$RealBroSisClass=row[68];
				$AlumniFatherName=row[69];
				$AlumniSchoolName=row[70];
				$AlumniPassingYear=row[71];
				$AlumniFatherPassingClass=row[72];
				$AlumniMotherName=row[73];
				$AlumniMotherSchoolName=row[74];
				$AlumniMotherPassingYear=row[75];
				$AlumniMotherPassingClass=row[76];
				$EmergencyContactNo=row[77];
				$RegistrationFormNo=row[78];
				$email=row[79];
				$routeno=row[80];
				$ProfilePhoto=row[81];
				$status=row[82];
				$Remarks=row[83];
				$quarter=row[84];
				$FinancialYear=row[85];
				$SchoolId=row[86];
				$TxnAmount=row[87];
				$TxnId=row[88];
				$TxnStatus=row[89];
				$BirthCertificate=row[90];
				$ScoreCard=row[91];
				$SystemDateTime=row[92];


	}	

?>



<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Registration</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="Admin/tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="Admin/css/style.css" />

	<script type="text/javascript" src="Admin/tcal.js"></script>



<style type="text/css">







.style7 {







	border-left-style: none;







	border-left-width: medium;







	text-align: center;







}







.style12 {



	border-left-width: 0px;



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



.style16 {
	border: 0 solid #FFFFFF;
	color: #000000;
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



</style>







</head>















<body>





<div align="center">





<table width="100%">
<tr>
<td>
<h1 align="center"><b><font face="cambria"><img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b><?php echo $SchoolAddress; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font>
</td>
</tr>
</table>
</div>
<table id="table_10" style="width: 100%" cellspacing="0" cellpadding="0" class="style15">
	<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<font face="Cambria" style="font-size: 14pt"><strong>Registration 
Form - Session 2016 - 17</strong></font></p>
<p  style="height: 12px" align="left"><strong><font face="Cambria">Parents are 
requested to note:</font></strong></p>
<ul>
	<li>
	<p  style="height: 12px" align="left"><strong style="font-weight: 400">
	<font face="Cambria">This is not 
an Admission Form. Submission of this form does not guarantee admission to 
School.</font></strong></p></li>
	<li>
	<p  style="height: 12px" align="left">
	<font face="Cambria"><strong style="font-weight: 400">
	This form is 
non-transferable and Registration Fee is <b>INR 500</b></strong><strong>/- 
	(NURSERY) &amp; INR 750/-(Prep to IXth).</strong></font></p>
	</li>
	<li>
	<p  style="height: 12px" align="left" class="style25"><strong>Last Date for 
	Registration is 19th Aug, 2015.</strong></p>
	</li>
</ul>
</td>
</tr>
		</table>
	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">
	<form name="frmNewStudent" id="frmNewStudent" method="post" action="RegistrationFeeReceipt4Payment.php" enctype="multipart/form-data">
		<input type="hidden" name="hSibling" id="hSibling" value="No">
		<input type="hidden" name="hFatherAlumni" id="hFatherAlumni" value="No">
		<input type="hidden" name="hMotherAlumni" id="hMotherAlumni" value="No">
		<input type="hidden" name="hSingleParent" id="hSingleParent" value="No">
		<input type="hidden" name="hSpecialNeed" id="hSpecialNeed" value="No">
		<input type="hidden" name="hDPSStaff" id="hDPSStaff" value="No">
		<input type="hidden" name="hOtherCategory" id="hOtherCategory" value="No">
		<tr>
		<td style="height: 10; border-top-style:solid; border-top-width:1px" class="auto-style47">
		<font face="Cambria">
		<strong>Student Details:</strong></font></td>

		<font face="Cambria">
		<br class="auto-style31">

		<br class="auto-style31">
		</font>

		</tr>


		<tr>



		<td style="height: 29px;" class="auto-style23">
		<table style="width: 100%" class="style14">
			<tr>

				<td class="auto-style11" colspan="2">

				&nbsp;</td>

				<td style="width: 3%" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 13%" class="auto-style26">&nbsp;</td>
				<td style="width: 263px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 223px" class="auto-style26">&nbsp;</td>
				<td style="width: 20%" class="auto-style26">&nbsp;</td>

			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">

		<span class="auto-style21"><font face="Cambria">1. First Name Of Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="width: 16%" class="auto-style11">

		<font face="Cambria">

		<input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $row[$sname];?>"></font></td>
				<td style="width: 3%" class="auto-style11">

				<span class="auto-style31"><font size="3" face="Cambria">

				&nbsp;</font></span></td>



				<td style="width: 159px" class="auto-style11" colspan="2">

		<span class="auto-style21">

		<span class="auto-style25"><font face="Cambria">2. Date Of Birth*</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:<br>(mm/dd/yyyy)</font></span></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="width: 13%" class="auto-style11">







		<font face="Cambria">







		<input name="txtDOB" id="txtDOB" type="text" class="tcal" value="<?php echo $row[$DOB];?>" ></font></td>



				<td style="width: 263px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 223px" class="auto-style19">







				<font face="Cambria">3. Place of Birth</font><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 20%" class="auto-style41">







				<font face="Cambria">







				<input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text" value="<?php echo $row[$PlaceOfBirth];?>"></font></td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







				<span class="auto-style21"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp; 
				Last Name Of Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>



				<td style="width: 16%" class="auto-style11">







				<font face="Cambria">

		<input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20" value="<?php echo $row[$slastname];?>"></font></td>



				<td style="width: 3%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 159px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 13%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 263px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td class="auto-style19" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 16%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 3%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 159px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 13%" class="auto-style11">







		&nbsp;</td>



				<td style="width: 263px" class="auto-style11" colspan="2">

				&nbsp;</td>
				<td class="auto-style19">

				&nbsp;</td>



				<td class="auto-style19">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







				<span class="auto-style21"><font face="Cambria">4. Age as on 
				(01.04.2016)*

				</font>

				<span style="color: #000000" class="auto-style33">



				<font face="Cambria">:</font></span></span></td>



				<td style="width: 16%" class="auto-style11">


				<font face="Cambria">

				<input name="txtAge" id="txtAge" type="text" class="text-box" value="<?php echo $row[$Age];?>"  readonly="readonly"></font></td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style11" colspan="2">
				<span class="auto-style33"><font face="Cambria">5</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">. Gender*:</font></span><span class="auto-style31"><font size="3" face="Cambria"> </font>







				</span>







				</td>



				<td style="width: 13%" class="auto-style11">







		<input name="txtSex" id="txtAge" type="text" class="text-box" value="<?php echo $row[$Sex];?>"  readonly="readonly"></td>



				<td style="width: 263px" class="auto-style11" colspan="2">

				&nbsp;</td>
				<td class="auto-style19">

				<span style="color: #000000" class="auto-style33">

				<font face="Cambria">6. Mother Tongue*



				:</font></span></td>



				<td class="auto-style19">







				<font face="Cambria">







				<input name="txtMotherTounge" id="txtMotherTounge" class="text-box" value="<?php echo $row[$MotherTongue];?>" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 16%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 3%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 159px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 13%" class="auto-style11">







		&nbsp;</td>



				<td style="width: 263px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td class="auto-style19">







				&nbsp;</td>



				<td class="auto-style19">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">7. Nationality</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 16%" class="auto-style11">







		<font face="Cambria">







		<input name="txtNationality" id="txtNationality" type="text" class="text-box" value="<?php echo $row[$Nationality];?>"></font></td>



				<td style="width: 3%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 159px" class="auto-style19" colspan="2">







		<font face="Cambria">8. Class

				</font>

				<span style="color: #000000" class="auto-style33">



				<font face="Cambria">Applied For*:</font></span></td>



				<td class="auto-style11">







				<input name="cboClass" id="txtNationality" type="text" class="text-box" value="<?php echo $row[$sclass];?>"></td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td class="auto-style11">







				<font face="Cambria">9. Last School Attended*:</font></td>



				<td class="auto-style11">







				<font face="Cambria">







		<input name="txtLastSchool" id="txtLastSchool" type="text" class="text-box" value="<?php echo $row[$LastSchool];?>"></font></td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11" colspan="8">







		&nbsp;</td>



				<td style="width: 20%" class="auto-style11">
				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11" colspan="9" align="left">

</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="10">

				</td>



				</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11" colspan="8">







		&nbsp;</td>



				<td style="width: 20%" class="auto-style11">
				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">10. Residential 
		Address* 
		</font></span>

				</td>



				<td class="auto-style11" colspan="3">







				<font face="Cambria">







				<textarea name="txtAddress" id="txtAddress"class="text-box-address" value="<?php echo $row[$ResidentialAddress];?>" rows="3" cols="45"></textarea></font></td>



				<td class="style21" colspan="3">







				11. Select Locality*</td>



				<td class="auto-style11" colspan="3">







		






				<font face="Cambria">







		<input name="cboLocation" id="txtLastSchool" type="text" class="text-box" value="<?php echo $row[$Location];?>"></font></td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11" colspan="8">







		&nbsp;</td>



				<td style="width: 20%" class="auto-style11">
				&nbsp;</td>



			</tr>



			</table>







		</td>







			</tr>



		



		<tr>



		







		<td class="auto-style33" style="border-bottom-style: solid; border-bottom-width: 1px">







		&nbsp;</td>











			</tr>



		



		<tr>



		







		<td style="height: 10; border-top-width:1px" class="auto-style47">







		<strong><font face="Cambria">12</font></strong><font face="Cambria"><strong> 
		. Family Details (Father / Mother / Guardian):</strong></font></td>







			</tr>



			



			



		



			<tr>



			



			



		







		<td style="height: 46px;" class="auto-style23">







		<table style="width: 100%" class="style14">



			<tr>



				<td class="auto-style11" colspan="6">







		<font face="Cambria"><b>(A) Father Details:</b></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Father's Name*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherName" id="txtFatherName" type="text" value="<?php echo $row[$sfathername];?>"  class="text-box"></font></td>



				<td style="width: 157px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Age:</font></span></td>



				<td style="width: 158px" class="auto-style11">
		<font face="Cambria">
		<input name="txtFatherAge" id="txtFatherAge" class="text-box" value="<?php echo $row[$sfatherage];?>" type="text"></font></td>
			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<font face="Cambria">







		<span class="auto-style25">Father's Education*:<br>
		</span>







		<span class="style26"><strong><font color="#FF0000">(Select Highest Qualification)</font></strong></span></font></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">
		<input   class="text-box" value="<?php echo $row[$FatherEducation];?>" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				<table style="width: 100%" cellpadding="0" class="style15">
					<tr>
						<td><span class="auto-style25"><font face="Cambria">
						Highest Qualification
						Duration*: </font></span></td>
						<td>















		<font face="Cambria">
		<input   class="text-box" value="<?php echo $row[$FatherQualificationDuration];?>" type="text" ></font></td>
					</tr>
				</table>
				</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Occupation*:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" value="<?php echo $row[$FatherOccupation];?>" class="text-box"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Designation:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherDesignation" id="txtFatherDesignation" value="<?php echo $row[$FatherDesignation];?>" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Annual Income*:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">
		<input id="" value="<?php echo $row[$FatherAnnualIncome];?>" class="text-box" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Company Name :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherCompanyName" id="txtFatherCompanyName" value="<?php echo $row[$FatherCompanyName];?>" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Official Address :</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<textarea name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" value="<?php echo $row[$FatherOfficeAddress];?>" class="text-box-address" cols="16" rows="2"></textarea></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Home 
		Landline no :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherOfficialPhNo" value="<?php echo $row[$FatherOfficePhoneNo];?>" id="txtFatherOfficialPhNo" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<font face="Cambria">Father's Mobile No *:</font></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherMobileNo" id="txtFatherMobileNo" value="<?php echo $row[$FatherMobileNo];?>" class="text-box" type="text" size="20"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<font face="Cambria">Father's Email Id *:</font></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherEmailId" id="txtFatherEmailId" value="<?php echo $row[$FatherEmailId];?>" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6" style="border-top-style: solid; border-top-width: 1px">







		<b><font face="Cambria">(B)</font></b><font face="Cambria"><b> Mother's 
		Details:</b></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherName" id="txtMotherName" type="text" value="<?php echo $row[$MotherName];?>" class="text-box"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Age:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherAge" id="txtMotherAge" class="text-box" value="<?php echo $row[$MotherAge];?>" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<font face="Cambria">







		<span class="auto-style25">Mother's Education:<br></span>







		<span class="style26"><strong>(Select Highest Qualification)</strong></span></font></td>



				<td style="width: 172px" class="auto-style11">















		
		
		<font face="Cambria">















		<input name="" id="" type="text" value="<?php echo $row[$MotherEducation];?>" class="text-box"></font>
		
		</td>



				<td style="width: 157px" class="auto-style11">







				<table style="width: 100%">
					<tr>
						<td><span class="auto-style25"><font face="Cambria">
						Duration*:</font></span></td>
						<td>
						














		<font face="Cambria">















		<input name="" id="" class="text-box" value="<?php echo $row[$MotherQualificationDuration];?>" type="text"></font></td>
					</tr>
				</table>
				</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Occupation*:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherOccupation" id="txtMotherOccupation" class="text-box" value="<?php echo $row[$MotherOccupatoin];?>" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Designation (If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherDesignation" id="txtMotherDesignation" value="<?php echo $row[$MotherDesignation];?>" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Annual Income 
		(If employed):</font></span></td>
				<td style="width: 158px" class="auto-style11">
		














		<font face="Cambria">















		<input name="" id="" value="<?php echo $row[$MontherAnnualIncome];?>" class="text-box" type="text"></font></td>
			</tr>
			<tr>
				<td style="width: 212px" class="auto-style11">
	</td>



				<td style="width: 172px" class="auto-style11">
&nbsp;&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Company Name(If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherCompanyName" id="txtMotherCompanyName" value="<?php echo $row[$MotherCompanyName];?>" type="text" class="text-box"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Official Address 
		(If employed):</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<textarea name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box-address" value="<?php echo $row[$MotherOfficeAddress];?>" cols="16" rows="2"></textarea></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Home 
		Landline. no :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherOfficialPhNo" id="txtMotherOfficialPhNo" value="<?php echo $row[$MotherOfficePhone];?>" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<font face="Cambria">Mother's Mobile No</font></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherMobileNo" id="txtFatherOfficialPhNo1" class="text-box" value="<?php echo $row[$MotherMobile];?>" type="text" size="20"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<font face="Cambria">Mother's Email id</font></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" value="<?php echo $row[$MotherEmail];?>"  type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6" style="border-top-style: solid; border-top-width: 1px">







		<b><font face="Cambria">13. Guardian's</font></b><font face="Cambria"><b> 
		Details (If Applicable):</b></font></td>



				</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianName" id="txtGuradianName" type="text" value="<?php echo $row[$GuradianName];?>" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Age:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" value="<?php echo $row[$GuradianAge];?>" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Education:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" value="<?php echo $row[$GuradinaEducation];?>" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Occupation:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianOccupation" id="txtGuradianOccupation" class="text-box" value="<?php echo $row[$GuradianOccupation];?>" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Designation (If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianDesignation" id="txtMotherDesignation0" class="text-box" value="<?php echo $row[$GuradianDesignation];?>" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Annual Income 
		(If employed):</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianAnnualIncome" id="txtMotherAnnualIncome0" class="text-box" value="<?php echo $row[$GuradianAnnualIncome];?>" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Company Name(If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianCompanyName" id="txtMotherCompanyName0" value="<?php echo $row[$GuradianCompanyName];?>" type="text" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Official Address 
		(If employed):</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<textarea name="txtGuradianOfficialAddress" id="txtMotherOfficialAddress0" value="<?php echo $row[$GuradianOfficialAddress];?>" class="text-box-address" class="text-box-address" cols="20" rows="2"></textarea></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11" colspan="2">















		&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Official Landline. no :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianOfficialPhNo" id="txtMotherOfficialPhNo0" value="<?php echo $row[$GuradianOfficialPhNo];?>" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<font face="Cambria">Mobile No</font></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianMobileNo" id="txtFatherOfficialPhNo4" class="text-box" value="<?php echo $row[$GuradianMobileNo];?>" type="text" size="20"></font></td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px; border-top-style:solid; border-top-width:1px" class="auto-style11">







		<font face="Cambria"><b>14. </b>School Transport required</font></td>



				<td class="auto-style11" colspan="2" style="border-top-style: solid; border-top-width: 1px">















		<font face="Cambria">















		<input name="" id="" class="text-box" value="<?php echo $row[$TransportAvail];?>" type="text" size="20"></font></td>



				<td style="width: 28px; border-top-style:solid; border-top-width:1px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 217px; border-top-style:solid; border-top-width:1px" class="auto-style11" id="tdTransport">
				<!--<font face="Cambria">If No, are you in position to provide safe transportation to the applicant to and fro from School :</font>-->
				</td>
				<td style="width: 158px; border-top-style:solid; border-top-width:1px" class="auto-style11">
		














		<font face="Cambria">















		<input name="" id="" class="text-box" value="<?php echo $row[$SafeTransport];?>" type="text" size="20"></font></td>
			</tr>
			<tr>
				<td style="width: 212px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
		&nbsp;</td>
				<td class="auto-style11" colspan="2" style="border-bottom-style: solid; border-bottom-width: 1px">
		&nbsp;</td>
				<td style="width: 28px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 217px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
		&nbsp;</td>
				<td style="width: 158px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
		&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style11" colspan="6" bgcolor="#A9D0F5">
		<font face="Cambria"><strong>15. Category</strong></font><span style="color: #000000" class="auto-style33"><font face="Cambria">*
		<i>(Please Select any Category and fill the details as applicable 
		below, if you do not fall in any category, please select Others). Parents are required to produce relevant documents at time of Admission. In case 
		documents are not produced, the candidature will be rejected)</i>:</font></span></td>



				</tr>
			<tr>



				<td class="auto-style11" colspan="6">

		<table style="width: 100%" cellpadding="0" class="style15">
			<tr>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>Sibling Studying in DPS</strong></td>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>Father DPS Alumni</strong></td>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>Mother DPS Alumni</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style22">S<span class="style25"><strong>ingle 
				Parent</strong></span></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>Special Needs</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>DPS Staff</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>Others</strong></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkSibling" id="chkSibling" type="checkbox" value="<?php echo $row[$Sibling];?>"></td>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkFatherAlumni" id="chkFatherAlumni" type="checkbox" value="<?php echo $row[$Father_DPS_Alumni];?>"></td>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkMotherAlumni" id="chkMotherAlumni" type="checkbox" value="<?php echo $row[$Mother_DPS_Alumni];?>"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkSingleParent" id="chkSingleParent" type="checkbox" value="<?php echo $row[$Single_Parent];?>"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkSpecialNeed" id="chkSpecialNeed" type="checkbox" value="<?php echo $row[$Special_Needs];?>"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkDPSStaff" id="chkDPSStaff" type="checkbox" value="<?php echo $row[$Staff];?>"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" value="<?php echo $row[$OtherCategory];?>"></td>
			</tr>
		</table>
		</td>



				</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6">







		<font face="Cambria"><b>16.</b> <strong>Details of Siblings Studying in <?php echo $SchoolName; ?>, Faridabad</strong></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Real Brother / Sister Name:</font></span></td>



				<td class="auto-style11" colspan="2">















		<font face="Cambria">















		<input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" value="<?php echo $row[$RealBroSisName];?>" readonly="readonly"></font></td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Real Brother / Sister Class:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box" type="text" value="<?php echo $row[$RealBroSisClass];?>" readonly="readonly"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Real Brother / Admission 
		No:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" value="<?php echo $row[$RealBroSisAdmissionNo];?>" type="text" readonly="readonly"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">















		&nbsp;</td>



				<td style="width: 157px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="border-top-style:none; border-top-width:medium" class="auto-style11" height="23" colspan="6">







		<font face="Cambria"><b>17. Details of Father / Mother, if Alumni of <?php echo $SchoolName; ?></b></font></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td class="auto-style11" height="23" colspan="6">







		<u><b><font face="Cambria">Father Alumni Details:</font></b></u></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Alumni Name (Father)</font></td>



				<td style="width: 172px" class="auto-style11" height="23">















		<font face="Cambria">















		<input name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" type="text" value="<?php echo $row[$AlumniFatherName];?>" size="20" readonly="readonly"></font></td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		<font face="Cambria">Name Of DPS School (Father)</font></td>



				<td style="width: 158px" class="auto-style11" height="23">















		<font face="Cambria">

		<!--<input name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" type="text" size="20" readonly="readonly">-->















		<input name="" id="" class="text-box" type="text" value="<?php echo $row[$AlumniSchoolName];?>" size="20" readonly="readonly"></font></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Passout Year (Father)</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<font face="Cambria">
		<input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" value="<?php echo $row[$AlumniPassingYear];?>" size="20" readonly="readonly"></font></td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Last Passout Class from DPS</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		














		<font face="Cambria">















		<input name="txtFatherAlumniName1" id="txtFatherAlumniName1" class="text-box" type="text" value="<?php echo $row[$AlumniFatherPassingClass];?>" size="20" readonly="readonly"></font></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<u><font face="Cambria"><b>Mother Alumni Details:</b></font></u></td>



				<td style="width: 172px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>
				<td style="width: 28px" class="auto-style11" height="23">
				&nbsp;</td>
				<td style="width: 217px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">
		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Alumni Name (Mother)</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<input name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" value="<?php echo $row[$AlumniMotherName];?>" type="text" size="20" readonly="readonly">
		</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>
				<td style="width: 28px" class="auto-style11" height="23">
				&nbsp;</td>
				<td style="width: 217px" class="auto-style11" height="23">
		<font face="Cambria">Name Of DPS School (Mother)</font></td>



				<td style="width: 158px" class="auto-style11" height="23">
		<!--<input name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" type="text" size="20" readonly="readonly">-->















		<font face="Cambria">















		<input name="" id="" class="text-box" type="text" value="<?php echo $row[$AlumniMotherSchoolName];?>" size="20" readonly="readonly"></font>
		
			</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Passout Year (Mother)</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" value="<?php echo $row[$AlumniMotherPassingYear];?>" type="text" size="20" readonly="readonly">
		</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Last Passout Class from DPS</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		














		<font face="Cambria">















		<input name="" id="" class="text-box" type="text" value="<?php echo $row[$AlumniMotherPassingClass];?>" size="20" readonly="readonly"></font></td>



			</tr>
			


			</table>



		</td>



</tr>	







			



		



			<tr>



			



			



		







		<td style="height: 46px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style23">







		&nbsp;</td>



</tr>	







<tr>			



		







		<td style="height: 10; border-top-width:1px; background-color:#A9D0F5" class="auto-style47">







		<font face="Cambria">







		<strong>18. Contact Details for all Admission Related Information:</strong></font></td>







			</tr>



		



		<tr>







		<td style="height: 29px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style23">







		<table style="width: 100%" class="style14">



			<tr>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Contact No*:</font></span></td>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">







		<input name="txtEmergencyNo" id="txtEmergencyNo"  class="text-box" value="<?php echo $row[$EmergencyContactNo];?>" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" type="text"></font></td>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mobile No*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">







		<input name="txtMobile" id="txtMobile" type="text" class="text-box" value="<?php echo $row[$RegistrationFormNo];?>" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" style="width: 143px"></font></td>



				<td style="width: 221px" class="auto-style26">







		<span class="auto-style25"><font face="Cambria">E-mail Id*</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 222px" class="auto-style26">







		<font face="Cambria">







		<input name="txtemail" id="txtemail" type="text" value="<?php echo $row[$email];?>" class="text-box"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style11">







				&nbsp;</td>



			</tr>
		</table>



		</td>

		</tr>


		<tr>



		<td style="border-top-width: 1px">
		<b><font face="Cambria">19. Documents for Upload: <span class="style27">
		(Please note maximum file size allowed is 250 Kb.)</span></font></b><p>
		<font face="Cambria">1. Copy of Birth Certificate (Duly Attested) issued by Municipal Corporation : <input type="file" name="F1" size="20" value="<?php echo $row[$BirthCertificate];?>" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font><p>
		<font face="Cambria">2. Child Photograph :<input type="file" name="F2" value="<?php echo $row[$ProfilePhoto];?>" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font>
		<p>
		<font face="Cambria">3. Previous Class Score Card (Applicable Only for 
		Admission for Class Prep to IXth) :<input type="file" value="<?php echo $row[$ScoreCard];?>" name="F3" size="20"></font>
		</td>

</tr>



		<tr>



		<td style="border-bottom-width: 1px">
		&nbsp;</td>


</tr>
		<tr>
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;">
		<u><b><font face="Cambria">20. Declaration:</font></b></u><p>
		<font face="Cambria">1. I understand that the registration fee of 
		<span style="font-weight: 400">
		INR 500</span>/- 
	(NURSERY) &amp; INR 750/-(Prep to IXth) 
		( as applicable ) is towards the processing fee for the admission process. It is 
		non-refundable and registration does not guarantee admission.</font></p>
		<p><font face="Cambria">2. I understand that rendering false / incorrect or misleading 
		information shall disqualify the child for admission to this school and 
		also that incomplete form will be rejected without assigning any reason.</font></p>
		<p><font face="Cambria">3. I have carefully read the rules, regulations and procedures laid 
		down by the school and being desirous of having my child / ward educated 
		in <?php echo $SchoolName; ?>, Faridabad, I hereby agree to abide by them in all respects. I 
		understand that the decision of the management of the School shall be 
		final and binding on me for which I will not file any objection / case 
		in any court of law anywhere in India.</font></p>
		<p><font face="Cambria">4. I hereby certify that my ward and I shall 
		follow all the rules, regulations and procedures laid down by the School 
		from time to time.</font></p>
		<p><font face="Cambria">5. I hereby put my signatures to confirm the 
		above declarations.</font></p>
		<p><font face="Cambria"><b>Place</b></font> :
		<input type="text" name="T1" value="<?php echo $row[$routeno];?>" size="20"><p><b><font face="Cambria">Date :<?php echo $currentdate;?>
		</font></b>
		<p>&nbsp;</td>


</tr>



		<tr>



		<td>
		<p align="center">


		&nbsp;</td>


</tr>



<tr>



		<td style="height: 29px" class="style7">

		&nbsp;</td>


	</tr>

<tr>



		<td style="height: 29px" class="style7">


		&nbsp;</td>

	</tr>


	</form>


</table>



<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>




</body>
</html>


