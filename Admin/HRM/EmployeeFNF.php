<?php
//$Con = mysql_connect("localhost","root","");
//
//if (!$Con)
//
//  {
//
//  die('Could not connect: ' . mysql_error());
//
//  }
//
//mysql_select_db("employee_master", $Con);
//
//$ssqlClass="SELECT distinct `class` FROM `class_master`";
//$rsClass= mysql_query($ssqlClass);
//
//
//if ($_REQUEST["txtAdmissionNo"] != "")
//{
//		$AdmissionNo=$_REQUEST["txtAdmissionNo"];
//		$sqlStudentDetail = "SELECT `sname` , `sclass` , `srollno` FROM `student_master` where  `sadmission`='$AdmissionNo'";
//		$rs = mysql_query($sqlStudentDetail);
//		if (mysql_num_rows($rs) > 0)
//		{
//			while($row = mysql_fetch_row($rs))
//					{
//						$sname=$row[0];
//						$class=$row[1];					
//						$RollNo=$row[2];					
//					}
//		}
//				
//}
//?>

<script language="javascript">
//function Validate(SubmitType)
//{
//	if(document.getElementById("ChkLibrary").value == "")
//	{
//		alert("Please check library clearance");
//		return;
//	}
//	if(document.getElementById("ChkAccount").value == "")
//	{
//		alert("Please check account clearance");
//		return;
//	}
//	if(document.getElementById("ChkAcademic").value == "")
//	{
//		alert("Please check Academic clearance");
//		return;
//	}
//	
//	if(document.getElementById("ChkAccount").value == "")
//	{
//		alert("Please check Transport clearance");
//		return;
//	}
//	
//	document.getElementById("frmFees").action="FNFSubmit.php";
//	
//	document.getElementById("frmFees").submit();	
//	
//}
//
//function Validate1()
//{
//	//alert("Hello");
//	if (document.getElementById("txtAdmissionNo").value=="")
//	{
//		alert("Please enter student addmission id");
//		return;
//	}
//	document.getElementById("frmFees").submit();
//	
//}
//
//function GetFeeDetail()
//{
//	if (document.getElementById("cboQuarter").value =="Q1")
//	{
//		if (document.getElementById("Q1Fee").value !="")
//		{
//			alert ("Fee for Quarter Q1 is already paid !");
//			document.getElementById("cboQuarter").value="Select One";
//			return;
//		}
//	}
//		if (document.getElementById("cboQuarter").value =="Q2")
//	{
//		if (document.getElementById("Q2Fee").value !="")
//		{
//			alert ("Fee for Quarter Q2 is already paid !");
//			document.getElementById("cboQuarter").value="Select One";
//			return;
//		}
//	}
//		if (document.getElementById("cboQuarter").value =="Q3")
//	{
//		if (document.getElementById("Q3Fee").value !="")
//		{
//			alert ("Fee for Quarter Q3 is already paid !");
//			document.getElementById("cboQuarter").value="Select One";
//			return;
//		}
//	}
//		if (document.getElementById("cboQuarter").value =="Q4")
//	{
//		if (document.getElementById("Q4Fee").value !="")
//		{
//			alert ("Fee for Quarter Q4 is already paid !");
//			document.getElementById("cboQuarter").value="Select One";
//			return;
//		}
//	}
//	
//try
//		    {    
//				// Firefox, Opera 8.0+, Safari    
//				xmlHttp=new XMLHttpRequest();
//			}
//		  catch (e)
//		    {    // Internet Explorer    
//				try
//			      {      
//					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
//				  }
//			    catch (e)
//			      {      
//					  try
//				        { 
//							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
//						}
//				      catch (e)
//				        {        
//							alert("Your browser does not support AJAX!");        
//							return false;        
//						}      
//				  }    
//			 } 
//			 xmlHttp.onreadystatechange=function()
//		      {
//			      if(xmlHttp.readyState==4)
//			        {
//						var rows="";
//			        	rows=new String(xmlHttp.responseText);
//			        	//alert(rows);
//			        	var arrStr=rows.split(",");
//			        	var TutionFee=arrStr[0];
//			        	var TransportFee=arrStr[1];
//			        	var BalanceAmt=arrStr[2];
//			        	var LateDays=arrStr[3];
//			        	
//			        	document.getElementById("txtTuition").value=TutionFee;
//			        	document.getElementById("txtTransportFees").value=TransportFee;
//			        	document.getElementById("txtPreviousBalance").value=BalanceAmt;
//			        	document.getElementById("txtLateDays").value =LateDays;
//			        	if (LateDays !="")
//			        	{
//			        		document.getElementById("txtLateFee").value=50*LateDays;
//			        		document.getElementById("txtAdjustedLateFee").value=50*LateDays;
//			        		
//			        	}
//			        	document.getElementById("txtAdjustedLateDays").value =LateDays;
//			        	CalculatTotal();
//			        	//alert("TutionFee:" + TutionFee + ",Transport Fee:" + TransportFee + ",Balance Amt:" + BalanceAmt);
//			        	//document.getElementById("txtStudentName").value=rows;
//			        	
//			        	//ReloadWithSubject();
//						//alert(rows);														
//			        }
//		      }
//			
//			var submiturl="GetFeeDetail.php?Quarter=" + document.getElementById("cboQuarter").value + "&Class=" + document.getElementById("txtClass").value + "&sadmission=" + document.getElementById("txtAdmissionNo").value + "&FinancialYear=" + document.getElementById("txtFinancialYear").value;
//			xmlHttp.open("GET", submiturl,true);
//			xmlHttp.send(null);
//
//}
//
//function CalculateLateFee()
//{
//	if(isNaN(document.getElementById("txtAdjustedLateDays").value)==true)
//	{
//		document.getElementById("txtAdjustedLateFee").value=0;
//	}
//	else
//	{
//		document.getElementById("txtAdjustedLateFee").value=50*document.getElementById("txtAdjustedLateDays").value;
//	}
//	CalculatTotal();
//}
//
//function CalculatTotal()
//{
//	if (isNaN(document.getElementById("txtTuition").value)==true || document.getElementById("txtTuition").value=="")
//	{
//		TutionFee=0;
//	}
//	else
//	{
//		TutionFee=document.getElementById("txtTuition").value;
//	}
//	if (isNaN(document.getElementById("txtTransportFees").value)==true || document.getElementById("txtTransportFees").value=="")
//	{
//		TransportFees=0;
//	}
//	else
//	{
//		TransportFees=document.getElementById("txtTransportFees").value;
//	}
//	if (isNaN(document.getElementById("txtAdjustedLateFee").value)==true || document.getElementById("txtAdjustedLateFee").value=="")
//	{
//		AdjustedLateFee=0;
//	}
//	else
//	{
//		AdjustedLateFee=document.getElementById("txtAdjustedLateFee").value;
//	}
//	if (isNaN(document.getElementById("txtPreviousBalance").value)==true || document.getElementById("txtPreviousBalance").value=="")
//	{
//		PreviousBalance=0;
//	}
//	else
//	{
//		PreviousBalance=document.getElementById("txtPreviousBalance").value;
//	}
//	if (isNaN(document.getElementById("txtDiscount").value)==true || document.getElementById("txtDiscount").value=="")
//	{
//		Discount=0;
//	}
//	else
//	{
//		TotalAmt1=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(PreviousBalance);
//		if (parseInt(document.getElementById("txtDiscount").value) > TotalAmt1)
//		{
//			document.getElementById("txtDiscount").value="0";
//			Discount=0;
//			alert ("Discount Amount can not be more then total amount !");
//			
//		}
//		else
//		{
//			Discount=document.getElementById("txtDiscount").value;
//		}
//	}
//	
//	
//	TotalAmt=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(PreviousBalance)-parseInt(Discount);
//	document.getElementById("txtTotal").value=parseInt(TotalAmt);
//	
//}
//
//function fnlPaymentMode()
//{
//	if (document.getElementById("cboPaymentMode").value!="Cash")
//	{
//		document.getElementById("txtChequeNo").readOnly=false;
//		document.getElementById("txtBank").readOnly=false;
//	}
//	else
//	{
//		document.getElementById("txtChequeNo").value="";
//		document.getElementById("txtBank").value=""
//		
//		document.getElementById("txtChequeNo").readOnly=true;
//		document.getElementById("txtBank").readOnly=true;
//	}
//}
</script>



<?php  
include '../../connection.php'; ?>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Fees Reciept Generation</title>

<!-- link calendar resources -->

	<!--<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>-->

	

<style type="text/css">

.auto-style1 {
	font-size: 11pt;
	font-family: Calibri;
}
.auto-style2 {
	font-family: Calibri;
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

.auto-style12 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
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
	font-family: Calibri;
}
.auto-style17 {
	font-family: Calibri;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style18 {
	margin-left: 0px;
	font-family: Calibri;
	font-size: 11pt;
	color: #CC0033;
}

.auto-style20 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
	font-size: medium;
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
	font-family: Calibri;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style28 {
	font-size: 11pt;
	font-weight: normal;
	font-family: Calibri;
}
.auto-style30 {
	font-family: Calibri;
	font-weight: normal;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style33 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
	text-decoration: underline;
}

.auto-style34 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Calibri;
	font-weight: 700;
	color: #CC3300;
	font-size: 11pt;
}

.auto-style35 {
	font-size: 11pt;
	font-family: Calibri;
	color: #CC0033;
}

.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}
.auto-style6 {
	
	font-family: Calibri;
	color: #CD222B;
}

.auto-style36 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style37 {
	font-family: Calibri;
}
.auto-style38 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
}

.style1 {
	border-style: solid;
	border-width: 1px;
}

</style>

</head>



<body>

<!--<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 33px">

	

	
	<tr>
		<td class="auto-style14">
		<span class="auto-style37">FNF</span><hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</table>
-->

	
	<!--<form name="frmFees" id="frmFees" method="post" action="FNF.php">
	<input type="hidden" name="Q1Fee" id="Q1Fee" value="<?php echo $Q1fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="Q2Fee" id="Q2Fee" value="<?php echo $Q2fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="Q3Fee" id="Q3Fee" value="<?php echo $Q3fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="Q4Fee" id="Q4Fee" value="<?php echo $Q4fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style37">-->
	
	
	<form method="post">

	<table border="1px" width="100%">
	
	
		<tr>
		
		<td style="width: 281px; height: 29px;" class="auto-style23">

		<span class="auto-style2">Employee ID No. </span>
		<span style="font-weight: 700; color: #CC3300" class="auto-style1">:</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style23">

		<input type="text" name="txtEmpID" size="15" style="color: #CC0033; width: 151px;" class="auto-style1" required /></td>

		<td style="width: 157px; height: 29px;" class="auto-style26">

           <input type="submit" name="FillDetail" value="Fill Detail" class="auto-style35" style="width:82px"; /></td>
	</tr>
	
		

			 
			 <?php 
		
			if(isset($_POST['FillDetail'])) 
			{
			 $ID=$_POST['txtEmpID'];
    
				$result1=mysql_query("SELECT * FROM   employee_master where EmpId=$ID");
									 
			 
			  $test1 = mysql_fetch_array($result1);
			 }
			 ?>
	
	<tr>
	
	    <td style="width: 281px; height: 52px;" class="auto-style23">

		 <span class="auto-style2">Employee Name</span><span class="auto-style1">
		 </span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

   <input type="text" name="txtName"  class="auto-style35" style="height: 22px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Name']; } ?>" readonly/>       </td>
	
		
		
		
	
		<td style="width: 157px; height: 52px;" class="auto-style41">&nbsp;

		</td>
	
		
		
		
	
		<td style="width: 179px; height: 52px;" class="auto-style38">

		Department</td>

		<td style="height: 52px;" class="auto-style23">

		<input name="txtDepartment" id="txtClass" type="text" class="auto-style18" style="width: 95px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Department']; } ?>" readonly/></td>
		
		
	
		<td style="width: 191px; height: 52px;" class="auto-style26">

		<span style="font-weight: 700; color: #CC3300" class="auto-style1">
		Cader</span><span class="auto-style1">
		</span>

		</td>
		
		<td style="height: 52px;" class="auto-style23">

		<input name="txtCader" id="txtCader" type="text" style="width: 100px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Cadre']; } ?>"  class="auto-style35" readonly/></td>
		<br class="auto-style1">
		</tr>
		
		
		</table>
		<br class="auto-style37">


	
	
	
<table class="style1" style="width: 1193px">

<tr>			
		

		<td class="auto-style12" colspan="2">

		<strong>Clearance Heads</strong></td>

			</tr>
		
<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<span style="font-style: normal; font-variant: normal; font-weight: bold; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
		<strong>Library Clearance</strong></span></td>


		<td class="auto-style22" style="height: 38px">

		<input name="ChkLibrary" id="ChkLibrary" type="checkbox" value="1"  required></td>

			</tr>
		
<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<span style="font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
		<strong>Account Clearance</strong></span></td>


		<td class="auto-style22" style="height: 38px">

		<input name="ChkAccount" id="ChkAccount" type="checkbox" value="1" required></td>

			</tr>
		
<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<span style="font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
		<strong>Academic Clearance</strong></span></td>


		<td style="width: 595px; height: 37px;" class="auto-style22">

		<input name="ChkAcademic" type="checkbox" value="1" style="width: 20px" required></td>

			</tr>
		

	<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		Transport</td>


		<td style="width: 595px; height: 37px;" class="auto-style22">

		<input name="ChkTransport" type="checkbox" value="1" required></td>

			</tr>
		


	<tr>

		<td colspan="2" class="auto-style5">

		<strong>

		<input name="BtnSubmit" type="button" value="Submit"  class="auto-style15"><span class="auto-style37">
		</span>
		</strong></td>

	</tr>

		

</table>

</form>
</body>



</html>