<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["CancelFormNo"] != "")
{
	$CancelFormNo=$_REQUEST["CancelFormNo"];
	mysql_query("update `RegistrationFees` set `Status`='CENCELLED' where `FormNo`='$CancelFormNo'") or die(mysql_error());
	echo "<br><br><center><b>Form No: ".$CancelFormNo." is cancelled successfully!";
	exit();
	
}
if ($_REQUEST["txtFormNo"] != "")
{
$FormNo=$_REQUEST["txtFormNo"];
$ssql="select `FormNo` ,`sname`, `sclass`,`FatherName`,`ContactNo`,`EmailId`,`Address`,`RegistrationFeePayable`,`Discount`,`RegistrationFeePaid`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,DATE_FORMAT(`DateOfExam`,'%d-%m-%Y') as `DateOfExam`,`TimeOfExam`,`receipt` from `RegistrationFees` where `FormNo`='$FormNo'";
$rsRcpt = mysql_query($ssql);

	if (mysql_num_rows($rsRcpt) > 0)
	{
		while($row = mysql_fetch_row($rsRcpt))
		{
			$FormNo=$row[0];
			$sname=$row[1];
			$sclass=$row[2];
			$FatherName=$row[3];
			$ContactNo=$row[4];
			$EmailId=$row[5];
			$Address=$row[6];
			$RegistrationFeePayable=$row[7];
			$Discount=$row[8];
			$RegistrationFeePaid=$row[9];
			$date=$row[10];
			$DateOfExam=$row[11];
			$TimeOfExam=$row[12];
			$receipt=$row[13];
			break;
		}
	}
	else
	{
		echo "<br><br><center><b>Record not found!";
		exit();
	}

	if ($sclass=="PRE-NURSERY" || $sclass=="LKG" || $sclass=="UKG")
	{
		$DispalySchoolName=$SchoolName1;
		$DispalySchoolName1=$SchoolName2;
	}
	else
	{
		$DispalySchoolName="";
		$DispalySchoolName1="";
	}

$currentdate=date("Y-m-d");
}
?>

<script language="javascript">

function printDiv() 
{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + 

          divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 }

function CreatePDF() 
{
		
        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

		document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.txtprintdiv.value =document.getElementById("divPrint").innerHTML;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
 
        //Print Page
		
        //window.print();
        var FileLocation="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		window.location.assign(FileLocation);
		return;


        //Restore orignal HTML

        //document.body.innerHTML = oldPage;

 }

function CreatePDF1() 
{
		var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body></html>";

		
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
						alert(rows);
			        	//document.getElementById("txtAnnualFeeDiscount").value=rows;
						//alert(rows);														
			        }

		      }

			var submiturl="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML) + "&receiptno=" + document.getElementById("receiptno").value;
			xmlHttp.open("POST", submiturl,true);
			xmlHttp.send(null);
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo $SchoolName ?> </title>



	






	



</head>

<!--<body onload="Javascript:CreatePDF();">-->
<body>
<style type="text/css">
.style1 {
	border-collapse: collapse;
}
.style2 {
	font-family: Cambria;
}
.style3 {
	text-align: right;
}
.style4 {
	text-align: left;
}
.style5 {
	font-family: 20pt;
	font-size: 25pt;
}
.style6 {
	font-size: small;
}
</style>

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >

	<p align="center">

	<font face="Cambria">

	<img border="0" src="../images/logo.png"  height="68" width="230"></font></p>
	<p align=center><span class="style5"><em><?echo $DispalySchoolName;?></em></span><br>
	<span class="style6"><?php echo $DispalySchoolName1?></span><br><?php echo $SchoolAddress ; ?><br><p align=center> Phone No: <?php echo $SchoolPhoneNo; ?><br></p><p align="center" ><b><font face="Cambria">Registration Fees 

	Receipt<br><br></font></b></p>
	<div align="center">
	<table cellpadding="0" style="padding: 1px 4px; border-style: dotted; border-width: 1px; width: 652px; border-collapse:collapse; " >
			<tr>
			<td style="width: 325px"><b>Receipt No.<?php echo $receipt; ?></b></td>
			<td style="width: 325px" class="style3"><b>Date:<?php echo $date; ?></b></td>
			</tr>
	</table>
	</div><br>
										

	<div align="center">

		<table cellpadding="0" style="padding: 1px 4px; border-style: dotted; border-width: 1px; width: 652px; border-collapse:collapse; " >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 325px">

				<font face="Cambria">Student Name</font></td>

				<td style="border-style: dotted; border-width: 1px; height: 25px; width: 325px;" class="style4">
				<font face="Cambria"><?php echo $sname; ?></font>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 325px" >

				<span class="style2">Father's</span><font face="Cambria"> Name</font></td>

				<td style="border-style: dotted; border-width: 1px; height: 24px; width: 325px;" class="style4">
				<font face="Cambria">
				<?php echo $FatherName;?></font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 325px" >

				<span class="style2">Form</span><font face="Cambria"> No</font></td>

				<td style="border-style: dotted; border-width: 1px; height: 24px; width: 325px;" class="style4">

				<font face="Cambria"><?php echo $FormNo; ?></font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 325px" >

				<font face="Cambria">Admission sought for Class</font></td>

				<td style="border-style: dotted; border-width: 1px; height: 25px; width: 325px;" class="style4">
				<font face="Cambria"><?php echo $sclass; ?></font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 325px" >

				<span class="style2">Registration</span><font face="Cambria"> Fees Amount</font></td>

				<td style="border-style: dotted; border-width: 1px; height: 24px; width: 325px;" class="style4">
				<font face="Cambria"><?php echo $RegistrationFeePayable; ?></font>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 325px" >

				<font face="Cambria">Total Fees Payable</font></td>

				<td style="border-style: dotted; border-width: 1px; height: 24px; width: 325px;" class="style4">

				<font face="Cambria"><?php echo $RegistrationFeePayable; ?></font></td>

			</tr>

			<!--
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<font face="Cambria">Total Fees Discount</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<?php //echo $RegistrationFeesDiscount;?></td>

			</tr>
			-->

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 325px" >

				<b>

				<font face="Cambria">Total Fees Paid</font></b></td>

				<td style="border-style: dotted; border-width: 1px; height: 24px; width: 325px;" class="style4">

				<font face="Cambria"><b><?php echo $RegistrationFeePaid;?></b></font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 325px" >

				<font face="Cambria"><b>Exam Date &amp; Time</b></font></td>

				<td style="border-style: dotted; border-width: 1px; height: 24px; width: 325px;" class="style4">
				<b><?php
					echo $DateOfExam." ".$TimeOfExam;
				?></b>
				</td>

			</tr>

			</table><br>
		<table style="width: 66%" class="style1">
			<tr>
				<td>
				<ul>
					<li><font face="Cambria"><em>Registration Fees is non 
					refundable</em></font> </li>
				</ul>
				</td>
			</tr>
		</table>
&nbsp;</div>
	

	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Fees 
	In-charge</strong></font></p>
<form name="frmPDF" id="frmPDF" method="post" action="CreatePDF.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	||  <a href="Javascript:fnlCancel();">CANCEL</a>
</font> 
	
</div>
<form name="frmCancel" id="frmCancel" method="post" action="">
<input type="hidden" name="CancelFormNo" id="CancelFormNo" value="<?php echo $FormNo; ?>">
</form>
</body>

</html>

<script language="javascript">
function fnlCancel()
{
	document.getElementById("frmCancel").submit();
}
</script>