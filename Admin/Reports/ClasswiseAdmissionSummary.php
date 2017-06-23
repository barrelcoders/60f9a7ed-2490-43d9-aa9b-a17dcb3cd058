<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
	$currentdate1=date("d-m-Y");
	
		if($_REQUEST["cboSchool"]!="All")
		{
			/*
			if($_REQUEST["cboSchool"]=="Ankur")
			{
				$ssql="SELECT DISTINCT a.`MasterClass` ,(SELECT COUNT( * ) FROM  `NewStudentRegistration` WHERE  `MasterClass` = a.`MasterClass` and `RegistrationNo` like 'A%') AS  `RegistrationCount` ,(SELECT COUNT( * ) FROM `NewStudentAdmission` WHERE  `MasterClass` = a.`MasterClass` and `RegistrationNo` like 'A%') AS  `AdmissionCount`,(SELECT COUNT( * ) FROM  `student_master` WHERE  `MasterClass` = a.`MasterClass` AND `sadmission` like 'A%'  and `sadmission` NOT IN (SELECT DISTINCT  `sadmission` FROM  `NewStudentAdmission`)) AS  `StudentCount` FROM  `class_master` AS  `a` where `SchoolName`='Ankur'";	
			}
			else
			{
				$ssql="SELECT DISTINCT a.`MasterClass` ,(SELECT COUNT( * ) FROM  `NewStudentRegistration` WHERE  `MasterClass` = a.`MasterClass` and `RegistrationNo` like 'J%') AS  `RegistrationCount` ,(SELECT COUNT( * ) FROM `NewStudentAdmission` WHERE  `MasterClass` = a.`MasterClass` and `RegistrationNo` like 'J%') AS  `AdmissionCount`,(SELECT COUNT( * ) FROM  `student_master` WHERE  `MasterClass` = a.`MasterClass` AND `sadmission` like 'J%'  and `sadmission` NOT IN (SELECT DISTINCT  `sadmission` FROM  `NewStudentAdmission`)) AS  `StudentCount` FROM  `class_master` AS  `a` where `SchoolName`='JPS'";
			}
			*/
			
			$SelectedSchoolId=$_REQUEST["cboSchool"];
			$rsPreFix=mysql_query("select `PREFIX`,`SchoolId` from `SchoolConfig` where `SchoolId`='$SelectedSchoolId'");
			while($row = mysql_fetch_row($rsPreFix))
			{
				$PreFix=$row[0];
				$SchoolId=$row[1];
				break;
			}

			
			$ssql="SELECT DISTINCT a.`MasterClass` ,(SELECT COUNT( * ) FROM  `NewStudentRegistration` WHERE  `MasterClass` = a.`MasterClass` and `RegistrationNo` like '" . $PreFix."%') AS  `RegistrationCount` ,(SELECT COUNT( * ) FROM `NewStudentAdmission` WHERE  `MasterClass` = a.`MasterClass` and `RegistrationNo` like '".$PreFix."%') AS  `AdmissionCount`,(SELECT COUNT( * ) FROM  `student_master` WHERE  `MasterClass` = a.`MasterClass` AND `sadmission` like '".$PreFix."%'  and `sadmission` NOT IN (SELECT DISTINCT  `sadmission` FROM  `NewStudentAdmission`)) AS  `StudentCount` FROM  `class_master` AS  `a` where `class` in (select distinct `Class` from `SchoolConfig` where `SchoolId`='$SchoolId')";
			//echo $ssql;
			//exit();
			$result=mysql_query($ssql);
		}
		else
		{
			$ssql="SELECT DISTINCT a.`MasterClass` ,(SELECT COUNT( * ) FROM  `NewStudentRegistration` WHERE  `MasterClass` = a.`MasterClass`) AS  `RegistrationCount` ,(SELECT COUNT( * ) FROM `NewStudentAdmission` WHERE  `MasterClass` = a.`MasterClass`) AS  `AdmissionCount`,(SELECT COUNT( * ) FROM  `student_master` WHERE  `MasterClass` = a.`MasterClass` and `sadmission` NOT IN (SELECT DISTINCT  `sadmission` FROM  `NewStudentAdmission`)) AS  `StudentCount` FROM  `class_master` AS  `a`";
		}
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");	
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

<title>Classwise Admission Summary</title>


</head>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	
<link rel="stylesheet" type="text/css" href="../css/style.css" />

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
<form method="post" action="" name="frmReport" id="frmReport">   	
    <table id="table3" class="style1" style="width:100%; " cellspacing="0" cellpadding="0">
    	
    		<tr>
   	<td width="50%">
   	<p>
	<font face="Cambria">Select School : 
			






				<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="All">All</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select></font></td>

<td width="562">

<font face="Cambria">
<input type="button" value="Submit" name="btnSubmit" class="text-box" onclick="Javascript:Validate();"></font></td>

</tr>
</table>
</form>
<br>
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
<span style="font-size: 14pt">
<?php echo $SchoolName; ?><br>
</span>
<b><font face="Cambria">Classwise Admission Summary</font></b><br>
   	<table width="100%" cellpadding="0" class="CSSTableGenerator">

<tr>
		   <td   align="center" width="374" class="style12" bgcolor="#95C23D" style="border-bottom-style: none; border-bottom-width: medium"   >
			<span style="font-weight: 400">
			<font face="Cambria" size="3">Sr No</font></span></td>
		   
		  
			<td   align="center"   width="375" class="style6" bgcolor="#95C23D" style="border-bottom-style: none; border-bottom-width: medium" >
			<span style="font-weight: 400">Class</span></td>
		   
		  
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" style="border-bottom-style: none; border-bottom-width: medium" >
			<span style="font-weight: 400">
			<font face="Cambria" size="3">Registration Count</font></span></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" style="border-bottom-style: none; border-bottom-width: medium" >
			<span style="font-weight: 400">
			<font face="Cambria" size="3">Admission Count</font></span></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" style="border-bottom-style: none; border-bottom-width: medium" >
			<span style="font-weight: 400">
			<font face="Cambria" size="3">Old Student Count</font></span></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center"   width="375" class="style12" bgcolor="#95C23D" style="border-bottom-style: none; border-bottom-width: medium" >
			<span style="font-weight: 400">
			<font face="Cambria" size="3">Total</font></span></td>
   		  
   		 
   		   
	
		   

		   			   
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
	 		$RegistrationCount=$cnt[1];
	 		$AdmissionCount=$cnt[2];
	 		$ClassWiseCount=$cnt[3]; 		
	 		
	 		$ToatalCount=$cnt[2]+$cnt[3];
	 		
	 		$RegistrationTotal=$RegistrationTotal+$RegistrationCount;
		   	$AdmissionTotal=$AdmissionTotal+$AdmissionCount;
		   	$StudentTotal=$StudentTotal+$ClassWiseCount;
		   	$GrandTotal=$GrandTotal+$ToatalCount;	 		
   	?>
   	<tr>
		   <td   align="center" width="374" class="style11" style="border-top-style: none; border-top-width: medium" >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		  
		 
			<td   align="center"   width="375" class="style11" style="border-top-style: none; border-top-width: medium" >
			<font face="Cambria" size="3"><?php echo $Class;?></font>
			</td>
		  
		 
			<td   align="center"   width="375" class="style11" style="border-top-style: none; border-top-width: medium" >
			<font face="Cambria" size="3"><?php echo $RegistrationCount;?></font></td>   		   
			<td   align="center"   width="375" class="style11" style="border-top-style: none; border-top-width: medium" ><font face="Cambria" size="3"><?php echo $AdmissionCount;?></font></td>
			<td   align="center"   width="375" class="style11" style="border-top-style: none; border-top-width: medium" ><font face="Cambria" size="3"><?php echo $ClassWiseCount;?></font></td>
			<td   align="center"   width="375" class="style11" style="border-top-style: none; border-top-width: medium" ><font face="Cambria" size="3"><?php echo $ToatalCount;?></font></td>
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
  
   	</table>
   	<br>
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
   		