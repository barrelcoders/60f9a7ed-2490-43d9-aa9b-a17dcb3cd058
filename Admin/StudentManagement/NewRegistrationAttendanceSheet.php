<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php'
?>
<?php
$Class=$_REQUEST["txtClass"];

$rsStudent=mysql_query("select distinct `RegistrationNo`,`sname`,`slastname`,`sfathername`,`MotherName` FROM `NewStudentRegistration` WHERE `sclass`='Nursery' and `Sex`='Female' and `FinalScore` >=55");
//echo $rsStudent;
//exit();

?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Result Sheet</title>
<style>
<!--

.style1 {
	font-family: Cambria;
}

.style1 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
-->
</style>
</head>

<body>

<div id="MasterDiv">
<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td align="center"><font face="Cambria"></font></td>
	</tr>
	<tr>
		<td align="center"><b><font face="Cambria" size="4">Delhi Public School</font></b></td>
	</tr>
	<tr>
		<td align="center"><b><font face="Cambria" size="4">Sector 19 - 
		Faridabad</font></b></td>
	</tr>
	<tr>
		<td align="center" width="100%">
		<p><b>CANDIDATES SELECTED FOR DRAW FOR ADMISSIONS 2017 - 18 FOR NURSERY</b><p align="left">&nbsp;</td>
	</tr>

</table>
<font face="Cambria">
<br>
</font>
<table border="1" width="100%"  bordercolordark="#000000" bordercolor="#000000" class="CSSTableGenerator">
	<tr>
		<td width="5%" align="center" class="style1"><b>S.NO</b></td>
		<td width="5%" align="center"><b><font face="Cambria">Reg.No</font></b></td>
		<!--<td width="7%" align="center"><font face="Cambria">Board Roll No.</font></b></td>-->
		<!--<td width="7%" align="center"><font face="Cambria">CBSE Roll No.</font></b></td>-->
		<td width="22%" align="center"><b>Candidates Name</b></td>
		<td width="22%" align="center"><b>Father&#39;s Name</b></td>
		<td  align="center"><b><font face="Cambria">Mother&#39;s Name</font></b></td>
		<td  align="center"><b><font face="Cambria">Attendance</font></b></td>
		<td  align="center" width="14%"><b><font face="Cambria">Signature</font></b></td>
	
	</tr>
	
	
	<?php
	$srno=1;
	while($row=mysql_fetch_row($rsStudent))
	{
		$RegistrationNo=$row[0];
		$sname=$row[1];
		$slastname=$row[2];
		$sfathername=$row[3];
		$MotherName=$row[4];
				
		
		
	?>
	<tr>
		<td width="5%" align="center"><font face="Cambria"><?php echo $srno; ?></font></td>
		<td width="5%" align="left"><font face="Cambria"><?php echo $RegistrationNo;?></font></td>
		<!--<td width="65" align="center"><font face="Cambria">&nbsp;</font></td>-->
		<td width="22%" align="left"><font face="Cambria"><?php echo $sname;?> &nbsp; <?php echo $slastname;?></font></td>
		<td width="22%" align="left"><font face="Cambria"><?php echo $sfathername;?></font></td>
		
		<td width="19%" align="left"><font face="Cambria"> <?php echo $MotherName;?></font></td>
		
		
		
		<td width="11%" align="center"><font face="Cambria">  &nbsp; </font></td>
		
	    <td width="14%" align="center"><font face="Cambria">&nbsp; </font></td>
		
		
		
	</tr>
	<?php
	$srno=$srno+1;}
	?>
</table>
<br>
<br>
<br>

</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a>
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


</font>


</body>

</html>
