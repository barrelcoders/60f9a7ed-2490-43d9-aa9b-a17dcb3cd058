<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssqlDepartment="SELECT distinct `DepartmentName` FROM `department_master`";
$rsDepartment= mysql_query($ssqlDepartment);
if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedDepartment=$_REQUEST["cboDepartment"];
	$SelectedEmpId=$_REQUEST["txtEmpId"];
	$Selectedname=$_REQUEST["txtname"];
	$Selectededuqly=$_REQUEST["txteduqly"];
	$Selectedsalary=$_REQUEST["txtsalary"];
	$Selecteddesignation=$_REQUEST["txtdesignation"];
	$Selecteddob=$_REQUEST["txtdob"];
	$ssql="select `EmpId` , `Name`, `DOB`, `Gender`,`Category`, `Nationality` ,`DOJ`,`LastSchool`,`employeetype`,`ClassTeacher`, `Education_Qualification`,`FatherName`, `Salary`, `Allowances`,`Address`,`MobileNo`,`Imei`,`UserId`,`Password`,`email`,`role`,`status`,`Department`,`Designation`,`MaritalStatus`,`HusbandName`,`AnniversaryDate`,`L1_Approver_Id`,`srno` from `employee_master` where 1=1";

	//echo $ssql;
	//exit();
	if($SelectedDepartment !="Select One")
	{
		$ssql=$ssql." and `Department`='$SelectedDepartment'";
	}

	if($SelectedEmpId !="")

	{

		$ssql=$ssql." and `EmpId`='".$SelectedEmpId."'";

	}
	if ($_REQUEST["txtname"] != "")
				{
					$EmpName=$_REQUEST["txtname"];
					$ssql = $ssql . " and `Name` like '%" . $EmpName. "%'";
				}
	if($Selectededuqly!="Select One")

	{

		$ssql=$ssql." and `Education_Qualification`='".$Selectededuqly."'";

	}
	if($Selectedsalary!="")

	{

		$ssql=$ssql." and `Salary`='".$Selectedsalary."'";

	}
		if($Selecteddesignation!="Select One")

	{

		$ssql=$ssql." and `Designation`='".$Selecteddesignation."'";

	}
			if($Selecteddob!="")

	{

		$ssql=$ssql." and `DOB`='".$Selecteddob."'";

	}


$rs= mysql_query($ssql);

}

?>
<script language="javascript">
function fnlMoveToAlumni(EmpId)
{
	document.getElementById("B3"+EmpId).disabled=true;
	var myWindow = window.open("EmpMoveToAlumni.php?EmpId=" + EmpId, "", "width=350, height=200");	
	return;

}
function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditEmployeeMaster1.php?srno=" + SrNo ,"","width=700,height=650");
}

</script>


<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Search Employee</title>
<!----Pagein------->
  <link rel="stylesheet" href="../../Bootstrap/bootstrap.min.css" />  
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../../bootstrap/Bootstrap.min.js"></script> 
   <script src="../js/jquery.min.js"></script> 
   <script src="../js/dataTables-data.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
<!---->
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

</head>



<body>

<p>&nbsp;</p>
<p><font face="Cambria" size=3><b>Search Employee Details</b></font></p>

<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="EmployeeMaster.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 278px" align="left">
<p><font face="Cambria">Department</font></td>
<td style="width: 278px"><font face="Cambria">
<font face="Cambria">

		<select name="cboDepartment" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Department` FROM `employee_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></font>
</td>
<td style="width: 278px"><p align="left"><font face="Cambria">Employee ID</font></td>
<td style="width: 278px"><font face="Cambria"><input name="txtEmpId" type="text" class="text-box"></font></td>
<tr>
<td style="width: 278px" align="left">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px" align="left"><p><font face="Cambria">Name</font></td>
<td style="width: 278px"><font face="Cambria"><input name="txtname" type="text" class="text-box"></font></td>
<!--<td style="width: 278px"><p align="left"><font face="Cambria">Education 
Qualification</font></td>
<td style="width: 278px"><font face="Cambria">

		<select name="txteduqly" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Education_Qualification` FROM `employee_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>-->
<td style="width: 278px" align="left"><p><font face="Cambria">Designation</font></td>
<td style="width: 278px" colspan=3><font face="Cambria">

		<select name="txtdesignation" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Designation` FROM `employee_master`";
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
<td style="width: 278px" align="left">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<!--<tr>
<td style="width: 278px" align="left"><p><font face="Cambria">Salary</font></td>
<td style="width: 278px"><font face="Cambria"><input name="txtsalary" type="text" class="text-box"></font></td>
<td style="width: 278px"><p align="left"><font face="Cambria">Date of Birth</font></td>
<td style="width: 278px"><font face="Cambria"><input name="txtdob" type="date" class="text-box"></font></td>
</tr>-->
<tr>
<td style="width: 278px" align="left">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
<tr>


</tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700" class="text-box"></font></td>
</tr>
</form>
</table>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
<table  id="datable_1" class="table table-hover display  pb-30">
<tr>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">EmpId</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">DOB</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Gender</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Category</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Nationality</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Date Of Joining</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Last School</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Employee Type</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Class Teacher</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Education Qualification</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Father Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Salary</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Allowances</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Address</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Mobile No</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Imei</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">UserId</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Password</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Email</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Role</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Status</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Department</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Designation</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Marital Status</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Husband Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Anniversary Date</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Manager Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Edit</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Move to Alumni</th>
</tr>
</thead>
						<tbody>
<?php
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[0];
	$srno=$row[28];

?>
<tr>
<td style="border:1px solid #0b462d;"><?php echo $row[0];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[1];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[2];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[3];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[4];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[5];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[6];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[7];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[8];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[9];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[10];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[11];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[12];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[13];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[14];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[15];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[16];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[17];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[18];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[19];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[20];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[21];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[22];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[23];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[24];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[25];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[26];?></td>
<td style="border:1px solid #0b462d;"><?php echo $row[27];?></td>
<td style="border:1px solid #0b462d;"><a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">Edit</a></font></td>
<td style="border:1px solid #0b462d;">
<form method="POST" action="--WEBBOT-SELF--">
	<!--webbot bot="SaveResults" U-File="fpweb:///_private/form_results.csv" S-Format="TEXT/CSV" S-Label-Fields="TRUE" -->
	<p><input type="button" value="Move To Alumni" name="B3<?php echo $EmpId;?>" id="B3<?php echo $EmpId;?>" onClick="fnlMoveToAlumni('<?php echo $EmpId;?>');"></p>
</form>
</td>

</tr>
<?php } ?>
</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>
				<!-- /Row -->

<?php
}
?>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>