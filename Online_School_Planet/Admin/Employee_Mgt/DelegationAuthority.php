<?php session_start();
include '../connection.php';
include '../AppConf.php';
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>
<style>
</style>

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
   <li><a href="EmployeeMaster.php"><button class="btnmanu">Employee Master</button></a></li>
   <li><a href="TeacherClassSubjectMapping.php"><button class="btnmanu">Teacher-Class-Subject Mapping </button></a></li>
   <li><a href="TeacherManagerMapping.php"><button class="btnmanu">Teacher-Manager Mapping </button></a></li>
   <li><a href="ClassTeacherClassMapping.php"><button class="btnmanu">Class-Teacher-Class Mapping </button></a></li>
   <li class="active"><a href="DelegationAuthority.php"><button class="btnmanu">Delegation Of Authority </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
 <form action="#" method="post">
 <div class="employee_mgt">
  <div class="empmgt_top">Delegation Of Authority </div>
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
														<th>Department</th>
                                                        <th>Designation</th>
                                                        <th>Level 1 Approver</th>
														<th>Level 2 Approver</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>EmpId</th>
														<th>Name</th>
														<th>Department</th>
                                                        <th>Designation</th>
                                                        <th>Level 1 Approver</th>
														<th>Level 2 Approver</th>
														<th>Edit</th>
													</tr>
												</tfoot>
												<tbody>
													 <?php
$sql = "SELECT `EmpId` , `Name` , `Department` ,`Designation`, `L1_Approver_Id`, `L2_Approver_Id`  FROM `employee_master` where 1=1"  ;
$result = $conn->query($sql);

?>
													<?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
        <tr> 
   <td><?php echo $row['EmpId']?></td>
   <td><?php echo $row['Name']?></td>
   <td><?php echo $row['Department']?></td>
   <td><?php echo $row['Designation']?></td>
   <td><?php echo $row['L1_Approver_Id']?></td>
   <td><?php echo $row['L2_Approver_Id']?></td>
   <td><a href="#" class="btn1">Edit</a></td>
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
</body>
</html>
