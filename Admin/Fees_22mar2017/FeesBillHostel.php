<?php
include '../../connection.php';
include '../../AppConf.php';
?>
<?php
//$Class=$_REQUEST["Class"];
$sadmission=$_REQUEST["sadmission"];

$rsSt=mysql_query("select `sclass`,`DiscontType`,`MasterClass` from `student_master` where `sadmission`='$sadmission'");
$rowSt=mysql_fetch_row($rsSt);
$Class=$rowSt[0];
$DiscountType=$rowSt[1];
$MasterClass=$rowSt[2];
$rsCurrentFinancialYr=mysql_query("select `year`,`FinancialYearName` from `FYmaster` where `Status`='Active'");
$rowFY=mysql_fetch_row($rsCurrentFinancialYr);
$CurrentFinancialYear=$rowFY[0];
$CurrentFinancialSession=$rowFY[1];

if($sadmission !="")
{
	$rsStudent=mysql_query("select distinct `sadmission`,`Name`,`class` from `fees_student_hostel` where `class`='$Class' and `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear'");
}
else
{
	echo "<br><center><b>Session Expired";
	exit();
	//$rsStudent=mysql_query("select distinct `sadmission`,`Name`,`class` from `fees_student_hostel` where `class`='$Class' and `financialyear`='$CurrentFinancialYear'");
}
//echo "select distinct `sadmission`,`Name`,`class` from `fees_student_hostel` where `class`='$Class' and `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear'";
//exit();
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>DELHI PUBLIC SCHOOL Sector 19</title>
</head>

<body>
<div id="MasterDiv">
<?php
$Currdate=Date("d-m-Y");
while($rowStudent=mysql_fetch_row($rsStudent))
{
	$sadmission=$rowStudent[0];
	$Name=$rowStudent[1];
	$sclass=$rowStudent[2];
	$rsSt=mysql_query("select `FinancialYear` from `student_master` where `sadmission`='$sadmission'");
	$rowSt=mysql_fetch_row($rsSt);
	$FinancialYear=$rowSt[0];
	if($FinancialYear==$CurrentFinancialYear)
	{
		$StudentType="new";
	}
	else
	{
		$StudentType="old";
	}
	$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType`='Hostel' group by `feeshead`");
	$rsOpeningBalance=mysql_query("select `amount` from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='HOSTEL AMOUNT CREDIT'");
	$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `feeshead`='Advances'");
	$rsAlreadyReceived=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FIRST INSTALLMENT','HOSTEL SECOND INSTALLMENT','HOSTEL THIRD INSTALLMENT','HOSTEL FOURTH INSTALLMENT')");
	$rsCloseAmtCredit=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL AMOUNT CREDIT')");
	$rsCloseAmtDebit=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL AMOUNT DEBIT')");
	
	$rsFeeFirstInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' limit 1),(select date_format(`date`,'%d-%m-%Y') from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FIRST INSTALLMENT')");
	$rsFeeSecondInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' limit 1),(select date_format(`date`,'%d-%m-%Y') from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL SECOND INSTALLMENT')");
	$rsFeeThirdInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' limit 1),(select date_format(`date`,'%d-%m-%Y') from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL THIRD INSTALLMENT')");
	$rsFeeFourthInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' limit 1),(select date_format(`date`,'%d-%m-%Y') from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FOURTH INSTALLMENT')");
?>
<table width="100%" border="0" class="style1" cellspacing="0" cellpadding="0" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td align="center" colspan="4" style="border-style: solid; border-width: 1px">
		<div id="layer1" style="position: absolute; width: 70px; height: 70px; z-index: 1">
			<img src="http://dpsfsis.com/Admin/Fees/logo.jpg" height="62px" width="70px"></div>
		<p align="center"><b><font face="Cambria" style="font-size: 11pt">DELHI 
		PUBLIC SCHOOL<br>
		Sector 19,Mathura Road,Faridabad(Haryana)</font></b></p>
		<p align="center"><font face="Cambria" style="font-size: 10pt"><u><b>
		HOSTEL FEE 
		BILL FOR THE YEAR (<?php echo $CurrentFinancialSession;?>)</b></u></font></td>
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
	
	$rowCloseAmtCredit=mysql_fetch_row($rsCloseAmtCredit);
	$CloseAmtCredit=$rowCloseAmtCredit[0];
	$rowCloseAmtDebit=mysql_fetch_row($rsCloseAmtDebit);
	$CloseAmtDebit=$rowCloseAmtDebit[0];
	
	$BalancePayable=$GrandTotal-$FeeAmtAdvance-$AlreadyReceivedAmount-$CloseAmtCredit+$CloseAmtDebit;
	?>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<font face="Cambria" size="2">ANNUAL CHARGES</font></td>
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
		<b><font face="Cambria" size="2">LESS: OPENING CREDIT (PREVIOUS YEAR 
		CREDIT)</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px"><font face="Cambria" size="2">
		<?php echo $CloseAmtCredit;?></font></td>
	</tr>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<b><font face="Cambria" size="2">ADD : CLOSING DEBIT (PREVIOUS YEAR 
		DEBIT)</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px">
		<font face="Cambria" size="2"><?php echo $CloseAmtDebit;?></font></td>
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
		<td>
		<table width="100%" border="0" style="font-family: &quot;Times New Roman&quot;; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; border-collapse: collapse;">
			<tr>
				<td><font face="Cambria" size="2">The amount payable is divided 
				into 4 instalments which will be received as per schedule below 
				. No further reminder for the last instalment will be issued. 
				Payment through online only.Please pay instalments as specified 
				below:</font></td>
			</tr>
		</table>
&nbsp;</td>
	</tr>
</table>
<?php
$rowFeeFirstInstall=mysql_fetch_row($rsFeeFirstInstall);
$FeeFirstInstallAmt=$rowFeeFirstInstall[0];
$FeeFirstInstallRceipt=$rowFeeFirstInstall[1];
$FeeFirstInstallRceiptDate=$rowFeeFirstInstall[2];

$rsFirstInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='HOSTEL FIRST INSTALLMENT' and `StudentType`='$StudentType' and `FeesType`='Hostel'");
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
$FeeSecondInstallRceiptDate=$rowFeeSecondInstall[2];


$rsSecondInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='HOSTEL SECOND INSTALLMENT' and `StudentType`='$StudentType' and `FeesType`='Hostel'");
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
$FeeThirdInstallRceiptDate=$rowFeeThirdInstall[2];

$rsThirdInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='HOSTEL THIRD INSTALLMENT' and `StudentType`='$StudentType' and `FeesType`='Hostel'");
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
$FeeFourthInstallRceiptDate=$rowFeeFourthInstall[2];

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
		<td align="center"><font size="2" face="Cambria"><?php 
		
		echo $FeeFirstInstallRceipt." (".$FeeFirstInstallRceiptDate.")";
		
		
		
		
		?></font></td>
		<td align="right"><font size="2"><?php echo $FeeFirstInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IInd Inst:</font></td>
		<!--<td align="center"><font face="Cambria"><font size="2"><?php echo $FeeSecondInstallRceipt;?></font></td>--->
		<td align="center"><font face="Cambria"><font size="2">
		<?php 
		if($FeeSecondInstallRceipt !="")
		echo $FeeSecondInstallRceipt." (".$FeeSecondInstallRceiptDate.")";
		
		else
		{
		  if(($MasterClass=='11COM')||($MasterClass=='11ART')||($MasterClass=='11NMED')||($MasterClass=='11MED'))
            {
          
		   echo "07-08-2016 - 17-08-2016";
		    }
		    else
		    {
		    	echo "10-07-2016 - 22-07-2016";

		    }
		    
		    }
		
		?></font></td>
		<td align="right"><font size="2"><?php echo $FeeSecondInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IIIrd Inst:</font></td>
		<!--<td align="center"><font face="Cambria"><font size="2"></font></td>-->
		<td align="center"><font face="Cambria"><font size="2">
		<?php 
		if($FeeThirdInstallRceipt !="")
		echo $FeeThirdInstallRceipt." (".$FeeThirdInstallRceiptDate.")";
		else
		echo "01-10-2016 - 10-10-2016";
		?>
		</font></td>

		<td align="right"><font size="2"><?php echo $FeeThirdInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IVth Inst:</font></td>
		<!---<td align="center"><font face="Cambria"><font size="2"></font></td>--->
		<td align="center"><font face="Cambria"><font size="2">
		<?php 
		if($FeeFourthInstallRceipt != "")
		echo $FeeFourthInstallRceipt." (".$FeeFourthInstallRceiptDate.")";
		else
		echo "01-01-2017 - 10-01-2017";
		?>
		
		</font></td>

		<td align="right"><font size="2"><?php echo $FeeTFourthInstallAmt;?></font></font></td>
	</tr>
</table>
<table width="100%" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td>
		<table width="100%" style="font-family: &quot;Times New Roman&quot;; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
			<tr>
				<td><font face="Cambria" size="2">Fee after last due date will 
				be accepted with late fees of Rs.100 for 10 working days after 
				this Rs.500 will be charged for another 10 working days, after 
				which student's name will be struck off from the school rolls.</font></td>
			</tr>
		</table>
&nbsp;</td>
	</tr>
</table>
<table width="100%" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td align="right"><b><font face="Cambria" size="2">
		ACCOUNTANT/CASHIER/CLASS TEACHER</font></b></td>
	</tr>
</table>
<?php
}
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a>
</font> 
	
</div>

</body>

</html>