<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");
	$ssql="SELECT `srno`,`InquiryFormNo`,`Name`,`FatherName`,`EmailId`,`sclass`,`smobile`,`Address`,`EntryDate` FROM `InquiryDetail` WHERE `EntryDate`='$currentdate1'";
	$rs= mysql_query($ssql);
	
	$ssql="SELECT `FormNo`,`sname`,`sclass`,`FatherName`,`ContactNo`,`EmailId`,`Address`,`date` FROM `RegistrationFees` WHERE `date`='$currentdate1' and `FormNo` != ''";
	$rs1= mysql_query($ssql);
	
	$ssql="SELECT `RegistrationNo`,`sname`,`sclass`,`FatherName`,`ContactNo`,`EmailId`,`Address`,`date` FROM `RegistrationFees` WHERE `date`='$currentdate1' and `RegistrationNo` != ''";
	$rs2= mysql_query($ssql);
	
	$ssql="SELECT `sadmission`,`sname`,`sclass`,`EntryDate` FROM `AdmissionFees` WHERE `EntryDate`='$currentdate1'";
	$rs3= mysql_query($ssql);
	
$sstrEmail="";
$sstrEmail=$sstrEmail.'<table width="100%" border="1" style="border-collapse: collapse">';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td colspan="2" align="center"><b><font face="Calibri">Daily Admission Report ('.$currentdate.')</font></b></td>';
$sstrEmail=$sstrEmail.'</tr>';
$sstrEmail=$sstrEmail.'</table><br>';
$sstrEmail=$sstrEmail.'<table width="100%" border="1" style="border-collapse: collapse">';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td colspan="9" align="center"><b><font face="Calibri">Inquiry Count:'. mysql_num_rows($rs).'</font></b></td>';
$sstrEmail=$sstrEmail.'</tr>';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td align="center">SrNo</td>';
$sstrEmail=$sstrEmail.'<td align="center">Inq. Form No</td>';
$sstrEmail=$sstrEmail.'<td align="center">Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Father Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Email</td>';
$sstrEmail=$sstrEmail.'<td align="center">Class</td>';
$sstrEmail=$sstrEmail.'<td align="center">Mobile</td>';
$sstrEmail=$sstrEmail.'<td align="center">Address</td>';
$sstrEmail=$sstrEmail.'<td align="center">Entry Date</td>';
$sstrEmail=$sstrEmail.'</tr>';

if (mysql_num_rows($rs) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs))
	{
		$SrNo=$row[0];
		$InqFormNo=$row[1];
		$Name=$row[2];
		$FName=$row[3];
		$Email=$row[4];
		$Class=$row[5];
		$Mobile=$row[6];
		$Address=$row[7];
		$EntryDate=$row[8];			
			

$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td>'.$RowCnt.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$InqFormNo.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Name.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$FName.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Email.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Class.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Mobile.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Address.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$EntryDate.'</td>';
$sstrEmail=$sstrEmail.'</tr>';

	$RowCnt=$RowCnt+1;
	}
}

$sstrEmail=$sstrEmail.'</table><br>';
$sstrEmail=$sstrEmail.'<table width="100%" border="1" style="border-collapse: collapse">';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td colspan="9" align="center"><b><font face="Calibri">Form Count:'. mysql_num_rows($rs1).'</font></b></td>';
$sstrEmail=$sstrEmail.'</tr>';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td align="center">SrNo</td>';
$sstrEmail=$sstrEmail.'<td align="center">Form No</td>';
$sstrEmail=$sstrEmail.'<td align="center">Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Class</td>';
$sstrEmail=$sstrEmail.'<td align="center">Father Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Mobile</td>';
$sstrEmail=$sstrEmail.'<td align="center">Email</td>';
$sstrEmail=$sstrEmail.'<td align="center">Address</td>';
$sstrEmail=$sstrEmail.'<td align="center">Entry Date</td>';
$sstrEmail=$sstrEmail.'</tr>';

$RowCnt=1;
if (mysql_num_rows($rs1) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs1))
	{
		$FormNo=$row[0];
		$Name=$row[1];
		$Class=$row[2];
		$FName=$row[3];
		$Mobile=$row[4];
		$Email=$row[5];
		$Address=$row[6];
		$EntryDate=$row[7];
		

$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td>'.$RowCnt.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$FormNo.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Name.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Class.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$FName.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Mobile.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Email.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Address.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$EntryDate.'</td>';
$sstrEmail=$sstrEmail.'</tr>';

	$RowCnt=$RowCnt+1;
	}
}

$sstrEmail=$sstrEmail.'</table><br>';
$sstrEmail=$sstrEmail.'<table width="100%" border="1" style="border-collapse: collapse">';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td colspan="9" align="center"><b><font face="Calibri">Registration Count:'. mysql_num_rows($rs2).'</font></b></td>';
$sstrEmail=$sstrEmail.'</tr>';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td align="center">SrNo</td>';
$sstrEmail=$sstrEmail.'<td align="center">Reg. No</td>';
$sstrEmail=$sstrEmail.'<td align="center">Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Class</td>';
$sstrEmail=$sstrEmail.'<td align="center">Father Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Mobile</td>';
$sstrEmail=$sstrEmail.'<td align="center">Email</td>';
$sstrEmail=$sstrEmail.'<td align="center">Address</td>';
$sstrEmail=$sstrEmail.'<td align="center">Entry Date</td>';
$sstrEmail=$sstrEmail.'</tr>';

$RowCnt=1;
if (mysql_num_rows($rs2) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs2))
	{
		$FormNo=$row[0];
		$Name=$row[1];
		$Class=$row[2];
		$FName=$row[3];
		$Mobile=$row[4];
		$Email=$row[5];
		$Address=$row[6];
		$EntryDate=$row[7];
		

$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td>'.$RowCnt.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$FormNo.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Name.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Class.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$FName.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Mobile.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Email.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Address.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$EntryDate.'</td>';
$sstrEmail=$sstrEmail.'</tr>';

	$RowCnt=$RowCnt+1;
	}
}

$sstrEmail=$sstrEmail.'</table><br>';
$sstrEmail=$sstrEmail.'<table width="100%" border="1" style="border-collapse: collapse">';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td colspan="9" align="center"><b><font face="Calibri">Admission Count:'. mysql_num_rows($rs3).'</font></b></td>';
$sstrEmail=$sstrEmail.'</tr>';
$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td align="center">SrNo</td>';
$sstrEmail=$sstrEmail.'<td align="center">Admission. No</td>';
$sstrEmail=$sstrEmail.'<td align="center">Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Class</td>';
$sstrEmail=$sstrEmail.'<td align="center">Father Name</td>';
$sstrEmail=$sstrEmail.'<td align="center">Mobile</td>';
$sstrEmail=$sstrEmail.'<td align="center">Email</td>';
$sstrEmail=$sstrEmail.'<td align="center">Address</td>';
$sstrEmail=$sstrEmail.'<td align="center">Entry Date</td>';
$sstrEmail=$sstrEmail.'</tr>';

$RowCnt=1;
if (mysql_num_rows($rs3) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs3))
	{
		$FormNo=$row[0];
		$Name=$row[1];
		$Class=$row[2];
		$FName="";
		$Mobile="";
		$Email="";
		$Address="";
		$EntryDate=$row[3];
		

$sstrEmail=$sstrEmail.'<tr>';
$sstrEmail=$sstrEmail.'<td>'.$RowCnt.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$FormNo.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Name.'</td>';
$sstrEmail=$sstrEmail.'<td>'.$Class.'</td>';
$sstrEmail=$sstrEmail.'<td></td>';
$sstrEmail=$sstrEmail.'<td></td>';
$sstrEmail=$sstrEmail.'<td></td>';
$sstrEmail=$sstrEmail.'<td></td>';
$sstrEmail=$sstrEmail.'<td>'.$EntryDate.'</td>';
$sstrEmail=$sstrEmail.'</tr>';

	$RowCnt=$RowCnt+1;
	}
}
//echo $sstrEmail;
//exit();
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
//$headers .= 'From: communication@emeraldsis.com' . "\r\n";
$headers .= 'From: ' . $CommunicationEmailId . "\r\n";
$headers .= 'CC: inderprakash@gmail.com,itismeashishs@gmail.com' . "\r\n";
//$strMailBody=$_REQUEST["htmlcode"];

//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
$subject="Daily Admission Report";

$ssql="select `email` from `employee_master` where `EmpId` in (select distinct `Employee_Id` from `report_master` where `Employee_Id` !='' and `Report_Name`='Daily Admission Report')";
$rs= mysql_query($ssql);
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
while($row1 = mysql_fetch_row($rs))
	{
		$to=$row1[0];
		//echo $to."<br>";
		mail($to,$subject,$sstrEmail,$headers);
	}
?>
