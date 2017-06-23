<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
if(isset($_POST['submit']))
{
   $date=$_POST['date'];
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
   $Chequeamount=$_POST['txtChequeamount'];
   $FeesHeadType=$_POST['cboFeesHeadType'];
   $BounceAmount=$_POST['txtBounceAmount'];


   mysql_query("INSERT INTO fees_misc_collection (`date`,`HeadName`,`SubHead`,`Source`,`sadmissionno`,`sname`,`sclass`,`srollno`,`VendorName`,`VendorCompanyName`,`VendorAddress`,`VendorPhNo`,`ChequeNo`,`Chequedate`,`BankName`,`Amount`,`HeadType`,`ChequeBounceAmt`)VALUES('$date','$headname','$subhead','$source','$AdmissionNo','$StudentName','$Class','$RollNo','$VendorName','$VendorCompanyName','$VendorAddress','$VendorPhNo','$ChequeNo','$Chequedate','$bankname','$Chequeamount','$FeesHeadType','$BounceAmount')");
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
	if(document.getElementById("date").value != document.getElementById("txtcurrentDate").value)
	{
		alert("Please select current date!");
		return;
	}
	if(document.getElementById("headname").value=="")
	{
		alert("Head Name is mandatory!");
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
	if(document.getElementById("txtchequeamount").value=="")
	{
		alert("Cheque Amount is mandatory!");
		return;
	}
	document.getElementById("frmMisc").submit();
	
	if(document.getElementById("cboFeesHeadType").value=="")
	{
		alert("Fees Head Type is mandatory!");
		return;
	}
	document.getElementById("frmMisc").submit();

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
			        	addOption(document.frmMisc.cboSubHead,"Select One","")
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Misc Collection</title>
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
<form name="frmMisc" id="frmMisc" method="post" action="DPSReceipt.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<input type="hidden" name="txtcurrentDate" id="txtcurrentDate" value="<?php echo $currentdate; ?>">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font face="Cambria">Fees Miscellaneous Collection</font><font size="3" face="Cambria"></p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></b></td>
  </tr>
</table> 
&nbsp;<table class="name" width="100%" style="border-collapse: collapse"> 
  <tr>
    <td align="left" width="220"><b><font face="Cambria">Date:</font></b></td>
    <td width="221" ><font face="Cambria">
	<input name="date" id="date" type="date" style="float: left" class="text-box" /></font></td>
    <td width="221" ><b><font face="Cambria">Head Name:</font></b></td>
    <td width="221" ><font face="Cambria">
	 <select name="headname" id="headname" style="float: left" ; required onchange="Javascript:GetSubHead();" class="text-box">
						 <option selected="" value="">Select One</option>
						 <?php
							//$ssqlName="SELECT distinct `HeadName` FROM `fees_misc_head`";
							$ssqlName="SELECT distinct `HeadName` FROM `fees_misc_head` union SELECT distinct `HeadName` FROM `fees_misc_announce`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
    <td width="221" >
	<b>
	<font face="Cambria">Sub-Head</font></b></td>
    <td width="221" >
	<font face="Cambria">
	 <select name="cboSubHead" id="cboSubHead" style="float: left" class="text-box"	>
						 <option selected="" value="">Select One</option>						 
			</select></font></td>
    <td width="221" >
	<b><font face="Cambria">Source</font></b></td>
    <td width="221" >
    <select size="1" name="cboSource" id="cboSource" onchange="javascript:fnlCheckSource();" class="text-box">
	<option selected value="Student">Student</option>
	<option value="Vendor">Vendor</option>
	</select></td>
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
    <td align="left" width="220"><b><font face="Cambria">Cheque No</font></b></td>
    <td><font face="Cambria">
	<input name="txtChequeNo" id="txtChequeNo" style="float: left" class="text-box" /></font></td>
    <td><b><font face="Cambria">Cheque Date:</font></b></td>
    <td><font face="Cambria">
	<input name="txtChequedate" id="Chequedate" style="float: left" type="date" class="text-box" /></font></td>
    <td>
	<b>
	<font face="Cambria">
	Bank Name:</font></b></td>
    <td>
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
    <td>
	<b>
	<font face="Cambria">Cheque Amount:</font></b></td>
    <td width="221"><font face="Cambria">
	<input name="txtchequeamount" id="txtchequeamount" style="float: left" class="text-box" /></font></td>
	</tr>
	<tr>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	</tr>
	<tr>
	<td align="left">Bounce Amount</td>
	<td align="left"><font face="Cambria">
	<input name="txtBounceAmount" id="txtBounceAmount" style="float: left" class="text-box" /></font></td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	<td align="left">&nbsp;</td>
	</tr>
	<tr>
	<td align="left" colspan="8">&nbsp;</td>
	</tr>
	<tr>
	<td align="left" colspan="8">
	<p align="center"><font face="Cambria">
	<!--<input name="submit" type="submit" value="Submit" class="theButton" >-->
	<input name="btnSubmit" type="button" value="Submit" onclick="javascript:Validate();" class="text-box">
	</font></td>
  </tr>
</table>
</form>
<font face="Cambria"><br>

</font>
<!--<div align="center">
<table class="CSSTableGenerator" cellpadding="0" style="border-collapse: collapse" width="100%">
   <tr>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Date</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Head Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Sub-Head</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Source</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Admission No</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Student Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Class</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Roll No</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Vendor Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		VendorCompanyName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		VendorAddress</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		VendorPhNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		ChequeNo</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		Chequedate</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		BankName</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px"><b><font face="Cambria">
		ChequeAmount</font></b></td>
		
		
   	</tr>
<?php
$result=mysql_query("select * from fees_misc_collection");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["date"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["HeadName"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["SubHead"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Source"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["sadmissionno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["sname"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["sclass"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["srollno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["VendorName"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["VendorCompanyName"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["VendorAddress"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["VendorPhNo"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ChequeNo"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Chequedate"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["BankName"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ChequeAmount"]; ?></font></td>
	
	
</tr>
<?php   	 
}
?>

</table>

<p>&nbsp;</div>
-->
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>