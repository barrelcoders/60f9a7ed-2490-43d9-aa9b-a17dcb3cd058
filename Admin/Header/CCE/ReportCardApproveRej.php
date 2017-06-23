<?php
session_start();
include '../../connection.php';
$Remarks=$_REQUEST["Remarks"];
$srno=$_REQUEST["srno"];
$action=$_REQUEST["action"];
if($action=="approve")
{
	//mysql_query("insert into `reportcard_htmlcode` (`sadmission`,`sname`,`class`,`ExamType`,`RollNo`,`htmlcode`) values ('$sadmission','$sname','$sclass','Term1','$srollno','$strOneStudent')") or die(mysql_error());
	mysql_query("update `reportcard_Class1and2_values` set `Approval`='Approve',`Remarks`='$Remarks' where `SrNo`='$srno'") or die(mysql_error());
	echo "<br><br><center><b> Approved Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
}

if($action=="reject")
{
	//mysql_query("insert into `reportcard_htmlcode` (`sadmission`,`sname`,`class`,`ExamType`,`RollNo`,`htmlcode`) values ('$sadmission','$sname','$sclass','Term1','$srollno','$strOneStudent')") or die(mysql_error());
	mysql_query("update `reportcard_Class1and2_values` set `Approval`='Reject',`Remarks`='$Remarks' where `SrNo`='$srno'") or die(mysql_error());
	echo "<br><br><center><b> Rejected Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
}
?>
