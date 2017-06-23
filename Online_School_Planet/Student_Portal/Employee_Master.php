<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Master</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <link rel="stylesheet" href="css/nexus.css" />
   <link rel="stylesheet" href="css/jquery.dataTables.min.css" />
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/jquery.dataTables.min.js"></script>
   <script src="js/dataTables-data.js"></script>
</head>
<style>
.panel .panel-wrapper .panel-body table tbody tr td a.button{text-decoration:none; background:transparent; border:none; color:#000;}
</style>
<body>
<div id="container">
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
												 <tr>
                                                   <td><a class="button" href="#popup1">W-1123</a></td>
                                                   <td>ASDFG HKKLL</td>
                                                   <td>21-10-1990</td>
                                                   <td>IT</td>
                                                   <td>9999999999</td>
                                                   <td>sg@ghghj.com</td>
                                                   <td>W-1123</td>
                                                   <td>123456</td>
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
<!------Show Detail------------->
  <div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<div class="content"> <?php include 'EmployeeMasterDetail.php'; ?> </div>
	</div>
   </div>
</body>
</html>