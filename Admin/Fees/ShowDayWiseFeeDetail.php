<?php
session_start();
include '../../connection.php';
$datetime=$_REQUEST["datetime"];

$Dt = $_REQUEST["datetime"];
		$arr=explode('-',$Dt);
		$datetime= $arr[2] . "-" . $arr[1] . "-" . $arr[0];

$ShowDate= $arr[0] . "-" . $arr[1] . "-" . $arr[2];

//$ssql="SELECT `sadmission`,`sname`,`sclass`,`fees_amount`,`amountpaid`,`receipt`,`PaymentMode` FROM `fees` where DATE_FORMAT(`date`,'%Y-%m-%d') >= '2015-06-01' and DATE_FORMAT(`date`,'%Y-%m-%d') <='2015-06-25'";
$ssql="SELECT `sadmission`,`sname`,`sclass`,`fees_amount`,`amountpaid`,`receipt`,`PaymentMode`,`chequeno`,DATE_FORMAT(`cheque_date`,'%d-%m-%Y') as `cheque_date`,`bankname` FROM `fees` where DATE_FORMAT(`date`,'%Y-%m-%d') >= '$datetime' and DATE_FORMAT(`date`,'%Y-%m-%d') <='$datetime'";
$rs=mysql_query($ssql);


$ssql="SELECT `sadmission`,`sname`,`sclass`,`Amount`,`Amount`,`ReceiptNo`,`PaymetMode`,`ChequeNo`,DATE_FORMAT(`ChequeDate`,'%d-%m-%Y') as `cheque_date`,`BankName` FROM `fees_exam_student` where DATE_FORMAT(`ReceiptDate`,'%Y-%m-%d') >= '$datetime' and DATE_FORMAT(`ReceiptDate`,'%Y-%m-%d') <='$datetime'";

$rsExamFee=mysql_query($ssql);

$ssql="SELECT `sadmissionno` as `sadmission`,`sname`,`sclass`,`ChequeAmount` as `Amount`,`ChequeAmount` as `Amount`,'','',`ChequeNo`,DATE_FORMAT(`Chequedate`,'%d-%m-%Y') as `cheque_date`,`BankName` FROM `fees_misc_collection` where DATE_FORMAT(`Chequedate`,'%Y-%m-%d') >= '$datetime' and DATE_FORMAT(`Chequedate`,'%Y-%m-%d') <='$datetime'";
$rsMisc=mysql_query($ssql);


$srno=1;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
<style type="text/css">
.style1 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	}
.style3 {
	font-family: Cambria;
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	font-family: Cambria;
	text-align: right;
	border-style: solid;
	border-width: 1px;
}
</style>
</head>

<body>

<p align="center"><b><span style="font-size: 14pt">Delhi Public School</span></b></p>
<p align="center"><span style="font-size: 14pt"><b>Day Book Report</b></span></p>
<p align="left"><font face="Cambria">
<span style="font-size: 12pt; font-weight: 700; text-decoration: underline">Fees 
Receipt Details:</span></font></p>

<table style="width: 100%" class="style1">
	<tr>
		<td class="style3" style="width: 85px"><strong>Sr.No.</strong></td>
		<td class="style3" style="width: 167px"><strong>Admission Id</strong></td>
		<td class="style3" style="width: 167px"><strong>Name</strong></td>
		<td class="style3" style="width: 167px"><strong>Class</strong></td>
		<td class="style3" style="width: 167px"><strong>Fee Amount</strong></td>
		<td class="style3" style="width: 167px"><strong>Amount Paid</strong></td>
		<td class="style3" style="width: 167px"><strong>Receipt</strong></td>
		<td class="style3" style="width: 167px"><strong>Payment Mode</strong></td>
		<td class="style3" style="width: 167px"><b>Cheque No</b></td>
		<td class="style3" style="width: 167px"><b>Entry Date</b></td>
		<td class="style3" style="width: 167px"><b>Cheque Date</b></td>
		<td class="style3" style="width: 167px"><b>Bank Name</b></td>
	</tr>
	<?php
	$srno=0;
	$TotalRegularFee=0;
	while($row = mysql_fetch_row($rs))
	{
	
	/*
	$sadmission=$row[0];
	$sname=$row[1];
	$sclass=$row[2];
	$fees_amount=$row[3];
	$amountpaid=$row[4];
	$receipt=$row[5];
	$PaymentMode=$row[6];
	$chequeno=$row[7];
	$bankname=$row[8];
	$cheque_date=$row[9];
	*/
	
	
	$sadmission=$row[0];
	$sname=$row[1];
	$sclass=$row[2];
	$fees_amount=$row[3];
	$amountpaid=$row[4];
	$receipt=$row[5];
	$PaymentMode=$row[6];
	$chequeno=$row[7];
	$cheque_date=$row[8];
	$bankname=$row[9];
	$TotalRegularFee=$TotalRegularFee+$amountpaid;
	
	$srno=$srno+1;
	?>
	<tr>
		<td class="style3" style="width: 85px"><?php echo $srno;?>.</td>
		<td class="style3" style="width: 167px"><?php echo $sadmission;?></td>
		<td class="style3" style="width: 167px"><?php echo $sname;?></td>
		<td class="style3" style="width: 167px"><?php echo $sclass;?></td>
		<td class="style3" style="width: 167px"><?php echo $fees_amount;?></td>
		<td class="style3" style="width: 167px"><?php echo $amountpaid;?></td>
		<td class="style3" style="width: 167px"><?php echo $receipt;?></td>
		<td class="style3" style="width: 167px"><?php echo $PaymentMode;?></td>
		<td class="style3" style="width: 167px"><?php echo $chequeno;?></td>
		<td class="style3" style="width: 167px"><?php echo $ShowDate;?></td>
		<td class="style3" style="width: 167px"><?php echo $cheque_date;?></td>
		<td class="style3" style="width: 167px"><?php echo $bankname;?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td class="style4" colspan="4"><strong>Total:</strong></td>
		<td class="style3" style="width: 167px"><?php echo $TotalRegularFee;?></td>
		<td class="style3" style="width: 167px"><?php echo $TotalRegularFee;?></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
	</tr>

</table>

<p align="left">&nbsp;</p>
<p align="left"><font face="Cambria">
<span style="font-size: 12pt; font-weight: 700; text-decoration: underline">
Miscellaneous Collection Details:</span></font></p>

<table style="width: 100%" class="style1">
	<tr>
		<td class="style3" style="width: 85px"><strong>Sr.No.</strong></td>
		<td class="style3" style="width: 167px"><strong>Admission Id</strong></td>
		<td class="style3" style="width: 167px"><strong>Name</strong></td>
		<td class="style3" style="width: 167px"><strong>Class</strong></td>
		<td class="style3" style="width: 167px"><strong>Fee Amount</strong></td>
		<td class="style3" style="width: 167px"><strong>Amount Paid</strong></td>
		<td class="style3" style="width: 167px"><strong>Receipt</strong></td>
		<td class="style3" style="width: 167px"><strong>Payment Mode</strong></td>
		<td class="style3" style="width: 167px"><b>Cheque No</b></td>
		<td class="style3" style="width: 167px"><b>Cheque Date</b></td>
		<td class="style3" style="width: 167px"><b>Bank Name</b></td>
	</tr>
	<?php
	$srno=0;
	$TotalMiscAmount=0;
	$TotalExamAmount=0;
	while($row1 = mysql_fetch_row($rsExamFee))
	{
	$sadmission=$row1[0];
	$sname=$row1[1];
	$sclass=$row1[2];
	$fees_amount=$row1[3];
	$amountpaid=$row1[4];
	$receipt=$row1[5];
	$PaymentMode=$row1[6];
	$chequeno=$row1[7];
	$cheque_date=$row1[8];
	$bankname=$row1[9];
	$srno=$srno+1;
	$TotalExamAmount=$TotalExamAmount+$amountpaid;
	?>
	
		<tr>
		<td class="style3" style="width: 85px"><?php echo $srno;?>.</td>
		<td class="style3" style="width: 167px"><?php echo $sadmission;?></td>
		<td class="style3" style="width: 167px"><?php echo $sname;?></td>
		<td class="style3" style="width: 167px"><?php echo $sclass;?></td>
		<td class="style3" style="width: 167px"><?php echo $fees_amount;?></td>
		<td class="style3" style="width: 167px"><?php echo $amountpaid;?></td>
		<td class="style3" style="width: 167px"><?php echo $receipt;?></td>
		<td class="style3" style="width: 167px"><?php echo $PaymentMode;?></td>
		<td class="style3" style="width: 167px"><?php echo $chequeno;?></td>
		<td class="style3" style="width: 167px"><?php echo $cheque_date;?></td>
		<td class="style3" style="width: 167px"><?php echo $bankname;?></td>
	</tr>
	<?php
	}
	?>
	<?php
		//$srno=0;
		while($row2 = mysql_fetch_row($rsMisc))
		{
			$sadmission=$row2[0];
			$sname=$row2[1];
			$sclass=$row2[2];
			$fees_amount=$row2[3];
			$amountpaid=$row2[4];
			$receipt=$row2[5];
			$PaymentMode=$row2[6];
			$chequeno=$row2[7];
			$cheque_date=$row2[8];
			$bankname=$row2[9];
			$TotalMiscAmount=$TotalMiscAmount+$amountpaid;
			$srno=$srno+1;
	?>
	<tr>
		<td class="style3" style="width: 85px"><?php echo $srno;?>.</td>
		<td class="style3" style="width: 167px"><?php echo $sadmission;?></td>
		<td class="style3" style="width: 167px"><?php echo $sname;?></td>
		<td class="style3" style="width: 167px"><?php echo $sclass;?></td>
		<td class="style3" style="width: 167px"><?php echo $fees_amount;?></td>
		<td class="style3" style="width: 167px"><?php echo $amountpaid;?></td>
		<td class="style3" style="width: 167px"><?php echo $receipt;?></td>
		<td class="style3" style="width: 167px"><?php echo $PaymentMode;?></td>
		<td class="style3" style="width: 167px"><?php echo $chequeno;?></td>
		<td class="style3" style="width: 167px"><?php echo $cheque_date;?></td>
		<td class="style3" style="width: 167px"><?php echo $bankname;?></td>
	</tr>
	<?php
		}
	?>
		<tr>
		<td class="style4" colspan="4"><strong>Total:</strong></td>
		<td class="style3" style="width: 167px"><?php echo ($TotalMiscAmount+$TotalExamAmount);?></td>
		<td class="style3" style="width: 167px"><?php echo ($TotalMiscAmount+$TotalExamAmount);?></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
		<td class="style3" style="width: 167px"></td>
	</tr>

	</table>

<p align="center">&nbsp;</p>
<p align="center"><span style="font-weight: 700; text-decoration: underline">
<font face="Cambria">Day Book Summary</font></span></p>

<table style="width: 100%" class="style1">
	<tr>
		<td class="style3" style="width: 84px"><strong>Sr.No.</strong></td>
		<td class="style3">&nbsp;</td>
		<td class="style3" style="width: 145px"><strong>Cash</strong></td>
		<td class="style3" style="width: 146px"><strong>DD</strong></td>
		<td class="style3" style="width: 146px"><strong>Cheque</strong></td>
		<td class="style3" style="width: 146px"><strong>Card</strong></td>
		<td class="style3" width="146"><b>Grand Total</b></td>
	</tr>
	<?php
	while($row = mysql_fetch_row($rs))
	{
	$sadmission=$row[0];
	$sname=$row[1];
	$sclass=$row[2];
	$fees_amount=$row[3];
	$amountpaid=$row[4];
	$receipt=$row[5];
	$PaymentMode=$row[6];
	$chequeno=$row[7];
	$cheque_date=$row[8];
	$bankname=$row[9];
	$srno=$srno+1;
	?>
	<tr>
		<td class="style3" style="width: 85px"><?php echo $srno;?>1.</td>
		<td class="style3" style="width: 167px"><b>Total Fee Received</b><?php echo $sadmission;?></td>
		<td class="style3" style="width: 167px"><?php echo $sname;?></td>
		<td class="style3" style="width: 167px"><?php echo $sclass;?></td>
		<td class="style3" style="width: 167px"><?php echo $fees_amount;?></td>
		<td class="style3" style="width: 167px"><?php echo $amountpaid;?></td>
		<td class="style3" style="width: 167px"><?php echo $receipt;?></td>
	</tr>
	<?php
	}
	?>

	<tr>
		<td class="style3" style="width: 84px">2</td>
		<td class="style3"><b>&nbsp;Miscellaneous Income</b></td>
		<td class="style3" style="width: 145px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" width="146">&nbsp;</td>
	</tr>
	<tr>
		<td class="style3" style="width: 84px">3</td>
		<td class="style3"><b>Fine Received</b></td>
		<td class="style3" style="width: 145px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" width="146">&nbsp;</td>
	</tr>
	<tr>
		<td class="style3" style="width: 84px">&nbsp;</td>
		<td class="style3">Total Amount (Rs.)</td>
		<td class="style3" style="width: 145px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" style="width: 146px">&nbsp;</td>
		<td class="style3" width="146">&nbsp;</td>
	</tr>
	</table>

</body>

</html>
