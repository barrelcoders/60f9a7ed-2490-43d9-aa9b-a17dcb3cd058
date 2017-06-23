<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<script language="javascript">
function Validate1()
{
	//alert("Hello");
	if (document.getElementById("sadmission").value=="")
	{
		alert("Please enter student addmission id");
		return;
	}
	
	 
	document.getElementById("frmFees").submit();
	
}
function Validate2()
{
if (document.getElementById("sadmission").value=="")
	{
		alert("Please enter student addmission id");
		return;
	}
	
	 
	document.getElementById("frmFees").action="PrintChallanByAdmissionNo.php";
	document.getElementById("frmFees").submit();
}
function Validate3()
{
if (document.getElementById("sadmission").value=="")
	{
		alert("Please enter student addmission id");
		return;
	}
	
	 
	document.getElementById("frmFees").action="FeesBillHostel.php";
	document.getElementById("frmFees").submit();
}

</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Student Admission No</title>
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

.style6 {
	border-style: solid;
	border-width: 1px;
}

.style7 {
	border-style: none;
	border-width: medium;
	text-align: left;
}

</style>
</head>

<body>

<p class="auto-style5" style="height: 12px">&nbsp;</p>
	<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
	<strong>Modify fee challan</strong></font></p>
<hr class="auto-style3" style="height: -15px">

	<p class="auto-style5" style="height: 12px">&nbsp;</p>

	<table width="100%" class="style6">
	<form name="frmFees" id="frmFees" method="post" action="ReGenChallan.php">
	
		<tr>
		
		<td style="width: 205px; height: 29px" class="auto-style23">

		<p align="left">

		<span class="style5"><font face="Cambria">Student Admission No. </font> </span>
		<span style="font-weight: 700; " class="auto-style1">
		<font face="Cambria">:</font></span></td>

		<td style="width: 234px; height: 29px" class="auto-style23">

		<input type="text" name="sadmission" id="sadmission" size="15" style="width: 151px;" class="auto-style1"></td>

		<td style="height: 29px" class="auto-style26">



		<input name="btnGo" type="button" value="Print Challan" onclick="Javascript:Validate2();" class="auto-style1" style="width: 101px; font-weight:700; float:left"><p>&nbsp;</td>

	</tr>
	
		<tr>
		
		<td style="width: 205px; height: 29px" class="auto-style23">

		&nbsp;</td>

		<td style="width: 234px; height: 29px" class="auto-style23">

		&nbsp;</td>

		<td style="height: 29px" class="auto-style26">



		<input name="btnGo" type="button" value="Print Hostel  Challan" onclick="Javascript:Validate3();" class="auto-style1" style="width: 200px; font-weight:700; float:left"></td>

	</tr>
	
		<!--
		<tr>
		
		<td style="width: 205px; height: 29px" class="auto-style23">

		&nbsp;</td>

		<td style="width: 234px; height: 29px" class="auto-style23">



		<input name="btnGo1" type="button" value="Re-Generate" onclick="Javascript:Validate1();" class="auto-style1" style="width: 111; font-weight:700; float:left; height:27"></td>

		<td style="height: 29px" class="auto-style26">



		&nbsp;</td>

	</tr>
	-->
	</form>
	
		</table>
		
</body>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>

</html>