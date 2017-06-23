<?php
session_start();
include '../../connection.php';

$sadmission=$_REQUEST["sadmission"];
$Class=$_REQUEST["Class"];
$ExamType=$_REQUEST["ExamType"];
$Remark=$_REQUEST["Remark"];
$action=$_REQUEST["action"];

if($action=="approve")
{
	//echo "update `reportcard_Class11and12_values` set `approvalstatus`='Approve',`Remarks`='$Remark' where `sadmission`='$sadmission' and `sclass`='$Class' and `testtype`='$ExamType'";
	//exit();

	mysql_query("update `reportcard_Class11and12_values` set `approvalstatus`='Approve',`Remarks`='$Remark' where `sadmission`='$sadmission' and `sclass`='$Class' and `testtype`='$ExamType'") or die(mysql_error());
	echo "<br><br><center><b> Approved Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
}

if($action=="reject")
{	
	mysql_query("update `reportcard_Class11and12_values` set `approvalstatus`='Pending',`Remarks`='$Remark' where `sadmission`='$sadmission' and `sclass`='$Class' and `testtype`='$ExamType'") or die(mysql_error());
	echo "<br><br><center><b> Rejected Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
}
?>
