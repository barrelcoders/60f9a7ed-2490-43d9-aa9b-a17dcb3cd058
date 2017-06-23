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
	$currentdate=date("Y-m-d");

	$ssql="INSERT INTO `InquiryDetail` (`InquiryFormNo` ,`Name` ,`FatherName`,`EmailId`,`sclass`,`smobile`,`Address`,`EntryDate`) VALUES	('$InquiryFormNo','$StudentName','$FatherName','$EmailId','$Class','$ContactNo','$Address','$currentdate')";
	mysql_query($ssql) or die(mysql_error());
	$Message="Your Inquiry form has been submitted!";
}

	$sql = "SELECT `InquiryFormNo` ,`Name` ,`FatherName`,`EmailId`,`sclass`,`smobile`,`Address`,`EntryDate` FROM `InquiryDetail` order by `EntryDate` desc";
	$rs = mysql_query($sql);
	
	$sqlInq = "SELECT MAX(`srno`) as `srno` FROM  `InquiryDetail`";
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
	
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>List Of Enquiries</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

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
</style>
</head>

<body>







		<p>&nbsp;</p>







		<table style="width: 100%; border-collapse:collapse" class="style14" cellpadding="0" border="1">



			<tr>



				<td class="auto-style49" colspan="5" style="height: 10px; background-color:#FFFFFF; border-left-color:#C0C0C0; border-left-width:1px; border-right-color:#808080; border-right-width:1px; border-top-color:#C0C0C0; border-top-width:1px">







				<strong><font face="Cambria">List Of Enquiries</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

				<p>&nbsp;</td>





			</tr>

<!--

			
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















		<input name="txtInquiryFormNo" id="txtInquiryFormNo" type="text" readonly="readonly" value="<?php echo $InqNo;?>"></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				&nbsp;</td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;</td>



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















		<input name="txtStudentName" id="txtStudentName" type="text" class="auto-style33" style="width: 138px" size="100"></font></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">Admission Sought For Class</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
	<select name="cboClass" id="cboClass" style="height: 22px">
		<option selected="" value="Select One">Select One</option>
		<option value="pre nursery">pre nursery</option>
		<option value="Nursery">Nursery</option>
		<option value="L.K.G">L.K.G</option>
		<option value="U.K.G">U.K.G</option>
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















		<input name="txtFatherName" id="txtFatherName" type="text" class="auto-style33" style="width: 138px" size="100"></font></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">Contact No.</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







		<font face="Cambria">















		<input name="txtContactNo" id="txtContactNo" type="text" class="auto-style33" style="width: 138px" size="100"></font></td>



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



				<td class="auto-style19" width="20%" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">







				<font face="Cambria">Email Id</font></td>



				<td class="auto-style19" width="14%" style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">















		<font face="Cambria">















		<input name="txtEmailId" id="txtEmailId" type="text" class="auto-style33" style="width: 138px" size="100"></font></td>



				<td style="width: 15%; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">







				<font face="Cambria">Address:</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">







		<font face="Cambria">















		<input name="txtAddress" id="txtAddress" type="text" class="auto-style33" style="width: 312; height:44" size="500"></font></td>



			</tr>



			


			<tr>



				<td class="style1" colspan="5" style="width: 35px; border-left-color:#C0C0C0; border-left-width:1px; border-right-color:#808080; border-right-width:1px; border-bottom-color:#808080; border-bottom-width:1px">







			<input name="Button1" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></td>



				



			</tr>
</form>


		</table>
		
		-->
<div class="style1">
	<br><span class="style2"><strong><?php echo $Message;?></strong></span> </div><br>
		<?php
		if (mysql_num_rows($rs) > 0)
		{

		?>
		<table style="width: 100%" class="CSSTableGenerator">
			<tr>
				<td class="style5" style="width: 81px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Sr. No.</font></strong></td>
				<td class="style5" style="width: 143px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Inquiry Form#</font></strong></td>
				<td class="style5" style="width: 148px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Name</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Father Name</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Email</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Class</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Mobile</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Address</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Entry Date</font></strong></td>
				<td class="style5" style="width: 111px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Sell Reg. Form</font></strong></td>
			</tr>
			<?php
				$rownum=1;
				while($row = mysql_fetch_row($rs))
				{
						$InquiryFormNo=$row[0];
						$Name=$row[1];
						$FatherName=$row[2];
						$EmailId=$row[3];
						$sclass=$row[4];
						$smobile=$row[5];
						$Address=$row[6];
						$EntryDate=$row[7];
			?>
			<tr>
				<td class="style5" style="width: 81px; text-align:left"><font face="Cambria"><?php echo $rownum;?>.</font></td>
		<td class="style5" style="width: 143px; text-align:left"><font face="Cambria"><?php echo $InquiryFormNo;?></font></td>
		<td class="style5" style="width: 148px; text-align:left"><font face="Cambria"><?php echo $Name;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $FatherName;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $EmailId;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $sclass;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $smobile;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $Address;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><?php echo $EntryDate;?></font></td>
		<td class="style5" style="width: 111px; text-align:left"><font face="Cambria"><a href="SellRegistrationForm.php?inqno=<?php echo $InquiryFormNo;?>" class="style6">Sell Reg. Form</a></font></td>
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