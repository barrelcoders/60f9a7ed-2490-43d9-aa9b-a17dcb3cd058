<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$Message1="";
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);


if(isset($_POST['BtnSubmit']))
{



if ($_REQUEST["txtName"] != "")

{
				$txtEmpId=$_REQUEST["txtEmpId"];
				$txtName=$_REQUEST["txtName"];
				$txtDOB=$_REQUEST["txtDOB"];
				$txtSex=$_REQUEST["txtSex"];
				$txtCategory=$_REQUEST["txtCategory"];
				$cboMaritalStatus=$_REQUEST["cboMaritalStatus"];
				$txtFatherName=$_REQUEST["txtFatherName"];
				$txtHusbandName=$_REQUEST["txtHusbandName"];
				$txtLastSchool=$_REQUEST["txtLastSchool"];
				$txtAddress=$_REQUEST["txtAddress"];
				$txtAnniversary=$_REQUEST["txtAnniversary"];
				$txtDOJ=$_REQUEST["txtDOJ"];
				$txtNationality=$_REQUEST["txtNationality"];
				$cboDepartment=$_REQUEST["cboDepartment"];
				$txtRole=$_REQUEST["txtRole"];
				$cboDesignation=$_REQUEST["cboDesignation"];
				$cboClassTeacher=$_REQUEST["cboClassTeacher"];
				$txtEducation=$_REQUEST["txtEducation"];
				$txtSubject=$_REQUEST["txtSubject"];
				$cboDepartmentCategory=$_REQUEST["cboDepartmentCategory"];
				$cboEmployeeType=$_REQUEST["cboEmployeeType"];
				$txtSalary=$_REQUEST["txtSalary"];
				$txtPayBand=$_REQUEST["txtPayBand"];
				$txtMobile=$_REQUEST["txtMobile"];
				$txtUserId=$_REQUEST["txtUserId"];
				$txtPassword=$_REQUEST["txtPassword"];
				$txtEmail=$_REQUEST["txtEmail"];
	

		$sql = "SELECT `srno` , `EmpId` , `Name`, `DOB`, `Sex`,`Category`, `Nationality` ,`DOJ`,`LastSchool`,`ClassTeacher`, `Education_Qualification`,`TeachesSubject`, `FatherName`, `Salary`, `Allowances`,`Address`,`MobileNo`,`Imei`,`UserId`,`Password`,`email` FROM `teacher_master` where  `EmpId``='$EmpId'";

		$result = mysql_query($sql,$Con);
	  // $i=mysql_num_rows($result)	
		if (!$result) {
		

		
			$ssql="INSERT INTO `employee_master`(`EmpId`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`,  `Address`, `MobileNo`, `UserId`, `Password`, `email`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `EmployeeCategory`) VALUES ('$txtEmpId' , '$txtName', '$txtDOB', '$txtSex','$txtCategory', '$txtNationality' ,'$txtDOJ','$txtLastSchool','$cboEmployeeType', '$cboClassTeacher','$txtEducation', '$txtFatherName', '$txtSalary', '$txtAddress','$txtMobile','$txtUserId','$txtPassword','$txtEmail','$cboDepartment','$cboDesignation','$txtPayBand','$txtSubject','$cboMaritalStatus','$txtHusbandName','$txtAnniversary','$cboDepartmentCategory')";
                 //echo $ssql;
                 //exit();
			mysql_query($ssql) or die(mysql_error());
			$Message1="Employee registered successfully!";
			
		echo "<br><br><center><b>Employee has been successfully admitted with EmpId :".$txtEmpId."<br><br>Define Salary <a href='../Payroll/NewEmployeeSalaryDefine.php?txtEmpId=".$txtEmpId."' target='_blank'>Structure</a>";

		}

		else

		{

			$Message1="Emp No:" . $EmpId . " already exists!" ;

		}

		



}
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

	if (document.getElementById("txtEmpId").value=="")

	{

		alert("Employee is mandatory is mandatory");

		return;

	}

	if (document.getElementById("txtDOJ").value=="")

	{

		alert("Date of Joining is mandatory");

		return;

	}
	
	if (document.getElementById("cboDepartmentCategory").value=="")

	{

		alert("Department Category is mandatory");

		return;

	}

	
	if (document.getElementById("txtDOB").value=="")

	{

		alert("Date of Birth is mandatory");

		return;

	}

if (document.getElementById("cboEmployeeType").value=="")

	{

		alert("Employee Type is mandatory");

		return;

	}


if (document.getElementById("txtEducation").value=="")

	{

		alert("Education Qualification is mandatory");

		return;

	}

if (document.getElementById("txtSalary").value=="")
	{
		alert("Salary is mandatory");
		return;
	}
	else
	{
		if(isNaN(document.getElementById("txtSalary").value==true)
		{
			alert ("Salary should be numeric!");
			return;
		}
	}
	if (document.getElementById("txtFatherName").value=="")

	{

		alert("Father's name is mandatory");

		return;

	}

	if (document.getElementById("txtMobile").value=="")
	{

		alert("Mobilie No is mandatory");
		return;
	}
	else
	{
		if(isNaN(document.getElementById("txtMobile").value==true)
		{
			alert ("Mobile No should be numeric!");
			return;
		}
	}

	if (document.getElementById("txtImei").value=="")

	{

		alert("IMEI is mandatory");

		return;

	}

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
     
     	if (document.getElementById("cboDesignation").value=="")

	{

		alert("Designation is mandatory");

		return;

	}

	document.getElementById("frmNewTeacher").submit();

	

}

function ShowEdit(SrNo)

{

	//window.open "EditHoliday.php?srno" . SrNo;

	var myWindow = window.open("EditTeacherMaster.php?srno=" + SrNo ,"","width=300,height=400");

}


</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Employee Registration</title>

<!-- link calendar resources -->
<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

}

.style3 {

	text-decoration: none;

}

.style5 {

	border-right-style: solid;

	border-right-width: 1px;

}

.style7 {

	border-left-style: solid;

	border-left-width: 1px;

	text-align: center;

}

.style10 {

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.auto-style1 {
	font-size: 11pt;
}
.auto-style2 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style3 {
	border-style: none;
	border-width: medium;
	font-size: 11pt;
}
.auto-style8 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
	text-align: center;
}
.auto-style9 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
	text-align: left;
}

.auto-style11 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style12 {
	border-style: none;
	border-width: medium;
}
.auto-style14 {
	border-style: none;
	border-width: medium;
	color: #000000;
	font-family: Cambria;
	font-size: 11pt;
}
.auto-style15 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style17 {
	font-size: 11pt;
	color: #000000;
}

.auto-style21 {
	text-align: left;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style6 {
	color: #DAB9C1;
}

.auto-style22 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
}
.auto-style23 {
	border-style: none;
	border-width: medium;
	color: #000000;
	font-family: Cambria;
	font-size: 11pt;
	background-color: #99CCFF;
}
.auto-style24 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
	background-color: #99CCFF;
}

.auto-style25 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	background-color: #99CCFF;
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

</style>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>
</head>



<body>

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style22">

	

	
	<tr>
		<td width=50% class="auto-style12">

				<div class="auto-style21">

					<strong>New Employee Registration</strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</table>


	
	<table width="100%">
	<tr>
	<td class="auto-style25" style="border-style: solid; border-width: 1px; background-color:#95C23D">
	
	<strong>Employee Personal Details
	</strong>
	</td></tr></table>
	
	<table border="1px" style="border-collapse: collapse">
	<form name="frmNewTeacher" id="frmNewTeacher" method="post" >
	
		<tr>
		
		<td style="width: 190px; height: 29px;" class="auto-style12">

		&nbsp;</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">



		&nbsp;</td>
	</tr>
	
	
		<tr>
		
		<td style="width: 190px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Emp Id</span><span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style12">



		<input type="text" name="txtEmpId" id="txtEmpId" size="15" style="font-family: Arial; color: #CC0033" class="text-box"><span>
		</span>
		</td>
	</tr>
	
	
		<tr>
		
		<td style="width: 190px; height: 29px;" class="auto-style12">&nbsp;

		</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">&nbsp;



		</td>
	</tr>
	
	
	<tr>
	
	
	
		<td style="width: 190px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Name</span><span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span><span>
		</span>

		</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">

		<input name="txtName" id="txtName" type="text" class="text-box" style="width: 112px"></td>
	
		
		
		
	
		<td style="width: 202px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Date Of Birth</span><span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span><span >
		</span>

		</td>

		<td style="width: 190px; height: 29px;" class="auto-style12">

		<input name="txtDOB" id="txtDOB" type="date"  style="width: 119px" value="Date Of Birth" size="20" class="text-box"></td>
		
		
	
		<td style="width: 191px; height: 29px;" class="auto-style12">

		<span style="font-family: Cambria; font-weight: 700; color: #000000" >
		Gender:</span><span>
		</span>

		</td>
		
		

		<td style="width: 330px; height: 29px;" class="auto-style12">

		<select class="text-box" name="txtSex" style="width: 78px">
		<option selected="">Male</option>
		<option>Female</option>
		</select></td>
		<br >
		
		<td style="width: 278px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Category</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style12">

		<select class="text-box" name="txtCategory"  id="txtCategory" style="width: 103px">
		<option selected="">General</option>
		<option>SC / ST</option>
		<option>OBC</option>
		</select></td>
		<br class="text-box">
		</tr>
		
		
	<tr>
	
	
	
		<td style="width: 190px; height: 29px;" class="auto-style12">&nbsp;

		</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">&nbsp;

		</td>
	
		
		
		
	
		<td style="width: 202px; height: 29px;" class="auto-style12">&nbsp;

		</td>

		<td style="width: 190px; height: 29px;" class="auto-style12">&nbsp;

		</td>
		
		
	
		<td style="width: 191px; height: 29px;" class="auto-style12">&nbsp;

		</td>
		
		

		<td style="width: 330px; height: 29px;" class="auto-style12">&nbsp;

		</td>
		
		<td style="width: 278px; height: 29px;" class="auto-style12">&nbsp;

		</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">&nbsp;

		</td>
		</tr>
		
		
		<tr>
		<td style="width: 190px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Marital Status</span><span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span><span >
		</span>

		</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">

		<select name="cboMaritalStatus" id="cboMaritalStatus"  class="text-box">

		<option>Married</option>
		<option>Single</option>

		</select></td>
		<br class="text-box">
		
		<td style="width: 202px; height: 29px;" class="auto-style11">

		Father's Name</td>

		<td style="width: 190px; height: 29px;" class="auto-style3">

		<input name="txtFatherName" id="txtFatherName" type="text" style="width: 121px" class="text-box"></td>

		
		

	

		<td style="height: 29px;" class="auto-style14">

		<strong>Husband Name</strong></td>

			
		

	

		<td style="height: 29px;" class="auto-style12">

		<input name="txtHusbandName"  id="txtHusbandName" type="text" style="width: 107px" class="text-box"></td>

			
		
		<td style="height: 29px;" class="auto-style12">

		<span class="auto-style2">Last School Taught</span><span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span></td>

			
		
		<td style="height: 29px;" class="auto-style12">

		<input name="txtLastSchool" id="txtLastSchool" type="text" class="text-box" style="width: 134px"></td>

			</tr>
		
		
		<tr>
		<td style="width: 190px; height: 29px;" class="auto-style12">&nbsp;

		</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">&nbsp;

		</td>
		
		<td style="width: 202px; height: 29px;" class="auto-style11">&nbsp;

		</td>

		<td style="width: 190px; height: 29px;" class="auto-style3">&nbsp;

		</td>

		
		

	

		<td style="height: 29px;" class="auto-style14">&nbsp;

		</td>

			
		

	

		<td style="height: 29px;" class="auto-style12">&nbsp;

		</td>

			
		
		<td style="height: 29px;" class="auto-style12">&nbsp;

		</td>

			
		
		<td style="height: 29px;" class="auto-style12">&nbsp;

		</td>

			</tr>
		
		
		<tr>
		<td style="width: 190px; height: 29px;" class="auto-style14">

		<span class="auto-style2">Address </span>
			<span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style12">

		
			<textarea name="txtAddress" id="txtAddress" style="width: 223; height: 40" rows="1" cols="20"></textarea></td>
		
		<td style="width: 202px; height: 29px;" class="auto-style11">

		<strong>Anniversary Date (If Married)</strong></td>

		<td style="width: 190px; height: 29px;" class="auto-style3">

		<input name="txtAnniversary" id="txtAnniversary" type="date" class="text-box" style="width: 134px" value="Anniversary Date" size="30"></td>

		
		

	

		<td style="height: 29px;" class="auto-style14">

			<span class="auto-style2">Date of Joining</span><span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span></td>

			
		

	

		<td style="height: 29px;" class="auto-style12">



		<input name="txtDOJ" id="txtDOJ" type="date"   size="22" class="text-box"></td>

			
		
		<td style="height: 29px;" class="auto-style12"><b><font face="Cambria">
		Nationality</font></b></td>

			
		
		<td style="height: 29px;" class="auto-style12">

		<input name="txtNationality" id="txtNationality" type="text" class="text-box" style="width: 134px"></td>

			</tr>
		
		
		<tr>
		<td style="width: 190px; height: 29px;" class="auto-style14">

		&nbsp;</td>

		<td style="width: 157px; height: 29px;" class="auto-style12">

		&nbsp;</td>
		
		<td style="width: 202px; height: 29px;" class="auto-style11">&nbsp;

		</td>

		<td style="width: 190px; height: 29px;" class="auto-style3">&nbsp;

		</td>

		
		

	

		<td style="height: 29px;" class="auto-style14">&nbsp;

		</td>

			
		

	

		<td style="height: 29px;" class="auto-style12">&nbsp;

		</td>

			
		
		<td style="height: 29px;" class="auto-style12">&nbsp;

		</td>

			
		
		<td style="height: 29px;" class="auto-style12">&nbsp;

		</td>

			</tr>
		
		</table>
		<br class="text-box">
		
	
		<table border="1" width="100%" style="border-collapse: collapse">
		<tr>
		

		<td style="border-style:solid; border-width:1px; height: 8px; background-color:#95C23D" class="auto-style23" colspan="6">

		<strong>Employee Department Details</strong></td>

		
			
			</tr>
			
			
		
		<tr>
		

		<td style="
 height: 29px; border-top-style:solid; border-top-width:1px" class="auto-style14">

		<strong>Department</strong></td>

		<td style="
 height: 29px; border-top-style:solid; border-top-width:1px" class="auto-style12">

		<select name="cboDepartment" id="cboDepartment"  class="text-box">

		<option selected="" value="Select One">Select One</option>
		<?php
		$rsDepartment=mysql_query("SELECT distinct `Department` from `employee_master`");

		while($row1 = mysql_fetch_row($rsDepartment))
		{
					$Department=$row1[0];
		?>
		<option value="<?php echo $Department; ?>"><?php echo $Department; ?></option>
		<?php 
		}
		?>

		</select></td>
		
			
			<td style="width: 18%; height: 29px; border-top-style:solid; border-top-width:1px" class="auto-style14">

			<b>Role</b></td>

		<td style="height: 29px; border-top-style:solid; border-top-width:1px" class="auto-style12" width="17%">



		<strong>

		<input name="txtRole" id="txtRole" type="text" class="auto-style15" style="width: 114px" class="text-box"></strong></td>
		
		
			
			<td style="width: 9%; height: 29px; border-top-style:solid; border-top-width:1px" class="auto-style14">

			<strong>Designation</strong></td>

		<td style="height: 29px; border-top-style:solid; border-top-width:1px" class="auto-style12">



		<select name="cboDesignation" id="cboDesignation" class="text-box">

		<option selected="" value="Select One">Select One</option>
		<?php
		$rsDesignation=mysql_query("SELECT distinct `Designation` from `employee_master`");
		while($row1 = mysql_fetch_row($rsDesignation))
		{
					$Designation=$row1[0];
		?>
		<option value="<?php echo $Designation; ?>"><?php echo $Designation; ?></option>
		<?php 
		}
		?>

		</select></td>
		
		
			
			</tr>
			
			
		
		<tr>
		

		<td style="
 height: 29px" class="auto-style11">&nbsp;

		</td>

		<td style="
 height: 29px" class="auto-style12">&nbsp;

		</td>
		
			
			<td style="width: 18%; height: 29px" class="auto-style12">&nbsp;

			</td>

		<td style="height: 29px;" class="auto-style12" width="17%">&nbsp;



		</td>
		
		
			
			<td style="width: 9%; height: 29px" class="auto-style12">&nbsp;

			</td>

		<td style="width: 12%; height: 29px" class="auto-style12">&nbsp;



		</td>
		
			</tr>
			
			
		
		<tr>
		

		<td style="
 height: 25px" class="auto-style11">

		Class Teacher of Class</td>

		<td style="
 height: 25px" class="auto-style12">

		<select name="cboClassTeacher" id="cboClassTeacher" class="text-box">

		<option selected="" value="Select One">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php 
		}
		?>

		</select>
		
		</td>
		
			
			<td style="width: 18%; height: 25px" class="auto-style12">

			<span class="auto-style2">Education Qualification</span><span style="font-family: Cambria; font-weight: 700; color: #000000" </span></td>

		<td style="height: 25px;" class="auto-style12" width="17%">



		<input name="txtEducation" id="txtEducation" type="text" class="text-box" style="width: 115px"></td>
		
		
			
			<td style="width: 9%; height: 25px" class="auto-style12">

			&nbsp;</td>

		<td style="width: 12%; height: 25px" class="auto-style12">



		&nbsp;</td>
		
			</tr>
			
			
		
		<tr>
		

		<td style="
 height: 33px" class="auto-style11">&nbsp;</td>

		<td style="
 height: 33px" class="auto-style12">&nbsp;</td>
		
			
			<td style="width: 18%; height: 33px" class="auto-style12">&nbsp;</td>

		<td style="height: 33px;" class="auto-style12" width="17%">&nbsp;</td>
		
		
			
			<td style="width: 9%; height: 33px" class="auto-style12">&nbsp;</td>

		<td style="width: 12%; height: 33px" class="auto-style12">&nbsp;</td>
		
			</tr>
			
			
		
		<tr>
		

		<td style="
 height: 29px" class="auto-style11">&nbsp;

		Teaches Subject</td>

		<td style="
 height: 29px" class="auto-style12">

			

		<input name="txtSubject" id="txtSubject" type="text" class="text-box" style="width: 120px"></td>
		
			
			<td style="width: 18%; height: 29px" class="auto-style12">&nbsp;<font face="Cambria"><b>Employee 
			Department Category</b></font></td>

		<td style="height: 29px;" class="auto-style12" width="17%">
		<font face="Cambria">&nbsp;



		</font>



		<strong>
		<select  name="cboDepartmentCategory" id="cboDepartmentCategory" class="text-box">
		<option selected value="">Select One</option>
		<option value="Administrative Staff">Administrative Staff</option>
		<option value="">Teaching Staff</option>
		<option>Class IV</option>
		<option >Non-Teaching Staff</option>
		<option >Transport</option>
		</select></strong></td>
		
		
			
			<td style="width: 9%; height: 29px" class="auto-style12">
			<font face="Cambria">&nbsp;

			<b>Employee Type</b></font></td>

		<td style="width: 12%; height: 29px" class="auto-style12">&nbsp;



		<strong>
		<select class="text-box" name="cboEmployeeType" id="cboEmployeeType" >
		<option selected value="">Select One</option>
		<option value="ADHOC">ADHOC</option>
		<option value="CONTRACTUAL">CONTRACTUAL</option>
		<option value="REGULAR">REGULAR</option>
		
			</tr>
			
			
		
			<tr>
			
			
		

		<td style="
 height: 29px" class="auto-style11">&nbsp;

		</td>

		<td style="
 height: 29px" class="auto-style12">&nbsp;

	

		</td>
		
			
			<td style="height: 29px;" class="auto-style9" colspan="2">&nbsp;

			</td>

			
	

		<td style="height: 29px;" colspan="2" class="auto-style12">&nbsp;

		
			</td>

</tr>	
			
			
		
			<tr>
			
			
		

		<td style="
 height: 29px" class="auto-style11">

		&nbsp;</td>

		<td style="
 height: 29px" class="auto-style12">


		&nbsp;</td>
		
			
			<td style="height: 29px;" class="auto-style9" colspan="2">

			&nbsp;</td>

			
			<td style="height: 29px;" class="auto-style9" colspan="2">


		&nbsp;</td>

</tr>	
</table>
<br>
		
	
		<table border="1" width="100%" style="height: 9px">
			
			
		
			<tr>
			
			
		

		<td class="auto-style24" style="background-color: #95C23D">

		Employee Contact Details</td>

</tr>	
</table>

<table border="1" width="100%" style="border-collapse: collapse">

<tr>			
		

		<td style="width: 157px; height: 29px;" class="auto-style12">&nbsp;

		</td>

		<td style="width: 158px; height: 29px;" class="auto-style12">&nbsp;

		</td>

	
		

		<td style="width: 157px; height: 29px;" class="auto-style12">&nbsp;

		</td>

		<td style="width: 120px; height: 29px;" class="auto-style12">&nbsp;

		</td>
		
			</tr>
		
<tr>			
		

		<td style="width: 157px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Mobile</span><span style="font-family: Cambria; font-weight: 700; color: #000000">:</span></td>

		<td style="width: 158px; height: 29px;" class="auto-style12">

		<input name="txtMobile" id="txtMobile" type="text" class="text-box"></td>

	
		

		<td style="width: 157px; height: 29px;" class="auto-style12">

		<span class="auto-style2">User Id</span><span style="font-family: Cambria; font-weight: 700; color: #000000" >:</span></td>

		<td style="width: 120px; height: 29px;" class="auto-style12">

		

		<input name="txtUserId" id="txtUserId" type="text" class="text-box"></td>
		
		
		<td style="width: 157px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Password</span><span style="font-family: Cambria; font-weight: 700; color: #000000" </span></td>

		<td style="width: 120px; height: 29px;" class="auto-style12">

		<input name="txtPassword" id="txtPassword" type="text" class="text-box" style="width: 112px"></td>
		
		
		
		
		<td style="width: 157px; height: 29px;" class="auto-style12">

		<span class="auto-style2">Email</span><span style="font-family: Cambria; font-weight: 700; color: #000000"</span></td>

		<td style="width: 120px; height: 29px;" class="auto-style12">

		<input name="txtEmail" id="txtEmail" type="text" class="text-box"></td>
		
		
			</tr>
		
	
	<?php 

	if ($Message1 != "")

	{

	?>

	<?php 

	}

	?>

	

	<tr>

		<td style="height: 29px;" colspan="8" class="auto-style8">

		&nbsp;</td>

	</tr>

	

	<tr>

		<td style="height: 29px;" colspan="8" class="auto-style8">

		<strong>

		<input name="BtnSubmit" type="submit" value="Submit" class="text-box" style="font-weight: 700"></strong></td>

	</tr>

</form>		

</table>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>


</body>



</html>