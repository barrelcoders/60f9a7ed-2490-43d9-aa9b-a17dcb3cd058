<?php
include '../../connection.php';
include '../../AppConf.php';
?>
<?php
$sadmission=$_REQUEST['sadmission'];
$StudentClass = $_SESSION['StudentClass'];

$rsCurrentFinancialYr=mysql_query("select `year` from `FYmaster` where `Status`='Active'");
$rowFY=mysql_fetch_row($rsCurrentFinancialYr);
$CurrentFinancialYear=$rowFY[0];
$rsStudent=mysql_query("select distinct `sadmission`,`Name`,`class` from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear'");
//echo "select distinct `sadmission`,`Name`,`class` from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear'";
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
	$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` not in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') and `FeesType`='Regular' group by `feeshead`");
	$rsAnnual=mysql_query("SELECT sum(`amount`) FROM `fees_student1` WHERE `sadmission`='$sadmission' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES')");
	$rsOpeningBalance=mysql_query("select `amount` from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='CLOSE AMOUNT CREDIT'");
	$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `feeshead`='Advances'");
	$rsAlreadyReceived=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT','FEES FOURTH INSTALLMENT')");
	$rsCloseAmtCredit=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('CLOSE AMOUNT CREDIT')");
	$rsCloseAmtDebit=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('CLOSE AMOUNT DEBIT')");
	
	$rsFeeFirstInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FIRST INSTALLMENT')");
	$rsFeeSecondInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES SECOND INSTALLMENT')");
	$rsFeeThirdInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES THIRD INSTALLMENT')");
	$rsFeeFourthInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FOURTH INSTALLMENT')");
?>
<table width="100%" border="0" class="style1" cellspacing="0" cellpadding="0" style="font-family: Times New Roman; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px">
	<tr>
		<td align="center" colspan="4" style="border-style: solid; border-width: 1px">
		<div id="layer1" style="position: absolute; width: 70px; height: 70px; z-index: 1">
			<img src="logo.jpg" height="62px" width="70px"></div>
		<p align="center"><b><font face="Cambria" style="font-size: 11pt">DELHI 
		PUBLIC SCHOOL<br>
		Sector 19,Mathura Road,Faridabad(Haryana)</font></b></p>
		<p align="center"><font face="Cambria" style="font-size: 10pt"><u><b>FEE 
		BILL FOR THE YEAR (<?php echo $CurrentFinancialYear ;?>)</b></u></font></td>
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
		<b><font face="Cambria" size="2">LESS: OPENING BALANCE (PREVIOUS YEAR 
		CREDIT)</font></b></td>
		<td align="right" colspan="2" width="1172px" style="border-right-style: solid; border-right-width: 1px"><font face="Cambria" size="2">
		<?php echo $CloseAmtCredit;?></font></td>
	</tr>
	<tr>
		<td align="left" width="585" style="border-left-style: solid; border-left-width: 1px">
		<b><font face="Cambria" size="2">ADD : OPENING DEBIT (PREVIOUS YEAR 
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
		<td><font face="Cambria" size="2">The amount payable is divided into 4 
		instalments which will be received as per schedule below . No further reminder for the last instalment will be 
		issued. Payment through online only.Please pay instalments as specified below:</font></td>
	</tr>
</table>
<?php
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
	}	
}

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
	}	
}



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
		<td align="center"><font face="Cambria"><font size="2">07-07-2016 - 16-07-2016</font></td>
		<td align="right"><font size="2"><?php echo $FeeSecondInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IIIrd Inst:</font></td>
		<td align="center"><font face="Cambria"><font size="2">01-10-2016 - 10-10-2016</font></td>

		<td align="right"><font size="2"><?php echo $FeeThirdInstallAmt;?></font></font></td>
	</tr>
	<tr>
		<td><font face="Cambria" size="2">IVth Inst:</font></td>
		<td align="center"><font face="Cambria"><font size="2">01-01-2017 - 10-01-2017</font></td>

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
		&nbsp;</font></td>
	</tr>
	<tr>
		<td>
		<p align="right"><font face="Cambria"><b>ACCOUNTANT/CASHIER/CLASS 
		TEACHER</b></font><font face="Cambria" size="2"><br>
		<br>
		&nbsp;</font></td>
	</tr>

</table>
</div>
<p style="page-break-before: always">

</body>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>

</html>
