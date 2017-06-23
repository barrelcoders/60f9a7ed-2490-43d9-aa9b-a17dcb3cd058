<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
	$MyTxnId=$_REQUEST["txnid"];
	$rsPending=mysql_query("select `receipt` from `fees` where `PaymentMode` in ('Cheque','Demand Draft') and `quarter`='Q3'");
	while($rowP = mysql_fetch_row($rsPending))
	{		
			$receipt=$rowP[0];
			$currentdate=date("Y-m-d");
			$currentmonth=date("M");
			$currentYear=date("Y");
			
					$rsChk=mysql_query("select `quarter`,`FinancialYear`,`sadmission` from `fees_temp` where `receipt`='$receipt'");
					while($rows = mysql_fetch_row($rsChk))
					{
						$quarter=$rows[0];
						$FinancialYear=$rows[1];
						$AdmissionNo=$rows[2];
						$sadmission=$rows[2];
						break;
					}
		
		$sqlStudentDetail = "select `sfathername` from  `student_master` where `sadmission`='$AdmissionNo'";
		$rsStudentDetail = mysql_query($sqlStudentDetail);

		while($rows = mysql_fetch_row($rsStudentDetail))
		{
			$FatherName=$rows[0];
			break;
		}
					
				
				$rsDetail=mysql_query("select `sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`amountpaid`,`BalanceAmt`,`quarter`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`cheque_status`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Remarks`,`FeesType`,`TxnAmount`,`TxnId`,`TxnStatus`,`PGTxnId` from `fees` where `receipt`='$receipt'");
				
				while($rowDetail = mysql_fetch_row($rsDetail))
				{
					$sadmission=$rowDetail[0];
					$sname=$rowDetail[1];
					$sclass=$rowDetail[2];
					$srollno=$rowDetail[3];
					$fees_amount=$rowDetail[4];
					$amountpaid=$rowDetail[5];
					$BalanceAmt=$rowDetail[6];
					$quarter=$rowDetail[7];
					$date=$rowDetail[8];
					$OldReceiptdate=$rowDetail[8];
					$FinancialYear=$rowDetail[9];
					$status=$rowDetail[10];
					$receipt=$rowDetail[11];
					$finalamount=$rowDetail[12];
					$ReceiptFileName=$rowDetail[13];
					$PaymentMode=$rowDetail[14];
					$chequeno=$rowDetail[15];
					$bankname=$rowDetail[16];
					$cheque_date=$rowDetail[17];
					$cheque_status=$rowDetail[18];
					$ActualLateFee=$rowDetail[19];
					$ActualDelayDays=$rowDetail[20];
					$AdjustedLateFee=$rowDetail[21];
					$AdjustedDelayDays=$rowDetail[22];
					$Remarks=$rowDetail[23];
					$FeesType=$rowDetail[24];
					$TxnAmount=$rowDetail[25];
					$TxnId=$rowDetail[26];
					$TxnStatus=$rowDetail[27];
					$PGTxnId=$rowDetail[28];
					break;
				}
//-------------------- Previous Payment history----------------------------------------------------------
	$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$sadmission' order by `quarter`,`FinancialYear` desc limit 4";
	$rs = mysql_query($ssql);
	
//****************	
?>
<?php
$strOneReceipt='
<div id="MasterDiv">
<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	font-size: 12pt;
}
.style3 {
	text-align: right;
}
.style4 {
	border-collapse: collapse;
}
</style>

	<div style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
		<table id="table_11" cellspacing="0" cellpadding="0" width="100%" class="style4">
			<tr>
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="11" class="style1" align="center">
				<font face="Cambria" class="style2"><strong>'.$SchoolName.'<br>'.$SchoolAddress.'</strong></font></td>
			</tr>
			<tr>
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="7">
				<font face="Cambria" style="font-size: 10pt"><strong>Fees 
				Receipt No. '.$receipt.'</strong>
				</font></td>
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="4">
				<p class="style3"><font face="Cambria" style="font-size: 10pt">
				<strong>Date: '.$OldReceiptdate.'</strong>&nbsp; </font>
				</td>
			</tr>
			<tr>
				<td style="padding: 1px 4px; width: 100px; height: 25px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium; border-top-style:none; border-top-width:medium" >
				<font face="Cambria"><b><span ><font style="font-size: 10pt">Adm 
				No.
				</font></span></b></font>
				<span style="font-family: Cambria; font-weight: 700; " >
				<font style="font-size: 10pt">:</font></span></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>'.$sadmission.'</b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b><span >Name </span></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>'.$sname.'</b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b><span >Father&#39;s Name</span></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 145px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b><span >'.$FatherName.'</span></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px; "  colspan="2">
				<p ><font face="Cambria" style="font-size: 10pt"><strong>Class</strong></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>'.$sclass.'</b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<span style="font-family: Cambria; font-weight: 700;" >
				<font style="font-size: 10pt">Roll No</font></span></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px;" >
				<font face="Cambria" style="font-size: 10pt"><b>'.$srollno.'</b></font></td>
			</tr>
		</table><font face="Cambria" style="font-size: 10pt">

	</span>
		</font>
		<table style="border-width:0px; width: 100%" cellpadding="0"  >
			<tr>
				<td style="width: 206px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>Mode Of Payment</b></font></td>
				<td style="padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" width="207"  >
				<font face="Cambria" style="font-size: 10pt"><b>'.$PaymentMode.'</b></font></td>
				<td style="width: 207px;padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><strong>Cheque / D.D. No.</strong></font></td>
				<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>'.$chequeno.'</b></font></td>
				<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
				<font face="Cambria" style="font-size: 10pt"><strong>Bank Name</strong></font></td>
				<td width="207" style="padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>'.$bankname.'
		</b></font></td>
			</tr>
		</table></div>
	<table width="100%" style="border-style:dotted; border-width:1px; background-image: url("../images/emerald_logo.png"); background-position: center; background-repeat:no-repeat; border-collapse:collapse; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" cellpadding="0" border="1" cellspacing="0">
		
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 6px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Fees Payment for 
			Quarter</font></td>
			<td  style="border-style:dotted; border-width:1px; height: 6px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
			<strong><font face="Cambria" style="font-size: 10pt">'.$quarter.'</font></strong></td>
		</tr>
		<tr>
			<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center" >
			<font face="Cambria" style="font-size: 10pt"><b>Total Fees Payable</b></font></td>
			<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">'.$finalamount.'</font></td>
		</tr>
		<tr>
			<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center" >
			<font face="Cambria" style="font-size: 10pt"><b>Total Fees Paid</b></font></td>
			<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">'.$amountpaid.'</font></td>
		</tr>
		<tr>
			<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center" >
			<font face="Cambria" style="font-size: 10pt"><b>Balance Forward</b></font></td>
			<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">'.$BalanceAmt.'</font></td>
		</tr>
	</table>

<table width="100%" cellpadding="0" style="border-collapse: collapse" >
	<tr>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Fee Quarter</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" class="style1" >
		<font face="Cambria" style="font-size: 10pt"><strong>Receipt #</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Fee Payable</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Fee Paid</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Balance</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Status</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Payment Date</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Financial Year</strong></font></td>
	</tr>';
while($row = mysql_fetch_row($rs))
	{
					
					$quarter=$row[0];
					$fees_amount=$row[1];
					$amountpaid=$row[2];
					$BalanceAmt=$row[3];
					$status=$row[4];
					$receipt=$row[5];
					$date=$row[6];
					$FinancialYear=$row[7];				
$strOneReceipt=$strOneReceipt.'
	<tr>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
		<font face="Cambria" style="font-size: 10pt">'.$quarter.'</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$receipt.'
		</font>
		</td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$fees_amount.'
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$amountpaid.'</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$BalanceAmt.'</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$status.'</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">'.$date.'</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">'.$FinancialYear.'</font></td>
	</tr>';
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
					
$strOneReceipt=$strOneReceipt.'
	<tr>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
		<font face="Cambria" style="font-size: 10pt">
		
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$BalanceReceiptNo.'
		</font>
		</td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$PayableBalanceAmt.'
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$PaidBalanceAmt.'
	</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">'.$OutstandingAmt.'</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">'.$ReceiptDate.'</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">'.$FinancialYear.'</font></td>
	</tr>';
		}
	}
}

$strOneReceipt=$strOneReceipt.'
	<tr>
		<td  colspan="8">
		<p align="right"><font face="Cambria" style="font-size: 10pt"><em>
		For 
		any queries, Kindly call at : 

		</span>



		</em></font><em><font style="font-size: 10pt">
		<span style="font-family: Cambria; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none">'.$SchoolPhoneNo.' 
		or drop an email at

		</span></font>
		<span style="color: rgb(204, 51, 0); font-family: Cambria; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; font-style:normal">
		<span >
		<font style="font-size: 10pt">'.$AccountsEmailId.'</font></span></a></span></em><span style="font-family: Cambria; font-size: 10pt; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none">
		<br>(Fees Incharge)</span></td>
	</tr>
</table>
</div>';
//echo $strOneReceipt;
		$rsChk=mysql_query("select * from `fees_receipt_code1` where `ReceiptNo`='$receipt'");
		if(mysql_num_rows($rsChk)==0)
		{
		$ssqlFF="insert into `fees_receipt_code1` (`sadmission`,`ReceiptNo`,`ReceiptCode`) values ('$sadmission','$receipt','$strOneReceipt')";
		mysql_query($ssqlFF) or die(mysql_error());
		}
		$strOneReceipt="";
		$ssqlFF="";
}//End of First While Loop
?>
