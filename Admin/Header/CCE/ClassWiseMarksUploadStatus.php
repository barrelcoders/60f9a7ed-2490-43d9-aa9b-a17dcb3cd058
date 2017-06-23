<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>
<script>

function ReloadWithSubject()
{
	var selectedvalue=document.getElementById("cboClass").value;
	if(selectedvalue=="1" || selectedvalue=="2")
	{
			window.location.href="ReportCardApproveRejectClass1andClass2.php";
	}
	if(selectedvalue=="6" || selectedvalue=="7" || selectedvalue=="8" || selectedvalue=="9" || selectedvalue=="10")
	{
		window.location.href="frmFetchCCEMarksUploadStatus.php";	
	}
	if(selectedvalue=="11" || selectedvalue=="12")
	{
		window.location.href="ReportCardStatusClass11andClass12.php";
	}
	
	
}
</script>
<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Approve / Reject Student </font></b>
<font face="Cambria" style="font-size: 12pt"><b>Report Card</b></font></p>
<p>&nbsp;</p>


<table style="border-width:1px; width: 100%" cellspacing="0" cellpadding="0">
	
	
	
	<tr>
		<td style="border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" colspan="2">
		&nbsp;</td>
	</tr>	
	
	
	
	<tr>
		<td style="width =517px; border-top-style:none; border-top-width:medium; " align="center" bgcolor="#339933">
		<p style="text-align: center"><font face="Cambria" color="#FFFFFF"><strong>Select Class</strong></font></td>
		<td width="50%" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">
		<p style="text-align: left"><font face="Cambria">
		<select size="1" name="cboClass" id="cboClass" class="text-box" onchange="ReloadWithSubject();">
		<option selected value="Select Class">Select Class</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		</select></font></td>
	</tr>	</table>	
<font face="Cambria">	
<br><br><br>

</font>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>
</body>

</html>