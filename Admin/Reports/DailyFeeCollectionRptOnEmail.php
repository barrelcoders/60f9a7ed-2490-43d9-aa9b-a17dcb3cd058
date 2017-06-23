<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");

$ssql="SELECT `ReceiptNo`,`PBalanceReceiptNo`, (select `sname` from `fees` where `receipt` =a.`ReceiptNo`) as `name`, (select `sclass` from `fees` where `receipt` =a.`ReceiptNo`) as `class`, (select `srollno` from `fees` where `receipt` =a.`ReceiptNo`) as `rollno`, `TutionFee`,`TransportFee`,`AnnualCharges`,`ActualLateFee`,`AdjustedLateFee`,`PreviousBalance`,`PaidBalanceAmt`,`CurrentBalance`,`Discount` FROM `fees_transaction` as `a` WHERE `ReceiptDate`='$currentdate1'";
$rs= mysql_query($ssql);
?>
<?php
$strTable='<table width="100%" border="1" style="border-collapse: collapse">';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="15" align="center"><b><font face="Calibri">Daily Collection Report ('.$currentdate.')</font></b></td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center">SrNo</td>';
$strTable=$strTable.'<td align="center">Receipt No</td>';
$strTable=$strTable.'<td align="center">Balance Receipt No</td>';
$strTable=$strTable.'<td align="center">Name</td>';
$strTable=$strTable.'<td align="center">Class</td>';
$strTable=$strTable.'<td align="center">Roll No.</td>';
$strTable=$strTable.'<td align="center">Tuetion Fee.</td>';
$strTable=$strTable.'<td align="center">Transport Fee.</td>';
$strTable=$strTable.'<td align="center">Annual Fee</td>';
$strTable=$strTable.'<td align="center">Actual Late Fee</td>';
$strTable=$strTable.'<td align="center">Paid Late Fee</td>';
$strTable=$strTable.'<td align="center">Previous Balance</td>';
$strTable=$strTable.'<td align="center">Paid Balance Amt.</td>';
$strTable=$strTable.'<td align="center">Current Balance</td>';
$strTable=$strTable.'<td align="center">Discount</td>';
$strTable=$strTable.'</tr>';

?>

<?php
if (mysql_num_rows($rs) > 0)
{
	$RowCnt=1;
		$TotalTutionFee=0;
		$TotalTransportFee=0;
		$TotalAnnualCharges=0;
		$TotalActualLateFee=0;
		$TotalAdjustedLateFee=0;
		$TotalPreviousBalance=0;
		$TotalPaidBalanceAmt=0;
		$TotalCurrentBalance=0;
		$TotalDiscount=0;			
		
	while($row = mysql_fetch_row($rs))
	{
		$ReceiptNo=$row[0];
		$BalanceReceiptNo=$row[1];
		$Name=$row[2];
		$Class=$row[3];
		$RollNo=$row[4];
		
		$TutionFee=$row[5];
		$TransportFee=$row[6];
		$AnnualCharges=$row[7];
		$ActualLateFee=$row[8];			
		$AdjustedLateFee=$row[9];			
		$PreviousBalance=$row[10];			
		$PaidBalanceAmt=$row[11];			
		$CurrentBalance=$row[12];			
		$Discount=$row[13];
		
		$TotalTutionFee=$TotalTutionFee+$TutionFee;
		$TotalTransportFee=$TotalTransportFee+$TransportFee;
		$TotalAnnualCharges=$TotalAnnualCharges+$AnnualCharges;
		$TotalActualLateFee=$TotalActualLateFee+$ActualLateFee;
		$TotalAdjustedLateFee=$TotalAdjustedLateFee+$AdjustedLateFee;
		$TotalPreviousBalance=$TotalPreviousBalance+$PreviousBalance;
		$TotalPaidBalanceAmt=$TotalPaidBalanceAmt+$PaidBalanceAmt;
		$TotalCurrentBalance=$TotalCurrentBalance+$CurrentBalance;
		$TotalDiscount=$TotalDiscount+$Discount;	
?>
<?php		
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center">'.$RowCnt.'</td>';
$strTable=$strTable.'<td align="center">'.$ReceiptNo.'</td>';
$strTable=$strTable.'<td align="center">'.$BalanceReceiptNo.'</td>';
$strTable=$strTable.'<td align="center">'.$Name.'</td>';
$strTable=$strTable.'<td align="center">'.$Class.'</td>';
$strTable=$strTable.'<td align="center">'.$RollNo.'</td>';
$strTable=$strTable.'<td align="center">'.$TutionFee.'</td>';
$strTable=$strTable.'<td align="center">'.$TransportFee.'</td>';
$strTable=$strTable.'<td align="center">'.$AnnualCharges.'</td>';
$strTable=$strTable.'<td align="center">'.$ActualLateFee.'</td>';
$strTable=$strTable.'<td align="center">'.$AdjustedLateFee.'</td>';
$strTable=$strTable.'<td align="center">'.$PreviousBalance.'</td>';
$strTable=$strTable.'<td align="center">'.$PaidBalanceAmt.'</td>';
$strTable=$strTable.'<td align="center">'.$CurrentBalance.'</td>';
$strTable=$strTable.'<td align="center">'.$Discount.'</td>';
$strTable=$strTable.'</tr>';
?>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
<?php
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="6" align="right"><strong>Total:</strong></td>';
$strTable=$strTable.'<td align="center">'.$TotalTutionFee.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalTransportFee.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalAnnualCharges.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalActualLateFee.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalAdjustedLateFee.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalPreviousBalance.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalPaidBalanceAmt.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalCurrentBalance.'</td>';
$strTable=$strTable.'<td align="center">'.$TotalDiscount.'</td>';
$strTable=$strTable.'</tr>';

$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="15" align="left"><strong>Total Fee Collection(Tueition Fee+Transport Fee+Paid Late Fee+Paid Balance Amt.):'.($TotalTutionFee+$TotalTransportFee+$TotalAdjustedLateFee+$TotalPaidBalanceAmt).'</strong></td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="15" align="left"><strong>Total discount given:'.$TotalDiscount.'</strong></td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="15" align="left"><strong>Total balance in today collection:'.$TotalCurrentBalance.'</strong></td>';
$strTable=$strTable.'</tr>';
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
//$to = $EmailID;
//$to = "inderprakash@gmail.com";
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
$subject="Daily Collection Report";
$ssql="select `email` from `employee_master` where `EmpId` in (select distinct `Employee_Id` from `report_master` where `Employee_Id` !='' and `Report_Name`='Daily Fees Collection Report')";
$rs= mysql_query($ssql);
//$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
while($row1 = mysql_fetch_row($rs))
	{
		$to=$row1[0];
		mail($to,$subject,$strTable,$headers);
	}
?>
