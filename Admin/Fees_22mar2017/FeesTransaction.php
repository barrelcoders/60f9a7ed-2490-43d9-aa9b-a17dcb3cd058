<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php


if ($_REQUEST["isSubmit"]=="yes")
{
	$ReceiptNo=$_REQUEST["txtReceiptno"];
	
	$ssql="SELECT `srno`,`ReceiptNo`,`TutionFee`, `TransportFee`,`AnnualCharges`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`FeeMonth`,`FeeYear`,`PreviousBalance`,`PaidBalanceAmt`,`CurrentBalance`,`Discount`,`DiscountReason`,`Remarks`,`chequeno`,`bankname`,`refundamount`,`refunddate`,`cancelamount`,`canceldate`,`finalamount`,`FinancialYear`,`ReceiptDate`,(select `sadmission` from `fees` where `receipt`=a.`ReceiptNo`) as `sadmission`,(select `sname` from `fees` where `receipt`=a.`ReceiptNo`) as `sname`,(select `sclass` from `fees` where `receipt`=a.`ReceiptNo`) as `sclass`,(select `srollno` from `fees` where `receipt`=a.`ReceiptNo`) as `srollno`,(select `fees_amount` from `fees` where `receipt`=a.`ReceiptNo`) as `fees_amount`,(select `amountpaid` from `fees` where `receipt`=a.`ReceiptNo`) as `amountpaid` FROM `fees_transaction` as `a` where `ReceiptNo` = '$ReceiptNo' order by `srno`";
	
	$rs= mysql_query($ssql);
}

$num_rows=0;

?>



<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Fees Transaction Details</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.style1 {
	text-align: left;
}
.style2 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	border: 1px solid #000000;
}
.style4 {
	font-family: Cambria;
	border: 1px solid #000000;
}
   

.footer {
 height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}
.style5 {
	font-family: Calibri, sans-serif;
	font-size: 11pt;
	font-style: normal;
}
.style6 {
	font-family: Calibri, sans-serif;
	font-size: 11pt;
}
</style>
</head>

<body>

<p class="auto-style5" style="height: 12px">&nbsp;</p>
<p class="auto-style5" style="height: 12px"><font face="Cambria"><strong>Fees Transaction Details</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria">
<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" align="right"></a></font></p>
<br>
<table>
	<form name="frmTransaction" id="frmTransaction" method="post" action="FeesTransaction.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		<td style="width: 152px" class="style4"><strong>Enter Receipt No:</strong></td>
		<td style="width: 154px" class="style3">
		<input name="txtReceiptno" id="txtReceiptno" type="text" class="text-box"></td>
		<td style="width: 1003px" class="style3">
		<input name="Submit1" type="submit" value="Submit" class="text-box"></td>
	</tr>
	</form>
</table>
&nbsp;<br>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
?>
<table border="0" cellpadding="0" cellspacing="0" width="1562" style="border-collapse: collapse; width: 1174pt">
	<colgroup>
		<col width="34" style="width: 26pt"><col width="72" style="width: 54pt">
		<col width="70" style="width: 53pt">
		<col width="70" style="width: 53pt">
		<col width="70" style="width: 53pt">
		<col width="70" style="width: 53pt">
		<col width="70" style="width: 53pt">
		<col width="70" style="width: 53pt">
		<col width="70" style="width: 53pt"><col width="89" style="width: 67pt">
		<col width="101" style="width: 76pt">
		<col width="96" style="width: 72pt">
		<col width="111" style="width: 83pt">
		<col width="113" style="width: 85pt">
		<col width="129" style="width: 97pt">
		<col width="71" style="width: 53pt"><col width="57" style="width: 43pt">
		<col width="110" style="width: 83pt">
		<col width="109" style="width: 82pt">
		<col width="103" style="width: 77pt">
		<col width="61" style="width: 46pt">
		<col width="107" style="width: 80pt">
		<col width="60" style="width: 45pt"><col width="69" style="width: 52pt">
	</colgroup>
	<tr height="20" style="height:15.0pt">
		<td height="20" style="height: 15.0pt; width: 47px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Sno</b></td>
		<td style="width: 79px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Receipt No</b></td>
		<td style="width: 79px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Admission No</b></td>
		<td style="width: 79px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Name</b></td>
		<td style="width: 79px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Class</b></td>
		<td style="width: 79px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Roll No</b></td>
		<td style="width: 79px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Amt. Payable</b></td>
		<td style="width: 79px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Amt. Paid</b></td>
		<td style="width: 86px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Tuition Fee</b></td>
		<td style="width: 87px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Transport Fee</b></td>
		<td style="width: 104px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Annual Charges</b></td>
		<td style="width: 99px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Actual Late Fee</b></td>
		<td style="width: 110px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Actual Delay Day</b></td>
		<td style="width: 116px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Adjusted Late Fee</b></td>
		<td style="width: 115px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Adjusted Delay Day</b></td>
		<td style="width: 63px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Fee Month</b></td>
		<td style="width: 61px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Fee Year</b></td>
		<td style="width: 111px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Previous Balance</b></td>
		<td style="width: 103px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Paid Balance Amt</b></td>
		<td style="width: 77px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Current Balance</b></td>
		<td style="width: 54px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Discount</b></td>
		<td style="width: 106px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Discount Reason</b></td>
		<td style="width: 65px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Remarks</b></td>
		<td style="width: 87px; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center">
		<b>Cheque No</b></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style5">
		<strong>Bank Name</strong></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style5">
		<strong>Refund Amount</strong></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style5">
		<strong>Refund Date</strong></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style5">
		<strong>Cancel Amount</strong></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style6">
		<strong>Cancel Date</strong></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style6">
		<strong>Final Amount</strong></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style6">
		<strong>Financial Year</strong></td>
		<td style="border-style: solid; border-color: inherit; border-width: 1px; width: 87px; text-align: general; vertical-align: middle; white-space: nowrap; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" class="style6">
		<strong>Receipt Date</strong></td>
	</tr>
	
	<?php


				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];					
					$ReceiptNo=$row[1];					
					$TutionFee=$row[2];
					$TransportFee=$row[3];
					$AnnualCharges=$row[4];	
					$ActualLateFee=$row[5];			
					$ActualDelayDays=$row[6];	
					$AdjustedLateFee=$row[7];	
					$AdjustedLateFee=$row[8];	
					$FeeMonth=$row[9];	
					$FeeYear=$row[10];	
					$PreviousBalance=$row[11];	
					$PaidBalanceAmt=$row[12];	
					$CurrentBalance=$row[13];	
					$Discount=$row[14];	
					$DiscountReason=$row[15];	
					$Remarks=$row[16];	
					$chequeno=$row[17];	
					$bankname=$row[18];	
					$refundamount=$row[19];	
					$refunddate=$row[20];	
					$cancelamount=$row[21];	
					$canceldate=$row[22];	
					$finalamount=$row[23];
					$FinancialYear=$row[24];		
					$ReceiptDate=$row[25];
					
					$AdmissionNo=$row[26];
					$StudentName=$row[27];
					$StudentClass=$row[28];
					$StudentRollNo=$row[29];
					$AmtPayable=$row[30];
					$AmtPaid=$row[31];
					
					$num_rows=$num_rows+1;

			?>
	<tr height="20" style="height:15.0pt">
		<td height="20" align="right" style="height: 15.0pt; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="47"><?php echo $srno; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="79"><?php echo $ReceiptNo; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="79">
		<?php echo $AdmissionNo;?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="79">
		<?php echo $StudentName;?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="79">
		<?php echo $StudentClass;?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="79">
		<?php echo $StudentRollNo;?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="79">
		<?php echo $AmtPayable;?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="79">
		<?php echo $AmtPaid;?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="86" class="style1"><?php echo $TutionFee; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $TransportFee; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="104"><?php echo $AnnualCharges; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="99"><?php echo $ActualLateFee; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="110"><?php echo $ActualDelayDays; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="116"><?php echo $AdjustedLateFee; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="115"><?php echo $AdjustedLateFee; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="63"><?php echo $FeeMonth; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="61"><?php echo $FeeYear; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="111"><?php echo $PreviousBalance; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="103"><?php echo $PaidBalanceAmt; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="77"><?php echo $CurrentBalance; ?></td>
		<td align="right" style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="54"><?php echo $Discount; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="106"><?php echo $DiscountReason; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="65"><?php echo $Remarks; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $chequeno; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $bankname; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $refundamount; ?>s</td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $refunddate; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $cancelamount; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $canceldate; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $finalamount; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $FinancialYear; ?></td>
		<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px"><?php echo $ReceiptDate; ?></td>
		
	</tr>
	<?php
		}
	?>
</table>
<?php
}
?>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>

</html>