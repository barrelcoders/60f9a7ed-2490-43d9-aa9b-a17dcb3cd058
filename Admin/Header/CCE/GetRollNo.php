<?php include '../../connection.php';?>
<?php
session_start();
$StudentName = $_SESSION['StudentName'];

$StudentClass = $_SESSION['StudentClass'];

$StudentRollNo = $_SESSION['StudentRollNo'];

$class=$_REQUEST["Class"];



$ssql="SELECT distinct trim(`srollno`) FROM `student_master` a  where  `sclass`='$class' order by CAST(`srollno` AS UNSIGNED)";

$rs= mysql_query($ssql);

$sstr="";

while($row = mysql_fetch_row($rs))

{

$sstr=$sstr . $row[0] . ",";

}



//echo substr($sstr,strlen($sstr)-1);

echo  substr($sstr,0,strlen($sstr)-1);

?>