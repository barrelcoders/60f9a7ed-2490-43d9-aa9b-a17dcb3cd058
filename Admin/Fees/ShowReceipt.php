<?php include '../../connection.php';?>
<?php
$ReceiptNo=$_REQUEST["Receipt"];



{
	$ssql = "SELECT `ReceiptCode` FROM `fees_receipt_code` where  `ReceiptNo`='$ReceiptNo'";
}

$rs = mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
		$ReceiptHTML=$row[0];
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
</script>
<html>
<body>
<div id="MasterDiv">
<?php echo $ReceiptHTML;?>
</div>
<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FeesMenu.php"><span >HOME</span></a>

	</font>

	</div>
</body>
</html>