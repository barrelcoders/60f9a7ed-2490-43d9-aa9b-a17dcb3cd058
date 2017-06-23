<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>User Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
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
   <li><a href="LoginTracking_admin-office.php"><button class="btnmanu">Admin & Office User Tracking </button></a></li>
   <li class="active"><a href="ParentPortalTracking.php"><button class="btnmanu">Parent Portal </button></a></li>
   <li><a href="MobileAppTracking.php"><button class="btnmanu">Mobile Application </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="logintracking">
   <div class="logintracking_parent">
    <div class="logintracking_head">Parent Portal Login Tracking</div>
    <div class="logintracking_inner">
     <!-- Row -->
				<div class="row">
					<div class="col-sm-12" style="padding:0;">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Sr.No.</th>
														<th>Admission No</th>
                                                        <th>Class</th>
                                                        <th>Roll No</th>
														<th>Name</th>
														<th>IP Address</th>
                                                        <th>Login Date</th>
                                                        <th>Login Time</th>
                                                        <th>System Date Time</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>101</td>
														<td>DPS101</td>
                                                        <td>Nursery</td>
                                                        <td>01</td>
                                                        <td>ASDFGHJK</td>
                                                        <td>101.101.101.101</td>
                                                        <td>2016-02-02</td>
                                                        <td>05:12:12</td>
                                                        <td>2016-02-02 05:12:12</td>
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
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
