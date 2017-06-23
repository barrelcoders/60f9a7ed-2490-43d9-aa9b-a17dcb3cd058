<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
$SelectedClass=$_REQUEST["cboClass"];
$SelectedExamType=$_REQUEST["cboTestType"];

$rsChk=mysql_query("SELECT distinct `subject` FROM `subject_master` WHERE `class`='$SelectedClass' and `evaluation`='Y' and `exam_type`='$SelectedExamType' and `subject` not in (select distinct `subject` from `reportcard_Class11and12_values` where `sclass`='$SelectedClass' and `testtype`='$SelectedExamType' and `approvalstatus`='Pending')");
$strErr="";
if (mysql_num_rows($rsChk) > 0)
{
	while($rowS = mysql_fetch_row($rsChk))
	{
		$strErr=$strErr.$rowS[0]."<br>";
	}
}
if($strErr!="")
{
	echo "<br><br><center><b>Marks are not entered for following subjects:-<br>".$strErr;
	exit();
}

//$ssql="SELECT `sadmission`,`sname`,`sclass`,`srollno`,`subject`,`testtype`,`TheoryMarksObtained`,`PracticalMarksObtained` FROM `reportcard_Class11and12_values` where `sclass`='$SelectedClass' and `testtype`='$SelectedExamType' order by `sname` desc";
$ssql="SELECT distinct `sadmission`,`sname`,`sclass`,`srollno`,`testtype`,`approvalstatus` FROM `reportcard_Class11and12_values` where `sclass`='$SelectedClass' and `testtype`='$SelectedExamType' and `approvalstatus`='Pending' order by `sname` desc";
$rs= mysql_query($ssql);
$rsTotalSubject= mysql_query("SELECT distinct `subject` FROM `reportcard_Class11and12_values` where `sclass`='$SelectedClass' and `testtype`='$SelectedExamType'");
$TotalSubject=0;

while($row = mysql_fetch_row($rsTotalSubject))
{
	$TotalSubject=$TotalSubject+1;
	$ArrSubject[$TotalSubject]=$row[0];
}

for($i=1;$i<=sizeof($ArrSubject);$i++)
{
	//echo "Subject".$i."=".$ArrSubject[$i]."<br>";
}


}

$sql = "SELECT distinct `class` FROM `class_master` where `class` like '11%' or `class` like '12%' order by `class`";
$result = mysql_query($sql);

$sqlex = "SELECT distinct `testtype` FROM `reportcard_Class11and12_values`";
$rsltex = mysql_query($sqlex);
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pending for Approval</title>
<style type="text/css">

.footer {

    height:20px; 

    width: 100%; 

    background-image: none;

    background-repeat: repeat;

    background-attachment: scroll;

    background-position: 0% 0%;

    position: fixed;

    bottom: 2pt;

    left: 0pt;

}   

.footer_contents 

{

        height:20px; 

        width: 100%; 

        margin:auto;        

        background-color:Blue;

        font-family: Calibri;

        font-weight:bold;

}

.style1 {
	border-collapse: collapse;
}

</style>
<script type="text/javascript" language="javascript">
function Validate()
{
	if(document.getElementById("cboClass").value=="Select One")
	{
		alert("Class is mandatory!");
		return;
	}
	if(document.getElementById("cboTestType").value=="Select One")
	{
		alert("Exam Type is mandatory!");
		return;
	}
	document.getElementById("frmRpt").submit();
	
}

function fnlApprove(cnt,sadmission,Class,ExamType)
{
	ctrlRemarks="txtRemarks" + cnt;
	ctrlApproveBtn="btnApprove" + cnt;
	ctrlRejectBtn="btnReject" + cnt;
	document.getElementById(ctrlApproveBtn).disabled="true";
	document.getElementById(ctrlRejectBtn).disabled="true";
	
	var Remarks=document.getElementById(ctrlRemarks).value;
	
	var myWindow = window.open("ReportCardApproveRej11and12.php?sadmission=" + sadmission + "&Class=" + Class + "&ExamType=" + ExamType + "&Remark=" + escape(Remarks) + "&action=approve", "", "width=200, height=100");	
}
function fnlReject(cnt,sadmission,Class,ExamType)
{
	ctrlRemarks="txtRemarks" + cnt;
	ctrlApproveBtn="btnApprove" + cnt;
	ctrlRejectBtn="btnReject" + cnt;
	document.getElementById(ctrlApproveBtn).disabled="true";
	document.getElementById(ctrlRejectBtn).disabled="true";
	
	var Remarks=document.getElementById(ctrlRemarks).value;
	
	var myWindow = window.open("ReportCardApproveRej11and12.php?sadmission=" + sadmission + "&Class=" + Class + "&ExamType=" + ExamType + "&Remark=" + escape(Remarks) + "&action=reject", "", "width=200, height=100");	
}

</script>

</head>

<body>

		<p>&nbsp;</p>

		<table style="width: 100%; border-collapse:collapse" class="style14" cellpadding="0">



			<tr>



				<td class="auto-style49" style="height: 10px; background-color:#FFFFFF">







				<strong><font face="Cambria">Approve and Reject Report Card</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<font face="Cambria">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>
				</td>
			</tr>
		</table>
<table style="width: 60%" class="style1">
<form name="frmRpt" id="frmRpt" method="post" action="">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		<td style="width: 248px"><font face="Cambria"><strong>Class</strong></font></td>
		<td style="width: 248px">
		<select name="cboClass" id="cboClass" class="auto-style40" style="height: 21px" onchange="Javascript:fnlFillSubject();">
			<option selected="" value="Select One">Select One</option>
			<?php
				while($row = mysql_fetch_assoc($result))
   				{
   					$class=$row['class'];
			?>
			<option value="<?php echo $class; ?>" <?php if ($class==$SelectedClass) { echo "selected"; } ?> ><?php echo $class; ?></option>
			<?php
				}
			?>
			</select>
		</td>
		<td style="width: 248px"><font face="Cambria"><strong>Select Exam Type</strong></font></td>
		<td style="width: 248px">
		<select name="cboTestType" id="cboTestType" class="auto-style40">
		<option selected="" value="Select One">Select One</option>
		<?php
		
		while($row = mysql_fetch_assoc($rsltex))
   		{
   					$ExamType=$row['testtype'];
		?>
		<option value="<?php echo $ExamType; ?>"><?php echo $ExamType; ?></option>
		<?php
		}
		
		?>
		</select>
		</td>
		<td style="width: 249px">
		<input name="btnSubmit" type="button" value="Submit" style="height: 26px" onclick="javascript:Validate();"></td>
	</tr>
	</form>
</table>
&nbsp;
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<table style="border-color:#000000; width: 100%; border-collapse:collapse" class="style1" cellpadding="0" border="1" cellspacing="0">
<form name="frmApproveRej" id="frmApproveRej" method="post" action="RegistrationApproveRej.php">
	<tr>
		<td class="style3" style="width: 60px; border-left-color:#000000; border-left-width:1px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Sr. No</strong></font></td>
		<td class="style3" style="width: 71px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Adm. No</strong></font></td>
		<td class="style3" style="width: 145px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Name</strong></font></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Class</strong></font></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Roll No</strong></font></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><b>Exam Type</b></font></td>
		<?php
			for($i=1;$i<=sizeof($ArrSubject);$i++)
			{
				//echo "Subject".$i."=".$ArrSubject[$i]."<br>";
		?>
		<td class="style3" style="width: 92px" bgcolor="#95C23D" align="center">
		<strong><font face="Cambria"><?php echo $ArrSubject[$i];?> Theory Marks</font></strong></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D" align="center">
		<strong><font face="Cambria"><?php echo $ArrSubject[$i];?> Practical Marks</font></strong></td>
		<?php
			}
		?>
		
		<td class="style3" style="width: 89px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Remarks</strong></font></td>
		<td class="style3" style="width: 93px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Approve</strong></font></td>
		<td class="style3" style="width: 93px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><b>Reject</b></font></td>
	</tr>
	

	<?php
				$cnt=1;
				while($row = mysql_fetch_row($rs))
				{
							$sadmissiono=$row[0];
							$sname=$row[1];
							$class=$row[2];
							$Rollno=$row[3];
							//$subject=$row[4];
							$examtype=$row[4];
							$Status=$row[5];
														
							//$AssignmentGrade=$row[6];
							//$AssignmentIndicatorValue=$row[7];
							//$PencilGrade=$row[8];
							//$PenPencilIndicatorValue=$row[9];
							//$StarRating=$row[10];
							//$Remarks=$row[11];
													
				?>

	<tr>
		<td class="style4" style="border-style:solid; border-width:1px; width: 60px">
		<font face="Cambria"><?php echo $cnt;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 71px">
		<font face="Cambria"><?php echo $sadmissiono;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 145px">
		<font face="Cambria"><?php echo $sname;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $class;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $Rollno;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $examtype; ?></font></td>
		<?php
			for($i=1;$i<=sizeof($ArrSubject);$i++)
			{
				//echo "Subject".$i."=".$ArrSubject[$i]."<br>";
				$MySubject=$ArrSubject[$i];
				$rsMObtained=mysql_query("SELECT `TheoryMarksObtained`,`PracticalMarksObtained` FROM `reportcard_Class11and12_values` where `sclass`='$SelectedClass' and `testtype`='$SelectedExamType' and `sadmission`='$sadmissiono' and `subject`='$MySubject'");
				
				$TheoryObtainedMarks=0;
				$PracticalObtainedMarks=0;
				while($rowOb = mysql_fetch_row($rsMObtained))
				{
					$TheoryObtainedMarks=$rowOb[0];
					$PracticalObtainedMarks=$rowOb[1];
					break;
				}
				
		?>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $TheoryObtainedMarks;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $PracticalObtainedMarks;?></font></td>
		<?php
		}
		?>
		<td class="style2" style="border-style:solid; border-width:1px; width: 159px">
		<font face="Cambria"><?php echo $Remarks;?></font><textarea name="txtRemarks<?php echo $cnt;?>" id="txtRemarks<?php echo $cnt;?>" cols="20" rows="2"></textarea></td>		
		<td class="style4" style="border-style:solid; border-width:1px; width: 89px" align="center">
		<font face="Cambria">
		<?php 
			if($Status=="Approve")
			{ 
				echo "Approved";
			}
			elseif($Status=="Pending")
			{
		?>
		<input name="btnApprove<?php echo $cnt;?>" id="btnApprove<?php echo $cnt;?>" type="button" value="Approve" onclick="Javascript:fnlApprove('<?php echo $cnt;?>','<?php echo $sadmissiono;?>','<?php echo $SelectedClass;?>','<?php echo $SelectedExamType;?>');" style="font-weight: 700">
		<?php
			}
		?>
		</font>
		</td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 93px" align="center">
		<font face="Cambria">
		<?php
			if($Status=="Reject")
			{
				echo "Rejected";
			}
			elseif($Status=="Pending")
			{
		?>
		<input name="btnReject<?php echo $cnt;?>" id="btnReject<?php echo $cnt;?>" type="button" value="Reject" onclick="Javascript:fnlReject('<?php echo $cnt;?>','<?php echo $sadmissiono;?>','<?php echo $SelectedClass;?>','<?php echo $SelectedExamType;?>');" style="font-weight: 700">
		<?php
			}
		?>
		</font>
		</td>
	</tr>
	<?php
	$cnt=$cnt+1;
	}
	?>
	</form>
</table>
<?php
}//end of submitted clause
?>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" style="font-size: 11pt">Powered by iSchool Technologies LLP</font></div>

</div>

</body>

</html>