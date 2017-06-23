<?php session_start();?>
<?php 
 $_SESSION["sad"]="sadmission";
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Student Management</title>
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/nexus.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>
<style>
.popup{width:98%; margin:10px auto; height:655px;}
.popup .close{top:27px; right:35px;}
.popup .content{overflow:hidden;}
</style>
<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="active"><a href="ExistingStudent_StudentMaster.php"><button class="btnmanu">Student Master</button></a></li>
   <li><a href="Allot_Transpoart.php"><button class="btnmanu">Allot Transport</button></a></li>
   <li><a href="Student_Strength.php"><button class="btnmanu">Student Strength</button></a></li>
   <li><a href="Student_Promotion.php"><button class="btnmanu">Student Promotion</button></a></li>
   <li><a href="Student_DossierL1.php"><button class="btnmanu">Student Dossier Approval Level </button></a></li>
   <li><a href="Student_ICard.php"><button class="btnmanu">Student I-card data</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <form action="#" method="post">
 <div class="student_mgt">
  <div class="student_top">Search Student Details</div>
  <div class="stu_search">
   
  </div>
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
														<th>Admission No.</th>
                                                        <th>Class</th>
														<th>Name</th>
														<th>DOB</th>
														<th>Father Name</th>
														<th>Mobile No.</th>
														<th>Email Id</th>
                                                        <th>User ID</th>
                                                        <th>Password</th>
													</tr>
												</thead>
												<tbody>
												  <?php 
$sql="SELECT `srno`, `sname`, `DOB`, `Sex`, `Category`, `Nationality`, `sadmission`, `sclass`, `previous_sclass`, `MasterClass`, `srollno`, `LastSchool`, `sfathername`, `FatherEducation`, `FatherOccupation`, `MotherName`, `MotherEducation`, `Address`, `smobile`, `AlternateMobile`, `simei`, `suser`, `spassword`, `email`, `routeno`, `ProfilePhoto`, `GCMAccountId`, `status`, `FeeSubmissionType`, `DiscontType`, `DocumentFileName`, `FinancialYear`, `DateOfAdmission`, `PlaceOfBirth`, `Hostel`, `SchoolId`, `routecode`, `HostelFY`, `Computer`, `Remarks`, `LastUpdateDate`, `discountamount`, `RouteForFees`, `previous_MasterClass`, `previous_admission`, `AdmissionClass`, `Caste`, `FatherDesignation`, `FatherAnnualIncome`, `FatherCompanyName`, `FatherOfficeAddress`, `FatherMobileNo`, `FatherEmailId`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`, `MotherCompanyName`, `MotherMobile`, `MotherEmail`, `Religion`, `BloodGroup`, `Sibling`, `Single_Parent`, `Special_Needs`, `Staff`, `OtherCategory`, `GuradianName`, `GuradianOccupation`, `GuradianDesignation`, `GuradianAnnualIncome`, `GuradianCompanyName`, `GuradianMobileNo`, `RealBroSisName`, `RealBroSisAdmissionNo`, `RealBroSisClass`, `BirthCertificate`, `ScoreCard`, `FatherPhoto`, `MotherPhoto`, `AddressProofPhoto`, `MedicalCertificatePhoto`, `RegistrationNo`, `RegistrationDate`, `Age`, `sfatherage`, `FatherQualificationDuration`, `FatherOfficePhoneNo`, `MotherAge`, `MotherQualificationDuration`, `MotherOfficeAddress`, `MotherOfficePhone`, `GuradianAge`, `GuradinaEducation`, `GuradianOfficialAddress`, `GuradianOfficialPhNo`, `GuradianEmailId`, `EmergencyContactDetail1`, `EmergencyContactDetail2`, `EWSCategory`, `MotherTongue`, `F_OrganisationworkNature`, `M_OrganisationworkNature`, `EmergencyContactPerson`, `EmergencyTel`, `BusRouteNo_PickingPlace`, `SiblingInformation`, `house`, `BirthPlace`, `PreviousSchoolClass`, `SpecialChild`, `SpecialChildReason`, `AdditionalSubject`, `DateTime` FROM `student_master` WHERE 1=1";

												  $result = $conn->query($sql);												  
												  if ($result->num_rows > 0) {
												  // output data of each row
												  while($row = $result->fetch_assoc()) {
													
												  ?>
												 <tr>
                                                   <td><a class="button" href="#popup1"><?php echo $row['sadmission'];?></a></td>
                                                   <td><?php echo $row['sclass']; ?></td>
                                                   <td><?php echo $row['sname'];?></td>
                                                   <td><?php echo $row['DOB'];?></td>
                                                   <td><?php echo $row['sfathername'];?></td>
                                                   <td><?php echo $row['smobile'];?></td>
                                                   <td><?php echo $row['email'];?></td>
                                                   <td><?php echo $row['suser'];?></td>
                                                   <td><?php echo $row['spassword'];?></td>
                                                  </tr>    
                                                                              
                                                  <?php
                                                      } }
                                                  ?>	
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
 </form>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
<!---------------Show Details------------------>
<div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="ExistingStudent_StudentMaster.php">&times;</a>
		<div class="content"> <?php include 'StudentMasterDetail1.php'; ?> </div>
	</div>
   </div>
</body>
</html>
 
 
 
 
 
 




