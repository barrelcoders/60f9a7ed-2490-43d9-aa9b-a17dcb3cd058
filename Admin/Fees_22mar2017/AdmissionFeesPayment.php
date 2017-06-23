<?php include '../../connection.php';?>

<?php

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);


if ($_REQUEST["txtAdmissionNo"] != "")
{
		$AdmissionNo=$_REQUEST["txtAdmissionNo"];
		$sqlStudentDetail = "SELECT `sname` , `sclass` , `srollno` FROM `user_master` where  `sadmission`='$AdmissionNo'";
		$rs = mysql_query($sqlStudentDetail);
		while($row = mysql_fetch_row($rs))
				{
					$sname=$row[0];
					$class=$row[1];					
					$RollNo=$row[2];					
				}
		
		$sqlQ1 = "SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime` FROM `fees` where  `sadmission`='$AdmissionNo' and `quarter`='Q1'";
		$rsQ1 = mysql_query($sqlQ1);
		while($row = mysql_fetch_row($rsQ1))
				{
					$Q1fees_amount=$row[0];
					$Q1amountpaid=$row[1];					
					$Q1quarter=$row[2];	
					$Q1status=$row[3];
					$Q1Receipt=$row[4];		
					$Q1DateTime=$row[5];		
				}
				
		$sqlQ2 = "SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime` FROM `fees` where  `sadmission`='$AdmissionNo' and `quarter`='Q2'";
		$rsQ2 = mysql_query($sqlQ2);
		while($row = mysql_fetch_row($rsQ2))
				{
					$Q2fees_amount=$row[0];
					$Q2amountpaid=$row[1];					
					$Q2quarter=$row[2];	
					$Q2status=$row[3];		
					$Q2Receipt=$row[4];		
					$Q2DateTime=$row[5];		
				}
		
		$sqlQ3 = "SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime` FROM `fees` where  `sadmission`='$AdmissionNo' and `quarter`='Q3'";
		$rsQ3 = mysql_query($sqlQ3);
		while($row = mysql_fetch_row($rsQ3))
				{
					$Q3fees_amount=$row[0];
					$Q3amountpaid=$row[1];					
					$Q3quarter=$row[2];	
					$Q3status=$row[3];		
					$Q3Receipt=$row[4];		
					$Q3DateTime=$row[5];		
				}
		
		$sqlQ4 = "SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime` FROM `fees` where  `sadmission`='$AdmissionNo' and `quarter`='Q4'";
		$rsQ4 = mysql_query($sqlQ4);
		while($row = mysql_fetch_row($rsQ4))
				{
					$Q4fees_amount=$row[0];
					$Q4amountpaid=$row[1];					
					$Q4quarter=$row[2];	
					$Q4status=$row[3];		
					$Q4Receipt=$row[4];		
					$Q4DateTime=$row[5];		
				}
				
}
?>

<script language="javascript">
function Validate(SubmitType)
{
	if (document.getElementById("txtTotal").value =="")
	{
		alert("Toatal payable amount is blank !");
		return;
	}
	document.getElementById("frmFees").action="AdmissionFeesReceipt.php";
	document.getElementById("frmFees").target="_blank";
	
	if (SubmitType=="Preview")
	{
		document.getElementById("SubmitType").value="Preview";
	}
	if (SubmitType=="Final")
	{
		document.getElementById("SubmitType").value="Final";
	}
	
	document.getElementById("frmFees").submit();
	
}

function Validate1()
{
	//alert("Hello");
	if (document.getElementById("txtAdmissionNo").value=="")
	{
		alert("Please enter student addmission id");
		return;
	}
	document.getElementById("frmFees").submit();
	
}

function GetFeeDetail()
{
	if (document.getElementById("cboQuarter").value =="Q1")
	{
		if (document.getElementById("Q1Fee").value !="")
		{
			alert ("Fee for Quarter Q1 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
		if (document.getElementById("cboQuarter").value =="Q2")
	{
		if (document.getElementById("Q2Fee").value !="")
		{
			alert ("Fee for Quarter Q2 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
		if (document.getElementById("cboQuarter").value =="Q3")
	{
		if (document.getElementById("Q3Fee").value !="")
		{
			alert ("Fee for Quarter Q3 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
		if (document.getElementById("cboQuarter").value =="Q4")
	{
		if (document.getElementById("Q4Fee").value !="")
		{
			alert ("Fee for Quarter Q4 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
	
try
		    {    
				// Firefox, Opera 8.0+, Safari    
				xmlHttp=new XMLHttpRequest();
			}
		  catch (e)
		    {    // Internet Explorer    
				try
			      {      
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
			    catch (e)
			      {      
					  try
				        { 
							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				      catch (e)
				        {        
							alert("Your browser does not support AJAX!");        
							return false;        
						}      
				  }    
			 } 
			 xmlHttp.onreadystatechange=function()
		      {
			      if(xmlHttp.readyState==4)
			        {
						var rows="";
			        	rows=new String(xmlHttp.responseText);
			        	//alert(rows);
			        	var arrStr=rows.split(",");
			        	var TutionFee=arrStr[0];
			        	var TransportFee=arrStr[1];
			        	var BalanceAmt=arrStr[2];
			        	var LateDays=arrStr[3];
			        	var AdmissionFee=arrStr[4];
			        	
			        	document.getElementById("txtTuition").value=TutionFee;
			        	document.getElementById("txtTransportFees").value=TransportFee;
			        	document.getElementById("txtAdmissionFee").value=AdmissionFee;
			        	document.getElementById("txtLateDays").value =LateDays;
			        	
			        	if (LateDays !="")
			        	{
			        		document.getElementById("txtLateFee").value=50*LateDays;
			        		document.getElementById("txtAdjustedLateFee").value=50*LateDays;
			        		
			        	}
			        	document.getElementById("txtAdjustedLateDays").value =LateDays;
			        	CalculatTotal();
			        	//alert("TutionFee:" + TutionFee + ",Transport Fee:" + TransportFee + ",Balance Amt:" + BalanceAmt);
			        	//document.getElementById("txtStudentName").value=rows;
			        	
			        	//ReloadWithSubject();
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetAdmissionFeeDetail.php?Quarter=" + document.getElementById("cboQuarter").value + "&Class=" + document.getElementById("txtClass").value + "&sadmission=" + document.getElementById("txtAdmissionNo").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);

}

function CalculateLateFee()
{
	if(isNaN(document.getElementById("txtAdjustedLateDays").value)==true)
	{
		document.getElementById("txtAdjustedLateFee").value=0;
	}
	else
	{
		document.getElementById("txtAdjustedLateFee").value=50*document.getElementById("txtAdjustedLateDays").value;
	}
	CalculatTotal();
}

function CalculatTotal()
{
	if (isNaN(document.getElementById("txtTuition").value)==true || document.getElementById("txtTuition").value=="")
	{
		TutionFee=0;
	}
	else
	{
		TutionFee=document.getElementById("txtTuition").value;
	}
	if (isNaN(document.getElementById("txtTransportFees").value)==true || document.getElementById("txtTransportFees").value=="")
	{
		TransportFees=0;
	}
	else
	{
		TransportFees=document.getElementById("txtTransportFees").value;
	}
	if (isNaN(document.getElementById("txtAdjustedLateFee").value)==true || document.getElementById("txtAdjustedLateFee").value=="")
	{
		AdjustedLateFee=0;
	}
	else
	{
		AdjustedLateFee=document.getElementById("txtAdjustedLateFee").value;
	}
	if (isNaN(document.getElementById("txtAdmissionFee").value)==true || document.getElementById("txtAdmissionFee").value=="")
	{
		AdmissionFee=0;
	}
	else
	{
		AdmissionFee=document.getElementById("txtAdmissionFee").value;
	}
	if (isNaN(document.getElementById("txtDiscount").value)==true || document.getElementById("txtDiscount").value=="")
	{
		Discount=0;
	}
	else
	{
		TotalAmt1=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(AdmissionFee);
		if (parseInt(document.getElementById("txtDiscount").value) > TotalAmt1)
		{
			document.getElementById("txtDiscount").value="0";
			Discount=0;
			alert ("Discount Amount can not be more then total amount !");
			
		}
		else
		{
			Discount=document.getElementById("txtDiscount").value;
		}
	}
	
	
	TotalAmt=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(AdmissionFee)-parseInt(Discount);
	document.getElementById("txtTotal").value=parseInt(TotalAmt);
	
}

function fnlPaymentMode()
{
	if (document.getElementById("cboPaymentMode").value!="Cash")
	{
		document.getElementById("txtChequeNo").readOnly=false;
		document.getElementById("txtBank").readOnly=false;
	}
	else
	{
		document.getElementById("txtChequeNo").value="";
		document.getElementById("txtBank").value=""
		
		document.getElementById("txtChequeNo").readOnly=true;
		document.getElementById("txtBank").readOnly=true;
	}
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Fees Reciept Generation</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.auto-style1 {
	font-size: 11pt;
}
.auto-style2 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style5 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}

.auto-style11 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	font-size: 11pt;
	color: #FFFFFF;
	font-weight: bold;
	text-align: center;
}
.auto-style12 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #CC3300;
	text-decoration: underline;
	text-align: center;
}

.auto-style14 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style15 {
	font-size: 11pt;
	color: #822203;
	font-weight: bold;
}
.auto-style17 {
	font-family: Cambria;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style18 {
	margin-left: 0px;
	font-family: Arial;
	font-size: 11pt;
	color: #CC0033;
}

.auto-style20 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
	font-size: medium;
}
.auto-style21 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
	text-align: center;
}

.auto-style22 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style23 {
	border-style: none;
	border-width: medium;
}
.auto-style24 {
	border-style: none;
	border-width: medium;
	text-align: left;
}
.auto-style25 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #CC3300;
}

.auto-style26 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.auto-style27 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style28 {
	font-size: 11pt;
	font-weight: normal;
}
.auto-style30 {
	font-family: Cambria;
	font-weight: normal;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style31 {
	border-style: none;
	border-width: medium;
	text-align: right;
}
.auto-style32 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
	text-align: right;
}
.auto-style33 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
	text-decoration: underline;
}

.auto-style34 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: 700;
	color: #CC3300;
	font-size: 11pt;
}

.auto-style35 {
	font-size: 11pt;
	font-family: Arial;
	color: #CC0033;
}

</style>

</head>



<body>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 33px">

	

	
	<tr>
		<td bgcolor="#CC0033" class="auto-style11" style="width: 34%">
		Pay Fees<td class="auto-style21" style="width: 317px">
		
	<a href="FeesReport.php">	Fees Record and Report</a><td class="auto-style21">
		
		<a href="FeesMaster.php">Fees Master</a></table>


	
	<form name="frmFees" id="frmFees" method="post" action="AdmissionFeesPayment.php">
	<input type="hidden" name="Q1Fee" id="Q1Fee" value="<?php echo $Q1fees_amount; ?>">
	<input type="hidden" name="Q2Fee" id="Q2Fee" value="<?php echo $Q2fees_amount; ?>">
	<input type="hidden" name="Q3Fee" id="Q3Fee" value="<?php echo $Q3fees_amount; ?>">
	<input type="hidden" name="Q4Fee" id="Q4Fee" value="<?php echo $Q4fees_amount; ?>">
	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	<table border="1px">
	
	
		<tr>
		
		<td style="width: 260px; height: 29px;" class="auto-style23">

		<span class="auto-style2">Student Admission No. </span><span style="font-family: Cambria; font-weight: 700; color: #CC3300" class="auto-style1">:</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style23">

		<input type="text" name="txtAdmissionNo" id="txtAdmissionNo" size="15" style="font-family: Arial; color: #CC0033; width: 151px;" class="auto-style1" value="<?php echo $_REQUEST["txtAdmissionNo"]; ?>"></td>

		<td style="width: 157px; height: 29px;" class="auto-style26">



		<input name="btnGo" type="button" value="Fill Detail" onclick="Javascript:Validate1();" class="auto-style35" style="width: 82px"></td>
	</tr>
	
	
	<tr>
	
	
	
		<td style="width: 260px; height: 52px;" class="auto-style23">

		<span class="auto-style2">Student Name</span><span class="auto-style1">
		</span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

		<input name="txtName" id="txtName" type="text" class="auto-style35" style="height: 22px" value="<?php echo $sname;?>" readonly="readonly" ></td>
	
		
		
		
	
		<td style="width: 157px; height: 52px;" class="auto-style23">

		&nbsp;</td>
	
		
		
		
	
		<td style="width: 179px; height: 52px;" class="auto-style32">

		Class</td>

		<td style="height: 52px;" class="auto-style23">

		<input name="txtClass" id="txtClass" type="text" class="auto-style18" style="width: 95px" value="<?php echo $class;?>" readonly="readonly"></td>
		
		
	
		<td style="width: 191px; height: 52px;" class="auto-style31">

		<span style="font-family: Cambria; font-weight: 700; color: #CC3300" class="auto-style1">
		Roll No</span><span class="auto-style1">
		</span>

		</td>
		
		

		<td style="width: 155px; height: 52px;" class="auto-style23">

		<input name="txtRollNo" id="txtRollNo" type="text" style="width: 83px" value="<?php echo $RollNo; ?>" readonly="readonly" class="auto-style35"></td>
		<br class="auto-style1">
		
		<td style="width: 111px; height: 52px;" class="auto-style22">

		</td>

		<td style="width: 78px; height: 52px;" class="auto-style23">

		</td>
		<br class="auto-style1">
		</tr>
		
		
		</table>
		<br>


	
	
	
	<table border="1px" style="height: 59px">
		
		
	<tr>
	
	
	
		<td style="width: 154px; height: 29px;" class="auto-style22">

		Mode Of Payment</td>

	
	
		<td style="height: 29px;" class="auto-style22">

		<select name="cboPaymentMode" id="cboPaymentMode" style="width: 127px" onchange="Javascript:fnlPaymentMode();" class="auto-style35">
		<option selected="" value="Cash">Cash</option>
		<option>Cheque</option>
		<option>Demand Draft</option>
		</select></td>

		
		
		
	
		<td style="height: 29px; width: 252px;" class="auto-style5">

		<strong>Cheque or Demand Draft <br>(if applicable)</strong></td>

		
	
		<td style="width: 170px; height: 29px;" class="auto-style25">

		<strong>

		<input name="txtChequeNo" id="txtChequeNo" type="text" class="auto-style17" style="width: 142px" readonly="readonly" ></strong></td>
		
		

		<td style="width: 155px; height: 29px;" class="auto-style26">

		<strong><span class="auto-style17">Bank Name on Cheque / DD</span></strong></td>
		
		<td style="height: 29px;" class="auto-style22">

		<input name="txtBank" id="txtBank" type="text" style="width: 180px" readonly="readonly"></td>

		</tr>
		
		
		</table>
		<br>
		<br class="auto-style1">
		
	
<table border="1" width="100%">

<tr>			
		

		<td style="height: 29px;" class="auto-style12" colspan="4">

		<strong>Fees Heads</strong></td>

			</tr>
		
<tr>			
		

		<td style="width: 316px; height: 38px;" class="auto-style22">

		Fees Payment for Quarter</td>


		<td class="auto-style22" style="height: 38px" colspan="3">

		<select name="cboQuarter" id="cboQuarter" style="width: 156px" onchange="GetFeeDetail();" class="auto-style35" >
		<option selected="" value="Select One">Select One</option>
		<option value="Q1">Quarter 1 [April - June]</option>
		<option value="Q2">Quarter 2 [July - September]</option>
		<option value="Q3">Quarter 3 [October - December]</option>
		<option value="Q4">Quarter 4 [ January - March]</option>
		</select></td>

			</tr>
		
<tr>			
		

		<td style="width: 316px; height: 37px;" class="auto-style22">

		Tuition Fees + Annual Charges for the Quarter</td>


		<td style="width: 215px; height: 37px;" class="auto-style22" colspan="3">

		<input name="txtTuition" id="txtTuition" type="text" class="auto-style35" readonly="readonly" ></td>

			</tr>
		
		<tr>

		<td style="width: 316px; height: 36px;" class="auto-style23">

		<span class="auto-style2">Transport Fees</span></td>

		<td style="width: 215px; height: 36px;" class="auto-style23" colspan="3">



		<input name="txtTransportFees" id="txtTransportFees" type="text" class="auto-style35" readonly="readonly"></td>

			

		

		
		</tr>
		
<tr>
		<td style="width: 316px; height: 37px;" class="auto-style24">

		<span style="font-family: Cambria; font-weight: 700; color: #CC3300" class="auto-style1">
		Actual
		Late Fees Charge</span></td>

		<td style="width: 215px; height: 37px;" class="auto-style24">



		<input name="txtLateFee" id="txtLateFee" type="text" class="auto-style35" readonly="readonly" ></td>

		<td style="width: 215px; height: 37px;" class="auto-style24">



		<span style="font-family: Cambria; font-weight: 700; color: #CC3300" class="auto-style1">
		Actual Delay
		Days:</span></td>

		<td style="width: 215px; height: 37px;" class="auto-style24">

			<input name="txtLateDays" id="txtLateDays" type="text" readonly="readonly" class="auto-style35">
		</td>

	</tr>
		
<tr>
		<td style="width: 316px; height: 37px;" class="auto-style24">

		<span style="font-family: Cambria; font-weight: 700; color: #CC3300" class="auto-style1">
		Adjusted Late Fees Charge</span></td>

		<td style="width: 215px; height: 37px;" class="auto-style24">



		<input name="txtAdjustedLateFee" id="txtAdjustedLateFee" type="text" class="auto-style35"></td>

		<td style="width: 215px; height: 37px;" class="auto-style24">



		<span style="font-family: Cambria; font-weight: 700; color: #CC3300" class="auto-style1">
		Adjusted Delay
		Days:</span></td>

		<td style="width: 215px; height: 37px;" class="auto-style24">

			<input name="txtAdjustedLateDays" id="txtAdjustedLateDays" type="text" onkeyup="Javascript:CalculateLateFee();" class="auto-style35">
		</td>

	</tr>
	

	<?php 

	if ($Message1 !="")

	{

	?>

	<?php 

	}

	?>

	

<tr>
		<td style="width: 316px; height: 33px;" class="auto-style34">

		Admission Fee</td>

		<td style="width: 215px; height: 33px;" class="auto-style24" colspan="3">



		<input name="txtAdmissionFee" id="txtAdmissionFee" type="text" class="auto-style35" readonly="readonly"></td>

	</tr>

	

	<tr>

		<td style="height: 29px; width: 316px;" class="auto-style14">

		Discount</td>

		<td style="height: 29px;" class="auto-style14" colspan="3">



		<input name="txtDiscount" id="txtDiscount" type="text" class="auto-style35" onkeyup="Javascript:CalculatTotal();" style="height: 22px"></td>

	</tr>

	

	<tr>

		<td style="height: 29px; width: 316px;" class="auto-style14">

		Discount Reason</td>

		<td style="height: 29px;" class="auto-style14" colspan="3">



		<select name="cboDiscountReason" class="auto-style35">
		<option selected="" value="Select One">Select One</option>
		<option value="Sibling">Sibling</option>
		<option value="Second Girl Child">Second Girl Child</option>
		</select></td>

	</tr>

	

	<tr>

		<td style="height: 29px; width: 316px;" class="auto-style14">

		Remarks</td>

		<td style="height: 29px;" class="auto-style14" colspan="3">



		<textarea name="txtRemarks" id="txtRemarks" rows="2" style="width: 585px" class="auto-style35"></textarea></td>

	</tr>

	

	<tr>

		<td style="height: 29px;" class="auto-style5">

		Total Fees Payable</td>

		<td style="height: 29px;" class="auto-style14" colspan="3">



		<input name="txtTotal" id="txtTotal" type="text" class="auto-style35" readonly="readonly"></td>

	</tr>

	<tr>

		<td style="height: 29px;" colspan="4" class="auto-style5">

		<strong>

		<input name="BtnSubmit" type="button" value="Preview" onclick="Javascript:Validate('Preview');" class="auto-style15">
		<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate('Final');" class="auto-style15">
		</strong></td>

	</tr>

		

</table>
<!--
</form>
-->
<br>


	
	
	
		<br><br class="auto-style1">

<table border="1" width="100%" style="height: 238px">

<tr>			
		

		<td style="height: 29px;" class="auto-style33" colspan="5">

		Payment History</td>

			</tr>
		
<tr>			
		

		<td style="height: 16px;" class="auto-style27">

		<strong>Previous Fees Payment Status</strong></td>


		<td style="height: 16px; width: 179px;" class="auto-style27">

		<strong>Payment Status</strong></td>


		<td style="height: 16px; width: 158px;" class="auto-style27">

		<strong>Reciept #</strong></td>


		<td style="height: 16px; width: 164px;" class="auto-style27">

		<strong>Fees Payment Date</strong></td>


		<td style="height: 16px; width: 135px;" class="auto-style27">

		<strong>Print Reciept</strong></td>

			</tr>
		
<tr>			
		

		<td style="width: 316px; height: 20px;" class="auto-style25">

		<strong>Quarter 1 [ April - May - June]</strong></td>


		<td style="width: 179px; height: 20px;" class="auto-style22">

		<input name="txtQuarter1" id="txtQuarter1" type="text" class="auto-style35" value="<?php echo $Q1status; ?>" readonly="readonly"></td>


		<td style="width: 158px; height: 20px;" class="auto-style22">

		<input name="txtQuarter1Reciept" id="txtQuarter1Reciept" type="text" class="auto-style35" value="<?php echo $Q1Receipt; ?>" readonly="readonly"></td>


		<td style="width: 164px; height: 20px;" class="auto-style22">

		<input name="txtQuarter1PaymentDate" id="txtQuarter1PaymentDate" type="text" class="auto-style35" value="<?php echo $Q1DateTime; ?>" readonly="readonly"></td>


		<td style="width: 135px; height: 20px;" class="auto-style5">


			<input name="PrintQ1Receipt" style="height: 29px; width: 99px;" type="button" value="Print Reciept" class="auto-style35">
		</td>

			</tr>
		
		<tr>

		<td style="width: 316px; height: 38px;" class="auto-style25">

		<strong>Quarter 2 [ July&nbsp; - August - September]</strong></td>

		<td style="width: 179px; height: 38px;" class="auto-style23">



		<input name="txtQuarter2" id="txtQuarter2" type="text" class="auto-style35" value="<?php echo $Q2status; ?>" readonly="readonly" ></td>

			

		

		
		<td style="width: 158px; height: 38px;" class="auto-style23">



		<input name="txtQuarter2Reciept" id="txtQuarter2Reciept" type="text" class="auto-style35" value="<?php echo $Q2Receipt; ?>" readonly="readonly"></td>

			

		

		
		<td style="width: 164px; height: 38px;" class="auto-style23">



		<input name="txtQuarter2PaymentDate" id="txtQuarter2PaymentDate" type="text" class="auto-style35" value="<?php echo $Q2DateTime; ?>" readonly="readonly"></td>

			

		

		
		<td style="width: 135px; height: 38px;" class="auto-style26">



		<input name="PrintQ2Receipt" style="height: 29px; width: 97px;" type="button" value="Print Receipt" class="auto-style35"></td>

			

		

		
		</tr>
		
		<tr>
		
		
		<td class="auto-style25" style="width: 316px; height: 38px;"><strong>&nbsp;Quarter 3 [ October - 
		November - December ]
</strong>
</td>

		
		<td style="width: 179px; height: 38px;" class="auto-style23">



		<input name="txtQuarter3" id="txtQuarter3" type="text" class="auto-style35" value="<?php echo $Q3status; ?>" readonly="readonly"></td>

		
		<td style="width: 158px; height: 38px;" class="auto-style23">



		<input name="txtQuarter3Reciept" id="txtQuarter3Reciept" type="text" class="auto-style35" value="<?php echo $Q3Receipt; ?>" readonly="readonly"></td>

		
		<td style="width: 164px; height: 38px;" class="auto-style23">



		<input name="txtQuarter3PaymentDate" id="txtQuarter3PaymentDate" type="text" class="auto-style35" value="<?php echo $Q3DateTime; ?>" readonly="readonly"></td>

		
		<td style="width: 135px; height: 38px;" class="auto-style26">



		<input name="PrintQ3Receipt" style="height: 29px; width: 94px;" type="button" value="Print Receipt" class="auto-style35"></td>

</tr>
<tr>
		<td style="width: 316px; " class="auto-style24">

		<span class="auto-style30"><strong>&nbsp;Quarter 4 [ January - February - March ]</strong></span><span style="font-family: Cambria; color: #CC3300" class="auto-style28"><strong>:</strong></span></td>

		<td style="width: 179px; " class="auto-style24">



		<input name="txtQuarter4" id="txtQuarter4" type="text" class="auto-style35" value="<?php echo $Q4status; ?>" readonly="readonly"></td>

		<td style="width: 158px; " class="auto-style24">



		<input name="txtQuarter4Reciept" id="txtQuarter4Reciept" type="text" class="auto-style35" value="<?php echo $Q4Receipt; ?>" readonly="readonly"></td>

		<td style="width: 164px; " class="auto-style24">



		<input name="txtQuarter4PaymentDate" id="txtQuarter4PaymentDate" type="text" class="auto-style35" value="<?php echo $Q4DateTime; ?>" readonly="readonly"></td>

		<td style="width: 135px; " class="auto-style26">



		<input name="PrintQ4Reciept" style="height: 29px; width: 93px;" type="button" value="Print Receipt" class="auto-style35"></td>

	</tr>

	

</table>	
</form>
</body>



</html>