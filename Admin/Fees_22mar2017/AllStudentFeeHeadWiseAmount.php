<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
set_time_limit(3000);
$startDate=$_REQUEST["StartDate"];
$endDate=$_REQUEST["EndDate"];
$MasterClass=$_REQUEST["MasterClass"];

$rsCurrentFinancialYr=mysql_query("select `year` from `FYmaster` where `Status`='Active'");
$rowFY=mysql_fetch_row($rsCurrentFinancialYr);
$CurrentFinancialYear=$rowFY[0];

$ssql="select distinct x.`feeshead` from (SELECT distinct `feeshead`,(select `order` from `fees_head_order` where `feeshead`=a.`feeshead`) as `order` FROM `fees_student1` as `a` where `feeshead` not in ('TOTAL RECEIVED') and `financialyear`='$CurrentFinancialYear') as `x` order by `order`";
$rsFeeHead=mysql_query($ssql);
$cnt=0;
	while($row = mysql_fetch_array($rsFeeHead))
   	{
   		$cnt=$cnt+1;
  		$arrFeeHead[$cnt]=$row[0];	
    } 
  $TotalFeeHead=$cnt;
 
if($MasterClass != "All")
{
	//$ssql="select distinct `sadmission`,`sclass` as `class`,`sname` as `Name`,`srollno` from `fees` as `a` where `FinancialYear`= '$CurrentFinancialYear' and `sclass` in (select `class` from `class_master` where `MasterClass`='$MasterClass') order by `sclass`,CAST(`srollno` AS UNSIGNED)";	
	$ssql="select distinct `sadmission`,'' as `class`,'' as `Name`,'' as `srollno` from `fees` as `a` where `FinancialYear`= '$CurrentFinancialYear' and `sclass` in (select `class` from `class_master` where `MasterClass`='$MasterClass') order by `sclass`,CAST(`srollno` AS UNSIGNED)";	
}
else
{
	//$ssql="select distinct `sadmission`,`sclass` as `class`,`sname` as `Name`,`srollno` from `fees` as `a` where  `FinancialYear`= '$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `FeesType`='Regular' order by `sclass`,CAST(`srollno` AS UNSIGNED)";
	$ssql="select distinct `sadmission`,'' as `class`,'' as `Name`,'' as `srollno` from `fees` as `a` where  `FinancialYear`= '$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `FeesType`='Regular' order by `sclass`,CAST(`srollno` AS UNSIGNED)";
} 
$rsStudent=mysql_query($ssql);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Sr</title>
<style type="text/css">

.style1 {
	font-family: Cambria;
}
.style2 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
}

.style3 {
	text-align: right;
	font-family: Cambria;
}

.style4 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}

</style>
</head>

<body>
<div id="MasterDiv">

<p>&nbsp;</p>
<p align="center"><img src="../images/logo.png" height="100" width="400"><br><b><font face="cambria" size="2"><?php echo $SchoolAddress; ?></font></b><br><br></p>

<hr>

<br>
<table style="border-collapse: collapse; width: 1222px;" width="100%" border="1">
	<tr>
		<th style="border-style: solid; border-width: 1px; width: 104px;"><font face="Cambria">Sr.No.</font></th>
		<th style="border-style: solid; border-width: 1px; width: 239px;"><font face="Cambria">Admission No</font></th>
		<th style="border-style: solid; border-width: 1px; width: 90px;"><font face="Cambria">Class</font></th>
		<th style="border-style: solid; border-width: 1px; width: 101px;"><font face="Cambria">Name</font></th>
		<th style="border-style: solid; border-width: 1px; width: 130px;"><font face="Cambria">Roll No</font></th>
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
			$FeeHeadName=$arrFeeHead[$i];
		?>
		<th style="border-style: solid; border-width: 1px; width: 28px;"><font face="Cambria"><?php echo $FeeHeadName;?></font></th>
		<?php
		}
		?>
			<th style="width: 170px;" class="style2"><font face="Cambria">Total Bill Amount </font></th>

		<th style="width: 170px;" class="style2"><font face="Cambria">Q1Late Fee </font></th>
		<th style="width: 170px;" class="style2"><font face="Cambria">Q1 Cheque 
		Bounce Amt</font></th>
		<th style="width: 170px;" class="style2"><font face="Cambria">Q2Late Fee</font></th>
		<th style="width: 170px;" class="style2"><font face="Cambria">Q2 Cheque 
		Bounce Amt</font></th>
		<th style="width: 170px;" class="style2"><font face="Cambria">Q3Late Fee</font></th>
		<th style="width: 170px;" class="style2"><font face="Cambria">Q3 Cheque 
		Bounce Amt</font></th>
		<th style="width: 170px;" class="style2"><font face="Cambria">Q4Late Fee</font></th>
		<th style="width: 170px;" class="style2"><font face="Cambria">Q4 Cheque 
		Bounce Amt</font></th>

		
		<th style="width: 170px;" class="style2"><font face="Cambria">Q1Actual</font></th>

		
		<th style="width: 170px;" class="style2"><font face="Cambria">Q2Actual</font></th>

		
		<th style="width: 170px;" class="style2">Q3Actual</th>

		
		<th style="width: 170px;" class="style2"><font face="Cambria">Q4Actual</font></th>

		
		<th style="width: 170px;" class="style2"><font face="Cambria">
		Credit/Debit Balance</font></th>

		
	</tr>
	<?php
	for($i=1;$i <= count($arrFeeHead);$i++)
	{
			$arrTotal[$i]=0;
	}
	$Q3TotalAmount=0;
	$Q4TotalProjectedAmt=0;
	$Q3TotalLateFee=0;
	$Q3TotalChequeBounceAmt=0;
	$Q4PaidAmount=0;
	
	$srno=1;
	while($rowSt=mysql_fetch_row($rsStudent))
	{
		$sadmission=$rowSt[0];
		$class=$rowSt[1];
		$Name=$rowSt[2];
		$RollNo=$rowSt[3];
		$Q3Amount=0;
		$Q3LateFee=0;
		$Q3ChequeBounceAmt=0;
		$Q4ProjectedAmt=0;
		$BalanceAmt=0;
		$Q4PaidAmount=0;
		$TotalBillAmount=0;
		
		/*
		$rsActualQ3Received=mysql_query("SELECT (`fees_amount`-`AdjustedLateFee`) as `Q3Amount`,`AdjustedLateFee`,`cheque_bounce_amt` FROM  `fees` WHERE `sadmission`='$sadmission' and `quarter` =  'Q3' and `cheque_status` !='Bounce'");
		while($rowQ3=mysql_fetch_row())
		{
			$Q3Amount=$rowQ3[0];
			$Q3LateFee=$rowQ3[1];
			$Q3ChequeBounceAmt=$rowQ3[2];
			
			$Q3TotalAmount=$Q3TotalAmount+$Q3Amount;
			$Q3TotalLateFee=$Q3TotalLateFee+$Q3LateFee;
			$Q3TotalChequeBounceAmt=$Q3TotalChequeBounceAmt+$Q3ChequeBounceAmt;
			break;
		}
		*/
		
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; width: 104px;" >
		<font face="Cambria"><?php echo $srno;?>.</font></td>
		<td style="border-style: solid; border-width: 1px; width: 239px;" >
		<font face="Cambria"><?php echo $sadmission;?></font></td>
		<td style="border-style: solid; border-width: 1px; width: 90px;" >
		<font face="Cambria"><?php echo $class;?></font></td>
		<td style="border-style: solid; border-width: 1px; width: 101px;" >
		<font face="Cambria"><?php echo $Name;?></font></td>
		<td style="border-style: solid; border-width: 1px; width: 130px;" >
		<font face="Cambria"><?php echo $RollNo;?></font></td>
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
			$FeeHeadName1=$arrFeeHead[$i];
			$FeeHeadValue="";
			
			if($FeeHeadName1=="FEES FIRST INSTALLMENT")
			{
				
				//$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `cheque_status` !='Bounce' and `FeesType`='Regular'";
				$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `FeesType`='Regular'";
			}
			elseif($FeeHeadName1=="FEES SECOND INSTALLMENT")
			{			
				//$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `cheque_status` !='Bounce' and `FeesType`='Regular'";
				$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `FeesType`='Regular'";
			}
			elseif($FeeHeadName1=="FEES THIRD INSTALLMENT")
			{			
				//$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `cheque_status` !='Bounce' and `FeesType`='Regular'";
				$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `FeesType`='Regular'";
			}
			elseif($FeeHeadName1=="FEES FOURTH INSTALLMENT")
			{
				//$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `cheque_status` !='Bounce' and `FeesType`='Regular'";
				$ssql="select sum(`amountpaid`) as `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `date`>='$startDate' and `date`<='$endDate' and `FeesType`='Regular'";
			}
			else
			{			
				$ssql="select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `feeshead`='$FeeHeadName1' and `financialyear`='$CurrentFinancialYear'";
			}
			
			//$rsFeeHeadValue=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `feeshead`='$FeeHeadName1' and `financialyear`='$CurrentFinancialYear'");
			$rsFeeHeadValue=mysql_query($ssql);
			while($rowF=mysql_fetch_row($rsFeeHeadValue))
			{
				$FeeHeadValue=$rowF[0];
				$arrTotal[$i]=$arrTotal[$i]+$FeeHeadValue;
				if($FeeHeadName1=="FEES FOURTH INSTALLMENT")
				{$Q4PaidAmount=$FeeHeadValue;}
				
				if($FeeHeadName1=="FEES FIRST INSTALLMENT")
				{
					$FeeFirstInstall=$FeeHeadValue;	
				}
				elseif($FeeHeadName1=="FEES SECOND INSTALLMENT")
				{	
					$FeeSecondInstall=$FeeHeadValue;
				}
				elseif($FeeHeadName1=="FEES THIRD INSTALLMENT")
				{	
					$FeeThirdInstall=$FeeHeadValue;
				}
				elseif($FeeHeadName1=="FEES FOURTH INSTALLMENT")
				{
					$FeeFourthInstall=$FeeHeadValue;
				}
				elseif($FeeHeadName1=="TOTAL BILL AMOUNT")
				{
					$TotalBillAmt=$FeeHeadValue;
				}
				elseif($FeeHeadName1=="Advances")
				{
					$Advances=$FeeHeadValue;
				}
				elseif($FeeHeadName1=="TOTAL CONCESSION AMOUNT")
				{
					$ConcessionAmt=$FeeHeadValue;
				}
				elseif($FeeHeadName1=="CLOSE AMOUNT CREDIT")
				{
					$CloseAmountCredit=$FeeHeadValue;
				}
				$TotalBillAmount=$TotalBillAmount+$FeeHeadValue;
				break;
			}
		?>
		<td style="border-style: solid; border-width: 1px; width: 28px;" >
		<font face="Cambria"><?php echo $FeeHeadValue;?></font></td>
		<?php
		}
		/*
		$rsQ1LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' and `FeesType`='Regular'");
		$rsQ2LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' and `FeesType`='Regular'");
		$rsQ3LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' and `FeesType`='Regular'");
		$rsQ4LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' and `FeesType`='Regular'");
		*/
		$rsQ1LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `FeesType`='Regular'");
		$rsQ2LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `FeesType`='Regular'");
		$rsQ3LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `FeesType`='Regular'");
		$rsQ4LateFee=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `FeesType`='Regular'");
		$rowQ1LatFee=mysql_fetch_row($rsQ1LateFee);
		
		$rsQ1ChequeBounceAmt=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear'  and `FeesType`='Regular'");
		$rsQ2ChequeBounceAmt=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `FeesType`='Regular'");
		$rsQ3ChequeBounceAmt=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `FeesType`='Regular'");
		$rsQ4ChequeBounceAmt=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `sadmission`='$sadmission' and `date`>='$startDate' and `date`<='$endDate' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `FeesType`='Regular'");
		
		
		$rowQ1ChequeBounceAmt=mysql_fetch_row($rsQ1ChequeBounceAmt);
		$rowQ2ChequeBounceAmt=mysql_fetch_row($rsQ2ChequeBounceAmt);
		$rowQ3ChequeBounceAmt=mysql_fetch_row($rsQ3ChequeBounceAmt);
		$rowQ4ChequeBounceAmt=mysql_fetch_row($rsQ4ChequeBounceAmt);
		
		$Q1LateFee=$rowQ1LatFee[0];
		$Q1ChequeBounceAmt=$rowQ1ChequeBounceAmt[0];
		
		$rowQ2LatFee=mysql_fetch_row($rsQ2LateFee);
		$Q2LateFee=$rowQ2LatFee[0];
		$SumOfQ2LateFee=$SumOfQ2LateFee+$Q2LateFee;
		$Q2ChequeBounceAmt=$rowQ2ChequeBounceAmt[0];
		
		$rowQ3LatFee=mysql_fetch_row($rsQ3LateFee);
		$Q3LateFee=$rowQ3LatFee[0];
		$Q3ChequeBounceAmt=$rowQ3ChequeBounceAmt[0];
		
		$rowQ4LatFee=mysql_fetch_row($rsQ4LateFee);
		$Q4LateFee=$rowQ4LatFee[0];
		$Q4ChequeBounceAmt=$rowQ4ChequeBounceAmt[0];
		?>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $TotalBillAmount;?></td>

		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q1LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q1ChequeBounceAmt;?></td>
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q2LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q2ChequeBounceAmt;?></td>
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q3LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q3ChequeBounceAmt;?></td>
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q4LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q4ChequeBounceAmt;?></td>
		
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" >
		<?php 
		//$ActualFeeFirstInstall=$FeeFirstInstall-$Q1LateFee-$Q1ChequeBounceAmt;
		$ActualFeeFirstInstall=$FeeFirstInstall-$Q1LateFee;
		$TotalActualFeeFirstInstall=$TotalActualFeeFirstInstall+$ActualFeeFirstInstall;
		echo $ActualFeeFirstInstall;
		?>
		</td>
		
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" >
		<?php 
		//$ActualFeeSecondInstall=$FeeSecondInstall-$Q2LateFee-$Q2ChequeBounceAmt;
		$ActualFeeSecondInstall=$FeeSecondInstall-$Q2LateFee;
		$TotalActualFeeSecondInstall=$TotalActualFeeSecondInstall+$ActualFeeSecondInstall;
		echo $ActualFeeSecondInstall;
		?>
		</td>
		
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" >
		
		<?php 
		//$ActualFeeThirdInstall=$FeeThirdInstall-$Q3LateFee-$Q3ChequeBounceAmt;
		$ActualFeeThirdInstall=$FeeThirdInstall-$Q3LateFee;
		$TotalActualFeeThirdInstall=$TotalActualFeeThirdInstall+$ActualFeeThirdInstall;
		echo $ActualFeeThirdInstall;
		?>
		
		
		
		<?php 
		/*
		$ActualFeeThirdInstall=$FeeThirdInstall-$Q3LateFee-$Q3ChequeBounceAmt;
		$TotalActualFeeThirdInstall=$TotalActualFeeThirdInstall+$ActualFeeThirdInstall;
		echo $ActualFeeThirdInstall;
		*/
		?>
		
		</td>
		
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" >
		
		<?php 
		/*
		$ActualFeeFourthInstall=$FeeFourthInstall-$Q4LateFee-$Q4ChequeBounceAmt;
		$TotalActualFeeFourthInstall=$TotalActualFeeFourthInstall+$ActualFeeFourthInstall;
		echo $ActualFeeFourthInstall;
		*/
		?>
		
		
		<?php 
		$ActualFeeFourthInstall=$FeeFourthInstall-$Q4LateFee;
		$TotalActualFeeFourthInstall=$TotalActualFeeFourthInstall+$ActualFeeFourthInstall;
		echo $ActualFeeFourthInstall;
		?>
		</td>
		
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" >
		<?php
		$CreditDebitBalance=$TotalBillAmt-($ActualFeeFirstInstall+$ActualFeeSecondInstall+$ActualFeeThirdInstall+$ActualFeeFourthInstall+$Advances+$ConcessionAmt+$CloseAmountCredit);
		echo $CreditDebitBalance;
		?>
		</td>
		
		
	</tr>
	<?php
	$Q4PaidAmount=0;
			$FeeFirstInstall=0;
			$FeeSecondInstall=0;
			$FeeThirdInstall=0;
			$FeeFourthInstall=0;
			$TotalBillAmt=0;
			$Advances=0;
			$ConcessionAmt=0;
			$CloseAmountCredit=0;

		$Q1LateFee=0;
		$Q2LateFee=0;
		$Q3LateFee=0;
		$Q4LateFee=0;
	
	$srno=$srno+1;
	}
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; " colspan="5" class="style3" >
		<strong>Total:</strong></td>
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
		?>
		<td style="border-style: solid; border-width: 1px; width: 28px;" class="style1" >
		<?php
		echo $arrTotal[$i];
		?>
		</td>
		<?php
		}
		?>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		<?php echo $SumOfQ2LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>

	

		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		<?php echo $TotalActualFeeFirstInstall;?></td>

	

		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		<?php echo $TotalActualFeeSecondInstall;?></td>

	

		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		<?php echo $TotalActualFeeThirdInstall;?></td>

	

		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		<?php echo $TotalActualFeeFourthInstall;?></td>

	

		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>

	

	</tr>
	</table>
<br>
<br>
<?php
/*
$ssql="select distinct x.`feeshead` from (SELECT distinct `feeshead`,(select `order` from `fees_head_order` where `feeshead`=a.`feeshead`) as `order` FROM `fees_student1` as `a` where `feeshead` not in ('TOTAL RECEIVED')) as `x` order by `order`";
$rsFeeHead=mysql_query($ssql);
$cnt=0;
	while($row = mysql_fetch_array($rsFeeHead))
   	{
   		$cnt=$cnt+1;
  		$arrFeeHead[$cnt]=$row[0];	
    } 
  $TotalFeeHead=$cnt;
 
if($MasterClass == "All")
{
	$ssql="select distinct distinct `MasterClass` from `class_master`";
}
else
{
	$ssql="select distinct distinct `MasterClass` from `class_master` where `MasterClass`='$MasterClass'";
} 
$rsClass=mysql_query($ssql);
*/
?>
<!--
<table style="width: 100%;" class="style4">
	<tr>
		<th style="border-style: solid; border-width: 1px; width: 44px;"><font face="Cambria">Sr.No.</font></th>
		<th style="border-style: solid; border-width: 1px; width: 390px;"><font face="Cambria">Class</font></th>
		<th style="border-style: solid; border-width: 1px; width: 391px;">
		<font face="Cambria">Strength</font></th>
		<?php
		//for($i=1;$i <= count($arrFeeHead);$i++)
		//{
			//$FeeHeadName=$arrFeeHead[$i];
		?>
		<th style="border-style: solid; border-width: 1px; width: 391px;"><font face="Cambria"><?php echo $FeeHeadName;?></font></th>
		<?php
		//}
		?>
		
		
	</tr>
	<?php
	//for($i=1;$i <= count($arrFeeHead);$i++)
	//{
	//		$arrTotal[$i]=0;
	//}
	//$Q3TotalAmount=0;
	/*
	$Q4TotalProjectedAmt=0;
	$Q3TotalLateFee=0;
	$Q3TotalChequeBounceAmt=0;
	$Q4PaidAmount=0;
	
	$srno=1;
	$StudentStrength=0;
	$StudentStrengthTotal=0;
	while($rowSt=mysql_fetch_row($rsClass))
	{
		$MasterClass=$rowSt[0];
		$rsStrength=mysql_query("select count(*) from `student_master` where `sclass` in (select `class` from `class_master` where `MasterClass`='$MasterClass')");
		$rowStrength=mysql_fetch_row($rsStrength);
		$StudentStrength=$rowStrength[0];
		$StudentStrengthTotal=$StudentStrengthTotal+$StudentStrength;
		*/
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; width: 44px;" >
		<font face="Cambria"><?php //echo $srno;?>.</font></td>
		<td style="border-style: solid; border-width: 1px; width: 390px;" >
		<font face="Cambria"><?php //echo $MasterClass;?></font></td>
		<td style="border-style: solid; border-width: 1px; width: 391px;" >
		<font face="Cambria"><?php //echo $StudentStrength;?></font></td>
		<?php
		/*
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
			$FeeHeadName1=$arrFeeHead[$i];
			$FeeHeadValue="";
			$rsFeeHeadValue=mysql_query("select sum(`amount`) from `fees_student1` where `class` in (select distinct `class` from `class_master` where `MasterClass`='$MasterClass') and `feeshead`='$FeeHeadName1'");
			while($rowF=mysql_fetch_row($rsFeeHeadValue))
			{
				$FeeHeadValue=$rowF[0];
				$arrTotal[$i]=$arrTotal[$i]+$FeeHeadValue;
				break;
			}
		*/
		?>
		<td style="border-style: solid; border-width: 1px; width: 391px;" >
		<font face="Cambria"><?php //echo $FeeHeadValue;?></font></td>
		<?php
		//}
		?>
		</tr>
	<?php
	//$Q4PaidAmount=0;
	//$srno=$srno+1;
	//}
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; " colspan="2" class="style3" >
		<strong>Total:</strong></td>
		
		<td style="border-style: solid; border-width: 1px; width: 391px;" class="style1" >
		<?php //echo $StudentStrengthTotal;?>
		</td>
		
		<?php
		/*
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
		*/
		?>
		<td style="border-style: solid; border-width: 1px; width: 391px;" class="style1" >
		<?php
		//echo $arrTotal[$i];
		?></td>
		<?php
		//}
		?>

	

	</tr>
	</table>
	-->
&nbsp;</div>
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


</body>

</html>