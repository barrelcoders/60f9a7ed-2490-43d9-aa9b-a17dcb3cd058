<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php
$ssql="SELECT `sadmission`,`sname`,`class`,`Rollno`,`examtype`,`AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`StarRating`,`Remarks`,`Approval`,`SrNo` FROM `reportcard_Class1and2_values` order by `class`,`Rollno`";
$rs= mysql_query($ssql);

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

</style>
<script type="text/javascript" language="javascript">
function fnlApprove(srno)
{
	
	document.getElementById("btnApprove"+srno).disabled="true";
	var Remarks=document.getElementById("txtRemarks"+srno).value;
	
	
	var myWindow = window.open("ReportCardApproveRej.php?srno=" + srno + "&Remarks=" + escape(Remarks) + "&action=approve", "", "width=200, height=100");	
}
function fnlReject(srno)
{
	document.getElementById("btnReject"+srno).disabled="true";
	var Remarks=document.getElementById("txtRemarks"+srno).value;

	var myWindow = window.open("ReportCardApproveRej.php?srno=" + srno + "&Remarks=" + escape(Remarks) + "&action=reject", "", "width=200, height=100");	
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

				<p>&nbsp;</td>





			</tr>



			
		</table>



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
		<td class="style3" style="width: 92px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Grade</strong></font></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>
		Assignment and Project</strong></font></td>
		<td class="style3" style="width: 116px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Grade</strong></font></td>
		<td class="style3" style="width: 102px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Pencil 
		&amp; Paper Assessment</strong></font></td>
		<td class="style3" style="width: 159px" bgcolor="#95C23D" align="center">
		<b><font face="Cambria">Star Rating</font></b></td>
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
							$examtype=$row[4];
							$AssignmentGrade=$row[5];
							$AssignmentIndicatorValue=$row[6];
							$PencilGrade=$row[7];
							$PenPencilIndicatorValue=$row[8];
							$StarRating=$row[9];
							$Remarks=$row[10];
							$Approval=$row[11];
							$srno=$row[12];
													
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
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $AssignmentGrade;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $AssignmentIndicatorValue;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 116px">
		<font face="Cambria"><?php echo $PencilGrade;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 102px">
		<font face="Cambria"><?php echo $PenPencilIndicatorValue;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 102px">
		<font face="Cambria"><?php echo $StarRating;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 159px">
		<font face="Cambria"></font><textarea name="txtRemarks<?php echo $srno;?>" id="txtRemarks<?php echo $srno;?>" cols="20" rows="2"><?php echo $Remarks;?></textarea></td>		
		<td class="style4" style="border-style:solid; border-width:1px; width: 89px" align="center">
		<font face="Cambria">
		<?php 
			if($Approval=="Approve")
			{ 
				echo "Approved";
			}
			elseif($Approval=="Pending")
			{
		?>
		<input name="btnApprove<?php echo $srno;?>" id="btnApprove<?php echo $srno;?>" type="button" value="Approve" onclick="Javascript:fnlApprove('<?php echo $srno;?>');" style="font-weight: 700">
		<?php
			}
		?>
		</font>
		</td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 93px" align="center">
		<font face="Cambria">
		<?php
			if($Approval=="Reject")
			{
				echo "Rejected";
			}
			elseif($Approval=="Pending")
			{
		?>
		<input name="btnReject<?php echo $srno;?>" id="btnReject<?php echo $srno;?>" type="button" value="Reject" onclick="Javascript:fnlReject('<?php echo $srno;?>');" style="font-weight: 700">
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

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" style="font-size: 11pt">Powered by iSchool Technologies LLP</font></div>

</div>

</body>

</html>