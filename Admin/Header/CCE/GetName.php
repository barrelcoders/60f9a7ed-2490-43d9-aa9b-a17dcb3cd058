<?php include '../../connection.php';?>
<?php
session_start();
$StudentName = $_SESSION['StudentName'];

$Class=$_REQUEST["Class"];
$rollno = $_REQUEST['rollno'];


$class=$_REQUEST["Class"];
$ssql="SELECT distinct `sname` FROM `student_master` a  where  `sclass`='$Class' and `srollno`='$rollno'";
$rs= mysql_query($ssql);
$sstr="";
while($row = mysql_fetch_row($rs))
{
$sstr=$sstr . $row[0] . ",";
}

//echo substr($sstr,strlen($sstr)-1);

echo  substr($sstr,0,strlen($sstr)-1);

?>