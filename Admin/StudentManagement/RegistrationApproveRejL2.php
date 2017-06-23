<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>
<?php
$action = $_REQUEST["action"];
$Remarks= str_replace("'","",$_REQUEST["Remarks"]);
$RegistrationId = $_REQUEST["RegId"];

if ($action=="approve")
{
	$P1=rand(1,9);
	$P2=rand(1,9);
	$P3=rand(1,9);
	$P4=rand(1,9);
	$P5=rand(1,9);
	$Password4AdmissionFee=$P1.$P2.$P3.$P4.$P5;
	
	$ssql="UPDATE `NewStudentRegistration` SET `L2ApprovalStatus`='Approved',`L2Remarks`='$Remarks',`status`='Selected',`Password4AdmissionFee`='$Password4AdmissionFee' where `RegistrationNo`='$RegistrationId'";
		
	$str="Approved";
}
if ($action=="reject")
{
	$ssql="UPDATE `NewStudentRegistration` SET `L2ApprovalStatus`='Rejected',`L2Remarks`='$Remarks' where `RegistrationNo`='$RegistrationId'";
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
