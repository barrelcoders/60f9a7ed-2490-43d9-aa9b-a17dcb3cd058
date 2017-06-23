<?php include '../../connection.php'; ?>
<?php
$EmpId=$_REQUEST["EmployeeId"];
$Dt=$_REQUEST["Dt"];
	$ssql = "SELECT * FROM `Employee_Leave` where '$Dt'>=`LeaveFrom` and '$Dt'<=`LeaveTo` and `EmployeeId`='$EmpId'";
	
		$rs = mysql_query($ssql);
		if (mysql_num_rows($rs) > 0)
		{
			echo "yes";
		}
?>
