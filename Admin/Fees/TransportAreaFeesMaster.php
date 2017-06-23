<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php


    if($_REQUEST["submit"] !="")
    {
      $transportArea=$_POST["transportArea"];
      $transportHeadID=$_POST["transportHeadID"];
      $rsFeeHead=mysql_query("INSERT INTO `tbl_transport_area`(`transportArea`, `transportHeadID`,`status`) VALUES ('$transportArea','$transportHeadID',1)");
      echo "<br><br><center><b> Transport Area has been defined successfully!<b>";
    }
     $ssql="SELECT * FROM `tbl_transport_area` order by `srno` DESC";
     $rs= mysql_query($ssql);$num_rows=0;
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
    <div class="admission_head">Transport Fees Area Master <div style="float: right"><a href="AddAreaFeesMaster.php">Add New Transport Area</a></div></div>
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
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Transport Area</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Transport Fees Head</th>
                                                     <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Amount</th>
                                                    
                                                    
                                                     <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Create Date</th>
                                                    
                                                    
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Status</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Action</th>
                                                   
											    </thead>
   												<tbody>

   
 <?php
$i=1;
				while($row = mysql_fetch_assoc($rs))
				{
   
					

			?>
  <tr>
                                                   <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['transportArea']; ?></td>
                                                  
                                                       <td><?php $id=$row['transportHeadID'];
                                                       $dataSql=  mysql_query("SELECT * from tbl_transport_master WHERE srno='".$id."'");
                                                       $dataRecord=  mysql_fetch_assoc($dataSql);
                                                       
                                                       echo $dataRecord['transportHead']; ?></td>
                                                       <td><?php  echo $dataRecord['amount']; ?></td>
                                                   
                                                        <td><?php echo $row['datetime']; ?></td>
                                                  <?php if($row['status']==1){$statusClass="active";}else{ $statusClass="inactive"; } ?>
                                                   <td class="<?php echo $statusClass; ?>"><?php if($row['status']==1){  ?><span class="status"><?php  echo "Active"; }else{ echo "Inactive"; } ?></td>
                                             
                                                   <td><a href="updateTransportArea.php?srno=<?php echo $row['srno']; ?>">Update</a></td>
                                                   
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