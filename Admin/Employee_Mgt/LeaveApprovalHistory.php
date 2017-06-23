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
   <li class="active"><a href="LeaveApprovalHistory.php"><button class="btnmanu">Leaves Approval and History </button></a></li>
   <li><a href="Approved-RejectLeave.php"><button class="btnmanu">Approve / Reject Leaves </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
 <form action="#" method="post">
 <div class="employee_mgt">
  <div class="empmgt_top">Employee Leave History </div>
  <div class="emp_search2">
   <div class="row"> 
    <div class="col-xs-3"><b>Employee Id</b></div>
    <div class="col-xs-3"><input type="text" name="employeeid" id="employeeid" class="text-box" ></div>
    <div class="col-xs-3"><b>Employee Name</b></div>
    <div class="col-xs-3"><select name="employeename" id="employeename" class="text-box tbs">
    					  	<option value="">Select One</option>
                            
                          </select>
    </div>
   </div>
   <div class="row">
    <div class="col-xs-3"><b>Date From</b></div>
    <div class="col-xs-3"><input type="date" name="fromdate" id="fromdate" class="text-box" ></div>
    <div class="col-xs-3"><b>To From</b></div>
    <div class="col-xs-3"><input type="date" name="todate" id="todate" class="text-box" ></div>
    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn" ></div>
   </div>
  </div>
  <div class="emplmgt_leave e_l" id="comment" >
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
														<th>Date_of_Apply</th>
														<th>Level_1_ApprovalId</th>
                                                        <th>Level_1_Status</th>
														<th>Level_2_ApprovalId</th>
                                                        <th>Level_2_Status</th>
                                                        <th>Remarks</th>
                                                        <th>Medical_Certificate</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
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
   <td><a href="#" >Edit</a></td>
   <td><a href="#" >Delete</a></td>  
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
<!--  
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("datable_1").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>-->
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
