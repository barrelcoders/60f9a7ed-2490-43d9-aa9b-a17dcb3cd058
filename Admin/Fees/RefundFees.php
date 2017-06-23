<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>


<?php
	
	if ($_REQUEST["txtReciptNo"] != "")
	{

		$ReceiptNo = $_REQUEST["txtReciptNo"];
		//$ssql = "SELECT `amountpaid`,`SecurityAmtPaid`,`Discount`,`TotalAmtPaid` FROM `AdmissionFees` where `receipt`='$ReceiptNo'";
		$ssql = "SELECT a.`quarter`,";
		$ssql = $ssql . "(SELECT `TutionFee` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `TutionFee`,";
		$ssql = $ssql . "(SELECT `TransportFee` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `TransportFee`,"; 
		$ssql = $ssql . "(SELECT `AnnualCharges` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `AnnualCharges`,"; 		
		$ssql = $ssql . "(SELECT `AdjustedLateFee` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `AdjustedLateFee`,";
		$ssql = $ssql . "(SELECT `PreviousBalance` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `PreviousBalance`,";
		$ssql = $ssql . "(SELECT `Discount` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `Discount`,";
		$ssql = $ssql . "(SELECT `DiscountReason` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `DiscountReason`,";
		$ssql = $ssql . "(SELECT `Remarks` FROM `fees_transaction` where `ReceiptNo`=a.`receipt`) as `Remarks`,";
		$ssql = $ssql . "a.`finalamount`,a.`status`";
		$ssql = $ssql . " FROM `fees` as `a` WHERE `receipt`='$ReceiptNo'";

		$rs = mysql_query($ssql);
		while($row = mysql_fetch_row($rs))
		{
					$Quarter= $row[0];
					$TutionFee= $row[1];
					$TransportFee= $row[2];
					$AnnualFee= $row[3];
					$AdjustedLateFee= $row[4];
					$PreviousBalance= $row[5];
					$Discount= $row[6];
					$DiscountReason= $row[7];
					$Remarks= $row[8];
					$finalamount= $row[9];
					$status=$row[10];
					if ($status=="CANCEL")
					{
						echo "<br><br><center><b> Fee receipt no:" . $ReceiptNo . " is already cancelled in system!<br>Click <a href='FeesMenu.php'>here</a> to go back!";
						exit();
						
					}
		}	
	}

	if ($_REQUEST["txtTotalRefundAmt"] != "")
	{
		$ReceiptSubmited=$_REQUEST["RecReceiptNo"];
		$TotalActualAmt = $_REQUEST["txtTotalAmt"];
		$TotalRefund = $_REQUEST["txtTotalRefundAmt"];
		$BalanceAmt=$TotalActualAmt - $TotalRefund;
		$ssql="UPDATE `fees` set `status`='REFUND',`refundamount`='$TotalRefund',`refunddate`=CURDATE(),`finalamount`='$BalanceAmt' WHERE `receipt`='$ReceiptSubmited'";
		mysql_query($ssql) or die(mysql_error());
		echo "<br><br><center><b>Refund completed successfully!<br>click <a href='FeesMenu.php'>here</a> to go back";
		exit();
	}


?>



<script language="javascript">
function ShowReceiptDetail()
{
	//alert("Hello");
	
	if (document.getElementById("txtReciptNo").value == "")
	{
		alert("Please enter receipt no!");
		return;
	}
	
	document.getElementById("frmRefundFee").submit();
}

function Validate()
{
	if (document.getElementById("txtTotalRefundAmt").value=="")
	{
		alert("Refund value is mandatory!");
		return;
	}
	
	document.getElementById("frmNewStudent").submit();
}


function fnlCheckRefundAmt()
{
	if (isNaN(document.getElementById("txtTotalRefundAmt").value) == false)
	{
		if(parseInt(document.getElementById("txtTotalRefundAmt").value) > parseInt(document.getElementById("txtTotalAmt").value))
		{
			alert ("Refund amount can not be more then actual amount!");
			document.getElementById("txtTotalRefundAmt").value="";
			return;
		}
	} 
}

</script>



<html>


<head>



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Student Fee Refund</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">



.style7 {



	border-left-style: none;



	border-left-width: medium;



	text-align: center;



}



.style12 {

	border-left-width: 0px;

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
.auto-style1 {
	border-collapse: collapse;
	border: 0px solid #000000;
}
.auto-style6 {
	font-size: small;
}



.auto-style7 {
	border-collapse: collapse;
	border-width: 0px;
}
.auto-style11 {
	border-style: none;
	border-width: medium;
}
.auto-style16 {
	font-size: 12pt;
	color: #000000;
	margin-left: 13px;
	font-family: Cambria;
}
.auto-style18 {
	font-weight: bold;
	font-size: 12pt;
	font-family: Cambria;
}
.auto-style19 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style20 {
	font-weight: normal;
	font-size: 12pt;
	font-family: Cambria;
}
.auto-style21 {
	font-family: Cambria;
	font-weight: normal;
	font-size: 12pt;
	color: #000000;
}
.auto-style23 {
	font-size: 12pt;
}
.auto-style25 {
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style26 {
	border-style: none;
	border-width: medium;
	font-size: 12pt;
	font-family: Cambria;
}



.auto-style30 {
	border: medium solid #FFFFFF;
	color: #000000;
}
.auto-style5 {
	text-align: left;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
	font-size: medium;
}
.auto-style3 {
	color: #000000;
}
.auto-style31 {
	font-family: Cambria;
}
.auto-style32 {
	font-size: small;
	font-family: Cambria;
	color: #000000;
}
.auto-style33 {
	font-size: 12pt;
	font-family: Cambria;
}
.auto-style34 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}
.auto-style35 {
	text-align: center;
	border-top-style: solid;
	border-top-width: 1px;
	font-family: Cambria;
	font-weight: bold;
	font-size: 18px;
	color: #000000;
}



.auto-style36 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style38 {
	text-align: center;
	border-top-style: solid;
	border-top-width: 1px;
	font-family: Cambria;
	font-size: medium;
	color: #000000;
}
.auto-style17 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	text-align: left;
}



.auto-style47 {
	font-family: Cambria;
	font-size: 12pt;
	color: #FFFFFF;
	text-decoration: underline;
	background-color: #000000;
}
.auto-style48 {
	border-style: none;
	border-width: medium;
	color: #FFFFFF;
	background-color: #000000;
}
.auto-style49 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	background-color: #FFFFFF;
}



.style13 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.style14 {
	font-family: Cambria;
	font-size: medium;
	color: #000000;
}



.style15 {
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	background-color: #FFFFFF;
}



.style16 {
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	background-color: #FFFFFF;
	text-align: center;
}



</style>



</head>







<body>



<p>&nbsp;</p>



<table cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style7" style="width: 100%">



	



	

	<tr>

		<td class="auto-style30">

<p class="auto-style5" style="height: 12px"><strong><font size="3">Student Fee Refund</font></strong></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></p>

		</table>


	
<table style="width: 100%" class="auto-style1">
			<form name="frmRefundFee" id="frmRefundFee" method="post" action="">
			<tr>
			<td class="style15" style="width: 130px"><strong>Enter Receipt No:</strong></td>
			<td class="style15" style="width: 170px">
			
				<input name="txtReciptNo" id="txtReciptNo" type="text" class="text-box"></td>
			<td class="style16">
			&nbsp;<p>
			<input name="Submit" type="button" value="Submit" onclick="Javascript:ShowReceiptDetail();" class="text-box"></p>
			<p>&nbsp;</p>
			<p>&nbsp;</td>
			</tr>
			</form>
</table>

<?php
if ($_REQUEST["txtReciptNo"] != "")
	{
?>
<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">
	<form name="frmNewStudent" id="frmNewStudent" method="post" action="RefundFees.php">
	<input type="hidden" name="RecReceiptNo" id="RecReceiptNo" value="<?php echo $ReceiptNo; ?>">
	<tr>



		<td style="height: 11px;" class="auto-style35">
		<?php echo $Message1; ?></td>

	</tr>

	

		

		<tr>



		<td style="height: 29px;" class="auto-style23">



		<table style="width: 100%" class="auto-style1">

			<tr>

				<td class="auto-style49" colspan="6" style="height: 10px">



				<strong>Fee Receipt Refund: <?php echo $ReceiptNo; ?></strong></td>

			</tr>

			<tr>

				<td class="style13" colspan="2">



				<strong><span class="style14"><font size="3">Fee Details</font></span></strong></td>

				<td style="width: 134px" class="auto-style11">



				<strong><span class="style14"><font size="3">Cancellation Amt.</font></span></strong></td>

				<td style="width: 157px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 29px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Fees Payment for Quarter</td>

				<td class="auto-style19">
			<input name="txtQuarter" id="txtQuarter" type="text" class="text-box" value="<?php echo $Quarter; ?>"></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



		&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Tuition Fees</td>

				<td class="auto-style19">







		<input name="txtTuition" id="txtTuition" type="text" class="text-box" value="<?php echo $TutionFee; ?>" readonly="readonly"></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



		&nbsp;</td>

			</tr>
<?php
if ($AnnualFee !="")
{
?>
			<tr>

				<td class="auto-style19" style="height: 27px">



		Annual Charges for the Quarter</td>

				<td class="auto-style19" style="height: 27px">







		<input name="txtAnnualCharges" id="txtAnnualCharges" class="text-box" type="text" value="<?php echo $AnnualFee; ?>"></td>

				<td style="width: 134px; height: 27px;" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px; height: 27px;" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2" style="height: 27px">



				&nbsp;</td>

			</tr>
<?php
	}
?>

			<tr>

				<td class="auto-style19" style="height: 27px">



		Transport Fees:</td>

				<td class="auto-style19" style="height: 27px">







		<input name="txtTransportFees" id="txtTransportFees" type="text" class="text-box" readonly="readonly" value="<?php echo $TransportFee; ?>"></td>

				<td style="width: 134px; height: 27px;" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px; height: 27px;" class="auto-style36">



				</td>

				<td class="auto-style11" colspan="2" style="height: 27px">



				</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Adjusted Late Fees Charge</td>

				<td class="auto-style19">







		<input name="txtAdjustedLateFee" type="text" class="text-box" value="<?php echo $AdjustedLateFee; ?>" readonly="readonly"></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Previous Balance</td>

				<td class="auto-style19">







		<input name="txtPreviousBalance" type="text" class="text-box" value="<?php echo $PreviousBalance; ?>" readonly="readonly" ></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



				Discount</td>

				<td class="auto-style19">







		<input name="txtDiscount" id="txtDiscount" type="text" class="text-box" readonly="readonly" value="<?php echo $Discount; ?>"></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Discount Reason</td>

				<td style="width: 63px" class="auto-style11">



		<input name="txtDiscountReason" id="txtDiscountReason" class="text-box" value="<?php echo $DiscountReason; ?>" type="text"></td>

				<td style="width: 134px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Remarks</td>

				<td class="auto-style11" colspan="5">



		<textarea name="txtRemarks" id="txtRemarks" rows="2" class="text-box-address" cols="20"><?php echo $Remarks; ?></textarea></td>

			</tr>

			<tr>

				<td class="auto-style19">



				Total Amt.</td>

				<td style="width: 63px" class="auto-style11">



				<input name="txtTotalAmt" id="txtTotalAmt" type="text" readonly="readonly" class="text-box" value="<?php echo $finalamount; ?>"></td>

				<td style="width: 134px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



				Refund Amt.</td>

				<td style="width: 63px" class="auto-style11">



				<input name="txtTotalRefundAmt" id="txtTotalRefundAmt" type="text" class="text-box" onkeyup="fnlCheckRefundAmt();"></td>

				<td style="width: 134px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			</table>

		</td>

		

		</tr>

		

		<tr>

		

		

		<td><br class="auto-style31">

</td>



</tr>

<tr>

		<td style="width: 158px; height: 29px;" class="style7">



		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="text-box"></td>



	</tr>



	
</form>


</table>
<?php
}
?>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>

</div>


</body>







</html>