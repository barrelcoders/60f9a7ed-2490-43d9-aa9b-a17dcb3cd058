<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["submit"] !="")
{
   $feesHead=$_POST["feesHead"];
//  $FYYear=$_POST["cboFinancialYear"];
 
 $rsFeeHead=mysql_query("INSERT INTO `fees_head`(`feesHead`,`status`) VALUES ('$feesHead',1)");
 echo "<br><br><center><b>Fees Type defined successfully!<b>";

 }
 $ssql="SELECT * FROM `fees_head` order by `srno` DESC";
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
    <div class="admission_head">Fees Head Master <div style="float: right"><a href="AddFeesHeadMaster.php">Add New Fees Head</a></div></div>
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
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Fees Head</th>
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
                                                 
                                                   <!--<td><?php echo $row['discountType']; ?></td>-->
                                                   
                                                       <?php $feesHeadId=$row['feeshead'];
                                                       $feesheadSql=  mysql_query("SELECT * FROM fees_head WHERE id='$feesHeadId'");
                                                       $feeshead= mysql_fetch_assoc($feesHeadSql);  
                                                       ?>
                                                       <td><?php echo $feesHead['feeshead']; ?></td>
                                                 
                                                       
                                                        <td><?php echo $row['datetime']; ?></td>
                                                  <?php if($row['status']==1){$statusClass="active";}else{ $statusClass="inactive"; } ?>
                                                   <td class="<?php echo $statusClass; ?>"><?php if($row['status']==1){  ?><span class="status"><?php  echo "Active"; }else{ echo "Inactive"; } ?></td>
                                             
                                                   <td><a href="updateFeesHeadMaster.php?srno=<?php echo $row['srno']; ?>">Update</a></td>
                                                   
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