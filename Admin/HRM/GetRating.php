<?php
session_start();
include '../../connection.php';
?>
<?php
$Answer=$_REQUEST["Answer"];
$ssql="SELECT distinct `AnswerRating` FROM `Employee_ACR_Question_Master` WHERE `Answer`='$Answer'";
$rsMainMenu= mysql_query($ssql);
while($row = mysql_fetch_assoc($rsMainMenu))
{
	$sstr=$sstr.$row['AnswerRating'].',';	
}
echo substr($sstr,0,strlen($sstr)-1);
exit();
?>