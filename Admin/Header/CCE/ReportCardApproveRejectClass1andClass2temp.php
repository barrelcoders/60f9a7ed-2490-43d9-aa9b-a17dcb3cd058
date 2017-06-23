<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedclass=$_REQUEST["txtclass"];

//$ssql="SELECT `sadmission`,`sname`,`class`,`Rollno`,`examtype`,`AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`StarRating`,`Remarks`,`Approval`,
           `SrNo` FROM `reportcard_Class1and2_values` order by `class`,`Rollno`";
           
$ssql="SELECT  `SrNo`,`sadmission`, `sname`, `class`, `RollNo`, `examtype`, `AssignmentGrade`, `AssignmentIndicatorValue`, `PencilGrade`, `PenPencilIndicatorValue`, `NumeracyGrade`,
       `NumeracyIndicatorValue`, `EnvironmentGrade`, `EnvironmentIndicatorValue`, `Suggestions`, `StarRating`, `Approval`, `entrydate`, `Remarks`
        FROM `reportcard_Class1and2_values` order by `class`,`Rollno`";   
        
//echo $ssql;
//exit();

	if($Selectedclass!="Select One")

	{

		$ssql=$ssql." and `sclass`='".$Selectedclass."'";

	}
	

echo $ssql;

$rs= mysql_query($ssql);

}

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

<table width="1327" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="ReportCardApproveRejectClass1andClass2TEMP.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 331px" align="left">
<span style="font-family: Cambria; font-weight: 700; font-size: 11pt; letter-spacing: normal; background-color: #FFFFFF">
Class</span></td>
<td style="width: 332px">	<font face="Cambria">

		<select name="txtclass" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `class` FROM `class_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
</tr>
<tr>
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
<td style="width: 332px">&nbsp;</td>
<td style="width: 332px" align="left"><p align="center">&nbsp;</td>
<td style="width: 332px">&nbsp;</td>
</tr>
<tr>
<td style="width: 331px"><p align="center">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>


<tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700" class="theButton"></font></td>
</tr>
</form>
</table>

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
		<td class="style3" style="width: 116px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Grade</strong></font></td>
		<td class="style3" style="width: 102px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Numeracy Indicator Value</strong></font></td>
		<td class="style3" style="width: 116px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Grade</strong></font></td>
		<td class="style3" style="width: 102px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Environment Indicator Value</strong></font></td>
		<td class="style3" style="width: 159px" bgcolor="#95C23D" align="center">
		<b><font face="Cambria">Star Rating</font></b></td>
		<td class="style3" style="width: 89px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Remarks</strong></font></td>
		<td class="style3" style="width: 93px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><strong>Approve</strong></font></td>
		<td class="style3" style="width: 93px" bgcolor="#95C23D" align="center">
		<font face="Cambria"><b>Reject</b></font></td>
	</tr>
	

	

	<tr>
		<td class="style4" style="border-style:solid; border-width:1px; width: 60px">
		<font face="Cambria"><?php echo $cnt;?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 71px">
		<font face="Cambria"><?php echo $row[1];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 145px">
		<font face="Cambria"><?php echo $row[2];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $row[3];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $row[4];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $row[5]; ?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $row[6];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 92px">
		<font face="Cambria"><?php echo $row[7];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 116px">
		<font face="Cambria"><?php echo $row[8];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 102px">
		<font face="Cambria"><?php echo $row[9];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 116px">
		<font face="Cambria"><?php echo $row[10];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 102px">
		<font face="Cambria"><?php echo $row[11];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 116px">
		<font face="Cambria"><?php echo $row[12];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 102px">
		<font face="Cambria"><?php echo $row[13];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 102px">
		<font face="Cambria"><?php echo $row[15];?></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 159px">
		<font face="Cambria"></font><textarea name="txtRemarks<?php echo $row[0];?>" id="txtRemarks<?php echo $row[0];?>" cols="20" rows="2"><?php echo $row[18];?></textarea></td>		
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
		<input name="btnApprove<?php echo $row[0];?>" id="btnApprove<?php echo $row[0];?>" type="button" value="Approve" onclick="Javascript:fnlApprove('<?php echo $row[0];?>');" style="font-weight: 700">
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
		<input name="btnReject<?php echo $row[0];?>" id="btnReject<?php echo $row[0];?>" type="button" value="Reject" onclick="Javascript:fnlReject('<?php echo $row[0];?>');" style="font-weight: 700">
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