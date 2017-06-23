<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
session_start();
$sadmission= $_SESSION['userid'];

$class=$_SESSION['StudentClass'];
$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
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
	
	/*
	$ssqlRegi="SELECT max(CAST(`RegistrationNo` AS SIGNED INTEGER)) FROM `NewStudentRegistration`";	
	$rsRegiNo= mysql_query($ssqlRegi);

	if (mysql_num_rows($rsRegiNo) > 0)
	{
		while($row2 = mysql_fetch_row($rsRegiNo))
		{

					$NewRistrationNo=$row2[0]+1;

		}
	}
	else
	{
		$ssqlRegi="SELECT max(CAST(`sadmission` AS SIGNED INTEGER))+1 FROM `student_master`";	
		$rsRegiNo= mysql_query($ssqlRegi);
		if (mysql_num_rows($rsRegiNo) > 0)
		{
			while($row2 = mysql_fetch_row($rsRegiNo))
			{	
						$NewRistrationNo=$row2[0];	
			}
		}
	}
	*/

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
	//if(document.frmNewStudent.F1.value !="")
	//{
		//getSize();
	//}
	
	
	if (document.getElementById("txtName").value.trim()=="")
	{
		alert("Name is mandatory");
		return;
	}
	
	

	//if(document.getElementById("txtLastName").value.trim() =="")
	//{
	////	alert("Last name is mandatory");
	//	return;
	//}
	
	if(document.getElementById("txtDOB").value.trim()=="")
	{
		alert ("Date of birth is mandatory!");
		return;
	}
	
	
	
	
	
	document.getElementById("frmNewStudent").submit();
}



</script>
<script language="javascript">
	String.prototype.trim=function()
	{
		return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
	};
</script>

<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>



<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Hostel Form</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../Admin/tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../Admin/css/style.css" />

	<script type="text/javascript" src="../Admin/tcal.js"></script>



<style type="text/css">







.style7 {







	border-left-style: none;







	border-left-width: medium;







	text-align: center;







}







.style12 {



	border-left-width: 0px;



}







.auto-style1 {

	border-collapse: collapse;

	border: 0px solid #000000;

}

.auto-style6 {

	font-size: small;

}







.auto-style7 {

	border-collapse: collapse;

	border-width: 0px;

}

.auto-style11 {

	border-style: none;

	border-width: medium;

}

.auto-style16 {

	font-size: 12pt;

	color: #000000;

	margin-left: 13px;

	font-family: Calibri;

}

.auto-style18 {

	font-weight: bold;

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style19 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style20 {

	font-weight: normal;

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style21 {

	font-family: Calibri;

	font-weight: normal;

	font-size: 12pt;

	color: #000000;

}

.auto-style23 {

	font-size: 12pt;

}

.auto-style25 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style26 {

	border-style: none;

	border-width: medium;

	font-size: 12pt;

	font-family: Calibri;

}







.auto-style30 {

	border: medium solid #FFFFFF;

	color: #000000;

}

.auto-style5 {

	text-align: left;

	font-family: Calibri;

	color: #000000;

	text-decoration: underline;

	font-size: medium;

}

.auto-style3 {

	color: #000000;

}

.auto-style31 {

	font-family: Calibri;

}

.auto-style32 {

	font-size: small;

	font-family: Calibri;

	color: #000000;

}

.auto-style33 {

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style34 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

}

.auto-style35 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Calibri;

	font-weight: bold;

	font-size: 18px;

	color: #000000;

}







.auto-style36 {

	border-style: none;

	border-width: medium;

	text-align: right;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style38 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Calibri;

	font-size: medium;

	color: #000000;

}

.auto-style17 {

	font-family: Calibri;

	font-size: 11pt;

	color: #000000;

}

.auto-style39 {

	border-style: none;

	border-width: medium;

	text-align: left;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style40 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 11pt;

	color: #000000;

}

.auto-style41 {

	border-style: none;

	border-width: medium;

	text-align: left;

}







.auto-style47 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #99CCFF;

}

.auto-style48 {

	border-style: none;

	border-width: medium;

	color: #000000;

	background-color: #99CCFF;

}

.auto-style49 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #99CCFF;

}







.style14 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;

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
        font-family: Calibri;
        font-weight:bold;

}



.style15 {
	border-collapse: collapse;
}



.style16 {
	border: 0 solid #FFFFFF;
	color: #000000;
}



.style21 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	text-align: center;
}



.style22 {
	text-align: center;
	background-color: #E4E4E4;
}
.style23 {
	text-align: center;
}



.style24 {
	text-align: center;
	background-color: #E4E4E4;
	font-family: Cambria;
}
.style25 {
	font-family: Cambria;
}



.style26 {
	font-family: Calibri;
	font-size: 12pt;
	color: #CC3300;
}



.style27 {
	color: #CC3300;
}



.style28 {
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	background-color: #99CCFF;
}



.style29 {
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}



.style30 {
	font-family: Cambria;
	font-size: 12pt;
}



.style31 {
	border-style: none;
	border-width: medium;
	text-align: right;
}



.style32 {
	border-style: none;
	border-width: medium;
	text-align: left;
}
.style33 {
	text-decoration: underline;
	font-family: Cambria;
	color: #FF0000;
}



.style34 {
	text-decoration: underline;
}



.style35 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
}



</style>
</head>
<body>
<div align="center">
<table width="100%">
<tr>
<td>
<h1 align="center"><b><font face="cambria"><img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b><?php echo $SchoolAddress; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
&nbsp;</td>
</tr>
</table>
</div>
<table id="table_10" style="width: 100%" cellspacing="0" cellpadding="0" class="style15">
	<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<strong><font face="Cambria" style="font-size: 14pt">HOSTEL</font></strong><font face="Cambria" style="font-size: 14pt"><strong> 
FORM </strong></font></p>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
		</table>
	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">
	<form name="frmNewStudent" id="frmNewStudent" method="post" action="SubmitStudentHostelForm.php" enctype="multipart/form-data">
		<input type="hidden" name="hSibling" id="hSibling" value="No">
		<input type="hidden" name="hFatherAlumni" id="hFatherAlumni" value="No">
		<input type="hidden" name="hMotherAlumni" id="hMotherAlumni" value="No">
		<input type="hidden" name="hSingleParent" id="hSingleParent" value="No">
		<input type="hidden" name="hSpecialNeed" id="hSpecialNeed" value="No">
		<input type="hidden" name="hDPSStaff" id="hDPSStaff" value="No">
		<input type="hidden" name="hEWSCategory" id="hEWSCategory" value="No">
		<input type="hidden" name="hOtherCategory" id="hOtherCategory" value="No">
		<input type="hidden" name="hEWSCategory" id="hEWSCategory" value="No">
		<input type="hidden" name="hOtherCategory" id="hOtherCategory" value="No">
		<input type="hidden" name="hTwin" id="hTwin" value="No">
		<input type="hidden" name="hTripplet" id="hTripplet" value="No">
		<input type="hidden" name="hadmission" id="hadmission" value="<?php echo $sadmission; ?>">


		<input type="hidden" name="txtOptionalSubject" id="txtOptionalSubject" value="">
		<tr>
		<td style="height: 10; border-top-style:solid; border-top-width:1px" class="style28">
		<font face="Cambria">
		<strong>Student Details:</strong></font></td>

		<font face="Cambria">
		<br class="auto-style31">

		<br class="auto-style31">
		</font>

		</tr>


		<tr>



		<td style="height: 29px;" class="auto-style23">
		<table style="width: 100%" class="style14">
			<tr>

				<td class="auto-style11" colspan="2">

				&nbsp;</td>

				<td style="width: 2%" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 12%" class="auto-style26">&nbsp;</td>
				<td style="width: 263px" class="auto-style26">&nbsp;</td>
				<td style="width: 4%" class="auto-style26">&nbsp;</td>
				<td style="width: 19%" class="auto-style26">&nbsp;</td>

			</tr>



			<tr>

				<td class="auto-style11" colspan="2">

				<b>

				<font face="Cambria">Admission No</font></b></td>

				<td style="width: 2%" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26" colspan="2">
				<font face="Cambria"><b><?php echo $sadmission; ?></b></font></td>
				<td style="width: 12%" class="auto-style26">&nbsp;</td>
				<td style="width: 263px" class="auto-style26">&nbsp;</td>
				<td style="width: 4%" class="auto-style26">&nbsp;</td>
				<td style="width: 19%" class="auto-style26">&nbsp;</td>

			</tr>



			<tr>

				<td class="auto-style11" colspan="2">

				&nbsp;</td>

				<td style="width: 2%" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 12%" class="auto-style26">&nbsp;</td>
				<td style="width: 263px" class="auto-style26">&nbsp;</td>
				<td style="width: 4%" class="auto-style26">&nbsp;</td>
				<td style="width: 19%" class="auto-style26">&nbsp;</td>

			</tr>



			<tr>



				<td style="width: 15%" class="auto-style11">

		<span class="auto-style21"><font face="Cambria">1. First Name of Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="width: 15%" class="auto-style11">

		<font face="Cambria">

		<input name="txtName" id="txtName" type="text" class="text-box"></font></td>
				<td style="width: 2%" class="auto-style11">

				<span class="auto-style31"><font size="3" face="Cambria">

				&nbsp;</font></span></td>



				<td style="width: 159px" class="auto-style11" colspan="2">

		<span class="auto-style21">

		<span class="auto-style25"><font face="Cambria">2. Date of Birth*</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:<br>(mm/dd/yyyy)</font></span></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="width: 12%" class="auto-style11">







		<font face="Cambria">







		<input name="txtDOB" id="txtDOB" type="text" class="tcal" readonly="readonly"></font></td>



				<td style="width: 263px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 4%" class="auto-style19">







				<font face="Cambria">3. Place of Birth</font><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 19%" class="auto-style41">







				<font face="Cambria">







				<input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 15%" class="auto-style11">







				<span class="auto-style21"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp; 
				Last Name of Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>



				<td style="width: 15%" class="auto-style11">







				<font face="Cambria">

		<input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20"></font></td>



				<td style="width: 2%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 16%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 11%" class="auto-style11">







				Residential Address</td>



				<td style="width: 12%" class="auto-style11">







				<font face="Cambria">







				<textarea name="txtAddress" id="txtAddress"class="text-box-address" rows="3" cols="45"></textarea></font></td>



				<td style="width: 263px" class="auto-style11">







				&nbsp;</td>



				<td class="auto-style19">







				Class</td>



				<td class="auto-style19">







				<font face="Cambria">







				<input name="txtPlaceOfBirth0" id="txtPlaceOfBirth0" class="text-box" type="text"></font></td>



			</tr>



			</table>







		</td>







			</tr>



		



		<tr>



		







		<td class="auto-style33" style="border-bottom-style: solid; border-bottom-width: 1px">







		&nbsp;</td>











			</tr>



		



		<tr>



		







		<td style="height: 10; border-top-width:1px" class="style28">







		<strong><font face="Cambria">12</font></strong><font face="Cambria"><strong> 
		. Family Details (Father / Mother / Guardian):</strong></font></td>







			</tr>



			



			



		



			<tr>



			



			



		







		<td style="height: 46px;" class="auto-style23">







		<table style="width: 100%" class="style14">



			<tr>



				<td class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6">







		<font face="Cambria"><b>(A) Father Details:</b></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Father's Name*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherName" id="txtFatherName" type="text" class="text-box"></font></td>



				<td style="width: 157px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Age:</font></span></td>



				<td style="width: 158px" class="auto-style11">
		<font face="Cambria">
		<input name="txtFatherAge" id="txtFatherAge" class="text-box" type="text"></font></td>
			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Designation:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Occupation*:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" class="text-box"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Organization&nbsp; Name :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Annual Income*:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">
		<select name="txtFatherAnnualIncome" id="txtFatherAnnualIncome" class="text-box">
		<option selected value="">Select One</option>
		<option value="Less than 1 Lakh">Less than 1 Lakh</option>
		<option value="1 Lakh to 2 Lakhs">1 Lakh to 2 Lakhs</option>
		<option value="2 Lakhs to 3 Lakhs">2 Lakhs to 3 Lakhs</option>
		<option value="3 Lakhs to 5 Lakhs">3 Lakhs to 5 Lakhs</option>
		<option value="5 Lakhs to 7 Lakhs">5 Lakhs to 7 Lakhs</option>
		<option value="7 Lakhs to 10 Lakhs">7 Lakhs to 10 Lakhs</option>
		<option value="More then 10 Lakhs">More then 10 Lakhs</option>
		</select>
		</font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Residence </font></span>
		<span class="auto-style25"><font face="Cambria">Landline no :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherOfficialPhNo" id="txtFatherOfficialPhNo" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="style30">Office</span><span class="auto-style25"><font face="Cambria"> Address :</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<textarea name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box-address" cols="16" rows="2"></textarea></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<font face="Cambria">Email Id *:</font></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<font face="Cambria">Mobile No *:</font></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" size="20"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6" style="border-top-style: solid; border-top-width: 1px">







		<b><font face="Cambria">(B)</font></b><font face="Cambria"><b> Mother's 
		Details:</b></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherName" id="txtMotherName" type="text" class="text-box"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Age:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherAge" id="txtMotherAge" class="text-box" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Designation <br>(If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		
		
		<font face="Cambria">















		<input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Occupation*:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherOccupation" id="txtMotherOccupation" class="text-box" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<font face="Cambria">Email id*:</font></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<font face="Cambria">Mobile No</font></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherMobileNo" id="txtFatherOfficialPhNo1" class="text-box" type="text" size="20"></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6" style="border-top-style: solid; border-top-width: 1px">







		<b><font face="Cambria">13. Guardian's</font></b><font face="Cambria"><b> 
		Details-1 :</b></font></td>



				</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianName" id="txtGuradianName" type="text" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Age:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Education:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Occupation:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianOccupation" id="txtGuradianOccupation" class="text-box" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Designation (If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianDesignation" id="txtMotherDesignation0" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Annual Income 
		(If employed):</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianAnnualIncome" id="txtGuradianAnnualIncome" class="text-box" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Organization Name(If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianCompanyName" id="txtMotherCompanyName0" type="text" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="style30">Residence</span><span class="auto-style21"><font face="Cambria"> Address 
		(If employed):</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<textarea name="txtGuradianOfficialAddress" id="txtMotherOfficialAddress0" class="text-box-address" class="text-box-address" cols="20" rows="2"></textarea></font></td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11" colspan="2">















		&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="style30">Residence</span><span class="auto-style21"><font face="Cambria"> Landline. no :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianOfficialPhNo" id="txtMotherOfficialPhNo0" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<font face="Cambria">Mobile No</font></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianMobileNo" id="txtFatherOfficialPhNo4" class="text-box" type="text" size="20"></font></td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6">







		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="6" style="border-top-style: solid; border-top-width: 1px">







		<b><font face="Cambria">13. Guardian's</font></b><font face="Cambria"><b> 
		Details -2:</b></font></td>



				</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianName0" id="txtGuradianName0" type="text" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Age:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianAge0" id="txtGuradianAge0" class="text-box" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Education:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradinaEducation0" id="txtGuradinaEducation0" type="text" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Occupation:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianOccupation0" id="txtGuradianOccupation0" class="text-box" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Designation (If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianDesignation0" id="txtMotherDesignation1" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Annual Income 
		(If employed):</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianAnnualIncome0" id="txtGuradianAnnualIncome0" class="text-box" type="text" size="20"></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Organization Name(If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianCompanyName0" id="txtMotherCompanyName1" type="text" class="text-box" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="style30">Residence</span><span class="auto-style21"><font face="Cambria"> Address 
		(If employed):</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<textarea name="txtGuradianOfficialAddress0" id="txtMotherOfficialAddress1" class="text-box-address" class="text-box-address" cols="20" rows="2"></textarea></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11" colspan="2">















		&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11">















		&nbsp;</td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="style30">Residence</span><span class="auto-style21"><font face="Cambria"> Landline. no :</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianOfficialPhNo0" id="txtMotherOfficialPhNo1" class="text-box" type="text" size="20"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<font face="Cambria">Mobile No</font></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtGuradianMobileNo0" id="txtFatherOfficialPhNo5" class="text-box" type="text" size="20"></font></td>



			</tr>



			<tr>



				<td style="width: 212px; " class="style29">







		&nbsp;</td>



				<td class="style29" colspan="2">















		&nbsp;</td>



				<td style="width: 28px; " class="style29">
				&nbsp;</td>
				<td style="width: 217px; " class="style29" id="tdTransport1">
				&nbsp;</td>
				<td style="width: 158px; " class="style29">
		&nbsp;</td>
			</tr>



			</table>



		</td>



</tr>	







			



		



			<tr>



			



			



		







		<td style="border-top-width: 1px">
		<b><font face="Cambria">19. Documents to be Uploaded: </font></b><p>
		<font face="Cambria">1. Student Photo : <input type="file" name="F1" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font><p>
		<font face="Cambria">2. Father Photo* :<input type="file" name="F2" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font>
		<p>
		<font face="Cambria">3. Mother Photo:<input type="file" name="F3" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font>
		
		<p>
		<font face="Cambria">5. Guardian Photo:<input type="file" name="F4" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font>
		<p>
		<font face="Cambria">5. Guardian&nbsp; 2 Photo :<input type="file" name="F5" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font>

		
</td>


</tr>	







		<tr>



		<td>
		<p align="center">


		<font face="Cambria">
		<input name="BtnSubmit" type="button" value="I Agree" onclick="Validate();" style="font-weight: 700" class="text-box">
		</font>
		</td>


</tr>



<tr>



		<td style="height: 29px" class="style7">

		&nbsp;</td>


	</tr>

<tr>
		<td style="height: 29px" class="style7">


		&nbsp;</td>

	</tr>


	</form>


</table>


<!--
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>

-->


</body>
</html>