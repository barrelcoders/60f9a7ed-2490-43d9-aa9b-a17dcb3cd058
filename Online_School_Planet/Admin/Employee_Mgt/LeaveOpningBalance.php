<?php session_start();
include '../connection.php';
include '../AppConf.php';
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
   <li class="active"><a href="LeaveOpningBalance.php"><button class="btnmanu">Leave opening Balance </button></a></li>
   <li><a href="LeaveApprovalHistory.php"><button class="btnmanu">Leaves Approval and History </button></a></li>
   <li><a href="Approved-RejectLeave.php"><button class="btnmanu">Approve / Reject Leaves </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
 <form action="#" method="post">
 <div class="employee_mgt">
  <div class="empmgt_top">Employee Leave Balance </div>
  <div class="emplmgt_leave">
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
                                                        <th>Casual (CL)</th>
                                                        <th>Earned (EL)</th>
														<th>Half Pay (HPL)</th>
														<th>Maternity</th>
														<th>Paternity</th>
                                                        <th>Leave Without pay</th>
														<th>Extra Ord LWP</th>
                                                        <th>Compensatory</th>
													</tr>
												</thead>
												<tbody>
                                                <?php
$sql = "SELECT `EmpId` , `Name` FROM `employee_master` where 1=1"  ;
$result = $conn->query($sql);

?>
													<?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
        <tr> 
   <td><?php echo $row['EmpId']?></td>
   <td><?php echo $row['Name']?></td>
   <td><input type="number" id="casualcl" name="casualcl" class="text-box" value="8"></td>
   <td><input type="number" id="earnedel" name="earnedel" class="text-box" value="30"></td>
   <td><input type="number" id="halfpayhpl" name="halfpayhpl" class="text-box" value="20"></td>
   <td><input type="number" id="maternity" name="maternity" class="text-box" value="180"></td>
   <td><input type="number" id="paternity" name="paternity" class="text-box" value="15"></td>
   <td><input type="number" id="leavewithoutpay" name="leavewithoutpay" class="text-box" value="0"></td>
   <td><input type="number" id="extraordlwp" name="extraordlwp" class="text-box" value="0"></td>
   <td><input type="number" id="compensatory" name="compensatory" class="text-box" value="0"></td>   
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
  <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn" ></div>
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
