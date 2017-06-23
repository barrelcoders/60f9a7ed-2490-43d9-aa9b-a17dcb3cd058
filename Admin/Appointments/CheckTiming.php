<?php
include '../../connection.php';
$AppointmentDate=$_REQUEST["AppDate"];
$StartTime=$_REQUEST["StartTime"];
$EndTime=$_REQUEST["EndTime"];
$rsChk=mysql_query("SELECT * FROM `appointment` WHERE `DateofAppointment`='$AppointmentDate' and ('$StartTime'>=`FromTimeOfAppointment` and '$StartTime'<=`ToTimeOfAppointment`)");
if(mysql_num_rows($rsChk)>0)
{
echo "1.Already occupied between given time-slots!";
}
?>
