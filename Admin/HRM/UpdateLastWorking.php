<?php
session_start();
include '../../connection.php';
?>
<?php
$EmpId=$_REQUEST["EmpId"];
$LastDate=$_REQUEST["txtdate"];

mysql_query("update `employee_master` set `LastWorkingDate`='$LastDate' where `EmpId`='$EmpId'");
//echo "update `employee_master` set `LastWorkingDate`='$LastDate' where `EmpId`='$EmpId'";

echo "<br><center><b>Updated Successfully!";
?>