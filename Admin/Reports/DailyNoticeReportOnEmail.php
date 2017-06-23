<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");

$ssql="SELECT `sclass`,`srollno`,`sname`,`noticetitle`,`notice` FROM `student_notice` WHERE `NoticeDate`='$currentdate1' and `sclass` !='Test'";
$rs= mysql_query($ssql);


?>
<?php
$strTable='<table width="100%" border="1" style="border-collapse: collapse">';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="4" align="center"><b><font face="Calibri">Daily Notice Report ('.$currentdate.')</font></b></td>';
$strTable=$strTable.'</tr>';
?>

<?php
if (mysql_num_rows($rs) > 0)
{
		$RowCnt=1;
	while($row = mysql_fetch_row($rs))
	{
		$Class=$row[0];
		$RollNo=$row[1];		
		$Name=$row[2];		
		$NoticeTitle=$row[3];		
		$Notice=$row[4];		
?>
<?php
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="left" colspan="4" height="20" bgcolor="#3366CC"><b><font face="Calibri" color="#FFFFFF">Notice: '.$RowCnt.'</font></b></td>';
$strTable=$strTable.'</tr>';
		
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">Class:</font></b>'.$Class.'</td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">RollNo:</font></b>'.$RollNo.'</td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">Name:</font></b>'.$Name.'</td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">Noitce Title:</font></b>'.$NoticeTitle.'</td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="4" align="left"><b><font face="Calibri">Notice:</font></b></td>';
$strTable=$strTable.'</tr>';


$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="left" colspan="4">'.$Notice.'</td>';
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
$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
$subject="Daily Notices Sent Report(".$currentdate1.")";
$ssql="select `email` from `employee_master` where `EmpId` in (select distinct `Employee_Id` from `report_master` where `Employee_Id` !='' and `Report_Name`='Notices Sent Report')";
$rs= mysql_query($ssql);
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
while($row1 = mysql_fetch_row($rs))
	{
		$to=$row1[0];
		mail($to,$subject,$strTable,$headers);
	}
?>
