<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Library Management</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>
<style>
.librarysetup .librarysetup_table3 table td .btn{padding:2% 10% !important; width:50px;}
</style>

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
   <li><a href="Report_Book.php"><button class="btnmanu">Books In Circulation </button></a></li>
   <li><a href="Overdue_Book.php"><button class="btnmanu">Overdue Books </button></a></li>
   <li class="active"><a href="Issue_Return_History.php"><button class="btnmanu">Issue / Return History  </button></a></li>
   <li><a href="Book_Master.php"><button class="btnmanu">Book Master  </button></a></li>
   <li><a href="Book_Master_Jiva.php"><button class="btnmanu">Book Master Jiva  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  	<div class="librarysetup">
    	<div class="librarysetup_head">Library Issue / Returen Status</div>
        <div class="librarysetup_input2">
        	<form action="" method="post">
	        	<div class="row">
                	<div class="col-xs-3">Admission No.:</div>
                    <div class="col-xs-3"><input type="text" name="admissionNo" id="admissionNo" class="text-box" value=""></div>
                	<div class="col-xs-3">Name:</div>
                    <div class="col-xs-3"><input type="date" name="name" id="name" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3">Accession No.:</div>
                    <div class="col-xs-3"><input type="text" name="accessionNo" id="accessionNo" class="text-box" value=""></div>
                	<div class="col-xs-3">Issue Date:</div>
                    <div class="col-xs-3"><input type="date" name="issueDate" id="issueDate" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3">Class:</div>
                    <div class="col-xs-3"><select name="class" id="class" class="text-box">
                    					   	 <option value="">Select One</option>
                                          </select>
                    </div>
                	<div class="col-xs-3">Status:</div>
                    <div class="col-xs-3"><select name="status" id="status" class="text-box">
                    					   	 <option value="">Select One</option>
                                          </select>
                    </div>
                </div>
                <div class="row">    
                    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
                </div>
            </form>                
        </div>
        <div class="librarysetup_table3">
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
													<tr class="col">
														<th>Sr._No.</th>
                                                        <th>Adm_No.</th>
                                                        <th>Student_Name</th>
                                                        <th>Class</th>
                                                        <th>Roll_No.</th>
                                                        <th>Book_No.</th>
                                                        <th>Book_Name</th>
                                                        <th>Author</th>
                                                        <th>Subject</th>
                                                        <th>Till_Date</th>
                                                        <th>Return_Date</th>
                                                        <th>Fine</th>
                                                        <th>Fine_Discount</th>
                                                        <th>Status</th>
                                                        <th>Issue_Date</th>
                                                        <th>Issue_Type</th>
                                                        <th>Langugage</th>
													</tr>
												</thead>
												<tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td> ASDF</td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td><a href="#">Issued</a></td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
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
<?php include '../footer.php'; ?>

 
 
 
 




