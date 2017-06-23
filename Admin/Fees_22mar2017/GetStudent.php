<?php
include '../../connection.php'; 

$Class=$_REQUEST["Class"];

$ssql="SELECT `sadmission`,`sname` FROM `student_master` WHERE `sclass`='$Class' order by `sclass`";

$rsMainMenu= mysql_query($ssql);
	
while($row = mysql_fetch_assoc($rsMainMenu))
{
		$sstr=$sstr.$row['sadmission']."-".$row['sname'].',';	
}
echo(str_replace(' 1','1',substr($sstr,0,strlen($sstr)-1)));
exit();
?>