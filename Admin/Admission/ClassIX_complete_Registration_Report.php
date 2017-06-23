<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Student Registration Report</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<!----Pagein------->
  <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />  
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../../bootstrap/bootstrap.min.js"></script> 
   <script src="../js/jquery.min.js"></script> 
   <script src="../js/dataTables-data.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
<!---->
<style type="text/css">
.row{padding:0; margin:0;}
.top{padding:0.5% 2% 2.5% 2%; border-bottom:1px solid #0b462d; margin:0.5% 0;}
.top div{float:left; width:50%;}
.top .head{font-size:16px; font-weight:bold;}
thead th{text-align:center;}
.btns .col-xs-6{padding:0;}
.btns .col-xs-6 a .btn{width:100%; background:#097b4d; color:#fff; border-radius:0;}
.btns .col-xs-6 a .btn:hover{background:#097b4d;}
.btns .col-xs-6 a button.active{background:#0b462d;}
.table>thead>tr>th{padding:1px 8px !important;}

</style>

</head>



<body>
 <div class="top">
  <div class="head">Complete Registration Report</div>
  <div align="right"><a href="javascript:history.back(1)"> 
               <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a>
  </div>
 </div>
 <div class="btns">
  <div class="row">
   <div class="col-xs-6"><a href="ClassIX_complete_Registration_Report.php"><button class="btn active">Complete Registration Report<font size="+1">&nbsp;&dArr;</font></button></a></div>
   <div class="col-xs-6"><a href="ClassIX_incomplete_Registration_Report.php"><button class="btn">Incomplete Registration Report</button></a></div>
  </div>
 </div>
 <div id="MasterDiv">
 <!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >										
												<thead>
													<tr>
<th rowspan="3" style="border:1px solid #0b462d;" align="center"><b>Sr. No.</b></th>
<th rowspan="3" style="border:1px solid #0b462d;" align="center"><b>Date of Registration</b></th>
<th rowspan="3" style="border:1px solid #0b462d;" align="center">Application No.</th>
<th colspan="15" style="border:1px solid #0b462d;" align="center"><b>Applicant Details</b></th>
<th rowspan="3" style="border:1px solid #0b462d;" align="center"> Last School Attended</th>
<th colspan="10" style="border:1px solid #0b462d;"><b>Father Details</b></th>                                                    
<th colspan="10" style="border:1px solid #0b462d;"><b>Mother Details</b></th>                                                    
<th colspan="11" style="border:1px solid #0b462d;"><b>Guardian Details</b></th>
<th colspan="6" style="border:1px solid #0b462d;"><b>DPS Rohini Sibling Details</b></th>                                                    
<th colspan="3" style="border:1px solid #0b462d;"><b>Father DPS Alumni</b></th>
<th colspan="3" style="border:1px solid #0b462d;"><b>Mother DPS Alumni</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Single Parent</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Category</b></th>
<th colspan="3" style="border:1px solid #0b462d;"><b>Contact Person</b></th>
<th colspan="13" style="border:1px solid #0b462d;"><b>Attached Files</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Residence Proof Type</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Place</b></th>
</tr>													          

<tr>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Class Applied For  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> First Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Middle Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Last Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Place of Birth  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Date of Birth  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Gender  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mother Tongue </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Blood Group  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Nationality</th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Current Residential Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Residential Landline Number  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Permanent Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Permanent Landline Number  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Fathers Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Occupation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Designation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Organization Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile No.  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email Id  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Landline No  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mothers Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Occupation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Designation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Organization Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile No.  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email Id  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Landline No  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Guardian Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Occupation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Designation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Organization Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Residence Landline No.  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile No.  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Landline No  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email Id  </th>

<th colspan="3" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Sibling 1  </th>
<th colspan="3" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Sibling 2  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> DPS Branch  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Passout Year  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Last Class  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> DPS Branch  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Passout Year  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Last Class  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Birth Certificate  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Applicant  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Father  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Mother  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Guardian  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> ST/SC/OBC Certificate  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Any Other Category Certificate  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Parents DPS Staff</th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Parents DPS Alumni</th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mark Sheet of Term-I Exam Class VIII  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mark Sheet of Final Term Exam Class VII  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Applicant Aadhar Card</th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Residence Proof  </th>

</tr>
<tr>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Name  </th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Class  </th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Admission Number </th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Name  </th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Class  </th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Admission Number </th>

</tr>
												</thead>
												<tbody>
												
												<?php
$sqlReport="SELECT `srno`, `RegistrationNo`, `sclass`, `sname`, `middlename`, `slastname`, `PlaceOfBirth`, `dob`, `Age`, `Sex`, `MotherTongue`, `bloodgroup`, `Nationality`, `LastSchool`, `ResidentialAddress`, `ResidencePhoneNo`, `PermanentAddress`, `PermanentPhoneNo`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherOccupation`, `fatherbusiness`, `fatherpolitical`, `fatherministry`, `fatherprofssional`, `fatherservices`, `fatherothers`, `FatherDesignation`, `FatherCompanyName`, `FatherMobileNo`, `FatherEmailId`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `MotherName`, `MotherAge`, `MotherEducation`, `MotherOccupatoin`, `motherbusiness`, `motherpolitical`, `motherministry`, `motherprofssional`, `motherservices`, `motherothers`, `MotherDesignation`, `MotherCompanyName`, `MotherMobile`, `MotherEmail`, `MotherOfficeAddress`, `MotherOfficePhone`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `guardianbusiness`, `guardianpolitical`, `guardianministry`, `guardianprofssional`, `guardianservices`, `guardianothers`, `GuradianDesignation`, `GuradianCompanyName`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `GuardianEmailId`, `GuardiansAddress`, `GuradianOfficialAddress`, `Sibling`, `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `DPSRohiniStaff`, `OtherDPSStaff`, `Single_Parent`, `RealBroSisName`, `RealBroSisClass`, `RealBroSisAdmissionNo`, `RealBroSisName2`, `RealBroSisClass2`, `RealBroSisAdmissionNo2`, `Single_Parent_Reason`, `Other_single_parent`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `Category`, `OtherCatagoryDetail`, `EmergencyContactPersonName`, `EmergencyContactNo`, `EmergencyEmail`, `BirthCertificate`, `ProfilePhoto`, `FatherPhoto`, `MotherPhoto`, `GuardianPhoto`, `CatagoryCertificate`, `OtherCatagoryCertificate`, `ParentDPSStaff`, `ParentDPSAlumni`, `class8_trm1`, `class7_finlexm`, `AadharNumber`, `ResidenceProof`, `ResidenceProofType`, `RegistrationPlace`, `RegistrationDate`, `TxnStatus` FROM `NewStudentRegistration_temp_9th` WHERE `TxnStatus`='SUCCESS' order by srno DESC";
 
 
 $sqlQuery=  mysql_query($sqlReport);
  $i=1;
  
 
  
  while($reportData=  mysql_fetch_array($sqlQuery)){
   $old_date = Date_create($reportData['DOB']);
$new_date = Date_format($old_date, "d/m/Y");
?>
												
													<tr>
<td style="border:1px solid #0b462d;"><?php echo $i; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RegistrationDate']; ?></td>
<td style="border:1px solid #0b462d;"><a href="student_registration_9th_preview.php?ApplicationNo=<?php echo $reportData['RegistrationNo']; ?>" target="_blank"><?php echo $reportData['RegistrationNo']; ?></a></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sclass']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sname']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['middlename']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['slastname']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['PlaceOfBirth']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['dob']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['Age']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['Sex']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherTongue']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['bloodgroup']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['Nationality']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['ResidentialAddress']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['ResidencePhoneNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['PermanentAddress']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['PermanentPhoneNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['LastSchool']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sfathername']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sfatherage']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherEducation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherOccupation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherDesignation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherCompanyName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherMobileNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherEmailId']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherOfficeAddress']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['FatherOfficePhoneNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherAge']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherEducation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherOccupatoin']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherDesignation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherCompanyName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherMobile']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherEmail']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherOfficeAddress']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['MotherOfficePhone']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianAge']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradinaEducation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianOccupation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianDesignation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianCompanyName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianOfficialPhNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianMobileNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuardianEmailId']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuardiansAddress']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['GuradianOfficialAddress']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RealBroSisName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RealBroSisClass']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RealBroSisAdmissionNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RealBroSisName2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RealBroSisClass2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RealBroSisAdmissionNo2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['AlumniSchoolName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['AlumniPassingYear']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['AlumniFatherPassingClass']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['AlumniMotherSchoolName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['AlumniMotherPassingYear']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['AlumniMotherPassingClass']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['Single_Parent_Reason']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['Category']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['EmergencyContactPersonName']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['EmergencyContactNo']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['EmergencyEmail']; ?></td>

<td style="border:1px solid #0b462d;"> <a href="../../Admission/Documents/<?php echo $reportData['BirthCertificate'];?>" target="_blank"><?php echo $reportData['BirthCertificate']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['ProfilePhoto'];?>" target="_blank"><?php echo $reportData['ProfilePhoto']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['FatherPhoto'];?>" target="_blank"><?php echo $reportData['FatherPhoto']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['MotherPhoto'];?>" target="_blank"><?php echo $reportData['MotherPhoto']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['GuardianPhoto'];?>" target="_blank"><?php echo $reportData['GuardianPhoto']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['CatagoryCertificate'];?>" target="_blank"><?php echo $reportData['CatagoryCertificate']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['OtherCatagoryCertificate'];?>" target="_blank"><?php echo $reportData['OtherCatagoryCertificate']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['ParentDPSStaff'];?>" target="_blank"><?php echo $reportData['ParentDPSStaff']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['ParentDPSAlumni'];?>" target="_blank"><?php echo $reportData['ParentDPSAlumni']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['class8_trm1'];?>" target="_blank"><?php echo $reportData['class8_trm1']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['class7_finlexm'];?>" target="_blank"><?php echo $reportData['class7_finlexm']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['AadharNumber'];?>" target="_blank"><?php echo $reportData['AadharNumber']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/Documents/<?php echo $reportData['ResidenceProof'];?>" target="_blank"><?php echo $reportData['ResidenceProof']; ?>

<td style="border:1px solid #0b462d;"><?php echo $reportData['ResidenceProofType']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['RegistrationPlace']; ?></td>

</tr>
													<?php $i++;  } ?>
											  </tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>
				<!-- /Row -->


 </div>

 <div align ="center"><input type="button" name ="btnExcel" value ="Export To Excel" onclick ="javascript:fnlExcel();"></div>

 <div class="footer" align="center">
    <div class="footer_contents" align="center">
  <font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
 </div>
</body>
</html>
<div align ="center">
<form name ="frmExcel" id="frmExcel" method ="post" action ="ExportToExcel.php">
<input type ="hidden" name ="htmlCode" id="htmlCode" value ="">
</form>
</div>
<script language ="javascript">
function fnlExcel()
{
	document.getElementById("htmlCode").value=document.getElementById("MasterDiv").innerHTML;
	document.getElementById("frmExcel").submit();
}
</script>