<?php include '../../connection.php';?>
<?php
$class=$_REQUEST["Class"];
$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class`='$class' and `subject` !=''";
$rs= mysql_query($ssql);
$sstr="";
while($row = mysql_fetch_row($rs))
{
//$sstr=$sstr.str_replace("lish","English",$row[0]).",";
$sstr=$sstr.$row[0].",";
}

//echo substr($sstr,strlen($sstr)-1);
echo  substr($sstr,0,strlen($sstr)-1);
?>