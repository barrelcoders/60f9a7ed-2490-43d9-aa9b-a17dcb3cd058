<?php
session_start();
include '../../connection.php';
?>
<?php

if(isset($_REQUEST['c']))
{
	$sql="SELECT `sname`,`sclass`,`srollno`,`suser`,`spassword` FROM user_master WHERE sadmission='".$_REQUEST['c']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['sname'].",".$fetch['sclass'].",".$fetch['srollno'].",".$fetch['suser'].",".$fetch['spassword'];
	
}

?>




