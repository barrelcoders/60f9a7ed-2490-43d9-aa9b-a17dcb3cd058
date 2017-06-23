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
   <li><a href="LeaveOpningBalance.php"><button class="btnmanu">Leave opening Balance </button></a></li>
   <li><a href="LeaveApprovalHistory.php"><button class="btnmanu">Leaves Approval and History </button></a></li>
   <li class="active"><a href="Approved-RejectLeave.php"><button class="btnmanu">Approve / Reject Leaves </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
 <form action="#" method="post">
 <div class="employee_mgt">
  <div class="empmgt_top">Employee Leave History </div>
  <div class="emplmgt_leave e_l">
  <!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view" >
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>EmpId</th>
														<th>Name</th>
                                                        <th>Leave_Type</th>
                                                        <th>Leave_From</th>
														<th>Leave_To</th>
														<th>Days</th>
														<th>Contact_No</th>
                                                        <th>Address</th>
                                                        <th>Submit_Date</th>
                                                        <th>Approver_Id</th>
                                                        <th>Approver_Level</th>
                                                        <th>Remarks</th>
                                                        <th>Approve</th>
                                                        <th>Reject</th>
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
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>  
   <td></td>
   <td></td> 
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
