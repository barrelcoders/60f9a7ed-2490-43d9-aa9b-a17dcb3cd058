<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Merit Certificate</title>
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
<style type="text/css">

body {
    background-image: url("../images/ecMdGLEki.jpeg");
    background-repeat: no-repeat;
    background-size: 1030px 710px;
    
    background-position: center;
}
</style>
</head>

<body >
<table  width="90%" height="90%" align=center><tr><td>
<div align="center">
<table width="70%" height="70%" cellspacing="6">

<tr>
<td>
<p align="center">
<img src="../images/DPSRoundName.jpg" width="732" height="224" ></p>
<p align="center">
<img src="../CCE/DPSLogo.jpg"  height="134" width="130" ></p>
</td>
</tr>
<tr>
<td align="center"><font face="Brush Script Std" size="6">Certificate of Merit</font></td>
</tr>

<tr>
<td  width="130" >

<p align="justify" width="130"><i><font size="3">This is to certify that
</font>
</i><font size="3">_________________________________________________________________________________________________ 
</font> </p>

</td>
</tr>

<tr>
<td  width="130" >
<p align="justify" width="150"><i><font size="3">of Class _______________________________________ Section ____________________________________ is 
awarded 
_________________________________________________________________________________</font></i><font size="3">___________________________________</font></p>



</td>
</tr>

<tr>
<td>
<p align="right" width="150">&nbsp;</p>
<p align="right" width="150">
<img src="http://2015.dpsfsis.com/Admin/images/PrincipalSignature.png" height="50px" width="80px"></p>

<p align="right" width="150"> Principal</p>
</td>
</tr>

</table>
</div>
</td></tr></table>
</body>
</html>