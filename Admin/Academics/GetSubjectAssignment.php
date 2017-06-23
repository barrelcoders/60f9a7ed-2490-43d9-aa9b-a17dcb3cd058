<?php
include '../../connection.php';
?>
<?php
$class=$_REQUEST["Class"];
$Subject=$_REQUEST["Subject"];
$Chepter=$_REQUEST["Chepter"];
if($class !="")
{
	$ssql="SELECT distinct `Subject` FROM `Assignment_Chapter` a  where  `sclass` in ($class)";
}
if($Subject!="")
{
	$ssql="SELECT distinct `ChapterName` FROM `Assignment_Chapter` a  where  `Subject` in ($Subject)";
}
if($Chepter != "")
{
	$ssql="SELECT distinct `TopicName` FROM `Assignment_Topic` a  where  `ChapterName` in ($Chepter)";
}

$rs= mysql_query($ssql);
//$sstr="";
while($row = mysql_fetch_row($rs))
{
$sstr=$sstr.$row[0]. ',';
}
//echo substr($sstr,strlen($sstr)-1);
echo  substr($sstr,0,strlen($sstr)-1);
?>