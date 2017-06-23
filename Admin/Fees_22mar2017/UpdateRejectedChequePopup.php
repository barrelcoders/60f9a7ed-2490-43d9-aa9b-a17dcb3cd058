<?php
session_start();
include '../../connection.php';
?>
<?php
$ReceiptNo=$_REQUEST["ReciptNo"];
//$ssql="SELECT `ReceiptNo`, `finalamount`,`chequeno`,`cheque_date`,`bankname`,`cheque_status`,`sadmission`,`sname`,`sclass`,`srollno` from fees_transaction where `cheque_status`='Bounce' AND `ReceiptNo`='$ReceiptNo'";
$ssql="SELECT `receipt`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status` from `fees` where `cheque_status`='Bounce' AND `receipt`='$ReceiptNo'";
$rs= mysql_query($ssql);


$rsDetail= mysql_query("select `sadmission`,`sname`,`sclass`,(select `srollno` from `student_master` where `sadmission`=a.`sadmission`) as `srollno` from `fees` as `a` where `cheque_status`='Bounce' AND `receipt`='$ReceiptNo'");
while($row2 = mysql_fetch_row($rsDetail))
{
	$sadmission=$row2[0];
	$sname=$row2[1];
	$sclass=$row2[2];
	$rollno=$row2[3];
	
	break;
}



$ssql="select distinct `bank_name` from `bank_master` where status='1'";
$rsBank	= mysql_query($ssql);
if($_REQUEST["cboPaymentMode"] !="")
{
	$RcptNo=$_REQUEST["txtRecpNo"];
	$PaymentMode=$_REQUEST["cboPaymentMode"];
	
	$ssql="SELECT `receipt`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status`,`sadmission`,`sname`,`sclass`,`quarter` from fees where `cheque_status`='Bounce' AND `receipt`='$RcptNo'";
	$rs1= mysql_query($ssql);
	while($row1 = mysql_fetch_row($rs1))
	{
		$ReceiptNo1=$row1[0];
		$finalamount1=$row1[1];
		$chequeno1=$row1[2];
		$cheque_date1=$row1[3];
		$bankname1=$row1[4];
		$cheque_status1=$row1[5];
		
		$sadmission=$row1[6];
		$sname=$row1[7];
		$sclass=$row1[8];
		$quarter=$row1[9];
		
		$finalamount="";
	}
	
	if($quarter=="Q1")
	{
		$InstallmentName="FEES FIRST INSTALLMENT";
	}
	if($quarter=="Q2")
	{
		$InstallmentName="FEES SECOND INSTALLMENT";
	}
	if($quarter=="Q3")
	{
		$InstallmentName="FEES THIRD INSTALLMENT";
	}
	if($quarter=="Q4")
	{
		$InstallmentName="FEES FOURTH INSTALLMENT";
	}
	
	$ssql="insert into `fees_cheque_history` (`ReceiptNo`,`chequeno`,`cheque_date`,`bankname`,`cheque_status`,`sadmission`,`sname`,`sclass`) values ('$RcptNo','$chequeno1','$cheque_date1','$bankname1','$cheque_status1','$sadmission','$sname','$sclass')";
	mysql_query($ssql) or die(mysql_error());
	
	if($PaymentMode !="Cash")
	{
		$Dt = $_REQUEST["txtChequeDate"];
		$arr=explode('/',$Dt);
		$ChequeDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		$ChequeNo=$_REQUEST["txtChequeNo"];
		$BankName=$_REQUEST["cboBank"];
		//$NewPaidAmount=$_REQUEST["txtChequeBounceAmt"]-500;
		if($_REQUEST["txtChequeBounceCharges"] !="")
		{
			$ChequeBountAmount=$_REQUEST["txtChequeBounceCharges"];
		}
		else
		{
			$ChequeBountAmount=0;
		}
		$NewPaidAmount=$_REQUEST["txtChequeBounceAmt"]-$ChequeBountAmount;
		$cheque_status="Clear";
		//mysql_query("update `fees_student` set `amount`='$NewPaidAmount' where `sadmission`='$sadmission' and `feeshead`='$InstallmentName'") or die(mysql_error());
	}
	else
	{
		$cheque_status="";
		$ChequeNo="";
		$ChequeDate="";
		$BankName="";
		$cheque_status="";
		
	}
	
	
	$ssql="update `fees` set `chequeno`='$ChequeNo',`cheque_date`='$ChequeDate',`bankname`='$BankName',`cheque_status`='$cheque_status',`cheque_bounce_amt`='$ChequeBountAmount',`amountpaid`='$NewPaidAmount' where `receipt`='$RcptNo'";
	mysql_query($ssql) or die(mysql_error());
	echo "<br><br><center>New Cheque has been sucessfully received!";
	//echo $ssql;
	exit();
}
?>
<script language="javascript">
	function fnlPaymentMode()
	{
		if (document.getElementById("cboPaymentMode").value!="Cash")
		{
			document.getElementById("txtChequeNo").readOnly=false;
			//document.getElementById("txtBank").readOnly=false;
			document.getElementById("cboBank").disabled=false;
			document.getElementById("txtChequeDate").disabled=false;
		}
		else
		{
			document.getElementById("txtChequeNo").value="";
			//document.getElementById("txtBank").value=""
			document.getElementById("cboBank").value="Select One";
			document.getElementById("cboBank").disabled=true;
			document.getElementById("txtChequeDate").value="";
			document.getElementById("txtChequeDate").disabled=true;
			
			document.getElementById("txtChequeNo").readOnly=true;
			//document.getElementById("txtBank").readOnly=true;
		}
	}
	function Validate()
	{
		if(document.getElementById("cboPaymentMode").value !="Cash")
		{
			if (document.getElementById("txtChequeDate").value =="")
			{
				alert("Cheque date is mandatory!");
				return;
			}
			if (document.getElementById("txtChequeNo").value =="")
			{
				alert("Cheque no is mandatory!");
				return;
			}
			if(isNaN(document.getElementById("txtChequeBounceAmt").value)==true)
			{
				alert("Cheque bounce amount should be numeric!");
				return;
			}
			var ChequeBounceAmt=document.getElementById("txtChequeBounceAmt").value;
			if(ChequeBounceAmt.indexOf(".") > -1)
			{
				alert("Cheque bounce amount can not contain .");
				return;
			}
			if(ChequeBounceAmt.indexOf(" ") > -1)
			{
				alert("Cheque bounce amount can not contain blank space!");
				return;
			}
			
			
			if(isNaN(document.getElementById("txtChequeNo").value)==true)
			{
				alert("Cheque No should be numeric!");
				return;
			}
			var ChequeNo=document.getElementById("txtChequeNo").value;
			if(ChequeNo.indexOf(".") > -1)
			{
				alert("Cheque No can not contain .");
				return;
			}
			if(ChequeNo.indexOf(" ") > -1)
			{
				alert("Cheque No can not contain blank space!");
				return;
			}
			if (document.getElementById("cboBank").value=="Select One")
			{
				alert("Bank Name is mandatory!");
				return;
			}
		}
		document.getElementById("frmUpdate").submit();
	}

</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Update Rejected Cheque</title>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>


<style>
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

.style1 {
	text-align: center;
}
.style2 {
	color: #000000;
}
.style3 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style5 {
	text-align: center;
	border: 1px solid #000000;
}
.style6 {
	text-decoration: none;
}
}
.style1 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	}
.style2 {
	border-style: solid;
	border-width: 1px;
}

.auto-style1 {
	font-size: 11pt;
	font-family: Cambria;
}
.style3 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
.style4 {
	font-family: Cambria;
}
.style5 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
</style>
</head>

<body>







		<p>&nbsp;</p>







		<table style="border-width:0px; width: 100%; border-collapse:collapse" class="style14" cellpadding="0" border="1">



			<tr>



				<td class="auto-style49" colspan="5" style="border-left:medium none #C0C0C0; border-right:medium none #808080; border-top:medium none #C0C0C0; height: 10px; background-color:#FFFFFF; border-bottom-style:none; border-bottom-width:medium">







				<strong><font face="Cambria">Update Rejected Cheque</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">
<!--
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right">
-->
</font></a></p>
				<?php
				$cnt=1;
				while($row = mysql_fetch_row($rs))
				{
							$ReceiptNo=$row[0];
							$finalamount=$row[1];
							$chequeno=$row[2];
							$cheque_date=$row[3];
							$bankname=$row[4];
							$cheque_status=$row[5];
							
									
							
							
							
					break;				
				}//end of while loop
				?>					
				<table style="width: 100%" class="style1">
				<form name="frmUpdate" id="frmUpdate" method="post" action="SubmitUpdateRejectedChequePopup.php">
				<input type="hidden" name="txtRecpNo" id="txtRecpNo" value="<?php echo $ReceiptNo;?>">
				<input type="hidden" name="txtActualFeeAmount" id="txtActualFeeAmount" value="<?php echo $finalamount;?>">
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Adm. No.</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $sadmission;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Student Name</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $sname;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Class</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $sclass;?></td>
					</tr>
					<!--
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Roll No</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $srollno;?></td>
					</tr>
					-->
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Fees Receipt No.</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $ReceiptNo;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Cheque Amount</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $finalamount;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Bounced Cheque No</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $chequeno;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Cheque Date</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $cheque_date;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Bank Name</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $bankname;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style2">
						<b><font face="Cambria">Cheque Status</font></b></td>
						<td style="width: 663px" class="style2"><?php echo $cheque_status;?></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style5"><strong>Mode Of Payment</strong></td>
						<td style="width: 663px" class="style2">

		<select name="cboPaymentMode" id="cboPaymentMode" style="width: 127px" onchange="Javascript:fnlPaymentMode();" class="auto-style1">
		<option selected="" value="Cheque">Cheque</option>
		<!--<option value="Cash">Cash</option>
		<option value="Demand Draft">Demand Draft</option>
		-->
		</select></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style5"><strong>Cheque Date</strong></td>
						<td style="width: 663px" class="style2">

		<input name="txtChequeDate" id="txtChequeDate" class="tcal" type="text"></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style5">

		<strong>New Cheque or DD#</strong></td>
						<td style="width: 663px" class="style2">

		<strong>

		<input name="txtChequeNo" id="txtChequeNo" type="text" class="auto-style1" style="width: 106px" ></strong></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style5">

		<strong><span class="style4">Bank Name</span></strong></td>
						<td style="width: 663px" class="style2">
		<select name="cboBank" id="cboBank">
		<option value="Select One" selected="selected" >Select One</option>
		<?php
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style5">

		<strong><span class="style4">Fees Amount</span></strong></td>
						<td style="width: 663px" class="style2">
		<?php echo $finalamount;?>
		</td>
					</tr>
					<tr>
						<td style="width: 662px" class="style5">

		<strong><span class="style4">New Cheque Amount</span></strong></td>
						<td style="width: 663px" class="style2">
		<input name="txtChequeBounceAmt" id="txtChequeBounceAmt" type="text"></td>
					</tr>
					<tr>
						<td style="width: 662px" class="style5">

		<strong><span class="style4">Cheque Bounce Charges</span></strong></td>
						<td style="width: 663px" class="style2">
		<input name="txtChequeBounceCharges" id="txtChequeBounceCharges" type="text" value="500" readonly="readonly"></td>
					</tr>
					<tr>
						<td class="style3" colspan="2">
						<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></td>
					</tr>
					
					</form>
				</table>

				</td>





			</tr>

</table>

				
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

		</body>

</html>