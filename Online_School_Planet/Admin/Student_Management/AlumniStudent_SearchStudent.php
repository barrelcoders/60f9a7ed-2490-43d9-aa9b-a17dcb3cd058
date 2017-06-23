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
   <li class="active"><a href="AlumniStudent_SearchStudent.php"><button class="btnmanu">Alumni Students</button></a></li>
   <!--<li><a href="CheckUser_Name_Password.php"><button class="btnmanu">Check User Name Password</button></a></li>
   <li><a href="SerchStudent_UserMaster.php"><button class="btnmanu">Search Student in User Master</button></a></li>--> 
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
 	<div class="studentwithdrawal">
    	<div class="studentwithdrawal_head">Alumni Student</div>
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
														<th>Admission No</th>
														<th>Student Name</th>
														<th>DOB</th>
														<th>Class</th>
														<th>Roll No</th>
                                                        <th>Father Name</th>
														<th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Route</th>
													</tr>
												</thead>
												<tbody>
                                                <?php
												   $mysql="SELECT * FROM `student_master` WHERE 1=1";
 												   $result = $conn->query($mysql);												  
												   if ($result->num_rows > 0) {
												   // output data of each row
												   while($row = $result->fetch_assoc()) {
													?>
                                                	<tr>
                                                        <td><?php echo $row['sadmission']; ?></td>
                                                        <td><?php echo $row['sname']; ?></td>
                                                        <td><?php echo $row['DOB']; ?></td>
                                                        <td><?php echo $row['sclass']; ?></td>
                                                        <td><?php echo $row['srollno']; ?></td>
                                                        <td><?php echo $row['sfathername']; ?></td>
                                                        <td><?php echo $row['smobile']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['routeno']; ?></td>
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
 
 
 
 
 
 




