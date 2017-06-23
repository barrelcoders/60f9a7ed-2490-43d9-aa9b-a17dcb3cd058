<?php include '../../connection.php';?>

<?php
// just insert html code into table
$varhtml = str_replace("'","''",$_REQUEST["htmlcode"]);

//echo $varhtml . $varprintdiv;
$receiptno = $_REQUEST["receiptno"];

		//$ssql="UPDATE `fees` SET `FeeReceiptCode`='$varhtml' WHERE `receipt`='$receiptno'";
		$ssql="UPDATE `fees_receipt_code` SET `ReceiptCode`='$varhtml' WHERE `ReceiptNo`='$receiptno'";
		//echo $ssql;
		//exit();
		mysql_query($ssql) or die(mysql_error());
		
		mysql_query("update `fees_misc_collection` set `ReceiptCode`='$varhtml' where `FeeReceipt`='$receiptno'") or die(mysql_error());
		
		//echo $varhtml;
		//exit();
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

<style type="text/css">
.style1 {
	font-family: Cambria;
}
</style>


<!--<body onload="Javascript:fnRedirect();">-->
<body>
<input type="hidden" name="FileName" id="FileName" value="<?php echo $filename; ?>">
<div id="MasterDiv" align="center" >
<?php
echo $varhtml . "<br><hr>" . $varhtml;
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	|| <a href="FetchStudentDetail.php">HOME</a>
</font> 
	
</div>
<p align="center" class="style1">&nbsp;&nbsp;&nbsp; </p>
</body>
</head>
</html>