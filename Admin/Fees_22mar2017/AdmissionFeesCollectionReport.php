<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php

$AdmissionNo=$_REQUEST["txtAdmissionNo"];
$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);

if ($_REQUEST["isSubmit"]=="yes")
{
	
	//$ssql="SELECT distinct DATE_FORMAT(`datetime`,'%M'),`sclass`,COUNT(*) as `Total_Registration`,sum(`amountpaid`) as `AdmissionFee`,Sum(`cancelamount`) as `AdmissionFee_Cancellation`,sum(`refundamount`) as `AdmissionFee_Refund`,(sum(`amountpaid`)-Sum(`cancelamount`)-sum(`refundamount`)) as `Total_Callection` FROM `AdmissionFees` where 1=1";
	$ssql="SELECT distinct DATE_FORMAT(`datetime`,'%M'),`sclass`,COUNT(*) as `Total_Registration`,sum(`amountpaid`) as `AdmissionFee`,sum(`AnnualAmtPaid`) as `AnnualAmtPaid`,sum(`TotalDiscount`) as `TotalDiscount`,sum(`TotalAmtPayable`) as `TotalAmtPayable`,sum(`TotalAmoutPaid`) as `TotalAmoutPaid`,sum(`BalanceAmt`) as `BalanceAmt`,Sum(`cancelamount`) as `AdmissionFee_Cancellation`,sum(`refundamount`) as `AdmissionFee_Refund`,(sum(`TotalAmoutPaid`)-Sum(`cancelamount`)-sum(`refundamount`)) as `Total_Callection` FROM `AdmissionFees` where 1=1";
	if ($_REQUEST["cboFinancialYear"] !="Select One")
	{
		$FinancialYear = $_REQUEST["cboFinancialYear"];
		$ssql=$ssql . " and `FinancialYear`='$FinancialYear'";
	}
	if($_REQUEST["cboMonth"] != "Select One")
	{
		$SelectedMonth = $_REQUEST["cboMonth"];
		$ssql=$ssql . " and DATE_FORMAT(`datetime`,'%M')='$SelectedMonth'";
	}
	if($_REQUEST["cboClass"] != "Select One")
	{
		$SelectedClass = $_REQUEST["cboClass"];
		$ssql=$ssql . " and `sclass` = '$SelectedClass'";
	}
	
	$ssql = $ssql . " group by DATE_FORMAT(`datetime`,'%M'),`sclass`";
	
	$rs= mysql_query($ssql);	
}


?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Admission Fees Collection Report</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
td
	{border-style: none;
	border-color: inherit;
	border-width: medium;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	}
.auto-style1 {
	text-align: left;
}
.auto-style2 {
	vertical-align: middle;
	text-align: left;
}
.auto-style3 {
	text-align: center;
}
.auto-style4 {
	border-width: 0px;
}
.auto-style5 {
	border-style: solid;
	border-width: 1px;
}
.auto-style6 {
	font-family: Calibri;
	text-decoration: underline;
}
.auto-style7 {
	text-decoration: underline;
}
.auto-style8 {
	text-align: center;
	vertical-align: middle;
	border-style: solid;
	border-width: 1px;
}
.auto-style9 {
	vertical-align: middle;
	border-style: solid;
	border-width: 1px;
}
.auto-style21 {
	text-align: left;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.style1 {
	border-style: solid;
	border-width: 1px;
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

				<div class="auto-style21">

					&nbsp;<p><strong>Admission Fees Collection Report</strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; ">
					<colgroup>
						<col style="mso-width-source: userset; mso-width-alt: 1316; width: 27pt" width="36" />
						<col style="mso-width-source: userset; mso-width-alt: 4022; width: 83pt" width="110" />
					</colgroup>
					<form method="post" action="AdmissionFeesCollectionReport.php">
					<input type="hidden" name="isSubmit" value="yes">
					<tr height="20" style="height: 15.0pt">
						<td class="auto-style2" height="20" width="394">Select Financial 
						Year</td>
						<td class="auto-style1" width="929">						
							<select name="cboFinancialYear" id="cboFinancialYear" class="text-box">
								<option selected="" value="Select One">Select One</option>
								<?php
								while($rowFY = mysql_fetch_row($rsFY))
								{
											$Year=$rowFY[0];
											$FYear=$rowFY[1];
								?>
								<option value="<?php echo $Year; ?>"><?php echo $FYear; ?></option>
								<?php 
								}
								?>
							</select>
						</td>
					</tr>
					<tr height="20" style="height: 15.0pt">
						<td class="xl65" colspan="2" height="20">&nbsp;</td>
					</tr>
					<tr height="20" style="height: 15.0pt">
						<td class="xl65" height="20" width="394">Select Month</td>
						<td class="xl70" width="929">
						<select name="cboMonth" id="cboMonth" class="text-box">
						<option value="Select One" selected="selected">Select One</option>
						<option value="January" >Jan</option>
						<option value="February" >Feb</option>
						<option value="March" >Mar</option>
						<option value="April" >Apr</option>
						<option value="May" >May</option>
						<option value="June" >Jun</option>
						<option value="July" >Jul</option>
						<option value="August" >Aug</option>
						<option value="September" >Sep</option>
						<option value="October" >Oct</option>
						<option value="November" >Nov</option>
						<option value="December" >Dec</option>
						
						
						
						</select></td>
					</tr>
					<tr height="20" style="height: 15.0pt">
						<td class="xl65" colspan="2" height="20">&nbsp;</td>
					</tr>
					<tr height="20" style="height: 15.0pt">
						<td class="xl65" height="20" width="394">Select Class</td>
						<td class="xl74" width="929">
						<select name="cboClass" id="cboClass" class="text-box">
						<option value="Select One" selected="selected">Select One</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">K.G</option>
						<option value="14">PRE-NURSERY</option>
						<option value="15">NURSERY</option>
						</select></td>
					</tr>
					<tr height="20" style="height: 15.0pt">
						<td class="xl65" height="20" width="394">&nbsp;</td>
						<td class="xl74" width="929">&nbsp;</td>
					</tr>
					<tr height="20" style="height: 15.0pt">
						<td class="xl65" height="20" width="394">&nbsp;</td>
						<td class="xl74" width="929">
						
							<input type="submit" name="SubmitBtn" value="Show Report" class="text-box">
						
						</td>
					</tr>
					</form>
</table>
<p class="auto-style6">Admission Fees Summary Report</p>
<table cellpadding="0" class="CSSTableGenerator">
	<tr>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Month</strong></td>
		<td class="auto-style8" style="width: 102px" bgcolor="#95C23D"><strong>Class</strong></td>
		<td class="auto-style9" bgcolor="#95C23D" width="102"><strong>Total No. of <br />
		Registration</strong></td>
		<td class="auto-style9" bgcolor="#95C23D" width="102"><strong>Admission Fees</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Annual Amt. Fees</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Total Discount</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Total Payable</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Total Amt. Paid</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Balance Amt.</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Admission Fees <br />
		Cancellation</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Admission Fees <br />
		Refund</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="102"><strong>Security Fees <br />
		Refund</strong></td>
		<td class="auto-style8" bgcolor="#95C23D" width="103"><strong>Total Collection</strong></td>
	</tr>
	<?php
		$GrandTotalTotal_Registration=0;
		$GrandTotalAdmissionFee=0;
		$GrandTotalAnnualAmtPaid=0;
		$GrandTotalTotalDiscount=0;
		$GrandTotalTotalAmtPayable=0;
		$GrandTotalTotalAmoutPaid=0;
		$GrandTotalBalanceAmt=0;
		$GrandTotalAdmissionFee_Cancellation=0;
		$GrandTotalAdmissionFee_Refund=0;
		$GrandTotalTotal_Callection=0;
		
		while($row = mysql_fetch_row($rs))
		{
		$AdmissionEntryMonth = $row[0];
		$Class = $row[1];
		
		$Total_Registration = $row[2];
		$AdmissionFee = $row[3];
		$AnnualAmtPaid = $row[4];
		$TotalDiscount = $row[5];
		$TotalAmtPayable = $row[6];
		$TotalAmoutPaid = $row[7];
		$BalanceAmt = $row[8];
		$AdmissionFee_Cancellation = $row[9];
		$AdmissionFee_Refund = $row[10];
		$Total_Callection = $row[11];
		
		$GrandTotalTotal_Registration=$GrandTotalTotal_Registration+$Total_Registration;
		$GrandTotalAdmissionFee=$GrandTotalAdmissionFee+$AdmissionFee;
		$GrandTotalAnnualAmtPaid=$GrandTotalAnnualAmtPaid+$AnnualAmtPaid;
		$GrandTotalTotalDiscount=$GrandTotalTotalDiscount+$TotalDiscount;
		$GrandTotalTotalAmtPayable=$GrandTotalTotalAmtPayable+$TotalAmtPayable;
		$GrandTotalTotalAmoutPaid=$GrandTotalTotalAmoutPaid+$TotalAmoutPaid;
		$GrandTotalBalanceAmt=$GrandTotalBalanceAmt+$BalanceAmt;
		$GrandTotalAdmissionFee_Cancellation=$GrandTotalAdmissionFee_Cancellation+$AdmissionFee_Cancellation;
		$GrandTotalAdmissionFee_Refund=$GrandTotalAdmissionFee_Refund+$AdmissionFee_Refund;
		$GrandTotalTotal_Callection=$GrandTotalTotal_Callection+$Total_Callection;
		
	?>
	<tr>
		<td class="style1" width="102"><?php echo $AdmissionEntryMonth; ?></td>
		<td class="style1" style="width: 102px"><?php echo $Class; ?></td>
		<td class="auto-style5" width="102"><?php echo $Total_Registration; ?></td>
		<td class="auto-style5" width="102"><?php echo $AdmissionFee;?></td>
		<td class="auto-style5" width="102"><?php echo $AnnualAmtPaid;?></td>
		<td class="auto-style5" width="102"><?php echo $TotalDiscount;?></td>
		<td class="auto-style5" width="102"><?php echo $TotalAmtPayable;?></td>
		<td class="auto-style5" width="102"><?php echo $TotalAmoutPaid;?></td>
		<td class="auto-style5" width="102"><?php echo $BalanceAmt;?></td>
		<td class="auto-style5" width="102"><?php echo $AdmissionFee_Cancellation; ?></td>
		<td class="auto-style5" width="102"><?php echo $AdmissionFee_Refund; ?></td>
		<td class="auto-style5" width="102"></td>
		<td class="auto-style5" width="103"><?php echo $Total_Callection; ?></td>
	</tr>
	<?php
		}
	?>
	<tr>
		<td class="style1" colspan="2"><strong>Grand Total:</strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalTotal_Registration;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalAdmissionFee;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalAnnualAmtPaid;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalTotalDiscount;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalTotalAmtPayable;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalTotalAmoutPaid;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalBalanceAmt;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalAdmissionFee_Cancellation;?></strong></td>
		<td class="style1" width="102"><strong><?php echo $GrandTotalAdmissionFee_Refund;?></strong></td>
		<td class="style1" width="102">&nbsp;</td>
		<td class="style1" width="103"><strong><?php echo $GrandTotalTotal_Callection;?></strong></td>
	</tr>
	</table>
<p>&nbsp;</p>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>

</html>