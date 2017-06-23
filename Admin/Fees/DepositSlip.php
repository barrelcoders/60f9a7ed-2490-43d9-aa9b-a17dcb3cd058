
<?php

include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$Selectedbankname=$_REQUEST["txtSelectedBank"];
$SchoolBank=$_REQUEST["txtschoolbank"];
$StartDate = $_REQUEST["SelectedStartDate"];
$EndDate =$_REQUEST["SelectedEndDate"];

$currentdate=date("Y-m-d");
$currentdate1=date("d-m-Y");
$rsShoolBankDetail=mysql_query("select `AccountNo` from `School_Bank_Details` where `BankName`='$SchoolBank'");
while($rsB=mysql_fetch_row($rsShoolBankDetail))
{
	$AccountNo=$rsB[0];
	break;
}

$rsSlipNo=mysql_query("select max(`SlipNo`) from `fees_cheque_bank_deposit`");
while($rowS=mysql_fetch_row($rsSlipNo))
{
	$NewSlipNo=$rowS[0];
	break;
}
if($NewSlipNo=="")
{
	$NewSlipNo=1;
}
else
{
	$NewSlipNo=$NewSlipNo+1;
}


$ssql="select `srno` , `sadmission`, `sname`, `sclass`,`quarter`,`chequeno`,`cheque_date`,`bankname`,`amountpaid`,`receipt`,`date` from `fees` where SendToBank='' and `chequeno` !=  '' and `date`>='$StartDate' and `date`<='$EndDate' order by `bankname`";

$rs=mysql_query($ssql);

$ssql="select `srno` , `sadmissionno`, `sname`, `sclass`,'' as `quarter`,`ChequeNo`,`Chequedate`,`BankName`,`Amount`,`FeeReceipt`,`date` from `fees_misc_collection` where `SendToBank`='' and `ChequeNo` !=  '' and `date`>='$StartDate' and `date`<='$EndDate' order by `BankName`";
$rs1=mysql_query($ssql);

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

<html>
<head>
<title>Cheque Deposit</title>

<style type="text/css">
.style1 {
	font-family: Cambria;
	font-size: 11pt;
}
.style2 {
	text-align: center;
}
.style3 {
	font-family: Cambria;
}
</style>

</head>

<body>
<div id="MasterDiv">
<table width="100%">
<tr>
	<td align="center"><h2 align="center"><font face="Cambria"><b>DELHI PUBLIC SCHOOL</b></font></h2></td>
</tr>
<tr>
	<td align="center">
<p align="center"><font face="Cambria"><b>SECTOR-19,Faridabad</b></font></td>
</tr>
</table>
</p>
<hr/>
<h3 align="center"><font face="Cambria" size="3">CHEQUE DEPOSIT SLIP - <?php echo $NewSlipNo;?><br>Date: <?php echo $currentdate1;?> </font></h3>
<table>
<tr>
	<td><font face="Cambria">The Manager</font></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td><font face="Cambria">FARIDABAD</font></td>
</tr>
</table>
&nbsp;<table width="100%">
<tr>
	<td><font face="Cambria">Dear Sir,</font></td>
</tr>
<tr>
	<td><font face="Cambria"></rp>Please find enclosed harewith Cheques as per details given below. Kindly encash these Cheques and credit our SAVING A/C No:<?php echo $AccountNo;?></font></td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" style="border-collapse: collapse; ">
<tr>
	<td align="center" colspan="11">&nbsp;</td>
</tr>
<tr>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;">
	<font face="Cambria"><b>Sr.No. </b></font></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;"><font face="Cambria"><b>Cheque No</b></font></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;"><font face="Cambria"><b>Cheque Date</b></font></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;"><font face="Cambria"><b>Cheque Amount</b></font></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;"><b><font face="Cambria">Bank Name</font></b></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;"><b><font face="Cambria">Drawn in Favour Of</font></b></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style3">
	<strong>Receipt No</strong></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style3">
	<strong>Receipt Date</strong></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;"><b><font face="Cambria">Admission No</font></b></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 140px;"><b><font face="Cambria">Name</font></b></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 140px;"><b><font face="Cambria">Class</font></b></td>
</tr>
<?php
$TotalAmount=0;
$recno=1;
$TotalchequeAmount=0;
while($row=mysql_fetch_row($rs))
{
	$srno=$row[0];
	$sadmission=$row[1];
	$sname=$row[2];
	$sclass=$row[3];
	$quarter=$row[4];
	$chequeno=$row[5];
	$cheque_date=$row[6];
	$bankname=$row[7];
	$chequeAmount=$row[8];
	$ReceiptNo=$row[9];
	$ReceiptDate=$row[10];
	$TotalchequeAmount=$TotalchequeAmount+$chequeAmount;
	$TotalAmount=$TotalAmount+$chequeAmount;
	$ssql="INSERT INTO `fees_cheque_bank_deposit` (`sadmission`,`sname`,`sclass`,`Quarter`,`ChequeNo`,`ChequeDate`,`ChequeBankName`,`SchoolBankName`,`SchoolBankAccountNo`,`DepositDate`,`SlipNo`,`ChequeAmount`) values ('$sadmission','$sname','$sclass','$quarter','$chequeno','$cheque_date','$bankname','$SchoolBank','$AccountNo','$currentdate','$NewSlipNo','$chequeAmount')";
	//echo $ssql."<br>";
	mysql_query($ssql) or die(mysql_error());
	mysql_query("update `fees` set `SendToBank`='$bankname' where `sadmission`='$sadmission' and `chequeno`='$chequeno'") or die(mysql_error());
    	
?>
<tr>
	<td align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; width: 139px;" class="style1"> 
	<?php echo $recno;?>.</td>
	<td align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; width: 139px;" class="style1">
	<?php echo $chequeno;?></td>
	<td align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; width: 139px;" class="style1">
	<?php echo $cheque_date;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $chequeAmount;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $bankname;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1">Delhi Public School</td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $ReceiptNo; ?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $ReceiptDate; ?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $sadmission;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 140px;" class="style1"><?php echo $sname;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 140px;" class="style1"><?php echo $sclass;?></td>
</tr>
<?php
$recno=$recno+1;
}
while($row=mysql_fetch_row($rs1))
{
	$srno=$row[0];
	$sadmission=$row[1];
	$sname=$row[2];
	$sclass=$row[3];
	$quarter=$row[4];
	$chequeno=$row[5];
	$cheque_date=$row[6];
	$bankname=$row[7];
	$chequeAmount=$row[8];
	$ReceiptNo=$row[9];
	$ReceiptDate=$row[10];

	$TotalchequeAmount=$TotalchequeAmount+$chequeAmount;
	$TotalAmount=$TotalAmount+$chequeAmount;
	$ssql="INSERT INTO 
	`fees_cheque_bank_deposit` (`sadmission`,`sname`,`sclass`,`Quarter`,`ChequeNo`,`ChequeDate`,`ChequeBankName`,`SchoolBankName`,`SchoolBankAccountNo`,`DepositDate`,`SlipNo`,`ChequeAmount`) values ('$sadmission','$sname','$sclass','$quarter','$chequeno','$cheque_date','$bankname','$SchoolBank','$AccountNo','$currentdate','$NewSlipNo','$chequeAmount')";
	echo $ssql."<br>";
	mysql_query($ssql) or die(mysql_error());
	mysql_query("update `fees_misc_collection` set `SendToBank`='$bankname' where `sadmission`='$sadmission' and `chequeno`='$chequeno'") or die(mysql_error());
?>
<tr>
	<td align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; width: 139px;" class="style1"> 
	<?php echo $recno;?>.</td>
	<td align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; width: 139px;" class="style1">
	<?php echo $chequeno;?></td>
	<td align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; width: 139px;" class="style1">
	<?php echo $cheque_date;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $chequeAmount;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $bankname;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1">Delhi Public School</td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $ReceiptNo;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $ReceiptDate;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 139px;" class="style1"><?php echo $sadmission;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 140px;" class="style1"><?php echo $sname;?></td>
	<td align="center" style="border-style: solid; border-width: 1px; width: 140px;" class="style1"><?php echo $sclass;?></td>
</tr>
<?php
$recno=$recno+1;
}
?>
<tr>
<td colspan="3" style="border-style: solid; border-width: 1px"><font face="Cambria"><b> Total Amount:</b></font></td>
<td style="border-style: solid; border-width: 1px; width: 139px;" class="style2"><span class="style1"><?php echo $TotalchequeAmount;?></span></td>
<td colspan="2" style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
</tr>
</table>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	|| <a href="FetchStudentDetail.php">HOME</a>
</font> 
	
</div>
</body>
</html>