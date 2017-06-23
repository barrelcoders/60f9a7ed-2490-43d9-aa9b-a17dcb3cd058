<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedname=$_REQUEST["txtname"];
	$Selectedregno=$_REQUEST["txtregno"];
	$Selectedclass=$_REQUEST["cboClass"];
	$Selectedmotheredu=$_REQUEST["txtMotherEducation"];
	$Selectedfatheredu=$_REQUEST["txtFatherEducation"];
	$Selecteddistance=$_REQUEST["txtdistance"];
	$Selectedfatheralumni=$_REQUEST["cbofatheralumni"];
	$Selectedmotheralumni=$_REQUEST["cbomotheralumni"]; 
	$Selectedage=$_REQUEST["txtage"]; 
	$Selectedsibling=$_REQUEST["txtsibling"]; 
	$Selectedlocation=$_REQUEST["txtlocation"]; 
	$SelectedFatherIncome=$_REQUEST["txtFatherAnnualIncome"]; 
	$SelectedMotherIncome=$_REQUEST["txtMotherAnnualIncome"]; 
	
	

	$ssql="SELECT `srno`, `RegistrationNo`, `sname`, `middlename`, `slastname`, `sclass`, `DOB`, `Age`, `Sex`, `Nationality`, `bloodgroup`, `MotherTongue`, `ResidentialAddress`, `ResidencePhoneNo`, `Location`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherOccupation`, `FatherDesignation`, `FatherCompanyName`, `FatherMobileNo`, `FatherEmailId`, `MotherName`, `MotherAge`, `MotherEducation`, `MotherOccupatoin`, `MotherDesignation`, `MotherCompanyName`, `MotherMobile`, `MotherEmail`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation`, `GuradianCompanyName`, `GuradianMobileNo`, `GuardianEmailId`, `RealBroSisName`, `RealBroSisClass`, `RealBroSisAdmissionNo`, `RealBroSisName2`, `RealBroSisClass2`, `RealBroSisAdmissionNo2`, `Single_Parent_Reason`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `SpecialNeedRequirment`, `Category`, `EmergencyContactPersonName`, `EmergencyContactNo`, `EmergencyEmail`, `BirthCertificate`, `ProfilePhoto`, `FatherPhoto`, `MotherPhoto`, `GuardianPhoto`, `ParentDPSStaff`, `ParentDPSAlumni`, `CatagoryCertificate`, `MedicalCertificate`, `ResidenceProof`, `SibilingProof`, `GirlChild_FirstBorn`, `SingleParent`, `RegistrationDate`, `Distance`, `Sibling`, `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `chkGirlChild_FirstBorn`, `Single_Parent` FROM `NewStudentRegistration_temp` WHERE `TxnStatus`='SUCCESS'";


	
	if($Selectedname!="")
	{
		$ssql=$ssql." and `sname`='$Selectedname'";
	}
	if($Selectedregno!="")
	{
		$ssql=$ssql." and `RegistrationNo`='$Selectedregno'";
	}

	if($Selectedclass!="Select One")

	{

		$ssql=$ssql." and `sclass`='".$Selectedclass."'";

	}
	if($Selectedmotheredu!="Select One")

	{

		$ssql=$ssql." and `MotherEducation`='".$Selectedmotheredu."'";

	}
	if($Selectedfatheredu!="Select One")

	{

		$ssql=$ssql." and `FatherEducation`='".$Selectedfatheredu."'";

	}
	if($Selecteddistance!="Select One")

	{

		$ssql=$ssql." and `Distance`='".$Selecteddistance."'";

	}
		if($Selectedfatheralumni!="Select One")

	{

		$ssql=$ssql." and `AlumniFatherName`='".$Selectedfatheralumni."'";

	}
		if($Selectedmotheralumni!="Select One")

	{

		$ssql=$ssql." and `AlumniMotherName`='".$Selectedmotheralumni."'";

	}
    if($Selectedage!="")
	{
		$ssql=$ssql." and `Age`='$Selectedage'";
	}
	if($Selectedsibling!="")
	{
		$ssql=$ssql." and `Sibling`='$Selectedsibling'";
	}
	if($Selectedlocation!="")
	{
		$ssql=$ssql." and `Location`='$Selectedlocation'";
	}
	if($SelectedFatherIncome!="")
	{
		$ssql=$ssql." and `FatherAnnualIncome`='$SelectedFatherIncome'";
	}
	if($SelectedMotherIncome!="")
	{
		$ssql=$ssql." and `MontherAnnualIncome`='$SelectedMotherIncome'";
	}


$ssql=$ssql." order by `SystemDateTime`";
$rs= mysql_query($ssql);

}

?>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Student Registration Report</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<!----Pagein------->
  <link rel="stylesheet" href="../../css/bootstrap.min.css" />  
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../../js/bootstrap.min.js"></script> 
   <script src="../js/jquery.min.js"></script> 
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
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



.style2 {
	text-align: left;
}

.CSSTableGenerator .col td{background:#0b462d; color:#fff;}
.CSSTableGenerator .col td b font{color:#fff;}

</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Complete Registration Report</font></b></p>

<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<table width="1327" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="NewStudentRegistrationReport1.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 331px" align="left">
<p><font face="Cambria" style="font-size: 11pt">Name of Applicant.</font></td>
<td style="width: 332px"><font face="Cambria">
<input name="txtname" class="text-box" type="text"></font>
</td>
<td style="width: 332px" align="left"><p>
<font face="Cambria" style="font-size: 11pt">Registration No.</font></td>
<td style="width: 332px"><font face="Cambria">
<input name="txtregno" class="text-box" type="text"></font></td>
<tr>
<td style="width: 331px" align="left"><p align="center"></td>
<td style="width: 332px">&nbsp;</td>
<td style="width: 332px" align="left"><p align="center"></td>
<td style="width: 332px">&nbsp;</td>
</tr>
<tr>
<td style="width: 331px" align="left"><p>
<span style="font-family: Cambria; font-weight: 700; font-size: 11pt; letter-spacing: normal; background-color: #FFFFFF">
Class</span></td>
<td style="width: 332px">	<font face="Cambria">

				<strong><em style="font-style: normal">


		<select name="cboClass" id="cboClass" class="text-box" onChange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>

		
		<option value="11th">11</option>

		
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>

		
		<option value="Nursery">Nursery</option>
		<option value="Prep">Prep</option>
		

		</select></em></strong></font></td>
<td style="width: 332px" align="left"><p>
<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 11pt; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none">
Mother Education</span></td>
<td style="width: 332px"><font face="Cambria">

		<select name="txtMotherEducation" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
                         <?php
							$ssqlName="SELECT distinct `Qualification` FROM `NewStudentRegistrationQualificationMaster`";
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
<td style="width: 331px" align="left"><p align="center"></td>
<td style="width: 332px">&nbsp;</td>
<td style="width: 332px" align="left"><p align="center"></td>
<td style="width: 332px">&nbsp;</td>
</tr>
<tr>
<td style="width: 331px" align="left"><p>
<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 11pt; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none">
Father Education</span></td>
<td style="width: 332px"><font face="Cambria"><select name="txtFatherEducation" style="float: left" ; class="text-box" >
						 <option selected="" value="Select One">Select One</option>
                         <?php
							$ssqlName="SELECT distinct `Qualification` FROM `NewStudentRegistrationQualificationMaster`";
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
<td style="width: 332px" align="left"><p>
<span style="font-family: Cambria; font-size: 11pt; letter-spacing: normal; background-color: #FFFFFF">
Distance</span></td>
<td style="width: 332px"><font face="Cambria"><select name="txtdistance" style="float: left" ; class="text-box" >
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Distance` FROM `NewStudentRegistrationDistanceMaster`";
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
<td style="width: 331px" align="left"><p align="center"></td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
<tr>
<td style="width: 331px" align="left"><p>
<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 11pt; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none">
Father DPS Alumni</span></td>
<td style="width: 332px"><font face="Cambria"><select name="cbofatheralumni" id="cboClass" class="text-box" onChange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>	
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		

		</select></font></td>
<td style="width: 332px" align="left"><p>
<span style="font-family: Cambria; font-size: 11pt; letter-spacing: normal; background-color: #FFFFFF">
Mother DPS Alumni</span></td>
<td style="width: 332px"><font face="Cambria"><select name="cbomotheralumni" id="cboClass" class="text-box" onChange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>

		<option value="Yes">Yes</option>
		<option value="No">No</option>
		

		</select></font></td>
</tr>
<tr>
<td style="width: 331px" align="left"><p align="center"></td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>

<tr>
<td style="width: 331px" align="left">
<p><font face="Cambria" style="font-size: 11pt">Age</font></td>
<td style="width: 332px"><font face="Cambria">
<input name="txtage" class="text-box" type="text"></font>
</td>
<td style="width: 332px" align="left"><p>
<font face="Cambria" style="font-size: 11pt">Sibling </font></td>
<td style="width: 332px"><font face="Cambria">
<input name="txtsibling" class="text-box" type="text"></font></td>
</tr>
<tr>
<td style="width: 331px" align="left"><p align="center"></td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
<tr>
<td style="width: 331px" align="left">
<p><font face="Cambria" style="font-size: 11pt">Location</font></td>
<td style="width: 332px"><font face="Cambria">
<input name="txtlocation" class="text-box" type="text"></font>
</td>
<td style="width: 332px"><p class="style2">
<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 11pt; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none">
Father&#39;s Annual Income</span></td>
<td style="width: 332px">















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
		</select></font></td>
</tr>
<tr>
<td style="width: 331px">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>


<tr>
<td style="width: 331px"><p class="style2">Mot<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 11pt; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none">her&#39;s 
Annual Income</span></td>
<td style="width: 278px" colspan=3>
		<font face="Cambria">
		<select name="txtMotherAnnualIncome" id="txtMotherAnnualIncome" class="text-box">
		<option value="">Select One</option>
		<option value="Less than 1 Lakh">Less than 1 Lakh</option>
		<option value="1 Lakh to 2 Lakhs">1 Lakh to 2 Lakhs</option>
		<option value="2 Lakhs to 3 Lakhs">2 Lakhs to 3 Lakhs</option>
		<option value="3 Lakhs to 5 Lakhs">3 Lakhs to 5 Lakhs</option>
		<option value="5 Lakhs to 7 Lakhs">5 Lakhs to 7 Lakhs</option>
		<option value="7 Lakhs to 10 Lakhs">7 Lakhs to 10 Lakhs</option>
		<option value="More then 10 Lakhs">More then 10 Lakhs</option>
		</select></font></td>

</tr>


<tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700" class="theButton"></font></td>
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
										<div id="MasterDiv">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
							<th colspan="2" style="border-style: solid; border-width: 1px"><b>Date of Registration</b></th>
                                                        <th colspan="14" style="border-style: solid; border-width: 1px"><b>Applicant Details</b></th>
                                                        <th colspan="7" style="border-style: solid; border-width: 1px"><b>Father Details</b></th>
                                                        <th colspan="7" style="border-style: solid; border-width: 1px"><b>Mother Details</b></th>
                                                        <th colspan="7" style="border-style: solid; border-width: 1px"><b>Guardian Details</b></th>
                                                        <th colspan="3" style="border-style: solid; border-width: 1px"><b>First Sibiling Details</b></th>
                                                        <th colspan="3" style="border-style: solid; border-width: 1px"><b>Second Sibiling Details</b></th>
                                                    
                                                        <th colspan="3" style="border-style: solid; border-width: 1px"><b>Father DPS Alumni</b></th>
                                                        <th colspan="3" style="border-style: solid; border-width: 1px"><b>Mother DPS Alumni</b></th>
                                                        <th colspan="2" style="border-style: solid; border-width: 1px"><b>&nbsp;</b></th>
                                                        <th colspan="3" style="border-style: solid; border-width: 1px"><b>Contact Person</b></th>
                                                        <th colspan="11" style="border-style: solid; border-width: 1px"><b>Attached Files</b></th>
                                                        <th colspan="3" style="border-style: solid; border-width: 1px"><b>Calculation Points</b></th>
													</tr>
													<tr>
							<th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Serial No.</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Date</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Application No.</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">First Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Middle Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Last Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Class</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">D.O.B</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Age</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Gender</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Nationality</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Blood Group</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Mother Tongue</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Currnet Address</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Landline Number</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Distance From School</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Education</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Occupation</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Designation</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Organization Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Mobile</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Email</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Education</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Occupation</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Designation</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Organization Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Mobile</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Email</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Education</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Occupation</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Designation</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Organization Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Mobile</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Email</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Class</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Admission</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Class</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Admission</th>
                                                                
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">DPS Branch</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Passout Year</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Last Class</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">DPS Branch</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Passout Year</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Last Class</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Special Need</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Catagory</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Name</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Mobile</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Email</th>
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Birth Certificate</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Applicant Photo</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Father Photo</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Mother Photo</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Guardian Photo</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Parent DPS Staff</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Parent DPS Alumni</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Catagory Certificate</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Medical Certificate</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Residence Proof</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Sibiling Proof</th>
                                                        
                                                        
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Neighbourhood</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Sibling</th>
                                                        <th style="border-style: solid; border-width: 1px; color:#fff; background:#0b462d">Total</th>
													</tr>
												</thead>
												<tbody>
													<?php
													  $RecCount=1;
													  while($row = mysql_fetch_row($rs))
													  {
													  //$EmpId=$row[0];
													  
												  ?>
												  <tr>
												  <td style="border-style: solid; border-width: 1px"><?php echo $RecCount;?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[70];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[1];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[2];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[3];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[4];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[5];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[6];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[7];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[8];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[9];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[10];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[11];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[12];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[13];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[14];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[15];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[17];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[18];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[19];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[20];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[21];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[22];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[23];?></td>
												  
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[25];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[26];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[27];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[28];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[29];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[30];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[31];?></td>
												  
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[33];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[34];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[35];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[36];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[37];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[38];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[39];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[40];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[41];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[42];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[43];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[44];?></td>
												  
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[46];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[47];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[48];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[49];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[50];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[51];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[52];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[53];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[54];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[55];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[56];?></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[57];?>" target="blank">
												  		<?php echo $row[57];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[58];?>" target="blank">
												  		<?php echo $row[58];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[59];?>" target="blank">
												  		<?php echo $row[59];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[60];?>" target="blank">
												  		<?php echo $row[60];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[61];?>" target="blank">
												  		<?php echo $row[61];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[62];?>" target="blank">
												  		<?php echo $row[62];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[63];?>" target="blank">
												  		<?php echo $row[63];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[64];?>" target="blank">
												  		<?php echo $row[64];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[65];?>" target="blank">
												  		<?php echo $row[65];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[66];?>" target="blank">
												  		<?php echo $row[66];?></a></td>
												  <td style="border-style: solid; border-width: 1px"><a href="../../Admission/Documents_nursery/<?php echo $row[67];?>" target="blank">
												  		<?php echo $row[67];?></a></td>
												  
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[71];?></td>
												  <td style="border-style: solid; border-width: 1px"><?php echo $row[72];?></td>
												  
												  <td style="border-style: solid; border-width: 1px"><?php echo $total= $row[71]+$row[72]; ?></td>
												  
												  </tr>
												  <?php
												  $RecCount=$RecCount+1;
													  }
												  ?>
												</tbody>
											</table>
											</div>
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

<p align ="center">
	<input type="button" name ="btnExcel" value ="Export To Excel" onclick ="javascript:fnlExcel();">&nbsp; </p>

<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>
<p align ="center">
<form name ="frmExcel" id="frmExcel" method ="post" action ="ExportToExcel.php">
<input type ="hidden" name ="htmlCode" id="htmlCode" value ="">
</form>
</p>
<script language ="javascript">
function fnlExcel()
{
	document.getElementById("htmlCode").value=document.getElementById("MasterDiv").innerHTML;
	document.getElementById("frmExcel").submit();
}
</script>