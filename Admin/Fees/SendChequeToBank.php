<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedadm=$_REQUEST["txtadm"];
	$Selectedname=$_REQUEST["txtname"];
	$Selectedrecno=$_REQUEST["txtrecno"];
	$Selectedbankname=$_REQUEST["txtbankname"];
	$Selectedchequeno=$_REQUEST["txtchequeno"];
	$Selectedquater=$_REQUEST["txtquater"];
	$Selectedate=$_REQUEST["txtdate"];
	
	$Dt1=$_REQUEST["txtDt1"];
		$arr=explode('/',$Dt1);
		$StartDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];

	$Dt2=$_REQUEST["txtDt2"];
	$arr=explode('/',$Dt2);
		$EndDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$ssql="select `srno` , `sadmission`, `sname`, `sclass`,`quarter`,`chequeno`,DATE_FORMAT(`cheque_date`,'%d-%m-%Y') as `cheque_date`,`bankname`,(`amountpaid`+`cheque_bounce_amt`) as `amountpaid`,`receipt` from `fees` where SendToBank='' and 1=1 and `chequeno` !=  '' and `cheque_status` !='Bounce' and `date`>='$StartDate' and `date`<='$EndDate'";
	$ssql=$ssql." order by `bankname`";
	$rsFees= mysql_query($ssql);
	
	
	$ssql="select `srno` , `sadmission`, `sname`, `sclass`,`quarter`,`chequeno`,DATE_FORMAT(`cheque_date`,'%d-%m-%Y') as `cheque_date`,`bankname`,(`amountpaid`+`cheque_bounce_amt`) as `amountpaid`,`receipt` from `fees_hostel` where SendToBank='' and 1=1 and `chequeno` !=  '' and `cheque_status` !='Bounce' and `date`>='$StartDate' and `date`<='$EndDate'";
	$ssql=$ssql." order by `bankname`";
	$rs= mysql_query($ssql);

	
	$ssql="select `srno` , `sadmissionno`, `sname`, `sclass`,'' as `quarter`,`ChequeNo`,DATE_FORMAT(`Chequedate`,'%d-%m-%Y') as `Chequedate`,`BankName`, (`Amount`+`ChequeBounceAmt`) as`Amount`,`FeeReceipt` as `receipt`,`VendorName` from `fees_misc_collection` where `SendToBank`='' and `ChequeNo` !=  '' and `date`>='$StartDate' and `date`<='$EndDate' order by `BankName`";
	$rs1=mysql_query($ssql);
	
	$ssql="select `srno` , `RegistrationNo`, `sname`, `sclass`,`TxnId`,DATE_FORMAT(`ChequeDate`,'%d-%m-%Y') as `Chequedate`, (`TxnAmount`+`ChequeBounceAmt`) as `TxnAmount`,`RegistrationFormNo` as `receipt`,`BankName` from `NewStudentRegistration` where `PaymentMode`='Cheque' and `RegistrationDate`>='$StartDate' and `RegistrationDate`<='$EndDate'";
	$rs2=mysql_query($ssql);
      
      $ssql3="select `srno` , `sadmission`, `sname`, `sclass`,`TxnId`,DATE_FORMAT(`ChequeDate`,'%d-%m-%Y') as `Chequedate`, (`TxnAmount`+`ChequeBounceAmt`) as `TxnAmount`,`AdmissionFeeReceipt` as `receipt`,`BankName` from `NewStudentAdmission` where `PaymentMode`='Cheque' and `AdmissionDate`>='$StartDate' and `AdmissionDate`<='$EndDate'";
	$rs3=mysql_query($ssql3);

 //echo $ssql;
 //echo $ssql3;

}
?>

<script language="javascript">
function fnlDipositSlip()
{
document.getElementById("frmRpt").action="DepositSlip.php";
document.getElementById("frmRpt").submit();
}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Receipt Details </title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
	<script type="text/javascript" src="tcal.js"></script>

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
.style2 {
	text-align: right;
	font-family: Cambria;
}
</style>
</head>

<body>

<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font face="Cambria">Send Cheques To Bank</font><font size="3" face="Cambria"></p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></b></td>
  </tr>
</table> 
 
<table width="100%" style="border-collapse: collapse;" border="0">
<form name="frmRpt" id="frmRpt" method="post" action="SendChequeToBank.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<input type="hidden" name="SelectedStartDate" id="SelectedStartDate" value="<?php echo $StartDate;?>">
<input type="hidden" name="SelectedEndDate" id="SelectedEndDate" value="<?php echo $EndDate;?>">

<input type="hidden" name="txtSelectedBank" id="txtSelectedBank" value="<?php echo $Selectedbankname;?>">

<tr><td><font face="Cambria"><b>Search By Options:</b></font><p>&nbsp;</p>

</td>
		<td style="width: 278px">&nbsp;</td>
</tr>
<table>

<table width="100%" height="33">

<tr>

		<td style="width: 206px" align="left"><b><font face="Cambria">Select 
		Date</font></td>
		<td style="width: 206px" align="left"></b> 
			<input name="txtDt1" id="txtDt1" type="text" class="tcal"> To <input name="txtDt2" id="txtDt2" type="text" class="tcal">
		</td>

		<td align="left">&nbsp;</td>

		<td style="width: 207px" align="left"><b><font face="Cambria"><?php if($_REQUEST["isSubmit"]=="yes") {?>Bank for Sending Cheques<?php }?></font></b></td>
		<td align="left" width="207">
		<?php if($_REQUEST["isSubmit"]=="yes") {?>
		
		<select name="txtschoolbank" id="txtschoolbank" style="float: left" ; required >
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `BankName` FROM `School_Bank_Details`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select>
			<?php
			}
			?>
			</td>

		<td align="left" width="207"></font></b></font></b>
		<?php if($_REQUEST["isSubmit"]=="yes") {?>
		<input type="button" value="Create Deposit Slip" name="B1" style="font-weight: 700" onclick="javascript:fnlDipositSlip();">
		<?php
		}
		?>
		</td>

</tr>

<tr>

		<td style="width: 206px" align="left">
		<?php if($_REQUEST["isSubmit"]!="yes") {?>
		<input name="Submit1" type="submit" class="theButton" value="Search" style="font-weight: 700">
		<?php
		}
		?>
		</td>
		<td style="width: 206px" align="left">&nbsp;</td>

		<td align="left">&nbsp;</td>

		<td style="width: 207px" align="left">&nbsp;</td>
		<td align="left" width="207">&nbsp;</td>

		<td align="left" width="207">&nbsp;</td>

</tr>
</table>
<br>
</p>
<table align="center">
<tr>
		<td class="style1" >
		&nbsp;</td>
</tr>
</table>
</form>
</table>
<br>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
?>


<div align="center">
<table  class="CSSTableGenerator" cellspacing="0" cellpadding="0" style="width: 100%">
   <tr>
   		<td height="22" align="center" style="width: 50px" bgcolor="#95C23D"><b><font face="Cambria">
		Sr No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Name / Vendor</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Quarter</font></b></td>
		
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque No</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		CReceipt No</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">Bank Name</font></b></td>
		
		
   	</tr>
<?php
	$recno=1;
	$TotalChequeAmount=0;
	while($row = mysql_fetch_row($rs))
	{
	$ReciptNo=$row[9];
	$TotalChequeAmount=$TotalChequeAmount+$row[8];
?>
<tr>

<td style="width: 50px"><?php echo $recno;?></td>
<td style="width: 135px"><?php echo $row[1];?></td>
<td style="width: 135px"><?php echo $row[2];?></td>
<td style="width: 135px"><?php echo $row[3];?></td>
<td style="width: 136px"><?php echo $row[4];?></td>
<td style="width: 136px"><?php echo $row[5];?></td>
<td style="width: 136px" class="style1"><?php echo $ReciptNo;?> </td>
<td style="width: 136px"><?php echo $row[8];?></td>
<td style="width: 136px"><?php echo $row[6];?></td>
<td style="width: 136px"><?php echo $row[7];?></td>
</tr>
<?php

}

?>
<?php
	$recno=1;
	
	while($row = mysql_fetch_row($rsFees))
	{
	$ReciptNo=$row[9];
	$TotalChequeAmount=$TotalChequeAmount+$row[8];
?>
<tr>

<td style="width: 50px"><?php echo $recno;?></td>
<td style="width: 135px"><?php echo $row[1];?></td>
<td style="width: 135px"><?php echo $row[2];?></td>
<td style="width: 135px"><?php echo $row[3];?></td>
<td style="width: 136px"><?php echo $row[4];?></td>
<td style="width: 136px"><?php echo $row[5];?></td>
<td style="width: 136px" class="style1"><?php echo $ReciptNo;?> </td>
<td style="width: 136px"><?php echo $row[8];?></td>
<td style="width: 136px"><?php echo $row[6];?></td>
<td style="width: 136px"><?php echo $row[7];?></td>
</tr>
<?php
$recno=$recno+1;
	}
?>


<?php
	while($row1 = mysql_fetch_row($rs1))
	{
		$ReciptNo=$row1[9];
		$Vendor=$row1[10];
		$TotalChequeAmount=$TotalChequeAmount+$row1[8];
?>
<tr>

<td style="width: 50px"><?php echo $recno;?></td>
<td style="width: 135px"><?php echo $row1[1];?></td>
<td style="width: 135px">
<?php 
if($row1[2] =="")
{
	echo $Vendor;
}
else
{
echo $row1[2];
}
?></td>
<td style="width: 135px"><?php echo $row1[3];?></td>
<td style="width: 136px"><?php echo $row1[4];?></td>
<td style="width: 136px"><?php echo $row1[5];?></td>
<td style="width: 136px" class="style1"><?php echo $ReciptNo;?></td>
<td style="width: 136px"><?php echo $row1[8];?></td>
<td style="width: 136px"><?php echo $row1[6];?></td>
<td style="width: 136px"><?php echo $row1[7];?></td>
</tr>
<?php
$recno=$recno+1;
	}
?>
<?php
	while($row2 = mysql_fetch_row($rs2))
	{
		$ReciptNo=$row2[7];
		$Vendor=$row2[10];
		$TotalChequeAmount=$TotalChequeAmount+$row2[6];
?>

<tr>

<td style="width: 50px"><?php echo $recno;?></td>
<td style="width: 135px"><?php echo $row2[1];?></td>
<td style="width: 135px"><?php echo $row2[2];?></td>
<td style="width: 135px"><?php echo $row2[3];?></td>
<td style="width: 136px">RegistrationFee</td>
<td style="width: 136px"><?php echo $row2[4];?></td>
<td style="width: 136px" class="style1"><?php echo $ReciptNo;?></td>
<td style="width: 136px"><?php echo $row2[6];?></td>
<td style="width: 136px"><?php echo $row2[5];?></td>
<td style="width: 136px"><?php echo $row2[9];?></td>
</tr>
<?php
$recno=$recno+1;
	}
?>
<?php
	while($row3 = mysql_fetch_row($rs3))
	{
		$ReciptNo=$row3[7];
		$Vendor=$row3[10];
		$TotalChequeAmount=$TotalChequeAmount+$row3[6];
?>

<tr>

<td style="width: 50px"><?php echo $recno;?></td>
<td style="width: 135px"><?php echo $row3[1];?></td>
<td style="width: 135px"><?php echo $row3[2];?></td>
<td style="width: 135px"><?php echo $row3[3];?></td>
<td style="width: 136px">AdmissionFee</td>
<td style="width: 136px"><?php echo $row3[4];?></td>
<td style="width: 136px" class="style1"><?php echo $ReciptNo;?></td>
<td style="width: 136px"><?php echo $row3[6];?></td>
<td style="width: 136px"><?php echo $row3[5];?></td>
<td style="width: 136px"><?php echo $row3[8];?></td>
</tr>
<?php
$recno=$recno+1;
	}
?>

<tr>

<td colspan="7" class="style2"><strong>Total Amount:</strong></td>
<td style="width: 136px"><?php echo $TotalChequeAmount;?></td>
<td style="width: 136px"></td>
<td style="width: 136px"></td>
</tr>


</table>
<?php
}
?>

</div>


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>
</div>
</body>
</html> 