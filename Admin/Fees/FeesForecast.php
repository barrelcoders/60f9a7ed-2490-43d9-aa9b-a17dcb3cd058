<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["cboClass"] !="")
{
	$Class=$_REQUEST["cboClass"];
	$SelectedAdmissionId=$_REQUEST["txtAdmissionId"];
	if($Class =="All")
	{
		//$rsStudent=mysql_query("select `sadmission`,`sname`,`sclass`,`sfathername` from `student_master` where `sadmission` in (select distinct `sadmission` from `fees_student`)");
		$ssql="select `sadmission`,`sname`,`sclass`,`sfathername` from `student_master` where `sadmission` in (select distinct `sadmission` from `fees_student`)";
	}
	else
	{
		//$rsStudent=mysql_query("select `sadmission`,`sname`,`sclass`,`sfathername` from `student_master` where `sclass` in (select distinct `class` from `class_master` where `MasterClass`='$Class') and `sadmission` in (select distinct `sadmission` from `fees_student`)");
		$ssql="select `sadmission`,`sname`,`sclass`,`sfathername` from `student_master` where `sclass` in (select distinct `class` from `class_master` where `MasterClass`='$Class') and `sadmission` in (select distinct `sadmission` from `fees_student`)";
	}
	if($SelectedAdmissionId !="")
	{
		$ssql=$ssql." and `sadmission`='$SelectedAdmissionId'";
	}	
	$rsStudent=mysql_query($ssql);
}
$rsClass=mysql_query("select distinct `MasterClass` from `class_master` order by `MasterClass`");
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Fees Forecast</title>
<style type="text/css">
.style2 {
	font-family: Cambria;
	text-align: center;
}
</style>
</head>

<body>

<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><b>Fees Forecast</b></font></p>
<hr>
<p>&nbsp;</p>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
<form method="post">
	<tr>
		<td><font face="Cambria">Select Class</font></td>
		<td>
		
			<select name="cboClass" id="cboClass" style="height: 22px">
			<option selected="" value="All">All</option>
			<?php
			while($rowC=mysql_fetch_row($rsClass))
			{
				$MasterClass=$rowC[0];
			?>
			<option value="<?php echo $MasterClass;?>"><?php echo $MasterClass;?></option>
			<?php
			}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face="Cambria">Enter Admission No</font></td>
		<td><font face="Cambria">
		<input type="text" name="txtAdmissionId" id="txtAdmissionId" size="20" class="text-box"></font></td>
	</tr>
	<tr>
		<td colspan="2">
		<p align="center">
		<font face="Cambria">
		<input type="submit" value="Submit" name="B1" style="font-weight: 700" class="text-box"></font></td>
	</tr>
	</form>
</table>
<?php
if($_REQUEST["cboClass"] !="")
{
?>
<p align="center">&nbsp;</p>
<table width="100%" cellspacing="0" cellpadding="0" class="cSSTableGenerator">
	
	<tr>
		<td bgcolor="#008000" align="center" colspan="17" style="text-align: center">
		<p style="text-align: center">
		<font size="15" face="Cambria"><img src="../images/logo.png" height="90" width="300"></font></td>
	</tr>
	<tr>
		<td bgcolor="#008000" align="center" colspan="17" style="text-align: center">
		<font color="FFFFFF" face="Cambria"><b><?php echo $SchoolAddress ;?></b></font></td>
	</tr>
	<tr>
		<td bgcolor="#008000" align="center" colspan="17" style="text-align: center">&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font color="#FFFFFF" face="Cambria">Sr No</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Adm No</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Name</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Class</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Father Name</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q1 Payable</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q1 Paid</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q2 Payable</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q2 Paid</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q3 Payable</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q3 Paid</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q4 Payable</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Q4 Paid</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Advance </font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Concession </font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Total Payable</font></b></td>
		<td bgcolor="#008000" align="center" style="text-align: center">
		<b>
		<font face="Cambria" color="#FFFFFF">Total Paid</font></b></td>
	</tr>
	<?php
	$recCount=1;
		$TotalQ1PayableAmt=0;
		$TotalQ2PayableAmt=0;
		$TotalQ3PayableAmt=0;
		$TotalQ4PayableAmt=0;
		
		$Q1TotalActualPaidAmt=0;
		$Q2TotalActualPaidAmt=0;
		$Q3TotalActualPaidAmt=0;
		$Q4TotalActualPaidAmt=0;
		$TotalAdvanceAmt=0;
		$TotalConcessionAmt=0;
		
	while($row=mysql_fetch_row($rsStudent))
	{
		$sadmission=$row[0];
		$sname=$row[1];
		$sclass=$row[2];
		$sfather=$row[3];
		$YearlyTotalPayableAmt=0;
		$YearlyConcessionAmt=0;
		$FeeAdvanceAmtPaid=0;
		$Q1PayableAmt=0;
		
		
		$Q1PaidAmt=0;
		$Q1ActualPaidAmt=0;
		$Q2ActualPaidAmt=0;
		$Q3ActualPaidAmt=0;
		$Q4ActualPaidAmt=0;
		
		$Q2PayableAmt=0;
		$Q2PaidAmt=0;
		
		$Q3PayableAmt=0;
		$Q3PaidAmt=0;
		
		$Q4PayableAmt=0;
		$Q4PaidAmt=0;
		
		
		
		//Total Concession
		$rsYearlyConcessionAmt=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` !='Hostel' and `feeshead`='Total Concession Amount'");
		while($rowC=mysql_fetch_row($rsYearlyConcessionAmt))
			{
				$YearlyConcessionAmt=$rowC[0];
				break;
			}
		//Advance Paid Amount
		$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student` where `sadmission`='$sadmission' and `feeshead`='Advances'");
		if (mysql_num_rows($rsAdvanceAmt) > 0)
		{
			while($rowAdvance=mysql_fetch_row($rsAdvanceAmt))
			{
				$FeeAdvanceAmtPaid=$rowAdvance[0];
				break;
			}
		}


		//Yearly Total Payable
			$rsYearlyPayable=mysql_query("select sum(amount) from `fees_student` where `FeesType`='Regular' and `sadmission`='$sadmission'");
			while($rowP=mysql_fetch_row($rsYearlyPayable))
			{
				$YearlyTotalPayableAmt=$rowP[0];
				break;
			}
			
			$YearlyTotalPayableAmt=$YearlyTotalPayableAmt-$YearlyConcessionAmt;
			
			$TotalPaidAmt=0;
		//Q1 Payable Calculation************
			$rsFeeStudent=mysql_query("select `amount` from `fees_student` where `sadmission`='$sadmission' and `feeshead`='FEES FIRST INSTALLMENT'");
			if (mysql_num_rows($rsFeeStudent) > 0)
			{
				while($rowQ1=mysql_fetch_row($rsFeeStudent))
				{
					$Q1PayableAmt=$rowQ1[0];
					$Q1PaidAmt=$rowQ1[0];
					$Q1ActualPaidAmt=$rowQ1[0];
					$TotalPaidAmt=$TotalPaidAmt+$Q1PaidAmt;
					break;
				}
			}
			else
			{
				$rsFeeStudent1=mysql_query("select `amount` from `fees_master` where `quarter`='Q1' and `feeshead`='TUITION FEES'");
				while($rowQ1=mysql_fetch_row($rsFeeStudent1))
				{
					if(($YearlyTotalPayableAmt-$TotalPaidAmt)>$rowQ1[0])
					{
						$Q1PayableAmt=$rowQ1[0];
						$Q1PaidAmt=$rowQ1[0];
					}
					else
					{
						$Q1PayableAmt=($YearlyTotalPayableAmt-$TotalPaidAmt);
						$Q1PaidAmt=($YearlyTotalPayableAmt-$TotalPaidAmt);
					}
					$TotalPaidAmt=$TotalPaidAmt+$Q1PaidAmt;
					break;
				}
			}
		//Q2 Payable Calculation************
			$rsFeeStudent=mysql_query("select `amount` from `fees_student` where `sadmission`='$sadmission' and `feeshead`='FEES SECOND INSTALLMENT'");
			if (mysql_num_rows($rsFeeStudent) > 0)
			{
				while($rowQ2=mysql_fetch_row($rsFeeStudent))
				{
					$Q2PayableAmt=$rowQ2[0];
					$Q2PaidAmt=$rowQ2[0];
					$Q2ActualPaidAmt=$rowQ2[0];
					$TotalPaidAmt=$TotalPaidAmt+$Q2PaidAmt;
					break;
				}
			}
			else
			{
				$rsFeeStudent1=mysql_query("select `amount` from `fees_master` where `quarter`='Q2' and `feeshead`='TUITION FEES'");
				while($rowQ2=mysql_fetch_row($rsFeeStudent1))
				{
					if(($YearlyTotalPayableAmt-$TotalPaidAmt)>$rowQ2[0])
					{
						$Q2PayableAmt=$rowQ2[0];
						$Q2PaidAmt=$rowQ2[0];
					}
					else
					{
						$Q2PayableAmt=($YearlyTotalPayableAmt-$TotalPaidAmt);
						$Q2PaidAmt=($YearlyTotalPayableAmt-$TotalPaidAmt);
					}
				
					$TotalPaidAmt=$TotalPaidAmt+$Q2PaidAmt;
					break;
				}
			}
		//Q3 Payable Calculation************
			$rsFeeStudent=mysql_query("select `amount` from `fees_student` where `sadmission`='$sadmission' and `feeshead`='FEES THIRD INSTALLMENT'");
			if (mysql_num_rows($rsFeeStudent) > 0)
			{
				while($rowQ3=mysql_fetch_row($rsFeeStudent))
				{
					$Q3PayableAmt=$rowQ3[0];
					$Q3PaidAmt=$rowQ3[0];
					$Q3ActualPaidAmt=$rowQ3[0];
					$TotalPaidAmt=$TotalPaidAmt+$Q3PaidAmt;
					break;
				}
			}
			else
			{
				$rsFeeStudent1=mysql_query("select `amount` from `fees_master` where `quarter`='Q3' and `feeshead`='TUITION FEES'");
				while($rowQ3=mysql_fetch_row($rsFeeStudent1))
				{
					if(($YearlyTotalPayableAmt-$TotalPaidAmt)>$rowQ3[0])
					{
						$Q3PayableAmt=$rowQ3[0];
						$Q3PaidAmt=$rowQ3[0];
					}
					else
					{
						$Q3PayableAmt=($YearlyTotalPayableAmt-$TotalPaidAmt);
						$Q3PaidAmt=($YearlyTotalPayableAmt-$TotalPaidAmt);
					}
					$TotalPaidAmt=$TotalPaidAmt+$Q3PaidAmt;
					break;
				}
			}
		//Q4 Payable Calculation************
			$rsFeeStudent=mysql_query("select `amount` from `fees_student` where `sadmission`='$sadmission' and `feeshead`='FEES FOURTH INSTALLMENT'");
			if (mysql_num_rows($rsFeeStudent) > 0)
			{
				while($rowQ4=mysql_fetch_row($rsFeeStudent))
				{
					$Q4PayableAmt=$rowQ4[0];
					$Q4PaidAmt=$rowQ4[0];
					$Q4ActualPaidAmt=$rowQ4[0];
					$TotalPaidAmt=$TotalPaidAmt+$Q4PaidAmt;
					
					break;
				}
			}
			else
			{
				//echo ($Q1PaidAmt+$Q2PaidAmt+$Q3PaidAmt+$FeeAdvanceAmtPaid);
				//exit();
				if(($YearlyTotalPayableAmt-($Q1PaidAmt+$Q2PaidAmt+$Q3PaidAmt+$FeeAdvanceAmtPaid))>0)
				{
					$Q4PayableAmt=($YearlyTotalPayableAmt-($Q1PaidAmt+$Q2PaidAmt+$Q3PaidAmt+$FeeAdvanceAmtPaid));
				}
			}
			
		$TotalQ1PayableAmt=$TotalQ1PayableAmt+$Q1PayableAmt;
		$TotalQ2PayableAmt=$TotalQ2PayableAmt+$Q2PayableAmt;
		$TotalQ3PayableAmt=$TotalQ3PayableAmt+$Q3PayableAmt;
		$TotalQ4PayableAmt=$TotalQ4PayableAmt+$Q4PayableAmt;
		
		$Q1TotalActualPaidAmt=$Q1ActualPaidAmt+$Q1ActualPaidAmt;
		$Q2TotalActualPaidAmt=$Q2ActualPaidAmt+$Q2ActualPaidAmt;
		$Q3TotalActualPaidAmt=$Q3ActualPaidAmt+$Q3ActualPaidAmt;
		$Q4TotalActualPaidAmt=$Q4ActualPaidAmt+$Q4ActualPaidAmt;
		$TotalAdvanceAmt=$TotalAdvanceAmt+$FeeAdvanceAmtPaid;
		$TotalConcessionAmt=$TotalConcessionAmt+$YearlyConcessionAmt;
		$GrandTotalYearlyTotalPayableAmt=$GrandTotalYearlyTotalPayableAmt+$YearlyTotalPayableAmt;
		$GrandTotalPaidAmt=$GrandTotalPaidAmt+($Q1ActualPaidAmt+$Q2ActualPaidAmt+$Q3ActualPaidAmt+$Q4ActualPaidAmt);
	?>
	<tr>
		<td style="text-align: center"><?php echo $recCount;?></td>
		<td style="text-align: center"><?php echo $sadmission;?></td>
		<td style="text-align: center"><?php echo $sname;?></td>
		<td style="text-align: center"><?php echo $sclass;?></td>
		<td style="text-align: center"><?php echo $sfather;?></td>
		<td style="text-align: center"><?php echo $Q1PayableAmt;?></td>
		<td style="text-align: center"><?php echo $Q1ActualPaidAmt;?></td>
		<td style="text-align: center"><?php echo $Q2PayableAmt;?></td>
		<td style="text-align: center"><?php echo $Q2ActualPaidAmt;?></td>
		<td style="text-align: center"><?php echo $Q3PayableAmt;?></td>
		<td style="text-align: center"><?php echo $Q3ActualPaidAmt;?></td>
		<td style="text-align: center"><?php echo $Q4PayableAmt;?></td>
		<td style="text-align: center"><?php echo $Q4ActualPaidAmt;?></td>
		<td style="text-align: center"><?php echo $FeeAdvanceAmtPaid;?></td>
		<td style="text-align: center"><?php echo $YearlyConcessionAmt;?></td>
		<td style="text-align: center"><?php echo $YearlyTotalPayableAmt;?></td>
		<td style="text-align: center"><?php echo ($Q1ActualPaidAmt+$Q2ActualPaidAmt+$Q3ActualPaidAmt+$Q4ActualPaidAmt)?></td>
	</tr>
	<?php
	$recCount=$recCount+1;
	}
	?>
	<tr>
		<td colspan="5">
		<p align="center"><b><font face="Cambria">Total</font></b></td>
		<td class="style2"><strong><?php echo $TotalQ1PayableAmt;?></strong></td>
		<td class="style2"><strong><?php echo $Q1TotalActualPaidAmt;?></strong></td>
		<td class="style2"><strong><?php echo $TotalQ2PayableAmt;?></strong></td>
		<td class="style2"><strong><?php echo $Q2TotalActualPaidAmt;?></strong></td>
		<td class="style2"><strong><?php echo $TotalQ3PayableAmt;?></strong></td>
		<td class="style2"><strong><?php echo $Q3TotalActualPaidAmt;?></strong></td>
		<td class="style2"><strong><?php echo $TotalQ4PayableAmt;?></strong></td>
		<td class="style2"><strong><?php echo $Q4TotalActualPaidAmt;?></strong></td>
		<td class="style2"><strong><?php echo $TotalAdvanceAmt;?></strong></td>
		<td class="style2"><strong><?php echo $TotalConcessionAmt;?></strong></td>
		<td class="style2"><strong><?php echo $GrandTotalYearlyTotalPayableAmt;?></strong></td>
		<td class="style2"><strong><?php echo $GrandTotalPaidAmt;?></strong></td>
	</tr>
</table>
<?php
}
?>
</body>

</html>