<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';
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
.HeaderHead th{text-align:center;}
</style>
<body>
<div id="container">
<!----Header--------->
<!---------containt---------->
<div id="container1">
<form action="#" method="post">
<div class="admissionreport">
 <div class="admission_head">LEVEL - I APPROVAL</div>
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
												<thead class="HeaderHead">
                                                	
    						    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff; width:1%;">Sr.No.</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;" colspan=2>Reg. No.</th>
                                                   <!-- <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Reg. No.</th>-->
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff; width:20%;">Student Name</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Distance (40)</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Sibling (30)</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Father DPS Alumni (10)</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Mother DPS Alumni (10)</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">First Born / Girl Child (5)</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Single Parent (5)</th>
                                                    <th style="border:1px solid #097b4d; background:#0b462d; color:#fff;">Total Point (Out of 100)</th>
											    </thead>
   												<tbody>
<?php
  $sqlReport=mysql_query("SELECT `RegistrationNo`,`sname` , `middlename` , `slastname`,`Sex`, `Distance`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`chkGirlChild_FirstBorn`,`Single_Parent`, `TxnStatus` FROM  `NewStudentRegistration_temp` WHERE `TxnStatus`='SUCCESS' AND `L1ApprovalStatus`='Pending'");
$i=1;
  while($reportData=  mysql_fetch_array($sqlReport)){
 
  
?>
<tr>
<td><?php echo $i; ?></td>
<td width="10%"><input name="chk[]" type="checkbox" value="<?php echo $reportData['RegistrationNo']; ?>"><?php echo $reportData['RegistrationNo']; ?></td> 
<td colspan="2"><?php echo $reportData['sname']." ".$reportData['middlename']." ".$reportData['slastname']; ?></td>
<td><b><?php echo $reportData['Distance']; ?></b></td>
<td><b><?php echo $reportData['Sibling']; ?></b></td> 
<td><b><?php echo $reportData['Father_DPS_Alumni']; ?></b></td> 
<td><b><?php echo $reportData['Mother_DPS_Alumni']; ?></b></td>
<td><b><?php echo $reportData['chkGirlChild_FirstBorn']; ?></b></td>
<td><b><?php echo $reportData['Single_Parent'] ?></b></td>
<td style="background:#B1D8D8"><b><?php echo $total= $reportData['Distance']+$reportData['Sibling']+$reportData['Father_DPS_Alumni']+$reportData['Mother_DPS_Alumni']+$reportData['Single_Parent']+$reportData['chkGirlChild_FirstBorn']?></b></td>
</tr>
<?php $i++;  } ?>
                                                </tbody>
  											</table>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" align="center"> <input name="BtnSubmit" type="submit" value="APPROVE" /></div>
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

<?php
 if(isset($_POST['BtnSubmit'])){
   $chk= $_POST['chk'];

   foreach ($chk as $check=>$value) {
             mysql_query("UPDATE `NewStudentRegistration_temp_9th_old` SET `L1ApprovalStatus`='Approve' where `RegistrationNo`='".$value."'");
        }
}
?>

<?php
$sql=mysql_query("SELECT `EmergencyContactNo`, `EmergencyEmail` FROM `NewStudentRegistration_temp_9th_old` WHERE `L1ApprovalStatus`='Approve' AND `L1Remarks` is NULL");
while($row1=mysql_fetch_array($sql))
{
 $message=urlencode("Congratulations! You have been selected for admission of your ward in our school. Kindly check the school website for verification schedule.");
   $smobile=$row1['EmergencyContactNo'];
  //$SendSMSurl= "http://prioritysms.tulsitainfotech.com/api/mt/SendSMS?user=user10&password=sms@123&senderid=DPSROH&channel=trans&DCS=0&flashsms=0&number=$smobile&text=$message&route=15";
  //echo $SendSMSurl;
  //------------------curl request for send api--------------------------------------
 $cSession = curl_init(); 
//step2
curl_setopt($cSession,CURLOPT_URL,$SendSMSurl);
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
//step3
$result=curl_exec($cSession);
//step4
curl_close($cSession);

$email=$row1['EmergencyEmail'];
$to=$email;
$subject = "VERIFICATION OF DOCUMENTS";

$message = "
<html>
<head>

</head>
<body>
<p><h3>Dear Applicant,</h3></p>
<p>Congratulations! You have been selected for admission in our school.</p>
<p>Kindly bring the following documents in original for verification and a self-attested photocopy for submission to school (*Arrange the documents in the following order):</p>
<p>&nbsp;</p>
<p>1. Birth Certificate issued by Municipal Corporation</p>
<p>2. Photograph of Applicant</p>
<p>3. Photograph of Father</p>
<p>4. Photograph of Mother</p>
<p>5. Photograph of Guardian</p>
<p>6. Proof of Father being DPS Core Alumni</p>
<p>7. Proof of Mother being DPS Core Alumni</p>
<p>8. DG Certificate</p>
<p>9. EWS Certificate</p>
<p>10. ST/SC/OBC Certificate</p>
<p>11. Medical Document/Certificate(if belongs to special need)</p>
<p>12. Proof of parent being other DPS Staff</p>
<p>13. Residence Proof</p>
<table>
<tr>&nbsp;</tr>
<tr>
<th>Regards</th></tr>
<tr>
<th>DPS Rohini</th>
</tr>

</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <communication@dpsrohini.info>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

//$em=mail($to,$subject,$message,$headers);
if($em)
{
mysql_query("UPDATE `NewStudentRegistration_temp_9th_old` set `L1Remarks`='Sent' where `EmergencyEmail`='$email'");
}
}
?>