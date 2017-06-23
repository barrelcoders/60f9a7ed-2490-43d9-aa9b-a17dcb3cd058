<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
session_start();
$class=$_SESSION['StudentClass'];
$sadmission=$_SESSION['userid'];

	if($sadmission== "")
	{
		echo "<br><br><center><b>You are not logged-in!<br>Please click <a href='http://dpsfsis.com/'>here</a> to login into parent portal!";
		exit();
	}

$rsChk=mysql_query("select * from `StudentInfo_Class8` where `sadmission`='$sadmission'");
if(mysql_num_rows($rsChk)>0)
{
	echo "<br><br><center><b>Already Submitted!";
	exit();
}
//$sadmission="10328";
$rsStudentDetail=mysql_query("select `sname`,`DOB`,`PlaceOfBirth`,`Sex`,`sclass`,`LastSchool`,`Address`,`Hostel`,`sfathername`,`FatherEducation`,`FatherOccupation`,`smobile`,`email`,`MotherName`,`MotherEducation` from `student_master` where `sadmission`='$sadmission'");
while($rowS=mysql_fetch_row($rsStudentDetail))
{
	$sname=$rowS[0];
	
	$DOB=$rowS[1];
	$arr=explode('-',$DOB);
	$DOB= $arr[1] . "/" . $arr[2] . "/" . $arr[0];
	
	$PlaceOfBirth=$rowS[2];
	$Sex=$rowS[3];
	$sclass=$rowS[4];
	$LastSchool=$rowS[5];
	$Address=$rowS[6];
	$Hostel=$rowS[7];
	$sfathername=$rowS[8];
	$FatherEducation=$rowS[9];
	$FatherOccupation=$rowS[10];
	$smobile=$rowS[11];
	$email=$rowS[12];
	$MotherName=$rowS[13];
	$MotherEducation=$rowS[14];
	break;
}

$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
{
}

$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);
$rsEducation=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation1=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");

$rsSchooListFather=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");
$rsSchooListMother=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");

$rsLocation=mysql_query("select distinct `Sector` from `NewStudentRegistrationDistanceMaster` order by `Sector`");

$currentdate=date("d-m-Y");

	$ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";
	$rsRoute= mysql_query($ssqlRoute);
	
	

$ssqlDiscount="SELECT distinct `head` FROM `discounttable` where `discounttype`='tuitionfees'";
$rsDiscount= mysql_query($ssqlDiscount);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='admissionfees'";
$rsAdmissionFeeDiscount= mysql_query($sstr);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='annualcharges'";
$rsAnnualFeeDiscount= mysql_query($sstr);

$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

?>
<script language="javascript">
function Validate()
{
	
	if(document.getElementById("txtName").value=="")
	{
		alert("Please enter Name!");
		return;
	}
	if(document.getElementById("txtMotherName").value=="")
	{
		alert("Please enter MotherName!");
		return;
	}
	if(document.getElementById("txtFatherName").value=="")
	{
		alert("Please enter Father's Name!");
		return;
	}
	if(document.getElementById("txtmobile").value=="")
	{
		alert("Please enter Mobile!");
		return;
	}
	if(document.getElementById("txtEmail").value=="")
	{
		alert("Please enter Email!");
		return;
	}
	if(document.getElementById("cboClass").value=="")
	{
		alert("Please enter Class !");
		return;
	}
	if(document.getElementById("txtAddress").value=="")
	{
		alert("Please enter Address!");
		return;
	}
	if(document.getElementById("txtDOB").value=="")
	{
		alert("Please enter DOB!");
		return;
	}
  if(document.getElementById("cboSubject").value=="")
	{
		alert("Please Select Optional Subject!");
		return;
	}


	

	document.getElementById("frmMaths").submit();
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Optional Selection</title>
<link rel="stylesheet" type="text/css" href="../Admin/css/style.css" />
<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	border-collapse: collapse;
	border-width: 0px;
}
.style3 {
	text-align: left;
}
</style>
</head>
<body>
<div id="logo">
<p align="center">
<img src="../Admin/images/logo.png" height="90px" width="400px" />
<br><font face="cambria" size="4" color=#FFFFFF><b><?php echo $SchoolAddress; ?><br><br></b></font>
</p>
<h1 align=center>
<font face="Cambria" style="font-size: 16pt; text-decoration: underline"><span style="font-weight: 400">
<br></span></font>
<font face="Cambria" style="font-size: 16pt">SECOND LANGUAGE FORM</font><font face="Cambria" style="font-size: 16pt; "><br>&nbsp;</font></h1> 
<form name="frmMaths" id="frmMaths" method="post" action="SubmitStudentInfo.php" enctype="multipart/form-data">
<table border="1" width="100%" style="border-width:0px; border-collapse: collapse; ">
	<tr>
		<td style="border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">Name</td>
		<td style="border-style: none; border-width: medium"><b>
                <input type="text" name="txtName" class="text-box" id="txtName" value="<?php echo $sname;?>" ></b></td>
		<td style="border-style: none; border-width: medium">DOB</td>
		<td style="border-right:medium none #808080; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium"><b>
                <input id="txtDOB" type="text" name="txtDOB" class="text-box" value="<?php echo $DOB;?>" /></b></td>
	</tr>
	<tr>
		<td style="border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-right:medium none #808080; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">Class</td>
		<td style="border-style: none; border-width: medium"><b>
               <select size="1" name="cboClass" id="cboClass"  class="text-box">
		<option selected value="">Select One</option>
		<option value="8">8</option>
		
		

		</select></b></td>
		<td style="border-style: none; border-width: medium">Mobile No</td>
		<td style="border-right:medium none #808080; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium"><b>
                <input id="txtmobile" type="text" name="txtmobile" class="text-box" value="<?php echo $smobile;?>"/></b></td>
	</tr>
	<tr>
		<td style="border-left:medium none #C0C0C0; border-bottom-style: none; border-bottom-width: medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium">&nbsp;</td>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-right:medium none #808080; border-bottom-style: none; border-bottom-width: medium; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">Father's Name</td>
		<td style="border-style:none; border-width:medium; "><b><input id="txtFatherName" class="text-box" type="text" name="txtFatherName" value="<?php echo $sfathername;?>" /></b></td>
		<td style="border-style:none; border-width:medium; ">Email Id</td>
		<td style="border-style:none; border-width:medium; "><b>
                <input id="txtEmail" type="text" name="txtEmail" class="text-box" value="<?php echo $email;?>"/></b></td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">Mother's Name</td>
		<td style="border-style: none; border-width: medium"><b><input id="txtMotherName" type="text" name="txtMotherName" class="text-box" value="<?php echo $MotherName;?>" /></b></td>
		<td style="border-style: none; border-width: medium">Address</td>
		<td style="border-style:none; border-width:medium; "><b>
                <input id="txtAddress" type="text" name="txtAddress" class="text-box" value="<?php echo $Address;?>"></b></td>
	</tr>
	<tr>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:solid; border-bottom-width:1px">Optional Subject</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:solid; border-bottom-width:1px"><b>
               <select size="1" name="cboSubject" id="cboSubject" class="text-box" >
		<option selected value="">Select One</option>
		<option value="Hindi">Hindi</option>
		<option value="Sanskrit">Sanskrit</option>
		<option value="French">French</option>
		
		

		</select></b></td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" colspan="4" style="border-style:none; border-width:medium; ">
				<input type="button" name="btnSubmit" class="text-box" value="Submit" onclick="javascript:Validate();"></td>
	</tr>
</table>
</div>


</body>