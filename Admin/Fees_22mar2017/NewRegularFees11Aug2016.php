<?php
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);


$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

$ssql="select distinct `bank_name` from `bank_master` where status='1'";
$rsBank	= mysql_query($ssql);
	
if ($_REQUEST["txtAdmissionNo"] != "")
{
        $AdmissionNo=$_REQUEST["txtAdmissionNo"];
		$sqlStudentDetail= "SELECT `sname`,`sclass`,`srollno`,`FinancialYear`,`previous_sclass`,`Hostel`,`DiscontType` ,`sfathername`,`MotherName`,`routeno` FROM `student_master` where  `sadmission`='$AdmissionNo'";
		
		
		$rs = mysql_query($sqlStudentDetail);
		if (mysql_num_rows($rs) > 0)
		{
			while($row = mysql_fetch_row($rs))
					{
						$sname=$row[0];
						$class=$row[1];					
						$RollNo=$row[2];
						$FinancialYear=$row[3];
						$previous_sclass=$row[4];
						$Hostel=$row[5];
						$StudentDiscountType=$row[6];
						$FatherName=$row[7];
						$MotherName=$row[8];
                        $RouteNo=$row[9];

					}
			if ($FinancialYear == "")
			{$FinancialYear="2014";}
		}
		else
		{
		
			$sqlStudentDtl = "SELECT `sname` , `sclass` , `srollno`,`FinancialYear` FROM `NewStudentAdmission` where  `sadmission`='$AdmissionNo'";
			$rs1 = mysql_query($sqlStudentDtl);
			if (mysql_num_rows($rs1) > 0)
			{
				while($row = mysql_fetch_row($rs1))
						{
							$sname=$row[0];
							$class=$row[1];					
							$RollNo=$row[2];
							$FinancialYear=$row[3];					
						}	
			}
		}
		
	$ssqlClass="SELECT distinct `MasterClass` FROM `class_master` where `class`='$class'";
	
	$rsMClass= mysql_query($ssqlClass);
	while($rowM=mysql_fetch_row($rsMClass))
	{
		$MasterClass=$rowM[0];
		break;
	}
	
	if($FinancialYear==$CurrentFinancialYear)
	{
		$StudentType="new";
	}
	else
	{
		$StudentType="old";
	}

	$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`) from `fees_student1` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` not in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') and `FeesType`='Regular' group by `feeshead`");
	$rsAnnual=mysql_query("SELECT sum(`amount`) FROM `fees_student1` WHERE `sadmission`='$AdmissionNo' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES')");
	$rsOpeningBalance=mysql_query("select `amount` from `fees_student1` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead`='CLOSE AMOUNT CREDIT'");
	$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$AdmissionNo' and `feeshead`='Advances'");
	$rsAlreadyReceived=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT','FEES FOURTH INSTALLMENT')");
	$rsCloseAmtCredit=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('CLOSE AMOUNT CREDIT')");
	$rsCloseAmtDebit=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('CLOSE AMOUNT DEBIT')");
	$rsProvisionalAmount=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('PROVISIONAL AMOUNT')");
	

	$rsFeeFirstInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FIRST INSTALLMENT')");
	$rsFeeSecondInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES SECOND INSTALLMENT')");
	$rsFeeThirdInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES THIRD INSTALLMENT')");
	$rsFeeFourthInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$AdmissionNo' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FOURTH INSTALLMENT')");
	$TotalAmount=0;
	$LateFeeQ1=0;
	$LateFeeQ2=0;
	$LateFeeQ3=0;
	$LateFeeQ4=0;
	while($rowF=mysql_fetch_row($rsFeeHead))
	{
		$FeeHead=$rowF[0];
		$FeeHeadAmount=$rowF[1];
		$TotalAmount=$TotalAmount+$FeeHeadAmount;
	}
	$rowAnnual=mysql_fetch_row($rsAnnual);
	$AnnualChargesAmount=$rowAnnual[0];
	$GrandTotal=$TotalAmount+$AnnualChargesAmount;
	
	$rowAdvance=mysql_fetch_row($rsAdvanceAmt);
	$FeeAmtAdvance=$rowAdvance[0];
	
	$rowAlreadyReceived=mysql_fetch_row($rsAlreadyReceived);
	$AlreadyReceivedAmount=$rowAlreadyReceived[0];
	
	$rowCloseAmtCredit=mysql_fetch_row($rsCloseAmtCredit);
	$CloseAmtCredit=$rowCloseAmtCredit[0];
	$rowCloseAmtDebit=mysql_fetch_row($rsCloseAmtDebit);
	$CloseAmtDebit=$rowCloseAmtDebit[0];
	
	$rowProvisionalAmount=mysql_fetch_row($rsProvisionalAmount);
	$ProvisionalAmount=$rowProvisionalAmount[0];

	
	
	$BalancePayable=$GrandTotal-$FeeAmtAdvance-$AlreadyReceivedAmount-$CloseAmtCredit+$CloseAmtDebit-$ProvisionalAmount;
	
$rowFeeFirstInstall=mysql_fetch_row($rsFeeFirstInstall);
$FeeFirstInstallAmt=$rowFeeFirstInstall[0];
$FeeFirstInstallRceipt=$rowFeeFirstInstall[1];



$rsFirstInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES FIRST INSTALLMENT' and `StudentType`='$StudentType'");
$rowFirstInstallment=mysql_fetch_row($rsFirstInstallment);
$FirstInstallmentAmt=$rowFirstInstallment[0];

if($FeeFirstInstallRceipt =="")
{
	if($BalancePayable>0)
	{
		if($BalancePayable-$FirstInstallmentAmt>=0)
			$FeeFirstInstallAmt=$FirstInstallmentAmt;
		else
			$FeeFirstInstallAmt=$BalancePayable;
		
		$BalancePayable=$BalancePayable-$FeeFirstInstallAmt;
		if($FeeFirstInstallAmt>0)
				$LateFeeQ1=fnlLateFee("Q1");
	}	
}
$FirstInstallAmtPayable=$FeeFirstInstallAmt+$LateFeeQ1;

$rowFeeSecondInstall=mysql_fetch_row($rsFeeSecondInstall);
$FeeSecondInstallAmt=$rowFeeSecondInstall[0];
$FeeSecondInstallRceipt=$rowFeeSecondInstall[1];

$rsSecondInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES SECOND INSTALLMENT' and `StudentType`='$StudentType'");
$rowSecondInstallment=mysql_fetch_row($rsSecondInstallment);
$SecondInstallmentAmt=$rowSecondInstallment[0];
if($FeeSecondInstallRceipt=="")
{
	if($BalancePayable>0)
	{
		if($BalancePayable-$SecondInstallmentAmt>=0)
			$FeeSecondInstallAmt=$SecondInstallmentAmt;
		else
			$FeeSecondInstallAmt=$BalancePayable;
		
		$BalancePayable=$BalancePayable-$FeeSecondInstallAmt;
		if($FeeSecondInstallAmt>0)
				$LateFeeQ2=fnlLateFee("Q2");
	}	
}
$SecondInstallAmtPayable=$FeeSecondInstallAmt+$LateFeeQ2;


$rowFeeThirdInstall=mysql_fetch_row($rsFeeThirdInstall);
$FeeThirdInstallAmt=$rowFeeThirdInstall[0];
$FeeThirdInstallRceipt=$rowFeeThirdInstall[1];
$rsThirdInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES THIRD INSTALLMENT' and `StudentType`='$StudentType'");
$rowThirdInstallment=mysql_fetch_row($rsThirdInstallment);
$ThirdInstallmentAmt=$rowThirdInstallment[0];
if($FeeThirdInstallRceipt=="")
{
	if($BalancePayable>0)
	{
		if($BalancePayable-$ThirdInstallmentAmt>=0)
			$FeeThirdInstallAmt=$ThirdInstallmentAmt;
		else
			$FeeThirdInstallAmt=$BalancePayable;
		
		$BalancePayable=$BalancePayable-$FeeThirdInstallAmt;
		if($FeeThirdInstallAmt>0)
				$LateFeeQ3=fnlLateFee("Q3");
	}	
}
$ThirdInstallAmtPayable=$FeeThirdInstallAmt+$LateFeeQ3;

$rowFeeFourthInstall=mysql_fetch_row($rsFeeFourthInstall);
$FeeTFourthInstallAmt=$rowFeeFourthInstall[0];
$FeeFourthInstallRceipt=$rowFeeFourthInstall[1];
if($FeeFourthInstallRceipt=="")
{
	if($BalancePayable>0)
	{
		$FeeTFourthInstallAmt=$BalancePayable;
		$BalancePayable=$BalancePayable-$FeeTFourthInstallAmt;
	}	
	if($FeeFourthInstallAmt>0)
			$LateFeeQ4=fnlLateFee("Q4");	
}
$FourthInstallAmtPayable=$FeeTFourthInstallAmt+$LateFeeQ4;

//Bounce History******
$Q1Bounce="";
$Q2Bounce="";
$Q3Bounce="";
$Q4Bounce="";
$rsQ1Bounce=mysql_query("select * from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
$rsQ2Bounce=mysql_query("select * from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
$rsQ3Bounce=mysql_query("select * from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
$rsQ4Bounce=mysql_query("select * from `fees` where `sadmission`='$AdmissionNo' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
if(mysql_num_rows($rsQ1Bounce)>0)
	$Q1Bounce="yes";
if(mysql_num_rows($rsQ2Bounce)>0)
	$Q2Bounce="yes";
if(mysql_num_rows($rsQ3Bounce)>0)
	$Q3Bounce="yes";
if(mysql_num_rows($rsQ4Bounce)>0)
	$Q4Bounce="yes";

//History***
$ssqlFeePaymentDetail="SELECT `srno`,`sadmission`, `sname`, `sclass`, `srollno`, `fees_amount`, `InstallmentAmount`, `ActualLateFee`, `AdjustedLateFee`, `cheque_bounce_amt`, `finalamount`, `amountpaid`, `BalanceAmt`, `quarter`, `FinancialYear`, `status`, `receipt`, `date`, `datetime`, `refundamount`, `refunddate`, `cancelamount`, `canceldate`, `ReceiptFileName`, `FeeReceiptCode`, `PaymentMode`, `chequeno`, `cheque_date`, `bankname`, `cheque_status`, `ActualDelayDays`, `AdjustedDelayDays`, `Remarks`, `FeesType`, `SendToBank`, `TxnAmount`, `TxnId`, `TxnStatus`, `PGTxnId` FROM `fees` WHERE `sadmission`='$AdmissionNo' and `FeesType`='Regular' and `FinancialYear`='$CurrentFinancialYear'";
$FeePaymentDetail=mysql_query($ssqlFeePaymentDetail);

    
}	
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script language="javascript">
function ShowReceipt(receiptno)
{
	var myWindow = window.open("ShowReceipt.php?Receipt=" + receiptno ,"","width=700,height=650");	
}
function fnlInstallmentAmount(Qtr)
{	
	if(Qtr=="Q1")
	{
		document.frm1.InstallmentAmount.value =parseFloat(document.frm1.InstallmentWithoutLateFee.value) + parseFloat(document.frm1.txtInstLateFees.value) + parseFloat(document.frm1.txtBounceAmount.value);
		document.frm1.txtFinalInstAmountPaid.value=parseFloat(document.frm1.txtAmountPaid.value) - parseFloat(document.frm1.txtInstLateFees.value)  - parseFloat(document.frm1.txtBounceAmount.value);
	}
	if(Qtr=="Q2")
	{
		document.frm2.InstallmentAmount.value =parseFloat(document.frm2.InstallmentWithoutLateFee.value) + parseFloat(document.frm2.txtInstLateFees.value) + parseFloat(document.frm2.txtBounceAmount.value);
		
		document.frm2.txtFinalInstAmountPaid.value=parseFloat(document.frm2.txtAmountPaid.value) - parseFloat(document.frm2.txtInstLateFees.value) - parseFloat(document.frm2.txtBounceAmount.value);
	}
	if(Qtr=="Q3")
	{
		document.frm3.InstallmentAmount.value =parseFloat(document.frm3.InstallmentWithoutLateFee.value) + parseFloat(document.frm3.txtInstLateFees.value) + parseFloat(document.frm3.txtBounceAmount.value);
		document.frm3.txtFinalInstAmountPaid.value=parseFloat(document.frm3.txtAmountPaid.value) - parseFloat(document.frm3.txtInstLateFees.value) - parseFloat(document.frm3.txtBounceAmount.value);
	}
	if(Qtr=="Q4")
	{
		document.frm4.InstallmentAmount.value =parseFloat(document.frm4.InstallmentWithoutLateFee.value) + parseFloat(document.frm4.txtInstLateFees.value) + parseFloat(document.frm4.txtBounceAmount.value);
		document.frm4.txtFinalInstAmountPaid.value=parseFloat(document.frm4.txtAmountPaid.value) - parseFloat(document.frm4.txtInstLateFees.value) - parseFloat(document.frm4.txtBounceAmount.value);
	}
}
function Validate(Qtr)
{
	if(Qtr=="Q1")
	{
		if(document.frm1.BounceStatus.value=="yes")
		{
			if(document.frm1.txtBounceAmount.value=="")
			{
				alert("Bounce Amount is Mandatory!");
				return;
			}
		}
		if(document.frm1.txtAmountPaid.value=="")
		{
			alert("Please enter Amount Paid");
			return;
		}
		if(document.frm1.InstBankName.value=="")
		{
			alert("Please select bank!");
			return;
		}
		
		document.frm1.submit();
	}
	if(Qtr=="Q2")
	{
		if(document.frm2.BounceStatus.value=="yes")
		{
			if(document.frm2.txtBounceAmount.value=="")
			{
				alert("Bounce Amount is Mandatory!");
				return;
			}
		}
		if(document.frm2.txtAmountPaid.value=="")
		{
			alert("Please enter Amount Paid");
			return;
		}
		if(document.frm2.InstBankName.value=="")
		{
			alert("Please select bank!");
			return;
		}
		document.frm2.submit();
	}
	if(Qtr=="Q3")
	{
		if(document.frm3.BounceStatus.value=="yes")
		{
			if(document.frm3.txtBounceAmount.value=="")
			{
				alert("Bounce Amount is Mandatory!");
				return;
			}
		}
		if(document.frm3.txtAmountPaid.value=="")
		{
			alert("Please enter Amount Paid");
			return;
		}
		if(document.frm3.InstBankName.value=="")
		{
			alert("Please select bank!");
			return;
		}
		document.frm3.submit();
	}
	if(Qtr=="Q4")
	{
		if(document.frm4.BounceStatus.value=="yes")
		{
			if(document.frm4.txtBounceAmount.value=="")
			{
				alert("Bounce Amount is Mandatory!");
				return;
			}
		}
		if(document.frm4.txtAmountPaid.value=="")
		{
			alert("Please enter Amount Paid");
			return;
		}
		if(document.frm4.InstBankName.value=="")
		{
			alert("Please select bank!");
			return;
		}
		document.frm4.submit();
	}
}
</script>
<title>Regular Fees Collection</title>
</head>
<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Regular </font></b><font face="Cambria"><b> Fees Collection</b></font></p>
<hr>
<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse">
	<tr>
		<td width="139"><b><font face="Cambria" style="font-size: 11pt">Adm No</font></b></td>
		<td width="60"><font face="Cambria" style="font-size: 11pt"><?php echo $AdmissionNo;?></font></td>
		<td width="74"><b><font face="Cambria" style="font-size: 11pt">Name</font></b></td>
		<td width="201"><font face="Cambria" style="font-size: 11pt"><?php echo $sname;?></font></td>
		<td width="140"><b><font face="Cambria" style="font-size: 11pt">Father Name</font></b></td>
		<td width="140"><font face="Cambria" style="font-size: 11pt"><?php echo $FatherName;?></font></td>
		<td width="140"><b><font face="Cambria" style="font-size: 11pt">Class</font></b></td>
		<td width="140"><font face="Cambria" style="font-size: 11pt"><?php echo $class;?></font></td>
	</tr>
	<tr>
		<td width="139"><b><font face="Cambria" style="font-size: 11pt">Transport Route</font></b></td>
		<td width="60"><font face="Cambria" style="font-size: 11pt"><?php echo $RouteNo;?></font></td>
		<td width="74"><b><font face="Cambria" style="font-size: 11pt">FY</font></b></td>
		<td width="201"><font face="Cambria" style="font-size: 11pt"><?php echo $CurrentFinancialYear; ?></font></td>
		<td width="140"><b><font face="Cambria" style="font-size: 11pt">Mother Name</font></b></td>
		<td width="140"><font face="Cambria" style="font-size: 11pt"><?php echo $MotherName;?></font></td>
		<td width="140"><b><font face="Cambria" style="font-size: 11pt">Discount Type</font></b></td>
		<td width="140"><font face="Cambria" style="font-size: 11pt"><?php echo $StudentDiscountType;?></font></td>
	</tr>
	<tr>
		<td width="139" ><b>
		<font face="Cambria" style="font-size: 11pt">Hostel</font></b></td>
		<td width="60" ><font face="Cambria" style="font-size: 11pt"><?php echo $Hostel;?></font></td>
		<td width="835"  colspan="6">&nbsp;</td>
	</tr>
</table>
<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse">
	<tr>
		<td align="center" width="1271" colspan="10"><font face="Cambria"><b>Fees 
		Payment</b></font></td>
		<td align="center" width="142">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" ><b>
		<font face="Cambria" style="font-size: 11pt">Instalment</font></b></td>
		<td align="center" ><b>
		<font face="Cambria" style="font-size: 11pt">Instl. Amount</font></b></td>
		<td align="center" ><b>
		<font face="Cambria" style="font-size: 11pt">Late Fees </font>
		</b></td>
		<td align="center" ><b><font face="Cambria">Bounce Amount</font></b></td>
		<td align="center" ><b>
		<font face="Cambria" style="font-size: 11pt">Amt Incl. 
		Late Fee</font></b></td>
		<td align="center" ><b>
		<font face="Cambria" style="font-size: 11pt">Paid Amount</font></b></td>
		<td align="center" ><b>
		<font face="Cambria" style="font-size: 11pt">Final Instalment Amt</font></b></td>
		<td align="center" ><b>
		<font face="Cambria" style="font-size: 11pt">Cheque No</font></b></td>
		<td align="center" width="142"><b>
		<font face="Cambria" style="font-size: 11pt">Cheque Date</font></b></td>
		<td align="center" width="142"><b>
		<font face="Cambria" style="font-size: 11pt">Bank Name</font></b></td>
		<td align="center" width="142"><font face="Cambria"><b>Submit</b></font></td>
	</tr>
	<tr>
		<td width="1253" colspan="11">&nbsp;</td>
	</tr>
	<?php
	if($FeeFirstInstallRceipt =="")
	{
	?>
	<form name ="frm1" method ="post" action ="FeesReceipt.php">
	<input type ="hidden" name ="txtAdmissionNo" value ="<?php echo $AdmissionNo;?>">
	<input type ="hidden" name ="InstallmentName" value ="FEES FIRST INSTALLMENT">
	<input type ="hidden" name ="cboQuarter" value ="Q1">
	<input type ="hidden" name ="BounceStatus" value ="<?php echo $Q1Bounce;?>">
	<tr>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><b><font face="Cambria" style="font-size: 11pt">1st Instl.</font></b></td>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="text" name="InstallmentWithoutLateFee" id="InstallmentWithoutLateFee" size="20" class="text-box" class="text-box" value="<?php echo $FeeFirstInstallAmt; ?>" readonly></font></td>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtInstLateFees" id="txtInstLateFees" size="20" class="text-box"  class="text-box" value="<?php echo $LateFeeQ1;?>" onkeyup="Javascript:fnlInstallmentAmount('Q1');"></font></td>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>>
		<input type="text" name="txtBounceAmount" size="20" class="text-box" value="0" <?php if ($Q1Bounce !="yes") { ?> disabled <?php }?>></td>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="InstallmentAmount" id="InstallmentAmount" size="20" class="text-box" class="text-box" value="<?php echo $FirstInstallAmtPayable;?>" readonly></font></td>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtAmountPaid" id="txtAmountPaid" size="20" class="text-box" value ="0" onkeyup="Javascript:fnlInstallmentAmount('Q1');"></font></td>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtFinalInstAmountPaid" id="txtFinalInstAmountPaid" size="20" class="text-box" readonly></font></td>
		<td <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="text" name="InstChequeNo" id="InstChequeNo" size="20" class="text-box"></font></td>
		<td width="142" <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="date" name="InstChequeDate" id="InstChequeDate" size="20" class="text-box"></font></td>
		
		
		<td width="142" <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><select name="InstBankName" id="InstBankName" class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select>

	
		</td>
		
		
		
		
		<td width="142" <?php if ($Q1Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>>
		<p align="center"><font face="Cambria"><input type ="button" value="Submit" onclick ="Javascript:Validate('Q1');"></font></td>
	</tr>
	</form>
	<?php
	}
	?>
	<tr>
		<td width="1253" colspan="11">&nbsp;</td>
	</tr>
	<?php
	if($FeeSecondInstallRceipt=="")
	{
	?>
	<form name ="frm2" method ="post" action ="FeesReceipt.php">
	<input type ="hidden" name ="txtAdmissionNo" value ="<?php echo $AdmissionNo;?>">
	<input type ="hidden" name ="InstallmentName" value ="FEES SECOND INSTALLMENT">
	<input type ="hidden" name ="cboQuarter" value ="Q2">
	<input type ="hidden" name ="BounceStatus" value ="<?php echo $Q2Bounce;?>">
	<tr>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><b><font face="Cambria" style="font-size: 11pt">2nd 
		Instl.</font></b></td>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="InstallmentWithoutLateFee" id="InstallmentWithoutLateFee" size="20" class="text-box" value="<?php echo $FeeSecondInstallAmt; ?>" readonly></font></td>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtInstLateFees" id="txtInstLateFees" size="20" class="text-box" value="<?php echo $LateFeeQ2;?>" onkeyup="Javascript:fnlInstallmentAmount('Q2');"></font></td>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>>
		<input type="text" name="txtBounceAmount" size="20" class="text-box" value="0" <?php if ($Q2Bounce !="yes") { ?> disabled <?php }?>></td>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="InstallmentAmount" id="InstallmentAmount" size="20" class="text-box" value="<?php echo $SecondInstallAmtPayable;?>" readonly></font></td>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtAmountPaid" id="txtAmountPaid" size="20" class="text-box" value ="0" onkeyup="Javascript:fnlInstallmentAmount('Q2');"></font></td>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtFinalInstAmountPaid" id="txtFinalInstAmountPaid" size="20" class="text-box" readonly></font></td>
		<td <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="text" name="InstChequeNo" id="InstChequeNo" size="20" class="text-box"></font></td>
		<td width="142" <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="date"  name="InstChequeDate" id="InstChequeDate" size="20" class="text-box"></font></td>
		
		<td width="142" <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		
		<select name="InstBankName" id="InstBankName" class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		mysql_data_seek($rsBank, 0);
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select>

	
		</td>		
		
		<td width="142" <?php if ($Q2Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>>
		<p align="center"><font face="Cambria"><input type ="button" value="Submit" onclick ="Javascript:Validate('Q2');"></font></td>
	</tr>
	</form>
	<?php
	}
	?>
	<tr>
		<td width="100%" colspan="11">&nbsp;</td>
	</tr>
	<?php
	if($FeeThirdInstallRceipt=="")
	{
	?>
	<form name ="frm3" method ="post" action ="FeesReceipt.php">
	<input type ="hidden" name ="txtAdmissionNo" value ="<?php echo $AdmissionNo;?>">
	<input type ="hidden" name ="InstallmentName" value ="FEES THIRD INSTALLMENT">
	<input type ="hidden" name ="cboQuarter" value ="Q3">
	<input type ="hidden" name ="BounceStatus" value ="<?php echo $Q3Bounce;?>">
	<tr>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><b><font face="Cambria" style="font-size: 11pt">3rd 
		Instl.</font></b></td>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="InstallmentWithoutLateFee" id="InstallmentWithoutLateFee" size="20" class="text-box"value="<?php echo $FeeThirdInstallAmt; ?>" readonly></font></td>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtInstLateFees" id="txtInstLateFees" size="20" class="text-box" value="<?php echo $LateFeeQ3;?>" onkeyup="Javascript:fnlInstallmentAmount('Q3');"></font></td>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>>
		<input type="text" name="txtBounceAmount" size="20" class="text-box" value="0" <?php if ($Q3Bounce !="yes") { ?> disabled <?php }?>></td>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="InstallmentAmount" id="InstallmentAmount" size="20" class="text-box" value="<?php echo $ThirdInstallAmtPayable;?>" readonly></font></td>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtAmountPaid" id="txtAmountPaid" size="20" class="text-box" onkeyup="Javascript:fnlInstallmentAmount('Q3');"></font></td>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtFinalInstAmountPaid" id="txtFinalInstAmountPaid" size="20" class="text-box" readonly></font></td>
		<td <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="text" name="InstChequeNo" id="InstChequeNo" size="20" class="text-box"></font></td>
		<td width="142" <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="date" name="InstChequeDate" id="InstChequeDate" size="20" class="text-box"></font></td>
		
		<td width="142" <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		
		<select name="InstBankName" id="InstBankName" class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		mysql_data_seek($rsBank, 0);
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select>

	
		</td>		
		
		<td width="142" <?php if ($Q3Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>>
		<p align="center"><font face="Cambria"><input type ="button" value="Submit" onclick ="Javascript:Validate('Q3');"></font></td>
	</tr>
	</form>
	<?php
	}
	?>
	<tr>
		<td width="1253" colspan="11">&nbsp;</td>
	</tr>
	<?php
	if($FeeFourthInstallRceipt=="")
	{
	?>
	<form name ="frm4" method ="post" action ="FeesReceipt.php">
	<input type ="hidden" name ="txtAdmissionNo" value ="<?php echo $AdmissionNo;?>">
	<input type ="hidden" name ="InstallmentName" value ="FEES FOURTH INSTALLMENT">
	<input type ="hidden" name ="cboQuarter" value ="Q4">
	<input type ="hidden" name ="BounceStatus" value ="<?php echo $Q4Bounce;?>">
	<tr>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><b><font face="Cambria" style="font-size: 11pt">4th 
		Instl.</font></b></td>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="InstallmentWithoutLateFee" id="InstallmentWithoutLateFee" size="20" class="text-box" value="<?php echo $FeeTFourthInstallAmt; ?>" readonly></font></td>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtInstLateFees" id="txtInstLateFees" size="20" class="text-box" value="<?php echo $LateFeeQ4;?>" onkeyup="Javascript:fnlInstallmentAmount('Q4');"></font></td>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>>
		<input type="text" name="txtBounceAmount" size="20" class="text-box" value="0" <?php if ($Q4Bounce !="yes") { ?> disabled <?php }?>></td>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="InstallmentAmount" id="InstallmentAmount" size="20" class="text-box" value="<?php echo $FourthInstallAmtPayable;?>" readonly></font></td>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtAmountPaid" id="txtAmountPaid" size="20" class="text-box" onkeyup="Javascript:fnlInstallmentAmount('Q4');"></font></td>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		<input type="text" name="txtFinalInstAmountPaid" id="txtFinalInstAmountPaid" size="20" class="text-box" readonly></font></td>
		<td <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="text" name="InstChequeNo" id="InstChequeNo" size="20" class="text-box"></font></td>
		<td width="142" <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria"><input type="date" name="InstChequeDate" id="InstChequeDate" size="20" class="text-box"></font></td>
		
		<td width="142" <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><font face="Cambria">
		
		<select name="InstBankName" id="InstBankName" class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		mysql_data_seek($rsBank, 0);
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select>

	
		</td>
		

	<td width="142" <?php if ($Q4Bounce =="yes") { ?>bgcolor="#FF8888"<?php }?>><p align="center"><font face="Cambria"><input type ="button" value="Submit" onclick ="Javascript:Validate('Q4');"></font></td>
	</tr>
	</form>
	<?php
	}
	?>
</table>
<p>&nbsp;</p>
<table class="CSSTableGenerator" border="1" style="align:center; width: 100%;">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="17">

		<p style="text-align: center"><font face="Cambria"><b>Payment History</b></font></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria">

		<strong>Adm #</strong></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria">

		<b>Name</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria">

		<b>Class</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria">

		<strong>Receipt #</strong></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<b>Fees Amt</b></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<b>Late Fees</b></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<b>Bounce Amt</b></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<b>Total Amount Paid</b></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<b>Fees Inst Paid</b></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<b>Payment Mode</b></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria">

		<b>Txn Id / Chq No</b></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria">

		<strong>Chq Status</strong></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria">

		<strong>Payment Date</strong></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria">

		<strong>Financial Year</strong></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<b>Refund Amount</b></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<b>Payment Status</b></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria">

		<strong>Print Reciept</strong></font></td>

			</tr>
<?php
$RefundAmount=0;
while($row = mysql_fetch_row($FeePaymentDetail))
	{
				
				$Admission=$row[1];
				$Name=$row[2];
				$Class=$row[3];
                $fees_amount=$row[5];
                $InstallmentAmount=$row[6];
                $late_fees=$row[7];
                $bounce_amount=$row[9];
                $final_amount=$row[10];
                $amountpaid=$row[11];
				$PaymentMode=$row[25];
				$chequeno=$row[26];
				$cheque_status=$row[29];
				$receipt=$row[16];
				$date=$row[17];
				$FinancialYear=$row[14];		
				$AdjustedLateFee=$row[9];		
				$chequestatus=$row[29];	
				$RefundAmount=$row[19];

					
?>
<tr>			
		

		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria">

		<?php echo $Admission; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria">

		<?php echo $Name; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria">

		<?php echo $Class; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria">

		<?php echo $receipt; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><?php echo $fees_amount; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><?php echo $late_fees; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><?php echo $bounce_amount; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $amountpaid; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $InstallmentAmount; ?></td>


	
		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><?php echo $PaymentMode; ?></td>


		


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria">

		<?php echo $chequeno; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria">

		<?php echo $chequestatus; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria">

		<?php echo $date; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria">

		<?php echo $FinancialYear; ?></font></td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			<?php echo $RefundAmount; ?></td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			<?php if($RefundAmount>0)
   echo "Refund Success"; ?></td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			<font face="Cambria">


			<input name="PrintQ1Receipt" type="button" value="Print Reciept" class="text-box" onclick="Javascript:ShowReceipt('<?php echo $receipt; ?>');"><span class="style6">
			</span>
			</font>
		</td>

			</tr>
<?php
$RefundAmount=0;
}
?>

</table>

</body>

</html>
<?php
//---------------------Late Fee Calculation----------------------------------------------------------


function fnlLateFee($FeeSubmissionQuarter)
{
	$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[0];
	        
	$now = time(); // Current Date time
	if ($FeeSubmissionQuarter=="Q1")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		$Dt1 = $CurrentFinancialYear. "-Apr-" . "18";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q2")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		$Dt1 = $CurrentFinancialYear. "-Jul-" . "22";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q3")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		$Dt1 = $CurrentFinancialYear. "-Oct-" . "14";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q4")
	{
		$FeeSubmissionYear=$CurrentFinancialYear+1;
		$Dt1 = $FeeSubmissionYear. "-Jan-" . "13";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	$your_date = strtotime($Dt1);
	$datediff = $now - $your_date;
	if ($datediff > 0)
		$LateDays = floor($datediff/(60*60*24));
	else
		$LateDays = 0;
	
	$LateFee = 0;
	if($LateDays > 0 && $LateDays <=7)
	{
		$LateFee = 100;
	}
	if($LateDays >7)
	{
		$LateFee = 500;
	}
	return $LateFee;
}
?>