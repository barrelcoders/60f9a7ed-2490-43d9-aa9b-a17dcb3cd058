<?php
include '../../connection.php';
include '../../AppConf.php';
?>
<?php
$Class=$_REQUEST["Class"];
$rsCurrentFinancialYr=mysql_query("select `year` from `FYmaster` where `Status`='Active'");
$rowFY=mysql_fetch_row($rsCurrentFinancialYr);
$CurrentFinancialYear=$rowFY[0];
$rsStudent=mysql_query("select distinct `sadmission`,`Name`,`class`,`HostelFY` from `fees_student_hostel` where `class`='$Class' and `financialyear`='$CurrentFinancialYear'");
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>DELHI PUBLIC SCHOOL Sector 19</title>
</head>

<body>
<?php
$Currdate=Date("d-m-Y");
while($rowStudent=mysql_fetch_row($rsStudent))
{
	$sadmission=$rowStudent[0];
	$Name=$rowStudent[1];
	$sclass=$rowStudent[2];
	$FinancialYear=$row[3];
	if($FinancialYear==$CurrentFinancialYr)
	{
		$StudentType="new";
	}
	else
	{
		$StudentType="old";
	}

	
	$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` not in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') and `FeesType`='Regular' group by `feeshead`");
	$rsAnnual=mysql_query("SELECT sum(`amount`) FROM `fees_student_hostel` WHERE `sadmission`='$sadmission' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES')");
	$rsOpeningBalance=mysql_query("select `amount` from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='CLOSE AMOUNT CREDIT'");
	$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `feeshead`='Advances'");
	$rsAlreadyReceived=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT','FEES FOURTH INSTALLMENT')");
	

	$rsFeeFirstInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FIRST INSTALLMENT')");
	$rsFeeSecondInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL SECOND INSTALLMENT')");
	$rsFeeThirdInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL THIRD INSTALLMENT')");
	$rsFeeFourthInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FOURTH INSTALLMENT')");
?>
<table width="100%" border="0" class="style1" cellspacing="0" cellpadding="0" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td align="center" colspan="4" style="border-style: solid; border-width: 1px">
		<div id="layer1" style="position: absolute; width: 70px; height: 70px; z-index: 1">
			<img src="http://dpsfsis.com/Admin/Fees/logo.jpg" height="62px" width="70px"></div>
		<p align="center"><b><font face="Cambria" style="font-size: 11pt">DELHI 
		PUBLIC SCHOOL<br>
		Sector 19,Mathura Road,Faridabad(Haryana)</font></b></p>
		<p align="center"><font face="Cambria" style="font-size: 10pt"><u><b>FEE 
		BILL FOR THE YEAR (2015-16)</b></u></font></td>
	</tr>
	<tr>
		<td align="center" style="border-left-style: solid; border-left-width: 1px">
		<p align="left"><b><font face="Cambria" style="font-size: 9pt">ADMISSION 
		NO.: F-<?php echo $sadmission;?></font></b></td>
		<td align="center">
		<p align="left"><b><font face="Cambria" style="font-size: 9pt">NAME:&nbsp;<?php echo $Name;?>
		</font></b></td>
		<td align="left"><b><font face="Cambria" style="font-size: 9pt">CLASS:&nbsp;<?php echo $sclass;?>
		</font></b></td>
		<td align="center" style="border-right-style: solid; border-right-width: 1px">
		<p align="left"><b><font face="Cambria" style="font-size: 9pt">DATE:<?php echo $Currdate;?>
		</font></b></td>
	</tr>
	<tr>
		<td height="24" colspan="4" style="border-style: solid; border-width: 1px">
		&nbsp;</td>
	</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" class="style1" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; width: 100%">
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<b><font face="Cambria" size="2">DESCRIPTION</font></b></td>
		<td align="right" width="1172" style="border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">&nbsp;</td>
		<td align="right" width="586" style="border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<b><font face="Cambria" size="2">AMOUNT(RS)</font></b></td>
	</tr>
	<?php
	$TotalAmount=0;
	while($rowF=mysql_fetch_row($rsFeeHead))
	{
		$FeeHead=$rowF[0];
		$FeeHeadAmount=$rowF[1];
		$TotalAmount=$TotalAmount+$FeeHeadAmount;
	?>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<font face="Cambria" size="2"><?php echo $FeeHead;?></font></td>
		<td align="right" width="1172" style="border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="right" width="586" style="border-right-style: solid; border-right-width: 1px">
		<font face="Cambria" size="2"><?php echo $FeeHeadAmount;?></font></td>
	</tr>
	<?php
	}
	$rowAnnual=mysql_fetch_row($rsAnnual);
	$AnnualChargesAmount=$rowAnnual[0];
	$GrandTotal=$TotalAmount+$AnnualChargesAmount;
	
	$rowAdvance=mysql_fetch_row($rsAdvanceAmt);
	$FeeAmtAdvance=$rowAdvance[0];
	
	$rowAlreadyReceived=mysql_fetch_row($rsAlreadyReceived);
	$AlreadyReceivedAmount=$rowAlreadyReceived[0];
	$BalancePayable=$GrandTotal-$FeeAmtAdvance-$AlreadyReceivedAmount;
	?>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<font face="Cambria" size="2">Annual Charge</font></td>
		<td align="right" width="1172" style="border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="right" width="586" style="border-right-style: solid; border-right-width: 1px">
		<font size="2" face="Cambria"><?php echo $AnnualChargesAmount;?></font></td>
	</tr>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px">
		<b><font face="Cambria" size="2">GRAND TOTAL</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px">
		<font face="Cambria" size="2"><b><?php echo $GrandTotal;?></b></font></td>
	</tr>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<b><font face="Cambria" size="2">LESS: OPENING BALANCE</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px"><font face="Cambria" size="2">
		E</font></td>
	</tr>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<b><font face="Cambria" size="2">LESS: ADVANCES</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px">
		<font face="Cambria" size="2"><?php echo $FeeAmtAdvance; ?></font></td>
	</tr>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<b><font face="Cambria" size="2">LESS: ALREADY RECEIVED</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px">
		<font face="Cambria" size="2">
		<?php echo $AlreadyReceivedAmount;?></font></td>
	</tr>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<b><font face="Cambria" size="2">(BALANCE PAYABLE)</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<font face="Cambria" size="2"><b><?php echo $BalancePayable;?></b></font></td>
	</tr>
</table>
<table width="100%" border="0" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; border-collapse: collapse">
	<tr>
		<td><font face="Cambria" size="2">The amount payable is divided into 4 
		installments which will be received as per schedule below .The 
		DD/Cheque/Pay order shall be drawn in favour of DELHI PUBLIC SCHOOL, 
		Faridabad. Admission no., class,mobile no and name of the student shall 
		be written on the reverse of each DD/Cheque/Pay order. Please return 
		Pay-in-slip (printed below) along with the DD/Cheque/Pay order for all 
		installments. No further reminder for the last installment will be 
		issued, Please pay installments as specified below:</font></td>
	</tr>
</table>
<?php
$rowFeeFirstInstall=mysql_fetch_row($rsFeeFirstInstall);
$FeeFirstInstallAmt=$rowFeeFirstInstall[0];
$FeeFirstInstallRceipt=$rowFeeFirstInstall[1];


$rsFirstInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYr' and `Installment`='HOSTEL FIRST INSTALLMENT' and `StudentType`='$StudentType'");
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
	}	
}

$rowFeeSecondInstall=mysql_fetch_row($rsFeeSecondInstall);
$FeeSecondInstallAmt=$rowFeeSecondInstall[0];
$FeeSecondInstallRceipt=$rowFeeSecondInstall[1];
$rsSecondInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYr' and `Installment`='HOSTEL SECOND INSTALLMENT' and `StudentType`='$StudentType'");
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
	}	
}



$rowFeeThirdInstall=mysql_fetch_row($rsFeeThirdInstall);
$FeeThirdInstallAmt=$rowFeeThirdInstall[0];
$FeeThirdInstallRceipt=$rowFeeThirdInstall[1];
$rsThirdInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYr' and `Installment`='HOSTEL THIRD INSTALLMENT' and `StudentType`='$StudentType'");
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
	}	
}

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
}

?>
<table width="100%" border="1" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; border-collapse: collapse">
	<tr>
		<td>&nbsp;</td>
		<td align="center"><b><font face="Cambria" size="2">Receipt Details With 
		Date</font></b></td>
		<td align="right"><b><font face="Cambria" size="2">AMOUNT (Rs)</font></b></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">Ist Inst:</font></td>
		<td align="center"><font face="Cambria"><font size="2"><?php echo $FeeFirstInstallRceipt;?></font></td>
		<td align="right"><font size="2"><?php echo $FeeFirstInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IInd Inst:</font></td>
		<td align="center"><font face="Cambria"><font size="2"><?php echo $FeeSecondInstallRceipt;?></font></td>
		<td align="right"><font size="2"><?php echo $FeeSecondInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IIIrd Inst:</font></td>
		<td align="center"><font face="Cambria"><font size="2"><?php echo $FeeThirdInstallRceipt;?></font></td>
		<td align="right"><font size="2"><?php echo $FeeThirdInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IVth Inst:</font></td>
		<td align="center"><font face="Cambria"><font size="2"><?php echo $FeeFourthInstallRceipt;?></font></td>
		<td align="right"><font size="2"><?php echo $FeeTFourthInstallAmt;?></font></font></td>
	</tr>
</table>
<table width="100%" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td><font face="Cambria" size="2">Fee after last due date will be 
		accepted with late fees of Rs.100 for 10 working days after this Rs.500 
		will be charged for another 10 working days, after which student's name 
		will be struck off from the school rolls.<br>
		<br>
		For all future correspondence please quote Admission No.<span class="Apple-converted-space">&nbsp;</span><b>F-4907.</b><span class="Apple-converted-space">&nbsp;</span>Please 
		preserve all the receipts, circulars and correspondence for any future 
		references. No DD/CHEQUE/PAY order will be accepted without the 
		Pay-in-slip.<span class="Apple-converted-space">&nbsp;</span><b>No cash will 
		be accepted.</b></font></td>
	</tr>
</table>
<table width="100%" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td align="left"><b><font face="Cambria" size="2">Duplicate bill will 
		not be issued</font></b></td>
		<td align="right"><b><font face="Cambria" size="2">
		ACCOUNTANT/CASHIER/CLASS TEACHER</font></b></td>
	</tr>
</table>
<p align="center" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
<font face="Cambria" size="2">........................CUT FROM HERE AND RETURN 
WITH DD/CHEQUE/PAY ORDER........................</font></p>
<table width="100%" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td colspan="3" align="left">
		<p align="center"><b><font face="Cambria" size="2">Pay-In-Slip (Quarter 
		- Q4)</font></b></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">ADMISSION No.:F-<?php echo $sadmission;?></font></td>
		<td><font face="Cambria" size="2">NAME : <?php echo $Name;?></font></td>
		<td><font face="Cambria" size="2">CLASS : <?php echo $sclass;?></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">Date of Receipt: January 04 2016</font></td>
		<td><font face="Cambria" size="2">To January 13 2017</font></td>
		<td><font face="Cambria" size="2">AMOUNT: <?php echo $FeeTFourthInstallAmt;?> </font></td>
	</tr>
	<tr>
		<td colspan="3" align="right"><font face="Cambria" size="2">SIGNATURE OF 
		FATHER/GUARDIAN</font></td>
	</tr>
</table>
<p align="center" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
<font face="Cambria" size="2">........................CUT FROM HERE AND RETURN 
WITH DD/CHEQUE/PAY ORDER........................</font></p>
<table width="100%" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td colspan="3" align="left">
		<p align="center"><b><font face="Cambria" size="2">Pay-In-Slip (Quarter 
		- Q3)</font></b></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">ADMISSION No.:F-<?php echo $sadmission;?></font></td>
		<td><font face="Cambria" size="2">NAME : <?php echo $Name;?></font></td>
		<td><font face="Cambria" size="2">CLASS : <?php echo $sclass;?></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">Date of Receipt: October 05 2015</font></td>
		<td><font face="Cambria" size="2">To October 14 2016</font></td>
		<td><font face="Cambria" size="2">AMOUNT: <?php echo $FeeThirdInstallAmt;?> </font></td>
	</tr>
	<tr>
		<td colspan="3" align="right"><font face="Cambria" size="2">SIGNATURE OF 
		FATHER/GUARDIAN</font></td>
	</tr>
</table>
<p align="center" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
<font face="Cambria" size="2">........................CUT FROM HERE AND RETURN 
WITH DD/CHEQUE/PAY ORDER........................</font></p>
<table width="100%" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td colspan="3" align="left">
		<p align="center"><b><font face="Cambria" size="2">Pay-In-Slip (Quarter 
		- Q2)</font></b></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">ADMISSION No.: <?php echo $sadmission;?></font></td>
		<td><font face="Cambria" size="2">NAME : <?php echo $Name;?></font></td>
		<td><font face="Cambria" size="2">CLASS : <?php echo $sclass;?></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">Date of Receipt: July 13 2015</font></td>
		<td><font face="Cambria" size="2">To July 22 2016</font></td>
		<td><font face="Cambria" size="2">AMOUNT: <?php echo $FeeSecondInstallAmt;?> </font></td>
	</tr>
	<tr>
		<td colspan="3" align="right"><font face="Cambria" size="2">SIGNATURE OF 
		FATHER/GUARDIAN</font></td>
	</tr>
</table>
<?php
}
?>
</body>

</html>
