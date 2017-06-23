<?php include '../../connection.php';?>
<?php
// just insert html code into table
$varhtml = str_replace("'","''",$_REQUEST["htmlcode"]);
$varhtml1 = $_REQUEST["htmlcode"];

//echo $varhtml . $varprintdiv;
$CertificateNo = $_REQUEST["receiptno"];

		$ssql="UPDATE `student_certificate` SET `html_code`='$varhtml' WHERE `certificate_sr_no`='$CertificateNo'";
		//echo $ssql;
		//exit();
		mysql_query($ssql) or die(mysql_error());
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

<!--<body onload="Javascript:fnRedirect();">-->
<body>
<input type="hidden" name="FileName" id="FileName" value="<?php echo $filename; ?>">
<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<?php
//echo $varhtml . "<br><hr>" . $varhtml;
echo $varhtml1;
//echo $varhtml.'<p style="page-break-before: always">';
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a>&nbsp; |&nbsp;<a href="../LandingPage.php"> HOME</font></a></div>
</body>
</head>
</html>