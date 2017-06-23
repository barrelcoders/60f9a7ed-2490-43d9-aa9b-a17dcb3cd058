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
</head>
<style>
#container1{height:558px; font-family:Arial !important; padding:1% 1%; overflow-y:scroll; overflow-x:hidden;}
.admissionreport .admission_head{border-bottom:1px solid #0b462d; padding:0.5% 0%; font-size:16px; font-weight:600;}
.admissionreport .col-xs-3{margin-top:1%;} .admissionreport .row{padding:0 10%;}
.admissionreport .col-xs-3 .text-box{border:1px solid #0b462d; border-radius:3px; height:30px; width:80%; padding:0.5% 1%;}
.admission_table{ border:1px solid #0b462d; border-radius:3px; margin-top:6%;}
.admission_table .admission_tablename{ text-align:center; font-weight:600; width:100%; }
.admission_table table{width:100%;} .admission_table table td:first-child{width:5%; border-left:none;}
.admission_table table .col td{background:#0b462d; color:#fff; padding:0.5% 1%; font-size:15px; border-top:none;}
.admission_table table td{padding:0.2% 1%; font-size:13px; border:1px solid #ccc; }
.admission_table table .col1 td{font-size:15px; font-weight:600;} .admission_table table td:last-child{ border-right:none;}
.ddiframeshim{height:0;}
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
 <table class="table-responsive">
 
  <tr class="col"> <td>Sr.No.</td><td>Reg. No.</td><td>Student Name</td><td>Date of Registration</td><td>Neighbourhood</td><td>Sibling</td><td>Total</td><td>Status</td> </tr>
   <?php
   
   $class=$_REQUEST['class'];
   $sqlReport="SELECT `RegistrationNo`,`sname` ,  `middlename` ,  `slastname`,`ChequeDate`,`ChequeNo`,`RegistrationDate`,`Distance`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`chkGirlChild_FirstBorn`,`Single_Parent`,`TxnStatus` FROM  `NewStudentRegistration_temp` WHERE sclass =  '".$class."' order by srno DESC";
  // echo $sqlReport;die;
   $sqlQuery=  mysql_query($sqlReport);
   $i=1;
   while($reportData=  mysql_fetch_array($sqlQuery)){
   ?>
   
  
  <tr> <td><?php echo $i; ?></td> <td><?php echo $reportData['RegistrationNo']; ?></td><td><?php echo $reportData['sname']." ".$reportData['middlename']." ".$reportData['slastname']; ?></td></td><td><?php echo $reportData['RegistrationDate']; ?></td><td><b><?php echo $reportData['Distance']; ?></b></td>
      <td><b><?php echo $reportData['Sibling']; ?></b></td><td><b><?php echo $total= $reportData['Distance']+$reportData['Sibling']; ?></td><td><?php echo $reportData['TxnStatus']; ?></b></td>
  				   </tr>
   <?php $i++;  } ?>
 </table>
 </table>
</div>
</form>
</div>
</div>
</body>
</html>

<div><?php include 'footer.php'; ?></div>