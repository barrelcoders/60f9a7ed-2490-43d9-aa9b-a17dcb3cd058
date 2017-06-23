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

$Class12YesNo="";
$pos = strpos($SelectedClass, "12");
if ($pos === false) 
{
	$TotalString="Term1 Total";
	$Class12YesNo="No";
	$ExamType1="UT1 *";
	$ExamType2="Term1 *";
	$Assess1="Assessment Of TermI";
	
	$StarLine="*5% weightage of ut and 10% weightage of term1 to be carried forward for result calculation.";
	
}
else
{
	$Class12YesNo="Yes";
	$TotalString="Total";
	$ExamType1="Test Series1";
	$ExamType2="Preparatory Exam1";
	$Assess1="Assessment Of Term I";
	$StarLine="";
}

//$ssql="select distinct `sadmission`,`sname`,`sclass`,`srollno`,(select `sfathername` from `student_master` where `sadmission`=a.`sadmission`) as `fathername`,(select `MotherName` from `student_master` where `sadmission`=a.`sadmission`) as `MotherName` from `reportcard_Class11and12_values` as `a` where `sclass`='$SelectedClass' and `sadmission`='J5910'";
$ssql="select distinct `sadmission`,`sname`,`sclass`,`srollno`,(select `sfathername` from `student_master` where `sadmission`=a.`sadmission`) as `fathername`,(select `MotherName` from `student_master` where `sadmission`=a.`sadmission`) as `MotherName` from `reportcard_Class11and12_values` as `a` where `sclass`='$SelectedClass'";
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
	$mothername=$row[5];
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
		<p align="center"><b><font face="Cambria">'.$Assess1.' - 
		(2015 - 16)</font></b></td></tr>
		
	
	
	<tr>
		<td width="45" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" size="2">&nbsp;Name</font></b></td>
		<td width="369" style="border-left-style: none; border-left-width: medium"><font face="Cambria" size="2">: '.$sname.'</font></td>
		<td width="141" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" size="2">&nbsp;Father&#39;s Name</font></b></td>
		<td width="300" style="border-left-style: none; border-left-width: medium"><font face="Cambria" size="2">: '.$fathername.'</font></td>
	</tr>';
	
		$strOneStudent=$strOneStudent.'
		<tr>
			<td width="45" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" size="2">&nbsp;Admission No.</font></b></td>
			<td width="369" style="border-left-style: none; border-left-width: medium"><font face="Cambria" size="2">: '.$sadmission.'</font></td>
			<td width="141" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" size="2">&nbsp;Mother&#39;s Name</font></b></td>
			<td width="300" style="border-left-style: none; border-left-width: medium"><font face="Cambria" size="2">: '.$mothername.'</font></td>
		</tr>';
	
	
	$strOneStudent=$strOneStudent.'
	<tr>
		<td width="45" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" size="2">&nbsp;Class</font></b></td>
		<td width="369" style="border-left-style: none; border-left-width: medium"><font face="Cambria" size="2">: '.$sclass.'</font></td>
		<td width="141" style="border-right-style: none; border-right-width: medium"><b><font face="Cambria" size="2">&nbsp;Roll No</font></b></td>
		<td width="300" style="border-left-style: none; border-left-width: medium"><font face="Cambria" size="2">: '.$srollno.'</font></td></tr></table>

<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top-width:0px">
	<tr>
		<td align="center" bgcolor="#FFFFFF" style="width: 126px">&nbsp;</td>
		<td align="center" bgcolor="#FFFFFF" colspan="2" style="width: 608px"><font face="Cambria" color="#000000" size="2"><b>'.$ExamType1.'</b></font></td>
		<td align="center" bgcolor="#FFFFFF" colspan="5" style="width: 733px"><b><font face="Cambria" color="#000000" size="2">'.$ExamType2.'</font></b></td>
		
	</tr>
	<tr>
		<td style="width: 200px"><p align="center"><b><font face="Cambria" size="2">Subject</font></b></td>
		<td align="center" colspan="2" style="width: 225px">&nbsp;</td>
		<td colspan="2" align="center" style="width: 335px"><font face="Cambria" size="2"><b>Theory</b></font></td>
		<td colspan="2" align="center" style="width: 335px"><font face="Cambria" size="2"><b>Practical</b></font></td>
		<td style="width: 197px" align="center"><font face="Cambria" size="2"><b>'.$TotalString.'</b></font></td>
	</tr>
	<tr>
		<td class="style1" style="width: 126px">&nbsp;</td>
		<td align="center" style="width: 126px"><b><font face="Cambria" size="2">M.M</font></b></td>
		<td align="center" style="width: 126px"><b><font face="Cambria" size="2">M.O</font></b></td>
		<td align="center" style="width: 126px"><font face="Cambria" size="2"><b>M.M</b></font></td>
		<td align="center" style="width: 126px"><font face="Cambria" size="2"><b>M.O</b></font></td>
		<td align="center" style="width: 127px"><font face="Cambria" size="2"><b>M.M</b></font></td>
		<td align="center" style="width: 127px"><font face="Cambria" size="2"><b>M.O</b></font></td>
		<td align="center" style="width: 127px">&nbsp;</td>
	</tr>';
	?>
	<?php
	while($rowS=mysql_fetch_row($rsSubject))
	{
		$Subject=$rowS[0];
		$Subject1=str_replace("Maths","Mathematics",$rowS[0]);
		$UTTheoryMaxMarks="";
		$UTTheoryMarksObtained="";
		$UTPracticalMaxMarks="";
		$UTPracticalMarksObtained="";
		
		$Term1TheoryMaxMarks="";
			$Term1TheoryMarksObtained="";
			$Term1PracticalMaxMarks="";
			$Term1PracticalMarksObtained="";
		
		
		if($Class12YesNo=="No")
		{
			$rsUT=mysql_query("select `TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained` from `reportcard_Class11and12_values` where `sadmission`='$sadmission' and `subject`='$Subject' and `testtype`='UT1'");
		}
		else
		{
			$rsUT=mysql_query("select `TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained` from `reportcard_Class11and12_values` where `sadmission`='$sadmission' and `subject`='$Subject' and `testtype`='Test Series1'");
		}
		
		while($rowUT=mysql_fetch_row($rsUT))
		{
			$UTTheoryMaxMarks=$rowUT[0];
			$UTTheoryMarksObtained=$rowUT[1];
			$UTPracticalMaxMarks=$rowUT[2];
			$UTPracticalMarksObtained=$rowUT[3];
			break;
		}
		
		if($Class12YesNo=="No")
		{
			$rsTerm1=mysql_query("select `TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained` from `reportcard_Class11and12_values` where `sadmission`='$sadmission' and `subject`='$Subject' and `testtype`='Assessment1'");
		}
		else
		{
			$rsTerm1=mysql_query("select `TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained` from `reportcard_Class11and12_values` where `sadmission`='$sadmission' and `subject`='$Subject' and `testtype`='Preparatory Exam1'");
		}	
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
		
		if(trim($Term1PracticalMaxMarks)=="0")
		{
			$Term1PracticalMaxMarks="";
			$Term1PracticalMarksObtained="";
		}
		if(($UTTheoryMarksObtained=="0" && $Term1TheoryMarksObtained=="0" && $Term1PracticalMarksObtained=="") || ($UTTheoryMarksObtained=="0" && $Term1TheoryMarksObtained=="0" && $Term1PracticalMarksObtained=="0"))
		{
		}
		else
		{
		//echo $UTTheoryMarksObtained."/".$Term1TheoryMarksObtained."/".$Term1PracticalMarksObtained."/Total Max Marks:".$TotalMaxMarks.",TotalObtained Marks:".$TotalObtainedMarks;
		//exit();
	?>
	<?php
	$strOneStudent=$strOneStudent.'<tr>
		<td align="left" style="width: 126px"><font face="Cambria" size="2">&nbsp;'.$Subject1.'</font></td>
		<td align="center" style="width: 126px"><font face="Cambria" size="2">'.$UTTheoryMaxMarks.'</font></td>
		<td align="center" style="width: 126px"><font face="Cambria" size="2">'.$UTTheoryMarksObtained.'</font></td>
		<td align="center" style="width: 126px"><font face="Cambria" size="2">'.$Term1TheoryMaxMarks.'</font></td>
		<td align="center" style="width: 126px"><font face="Cambria" size="2">'.$Term1TheoryMarksObtained.'</font></td>
		<td align="center" style="width: 127px"><font face="Cambria" size="2">'.$Term1PracticalMaxMarks.'</font></td>
		<td align="center" style="width: 127px"><font face="Cambria" size="2">'.$Term1PracticalMarksObtained.'</font></td>
		<td align="center" style="width: 127px"><font face="Cambria" size="2">'.($Term1TheoryMarksObtained+$Term1PracticalMarksObtained).'</font></td>		
	</tr>';
		}
	}//End of while loop for Subject
	?>
<?php
	if($Class12YesNo=="No")
	{
	$strOneStudent=$strOneStudent.'
	<tr>
		<td colspan="8" align="left">&nbsp;<font face="Cambria" size="2">'.$StarLine.'</font></td>		
	</tr>';
	}
	$strOneStudent=$strOneStudent.'
</table><br>
<table border="1" cellspacing="0" cellpadding="0" style="width: 100%;" class="style2">
	<tr>
		<td width="442" style="border-style: none; border-width: medium">______________</td>
		<td width="442" style="border-style: none; border-width: medium"><p align="center"><img src="CoordinatorSignature.png"></p></td>
		<td width="443" style="border-style: none; border-width: medium"><p align="right"><img src="PrincipalSignature.png"></p></td>

	
	</tr>
	<tr>
		<td width="442" style="border-style: none; border-width: medium"><b><font face="Cambria">Class Teacher</font></b></td>
		<td width="442" style="border-style: none; border-width: medium"><p align="center"><b><font face="Cambria">Scholastic Coordinator</font></b></p></td>
		<td width="443" style="border-style: none; border-width: medium"><p align="right"><font face="Cambria"><b>Principal</b></font></p></td>
	
	</tr>
	</table><p style="page-break-before: always"><br>';
echo $strOneStudent;
mysql_query("delete from `reportcard_htmlcode` where `sadmission`='$sadmission' and `ExamType`='$Assess1'") or die(mysql_error());
mysql_query("insert into `reportcard_htmlcode` (`sadmission`,`sname`,`class`,`ExamType`,`RollNo`,`htmlcode`) values ('$sadmission','$sname','$sclass','$Assess1','$srollno','$strOneStudent')") or die(mysql_error());
}//End of While Loop for class wise student wise
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 
</font> 
	
</div>