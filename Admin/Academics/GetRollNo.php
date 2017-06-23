<?php
session_start();
include '../../connection.php';
?>

<?php

$class=$_REQUEST["Class"];


$ssql="SELECT distinct `srollno` FROM `student_master` a  where  `sclass`='$class'";

$rs= mysql_query($ssql);

$sstr="";

while($row = mysql_fetch_row($rs))

{

$sstr=$sstr . $row[0] . ",";

}



//echo substr($sstr,strlen($sstr)-1);

echo  substr($sstr,0,strlen($sstr)-1);

?>