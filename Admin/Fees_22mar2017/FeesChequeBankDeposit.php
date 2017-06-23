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
	$Selectedschoolbankname=$_REQUEST["txtschoolbankname"];
	$Selectedchequeno=$_REQUEST["txtchequeno"];
	$Selectedquater=$_REQUEST["txtquater"];
	$Selectedate=$_REQUEST["txtdate"];

	
	
	$ssql="select `srno` , `sadmission`, `sname`, `sclass`,`Quarter`,`ChequeNo`,`ChequeAmount`,`ChequeDate`,`ChequeBankName`,`SchoolBankName`,`SchoolBankAccountNo`,`DepositDate`,`Status`,`SlipNo` from `fees_cheque_bank_deposit` where 1=1";

	if($Selectedadm !="")
	{
		$ssql=$ssql." and `sadmission`='".$Selectedadm."'";
	}
	if($Selectedname !="")
	{
		$ssql=$ssql." and `sname`='".$Selectedname."'";
	}

	if($Selectedrecno !="")
	{
		$ssql=$ssql." and `receipt`='".$Selectedrecno."'";
	}
		if($Selectedschoolbankname !="")
	{
		$ssql=$ssql." and `SchoolBankName`='".$Selectedschoolbankname."'";
	}
		
	
$rs= mysql_query($ssql);
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Cheque Bank Deposit </title>
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
</style>
</head>

<body>
<form method="post">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font face="Cambria">Fees Cheque Bank Deposit</font><font size="3" face="Cambria"></p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></b></td>
  </tr>
</table> 
 
<table width="100%" style="border-collapse: collapse;" border="0">
<form name="frmRpt" method="post" action="FeesReceiptDatail.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">


<tr><td><p>&nbsp;</p>

</td>
		<td style="width: 278px">&nbsp;</td>
</tr>
<table>

<table width="100%" height="33">

<tr>

		<td style="width: 206px" align="left"><b><font face="Cambria">Select 
		School Bank Name</font></td>
		<td style="width: 206px" align="left"></b> <select name="txtschoolbankname" style="float: left" ; required >
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `SchoolBankName` FROM `fees_cheque_bank_deposit`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select><p>&nbsp;</td>

</tr>
<tr><td></td></tr>
<tr>
        

		<td style="width: 206px" align="left">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Submit1" type="submit" class="theButton" value="Search" style="font-weight: 700"></td>
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
<table  class="CSSTableGenerator" cellspacing="0" cellpadding="0">
   <tr>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria">
		Sr No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Quarter</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque No</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Bank Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		School Bank Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		School Bank Account No</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Deposit Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Status</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		SlipNo</font></b></td>	
		
		
		
   	</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
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
<td style="width: 278px"><?php echo $row[11];?></td>
<td style="width: 278px"><?php echo $row[12];?></td>
<td style="width: 278px"><?php echo $row[13];?></td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>

</div>


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html> 