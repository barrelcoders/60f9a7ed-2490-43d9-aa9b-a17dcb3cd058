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
	
	$SchoolId=$_REQUEST["cboSchool"];
	
	if($_REQUEST["DateFrom"] !="")
	{
		
		$ssql="SELECT DISTINCT `sclass`,count(*),SUM(`RegistrationFeePaid`) FROM `RegistrationFees` where `date`>='$DateFrom' and `date`<='$DateTo' ";
	}
	else
	{
		$ssql="SELECT DISTINCT `sclass`,count(*),SUM(`RegistrationFeePaid`) FROM `RegistrationFees` ";
	}
	if($SchoolId !="All")
	{
		$ssql=$ssql. " and `SchoolId`='$SchoolId'";
	}
	
	$ssql=$ssql." GROUP BY `sclass`";
	$result=mysql_query($ssql);
}
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
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

<title>Classwise Registration Summary</title>

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
.style3 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	text-align: right;
	font-family: Cambria;
}
.style4 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	font-family: Cambria;
}
.style5 {
	font-family: Cambria;
}
.style6 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	align: center;
	font-family: Cambria;
}
</style>

</head>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

<body>
				<div>

					<strong><font face="Cambria" size="3"><br>Classwise Registration Summary</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a>


</body></html>

<?php

?>


   	
    </font></p>	
    
    </table>
   	
    <div align="center">
   	
    <table id="table3" class="CSSTableGenerator" cellspacing="0" cellpadding="0">
 <form name="frmRpt" id="frmRpt" method="post">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

<tr>
		   <td   align="center" width="374" class="style2">
		   <span class="style5"><strong>Date From :</strong></span>&nbsp; <input type="text" name="DateFrom" id="DateFrom" size="20" class="tcal">
			</td>
		   
		  
			<td   align="center"   width="375" class="style2" colspan="2" style="width: 750px" >
			<span class="style5"><strong>To Date :</strong></span> <input type="text" name="DateTo" id="DateTo" size="20" class="tcal">
			</td>
   		   <td   align="center" width="375" class="style2"  >
			<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" class="text-box"></td>
   		 
   		   
	
		   

		   			   
   	</tr>
   	

<tr>
		   <td   align="center" width="374" class="style4">
		   <strong>School</strong></td>
		   
		  
			<td   align="center"   width="375" class="style2" colspan="2" style="width: 750px" >







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
				</select></td>
   		   <td align="center" width="375" class="style2">
			</td>
</tr>
</form>

<tr>
		   <td   align="center" width="374" class="style2"   >
			<font face="Cambria" size="3">Sr No</font></td>
		   
		  
			<td   align="center"   width="375" class="style6" >
			Class</td>
		   
		  
			<td   align="center"   width="375" class="style2" >
			<font face="Cambria" size="3">Count</font></td>
   		   <td   align="center" width="375" class="style2"  >
			<font face="Cambria" size="3">Total Registration Fees Collected</font></td>
   		 
   		   
	
		   

		   			   
   	</tr>
   	<?php
   	$RecCount=1;
   	$TotalCollection=0;
   		while($cnt= mysql_fetch_array($result))
 		{
 		$Class=$cnt[0];
 		$Cnt=$cnt[1];
 		$Amount=$cnt[2];
   	?>
   	<tr>
		   <td   align="center" width="374" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		  
		 
			<td   align="center"   width="375" class="style2" >
			<font face="Cambria" size="3"><?php echo $Class;?></font>
			</td>
		  
		 
			<td   align="center"   width="375" class="style2" >
			<font face="Cambria" size="3"><?php echo $Cnt;?></font></td>
   		   <td   align="center" width="375" class="style2"  >
			<font face="Cambria" size="3"><?php echo $Amount;?></font></td>
   		   			   
   	</tr>
   	<?php
   			$TotalCollection=$TotalCollection+$Amount;
   		$RecCount=$RecCount+1;
   		}
   	?>
   	<tr>
		   <td width="374" class="style3" colspan="3" style="width: 749px"   >
			<strong>Total Amount:</strong></td>
		  
		 
   		   <td   align="center" width="375" class="style4"  >
			<strong><?php echo $TotalCollection;?></strong></td>
   		  

		 
		   

		   			   
   	</tr>
   	</table>
   		</div>

   		