<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$MasterClass=$_REQUEST["cboClass"];

$DateTo=$_REQUEST["DateTo"];
$DateFrom=$_REQUEST["DateFrom"];

if($MasterClass!="Select One" && ($DateFrom=''))
{
	
	$rsClass=mysql_query("select distinct `class` from `class_master` where `MasterClass`='$MasterClass' order by `class`");
}
elseif($MasterClass!="Select One" && ($DateFrom!=''))
{

$rsClass=mysql_query("select distinct `class` from `class_master`  order by `class`");
}
else
{
$rsClass=mysql_query("select distinct `class` from `class_master`  order by `class`");

}
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Fees Forecast Report</title>
<script language="javascript">

function ShowEdit(Admission)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditFeesStudent.php?Admission=" + Admission ,"","width=700,height=650");
}
</script>
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
		<td align="center" width="67" style="text-align: center"><b>Computer 
		Optional</b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Total Without 
		Transport Charge</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Transport Charges</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Total With 
		Transport</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Advances</font></b></td>
		<td align="center" width="66" style="text-align: center"><b>Provisional 
		Amount</b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Close Amount 
		Credit</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Open Amount Debit</font></b></td>
		<td align="center" width="67" style="text-align: center"><b>Total 
		Concession&nbsp; Amount</b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Total Bill Amount</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees First 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees Second 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees Third 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Fees Fourth 
		Instalment</font></b></td>
		<td align="center" width="67" style="text-align: center"><b>
		<font face="Cambria">Refund Amount</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Closing Amount 
		Debit</font></b></td>
		<td align="center" width="67" style="text-align: center"><b><font face="Cambria">Edit</font></b></td>

	</tr>
	
				<?php
while($rowClass=mysql_fetch_row($rsClass))
{
	$Class=$rowClass[0];
	//$Class=$_REQUEST["cboClass"];
	$FYYear=$_REQUEST["cboFinancialYear"];
	//$ssql="SELECT `sadmission`,`sname`,`sclass`,`DiscontType`,`routeno`,(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ADMISSION FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='Advances'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ANNUAL CHARGES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CAUTION MONEY (REFUNDABLE)'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT CREDIT'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT DEBIT'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MAINTENANCE FEE'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MANAGEMENT FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SCIENCE FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SMART CLASS'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TRANSPORT CHARGES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TUITION FEES'),(select sum(discountamount) from `fees_student1` where `sadmission`=a.`sadmission`),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES FIRST INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES (OPTIONAL)'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES SECOND INSTALLMENT'and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES THIRD INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES FOURTH INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='PROVISIONAL AMOUNT'),(select sum(`RefundAmount`) from `fees_student1` where `sadmission`=a.`sadmission`) from `student_master` as `a` where `sadmission`!='' and `sclass`='$Class' order by `sadmission`";
	
	$ssql="SELECT `sadmission`,`sname`,`sclass`,`DiscontType`,`routeno`,(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ADMISSION FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='Advances'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ANNUAL CHARGES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CAUTION MONEY (REFUNDABLE)'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT CREDIT'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT DEBIT'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MAINTENANCE FEE'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MANAGEMENT FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SCIENCE FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SMART CLASS'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TRANSPORT CHARGES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TUITION FEES'),(select sum(discountamount) from `fees_student1` where `sadmission`=a.`sadmission`),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES FIRST INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES (OPTIONAL)'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES SECOND INSTALLMENT'and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES THIRD INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='FEES FOURTH INSTALLMENT' and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo'),(select `amount` from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='PROVISIONAL AMOUNT'),(select sum(`RefundAmount`) from `fees_student1` where `sadmission`=a.`sadmission`) from `student_master` as `a` where `sadmission`!='' and `sclass`='$Class' and `sadmission` in (select distinct `sadmission` from `fees_student1` where `feeshead` in ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT','FEES FOURTH INSTALLMENT') and `InstallmentDate`>='$DateFrom' and `InstallmentDate`<='$DateTo') order by `sadmission`";
	
	

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
				$FeesFirstInstallment=0;
				$ComputerOptional=0;
				$ProvisonalAmount=0;
			$FeesSecondInstallment=0;
$FeesThirdInstallment=0;
$FeesFourthInstallment=0;


				
				$cnt=0;
				while($row=mysql_fetch_row($rs))
				{
				$cnt=$cnt+1;
				$RefundAmount="";
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
				$ConsessionAmount=$row[18];
				$FeesFirstInstallment=$row[19];
				$ComputerOptional=$row[20];
				$FeesSecondInstallment=$row[21];
				$FeesThirdInstallment=$row[22];
                $FeesFourthInstallment=$row[23];
                $ProvisonalAmount=$row[24];
                $RefundAmount=$row[25];




				$TotalBillWithoutTransport=$TotalBillWithoutTransport+$AnnualCharges+$CautionMoney+$ComputerFees+$ManagementFee+$ScienceFee+$SmartClass+$TutionFee+$AdmissionFee+$ComputerOptional;
				$TotalBillWithTransport=$TotalBillWithTransport+$AnnualCharges+$CautionMoney+$ComputerFees+$ManagementFee+$ScienceFee+$SmartClass+$TutionFee+$TransportCharge+$AdmissionFee+$ComputerOptional;
				$FinalBillAmount=$TotalBillWithTransport-$Advances+$ClosedDebitAmount-$ClosedCreditAmount-$ProvisonalAmount;
				$FinalYearlyBalance=$FinalBillAmount-$FeesFirstInstallment-$FeesSecondInstallment-$FeesThirdInstallment-$FeesFourthInstallment-$ConsessionAmount+$RefundAmount;
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
				$TotalFeesFirstInstallment=$TotalFeesFirstInstallment+$FeesFirstInstallment;
				$TotalComputerOptional=$TotalComputerOptional+$ComputerOptional;
				$TotalFeesSecondInstallment=$TotalFeesSecondInstallment+$FeesSecondInstallment;
				$TotalFeesThirdInstallment=$TotalFeesThirdInstallment+$FeesThirdInstallment;
                 $TotalFeesFourthInstallment=$TotalFeesFourthInstallment+$FeesFourthInstallment;
                 $TotalProvisonalAmount=$TotalProvisonalAmount+$ProvisonalAmount;
                 $TotalConsessionAmount=$TotalConsessionAmount+$ConsessionAmount;
                 $TotalRefundAmount=$TotalRefundAmount+$RefundAmount;


			?>			

	<tr>
		<td width="66"><?php echo $cnt; ?></td>
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
		<td width="66"><?php echo $ComputerOptional; ?></td>
		<td width="66"><?php echo $TotalBillWithoutTransport; ?></td>
		<td width="66"><?php echo $TransportCharge; ?></td>
		<td width="66"><?php echo $TotalBillWithTransport; ?></td>
		<td width="66"><?php echo $Advances; ?></td>
		<td width="66"><?php echo $ProvisonalAmount; ?></td>
		<td width="66"><?php echo $ClosedCreditAmount; ?></td>
		<td width="66"><?php echo $ClosedDebitAmount; ?></td>
		<td width="66"><?php echo $ConsessionAmount; ?></td>
		<td width="66"><?php echo $FinalBillAmount; ?></td>
		<td width="66"><?php echo $FeesFirstInstallment; ?></td>
		<td width="66"><?php echo $FeesSecondInstallment; ?></td>
		<td width="66"><?php echo $FeesThirdInstallment; ?></td>
		<td width="66"><?php echo $FeesFourthInstallment; ?></td>
		<td width="66"><?php echo $RefundAmount; ?></td>
		<td width="66"><?php echo $FinalYearlyBalance; ?></td>
		<td width="66"><a href="Javascript:ShowEdit(<?php echo $Admission ?>);" class="style3">Edit</a></td>

		

	</tr>
	<?php
	$TotalBillWithTransport=0;
	$TotalBillWithoutTransport=0;
	$ComputerOptional=0;
	$RefundAmount=0;
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
		<td width="66"><?php echo $TotalComputerOptional; ?></td>
		<td width="66"><?php echo $TotalBillWithoutTransport; ?></td>
		<td width="66"><?php echo $TotalTransportCharge; ?></td>
		<td width="66"><?php echo $TotalBillWithTransport; ?></td>
		<td width="66"><?php echo $TotalAdvances; ?></td>
		<td width="66"><?php echo $TotalProvisonalAmount; ?></td>
		<td width="66"><?php echo $TotalClosedCreditAmount; ?></td>
		<td width="66"><?php echo $TotalClosedDebitAmount; ?></td>
		<td width="66"><?php echo $TotalConsessionAmount; ?></td>
		<td width="66"><?php echo $TotalFinalBillAmount; ?></td>
		<td width="66"><?php echo $TotalFeesFirstInstallment; ?></td>
		<td width="66"><?php echo $TotalFeesSecondInstallment; ?></td>
		<td width="66"><?php echo $TotalFeesThirdInstallment; ?></td>
		<td width="66"><?php echo $TotalFeesFourthInstallment; ?></td>
		<td width="66"><?php echo $TotalRefundAmount; ?></td>
		<td width="66"><?php echo $TotalFinalYearlyBalance; ?></td>
			<td width="66"></td>

		

	</tr>
	</table>

</body>

</html>