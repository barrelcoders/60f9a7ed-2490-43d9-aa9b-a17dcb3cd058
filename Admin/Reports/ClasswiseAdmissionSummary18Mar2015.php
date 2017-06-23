<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
		$Dt = $_REQUEST["DateFrom"];
		$arr=explode('/',$Dt);
		$DateFrom= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

	$Dt = $_REQUEST["DateTo"];
	$arr=explode('/',$Dt);
	$DateTo= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	if($_REQUEST["DateFrom"] !="")
	{
		
		//$ssql="SELECT DISTINCT `sclass`,count(*),SUM(`RegistrationFeePaid`) FROM `NewStudentAdmission` where `date`>='$DateFrom' and `date`<='$DateTo'  GROUP BY `sclass`";
		$ssql="SELECT x . * , (SELECT COUNT( * ) FROM  `NewStudentAdmission` WHERE  `sclass` = x.`sclass` and `AdmissionDate`>='$DateFrom' and `AdmissionDate`<='$DateTo') AS  `AdmissionCount` FROM (SELECT DISTINCT  `sclass` , COUNT( * ) as `RegistrationCount` FROM  `NewStudentRegistration` where `RegistrationDate`>='$DateFrom' and `RegistrationDate`<='$DateTo' GROUP BY  `sclass`) AS  `x`";
	}
	else
	{	
		$ssql="SELECT x . * , (SELECT COUNT( * ) FROM  `NewStudentAdmission` WHERE  `sclass` = x.`sclass`) AS  `AdmissionCount` FROM (SELECT DISTINCT  `sclass` , COUNT( * ) as `RegistrationCount` FROM  `NewStudentRegistration` GROUP BY  `sclass`) AS  `x`";

		//$ssql="SELECT DISTINCT `sclass`,count(*),SUM(`RegistrationFeePaid`) FROM `NewStudentAdmission` GROUP BY `sclass`";
	}
	
	$result=mysql_query($ssql);
}
else
{
$ssql="SELECT x . * , (SELECT COUNT( * ) FROM  `NewStudentAdmission` WHERE  `sclass` = x.`sclass`) AS  `AdmissionCount` FROM (SELECT DISTINCT  `sclass` , COUNT( * ) as `RegistrationCount`FROM  `NewStudentRegistration` GROUP BY  `sclass`) AS  `x`";
$result=mysql_query($ssql);
}
?>
<script language="javascript">
	function Validate()
	{
		if(document.getElementById("DateFrom").value=="")
		{
			alert("Please select Date From!");
			return;
		}
		if(document.getElementById("DateTo").value=="")
		{
			alert("Please select Date To!");
			return;
		}
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

					<strong><font face="Cambria" size="3"><br>Classwise Admission Summary</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a>


</body></html>

<?php

?>


   	
    </font></p>	
    
    </table>
   	
    <div align="center">
   	
    <table id="table3" class="style1" style="width:100%; " cellspacing="0" cellpadding="0">
<tr>
		   <td   align="center" width="374" class="style2">
		   <span class="style5"><strong>Date From :</strong></span>&nbsp; <input type="text" name="DateFrom" id="DateFrom" size="20" class="tcal">
			</td>	   
		  
			<td   align="center"   width="375" class="style2" colspan="2" style="width: 750px" >
			<span class="style5"><strong>To Date :</strong></span> <input type="text" name="DateTo" id="DateTo" size="20" class="tcal">
			</td>
   		   <td   align="center" width="375" class="style2"  >
			<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></td>
   		 
   		   
	
		   

		   			   
   	</tr>
   	</table>
   	<br>
   	<br>
</div>
<div align="center" id="MasterDiv">
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size:12;
	align: center;
}
.style5 {
	font-family: Cambria;
}
.style6 {
	border: 1px solid #000000;
	font-face: Cambria;
		align: center;
		font-family: Cambria;
	font-weight: bold;
}
.style7 {
	border: 1px solid #000000;
	font-face: Cambria;
		font-size: 12;
		align: center;
		text-align: right;
}
.style9 {
	border-collapse: collapse;
	border: 0px solid #000000;
}
.style10 {
	border: 1px solid #000000;
	font-face: Cambria;
	font-size: small;
	align: center;
	font-family: Cambria;
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

   	<table width="100%" cellpadding="0" class="style9">

<tr>
		   <td   align="center" width="374" class="style12" bgcolor="#95C23D"   >
			<font face="Cambria" size="3">Sr No</font></td>
		   
		  
			<td   align="center"   width="375" class="style6" bgcolor="#95C23D" >
			Class</td>
		   
		  
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Registration Count</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Admission Count</font></td>
   		  
   		 
   		   
	
		   

		   			   
   	</tr>
   	<?php
   	$RecCount=1;
   	$TotalCollection=0;
   	$TotalRegistrationCount=0;
   	$TotalAdmissionCount=0;
   		while($cnt= mysql_fetch_array($result))
 		{
 		$Class=$cnt[0];
 		$RegistrationCnt=$cnt[1];
 		$TotalRegistrationCount=$TotalRegistrationCount+$RegistrationCnt;
 		
 		$AdmissionCnt=$cnt[2];
 		$TotalAdmissionCount=$TotalAdmissionCount+$AdmissionCnt;
   	?>
   	<tr>
		   <td   align="center" width="374" class="style11"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		  
		 
			<td   align="center"   width="375" class="style11" >
			<font face="Cambria" size="3"><?php echo $Class;?></font>
			</td>
		  
		 
			<td   align="center"   width="375" class="style11" >
			<font face="Cambria" size="3"><?php echo $RegistrationCnt;?></font></td>   		   
   		   			   
		 
			<td   align="center"   width="375" class="style11" >
			<?php echo $AdmissionCnt;?></td>   		   
   		   			   
   	</tr>
   	<?php
   			//$TotalCollection=$TotalCollection+$Amount;
   		$RecCount=$RecCount+1;
   		}
   	?>
   	<tr>
		   <td width="374" class="style7" colspan="2" style="width: 749px"   >
			<font face="Cambria" size="3"><strong>Total Count:</strong></font> </td>
		  
		 
			<td   align="center"   width="375" class="style11" >
			<font face="Cambria" size="3"><?php echo $TotalRegistrationCount;?></font></td>   		   
   		   			   
		 
			<td   align="center"   width="375" class="style10" >
			<?php echo $TotalAdmissionCount;?></td>   		   
   		   			   
   	</tr>
  
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
   		