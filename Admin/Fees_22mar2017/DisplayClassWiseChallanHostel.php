<?php
include '../../connection.php';
session_start();
$SelectClass=$_REQUEST["Class"];
$ssql="SELECT `challanhtmlcode` FROM  `fees_challan_hostel` where `class`='$SelectClass' order by `sadmission`,`quarter`";

$rs = mysql_query($ssql, $Con);

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

<body>
<div id="MasterDiv">
<?php
while($row1 = mysql_fetch_row($rs))
{
	$ChallanHtmlCode=$row1[0];
	echo $ChallanHtmlCode;
}
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