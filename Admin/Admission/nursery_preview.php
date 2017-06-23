<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
<?php
   
   $Applicationno=$_REQUEST['ApplicationNo'];
   $sqlReport="SELECT `RegistrationNo`, `RegistrationDate`, `RegistrationPlace`, `sname`, `middlename`, `slastname`, `DOB`, `PlaceOfBirth`, `Age`, `Sex`, `Sibling`, `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `Single_Parent_Reason`, `Other_single_parent`, `Special_Needs`, `SpecialNeedRequirment`, `OtherSpecialNeed`, `DG`, `Staff`, `EWSCategory`, `chkGirlChild_FirstBorn`, `MotherTongue`, `Nationality`, `PermanentAddress`, `PermanentPhoneNo`, `ResidentialAddress`, `Location`, `Distance`, `ResidencePhoneNo`, `smobile`, `sclass`, `MasterClass`, `LastSchool`, `SecondLanguage`, `Twin_Triplet`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherHighestQualification`, `FatherQualificationDuration`, `FatherOccupation`, `FatherDesignation`, `FatherAnnualIncome`, `FatherCompanyName`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `FatherMobileNo`, `FatherEmailId`, `MotherName`, `MotherAge`, `MotherEducation`, `MotherQualificationDuration`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`, `MotherCompanyName`, `MotherOfficeAddress`, `MotherOfficePhone`, `MotherMobile`, `MotherEmail`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation`, `GuradianAnnualIncome`, `GuradianCompanyName`, `GuardiansAddress`, `GuradianOfficialAddress`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `GuardianEmailId`, `DPSRohiniStaff`, `OtherDPSStaff`, `SC_Catagory`, `ST_Catagory`, `OBC_Catagory`, `AnyOther_Catagory`, `OtherCatagoryDetail`, `TransportAvail`, `SafeTransport`, `Password4AdmissionFee`, `RealBroSisName`, `RealBroSisAdmissionNo`, `RealBroSisClass`, `RealBroSisName2`, `RealBroSisAdmissionNo2`, `RealBroSisClass2`, `RealBroSisName3`, `RealBroSisAdmissionNo3`, `RealBroSisClass3`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `EmergencyContactPersonName`, `EmergencyContactNo`, `EmergencyEmail`, `RegistrationFormNo`, `email`, `DrawOfLots`, `HostelFacility`, `ProfilePhoto`, `FatherPhoto`, `MotherPhoto`, `GuardianPhoto`, `status`, `Remarks`, `quarter`, `FinancialYear`, `SchoolId`, `TxnAmount`, `TxnId`, `TxnStatus`, `BirthCertificate`, `ScoreCard`, `RegistrationCard_9`, `ReportCard_8`, `ReportCard_9`, `ReportCard_10`, `class8_trm1`, `class7_finlexm`, `CatagoryCertificate`, `ResidenceProof`, `ResidenceProofType`, `ParentDPSStaff`, `ParentDPSAlumni`, `FatherDPSAlumni`, `MotherDPSAlumni`, `DGCertificate`, `EWSCertificate`, `OtherCatagoryCertificate`, `MedicalCertificate`, `SibilingProof`, `GirlChild_FirstBorn`, `SingleParent`, `CurricularActivity`, `SystemDateTime`, `L1Remarks`, `L1ApprovalStatus`, `InterviewScore`, `L2Remarks`, `L2ApprovalStatus`, `L4Remarks`, `L4ApprovalStatus`, `PGTxnId`, `Stream`, `OptionalSubjects`, `EligibleForPrep`, `EnglishMarks`, `EnglishGrade`, `EnglishPercentage`, `MathsMarks`, `MathsGrade`, `MathsPercentage`, `ScienceMarks`, `ScienceGrade`, `SciencePercentage`, `SSTMarks`, `SSTGrade`, `SSTPercentage`, `LanguageMarks`, `LanguageGrade`, `LanguagePercentage`, `PaymentMode`, `BankName`, `BankBranch`, `ChequeDate`, `ChequeNo`, `Amount`, `ChequeBounceAmt`, `ChequeStatus`, `DiscountType`, `Category`, `FamilyAnnualIncome`, `AadharNumber`, `SpecialNeedDetail`, `SpecialNeedDescription`, `uniqueNo`, `Paid`, `ReceiptNo`, `fatherbusiness`, `fatherpolitical`, `fatherministry`, `fatherprofssional`, `fatherservices`, `fatherothers`, `motherbusiness`, `motherpolitical`, `motherministry`, `motherprofssional`, `motherservices`, `motherothers`, `guardianbusiness`, `guardianpolitical`, `guardianministry`, `guardianprofssional`, `guardianservices`, `guardianothers`, `bloodgroup`, `pgTxnNo`, `TxRefNo`, `TxMsg` FROM `NewStudentRegistration_temp` WHERE RegistrationNo =  ".$Applicationno."";


   $sqlQuery=  mysql_query($sqlReport);
   $i=1;
   $reportData=  mysql_fetch_array($sqlQuery);
    $old_date = Date_create($reportData['DOB']);
$new_date = Date_format($old_date, "d/m/Y");
   ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Registration</title>
<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
    <script src="../../bootstrap/bootstrap.min.js"></script>
<style>
		body{font-family:Arial, Helvetica, sans-serif!important;} .Header .img-responsive{width:40%}
		 .text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .row{padding-left:0%; margin:0;} .h{background-color:rgba(11, 70, 45, 0.84); padding:4px 0px; color:#FFFFFF;} .h11{ text-transform:uppercase;} .col-xs-6{ text-align:left; margin-top:1%!important;} .hr{width:99%; border:1px solid #CCCCCC; padding:0;} .col-xs-3, .col-xs-9{margin-top:1%; } .f{font-size:12px;} .col-xs-2{width:12%; padding:0; border:1px solid #0099ff; } .col-xs-2 li{list-style:none; padding:5%;} .info{ padding:1%; margin:0; line-height:0.5;} .tba{ width:90%; } .tbs{padding:2.5%;}
		 .col-xs-1{width:2%;}
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
		 .col-xs-3{ width:50%; margin-top:1%; } .col-xs-6{ text-align:left; margin-top:1%!important;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:50%;} .col-xs-2 .text-box{height:25px; } .xss{width:50%!important;} .table_detail .head1{ display:none;} .table_detail .col-xs-3 {width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.1%; padding-top:0.1%;} .table_detail .l2{ font-size:9px; padding:0; padding-bottom:0%; padding-top:0%; } .table_detail .col-xs-2 { padding:0.8% 1%; width:20%;} .table_detail .l3{padding:1%;} table_detail .head1{padding-bottom:0.5%;} .tba{ width:90%; }.info p{line-height:1.2;} .check table{width:30%; float:left;} .study{margin-top:25%;}.col-xs-1{width:2%; float:left} .col-xs-10{width:70%; float:left}
		 } 
		 @media only screen and (min-width:530px) and (max-width: 580px){ body{font-size:12px;} .Header .img-responsive{width:40%}
		 .col-xs-3{ width:50%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:49%; } .col-xs-2 .text-box{height:25px; }  .xss{width:45%!important; font-size:12px;} .xss1{ width:45%; font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:90%; } .info p{line-height:1.2;} .check table{width:45%; float:left;} .study{margin-top:40%;}.col-xs-1{width:2%; float:left} .col-xs-10{width:70%; float:left}
		 } 
		 @media only screen and (min-width:445px) and (max-width: 530px){ body{font-size:14px; line-height:1;} .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .text-box{width:100%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:50%; margin-top:1%;  } .col-xs-2 .text-box{height:25px; } .xss{width:80%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:50%; }.info p{line-height:1.2;} .check table{width:95%; float:left;}.col-xs-1{width:2%; float:left} .col-xs-10{width:70%; float:left}
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
  <div align="center" class="h h11"><b><font >Student Details</font></b></div>
  <div>&nbsp;</div>
  <div class="row" >
   <div class="col-xs-3"> Class Applied For*:</div>
   <div class="col-xs-3"><input type="text" name="cboClass" id="cboClass" value="<?php echo $reportData['sclass']; ?>" class="text-box" readonly></div>
   <div class="col-xs-6">&nbsp;</div>
 </div>
 <div class="row">
  <div class="col-xs-3"> First Name of Applicant*: </div>
  <div class="col-xs-3"> <input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $reportData['sname']; ?>" readonly /> </div>
  <div class="col-xs-3"> Middle Name of Applicant:</div>
  <div class="col-xs-3"> <input name="txtMiddleName" id="txtMiddleName" type="text" class="text-box" value="<?php echo $reportData['middlename']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Last Name of Applicant:</div>
  <div class="col-xs-3"> <input name="txtLastName" id="txtLastName" type="text" class="text-box" value="<?php echo $reportData['slastname']; ?>" readonly></div>
  <div class="col-xs-3"> Place of Birth:</div>
  <div class="col-xs-3"> <input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text" value="<?php echo $reportData['PlaceOfBirth']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Date of Birth*:</div>
  <div class="col-xs-3"> <input name="txtDOB" id="txtDOB" class="text-box" type="text" value="<?php echo $new_date ; ?>" readonly></div>
  <div class="col-xs-3"> Age as on*:</div>
  <div class="col-xs-3"> <input name="txtAge" id="txtAge" type="text" class="text-box" value="<?php echo $reportData['Age']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Gender*:</div>
  <div class="col-xs-3"> <input name="txtAge" id="txtAge" type="text" class="text-box"  value="<?php echo $reportData['Sex']; ?>" readonly/></div>
  <div class="col-xs-3"> Nationality*: </div>
  <div class="col-xs-3"> <input name="txtNationality" id="txtNationality" type="text" class="text-box" value="<?php echo $reportData['Nationality']; ?>" readonly ></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Enter Distance from school*: </div>
  <div class="col-xs-3"> <input type="text" name="txtLocality" id="txtLocality" class="text-box" value="<?php echo $reportData['Location']; ?>" readonly></div>
  <div class="col-xs-3"> Mother Tongue*: </div>
  <div class="col-xs-3"> <input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text" value="<?php echo $reportData['MotherTongue']; ?>" readonly></div>
 </div>
  <div class="row">
  <div class="col-xs-3">Blood Group*:</div>
  <div class="col-xs-3"><input type="text" name="bloodgroup" id="bloodgroup" class="text-box" value="<?php echo $reportData['bloodgroup']; ?>" readonly></div>
  <div class="col-xs-3">Select if Applicable:</div>
  <div class="col-xs-3"><input type="text" name="cboapplicable" id="cboapplicable" class="text-box" value="<?php echo $reportData['Twin_Triplet']; ?>" readonly/></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Current Residential Address*: </div>
  <div class="col-xs-3"> <input type="text" name="txtAddress" id="txtAddress" class="text-box" value="<?php echo $reportData['ResidentialAddress']; ?>" readonly /></div>
  <div class="col-xs-3">Residential Landline Number:</div>
  <div class="col-xs-3"><input type="text" name="residentialno" id="residentialno" class="text-box tba" value="<?php echo $reportData['ResidencePhoneNo']; ?>" readonly></div>
</div>
 <div class="row">
  <div class="col-xs-3"> Permanent Address: </div>
  <div class="col-xs-3"> <input type="text" name="txtpermanentAddress" id="txtpermanentAddress" class="text-box" value="<?php echo $reportData['PermanentAddress']; ?>" readonly /></div>
  <div class="col-xs-3">Permanent Landline Number:</div>
  <div class="col-xs-3"><input type="text" name="permanentno" id="permanentno" class="text-box tba" value="<?php echo $reportData['PermanentPhoneNo']; ?>" readonly></div>
 </div>
 <div> &nbsp;</div>
 <div class="h h11" align="center"><strong> Family Details (Father / Mother / Guardian)</strong></div>

 <div>&nbsp;</div>

 <div align="center"><strong><u>Father's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input name="txtFatherName" id="txtFatherName" type="text" class="text-box" value="<?php echo $reportData['sfathername']; ?>" readonly></div>
  <div class="col-xs-3"> Age:</div>
  <div class="col-xs-3"> <input name="txtFatherAge" id="txtFatherAge" class="text-box" type="text" value="<?php echo $reportData['sfatherage']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification*:</div>
  <div class="col-xs-3"><input type="text" name="txtFatherEducation" id="txtFatherEducation" class="text-box" value="<?php echo $reportData['FatherEducation']; ?>" readonly></div>
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><input type="text" name="txtFatherOccupation" id="txtFatherOccupation" class="text-box" value="<?php echo $reportData['FatherOccupation']; ?>" readonly></div>
 </div>
  <div class="row">
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input type="text" name="fatherbusiness" id="fatherbusiness" class="text-box" value="<?php echo $reportData['fatherbusiness']; ?>" readonly></div>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="fatherpolitical" id="fatherpolitical" class="text-box" value="<?php echo $reportData['fatherpolitical']; ?>" readonly></div>
 </div>
  <div class="row">
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="fatherministry" id="fatherministry" class="text-box" value="<?php echo $reportData['fatherministry']; ?>" readonly></div>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="fatherprofssional" id="fatherprofssional" class="text-box" value="<?php echo $reportData['fatherprofssional']; ?>" readonly></div>
 </div>
  <div class="row">
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="fatherservices" id="fatherservices" class="text-box" value="<?php echo $reportData['fatherservices']; ?>" readonly></div>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="fatherothers" id="fatherothers" class="text-box" value="<?php echo $reportData['fatherothers']; ?>" readonly></div> 
  </div>
  <div class="row">
  <div class="col-xs-3"> Designation:</div>
  <div class="col-xs-3"> <input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text" value="<?php echo $reportData['FatherDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name:</div>
  <div class="col-xs-3"> <input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text" value="<?php echo $reportData['FatherCompanyName']; ?>" readonly></div>
   </div>
   <div class="row">
  <div class="col-xs-3"> Mobile No *:</div>
  <div class="col-xs-3"> <input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" value="<?php echo $reportData['FatherMobileNo']; ?>" readonly></div>
  <div class="col-xs-3"> Email Id *:</div>
  <div class="col-xs-3"> <input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="text" value="<?php echo $reportData['FatherEmailId']; ?>" readonly></div>
  </div>
 <div class="row">
   <div class="col-xs-3">Office Address: <br><font class="f">(If employed)</font> </div>
   <div class="col-xs-3"> <input type="text" name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box" value="<?php echo $reportData['FatherOfficeAddress']; ?>" readonly></div>
   <div class="col-xs-3">Office Landline No.</div>
   <div class="col-xs-3"><input type="text" name="cboofficeno" id="cboofficeno" class="text-box" value="<?php echo $reportData['FatherOfficePhoneNo']; ?>" readonly></div>
 </div>
 
  <div>&nbsp;</div>
 <div align="center"><strong><u>Mother's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input name="txtMotherName" id="txtMotherName" type="text" class="text-box" value="<?php echo $reportData['MotherName']; ?>" readonly></div>
  <div class="col-xs-3"> Age:</div>
  <div class="col-xs-3"> <input name="txtMotherAge" id="txtMotherAge" class="text-box" type="text" value="<?php echo $reportData['MotherAge']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification*:</div>
  <div class="col-xs-3"><input type="text" name="txtMotherEducation" id="txtMotherEducation" class="text-box" value="<?php echo $reportData['MotherEducation']; ?>" readonly></div>
  <div class="col-xs-3">Occupation</div>
  <div class="col-xs-3"><input type="text" name="txtMotherOccupation" id="txtMotherOccupation" class="text-box" value="<?php echo $reportData['MotherOccupatoin']; ?>" readonly></div>
 </div>
   <div class="row">
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input type="text" name="motherbusiness" id="motherbusiness" class="text-box" value="<?php echo $reportData['motherbusiness']; ?>" readonly></div>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="motherpolitical" id="motherpolitical" class="text-box" value="<?php echo $reportData['motherpolitical']; ?>" readonly></div>
 </div>
   <div class="row">
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="motherministry" id="motherministry" class="text-box" value="<?php echo $reportData['motherministry']; ?>" readonly></div>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="motherprofssional" id="motherprofssional" class="text-box" value="<?php echo $reportData['motherprofssional']; ?>" readonly></div>
 </div>
   <div class="row">
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="motherservices" id="motherservices" class="text-box" value="<?php echo $reportData['motherservices']; ?>" readonly></div> 
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="motherothers" id="motherothers" class="text-box" value="<?php echo $reportData['motherothers']; ?>" readonly></div>  
  </div>

   <div class="row">
  <div class="col-xs-3"> Designation: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text" value="<?php echo $reportData['MotherDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"><input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" class="text-box" value="<?php echo $reportData['MotherCompanyName']; ?>" readonly></div>
  </div>
  <div class="col-xs-3"> Mobile No.*:</div>
  <div class="col-xs-3"> <input name="txtMotherMobileNo" id="txtFatherOfficialPhNo1" class="text-box" type="text" value="<?php echo $reportData['MotherMobile']; ?>" readonly></div>
  <div class="col-xs-3"> Email id*:</div>
  <div class="col-xs-3"> <input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" type="text" value="<?php echo $reportData['MotherEmail']; ?>" readonly></div>
    </div>
 <div class="row">
  <div class="col-xs-3"> Office Address: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input type="text" name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box" value="<?php echo $reportData['MotherOfficeAddress']; ?>" readonly></div>
  <div class="col-xs-3">Office Landline No.</div>
  <div class="col-xs-3"><input type="text" name="cbomotherofficeno" id="cbomotherofficeno" class="text-box" value="<?php echo $reportData['MotherOfficePhone']; ?>" readonly></div>
</div>
  
     
 <div>&nbsp;</div><div>&nbsp;</div>
 <div align="center"><strong><u>Guardian's Details (If Applicable)</u></strong></div>
 <div>&nbsp;</div>
 
 <div class="row">
  <div class="col-xs-3"> Name:</div>
  <div class="col-xs-3"> <input name="txtGuradianName" id="txtGuradianName" type="text" class="text-box" value="<?php echo $reportData['GuradianName']; ?>" readonly></div>
  <div class="col-xs-3"> Age: </div>
  <div class="col-xs-3"> <input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" value="<?php echo $reportData['GuradianAge']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification:</div>
  <div class="col-xs-3"> <input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" class="text-box" value="<?php echo $reportData['GuradinaEducation']; ?>" readonly></div>
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><input name="txtGuradianOccupation" id="txtGuradianOccupation" type="text" class="text-box" value="<?php echo $reportData['GuradianOccupation']; ?>" readonly></div>
 </div>

  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input name="guardianbusiness" id="guardianbusiness" type="text" class="text-box" value="<?php echo $reportData['guardianbusiness']; ?>" readonly></div>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="guardianpolitical" id="guardianpolitical" class="text-box" value="<?php echo $reportData['guardianpolitical']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="guardianministry" id="guardianministry" class="text-box" value="<?php echo $reportData['guardianministry']; ?>" readonly></div>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="guardianprofssional" id="guardianprofssional" class="text-box" value="<?php echo $reportData['guardianprofssional']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="guardianservices" id="guardianservices" class="text-box" value="<?php echo $reportData['guardianservices']; ?>" readonly></div>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="guardianothers" id="guardianothers" class="text-box" value="<?php echo $reportData['guardianothers']; ?>" readonly></div> 
 </div>
  <div class="row">
  <div class="col-xs-3"> Designation:<br><font class="f"> (If employed)</font></div>
  <div class="col-xs-3"> <input name="txtGuradianDesignation" id="txtGuradianDesignation" class="text-box" type="text" value="<?php echo $reportData['GuradianDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name:<br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input name="txtGuradianCompanyName" id="txtGuradianCompanyName" type="text" class="text-box" value="<?php echo $reportData['GuradianCompanyName']; ?>" readonly></div>
  </div>
   <div class="row">
  <div class="col-xs-3"> Mobile No.:</div>
  <div class="col-xs-3"> <input name="txtGuradianMobileNo" id="txtGuradianMobileNo" class="text-box" type="text" value="<?php echo $reportData['GuradianMobileNo']; ?>" readonly></div>  
  <div class="col-xs-3"> Office Address:<br><font class="f">(If employed):</font></div>
  <div class="col-xs-3"> <input type="text" name="txtGuradianOfficialAddress" id="txtGuradianOfficialAddress" class="text-box" value="<?php echo $reportData['GuradianOfficialAddress']; ?>" readonly></div>
  </div>
   <div class="row">
  <div class="col-xs-3"> Office Landline No:</div>
  <div class="col-xs-3"> <input type="text" name="txtguardianofficeno" id="txtguardianofficeno" class="text-box" value="<?php echo $reportData['GuradianOfficialPhNo']; ?>" readonly></div>
  <div class="col-xs-3"> Email id:</div>
  <div class="col-xs-3"> <input name="txtguardianEmailId" id="txtguardianEmailId" class="text-box" type="text"  value="<?php echo $reportData['GuardianEmailId']; ?>" readonly></div>
  </div>
  
 
 <div>&nbsp;</div><div>&nbsp;</div>
 <div class="h" align="center"><strong>Category</strong>*<i>(Please select the relevant Category / Categories and fill the details as applicable. 
		Parents are required to produce the relevant documents at the time of Admission. In case the documents are not produced, the candidature will be rejected)</i></div>
 <div>&nbsp;</div>
 <div class="row">
   <div class="col-xs-3">Sibling(s) studying in DPS, Rohini</div>
   <div class="col-xs-3"><input name="chkSibling" id="chkSibling" type="text" value="<?php echo $reportData['Sibling']; ?>" class="text-box" readonly></div>
   <div class="col-xs-3">Distance Points</div>
   <div class="col-xs-3"><input name="distance" id="distance" type="text" value="<?php echo $reportData['Distance']; ?>" class="text-box" readonly></div>
  </div>
 <div>&nbsp;</div>
 <div class="study">
 <div align="center">
        <strong>Details of Sibling(s) studying in <?php echo $SchoolName; ?>, 
		</strong> <p>(If there is more than one sibling, mention all)</p>
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Brother's / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" value="<?php echo $reportData['RealBroSisName']; ?>" readonly> </div>
  <div class="col-xs-3"> Brother's / Sister's Class:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box" type="text" value="<?php echo $reportData['RealBroSisClass']; ?>" readonly></div>
  </div>
   <div class="row">
  <div class="col-xs-3"> Brother's / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" type="text" value="<?php echo $reportData['RealBroSisAdmissionNo']; ?>"readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3"> Brother's / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName2" id="txtRealBroSisName2" class="text-box" type="text" value="<?php echo $reportData['RealBroSisName2']; ?>" readonly> </div>
  <div class="col-xs-3"> Brother's / Sister's Class: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisClass2" id="txtRealBroSisClass2" class="text-box" type="text" value="<?php echo $reportData['RealBroSisClass2']; ?>" readonly></div>
  </div>
  <div class="row">
  <div class="col-xs-3"> Brother's / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName2" id="txtRealBroSisSchoolName2" class="text-box" type="text" value="<?php echo $reportData['RealBroSisAdmissionNo2']; ?>" readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center">Details of Father / Mother, if Alumni of <font style="text-transform:uppercase"><?php echo $SchoolName; ?></font></div>
 <div>&nbsp;</div>
 
 <div align="center"><strong><u> Father Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Father:</div>
  <div class="col-xs-3"> <input name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" type="text" value="<?php echo $reportData['AlumniFatherName']; ?>" readonly></div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" type="text" value="<?php echo $reportData['AlumniSchoolName']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" value="<?php echo $reportData['AlumniPassingYear']; ?>" readonly></div>
  <div class="col-xs-3"> Last Class Attended:</div>
  <div class="col-xs-3"> <input name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box" type="text" value="<?php echo $reportData['AlumniFatherPassingClass']; ?>" readonly></div>
 </div>
 
 <div>&nbsp; </div>
 <div align="center"><strong><u>Mother Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Mother:</div>
  <div class="col-xs-3"> <input name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" type="text" value="<?php echo $reportData['AlumniMotherName']; ?>" readonly> </div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" type="text" value="<?php echo $reportData['AlumniMotherSchoolName']; ?>" readonly></div>
 </div>
 <div class="row">	
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" type="text" value="<?php echo $reportData['AlumniMotherPassingYear']; ?>" readonly></div>
  <div class="col-xs-3"> Last Class Attended:</div>
  <div class="col-xs-3"> <input name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box" type="text" value="<?php echo $reportData['AlumniMotherPassingClass']; ?>" readonly></div>
 </div>
 <div>&nbsp; </div>
 <div align="center"><strong><u>Special Needs Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3">Special Needs (if any):</div>
  <div class="col-xs-3"> <input name="cboSpecialNeed" id="cboSpecialNeed" class="text-box" type="text" value="<?php echo $reportData['SpecialNeedDetail']; ?>" readonly></div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtSpecialNeedDetail" id="txtSpecialNeedDetail" class="text-box" value="<?php echo $reportData['SpecialNeedDescription']; ?>" readonly></div>
 </div>
 <div>&nbsp; </div>
 <div align="center"><strong><u>Category</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3">Select Category:</div>
  <div class="col-xs-3"><input type="text" name="cbocatagory" id="cbocatagory" class="text-box" value="<?php echo $reportData['Category']; ?>" readonly></div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtothercatagory" id="txtothercatagory" class="text-box" value="<?php echo $reportData['OtherCatagoryDetail']; ?>" readonly></div>
 </div>
 
 
 

 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Contact Details for all Admission Related Information</strong> </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of the contact person*:</div>
  <div class="col-xs-3"> <input name="txtcontactpersonname" id="txtcontactpersonname"  class="text-box"  type="text" value="<?php echo $reportData['EmergencyContactPersonName']; ?>" readonly></div>
  <div class="col-xs-3"> Mobile No*:</div>
  <div class="col-xs-3"> <input name="txtemergencyMobile" id="txtemergencyMobile" type="text" class="text-box"  value="<?php echo $reportData['EmergencyContactNo']; ?>" readonly></div>
 </div>
  <div class="row">
  <div class="col-xs-3"> E-mail Id*:</div>
  <div class="col-xs-3"> <input name="txtemergencyemail" id="txtemergencyemail" type="text" class="text-box" value="<?php echo $reportData['EmergencyEmail']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div> 
 </div>
 
 <div>&nbsp;</div>
 <div class="h" align="center"><strong> Documents to be Uploaded <p>(Please note maximum file size allowed is 250 KB.)</p> </strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"><b> 1. Copy of Birth Certificate issued by Municipal Corporation* :</b></div>
  <div class="col-xs-3"> <a href="../../Admission/Documents_nursery/<?php echo $reportData['BirthCertificate']; ?>" target="_blank"><?php echo $reportData['BirthCertificate']; ?></a></div>
  <div class="col-xs-3"><b> 2. Photograph of Applicant*</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
  <div class="col-xs-3"> <a href="../../Admission/Documents_nursery/<?php echo $reportData['ProfilePhoto']; ?>" target="_blank"><?php echo $reportData['ProfilePhoto']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 3. Photograph of Father*</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
  <div class="col-xs-3"> <a href="../../Admission/Documents_nursery/<?php echo $reportData['FatherPhoto']; ?>" target="_blank"><?php echo $reportData['FatherPhoto']; ?></a></div>
  <div class="col-xs-3"><b> 4. Photograph of Mother*</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
  <div class="col-xs-3"> <a href="../../Admission/Documents_nursery/<?php echo $reportData['MotherPhoto']; ?>" target="_blank"><?php echo $reportData['MotherPhoto']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 5. Photograph of Guardian (if applicable)</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
  <div class="col-xs-3"> <a href="../../Admission/Documents_nursery/<?php echo $reportData['GuardianPhoto']; ?>" target="_blank"><?php echo $reportData['GuardianPhoto']; ?></a></div>
  <div class="col-xs-3"> <b>6. Copy Of ST/SC/OBC Certificate (if applicable) :</b></div>
  <div class="col-xs-3"> <a href="../../Admission/Documents_nursery/<?php echo $reportData['CatagoryCertificate']; ?>" target="_blank"><?php echo $reportData['CatagoryCertificate']; ?></a></div>
 </div>
  <div class="row">
  <div class="col-xs-3"> <b>7. Copy of Medical Document/Certificate(if belongs to special need) (if applicable) :</b></div>
  <div class="col-xs-3"><a href="../../Admission/Documents_nursery/<?php echo $reportData['MedicalCertificate']; ?>" target="_blank"><?php echo $reportData['MedicalCertificate']; ?></a></div>
  <div class="col-xs-3"> <b>8. Residence Proof* :</b></div>
  <div class="col-xs-3"><a href="../../Admission/Documents_nursery/<?php echo $reportData['ResidenceProof']; ?>" target="_blank"><?php echo $reportData['ResidenceProof']; ?></a></div>
   </div>
 <div class="row">
   <div class="col-xs-3"><b> 9. Proof of Sibiling (Copy of last paid fee slip / ID Card of Sibiling (2016-17)) (if applicable):</b></div>
   <div class="col-xs-3"><a href="../../Admission/Documents_nursery/<?php echo $reportData['SibilingProof']; ?>" target="_blank"><?php echo $reportData['SibilingProof']; ?></a></div>
   <div class="col-xs-3">Type of Residence Proof</div> 
   <div class="col-xs-3"> <input type="text" name="ResidenceProofType" id="ResidenceProofType" class="text-box" value="<?php echo $reportData['ResidenceProofType']; ?>" readonly> </div>
 </div>
 
 <div>&nbsp;</div>

 
 <div class="row" style="padding-left:3%;">
  <div class="col-xs-3"><b>Place :</b></div>
  <div class="col-xs-3"> <input type="text" name="txtplaceofregistration" class="text-box" value="<?php echo $reportData['RegistrationPlace']; ?>" readonly> </div>
  <div class="col-xs-3"><b> Date :</b> </div>
  <div class="col-xs-3"><input typr="text" name="txtdateofregistration" class="text-box" value="<?php echo $reportData['RegistrationDate']; ?>" readonly></div>
</div>
<div>&nbsp;</div>
<div align="center"><a href="#" onClick="window.print() ;">Print</a></div>
</div>
</div>
</div>
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

