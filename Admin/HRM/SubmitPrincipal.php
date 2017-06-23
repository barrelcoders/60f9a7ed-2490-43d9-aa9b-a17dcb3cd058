<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>
<?php
$action = $_REQUEST["action"];
$Remarks= str_replace("'","",$_REQUEST["Remarks"]);
$PrincipalRemark= str_replace("'","",$_REQUEST["PrincipalRemark"]);
$Comment= str_replace("'","",$_REQUEST["Comment"]);

$EmployeeId= $_REQUEST["EmpNo"];

if ($action=="approve")
{
	
	
	$ssql="Update `Employee_ACR_HODAssesment` set `PrincipalRemark`='$Remarks',`PrincipalRemark1`='$PrincipalRemark',`PrincipalComment`='$Comment' where `EmpId`='$EmployeeId'";
		
	$str="Submitted";
}
//echo $ssql;

mysql_query($ssql) or die(mysql_error());
echo "<br><br><center><b>EmpNo No ".$EmployeeId." ".$str." successfully!<br>Click <a href='Javascript:window.close();'>here</a> to close the window";
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
