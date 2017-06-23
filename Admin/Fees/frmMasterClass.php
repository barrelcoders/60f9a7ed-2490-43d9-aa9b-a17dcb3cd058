<?php
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>

<script type="text/javascript">
    window.load = function(){
        location.href=document.getElementById("selectbox").value;
    }    
   
function fnlSubmit()
{
document.getElementById("frmRpt").submit();
}
</script>
<body>
<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><b>Class Wise Fees Bill and Projections</b></font></p>
<p>&nbsp;</p>


<table style="border-width:1px; width: 100%" cellspacing="0" cellpadding="0">
	
	
	
	<tr>
		<td style="border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" colspan="4">
		&nbsp;</td>
	</tr>	
	
	
	<form name ="frmRpt" id="frmRpt" method ="post" action="AllStudentFeeHeadWiseAmount.php">
	<tr>
		<td style="width =517px; border-top-style:none; border-top-width:medium; " align="center" bgcolor="#339933">
		<input type="Date" name ="StartDate" id="StartDate">
		</td>
		<td style="width =517px; border-top-style:none; border-top-width:medium; " align="center" bgcolor="#339933">
		<input type="Date" name ="EndDate" id="EndDate">
		</td>
		<td style="width =517px; border-top-style:none; border-top-width:medium; " align="center" bgcolor="#339933">
		<p style="text-align: center"><font face="Cambria" color="#FFFFFF"><strong>Select Class</strong></font></td>
		<td width="50%" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">
		<p style="text-align: left"><font face="Cambria">
		
		<select id="MasterClass" name="MasterClass" class="text-box" value= "Select Class" onchange = "javascript:fnlSubmit();" size="1">
		
		<option selected value="Select Class">Select Class</option>
		<option value="All">All</option>
		<option value="NURSERY">NURSERY</option>
		<option value="PREP">PREP</option>
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
		<option value="11COM">11COM</option>
		<option value="12COM">12COM</option>
		<option value="11NMED">11NMED</option>
		<option value="12NMED">12NMED</option>
		<option value="11MED">11MED</option>
		<option value="12MED">12MED</option>
		<option value="11ART">11ART</option>
		<option value="12ART">12ART</option>
       

		</select></font></td>

	</tr>	
	</form>
	</table>	
<font face="Cambria">	
<br><br><br>

</font>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>

</div>
</body>

</html>