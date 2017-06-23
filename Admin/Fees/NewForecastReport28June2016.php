<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$MasterClass=$_REQUEST["cboClass"];
$rsClass=mysql_query("select distinct `class` from `class_master` where `MasterClass`='$MasterClass' order by `class`");

?>
<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Fees Forecast Report</title>
</head>

<body>

<p>&nbsp;</p>
<p><b><font face="Cambria" style="font-size: 11pt">Fees Forecast Report</font></b></p>
<hr>
<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse" class="CSSTableGenerator">
	<tr>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">SrNo</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Admission No</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Student Name</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Class</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Discount Type</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Transport Route No</font></b></td>
		<td align="center" width="66" style="text-align: center"><b>Tuition Fees</b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Admission Fees</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Caution Money 
		(Refundable)</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Management Fees</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Annual Charges</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Computer Fees</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Smart Class</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Science Fees</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Total Without 
		Transport Charge</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Transport Charges</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Total With 
		Transport</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Advances</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Provisional Amount</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Close Amount 
		Credit</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Open Amount Debit</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Total Bill Amount</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees First 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees Second 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees Third 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees Fourth 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Closing Amount 
		Debit</font></b></td>
	</tr>
	
				<?php
while($rowClass=mysql_fetch_row($rsClass))
{
	$Class=$rowClass[0];
	//$Class=$_REQUEST["cboClass"];
	$FYYear=$_REQUEST["cboFinancialYear"];
	//$ssql="SELECT distinct `sadmission`,`sname`,`sclass`,`DiscontType`,`routeno`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ADMISSION FEES') as `AdmissionFees`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='Advances') as `Advances`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ANNUAL CHARGES') as `AnnualCharges`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CAUTION MONEY (REFUNDABLE)') as `CautionMoney`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT CREDIT') as `ClosedCreditAmount`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT DEBIT') as `ClosedDebitAmount`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES') as `COMPUTERFEES`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ELECTRICITY /MAINTENANCE FEE') as `MaintainenceFees`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MAINTENANCE FEE') as `MaintainenceFees`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MANAGEMENT FEES') as `ManagementFee`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SCIENCE FEES') as `ScienceFee`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SMART CLASS') as `SmartClass`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TRANSPORT CHARGES') as `TransportCharge`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TUITION FEES') as `TUITION FEES` from `student_master` as `a` where `sadmission`!='' and `sclass`='$Class'";
	$ssql="SELECT `sadmission`,`sname`,`sclass`,`DiscontType`,`routeno`,(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ADMISSION FEES'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='Advances'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ANNUAL CHARGES'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CAUTION MONEY (REFUNDABLE)'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT CREDIT'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT DEBIT'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MAINTENANCE FEE'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MANAGEMENT FEES'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SCIENCE FEES'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SMART CLASS'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TRANSPORT CHARGES'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TUITION FEES') from `student_master` as `a` where `sadmission`!='' and `sclass`='$Class' order by `sadmission`";
	
	//echo $ssql; 
	//exit();
	$rs=mysql_query($ssql);
				
				$TotalBillWithoutTransport=0;
				$Admission=0;
				$StudentName=0;
				$Class=0;
				$DiscountType=0;
				$RouteNo=0;
				$AdmissionFee=0;
				$Advances=0;
				$AnnualCharges=0;
				$TotalBillWithTransport=0;
				$CautionMoney=0;
				$ClosedCreditAmount=0;
				$ClosedDebitAmount=0;
                $ComputerFees=0;
				$MaintainenceFee=0;
				$ManagementFee=0;
				$ScienceFee=0;
				$SmartClass=0;
				$TransportCharge=0;
				$TutionFee=0;
				$AdmissionFee=0;
			
				
				$cnt=0;
				while($row=mysql_fetch_row($rs))
				{
				$Admission=$row[0];
				$StudentName=$row[1];
				$Class=$row[2];
				$DiscountType=$row[3];
				$RouteNo=$row[4];
				$AdmissionFee=$row[5];
				$Advances=$row[6];
				$AnnualCharges=$row[7];
				$CautionMoney=$row[8];
				$ClosedCreditAmount=$row[9];
				$ClosedDebitAmount=$row[10];
                $ComputerFees=$row[11];
				$MaintainenceFee=$row[12];
				$ManagementFee=$row[13];
				$ScienceFee=$row[14];
				$SmartClass=$row[15];
				$TransportCharge=$row[16];
				$TutionFee=$row[17];
				$TotalBillWithoutTransport=$TotalBillWithoutTransport+$AnnualCharges+$CautionMoney+$ComputerFees+$ManagementFee+$ScienceFee+$SmartClass+$TutionFee+$AdmissionFee;
				$TotalBillWithTransport=$TotalBillWithTransport+$AnnualCharges+$CautionMoney+$ComputerFees+$ManagementFee+$ScienceFee+$SmartClass+$TutionFee+$TransportCharge+$AdmissionFee;
				$FinalBillAmount=$TotalBillWithTransport-$Advances+$ClosedDebitAmount-$ClosedCreditAmount-$ProvisionalAmount;
				$FinalYearlyBalance=$FinalBillAmount-$FeesFirstInstallment-$FeesSecondInstallment-$FeesThirdInstallment-$FeesFourthInstallment;
			    $TotalAdmissionFee=$TotalAdmissionFee+$AdmissionFee;
				$TotalAdvances=$TotalAdvances+$Advances;
				$TotalAnnualCharges=$TotalAnnualCharges+$AnnualCharges;
				$TotalCautionMoney=$TotalCautionMoney+$CautionMoney;
				$TotalClosedCreditAmount=$TotalClosedCreditAmount+$ClosedCreditAmount;
				$TotalClosedDebitAmount=$TotalClosedDebitAmount+$ClosedDebitAmount;
                $TotalComputerFees=$TotalComputerFees+$ComputerFees;
				$TotalMaintainenceFee=$TotalMaintainenceFee+$MaintainenceFee;
				$TotalManagementFee=$TotalManagementFee+$ManagementFee;
				$TotalScienceFee=$TotalScienceFee+$ScienceFee;
				$TotalSmartClass=$TotalSmartClass+$SmartClass;
				$TotalTransportCharge=$TotalTransportCharge+$TransportCharge;
				$TotalTutionFee=$TotalTutionFee+$TutionFee;
				$TotalFinalBillAmount=$TotalFinalBillAmount+$FinalBillAmount;
				$TotalFinalYearlyBalance=$TotalFinalYearlyBalance+$FinalYearlyBalance;
			?>			

	<tr>
		<td width="66"><?php echo $cnt=$cnt+1; ?></td>
		<td width="66"><?php echo $Admission; ?></td>
		<td width="66"><?php echo $StudentName; ?></td>
		<td width="66"><?php echo $Class; ?></td>
		<td width="66"><?php echo $DiscountType; ?></td>
		<td width="66"><?php echo $RouteNo; ?></td>
		<td width="66"><?php echo $TutionFee; ?></td>
		<td width="66"><?php echo $AdmissionFee; ?></td>
		<td width="66"><?php echo $CautionMoney; ?></td>
		<td width="66"><?php echo $ManagementFee; ?></td>
		<td width="66"><?php echo $AnnualCharges; ?></td>
		<td width="66"><?php echo $ComputerFees; ?></td>
		<td width="66"><?php echo $SmartClass; ?></td>
		<td width="66"><?php echo $ScienceFee; ?></td>
		<td width="66"><?php echo $TotalBillWithoutTransport; ?></td>
		<td width="66"><?php echo $TransportCharge; ?></td>
		<td width="66"><?php echo $TotalBillWithTransport; ?></td>
		<td width="66"><?php echo $Advances; ?></td>
		<td width="66"><?php echo $ProvisionalAmount; ?></td>
		<td width="66"><?php echo $ClosedCreditAmount; ?></td>
		<td width="66"><?php echo $ClosedDebitAmount; ?></td>
		<td width="66"><?php echo $FinalBillAmount; ?></td>
		<td width="66"><?php echo $FeesFirstInstallment; ?></td>
		<td width="66"><?php echo $FeesSecondInstallment; ?></td>
		<td width="66"><?php echo $FeesThirdInstallment; ?></td>
		<td width="66"><?php echo $FeesFourthInstallment; ?></td>
		<td width="66"><?php echo $FinalYearlyBalance; ?></td>
		

	</tr>
	<?php
	$TotalBillWithTransport=0;
	$TotalBillWithoutTransport=0;
	}
}//End of class recordset
	?>

	<tr>
		<td width="330" colspan="6"><b>Total Amount Sum</b></td>
		<td width="66"><?php echo $TotalTutionFee; ?></td>
		<td width="66"><?php echo $TotalAdmissionFee; ?></td>
		<td width="66"><?php echo $TotalCautionMoney; ?></td>
		<td width="66"><?php echo $TotalManagementFee; ?></td>
		<td width="66"><?php echo $TotalAnnualCharges; ?></td>
		<td width="66"><?php echo $TotalComputerFees; ?></td>
		<td width="66"><?php echo $TotalSmartClass; ?></td>
		<td width="66"><?php echo $TotalScienceFee; ?></td>
		<td width="66"><?php echo $TotalBillWithoutTransport; ?></td>
		<td width="66"><?php echo $TotalTransportCharge; ?></td>
		<td width="66"><?php echo $TotalBillWithTransport; ?></td>
		<td width="66"><?php echo $TotalAdvances; ?></td>
		<td width="66"><?php echo $TotalProvisionalAmount; ?></td>
		<td width="66"><?php echo $TotalClosedCreditAmount; ?></td>
		<td width="66"><?php echo $TotalClosedDebitAmount; ?></td>
		<td width="66"><?php echo $TotalFinalBillAmount; ?></td>
		<td width="66"><?php echo $TotalFeesFirstInstallment; ?></td>
		<td width="66"><?php echo $TotalFeesSecondInstallment; ?></td>
		<td width="66"><?php echo $TotalFeesThirdInstallment; ?></td>
		<td width="66"><?php echo $TotalFeesFourthInstallment; ?></td>
		<td width="66"><?php echo $TotalFinalYearlyBalance; ?></td>
		

	</tr>
	</table>

</body>

</html>