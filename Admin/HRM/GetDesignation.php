<?php include '../../connection.php';?>
<?php
$Department=$_REQUEST["Department"];
$ssql="SELECT distinct `Designation` FROM `department_master` a  where  `DepartmentName`='$Department'";

$rs= mysql_query($ssql);

//$sstr="";

while($row = mysql_fetch_row($rs))
{
$sstr=$sstr.$row[0]. ',';
}



//echo substr($sstr,strlen($sstr)-1);

echo  substr($sstr,0,strlen($sstr)-1);

?>