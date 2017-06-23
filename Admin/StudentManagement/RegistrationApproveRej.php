<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>
<?php
$action = $_REQUEST["action"];
$Remarks= str_replace("'","",$_REQUEST["Remarks"]);
$RegistrationId = $_REQUEST["RegId"];
$InterviewMarks= $_REQUEST["InterviewMarks"];

if ($action=="approve")
{
	$ssql="UPDATE `NewStudentRegistration` SET `L1ApprovalStatus`='Approved',`Remarks`='$Remarks',`L1Remarks`='$Remarks' ,`InterviewScore`='$InterviewMarks' where `RegistrationNo`='$RegistrationId'";
		
	$str="Approved";
}
if ($action=="reject")
{
	$ssql="UPDATE `NewStudentRegistration` SET `L1ApprovalStatus`='Rejected',`Remarks`='$Remarks',`L1Remarks`='$Remarks' ,`InterviewScore`='$InterviewMarks' where `RegistrationNo`='$RegistrationId'";
	$str="Rejected";
}

mysql_query($ssql) or die(mysql_error());
echo "<br><br><center><b>Registration No ".$RegistrationId." ".$str." successfully!<br>Click <a href='Javascript:window.close();'>here</a> to close the window";
//echo $ssql;
exit();
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
