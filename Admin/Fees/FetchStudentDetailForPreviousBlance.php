<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<script language="javascript">
function Validate1()
{
	//alert("Hello");
	if (document.getElementById("txtAdmissionNo").value == "")
	{
		alert("Please enter student addmission id");
		return;
	}
	document.getElementById("frmFees").submit();
	
}

</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Balance Fees Collection</title>
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

.style4 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style3 {
	margin-left: 0px;
	font-family: Cambria;
	font-size: 11pt;
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
.style6 {
	font-family: Cambria;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	color: #000000;
}
</style>
</head>

<body>

	&nbsp;<p><b><span class="style6"><font face="Cambria">Balance Fees Collection</font></span></b></p>
	<hr class="auto-style3" style="height: -15px">
	<p>&nbsp;</p>

	<table border="1px" width="100%">
	<form name="frmFees" id="frmFees" method="post" target="_self" action="BalancePayment.php">
	
		<tr>
		
		<td style="width: 206px; height: 29px" class="auto-style23">

		<p align="center">

		<span class="style5"><font face="Cambria">Student Admission No. </font> </span>
		<span style="font-weight: 700; " class="auto-style1">
		<font face="Cambria">:</font></span></td>

		<td style="width: 168px; height: 29px" class="auto-style23">

		<font face="Cambria">

		<input type="text" name="txtAdmissionNo" id="txtAdmissionNo" class="text-box"></font></td>

		<td style="width: 927px; height: 29px" class="auto-style26">



		<font face="Cambria">



		<input name="btnGo" type="button" value="Fill Detail" onclick="Javascript:Validate1();" class="text-box"></font></td>
	</tr>
	</form>
	
		</table>
		
		
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>

</div>
</body>

</html>