<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php
$sadmission=$_REQUEST["txtAdmissionNo"];

$ssql="SELECT distinct `FeeSubmissionType` FROM `student_master` where `sadmission`='$sadmission'";
$rs= mysql_query($ssql);

	if (mysql_num_rows($rs) > 0)
	{
		while($row = mysql_fetch_row($rs))
		{
			$FeeSubmissionType = $row[0];
		}
		
		if ($FeeSubmissionType == "Quarterly")
		{
			//Quarterly
			$ssql="select x.`sadmission`,x.`sname`,x.`sclass`,x.`BalanceAmt`,x.`receipt` from (select * from `fees` order by `FinancialYear` desc) `x` where `sadmission`='$sadmission' order by `quarter` desc";
			$rs1= mysql_query($ssql);
			if (mysql_num_rows($rs1) > 0)
				{
					while($row = mysql_fetch_row($rs1))
					{
						$AdmissionId=$row[0];
						$Name=$row[1];
						$Class=$row[2];
						$OraginalBalanceAmt = $row[3];
						$OriginalReceiptNo = $row[4];
						break;
					}
				}
			
			$ssql="select sum(`PaidBalanceAmt`) from `fees_transaction` where `ReceiptNo`='$OriginalReceiptNo'";
			$rs2= mysql_query($ssql);
			if (mysql_num_rows($rs2) > 0)
			{
				while($row = mysql_fetch_row($rs2))
				{
					$TotalPaidBalanceAmt = $row[0];
					break;
				}
			}
			else
			{
				$TotalPaidBalanceAmt = 0;
			}
			
			$CurrentBalance = ($OraginalBalanceAmt - $TotalPaidBalanceAmt);
						
		}
		else
		{
			//Monthly
			$ssql="SELECT distinct `FeeSubmissionType` FROM `student_master` where `sadmission`='$sadmission'";
			$rs1= mysql_query($ssql);

		}
	}

?>
<html>
<head>
<script language="javascript">
function Validate()
{
	if (document.getElementById("txtPaidBalance").value == "")
	{
		alert("Paid balance is blank!");
		return;
	}
	if (isNaN(document.getElementById("txtPaidBalance").value) == true)
	{
		alert("Paid balance should be numeric!");
		return;
	}
	if (parseInt(document.getElementById("txtPaidBalance").value) > parseInt(document.getElementById("txtCurrentBalanceAmount").value))
	{
		alert("Paid balance amount is greater then Current Balance Amount!");
		return;
	}
	document.getElementById("frmBalancePayment").submit();
}
function CalculateCurrentBalance()
{

	BalanceForward=0;
	PaidBalanceAmount=0;
	
	if (document.getElementById("txtPaidBalance").value == "")
	{
		PaidBalanceAmount=0;
	}
	if (isNaN(document.getElementById("txtPaidBalance").value) == true)
	{
		PaidBalanceAmount=0;
	}
	else
	{
		PaidBalanceAmount=document.getElementById("txtPaidBalance").value;
	}
	
	BalanceForward= parseInt(document.getElementById("txtCurrentBalanceAmount").value) - parseInt(PaidBalanceAmount);
	
	document.getElementById("txtBalanceForward").value=BalanceForward;
}
function CheckPaymentMode()
{
	if (document.getElementById("cboPaymentMode").value!="Cash")
	{
		document.getElementById("txtChequeNo").readOnly=false;
		document.getElementById("txtBankName").readOnly=false;
	}
	else
	{
		document.getElementById("txtChequeNo").value="";
		document.getElementById("txtBankName").value=""
		
		document.getElementById("txtChequeNo").readOnly=true;
		document.getElementById("txtBankName").readOnly=true;
	}
	
}

</script>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-style: dotted;
	border-width: 1px;
}
.style2 {
	font-family: Cambria;
}
.style3 {
	text-align: left;
}
.style4 {
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
        font-family: Calibri;
        font-weight:bold;

}

.style6 {
	font-family: Calibri;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}
</style>
</head>
<body>
&nbsp;<p><b><span class="style6"><font face="Cambria">Balance Fees Collection</font></span></b></p>
<hr class="auto-style3" style="height: -15px">

<p>&nbsp;</p>
<div align="center">
<table cellpadding="0" style="padding: 1px 4px; width: 677px; " class="style1" cellspacing="3" >
			<form name="frmBalancePayment" id="frmBalancePayment" method="post" action="BalanceFeeReceipt.php">
			<input type="hidden" name="txtOrigReceiptNo" id="txtOrigReceiptNo" value="<?php echo $OriginalReceiptNo; ?>">
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px">

				<font face="Cambria">Mode of Payment</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<select name="cboPaymentMode" id="cboPaymentMode" onchange="Javascript:CheckPaymentMode();">
				<option selected="" value="Cash">Cash</option>
				<option value="Cheque">Cheque</option>
				<option value="Demand Draft">Demand Draft</option>
				</select></td>

			</tr>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px">

				<font face="Cambria">Cheque No.</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<input name="txtChequeNo" id="txtChequeNo" type="text" readonly="readonly"></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px">

				<font face="Cambria">Bank Name</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<input name="txtBankName" id="txtBankName" type="text" readonly="readonly"></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px">

				<font face="Cambria">Student Name</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<input name="txtName" id="txtName" value="<?php echo $Name; ?>" readonly="readonly" type="text"></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px" >

				<font face="Cambria">Admission No</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<font face="Cambria">

				</font><input name="txtAdmissionNo" id="txtAdmissionNo" value="<?php echo $AdmissionId; ?>" readonly="readonly" type="text"></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px" >

				<font face="Cambria">Student Class</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<font face="Cambria">

				</font><input name="txtClass" id="txtClass" value="<?php echo $Class; ?>" type="text" readonly="readonly"></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px" >

				<span class="style2">Balance</span><font face="Cambria"> Fees 
				Payable</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<font face="Cambria">

				</font><input name="txtBalancePayable" id="txtBalancePayable" value="<?php echo $CurrentBalance; ?>" type="text" readonly="readonly"></td>

			</tr>
			<input type="hidden" name="txtCurrentBalanceAmount" id="txtCurrentBalanceAmount" value="<?php echo $CurrentBalance; ?>">
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px" >

				<span class="style2">Balance Fees Paid</span></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<input name="txtPaidBalance" id="txtPaidBalance" type="text" onkeyup="Javascript:CalculateCurrentBalance();"></td>

			</tr>

			

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 337px" >

				<font face="Cambria">Balance Forward</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 338px" class="style3">

				<input name="txtBalanceForward" id="txtBalanceForward" type="text"></td>

			</tr>

			

			<tr>

				<td style="border-style: dotted; border-width: 1px; " colspan="2" class="style4" >

				<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();"></td>

			</tr>
</form>
			</table>
			
			
</div>
			
			
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>			
</html>