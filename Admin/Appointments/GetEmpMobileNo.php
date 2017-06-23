<?php 


include '../../connection.php'; 

?>



<?php

$EmployeeName=$_REQUEST["EmpName"];

$rs=mysql_query("select `MobileNo` from `employee_master` where `Name`='$EmployeeName'");

while($row = mysql_fetch_row($rs))

{

	$EmpMobile=$row[0];

	break;

}

echo $EmpMobile;

?>