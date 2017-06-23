<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
$sqlFeesType=mysql_query("SELECT * FROM  tbl_fees_setup");
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" /> 
   <script src="../js/dataTables-data.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <style>
       .active{ color: green; font-weight: bold; }
        .inactive{ color: red; font-weight: bold; }
       
   </style>
</head>
<style>
#container1{font-family:Arial !important; padding:1% 1%;}
.admissionreport .admission_head{border-bottom:1px solid #0b462d; padding:0.5% 0%; font-size:16px; font-weight:600;}
</style>
<body>
<div id="container">
<!----Header--------->
 <div><?php //include '../Header/Header3.php'; ?></div>
<!---------containt---------->
<div id="container1">
<form action="#" method="post">
<div class="admissionreport">
    <div class="admission_head">Fees Manager <div style="float: right"><a href="AddFeesType.php">Add New Fees Type</a></div></div>
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
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Fees Type</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Fees Charge</th>
                                                    
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Status</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Action</th>
                                                   
											    </thead>
   												<tbody>

   
  <?php 
  $i=1;
  while($feesTypeRecord=  mysql_fetch_assoc($sqlFeesType)){ ?>
  <tr>
                                                   <td><?php echo $i; ?></td>
                                                   <td><?php echo $feesTypeRecord['feesType']; ?></td>
                                                   <td><?php echo $feesTypeRecord['charge']; ?></td>
                                                   
                                                   <?php if($feesTypeRecord['status']==1){$statusClass="active";}else{ $statusClass="inactive"; } ?>
                                                   <td class="<?php echo $statusClass; ?>"><?php if($feesTypeRecord['status']==1){  ?><span class="status"><?php  echo "Active"; }else{ echo "Inactive"; } ?></td>
                                                   <td><a href="updateFeesType.php?srno=<?php echo $feesTypeRecord['id']; ?>">Update</a></td>
                                                   
  </tr><?php  $i++; }  ?>
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