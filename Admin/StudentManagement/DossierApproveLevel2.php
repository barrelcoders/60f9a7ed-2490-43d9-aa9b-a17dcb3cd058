<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>
<?php
$action = $_REQUEST["action"];
$AdmissionId= $_REQUEST["AdmId"];
$EmployeeId=$_SESSION['userid'];


if ($action=="approve")
{
	$ssql="UPDATE `StudentDossier` SET `L2ApprovalStatus`='Approved',`L2ApproverId`='$EmployeeId' where `sadmisson`='$AdmissionId'";
		
	$str="Approved";
}

mysql_query($ssql) or die(mysql_error());
echo "<br><br><center><b>Admission No ".$AdmissionId." ".$str." successfully!<br>Click <a href='Javascript:window.close();'>here</a> to close the window";
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
