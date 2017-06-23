<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Student Management</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
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
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="Report_DiscountWise.php"><button class="btnmanu">Discount wise Student Report</button></a></li>
   <li><a href="Report_RouteWise.php"><button class="btnmanu">Route wise Student Report</button></a></li>
   <li class="active"><a href="Report_MaleFemaleR.php"><button class="btnmanu">Male Female Ratio Report</button></a></li>
   <li><a href="Report_StudentDocument.php"><button class="btnmanu">Student Document Report</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentwithdrawal">
    	<div class="studentwithdrawal_head">Student Discount Summary</div>
        <div class="studentwithdrawal_table">
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
                                                    	<th>Sr.No.</th>
														<th>School</th>
                                                        <th>Class</th>
														<th>Male Count</th>
														<th>Female Count</th>
														<th>Total Count</th>
													</tr>
												</thead>
                                                <tfoot>
                                                	<tr>
                                                    	<th colspan="3">Total</th>
                                                        <th>1</th>
                                                        <th>0</th>
                                                        <th>1</th>
                                                    </tr>
                                                </tfoot>
												<tbody>
                                                	<tr>
                                                    	<td>1</td>
                                                        <td>DPS</td>
                                                        <td>I</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>1</td>
                                                    </tr>
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
    </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
 

 
 
 
 




