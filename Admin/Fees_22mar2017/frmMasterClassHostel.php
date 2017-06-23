<?php
session_start();
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
</script>
<body>


<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><b>Class Wise Fees Bill and Projections</b></font></p>
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
		
		<select id="selectbox" name="selectbox" class="text-box" value= "Select Class" onchange = "javascript:location.href = this.value;" size="1">
		
		<option selected value="Select Class">Select Class</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=All">All</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=NURSERY">NURSERY</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=PREP">PREP</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=1">1</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=2">2</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=3">3</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=4">4</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=5">5</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=6">6</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=7">7</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=8">8</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=9">9</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=10">10</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=11COM">11COM</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=12COM">12COM</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=11NMED">11NMED</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=12NMED">12NMED</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=11MED">11MED</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=12MED">12MED</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=11ART">11ART</option>
		<option value="AllStudentFeeHeadWiseAmountHostel.php?MasterClass=12ART">12ART</option>
       

		</select></font></td>
		
		 
    
    
	</tr>	</table>	
<font face="Cambria">	
<br><br><br>

</font>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>

</html>