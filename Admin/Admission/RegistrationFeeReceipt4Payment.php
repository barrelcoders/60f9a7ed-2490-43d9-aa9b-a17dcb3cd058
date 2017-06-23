<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
?>
<?php

if(isset($_POST['BtnSubmit']))
{
	$RegistrationNo =$_POST['registrationno'];
	$sname=$_POST['txtName'];
	$middlename=$_POST['txtMiddleName'];
	$slastname=$_POST['txtLastName'];
	$PlaceOfBirth=$_POST['txtPlaceOfBirth'];
	$DOB=$_POST['txtDOB'];
	$Age=$_POST['txtAge'];
	$Sex=$_POST['txtSex'];
	$MotherTongue=$_POST['txtMotherTounge'];
	$Nationality=$_POST['txtNationality'];
	$sclass=$_POST['cboClass'];
	$LastSchool=$_POST['txtLastSchool'];
	$SecondLanguage=$_POST['cbosecondlanguage'];
	$PermanentAddress=$_POST['txtpermanentAddress'];
	$PermanentPhoneNo=$_POST['permanentno'];
	$ResidentialAddress=$_POST['txtAddress'];
	$ResidencePhoneNo=$_POST['residentialno'];
	
	$sfathername=$_POST['txtFatherName'];
	$sfatherage=$_POST['txtFatherAge'];
	$FatherEducation=$_POST['txtFatherEducation'];
	$FatherDesignation=$_POST['txtFatherDesignation'];
	$FatherOccupation=$_POST['txtFatherOccupation'];
	$FatherCompanyName=$_POST['txtFatherCompanyName'];
	$FatherMobileNo=$_POST['txtFatherMobileNo'];
	$FatherEmailId=$_POST['txtFatherEmailId'];
	$FatherOfficeAddress=$_POST['txtFatherOfficialAddress'];
	
	$MotherName=$_POST['txtMotherName'];
	$MotherAge=$_POST['txtMotherAge'];
	$MotherEducation=$_POST['txtMotherEducation'];
	$MotherDesignation=$_POST['txtMotherDesignation'];
	$MotherOccupatoin=$_POST['txtMotherOccupation'];
	$MotherCompanyName=$_POST['txtMotherCompanyName'];
	$MotherMobile=$_POST['txtMotherMobileNo'];
	$MotherEmail=$_POST['txtMotherEmailId'];
	$MotherOfficeAddress=$_POST['txtMotherOfficialAddress'];
	
	$GuradianName=$_POST['txtGuradianName'];
	$GuradianAge=$_POST['txtGuradianAge'];
	$GuradinaEducation=$_POST['txtGuradinaEducation'];
	$GuradianOccupation=$_POST['txtGuradianOccupation'];
	$GuradianDesignation=$_POST['txtGuradianDesignation'];
	$GuradianCompanyName=$_POST['txtGuradianCompanyName'];
	$GuradianOfficialPhNo=$_POST['txtGuradianOfficialPhNo'];
	$GuradianMobileNo=$_POST['txtGuradianMobileNo'];
	$GuardiansAddress=$_POST['txtGuradianAddress'];
	$GuradianOfficialAddress=$_POST['txtGuradianOfficialAddress'];
	$GuardianEmailId=$_POST['txtguardianEmailId'];
	
	$Sibling=$_POST['chkSibling'];
	$Father_DPS_Alumni=$_POST['chkFatherAlumni'];
	$Mother_DPS_Alumni=$_POST['chkMotherAlumni'];
	$DPSRohiniStaff=$_POST['chkDPSStaff'];
	$OtherDPSStaff=$_POST['otherdpsstaff'];
	$SC_Catagory=$_POST['SCcatagory'];
	$ST_Catagory=$_POST['STcatagory'];
	$OBC_Catagory=$_POST['OBCcatagory'];
	$AnyOther_Catagory=$_POST['chkOtherCategory'];
	$OtherCatagoryDetail=$_POST['txtothercatagory'];
	
	$RealBroSisName=$_POST['txtRealBroSisName'];
	$RealBroSisClass=$_POST['txtRealBroSisClass'];
	$RealBroSisAdmissionNo=$_POST['txtRealBroSisSchoolName'];
	
	$RealBroSisName2=$_POST['txtRealBroSisName2'];
	$RealBroSisClass2=$_POST['txtRealBroSisClass2'];
	$RealBroSisAdmissionNo2=$_POST['txtRealBroSisSchoolName2'];
	
	$RealBroSisName3=$_POST['txtRealBroSisName3'];
	$RealBroSisClass3=$_POST['txtRealBroSisClass3'];
	$RealBroSisAdmissionNo3=$_POST['txtRealBroSisSchoolName3'];
	
	$AlumniFatherName=$_POST['txtFatherAlumniName'];
	$AlumniSchoolName=$_POST['txtDPSSchoolName'];
	$AlumniPassingYear=$_POST['txtYearOfPassing'];
	$AlumniFatherPassingClass=$_POST['txtLastPassoutClassFather'];
	
	$AlumniMotherName=$_POST['txtMotherAlumniName'];
	$AlumniMotherSchoolName=$_POST['txtMotherDPSSchoolName'];
	$AlumniMotherPassingYear=$_POST['txtMotherYearOfPassing'];
	$AlumniMotherPassingClass=$_POST['txtLastPassoutClassMother'];
	
	$EmergencyContactPersonName=$_POST['txtcontactpersonname'];
	$EmergencyContactNo=$_POST['txtemergencyMobile'];
	$EmergencyEmail=$_POST['txtemergencyemail'];
	
	$BirthCertificate=  $_FILES["F1"]["name"];
	$ProfilePhoto=$_FILES["F2"]["name"];
	$FatherPhoto=$_FILES["F3"]["name"];
	$MotherPhoto=$_FILES["F4"]["name"];
	$CatagoryCertificate=$_FILES["F5"]["name"];
	$ParentDPSStaff=$_FILES["F6"]["name"];
	$ParentDPSAlumni=$_FILES["F7"]["name"];
	$OtherCatagoryCertificate=$_FILES["F8"]["name"];
	$ScoreCard=$_FILES["F9"]["name"];
	$CurricularActivity=$_FILES["F10"]["name"];
        
        $RegistrationDate=$_POST['txtdateofregistration'];
	$RegistrationPlace=$_POST['txtplaceofregistration'];
        if($RegistrationNo<10){
            $RegistrationNo="00".$RegistrationNo;
        }elseif($RegistrationNo>9 && $RegistrationNo<100){
            $RegistrationNo="0".$RegistrationNo;
        }else{
            $RegistrationNo=$RegistrationNo;
        }
        
         $finalRegistrationNO="DPSR/17-18/".$RegistrationNo;
	 $uniqueNo=  rand(10,10000);
        
mysql_query("INSERT INTO `NewStudentRegistration_temp`( `RegistrationNo`,`sname`,`middlename`,`slastname`,`PlaceOfBirth`,`DOB`,`Age`,`Sex`,`MotherTongue`,`Nationality`,`sclass`,`LastSchool`,`SecondLanguage`,`PermanentAddress`,`PermanentPhoneNo`,`ResidentialAddress`,`ResidencePhoneNo`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherDesignation`,`FatherOccupation`,`FatherCompanyName`,`FatherMobileNo`,`FatherEmailId`,`FatherOfficeAddress`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherDesignation`,`MotherOccupatoin`,`MotherCompanyName`,`MotherMobile`,`MotherEmail`,`MotherOfficeAddress`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianCompanyName`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`GuardiansAddress`,`GuradianOfficialAddress`,`GuardianEmailId`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`DPSRohiniStaff`,`OtherDPSStaff`,`SC_Catagory`,`ST_Catagory`,`OBC_Catagory`,`AnyOther_Catagory`,`OtherCatagoryDetail`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`RealBroSisName2`,`RealBroSisClass2`,`RealBroSisAdmissionNo2`,`RealBroSisName3`,`RealBroSisClass3`,`RealBroSisAdmissionNo3`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactPersonName`,`EmergencyContactNo`,`EmergencyEmail`,`BirthCertificate`,`ProfilePhoto`,`FatherPhoto`,`MotherPhoto`,`CatagoryCertificate`,`ParentDPSStaff`,`ParentDPSAlumni`,`OtherCatagoryCertificate`,`ScoreCard`,`CurricularActivity`,`RegistrationDate`,`RegistrationPlace`,`uniqueNo`) VALUES ('','$sname','$middlename','$slastname','$PlaceOfBirth','$DOB','$Age','$Sex','$MotherTongue','$Nationality','$sclass','$LastSchool','$SecondLanguage','$PermanentAddress','$PermanentPhoneNo','$ResidentialAddress','$ResidencePhoneNo','$sfathername','$sfatherage','$FatherEducation','$FatherDesignation','$FatherOccupation','$FatherCompanyName','$FatherMobileNo','$FatherEmailId','$FatherOfficeAddress','$MotherName','$MotherAge','$MotherEducation','$MotherDesignation','$MotherOccupatoin','$MotherCompanyName','$MotherMobile','$MotherEmail','$MotherOfficeAddress','$GuradianName','$GuradianAge','$GuradinaEducation','$GuradianOccupation','$GuradianDesignation','$GuradianCompanyName','$GuradianOfficialPhNo','$GuradianMobileNo','$GuardiansAddress','$GuradianOfficialAddress','$GuardianEmailId','$Sibling','$Father_DPS_Alumni','$Mother_DPS_Alumni','$DPSRohiniStaff','$OtherDPSStaff','$SC_Catagory','$ST_Catagory','$OBC_Catagory','$AnyOther_Catagory','$OtherCatagoryDetail','$RealBroSisName','$RealBroSisClass','$RealBroSisAdmissionNo','$RealBroSisName2','$RealBroSisClass2','$RealBroSisAdmissionNo2','$RealBroSisName3','$RealBroSisClass3','$RealBroSisAdmissionNo3','$AlumniFatherName','$AlumniSchoolName','$AlumniPassingYear','$AlumniFatherPassingClass','$AlumniMotherName','$AlumniMotherSchoolName','$AlumniMotherPassingYear','$AlumniMotherPassingClass','$EmergencyContactPersonName','$EmergencyContactNo','$EmergencyEmail','$BirthCertificate','$ProfilePhoto','$FatherPhoto','$MotherPhoto','$CatagoryCertificate','$ParentDPSStaff','$ParentDPSAlumni','$OtherCatagoryCertificate','$ScoreCard','$CurricularActivity','$RegistrationDate','$RegistrationPlace','$uniqueNo')");

$lastInsertedIdSQLReg=mysql_query("SELECT srno FROM NewStudentRegistration_temp ORDER BY srno DESC  LIMIT 1");
    $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
    $lastInsertSrnoReg=$lastInsertIdReg['srno'];
    if($lastInsertSrnoReg<10){
            $RegistrationNoReg1="00".$lastInsertSrnoReg;
        }elseif($lastInsertSrnoReg>9 && $lastInsertSrnoReg<100){
            $RegistrationNoReg1="0".$lastInsertSrnoReg;
        }else{
            $RegistrationNoReg1=$lastInsertSrnoReg;
        }
        $finalRegistrationNO="DPSR/17-18/".$RegistrationNoReg1;
        
    $updateCreteriaTable=mysql_query("UPDATE  NewStudentRegistration_temp SET  RegistrationNo = '".$finalRegistrationNO."'  WHERE  srno='".$lastInsertIdReg['srno']."'");
    
        $target_dir = "Documents/";
        $target_file1 = $target_dir.basename($_FILES["F1"]["name"]);
        move_uploaded_file($_FILES["F1"]["tmp_name"], $target_file1);
        
         $target_fileF2 = $target_dir.basename($_FILES["F2"]["name"]);
        move_uploaded_file($_FILES["F2"]["tmp_name"], $target_fileF2);
        
         $target_fileF3 = $target_dir.basename($_FILES["F3"]["name"]);
        move_uploaded_file($_FILES["F3"]["tmp_name"], $target_fileF3);
        
         $target_fileF4 = $target_dir.basename($_FILES["F4"]["name"]);
        move_uploaded_file($_FILES["F4"]["tmp_name"], $target_fileF4);
        
         $target_fileF5 = $target_dir.basename($_FILES["F5"]["name"]);
        move_uploaded_file($_FILES["F5"]["tmp_name"], $target_fileF5);
        
         $target_fileF6 = $target_dir.basename($_FILES["F6"]["name"]);
        move_uploaded_file($_FILES["F6"]["tmp_name"], $target_fileF6);
        
         $target_fileF7 = $target_dir.basename($_FILES["F7"]["name"]);
        move_uploaded_file($_FILES["F7"]["tmp_name"], $target_fileF7);
        
         $target_fileF8 = $target_dir.basename($_FILES["F8"]["name"]);
        move_uploaded_file($_FILES["F8"]["tmp_name"], $target_fileF8);
        
        $target_fileF9 = $target_dir.basename($_FILES["F9"]["name"]);
        move_uploaded_file($_FILES["F9"]["tmp_name"], $target_fileF9);
        
         $target_fileF10 = $target_dir.basename($_FILES["F10"]["name"]);
        move_uploaded_file($_FILES["F10"]["tmp_name"], $target_fileF10);
        
	
	
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

<body onload="Javascript:fnlsubmitform();">
			<form name="frmPayment" id="frmPayment" align="center" method="post" action="<?php echo $formPostUrl; ?>">
			 <div class="style1">
				<font size="3"><strong>
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
			 	             
	             <!--<input type="Submit" value="Pay Now"/>-->
	             Please wait Payment is in progress</strong></font></div>
			</form>
</body>

</html>
