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
	
	

$ssql="SELECT CONCAT(`sname`,' ',`slastname`) as `ApplicantName`,`sfathername`,`RegistrationNo`,`smobile`,`ProfilePhoto` ,`sclass`  FROM `NewStudentRegistration`  WHERE 1=1 order by `sname`";
	//echo $ssql;
	//exit();
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

//echo $ssql;
//exit();
$ssql=$ssql." order by `SystemDateTime`";
$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Student Draw Of Lots Report</title>
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
<p><b><font face="Cambria">New Student Draw  Report</font></b></p>

<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<table width="1327" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="DrawOfLOtsReport.php">

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
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
<td style="width: 332px">&nbsp;</td>
<td style="width: 332px" align="left"><p align="center">&nbsp;</td>
<td style="width: 332px">&nbsp;</td>
</tr>
<tr>
<td style="width: 331px" align="left"><p>
<span style="font-family: Cambria; font-weight: 700; font-size: 11pt; letter-spacing: normal; background-color: #FFFFFF">
Class</span></td>
<td style="width: 332px">	<font face="Cambria">

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
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
<td style="width: 332px">&nbsp;</td>
<td style="width: 332px" align="left"><p align="center">&nbsp;</td>
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
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
<tr>
<td style="width: 331px" align="left"><p>
<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 11pt; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none">
Father DPS Alumni</span></td>
<td style="width: 332px"><font face="Cambria"><select name="cbofatheralumni" id="cboClass" class="text-box" onchange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>	
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		

		</select></font></td>
<td style="width: 332px" align="left"><p>
<span style="font-family: Cambria; font-size: 11pt; letter-spacing: normal; background-color: #FFFFFF">
Mother DPS Alumni</span></td>
<td style="width: 332px"><font face="Cambria"><select name="cbomotheralumni" id="cboClass" class="text-box" onchange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>

		<option value="Yes">Yes</option>
		<option value="No">No</option>
		

		</select></font></td>
</tr>
<tr>
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
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
<td style="width: 331px" align="left"><p align="center">&nbsp;</td>
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
<div id="MasterDiv">
<table width="100%" class="CSSTableGenerator" border="1">
<tr>
        <td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" >
		<b><font face="Cambria">Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Father Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Registration No</font></b></td>
		
	
		
		
</tr>
<?php
	$RecCount=1;
	while($row = mysql_fetch_row($rs))
	{
	$ProfilePhoto=$row[78];
	
?>
<tr>
<td style="width: 45px" font="Cambria"><?php echo $RecCount;?></td>
<td style="width: 115px" font="Cambria"><?php echo $row[0];?></td>
<td style="width: 182px" font="Cambria"><?php echo $row[5];?></td>
<td style="width: 252px" font="Cambria"><?php echo $row[1];?></td>
<td style="width: 243px" font="Cambria"><a href="FilledRegistrationForm.php?RegNo=<?php echo $row[1];?>" target="_blank"><?php echo $row[1];?></a></td>
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