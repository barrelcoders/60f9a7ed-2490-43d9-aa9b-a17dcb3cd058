<?php
session_start();
include '../../connection.php';
?>
<?php
$SrNo=$_REQUEST["srno"];


$sstr="SELECT distinct `head` FROM `discounttable`";
$rsDiscount= mysql_query($sstr);

if ($SrNo !="")
{
	$ssql="SELECT `srno`, `EmpId`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`, `Allowances`, `Address`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `L1_Approver_Id`, `L2_Approver_Id`, `L3_Approver_Id`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder` FROM `employee_master` WHERE  `srno`=$SrNo";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					$srno=$row[0];
					$EmpId=$row[1];
					$Empname=$row[2];
					$DOB=$row[3];
					
					
					$Sex=$row[4];
					$Category=$row[5];
					$Nationality=$row[6];
					$DOJ=$row[7];
					$LastSchool=$row[8];
					$EmpType=$row[9];
					$ClassTeacher=$row[10];
					$EduQuali=$row[11];
					$FatherName=$row[12];
					$Salary=$row[13];
					$Allowances=$row[14];
					$Address=$row[15];
					$smobile=$row[16];
					$simei=$row[17];
					$suser=$row[18];
					$spassword=$row[19];
					$email=$row[20];
					$Role=$row[21];
					$Department=$row[26];
					$Designation=$row[27];
					$PayBand=$row[28];
					$TeachingSubject=$row[29];
					$MaritalStatus=$row[30];
					$L1Approver=$row[23];
					$L2Approver=$row[24];
					$L3Approver=$row[25];
					$TeachingSubject=$row[29];
					$MaritalStatus=$row[30]; 
					$HusbandName=$row[31];
					$AnniversaryDate=$row[32];
					$Status=$row[22];

					
	}
}
	$sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   $ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";
	$rsRoute= mysql_query($ssqlRoute, $Con);
if ($_REQUEST["txtName"] !="")
{
	$srno=$_REQUEST["SrNo"];
	$txtEmpid=$_REQUEST["txtEmpid"];
	$Name=$_REQUEST["txtName"];
	$DOB=$_REQUEST["txtDOB"];
	

	$txtSex=$_REQUEST["txtSex"];
	$txtCategory=$_REQUEST["txtCategory"];
	$txtNationality=$_REQUEST["txtNationality"];
	$txtDOJ=$_REQUEST["txtDOJ"];
	$txtLastSchool=$_REQUEST["txtLastSchool"];
	$txtEmpType=$_REQUEST["txtEmpType"];
	$txtClassTeacher=$_REQUEST["txtClassTeacher"];
	$txtQuali=$_REQUEST["txtQuali"];
	$txtFatherName=$_REQUEST["txtFatherName"];
	$txtSalary=$_REQUEST["txtSalary"];
	$txtAllowance=$_REQUEST["txtAllowance"];
	$txtAddress=$_REQUEST["txtAddress"];
	$Mobile=$_REQUEST["txtMobile"];
	$Imei=$_REQUEST["txtImei"];
	$UserId=$_REQUEST["txtUserId"];
	$Password=$_REQUEST["txtPassword"];
	$Email=$_REQUEST["txtEmail"];
	$txtRole=$_REQUEST["txtRole"];
	$txtDepartment=$_REQUEST["txtDepartment"];
	$currentdatetime=date("Y-m-d h:i:sa");
	$txtDesignation=$_REQUEST["txtDesignation"];
	$txtPayband=$_REQUEST["txtPayband"];
	$txtL1Approver=$_REQUEST["txtL1Approver"];
	$txtL2Approver=$_REQUEST["txtL2Approver"];
	$txtL3Approver=$_REQUEST["txtL3Approver"];
    $txtTeachingSubject=$_REQUEST["txtTeachingSubject"];
    $txtMaritalStatus=$_REQUEST["txtMaritalStatus"];
    $txtHusbandName=$_REQUEST["txtHusbandName"];
    $txtAniversaryDate=$_REQUEST["txtAniversaryDate"];
     $txtStatus=$_REQUEST["txtStatus"];

    
	
			$ssql="UPDATE `employee_master` SET `Name`='$Name',`DOB`='$DOB',`Gender`='$txtSex',`Category`='$txtCategory',`Nationality`='$txtNationality',`DOJ`='$txtDOJ',`LastSchool`='$txtLAstSchool',`employeetype`='$txtEmpType',`ClassTeacher`='$txtClassTeacher',`Education_Qualification`='$txtQuali',`FatherName`='$txtFatherName',`Salary`='$txtSalary',`Allowances`='$txtAllowance',`Address`='$txtAddress',`MobileNo`='$Mobile',`Imei`='$Imei',`UserId`='$UserId',`Password`='$Password',`email`='$Email',`Role`='$txtRole',`Department`='$txtDepartment',`Designation`='$txtDesignation', `PayBand`='$txtPayband',`L1_Approver_Id`='$txtL1Approver',`L2_Approver_Id`='$txtL2Approver',`L3_Approver_Id`='$txtL3Approver',`TeachingSubject`='$txtTeachingSubject', `MaritalStatus`='$txtMaritalStatus', `HusbandName`='$txtHusbandName', `AnniversaryDate`='$txtAniversaryDate',`status`='$txtStatus' WHERE `srno` = '$srno'";
			mysql_query($ssql) or die(mysql_error());
			
			mysql_query("update `update_track` set `UpdateDateTime`='$currentdatetime' where `Activity`='ApplicationUpdate'") or die(mysql_error());;
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();
}



?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtName").value=="")

	{

		alert("Name is mandatory");

		return;

	}

	if (document.getElementById("txtPassword").value=="")

	{

		alert("Password is mandatory");

		return;

	}

	if (document.getElementById("txtEmail").value=="")

	{

		alert("Email is mandatory");

		return;

	}

	if (document.getElementById("txtFatherName").value=="")

	{

		alert("Father's name is mandatory");

		return;

	}

	if (document.getElementById("txtMobile").value=="")

	{

		alert("Mobile No is mandatory");

		return;

	}

	/*

	if (document.getElementById("txtImei").value=="")

	{

		alert("IMEI is mandatory");

		return;

	}

	*/

	if (document.getElementById("txtUserId").value=="")

	{

		alert("User Id. is mandatory");

		return;

	}

	if (document.getElementById("txtPassword").value=="")

	{

		alert("Password is mandatory");

		return;

	}

	if (document.getElementById("txtEmail").value=="")

	{

		alert("Email is mandatory");

		return;

	}

	document.getElementById("frmEditStudentMaster").submit();

	

}

function FillClass()

{

	document.getElementById("txtClass").value=document.getElementById("cboClass").value;

}

</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Student Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>



<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 1px solid #808080;

}

.style2 {

	text-align: center;

}

.style3 {

	color: #000000;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

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

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}

.style4 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}

.style5 {

	text-align: left;

}

</style>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="frmEditStudentMaster" id="frmEditStudentMaster" method="post" action="EditEmployeeMaster1.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

	<tr>

		<td style="width: 523px" class="style3"><strong>Emp Id:</strong></td>

		<td style="width: 524px">

		<strong>

		<input name="txtEmpid" id="txtEmpid" type="text" value="<?php echo $EmpId; ?>"></strong></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Name:</strong></td>

		<td style="width: 524px">

		<input name="txtName" id="txtName" type="text" value="<?php echo $Empname; ?>"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Date of Birth:</strong></td>

		<td style="width: 524px">

		<input name="txtDOB" id="txtDOB"  type="date" value="<?php echo $DOB; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Sex:</strong></td>

		<td style="width: 524px">

		<input name="txtSex" id="txtSex" type="text" value="<?php echo $Sex; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Category</strong></td>

		<td style="width: 524px">

		<input name="txtCategory" id="txtCategory" type="text" value="<?php echo $Category; ?>"></td>

	

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Nationality</strong></td>

		<td style="width: 524px">

		<input name="txtNationality" id="txtNationality" type="text" value="<?php echo $Nationality; ?>" style="height: 22px"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Date Of Joining</strong>:</td>

		<td style="width: 524px">



		<input type="date" name="txtDOJ" id="txtDOJ" size="15" style="font-family: Arial; color: #CC0033" value="<?php echo $DOJ; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Last School:</strong></td>

		<td class="style5">



		<input name="txtLastSchool" id="txtLastSchool" type="text" value="<?php echo $LastSchool; ?>"></td>

	</tr>

	

<tr>

		<td class="style4">

		<strong>Emp Type:</strong></td>

		<td class="style5">



		<input name="txtEmpType" id="txtEmpType" type="text" value="<?php echo $EmpType; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Class Teacher</strong></td>

		<td style="width: 524px">

		<input name="txtClassTeacher" id="txtClassTeacher" type="text" value="<?php echo $ClassTeacher; ?>"></td>

	</tr><tr>

	

	

		<td style="width: 523px" class="style3"><strong>Qualification</strong></td>

		<td style="width: 524px">

		<input name="txtQuali" id="txtQuali" type="text" value="<?php echo $EduQuali; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Father Name</strong></td>

		<td style="width: 524px">

		<input name="txtFatherName" id="txtFatherName" type="text" value="<?php echo $FatherName; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Salary</strong></td>

		<td style="width: 524px">

		<input name="txtSalary" id="txtSalary" type="text" value="<?php echo $Salary; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Allowances</strong></td>

		<td style="width: 524px">

		<input name="txtAllowance" id="txtAllowance" type="text" value="<?php echo $Allowances; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		Address</td>

		<td class="style5">

		<input name="txtAddress" id="txtAddress" type="text" value="<?php echo $Address; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Mobile:</strong></td>

		<td class="style5">

		<input name="txtMobile" id="txtMobile" type="text" value="<?php echo $smobile; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>IMEI:</strong></td>

		<td class="style5">

		<input name="txtImei" id="txtImei" type="text" value="<?php echo $simei; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>User Id.:</strong></td>

		<td class="style5">



		<input name="txtUserId" id="txtUserId" type="text" value="<?php echo $suser; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Password:</strong></td>

		<td class="style5">

		<input name="txtPassword" id="txtPassword" type="text" value="<?php echo $spassword; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Email:</strong></td>

		<td class="style5">

		<input name="txtEmail" id="txtEmail" type="text" value="<?php echo $email; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Role:</strong></td>

		<td class="style5">

		<input name="txtRole" id="txtRole" type="text" value="<?php echo $Role; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Department:</strong></td>

		<td class="style5">

		<input name="txtDepartment" id="txtDepartment" type="text" value="<?php echo $Department; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Designation:</strong></td>

		<td class="style5">

		<input name="txtDesignation" id="txtDesignation" type="text" value="<?php echo $Designation; ?>">
		</td>

	</tr>

	<tr>

		<td class="style4">

		<b>Pay band</b></td>

		<td class="style5">

		<input type="text" name="txtPayband" id="txtPayband" size="20" value="<?php echo $PayBand; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<b>Employee Type</b></td>

		<td class="style5">

		<input type="text" name="txtEmpType" id="txtEmpType" size="20" value="<?php echo $EmpType; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<b>Level 1 Approver</b></td>

		<td class="style5">

		<input type="text" name="txtL1Approver" id="txtL1Approver" size="20" value="<?php echo $L1Approver; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<b>Level 2 Approver</b></td>

		<td class="style5">

		<input type="text" name="txtL2Approver" id="txtL2Approver" size="20" value="<?php echo $L2Approver; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<b>Level 3 Approver</b></td>

		<td class="style5">

		<input type="text" name="txtL3Approver" id="txtL3Approver" size="20" value="<?php echo $L3Approver; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<b>Teaching Subject</b></td>

		<td class="style5">

		<input type="text" name="txtTeachingSubject" id="txtTeachingSubject" size="20" value="<?php echo $TeachingSubject; ?>"></td>

	</tr>
<tr>

		<td class="style4">

		<b>Marital Status</b></td>

		<td class="style5">

		<input type="text" name="txtMaritalStatus" id="txtMaritalStatus" size="20" value="<?php echo $MaritalStatus; ?>"></td>

	</tr>
<tr>

		<td class="style4">

		<b>Husband Name</b></td>

		<td class="style5">

		<input type="text" name="txtHusbandName" id="txtHusbandName" size="20" value="<?php echo $HusbandName; ?>"></td>

	</tr>
<tr>

		<td class="style4">

		<b>Anniversary Date</b></td>

		<td class="style5">

		<input type="date" name="txtAniversaryDate" id="txtAniversaryDate" size="20" value="<?php echo $AniversaryDate; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		Status</td>

		<td class="style5">

		<input type="text" name="txtStatus" id="txtStatus" size="20" value="<?php echo $Status; ?>"></td>

	</tr>

	<tr>

		<td colspan="2" class="style2" height="56">

		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>

	</tr>

	</form>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>



</html>
