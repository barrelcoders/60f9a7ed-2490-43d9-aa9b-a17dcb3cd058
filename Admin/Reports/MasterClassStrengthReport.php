<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
$currentdate1=date("d-m-Y");
if($_REQUEST["cboSchool"]!="")
{
	$School=$_REQUEST["cboSchool"];
	//$ssql="SELECT distinct `MasterClass`,count(*) FROM `student_master` group by `MasterClass`";
	$ssql="SELECT distinct `MasterClass`,count(*) FROM `student_master` where 1=1";
	
	if($School=="Ankur")
	{
		$ssql=$ssql." and `SchoolName`='Ankur'";
	}
	if($School=="JPS")
	{
		$ssql=$ssql." and `SchoolName`='JPS'";
	}
	$ssql=$ssql." group by `MasterClass` order by `MasterClass`";
	$result=mysql_query($ssql);				
}
?>
<script language="javascript">
function Validate()
{
	document.getElementById("frmReport").submit();
	
}
</script>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Admission Summary</title>



<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>

</head>



<body>

				<div>

					<strong><font face="Cambria" size="3"><br>Daily Admission Report</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></body></html><?php

?><br>	
   	
    </font></p>	
    <table id="table3" class="style1" style="width:100%; " cellspacing="0" cellpadding="0">
<form method="post" action="" name="frmReport" id="frmReport">
    	
    		<tr>
   	<td width="50%">
	<font face="Cambria">Select School : 
	<select size="1" name="cboSchool" id="cboSchool">
	<option selected value="All">All</option>
	<option value="Ankur">Ankur</option>
	<option value="JPS">JPS</option>
	</select></font></td>

<td width="562">

<font face="Cambria">
<input type="button" value="Submit" name="btnSubmit" style="font-weight: 700" onclick="Javascript:Validate();"></font></td>

</tr>
</form>

</table>
   	
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


.style3 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	text-align: center;
}


.style4 {
	font-family: Cambria;
	font-size: small;
}
.style5 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	text-align: right;
}
</style>
 <table id="table3" class="style1" style="width:100%; " cellspacing="0" cellpadding="0" >

   	<tr>
		   <td class="style3" colspan="3">
			<span class="style4"><strong><span style="font-size: 14pt"><?php echo $SchoolName; ?><br>
			</span>Master Class wise strength Report<br>Report Date:&nbsp; <?php echo $currentdate1; ?></strong></span><strong> </strong></td>
		   

		   			   
   	</tr>

   	<tr>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="width: 40px">
			<font face="Cambria" size="3">Sr No</font></td>
		   <!--
		   <td   align="center" width="189" class="style2"   bgcolor="#95C23D">
			<font face="Cambria" size="3">Registration No</font></td>
			-->
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="width: 402px">
			<font face="Cambria" size="3">Class</font></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="width: 402px">
			<span class="style4">Count</span>
			</td>
		   
		   

		   			   
   	</tr>
<?php
$RecCount=1;
$Total=0;
while($cnt = mysql_fetch_row($result))
{
	$MasterClass=$cnt[0];
	$Count=$cnt[1];
	$Total=$Total+$Count;
?>

   	<tr>
		   <td   align="center" class="style2" style="width: 40px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <!--
		   <td   align="center" width="189" class="style2"   >
			<font face="Cambria" size="3"><?php //echo $cnt[1];?></font></td>
			-->
			
		   <td   align="center" class="style2" style="width: 402px">
			<font face="Cambria" size="2"><?php echo $MasterClass;?></font> </td>
			<td   align="center" class="style2" style="width: 402px" >
			<font face="Cambria" size="2"><?php echo $Count;?></font></td>
		  
		  
		   

		   			   
   	</tr>
   	<?php
   		$RecCount=$RecCount+1;
   		}
   	?>
  
   	<tr>
		   <td class="style5" colspan="2"   >
			<strong>Total:</strong></td>
			<td   align="center" class="style2" style="width: 402px" >
			<?php echo $Total;?></td>
		  
		  
		   

		   			   
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
   		