<?php
session_start();
include '../../connection.php';
?>
<?php
$TopicName=$_REQUEST["TopicName"];
$ssql="SELECT distinct `SubTopicName` FROM `Assignment_SubTopic` WHERE `TopicName`='$TopicName'";
$rsMainMenu= mysql_query($ssql);
while($row = mysql_fetch_assoc($rsMainMenu))
{
		$sstr=$sstr.$row['SubTopicName'].',';	
}
echo substr($sstr,0,strlen($sstr)-1);
exit();
?>