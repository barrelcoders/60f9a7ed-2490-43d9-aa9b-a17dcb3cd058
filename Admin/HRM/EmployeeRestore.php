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

	

	$ssql="SELECT `srno`, `EmpId`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`, `Allowances`, `Address`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `L1_Approver_Id`, `L2_Approver_Id`, `L3_Approver_Id`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder` FROM `employee_alumni` WHERE 1=1";

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

$rs= mysql_query($ssql);

}

?>

<script language="javascript">
function fnlRestoreAlumni(EmpId)
{
	document.getElementById("B3"+EmpId).disabled=true;
	var myWindow = window.open("EmpRestoreFromAlumni.php?EmpId=" + EmpId, "", "width=350, height=200");	
	return;

}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Class</title>

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

<table width="100%" style="border-collapse: collapse;" border="1" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="EmployeeRestore.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 278px">
<p align="center"><font face="Cambria">Department</font></td>
<td style="width: 278px"><font face="Cambria">
<select name="cboDepartment" id="cboDepartment" class="text-box">
<option selected="" value="Select One">Select One</option>
<?php

	while($row = mysql_fetch_row($rsDepartment))
	{
		$Department=$row[0];

?>

<option value="<?php echo $Department; ?>"><?php echo $Department; ?></option>

<?php

	}

?>
</select></font>
</td>
<td style="width: 278px"><p align="center"><font face="Cambria">Employee ID No.</font></td>
<td style="width: 278px"><font face="Cambria"><input name="txtEmpId" type="text"  class="text-box"></font></td>
<td style="width: 278px" class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Submit"  class="text-box" style="font-weight: 700"></font></td>
</tr>
</form>
</table>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<table width="1779" style="border-collapse: collapse;" border="1"  class="CSSTableGenerator">
<tr>
<td style="width: 45px" bgcolor="#95C23D" align="center"><font face="Cambria">
Emp Id</font></td>
<td style="width: 40px" bgcolor="#95C23D" align="center"><font face="Cambria">
Name</font></td>
<td style="width: 31px" bgcolor="#95C23D" align="center"><font face="Cambria">
DOB</font></td>

<td style="width: 51px" bgcolor="#95C23D" align="center"><font face="Cambria">
Gender</font></td>
<td style="width: 62px" bgcolor="#95C23D" align="center"><font face="Cambria">
Category</font></td>
<td style="width: 75px" bgcolor="#95C23D" align="center"><font face="Cambria">
Nationality</font></td>
<td style="width: 48px" bgcolor="#95C23D" align="center"><font face="Cambria">
Date Of Joining</font></td>
<td style="width: 46px" bgcolor="#95C23D" align="center"><font face="Cambria">
Last School</font></td>
<td style="width: 62px" bgcolor="#95C23D" align="center"><font face="Cambria">
Teaching subject</font></td>
<td style="width: 56px" bgcolor="#95C23D" align="center"><font face="Cambria">
Class Teacher</font></td>
<td style="width: 86px" bgcolor="#95C23D" align="center"><font face="Cambria">
Education Qualification</font></td>
<td style="width: 46px" bgcolor="#95C23D" align="center"><font face="Cambria">
Father Name</font></td>
<td style="width: 43px" bgcolor="#95C23D" align="center"><font face="Cambria">
Salary</font></td>
<td style="width: 78px" bgcolor="#95C23D" align="center"><font face="Cambria">
Allowances</font></td>
<td style="width: 57px" bgcolor="#95C23D" align="center"><font face="Cambria">
Address</font></td>
<td style="width: 47px" bgcolor="#95C23D" align="center"><font face="Cambria">
Mobile No</font></td>
<td style="width: 30px" bgcolor="#95C23D" align="center"><font face="Cambria">
Imei</font></td>
<td style="width: 46px" bgcolor="#95C23D" align="center"><font face="Cambria">
UserId</font></td>
<td style="width: 68px" bgcolor="#95C23D" align="center"><font face="Cambria">
Password</font></td>
<td style="width: 38px" bgcolor="#95C23D" align="center"><font face="Cambria">
Email</font></td>
<td style="width: 31px" bgcolor="#95C23D" align="center"><font face="Cambria">
Role</font></td>
<td style="width: 42px" bgcolor="#95C23D" align="center"><font face="Cambria">
Status</font></td>
<td style="width: 83px" bgcolor="#95C23D" align="center"><font face="Cambria">
Department</font></td>
<td style="width: 82px" bgcolor="#95C23D" align="center"><font face="Cambria">
Designation</font></td>
<td style="width: 49px" bgcolor="#95C23D" align="center"><font face="Cambria">
Marital Status</font></td>
<td style="width: 62px" bgcolor="#95C23D" align="center"><font face="Cambria">
Husband Name</font></td>
<td style="width: 85px" bgcolor="#95C23D" align="center"><font face="Cambria">
Anniversary Date</font></td>
<td style="width: 102px" bgcolor="#95C23D" align="center"><font face="Cambria">
Manager Name</font></td>
<td style="width: 51px" bgcolor="#95C23D" align="center"><font face="Cambria">
Date Of Leaving</font></td>
<td style="width: 103px" bgcolor="#95C23D" align="center"><font face="Cambria">
Move to Alumni</font></td>
</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
	 $EmpId=$row[1];
?>
<tr>
<td style="width: 45px" font="Cambria"><?php echo $row[0];?></td>
<td style="width: 40px" font="Cambria"><?php echo $row[1];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[2];?></td>

<td style="width: 51px" font="Cambria"><?php echo $row[3];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[4];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[5];?></td>
<td style="width: 48px" font="Cambria"><?php echo $row[6];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[7];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[8];?></td>
<td style="width: 56px" font="Cambria"><?php echo $row[8];?></td>
<td style="width: 86px" font="Cambria"><?php echo $row[10];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[11];?></td>
<td style="width: 43px" font="Cambria"><?php echo $row[12];?></td>
<td style="width: 78px" font="Cambria"><?php echo $row[13];?></td>
<td style="width: 57px" font="Cambria"><?php echo $row[14];?></td>
<td style="width: 47px" font="Cambria"><?php echo $row[15];?></td>
<td style="width: 30px" font="Cambria"><?php echo $row[16];?></td>
<td style="width: 46px" font="Cambria"><?php echo $row[17];?></td>
<td style="width: 68px" font="Cambria"><?php echo $row[18];?></td>
<td style="width: 38px" font="Cambria"><?php echo $row[19];?></td>
<td style="width: 31px" font="Cambria"><?php echo $row[20];?></td>
<td style="width: 42px" font="Cambria"><?php echo $row[21];?></td>
<td style="width: 83px" font="Cambria"><?php echo $row[26];?></td>
<td style="width: 82px" font="Cambria"><?php echo $row[27];?></td>
<td style="width: 49px" font="Cambria"><?php echo $row[30];?></td>
<td style="width: 62px" font="Cambria"><?php echo $row[31];?></td>
<td style="width: 85px" font="Cambria"><?php echo $row[32];?></td>
<td style="width: 102px" font="Cambria"><?php echo $row[23];?></td>
<td style="width: 51px" font="Cambria"><?php echo $row[35];?></td>
<td style="width: 103px" font="Cambria">
	<input type="button" value="Restore Employee " name="B3<?php echo $EmpId;?>" id="B3<?php echo $EmpId;?>" onclick="fnlRestoreAlumni('<?php echo $EmpId;?>');" style="font-weight: 700">
</td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>