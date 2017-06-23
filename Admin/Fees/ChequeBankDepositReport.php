<?php
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedadmission=$_REQUEST["txtadmission"];
	$Selectedchequeno=$_REQUEST["txtchequeno"];
		$Selectedschoolbankname=$_REQUEST["cboSchoolBankName"];
	
	

	$ssql="SELECT `SrNo`, `sadmission`, `sname`, `sclass`, `Quarter`, `ChequeNo`, `ChequeAmount`, `ChequeDate`, `ChequeBankName`, `SchoolBankName`, `SchoolBankAccountNo`, `DepositDate`, `Status`, `SlipNo` FROM `fees_cheque_bank_deposit` WHERE 1";

	//echo $ssql;
	//exit();
		if($Selectedschoolbankname!="Select One")
		{
			$ssql=$ssql." and `SchoolBankName`='$Selectedschoolbankname'";
		}
		if($Selectedadmission!="")
		{
			$ssql=$ssql." and `sadmission`='".$Selectedadmission."'";
		}
		if($Selectedchequeno!="")
		{
			$ssql=$ssql." and `ChequeNo`='".$Selectedchequeno."'";
		}
	
	


$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Fees Bank Deposit Report</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

.style1 {

	text-align: center;

}

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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;

}


</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Fees Bank Deposit Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="ChequeBankDepositReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px">
<p align="left"><font face="Cambria">Admission No:</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtadmission" id="txtadmission"type="text" class="text-box"> </font>
</td>
<td style="width: 278px"><font face="Cambria">Cheque No:</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtchequeno" id="txtchequeno" type="text" class="text-box"></font> </td>
<td style="width: 278px"><p align="left"><font face="Cambria">School Bank Name:</font></td>
<td style="width: 278px"><font face="Cambria">
	 <select name="cboSchoolBankName" id="cboSchoolBankName" style="float: left" ; required onchange="Javascript:GetSubHead();" class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `SchoolBankName` FROM `fees_cheque_bank_deposit`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <option value="State Bank Of India">State Bank Of India</option>

						 <?php 
							}
							?>
			</select></font></td>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">
&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px" colspan=5>&nbsp;</td>

</tr>
<td colspan=6 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700"></font></td>
</tr>
</form>
</table>
<font face="Cambria">
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
</font>
<table width="100%" style="border-collapse: collapse;" border="1" class="CSSTableGenerator">
<tr>
<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" >
		<b><font face="Cambria">Admission No</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Student Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Quarter</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Cheque No</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Cheque Amount</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Cheque Date</font></b></td>
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Cheque Bank Name</font></b></td>
				
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">School Bank Name</font></b></td>
				
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">School Bank Account No</font></b></td>
				
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Deposit Date</font></b></td>
				
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Status</font></b></td>
				
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Slip No</font></b></td>
				
		
						
		
		
</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[0];
?>
<tr>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[0];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[1];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[2];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[3];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[4];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[5];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[6];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[7];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[8];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[9];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[10];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[11];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[12];?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $row[13];?></font></td>







</tr>
<?php
	}
?>
</table>
<font face="Cambria">
<?php
}
?>
</font>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld 
		Technologies LLP</font></div>
</div>
</body>
</html>
