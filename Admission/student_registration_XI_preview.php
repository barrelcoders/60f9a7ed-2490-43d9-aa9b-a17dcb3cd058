<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
$RegistrationNo=$_SESSION['TxId'];
$data=mysql_query("SELECT `srno`, `RegistrationNo`,`finalCreteriaNO`,  `sclass`, `sname`, `middlename`, `slastname`, `PlaceOfBirth`, `dob`, `Age`, `Sex`, `MotherTongue`, `bloodgroup`, `Nationality`, `LastSchool`, `ResidentialAddress`, `ResidencePhoneNo`, `PermanentAddress`, `PermanentPhoneNo`, `sfathername`, `sfatherage`, `FatherAcademicEducation`, `FatherProfessionalEducation`, `FatherOccupation`, `fatherbusiness`, `fatherpolitical`, `fatherministry`, `fatherprofssional`, `fatherservices`, `fatherothers`, `FatherDesignation`, `FatherCompanyName`, `FatherMobileNo`, `FatherEmailId`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `MotherName`, `MotherAge`, `MotherAcademicEducation`, `MotherProfessionalEducation`, `MotherOccupatoin`, `motherbusiness`, `motherpolitical`, `motherministry`, `motherprofssional`, `motherservices`, `motherothers`, `MotherDesignation`, `MotherCompanyName`, `MotherMobile`, `MotherEmail`, `MotherOfficeAddress`, `MotherOfficePhone`, `GuradianName`, `GuradianAge`, `GuradinaAcademicEducation`, `GuardianProfessionalEducation`, `GuradianOccupation`, `guardianbusiness`, `guardianpolitical`, `guardianministry`, `guardianprofssional`, `guardianservices`, `guardianothers`, `GuradianDesignation`, `GuradianCompanyName`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `GuardianEmailId`, `GuardiansAddress`, `GuradianOfficialAddress`, `Sibling`, `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `DPSRohiniStaff`, `OtherDPSStaff`, `Single_Parent`, `RealBroSisName`, `RealBroSisClass`, `RealBroSisAdmissionNo`, `RealBroSisName2`, `RealBroSisClass2`, `RealBroSisAdmissionNo2`, `Single_Parent_Reason`, `Other_single_parent`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `Category`, `OtherCatagoryDetail`, `EmergencyContactPersonName`, `EmergencyContactNo`, `EmergencyEmail`, `ProfilePhoto`, `FatherPhoto`, `MotherPhoto`, `GuardianPhoto`, `CatagoryCertificate`, `OtherCatagoryCertificate`, `AadharNumber`, `Regi_Crd_IX`, `Report_Crd_VIII`, `Report_Crd_IX_FT`, `Report_Crd_X_T1`, `Fitness_Certi`, `ResidenceProof`, `ResidenceProofType`, `RegistrationPlace`, `RegistrationDate`, `TxnAmount`, `TxnStatus`, `pgTxnNo`, `TxRefNo`, `TxMsg` FROM `Registration_XI` WHERE `RegistrationNo`='$RegistrationNo'");
$result=mysql_fetch_array($data);

$criteriano=$result['finalCreteriaNO'];
$criteria=mysql_query("SELECT `srno`, `FirstName`, `MiddleName`, `LastName`, `PlaceofBirth`, `DOB`, `Age`, `Gender`, `MotherTongue`, `Nationality`, `Class`, `LastSchool`, `SecondLanguage`, `PermanentAddress`, `PermanentPhone`, `ResidentialAddress`, `ResidentialPhone`, `EnglishGrade`, `HindiGrade`, `MathGrade`, `GeneralScienceGrade`, `SocialScienceGrade`, `SecondLanguageGrade`, `SelectThirdLanguage`, `SpecialAchievement1`, `AchievementLevel1`, `AchievementRenk1`, `SpecialAchievement2`, `AchievementLevel2`, `AchievementRenk2`, `SpecialAchievement3`, `AchievementLevel3`, `AchievementRenk3`, `SpecialAchievement4`, `AchievementLevel4`, `AchievementRenk4`, `SpecialAchievement5`, `AchievementLevel5`, `AchievementRenk5`, `SelectStream`, `ScienceSubject1`, `ScienceSubject2`, `ScienceSubject3`, `ScienceSubject4`, `ScienceSubject5`, `CommerceSubject1`, `CommerceSubject2`, `CommerceSubject3`, `CommerceSubject4`, `CommerceSubject5`, `HumanitiesSubject1`, `HumanitiesSubject2`, `HumanitiesSubject3`, `HumanitiesSubject4`, `HumanitiesSubject5`, `otherEnglish`, `otherScience`, `otherMaths`, `otherSsc`, `otherSecondLanguage`,`board_type` FROM `CriteriaFormXIth` WHERE `srno`='$criteriano'");
$criteriaresult=mysql_fetch_array($criteria);
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

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">
<title>Student Registration</title>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
		<style> body{font-family:Arial, Helvetica, sans-serif!important;} .Header .img-responsive{width:40%; color:#000!important;}
		 .text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .row{padding-left:0%; margin:0;} .h{background-color:rgba(11, 70, 45, 0.84); padding:4px 0px; color:#FFFFFF;} .h11{ text-transform:uppercase;} .col-xs-6{ text-align:left; margin-top:1%!important;} .hr{width:99%; border:1px solid #CCCCCC; padding:0;} .col-xs-3, .col-xs-9{margin-top:1%; } .f{font-size:12px;} .col-xs-2{width:12%; padding:0; border:1px solid #0099ff; } .col-xs-2 li{list-style:none; padding:5%;} .info{ padding:1%; margin:0; line-height:0.5;} .tba{ width:90%; } .tbs{padding:2.5%;}
		 .col-xs-3:nth-child(odd){font-weight:600;} .col-xs-1{width:2%;}
		 .table1 tr td{padding:1%;}  .row_1{ border-bottom: 2px solid #999999; } 
		 .col-xs-12 table td{ padding:1% 0.5%; border:1px solid #0099ff; border-radius:2px; } 
		 .col{ text-align:left; }  .check{padding:0 0 0 3%;} .study{margin-top:3%;}
		 .check table{width:20%; float:left;} .check table td{ padding:3% 1%!important; font-size:13px;} .check table td:nth-child(odd){width:20px;}
		 .table_detai .row{width:100%;} .table_detail .col-xs-2, .table_detail .col-xs-3{padding:1% 1%; margin:0; border:1px solid #0099ff; } .table_detail .col-xs-2{ width:17%;} .table_detail .head1{font-weight:700; padding:1%; background-color:#0099ff; margin:0; border:1px solid #0099ff;} .table_detail .col-xs-2 .text-box{ width:95%; border-radius:3px; border:1px solid #0099ff;} .table_detail .head2{ padding-bottom:1.3%; } 
		 @media only screen and (min-width:1235px) and (max-width: 1935px){.col{text-align:center; } .study{margin-top:4%;} }
		 @media only screen and (min-width:800) and (max-width: 934px){ .check table td{ font-size:11px!important;}}
		 @media only screen and (min-width:870px) and (max-width: 1235px){	 .col-xs-2{width:20%;} .tba{ width:90%; } 	 }
		 @media only screen and (min-width:1051px) and (max-width: 1235px){.table_detail .l{ font-size:12px; padding-bottom:1.7%;}}
		 @media only screen and (min-width:870px) and (max-width: 1051px){ .table_detail .l{ font-size:12px; padding-bottom:0.5%; padding-top:0.5%;} }
		 @media only screen and (min-width:928px) and (max-width: 1080px){ .table_detail .l2{ font-size:12px; padding-bottom:1.3%; } }
		 @media only screen and (min-width:870px) and (max-width: 928px){ .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.2%; } .study{margin-top:7%;} }
		 @media only screen and (min-width:720px) and (max-width: 870px){ .col-xs-2{width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.4%; padding-top:0.4%;} .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.1%; } .tba{ width:90%; } .check table{width:33%; float:left;} .study{margin-top:20%;} }		 
		 @media only screen and (min-width:580px) and (max-width: 720px){
		 .col-xs-3{ width:50%; margin-top:1%; } .col-xs-6{ text-align:left; margin-top:1%!important;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:50%;} .col-xs-2 .text-box{height:25px; } .xss{width:50%!important;} .table_detail .head1{ display:none;} .table_detail .col-xs-3 {width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.1%; padding-top:0.1%;} .table_detail .l2{ font-size:9px; padding:0; padding-bottom:0%; padding-top:0%; } .table_detail .col-xs-2 { padding:0.8% 1%; width:20%;} .table_detail .l3{padding:1%;} table_detail .head1{padding-bottom:0.5%;} .tba{ width:90%; }.info p{line-height:1.2;} .check table{width:30%; float:left;} .study{margin-top:25%;}
		 .col-xs-1{width:2%; float:left;} .col-xs-10{width:80%; float:left;}
		 } 
		 @media only screen and (min-width:530px) and (max-width: 580px){ body{font-size:12px;} .Header .img-responsive{width:40%}
		 .col-xs-3{ width:50%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:49%; } .col-xs-2 .text-box{height:25px; }  .xss{width:45%!important; font-size:12px;} .xss1{ width:45%; font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:90%; } .info p{line-height:1.2;} .check table{width:45%; float:left;} .study{margin-top:40%;}
		 .col-xs-1{width:2%; float:left;} .col-xs-10{width:80%; float:left;}
		 } 
		 @media only screen and (min-width:445px) and (max-width: 530px){ body{font-size:14px; line-height:1;} .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .text-box{width:100%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:50%; margin-top:1%;  } .col-xs-2 .text-box{height:25px; } .xss{width:80%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:50%; }.info p{line-height:1.2;} .check table{width:95%; float:left;} .col-xs-1{width:2%; float:left;} .col-xs-10{width:80%; float:left;}
		 } 
		 @media only screen and (min-width:334px) and (max-width: 445px){ body{font-size:14px; line-height:1.5;} .tba{ width:100%; } .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:100%;} .col-xs-6 .text-box{ width:78%!important;  margin-left:-3%; } .col-xs-2{ width:95%; margin-top:1%;} .xss{width:100%!important; } .xss1{ width:100%;} .col-xs-2 li{ padding:2%;} .table1{font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .info p{line-height:1.2;} .check table{width:95%; float:left;} 
		 
		 }	
		  @media only screen and (min-width:240px) and (max-width: 334px){ body{font-size:14px; line-height:1;} .tba{ width:100%; } .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:3%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:80%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:95%; margin-top:1%;} .col-xs-2 .text-box{height:25px; } .xss{width:85%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;}.info p{line-height:1.2;} .check table{width:95%; float:left;}
		 }		 
		</style>
	</head>
<body>
<div id="container">
 <div class="row ">
  <div class="Header" align="center" ><img src="<?php echo $SchoolLogo; ?>" class="img-responsive"><br />
 
    <div class="table1">
	  <b><?php echo $SchoolAddress; ?></b><br />
	 <b> <?php echo $SchoolPhoneNo; ?></b><br />
	  <b> <?php echo $SchoolEmailId; ?></b>
	</div>
  </div>
 </div>
  <div>&nbsp;</div>
  <div align="center" class="h h11"><b><font >Student Detail</font></b></div>
  <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Class Applied For*:</div>
  <div class="col-xs-3"> <input type="text" name="cboClass" id="cboClass" class="text-box" value="<?php echo $result['sclass']; ?>" readonly>  </div>
<div class="col-xs-3">Application No.:</div>
  <div class="col-xs-3"> <input type="text" name="regno" id="regno" class="text-box" value="<?php echo $result['RegistrationNo']; ?>" readonly>  </div> </div>
 <div class="row" >
  <div class="col-xs-3"> First Name of Applicant*: </div>
  <div class="col-xs-3"> <input type="text" name="txtName" id="txtName" class="text-box" value="<?php echo $result['sname']; ?>" readonly></div>
  <div class="col-xs-3"> Middle Name of Applicant:</div>
  <div class="col-xs-3"> <input type="text" name="txtMiddleName" id="txtMiddleName" class="text-box" value="<?php echo $result['middlename']; ?>" readonly></div>  
 </div>
 <div class="row">
  <div class="col-xs-3"> Last Name of Applicant:</div>
  <div class="col-xs-3"> <input type="text" name="txtLastName" id="txtLastName" class="text-box" value="<?php echo $result['slastname']; ?>" readonly></div>
  <div class="col-xs-3"> Place of Birth:</div>
  <div class="col-xs-3"> <input type="text" name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" value="<?php echo $result['PlaceOfBirth']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Date of Birth*:</div>
  <div class="col-xs-3"> <input type="text" name="txtDOB" id="txtDOB" class="text-box" value="<?php echo $result['dob']; ?>" readonly></div>
  <div class="col-xs-3"> Age as on*:</div>
  <div class="col-xs-3"> <input type="text" name="txtAge" id="txtAge" class="text-box" value="<?php echo $result['Age']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Gender*:</div>
  <div class="col-xs-3"> <input type="text" name="txtSex" id="txtSex" class="text-box" value="<?php echo $result['Sex']; ?>" readonly></div>
  <div class="col-xs-3"> Mother Tongue*: </div>
  <div class="col-xs-3"> <input type="text" name="txtMotherTounge" id="txtMotherTounge" class="text-box" value="<?php echo $result['MotherTongue']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Blood Group*:</div>
  <div class="col-xs-3"><input type="text" name="bloodgroup" id="bloodgroup" class="text-box" value="<?php echo $result['bloodgroup']; ?>" readonly></div>
  <div class="col-xs-3"> Nationality: </div>
  <div class="col-xs-3"><input type="text" name="txtNationality" id="txtNationality" class="text-box" value="<?php echo $result['Nationality']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Residential Address*: </div>
  <div class="col-xs-3"> <input type="text" name="txtAddress" id="txtAddress" class="text-box" value="<?php echo $result['ResidentialAddress']; ?>" readonly></div>
  <div class="col-xs-3">Residential Landline Number:</div>
  <div class="col-xs-3"><input type="text" name="residentialno" id="residentialno" class="text-box" value="<?php echo $result['ResidencePhoneNo']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Permanent Address: </div>
  <div class="col-xs-3"><input type="text" name="txtpermanentAddress" id="txtpermanentAddress" class="text-box" value="<?php echo $result['PermanentAddress']; ?>" readonly></div>
  <div class="col-xs-3">Permanent Landline Number:</div>
  <div class="col-xs-3"><input type="text" name="permanentno" id="permanentno" class="text-box" value="<?php echo $result['PermanentPhoneNo']; ?>" readonly></div>  
 </div>
 <div class="row">
  <div class="col-xs-3"> Last School Attended*: </div>
  <div class="col-xs-3"> <input type="text" name="txtLastSchool" id="txtLastSchool" class="text-box" value="<?php echo $result['LastSchool']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div> 
 </div>
 <div> &nbsp;</div>
 <div class="h h11" align="center"><strong> Family Details (Father / Mother / Guardian)</strong></div>
 <div>&nbsp;</div>
 <div align="center"><strong><u>Father's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input type="text" name="txtFatherName" id="txtFatherName" class="text-box" value="<?php echo $result['sfathername']; ?>" readonly></div>
  <div class="col-xs-3"> Age:</div>
  <div class="col-xs-3"> <input type="text" name="txtFatherAge" id="txtFatherAge" class="text-box" value="<?php echo $result['sfatherage']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Highest Academic Qualification*:</div>
  <div class="col-xs-3"><input type="text" name="txtFatherEducation" id="txtFatherEducation" class="text-box" value="<?php echo $result['FatherAcademicEducation']; ?>" readonly></div>  
  <div class="col-xs-3">Highest Professional Qualification*:</div>
  <div class="col-xs-3"><input type="text" name="FProfessionalQualification" id="FProfessionalQualification" class="text-box" value="<?php echo $result['FatherProfessionalEducation']; ?>" readonly></div>
 </div>
 <div class="row">  
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><input type="text" name="txtFatherOccupation" id="txtFatherOccupation" class="text-box" value="<?php echo $result['FatherOccupation']; ?>" readonly></div>
  <?php if($result['FatherOccupation']=="Business") { ?>
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input type="text" name="fatherbusiness" id="fatherbusiness" class="text-box" value="<?php echo $result['fatherbusiness']; ?>" readonly></div> 
  <?php } elseif($result['FatherOccupation']=="Political") { ?>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="fatherpolitical" id="fatherpolitical" class="text-box" value="<?php echo $result['fatherpolitical']; ?>" readonly></div>
  <?php } elseif($result['FatherOccupation']=="Ministry") { ?>
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="fatherministry" id="fatherministry" class="text-box" value="<?php echo $result['fatherministry']; ?>" readonly></div>
  <?php } elseif($result['FatherOccupation']=="Professional") { ?>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="fatherprofssional" id="fatherprofssional" class="text-box" value="<?php echo $result['fatherprofssional']; ?>" readonly></div>
  <?php } elseif($result['FatherOccupation']=="Services") { ?>
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="fatherservices" id="fatherservices" class="text-box" value="<?php echo $result['fatherservices']; ?>" readonly></div>
  <?php } elseif($result['FatherOccupation']=="Others") { ?>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="fatherothers" id="fatherothers" class="text-box" value="<?php echo $result['fatherothers']; ?>" readonly></div>
  <?php } ?>
 </div>
 <div class="row">
  <div class="col-xs-3"> Designation: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"><input type="text" name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" value="<?php echo $result['FatherDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"> <input type="text" name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" value="<?php echo $result['FatherCompanyName']; ?>" readonly></div>
</div>
 <div class="row">
  <div class="col-xs-3"> Email Id *:</div>
  <div class="col-xs-3"><input type="text" name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" value="<?php echo $result['FatherEmailId']; ?>" readonly></div>
  <div class="col-xs-3"> Mobile No *:</div>
  <div class="col-xs-3"> <input type="text" name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" value="<?php echo $result['FatherMobileNo']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Office Landline No. :</div>
  <div class="col-xs-3"><input type="text" name="cboofficeno" id="cboofficeno" class="text-box" value="<?php echo $result['FatherOfficePhoneNo']; ?>" readonly></div>
  <div class="col-xs-3">Office Address: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"> <input type="text" name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box" value="<?php echo $result['FatherOfficeAddress']; ?>" readonly></div>
 </div> 
 <div>&nbsp;</div>
 <div align="center"><strong><u>Mother's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input type="text" name="txtMotherName" id="txtMotherName" class="text-box" value="<?php echo $result['MotherName']; ?>" readonly></div>
  <div class="col-xs-3"> Age:</div>
  <div class="col-xs-3"> <input type="text" name="txtMotherAge" id="txtMotherAge" class="text-box" value="<?php echo $result['MotherAge']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Highest Academic Qualification*:</div>
  <div class="col-xs-3"><input type="text" name="txtMotherEducation" id="txtMotherEducation" class="text-box" value="<?php echo $result['MotherAcademicEducation']; ?>" readonly></div>
  <div class="col-xs-3">Highest Professional Qualification*:</div>
  <div class="col-xs-3"><input type="text" name="MProfessionalQualification" id="MProfessionalQualification" class="text-box" value="<?php echo $result['MotherProfessionalEducation']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Occupation</div>
  <div class="col-xs-3"><input type="text" name="txtMotherOccupation" id="txtMotherOccupation" class="text-box" value="<?php echo $result['MotherOccupatoin']; ?>" readonly></div>
<?php if($result['MotherOccupatoin']=="Business") { ?>
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input type="text" name="motherbusiness" id="motherbusiness" class="text-box" value="<?php echo $result['motherbusiness']; ?>" readonly></div>
<?php } elseif($result['MotherOccupatoin']=="Political") { ?>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="motherpolitical" id="motherpolitical" class="text-box" value="<?php echo $result['motherpolitical']; ?>" readonly></div>
  <?php } elseif($result['MotherOccupatoin']=="Ministry") { ?>
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="motherministry" id="motherministry" class="text-box" value="<?php echo $result['motherministry']; ?>" readonly></div>
  <?php } elseif($result['MotherOccupatoin']=="Professional") { ?>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="motherprofssional" id="motherprofssional" class="text-box" value="<?php echo $result['motherprofssional']; ?>" readonly></div>
  <?php } elseif($result['MotherOccupatoin']=="Services") { ?>
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="motherservices" id="motherservices" class="text-box" value="<?php echo $result['motherservices']; ?>" readonly></div>
  <?php } elseif($result['MotherOccupatoin']=="Others") { ?>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="motherothers" id="motherothers" class="text-box" value="<?php echo $result['motherothers']; ?>" readonly></div>
  <?php } ?>
 </div>
 <div class="row">
  <div class="col-xs-3"> Designation: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input type="text" name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" value="<?php echo $result['MotherDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input type="text" name="txtMotherCompanyName" id="txtMotherCompanyName" class="text-box" value="<?php echo $result['MotherCompanyName']; ?>" readonly></div>
 </div>
 <div class="row">	
  <div class="col-xs-3"> Email id*:</div>
  <div class="col-xs-3"> <input type="text" name="txtMotherEmailId" id="txtMotherEmailId" class="text-box" value="<?php echo $result['MotherEmail']; ?>" readonly></div>
  <div class="col-xs-3"> Mobile No.*:</div>
  <div class="col-xs-3"> <input type="text" name="txtMotherMobileNo" id="txtMotherMobileNo" class="text-box" value="<?php echo $result['MotherMobile']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Office Landline No. :</div>
  <div class="col-xs-3"><input type="text" name="cbomotherofficeno" id="cbomotherofficeno" class="text-box" value="<?php echo $result['MotherOfficePhone']; ?>" readonly></div>
  <div class="col-xs-3"> Office Address: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"><input type="text" name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box" value="<?php echo $result['MotherOfficeAddress']; ?>" readonly></div>
 </div> 
 <div>&nbsp;</div>
 <div align="center"><strong><u>Guardian's Details (If Applicable)</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name:</div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianName" id="txtGuradianName" class="text-box" value="<?php echo $result['GuradianName']; ?>" readonly></div>
  <div class="col-xs-3"> Age: </div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianAge" id="txtGuradianAge" class="text-box" value="<?php echo $result['GuradianAge']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Highest Academic Qualification:</div>
  <div class="col-xs-3"> <input type="text" name="txtGuradinaEducation" id="txtGuradinaEducation" class="text-box" value="<?php echo $result['GuradinaAcademicEducation']; ?>" readonly></div>
  <div class="col-xs-3">Highest Professional Qualification:</div>
  <div class="col-xs-3"> <input type="text" name="GProfessionalQualification" id="GProfessionalQualification" class="text-box" value="<?php echo $result['GuardianProfessionalEducation']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><input type="text" name="txtGuradianOccupation" id="txtGuradianOccupation" class="text-box" value="<?php echo $result['GuradianOccupation']; ?>" readonly></div>  
  <?php if($result['GuradianOccupation']=="Business") { ?>
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input type="text" name="guardianbusiness" id="guardianbusiness" class="text-box" value="<?php echo $result['guardianbusiness']; ?>" readonly></div>
  <?php } elseif($result['GuradianOccupation']=="Political") { ?>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="guardianpolitical" id="guardianpolitical" class="text-box" value="<?php echo $result['guardianpolitical']; ?>" readonly></div>
  <?php } elseif($result['GuradianOccupation']=="Ministry") { ?>
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="guardianministry" id="guardianministry" class="text-box" value="<?php echo $result['guardianministry']; ?>" readonly></div>
  <?php } elseif($result['GuradianOccupation']=="Professional") { ?>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="guardianprofssional" id="guardianprofssional" class="text-box" value="<?php echo $result['guardianprofssional']; ?>" readonly></div>
  <?php } elseif($result['GuradianOccupation']=="Services") { ?>
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="guardianservices" id="guardianservices" class="text-box" value="<?php echo $result['guardianservices']; ?>" readonly></div>
  <?php } elseif($result['GuradianOccupation']=="Others") { ?>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="guardianothers" id="guardianothers" class="text-box" value="<?php echo $result['guardianothers']; ?>" readonly></div>
  <?php } ?>
 </div>
 <div class="row">
  <div class="col-xs-3"> Designation:<br><font class="f"> (If employed)</font></div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianDesignation" id="txtGuradianDesignation" class="text-box" value="<?php echo $result['GuradianDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name:<br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"><input type="text" name="txtGuradianCompanyName" id="txtGuradianCompanyName" class="text-box" value="<?php echo $result['GuradianCompanyName']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Email id:</div>
  <div class="col-xs-3"> <input type="text" name="txtguardianEmailId" id="txtguardianEmailId" class="text-box" value="<?php echo $result['GuardianEmailId']; ?>" readonly></div>
  <div class="col-xs-3"> Residence Landline. No: </div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianOfficialPhNo" id="txtGuradianOfficialPhNo" class="text-box" value="<?php echo $result['GuradianOfficialPhNo']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mobile No.:</div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianMobileNo" id="txtGuradianMobileNo" class="text-box" value="<?php echo $result['GuradianMobileNo']; ?>" readonly></div>
  <div class="col-xs-3"> Address:</div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianAddress" id="txtGuradianAddress" class="text-box" value="<?php echo $result['GuardiansAddress']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Office Address:<br><font class="f">(If employed):</font></div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianOfficialAddress" id="txtGuradianOfficialAddress" class="text-box" value="<?php echo $result['GuradianOfficialAddress']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Category</strong>*
		<i>(Please select the relevant Category / Categories and fill the details as applicable. 
		If you do not fall into any category, please select others. Parents are required to produce 
		the relevant documents at the time of admission. In case the documents are not produced, the candidature will be rejected)</i>
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"><strong>Sibling(s) studying in DPS, Rohini</strong></div>
  <div class="col-xs-3"> <input type="text" name="chkSibling" id="chkSibling" class="text-box" value="<?php echo $result['Sibling']; ?>" readonly></div>
  <div class="col-xs-3"><strong>Single Parent</strong></div>
  <div class="col-xs-3"> <input type="text" name="chkSingleParent" id="chkSingleParent" class="text-box" value="<?php echo $result['Single_Parent']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><strong>Father DPS Alumni</strong></div>
  <div class="col-xs-3"> <input type="text" name="chkFatherAlumni" id="chkFatherAlumni" class="text-box" value="<?php echo $result['Father_DPS_Alumni']; ?>" readonly></div>
  <div class="col-xs-3"><strong>Mother DPS Alumni</strong></div>
  <div class="col-xs-3"> <input type="text" name="chkMotherAlumni" id="chkMotherAlumni" class="text-box" value="<?php echo $result['Mother_DPS_Alumni']; ?>" readonly></div>
 </div>
  <div class="row">
  <div class="col-xs-3"><strong>DPS Rohini Staff</strong></div>
  <div class="col-xs-3"> <input type="text" name="chkDPSStaff" id="chkDPSStaff" class="text-box" value="<?php echo $result['DPSRohiniStaff']; ?>" readonly></div>
  <div class="col-xs-3"><strong>Other DPS Staff</strong></div>
  <div class="col-xs-3"> <input type="text" name="otherdpsstaff" id="otherdpsstaff" class="text-box" value="<?php echo $result['OtherDPSStaff']; ?>" readonly></div>
 </div> 
 <div>&nbsp;</div>
 <div align="center"><strong>Details of Sibling(s) studying in <?php echo $SchoolName; ?></strong> <p>(If there is more than one sibling, mention all)</p></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input type="text" name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" value="<?php echo $result['RealBroSisName']; ?>" readonly></div>
  <div class="col-xs-3"> Brother / Sister's Class:</div>
  <div class="col-xs-3"><input type="text" name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box" value="<?php echo $result['RealBroSisClass']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"><input type="text" name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" value="<?php echo $result['RealBroSisAdmissionNo']; ?>" readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"><input type="text" name="txtRealBroSisName2" id="txtRealBroSisName2" class="text-box" value="<?php echo $result['RealBroSisName2']; ?>" readonly></div>
  <div class="col-xs-3"> Brother / Sister's Class: </div>
  <div class="col-xs-3"> <input type="text" name="txtRealBroSisClass2" id="txtRealBroSisClass2" class="text-box" value="<?php echo $result['RealBroSisClass2']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"><input type="text" name="txtRealBroSisSchoolName2" id="txtRealBroSisSchoolName2" class="text-box" value="<?php echo $result['RealBroSisAdmissionNo2']; ?>" readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3">Single Parent:</div>
  <div class="col-xs-3"><input type="text" name="cbosingleparent" id="cbosingleparent" class="text-box" value="<?php echo $result['Single_Parent_Reason']; ?>" readonly></div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtsingleparent" id="txtsingleparent" class="text-box" value="<?php echo $result['Other_single_parent']; ?>" readonly></div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center">Details of Father / Mother, if Alumni of <font style="text-transform:uppercase"><?php echo $SchoolName; ?></font></div>
 <div>&nbsp;</div>
 <div align="center"><strong><u> Father Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Father:</div>
  <div class="col-xs-3"><input type="text" name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" value="<?php echo $result['AlumniFatherName']; ?>" readonly></div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input type="text" name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" value="<?php echo $result['AlumniSchoolName']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input type="text" name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" value="<?php echo $result['AlumniPassingYear']; ?>" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> <input type="text" name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box" value="<?php echo $result['AlumniFatherPassingClass']; ?>" readonly></div>
 </div>
 <div>&nbsp; </div>
 <div align="center"><strong><u>Mother Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Mother:</div>
  <div class="col-xs-3"><input type="text" name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" value="<?php echo $result['AlumniMotherName']; ?>" readonly></div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input type="text" name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" value="<?php echo $result['AlumniMotherSchoolName']; ?>" readonly></div>
 </div>
 <div class="row">	
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input type="text" name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" value="<?php echo $result['AlumniMotherPassingYear']; ?>" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> <input type="text" name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box" value="<?php echo $result['AlumniMotherPassingClass']; ?>" readonly></div>
 </div>
 <div>&nbsp; </div>
 <div align="center"><strong><u>Category</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3">Select Category:</div>
  <div class="col-xs-3"><input type="text" name="cbocatagory" id="cbocatagory" class="text-box" value="<?php echo $result['Category']; ?>" readonly></div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtothercatagory" id="txtothercatagory" class="text-box" value="<?php echo $result['OtherCatagoryDetail']; ?>" readonly></div>
 </div>
 
 
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Contact details for all admission related information.</strong> </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of the contact person*:</div>
  <div class="col-xs-3"><input type="text" name="txtcontactpersonname" id="txtcontactpersonname" class="text-box" value="<?php echo $result['EmergencyContactPersonName']; ?>" readonly></div>
  <div class="col-xs-3"> Mobile No*:</div>
  <div class="col-xs-3"> <input type="text" name="txtemergencyMobile" id="txtemergencyMobile" class="text-box" value="<?php echo $result['EmergencyContactNo']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> E-mail Id*:</div>
  <div class="col-xs-3"> <input type="text" name="txtemergencyemail" id="txtemergencyemail" class="text-box" value="<?php echo $result['EmergencyEmail']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div> 
 </div>
 
 <div>&nbsp;</div>
 <div class="h" align="center"><strong> Documents to be Uploaded</strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"><b> 1. Photograph of Applicant* :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['ProfilePhoto']; ?>" target="_blank"><?php echo $result['ProfilePhoto']; ?></a></div>
  <div class="col-xs-3"><b> 2. Photograph of Father* :</b></div>
  <div class="col-xs-3"> <a href="DocumentsXIth/<?php echo $result['FatherPhoto']; ?>" target="_blank"><?php echo $result['FatherPhoto']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 3. Photograph of Mother* :</b></div>
  <div class="col-xs-3"> <a href="DocumentsXIth/<?php echo $result['MotherPhoto']; ?>" target="_blank"><?php echo $result['MotherPhoto']; ?></a></div>
  <div class="col-xs-3"><b> 4. Photograph of Guardian (if applicable) :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['GuardianPhoto']; ?>" target="_blank"><?php echo $result['GuardianPhoto']; ?></a></div>
 </div> 
 <div class="row">
  <div class="col-xs-3"><b> 5. Proof of Applicant's Aadhar card* :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['AadharNumber']; ?>" target="_blank"><?php echo $result['AadharNumber']; ?></a></div>
  <div class="col-xs-3"><b> 6. Copy Of ST/SC/OBC Certificate (if applicable) :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['CatagoryCertificate']; ?>" target="_blank"><?php echo $result['CatagoryCertificate']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 7. Proof of Any Other Category (if applicable) :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['OtherCatagoryCertificate']; ?>" target="_blank"><?php echo $result['OtherCatagoryCertificate']; ?></a></div>
  <div class="col-xs-3"><b> 8. Photocopy of registration card of class IX* :</b></div>
  <div class="col-xs-3"> <a href="DocumentsXIth/<?php echo $result['Regi_Crd_IX']; ?>" target="_blank"><?php echo $result['Regi_Crd_IX']; ?></a></div>
 </div> 
 <div class="row">
  <div class="col-xs-3"><b> 9. Photocopy of report card of class VIII :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['Report_Crd_VIII']; ?>" target="_blank"><?php echo $result['Report_Crd_VIII']; ?></a></div>
  <div class="col-xs-3"><b> 10. Photocopy of report card of class IX (Final-Term)* :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['Report_Crd_IX_FT']; ?>" target="_blank"><?php echo $result['Report_Crd_IX_FT']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 11. Photocopy of report card of class X (Term-I)* :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['Report_Crd_X_T1']; ?>" target="_blank"><?php echo $result['Report_Crd_X_T1']; ?></a></div>
  <div class="col-xs-3"><b> 12. Fitness certificate from MBBS Doctor :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['Fitness_Certi']; ?>" target="_blank"><?php echo $result['Fitness_Certi']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> <b>13. Residence Proof* :</b></div>
  <div class="col-xs-3"><a href="DocumentsXIth/<?php echo $result['ResidenceProof']; ?>" target="_blank"><?php echo $result['ResidenceProof']; ?></a></div>
  <div class="col-xs-3">Residence Proof Type</div>
  <div class="col-xs-3"> <input type="text" name="ResidenceProofType" id="ResidenceProofType" class="text-box" value="<?php echo $result['ResidenceProofType']; ?>" readonly></div>
 </div>
 <div>&nbsp;</div>
 <div align="center" class="h h11"><b><font >Enter your grades in Class X Term-I Exam</font></b></div>
  <div class="row">
  <div class="col-xs-3">Board Type :</div>
  <div class="col-xs-3"><input type="text" name="cboenglish" id="cboenglish" class="text-box" value="<?php echo $criteriaresult['board_type']; ?>" readonly></div>
  </div>
<?php
if($criteriaresult['board_type']=="CBSE")
{
?>
  <div class="row">
  <div class="col-xs-3"> English</div>
  <div class="col-xs-3"> <input type="text" name="cboenglish" id="cboenglish" class="text-box" value="<?php echo $criteriaresult['EnglishGrade']; ?>" readonly></div>
  <div class="col-xs-3">Science</div>
  <div class="col-xs-3"><input type="text" name="cbogeneralscience" id="cbogeneralscience" class="text-box" value="<?php echo $criteriaresult['GeneralScienceGrade']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mathematics</div>
  <div class="col-xs-3"> <input type="text" name="cbomath" id="cbomath" class="text-box" value="<?php echo $criteriaresult['MathGrade']; ?>" readonly></div>
  <div class="col-xs-3">Social Science</div>
  <div class="col-xs-3"><input type="text" name="cbosocialscience" id="cbosocialscience" class="text-box" value="<?php echo $criteriaresult['SocialScienceGrade']; ?>" readonly></div>
 </div>
 <div class="row">
 <div class="col-xs-3">IInd Language</div>
  <div class="col-xs-3"><input type="text" name="cbosecondlanguage" id="cbosecondlanguage" class="text-box" value="<?php echo $criteriaresult['SecondLanguageGrade']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <?php
 }
else
{
?>
 <div class="row">
  <div class="col-xs-3"> English</div>
  <div class="col-xs-3"><input type="text" name="otherEnglish" id="otherEnglish" class="text-box" value="<?php echo $criteriaresult['otherEnglish']; ?>" readonly></div>
  <div class="col-xs-3"> Science</div>
  <div class="col-xs-3"><input type="text" name="otherScience" id="otherScience" class="text-box" value="<?php echo $criteriaresult['otherScience']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mathematics</div>
  <div class="col-xs-3"><input type="text" name="otherMaths" id="otherMaths" class="text-box" value="<?php echo $criteriaresult['otherMaths']; ?>" readonly></div>
  <div class="col-xs-3"> Social Science</div>
  <div class="col-xs-3"><input type="text" name="otherSsc" id="otherSsc" class="text-box" value="<?php echo $criteriaresult['otherSsc']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> IInd Language</div>
  <div class="col-xs-3"><input type="text" name="otherSecondLanguage" id="otherSecondLanguage" class="text-box" value="<?php echo $criteriaresult['otherSecondLanguage']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <?php
 }
?>
 <div>&nbsp;</div>
 <div align="center" class="h h11" style="text-transform:capitalize;"><b>SPECIAL ACHIEVEMENTS (Sports, Cultural, Public Speaking, Olympiads, Exhibition/ Model Making etc)</b></div>
  <div class="row" >
   <div class="col-xs-3 xs"> Sr. No. </div>
   <div class="col-xs-3 xs"> <b>Special Achievements</b> </div>
   <div class="col-xs-3 xs"> Level</div>
   <div class="col-xs-3 xs"><b> Position/Rank</b></div>  
 </div>
 <div class="row" >
  <div class="col-xs-3"> 1</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement1" id="SpecialAchievement1" class="text-box" value="<?php echo $criteriaresult['SpecialAchievement1']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementLevel1" id="AchievementLevel1" class="text-box" value="<?php echo $criteriaresult['AchievementLevel1']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementRenk1" id="AchievementRenk1" class="text-box" value="<?php echo $criteriaresult['AchievementRenk1']; ?>" readonly></div>  
 </div>
 <div class="row" >
  <div class="col-xs-3"> 2</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement2" id="SpecialAchievement2" class="text-box" value="<?php echo $criteriaresult['SpecialAchievement2']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementLevel2" id="AchievementLevel2" class="text-box" value="<?php echo $criteriaresult['AchievementLevel2']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementRenk2" id="AchievementRenk2" class="text-box" value="<?php echo $criteriaresult['AchievementRenk2']; ?>" readonly></div>  
 </div>
 <div class="row" >
  <div class="col-xs-3"> 3</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement3" id="SpecialAchievement3" class="text-box" value="<?php echo $criteriaresult['SpecialAchievement3']; ?>" readonly></div>
  <div class="col-xs-3"> <input type="text" name="AchievementLevel3" id="AchievementLevel3" class="text-box" value="<?php echo $criteriaresult['AchievementLevel3']; ?>" readonly></div>
  <div class="col-xs-3"> <input type="text" name="AchievementRenk3" id="AchievementRenk3" class="text-box" value="<?php echo $criteriaresult['AchievementRenk3']; ?>" readonly></div>  
 </div>
 <div class="row" >
  <div class="col-xs-3"> 4</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement4" id="SpecialAchievement4" class="text-box" value="<?php echo $criteriaresult['SpecialAchievement4']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementLevel4" id="AchievementLevel4" class="text-box" value="<?php echo $criteriaresult['AchievementLevel4']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementRenk4" id="AchievementRenk4" class="text-box" value="<?php echo $criteriaresult['AchievementRenk4']; ?>" readonly></div>  
 </div>
 <div class="row" >
  <div class="col-xs-3"> 5</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement5" id="SpecialAchievement5" class="text-box" value="<?php echo $criteriaresult['SpecialAchievement5']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementLevel5" id="AchievementLevel5" class="text-box" value="<?php echo $criteriaresult['AchievementLevel5']; ?>" readonly></div>
  <div class="col-xs-3"><input type="text" name="AchievementRenk5" id="AchievementRenk5" class="text-box" value="<?php echo $criteriaresult['AchievementRenk5']; ?>" readonly></div> 
 </div>
 <div class="row" >
  <div class="col-xs-12"><b> **To be supportedby documentary evidence if shortlisted for admission.</b></div>
 </div>
 <div>&nbsp;</div>
 <div align="center" class="h h11"><b><font >Select Stream and Subject to apply for</font></b></div>
 <div class="subject" id="frmMyform">
 <div class="row">
  <div class="col-xs-3">Select Stream</div>
  <div class="col-xs-3"><input type="text" name="cbostream" id="cbostream" class="text-box" value="<?php echo $criteriaresult['SelectStream']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <?php
 if($criteriaresult['SelectStream']=="Science")
 {
 ?>
 <div class="row"> 
  <div class="col-xs-3">Subject 1</div>
  <div class="col-xs-3"><input type="text" name="cbosciiencesubject1" id="cbosciiencesubject1" class="text-box" value="<?php echo $criteriaresult['ScienceSubject1']; ?>" readonly></div>
  <div class="col-xs-3">Subject 2</div>
  <div class="col-xs-3"><input type="text" name="cbosciiencesubject2" id="cbosciiencesubject2" class="text-box" value="<?php echo $criteriaresult['ScienceSubject2']; ?>" readonly></div>
 </div>
 <div class="row"> 
  <div class="col-xs-3">Subject 3</div>
  <div class="col-xs-3"><input type="text" name="cbosciiencesubject3" id="cbosciiencesubject3" class="text-box" value="<?php echo $criteriaresult['ScienceSubject3']; ?>" readonly></div>
  <div class="col-xs-3">Subject 4</div>
  <div class="col-xs-3"><input type="text" name="cbosciiencesubject4" id="cbosciiencesubject4" class="text-box" value="<?php echo $criteriaresult['ScienceSubject4']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Subject 5</div>
  <div class="col-xs-3"><input type="text" name="cbosciiencesubject5" id="cbosciiencesubject5" class="text-box" value="<?php echo $criteriaresult['ScienceSubject5']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <?php
 } 
 elseif($criteriaresult['SelectStream']=="Commerce")
 {
 ?>
 <div class="row"> 
  <div class="col-xs-3">Subject 1</div>
  <div class="col-xs-3"><input type="text" name="cbocommercesubject1" id="cbocommercesubject1" class="text-box" value="<?php echo $criteriaresult['CommerceSubject1']; ?>" readonly></div>
  <div class="col-xs-3">Subject 2</div>
  <div class="col-xs-3"><input type="text" name="cbocommercesubject2" id="cbocommercesubject2" class="text-box" value="<?php echo $criteriaresult['CommerceSubject2']; ?>" readonly></div>
 </div>
 <div class="row"> 
  <div class="col-xs-3">Subject 3</div>
  <div class="col-xs-3"><input type="text" name="cbocommercesubject3" id="cbocommercesubject3" class="text-box" value="<?php echo $criteriaresult['CommerceSubject3']; ?>" readonly></div>
  <div class="col-xs-3">Subject 4</div>
  <div class="col-xs-3"><input type="text" name="cbocommercesubject4" id="cbocommercesubject4" class="text-box" value="<?php echo $criteriaresult['CommerceSubject4']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Subject 5</div>
  <div class="col-xs-3"><input type="text" name="cbocommercesubject5" id="cbocommercesubject5" class="text-box" value="<?php echo $criteriaresult['CommerceSubject5']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <?php
 } 
 else
 {
 ?>
 <div class="row"> 
  <div class="col-xs-3">Subject 1</div>
  <div class="col-xs-3"><input type="text" name="cbohuminitiessubject1" id="cbohuminitiessubject1" class="text-box" value="<?php echo $criteriaresult['HumanitiesSubject1']; ?>" readonly></div>
  <div class="col-xs-3">Subject 2</div>
  <div class="col-xs-3"><input type="text" name="cbohuminitiessubject2" id="cbohuminitiessubject2" class="text-box" value="<?php echo $criteriaresult['HumanitiesSubject2']; ?>" readonly></div>
 </div>
 <div class="row"> 
  <div class="col-xs-3">Subject 3</div>
  <div class="col-xs-3"><input type="text" name="cbohuminitiessubject3" id="cbohuminitiessubject3" class="text-box" value="<?php echo $criteriaresult['HumanitiesSubject3']; ?>" readonly></div>
  <div class="col-xs-3">Subject 4</div>
  <div class="col-xs-3"><input type="text" name="cbohuminitiessubject4" id="cbohuminitiessubject4" class="text-box" value="<?php echo $criteriaresult['HumanitiesSubject4']; ?>" readonly></div>
 </div>
 <div class="row"> 
  <div class="col-xs-3">Subject 5</div>
  <div class="col-xs-3"><input type="text" name="cbohuminitiessubject5" id="cbohuminitiessubject5" class="text-box" value="<?php echo $criteriaresult['HumanitiesSubject5']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <?php } ?>
<div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"><b>Place :</b></div>
  <div class="col-xs-3"> <input type="text" name="txtplaceofregistration" id="txtplaceofregistration" class="text-box" value="<?php echo $result['RegistrationPlace']; ?>" readonly></div>
  <div class="col-xs-3"><b> Date :</b> </div>
  <div class="col-xs-3"><input type="text" name="txtdateofregistration" id="txtdateofregistration" class="text-box" value="<?php echo $result['RegistrationDate']; ?>" readonly></div>
 </div>
 <div align="center"><a href="#" onClick="window.print();">Print</a></div>
</body>
<style>
@media print
{
  a[href]:after
  {
    content: none !important;
  }
}
@media print
{
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>
</html>
</body>
</html>