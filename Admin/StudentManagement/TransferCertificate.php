<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<script language="javascript">
function Validate1()
{
	//alert("Hello");
	if (document.getElementById("txtAdmissionNo").value=="")
	{
		alert("Please enter student addmission id");
		return;
	}
	
	document.getElementById("frmFees").submit();
	//document.getElementById("frmFees").submit();
	
}

</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Transfer Certificate</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.auto-style23 {
	border-style: none;
	border-width: medium;
}
.style5 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}

.auto-style1 {
	font-size: 11pt;
	font-family: Cambria;
}

.auto-style26 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}

.auto-style3 {
	font-family: Cambria;
	color: #000000;
}

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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;

}

</style>
</head>

<body>

<p class="auto-style5" style="height: 12px">&nbsp;</p>
	<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
	<strong>Issue Transfer Certificate</strong></font></p>
<hr class="auto-style3" style="height: -15px">

	<p class="auto-style5" style="height: 12px">&nbsp;</p>

	<table border="1px" width="100%">
	<form name="frmFees" id="frmFees" method="post" action="TransferCertificateForm.php">
	
		<tr>
		
		<td style="width: 226px; height: 29px" class="auto-style23">

		<p align="center">

		<span class="style5"><font face="Cambria">Student Admission No. </font> </span>
		<span style="font-weight: 700; " class="auto-style1">
		<font face="Cambria">:</font></span></td>

		<td style="width: 151px; height: 29px" class="auto-style23">

		<input type="text" name="txtAdmissionNo" id="txtAdmissionNo" Class="text-box"></td>

		<td style="width: 861px; height: 29px" class="auto-style26">



		<input name="btnGo" type="button" value="Fill Detail" onclick="Javascript:Validate1();" Class="text-box"></td>
	</tr>
	</form>
	
		</table>
		
</body>
<?php include"footer.php";?>
<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>-->

</html>