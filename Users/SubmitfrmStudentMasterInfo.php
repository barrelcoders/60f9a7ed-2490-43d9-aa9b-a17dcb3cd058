<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
if ($_REQUEST["txtName"] != "")
{
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

			
			 
			  $t=time();				
			  $extension = end(explode(".", $_FILES["F1"]["name"]));
			  
			  $ScoreCardFileName="";
			  if($_FILES["F1"]["name"] !="")
			  {
			      $ScoreCardFileName="ScoreCardFileName".$t.$_FILES["F1"]["name"];
			      /*
			      if ($_FILES['F1']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Certificate image,maximum file size allowed is 250 Kb<br>Plese click <a href='StudentRegistration.php'>here</a> to restart the registration process again";
			      	exit();
			      }
			      */
			  }
		      
		      move_uploaded_file($_FILES["F1"]["tmp_name"],"../Admin/StudentManagement/StudentDocuments/ScoreCardFileName".$t.$_FILES["F1"]["name"]);
		      
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
		      move_uploaded_file($_FILES["F2"]["tmp_name"],"../Admin/StudentManagement/StudentPhotos/ChildPhoto".$t.$_FILES["F2"]["name"]);
		      
		      $ScoreCardFile="";
		      
		      
		      $ITR="";
		      $extension = end(explode(".", $_FILES["F4"]["name"]));
		      if($_FILES["F4"]["name"] !="")
		      {
		      	$ITR="ITR".$t.$_FILES["F4"]["name"];
		      }
		      move_uploaded_file($_FILES["F4"]["tmp_name"],"../Admin/StudentManagement/StudentDocuments/ITR".$t.$_FILES["F4"]["name"]);
			
			$MotherITR="";
		      $extension = end(explode(".", $_FILES["F5"]["name"]));
		      if($_FILES["F5"]["name"] !="")
		      {
		      	$MotherITR="MotherITR".$t.$_FILES["F5"]["name"];
		      }
		      move_uploaded_file($_FILES["F5"]["tmp_name"],"../Admin/StudentManagement/StudentDocuments/MotherITR".$t.$_FILES["F5"]["name"]);

			
	$sadmission=$_REQUEST["hsadmission"];
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
	
	$StudentAadharCardNo=$_REQUEST["txtAadharCardNo"];
	$FahterAadharCardNo=$_REQUEST["txtFatherAadharCardNo"];
	$MotherAadharCardNo=$_REQUEST["txtMotherAadharCardNo"];
	
	
	$currentdate=date("Y-m-d");
	
		

$trimmedadmissionno=substr($sadmission,0,1);
	
	
	
	
	if($trimmedadmissionno!="N")
	{
	$StudentType=Internal;
	}
	else
	{
	$StudentType=External;
	}
	
	$TotalGradePointESM=0;
	$TotalGradePointESM=$TotalGradePointESM+$EnglishGradePoint+$MathsGradePoints+$ScienceGradePoint;
	
	$TotalGradePointESMSST=0;
	$TotalGradePointESMSST=$TotalGradePointESMSST+$EnglishGradePoint+$MathsGradePoints+$ScienceGradePoint+$SocialScienceGradePoints;
	
	$TotalGradePointESMCumulative=0;
	$TotalGradePointESMCumulative=$TotalGradePointESMCumulative+$EnglishGradePoint+$MathsGradePoints+$ScienceGradePoint+$SocialScienceGradePoints;

 
 
     //echo $trimmedadmissionno;
     //echo $StudentType;
     //echo $TotalGradePointESM;
     //echo $TotalGradePointESMSST;
     //echo $TotalGradePointESMCumulative;
     
     //exit();
     
     
/*///Internal Student/////*/
	
	if($StudentType=="Internal")
	{
		if($TotalGradePointESM>=21)
		{
			$ssql="insert into `StudentMasterInfo` (`sadmission`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`ResidentialAddress`,`Location`,`Distance`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`smobile`,`email`,`TxnAmount`,`TxnId`,`ProfilePhoto`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`HostelFacility`,`StudentAadharCardNo`,`FatherAadharCardNo`,`MotherAadharCardNo`,`ITR`,`MotherITR`) VALUES ";
		      $ssql=$ssql."('$sadmission','$currentdate','$txtName','$LastName','$txtDOB','$txtPlaceOfBirth','$txtAge','$AgeYear','$AgeMonth','$AgeDay','$txtSex','$hSibling','$hFatherAlumni','$hMotherAlumni','$hSingleParent','$hSpecialNeed','$hDPSStaff','$hEWSCategory','$hOtherCategory','$txtMotherTounge','$txtNationality','$cboClass','$txtLastSchool','$txtAddress','$cboLocation','$cboDistance','$txtFatherName','$txtFatherAge','$txtFatherEducation','$cboDuration','$txtFatherOccupation','$txtFatherDesignation','$txtFatherAnnualIncome','$txtFatherCompanyName','$txtFatherOfficialAddress','$txtFatherOfficialPhNo','$txtFatherMobileNo','$txtFatherEmailId','$txtMotherName','$txtMotherAge','$txtMotherEducation','$cboMotherQualificationDuration','$txtMotherOccupation','$txtMotherDesignation','$txtMotherAnnualIncome','$txtMotherCompanyName','$txtMotherOfficialAddress','$txtMotherOfficialPhNo','$txtMotherMobileNo','$txtMotherEmailId','$txtGuradianName','$txtGuradianAge','$txtGuradinaEducation','$txtGuradianOccupation','$txtGuradianDesignation','$txtGuradianAnnualIncome','$txtGuradianCompanyName','$txtGuradianOfficialAddress','$txtGuradianOfficialPhNo','$txtGuradianMobileNo','$cboTransport','$cboSafeTransport','$txtRealBroSisName','$txtRealBroSisClass','$txtRealBroSisSchoolName','$txtFatherAlumniName','$txtDPSSchoolName','$txtYearOfPassing','$txtLastPassoutClassFather','$txtMotherAlumniName','$txtMotherDPSSchoolName','$txtMotherYearOfPassing','$txtLastPassoutClassMother','$txtEmergencyNo','$txtMobile','$txtemail','$orderAmount','$merchantTxnId','$ChildPhoto','$BirthCertiFileName','$ScoreCardFileName','$Stream','$OptionalSubject','$EnglishMarks','$EnglishGradePoint','$EnglishMarksPercent','$MathsMarks','$MathsGradePoints','$MathsMarksPercent','$GeneralScience','$ScienceGradePoint','$ScienceMarksPercent','$SocialScience','$SocialScienceGradePoints','$SocialScienceMarksPercent','$LanguageMarks','$LanguageGradePoint','$LanguageMarksPercent','$HostelFacility','$StudentAadharCardNo','$FahterAadharCardNo','$MotherAadharCardNo','$ITR','$MotherITR')";
		      mysql_query($ssql) or die(mysql_error());
		      echo "<b>Student Choices Submitted Succeccfully</b><br>";
		}
		else
		{
			if($Stream=="Medical" || $Stream=="Non-Medical")
			{
				echo "<b>You are not eligible to chosse this stream  Please Select some other Stream of Lower Grade  Fill your Choices again</b><br>";
			}
		}
		if($TotalGradePointESMSST>=24)
		{
			if($Stream=="Commerce")
			{
				$ssql="insert into `StudentMasterInfo` (`sadmission`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`ResidentialAddress`,`Location`,`Distance`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`smobile`,`email`,`TxnAmount`,`TxnId`,`ProfilePhoto`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`HostelFacility`,`StudentAadharCardNo`,`FatherAadharCardNo`,`MotherAadharCardNo`,`ITR`,`MotherITR`) VALUES ";
	             $ssql=$ssql."('$sadmission','$currentdate','$txtName','$LastName','$txtDOB','$txtPlaceOfBirth','$txtAge','$AgeYear','$AgeMonth','$AgeDay','$txtSex','$hSibling','$hFatherAlumni','$hMotherAlumni','$hSingleParent','$hSpecialNeed','$hDPSStaff','$hEWSCategory','$hOtherCategory','$txtMotherTounge','$txtNationality','$cboClass','$txtLastSchool','$txtAddress','$cboLocation','$cboDistance','$txtFatherName','$txtFatherAge','$txtFatherEducation','$cboDuration','$txtFatherOccupation','$txtFatherDesignation','$txtFatherAnnualIncome','$txtFatherCompanyName','$txtFatherOfficialAddress','$txtFatherOfficialPhNo','$txtFatherMobileNo','$txtFatherEmailId','$txtMotherName','$txtMotherAge','$txtMotherEducation','$cboMotherQualificationDuration','$txtMotherOccupation','$txtMotherDesignation','$txtMotherAnnualIncome','$txtMotherCompanyName','$txtMotherOfficialAddress','$txtMotherOfficialPhNo','$txtMotherMobileNo','$txtMotherEmailId','$txtGuradianName','$txtGuradianAge','$txtGuradinaEducation','$txtGuradianOccupation','$txtGuradianDesignation','$txtGuradianAnnualIncome','$txtGuradianCompanyName','$txtGuradianOfficialAddress','$txtGuradianOfficialPhNo','$txtGuradianMobileNo','$cboTransport','$cboSafeTransport','$txtRealBroSisName','$txtRealBroSisClass','$txtRealBroSisSchoolName','$txtFatherAlumniName','$txtDPSSchoolName','$txtYearOfPassing','$txtLastPassoutClassFather','$txtMotherAlumniName','$txtMotherDPSSchoolName','$txtMotherYearOfPassing','$txtLastPassoutClassMother','$txtEmergencyNo','$txtMobile','$txtemail','$orderAmount','$merchantTxnId','$ChildPhoto','$BirthCertiFileName','$ScoreCardFileName','$Stream','$OptionalSubject','$EnglishMarks','$EnglishGradePoint','$EnglishMarksPercent','$MathsMarks','$MathsGradePoints','$MathsMarksPercent','$GeneralScience','$ScienceGradePoint','$ScienceMarksPercent','$SocialScience','$SocialScienceGradePoints','$SocialScienceMarksPercent','$LanguageMarks','$LanguageGradePoint','$LanguageMarksPercent','$HostelFacility','$StudentAadharCardNo','$FahterAadharCardNo','$MotherAadharCardNo','$ITR','$MotherITR')";
	             mysql_query($ssql) or die(mysql_error());
	             echo "<b>Student Choices Submitted Succeccfully. You are requested to pay the the fees by 03 May 2016</b><br>";
			}
		}
		else
		{
			echo "<b>You are not eligible to chosse this stream Please Select some other Stream of Lower Grade Fill your Choices again</b><br>";
		}
		if($TotalGradePointESMCumulative>=24)
		{
			if($Stream=="Humanities")
			{
				$ssql="insert into `StudentMasterInfo` (`sadmission`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`ResidentialAddress`,`Location`,`Distance`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`smobile`,`email`,`TxnAmount`,`TxnId`,`ProfilePhoto`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`HostelFacility`,`StudentAadharCardNo`,`FatherAadharCardNo`,`MotherAadharCardNo`,`ITR`,`MotherITR`) VALUES ";
             	$ssql=$ssql."('$sadmission','$currentdate','$txtName','$LastName','$txtDOB','$txtPlaceOfBirth','$txtAge','$AgeYear','$AgeMonth','$AgeDay','$txtSex','$hSibling','$hFatherAlumni','$hMotherAlumni','$hSingleParent','$hSpecialNeed','$hDPSStaff','$hEWSCategory','$hOtherCategory','$txtMotherTounge','$txtNationality','$cboClass','$txtLastSchool','$txtAddress','$cboLocation','$cboDistance','$txtFatherName','$txtFatherAge','$txtFatherEducation','$cboDuration','$txtFatherOccupation','$txtFatherDesignation','$txtFatherAnnualIncome','$txtFatherCompanyName','$txtFatherOfficialAddress','$txtFatherOfficialPhNo','$txtFatherMobileNo','$txtFatherEmailId','$txtMotherName','$txtMotherAge','$txtMotherEducation','$cboMotherQualificationDuration','$txtMotherOccupation','$txtMotherDesignation','$txtMotherAnnualIncome','$txtMotherCompanyName','$txtMotherOfficialAddress','$txtMotherOfficialPhNo','$txtMotherMobileNo','$txtMotherEmailId','$txtGuradianName','$txtGuradianAge','$txtGuradinaEducation','$txtGuradianOccupation','$txtGuradianDesignation','$txtGuradianAnnualIncome','$txtGuradianCompanyName','$txtGuradianOfficialAddress','$txtGuradianOfficialPhNo','$txtGuradianMobileNo','$cboTransport','$cboSafeTransport','$txtRealBroSisName','$txtRealBroSisClass','$txtRealBroSisSchoolName','$txtFatherAlumniName','$txtDPSSchoolName','$txtYearOfPassing','$txtLastPassoutClassFather','$txtMotherAlumniName','$txtMotherDPSSchoolName','$txtMotherYearOfPassing','$txtLastPassoutClassMother','$txtEmergencyNo','$txtMobile','$txtemail','$orderAmount','$merchantTxnId','$ChildPhoto','$BirthCertiFileName','$ScoreCardFileName','$Stream','$OptionalSubject','$EnglishMarks','$EnglishGradePoint','$EnglishMarksPercent','$MathsMarks','$MathsGradePoints','$MathsMarksPercent','$GeneralScience','$ScienceGradePoint','$ScienceMarksPercent','$SocialScience','$SocialScienceGradePoints','$SocialScienceMarksPercent','$LanguageMarks','$LanguageGradePoint','$LanguageMarksPercent','$HostelFacility','$StudentAadharCardNo','$FahterAadharCardNo','$MotherAadharCardNo','$ITR','$MotherITR')";
            	mysql_query($ssql) or die(mysql_error());
            	echo "<b>Student Choices Submitted Succeccfully. You are requested to pay the the fees by 03 May 2016</b><br>";
			}
		}
		else
		{
			echo "<b>You are not eligible to choose any stream You do not meet any criteria hence not eligible for continuing you admission</b><br>";
		}
		
		
	}
	else
	{
		//Student Type Externam
		
		if($TotalGradePointESM>=24)
		{
			$ssql="insert into `StudentMasterInfo` (`sadmission`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`ResidentialAddress`,`Location`,`Distance`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`smobile`,`email`,`TxnAmount`,`TxnId`,`ProfilePhoto`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`HostelFacility`,`StudentAadharCardNo`,`FatherAadharCardNo`,`MotherAadharCardNo`,`ITR`,`MotherITR`) VALUES ";
		      $ssql=$ssql."('$sadmission','$currentdate','$txtName','$LastName','$txtDOB','$txtPlaceOfBirth','$txtAge','$AgeYear','$AgeMonth','$AgeDay','$txtSex','$hSibling','$hFatherAlumni','$hMotherAlumni','$hSingleParent','$hSpecialNeed','$hDPSStaff','$hEWSCategory','$hOtherCategory','$txtMotherTounge','$txtNationality','$cboClass','$txtLastSchool','$txtAddress','$cboLocation','$cboDistance','$txtFatherName','$txtFatherAge','$txtFatherEducation','$cboDuration','$txtFatherOccupation','$txtFatherDesignation','$txtFatherAnnualIncome','$txtFatherCompanyName','$txtFatherOfficialAddress','$txtFatherOfficialPhNo','$txtFatherMobileNo','$txtFatherEmailId','$txtMotherName','$txtMotherAge','$txtMotherEducation','$cboMotherQualificationDuration','$txtMotherOccupation','$txtMotherDesignation','$txtMotherAnnualIncome','$txtMotherCompanyName','$txtMotherOfficialAddress','$txtMotherOfficialPhNo','$txtMotherMobileNo','$txtMotherEmailId','$txtGuradianName','$txtGuradianAge','$txtGuradinaEducation','$txtGuradianOccupation','$txtGuradianDesignation','$txtGuradianAnnualIncome','$txtGuradianCompanyName','$txtGuradianOfficialAddress','$txtGuradianOfficialPhNo','$txtGuradianMobileNo','$cboTransport','$cboSafeTransport','$txtRealBroSisName','$txtRealBroSisClass','$txtRealBroSisSchoolName','$txtFatherAlumniName','$txtDPSSchoolName','$txtYearOfPassing','$txtLastPassoutClassFather','$txtMotherAlumniName','$txtMotherDPSSchoolName','$txtMotherYearOfPassing','$txtLastPassoutClassMother','$txtEmergencyNo','$txtMobile','$txtemail','$orderAmount','$merchantTxnId','$ChildPhoto','$BirthCertiFileName','$ScoreCardFileName','$Stream','$OptionalSubject','$EnglishMarks','$EnglishGradePoint','$EnglishMarksPercent','$MathsMarks','$MathsGradePoints','$MathsMarksPercent','$GeneralScience','$ScienceGradePoint','$ScienceMarksPercent','$SocialScience','$SocialScienceGradePoints','$SocialScienceMarksPercent','$LanguageMarks','$LanguageGradePoint','$LanguageMarksPercent','$HostelFacility','$StudentAadharCardNo','$FahterAadharCardNo','$MotherAadharCardNo','$ITR','$MotherITR')";
		      mysql_query($ssql) or die(mysql_error());
		      echo "<b>Student Choices Submitted Succeccfully . You are requested to pay the the fees by 03 May 2016</b><br>";
		}
		else
		{
			if($Stream=="Medical" || $Stream=="Non-Medical")
			{
				echo "<b>You are not eligible to chosse this stream  Please Select some other Stream of Lower Grade Fill your Choices again</b><br>";
			}
		}
		if($TotalGradePointESMSST>=30)
		{
			if($Stream=="Commerce")
			{
				$ssql="insert into `StudentMasterInfo` (`sadmission`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`ResidentialAddress`,`Location`,`Distance`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`smobile`,`email`,`TxnAmount`,`TxnId`,`ProfilePhoto`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`HostelFacility`,`StudentAadharCardNo`,`FatherAadharCardNo`,`MotherAadharCardNo`,`ITR`,`MotherITR`) VALUES ";
	             $ssql=$ssql."('$sadmission','$currentdate','$txtName','$LastName','$txtDOB','$txtPlaceOfBirth','$txtAge','$AgeYear','$AgeMonth','$AgeDay','$txtSex','$hSibling','$hFatherAlumni','$hMotherAlumni','$hSingleParent','$hSpecialNeed','$hDPSStaff','$hEWSCategory','$hOtherCategory','$txtMotherTounge','$txtNationality','$cboClass','$txtLastSchool','$txtAddress','$cboLocation','$cboDistance','$txtFatherName','$txtFatherAge','$txtFatherEducation','$cboDuration','$txtFatherOccupation','$txtFatherDesignation','$txtFatherAnnualIncome','$txtFatherCompanyName','$txtFatherOfficialAddress','$txtFatherOfficialPhNo','$txtFatherMobileNo','$txtFatherEmailId','$txtMotherName','$txtMotherAge','$txtMotherEducation','$cboMotherQualificationDuration','$txtMotherOccupation','$txtMotherDesignation','$txtMotherAnnualIncome','$txtMotherCompanyName','$txtMotherOfficialAddress','$txtMotherOfficialPhNo','$txtMotherMobileNo','$txtMotherEmailId','$txtGuradianName','$txtGuradianAge','$txtGuradinaEducation','$txtGuradianOccupation','$txtGuradianDesignation','$txtGuradianAnnualIncome','$txtGuradianCompanyName','$txtGuradianOfficialAddress','$txtGuradianOfficialPhNo','$txtGuradianMobileNo','$cboTransport','$cboSafeTransport','$txtRealBroSisName','$txtRealBroSisClass','$txtRealBroSisSchoolName','$txtFatherAlumniName','$txtDPSSchoolName','$txtYearOfPassing','$txtLastPassoutClassFather','$txtMotherAlumniName','$txtMotherDPSSchoolName','$txtMotherYearOfPassing','$txtLastPassoutClassMother','$txtEmergencyNo','$txtMobile','$txtemail','$orderAmount','$merchantTxnId','$ChildPhoto','$BirthCertiFileName','$ScoreCardFileName','$Stream','$OptionalSubject','$EnglishMarks','$EnglishGradePoint','$EnglishMarksPercent','$MathsMarks','$MathsGradePoints','$MathsMarksPercent','$GeneralScience','$ScienceGradePoint','$ScienceMarksPercent','$SocialScience','$SocialScienceGradePoints','$SocialScienceMarksPercent','$LanguageMarks','$LanguageGradePoint','$LanguageMarksPercent','$HostelFacility','$StudentAadharCardNo','$FahterAadharCardNo','$MotherAadharCardNo','$ITR','$MotherITR')";
	             mysql_query($ssql) or die(mysql_error());
	             echo "<b>Student Choices Submitted Succeccfully . You are requested to pay the the fees by 03 May 2016</b><br>";
			}
		}
		else
		{
			echo "<b>You are not eligible to chosse this stream Please Select some other Stream of Lower Grade  Fill your Choices again</b><br>";
		}
		if($TotalGradePointESMCumulative>=30)
		{
			if($Stream=="Humanities")
			{
				$ssql="insert into `StudentMasterInfo` (`sadmission`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`ResidentialAddress`,`Location`,`Distance`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`smobile`,`email`,`TxnAmount`,`TxnId`,`ProfilePhoto`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`HostelFacility`,`StudentAadharCardNo`,`FatherAadharCardNo`,`MotherAadharCardNo`,`ITR`,`MotherITR`) VALUES ";
             	$ssql=$ssql."('$sadmission','$currentdate','$txtName','$LastName','$txtDOB','$txtPlaceOfBirth','$txtAge','$AgeYear','$AgeMonth','$AgeDay','$txtSex','$hSibling','$hFatherAlumni','$hMotherAlumni','$hSingleParent','$hSpecialNeed','$hDPSStaff','$hEWSCategory','$hOtherCategory','$txtMotherTounge','$txtNationality','$cboClass','$txtLastSchool','$txtAddress','$cboLocation','$cboDistance','$txtFatherName','$txtFatherAge','$txtFatherEducation','$cboDuration','$txtFatherOccupation','$txtFatherDesignation','$txtFatherAnnualIncome','$txtFatherCompanyName','$txtFatherOfficialAddress','$txtFatherOfficialPhNo','$txtFatherMobileNo','$txtFatherEmailId','$txtMotherName','$txtMotherAge','$txtMotherEducation','$cboMotherQualificationDuration','$txtMotherOccupation','$txtMotherDesignation','$txtMotherAnnualIncome','$txtMotherCompanyName','$txtMotherOfficialAddress','$txtMotherOfficialPhNo','$txtMotherMobileNo','$txtMotherEmailId','$txtGuradianName','$txtGuradianAge','$txtGuradinaEducation','$txtGuradianOccupation','$txtGuradianDesignation','$txtGuradianAnnualIncome','$txtGuradianCompanyName','$txtGuradianOfficialAddress','$txtGuradianOfficialPhNo','$txtGuradianMobileNo','$cboTransport','$cboSafeTransport','$txtRealBroSisName','$txtRealBroSisClass','$txtRealBroSisSchoolName','$txtFatherAlumniName','$txtDPSSchoolName','$txtYearOfPassing','$txtLastPassoutClassFather','$txtMotherAlumniName','$txtMotherDPSSchoolName','$txtMotherYearOfPassing','$txtLastPassoutClassMother','$txtEmergencyNo','$txtMobile','$txtemail','$orderAmount','$merchantTxnId','$ChildPhoto','$BirthCertiFileName','$ScoreCardFileName','$Stream','$OptionalSubject','$EnglishMarks','$EnglishGradePoint','$EnglishMarksPercent','$MathsMarks','$MathsGradePoints','$MathsMarksPercent','$GeneralScience','$ScienceGradePoint','$ScienceMarksPercent','$SocialScience','$SocialScienceGradePoints','$SocialScienceMarksPercent','$LanguageMarks','$LanguageGradePoint','$LanguageMarksPercent','$HostelFacility','$StudentAadharCardNo','$FahterAadharCardNo','$MotherAadharCardNo','$ITR','$MotherITR')";
            	mysql_query($ssql) or die(mysql_error());
            	echo "<b>Student Choices Submitted Succeccfully . You are requested to pay the the fees by 03 May 2016</b><br>";
			}
		}
		else
		{
			echo "<b>You are not eligible to choose any stream You do not meet any criteria hence not eligible for continuing you admission</b><br>";
		}
		
	}
}
else
{
	exit();
}

?>
<script language="javascript">
	function fnlsubmitform()
	{
		if(document.getElementById("SubmitStatus").value=="successfull")
		{
			document.getElementById("frmPayment").submit();
		}
	}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo $SchoolName ?> </title>

<style type="text/css">
.style1 {
	text-align: center;
	font-family: Cambria;
}
</style>

</head>

<!--<body onload="Javascript:fnlsubmitform();">-->
<body>
			<form name="frmPayment" id="frmPayment" align="center" method="post" action="<?php echo $formPostUrl; ?>">
			 
				
			 <input type="hidden" name="SubmitStatus" id="SubmitStatus" value="<?php echo $SubmitStatus;?>">
	         <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
			 <input type="hidden" id="firstName" name="firstName" value="<?php echo $txtName;?>" />
			 <input type="hidden" id="lastName" name="lastName" value="<?php echo $LastName;?>" />
			 <input type="hidden" id="Name" name="Name" value="<?php echo $txtName;?>" />
             <input type="hidden" name="returnUrl" value="http://dpsfsis.com/RegistrationFeeResponse.php" />
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
			 <input type="hidden" name="customParams[0].name" value="AdminNo" /> 
			 <input type="hidden" name="customParams[0].value" value="NA" />			 		
			 	             
	        </form>   
	      
			
</body>

</html>
