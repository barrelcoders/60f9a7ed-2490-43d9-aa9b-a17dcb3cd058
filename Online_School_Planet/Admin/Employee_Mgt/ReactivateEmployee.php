<?php session_start();
include '../connection.php';
include '../AppConf.php';
?>
<?php
$sql = "SELECT `EmpId` , `Name` , `Department` ,`Designation`, `DOJ`,`UserId`,`MobileNo`,`email` FROM `employee_master` where 1=1"  ;
$result = $conn->query($sql);

?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
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
   <li><a href="DeactivateEmployee.php"><button class="btnmanu">De-Activate An Employee </button></a></li>
   <li class="active"><a href="ReactivateEmployee.php"><button class="btnmanu">Re-Activate An Employee  </button></a></li>
   <li><a href="IssueExperienceCertificate.php"><button class="btnmanu">Issue Experience Certificate  </button></a></li>
   <li><a href="#Employeemgt4_Employeeexit4.php"><button class="btnmanu">Employee Full and Final  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
 <form action="#" method="post">
 <div class="employee_mgt">
  <div class="empmgt_top">Re-Activate An Employee </div>
  <div class="emp_search1">
   <div class="row">
    <div class="col-xs-3">Department</div>
    <div class="col-xs-3"><select name="department" id="department" class="text-box tbs">
    						
    					  	<option value="">Select One</option>
    <?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
        					<option value="<?php echo $row['Department']?> "><?php echo $row['Department']?></option>
                            <?php } } ?>
                          </select>
    </div>
    <div class="col-xs-3">Employee ID No.</div>
    <div class="col-xs-3"><input type="text" name="empid" id="empid" class="text-box"> </div>
   </div>
   <div class="col-xs-12" align="center" style="margin:1% auto"><input type="submit" name="submit" id="submit" class="btn" ></div>
  </div>
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
														<th>Date Of Joining</th>
														<th>UserId</th>
														<th>Mobile No</th>
                                                        <th>Email</th>
														<th>Move To Alumni</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>EmpId</th>
														<th>Name</th>
                                                        <th>Department</th>
                                                        <th>Designation</th>
														<th>Date Of Joining</th>
														<th>UserId</th>
														<th>Mobile No</th>
                                                        <th>Email</th>
														<th>Move To Alumni</th>
													</tr>
												</tfoot>
												<tbody>
                                                <?php
$sql = "SELECT `EmpId` , `Name` , `Department` ,`Designation`, `DOJ`,`UserId`,`MobileNo`,`email` FROM `employee_master` where 1=1"  ;
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
   <td><?php echo $row['DOJ']?></td>
   <td><?php echo $row['UserId']?></td>
   <td><?php echo $row['MobileNo']?></td>
   <td><?php echo $row['email']?></td>
   <td><a href="#" class="btn1">Move</a></td>
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
