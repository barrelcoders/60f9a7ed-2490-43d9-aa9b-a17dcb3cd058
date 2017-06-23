<?php
session_start();
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
$sadmission=$_REQUEST["sadmission"];
$ssql="DELETE FROM `fees_challan` where `sadmission`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
$ssql="DELETE FROM `fees_challan_detail` where `sadmission`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
$ssql="DELETE FROM `NewStudentAdmission` where `sadmission`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
$ssql="UPDATE `NewStudentRegistration` SET `status`='Pending' where `RegistrationNo`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
echo "<br><br><center><b>Reset successfully!";
exit();
?>