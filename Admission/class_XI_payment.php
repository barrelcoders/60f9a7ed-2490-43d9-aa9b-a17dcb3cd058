<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
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
	$FatherOfficePhoneNo=$_POST['cboofficeno'];
	
	$MotherName=$_POST['txtMotherName'];
	$MotherAge=$_POST['txtMotherAge'];
	$MotherEducation=$_POST['txtMotherEducation'];
	$MotherDesignation=$_POST['txtMotherDesignation'];
	$MotherOccupatoin=$_POST['txtMotherOccupation'];
	$MotherCompanyName=$_POST['txtMotherCompanyName'];
	$MotherMobile=$_POST['txtMotherMobileNo'];
	$MotherEmail=$_POST['txtMotherEmailId'];
	$MotherOfficeAddress=$_POST['txtMotherOfficialAddress'];
	$MotherOfficePhone=$_POST['cbomotherofficeno'];
	
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
	$Single_Parent=$_POST['chkSingleParent'];
	
	$RealBroSisName=$_POST['txtRealBroSisName'];
	$RealBroSisClass=$_POST['txtRealBroSisClass'];
	$RealBroSisAdmissionNo=$_POST['txtRealBroSisSchoolName'];
	
	$RealBroSisName2=$_POST['txtRealBroSisName2'];
	$RealBroSisClass2=$_POST['txtRealBroSisClass2'];
	$RealBroSisAdmissionNo2=$_POST['txtRealBroSisSchoolName2'];
	
	$Single_Parent_Reason=$_POST['cbosingleparent'];
	$Other_single_parent=$_POST['txtsingleparent'];
	
	$AlumniFatherName=$_POST['txtFatherAlumniName'];
	$AlumniSchoolName=$_POST['txtDPSSchoolName'];
	$AlumniPassingYear=$_POST['txtYearOfPassing'];
	$AlumniFatherPassingClass=$_POST['txtLastPassoutClassFather'];
	
	$AlumniMotherName=$_POST['txtMotherAlumniName'];
	$AlumniMotherSchoolName=$_POST['txtMotherDPSSchoolName'];
	$AlumniMotherPassingYear=$_POST['txtMotherYearOfPassing'];
	$AlumniMotherPassingClass=$_POST['txtLastPassoutClassMother'];
	
	$Category=$_POST['cbocatagory'];
	$OtherCatagoryDetail=$_POST['txtothercatagory'];
	
	$EmergencyContactPersonName=$_POST['txtcontactpersonname'];
	$EmergencyContactNo=$_POST['txtemergencyMobile'];
	$EmergencyEmail=$_POST['txtemergencyemail'];
	
	$ProfilePhoto=  $_FILES["F1"]["name"];
	$FatherPhoto=$_FILES["F2"]["name"];
	$MotherPhoto=$_FILES["F3"]["name"];
	$GuardianPhoto=$_FILES["F4"]["name"];
	$AadharNumber=$_FILES["F5"]["name"];
	$CatagoryCertificate=$_FILES["F6"]["name"];
	$OtherCatagoryCertificate=$_FILES["F7"]["name"];
	$RegistrationCard_9=$_FILES["F8"]["name"];
	$ReportCard_8=$_FILES["F9"]["name"];
	$ReportCard_9=$_FILES["F10"]["name"];
	$ReportCard_10=$_FILES["F11"]["name"];
	$MedicalCertificate=$_FILES["F12"]["name"];
	$ResidenceProof=$_FILES["F13"]["name"];
	$ResidenceProofType=$_POST['ResidenceProofType'];
	
         //-------------------ACCUPATION FIELDS FATHER--------------------------------------
        
        $fatherbusiness=$_POST['fatherbusiness'];
	$fatherpolitical=$_POST['fatherpolitical'];
	$fatherministry=$_POST['fatherministry'];
        $fatherprofssional=$_POST['fatherprofssional'];
	$fatherservices=$_POST['fatherservices'];
	$fatherothers=$_POST['fatherothers'];
        
        //-------------------ACCUPATION FIELDS MOTHER--------------------------------------
          
        $motherbusiness=$_POST['motherbusiness'];
	$motherpolitical=$_POST['motherpolitical'];
	$motherministry=$_POST['motherministry'];
        $motherprofssional=$_POST['motherprofssional'];
	$motherservices=$_POST['motherservices'];
	$motherothers=$_POST['motherothers'];
        
         //-------------------ACCUPATION FIELDS GURDIAN--------------------------------------
        
        $guardianbusiness=$_POST['guardianbusiness'];
	$guardianpolitical=$_POST['guardianpolitical'];
	$guardianministry=$_POST['guardianministry'];
        $guardianprofssional=$_POST['guardianprofssional'];
	$guardianservices=$_POST['guardianservices'];
	$guardianothers=$_POST['guardianothers'];
        
        $bloodgroup=$_POST['bloodgroup'];
       
        $RegistrationDate=$_POST['txtdateofregistration'];
	$RegistrationPlace=$_POST['txtplaceofregistration'];
        $FatherProfessionalEducation=$_POST['FatherProfessionalEducation'];
        $MotherProfessionalEducation=$_POST['MotherProfessionalEducation'];
        $GuardianProfessionalEducation=$_POST['GuardianProfessionalEducation'];
        $finalCreteriaNO=$_SESSION['finalCreteriaNO'];
        
        
        
         
     $CreteriaNo=""; //----------use to mapping creteria form to registration no--------------------
    //---------------GENERATE APPLICATION NO SERIES--------------------------------------------
    
    $lastInsertedIdSQLReg=mysql_query("SELECT application_no FROM application_no_series ORDER BY id DESC  LIMIT 1");
    $rows_count=  mysql_num_rows($lastInsertedIdSQLReg);
    if($rows_count>0){
  $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
       $finalRegistrationNO=$lastInsertIdReg['application_no']+1;

    }else{
        
      $finalRegistrationNO="8212";
    }
     
    //------------------GENERATE APPLICATION FORM NO SERIES--------SERIES STARTING FROM 8212------------------
$insertApplicationSeries=mysql_query("INSERT INTO application_no_series(application_no,creteria_no,class,status)VALUES('$finalRegistrationNO','$finalCreteriaNO','$sclass',1)");
  //echo "INSERT INTO application_no_series(application_no,creteria_no,class,status)VALUES('$finalRegistrationNO','$lastInsertCreteriaNo','$sclass',1)";die;
    
 $_SESSION['class']=$sclass;
     

        
$resultData=mysql_query("INSERT INTO `Registration_XI`(`RegistrationNo`,finalCreteriaNO, `sname`, `middlename`, `slastname`, `PlaceOfBirth`, `DOB`, `Age`, `Sex`, `MotherTongue`, `bloodgroup`, `Nationality`, `sclass`, `LastSchool`, `PermanentAddress`, `PermanentPhoneNo`, `ResidentialAddress`, `ResidencePhoneNo`, `sfathername`, `sfatherage`"
        . ", `FatherAcademicEducation`,FatherProfessionalEducation, `FatherDesignation`, `FatherOccupation`, `FatherCompanyName`, `FatherMobileNo`, `FatherEmailId`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `MotherName`, `MotherAge`, `MotherAcademicEducation`,MotherProfessionalEducation, `MotherDesignation`, `MotherOccupatoin`, `MotherCompanyName`, `MotherMobile`, `MotherEmail`, `MotherOfficeAddress`, `MotherOfficePhone`, `GuradianName`, `GuradianAge`, `GuradinaAcademicEducation`,GuardianProfessionalEducation, `GuradianOccupation`, `GuradianDesignation`, `GuradianCompanyName`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `GuardiansAddress`, `GuradianOfficialAddress`, `GuardianEmailId`, `Sibling`, `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `DPSRohiniStaff`, `OtherDPSStaff`, `Single_Parent`, `RealBroSisName`, `RealBroSisClass`, `RealBroSisAdmissionNo`, `RealBroSisName2`, `RealBroSisClass2`, `RealBroSisAdmissionNo2`, `Single_Parent_Reason`, `Other_single_parent`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `Category`, `OtherCatagoryDetail`, `EmergencyContactPersonName`, `EmergencyContactNo`, `EmergencyEmail`, `ProfilePhoto`, `FatherPhoto`, `MotherPhoto`, `GuardianPhoto`, `AadharNumber`, `CatagoryCertificate`, `OtherCatagoryCertificate`, `Regi_Crd_IX`, `Report_Crd_VIII`"
        . ", `Report_Crd_IX_FT`, `Report_Crd_X_T1`, `Fitness_Certi`, `ResidenceProof`, `RegistrationDate`, `RegistrationPlace`, `ResidenceProofType`, `fatherbusiness`, `fatherpolitical`, `fatherministry`, `fatherprofssional`, `fatherservices`"
        . ", `fatherothers`, `motherbusiness`, `motherpolitical`, `motherministry`, `motherprofssional`, `motherservices`"
        . ", `motherothers`, `guardianbusiness`, `guardianpolitical`, `guardianministry`, `guardianprofssional`, "
        . "`guardianservices`, `guardianothers`) "
        . "VALUES ('$finalRegistrationNO','$finalCreteriaNO','$sname', '$middlename', '$slastname', '$PlaceOfBirth', '$DOB', '$Age', '$Sex', '$MotherTongue','$bloodgroup', '$Nationality', '$sclass', '$LastSchool', '$PermanentAddress', '$PermanentPhoneNo', '$ResidentialAddress', '$ResidencePhoneNo', '$sfathername', '$sfatherage',"
        . " '$FatherEducation', '$FatherProfessionalEducation','$FatherDesignation', '$FatherOccupation', '$FatherCompanyName', '$FatherMobileNo', '$FatherEmailId', '$FatherOfficeAddress', '$FatherOfficePhoneNo', '$MotherName', '$MotherAge', '$MotherEducation','$MotherProfessionalEducation', '$MotherDesignation', '$MotherOccupatoin', '$MotherCompanyName', '$MotherMobile', '$MotherEmail', '$MotherOfficeAddress', '$MotherOfficePhone', '$GuradianName', '$GuradianAge', '$GuradinaEducation', '$GuardianProfessionalEducation','$GuradianOccupation', '$GuradianDesignation', '$GuradianCompanyName', '$GuradianOfficialPhNo', '$GuradianMobileNo', '$GuardiansAddress', '$GuradianOfficialAddress', '$GuardianEmailId', '$Sibling', '$Father_DPS_Alumni', '$Mother_DPS_Alumni', '$DPSRohiniStaff', '$OtherDPSStaff', '$Single_Parent', '$RealBroSisName', '$RealBroSisClass', '$RealBroSisAdmissionNo', '$RealBroSisName2', '$RealBroSisClass2', '$RealBroSisAdmissionNo2', '$Single_Parent_Reason', '$Other_single_parent', '$AlumniFatherName', '$AlumniSchoolName', '$AlumniPassingYear', '$AlumniFatherPassingClass', '$AlumniMotherName', '$AlumniMotherSchoolName', '$AlumniMotherPassingYear', '$AlumniMotherPassingClass', '$Category', '$OtherCatagoryDetail', '$EmergencyContactPersonName', '$EmergencyContactNo', '$EmergencyEmail', '$ProfilePhoto', '$FatherPhoto', '$MotherPhoto', '$GuardianPhoto', '$AadharNumber', '$CatagoryCertificate', '$OtherCatagoryCertificate', '$RegistrationCard_9', '$ReportCard_8', '$ReportCard_9', '$ReportCard_10', '$MedicalCertificate', '$ResidenceProof', '$RegistrationDate', '$RegistrationPlace', '$ResidenceProofType', '$fatherbusiness', '$fatherpolitical', '$fatherministry', '$fatherprofssional', '$fatherservices'"
        . ",'$fatherothers', '$motherbusiness', '$motherpolitical', '$motherministry', '$motherprofssional', '$motherservices'"
        . ",'$motherothers', '$guardianbusiness', '$guardianpolitical', '$guardianministry', '$guardianprofssional', '$guardianservices','$guardianothers')"); 






        $target_dir = "DocumentsXIth/";
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
		
		$target_fileF11 = $target_dir.basename($_FILES["F11"]["name"]);
        move_uploaded_file($_FILES["F11"]["tmp_name"], $target_fileF11);
		
		$target_fileF12 = $target_dir.basename($_FILES["F12"]["name"]);
        move_uploaded_file($_FILES["F12"]["tmp_name"], $target_fileF12);
		
		$target_fileF13 = $target_dir.basename($_FILES["F13"]["name"]);
        move_uploaded_file($_FILES["F13"]["tmp_name"], $target_fileF13);
        
         if($resultData)
		{
			include 'citrus_payment_XIth.php';
		}
		else
		{
			echo "Your form has not been submitted, please refill the form";
		}
        
        
        
}
?>
<script type="text/javascript">
    function clickIE4(){
    if (event.button==2){
    return false;
    }
    }
    function clickNS4(e){
    if (document.layers||document.getElementById&&!document.all){
    if (e.which==2||e.which==3){
    return false;
    }
    }
    }
    if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    //if IE4+
    document.onselectstart=new Function ("return false")
    //if NS6
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
</script>