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
	
	

$ssql="SELECT `srno`, `RegistrationNo`, `RegistrationDate`, CONCAT(`sname`,' ',`slastname`) as `ApplicantName`, `DOB`, `PlaceOfBirth`, `Age`, `AgeYear`, `AgeMonth`, `AgeDays`, `Sex`, `Sibling`, 
	`Father_DPS_Alumni`, `Mother_DPS_Alumni`, `Single_Parent`, `Special_Needs`, `Staff`, `OtherCategory`, `MotherTongue`, `Nationality`, `ResidentialAddress`, `Location`,
	 `Distance`, `PhoneNo`, `smobile`, `sclass`, `MasterClass`, `LastSchool`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherQualificationDuration`, `FatherOccupation`, 
	 `FatherDesignation`, `FatherAnnualIncome`, `FatherCompanyName`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `FatherMobileNo`, `FatherEmailId`, `MotherName`, `MotherAge`, 
	 `MotherEducation`, `MotherQualificationDuration`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`, `MotherCompanyName`, `MotherOfficeAddress`, `MotherOfficePhone`,
	  `MotherMobile`, `MotherEmail`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation`, `GuradianAnnualIncome`, `GuradianCompanyName`,
	   `GuradianOfficialAddress`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `TransportAvail`, `SafeTransport`, '' as `SpecialAttentionDetail`, `RealBroSisName`, `RealBroSisAdmissionNo`, 
	   `RealBroSisClass`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `EmergencyContactNo`,
	    `RegistrationFormNo`, `email`, '' as `routeno`, `ProfilePhoto`, `status`, `Remarks`, `quarter`, `FinancialYear`, `SchoolId`, `TxnAmount`, `TxnId`, `TxnStatus`, `BirthCertificate`, 
	    `ScoreCard`,`InterviewScore`,`SystemDateTime` FROM `NewStudentRegistration`   WHERE `InterviewScore`> '0'";
 
	//echo $ssql;
	//exit();
	

	if($Selectedclass!="Select One")

	{

		$ssql=$ssql." and `sclass`='".$Selectedclass."'";

	}
	

//echo $ssql;
//exit();
$ssql=$ssql." order by `SystemDateTime`";
$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Student Interview Report</title>
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



.style2 {
	text-align: left;
}



</style>
<script language="javascript">
	function printDiv() 
	{
	        //Get the HTML of div
	        var divElements = document.getElementById("MasterDiv").innerHTML;
	        //Get the HTML of whole page
	        var oldPage = document.body.innerHTML;
	        //Reset the page's HTML with div's HTML only
	        document.body.innerHTML = "<html><head><title></title></head><body>" + 
	          divElements + "</body>";
	        //Print Page
	        window.print();
	        //Restore orignal HTML
	        document.body.innerHTML = oldPage;
	 }
</script>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">New Student Interview Report</font></b></p>

<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<table width="1327" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="NewStudentRegistrationInterviewReport.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
<td style="width: 126px">&nbsp;</td>
<td style="width: 83px" align="left"><p align="center">&nbsp;</td>
<td style="width: 787px">&nbsp;</td>
</tr>
<tr>
<td style="width: 331px" align="left"><p>
<span style="font-family: Cambria; font-weight: 700; font-size: 11pt; letter-spacing: normal; background-color: #FFFFFF">
Class</span></td>
<td style="width: 126px">	<font face="Cambria">

				<strong><em style="font-style: normal">


		<select name="cboClass" id="cboClass" class="text-box" onchange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>

		
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
        <option value="11th">11th</option>

		
		
		

		</select></em></strong></font></td>
		<td style="width: 83px" align="left"><p align="center"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700" class="theButton"></font></td>

</tr>
<tr>
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
<td style="width: 126px">&nbsp;</td>
<td style="width: 83px" align="left"><p align="center">&nbsp;</td>
<td style="width: 787px">&nbsp;</td>
</tr>


<tr>
<td colspan=4 align=center class="style1">&nbsp;</td>
</tr>
</form>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
<div id="MasterDiv">
<table width="100%" class="CSSTableGenerator" border="1">
<tr>
		   <td class="style3" color="#FFFFFF" colspan="8" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #A0A0A0; border-right-width: 1px">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>
         	<span class="style4"><span style="font-size: 12pt">Interview Score Report<br> 	</strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>

<tr>
        <td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		RegistrationNo</font></b></td>
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Father Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Father Mobile No</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Interview Score</font></b></td>
		
	
		
		
</tr>
<?php
	$RecCount=1;
	while($row = mysql_fetch_row($rs))
	{
	$ProfilePhoto=$row[78];
	
?>
<tr>
<td style="width: 45px" font="Cambria"><?php echo $RecCount;?></td>
<td style="width: 115px" font="Cambria"><a href="FilledRegistrationForm.php?RegNo=<?php echo $row[1];?>" target="_blank"><?php echo $row[1];?></a></td>
<td style="width: 173px" font="Cambria"><?php echo $row[3];?></td>
<td style="width: 182px" font="Cambria"><?php echo $row[25];?></td>
<td style="width: 252px" font="Cambria"><?php echo $row[28];?></td>
<td style="width: 243px" font="Cambria"><?php echo $row[24];?></td>
<td style="width: 75px" font="Cambria"><?php echo $row[89];?></td>
</tr>
<?php
$RecCount=$RecCount+1;
	}
?>
</table>

<?php
}
?>
</div>
<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a>

	</font>

	</div>

<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>