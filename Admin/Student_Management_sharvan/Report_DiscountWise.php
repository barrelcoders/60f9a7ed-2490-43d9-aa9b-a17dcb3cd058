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
   <li class="active"><a href="Report_DiscountWise.php"><button class="btnmanu">Discount wise Student Report</button></a></li>
   <li><a href="Report_RouteWise.php"><button class="btnmanu">Route wise Student Report</button></a></li>
   <li><a href="Report_MaleFemaleR.php"><button class="btnmanu">Male Female Ratio Report</button></a></li>
   <li><a href="Report_StudentDocument.php"><button class="btnmanu">Student Document Report</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentwithdrawal">
    	<div class="studentwithdrawal_head">Student Discount Summary</div>
        <div class="studentroll">
        	<form action="" method="post">
	        	<div class="row">
    	        	<div class="col-md-9">
			        	<div class="row">
                			<div class="col-xs-6">Discount Type</div>
                			<div class="col-xs-6">	<select name="discountType" id="discountType" class="text-box">
                										<option value="">Select One</option>
                									</select>
			                </div>                        
        	    		</div>
		    	    	<div class="row">
                			<div class="col-xs-6">School Name</div>
		                	<div class="col-xs-6">	<select name="schoolName" id="schoolName" class="text-box">
        		        								<option value="">Select One</option>
                									</select>
			                </div>                        
                    	</div>
        	    	</div>       
            	    <div class="col-md-3">
                	<input type="submit" name="submit" id="submit" class="btn">
                	</div>
	            </div>
            </form>                
        </div>
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
                                                    	<th>Discount Type</th>
														<th>Admission ID</th>
														<th>Student Name</th>
														<th>Father's Name</th>
                                                        <th>Class</th>
														<th>Roll No</th>
                                                        <th>Q1</th>
                                                        <th>Q2</th>
                                                        <th>Q3</th>
                                                        <th>Q4</th>
													</tr>
												</thead>
                                                <tfoot>
                                                	<tr>
                                                    	<th colspan="6">Total</th>
                                                        <th>0</th>
                                                        <th>0</th>
                                                        <th>0</th>
                                                        <th>0</th>
                                                    </tr>
                                                </tfoot>
												<tbody>
                                                <?php
												   $mysql="SELECT * FROM `student_master` WHERE 1=1";
 												   $result = $conn->query($mysql);												  
												   if ($result->num_rows > 0) {
												   // output data of each row
												   while($row = $result->fetch_assoc()) {
													?>
                                                	<tr>
                                                    	<td><?php echo $row['DiscontType']; ?></td>
                                                        <td><?php echo $row['sadmission']; ?></td>
                                                        <td><?php echo $row['sname']; ?></td>
                                                        <td><?php echo $row['sfathername']; ?></td>
                                                        <td><?php echo $row['sclass']; ?></td>
                                                        <td><?php echo $row['srollno']; ?></td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                    </tr>
												  <?php } } ?>
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

 
 
 
 




