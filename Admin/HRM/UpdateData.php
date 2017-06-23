<?php
session_start();
include '../../connection.php';
?>
<?php
$EmpId=$_REQUEST["EmpId"];
$LOPValue=$_REQUEST["LOPValue"];
$Month=$_REQUEST["Month"];
$Year=$_REQUEST["Year"];
$Day=$_REQUEST["Day"];
$Remarks=$_REQUEST["Remarks"];

mysql_query("update `Employee_Punching_Detail` set `LOPValue`='$LOPValue',`Remarks`='$Remarks' where `EmpId`='$EmpId' and `PunchDate`='$Day' and `Month`='$Month' and `Year`='$Year' ");
//echo "update `Employee_Punching_Detail` set `LOPValue`='$LOPValue',`Remarks`='$Remarks' where `EmpId`='$EmpId' and `PunchDate`='$Day' and `Month`='$Month' and `Year`='$Year' ";

echo "<br><center><b>Updated Successfully!";
?>