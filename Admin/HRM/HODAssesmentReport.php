<?php
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php

if($_REQUEST["isSubmit"]=="yes")
{

	$SelectedDepartment=$_REQUEST["cboDepartment"];
	$SelectedEmpId=$_REQUEST["txtEmpId"];
    $SelectedName=$_REQUEST["txtName"];

	$ssql="SELECT DISTINCT  `Question` FROM  `Employee_ACR_Question_Master` ";
		$rs= mysql_query($ssql);
        $i=1;
        while($row = mysql_fetch_row($rs))
	     {
          $arrayQuestion[$i]=$row[0];
          $i=$i+1;
         }
	$result="select `EmpId`,`Name`,`Department`,`Designation` from `employee_master` where 1 ";

    if($SelectedDepartment !="Select One")
	{
		$result=$result." and `Department`='$SelectedDepartment'";
	}
	 if($SelectedEmpId!="")
	{
		$result=$result." and `EmpId`='$SelectedEmpId'";
	}
    if($SelectedName!="")
	{
	
		$result= $result. " and `Name` like '%" . $SelectedName. "%'";

	}


}

$rs= mysql_query($result);





?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>HOD ASSESMENT</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

.style1 {

	text-align: center;

}

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
        font-family: Cambria;
        font-weight:bold;

}


</style>
<script type="text/javascript" language="javascript">

function fnlApprove(cnt,EmpNo)
{
	ctrlRemarks="txtRemark" + cnt;
	ctrlPrincipalRemark="txtPrincipalRemark" + cnt;
    ctrlComment="txtComment" + cnt;

	ctrlApproveBtn="btnApprove" + cnt;
	document.getElementById(ctrlApproveBtn).disabled="true";
	
	var Remarks=document.getElementById(ctrlRemarks).value;
	var PrincipalRemark=document.getElementById(ctrlPrincipalRemark).value;
    var Comment=document.getElementById(ctrlComment).value;

	var EmployeeId=EmpNo;
	var myWindow = window.open("SubmitPrincipal.php?EmpNo=" + EmployeeId + "&Remarks=" + escape(Remarks) + "&PrincipalRemark=" + escape(PrincipalRemark)+  "&Comment=" + escape(Comment) + "&action=approve", "", "width=200, height=100");	
}
</script>
</head>



<body>

<p>&nbsp;</p>
<p>&nbsp;</p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="HODAssesmentReport.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 278px" align="left">
<p><font face="Cambria">Department</font></td>
<td style="width: 278px"><font face="Cambria">

		<select name="cboDepartment" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Department` FROM `employee_master` where `EmployeeCategory`='Teaching Staff'";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select> </font>
</td>
<td style="width: 278px; border-right-style:none; border-right-width:medium"><p align="left">
<font face="Cambria">
		Employee ID<input type="text" name="txtEmpId" id="txtEmpId" size="17" class="text-box"></font></td>
<td style="border-style:none; border-width:medium; width: 278px">
<font face="Cambria">
		Employee Name<input type="text" name="txtName" id="txtName" size="17" class="text-box"></font></td>
<td colspan=4 align=center class="style1" style="border-style: none; border-width: medium">
<font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700" class="text-box"></font></td>
</tr>
</form>
</table>
<font face="Cambria">
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
</font>
<table width="938" style="border-collapse: collapse;" border="1" >
<tr>
<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" >
		<b><font face="Cambria">EmpId</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Emp Name</font></b></td>
		<?php
		for($i=1;$i<=sizeof($arrayQuestion);$i++)
		{
		?>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria">
		<b>Question-<?php echo $arrayQuestion[$i]; ?></b></font></td>
		<?php
		}
		?>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria">
		<b>Total Score</b></font></td>
       <td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria">
		<b>Principal Remark1</b></font></td>
        <td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria">
		<b>Remark 2</b></font></td>
		 <td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria">
		<b>Comment</b></font></td>
         <td height="22" align="center" style="border-style: solid; border-width: 1px">
		<font face="Cambria">
		<b>Submit</b></font></td>


		
	
		
		
</tr>
<?php
$cnt=1;
   //$ssql1="SELECT distinct `EmpId`,`EmpName` FROM `Employee_ACR_HODAssesment`";
   //$rs1= mysql_query($ssql1);
   

	//while($row1 = mysql_fetch_row($rs1))
	while($row1 = mysql_fetch_row($rs))
	{
	$EmpId=$row1[0];
	$EmpName=$row1[1];
	

?>
<tr>
<td style="width: 104px" font="Cambria"><font face="Cambria"><?php echo $cnt;?></font></td>
<td style="width: 104px" font="Cambria"><font face="Cambria"><?php echo $EmpId;?></font></td>
<td style="width: 104px" font="Cambria"><font face="Cambria"><?php echo $EmpName;?></font></td>
<?php
$TotalRating=0;

		for($i=1;$i<=sizeof($arrayQuestion);$i++)
		{
			$Question=$arrayQuestion[$i];
			$rs2=mysql_query("SELECT `Answer`,`Rating` FROM `Employee_ACR_HODAssesment` where `EmpId`='$EmpId' and `Question`='$Question'");
			$row2=mysql_fetch_row($rs2);
			$Answer=$row2[0];
			$Rating=$row2[1];
			$TotalRating=$TotalRating+$Rating;
		?>
<td style="width: 89px" font="Cambria"><font face="Cambria"><?php echo $Answer;?><b><br>(<?php echo $Rating; ?>)</b></font></td>
<?php
		}
?>

<td style="width: 40px" font="Cambria"><font face="Cambria"><?php echo $TotalRating; ?></font></td>
<td style="width: 104px" font="Cambria"><font face="Cambria"></font><b><font face="Cambria"><br> 
<select name="txtRemark<?php echo $cnt;?>" id="txtRemark<?php echo $cnt;?>"  style="float: left" ; class="text-box"  onchange="Javascript:GetRating('<?php echo $recno;?>');">
						 <option selected="" value="">Select One</option>
						<option value="Excellent">Excellent</option>
						<option value="Very Good">Very Good</option>
						<option value="Good">Good</option>
						<option value="Average">Average</option>
						 <option value="Poor">Poor</option>
						 
			</select></font></b></td>
<td style="width: 104px" font="Cambria"> 
 <font face="Cambria">
 
 <select name="txtPrincipalRemark<?php echo $cnt;?>" id="txtPrincipalRemark<?php echo $cnt;?>"  style="float: left" ; class="text-box"  onchange="Javascript:GetRating('<?php echo $recno;?>');">
						 <option selected="" value="">Select One</option>
						<option value="I agree  with the recommendations of HOD">I agree  with the recommendations of HOD</option>
						<option value="I Disagree with the recommendations of HOD">I Disagree with the recommendations of HOD</option>
						
						 
			</select></font></td>
<td style="width: 104px" font="Cambria"><font face="Cambria">
			<textarea rows="2" name="txtComment<?php echo $cnt;?>" id="txtComment<?php echo $cnt;?>" cols="20"></textarea></b></font></td>

<td style="width: 104px" font="Cambria">
		<font face="Cambria">
		<input name="btnApprove<?php echo $cnt;?>" id="btnApprove<?php echo $cnt;?>" type="button" value="Submit" onclick="Javascript:fnlApprove('<?php echo $cnt;?>','<?php echo $EmpId;?>');"></font></td>



</tr>
<?php
$cnt=$cnt+1;	
	}
	
?>
</table>
<font face="Cambria">
<?php
}
?>
</font>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>
