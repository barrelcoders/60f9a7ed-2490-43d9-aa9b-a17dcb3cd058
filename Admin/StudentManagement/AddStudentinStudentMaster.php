<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>



<?php
if(isset($_POST['submit']))
{


	$Name=$_POST["txtName"];
    $DOB=$_POST["txtDOB"];
    $Sex=$_POST["txtSex"];
	$Category=$_POST["txtCategory"];
	$Nationality=$_POST["txtNationality"];
	$ClassMaster=$_POST["cboClassMaster"];
	$Admission=$_POST["txtAdmission"];
	$Class=$_POST["cboClass"];
	$RollNo=$_POST["txtRollNo"];
	$DOJ=$_POST["txtDOJ"];
	$FatherName=$_POST["txtFatherName"];
	$FatherEducation=$_POST["txtFatherEducation"];
	$FatherOccupation=$_POST["txtFatherOccupation"];
	$MotherName=$_POST["txtMotherName"];
	$MotherEducation=$_POST["txtMotherEducation"];
	$Address=$_POST["txtAddress"];
	$Mobile=$_POST["txtMobile"];
	$AlternateMobile=$_POST["txtAlternateMobile"];
    $UserId=$_POST["txtUserId"];
	$Password=$_POST["txtPassword"];
	$Email=$_POST["txtEmail"];
	$status=$_POST["txtstatus"];
	$FinancialYear=$_POST["txtFY"];


 //$sql="INSERT INTO user_master(`sadmission`,`sname`,`sclass`,`srollno`,`suser`,`spassword`,`FinancialYear`,`sfathername`,`smobile`,`simei`,`email`,`status`)VALUES('$sadmission','$sname','$sclass','$srollno','$suser','$spassword','$FinancialYear','$sfathername','$smobile','$simei','$email','$status')";
   
   $sql="INSERT INTO `student_master`(`sname`, `DOB`, `Sex`, `Category`, `Nationality`, `sadmission`, `sclass`,`MasterClass`, `srollno`,`sfathername`, `FatherEducation`,
    `FatherOccupation`, `MotherName`, `MotherEducation`, `Address`, `smobile`, `AlternateMobile`, `suser`, `spassword`, `email`, `status`,`FinancialYear`, `DateOfAdmission`)
     VALUES ('$Name','$DOB','$Sex','$Category','$Nationality','$Admission','$Class','$ClassMaster','$RollNo','$FatherName','$FatherEducation','$FatherOccupation','$MotherName','$MotherEducation',
     '$Address','$Mobile','$AlternateMobile','$UserId','$Password','$Email','$status','$FinancialYear','$DOJ')";
   
   //echo $sql;
   //exit();
   
   $rs=mysql_query($sql);
   
   
   
}


	



			//$ssql="UPDATE `student_master` SET `sname`='$Name',`DOB`='$DOB',`Sex`='$Sex',`Category`='$Category',`Nationality`='$Nationality',`sadmission`='$Admission',`sclass`='$Class',`srollno`='$RollNo',`LastSchool`='$LastSchool',`sfathername`='$FatherName',`FatherEducation`='$FatherEducation',`FatherOccupation`='$FatherOccupation',`MotherName`='$MotherName',`MotherEducation`='$MotherEducation',`Address`='$Address',`smobile`='$Mobile',`simei`='$Imei',`suser`='$UserId',`spassword`='$Password',`email`='$Email' WHERE `srno` = '$srno'";
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Student In Student Master</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
<!--
.auto-style32 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;

	font-family: Cambria;

}

.auto-style35 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

	text-align: center;

}





.style8 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

}



.auto-style1 {
	border-width: 1px;
	color: #000000;
	font-family: Cambria;
	font-size: 15px;
}

.auto-style2 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	font-style: normal;
	text-decoration: none;
	color: #000000;
}

.style1 {

	text-align: center;

	color: #0000FF;

}

.auto-style3 {
	color: #000000;
}
.auto-style5 {



	border-left: 0px solid #808080;



	border-right: 0px solid #808080;



	border-top: 0px solid #808080;



	border-bottom: 0px solid #808080;



	border-collapse: collapse;



}



.auto-style5 {



	border-left: 0px solid #808080;



	border-right: 0px solid #808080;



	border-top: 0px solid #808080;



	border-bottom: 0px solid #808080;



	border-collapse: collapse;



}



.auto-style3 {



	border-style: none;



	border-width: medium;



	font-family: Cambria;



	font-size: 12pt;



	color: #FFFFFF;



	text-decoration: underline;



	background-color: #000000;



}



.auto-style4 {



	border-style: none;



	border-width: medium;



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



}



.auto-style4 {

	text-align: center;

}



.auto-style2 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



}



.auto-style27 {



	border-style: none;



	border-width: medium;



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	text-align: center;



}



.auto-style27 {



	border-style: none;



	border-width: medium;



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	text-align: center;



}



.auto-style29 {



	font-family: Cambria;



	font-size: 12pt;



	color: #FFFFFF;



	border-left-color: #808080;



	text-decoration: underline;



	background-color: #000000;



}



.auto-style29 {



	font-family: Cambria;



	font-size: 12pt;



	color: #FFFFFF;



	border-left-color: #808080;



	text-decoration: underline;



	background-color: #000000;



}



.auto-style16 {



	border-left: 0px solid #808080;



	text-align: left;



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



}



.auto-style16 {



	border-left: 0px solid #808080;



	text-align: left;



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



}



.auto-style1 {



	text-align: left;



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



}



.auto-style25 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	text-align: center;



}



.auto-style25 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	text-align: center;



}



.style5 {



	text-align: left;



}



.style5 {



	text-align: left;



}



.auto-style19 {



	text-align: left;



	border-right-style: solid;



	border-right-width: 0px;



}



.auto-style19 {



	text-align: left;



	border-right-style: solid;



	border-right-width: 0px;



}



.auto-style17 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	border-left-color: #808080;



}



.auto-style17 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	border-left-color: #808080;



}



.auto-style20 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	border-right-style: solid;



	border-right-width: 0px;



}



.auto-style20 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	border-right-style: solid;



	border-right-width: 0px;



}



.auto-style23 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	margin-left: 2px;



}



.auto-style23 {



	font-family: Cambria;



	font-size: 12pt;



	color: #000000;



	margin-left: 2px;



}



.auto-style22 {



	font-family: Cambria;



	font-size: 12pt;



	color: #FFFFFF;



	text-decoration: underline;



	background-color: #000000;



}



.auto-style22 {



	font-family: Cambria;



	font-size: 12pt;



	color: #FFFFFF;



	text-decoration: underline;



	background-color: #000000;



}



.auto-style28 {



	font-family: Cambria;



	font-size: 12pt;



	color: #FFFFFF;



	border-left-color: #808080;



}



.auto-style28 {



	font-family: Cambria;



	font-size: 12pt;



	color: #FFFFFF;



	border-left-color: #808080;



}



.style2 {



	text-align: center;



}



.style2 {



	text-align: center;



}



.auto-style26 {



	color: #000000;



	font-weight: bold;



}



.auto-style26 {



	color: #000000;



	font-weight: bold;



}



-->
</style>
</head>
<body>
<form name="frmRpt" id="frmRpt" method="post" action="AddStudentinStudentMaster.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Add Student In Student Master </p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

        <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table>
<font face="Cambria"> 
<br /><br />
</font>     
<table style="width: 100%" class="auto-style5" >



	<tr>



		<td class="auto-style3" colspan="6" style="border-style:solid; border-width:1px; background-color: #A4C400">

		<p align="center">

		<font face="Cambria"><strong>Student Detail </strong></font></td>



	</tr>



	<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style2">

		<font face="Cambria">Name</font></td>



		<td style="width: 314px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		<input name="txtName" id="txtName" type="text" value=""  class="text-box" required></td>



		<td style="width: 414px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style27">



		<font face="Cambria">Date of Birth</font></td>



		<td style="width: 394px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		<input name="txtDOB" id="txtDOB" type="date" value=""  class="text-box" required></td>



		<td style="width: 524px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style27">



		<font face="Cambria">Gender</font></td>



		<td style="width: 524px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		<input name="txtSex" id="txtSex" type="text" value=""  class="text-box" required></td>



	</tr>



	<tr>



		<td style="width: 1140px; height: 21px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4"></td>



		<td style="border-style:none; border-width:medium; width: 314px; height: 21px" class="auto-style41">



		</td>



		<td style="border-style:none; border-width:medium; width: 414px; height: 21px" class="auto-style4">



		</td>



		<td style="border-style:none; border-width:medium; width: 394px; height: 21px" class="auto-style41">



		</td>



		<td style="border-style:none; border-width:medium; width: 524px; height: 21px" class="auto-style41">



		</td>



		<td style="width: 524px; height: 21px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		</td>



	</tr>



	



	<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style2">

		<font face="Cambria">Category</font></td>



		<td style="border-style:none; border-width:medium; width: 314px" class="auto-style41">



		<input name="txtCategory" id="txtCategory" type="text" value="" class="text-box" required></td>



		<td style="border-style:none; border-width:medium; width: 414px" class="auto-style27">



		<font face="Cambria">Nationality</font></td>



		<td style="border-style:none; border-width:medium; width: 394px" class="auto-style41">



		<input name="txtNationality" id="txtNationality" type="text" value="" class="text-box" required></td>



		<td style="width: 414px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style27">







		<font face="Cambria">Master Class</font></td>



		<td style="width: 394px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<input name="cboMasterClass" id="cboMasterClass" type="text" value=""  class="text-box" required ></td>



	</tr>



	



	<tr>



		<td style="width: 1140px; height: 21px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4"></td>



		<td style="border-style:none; border-width:medium; width: 314px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 414px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 394px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 524px; height: 21px" class="auto-style41">



		</td>



	



		<td style="width: 524px; height: 21px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		</td>



	



	</tr>



	



	<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style2">

		Admission No.</td>



		<td style="width: 314px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<input type="text" name="txtAdmission" id="txtAdmission" size="25" value="" class="text-box" required></td>



		<td style="width: 414px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style27">







		<font face="Cambria">Class</font></td>



		<td style="width: 394px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<b><font face="Cambria">
			  <select name="cboClass" style="float: left" ; >
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlclass="SELECT distinct `class` FROM `class_master`";
							$rsclass= mysql_query($ssqlclass);
							
							while($row1 = mysql_fetch_row($rsclass))
							{
									$class=$row1[0];
							?>
						 <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
						 <?php 
							}
							?>
			</select></font></td>



		<td style="width: 524px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style27">







		<font face="Cambria">Roll No.</font></td>



		<td style="width: 524px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<input name="txtRollNo" id="txtRollNo" type="text" value=" " class="text-box" required size=15></td>



	</tr>



	



	<tr>



		<td style="width: 1140px; height: 21px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4"></td>



		<td style="border-style:none; border-width:medium; width: 314px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 414px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 394px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 524px; height: 21px" class="auto-style41">



		</td>



	



		<td style="width: 524px; height: 21px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		</td>



	



	</tr>
<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style2">

		Date of Joining</td>



		<td style="width: 314px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<input type="date" name="txtDOJ" id="txtDOJ" size="15" value="" class="text-box" ></td>



		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style27" colspan="4">







		&nbsp;</td>



		</tr>



	



	<tr>



		<td class="auto-style50" colspan="6" style="border-bottom-style: solid; border-bottom-width: 1px">

		<font face="Cambria">&nbsp;</font></td>



	</tr>



	



	<tr>



		<td class="auto-style29" colspan="6" style="border-style:solid; border-width:1px; background-color: #A4C400">



		<p align="center">



		<font face="Cambria">



		<strong>Family Details </strong></font></td>



	</tr>



	<tr>



		<td class="auto-style16" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">



		<font face="Cambria">Father Name</font></td>



		<td class="auto-style1" style="width: 314px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">







		<input name="txtFatherName" id="txtFatherName" type="text" value="" class="text-box" required></td>



		<td class="auto-style25" style="width: 414px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">






		<font face="Cambria">Father Education</font></td>



		<td class="style5" style="width: 394px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">







		<input name="txtFatherEducation" id="txtFatherEducation" type="text" value="" class="text-box" ></td>



		<td class="auto-style25" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">







		<font face="Cambria">Father Occupation</font></td>



		<td class="auto-style19" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-bottom-style: none; border-bottom-width: medium">







		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" value="" class="text-box" ></td>



	</tr>



	



	<tr>



		<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style17" colspan="6" height="44">



		<font face="Cambria">&nbsp;</font></td>



	</tr><tr>



	



	



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style17">

		<font face="Cambria">Mother Name</font></td>



		<td style="border-style:none; border-width:medium; width: 314px">



		<input name="txtMotherName" id="txtMotherName" type="text" value="" class="text-box" required></td>



		<td style="border-style:none; border-width:medium; width: 414px" class="auto-style25">



		<font face="Cambria">Mother Education</font></td>



		<td style="border-style:none; border-width:medium; width: 394px">



		<input name="txtMotherEducation" id="txtMotherEducation" type="text" value="" class="text-box" ></td>



		<td style="border-style:none; border-width:medium; width: 524px" class="auto-style2">



		&nbsp;</td>



		<td style="width: 524px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style20">



		<font face="Cambria">&nbsp;</font></td>



	</tr>



	



	<tr>



	



	



		<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style17" colspan="6">

		<font face="Cambria">&nbsp;</font></td>



	</tr>



	



	<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style17">



		<font face="Cambria">Student Address</font></td>



		<td class="auto-style2" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px">



		<font face="Cambria">



		<textarea name="txtAddress" id="txtAddress" rows="4"  class="text-box-address" style="width: 384px" cols="20"></textarea></font></td>



	</tr>



	



<tr>




		<td class="auto-style35" style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium" colspan="6">



		&nbsp;</td>



	</tr>



<tr>



		<td class="auto-style22" colspan="6" style="border-style:solid; border-width:1px; background-color: #A4C400">



		<p align="center">



		<font face="Cambria">



		<strong>Portal and Mobile Application Login Details</strong></font></td>



	</tr>



<tr>



		<td class="auto-style2" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">



		Mobile</td>



		<td class="auto-style1" colspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtMobile" id="txtMobile" type="text" value="" class="text-box" required size=30 ><span class="auto-style2"><br></span></td>



		<td class="auto-style25" style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" colspan="3">



		&nbsp;</td>



	</tr>



<tr>



		<td class="auto-style28" style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" colspan="6">



		&nbsp;</td>



	</tr>



<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		Alternate Mobile</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtAlternateMobile" id="txtAlternateMobile" type="text" value=" " class="text-box" size=30 ></td>



	</tr>



<tr>



		<td class="auto-style28" style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" colspan="6">



		&nbsp;</td>



	</tr>
<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		User Name</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtUserId" id="txtUserId" type="text" value=" " class="text-box" required ></td>



	</tr>



<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		&nbsp;</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		&nbsp;</td>



	</tr>
<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		Password</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtPassword" id="txtPassword" type="text" value=" " class="text-box" required ></td>



	</tr>



<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		&nbsp;</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		&nbsp;</td>



	</tr>



	<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">



		Email Id</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px">



		<input name="txtEmail" id="txtEmail" type="text" value="" class="text-box" size=50></td>



	</tr>



	<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		&nbsp;</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		&nbsp;</td>



	</tr>
<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		Status</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtstatus" id="txtstatus" type="text" value=" " class="text-box" required ></td>



	</tr>
<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		&nbsp;</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		&nbsp;</td>



	</tr>
<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">



		<span style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13.12px; font-style: normal; font-variant: normal; font-weight: bold; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
		Financial Year</span></td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px">



		<input name="txtFY" id="txtFY" type="text" value="" class="text-box" required></td>



	</tr>



	<tr>



		<td class="auto-style32" style="border-style:none; border-width:medium; " colspan="6">



		&nbsp;<p>&nbsp;</td>



	</tr>



	<tr>



		<td colspan="6" class="style2" style="border-left:medium none #808080; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		<input name="submit" type="submit" value="Submit" class="theButton" ></td>



	</tr>



	



</table>

</form>






		</td>

<!--####################################Content TD close ################################################### -->
    
</tr>

</table>

<div class="wrapper col5">
  <div id="copyright" style="width: 100%; height: 58px">
    
    <p align="center">Powered By Online School Planet | </p>
    <br class="clear" />
  </div>
</div>
</body>
</html>