<?php
include '../../connection.php';
	$EmpID=$_REQUEST["EmployeeID"];
	
   $sql = "SELECT distinct `Name`,`DOJ`,`Department`,`Designation` FROM `employee_alumni` where `EmpId`='$EmployeeId'";
   $result = mysql_query($sql, $Con);
				while($row = mysql_fetch_row($result))
				{
   					$Name=$row[0];
   					$Department=$row[1];
   					$Designation=$row[2];
				}
				$sstr=$EmployeeName.",".$Department.",".$Designation;
				//echo $sstr;
				echo $sstr;
?>