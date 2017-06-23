<?php
session_start();
include '../../connection.php';
?>
<?php
$Chapter=$_REQUEST["ChapterName"];
$ssql="SELECT distinct `TopicName` FROM `Assignment_Topic` WHERE `ChapterName`='$Chapter'";
$rsMainMenu= mysql_query($ssql);
while($row = mysql_fetch_assoc($rsMainMenu))
{
	$sstr=$sstr.$row['TopicName'].',';	
}
echo substr($sstr,0,strlen($sstr)-1);
exit();
?>