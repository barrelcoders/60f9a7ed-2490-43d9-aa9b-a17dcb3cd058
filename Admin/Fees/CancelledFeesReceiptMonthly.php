<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>

<?php
if ($_REQUEST["txtTotalRefundAmt"] != "")
{
		$ReceiptNo=$_REQUEST["RecReceiptNo"];
		$Month=$_REQUEST["txtMonth"];
		
		$RefundTutionFee = $_REQUEST["txtRefundTuitionFee"];
		$RefundTransportFee = $_REQUEST["txtRefundTransportFees"];
		$RefundLateFee = $_REQUEST["txtRefundLateFee"];
		$RefundPreviousBalance = $_REQUEST["txtRefundPreviousBalance"];
		$RefundDiscount = $_REQUEST["txtRefundDiscount"];
		$TotalRefundAmt = $_REQUEST["txtTotalRefundAmt"];
		
		
		$ssql = "SELECT `sname`,`sadmission`,`sclass`,`srollno` FROM `fees_monthwise` where `receipt`='$ReceiptNo'";
		
		$rs = mysql_query($ssql);
		while($row = mysql_fetch_row($rs))
		{
					$Name= $row[0];
					$Admission= $row[1];
					$Class= $row[2];
					$RollNo= $row[3];
		}
		
		
		if (mysql_num_rows($rs) > 0)
		{
			$ssql="UPDATE `fees_monthwise` SET `cancelamount`='$TotalRefundAmt',`finalamount`='$TotalRefundAmt',`canceldate`=CURDATE(),`status`='CANCEL' where `receipt`='$ReceiptNo'";

			mysql_query($ssql) or die(mysql_error());
						
			$Message1="<br><br><center><b>Monthly Fee Cancellation successfully completed!";
		}
		else
		{
			$Message1="There is some error! please contact Adminstrator!" ;
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
.auto-style4 {
	color: #D30F0F;
}

.style8 {
	text-align: center;
}

.auto-style5 {
	color: #000000;
	font-weight: bold;
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

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
	<p align="center" class="auto-style5"><font face="Calibri" size="4"><?php echo $SchoolName; ?></font></p>
	<p align="center">
	<img border="0" src="../images/logo.png" class="auto-style4"></p>
	<p align="center" class="auto-style5"><font face="Calibri" size="4"><?php echo $SchoolAddress; ?></font></p>
	<p align="center" class="auto-style5"><font face="Calibri">Monthly Fee 
	Cancellation 
	Receipt</font></p>
	<p class="auto-style2">Receipt No.<?php echo $ReceiptNo; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date: <?php echo date("d-m-Y"); ?> </p>
	<div align="center">
		<table border="1" cellspacing="0" cellpadding="0" style="width: 63%">
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 292px;">
				<font face="Calibri">Student Name</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px;">
				<?php echo $Name; ?>
				</td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;">
				<font face="Calibri">Admission No</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $Admission; ?>
				</td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 292px;">
				<font face="Calibri">Student Class</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px;">
				<?php echo $Class; ?>
				</td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;">
				<font face="Calibri">Fee payment for Month</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $Month; ?></td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;">
				<font face="Calibri">Tuition Fee + Annual Charges</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $RefundTutionFee; ?>
			</td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;">
				<font face="Calibri">Transport Fee</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $RefundTransportFee; ?></td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;">
				<font face="Calibri">Adjusted Late Fee</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $RefundLateFee; ?>
				</td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;" class="auto-style1">
				Previous Balance</td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $RefundPreviousBalance; ?></td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;" class="auto-style1">
				Discount (If Applicable)</td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $RefundDiscount; ?>
				</td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;" class="auto-style1">
				Refund Amount</td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $TotalRefundAmt; ?>
				</td>
			</tr>
			<tr>
				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 292px;">
				<font face="Calibri">Total Fees Amount</font></td>
				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px;">
				<?php echo $TotalRefundAmt; ?>
				</td>
			</tr>
		</table></div>
	<blockquote>
		<blockquote>
			<blockquote>
				<ul>
					<li class="auto-style1"><em>Fees is collected between 1st to 
					15th of every month</em></li>
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
	<p align="center"><font face="Calibri">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fees Incharge</font></p>
	<p align="center">&nbsp;
</div>
<div class="style8">
	<a href="Javascript:printDiv();">PRINT</a> 
</div>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>
</div>
</body>

</html>