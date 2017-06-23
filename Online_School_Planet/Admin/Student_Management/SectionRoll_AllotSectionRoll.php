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
   <li class="active"><a href="SectionRoll_AllotSectionRoll.php"><button class="btnmanu">Allot Section & Roll No</button></a></li>
   <li><a href="AllotRollno_ExistingStudent.php"><button class="btnmanu">Allot Roll No to existing student</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentwithdrawal">
    	<div class="studentwithdrawal_head">Allot Section & Roll No</div>
        <div class="studentroll">
        	<form action="" method="post">
	        	<div class="row">
    	        	<div class="col-md-9">
			        	<div class="row">
        			    	<div class="col-xs-3"><b>Search By</b></div>
                			<div class="col-xs-3">Financial Year</div>
                			<div class="col-xs-6">	<select name="financialyear" id="financialear" class="text-box">
                										<option value="">Select One</option>
                									</select>
			                </div>                        
        	    		</div>
		    	    	<div class="row">
        			    	<div class="col-xs-3"><b>Search By</b></div>
                			<div class="col-xs-3">Select Class</div>
		                	<div class="col-xs-6">	<select name="class" id="class" class="text-box">
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
        	<form action="" method="post">
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
                                                    	<th>Action</th>
                                                    	<th>School Id</th>
														<th>Admission ID</th>
														<th>Student Name</th>
														<th>Admission Class</th>
                                                        <th>Class</th>
														<th>Roll No</th>
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
                                                    	<td><input type="submit" name="submit" value="Save"></td>
                                                        <td><?php echo $row['SchoolId']; ?></td>
                                                        <td><?php echo $row['sadmission']; ?></td>
                                                        <td><?php echo $row['sname']; ?></td>
                                                        <td><?php echo $row['AdmissionClass']; ?></td>
                                                        <td><?php echo $row['sclass']; ?></td>
                                                        <td>
                                                        	<input type="number" name="rollno" id="rollno" value="<?php echo $row['srollno']; ?>" class="text-box" >
                                                        </td>
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
 			</form>
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

 
 
 
 




