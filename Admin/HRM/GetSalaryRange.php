<?php include '../../connection.php';?>
<?php
$Department=$_REQUEST["Department"];
$Designation=$_REQUEST["Designation"];
$ssql="SELECT `SalaryFrom`,`SalaryTo`,`GradePay` FROM `department_master` a  where  `DepartmentName`='$Department' and `Designation`='$Designation'";

$rs= mysql_query($ssql);

//$sstr="";

while($row = mysql_fetch_row($rs))
{
	$sstr=$row[0].','.$row[1].','.$row[2];
	break;
}

//echo substr($sstr,strlen($sstr)-1);

echo $sstr;
?>