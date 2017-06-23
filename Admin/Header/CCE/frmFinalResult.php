<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php'
?>
<?php
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
?>

<script language="javascript">
function Validate()
{
	if (document.getElementById("cboClass").value=="Select One")
	{
		alert("Please select Class!");
		return;
	}
	if (document.getElementById("cboTerm").value=="Select One")
	{
		alert("Please select Term!");
		return;
	}
	
	if (document.getElementById("cboTerm").value=="Term1")
	{
		document.getElementById("frmFinalReport").action="DisplayFinalResultTerm1.php";
	}
	else
	{
		document.getElementById("frmFinalReport").action="DisplayFinalResult.php";
	}
	
	document.getElementById("frmFinalReport").submit();
}

</script>



<html>


<head>



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Final Result</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">

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

.auto-style1 {
	border-collapse: collapse;
	border: 0px solid #000000;
}
.auto-style6 {
	font-size: small;
}



.auto-style7 {
	border-collapse: collapse;
	border-width: 0px;
}
.auto-style11 {
	border-style: none;
	border-width: medium;
}
.auto-style16 {
	font-size: 12pt;
	color: #000000;
	margin-left: 13px;
	font-family: Cambria;
}
.auto-style18 {
	font-weight: bold;
	font-size: 12pt;
	font-family: Cambria;
}
.auto-style19 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style20 {
	font-weight: normal;
	font-size: 12pt;
	font-family: Cambria;
}
.auto-style21 {
	font-family: Cambria;
	font-weight: normal;
	font-size: 12pt;
	color: #000000;
}
.auto-style23 {
	font-size: 12pt;
}
.auto-style25 {
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style26 {
	border-style: none;
	border-width: medium;
	font-size: 12pt;
	font-family: Cambria;
}



.auto-style30 {
	border: medium solid #FFFFFF;
	color: #000000;
}
.auto-style5 {
	text-align: left;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
	font-size: 12;
}
.auto-style3 {
	color: #000000;
}
.auto-style31 {
	font-family: Cambria;
}
.auto-style32 {
	font-size: small;
	font-family: Cambria;
	color: #000000;
}
.auto-style33 {
	font-size: 12pt;
	font-family: Cambria;
}
.auto-style34 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}
.auto-style35 {
	text-align: center;
	border-top-style: solid;
	border-top-width: 1px;
	font-family: Cambria;
	font-weight: bold;
	font-size: 18px;
	color: #000000;
}



.auto-style36 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style38 {
	text-align: center;
	border-top-style: solid;
	border-top-width: 1px;
	font-family: Cambria;
	font-size: medium;
	color: #000000;
}
.auto-style17 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	text-align: left;
}



.auto-style47 {
	font-family: Cambria;
	font-size: 12pt;
	color: #FFFFFF;
	text-decoration: underline;
	background-color: #000000;
}
.auto-style48 {
	border-style: none;
	border-width: medium;
	color: #FFFFFF;
	background-color: #000000;
}
.auto-style49 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
	color: #FFFFFF;
	text-decoration: underline;
	background-color: #000000;
}



.style15 {
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	background-color: #FFFFFF;
}



.style16 {
	font-family: Cambria;
	font-size: 12pt;
	color: #FFFFFF;
	background-color: #FFFFFF;
	text-align: center;
}



.style17 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
}



</style>



</head>







<body>



<table cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style7" style="width: 100%">



	



	

	<tr>

		<td class="auto-style30">

<p class="auto-style5" style="height: 12px"><strong><font size="3">Student Term 
wise Mark sheet</font></strong></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></p>

		</table>


	
<table style="width: 100%" class="style17">
			<form name="frmFinalReport" id="frmFinalReport" method="post" action="DisplayFinalResult.php">
			<tr>
			<td class="style15" style="width: 186px">
			<p align="center"><strong style="font-weight: 400">Select Class:</strong></td>
			<td class="style15" style="width: 188px">
			<select name="cboClass" id="cboClass" style="height: 22px">
		<option selected="" value="Select One">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select>
			</td>
			<td class="style15" style="width: 158px">
			<p align="center">
			<strong style="font-weight: 400">Select Term:</strong></td>
			<td class="style15" style="width: 129px">
			<select name="cboTerm" id="cboTerm" style="height: 22px">
				<option selected="Select One" value="Select One">Select One</option>
				<option value="Term1">Term1</option>
				<option value="Term2">Term2</option>
			</select>
			</td>
			<td class="style16" style="width: 570px">
			<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700; float:left"></td>
			</tr>
			</form>
</table>

<?php
if ($_REQUEST["txtReciptNo"] != "")
	{
?>
<?php
}
?>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>
</div>
</body>







</html>