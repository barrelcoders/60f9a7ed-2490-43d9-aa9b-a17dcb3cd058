<?php
include '../Header/Header3.php';
include '../../connection.php';

?>
<?php
$InquiryNo=$_REQUEST["inqno"];


$ssqlF="select max(CAST(`FormNo` AS SIGNED INTEGER)) from `RegistrationFees`";

$rsF = mysql_query($ssqlF);
if (mysql_num_rows($rsF) > 0)
{
	while($row = mysql_fetch_row($rsF))
	{
		$FormNo=$row[0]+1;
		break;
	}
}
else
{
	$FormNo="1";
}

	$sql = "SELECT `InquiryFormNo` ,`Name` ,`FatherName`,`EmailId`,`sclass`,`smobile`,`Address`,`EntryDate`,`SchoolId`,`Stream` FROM `InquiryDetail` where `InquiryFormNo`='$InquiryNo'";
	$rs = mysql_query($sql);
	
		if (mysql_num_rows($rs) > 0)
		{
			while($row = mysql_fetch_row($rs))
				{
						$InquiryFormNo=$row[0];
						//$FormNo=$row[0];
						$Name=$row[1];
						$FatherName=$row[2];
						$EmailId=$row[3];
						$sclass=$row[4];
						$smobile=$row[5];
						$Address=$row[6];
						$EntryDate=$row[7];
						$SchoolId=$row[8];
						$Stream=$row[9];
				}
		}

$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
$rsClass = mysql_query("select distinct `MasterClass` from `class_master`");
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Registration Form Fees</title>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>


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

	if (document.getElementById("txtFormNo").value == "")
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
	/*
	if(document.getElementById("txtDateofExam").value=="")
	{
		alert("Date of Exam is mandatory!");
		return;
	}
	*/
	if (document.getElementById("txtAdmissionFees").value == "")
	{
		alert("Can not be sumitted without Registration Fee!");
		return;
	}
	if(document.getElementById("txtTotalAmtPaying").value=="")
	{
		alert("Please enter total paying amount!");
		return;
	}
	if(parseInt(document.getElementById("txtTotalAmtPaying").value) > parseInt(document.getElementById("txtTotal").value))
	{
		alert("Paid amount can not be more then payable amount!");
		return;
	}

	document.getElementById("frmRegistrationForm").submit();
	
}
</script>
<style type="text/css">
.style1 {
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

{

        height:20px; 

        width: 100%; 

        margin:auto;        

        background-color:Blue;

        font-family: Calibri;

        font-weight:bold;

}
.style2 {
	font-family: Cambria;
}
.auto-style3 {
	color: #000000;
}
</style>
</head>

<body>

		<p>&nbsp;</p>

		<p>&nbsp;</p>

		<table style="width: 100%; border-collapse:collapse" class="style14" cellpadding="0">



			<tr>



				<td class="auto-style49" colspan="5" style="height: 10px; background-color:#FFFFFF">







				<strong><font face="Cambria">New Registration Form Fees</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p></td>





			</tr>



			
<form name="frmRegistrationForm" id="frmRegistrationForm" method="post" action="RegistrationFormReceipt.php">

			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">







				&nbsp;</td>



				<td class="auto-style19" style="border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">















		&nbsp;</td>



				<td style="width: 202px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11">















				&nbsp;</td>



				<td style="border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium" width="228">







				&nbsp;</td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">







				&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px; border-top-style: none; border-top-width: medium">







				<font face="Cambria">Form No</font></td>



				<td class="auto-style19" style="border-top-style: none; border-top-width: medium">















		<input name="txtFormNo" id="txtFormNo" class="text-box" type="text" value="<?php echo $FormNo;?>" readonly="readonly"></td>
				<td style="width: 202px; border-top-style:none; border-top-width:medium" class="auto-style11">















				&nbsp;</td>



				<td style="border-top-style: none; border-top-width: medium" width="228">







				<font face="Cambria">School</font></td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium">







				<select name="cboSchool" class="text-box" id="cboSchool">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>" <?php if($SchoolId==$row[0]) {?>selected="selected" <?php } ?> ><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td class="auto-style19">















		&nbsp;</td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				&nbsp;</td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







				&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				<font face="Cambria">Name</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtStudentName" id="txtStudentName" type="text" class="text-box" value="<?php echo $Name;?>"></font></td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				<font face="Cambria">Admission For Class</font></td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboClass" id="cboClass"  class="text-box">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsClass))
				{
				?>
				<option value="<?php echo $row[0];?>" <?php if(strtoupper($sclass)==strtoupper($row[0])) { ?>selected="selected"<?php }?> ><?php echo $row[0];?></option>
				<?php
				}
				?>
		
			<option value="Test" <?php if($sclass=="Test") {?>selected="selected"<?php }?> >
			Test</option>
			</select>

		</span></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td class="auto-style19">















		&nbsp;</td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				&nbsp;</td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				<font face="Cambria">Father Name</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtFatherName" id="txtFatherName" type="text" class="text-box"  value="<?php echo $FatherName;?>"></font></td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				<font face="Cambria">Contact No.</font></td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







		<font face="Cambria">















		<input name="txtContactNo" id="txtContactNo" type="text" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" class="text-box"  size="100" value="<?php echo $smobile; ?>"></font></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td class="auto-style19">















		&nbsp;</td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				&nbsp;</td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				<font face="Cambria">Email Id</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtEmailId" id="txtEmailId" type="text" class="text-box"  value="<?php echo $EmailId;?>"></font></td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				<font face="Cambria">Address</font></td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







		<font face="Cambria">















		<input name="txtAddress" id="txtAddress" type="text" class="text-box-address"  value="<?php echo $Address; ?>"></font></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td class="auto-style19">















		&nbsp;</td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				&nbsp;</td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				<font face="Cambria">Date of Exam.</font></td>



				<td class="auto-style19">















		<input name="txtDateofExam" id="txtDateofExam" type="text" class="tcal"></td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228" class="style2">







				Time of exam</td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







				<select name="cboHr" id="cboHr" class="text-box">
				<option selected="" value="Hr.">Hr.</option>
				<?php 
				for ($Hr=7;$Hr<=17;$Hr++)
				{
				?>
				<option value="<?php echo $Hr; ?>"><?php echo $Hr; ?></option>
				<?php
				}
				?>
				</select><select name="cboMin" id="cboMin" class="text-box">
				<option selected="" value="Min">Min</option>
				<?php
				for ($Mi=0;$Mi<=60;$Mi++)
				{
				?>
				<option value="<?php echo $Mi; ?>"><?php echo $Mi; ?></option>
				<?php
				}
				?>
				
				</select></td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td class="auto-style19">















		&nbsp;</td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				&nbsp;</td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







		&nbsp;</td>



			</tr>



			


			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				<font face="Cambria">Registration fees Amount</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtAdmissionFees" id="txtAdmissionFees" type="text" class="text-box"  value="300"></font></td>



				<td style="width: 202px" class="auto-style11">















				&nbsp;</td>



				<td width="228">







				<font face="Cambria">Registration Fees Discount</font></td>



				<td class="auto-style11" style="border-right-style: solid; border-right-width: 1px">







		<font face="Cambria">















		<input name="txtRegistrationFeesDiscount" id="txtRegistrationFeesDiscount" type="text" class="text-box"  onkeyup="Javascript:CalculatTotal();" value="0"></font></td>



			</tr>



			



			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td style="width: 206px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 202px" class="auto-style11">







				&nbsp;</td>



				<td width="228">







				&nbsp;</td>


				<td class="auto-style40" style="border-right-style: solid; border-right-width: 1px">







				&nbsp;</td>



			</tr>



			



			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				<font face="Cambria">Total Fee Payable</font></td>



				<td style="width: 206px" class="auto-style11">







				<font face="Cambria">







				<input name="txtTotal" id="txtTotal" type="text" class="text-box" readonly="readonly"  value="300"></font></td>

				<td style="width: 202px" class="auto-style11">







				&nbsp;</td>



				<td width="228">







				<font face="Cambria">Total Fee Paid</font></td>


				<td class="auto-style40" style="border-right-style: solid; border-right-width: 1px">







				<font face="Cambria">







				<input name="txtTotalAmtPaying" id="txtTotalAmtPaying" class="text-box" type="text"></font></td>



			</tr>



		



			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td style="width: 206px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 202px" class="auto-style11">







				&nbsp;</td>



				<td width="228">







				&nbsp;</td>


				<td class="auto-style40" width="380" style="border-right-style: solid; border-right-width: 1px">







				&nbsp;</td>



			</tr>



		



			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				<font face="Cambria">Mode of Payment</font></td>



				<td style="width: 206px" class="auto-style11">







				<font face="Cambria">







		<select name="cboPaymentMode" id="cboPaymentMode"  class="text-box" onchange="Javascript:ChkPaymentMode();">

		<option selected="" value="Cash">Cash</option>



		</select></font></td>

				<td style="width: 202px" class="auto-style11">







				&nbsp;</td>



				<td width="228">







				Stream</td>


				<td class="auto-style40" width="380" style="border-right-style: solid; border-right-width: 1px">







				<input name="txtStream" id="txtStream" class="text-box" readonly="readonly" value="<?php echo $Stream;?>" type="text"></td>



			</tr>



			



			<tr>



				<td class="auto-style19" width="207" style="border-left-style: solid; border-left-width: 1px">







				&nbsp;</td>



				<td style="width: 206px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11">







		&nbsp;</td>

				<td style="width: 202px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11">







				&nbsp;</td>



				<td style="border-bottom-style: none; border-bottom-width: medium" width="228">







		&nbsp;</td>



				<td class="auto-style40" width="380" style="border-bottom-style: none; border-bottom-width: medium; border-right-style:solid; border-right-width:1px">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="style1" colspan="5" style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px">







			<input name="Button1" type="button" value="Submit" class="text-box" onclick="Javascript:Validate();" style="font-weight: 700"></td>



			</tr>



			<tr>



				<td class="style1" colspan="5" style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px">







			&nbsp;</td>



			</tr>
</form>


		</table>



<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

		</body>

</html>