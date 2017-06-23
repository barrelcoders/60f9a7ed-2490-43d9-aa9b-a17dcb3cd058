<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
//include '../Header/Header3.php';
?>

<?php
$srno=$_REQUEST["srno"];
$ssql="SELECT `srno`, DATE_FORMAT(`date`,'%d-%m-%Y') as `date`, `HeadName`, `SubHead`, `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`, DATE_FORMAT(`Chequedate`,'%d-%m-%Y') as `Chequedate`, `BankName`, `Amount`, `PaymentMode`, `TxnId`, `TxnStatus`, `PGTxnId`, `Status`, `FeeReceipt`, `ReceiptCode`, `SendToBank` FROM `fees_misc_collection` WHERE `srno`='$srno'";
$rs=mysql_query($ssql);
while($row = mysql_fetch_row($rs))
{
$srno=$row[0];
$date=$row[1];
$HeadName=$row[2];
$SubHead=$row[3];
$Source=$row[4];
$sadmissionno=$row[5];
if($sadmissionno!="")
{
$ID=$sadmissionno;
}

$sname=$row[6];
$sclass=$row[7];
$srollno=$row[8];
$VendorName=$row[9];
if($VendorName!="")
{
$ID=$VendorName;
$sname=$VendorName;
}
$VendorCompanyName=$row[10];
$VendorAddress=$row[11];
$VendorPhNo=$row[12];
$ChequeNo=$row[13];
$Chequedate=$row[14];
$BankName=$row[15];
$Amount=$row[16];
$PaymentMode=$row[17];
$TxnId=$row[18];
$TxnStatus=$row[19];
$PGTxnId=$row[20];
$Status=$row[21];
$FeeReceipt=$row[22];
$ReceiptCode=$row[23];
$SendToBank=$row[24];
break;
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

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";



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
        //document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.frmPDF.htmlcode.value = divElements;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
        //Print Page
        //window.print();
        //var FileLocation="http://emeraldsis.com/Admin/Fees/CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		//window.location.assign(FileLocation);
		//return;
}

</script>
<html>

<head>
<style type="text/css">
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
.style4 {
	text-align: left;
}
</style>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Delhi Public School</title>

</head>

<body>

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<style type="text/css">
.style4 {
	text-align: left;
}
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
.style6 {
	text-align: center;
}
.style7 {
	text-align: right;
}
</style>

	<p align="center">

	<font face="Cambria">

	<img border="0" src="../images/logo.png"  height="81" width="288"></font></p>
	<p align="center" ><font face="Cambria"><span class="style5"><?php echo $SchoolAddress; ?></span></font><br><b><font face="Cambria">
	(MISC. Fees Receipt)</font></b></p>
	
	
	<p align="center"><b>Receipt No.<?php echo $FeeReceipt; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Date:<?php echo $date; ?></b></p>
	
										

	<div align="center">

		<table cellpadding="0" style="padding: 1px 4px; border-style: dotted; border-width: 1px; width: 672px; border-collapse:collapse; " >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px">

				<font face="Cambria">Name</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $sname; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">ID</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $ID; ?>

				</font></td>

			</tr>
			<?php
			if($sclass!="")
			{
			?>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">Student Class</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $sclass; ?>

				</font></td>

			</tr>
			<?php
			}
			?>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria"> Fees Type</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				Misc.

				- <?php echo $HeadName;?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								<font face="Cambria"> Payment Mode</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">
				<font face="Cambria">
				Cheque
				</font>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; " colspan="2" >

								<table style="width: 100%">
									<tr>
										<td style="width: 220px">
										<font face="Cambria"> Cheque No: <?php echo $ChequeNo;?></font></td>
										<td style="width: 220px" class="style6">
										<font face="Cambria"> Cheque Date: <?php echo $Chequedate;?></font></td>
										<td style="width: 220px" class="style7">
										<font face="Cambria"> Bank: <?php echo $BankName;?></font></td>
									</tr>
								</table>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								Fees Paid</td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $Amount; ?>

				</font></td>

			</tr>

			</table>
</div>
	

	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Fees 
	In-charge</strong></font></p>
	<p align="center"><font face="Cambria">This is an electronically generated receipt and does not require any signature.</font></p>
	
<form name="frmPDF" id="frmPDF" method="post" action="../../Users/StorePDFMiscFee.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $ReceiptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
</body>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	|| <a href="FetchStudentDetail.php">HOME</a>
</font> 
	
</div>

</html>
