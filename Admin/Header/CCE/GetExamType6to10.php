<?php include '../../connection.php';?>
<?php
$class=$_REQUEST["Class"];

//$sqlex = "SELECT distinct `examtype` FROM `exam_master` where `class` ='$class' and `status`='1' and `examtype` !=''";
$sqlex = "SELECT distinct `examtype` FROM `exam_master` where `class` in (select `MasterClass` from `class_master` where `class`='$class') and `status`='1' and `examtype` !=''";
$rs = mysql_query($sqlex);

$sstr="";
while($row = mysql_fetch_row($rs))
{
//$sstr=$sstr.str_replace("lish","English",$row[0]).",";
$sstr=$sstr.$row[0].",";
}

//echo substr($sstr,strlen($sstr)-1);
echo  substr($sstr,0,strlen($sstr)-1);
?>