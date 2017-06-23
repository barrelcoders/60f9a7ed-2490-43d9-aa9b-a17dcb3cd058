<?php
session_start();
include '../../connection.php';
?>
<?php
$Subject=$_REQUEST["Subject"];
$ssql="SELECT distinct `ChapterName` FROM `Assignment_Chapter` WHERE `Subject`='$Subject'";
$rsMainMenu= mysql_query($ssql);
while($row = mysql_fetch_assoc($rsMainMenu))
{
		$sstr=$sstr.$row['ChapterName'].',';	
}
echo substr($sstr,0,strlen($sstr)-1);
exit();
?>