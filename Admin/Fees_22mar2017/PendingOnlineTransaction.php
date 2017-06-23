<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<script language="javascript">
function fnlCreateMiscReceipt(txtid)
{
	var myWindow = window.open("RecoTransactionMisc.php?txnid=" + txtid ,"","width=1200,height=900");
}
function fnlCreateRegReceipt(txtid,cnt)
{
	document.getElementById("BtnSubmit"+cnt).disabled="true";
	var myWindow = window.open("RecoTransaction.php?txnid=" + txtid ,"","width=1200,height=900");
}
function fnlClearRegistrationFee(txnId,PGTxnId)
{
	var myWindow = window.open("../../UpdatePaymentRegistrationTransaction.php?txnid=" + txnId + "&txnstatus=SUCCESS&pgtxnno=" + PGTxnId,"","width=1200,height=900");
}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pending Online Transaction .</title>
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
	text-align: center;
}
</style>
</head>

<body>
<form method="post">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font face="Cambria">Pending Online Transaction</font><font size="3" face="Cambria"></p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></b></td>
  </tr>
</table> 
 

<div align="center">
<table class="CSSTableGenerator" cellpadding="0" style="border-collapse: collapse" width="100%">
   <tr>
   		<td height="22" align="center" style="width: 10px" bgcolor="#95C23D"><b><font face="Cambria">
		Sr No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b>Fees Type</b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Class</font></b></td>
		
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Head Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Txn Date </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Txn ID</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Txn Status</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		PGTxnID</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Status</font></b></td>
		
   	</tr>
<?php
$count=1;
$result=mysql_query("SELECT `srno`,(select `sadmissionno` from `fees_misc_collection_tmp` where `TxnId`=a.`TxnId`) as `sadmissionno`, (select `sname` from `fees_misc_collection_tmp` where `TxnId`=a.`TxnId`) as `sname`, (select `sclass` from `fees_misc_collection_tmp` where `TxnId`=a.`TxnId`) as `sclass`,(select `HeadName` from `fees_misc_collection_tmp` where `TxnId`=a.`TxnId`) as `HeadName`,(select `Amount` from `fees_misc_collection_tmp` where `TxnId`=a.`TxnId`) as `Amount`,`TxnId`, `StatusCitrus`, `PGTxnIdCitrus`, '',(SELECT DATE_FORMAT(`date`,'%d-%m-%Y') FROM  `fees_misc_collection_tmp` WHERE  `TxnId` =  a.`TxnId`) as `txndate` FROM `FeesTempVsCitrus` as `a` WHERE `StatusCitrus`='Transaction successful' and `Tranferred`='Pending'");

while($rs= mysql_fetch_array($result))
{
$MiscTxnId=$rs["6"];
$MiscTxnDate=$rs["10"];
?>
<tr>
	<td width="10"><font face="Cambria"><?php echo $count; ?></font></td>
    <td class="style1">
	<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 14.6667px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
	<strong>Misc Fee</strong></span></td>
    <td><font face="Cambria"><?php echo $rs["1"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["2"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["3"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["4"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["5"];?></font></td>
	<td><font face="Cambria"><?php echo $MiscTxnDate;?></font></td>
	<td><font face="Cambria"><?php echo $rs["6"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["7"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["8"];?></font></td>
	<td class="style1"><font face="Cambria"><?php echo $rs["9"];?><input type="button" value="Convert To Receipt" name="BtnSubmit" class="text-box" onclick="javascript:fnlCreateMiscReceipt('<?php echo $MiscTxnId;?>');"></font></td>	
</tr>
<?php 
$count=$count+1;  	 
}
?>
<?php
$result=mysql_query("SELECT `srno`,(select `sadmission` from `fees_temp` where `TxnId`=a.`TxnId`) as `sadmissionno`, (select `sname` from `fees_temp` where `TxnId`=a.`TxnId`) as `sname`, (select `sclass` from `fees_temp` where `TxnId`=a.`TxnId`) as `sclass`,(select `FeesType` from `fees_temp` where `TxnId`=a.`TxnId`) as `HeadName`,(select `TxnAmount` from `fees_temp` where `TxnId`=a.`TxnId`) as `Amount`,`TxnId`, `StatusCitrus`, `PGTxnIdCitrus`, '',(SELECT DATE_FORMAT(`date`,'%d-%m-%Y') FROM  `fees_temp` WHERE  `TxnId` =  a.`TxnId`) as `txndate` FROM `FeesRegularTempVsCitrus` as `a` WHERE `StatusCitrus`='Transaction successful' and `Tranferred`='Pending'");
while($rs1= mysql_fetch_array($result))
{
	$regtxndate=$rs1["10"];
	$regtxnid=$rs1["6"];
?>
<tr>
	<td width="10"><font face="Cambria"><?php echo $count; ?></font></td>
    <td class="style1">
	<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 14.6667px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
	<strong>Regular Fee</strong></span></td>
    <td><font face="Cambria"><?php echo $rs1["1"];?></font></td>
	<td><font face="Cambria"><?php echo $rs1["2"];?></font></td>
	<td><font face="Cambria"><?php echo $rs1["3"];?></font></td>
	<td><font face="Cambria"><?php echo $rs1["4"];?></font></td>
	<td><font face="Cambria"><?php echo $rs1["5"];?></font></td>
	<td><font face="Cambria"><?php echo $regtxndate;?></font></td>
	<td><font face="Cambria"><?php echo $rs1["6"];?></font></td>
	<td><font face="Cambria"><?php echo $rs1["7"];?></font></td>
	<td><font face="Cambria"><?php echo $rs1["8"];?></font></td>
	<td class="style1"><font face="Cambria"><?php echo $rs1["9"];?><input type="button" value="Convert To Receipt" name="BtnSubmit<?php echo $count; ?>" id="BtnSubmit<?php echo $count; ?>" class="text-box" onclick="javascript:fnlCreateRegReceipt('<?php echo $regtxnid; ?>','<?php echo $count; ?>');"></font></td>	
</tr>
<?php 
$count=$count+1;  	 
}
?>
<?php
$result=mysql_query("SELECT `srno`,(select `sadmission` from `NewStudentAdmission_temp` where `TxnId`=a.`TxnId`) as `sadmissionno`, (select `sname` from `NewStudentAdmission_temp` where `TxnId`=a.`TxnId`) as `sname`, (select `sclass` from `NewStudentAdmission_temp` where `TxnId`=a.`TxnId`) as `sclass`,'Admission Fees' as `HeadName`,(select `TxnAmount` from `NewStudentAdmission_temp` where `TxnId`=a.`TxnId`) as `Amount`,`TxnId`, `StatusCitrus`, `PGTxnIdCitrus`, '',(SELECT DATE_FORMAT(`date`,'%d-%m-%Y') FROM  `NewStudentAdmission_temp` WHERE  `TxnId` =  a.`TxnId`) as `txndate` FROM `FeesAdmissionTempVsCitrus` as `a` WHERE `StatusCitrus`='Transaction successful' and `Tranferred`='Pending'");
while($rs2= mysql_fetch_array($result))
{
	$AdmissionTxnDate=$rs2["10"];
?>
<tr>
	<td width="10"><font face="Cambria"><?php echo $count; ?></font></td>
    <td class="style1">
	<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 14.6667px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
	<strong>Admission Fee</strong></span></td>
    <td><font face="Cambria"><?php echo $rs2["1"];?></font></td>
	<td><font face="Cambria"><?php echo $rs2["2"];?></font></td>
	<td><font face="Cambria"><?php echo $rs2["3"];?></font></td>
	<td><font face="Cambria"><?php echo $rs2["4"];?></font></td>
	<td><font face="Cambria"><?php echo $rs2["5"];?></font></td>
	<td><font face="Cambria"><?php echo $AdmissionTxnDate;?></font></td>
	<td><font face="Cambria"><?php echo $rs2["6"];?></font></td>
	<td><font face="Cambria"><?php echo $rs2["7"];?></font></td>
	<td><font face="Cambria"><?php echo $rs2["8"];?></font></td>
	<td class="style1"><font face="Cambria"><?php echo $rs2["9"];?><input type="button" value="Convert To Receipt" name="BtnSubmit" class="text-box"></font></td>	
</tr>
<?php 
$count=$count+1;  	 
}
?>

<?php
$result=mysql_query("SELECT `srno`,(select `RegistrationNo` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId`) as `sadmissionno`, (select `sname` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId`) as `sname`, (select `sclass` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId`) as `sclass`,'Admission Fees' as `HeadName`,(select `TxnAmount` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId`) as `Amount`,`TxnId`, `StatusCitrus`, `PGTxnIdCitrus`, '',(SELECT DATE_FORMAT(`RegistrationDate`,'%d-%m-%Y') FROM  `NewStudentRegistration_temp` WHERE  `TxnId` =  a.`TxnId`) as `txndate` FROM `FeesRegistrationTempVsCitrus` as `a` WHERE `StatusCitrus`='Transaction successful' and `Tranferred`='Pending'");
while($rs3= mysql_fetch_array($result))
{
	$RegistrationTxnDate=$rs3["10"];
	$RegTxtId=$rs3["6"];
	$RegPgTxnNo=$rs3["8"];
	
?>
<tr>
	<td width="10"><font face="Cambria"><?php echo $count; ?></font></td>
    <td class="style1">
	<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 14.6667px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
	<strong>Registration Fee</strong></span></td>
    <td><font face="Cambria"><?php echo $rs3["1"];?></font></td>
	<td><font face="Cambria"><?php echo $rs3["2"];?></font></td>
	<td><font face="Cambria"><?php echo $rs3["3"];?></font></td>
	<td><font face="Cambria"><?php echo $rs3["4"];?></font></td>
	<td><font face="Cambria"><?php echo $rs3["5"];?></font></td>
	<td><font face="Cambria"><?php echo $RegistrationTxnDate;?></font></td>
	<td><font face="Cambria"><?php echo $rs3["6"];?></font></td>
	<td><font face="Cambria"><?php echo $rs3["7"];?></font></td>
	<td><font face="Cambria"><?php echo $rs3["8"];?></font></td>
	<td class="style1"><font face="Cambria"><?php echo $rs3["9"];?><input type="button" value="Convert To Receipt" name="BtnSubmit" class="text-box" onclick="javascript:fnlClearRegistrationFee('<?php echo $RegTxtId;?>','<?php echo $RegPgTxnNo;?>');"></font></td>	
</tr>
<?php 
$count=$count+1;  	 
}
?>

</table>
</div>


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html> 