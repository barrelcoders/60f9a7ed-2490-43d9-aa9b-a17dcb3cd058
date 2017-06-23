<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
	if($_REQUEST["isSubmit"]=="yes")
	{
		$ssql1="SELECT `routeno`,`sname`,`sfathername`,`sadmission`,`sclass`,`srollno`,`MasterClass`,`SchoolId` FROM `student_master` where 1=1";
		if ($_REQUEST["cboRouteNo"] !="")
		{
			$routeno=$_REQUEST["cboRouteNo"];
			$ssql1=$ssql1. " and `routeno` !='' and `routeno` !='Select One' and `routeno`='$routeno'";
			//$result=mysql_query($ssql1);
		}
		
		if($_REQUEST["cboSchool"] !="Select One")
		{
			$SchoolId=$_REQUEST["cboSchool"];
			$ssql1=$ssql1. " and `SchoolId`='$SchoolId'";
		}
		//echo $ssql1;
		//exit();
		$result=mysql_query($ssql1);
	}
	
	$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
	$ssql="SELECT distinct `routeno` FROM `student_master` WHERE `Routeno` !='' and `routeno` !='Select One'  order by `routeno`";
	$rsRouteNo=mysql_query($ssql);
?>
<script language="javascript">
	function Validate()
	{
		if(document.getElementById("cboRouteNo").value=="")
		{
			alert("Route No is mandatory!");
			return;
		}
		document.getElementById("frmRpt").submit();
	}
</script>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Route Wise Report</title>


</head>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>

<body>
<div>

					<strong><font face="Cambria" size="3"><br>Route wise Report</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a>


</body></html>

<?php

?>


   	
    </font></p>	
    
    </table>
   	
<div align="center" id="MasterDiv">
<div class="style14">
	<table style="width: 600px" class="style15">
	<form name="frmRpt" id="frmRpt" method="post" action="">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
		<tr>
			<td style="width: 200px" class="style16">Route Type</td>
			<td style="width: 200px">
			<select name="cboRouteNo" id="cboRouteNo" class="text-box">
			<option selected="" value="">Select One</option>
			<?php
			while($row= mysql_fetch_array($rsRouteNo))
 			{
	 			$RouteNo=$row[0];
	 		?>
	 		<option value="<?php echo $RouteNo;?>"><?php echo $RouteNo;?></option>
	 		<?php
	 		}
	 		?>
			</select></td>
			<td style="width: 200px">
			&nbsp;</td>
		</tr>	
		<tr>
			<td style="width: 200px" class="style16">School Name</td>
			<td style="width: 200px">
				<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select></td>
			<td style="width: 200px">
			<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();" class="text-box"></td>
		</tr>	
	</form>
	</table>
<style type="text/css">
.style6 {
	border: 1px solid #000000;
	font-face: Cambria;
		align: center;
		font-family: Cambria;
	font-weight: bold;
}
.style9 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
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
.style14 {
	text-align: left;
}
.style15 {
	border-collapse: collapse;
}
.style16 {
	font-family: Cambria;
	font-size: 12pt;
}
</style>

   	</div>
   	<table class="CSSTableGenerator" cellpadding="0" >

<tr>
		   <td   align="center" class="style12" bgcolor="#95C23D" style="width: 42px"   >
			<font face="Cambria" size="3">Sr No</font></td>
		   
		  
			<td   align="center" class="style6" bgcolor="#95C23D" style="width: 115px" >
			Route No.</td>
		   
		  
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 115px" >
			<font face="Cambria" size="3">School Id </font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 115px" >
			<font face="Cambria" size="3">Student Name</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 115px" >
			<font face="Cambria" size="3">Father&#39;s Name</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 115px" >
			<font face="Cambria" size="3">Admission Id</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			<font face="Cambria" size="3">Class</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			<font face="Cambria" size="3">Roll No</font></td>
   		  
   		 
   		   

		   			   
   	</tr>
	<?php
		$RecCount=1;
		while($cnt= mysql_fetch_array($result))
 		{
	 		$routeno=$cnt[0];
	 		$sname=$cnt[1];
	 		$fname=$cnt[2];
	 		$sadmission=$cnt[3];
	 		$sclass=$cnt[4];
	 		$srollno=$cnt[5];
	 		$SchoolId=$cnt[6];
	 		
	?>
   	<tr>
		    <td  align="center" class="style11" style="width: 42px"><font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
			<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $routeno;?></font></td>
		  	<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $SchoolId;?></font></td>   		   
		  	<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $sname;?></font></td>   		   
			<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $fname;?></font></td>
			<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $sadmission;?></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><?php echo $sclass;?></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><?php echo $srollno;?></font></td>

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
   		