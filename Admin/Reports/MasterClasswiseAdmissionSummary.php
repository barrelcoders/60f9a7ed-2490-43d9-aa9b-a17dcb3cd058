<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
	$ssql="select distinct `sclass` from `student_master`";
	
	$result=mysql_query($ssql);
}
else
{
	//$ssql="SELECT DISTINCT  `sclass` , COUNT(*) , (SELECT COUNT(*) FROM  `NewStudentAdmission` WHERE  `sclass` = a.`sclass`) AS  `AdmissionCount`,(select COUNT(*) as `RegistrationCount` FROM  `NewStudentRegistration` where `sclass`=a.`sclass`) as `RegistrationCount` FROM  `student_master` AS  `a` where NOT (`sclass` like '%NURSERY%' OR `sclass` like '%LKG%') GROUP BY  `sclass` ORDER BY `sclass`";
	$ssql="select distinct y.`MasterClass` as `sclass`,sum(`cnt`) as `cnt1`,sum(`AdmissionCount`) as `AdmissionCount`,sum(`RegistrationCount`) as `RegistrationCount` from (select x.*,(select `MasterClass` from `class_master` where `class`=x.`sclass`) as `MasterClass` from (SELECT DISTINCT  `sclass` , COUNT(*) as `cnt` , (SELECT COUNT(*) FROM  `NewStudentAdmission` WHERE  `sclass` = a.`sclass`) AS  `AdmissionCount`,(select COUNT(*) as `RegistrationCount` FROM  `NewStudentRegistration` where `sclass`=a.`sclass`) as `RegistrationCount` FROM  `student_master` AS  `a` where NOT (`sclass` like '%NURSERY%' OR `sclass` like '%LKG%') GROUP BY  `sclass` ORDER BY `sclass`) as `x`) as `y` where y.`MasterClass` !='' group by y.`MasterClass`";
	$result=mysql_query($ssql);

	//$ssql1="SELECT DISTINCT  `sclass` , COUNT(*) FROM  `NewStudentRegistration` AS  `a` where (`sclass` like '%NURSERY%' OR `sclass` like '%LKG%' OR `sclass` like '%UKG%') GROUP BY  `sclass` ORDER BY `sclass`";
	$ssql1="SELECT DISTINCT  `MasterClass` as `sclass` , COUNT(*) FROM  (select a.*,(SELECT `MasterClass` FROM `class_master` where `class`=a.`sclass`) as `MasterClass` from `NewStudentRegistration` as `a`) AS  `x` where (`sclass` like '%NURSERY%' OR `sclass` like '%LKG%' OR `sclass` like '%UKG%') and `MasterClass` !='' GROUP BY  `MasterClass` ORDER BY `MasterClass`";

	$result1=mysql_query($ssql1);
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
   	
<div align="center" id="MasterDiv">
<style type="text/css">
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
<br>
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
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Old Student Count</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Total</font></td>
   		  
   		 
   		   
	
		   

		   			   
   	</tr>
   	<?php
	   	$RecCount=1;
	   	$RegistrationTotal=0;
	   	$AdmissionTotal=0;
	   	$StudentTotal=0;
	   	$GrandTotal=0;
	   	while($cnt= mysql_fetch_array($result))
 		{
	 		$Class=$cnt[0];
	 		$ClassWiseCount=$cnt[1];
	 		$AdmissionCount=$cnt[2];
	 		$RegistrationCount=$cnt[2];
	 		$ToatalCount=$cnt[1]+$cnt[2];
	 		
	 		$RegistrationTotal=$RegistrationTotal+$RegistrationCount;
		   	$AdmissionTotal=$AdmissionTotal+$AdmissionCount;
		   	$StudentTotal=$StudentTotal+$ClassWiseCount;
		   	$GrandTotal=$GrandTotal+$ToatalCount;	 		
   	?>
   	<tr>
		   <td   align="center" width="374" class="style11" >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		  
		 
			<td   align="center"   width="375" class="style11" >
			<font face="Cambria" size="3"><?php echo $Class;?></font>
			</td>
		  
		 
			<td   align="center"   width="375" class="style11" >
			<font face="Cambria" size="3"><?php echo $RegistrationCount;?></font></td>   		   
			<td   align="center"   width="375" class="style11" ><font face="Cambria" size="3"><?php echo $AdmissionCount;?></font></td>
			<td   align="center"   width="375" class="style11" ><font face="Cambria" size="3"><?php echo $ClassWiseCount;?></font></td>
			<td   align="center"   width="375" class="style11" ><font face="Cambria" size="3"><?php echo $ToatalCount;?></font></td>
   	</tr>
   	<?php
   			//$TotalCollection=$TotalCollection+$Amount;
   		$RecCount=$RecCount+1;
   		}
   	?>
   	<?php
   	while($cnt= mysql_fetch_array($result1))
 		{
	 		$Class=$cnt[0];
	 		$RegistrationCount=$cnt[1];
	 		
	 		$ssql="select count(*) from `student_master` where `sclass` like '%".$Class."%'";
	 		
	 		$reStudentCnt=mysql_query($ssql);
			while($row= mysql_fetch_array($reStudentCnt))
 			{
 				$ClassWiseCount=$row[0];
 				break;
 			}
 			
			$ssql="select count(*) from `NewStudentAdmission` where `sclass` like '%".$Class."%'";
	 		$reAdmissionCnt=mysql_query($ssql);
			while($row1= mysql_fetch_array($reAdmissionCnt))
 			{
 				$AdmissionCount=$row1[0];
 				break;
 			}
	 		
	 		
	 		$ToatalCount=$ClassWiseCount+$AdmissionCount;
	 		
	 		$RegistrationTotal=$RegistrationTotal+$RegistrationCount;
		   	$AdmissionTotal=$AdmissionTotal+$AdmissionCount;
		   	$StudentTotal=$StudentTotal+$ClassWiseCount;
		   	$GrandTotal=$GrandTotal+$ToatalCount;	 		
   	?>
   	<tr>
		   <td   align="center" width="374" class="style11" >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		  
		 
			<td   align="center"   width="375" class="style11" >
			<font face="Cambria" size="3"><?php echo $Class;?></font>
			</td>
		  
		 
			<td   align="center"   width="375" class="style11" >
			<font face="Cambria" size="3"><?php echo $RegistrationCount;?></font></td>   		   
			<td   align="center"   width="375" class="style11" ><font face="Cambria" size="3"><?php echo $AdmissionCount;?></font></td>
			<td   align="center"   width="375" class="style11" ><font face="Cambria" size="3"><?php echo $ClassWiseCount;?></font></td>
			<td   align="center"   width="375" class="style11" ><font face="Cambria" size="3"><?php echo $ToatalCount;?></font></td>
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
			<font face="Cambria" size="3"><?php echo $RegistrationTotal;?></font></td>   		   
   		   			   
		 
			<td   align="center"   width="375" class="style10" ><?php echo $AdmissionTotal;?></td> 
   		   			   
		 
			<td   align="center"   width="375" class="style10" >
			<font face="Cambria" size="3"><?php echo $StudentTotal;?></font>
			</td>   		   
   		   			   
		 
			<td   align="center"   width="375" class="style10" >
			<font face="Cambria" size="3"><?php echo $GrandTotal;?></font>
			</td>   		   
   		   			   
   	</tr>
  
   	</table><br>dsf   	
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
   		