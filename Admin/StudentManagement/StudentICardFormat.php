<?php
session_start();
include '../../connection.php';
include '../../Header/Header5.php';
include '../../../AppConf.php'
?>
<?php
$Class=$_REQUEST["txtClass"];
$rsStudent=mysql_query("SELECT `sadmission`,`sclass`,`srollno`,`sname`,`DOB`,`sfathername`,`MotherName`,`Address`,`smobile`,`routeno` FROM `student_master` WHERE `sclass`='$Class' ORDER BY CAST(`srollno` AS UNSIGNED)");
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Result Sheet</title>
<style>
<!--

.style2 {
	border-style: solid;
	border-width: 1px;
}
.style3 {
	font-weight: bold;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	border-width: 0px;
}
-->
</style>
</head>

<body>

<div id="MasterDiv">
<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td align="center" colspan="3"><font face="Cambria"><?php echo $SchoolName1;?></font></td>
	</tr>
	<tr>
		<td align="center" colspan="3"><b><font face="Cambria" size="4">Student 
		I-Card Sheet</font></b></td>
	</tr>
	<tr>
		<td align="center" colspan="3"><b><font face="Cambria" size="4">Session: 2016-2017</font></b></td>
	</tr>
	<tr>
		<td align="center" width="42%">
		<p align="left"><font face="Cambria"><b>Class &amp; Section : <?php echo $Class ?></b></font></td>
		<td align="center" width="29%">
		<p align="left"><font face="Cambria"><b>Class Teacher : </b></font></td>
		<td align="center" width="29%">
		<b>I-Card Sheet</b></td>
	</tr>

</table>
<font face="Cambria">
<br>
</font>
<table  bordercolordark="#000000" bordercolor="#000000" height="711" style="height: 73px" class="style4" >
	<tr>
		<td align="center" class="style3"><font face="Cambria">Adm No</font></td>
		<td align="center" class="style3">Class</td>
		<!--<td width="7%" align="center"><font face="Cambria">Board Roll No.</font></b></td>-->
		<!--<td width="7%" align="center"><font face="Cambria">CBSE Roll No.</font></b></td>-->
		<td align="center" class="style3">Roll No</td>
		<td align="center" class="style3">Name</td>
		<td  align="center" class="style3">DOB</td>
		<td align="center" class="style2"><font face="Cambria">Father Name</font></td>
		<td align="center" class="style2"><font face="Cambria">Mother Name</font></td>
		<td  align="center" class="style2"><font face="Cambria">Address</font></td>
		<td  align="center" class="style2"><font face="Cambria">Mobile No.</font></td>
		<td  align="center" class="style2"><font face="Cambria">Route No.</font></td>
		<td  align="center" class="style2"><font face="Cambria">Blood Group</font></td>
		<td  align="center" class="style2" style="width: 120px"><font face="Cambria">Student Photo</font></td>
		<td  align="center" class="style2" style="width: 120px"><font face="Cambria">Father Photo</font></td>
		<td align="center" class="style2" style="width: 120px"><font face="Cambria">Mother Photo</font></td>
			
	</tr>
	
	
	
	<?php
	$recno=0;
	while($row=mysql_fetch_row($rsStudent))
	{
		//$sadmission=$row[0];
		//$sname=$row[1];
		//$srollno=$row[2];
		
		$sadmission=$row[0];
		$sclass=$row[1];
		$srollno=$row[2];
		$sname=$row[3];
		$DOB=$row[4];
		$sfathername=$row[5];
		$MotherName=$row[6];
		$Address=$row[7];
		$smobile=$row[8];
		$routeno=$row[9];
		$recno=$recno+1;
		
		
		
?>
	<tr>
		<td align="center" class="style2"><font face="Cambria"><?php echo $sadmission;?></font></td>
		<td align="center" class="style2"><font face="Cambria"><?php echo $sclass;?></font></td>
		<!--<td width="7%" align="center"><font face="Cambria">&nbsp;</font></td>-->
		<td align="center" class="style2"><font face="Cambria"><?php echo $srollno;?></font></td>
		<td align="left" class="style2"><font face="Cambria"><?php echo $sname;?></font></td>
		
		<td align="center" class="style2"><font face="Cambria"><?php echo $DOB;?></font></td>
		<td align="center" class="style2"><font face="Cambria"><?php echo $sfathername;?></font></td>
		
		<td align="center" class="style2"><font face="Cambria"><?php echo $MotherName;?></font></td>
		<td align="center" class="style2"><font face="Cambria"><?php echo $Address;?></font></td>
		
	    <td align="center" class="style2"><font face="Cambria"><?php echo $smobile;?></font></td>
		<td align="center" class="style2"><font face="Cambria"><?php echo $routeno;?></font></td>
		<td align="center" class="style2"><font face="Cambria">Blood Group</font></td>
		
		
        <td align="center" class="style2"><font face="Cambria">
		<img src="White.png" width="149" height="184"></font><p>
		<font face="Cambria">(Student Photo)</font></td>
		<td align="center" class="style2"><font face="Cambria">
		<img src="White.png" width="138" height="183"></font><p>
		<font face="Cambria">(Father Photo)</font></td>
		
        <td align="center" class="style2"><font face="Cambria">
		<img src="White.png" width="128" height="179"></font><p>
		<font face="Cambria">(Mother Photo)</font></td>
		
	</tr>
	<?php
	}
	?>
	
</table>
<br>
<br>
<br>

<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td align="center">____________</td>
		<td align="center">___________</td>
		<td align="center">____________</td>
		<td align="center">_____________</td>
		<td align="center">___________</td>
	</tr>
	<tr>
		<td>
		<p align="center"><font face="Cambria">Class Teacher</font></td>
		<td>
		<p align="center"><font face="Cambria">Coordinator</font></td>
		<td>
		<p align="center"><font face="Cambria">Headmistress</font></td>
		<td>
		<p align="center"><font face="Cambria">Vice Principal</font></td>
		<td>
		<p align="center"><font face="Cambria">Principal</font></td>
	</tr>
</table>
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
