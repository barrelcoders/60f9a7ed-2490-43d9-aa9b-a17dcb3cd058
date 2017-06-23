<?php
include '../../connection.php';
include '../../AppConf.php';
?>
<?php
$Class=$_REQUEST["Class"];
$ExamType=$_REQUEST["ExamType"];
$rs=mysql_query("select `sadmission`,`sname`,(select `sfathername` from `student_master` where `sadmission`=a.`sadmission`) as `fathername`,`class`,`RollNo`,`examtype`,`AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`StarRating`,`NumeracyGrade`,`NumeracyIndicatorValue`,`EnvironmentGrade`,`EnvironmentIndicatorValue` from `reportcard_Class1and2_values` as `a` where `class`='$Class' and `Approval`='Approve'");
?>
<script language="javascript">
	
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
<div id="MasterDiv">
<style type="text/css">
.style1 {
	font-family: Cambria;
}
.style3 {
	text-align: center;
	font-family: Cambria;
}
</style>

<?php
$studentcount=1;
while($row=mysql_fetch_row($rs))
{
	$sadmission=$row[0];
	$sname=$row[1];
	$fathername=$row[2];
	$class=$row[3];
	$RollNo=$row[4];
	$examtype=$row[5];
	$AssignmentGrade=$row[6];
	$AssignmentIndicatorValue=$row[7];
	$PencilGrade=$row[8];
	$PenPencilIndicatorValue=$row[9];
	$StarRating=$row[10];
	$StarString="";
	for($i=1;$i<=$StarRating;$i++)
	{
		$StarString=$StarString."<img src='star.png' height='20' width='20'>";
	}
	
	$NumeracyGrade=$row[11];
	$NumeracyIndicatorValue=$row[12];
	$EnvironmentGrade=$row[13];
	$EnvironmentIndicatorValue=$row[14];
	
	$sstrOneStudent="";
	
	
?>
<?php
$sstrOneStudent='
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td colspan="5">
		<p align="center"><font face="Cambria">
		<img src= "../images/logo.png" width="370" height="85"></font></p></td></tr>
		
			<tr><td colspan="5" align="center"><font face="cambria" style="font-size: 11pt;">'.$SchoolAddress."<br>Ph. ".$SchoolPhoneNo.'</font></td></tr>

	<tr>
		<td colspan="5">
		<p align="center"><b><font face="Cambria">Assessment Of Evaluation I - 
		(2015 - 16)</font></b></td></tr>
		
	
	
	<tr>
		<td width="45" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" style="font-size: 11pt;">Name</font></b></td>
		<td width="369" style="border-left-style: none; border-left-width: medium">: <span class="style1"><font face="Cambria" style="font-size: 11pt;">'.$sname.'</font></span></td>
		<td width="106" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" style="font-size: 11pt;">Father Name</font></b></td>
		<td width="335" style="border-left-style: none; border-left-width: medium">: <span class="style1"><font face="Cambria" style="font-size: 11pt;">'.$fathername.'</font></span></td>
		<td width="374" rowspan="2" class="style1" align="center"><img src="PassportPic.jpg" width="100" height="100"></td>
	</tr>
	
	<tr>
		<td width="45" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" style="font-size: 11pt;">Class</font></b></td>
		<td width="369" style="border-left-style: none; border-left-width: medium">: <span class="style1"><font face="Cambria" style="font-size: 11pt;">'.$class.'</font></span></td>
		<td width="106" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" style="font-size: 11pt;">Roll No</font></b></td>
		<td width="335" style="border-left-style: none; border-left-width: medium">: <span class="style1"><font face="Cambria" style="font-size: 11pt;">'.$RollNo.'</font></span></td>
	</tr>
</table>

<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top-width:0px">
	<tr>
		<td align="center" width="203" bgcolor="#FFFFFF"><p align="left"><font face="Cambria" color="#000000" style="font-size: 11pt;"><b>Area of Evaluation</b></font></td>
		<td align="center" width="656" bgcolor="#FFFFFF" colspan="2"><b><font face="Cambria" color="#000000" style="font-size: 11pt;">Assessment &amp; Observation</font></b></td>
		<td align="center" bgcolor="#FFFFFF" style="width: 89px"><font face="Cambria" color="#000000" style="font-size: 11pt;"><b>Compliments</b></font></td>
	</tr>
	<tr>
		<td width="203"><font face="Cambria" style="font-size: 11pt;">Assignments &amp; Projects</font></td>
		<td width="656" class="style1" colspan="2"><font face="Cambria" style="font-size: 11pt;">'.$AssignmentIndicatorValue.'</font></td>
		<td width="89">'.$StarString.'</td>
	</tr>
	<tr>
		<td width="203"><font face="Cambria" style="font-size: 11pt;">Pencil Paper Assessment</font></td>
		<td width="656" class="style1" colspan="2"><font face="Cambria" style="font-size: 11pt;">'.$PenPencilIndicatorValue.'</font></td>
		<td width="89">'.$StarString.'</td>
	</tr>
	<tr>
		<td width="203"><font face="Cambria" style="font-size: 11pt;">Numeracy Concepts</font></td>
		<td width="656" class="style1" colspan="2"><font face="Cambria" style="font-size: 11pt;">'.$NumeracyIndicatorValue.'</font></td>
		<td width="89">'.$StarString.'</td>
	</tr>
	<tr>
		<td width="203"><font face="Cambria" style="font-size: 11pt;">Self and Environment</font></td>
		<td width="656" class="style1" colspan="2"><font face="Cambria" style="font-size: 11pt;">'.$EnvironmentIndicatorValue.'</font></td>
		<td width="89">'.$StarString.'</td>
	</tr>
</table>
<br>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse">
	<tr>
		<td width="559" style="border-style: none; border-width: medium"><b><font face="Cambria">Class Teacher</font></b></td>
		<td width="560" style="border-style: none; border-width: medium">
		<p align="center"><b><font face="Cambria">Scholastic Coordinator</font></b></td>
		<td width="560" style="border-style: none; border-width: medium" align="center"><p align="right"><b><font face="Cambria">Principal</font></b></td>
	</tr>
	<tr>
		<td width="559" style="border-style: none; border-width: medium">_______________</td>
		<td width="560" style="border-style: none; border-width: medium">
		<p align="center">_______________</td>
		<td width="560" style="border-style: none; border-width: medium"><p align="right"><img src="PrincipalSignature.png"></td>
	</tr>
</table><br>';
echo $sstrOneStudent;
echo '<p style="page-break-before: always">';
}//end of loop for one student
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 
</font> 
	
</div>