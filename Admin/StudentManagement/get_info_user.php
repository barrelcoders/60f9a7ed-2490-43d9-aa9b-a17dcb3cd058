<?php
session_start();
include '../../connection.php';
?>
<?php

if(isset($_REQUEST['c']))
{
	$sql="SELECT `sname`,`sclass`,`srollno`,`suser`,`spassword`,`FinancialYear`,`sfathername`,`smobile`,`simei`,`email`,`status` FROM student_master WHERE sadmission='".$_REQUEST['c']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['sname'].",".$fetch['sclass'].",".$fetch['srollno'].",".$fetch['suser'].",".$fetch['spassword'].",".$fetch['FinancialYear'].",".$fetch['sfathername'].",".$fetch['smobile'].",".$fetch['simei'].",".$fetch['email'].",".$fetch['status'];
	
}

?>




