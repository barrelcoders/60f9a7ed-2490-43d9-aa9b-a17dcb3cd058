<?php
include '../../connection.php';
?>
<?php

if(isset($_REQUEST['c']))
{
	$sql="SELECT `Name`,`Department`,`MobileNo` FROM `employee_master` WHERE `EmpId`='".$_REQUEST['c']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['Name'].",".$fetch['Department'].",".$fetch['MobileNo'];
	
}
?>




