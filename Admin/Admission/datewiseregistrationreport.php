<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   
   <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
   <script src="../../bootstrap/bootstrap.min.js"></script>
   <script src="../../js/jquery.min.js"></script>
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" /> 
   <script src="../js/dataTables-data.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
</head>
<style>
#container1{font-family:Arial !important; padding:1% 1%;}
.admissionreport .admission_head{border-bottom:1px solid #0b462d; padding:0.5% 0%; font-size:16px; font-weight:600;}
</style>
<body>
<div id="container">
<!----Header--------->
 <div><?php include '../Header/Header3.php'; ?></div>
<!---------containt---------->
<div id="container1">
<form action="#" method="post">
<div class="admissionreport">
 <div class="admission_head">Classwise Registration Summary</div>
 <div class="admission_table">
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
    												<th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Sr.No.</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Reg. No.</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Student Name</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Class</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Neighbourhood</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Sibling</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Total</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Status</th>
											    </thead>
   												<tbody>
<?php
   
   $Date=$_REQUEST['Date'];
   $sqlReport="SELECT `RegistrationNo`,`sname` ,  `middlename` ,  `slastname`,`ChequeDate`,`ChequeNo`,`sclass`,`Distance`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`chkGirlChild_FirstBorn`,`TxnStatus` FROM  `NewStudentRegistration_temp` WHERE RegistrationDate =  '".$Date."' order by srno DESC";
  // echo $sqlReport;die;
   $sqlQuery=  mysql_query($sqlReport);
   $i=1;
   while($reportData=  mysql_fetch_array($sqlQuery)){
   ?>
   
  
  <tr>
                                                   <td><?php echo $i; ?></td> 
                                                   <td><a href="nursery_preview.php?ApplicationNo=<?php echo $reportData['RegistrationNo']; ?>" target="_blank"><?php echo $reportData['RegistrationNo']; ?></a></td>
                                                   <td><?php echo $reportData['sname']." ".$reportData['middlename']." ".$reportData['slastname']; ?></td>
                                                   <td><?php echo $reportData['sclass']; ?></td>
                                                   <td><b><?php echo $reportData['Distance']; ?></b></td>
                                                   <td><b><?php echo $reportData['Sibling']; ?></b></td>
                                                   <td><b><?php echo $total= $reportData['Distance']+$reportData['Sibling']; ?></b></td>
                                                   <td><b><?php echo $reportData['TxnStatus']; ?></b></td>
  				                                  </tr>
   <?php $i++;  } ?>
</tbody>
  											</table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  <!------End Row----->
 </div>
</div>
</form>
</div>
</div>
</body>
</html>

<div><?php include 'footer.php'; ?></div>