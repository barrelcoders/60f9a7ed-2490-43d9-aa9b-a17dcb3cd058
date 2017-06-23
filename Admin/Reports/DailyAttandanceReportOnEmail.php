<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");

$ssql="SELECT distinct `sclass`, (select count(*) from `attendance` WHERE `attendancedate`='$currentdate1' and `sclass`=a.`sclass` and `attendance`='P') Present_Count,(select count(*) from `attendance` WHERE `attendancedate`='$currentdate1' and `sclass`=a.`sclass` and `attendance`='A') Absent_Count FROM `attendance` as `a` WHERE `attendancedate`='$currentdate1' order by `sclass`";
$rs= mysql_query($ssql);


?>
<?php
$strTable='<table width="100%" border="1" style="border-collapse: collapse">';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="4" align="center"><b><font face="Calibri">Daily Attendance Report ('.$currentdate.')</font></b></td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center">SrNo</td>';
$strTable=$strTable.'<td align="center">Class</td>';
$strTable=$strTable.'<td align="center">Present Count</td>';
$strTable=$strTable.'<td align="center">Absent Count</td>';
$strTable=$strTable.'</tr>';
?>

<?php
if (mysql_num_rows($rs) > 0)
{
		$RowCnt=1;
		
	while($row = mysql_fetch_row($rs))
	{
		$Class=$row[0];
		$PresentCount=$row[1];		
		$AbsentCount=$row[2];		
?>
<?php		
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center">'.$RowCnt.'</td>';
$strTable=$strTable.'<td align="center">'.$Class.'</td>';
$strTable=$strTable.'<td align="center">'.$PresentCount.'</td>';
$strTable=$strTable.'<td align="center">'.$AbsentCount.'</td>';
$strTable=$strTable.'</tr>';
?>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
<?php
$strTable=$strTable.'</table>';
//echo $strTable;
//exit();
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
//$headers .= 'From: communication@emeraldsis.com' . "\r\n";
$headers .= 'From: ' . $CommunicationEmailId . "\r\n";
$headers .= 'CC: inderprakash@gmail.com,itismeashishs@gmail.com' . "\r\n";
//$strMailBody=$_REQUEST["htmlcode"];
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
$subject="Daily Attandance Report(".$currentdate1.")";
$ssql="select `email` from `employee_master` where `EmpId` in (select distinct `Employee_Id` from `report_master` where `Employee_Id` !='' and `Report_Name`='Daily Student Attendance Report')";
$rs= mysql_query($ssql);
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
while($row1 = mysql_fetch_row($rs))
	{
		$to=$row1[0];
		mail($to,$subject,$strTable,$headers);
	}
?>
