<?php include '../connection.php';?>

<?php
// just insert html code into table

//echo $varhtml . $varprintdiv;
$sadmission = $_REQUEST["sadmission"];
$Header= $_REQUEST["headername"];
$AnnouncementId=$_REQUEST["AnnouncementId"];
$rs=mysql_query("select `ReceiptCode` from `fees_misc_collection` where `HeadName`='$Header' and `sadmissionno`='$sadmission' and `AnnouncementID`='$AnnouncementId'");
		
	while($row=mysql_fetch_row($rs))
	{
		$ReceiptCode=$row[0];
		break;
	}
	
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
echo $ReceiptCode;
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	|| <a href="http://dpsfsis.com/Users/MyFees.php">HOME</a>
</font> 
	
</div>
</body>
</head>
</html>