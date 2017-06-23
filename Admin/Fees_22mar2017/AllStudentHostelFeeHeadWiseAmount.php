<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
$ChequeStatus=$_REQUEST["cboChequeStatus"];
$MasterClass=$_REQUEST["MasterClass"];

$ssql="select distinct x.`feeshead` from (SELECT distinct `feeshead`,(select `order` from `fees_head_order` where `feeshead`=a.`feeshead`) as `order` FROM `fees_student` as `a` where `feeshead` not in ('TOTAL RECEIVED')) as `x` order by `order`";
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
	$ssql="select distinct `sadmission`,`class`,`Name`,(select `srollno` from `student_master` where `sadmission`=a.`sadmission`) as `srollno` from `fees_student` as `a` where `class` in (select `class` from `class_master` where `MasterClass`='$MasterClass') order by `class`,CAST(`srollno` AS UNSIGNED)";
}
else
{
	//$ssql="select distinct `sadmission`,`sclass` as `class`,`sname` as `Name`,(select `srollno` from `student_master` where `sadmission`=a.`sadmission`) as `srollno` from `student_master` as `a` order by `class`,CAST(`srollno` AS UNSIGNED)";
	
	$ssql="select distinct `sadmission`,`sclass` as `class`,`sname` as `Name`,`srollno` from `fees` as `a` where `FinancialYear`= '2015' order by `sclass`,CAST(`srollno` AS UNSIGNED)";
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
		<th style="width: 170px;" class="style2"><strong>Actual Q3 Received</strong></th>
		<th style="border-style: solid; border-width: 1px; width: 170px;">
		<span class="style1"><strong>Projected Forth Installment</strong></span><font face="Cambria"></font></th>
		<th style="border-style: solid; border-width: 1px; width: 170px;">
		<span class="style1"><strong>Balance</strong></span><font face="Cambria"></font></th>

		
		<th style="border-style: solid; border-width: 1px; width: 170px;">
		Q4PaidVsProjected</th>

		
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
		
        
        $rsForthProjected=mysql_query("SELECT amount-(SELECT sum(amount) FROM  `fees_student` WHERE  `sadmission` =  a.`sadmission` and `feeshead` in ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','Fees Third Installment','HOSTEL FIRST INSTALLMENT','HOSTEL SECOND INSTALLMENT','HOSTEL Third Installment','Advances','CLOSE AMOUNT CREDIT','TOTAL CONCESSION AMOUNT')) FROM  `fees_student` as `a` WHERE  `sadmission` =  '$sadmission' and `feeshead`='TOTAL BILL AMOUNT'");
		while($rowP4=mysql_fetch_row($rsForthProjected))
		{
			$Q4ProjectedAmt=$rowP4[0];
			$Q4TotalProjectedAmt=$Q4TotalProjectedAmt+$Q4ProjectedAmt;
			break;
		}
		$rsBalance=mysql_query("select `BalanceAmt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' order by `date` desc");
		if(mysql_num_rows($rsBalance)>0)
		{
			while($rowP5=mysql_fetch_row($rsBalance))
			{
				$BalanceAmt=$rowP5[0];
				break;
			}
		}
		else
		{
			$rsBalance=mysql_query("select `BalanceAmt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3'");
			while($rowP5=mysql_fetch_row($rsBalance))
			{
				$BalanceAmt=$rowP5[0]+$Q4ProjectedAmt;
				break;
			}
		}

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
			
			if($FeeHeadName1=="HOSTEL FIRST INSTALLMENT")
				$ssql="select `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'";
			
			elseif($FeeHeadName1=="HOSTEL SECOND INSTALLMENT")
				$ssql="select `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'";
			
			elseif($FeeHeadName1=="HOSTEL Third Installment")
				$ssql="select `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'";
				
			elseif($FeeHeadName1=="HOSTEL FOURTH INSTALLMENT")
				$ssql="select `amountpaid` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'";

			else
				$ssql="select sum(`amount`) from `fees_student` where `sadmission`='$sadmission' and `feeshead`='$FeeHeadName1'";
			
			//$rsFeeHeadValue=mysql_query("select sum(`amount`) from `fees_student` where `sadmission`='$sadmission' and `feeshead`='$FeeHeadName1'");
			$rsFeeHeadValue=mysql_query($ssql);
			while($rowF=mysql_fetch_row($rsFeeHeadValue))
			{
				$FeeHeadValue=$rowF[0];
				$arrTotal[$i]=$arrTotal[$i]+$FeeHeadValue;
				if($FeeHeadName1=="FEES FOURTH INSTALLMENT")
				{$Q4PaidAmount=$FeeHeadValue;}
				break;
			}
		?>
		<td style="border-style: solid; border-width: 1px; width: 28px;" >
		<font face="Cambria"><?php echo $FeeHeadValue;?></font></td>
		<?php
		}
		$rsQ1LateFee=mysql_query("select `AdjustedLateFee`,`cheque_bounce_amt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'");
		$rsQ2LateFee=mysql_query("select `AdjustedLateFee`,`cheque_bounce_amt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'");
		$rsQ3LateFee=mysql_query("select `AdjustedLateFee`,`cheque_bounce_amt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'");
		$rsQ4LateFee=mysql_query("select `AdjustedLateFee`,`cheque_bounce_amt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='2015' and `cheque_status` !='Bounce' and `FeesType`='Hostel'");
		$rowQ1LatFee=mysql_fetch_row($rsQ1LateFee);
		$Q1LateFee=$rowQ1LatFee[0];
		$Q1ChequeBounceAmt=$rowQ1LatFee[1];
		
		$rowQ2LatFee=mysql_fetch_row($rsQ2LateFee);
		$Q2LateFee=$rowQ2LatFee[0];
		$Q2ChequeBounceAmt=$rowQ2LatFee[1];
		
		$rowQ3LatFee=mysql_fetch_row($rsQ3LateFee);
		$Q3LateFee=$rowQ3LatFee[0];
		$Q3ChequeBounceAmt=$rowQ3LatFee[1];
		
		$rowQ4LatFee=mysql_fetch_row($rsQ4LateFee);
		$Q4LateFee=$rowQ4LatFee[0];
		$Q4ChequeBounceAmt=$rowQ4LatFee[1];
		?>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q1LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q1ChequeBounceAmt;?></td>
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q2LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q2ChequeBounceAmt;?></td>
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q3LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q3ChequeBounceAmt;?></td>
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q4LateFee;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q4ChequeBounceAmt;?></td>
		
		
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q3Amount;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $Q4ProjectedAmt;?></td>
	   <td style="border-style: solid; border-width: 1px; width: 170px;" ><?php echo $BalanceAmt;?></td>
	   <td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" ><?php echo ($Q4PaidAmount-$Q4ProjectedAmt);?></td>
	</tr>
	<?php
	$Q4PaidAmount=0;
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
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		<?php echo $Q3TotalAmount;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		<?php echo $Q4TotalProjectedAmt;?></td>
		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		</td>

	

		<td style="border-style: solid; border-width: 1px; width: 170px;" class="style1" >
		&nbsp;</td>

	

	</tr>
	</table>
<br>
<br>
<?php
$ssql="select distinct x.`feeshead` from (SELECT distinct `feeshead`,(select `order` from `fees_head_order` where `feeshead`=a.`feeshead`) as `order` FROM `fees_student` as `a` where `feeshead` not in ('TOTAL RECEIVED')) as `x` order by `order`";
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
?>
<table style="width: 100%;" class="style4">
	<tr>
		<th style="border-style: solid; border-width: 1px; width: 44px;"><font face="Cambria">Sr.No.</font></th>
		<th style="border-style: solid; border-width: 1px; width: 390px;"><font face="Cambria">Class</font></th>
		<th style="border-style: solid; border-width: 1px; width: 391px;">
		<font face="Cambria">Strength</font></th>
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
			$FeeHeadName=$arrFeeHead[$i];
		?>
		<th style="border-style: solid; border-width: 1px; width: 391px;"><font face="Cambria"><?php echo $FeeHeadName;?></font></th>
		<?php
		}
		?>
		
		
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
	$StudentStrength=0;
	$StudentStrengthTotal=0;
	while($rowSt=mysql_fetch_row($rsClass))
	{
		$MasterClass=$rowSt[0];
		$rsStrength=mysql_query("select count(*) from `student_master` where `sclass` in (select `class` from `class_master` where `MasterClass`='$MasterClass')");
		$rowStrength=mysql_fetch_row($rsStrength);
		$StudentStrength=$rowStrength[0];
		$StudentStrengthTotal=$StudentStrengthTotal+$StudentStrength;
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; width: 44px;" >
		<font face="Cambria"><?php echo $srno;?>.</font></td>
		<td style="border-style: solid; border-width: 1px; width: 390px;" >
		<font face="Cambria"><?php echo $MasterClass;?></font></td>
		<td style="border-style: solid; border-width: 1px; width: 391px;" >
		<font face="Cambria"><?php echo $StudentStrength;?></font></td>
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
			$FeeHeadName1=$arrFeeHead[$i];
			$FeeHeadValue="";
			$rsFeeHeadValue=mysql_query("select sum(`amount`) from `fees_student` where `class` in (select distinct `class` from `class_master` where `MasterClass`='$MasterClass') and `feeshead`='$FeeHeadName1'");
			while($rowF=mysql_fetch_row($rsFeeHeadValue))
			{
				$FeeHeadValue=$rowF[0];
				$arrTotal[$i]=$arrTotal[$i]+$FeeHeadValue;
				break;
			}
		?>
		<td style="border-style: solid; border-width: 1px; width: 391px;" >
		<font face="Cambria"><?php echo $FeeHeadValue;?></font></td>
		<?php
		}
		?>
		</tr>
	<?php
	$Q4PaidAmount=0;
	$srno=$srno+1;
	}
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; " colspan="2" class="style3" >
		<strong>Total:</strong></td>
		
		<td style="border-style: solid; border-width: 1px; width: 391px;" class="style1" >
		<?php echo $StudentStrengthTotal;?>
		</td>
		
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
		?>
		<td style="border-style: solid; border-width: 1px; width: 391px;" class="style1" >
		<?php
		echo $arrTotal[$i];
		?></td>
		<?php
		}
		?>

	

	</tr>
	</table>
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