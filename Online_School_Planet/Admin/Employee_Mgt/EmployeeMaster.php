<?php
session_start();
include '../connection.php';
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/nexus.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include '../header.php'; ?> </div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="active"><a href="EmployeeMaster.php"><button class="btnmanu">Employee Master</button></a></li>
   <li><a href="TeacherClassSubjectMapping.php"><button class="btnmanu">Teacher-Class-Subject Mapping </button></a></li>
   <li><a href="TeacherManagerMapping.php"><button class="btnmanu">Teacher-Manager Mapping </button></a></li>
   <li><a href="ClassTeacherClassMapping.php"><button class="btnmanu">Class-Teacher-Class Mapping </button></a></li>
   <li><a href="DelegationAuthority.php"><button class="btnmanu">Delegation Of Authority </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
 <form action="" method="post">
 <div class="employee_mgt">
  <div class="empmgt_top">Search Employee Details</div>
  <div class="emp_search">
   
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
														<th>EmpId</th>
														<th>Name</th>
														<th>DOB</th>
														<th>Department</th>
														<th>Mobile No.</th>
														<th>Email Id</th>
                                                        <th>User ID</th>
                                                        <th>Password</th>
													</tr>
												</thead>
												<tbody>
												  <?php 
$sql="SELECT `srno`, `EmpId`, `Title`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `InstituteName`, `Specialization`, `DegreeFinalGrade`, `DegreeStartDate`, `DegreeEndDate`, `FatherName`, `Salary`, `Allowances`, `Address`, `City`, `State`, `Phoneno`, `PermanentAddress`, `Permanentcity`, `PermanentState`, `PermanentPhone`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `ConfirmationStatus`, `Grade`, `L1_Approver_Id`, `L2_Approver_Id`, `L3_Approver_Id`, `HR_Approver_Id`, `GlobalManager`, `Department`, `Designation`, `EmploymentType`, `ProbationPeriod`, `NoticePeriod`, `ConfirmationDueDate`, `RelievingDate`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder`, `EmpAccountNo`, `Location`, `PanNo`, `UanNo`, `PFNo`, `IFSCCode`, `LastWorkingDate`, `EmployeeCategory`, `HostelWarden`, `Form16FileName`, `BankName`, `AccountType`, `BankBranch`, `BankBranchAddress`, `PayeeName`, `ProfilePhoto`, `PersonalEmail`, `OrgUnit`, `WorkSite`, `StartDate`, `EndDate` FROM `employee_master` WHERE 1=1";

												  $result = $conn->query($sql);												  
												  if ($result->num_rows > 0) {
												  // output data of each row
												  while($row = $result->fetch_assoc()) {
													$ei=$row['EmpId'];
												  ?>
												 <tr>
                                                   <td><a class="button" href="#detail"><?php echo $row['EmpId'];?></a></td>
                                                   <td><?php echo $row['Name'];?></td>
                                                   <td><?php echo $row['DOB'];?></td>
                                                   <td><?php echo $row['Department'];?></td>
                                                   <td><?php echo $row['MobileNo'];?></td>
                                                   <td><?php echo $row['email'];?></td>
                                                   <td><?php echo $row['UserId'];?></td>
                                                   <td><?php echo $row['Password'];?></td>
                                                  </tr>   
                                                  <?php $ei=$row['EmpId']; ?> 
   
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

</body>
</html>
  <div id="detail" class="overlay">
	<div class="popup">
		<a class="close" href="EmployeeMaster.php">&times;</a>
		<div class="content"> <?php include 'EmployeeMasterDetail.php'; ?> </div>
	</div>
   </div> 