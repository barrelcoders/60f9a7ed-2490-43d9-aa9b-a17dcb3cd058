<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php
// just insert html code into table
$varhtml=$_REQUEST["htmlcode"];
//echo $varhtml . $varprintdiv;
$receiptno=$_REQUEST["receiptno"];
		$ssql="UPDATE `AdmissionFees` SET `FeeReceiptCode`='$varhtml' WHERE `receipt`='$receiptno'";
		mysql_query($ssql) or die(mysql_error());
		echo $varhtml;
		exit();
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
</script>

<html>
<head>

<!--<body onload="Javascript:fnRedirect();">-->
<body>

<input type="hidden" name="FileName" id="FileName" value="<?php echo $filename; ?>">
</body>
</head>
</html>