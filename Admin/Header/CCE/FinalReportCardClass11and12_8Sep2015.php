<head>
<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	border-collapse: collapse;
	border-width: 0px;
}
</style>
</head>

<?php
include '../../connection.php';
include '../../AppConf.php';
?>
<?php
$SelectedClass=$_REQUEST["Class"];

$ssql="select distinct `sadmission`,`sname`,`sclass`,`srollno`,(select `sfathername` from `student_master` where `sadmission`=a.`sadmission`) as `fathername` from `reportcard_Class11and12_values` as `a` where `sclass`='$SelectedClass'";
//`subject`,`testtype`,`TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained`

$rs=mysql_query($ssql);
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
<?php
while($row=mysql_fetch_row($rs))
{
	$sadmission=$row[0];
	$sname=$row[1];
	$sclass=$row[2];
	$srollno=$row[3];
	$fathername=$row[4];
	$rsSubject=mysql_query("select distinct `subject` from `reportcard_Class11and12_values` where `sadmission`='$sadmission'");
	
	$strOneStudent="";
?>
<?php
$strOneStudent=$strOneStudent.'
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td colspan="5">
		<p align="center"><font face="Cambria">
		<img src= "../images/logo.png" width="370" height="85"></font></p></td></tr>
		
			<tr><td colspan="5" align="center"><font face="cambria" >'.$SchoolAddress.'</font></td></tr>

	<tr>
		<td colspan="5">
		<p align="center"><b><font face="Cambria">Assessment Of Assessment I - 
		(2015 - 16)</font></b></td></tr>
		
	
	
	<tr>
		<td width="45" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria">Name</font></b></td>
		<td width="369" style="border-left-style: none; border-left-width: medium">
		: '.$sname.'</td>
		<td width="106" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria">Father Name</font></b></td>
		<td width="335" style="border-left-style: none; border-left-width: medium">: '.$fathername.'</td>
	</tr>
	
	<tr>
		<td width="45" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria">Class</font></b></td>
		<td width="369" style="border-left-style: none; border-left-width: medium">: '.$fathername.'</td>
		<td width="106" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria">Roll No</font></b></td>
		<td width="335" style="border-left-style: none; border-left-width: medium">: '.$srollno.'</td></tr></table>

<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top-width:0px">
	<tr>
		<td align="center" colspan="9" style="border-top-style: none; border-top-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" width="165" bgcolor="#339933">
		&nbsp;</td>
		<td align="center" width="639" bgcolor="#339933" colspan="2">
		<font face="Cambria" color="#FFFFFF"><b>UT</b></font></td>
		<td align="center" width="764" bgcolor="#339933" colspan="4">
		<b><font face="Cambria" color="#FFFFFF">Term 1</font></b></td>
		<td align="center" width="166" bgcolor="#339933" colspan="2">
		<font face="Cambria" color="#FFFFFF"><b>Term1 + UT</b></font></td>
	</tr>
	<tr>
		<td width="165">
		<p align="center">
		<b><font face="Cambria">Subject</font></b></td>
		<td width="330" align="center" colspan="2">&nbsp;</td>
		<td width="402" colspan="2" align="center"><font face="Cambria"><b>
		Theory</b></font></td>
		<td width="401" colspan="2" align="center"><font face="Cambria"><b>
		Practical</b></font></td>
		<td width="166" colspan="2">
		<p align="center"><font face="Cambria"><b>Total</b></font></td>
	</tr>
	<tr>
		<td width="165" class="style1">&nbsp;</td>
		<td width="165" align="center"><b><font face="Cambria">M.M</font></b></td>
		<td width="165" align="center"><b><font face="Cambria">M.O</font></b></td>
		<td width="166" align="center"><font face="Cambria"><b>M.M</b></font></td>
		<td width="166" align="center"><font face="Cambria"><b>M.O</b></font></td>
		<td width="166" align="center"><font face="Cambria"><b>M.M</b></font></td>
		<td width="166" align="center"><font face="Cambria"><b>M.O</b></font></td>
		<td width="83" align="center"><b><font face="Cambria">M.M</font></b></td>
		<td width="83" align="center"><b><font face="Cambria">M.O</font></b></td>
	</tr>';
	?>
	<?php
	while($rowS=mysql_fetch_row($rsSubject))
	{
		$Subject=$rowS[0];
		$UTTheoryMaxMarks="";
		$UTTheoryMarksObtained="";
		$UTPracticalMaxMarks="";
		$UTPracticalMarksObtained="";
		
		$Term1TheoryMaxMarks="";
			$Term1TheoryMarksObtained="";
			$Term1PracticalMaxMarks="";
			$Term1PracticalMarksObtained="";
		
		$rsUT=mysql_query("select `TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained` from `reportcard_Class11and12_values` where `sadmission`='$sadmission' and `subject`='$Subject' and `testtype`='UT1'");
		while($rowUT=mysql_fetch_row($rsUT))
		{
			$UTTheoryMaxMarks=$rowUT[0];
			$UTTheoryMarksObtained=$rowUT[1];
			$UTPracticalMaxMarks=$rowUT[2];
			$UTPracticalMarksObtained=$rowUT[3];
			break;
		}
		$rsTerm1=mysql_query("select `TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained` from `reportcard_Class11and12_values` where `sadmission`='$sadmission' and `subject`='$Subject' and `testtype`='Assessment1'");
		while($rowTerm1=mysql_fetch_row($rsTerm1))
		{
			$Term1TheoryMaxMarks=$rowTerm1[0];
			$Term1TheoryMarksObtained=$rowTerm1[1];
			$Term1PracticalMaxMarks=$rowTerm1[2];
			$Term1PracticalMarksObtained=$rowTerm1[3];
			break;
		}
		$TotalMaxMarks=$UTTheoryMaxMarks + $Term1TheoryMaxMarks +$Term1PracticalMaxMarks;
		$TotalObtainedMarks=$UTTheoryMarksObtained+$Term1TheoryMarksObtained+$Term1PracticalMarksObtained;
	?>
	<?php
	$strOneStudent=$strOneStudent.'<tr>
		<td width="165" class="style1">'.$Subject.'</td>
		<td width="165" align="center">'.$UTTheoryMaxMarks.'</td>
		<td width="165" align="center">'.$UTTheoryMarksObtained.'</td>
		<td width="166" align="center">'.$Term1TheoryMaxMarks.'</td>
		<td width="166" align="center">'.$Term1TheoryMarksObtained.'</td>
		<td width="166" align="center">'.$Term1PracticalMaxMarks.'</td>
		<td width="166" align="center">'.$Term1PracticalMarksObtained.'</td>
		<td width="83" align="center">'.$TotalMaxMarks.'</td>
		<td width="83" align="center">'.$TotalObtainedMarks.'</td>
	</tr>';
	}//End of while loop for Subject
	?>
<?php
	$strOneStudent=$strOneStudent.'
</table>
<br>
<table border="1" cellspacing="0" cellpadding="0" style="width: 100%;" class="style2">
	<tr>
		<td width="442" style="border-style: none; border-width: medium">______________</td>
		<td width="442" style="border-style: none; border-width: medium"><p align="center"><img src="CoordinatorSignature.png"></p></td>
		<td width="443" style="border-style: none; border-width: medium"><p align="right"><img src="PrincipalSignature.png"></p></td>

	
	</tr>
	<tr>
		<td width="442" style="border-style: none; border-width: medium">&nbsp;</td>
		<td width="442" style="border-style: none; border-width: medium">&nbsp;</td>
		<td width="443" style="border-style: none; border-width: medium">&nbsp;</td>

	
	</tr>
	<tr>
		<td width="442" style="border-style: none; border-width: medium"><b><font face="Cambria">Class Teacher</font></b></td>
		<td width="442" style="border-style: none; border-width: medium"><p align="center"><b><font face="Cambria">Coordinator</font></b></p></td>
		<td width="443" style="border-style: none; border-width: medium"><p align="right"><font face="Cambria"><b>Principal</b></font></p></td>
	
	</tr>
	</table><br>';
echo $strOneStudent;
mysql_query("insert into `reportcard_htmlcode` (`sadmission`,`sname`,`class`,`ExamType`,`RollNo`,`htmlcode`) values ('$sadmission','$sname','$sclass','Term1','$srollno','$strOneStudent')") or die(mysql_error());
}//End of While Loop for class wise student wise
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 
</font> 
	
</div>