<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php

if($_REQUEST["isSubmit"]=="yes")
{

	$Selectedadm=$_REQUEST["txtadm"];
	$Selectedchequeno=$_REQUEST["chequeno"];
	$Selectedclass=$_REQUEST["cboClass"];
	$Selectedquarter=$_REQUEST["quarter"];
	
	
	$ssql="SELECT `SrNo`, `sadmission`, `sname`, `sclass`, `Quarter`, `ChequeNo`, `ChequeAmount`, `ChequeDate`, `ChequeBankName`, `SchoolBankName`, `SchoolBankAccountNo`, `DepositDate`, `Status`, `SlipNo` FROM `fees_cheque_bank_deposit` WHERE 1=1";

	if($Selectedadm !="")
	{
		$ssql=$ssql." and `sadmission`='".$Selectedadm."'";
	}
	if($Selectedclass!="Select One")
	{
		$ssql=$ssql." and `sclass`='".$Selectedclass."'";
	}
	if($Selectedchequeno!="")
	{
		$ssql=$ssql." and `ChequeNo`='".$Selectedchequeno."'";
	}
	if($Selectedquarter!="Select One")
	{
		$ssql=$ssql." and `Quarter`='".$Selectedquarter."'";
	}
$rs= mysql_query($ssql);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Cheque Bank Deposit</title>

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
	<p align="left"><b><font size="3" face="Cambria">Fees Cheque Bank Deposit</p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table> 
 
<table width="100%" style="border-collapse: collapse;" border="0">
<form name="frmRpt" method="post" action="FeesChequeBankDeposit.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">


<tr>
        <td style="width: 278px"><font face="Cambria">Admission No</font>.</td>
        <td style="width: 278px"><input name="txtadm" type="text" class="text-box"></td>
</tr>
<tr>
		<td style="width: 278px"><font face="Cambria">Class</font></td>
		<td style="width: 278px"><font face="Cambria">
	 <select name="cboClass" id="cboClass" style="float: left" ; class="text-box">
						<option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `class` FROM `class_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
</tr>
<tr>
        <td style="width: 278px"><font face="Cambria">Cheque No.</font>.</td>
        <td style="width: 278px"><input name="chequeno" type="text" class="text-box"></td>
</tr>
<tr>
		<td style="width: 278px"><font face="Cambria">Quarter</font></td>
		<td style="width: 278px"><font face="Cambria">
	 <select name="quarter" id="quarter" style="float: left" ; class="text-box">
						<option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Quarter` FROM `fees_cheque_bank_deposit`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
</tr>
</table>
<br>
<table align="center">
<tr>
		<td class="style1" >
		<input name="Submit1" type="submit" value="Search"></td>
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
<table class="CSSTableGenerator" cellspacing="0" cellpadding="0">
   <tr>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria"><font color="#FFFFFF">
		Serial No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Class </font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b>Quarter</b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		ChequeAmount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Bank Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		SchoolBankName</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		SchoolBankAccountNo</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
	    DepositDate</font></b></td>
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
<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies 
LLP</font></div>
</div>
</body>
</html> 