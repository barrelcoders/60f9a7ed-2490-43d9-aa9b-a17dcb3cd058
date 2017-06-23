<?php
session_start();
include '../../connection.php';
?>
<?php
$ReceiptNo=$_REQUEST["txtRecpNo"];
$currentdate=Date("Y-m-d");
$ssql="SELECT `receipt`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status` from `fees` where `cheque_status`='Bounce' AND `receipt`='$ReceiptNo'";
$rs= mysql_query($ssql);

			$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];	

$rsDetail= mysql_query("select `sadmission`,`sname`,`sclass`,(select `srollno` from `student_master` where `sadmission`=a.`sadmission`) as `srollno` from `fees` as `a` where `cheque_status`='Bounce' AND `receipt`='$ReceiptNo'");
while($row2 = mysql_fetch_row($rsDetail))
{
	$sadmission=$row2[0];
	$sname=$row2[1];
	$sclass=$row2[2];
	$rollno=$row2[3];	
	break;
}
$ssql="select distinct `bank_name` from `bank_master` where status='1'";
$rsBank	= mysql_query($ssql);
	$RcptNo=$_REQUEST["txtRecpNo"];
	$PaymentMode=$_REQUEST["cboPaymentMode"];
	
	$ssql="SELECT `receipt`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status`,`sadmission`,`sname`,`sclass`,`quarter`,DATE_FORMAT(`cheque_date`,'%d-%m-%y') as `cheque_date1`,`FeesType` from fees where `cheque_status`='Bounce' AND `receipt`='$RcptNo' and `receipt` not in (select distinct `ReceiptNo` from `fees_cheque_history`)";
	$rs1= mysql_query($ssql);
	while($row1 = mysql_fetch_row($rs1))
	{
		$ReceiptNo1=$row1[0];
		$finalamount1=$row1[1];
		$chequeno1=$row1[2];
		$cheque_date1=$row1[3];
		$bankname1=$row1[4];
		$cheque_status1=$row1[5];
		
		$sadmission=$row1[6];
		$sname=$row1[7];
		$sclass=$row1[8];
		$quarter=$row1[9];
		$FormatedChequeDate=$row1[10];
		$FeesType=$row1[11];
		
		$finalamount="";
	}
	
	if($FeesType=="Hostel")
	{
		if($quarter=="Q1")
		{
			$InstallmentName="HOSTEL FIRST INSTALLMENT";
		}
		if($quarter=="Q2")
		{
			$InstallmentName="HOSTEL SECOND INSTALLMENT";
		}
		if($quarter=="Q3")
		{
			$InstallmentName="HOSTEL THIRD INSTALLMENT";
		}
		if($quarter=="Q4")
		{
			$InstallmentName="HOSTEL FOURTH INSTALLMENT";
		}
	}
	else
	{
		if($quarter=="Q1")
		{
			$InstallmentName="FEES FIRST INSTALLMENT";
		}
		if($quarter=="Q2")
		{
			$InstallmentName="FEES SECOND INSTALLMENT";
		}
		if($quarter=="Q3")
		{
			$InstallmentName="FEES THIRD INSTALLMENT";
		}
		if($quarter=="Q4")
		{
			$InstallmentName="FEES FOURTH INSTALLMENT";
		}
	}
	
	$ssql="insert into `fees_cheque_history` (`ReceiptNo`,`chequeno`,`cheque_date`,`bankname`,`cheque_status`,`sadmission`,`sname`,`sclass`) values ('$RcptNo','$chequeno1','$cheque_date1','$bankname1','$cheque_status1','$sadmission','$sname','$sclass')";

	mysql_query($ssql) or die(mysql_error());
	
	if($PaymentMode !="Cash")
	{
		$Dt = $_REQUEST["txtChequeDate"];
		$arr=explode('/',$Dt);
		$ChequeDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		$ChequeNo=$_REQUEST["txtChequeNo"];
		$BankName=$_REQUEST["cboBank"];
		if($_REQUEST["txtChequeBounceCharges"] !="")
		{
			$ChequeBountAmount=$_REQUEST["txtChequeBounceCharges"];
		}
		else
		{
			$ChequeBountAmount=0;
		}
		$NewPaidAmount=$_REQUEST["txtChequeBounceAmt"]-$ChequeBountAmount;
		$NewBalanceAmt=$_REQUEST["txtActualFeeAmount"]-$_REQUEST["txtChequeBounceAmt"]-$ChequeBountAmount;
		$cheque_status="Clear";
		
	}
	else
	{
		$cheque_status="";
		$ChequeNo="";
		$ChequeDate="";
		$BankName="";
		$cheque_status="";
		
	}
	
	if($FeesType=="Regular")
	{
		$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`receipt`,'FR/".$CurrentFinancialYear."/','') as UNSIGNED))+1 FROM `fees`");
		if (mysql_num_rows($rsReceiptNo) > 0)
		{
			while($rowRcpt = mysql_fetch_row($rsReceiptNo))
			{
				$NewReciptNo='FR/'.$CurrentFinancialYear.'/'.$rowRcpt[0];
				break;
			}
		}
		else
		{
			$NewReciptNo='FR/'.$CurrentFinancialYear.'/1';
		}
	}
	if($FeesType=="Hostel")
	{
		$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`receipt`,'HR/'.$CurrentFinancialYear.'/','') as UNSIGNED))+1 FROM `fees`");
		if (mysql_num_rows($rsReceiptNo) > 0)
		{
			while($rowRcpt = mysql_fetch_row($rsReceiptNo))
			{
				$NewReciptNo='HR/'.$CurrentFinancialYear.'/'.$rowRcpt[0];
				break;
			}
		}
		else
		{
			$NewReciptNo='HR/'.$CurrentFinancialYear.'/1';
		}
	}

	
	
	//$ssql="update `fees` set `chequeno`='$ChequeNo',`cheque_date`='$ChequeDate',`bankname`='$BankName',`cheque_status`='$cheque_status',`cheque_bounce_amt`='$ChequeBountAmount',`amountpaid`='$NewPaidAmount' where `receipt`='$RcptNo'";
	
	$ssql="insert into `fees` (`sadmission`, `sname`, `sclass`, `srollno`, `fees_amount`, `amountpaid`, `BalanceAmt`, `quarter`, `FinancialYear`, `status`, `receipt`, `date`, `datetime`, `refundamount`, `refunddate`, `cancelamount`, `canceldate`, `finalamount`, `ReceiptFileName`, `FeeReceiptCode`, `PaymentMode`, `chequeno`, `cheque_date`, `bankname`, `cheque_bounce_amt`, `ActualLateFee`, `ActualDelayDays`, `AdjustedLateFee`, `AdjustedDelayDays`, `Remarks`, `FeesType`, `TxnAmount`, `TxnId`, `TxnStatus`, `PGTxnId`) SELECT `sadmission`, `sname`, `sclass`, `srollno`, `fees_amount`, '$NewPaidAmount', '$NewBalanceAmt', `quarter`, `FinancialYear`, `status`, '$NewReciptNo', '$currentdate', `datetime`, `refundamount`, `refunddate`, `cancelamount`, `canceldate`, '$NewPaidAmount', `ReceiptFileName`, `FeeReceiptCode`, `PaymentMode`, '$ChequeNo', '$ChequeDate', '$BankName', '$ChequeBountAmount', `ActualLateFee`, `ActualDelayDays`, `AdjustedLateFee`, `AdjustedDelayDays`, `Remarks`, `FeesType`, `TxnAmount`, `TxnId`, `TxnStatus`, `PGTxnId` FROM `fees` WHERE `cheque_status`='Bounce' AND `receipt`='$ReceiptNo'";
	mysql_query($ssql) or die(mysql_error());

	$rsDetail=mysql_query("select `sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`amountpaid`,`BalanceAmt`,`quarter`,`date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`cheque_status`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Remarks`,`FeesType`,`TxnAmount`,`TxnId`,`TxnStatus`,`PGTxnId` from `fees` where `receipt`='$NewReciptNo'");
	$rsFeeHeadDeteail=mysql_query("select `feeshead`,`headamount` from `fees_transaction` where `receipt`='$NewReciptNo'");
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
	
			if($quarter=="Q1")
			{
				$FeeHead="FEES FIRST INSTALLMENT";
			}
			if($quarter=="Q2")
			{
				$FeeHead="FEES SECOND INSTALLMENT";
			}
			if($quarter=="Q3")
			{
				$FeeHead="Fees Third Installment";
			}
			if($quarter=="Q4")
			{
				$FeeHead="FEES FOURTH INSTALLMENT";
			}
			//-------------------- Previous Payment history----------------------------------------------------------
	if($FeesType=="Hostel")
	{
		$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$sadmission' and `cheque_status` !='Bounce' and `FeesType` =  'Hostel' order by `quarter`,`FinancialYear` desc limit 4";
	}
	else
	{
		$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$sadmission' and `cheque_status` !='Bounce' and `FeesType` =  'Regular' order by `quarter`,`FinancialYear` desc limit 4";
	}
	$rs = mysql_query($ssql);

?>

<script language="javascript">
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
<body>
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
				<strong>Date: '.date("d-m-Y").'</strong>&nbsp; </font>
				</td>
			</tr>
			<tr>
				<td style="padding: 1px 4px; width: 100px; height: 25px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium; border-top-style:none; border-top-width:medium" >
				<font face="Cambria"><b><span ><font style="font-size: 10pt">Adm No.</font></span></b></font>
				<span style="font-family: Cambria; font-weight: 700; " ><font style="font-size: 10pt">:</font></span></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>'.$sadmission.'</b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b><span >Name </span></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>'.$sname.'</b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b><span >Father&#39;s Name</span></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 145px; height: 25px; " >'.$FatherName.'</td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px; "  colspan="2">
				<p ><font face="Cambria" style="font-size: 10pt"><strong>Class</strong></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>'.$sclass.'</b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " ><span style="font-family: Cambria; font-weight: 700; " ><font style="font-size: 10pt">Roll No</font></span></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px;" ><font face="Cambria" style="font-size: 10pt"><b>'.$srollno.'</b></font></td>
			</tr>
		</table><font face="Cambria" style="font-size: 10pt">

	</span>
		</font>
		<table style="border-width:0px; width: 100%" cellpadding="0"  >
			<tr>
				<td style="width: 206px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>Mode Of Payment</b></font></td>
				<td style="padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" width="207"  >
				<font face="Cambria" style="font-size: 10pt"><b>Cheque</b></font></td>
				<td style="width: 207px;padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><strong>Cheque No.</strong></font></td>
				<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>'.$chequeno1.'</b></font></td>
				<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>Cheque Date</b></font></td>
				<td width="207" style="padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>'.$FormatedChequeDate.'</b></font></td>
				<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>Bank Name</b></font></td>
				<td width="207" style="padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>'.$bankname1.'</b></font></td>
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
echo $strOneReceipt;
		
		$ssql="insert into `fees_receipt_code` (`sadmission`,`ReceiptNo`,`ReceiptCode`) values ('$sadmission','$NewReciptNo','$strOneReceipt')";
		if($sadmission !="")
		{
		mysql_query($ssql) or die(mysql_error());
		}
		$strOneReceipt="";
?>
</body>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a>
</font> 
	
</div>
