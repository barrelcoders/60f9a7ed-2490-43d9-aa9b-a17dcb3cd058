<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
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
 <div><?php include 'header.php'; ?> </div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
    <li><a href="Emplpaysetam_Department_Master.php"><button class="btnmanu">Department Master</button></a></li>
    <li><a href="Emplpaysetam_adddepartment.php"><button class="btnmanu">Add Department</button></a></li>
    <li><a href="Emplpaysetam_adddesignation.php"><button class="btnmanu">Add Designation</button></a></li>
    <li><a href="Emplpaysetam_addpayband.php"><button class="btnmanu">Add Payband</button></a></li>
    <li><a href="Emplpaysetam_addsection.php"><button class="btnmanu">Add Section Field</button></a></li>
    <li><a href="Emplpaysetam_addinvestment.php"><button class="btnmanu">Add Investment Type</button></a></li>
    <li><a href="Emplpaysetam_addleave.php"><button class="btnmanu">Add Leave Types</button></a></li>
   </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="emplmaster">
   <div class="emplmastertop">Department Master</div>
  </div>
 <div>
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
                                                      <th>Department</th>
                                                      <th>Designation</th>
                                                      <th>Pay Band</th>
                                                      <th>Salary From</th>
                                                      <th>Salary To</th>
                                                      <th>Grade Pay</th>
                                                      <th>Add. Grade Pay</th>
                                                      <th>Edit Details</th>
													</tr>
												</thead>
												<tbody>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td> 
                                                     </tr>
                                                     <tr>
                                                      <td>1.</td> 
                                                      <td>XYZ</td> 
                                                      <td>0</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
                                                      <td>1</td>
                                                      <td>2.</td> 
                                                      <td>XYZ</td> 
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
  </table>
 </div>
</div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
