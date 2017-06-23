<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Registration</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
</head>
<style>
 .table{padding:0 15%; }
 .table table{width:100%;}
 .table table .col td{background:#0b462d; color:#fff; font-size:16px;}
 .table table td{padding:0.5% 1%; font-size:14px; border:1px solid #ccc;}
</style>
<body>
<div id="container">
 <div class="table">
  <table>
   <tr class="col"> <td>Class</td><td>Total No of New Registration</td><td>Status</td> </tr>
   <?php
   $sqlReport=mysql_query("SELECT COUNT( srno ) AS number, `sclass` FROM NewStudentRegistration_temp GROUP BY sclass ORDER BY sclass DESC");
   while($reportData=  mysql_fetch_array($sqlReport)){
   ?>
   <tr><td><?php echo $reportData['sclass']; ?></td><td><?php echo $reportData['number']; ?></td><td><a href="classwiseregistrationreport.php?class=<?php echo $reportData['sclass']; ?>">View</td> </tr>
   <?php
   }
   $sqlReportother=mysql_query("SELECT COUNT( srno ) AS number, `sclass` FROM student_registration_others GROUP BY sclass ORDER BY sclass ASC");
  while($reportDataother= mysql_fetch_array($sqlReportother)) {
  ?>
  <tr><td><?php echo $reportDataother['sclass']; ?></td><td><?php echo $reportDataother['number']; ?></td><td><a href="report_other_registration.php?class=<?php echo $reportDataother['sclass']; ?>">View</td> </tr>
  <?php
  }
   $sqlReport9=mysql_query("SELECT COUNT( srno ) AS number, `sclass` FROM NewStudentRegistration_temp_9th GROUP BY sclass");
  while($reportData9= mysql_fetch_array($sqlReport9)) {
  ?>
  <tr><td><?php echo $reportData9['sclass']; ?></td><td><?php echo $reportData9['number']; ?></td><td><a href="ClassIX_complete_Registration_Report.php">View</td> </tr>
  <?php }
  $sqlReport11=mysql_query("SELECT COUNT( srno ) AS number, `sclass` FROM Registration_XI GROUP BY sclass");
  while($reportData11= mysql_fetch_array($sqlReport11)) {
  ?>
  <tr><td><?php echo $reportData11['sclass']; ?></td><td><?php echo $reportData11['number']; ?></td><td><a href="complete_registration_reportXI.php?class=<?php echo $reportData11['sclass']; ?>">View</td> </tr>
  <?php } ?>
  </table>
 </div>
</div>
</body>
</html>