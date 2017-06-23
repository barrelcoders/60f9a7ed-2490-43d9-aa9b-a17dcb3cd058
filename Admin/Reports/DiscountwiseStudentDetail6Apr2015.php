<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
	$ssql1="SELECT `DiscontType`,`sname`,`sadmission`,`sclass`,`srollno` FROM `student_master` WHERE `DiscontType` !='' and `DiscontType` !='Select One'  order by `DiscontType`";
	$result=mysql_query($ssql1);

?>
<script language="javascript">
	function Validate()
	{
		document.getElementById("frmRpt").submit();
	}
</script>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Sale Of Registration Form Report</title>


</head>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>

<body>
<form name="frmRpt" id="frmRpt" method="post">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

				<div>

					<strong><font face="Cambria" size="3"><br>Student Discount Summary</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a>


</body></html>

<?php

?>


   	
    </font></p>	
    
    </table>
   	
<div align="center" id="MasterDiv">
<style type="text/css">
.style6 {
	border: 1px solid #000000;
	font-face: Cambria;
		align: center;
		font-family: Cambria;
	font-weight: bold;
}
.style9 {
	border-collapse: collapse;
	border: 0px solid #000000;
}
.style11 {
	border: 1px solid #000000;
	font-face: Cambria;
	font-size: 12;
	align: center;
}
.style12 {
	border: 1px solid #000000;
	font-face: Cambria;
	font-size: 12;
	align: center;
	font-weight: bold;
}
</style>
<br>
   	<table width="100%" cellpadding="0" class="style9">

<tr>
		   <td   align="center" width="374" class="style12" bgcolor="#95C23D"   >
			<font face="Cambria" size="3">Sr No</font></td>
		   
		  
			<td   align="center"   width="375" class="style6" bgcolor="#95C23D" >
			Discount Type</td>
		   
		  
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Student Name</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Admission Id</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Class</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Roll No</font></td>
   		  
   		 
   		   
	
		   

		   			   
   	</tr>
	<?php
		$RecCount=1;
		while($cnt= mysql_fetch_array($result))
 		{
	 		$DiscontType=$cnt[0];
	 		$sname=$cnt[1];
	 		$sadmission=$cnt[2];
	 		$sclass=$cnt[3];
	 		$srollno=$cnt[4];
	?>
   	<tr>
		    <td  align="center" width="374" class="style11"><font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
			<td   align="center"   width="375" class="style11"><font face="Cambria" size="3"><?php echo $DiscontType;?></font></td>
		  	<td   align="center"   width="375" class="style11"><font face="Cambria" size="3"><?php echo $sname;?></font></td>   		   
			<td   align="center"   width="375" class="style11"><font face="Cambria" size="3"><?php echo $sadmission;?></font></td>
			<td   align="center"   width="375" class="style11"><font face="Cambria" size="3"><?php echo $sclass;?></font></td>
			<td   align="center"   width="375" class="style11"><font face="Cambria" size="3"><?php echo $srollno;?></font></td>
   	</tr>
   	<?php
   		$RecCount=$RecCount+1;
   		}
   	?>
   	</table>
   		</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>
   		