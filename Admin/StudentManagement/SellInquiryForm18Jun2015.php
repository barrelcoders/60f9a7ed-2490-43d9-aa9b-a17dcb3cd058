<?php

session_start();

include '../../connection.php'; 

include '../Header/Header3.php';

?>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$InquiryFormNo=$_REQUEST["txtInquiryFormNo"];
	$StudentName=$_REQUEST["txtStudentName"];
	$FatherName=$_REQUEST["txtFatherName"];
	$EmailId=$_REQUEST["txtEmailId"];
	$Class=$_REQUEST["cboClass"];
	$ContactNo=$_REQUEST["txtContactNo"];
	$Address=$_REQUEST["txtAddress"];
	$Stream=$_REQUEST["cboStream"];
	$ShoolId=$_REQUEST["cboSchool"];
	//$DOB=$_REQUEST["txtDate"];
	
	$Dt = $_REQUEST["txtDOB"];
	$arr=explode('/',$Dt);
	$DOB = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$currentdate=date("Y-m-d");

	$ssql="INSERT INTO `InquiryDetail` (`InquiryFormNo` ,`Name` ,`FatherName`,`DateOfBirth`,`EmailId`,`sclass`,`smobile`,`Address`,`Stream`,`EntryDate`,`SchoolId`) VALUES	('$InquiryFormNo','$StudentName','$FatherName','$DOB','$EmailId','$Class','$ContactNo','$Address','$Stream','$currentdate','$ShoolId')";
	//echo $ssql;
	//exit();
	mysql_query($ssql) or die(mysql_error());
	$Message="Your Inquiry form no:".$InquiryFormNo." has been submitted!";
}

	$sql = "SELECT `InquiryFormNo` ,`Name` ,`FatherName`,DATE_FORMAT(`DateOfBirth`,'%d-%m-%Y') as `DateOfBirth`,`EmailId`,`sclass`,`smobile`,`Address`,`EntryDate`,`Stream`,`SchoolId` FROM `InquiryDetail` order by CAST(`InquiryFormNo` AS SIGNED INTEGER) desc";
	$rs = mysql_query($sql);
	
	//$sqlInq = "SELECT MAX(`InquiryFormNo`) as `srno` FROM  `InquiryDetail`";
	$sqlInq = "SELECT MAX(CAST(`InquiryFormNo` AS SIGNED INTEGER)) as `srno` FROM  `InquiryDetail`";
	
	$rsInq = mysql_query($sqlInq);
		if (mysql_num_rows($rsInq) > 0)
		{
			while($row1 = mysql_fetch_row($rsInq))
				{
					//$InqNo="IF" .(string)$row1[0];						
					$InqNo=$row1[0]+1;						
				}
		}
		else
		{
			$InqNo="1";
		}
		$sqlInq = "SELECT MAX(CAST(`InquiryFormNo` AS SIGNED INTEGER)) as `srno` FROM  `InquiryDetail`";
	
	$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
	$rsClass = mysql_query("select distinct `MasterClass` from `class_master`");
	
	
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Sell Registration Form</title>
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
	if(document.getElementById("cboSchool").value=="Select One")
	{
		alert("Shool Id is mandatory!");
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
	if (document.getElementById("cboClass").value == "11" || document.getElementById("cboClass").value == "12")
	{
		if (document.getElementById("cboStream").value=="")
		{
			alert("Strem is mandatory for Class 11 and 12!");
			return;
		}
	}
	else
	{
		if (document.getElementById("cboStream").value !="")
		{
			alert("Strem is mandatory for Class 11 and 12!");
			return;
		}
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
function ShowEdit(InquiryFormNo)
{
	var myWindow = window.open("EditSellInquiryForm.php?InqFormNo=" + InquiryFormNo,"","width=1000,height=1000");
}
</script>

<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	color: #CC1826;
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
	border-collapse: collapse;
}
</style>
</head>

<body>







		<p>&nbsp;</p>







		<table style="width: 100%; " class="style13" cellpadding="0" border="1">



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



			
<form name="frmInquiryForm" id="frmInquiryForm" method="post" action="SellInquiryForm.php">
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















		<input name="txtInquiryFormNo" id="txtInquiryFormNo" type="text" readonly="readonly" value="<?php echo $InqNo;?>" class="text-box"></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">School</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
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















		<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"></font></td>



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
				<option  value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
		
		<option value="Test">Test</option>

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















		<input name="txtFatherName" id="txtFatherName" type="text" class="text-box"></font></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">Date of birth</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







		<input name="txtDOB" id="txtDOB" type="text" class="tcal" class="text-box"></td>



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















		<input name="txtContactNo" id="txtContactNo" type="text"  onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" class="text-box"></font></td>



				<td style="width: 15%; " class="style8">















				&nbsp;</td>



				<td width="20%" class="style8">







				Stream</td>



				<td class="style9" width="30%">







		<select name="cboStream" id="cboStream" class="text-box">
		<option selected="" value="">Select One</option>
		<option value="Medical">Medical</option>
		<option value="Non Medical">Non Medical</option>
		<option value="Commerce">Commerce</option>
		</select>
		</td>



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















		<input name="txtEmailId" id="txtEmailId" type="text" class="text-box"></font></td>



				<td style="width: 15%; " class="style11">















				&nbsp;</td>



				<td width="20%" class="style11">







				<font face="Cambria">Address:</font></td>



				<td class="style12" width="30%">







		<font face="Cambria">















		<input name="txtAddress" id="txtAddress" type="text" class="text-box-address"></font></td>



			</tr>



			


			<tr>



				<td class="style1" colspan="5" style="width: 35px; border-left-color:#C0C0C0; border-left-width:1px; border-right-color:#808080; border-right-width:1px; border-bottom-color:#808080; border-bottom-width:1px">







			<input name="Button1" type="button" value="Submit" class="text-box" onclick="Javascript:Validate();"></td>



				



			</tr>
</form>


		</table>
<br>
		<?php
		if (mysql_num_rows($rs) > 0)
		{

		?>
		<table style="width: 100%" class="CSSTableGenerator">
			<tr>
				<td class="style5" style="width: 81px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Sr. No.</font></strong></td>
				<td class="style5" style="width: 143px" bgcolor="#95C23D">
				<strong>
				<font face="Cambria">School</font></strong></td>
				<td class="style5" style="width: 143px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Inquiry Form#</font></strong></td>
				<td class="style5" style="width: 148px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Name</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Father Name</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D">
				<strong>
				<font face="Cambria">Date of birth</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Email</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Class</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Mobile</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Address</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D">
				<strong>
				<font face="Cambria">Stream</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Entry Date</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Sell Reg. Form</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D">
				<strong>
				<font face="Cambria">Edit</font></strong></td>
			</tr>
			<?php
				$rownum=1;
				while($row = mysql_fetch_row($rs))
				{
						$InquiryFormNo=$row[0];
						$Name=$row[1];
						$FatherName=$row[2];
						$DatOfBirth=$row[3];
						$EmailId=$row[4];
						$sclass=$row[5];
						$smobile=$row[6];
						$Address=$row[7];
						$EntryDate=$row[8];
						$Stream=$row[9];
						$SchoolId=$row[10];
						
						$ssql="select * from `RegistrationFees` where `FormNo`='$InquiryFormNo'";
						$rsChk = mysql_query($ssql);
						$ShowRec="yes";
						if (mysql_num_rows($rsChk) > 0)
						{
							$ShowRec="no";
						}
						
			?>
			<tr>
				<td class="style5" style="width: 81px; text-align:left"><font face="Cambria"><?php echo $rownum;?>.</font></td>
		<td class="style5" style="width: 143px; text-align:left"><?php echo $SchoolId;?></td>
		<td class="style5" style="width: 143px; text-align:left"><font face="Cambria"><?php echo $InquiryFormNo;?></font></td>
		<td class="style5" style="width: 148px; text-align:left"><font face="Cambria"><?php echo $Name;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $FatherName;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $DatOfBirth;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $EmailId;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $sclass;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $smobile;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $Address;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $Stream;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $EntryDate;?></font></td>
		<td class="style5" style="width: 111px; text-align:left">
		<?php
			if($ShowRec=="yes")
			{
		?>
		<a href="SellRegistrationForm.php?inqno=<?php echo $InquiryFormNo;?>" >Sell Reg. Form</a>
		<?php
		}
		?>
		</td>
		<td class="style5" style="width: 111px; ">
		<a href="Javascript:ShowEdit(<?php echo $InquiryFormNo;?>);">Edit</a></td>
	</tr>
		<?php
			$rownum=$rownum+1;
			}//End of while loop
		?>
</table>
		<font face="Cambria">
<?php
	}
?>



		</font>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>

		</body>

</html>