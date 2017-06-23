<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

$sql = "SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
   $rsFy = mysql_query($sql, $Con);
   while($row = mysql_fetch_row($rsFy))
		{
			$CurrentFinancialYr=$row[0];
			break;
		}
if($_REQUEST["isSubmit"]=="yes")
{
   $Entrydate=$_POST['txtdate'];
   $headname=$_POST['headname'];
   $subhead=$_POST['cboSubHead'];
   $source=$_POST['cboSource'];
   $AdmissionNo=$_POST['txtAdmnissionNo'];
   $StudentName=$_POST['txtStudentName'];
   $Class=$_POST['txtClass'];
   $RollNo=$_POST['txtRollNo'];
   $VendorName=$_POST['txtVendorName'];
   $VendorCompanyName=$_POST['txtVendorCompanyName'];
   $VendorAddress=$_POST['txtVendorAddress'];
   $VendorPhNo=$_POST['txtVendorPhNo'];
   $ChequeNo=$_POST['txtChequeNo'];
   $Chequedate=$_POST['txtChequedate'];
   $bankname=$_POST['txtbankname'];
   $Chequeamount=$_POST['txtchequeamount'];
   $FeesHeadType=$_POST['cboFeesHeadType'];
   $FeesRefundAmount=$_POST['txtRefundAmount'];
   $FeesRefundRemark=$_POST['txtRefundRemark'];
   $FeesHead=$_POST['cboFeeHead'];
   $ReceiptNo=$_POST['txtReceiptNo'];
//echo "INSERT INTO `fees_refund_payment`(`Entrydate`, `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`, `Chequedate`, `BankName`, `Amount`, `PaymentMode`, `RefundAmount`, `Remarks`,`HeadType`,`Feeshead`,`ReceiptNo`)VALUES('$Entrydate','$source','$AdmissionNo','$StudentName','$Class','$RollNo','$VendorName','$VendorCompanyName','$VendorAddress','$VendorPhNo','$ChequeNo','$Chequedate','$bankname','$Chequeamount','$PaymentMode','$FeesRefundAmount','$FeesRefundRemark','$FeesHeadType','$FeesHead','$ReceiptNo')";
//echo "UPDATE `fees` set `refundamount`='$FeesRefundAmount',`refunddate`='$Entrydate' where `receipt`='$ReceiptNo' and `FinancialYear`='$CurrentFinancialYr'";
//echo "UPDATE `fees_student1` set `RefundAmount`='$FeesRefundAmount',`RefundDate`='$Entrydate' where `feeshead`='$FeesHead' and `financialyear`='$CurrentFinancialYr'";

   mysql_query("INSERT INTO `fees_refund_payment`(`Entrydate`, `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`, `Chequedate`, `BankName`, `Amount`, `PaymentMode`, `RefundAmount`, `Remarks`,`HeadType`,`Feeshead`,`ReceiptNo`)VALUES('$Entrydate','$source','$AdmissionNo','$StudentName','$Class','$RollNo','$VendorName','$VendorCompanyName','$VendorAddress','$VendorPhNo','$ChequeNo','$Chequedate','$bankname','$Chequeamount','$PaymentMode','$FeesRefundAmount','$FeesRefundRemark','$FeesHeadType','$FeesHead','$ReceiptNo')");
  mysql_query("UPDATE `fees` set `refundamount`='$FeesRefundAmount',`refunddate`='$Entrydate' where `receipt`='$ReceiptNo' and `FinancialYear`='$CurrentFinancialYr'");
  mysql_query("UPDATE `fees_student1` set `RefundAmount`='$FeesRefundAmount',`RefundDate`='$Entrydate' where `feeshead`='$FeesHead' and `financialyear`='$CurrentFinancialYr' and `sadmission`='$AdmissionNo'");

}

$currentdate= Date("Y-m-d");
$ssql="select distinct `bank_name` from `bank_master` where status='1' order by `bank_name`";
$rsBank	= mysql_query($ssql);
?>


<script language="javascript" type="text/javascript">
function sname()
{
	
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	itm.onreadystatechange=function()
		      {
			      if(itm.readyState==4)
			        {
						var rows="";
			        	rows=new String(itm.responseText);

			        	arr_row=rows.split(",");
			        	document.getElementById('txtStudentName').value=arr_row[0];
						document.getElementById('txtClass').value=arr_row[1];       	 
						document.getElementById('txtRollNo').value=arr_row[2];
					      	 
			        }
		      }
			
			var submiturl="get_info1.php?c=" + document.getElementById('adm').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}


function srollno()
{
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	var adm = document.getElementById('adm').value;

	var string = "?adm=" + adm;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('roll').value=itm.responseText;
		}
	}	
}
function sclass()
{
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	var clas = document.getElementById('adm').value;

	var string = "?clas=" + clas;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('clas').value=itm.responseText;
		}
	}
}

function Validate()
{
	//alert(document.getElementById("txtdate").value);
	//alert(document.getElementById("txtcurrentDate").value);
	//alert(document.getElementById("txtcurrentDate").value);
	
	if(document.getElementById("txtdate").value != document.getElementById("txtcurrentDate").value)
	{
		alert("Please select current date!");
		return;
	}
	

	if(document.getElementById("txtChequeNo").value=="")
	{
		alert("Cheque No is mandatory!");
		return;
	}
	
	if(document.getElementById("Chequedate").value=="")
	{
		alert("Cheque Date is mandatory!");
		return;
	}
	
	if(document.getElementById("txtbankname").value=="")
	{
		alert("Bank Name is mandatory!");
		return;
	}
	
	if(document.getElementById("cboFeeHead").value=="")
	{
		alert("Head Name is mandatory!");
		return;
	}
	
	document.getElementById("frmRefund").submit();
	

}

</script>



<script language="javascript">
function GetSubHead()
	{
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
						var SubHead="";
			        	rows=new String(xmlHttp.responseText);
			        	//removeAllOptions(document.frmGroupSMS.lstSelectedGroupMember);
			        	removeAllOptions(document.frmMisc.cboSubHead);
			        	arr_row=rows.split(",");
			        	addOption(document.frmMisc.cboSubHead,"Select One","Select One")
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        		SubHead=arr_row[row_count];
			        			addOption(document.frmMisc.cboSubHead,SubHead,SubHead)			        			 			        			 
			        	}													
			        }
		      }
			var submiturl="GetSubHead.php?HeadName=" + document.getElementById("headname").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);			
}
function removeAllOptions(selectbox)
	{
		var i;
		for(i=selectbox.options.length-1;i>=0;i--)
		{
			selectbox.remove(i);
		}
	}
	function removeOption(selectbox,indx)
	{
		var i;
		i=indx;
			selectbox.remove(i);
	}
	function addOption(selectbox,text,value )
	{
		var optn = document.createElement("OPTION");
		optn.text = text;
		optn.value = value;
		selectbox.options.add(optn);
	}
	function fnlCheckSource()
	{
		if(document.getElementById("cboSource").value=="Student")
		{
			document.getElementById("trStudent").style.display ="";
			document.getElementById("trVendor").style.display ="none";
		}
		else
		{
			document.getElementById("trStudent").style.display ="none";
			document.getElementById("trVendor").style.display ="";
		}
	}
</script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Refund Payment</title>
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
<form name="frmRefund" id="frmRefund" method="post" action="">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<input type="hidden" name="txtcurrentDate" id="txtcurrentDate" value="<?php echo $currentdate; ?>">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font face="Cambria">Fees Refund Payment</font><font size="3" face="Cambria"></p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></b></td>
  </tr>
</table> 
&nbsp;<table class="name" width="100%" style="border-collapse: collapse"> 
  <tr>
    <td align="left" width="220"><b><font face="Cambria">Date:</font></b></td>
    <td width="221" ><font face="Cambria">
	<input name="txtdate" id="txtdate" type="date" style="float: left" class="text-box" /></font></td>
    <td width="221" >
	<b><font face="Cambria">Source</font></b></td>
    <td width="221" >
    <select size="1" name="cboSource" id="cboSource" onchange="javascript:fnlCheckSource();" class="text-box">
	<option selected value="Student">Student</option>
	<option value="Vendor">Vendor</option>
	</select></td>
    <td width="221" >
	<b><font face="Cambria">Receipt No</font></b></td>
    <td width="221" >
	<input type="text" name="txtReceiptNo" id="txtReceiptNo" class="text-box" size="20"></td>
    <td width="221" >
	&nbsp;</td>
    <td width="221" >
    &nbsp;</td>
  </tr>
  <tr>
    <td align="left" width="220">&nbsp;</td>
    <td  colspan="7"></td>
  </tr>
  
    <tr id="trStudent">
    <td align="left" width="220"><b><font face="Cambria">Admission No</font></b></td>
    <td><input type="text" name="txtAdmnissionNo"  id="adm" onkeyup="javascript:sname();"  class="text-box" size="20"></td>
    <td><b><font face="Cambria">Name</font></b></td>
    <td><input type="text" name="txtStudentName" id="txtStudentName" class="text-box" size="20"></td>
    <td>
	<b><font face="Cambria">Class</font></b></td>
    <td>
	<input type="text" name="txtClass" id="txtClass" class="text-box"  size="20"></td>
    <td>
	<b><font face="Cambria">Roll No.</font></b></td>
    <td width="221"><input type="text"  class="text-box" name="txtRollNo" id="txtRollNo" size="20"></td>
	</tr>
	
    <tr>
    <td align="left" width="220">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	&nbsp;</td>
    <td>
	&nbsp;</td>
    <td>
	&nbsp;</td>
    <td width="221">&nbsp;</td>
	</tr>
    <tr id="trVendor" style="display: none;">
    <td align="left" width="220"><b><font face="Cambria">Vendor Name</font></b></td>
    <td><input type="text" name="txtVendorName" id="txtVendorName" class="text-box" size="20"></td>
    <td><b><font face="Cambria">Company Name</font></b></td>
    <td><input type="text" name="txtVendorCompanyName" id="txtVendorCompanyName" class="text-box" size="20"></td>
    <td>
	<b><font face="Cambria">Address</font></b></td>
    <td>
	<input type="text" name="txtVendorAddress" id="txtVendorAddress" class="text-box"  size="20"></td>
    <td>
	<b><font face="Cambria">Phone No</font></b></td>
    <td width="221"><input type="text"  class="text-box" name="txtVendorPhNo" id="txtVendorPhNo" size="20"></td>
	</tr>
    <tr>
    <td align="left" width="220">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	&nbsp;</td>
    <td>
	&nbsp;</td>
    <td>
	&nbsp;</td>
    <td width="221">&nbsp;</td>
	</tr>
    <tr>
    <td align="left" width="220" height="25"><b><font face="Cambria">Cheque No</font></b></td>
    <td height="25"><font face="Cambria">
	<input name="txtChequeNo" id="txtChequeNo" style="float: left" class="text-box" /></font></td>
    <td height="25"><b><font face="Cambria">Cheque Date:</font></b></td>
    <td height="25"><font face="Cambria">
	<input name="txtChequedate" id="Chequedate" style="float: left" type="date" class="text-box" /></font></td>
    <td height="25">
	<b>
	<font face="Cambria">
	Bank Name:</font></b></td>
    <td height="25">
	<font face="Cambria">
	<!--<input name="txtbankname" id="bankname" style="float: left" class="text-box" />-->
	<select name="txtbankname" id="txtbankname" class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select>
	</font></td>
    <td height="25">
	<b><font face="Cambria">Refund Head Name:</font></b></td>
    <td width="221" height="25">
	<font face="Cambria">
	<select name="cboFeeHead" id="cboFeeHead" class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		$ssql="select distinct `feeshead` from `fees_student1` where `feeshead` IN ('PROVISIONAL AMOUNT','Advances','FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT','FEES FOURTH INSTALLMENT')";
        $rsFeeHead	= mysql_query($ssql);

		while($row = mysql_fetch_row($rsFeeHead))
		{
			$FeeHead=$row[0];
		?>						
		<option value="<?php echo $FeeHead;?>"><?php echo $FeeHead;?></option>
		<?php
		}
		?>
		</select></font></td>
	</tr>
	<tr>
	<td align="left" colspan="8">&nbsp;</td>
	</tr>
	<tr>
	<td align="left" colspan="2"><font face="Cambria"><b>&nbsp;Refund Amount</b></font></td>
	<td align="left" colspan="2"><font face="Cambria">
	<input name="txtRefundAmount" id="txtRefundAmount" style="float: left" class="text-box" /></font></td>
	<td align="left" colspan="2">		

	

				<b><font face="Cambria">Remarks</font></b></td>
	<td align="left" colspan="2">

<textarea rows="2" name="txtRefundRemark" id="txtRefundRemark" cols="20"></textarea></td>
	</tr>
	<tr>
	<td align="left" colspan="8">
	&nbsp;</td>
  </tr>
	<tr>
	<td align="left" colspan="8">
	<p align="center"><font face="Cambria">
	<!---<input name="submit" type="submit" value="Submit" class="theButton" >--->
	</font>

		<strong>

		<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate();" class="text-box"></strong><font face="Cambria">
	</font></td>
  </tr>
</table>
</form>
<font face="Cambria"><br>

</font>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>