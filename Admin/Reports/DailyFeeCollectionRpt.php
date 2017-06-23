<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<head>
<style type="text/css">
.style1 {
	border-color: #FFFFFF;
	border-width: 0px;
	border-collapse: collapse;
	}
.style4 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style5 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
</style>
</head>

<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");
if ($_REQUEST["isSubmit"]=="yes")
{
	$Dt=$_REQUEST["txtDate1"];
	$arr=explode('/',$Dt);
	$StartDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$ShowDate1=$arr[1]."-".$arr[0]."-".$arr[2];
	$Dt=$_REQUEST["txtDate2"];
	$arr=explode('/',$Dt);
	$EndDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$ShowDate2=$arr[1]."-".$arr[0]."-".$arr[2];
	
	//$ssql="SELECT `ReceiptNo`,`PBalanceReceiptNo`, (select `sname` from `fees` where `receipt` =a.`ReceiptNo`) as `name`, (select `sclass` from `fees` where `receipt` =a.`ReceiptNo`) as `class`, (select `srollno` from `fees` where `receipt` =a.`ReceiptNo`) as `rollno`, `TutionFee`,`TransportFee`,`AnnualCharges`,`ActualLateFee`,`AdjustedLateFee`,`PreviousBalance`,`PaidBalanceAmt`,`CurrentBalance`,`Discount` FROM `fees_transaction` as `a` WHERE `ReceiptDate`='2014-11-20'";
	$ssql="SELECT `ReceiptNo`,`PBalanceReceiptNo`, (select `sname` from `fees` where `receipt` =a.`ReceiptNo`) as `name`, (select `sclass` from `fees` where `receipt` =a.`ReceiptNo`) as `class`, (select `srollno` from `fees` where `receipt` =a.`ReceiptNo`) as `rollno`, `TutionFee`,`TransportFee`,`AnnualCharges`,`ActualLateFee`,`AdjustedLateFee`,`PreviousBalance`,`PaidBalanceAmt`,`CurrentBalance`,`Discount`,`ReceiptDate` FROM `fees_transaction` as `a` WHERE `ReceiptDate`>='$StartDt' and `ReceiptDate`<='$EndDt'";
	$rs= mysql_query($ssql);
	
?>
<?php
	$strTable='<table width="100%" border="1" style="border-collapse: collapse">';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td colspan="16" align="center"><b><font face="Calibri">Daily Collection Report ('.$ShowDate1.' to '.$ShowDate2.')</font></b></td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="center">SrNo</td>';
	$strTable=$strTable.'<td align="center">Receipt No</td>';
	$strTable=$strTable.'<td align="center">Receipt Date</td>';
	$strTable=$strTable.'<td align="center">Balance Receipt No</td>';
	$strTable=$strTable.'<td align="center">Name</td>';
	$strTable=$strTable.'<td align="center">Class</td>';
	$strTable=$strTable.'<td align="center">Roll No.</td>';
	$strTable=$strTable.'<td align="center">Tuetion Fee.</td>';
	$strTable=$strTable.'<td align="center">Transport Fee.</td>';
	$strTable=$strTable.'<td align="center">Annual Fee</td>';
	$strTable=$strTable.'<td align="center">Actual Late Fee</td>';
	$strTable=$strTable.'<td align="center">Paid Late Fee</td>';
	$strTable=$strTable.'<td align="center">Previous Balance</td>';
	$strTable=$strTable.'<td align="center">Paid Balance Amt.</td>';
	$strTable=$strTable.'<td align="center">Current Balance</td>';
	$strTable=$strTable.'<td align="center">Discount</td>';
	$strTable=$strTable.'</tr>';
?>

<?php
if (mysql_num_rows($rs) > 0)
{
	$RowCnt=1;
		$TotalTutionFee=0;
		$TotalTransportFee=0;
		$TotalAnnualCharges=0;
		$TotalActualLateFee=0;
		$TotalAdjustedLateFee=0;
		$TotalPreviousBalance=0;
		$TotalPaidBalanceAmt=0;
		$TotalCurrentBalance=0;
		$TotalDiscount=0;			
		
	while($row = mysql_fetch_row($rs))
	{
		$ReceiptNo=$row[0];
		$BalanceReceiptNo=$row[1];
		$Name=$row[2];
		$Class=$row[3];
		$RollNo=$row[4];
		
		$TutionFee=$row[5];
		$TransportFee=$row[6];
		$AnnualCharges=$row[7];
		$ActualLateFee=$row[8];			
		$AdjustedLateFee=$row[9];			
		$PreviousBalance=$row[10];			
		$PaidBalanceAmt=$row[11];			
		$CurrentBalance=$row[12];			
		$Discount=$row[13];
		$ReceiptDate=$row[14];
		$arr=explode('-',$ReceiptDate);
		$ReceiptDate = $arr[2] . "-" . $arr[1] . "-" . $arr[0];			
			
		
		$TotalTutionFee=$TotalTutionFee+$TutionFee;
		$TotalTransportFee=$TotalTransportFee+$TransportFee;
		$TotalAnnualCharges=$TotalAnnualCharges+$AnnualCharges;
		$TotalActualLateFee=$TotalActualLateFee+$ActualLateFee;
		$TotalAdjustedLateFee=$TotalAdjustedLateFee+$AdjustedLateFee;
		$TotalPreviousBalance=$TotalPreviousBalance+$PreviousBalance;
		$TotalPaidBalanceAmt=$TotalPaidBalanceAmt+$PaidBalanceAmt;
		$TotalCurrentBalance=$TotalCurrentBalance+$CurrentBalance;
		$TotalDiscount=$TotalDiscount+$Discount;	
?>
<?php		
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="center">'.$RowCnt.'</td>';
	$strTable=$strTable.'<td align="center">'.$ReceiptNo.'</td>';
	$strTable=$strTable.'<td align="center">'.$ReceiptDate.'</td>';
	$strTable=$strTable.'<td align="center">'.$BalanceReceiptNo.'</td>';
	$strTable=$strTable.'<td align="center">'.$Name.'</td>';
	$strTable=$strTable.'<td align="center">'.$Class.'</td>';
	$strTable=$strTable.'<td align="center">'.$RollNo.'</td>';
	$strTable=$strTable.'<td align="center">'.$TutionFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$TransportFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$AnnualCharges.'</td>';
	$strTable=$strTable.'<td align="center">'.$ActualLateFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$AdjustedLateFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$PreviousBalance.'</td>';
	$strTable=$strTable.'<td align="center">'.$PaidBalanceAmt.'</td>';
	$strTable=$strTable.'<td align="center">'.$CurrentBalance.'</td>';
	$strTable=$strTable.'<td align="center">'.$Discount.'</td>';
	$strTable=$strTable.'</tr>';
?>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
<?php
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td colspan="7" align="right"><strong>Total:</strong></td>';
	$strTable=$strTable.'<td align="center">'.$TotalTutionFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalTransportFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalAnnualCharges.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalActualLateFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalAdjustedLateFee.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalPreviousBalance.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalPaidBalanceAmt.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalCurrentBalance.'</td>';
	$strTable=$strTable.'<td align="center">'.$TotalDiscount.'</td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'</table>';
	echo $strTable;
	exit();
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: communication@emeraldsis.com' . "\r\n";
	//$strMailBody=$_REQUEST["htmlcode"];
	//$to = $EmailID;
	//$to = "inderprakash@gmail.com";
	$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
	$subject="Daily Collection Report";
	mail($to,$subject,$strTable,$headers);
}	
?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("txtDate1").value =="")
	{
		alert ("Please select date!");
		return;
	}
	document.getElementById("frmReport").submit();
}
</script>
<!-- link calendar resources -->

	<head>
	<meta http-equiv="Content-Language" content="en-us">

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>
<table style="width: 100%" class="style1">
<form name="frmReport" id="frmReport" method="post" action="DailyFeeCollectionRpt.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		<td class="style4" style="width: 265px">Start Date:</td>
		<td class="style2" style="width: 265px"><input name="txtDate1" id="txtDate1" class="tcal" style="width: 108px" type="text"></td>
		<td class="style4" style="width: 266px">
		End Date:</td>
		<td class="style2" style="width: 266px"><input name="txtDate2" id="txtDate2" class="tcal" style="width: 108px" type="text"></td>
	</tr>	
	<tr>
		<td class="style5" colspan="4">
		<input name="btnSubmit" type="button" value="Submit" onclick="Validate();"></td>
	</tr>	
</form>
</table>



