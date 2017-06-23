<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>

<?php

		      /*
		      $extension = end(explode(".", $_FILES["file"]["name"]));
		      move_uploaded_file($_FILES["file"]["tmp_name"],"StudentPhotos/" . $_FILES["file"]["name"]);
			  */

if ($_REQUEST["txtAdmission"] != "")
{
$Admission=$_REQUEST["txtAdmission"];
$FinancialYear=$_REQUEST["cboFinancialYear"];
$Quarter=$_REQUEST["cboQuarter"];
$RegistrationFeeDate=$_REQUEST["txtDate"];
$Name=$_REQUEST["txtName"];
$DOB=$_REQUEST["txtDOB"];
$PlaceOfBirth=$_REQUEST["txtPlaceOfBirth"];
$Age=$_REQUEST["txtAge"];
$Gender=$_REQUEST["txtSex"];
$MotherTounge=$_REQUEST["txtMotherTounge"];
$Nationality=$_REQUEST["txtNationality"];
$Address=$_REQUEST["txtAddress"];
$PermanentAddress=$_REQUEST["txtPermanentAddress"];
$Class=$_REQUEST["cboClass"];
$LastSchool=$_REQUEST["txtLastSchool"];
$Category=$_REQUEST["cboCategory"];

$FatherName=$_REQUEST["txtFatherName"];
$FatherAge=$_REQUEST["txtFatherAge"];
$FatherEducation=$_REQUEST["txtFatherEducation"];
$FatherOccupation=$_REQUEST["txtFatherOccupation"];
$FatherDesignation=$_REQUEST["txtFatherDesignation"];
$FatherAnnualIncome=$_REQUEST["txtFatherAnnualIncome"];
$FatherCompanyName=$_REQUEST["txtFatherCompanyName"];
$FatherOfficialAddress=$_REQUEST["txtFatherOfficialAddress"];
$FatherOfficialPhNo=$_REQUEST["txtFatherOfficialPhNo"];

$MotherName=$_REQUEST["txtMotherName"];
$MotherAge=$$_REQUEST["txtMotherAge"];
$MotherEducation=$_REQUEST["txtMotherEducation"];
$MotherOccupation=$_REQUEST["txtMotherOccupation"];
$MotherDesignation=$_REQUEST["txtMotherDesignation"];
$MotherAnnualIncome=$_REQUEST["txtMotherAnnualIncome"];
$MotherCompanyName=$_REQUEST["txtMotherCompanyName"];
$MotherOfficialAddress=$_REQUEST["txtMotherOfficialAddress"];
$MotherOfficialPhNo=$_REQUEST["txtMotherOfficialPhNo"];

$GeneralInfo=$_REQUEST["txtGeneralInformation"];
$ContributionArea=$_REQUEST["txtContributionArea"];
$StudentWeaknessStrength=$_REQUEST["txtStudentWeaknessStrength"];
$StudentSpecialAttentionDetail=$_REQUEST["txtStudentSpecialAttentionDetail"];
$StudentPreviousDetail=$_REQUEST["txtStudentPreviousDetail"];
$RealBroSisName=$_REQUEST["txtRealBroSisName"];
$RealBroSisSchoolName=$_REQUEST["txtRealBroSisSchoolName"];
$RealBroSisClass=$_REQUEST["txtRealBroSisClass"];
$RegistrationFormNo=$_REQUEST["txtRegistrationFormNo"];

$PhoneNo=$_REQUEST["txtPhoneNo"];
$MobileNo=$_REQUEST["txtMobile"];
$email=$_REQUEST["txtemail"];


$currentdate=date("Y-m-d");

		$sqlRcpt = "SELECT MAX(`srno`) +1 FROM  `NewStudentRegistration`";

		$rsRcpt = mysql_query($sqlRcpt);

		while($row = mysql_fetch_row($rsRcpt))
				{
					$newsrno=$row[0];
					$NewReciptNo="AF" . $newsrno;
				}

		$PDFFileName=$NewReciptNo . ".pdf";
		

			$RollNo="To be alloted";
			
			$ssql="INSERT INTO `NewStudentRegistration` (`RegistrationNo` ,`sname`, `DOB`,`PlaceOfBirth`,`Age`,`Sex`,`Category`,`MotherTongue`,`Nationality`,`ResidentialAddress`,`PermanentAddress`,`PhoneNo`,`smobile`,`sclass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`MotherName`,`MotherAge`,`MotherEducation`, `MotherOccupatoin`, `MotherDesignation`, `MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`GeneralInformation`,`ContributionArea`,`StudentWeeknessStrength`,`SpecialAttentionDetail`,`StudetnPreviousHistory`,`RealBroSisName`,`RealBroSisSchool`,`RealBroSisClass`,`RegistrationFormNo`,`email`,`status`,`quarter`,`FinancialYear`) VALUES('$Admission','$Name','$DOB','$PlaceOfBirth','$Age','$Gender','$Category','$MotherTounge','$Nationality','$Address','$PermanentAddress','$PhoneNo','$MobileNo','$Class','$LastSchool','$FatherName','$FatherAge','$FatherEducation','$FatherOccupation','$FatherDesignation','$FatherAnnualIncome','$FatherCompanyName','$FatherOfficialAddress','$FatherOfficialPhNo','$MotherName','$MotherAge','$MotherEducation','$MotherOccupation','$MotherDesignation','$MotherAnnualIncome','$MotherCompanyName','$MotherOfficialAddress','$MotherOfficialPhNo','$GeneralInfo','$ContributionArea','$StudentWeaknessStrength','$StudentSpecialAttentionDetail','$StudentPreviousDetail','$RealBroSisName','$RealBroSisSchoolName','$RealBroSisClass','$RegistrationFormNo','$email','Pending','$Quarter','$FinancialYear')";

			mysql_query($ssql) or die(mysql_error());

			

		    $ssql1="INSERT INTO `RegistrationFees` (`RegistrationNo`,`sname`,`sclass`,`RegistrationFeePayable`,`RegistrationFeePaid`,`RegistrationFeeBalance`,`receipt`,`date`) values ('$Admission','$Name','$Class','Total','$TotalAmountPaying','$Balance','$NewReciptNo','$currentdate')";
			//mysql_query($ssql1) or die(mysql_error());

						

			$Message1="<br><br><center><b>Student Registration: ".$Admission." successfully completed!<br><a href='StudentManagementLandingPage.php'>Home </a>";

			echo $Message1;
			exit();

}
else
{
	exit();
}

?>

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

function CreatePDF() 
{
		
        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

		document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.txtprintdiv.value =document.getElementById("divPrint").innerHTML;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
 
        //Print Page
		
        //window.print();
        var FileLocation="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		window.location.assign(FileLocation);
		return;


        //Restore orignal HTML

        //document.body.innerHTML = oldPage;

 }

function CreatePDF1() 
{
		var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body></html>";

		
	try
		 {    
				// Firefox, Opera 8.0+, Safari    
				xmlHttp=new XMLHttpRequest();
		 }
		  catch (e)
		    {    // Internet Explorer    
				try
			      {      
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
			    catch (e)
			      {      
					  try
				        { 
							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				      catch (e)
				        {        
							alert("Your browser does not support AJAX!");        
							return false;        
						}      
				  }    
			 } 
			 xmlHttp.onreadystatechange=function()
		      {
			      if(xmlHttp.readyState==4)
			        {
						var rows="";
			        	rows=new String(xmlHttp.responseText);
						alert(rows);
			        	//document.getElementById("txtAnnualFeeDiscount").value=rows;
						//alert(rows);														
			        }

		      }

			var submiturl="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML) + "&receiptno=" + document.getElementById("receiptno").value;
			xmlHttp.open("POST", submiturl,true);
			xmlHttp.send(null);
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo $SchoolName ?> </title>



	



<style type="text/css">
.style1 {
	border-collapse: collapse;
}
.style2 {
	font-family: Cambria;
}
</style>



	



</head>

<!--<body onload="Javascript:CreatePDF();">-->
<body>

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >

	<p align="center">

	<font face="Cambria">

	<img border="0" src="../images/logo.png"  height="68" width="213"></font></p>
	<p align="center" ><b><font face="Cambria">Registration Fees 

	Receipt</font></b></p>
	
	<p align="center"><b>Receipt No.<?php echo $NewReciptNo; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Date:<?php echo date("d-m-Y"); ?></b></p>
	
										

	<div align="center">

		<table cellpadding="0" style="border-style:dotted; border-width:1px; width: 61%; border-collapse:collapse; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 175px">

				<font face="Cambria">Student Name</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px; width: 152px">

				<font face="Cambria">

				<?php echo $Name; ?>

				</font>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<span class="style2">Registration</span><font face="Cambria"> No</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo $Admission; ?>

				</font>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 175px" >

				<font face="Cambria">Student Class</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px; width: 152px">

				<font face="Cambria">

				<?php echo $Class; ?>

				</font>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<span class="style2">Registration</span><font face="Cambria"> Fees Amount</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo $Total; ?>

				</font>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<font face="Cambria">Total Fees Payable</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo $Total; ?>

				</font>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<b>

				<font face="Cambria">Total Fees Paid</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<b><font face="Cambria">

				<?php echo $TotalAmountPaying; ?></font></b></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<b><font face="Cambria">Balance</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<b><font face="Cambria">

				<?php echo $Balance; ?></font></b></td>

			</tr>

		</table><br>
		<table style="width: 66%" class="style1">
			<tr>
				<td>
				<ul>
					<li><font face="Cambria"><em>Admission Fees &amp; Annual Charges once paid will 
					not be refunded</em></font> </li>
				</ul>
				</td>
			</tr>
		</table>
&nbsp;</div>
	

	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Fees 
	In-charge</strong></font></p>
<form name="frmPDF" id="frmPDF" method="post" action="..Admin/StudentManagement/CreatePDF.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a>&nbsp; |&nbsp;&nbsp; <a href="javascript:history.back(1)">BACK</a> 	
</font> 
	
</div>
</body>

</html>
