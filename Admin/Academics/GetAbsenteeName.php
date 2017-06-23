<?php
include '../../connection.php';
?>
<?php
$Absentees=$_REQUEST["Absentees"];
if ($Absentees=="")
{
echo "Please enter roll no!";
exit();
}
$Class=$_REQUEST["Class"];

$arrAbsentees=explode(',',$Absentees);
$sstr="";
for($i=0;$i<sizeof($arrAbsentees);$i++)
{
	//$sstr=$sstr.$arrAbsentees[$i].",";
	$rollno=$arrAbsentees[$i];
	$rs= mysql_query("select `sname` from `student_master` where `sclass`='$Class' and `srollno`='$rollno'");
	while($row = mysql_fetch_row($rs))
	{
		$sname=$row[0];
		break;
	}
	$sstr=$sstr.$sname.",";
}
echo  substr($sstr,0,strlen($sstr)-1);
//echo $sstr;
?>
