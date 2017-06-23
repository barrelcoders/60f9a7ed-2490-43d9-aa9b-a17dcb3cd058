<?php

include '../../connection.php';

include '../Header/Header3.php';

include '../../AppConf.php';

?>

<head>

<link rel="stylesheet" type="text/css" href="../css/style.css" />



</head>



<script type="text/javascript">

   

   

</script>

<body>

<p>&nbsp;</p>

<p><font face="Cambria" style="font-size: 12pt"><b>Class Wise Fees Bill and Projections</b></font></p>

<p>&nbsp;</p>





<table style="border-width:1px; width: 100%" cellspacing="0" cellpadding="0">

	

	

	

	<tr>

		<td style="border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" colspan="5">

		&nbsp;</td>

	</tr>	

	

	

	<form name ="frmRpt" id="frmRpt" method ="post" action="NewHostelFeeForeCastReport.php">

		<tr>

		<td style="width =517px; border-top-style:none; border-top-width:medium; " align="center" bgcolor="#339933">

		&nbsp;<font face="Cambria" color="#FFFFFF"><strong>Select Class</strong></font></td>

		<td style="width =517px; border-top-style:none; border-top-width:medium; " align="center" bgcolor="#339933">

			<select name="cboClass" class="text-box" id="cboClass">

			<option selected="" value="Select One">Select One</option>

				<?php

				  $ssqlclass="SELECT distinct `MasterClass` FROM `class_master`";

                 	$rsclass= mysql_query($ssqlclass);

	              while($rowclass = mysql_fetch_row($rsclass))

				{

							$Class=$rowclass[0];

							

				?>

				<option value="<?php echo $Class; ?>"><?php echo $Class; ?>

			</option>

				<?php 

				}

				?></select></td>

		<td style="width =517px; border-top-style:none; border-top-width:medium; " align="center" bgcolor="#339933">

		<p style="text-align: center"><font face="Cambria" color="#FFFFFF">

		<strong>Financial Year</strong></font></td>

		<td width="25%" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">

		<p style="text-align: left">

			<select name="cboFinancialYear" class="text-box" id="cboFinancialYear">

			<option selected="" value="Select One">Select One</option>

				<?php

				  $ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";

                 	$rsFY= mysql_query($ssqlFY);

	              while($rowFY = mysql_fetch_row($rsFY))

				{

							$Year=$rowFY[0];

							$FYear=$rowFY[1];

				?>

				<option value="<?php echo $Year; ?>"><?php echo $Year; ?>

			</option>

				<?php 

				}

				?></select></td>



		<td style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">
   	<font face="Cambria">Date From :&nbsp; <input type="date" name="DateFrom" id="DateFrom" size="20" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			</font></td>


		<td width="25%" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">

		<font face="Cambria">To Date : <input type="date" name="DateTo" id="DateTo" size="20" ></font></td>



		<td width="25%" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">

		<font face="Cambria"><input name="Submit1" type="submit" value="Submit" style="font-weight: 700"></font></td>



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