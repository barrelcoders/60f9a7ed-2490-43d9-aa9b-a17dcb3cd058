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
		<td align="center" width="66" style="text-align: center"><b>Tuition Fees</b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Admission Fees</font></b></td>
		<td align="center" width="66" style="text-align: center"><b><font face="Cambria">Caution Money 
		(Refundable)</font></b></td>
		<td align="center" width="66" style="text-align: center"><b>
		<font face="Cambria">Electricity and Maintenance Fee</font></b></td>
		<td align="center" width="66" style="text-align: center"><b>
		<font face="Cambria">Activity Fees</font></b></td>
		<td align="center" width="66" style="text-align: center"><b>
		<font face="Cambria">Medical Fees</font></b></td>
		<td align="center" width="66" style="text-align: center"><b>
		<font face="Cambria">House Keeping </font></b></td>
		<td align="center" width="66" style="text-align: center"><b>
		<font face="Cambria">Laundry Charges</font></b></td>
		<td align="center" width="67" style="text-align: center"><b>
		<font face="Cambria">Maintenance Fee</font></b></td>
		<td align="center" width="67" style="text-align: center"><b>
		<font face="Cambria">Boarding Fee</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Advances</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Provisional Amount</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Close Amount 
		Credit</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Open Amount Debit</font></b></td>
		<td align="center" width="67" style="text-align: center"><b>Total 
		Concession&nbsp; Amount</b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Total 
		Hostel Bill Amount</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">
		Hostel Fees First 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b>Hostel</b> <b><font face="Cambria">Fees Second 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">
		Hostel Fees Third 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">
		Hostel Fees Fourth 
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
	//$ssql="SELECT distinct `sadmission`,`sname`,`sclass`,`DiscontType`,`routeno`,(select `OriginalAmount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='ADMISSION FEES') as `AdmissionFees`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='Advances') as `Advances`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='ANNUAL CHARGES') as `AnnualCharges`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='CAUTION MONEY (REFUNDABLE)') as `CautionMoney`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT CREDIT') as `ClosedCreditAmount`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT DEBIT') as `ClosedDebitAmount`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES') as `COMPUTERFEES`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='ELECTRICITY /MAINTENANCE FEE') as `MaintainenceFees`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='MAINTENANCE FEE') as `MaintainenceFees`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='MANAGEMENT FEES') as `ManagementFee`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='SCIENCE FEES') as `ScienceFee`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='SMART CLASS') as `SmartClass`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='TRANSPORT CHARGES') as `TransportCharge`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='TUITION FEES') as `TUITION FEES`,(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOSTEL FIRST INSTALLMENT') as `HOSTEL FIRST INSTALLMENT` from `student_master` as `a` where `sadmission`!='' and `sclass`='$Class'";
	$ssql="SELECT distinct `sadmission`,`Name`,`class`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,(select `routeno` from `student_master` where `sadmission`=a.`sadmission`) as `routeno`,(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='ACTIVITY FEE'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='ADMISSION FEES'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='BOARDING FEE'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='CAUTION MONEY (Refundable)'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='ELECTRICITY /MAINTENANCE FEE'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOSTEL AMOUNT CREDIT'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOSTEL AMOUNT DEBIT'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOUSEKEEPING'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='LAUNDRY CHARGES'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='MAINTENANCE FEE'),(select `actualamount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='MEDICAL FEE'),(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOSTEL FIRST INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOSTEL SECOND INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOSTEL THIRD INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student_hostel` where `sadmission`=a.`sadmission` and `feeshead`='HOSTEL FOURTH INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo') from  `fees_student_hostel` as `a` where `class`='$Class' and `sadmission` in (select distinct `sadmission` from `fees_student_hostel`  where `feeshead` in ('HOSTEL FIRST INSTALLMENT','HOSTEL SECOND INSTALLMENT','HOSTEL THIRD INSTALLMENT','FEES FOURTH INSTALLMENT') and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo') order by `sadmission`";
	
	//echo $ssql; 
	//exit();
	$rs=mysql_query($ssql);
				
				$TotalBillWithoutTransport=0;
				$Admission=0;
				$StudentName=0;
				$Class=0;
				$DiscountType=0;
				$RouteNo=0;
				$ActivityFee=0;
				$AdmissionFee=0;
				$BoardingFee=0;
				$CautionMoney=0;
				$ElectricityFee=0;
				$HostelClosedCreditAmount=0;
				$HostelClosedDebitAmount=0;
                $HouseKeeping=0;
				$LaundryCharges=0;
				$MaintainenceFee=0;
				$MedicalFee=0;
				$HostelFirstInstallment=0;
				
		         $cnt=0;
				while($row=mysql_fetch_row($rs))
				{
				$Admission=$row[0];
				$StudentName=$row[1];
				$Class=$row[2];
				$DiscountType=$row[3];
				$RouteNo=$row[4];
				$ActivityFee=$row[5];
				$AdmissionFee=$row[6];
				$BoardingFee=$row[7];
				$CautionMoney=$row[8];
				$ElectricityFee=$row[9];
				$HostelClosedCreditAmount=$row[10];
                $HostelClosedDebitAmount=$row[11];
				
				$HouseKeeping=$row[12];
				$LaundryCharges=$row[13];
				$MaintainenceFee=$row[14];
				$MedicalFee=$row[15];
				$HostelFirstInstallment=$row[16];
				$HostelSecondInstallment=$row[17];
				$HostelThirdInstallment=$row[18];
				$HostelFourthInstallment=$row[19];
				$FinalBillAmount=$FinalBillAmount+$ActivityFee+$AdmissionFee+$BoardingFee+$CautionMoney+$ElectricityFee-$HostelClosedCreditAmount+$HostelClosedDebitAmount+$HouseKeeping+$LaundryCharges+$MaintainenceFee+$MedicalFee;
				$FinalYearlyBalance=$FinalBillAmount-$HostelFirstInstallment-$HostelSecondInstallment-$HostelThirdInstallment-$HostelFourthInstallment;
			    $TotalAdmissionFee=$TotalAdmissionFee+$AdmissionFee;
				$TotalBoardingFee=$TotalBoardingFee+$BoardingFee;
			
				$TotalCautionMoney=$TotalCautionMoney+$CautionMoney;
				$TotalHostelClosedCreditAmount=$TotalHostelClosedCreditAmount+$HostelClosedCreditAmount;
				$TotalHostelClosedDebitAmount=$TotalHostelClosedDebitAmount+$HostelClosedDebitAmount;
                $TotalElectricityFee=$TotalElectricityFee+$ElectricityFee;
				$TotalMaintainenceFee=$TotalMaintainenceFee+$MaintainenceFee;
				$TotalHouseKeeping=$TotalHouseKeeping+$HouseKeeping;
				$TotalLaundryCharges=$TotalLaundryCharges+$LaundryCharges;
				$TotalMedicalFee=$TotalMedicalFee+$MedicalFee;
				$TotalActivityFee=$TotalActivityFee+$ActivityFee;
				$TotalHostelFirstInstallment=$TotalHostelFirstInstallment+$HostelFirstInstallment;
				$TotalHostelSecondInstallment=$TotalHostelSecondInstallment+$HostelSecondInstallment;
				$TotalHostelThirdInstallment=$TotalHostelThirdInstallment+$HostelThirdInstallment;
				$TotalHostelFourthInstallment=$TotalHostelFourthInstallment+$HostelFourthInstallment;
			?>			

	<tr>
		<td width="66"><?php echo $cnt=$cnt+1; ?></td>
		<td width="66"><?php echo $Admission; ?></td>
		<td width="66"><?php echo $StudentName; ?></td>
		<td width="66"><?php echo $Class; ?></td>
		<td width="66"></td>
		<td width="66"></td>
		<td width="66"><?php echo $AdmissionFee; ?></td>
		<td width="66"><?php echo $CautionMoney; ?></td>
		<td width="66"><?php echo $ElectricityFee; ?></td>
		<td width="66"><?php echo $ActivityFee; ?></td>
		<td width="66"><?php echo $MedicalFee; ?></td>
		<td width="66"><?php echo $HouseKeeping; ?></td>
		<td width="66"><?php echo $LaundryCharges; ?></td>
		<td width="66"><?php echo $MaintainenceFee; ?></td>
		<td width="66"><?php echo $BoardingFee; ?></td>
		<td width="66"><?php echo $Advances; ?></td>
		<td width="66"><?php echo $ProvisionalAmount; ?></td>
		<td width="66"><?php echo $HostelClosedCreditAmount; ?></td>
		<td width="66"><?php echo $HostelClosedDebitAmount; ?></td>
		<td width="66"><?php echo $ConsessionAmount; ?></td>
		<td width="66"><?php echo $FinalBillAmount; ?></td>
		<td width="66"><?php echo $HostelFirstInstallment; ?></td>
		<td width="66"><?php echo $HostelSecondInstallment; ?></td>
		<td width="66"><?php echo $HostelThirdInstallment; ?></td>
		<td width="66"><?php echo $HostelFourthInstallment; ?></td>
		<td width="66"><?php echo $FinalYearlyBalance; ?></td>
		

	</tr>
	<?php
	$TotalBillWithTransport=0;
	$TotalBillWithoutTransport=0;
	$FinalBillAmount=0;
	}
}//End of class recordset
	?>

	<tr>
		<td width="330" colspan="5"><b>Total Amount Sum</b></td>
		<td width="66"></td>
		<td width="66"><?php echo $TotalAdmissionFee; ?></td>
		<td width="66"><?php echo $TotalCautionMoney; ?></td>
		<td width="66"><?php echo $TotalElectricityFee; ?></td>
		<td width="66"><?php echo $TotalActivityFee; ?></td>
		<td width="66"><?php echo $TotalMedicalFee; ?></td>
		<td width="66"><?php echo $TotalHouseKeeping; ?></td>
		<td width="66"><?php echo $TotalLaundryCharges; ?></td>
		<td width="66"><?php echo $TotalMaintainenceFee; ?></td>
		<td width="66"><?php echo $TotalBoardingFee; ?></td>
		<td width="66"><?php echo $TotalAdvances; ?></td>
		<td width="66"><?php echo $TotalProvisionalAmount; ?></td>
		<td width="66"><?php echo $TotalHostelClosedCreditAmount; ?></td>
		<td width="66"><?php echo $TotalHostelClosedDebitAmount; ?></td>
		<td width="66"><?php echo $TotalConsessionAmount; ?></td>
		<td width="66"><?php echo $TotalFinalBillAmount; ?></td>
		<td width="66"><?php echo $TotalHostelFirstInstallment; ?></td>
		<td width="66"><?php echo $TotalHostelSecondInstallment; ?></td>
		<td width="66"><?php echo $TotalHostelThirdInstallment; ?></td>
		<td width="66"><?php echo $TotalHostelFourthInstallment; ?></td>
		<td width="66"><?php echo $TotalFinalYearlyBalance; ?></td>
		

	</tr>
	</table>

</body>

</html>