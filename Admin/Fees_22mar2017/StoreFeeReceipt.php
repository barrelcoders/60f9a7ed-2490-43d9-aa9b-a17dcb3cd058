<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php
// just insert html code into table
$varhtml=$_REQUEST["htmlcode"];
//echo $varhtml . $varprintdiv;
$receiptno=$_REQUEST["receiptno"];
		$ssql="UPDATE `fees_transaction` SET `FeeReceiptCode`='$varhtml' WHERE `PBalanceReceiptNo`='$receiptno'";
		mysql_query($ssql) or die(mysql_error());
		
		//echo $varhtml;
		//exit();
///


 // INCLUDE THE phpToPDF.php FILE
 //require("phpToPDF.php"); 
 // GENERATE PDF FILE FROM SPECIFIED URL, SAVES TO CURRENT DIRECTORY ('')
 
 //$varhtml="<html>Hello World!<br><br>HTML Test using phpToPDF</html>";
 //$varhtml=$_REQUEST["htmlcode"];
 //$filename = $_REQUEST["txtpdffilename"];
 //echo $varhtml;
 //exit();

 //phptopdf_html($varhtml,'PDFInvoices/', $filename);
 
 //phptopdf_html('<html>Hello World!<br><br>HTML Test using phpToPDF</html>','PDFInvoices/', 'legacy_html_example.pdf');
  
//$filename="legacy_html_example.pdf";


//New method of PDF generation
			/*
			require("PDF_Conversion/html2fpdf.php"); 
 			$varhtml=$_REQUEST["htmlcode"];
 			$filename = $_REQUEST["txtpdffilename"];
 			$buffer = $varhtml;
			$pdf = new HTML2FPDF('P', 'mm', 'A4'); 
			$pdf->AddPage(); 
			$pdf->WriteHTML($buffer); 
			$pdf->Output('PDFInvoices/' . $filename, 'F'); 	
			*/
?>

<script language="javascript">
	function fnRedirect()
	{
		var FileLocation="http://emeraldsis.com/Admin/StudentManagement/PDFInvoices/" + document.getElementById("FileName").value ;
		//alert (FileLocation);	
		window.location.assign(FileLocation);
	}
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
</script>

<html>
<head>

<!--<body onload="Javascript:fnRedirect();">-->
<body>
<input type="hidden" name="FileName" id="FileName" value="<?php echo $filename; ?>">
<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<?php
echo $varhtml . "<br><hr>" . $varhtml;
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	
</font> 
	
</div>
</body>
</head>
</html>