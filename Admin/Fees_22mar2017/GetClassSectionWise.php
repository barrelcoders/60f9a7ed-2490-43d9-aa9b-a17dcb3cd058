<?php
include '../../connection.php'; 

$MasterClass=$_REQUEST["MasterClass"];

$ssql="SELECT distinct `class` FROM `class_master` WHERE `MasterClass`='$MasterClass' order by `class`";

$rsMainMenu= mysql_query($ssql);
	
while($row = mysql_fetch_assoc($rsMainMenu))
{
		$sstr=$sstr.$row['class'].',';	
}
echo(str_replace(' 1','1',substr($sstr,0,strlen($sstr)-1)));
exit();
?>