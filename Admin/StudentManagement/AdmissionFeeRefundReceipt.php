<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php



if ($_REQUEST["txtRefundAmount"] != "")

{

		$ReceiptNo=$_REQUEST["RecReceiptNo"];

		$AdmissionFee=$_REQUEST["txtAdmissionFees"];

		

		if ($_REQUEST["txtRefundAmount"] != "")

		{

			$RefundAdmissionFee=$_REQUEST["txtRefundAmount"]; 

		}

		else

		{

			$RefundAdmissionFee=0;

		}

		

		if ($_REQUEST["txtSecurityFeesAmount"] != "")

		{

			$AnnualFeeAmt = $_REQUEST["txtSecurityFeesAmount"];

		}

		else

		{

			$AnnualFeeAmt = 0;

		}

		

		if ($_REQUEST["txtAdmissionFeesDiscount"] != "")

		{

			$Discount = $_REQUEST["txtAdmissionFeesDiscount"];

		}

		else

		{

			$Discount = 0;

		}

		

		$TotalAmt = $AdmissionFee + $AnnualFeeAmt - $Discount - $RefundAdmissionFee;

		//$FYear=$_REQUEST["cboFinancialYear"];

		

		$ssql = "SELECT `sname`,`sadmission`,`sclass`,`srollno` FROM `AdmissionFees` where `receipt`='$ReceiptNo'";

		

		$rs = mysql_query($ssql);

		while($row = mysql_fetch_row($rs))

		{

					$Name= $row[0];

					$Admission= $row[1];

					$Class= $row[2];

					$RollNo= $row[3];

		}

		

		

		if (mysql_num_rows($result)==0)

		{

			$ssql="UPDATE `AdmissionFees` SET `refundamount`='$RefundAdmissionFee',`refunddate`=CURDATE() where `receipt`='$ReceiptNo'";



			mysql_query($ssql) or die(mysql_error());

						

			$Message1="<br><br><center><b>Admission Fee Refund successfully completed!<br>Click <a href='Fees/AdmissionFeesPayment.php'>here </a> to submit admission fee.";



		}

		else

		{

			$Message1="Admission No:" . $Admission . " already exists!" ;

		}

		//echo $Message1;

}

?>

<script language="javascript">

function printDiv() 

{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + 

          divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 }

</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Aravali International School</title>

<style type="text/css">

.auto-style1 {

	font-family: Calibri;

}

.auto-style2 {

	font-family: Calibri;

	font-weight: bold;

	text-align: center;

}

.auto-style3 {

	color: #000000;

	font-weight: bold;

}

.auto-style4 {

	color: #000000;

}



.style8 {

	text-align: center;

}



</style>

</head>



<body>



<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">

	<p align="center" class="auto-style3"><font face="Calibri" size="4"><?php echo $SchoolName ?></font></p>

	<p align="center">

	<img border="0" src="../images/logo.png" class="auto-style4"></p>

	<p align="center" class="auto-style3"><font face="Calibri" size="4"></font></p>

	<p align="center" class="auto-style3"><font face="Calibri">Admission Fee 

	Refund 

	Receipt</font></p>

	<p class="auto-style2">Receipt No.<?php echo $ReceiptNo;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

	Date: <?php echo date("d-m-Y"); ?></p>

	<div align="center">

		<table border="1" cellspacing="0" cellpadding="0" style="width: 39%">

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 175px;">

				<b><font face="Calibri">Student Name</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px;">

				<?php echo $Name; ?>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px;">

				<b><font face="Calibri">Admission No</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">

				<?php echo $Admission; ?>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 175px;">

				<b><font face="Calibri">Student Class</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px;">

				<?php echo $Class; ?>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px;">

				<b><font face="Calibri">Admission Fees Amount</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">

				<?php echo $AdmissionFee; ?>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px;">

				<b><font face="Calibri">Annual Fees Amount</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">

				<?php echo $SecurityFeeAmt; ?>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px;" class="auto-style1">

				<strong>Discount (If Applicable)</strong></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">

				<?php echo $AdmissionDiscountFee; ?>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px;">

				<strong>Refund Amount</strong></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">

				<?php echo $RefundAdmissionFee; ?>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px;">

				<b><font face="Calibri">Total Fees Amount</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">

				<?php echo $TotalAdmissionFee; ?>

				</td>

			</tr>

		</table></div>

	<blockquote>

		<blockquote>

			<blockquote>

				<ul>

					<li class="auto-style1"><em>Fees is collected between 1st to 

					15th of first month of every quarter</em></li>

					<li><font face="Calibri"><em>Cheques /Cash can be 

								deposited at the School Counter - Monday to 

								Friday (09:00 AM TO 1:00 PM) and Saturday ((9.30 

								AM TO 12.30 PM))</em></font></li>

					<li><font face="Calibri"><em>Cheques/Cash will not 

								be accepted without fine after the 15th of July 

								2014. </em></font></li>

					<li><font face="Calibri"><em>Fine will be charged 

								@50/- per day after the due date i.e 15/07/2014</em></font></li>

				</ul>

				<p>&nbsp;</p>

			</blockquote>

		</blockquote>

	</blockquote>

	<p align="center"><font face="Calibri">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fees Incharge</font></p>

	<p align="center">&nbsp;

</div>

<div class="style8">

	<a href="Javascript:printDiv();">PRINT</a> 

</div>



</body>



</html>

