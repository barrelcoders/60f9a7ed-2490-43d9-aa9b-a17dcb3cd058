<?php
session_start();
include '../../connection.php'; 
?>
<?php
$InqFormNo=$_REQUEST["InqFormNo"];

	
	$sqlFol = "SELECT MAX(CAST(`FollowUpId` AS SIGNED INTEGER)) as `srno` FROM  `Enquiry_Transaction`";
	
	$rsFol = mysql_query($sqlFol);
		if (mysql_num_rows($rsFol) > 0)
		{
			while($row1 = mysql_fetch_row($rsFol))
				{
											
					$FolNo=$row1[0]+1;						
				}
		}
		else
		{
			$FolNo="1";
		}
		$sqlInq = "SELECT MAX(CAST(`FollowUpId` AS SIGNED INTEGER)) as `srno` FROM  `Enquiry_Transaction`";


if($_REQUEST["isSubmit"]=="yes")
{
	$txtFollowUpId=$_REQUEST["txtFollowUpId"];
	$txtInquiryFormNo=$_REQUEST["txtInquiryFormNo"];
	$txtFollowUp=$_REQUEST["txtFollowUp"];
	$txtMode=$_REQUEST["txtMode"];
    $currentdate=date("Y-m-d");
    
    
	$rschk=mysql_query("select * from `InquiryDetail` where `InquiryFormNo`='$InquiryFormNo'");
	if (mysql_num_rows($rschk) == 0)
	{

	
     $ssql="INSERT INTO `Enquiry_Transaction` (`FollowUpId` ,`EnquiryId` ,`TransactionDetail`,`ModeOfCommmunication`) VALUES('$txtFollowUpId','$txtInquiryFormNo','$txtFollowUp','$txtMode')";
	mysql_query($ssql) or die(mysql_error());
     	
	$Message="Your Update for form no:".$InqFormNo." has been submitted!. Your Updation up Id is:".$txtFollowUpId." ";
     }
		}
	$ssqlFol="SELECT `FollowUpId`, `EnquiryId`, `TransactionDetail`, `ModeOfCommmunication`, `SystemDateTime` FROM `Enquiry_Transaction` WHERE `EnquiryId`='$InqFormNo' ORDER BY  `SystemDateTime` desc";
	$rsfollow=mysql_query($ssqlFol) or die(mysql_error());
	
	$ssqplENQ="SELECT `InquiryFormNo`, `Name`, `FatherName`, `DateOfBirth`, `EmailId`, `sclass`, `smobile`, `Address`, `Stream`, `EntryDate`, `SchoolId` FROM `InquiryDetail` WHERE `InquiryFormNo`='$InqFormNo' ORDER BY  `EntryDate` desc";
     $rsENQ=mysql_query($ssqplENQ) or die(mysql_error());

?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Follow Up Form</title>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../../css/style.css" />


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

function Validate()
{

	if (document.getElementById("txtInquiryFormNo").value == "")
	{
		alert ("Form no is mandatory!");
		return;
	}
	
	if (document.getElementById("txtFollowUpId").value == "")
	{
		alert("Id Is is mandatory!");
		return;
	}
	if (document.getElementById("txtFollowUp").value == "")
	{
		alert("Please enter the follow up details!");
		return;
	}
	if (document.getElementById("txtMode").value == "")
	{
		alert("Mode Of Communication  is mandatory!");
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







				<strong><font face="Cambria">Follow Up Form</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

				<p class="style1">
				<span class="style2"><strong><?php echo $Message;?></strong></span>
				</td>
			</tr>



			
<form name="frmInquiryForm" id="frmInquiryForm" method="post" action="FollowUpFrom.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">


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







				<font face="Cambria">Enquiry Id</font></td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















		<input name="txtInquiryFormNo" id="txtInquiryFormNo" type="text" class="text-box" readonly="readonly" value="<?php echo $InqFormNo;?>"></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">Follow Up Id</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				







		<input name="txtFollowUpId" id="txtFollowUpId" type="text" class="text-box" readonly="readonly" value="<?php echo $FolNo;?>"></td>



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







				<font face="Cambria">Follow Up Details</font></td>



				<td class="auto-style19" width="14%" style="border-style: none; border-width: medium">















				<font face="Cambria">
				<textarea name="txtFollowUp" id="txtFollowUp"class="text-box-address" rows="3" cols="45"></textarea></font></td>



				<td style="border-style:none; border-width:medium; width: 15%" class="auto-style11">















				&nbsp;</td>



				<td width="20%" style="border-style: none; border-width: medium">







				<font face="Cambria">Mode Of Communication</font></td>



				<td class="auto-style11" width="30%" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">







				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
	&nbsp;</span><font face="Cambria"><input name="txtMode" id="txtMode" type="text" class="text-box" ></font></td>



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



				<td class="style1" colspan="5" style="width: 100%; border-left-color:#C0C0C0; border-left-width:1px; border-right-color:#808080; border-right-width:1px; border-bottom-color:#808080; border-bottom-width:1px">
			<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate();" class="text-box"></strong><font face="Cambria"></td>
			</tr>
</form>


		</table>
		<br>
		<br>
		
	<table border="1" width="100%" style="border-collapse: collapse" class="CSSTableGenerator">
		<tr>
			<td><font face="Cambria"><b>Enquiry Id</b></font></td>
			<td><b><font face="Cambria">Follow Up Id</font></b></td>
			<td><font face="Cambria"><b>Name</b></font></td>
			<td><font face="Cambria"><b>Class</b></font></td>
            <td><font face="Cambria"><b>Father's Name</b></font></td>
			<td><font face="Cambria"><b>Phone No</b></font></td>
			<td><font face="Cambria"><b>Follow Up Details</b></font></td>
			<td><font face="Cambria"><b>Mode Of Communication</b></font></td>
		</tr>
		<?php
				$rownum=1;
				while($row1= mysql_fetch_row($rsENQ))
				{
						$Name=$row1[1];
						$Class=$row1[5];
						$Father=$row1[2];
						$Phone=$row1[6];
						
						
			?>

		<?php
				$rownum=1;
				while($row = mysql_fetch_row($rsfollow))
				{
						$Followid=$row[0];
						$Enqid=$row[1];
						$Details=$row[2];
						$Mode=$row[3];
						
						
			?>
			

		<tr>
			<td><font face="Cambria"><?php echo $Enqid; ?></font></td>
			<td><font face="Cambria"><?php echo $Followid; ?></font></td>
			<td><font face="Cambria"><?php echo $Name; ?></font></td>
			<td><font face="Cambria"><?php echo $Class; ?></font></td>
			<td><font face="Cambria"><?php echo $Father; ?></font></td>
			<td><font face="Cambria"><?php echo $Phone; ?></font></td>
			<td><font face="Cambria"><?php echo $Details; ?></font></td>
			<td><font face="Cambria"><?php echo $Mode; ?></font></td>
		</tr>
		<?php 
		}
		}
		?>
	</table>	
		
<br>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

		</body>

</html>