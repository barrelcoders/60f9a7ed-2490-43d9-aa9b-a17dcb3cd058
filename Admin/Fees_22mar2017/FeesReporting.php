<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<?php

session_start();

if($isSubmit=="yes")



	{
		$dateofreporting = $_REQUEST["txtDate"];
		$tuitionfees = $_Request["txttuitionfees"];
		$transportfees = $_Request["txttransportfees"];
		$latefees = $_Request["txtlatefees"];
		$admissionfees = $_Request["txtadmissionfees"];
		$registrationfees = $_Request["txtregistrationfees"];
		
		$ssql="INSERT INTO `fees_reporting` (`dateofreporting`,`tuitionfees`,`transportfees`,`latefees`,`admissionfees`,`registrationfees` VALUES ('$dateofreporting','$tuitionfees','$transportfees','$latefees','$admissionfees','$registrationfees')";

		echo "<br><br><center><b>Data Reported Successfully!!";

		exit();

	}

?>


<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Daily Fees Collection Reporting</title>
<style>
.footer {
    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}
</style>
</head>

<body>



				<div class="auto-style21">

					&nbsp;<p><font face="Cambria"><strong>Daily Fees Collection Reporting</strong></font></div>
<hr class="auto-style3" style="height: -15px">
<p><font face="Cambria"><a href="javascript:history.back(1)">
<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td style="border-style: solid; border-width: 1px" width="195">
		<font face="Cambria">
		Date Of Reporting</font></td>
		<td style="border-style: solid; border-width: 1px">
		<font face="Cambria">
<input name="txtDate" id="txtDate" class="tcal" style="width: 108px" type="text" size="20"></font></td>
	</tr>
	<tr>
		<td style="border-style: solid; border-width: 1px" width="195">
		<font face="Cambria">
		Tuition Fees Collected</font></td>
		<td style="border-style: solid; border-width: 1px">
		<font face="Cambria">
<input name="txttuitionfees" id="txttuitionfees" class="tcal" style="width: 108px" type="text" size="20"></font></td>
	</tr>
	<tr>
		<td style="border-style: solid; border-width: 1px" width="195">
		<font face="Cambria">
		Transport Fees Collected</font></td>
		<td style="border-style: solid; border-width: 1px">
		<font face="Cambria">
<input name="txtTransportFees" id="txtTransportFees" class="tcal" style="width: 108px" type="text" size="20"></font></td>
	</tr>
	<tr>
		<td style="border-style: solid; border-width: 1px" width="195">
		<font face="Cambria">
		Late Fees Collected</font></td>
		<td style="border-style: solid; border-width: 1px">
		<font face="Cambria">
<input name="txtlatefees" id="txtlatefees" class="tcal" style="width: 108px" type="text" size="20"></font></td>
	</tr>
	<tr>
		<td style="border-style: solid; border-width: 1px" width="195">
		<font face="Cambria">
		Admission Fees Collected</font></td>
		<td style="border-style: solid; border-width: 1px">
		<font face="Cambria">
<input name="txtadmissionfees" id="txtadmissionfees" class="tcal" style="width: 108px" type="text" size="20"></font></td>
	</tr>
	<tr>
		<td style="border-style: solid; border-width: 1px" width="195">
		<font face="Cambria">
		Registration Fees Collected</font></td>
		<td style="border-style: solid; border-width: 1px">
		<font face="Cambria">
<input name="txtregistrationfees" id="txtregistrationfees" class="tcal" style="width: 108px" type="text" size="20"></font></td>
	</tr>
	<tr>
		<td style="border-style: solid; border-width: 1px" colspan="2"><p align="center">

				<input type="button" value="Submit" name="btnSubmit" style="font-family: Cambria; font-size: 11pt; color: #000000; font-weight:700" onclick ="Javascript:Validate();"></td>
	</tr>
</table>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>

</html>