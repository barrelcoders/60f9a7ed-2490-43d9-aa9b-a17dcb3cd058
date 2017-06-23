<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php

if ($_REQUEST["txtName"] != "")
{
                       $ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];	

			 $cboClass=str_replace("'","",$_REQUEST["cboClass"]);
			 $Stream=$_REQUEST["cboStream"];
			 if($_REQUEST["txtOptionalSubject"] !="")
			 {
			 	$OptionalSubject=$_REQUEST["txtOptionalSubject"];
			 	$OptionalSubject= substr($OptionalSubject,0,strlen($OptionalSubject)-1);
			 }
			 
			$EnglishMarks=$_REQUEST["txtEnglishMarks"];
			$EnglishGradePoint=$_REQUEST["txtEnglishGradePoint"];
			$EnglishMarksPercent=$_REQUEST["txtEnglishMarksPercent"];
			
			$MathsMarks=$_REQUEST["txtMathsMarks"];
			$MathsGradePoints=$_REQUEST["txtMathsGradePoints"];
			$MathsMarksPercent=$_REQUEST["txtMathsMarksPercent"];
			
			$GeneralScience=$_REQUEST["txtGeneralScience"];
			$ScienceGradePoint=$_REQUEST["txtScienceGradePoint"];
			$ScienceMarksPercent=$_REQUEST["txtScienceMarksPercent"];
			
			$SocialScience=$_REQUEST["txtSocialScience"];
			$SocialScienceGradePoints=$_REQUEST["txtSocialScienceGradePoints"];
			$SocialScienceMarksPercent=$_REQUEST["txtSocialScienceMarksPercent"];
			
			$LanguageMarks=$_REQUEST["txtLanguageMarks"];
			$LanguageGradePoint=$_REQUEST["txtLanguageGradePoint"];
			$LanguageMarksPercent=$_REQUEST["txtLanguageMarksPercent"];
			 
			 //echo $cboClass."<br>".$Stream."<br>".$OptionalSubject;
			 //exit();

			 /*
			 if($cboClass=="Nursery")
			 {
			 	echo "<br><br><center><b>REGISTRATION FOR ADMISSION TO CLASS NURSERY & PREP ARE CLOSED";
			 	exit();
			 }
			 */
			 
			  $t=time();				
			  $extension = end(explode(".", $_FILES["F1"]["name"]));
			  
			  $BirthCertiFileName="";
			  if($_FILES["F1"]["name"] !="")
			  {
			      $BirthCertiFileName="BirthCerti".$t.$_FILES["F1"]["name"];
			      /*
			      if ($_FILES['F1']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Certificate image,maximum file size allowed is 250 Kb<br>Plese click <a href='StudentRegistration.php'>here</a> to restart the registration process again";
			      	exit();
			      }
			      */
			  }
		      
		      move_uploaded_file($_FILES["F1"]["tmp_name"],"StudentRegistrationPhotos/BirthCerti".$t.$_FILES["F1"]["name"]);
		      
		      $extension = end(explode(".", $_FILES["F2"]["name"]));
		      $ChildPhoto="";
		      if($_FILES["F2"]["name"] !="")
		      {
		      	$ChildPhoto="ChildPhoto".$t.$_FILES["F2"]["name"];
		      	  /*
		      	  if ($_FILES['F2']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Child image,maximum file size allowed is 250 Kb<br>Plese click <a href='StudentRegistration.php'>here</a> to restart the registration process again";
			      	exit();
			      }
			      */
		      }	
		      move_uploaded_file($_FILES["F2"]["tmp_name"],"StudentRegistrationPhotos/ChildPhoto".$t.$_FILES["F2"]["name"]);
		      
		      $ScoreCardFile="";
		      $extension = end(explode(".", $_FILES["F3"]["name"]));
		      if($_FILES["F3"]["name"] !="")
		      {
		      	$ScoreCardFile="ScoreCard".$t.$_FILES["F3"]["name"];
		      }
		      move_uploaded_file($_FILES["F3"]["tmp_name"],"StudentRegistrationPhotos/ScoreCard".$t.$_FILES["F3"]["name"]);

			

	$txtName=$_REQUEST["txtName"];
	$LastName=$_REQUEST["txtLastName"];
	
	//$txtDOB=$_REQUEST["txtDOB"];
	$Dt = $_REQUEST["txtDOB"];
		$arr=explode('/',$Dt);
		$txtDOB = $arr[2] . "-" . $arr[0] . "-" . $arr[1];


	$txtPlaceOfBirth=str_replace("'","",$_REQUEST["txtPlaceOfBirth"]);
	$txtAge=str_replace("'","",$_REQUEST["txtAge"]);
	
	$strAge=str_replace(" ","",$txtAge);
	$arr1=explode(',',$strAge);
	
	$AgeYear=$arr1[0];
	$AgeMonth=$arr1[1];
	$AgeDay=$arr1[2];
	
	
	$txtSex=str_replace("'","",$_REQUEST["txtSex"]);
	$txtMotherTounge=str_replace("'","",$_REQUEST["txtMotherTounge"]);
	$txtNationality=str_replace("'","",$_REQUEST["txtNationality"]);

	$txtLastSchool=str_replace("'","",$_REQUEST["txtLastSchool"]);

	$txtAddress=str_replace("'","",$_REQUEST["txtAddress"]);
	
	$cboLocation=str_replace("'","",$_REQUEST["cboLocation"]);
	$rsLocation=mysql_query("select distinct `Distance` from `NewStudentRegistrationDistanceMaster` where `Sector`='$cboLocation'");
	while($rowL=mysql_fetch_row($rsLocation))
	{
		$cboDistance=$rowL[0];
		break;
	}

	
	$txtFatherName=str_replace("'","",$_REQUEST["txtFatherName"]);
	$txtFatherAge=str_replace("'","",$_REQUEST["txtFatherAge"]);
	$txtFatherEducation=str_replace("'","",$_REQUEST["txtFatherEducation"]);
	$cboDuration=str_replace("'","",$_REQUEST["cboDuration"]);
	
	$txtFatherOccupation=str_replace("'","",$_REQUEST["txtFatherOccupation"]);
	$txtFatherDesignation=str_replace("'","",$_REQUEST["txtFatherDesignation"]);
	$txtFatherAnnualIncome=str_replace("'","",$_REQUEST["txtFatherAnnualIncome"]);
	$txtFatherCompanyName=str_replace("'","",$_REQUEST["txtFatherCompanyName"]);
	$txtFatherOfficialAddress=str_replace("'","",$_REQUEST["txtFatherOfficialAddress"]);
	$txtFatherOfficialPhNo=str_replace("'","",$_REQUEST["txtFatherOfficialPhNo"]);
	$txtFatherMobileNo=str_replace("'","",$_REQUEST["txtFatherMobileNo"]);
	$txtFatherEmailId=str_replace("'","",$_REQUEST["txtFatherEmailId"]);
	
	
	$txtMotherName=str_replace("'","",$_REQUEST["txtMotherName"]);
	$txtMotherAge=str_replace("'","",$_REQUEST["txtMotherAge"]);
	$txtMotherEducation=str_replace("'","",$_REQUEST["txtMotherEducation"]);
	$cboMotherQualificationDuration=str_replace("'","",$_REQUEST["cboMotherQualificationDuration"]);
	$txtMotherOccupation=str_replace("'","",$_REQUEST["txtMotherOccupation"]);
	$txtMotherDesignation=str_replace("'","",$_REQUEST["txtMotherDesignation"]);
	$txtMotherAnnualIncome=str_replace("'","",$_REQUEST["txtMotherAnnualIncome"]);
	$txtMotherCompanyName=str_replace("'","",$_REQUEST["txtMotherCompanyName"]);
	$txtMotherOfficialAddress=str_replace("'","",$_REQUEST["txtMotherOfficialAddress"]);
	$txtMotherOfficialPhNo=str_replace("'","",$_REQUEST["txtMotherOfficialPhNo"]);
	$txtMotherMobileNo=str_replace("'","",$_REQUEST["txtMotherMobileNo"]);
	$txtMotherEmailId=str_replace("'","",$_REQUEST["txtMotherEmailId"]);
	
	$txtGuradianName=str_replace("'","",$_REQUEST["txtGuradianName"]);
	$txtGuradianAge=str_replace("'","",$_REQUEST["txtGuradianAge"]);
	$txtGuradinaEducation=str_replace("'","",$_REQUEST["txtGuradinaEducation"]);
	$txtGuradianOccupation=str_replace("'","",$_REQUEST["txtGuradianOccupation"]);
	$txtGuradianDesignation=str_replace("'","",$_REQUEST["txtGuradianDesignation"]);
	$txtGuradianAnnualIncome=str_replace("'","",$_REQUEST["txtGuradianAnnualIncome"]);
	$txtGuradianCompanyName=str_replace("'","",$_REQUEST["txtGuradianCompanyName"]);
	$txtGuradianOfficialAddress=str_replace("'","",$_REQUEST["txtGuradianOfficialAddress"]);
	$txtGuradianOfficialPhNo=str_replace("'","",$_REQUEST["txtGuradianOfficialPhNo"]);
	$txtGuradianMobileNo=str_replace("'","",$_REQUEST["txtGuradianMobileNo"]);
	
	$cboTransport=str_replace("'","",$_REQUEST["cboTransport"]);
	$cboSafeTransport=str_replace("'","",$_REQUEST["cboSafeTransport"]);
	
	$txtRealBroSisName=str_replace("'","",$_REQUEST["txtRealBroSisName"]);
	$txtRealBroSisClass=str_replace("'","",$_REQUEST["txtRealBroSisClass"]);
	$txtRealBroSisSchoolName=str_replace("'","",$_REQUEST["txtRealBroSisSchoolName"]);
	
	$txtFatherAlumniName=str_replace("'","",$_REQUEST["txtFatherAlumniName"]);
	$txtDPSSchoolName=str_replace("'","",$_REQUEST["txtDPSSchoolName"]);
	$txtYearOfPassing=str_replace("'","",$_REQUEST["txtYearOfPassing"]);
	$txtLastPassoutClassFather=str_replace("'","",$_REQUEST["txtLastPassoutClassFather"]);
	
	$txtMotherAlumniName=str_replace("'","",$_REQUEST["txtMotherAlumniName"]);
	$txtMotherDPSSchoolName=str_replace("'","",$_REQUEST["txtMotherDPSSchoolName"]);
	$txtMotherYearOfPassing=str_replace("'","",$_REQUEST["txtMotherYearOfPassing"]);
	$txtLastPassoutClassMother=str_replace("'","",$_REQUEST["txtLastPassoutClassMother"]);
	
	
	$txtEmergencyNo=str_replace("'","",$_REQUEST["txtEmergencyNo"]);
	$txtMobile=str_replace("'","",$_REQUEST["txtMobile"]);
	$txtemail=str_replace("'","",$_REQUEST["txtemail"]);
	
	$hSibling=$_REQUEST["hSibling"];
	$hFatherAlumni=$_REQUEST["hFatherAlumni"];
	$hMotherAlumni=$_REQUEST["hMotherAlumni"];
	$hSingleParent=$_REQUEST["hSingleParent"];
	$hSpecialNeed=$_REQUEST["hSpecialNeed"];
	$hDPSStaff=$_REQUEST["hDPSStaff"];
	$hEWSCategory=$_REQUEST["hEWSCategory"];
	$hOtherCategory=$_REQUEST["hOtherCategory"];
	$HostelFacility=$_REQUEST["cboHostelFacility"];
	
	$currentdate=date("Y-m-d");
	
		

$merchantTxnId = uniqid(); 
if($cboClass=="Nursery")
{
	$orderAmount=500;	
	//$orderAmount = 1;
}
else
{
	$orderAmount=750;	
	//$orderAmount = 2;
}
//$orderAmount = 1;
	
$ssql="insert into `NewStudentRegistration_temp` (`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`ResidentialAddress`,`Location`,`Distance`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`smobile`,`email`,`TxnAmount`,`TxnId`,`ProfilePhoto`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`HostelFacility`,`FinancialYear`) VALUES ";
$ssql=$ssql."('$currentdate','$txtName','$LastName','$txtDOB','$txtPlaceOfBirth','$txtAge','$AgeYear','$AgeMonth','$AgeDay','$txtSex','$hSibling','$hFatherAlumni','$hMotherAlumni','$hSingleParent','$hSpecialNeed','$hDPSStaff','$hEWSCategory','$hOtherCategory','$txtMotherTounge','$txtNationality','$cboClass','$txtLastSchool','$txtAddress','$cboLocation','$cboDistance','$txtFatherName','$txtFatherAge','$txtFatherEducation','$cboDuration','$txtFatherOccupation','$txtFatherDesignation','$txtFatherAnnualIncome','$txtFatherCompanyName','$txtFatherOfficialAddress','$txtFatherOfficialPhNo','$txtFatherMobileNo','$txtFatherEmailId','$txtMotherName','$txtMotherAge','$txtMotherEducation','$cboMotherQualificationDuration','$txtMotherOccupation','$txtMotherDesignation','$txtMotherAnnualIncome','$txtMotherCompanyName','$txtMotherOfficialAddress','$txtMotherOfficialPhNo','$txtMotherMobileNo','$txtMotherEmailId','$txtGuradianName','$txtGuradianAge','$txtGuradinaEducation','$txtGuradianOccupation','$txtGuradianDesignation','$txtGuradianAnnualIncome','$txtGuradianCompanyName','$txtGuradianOfficialAddress','$txtGuradianOfficialPhNo','$txtGuradianMobileNo','$cboTransport','$cboSafeTransport','$txtRealBroSisName','$txtRealBroSisClass','$txtRealBroSisSchoolName','$txtFatherAlumniName','$txtDPSSchoolName','$txtYearOfPassing','$txtLastPassoutClassFather','$txtMotherAlumniName','$txtMotherDPSSchoolName','$txtMotherYearOfPassing','$txtLastPassoutClassMother','$txtEmergencyNo','$txtMobile','$txtemail','$orderAmount','$merchantTxnId','$ChildPhoto','$BirthCertiFileName','$ScoreCardFile','$Stream','$OptionalSubject','$EnglishMarks','$EnglishGradePoint','$EnglishMarksPercent','$MathsMarks','$MathsGradePoints','$MathsMarksPercent','$GeneralScience','$ScienceGradePoint','$ScienceMarksPercent','$SocialScience','$SocialScienceGradePoints','$SocialScienceMarksPercent','$LanguageMarks','$LanguageGradePoint','$LanguageMarksPercent','$HostelFacility','$Year')";

//echo $ssql;
//exit();
	///**************
	
	//echo "Submitted Successfully!";
			//exit();
			
			mysql_query($ssql) or die(mysql_error());
					
			
			//$Message1="<br><br><center><b>Student Registration: ".$Admission." successfully completed!<br><a href='StudentManagementLandingPage.php'>Home </a>";

			//echo $Message1;
			//exit();
			$SubmitStatus="successfull";
			
			//set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
             //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
             $formPostUrl = "https://www.citruspay.com/totalsoft";	
             
             //Need to change with your Secret Key
             //$secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
             
             //Need to change with your Vanity URL Key from the citrus panel
             //$vanityUrl = "totalsoft";
			
			

             //Need to change with your Order Amount
             
             //$currency = "INR";
             //$data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
             //$securitySignature = hash_hmac('sha1', $data, $secret_key);

}
else
{
	exit();
}

?>



<script language="javascript">
function Validate(SubmitType)
{
	
	if (document.getElementById("txtTotal").value =="")
	{
		alert("Toatal payable amount is blank !");
		return;
	}
	if (document.getElementById("txtTotalAmtPaying").value=="")
	{
		alert("Total Fee paid is mandatory!");
		return;
	}
	
	if(document.getElementById("cboPaymentMode").value=="Cheque")
	{
		if(document.getElementById("txtChequeDate").value=="")
		{
			alert("Cheque date is mandatory!");
			return;
		}
		if(document.getElementById("txtChequeNo").value=="")
		{
			alert("Cheque No is mandatory!");
			return;
		}
		if(document.getElementById("cboBank").value=="Select One")
		{
			alert("Bank Name is mandatory!");
			return;
		}
	}
	
	document.getElementById("frmFees").action="RegistrationFeeResponseCounter.php";
	
	
	
	
	
	
	/*
	if(parseInt(document.getElementById("txtTotalAmtPaying").value) > parseInt(document.getElementById("txtTotal").value))
	{
		alert("Paid amount can not be more then payable amount! Plase check");
		return;
	}
	*/
	
	document.getElementById("frmFees").submit();
	
}

</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Registration Fees Collection</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.auto-style1 {
	font-size: 11pt;
	font-family: Cambria;
}
.auto-style2 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style5 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}

.auto-style12 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
	text-align: center;
}

.auto-style14 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style15 {
	font-size: 11pt;
	color: #822203;
	font-weight: bold;
	font-family: Cambria;
}
.auto-style17 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style18 {
	margin-left: 0px;
	font-family: Cambria;
	font-size: 11pt;
	color: #CC0033;
}

.auto-style20 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
	font-size: medium;
}

.auto-style22 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style23 {
	border-style: none;
	border-width: medium;
}
.auto-style24 {
	border-style: none;
	border-width: medium;
	text-align: left;
}
.auto-style25 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}

.auto-style26 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.auto-style27 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style28 {
	font-size: 11pt;
	font-weight: normal;
	font-family: Cambria;
}
.auto-style30 {
	font-family: Cambria;
	font-weight: normal;
	font-size: 11pt;
	color: #000000;
}
.auto-style33 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
}

.auto-style34 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: 700;
	color: #000000;
	font-size: 11pt;
}

.auto-style35 {
	font-size: 11pt;
	font-family: Cambria;
	color: #CC0033;
}

.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}
.auto-style6 {
	
	font-family: Cambria;
	color: #CD222B;
}

.auto-style36 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style37 {
	font-family: Cambria;
}
.auto-style38 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}

.style1 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.style2 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style4 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style5 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style6 {
	font-family: Cambria;
	color: #000000;
}
.style8 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: 700;
	font-size: 11pt;
}
.style9 {
	color: #000000;
}
.style10 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
	text-align: center;
}
.style12 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.style13 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	text-decoration: underline;
}

.style14 {
	border-style: solid;
	border-width: 1px;
}

.style17 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-size: 11pt;
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
.style20 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.style22 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #FF0000;
}
</style>

</head>



<body >

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 70px">

	

	
	<tr>
		<td class="auto-style14">
		<span class="style6">Registation Fees Collection</span><hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</table>


	
	<form name="frmFees" id="frmFees" method="post" action="RegistrationFeeResponseCounter.php" target="_self">

		
	
	<table border="1px" width="100%">
	
	
		<!--
		<tr>
		
		<td style="width: 281px; height: 29px;" class="auto-style23">

		<span class="style5">Student Admission No. </span>
		<span style="font-weight: 700; " class="auto-style1">:</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style23">

		<input type="text" name="txtAdmissionNo" id="txtAdmissionNo" size="15" style="width: 151px;" class="auto-style1" value="<?php echo $_REQUEST["txtAdmissionNo"]; ?>"></td>

		<td style="width: 157px; height: 29px;" class="auto-style26">



		<input name="btnGo" type="button" value="Fill Detail" onclick="Javascript:Validate1();" class="auto-style1" style="width: 82px"></td>
	</tr>
	-->
	
	<tr>
	
	
	
		<td style="width: 281px; height: 52px;" class="auto-style23">

		<span class="style5">Student Name</span><span class="auto-style1">
		</span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

		<input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $txtName;?>" readonly="readonly" ></td>
	
		
		
		
	
		<td style="width: 157px; height: 52px;" class="auto-style41">

		&nbsp;</td>
	
		
		
		
	
		<td style="width: 179px; height: 52px;" class="style4">

		Class</td>

		<td style="height: 52px;" class="auto-style23">

		<input name="txtClass" id="txtClass" type="text" class="text-box"value="<?php echo $cboClass;?>" readonly="readonly"></td>
		
		
	
		<td style="width: 191px; height: 52px;" class="auto-style26">

		<span class="auto-style1">
		<span style="font-weight: 700">Father's Name</span>
		</span>

		</td>
		
		

		<td style="height: 52px;" class="auto-style23">

		<input name="txtFatherName" id="txtFatherName" type="text"  value="<?php echo $txtFatherName; ?>" readonly="readonly" class="text-box"></td>
		<br class="auto-style1">
		
		<br class="auto-style1">
		</tr>
		
		
		</table>
		<br class="auto-style37">


	
	
	
	<table style="height: 45px" width="100%" class="style14">
		
		
	<tr>
	
	
	
		<td style="width: 154px; height: 39px;" class="style2">

		Mode Of Payment</td>

		<td style="height: 39px;" class="auto-style22">

		<select name="cboPaymentMode" id="cboPaymentMode" class="text-box"  >
		<option selected="" value="Cheque">Cheque</option>
		<option value="Cash">Cash</option>
		<option value="Demand Draft">Demand Draft</option>
		</select></td>

		
		
		
	
		<td style="height: 39px; width: 167px" class="style20">

		Cheque Date:</td>

		
	
		
	
		<td style="height: 39px; width: 167px" class="style1">

		<input name="txtChequeDate" id="txtChequeDate" class="tcal" type="text"></td>
	
		<td style="height: 39px; width: 167px" class="style1">

		<strong>Cheque or DD#</strong></td>

		
	
		<td style="width: 99px; height: 39px;" class="auto-style25">

		<strong>

		<input name="txtChequeNo" id="txtChequeNo" type="text" class="text-box" ></strong></td>
		
		

		<td style="width: 155px; height: 39px;" class="auto-style26">

		<strong><span class="auto-style1">Bank Name</span></strong></td>
		
		<td style="height: 39px;" class="auto-style22">
		
		<select name="cboBank" id="cboBank" style="float: left" ; class="text-box">
						<option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="select distinct `bank_name` from `bank_master` where status='1'";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select>		</td>

		</tr>
		
		
		</table>
		<br class="auto-style37">
	
		
	
<table width="1327" class="style14">

<tr>			
		

		<td style="width: 163px; height: 38px" class="style2">

		

		Total Fees Payable
		</td>


		<td class="auto-style22" style="height: 38px" width="421">
		


		<input name="txtTotal" id="txtTotal" type="text" class="text-box" readonly="readonly" value="750"></td>


		<td class="auto-style22" style="height: 38px" width="159">


<!--
		<strong>Balance</strong>
-->		

	

				Total Fees Paid</td>


		<td class="auto-style22" style="height: 38px" width="564">


<!--
		<input name="txtBalance" id="txtBalance" type="text" class="text-box">
-->		

		

		<input name="txtTotalAmtPaying" id="txtTotalAmtPaying" type="text" class="text-box" value="750"></td>

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

	

				&nbsp;</td>


		<td style="width: 70px; " class="auto-style22" colspan="3">

		

		&nbsp;</td>

			</tr>		
		<?php
			if ($FeeSubmissionQuarter == "Q1" && $StudentType = "Old Student")
			{
				$AnnualChargApply="yes";
		?>

		<?php
		}
		else
		{
			$AnnualChargApply="no";
		}
		?>
		<input type="hidden" name="isAnnualChargApply" id="isAnnualChargApply" value="<?php echo $AnnualChargApply; ?>">		

<tr>
		<td style="height: 37px" class="style8" colspan="4">

		<p style="text-align: center">

		<strong>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate('SubmitType');" class="text-box"></strong></td>

	</tr>
		

	<?php 

	if ($Message1 !="")

	{

	?>

	<?php 

	}

	?>

		

</table>
		<span class="auto-style37">
<!--
</form>
-->
		</span>

	
		<br class="auto-style1">

	
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</form>

<!--
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
-->
</body>



</html>