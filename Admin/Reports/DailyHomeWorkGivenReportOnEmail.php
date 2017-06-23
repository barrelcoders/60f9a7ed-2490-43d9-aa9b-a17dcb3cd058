<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");

//$ssql="select x.`class`,x.`subject`,x.`TodayHomeWork` from (SELECT distinct `class`,`subject`,(SELECT `homework` FROM `homework_master` WHERE `sclass`=a.`class` and `subject`=a.`subject` and `homeworkdate`='$currentdate1') as `TodayHomeWork` FROM `subject_master` as `a` WHERE `HomeworkReport`='Main' and `class` in (select distinct `class` from `class_master`)) as `x` where x.`TodayHomeWork`='' or x.`TodayHomeWork` is NULL order by x.`class`";
$ssql="SELECT `sclass`,`subject`,`homework` FROM `homework_master` WHERE `homeworkdate`='$currentdate1' order by `sclass`";
$rs= mysql_query($ssql);
?>
<?php
$strTable='<table width="100%" border="1" style="border-collapse: collapse">';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="4" align="center"><b><font face="Calibri">Daily Homework Report ('.$currentdate.')</font></b></td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center" style="background-color: #C0C0C0;">SrNo</td>';
$strTable=$strTable.'<td align="center" style="background-color: #C0C0C0;">Class</td>';
$strTable=$strTable.'<td align="center" style="background-color: #C0C0C0;">Subject</td>';
$strTable=$strTable.'<td align="center" style="background-color: #C0C0C0;">Homework Given</td>';
$strTable=$strTable.'</tr>';
?>

<?php
if (mysql_num_rows($rs) > 0)
{
		$RowCnt=1;
		
	while($row = mysql_fetch_row($rs))
	{
		$Class=$row[0];
		$Subject=$row[1];
		$Homework=$row[2];
?>
<?php		
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center">'.$RowCnt.'</td>';
$strTable=$strTable.'<td align="center">'.$Class.'</td>';
$strTable=$strTable.'<td align="center">'.$Subject.'</td>';
$strTable=$strTable.'<td align="left">'.$Homework.'</td>';
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
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
$subject="Daily Homework given Report";
//mail($to,$subject,$strTable,$headers);
//exit();
$ssql="select `email` from `employee_master` where `EmpId` in (select distinct `Employee_Id` from `report_master` where `Employee_Id` !='' and `Report_Name`='Daily Homework Given Report')";
$rs= mysql_query($ssql);
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
while($row1 = mysql_fetch_row($rs))
	{
		$to=$row1[0];
		//echo $to."<br>";
		mail($to,$subject,$strTable,$headers);
	}
?>
