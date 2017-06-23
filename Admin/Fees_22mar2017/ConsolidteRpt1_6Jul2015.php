<?php
include '../../connection.php';

$rsMasterClass=mysql_query("select distinct `MasterClass` from `class_master`");

if ($_REQUEST["cboClass"] !="")
{
	$rsFy = mysql_query("select `year`,`financialyear` from `FYmaster` where `Status`='Active'", $Con);
	while($row = mysql_fetch_row($rsFy))
	{
	$CurrentFinancialYear=$row[0];
	$CurrentFinancialYr=$row[1];
	break;
	}
	
	$SelectClass=$_REQUEST["cboClass"];
	//$rs=mysql_query("select `sadmission`,`sname`,`sclass`,(select sum(amount) from `fees_advances` where `sadmission`=a.`sadmission`) as `advance`,(select `MasterClass` from `class_master` where `class`=a.`sclass`) as `MasterClass`,`FinancialYear`,`DiscontType`,`routeno`,`Hostel` from `student_master` a");
	//$rs=mysql_query("select `sadmission`,`sname`,`sclass`,(select `MasterClass` from `class_master` where `class`=a.`sclass`) as `MasterClass`,`FinancialYear`,`DiscontType`,`routeno`,`Hostel` from `student_master` a limit 500");
	$sql = "SELECT distinct `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`DiscontType`,(SELECT `MasterClass` FROM `class_master` WHERE `class`=a.`sclass`) as `MasterClass`,`DiscontType`,`MotherName`,`Address`,`smobile`,`routeno`,`Hostel`,`FinancialYear` FROM `student_master` as `a` where `MasterClass`='$SelectClass'"; 
	
	$rs=mysql_query($sql);
	
	
}
?>
<script language="javascript">
function validate()
{
	if(document.getElementById("cboClass").value =="Select One")
	{
		alert("Select Class!");
		return;
	}
	document.getElementById("frmRpt").submit();
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Particulars</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-color: #808080;
	border-width: 0px;
}
.style3 {
	text-align: center;
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	border-style: solid;
	border-width: 1px;
	background-color: #FFDD95;
}
.style5 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	border-style: solid;
	border-width: 1px;
	background-color: #97B9FF;
}
.style6 {
	text-align: center;
	font-family: Verdana;
	font-size: x-small;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFF99;
}
.style7 {
	font-size: small;
}
.style8 {
	text-align: center;
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
	background-color: #DFDFDF;
}
.style9 {
	text-align: center;
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
	font-size: small;
}
.style10 {
	border-collapse: collapse;
}
.style11 {
	text-align: center;
}
</style>
</head>

<body>
<table style="width: 30%" cellpadding="0" class="style10">
<form name="frmRpt" id="frmRpt" method="post" action="">
	<tr>
		<td style="width: 634px" class="style11"><strong>Class:</strong></td>
		<td style="width: 635px">
		<select name="cboClass" id="cboClass" onchange="javascript:validate();">
		<option value="Select One">Select One</option>
		<?php
		while($row = mysql_fetch_row($rsMasterClass))
		{
			$MasterClass=$row[0];
		?>
		<option value="<?php echo $MasterClass;?>"><?php echo $MasterClass;?></option>
		<?php
		}
		?>
		</select></td>
	</tr>
	<tr>
		<td style="width: 634px">&nbsp;</td>
		<td style="width: 635px">&nbsp;</td>
	</tr>
	</form>
</table>
<?php
if ($_REQUEST["cboClass"] !="")
{
?>
<br>
<table style="width: 100%" cellpadding="0" class="style1">
	<tr>
		<td class="style8" style="height: 16px" colspan="9">Particulars</td>
		<td class="style5" colspan="16" style="height: 16px"><strong>Regular Fees</strong></td>
		<td class="style4" style="height: 16px" colspan="8"><strong>Hostel Fees</strong></td>
	</tr>
	<tr>
		<td class="style6" style="width: 63px"><strong>Adm.No.</strong></td>
		<td class="style6" style="width: 317px"><strong>Student Type</strong> </td>
		<td class="style6" style="width: 317px"><strong>Name</strong></td>
		<td class="style6" style="width: 63px"><strong>Class</strong></td>
		<td class="style6" style="width: 63px"><strong>Disc. Type</strong></td>
		<td class="style6" style="width: 63px"><strong>Transport</strong></td>
		<td class="style6" style="width: 63px"><strong>Hostel</strong></td>
		<td class="style6" style="width: 63px"><strong>Total Payable</strong></td>
		<td class="style6" style="width: 63px"><strong>Adv.</strong></td>
		<td class="style6" style="width: 63px"><strong>Q1</strong></td>
		<td class="style6" style="width: 63px"><strong>Receipt</strong></td>
		<td class="style6" style="width: 63px"><strong>Late Fee</strong></td>
		<td class="style6" style="width: 63px"><strong>Cheque Bounce Amt.</strong></td>
		<td class="style6" style="width: 63px"><strong>Q2</strong></td>
		<td class="style6" style="width: 63px"><strong>Receipt</strong></td>
		<td class="style6" style="width: 63px"><strong>Late Fee</strong></td>
		<td class="style6" style="width: 63px"><strong>Cheque Bounce Amt.</strong></td>
		<td class="style6" style="width: 63px"><strong>Q3</strong></td>
		<td class="style6" style="width: 63px"><strong>Receipt</strong></td>
		<td class="style6" style="width: 63px"><strong>Late Fee</strong></td>
		<td class="style6" style="width: 63px"><strong>Cheque Bounce Amt.</strong></td>
		<td class="style6" style="width: 63px"><strong>Q4</strong></td>
		<td class="style6" style="width: 64px"><strong>Receipt</strong></td>
		<td class="style6" style="width: 64px"><strong>Late Fee</strong></td>
		<td class="style6" style="width: 64px"><strong>Cheque Bounce Amt.</strong></td>
		<td class="style6" style="width: 64px"><strong>Q1</strong></td>
		<td class="style6" style="width: 64px"><strong>Receipt</strong></td>
		<td class="style6" style="width: 64px"><strong>Q2</strong></td>
		<td class="style6" style="width: 64px"><strong>Receipt</strong></td>
		<td class="style6" style="width: 64px"><strong>Q3</strong></td>
		<td class="style6" style="width: 64px"><strong>Receipt</strong></td>
		<td class="style6" style="width: 64px"><strong>Q4</strong></td>
		<td class="style6" style="width: 64px"><strong>Receipt</strong></td>
	</tr>
	<?php
	while($row1=mysql_fetch_row($rs))
	{
		
			$sadmission=$row1[0];
			$sname=$row1[1];
			$sclass=$row1[2];
			$srollno=$row1[3];
			$sfathername=$row1[4];
			$DiscontType=$row1[5];
			//$Caste=$row1[6];
			$MasterClass=$row1[6];
					
					$SchoolNM=$SchoolName ;
					$SchoolAC=$Account1;
						
			$StudentDiscountType=$row1[7];
			$MotherName=$row1[8];
			$Address=$row1[9];
			$Mobile=$row1[10];
			$RouteNo=$row1[11];
			$Hostel=$row1[12];
			$FinancialYear=$row1[13];
			
			$TotalAmountPaid=0;
			$ReceiptNoQ1="";
			$ReceiptNoQ2="";
			$ReceiptNoQ3="";
			$ReceiptNoQ4="";
			
				if($FinancialYear<$CurrentFinancialYear)
				{
					$StudentType="OldStudent";
					$QStudentType="old";
				}
				else
				{
					$StudentType="NewStudent";
					$QStudentType="new";
				}
				
				$rsFeeHeadAmt=mysql_query("SELECT distinct `feeshead`,sum(`actualamount`),sum(`discountamount`),sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` !='Hostel' group by `feeshead`,`actualamount`,`discountamount` order by `quarter`");
				$rsYearlyTotalFee=mysql_query("SELECT sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` !='Hostel'");
				
				$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_advances` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear'");
				while($rowAdvance=mysql_fetch_row($rsAdvanceAmt))
				{
					$AdvanceAmount=$rowAdvance[0];
					$FeeAmtPaid=$rowAdvance[0];
					break;
				}
				$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaid;
				
				while($rowTotalFee=mysql_fetch_row($rsYearlyTotalFee))
				{
					$YearlyTotalFeeAmount=$rowTotalFee[0];
					break;
				}
				
		
				$FeeAmtPaidQ1=0;
				$FeeAmtPaidQ2=0;
				$FeeAmtPaidQ3=0;
				$FeeAmtPaidQ4=0;
				$rsCheckQ1=mysql_query("SELECT distinct `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,sum(`amountpaid`) FROM `fees` WHERE `sadmission`='$sadmission' and `quarter`='Q1' and `FeesType` ='Regular' group by `receipt`,`date`");
					if (mysql_num_rows($rsCheckQ1) == 0)
					{
						if($DiscontType=="")
						{
							$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_master` WHERE `quarter`='Q1' and `StudentType`='$QStudentType' and `feeshead`='tuitionfees'");
						}
						else
						{
							$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `quarter`='Q1' and `StudentType`='$QStudentType' and `FeesType`!='Hostel'");
						}
		
						while($rowFPQ1=mysql_fetch_row($rsFeePaidQ1))
						{
							$FeeAmtPaidQ1=$rowFPQ1[0];
							
							//echo $FeeAmtPaidQ1."/".$YearlyTotalFeeAmount."/".$TotalAmountPaid;
							//exit();
							
							if($FeeAmtPaidQ1>($YearlyTotalFeeAmount-$TotalAmountPaid))
							{
								$FeeAmtPaidQ1=$YearlyTotalFeeAmount-$TotalAmountPaid;						
							}
							$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ1;
							break;
						}
						
					}
					else
					{
						while($rowFPQ1=mysql_fetch_row($rsCheckQ1))
						{
							$ReceiptNoQ1=$rowFPQ1[0];
							$ReceiptDateQ1=$rowFPQ1[1];
							$FeeAmtPaidQ1=$rowFPQ1[2];
							$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ1;
							break;
						}
					}
					
				
				//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q2 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
				
					$rsCheckQ2=mysql_query("SELECT distinct `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,sum(`amountpaid`) FROM `fees` WHERE `sadmission`='$sadmission' and `quarter`='Q2' and `FeesType` ='Regular' group by `receipt`,`date`");
					if (mysql_num_rows($rsCheckQ2) == 0)
					{
						if($DiscontType=="")
						{
							$rsFeePaidQ2=mysql_query("SELECT `amount` FROM `fees_master` WHERE `quarter`='Q2' and `StudentType`='$QStudentType' and `feeshead`='tuitionfees'");
						}
						else
						{
							$rsFeePaidQ2=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `quarter`='Q2' and `StudentType`='$QStudentType' and `FeesType`!='Hostel'");
						}	
						
						while($rowFPQ2=mysql_fetch_row($rsFeePaidQ2))
						{
							$FeeAmtPaidQ2=$rowFPQ2[0];
							if($FeeAmtPaidQ2>($YearlyTotalFeeAmount-$TotalAmountPaid))
							{
								$FeeAmtPaidQ2=$YearlyTotalFeeAmount-$TotalAmountPaid;																		
							}
							$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ2;
							break;
						}
					}
					else
					{
						while($rowFPQ2=mysql_fetch_row($rsCheckQ2))
						{
							$ReceiptNoQ2=$rowFPQ2[0];
							$ReceiptDateQ2=$rowFPQ2[1];
							$FeeAmtPaidQ2=$rowFPQ2[2];
							$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ2;
							break;
						}	
					}
				//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q3 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
				
					$rsCheckQ3=mysql_query("SELECT distinct `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,sum(`amountpaid`) FROM `fees` WHERE `sadmission`='$sadmission' and `quarter`='Q3' and `FeesType` ='Regular' group by `receipt`,`date`");
					if (mysql_num_rows($rsCheckQ3) == 0)
					{
						if($DiscontType=="")
						{
							$rsFeePaidQ3=mysql_query("SELECT `amount` FROM `fees_master` WHERE `quarter`='Q3' and `StudentType`='$QStudentType' and `feeshead`='tuitionfees'");
						}
						else
						{
							$rsFeePaidQ3=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `quarter`='Q3' and `StudentType`='$QStudentType' and `FeesType`!='Hostel'");
						}					
						while($rowFPQ3=mysql_fetch_row($rsFeePaidQ3))
						{
							$FeeAmtPaidQ3=$rowFPQ3[0];
							if($FeeAmtPaidQ3>($YearlyTotalFeeAmount-$TotalAmountPaid))
							{
								$FeeAmtPaidQ3=$YearlyTotalFeeAmount-$TotalAmountPaid;																		
							}
							$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ3;
							break;
						}
					}
					else
					{
						while($rowFPQ3=mysql_fetch_row($rsCheckQ3))
						{
							$ReceiptNoQ3=$rowFPQ3[0];
							$ReceiptDateQ3=$rowFPQ3[1];
							$FeeAmtPaidQ3=$rowFPQ3[2];
							$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ3;
							break;
						}	
					}
				
				//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q4 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
				
					$rsCheckQ4=mysql_query("SELECT sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` !='Hostel'");
					
						while($rowFPQ4=mysql_fetch_row($rsCheckQ4))
						{
							$YearlyTotalFee=$rowFPQ4[0];
							break;
						}
					$rsTotalPaid=mysql_query("SELECT sum(`amountpaid`) FROM `fees` WHERE `sadmission`='$sadmission' and `FinancialYear`='$CurrentFinancialYear' and `FeesType` ='Regular'");
						while($rowFPaid=mysql_fetch_row($rsTotalPaid))
						{
							$TotalPaid=$rowFPaid[0];
							break;
						}
						
					$FeeAmtPaidQ4=($YearlyTotalFee-$TotalAmountPaid);	
					
					if($FeeAmtPaidQ1 < 0)
					{$FeeAmtPaidQ1="";}
					if($FeeAmtPaidQ2 < 0)
					{$FeeAmtPaidQ2="";}
					if($FeeAmtPaidQ3 < 0)
					{$FeeAmtPaidQ3="";}
					if($FeeAmtPaidQ4 < 0)
					{$FeeAmtPaidQ4="";}

		

		$rsLateFeeQ1=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `quarter`='Q1' and `sadmission`='$sadmission'");
		$rsLateFeeQ2=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `quarter`='Q2' and `sadmission`='$sadmission'");
		$rsLateFeeQ3=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `quarter`='Q3' and `sadmission`='$sadmission'");
		$rsLateFeeQ4=mysql_query("select sum(`AdjustedLateFee`) from `fees` where `quarter`='Q4' and `sadmission`='$sadmission'");
		$Q1LateFees=0;
		$Q2LateFees=0;
		$Q3LateFees=0;
		$Q4LateFees=0;
		
		if (mysql_num_rows($rsLateFeeQ1) > 0)
		{
			while($row1=mysql_fetch_row($rsLateFeeQ1))
			{
					$Q1LateFees=$row1[0];
					break;
			}
		}
		if (mysql_num_rows($rsLateFeeQ2) > 0)
		{
			while($row1=mysql_fetch_row($rsLateFeeQ2))
			{
					$Q2LateFees=$row1[0];
					break;
			}
		}
		if (mysql_num_rows($rsLateFeeQ3) > 0)
		{
			while($row1=mysql_fetch_row($rsLateFeeQ3))
			{
					$Q3LateFees=$row1[0];
					break;
			}
		}
		if (mysql_num_rows($rsLateFeeQ4) > 0)
		{
			while($row1=mysql_fetch_row($rsLateFeeQ4))
			{
					$Q4LateFees=$row1[0];
					break;
			}
		}
		
		$rsCheqBounceFeeQ1=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `quarter`='Q1' and `sadmission`='$sadmission'");
		$rsCheqBounceFeeQ2=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `quarter`='Q2' and `sadmission`='$sadmission'");
		$rsCheqBounceFeeQ3=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `quarter`='Q3' and `sadmission`='$sadmission'");
		$rsCheqBounceFeeQ4=mysql_query("select sum(`cheque_bounce_amt`) from `fees` where `quarter`='Q4' and `sadmission`='$sadmission'");
		
		
		if (mysql_num_rows($rsCheqBounceFeeQ1) > 0)
		{
			while($row1=mysql_fetch_row($rsCheqBounceFeeQ1))
			{
					$Q1BounceFees=$row1[0];
					break;
			}
		}
		if (mysql_num_rows($rsCheqBounceFeeQ2) > 0)
		{
			while($row1=mysql_fetch_row($rsCheqBounceFeeQ2))
			{
					$Q2BounceFees=$row1[0];
					break;
			}
		}
		if (mysql_num_rows($rsCheqBounceFeeQ3) > 0)
		{
			while($row1=mysql_fetch_row($rsCheqBounceFeeQ3))
			{
					$Q3BounceFees=$row1[0];
					break;
			}
		}
		if (mysql_num_rows($rsCheqBounceFeeQ4) > 0)
		{
			while($row1=mysql_fetch_row($rsCheqBounceFeeQ4))
			{
					$Q4BounceFees=$row1[0];
					break;
			}
		}
		
		$YearlyTotalFee=0;
		$TotalPaidAmt=0;
		$rsYerlyTotalFee=mysql_query("select sum(`amount`) from `fees_student` where `StudentType`='$QStudentType' and `financialyear`='$CurrentFinancialYear' and `sadmission`='$sadmission' and `FeesType`='Regular'");
				while($row1=mysql_fetch_row($rsYerlyTotalFee))
				{
					$YearlyTotalFee=$row1[0];
					break;
				}
		
		////HOSTEL*********************
		$receiptHQ1="";
		$amountpaidHQ1="";
		$receiptHQ2="";
		$amountpaidHQ2="";
		$receiptHQ3="";
		$amountpaidHQ3="";
		$receiptHQ4="";
		$amountpaidHQ4="";
		
		if($Hostel=="Yes")
		{
				$rsHQ1=mysql_query("select `receipt`,`amountpaid` from `fees` where `quarter`='Q1' and `sadmission`='$sadmission' and `FeesType`='Hostel'");
				if (mysql_num_rows($rsHQ1) > 0)
				{
					while($row1=mysql_fetch_row($rsHQ1))
					{
						$receiptHQ1=$row1[0];
						$amountpaidHQ1=$row1[1];
						break;
					}
				}
				else
				{
					$rsFeeMaster=mysql_query("select `amount` from `fees_master` where `feeshead`='hostelfees' and `quarter`='Q1' and `StudentType`='$QStudentType' and `financialyear`='$CurrentFinancialYear'");
					while($row1=mysql_fetch_row($rsFeeMaster))
					{
						$receiptHQ1="";
						$amountpaidHQ1=$row1[0];
						break;
					}
				}
				
				$rsHQ2=mysql_query("select `receipt`,`amountpaid` from `fees` where `quarter`='Q2'  and `FeesType`='Hostel' and `sadmission`='$sadmission'");
				if (mysql_num_rows($rsHQ2) > 0)
				{
					while($row1=mysql_fetch_row($rsHQ2))
					{
						$receiptHQ2=$row1[0];
						$amountpaidHQ2=$row1[1];
						break;
					}
				}
				else
				{
					$rsFeeMaster=mysql_query("select `amount` from `fees_master` where `feeshead`='hostelfees' and `quarter`='Q2' and `StudentType`='$QStudentType' and `financialyear`='$CurrentFinancialYear'");
					while($row1=mysql_fetch_row($rsFeeMaster))
					{
						$receiptHQ2="";
						$amountpaidHQ2=$row1[0];
						break;
					}
				}
				
				$rsHQ3=mysql_query("select `receipt`,`amountpaid` from `fees` where `quarter`='Q3'  and `FeesType`='Hostel' and `sadmission`='$sadmission'");
				if (mysql_num_rows($rsHQ3) > 0)
				{
					while($row1=mysql_fetch_row($rsHQ3))
					{
						$receiptHQ3=$row1[0];
						$amountpaidHQ3=$row1[1];
						break;
					}
				}
				else
				{
					$rsFeeMaster=mysql_query("select `amount` from `fees_master` where `feeshead`='hostelfees' and `quarter`='Q3' and `StudentType`='$QStudentType' and `financialyear`='$CurrentFinancialYear'");
					while($row1=mysql_fetch_row($rsFeeMaster))
					{
						$receiptHQ3="";
						$amountpaidHQ3=$row1[0];
						break;
					}
				}
				
				$rsHQ4=mysql_query("select `receipt`,`amountpaid` from `fees` where `quarter`='Q4' and `FeesType`='Hostel' and `sadmission`='$sadmission'");
				if (mysql_num_rows($rsHQ4) > 0)
				{
					while($row1=mysql_fetch_row($rsHQ4))
					{
						$receiptHQ4=$row1[0];
						$amountpaidHQ4=$row1[1];
						break;
					}
				}
				else
				{
				
					$rsFeeMaster=mysql_query("select sum(`amount`) from `fees_student` where `StudentType`='$QStudentType' and `financialyear`='$CurrentFinancialYear' and `sadmission`='$sadmission' and `FeesType`='Hostel'");
						while($row1=mysql_fetch_row($rsFeeMaster))
						{
							$receiptHQ4="";
							if($row1[0] !="")
							{
								$amountpaidHQ4=$row1[0];
								$amountpaidHQ4=$amountpaidHQ4-($amountpaidHQ1+$amountpaidHQ2+$amountpaidHQ3);
							}
							else
							{
								$amountpaidHQ4="Not Defined";
							}
							break;
						}
				}
		}
		
		
		
		
	?>
	<tr>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $sadmission;?></span></td>
		<td class="style3" style="width: 317px"><span class="style7"><?php echo $QStudentType;?></span></td>
		<td class="style3" style="width: 317px"><span class="style7"><?php echo $sname;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $sclass;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $DiscontType;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $RouteNo;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $Hostel;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $YearlyTotalFee;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $AdvanceAmount;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $FeeAmtPaidQ1;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $ReceiptNoQ1;?></span></td>
		<td class="style9" style="width: 63px"><span class="style7"><?php echo $Q1LateFees;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $Q1BounceFees;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $FeeAmtPaidQ2;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $ReceiptNoQ2;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $Q2LateFees;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $Q2BounceFees;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $FeeAmtPaidQ3;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $ReceiptNoQ3;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $Q3LateFees;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $Q3BounceFees;?></span></td>
		<td class="style3" style="width: 63px"><span class="style7"><?php echo $FeeAmtPaidQ4;?></span></td>
		<td class="style3" style="width: 64px"><span class="style7"><?php echo $ReceiptNoQ4;?></span></td>
		<td class="style3" style="width: 64px"><span class="style7"><?php echo $Q4LateFees;?></span></td>
		<td class="style3" style="width: 64px"><span class="style7"><?php echo $Q4BounceFees;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $amountpaidHQ1;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $receiptHQ1;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $amountpaidHQ2;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $receiptHQ2;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $amountpaidHQ3;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $receiptHQ3;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $amountpaidHQ4;?></span></td>
		<td class="style9" style="width: 64px"><span class="style7"><?php echo $receiptHQ4;?></span></td>
	</tr>
	<?php
	flush();
    ob_flush();
	}
	?>
</table>
<?php
}
?>
</body>

</html>
