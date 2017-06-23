<?php
session_start();
include '../../connection.php'; 
?>
<?php
$InqFormNo=$_REQUEST["InqFormNo"];

	$sql = "SELECT `InquiryFormNo` ,`Name` ,`FatherName`,DATE_FORMAT(`DateOfBirth`,'%m/%d/%Y') as `DateOfBirth`,`EmailId`,`sclass`,`smobile`,`Address`,`SchoolId` FROM `InquiryDetail` WHERE `InquiryFormNo`='$InqFormNo'";
	$rs = mysql_query($sql);
	
		if (mysql_num_rows($rs) > 0)
		{
			while($row1 = mysql_fetch_row($rs))
				{
					//$InqNo="IF" .(string)$row1[0];						
					$InquiryFormNo=$row1[0];
					$Name=$row1[1];
					$FatherName=$row1[2];
					$DateOfBirth=$row1[3];
					$EmailId=$row1[4];
					$sclass=$row1[5];
					$smobile=$row1[6];
					$Address=$row1[7];
					$SchoolId=$row1[8];
					
				}
		}
	
	$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
	$rsClass = mysql_query("select distinct `MasterClass` from `class_master`");
		
	
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Sell New Inquiry Form</title>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />


	<script type="text/javascript" src="tcal.js"></script>



<style type="text/css">


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

        font-family: Calibri;

        font-weight:bold;

</style>

<script language="JavaScript">
<!--
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
// -->
</script>
<script language="javascript">
function GetFeeDetail()
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
						var AdmissionFee=0;
						var SecFee=0;
			        	rows=new String(xmlHttp.responseText);
			        	
			        	document.getElementById("txtAdmissionFees").value=rows;
			        	CalculatTotal();
			        	//alert(rows);														
			        }
		      }

			var submiturl="GetRegistrationFeeDetail.php?Class=" + document.getElementById("cboClass").value  + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}
function CalculatTotal()
{
	var Total=0;
	var RegistrationFee=0;
	var PayableAmount=0;
	var Discount=0;
	
	
	if(isNaN(document.getElementById("txtAdmissionFees").value)=="true" || document.getElementById("txtAdmissionFees").value=="")
	{
		RegistrationFee=0
	}
	else
	{
		RegistrationFee=document.getElementById("txtAdmissionFees").value;
	}
	
	if(isNaN(document.getElementById("txtRegistrationFeesDiscount").value)=="true" || document.getElementById("txtRegistrationFeesDiscount").value=="")
	{
		Discount=0
	}
	else
	{
		if(parseInt(document.getElementById("txtRegistrationFeesDiscount").value) > parseInt(document.getElementById("txtAdmissionFees").value))
		{
			document.getElementById("txtRegistrationFeesDiscount").value=0;
			alert("Discount can not be more then payable amount!");
			CalculatTotal();
			return;
		}
		Discount=document.getElementById("txtRegistrationFeesDiscount").value;
	}
	PayableAmount=RegistrationFee-Discount;
	document.getElementById("txtTotal").value=PayableAmount;
	document.getElementById("txtTotalAmtPaying").value=PayableAmount;
	
}
function Validate()
{

	if (document.getElementById("txtInquiryFormNo").value == "")
	{
		alert ("Form no is mandatory!");
		return;
	}
	
	if (document.getElementById("txtStudentName").value == "")
	{
		alert("Student Name is mandatory!");
		return;
	}
	if (document.getElementById("cboClass").value == "Select One")
	{
		alert("Select Class!");
		return;
	}
	if (document.getElementById("txtFatherName").value == "")
	{
		alert("Father's name is mandatory!");
		return;
	}
	if (document.getElementById("txtContactNo").value == "")
	{
		alert("Cotact no is mandatory!");
		return;
	}
	document.getElementById("frmInquiryForm").submit();
	
}
</script>
<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	color: #CC1826;
}
.style7 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style8 {
	border-style: none;
	border-width: medium;
}
.style9 {
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style10 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style11 {
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style12 {
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style13 {
	border-style: solid;
	border-width: 1px;
	border-collapse: collapse;
}
</style>
</head>

<body onunload="window.opener.location.reload();">







		<p>&nbsp;</p>







		<table style="width: 100%; " class="style13" cellpadding="0">



			<tr>



				<td class="auto-style49" colspan="5" style="height: 10px; background-color:#FFFFFF; border-left-color:#C0C0C0; border-left-width:1px; border-right-color:#808080; border-right-width:1px; border-top-color:#C0C0C0; border-top-width:1px">







				<strong><font face="Cambria">New Inquiry Form</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

				<p class="style1">
				<span class="style2"><strong><?php echo $Message;?></strong></span>
				</td>
			</tr>



			
<form name="frmInquiryForm" id="frmInquiryForm" method="post" action="SubmitEditInquiryForm.php">
<input type="hidden" name="isSubmit" value="yes">


			<tr>



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



				<td class="auto-style19" width="14%" style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">















		&nbsp;</td>



				<td style="width: 15%; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<font face="Cambria">Inquiry Form No</font></td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















		<input name="txtInquiryFormNo" id="txtInquiryFormNo" type="text" class="text-box" readonly="readonly" value="<?php echo $InquiryFormNo;?>"></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">School</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<select name="cboSchool" class="text-box">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>" <?php if($row[0]==$SchoolId) { ?>selected="selected"<?php }?> ><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















		&nbsp;</td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				&nbsp;</td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<font face="Cambria">Name</font></td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















		<font face="Cambria">















		<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"" value="<?php echo $Name;?>"></font></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">Admission Sought For Class</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
	<select name="cboClass" id="cboClass" class="text-box">
		<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsClass))
				{
				?>
				<option  value="<?php echo $row[0];?>" <?php if(strtoupper($sclass)==strtoupper($row[0])) { ?>selected="selected"<?php }?> ><?php echo $row[0];?></option>
				<?php
				}
				?>
		
		<option value="Test" <?php if($sclass=="Test") {?>selected="selected"<?php }?> >Test</option>

		</select>
		
		</span></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















		&nbsp;</td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				&nbsp;</td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<font face="Cambria">Father Name</font></td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















		<font face="Cambria">















		<input name="txtFatherName" id="txtFatherName" type="text" class="text-box" value="<?php echo $FatherName;?>"></font></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">Date of birth</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







		<input name="txtDOB" id="txtDOB" type="text" class="tcal" class="text-box" value="<?php echo $DateOfBirth;?>"></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















		&nbsp;</td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				&nbsp;</td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="style7" width="20%">







				<font face="Cambria">Contact No.</font></td>



				<td class="style8" width="14%">















		<font face="Cambria">















		<input name="txtContactNo" id="txtContactNo" type="text" class="text-box" value="<?php echo $smobile;?>"></font></td>



				<td style="width: 15%; " class="style8">















				&nbsp;</td>



				<td width="20%" class="style8">







				&nbsp;</td>



				<td class="style9" width="30%">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="style7" width="20%">







				&nbsp;</td>



				<td class="style8" width="14%">















		&nbsp;</td>



				<td style="width: 15%; " class="style8">















				&nbsp;</td>



				<td width="20%" class="style8">







				&nbsp;</td>



				<td class="style9" width="30%">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="style10" width="20%">







				<font face="Cambria">Email Id</font></td>



				<td class="style11" width="14%">















		<font face="Cambria">















		<input name="txtEmailId" id="txtEmailId" type="text" class="text-box" value="<?php echo $EmailId;?>"></font></td>



				<td style="width: 15%; " class="style11">















				&nbsp;</td>



				<td width="20%" class="style11">







				<font face="Cambria">Address:</font></td>



				<td class="style12" width="30%">







		<font face="Cambria">















		<input name="txtAddress" id="txtAddress" type="text" class="text-box" value="<?php echo $Address;?>"></font></td>



			</tr>



			


			<tr>



				<td class="style1" colspan="5" style="width: 100%; border-left-color:#C0C0C0; border-left-width:1px; border-right-color:#808080; border-right-width:1px; border-bottom-color:#808080; border-bottom-width:1px">
			<input name="Button1" type="button" value="Submit" class="text-box" onclick="Javascript:Validate();" style="font-weight: 700"></td>
			</tr>
</form>


		</table>
<br>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

		</body>

</html>