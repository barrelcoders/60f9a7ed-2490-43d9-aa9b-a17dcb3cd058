<?php


include '../../connection.php';

?>

<?php

$HeadName=$_REQUEST["HeadName"];

$ssql="SELECT distinct `SubHeadName` FROM `fees_misc_head` WHERE `HeadName`='$HeadName'";

$rsMainMenu= mysql_query($ssql);

while($row = mysql_fetch_assoc($rsMainMenu))

{

		$sstr=$sstr.$row['SubHeadName'].',';	

}

echo(str_replace(' 1','1',substr($sstr,0,strlen($sstr)-1)));

exit();

?>