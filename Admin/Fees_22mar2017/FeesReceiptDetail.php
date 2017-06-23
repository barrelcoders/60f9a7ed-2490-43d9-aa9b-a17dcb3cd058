<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<?php
$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

if($_REQUEST["isSubmit"]=="yes")
{

	$Selectedadm=$_REQUEST["txtadm"];
	$Selectedname=$_REQUEST["txtname"];
	$Selectedrecno=$_REQUEST["txtrecno"];
	$Selectedbankname=$_REQUEST["txtbankname"];
	$Selectedchequeno=$_REQUEST["txtchequeno"];
	$Selectedquater=$_REQUEST["txtquater"];
	$Selectedate=$_REQUEST["txtdate"];
	
	
	$ssql="
SELECT  `srno` ,  `sadmission` ,  `sname` ,  `sclass` ,  `srollno` ,  `fees_amount` ,  `amountpaid` ,  `BalanceAmt` ,  `quarter` ,  `FinancialYear` , `status` ,  `receipt` ,  `date` ,  `datetime` ,  `refundamount` ,  `refunddate` ,  `cancelamount` ,  `canceldate` ,  `finalamount` ,  `ReceiptFileName` , `FeeReceiptCode` ,  `PaymentMode` ,  `chequeno` ,  `cheque_date` ,  `bankname` ,  `cheque_status` ,  `cheque_bounce_amt` ,  `ActualLateFee` , `ActualDelayDays` ,  `AdjustedLateFee` ,  `AdjustedDelayDays` ,  `Remarks` ,  `FeesType` , (

SELECT  `ReceiptCode` 
FROM  `fees_receipt_code` 
WHERE  `sadmission` = a.`sadmission` 
AND  `ReceiptNo` = a.`receipt`
) AS  `FeeReceiptCode` 
FROM  `fees` AS  `a` 
WHERE  `sadmission` !=  '' ";

	if($Selectedadm !="")
	{
		$ssql=$ssql." and `sadmission`='".$Selectedadm."' and `FinancialYear`='$CurrentFinancialYear'";
	}
	if($Selectedname !="")
	{
		$ssql=$ssql." and `sname`='".$Selectedname."' and `FinancialYear`='$CurrentFinancialYear'";
	}

	if($Selectedrecno !="")
	{
		$ssql=$ssql." and `receipt`='".$Selectedrecno."'and `FinancialYear`='$CurrentFinancialYear'";
	}
		if($Selectedbankname !="")
	{
		$ssql=$ssql." and `bankname`='".$Selectedbankname."' and `FinancialYear`='$CurrentFinancialYear'";
	}
		if($Selectedchequeno !="")
	{
		$ssql=$ssql." and `chequeno`='".$Selectedchequeno."' and `FinancialYear`='$CurrentFinancialYear'";
	}
		if($Selectedquater !="")
	{
		$ssql=$ssql." and `quarter`='".$Selectedquater."'and `FinancialYear`='$CurrentFinancialYear'";
	}
		if($Selecteddate !="")
	{
		$ssql=$ssql." and `date`='".$Selecteddate."' and `FinancialYear`='$CurrentFinancialYear'";
	}
$rs= mysql_query($ssql);
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Receipt Details </title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<style type="text/css">
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
.style1 {
	font-family: Cambria;
}
.style2 {
	font-family: Cambria;
	font-size: 10pt;
}
</style>
</head>

<body>
<form method="post">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Fees Receipt Details</p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table> 
 
<table width="100%" style="border-collapse: collapse;" border="0">
<form name="frmRpt" method="post" action="FeesReceiptDatail.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">


<tr><td><font face="Cambria"><b>Search By Options:</b></font><p>&nbsp;</p>

<table cellpadding="0" style="border-collapse: collapse" width="1241">

<tr>

		<td style="width: 206px"><b><font face="Cambria">Admission No</font></b></td>
		<td style="width: 207px"><input name="txtadm" class="text-box" type="text"></td>

		<td style="width: 207px"><b><font face="Cambria">Name</font></b>.</td></td>
		<td style="width: 207px"><input name="txtname" class="text-box" type="text"></td>

		<td width="207"><b><font face="Cambria">Receipt No</font></b>.<td width="207"><input name="txtrecno" class="text-box" type="text"></td>

		</table></td>
		<td style="width: 278px">&nbsp;</td>
</tr>
<table>

<table width="1241">

<tr>

		<td align="left" colspan="6">&nbsp;</td>
</tr>

<tr>

		<td style="width: 206px" align="left"><b><font face="Cambria">Bank Name</font></td>
		<td style="width: 206px" align="left"></b><input name="txtbankname" class="text-box" type="text"></td>

		<td style="width: 206px" align="left"><b><font face="Cambria">Cheque No</font></b>.</td>
		<td style="width: 207px" align="left"><input name="txtchequeno" class="text-box" type="text"></td>

		<td style="width: 207px" align="left"><b><font face="Cambria">Quarter</td>
		<td align="left" width="207"></font></b><input name="txtquater" class="text-box" type="text"></font></b></td>

</tr>
</table>
<br>
</p>
<table align="center">
<tr>
		<td class="style1" >
		<input name="Submit1" type="submit" class="theButton" value="Search"></td>
</tr>
</table>
</form>
</table>
<br>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
?>
<div id="MasterDiv">


<div align="center">
<table  class="CSSTableGenerator" cellspacing="0" border="1" cellpadding="0">
   <tr>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Roll No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Fees Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Amount Paid</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Balance Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Quarter</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Financial Year</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Status</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
	    Receipt</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Final Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">
		Payment Mode</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque No</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">Bank Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Status</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Bounce Amt</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Actual Late Fee</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Actual Delay Days</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Adjusted Late Fee</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Adjusted Delay Days</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">Refund Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b>Payment Status</b></td>
		
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Fees Type</font></b></td>
		
   	</tr>
   	<?php
   		$rsRegAdvance=mysql_query("select sum(amount) from `fees_student` where `sadmission`='$Selectedadm' and `feeshead`='Advances'");
		$row=mysql_fetch_row($rsRegAdvance);
		$RegAdvanceAmt=$row[0];

		$rsAdvance=mysql_query("select sum(amount) from `fees_student` where `sadmission`='$Selectedadm' and `feeshead`='HOSTEL AMOUNT CREDIT'");
		$row=mysql_fetch_row($rsAdvance);
		$HostelAdvanceAmt=$row[0];

   	?>
   	<tr>
   		<td height="22" align="center" style="width: 14%">&nbsp;</td>
   		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center"><?php echo $RegAdvanceAmt;?></td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center" class="style2">&nbsp;</td>
		
		<td height="22" align="center" class="style2"><strong>Reg. Fee Advance</strong></td>
		
   	</tr>
   	<tr>
   		<td height="22" align="center" style="width: 14%">&nbsp;</td>
   		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center"><?php echo $HostelAdvanceAmt;?></td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center">&nbsp;</td>
		<td height="22" align="center" class="style2">&nbsp;</td>
		
		<td height="22" align="center" class="style2"><strong>Hostel Fee Advance</strong></td>
		
   	</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
	$RefundAmount=$row[14];
?>
   
<tr>

<td style="width: 278px"><?php echo $row[0];?></td>
<td style="width: 278px"><?php echo $row[1];?></td>
<td style="width: 278px"><?php echo $row[2];?></td>
<td style="width: 278px"><?php echo $row[3];?></td>
<td style="width: 278px"><?php echo $row[4];?></td>
<td style="width: 278px"><?php echo $row[5];?></td>
<td style="width: 278px"><?php echo $row[6];?></td>
<td style="width: 278px"><?php echo $row[7];?></td>
<td style="width: 278px"><?php echo $row[8];?></td>
<td style="width: 278px"><?php echo $row[9];?></td>
<td style="width: 278px"><?php echo $row[10];?></td>
<td style="width: 278px"><a href="ShowRegularFeeReceipt.php?receiptno=<?php echo $row[11];?>" target =_blank><?php echo $row[11];?></td>
<td style="width: 278px"><?php echo $row[12];?></td>
<td style="width: 278px"><?php echo $row[18];?></td>


<td style="width: 278px"><?php echo $row[21];?></td>
<td style="width: 278px"><?php echo $row[22];?></td>
<td style="width: 278px"><?php echo $row[23];?></td>
<td style="width: 278px"><?php echo $row[24];?></td>
<td style="width: 278px"><?php echo $row[25];?></td>
<td style="width: 278px"><?php echo $row[26];?></td>
<td style="width: 278px"><?php echo $row[27];?></td>
<td style="width: 278px"><?php echo $row[28];?></td>
<td style="width: 278px"><?php echo $row[29];?></td>
<td style="width: 278px"><?php echo $row[30];?></td>
<td style="width: 278px"><?php echo $row[14];?></td>
<td style="width: 278px"><?php if($RefundAmount>0)
   echo "Refund Success"; ?></td>
<td style="width: 278px"><?php echo $row[32];?></td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>

</div>
<br>
<br>
<div id="MasterDiv">
	<table class="CSSTableGenerator" border="1" style="align:center; width: 100%;">
	
	<tr>
   		<td height="22" style="width: 641px" ><b><font face="Cambria">
		Admission No.</font></b><font face="Cambria"><?php echo $Selectedadm;?></font></td>
   		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Name.</font></b><font face="Cambria"><?php echo $sname;?></font></td>
   		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Class.</font></b><font face="Cambria"><?php echo $class;?></font></td>
		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Roll No.</font></b><font face="Cambria"><?php echo $srollno;?></font></td>

		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Father Name.</font></b><font face="Cambria"><?php echo $sfathername;?></font></td>

	</tr>
	
	
	
	</table>
	<table class="CSSTableGenerator"  border="1"style="align:center; width: 100%;">
	
	
		<br class="auto-style1">

<table class="CSSTableGenerator" border="1" style="align:center; width: 100%;">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="13">

		<p style="text-align: center"><b>Payment History</b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Payment Quarter</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Receipt #</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Payable</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Paid</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Late Fee</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Cheque Bounce Charges</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Balance</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<b>Cheque No</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Cheque Payment Status</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Fees Payment Date</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Financial Year</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<b>Payment Status</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Print Reciept</strong></td>

			</tr>
<?php
$rsTotalBill=mysql_query("select sum(amount) from `fees_student1` where `sadmission`='$AdmissionNo' and `feeshead`! LIKE '%INSTALLMENT%'");
$row1=mysql_fetch_row($rsTotalBill);
$BillAmount=$row1[0];
$rsAdvance=mysql_query("select sum(amount) from `fees_student1` where `sadmission`='$Selectedadm' and `feeshead`='Advances'");
$row=mysql_fetch_row($rsAdvance);
$AdvanceAmt=$row[0];
?>
<tr>			
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="auto-style5">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="auto-style5"><b>Total Bill Amount:-</b> <?php echo $BillAmount;?></td>
</tr>		
<tr>			
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $AdvanceAmt;?></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 101px; height: 20px;" class="style17"></td>
		<td style="width: 101px; height: 20px;" class="style17"></td>
		<td style="width: 101px; height: 20px;" class="style17"></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $CurrentFinancialYear;?></td>
		<td style="width: 101px; height: 20px;" class="auto-style5">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="auto-style5">Advance 
		Amount</td>
</tr>		
<?php
while($row = mysql_fetch_row($rsHistory))
	{
					
					//`quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`chequeno`,`cheque_status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear`
					$quarter=$row[0];
					$fees_amount=$row[1];
					$amountpaid=$row[2];
					$BalanceAmt=$row[3];
					$chequeno=$row[4];
					$cheque_status=$row[5];
					$receipt=$row[6];
					$date=$row[7];
					$FinancialYear=$row[8];		
					$AdjustedLateFee=$row[9];		
					$cheque_bounce_amt=$row[10];		
?>
<tr>			
		

		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $quarter; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $receipt; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $fees_amount; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $amountpaid; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">
		<?php echo $AdjustedLateFee;?>
					
		</td>


		<td style="width: 100px; height: 20px;" class="style12">
<?php echo $cheque_bounce_amt;?>
		</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $BalanceAmt; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $chequeno; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $cheque_status; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $date; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $FinancialYear; ?></td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			&nbsp;</td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			<input name="PrintQ1Receipt" type="button" value="Print Reciept" class="text-box" onclick="Javascript:ShowReceipt('<?php echo $receipt; ?>');"><span class="style6">
			</span>
		</td>

			</tr>

<?php
	$sqlPB = "SELECT `PBalanceReceiptNo`,`PreviousBalance`,`PaidBalanceAmt`,`CurrentBalance`,date_format(`ReceiptDate`,'%d-%m-%y') FROM `fees_transaction` where  `ReceiptNo`='$receipt' and `PBalanceReceiptNo` !=''";
	$rsPB = mysql_query($sqlPB);
				if (mysql_num_rows($rsPB) > 0)
				{
					while($rowPB = mysql_fetch_row($rsPB))
					{						
						$BalanceReceiptNo=$rowPB[0];
						$PayableBalanceAmt=$rowPB[1];
						$PaidBalanceAmt=$rowPB[2];
						$OutstandingAmt=$rowPB[3];
						$ReceiptDate=$rowPB[4];
					
?>
<tr>			
		<td style="width: 100px; height: 20px;" class="style12">
		</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $BalanceReceiptNo; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">
		<?php echo $PayableBalanceAmt; ?>
		</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $PaidBalanceAmt; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		&nbsp;</td>


		<td style="width: 100px; height: 20px;" class="style12">

		&nbsp;</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $OutstandingAmt; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		&nbsp;</td>


		<td style="width: 101px; height: 20px;" class="style17">

		</td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $ReceiptDate; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $FinancialYear; ?></td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			&nbsp;</td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			<input name="PrintQ1Receipt"  type="button" value="Print Reciept" class="text-box" onclick="Javascript:ShowReceipt('<?php echo $BalanceReceiptNo; ?>');"><span class="style6">
			</span>
		</td>

			</tr>			
	<?php 
			}
		}
	?>		
<?php
}
?>		
			

</table>	

	
	<?php
	$ssql="select distinct `feeshead`,`amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`FeesType` from `fees_student` as `a` where `sadmission`='$Selectedadm' and `feeshead`!='TOTAL BILL AMOUNT'  and `feeshead` not like '%INSTAL%'";
	
	$rs= mysql_query($ssql);
	
	$ssql1="select `amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`class` from `fees_student` as `a` where `sadmission`='$Selectedadm' and `feeshead`='TOTAL BILL AMOUNT'";
	
	$rs1= mysql_query($ssql1);
	while($row1=mysql_fetch_row($rs1))
	{
		$TotalExistingBillAmount=$row1[0];
		$sname=$row1[1];
		$discounttype=$row1[2];
		$Class=$row1[3];
		break;
	}

?>
	<br>

<table class="CSSTableGenerator"  border="1" style="align:center; width: 100%;">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="9">

		<p style="text-align: center"><b>Miscellaneous Payment History</b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Payment Head</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Receipt </strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Amount</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Txn Id</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<b>Cheque No</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<b>Bank Name</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Fees Payment Date</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Payment Mode</strong></td>


		

			</tr>
<?php
$ssql="SELECT `srno`, `date`, `HeadName`, `SubHead`, `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`, `Chequedate`, `BankName`, `Amount`, `PaymentMode`, `TxnId`, `TxnStatus`, `PGTxnId`, `Status`, `FeeReceipt`, `ReceiptCode`, `SendToBank`, `HeadType` FROM `fees_misc_collection` where `sadmissionno`='$Selectedadm' and `FinancialYear`='$CurrentFinancialYear'";


	$rs= mysql_query($ssql);
	$cnt=1;
	while($row=mysql_fetch_row($rs))
	{
		$paymentdate=$row[1];
		$headname=$row[2];
		$Amount=$row[16];
		$Receipt=$row[22];
		$TxnId=$row[18];
         $chequeno=$row[13];
         $BankName=$row[15];
         $PaymentMode=$row[17];


?>
<tr>			
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $headname;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Receipt;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Amount;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $TxnId;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $chequeno;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $BankName;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $paymentdate;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $PaymentMode;?></td>
		
</tr>		
<?php
$cnt=$cnt+1;

}
?>

</table>
<br>
<br>
<table class="CSSTableGenerator"  border="1" style="align:center; width: 100%;">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="7">

		<p style="text-align: center"><b>Refund Payment History</b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Admission No</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Name </strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Refund Date</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<b>Cheque No</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<b>Bank Name</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Cheque Date</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Refund Amount</strong></td>


		

			</tr>
<?php
$ssql="SELECT `srno`, date_format(`Entrydate`,'%d-%m-%y'), `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`,  date_format(`Chequedate`,'%d-%m-%y'), `BankName`, `Amount`, `PaymentMode`, `Status`, `RefundAmount`, `Remarks`, `FeeReceipt`, `ReceiptCode`, `SendToBank`, `HeadType` FROM `fees_refund_payment` WHERE  `sadmissionno`='$Selectedadm'";


	$rs= mysql_query($ssql);
	$cnt=1;
	while($row=mysql_fetch_row($rs))
	{
	
		$Admission=$row[3];
		$Name=$row[4];
		$RefundDate=$row[1];
		$ChequeNo=$row[11];
		$BankName=$row[13];
         $ChequeDate=$row[12];
         $Amount=$row[14];
        


?>
<tr>			
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Admission;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Name;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $RefundDate;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $ChequeNo;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $BankName;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $ChequeDate;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $Amount;?></td>
		
</tr>		
<?php
$cnt=$cnt+1;

}
?>

</table>

</div>

</div>
<br>
<br>
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


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html> 