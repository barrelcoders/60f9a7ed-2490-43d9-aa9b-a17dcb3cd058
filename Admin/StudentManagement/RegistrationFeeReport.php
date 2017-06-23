<?php include '../../connection.php'; ?>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Registration Fees Report</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
}
</style>

</head>



<body>
<form method="post">

				<div class="auto-style21">

					<strong><font face="Cambria">Registration Fees Report</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></body></html><?php

?><br>	
   	
    </font></p>	
   	
    <div align="center">
   	
    <table bordercolor="#000000" id="table3" class="CSSTableGenerator" style="width:100%; " cellspacing="0" cellpadding="0" bgcolor="#99CCFF">
    
    	
   	<tr>
		   <td   align="center" width="59" class="style2"   >
			<font face="Cambria">Sr No</font></td>
		   <td   align="center" width="77" class="style2"   >
			<font face="Cambria">Form No.</font></td>
		   <td   align="center" width="143" class="style2"   >
			<font face="Cambria">Student Name</font>
			</td>
			<td   align="center"   width="100" class="style2" >
			<font face="Cambria">Student Class</font></td>
   		   <td   align="center" width="100" class="style2"  >
			<font face="Cambria">Registration Fee Payable</font></td>
   		   <td   align="center" width="100" class="style2"  >
			<font face="Cambria">Registration Fee Paid</font></td>
   		   <td   align="center" width="101" class="style2"   >
			<font face="Cambria">Registration Fee Balance</font></td>
   		   <td   align="center" width="101" class="style2"  >
			<font face="Cambria">Receipt</font></td>
		   <td   align="center" width="101" class="style2"  >
			<font face="Cambria">Date</font></td>
		   <td   align="center" width="54" class="style2" >
			<font face="Cambria">Receipt Code</font></td>
		   			   
   	</tr>
   		</div>

   		<?php
   		$result=mysql_query("select `srno`,`FormNo`,`sname`,`sclass`,`RegistrationFeePayable`,`RegistrationFeePaid`,`RegistrationFeeBalance`,`receipt`,`date`,`ReceiptCode` from  RegistrationFees");
   		
   		while($cnt= mysql_fetch_array($result))
   		{
   		
   		
   			echo"<tr>".
   		   "<td class='style2'>" .$cnt[0]."</td>".
		   "<td class='style2'>".$cnt[1]."</td>".
		   "<td class='style2'>".$cnt[2]."</td>".
		   "<td class='style2'>".$cnt[3]."</td>".
   		   "<td class='style2'>".$cnt[4]."</td>".
   		   "<td class='style2'>".$cnt[5]."</td>".
   		   "<td class='style2'>".$cnt[6]."</td>".
   		   "<td class='style2'>".$cnt[7]."</td>".
   		   "<td class='style2'>".$cnt[8]."</td>".
		   "<td class='style2'>".$cnt[9]."</td>".
		   //"<td class='style2'>".$cnt[10]."</td>".
		
   			
   			"</tr>";
   			
   		}
   	
   	
   
    echo"</table>";
   		
   

		

?>