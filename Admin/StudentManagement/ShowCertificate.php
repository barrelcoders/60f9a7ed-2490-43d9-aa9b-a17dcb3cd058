<?php
session_start();
include '../../connection.php';
$certificateno=$_REQUEST["srno"];
$rs=mysql_query("select `html_code` from `student_certificate` where `certificate_sr_no`='$certificateno'");
while($row = mysql_fetch_row($rs))
{
	$htmlcode=$row[0];
	break;
}
//echo $htmlcode;
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
</script>

<html>
<head>

<!--<body onload="Javascript:fnRedirect();">-->
<body>
<input type="hidden" name="FileName" id="FileName" value="<?php echo $filename; ?>">
<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<?php
echo $htmlcode;
?>
</div>
<div id="divPrint">
	<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font></div>
</body>
</head>
</html>