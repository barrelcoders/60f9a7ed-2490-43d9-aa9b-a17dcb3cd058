<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../Header/AppConf.php';
?>
<?php
		     $extension = end(explode(".", $_FILES["file"]["name"]));

		      move_uploaded_file($_FILES["file"]["tmp_name"],"StudentPhotos/" . $_FILES["file"]["name"]);

//if ($_REQUEST["txtAdmission"] != "")
//{
		$ssqlRegi="SELECT max(CAST(x.`sadmission` AS SIGNED INTEGER))+1 FROM ";
		$ssqlRegi= $ssqlRegi . "(";
		$ssqlRegi= $ssqlRegi . "SELECT distinct `sadmission` FROM `Almuni`";
		$ssqlRegi= $ssqlRegi . " union ";
		$ssqlRegi= $ssqlRegi . "SELECT distinct `sadmission` FROM `NewStudentAdmission`";
		$ssqlRegi= $ssqlRegi . " union ";
		$ssqlRegi= $ssqlRegi . "SELECT distinct `sadmission` FROM `student_master`";
		$ssqlRegi= $ssqlRegi . ") as `x`";
		$rsRegiNo= mysql_query($ssqlRegi);
		while($row2 = mysql_fetch_row($rsRegiNo))
		{
			$NewRistrationNo=$row2[0];
		}
		
		$Admission=$NewRistrationNo;
		//$Admission=$_REQUEST["txtAdmission"];
		
		$RegNo=$_REQUEST["txtRegNo"];	
		$FYear=$_REQUEST["cboFinancialYear"];
		$Quarter=$_REQUEST["cboQuarter"];
		$Name = $_REQUEST["txtName"];
		$DOB=$_REQUEST["txtDOB"];
		$Sex=$_REQUEST["txtSex"];
		$Category=$_REQUEST["cboCategory"];
		$Nationality=$_REQUEST["txtNationality"];
		$Class=$_REQUEST["cboClass"];
		$RollNo=$_REQUEST["txtRollNo"];
		$LastSchool = str_replace("'","",$_REQUEST["txtLastSchool"]);
		$Father=$_REQUEST["txtFatherName"];
		$FatherEducation=$_REQUEST["txtFatherEducation"];
		$FatherOccupation=$_REQUEST["txtFatherOccupation"];
		$MotherName=$_REQUEST["txtMotherName"];
		$MotherEducation=$_REQUEST["txtMotherEducation"];
		$Address=str_replace("'","",$_REQUEST["txtAddress"]);
		$MobileNo=$_REQUEST["txtMobile"];
		$AlternatMobileNo = $_REQUEST["txtAltMobile"];
		$Imei=$_REQUEST["txtImei"];
		$UserId=$Admission;
		//$UserId=$_REQUEST["txtUserId"];
		
		$Password=$Admission;
		//$Password=$_REQUEST["txtPassword"];
		
		$email=$_REQUEST["txtEmail"];
		$Route=$_REQUEST["cboRoute"];
		$ProfilePic = $_FILES["file"]["name"];
		
		$PlaceOfBirth=$_REQUEST["txtPlaceOfBirth"];
		$Age=$_REQUEST["txtAge"];
		$MotherTongue=$_REQUEST["txtMotherTounge"];
		$ResidentialAddress=$_REQUEST["txtCorrespondenceAddress"];
		$PermanentAddress=$_REQUEST["txtPermanentAddress"];
		//$PhoneNo=$_REQUEST["cboRoute"];
		
		$sfatherage=$_REQUEST["txtFatherAge"];
		$FatherDesignation=$_REQUEST["txtFatherDesignation"];
		$FatherAnnualIncome=$_REQUEST["txtFatherAnnualIncome"];
		$FatherCompanyName=$_REQUEST["txtFatherCompanyName"];
		$FatherOfficeAddress=$_REQUEST["txtFatherOfficialAddress"];
		$FatherOfficePhoneNo=$_REQUEST["txtFatherOfficialPhNo"];
		
		$MotherAge=$_REQUEST["txtMotherAge"];
		$MotherOccupatoin=$_REQUEST["txtMotherOccupation"];
		$MotherDesignation=$_REQUEST["txtMotherDesignation"];
		$MontherAnnualIncome=$_REQUEST["txtMotherAnnualIncome"];
		$MotherCompanyName=$_REQUEST["txtMotherCompanyName"];
		$MotherOfficeAddress=$_REQUEST["txtMotherOfficialAddress"];
		$MotherOfficePhone=$_REQUEST["txtMotherOfficialPhNo"];
		$GeneralInformation=$_REQUEST["txtGeneralInformation"];
		$ContributionArea=$_REQUEST["txtContributionArea"];
		$StudentWeeknessStrength=$_REQUEST["txtStudentWeaknessStrength"];
		$SpecialAttentionDetail=$_REQUEST["txtStudentSpecialAttentionDetail"];
		$StudetnPreviousHistory=$_REQUEST["txtStudentPreviousDetail"];
		$RealBroSisName=$_REQUEST["txtRealBroSisName"];
		$RealBroSisSchool=$_REQUEST["txtRealBroSisSchoolName"];
		$RealBroSisClass=$_REQUEST["txtRealBroSisClass"];
	

		$AdmissionFeeAmt = $_REQUEST["txtAdmissionFees"];
		$AnnualFeeAmt = $_REQUEST["txtSecurityFeesAmount"];		
		$AdmissionDiscountType=$_REQUEST["cboAdmissionDiscountType"];
		$AnnualFeeDiscountType = $_REQUEST["cboAnnualFeeDiscountType"];
		$ModeOfPayment=$_REQUEST["cboPaymentMode"];
		$chequeno=$_REQUEST["txtChequeNo"];
		$bankname=$_REQUEST["cboBank"];
		
		$currentdate=date("Y-m-d");
		
		if ($_REQUEST["txtAdmissionFeesDiscount"] =="")
		{
			$AdmissionDiscountFee=0;
		}
		else
		{
			$AdmissionDiscountFee=$_REQUEST["txtAdmissionFeesDiscount"];
		}
		if ($_REQUEST["txtAnnualFeeDiscount"]=="")
		{
			$AnnualFeeDiscount=0;
		}
		else
		{
			$AnnualFeeDiscount=$_REQUEST["txtAnnualFeeDiscount"];
		}
		
		if ($_REQUEST["txtTotalDiscount"] == "")
		{
			$TotalDiscountFee = 0;
		}
		else
		{
			$TotalDiscountFee  = $_REQUEST["txtTotalDiscount"];
		}

		

		$TotalAdmissionFee=$AdmissionFeeAmt;
		
		$TotalFeePayable = $_REQUEST["txtTotal"];
		$TotalFeePaid = $_REQUEST["txtTotalAmtPaying"];
		if ($_REQUEST["txtBalance"]=="")
		{
			$TotalBalanceAmt=0;
		}
		else
		{
			$TotalBalanceAmt= $_REQUEST["txtBalance"];
		}
		
		
		if ($AnnualFeeAmt !="")

		{$TotalAdmissionFee=$TotalAdmissionFee + $AnnualFeeAmt;}

		

		if ($AdmissionDiscountFee !="")

		{$TotalAdmissionFee=$TotalAdmissionFee - $AdmissionDiscountFee;}

		$sqlCheck = "SELECT * FROM `student_master` where  `sclass`='$Class' and `srollno`='$RollNo'";

		$result1 = mysql_query($sqlCheck,$Con);

		if (mysql_num_rows($result1) > 0)
		{
			echo "<br><br><center><b>Roll No.:" . $RollNo . " already exists !<br>Please click <a href='StudentRegistration.php'>here</a> to go back";
			exit();
		}

		$sql = "SELECT `srno` , `sname` , `DOB` , `Sex` , `Category`, `Nationality`, `sadmission` ,`sclass`,`srollno`,`LastSchool`, `sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`, `smobile`,`simei`,`suser`,`spassword`,`email` FROM `NewStudentAdmission` where  `sadmission`='$Admission'";
		$result = mysql_query($sql,$Con);



		$sqlRcpt = "SELECT MAX(`srno`) +1 FROM  `AdmissionFees`";

		$rsRcpt = mysql_query($sqlRcpt);

		while($row = mysql_fetch_row($rsRcpt))

				{

					$newsrno=$row[0];

					$NewReciptNo="AF" . $newsrno;
					//$NewReciptNo = $newsrno;

				}

		$PDFFileName=$NewReciptNo . ".pdf";
		

		if (mysql_num_rows($result)==0)
		{

			$RollNo="To be alloted";
			
			$ssql="INSERT INTO `NewStudentAdmission` (`RegistrationNo`,`sname` , `DOB`, `Sex`, `Category`, `Nationality`,`sadmission`, `sclass`,`srollno`,`LastSchool`, `sfathername`,`FatherEducation`, `FatherOccupation`, `MotherName`, `MotherEducation`,`smobile`,`AlternateMobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`ProfilePhoto`,`FinancialYear`,`PlaceOfBirth`,`Age`,`MotherTongue`,`ResidentialAddress`,`PermanentAddress`,`sfatherage`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`MotherAge`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`GeneralInformation`,`ContributionArea`,`StudentWeeknessStrength`,`SpecialAttentionDetail`,`StudetnPreviousHistory`,`RealBroSisName`,`RealBroSisSchool`,`RealBroSisClass`) VALUES('$RegNo','$Name','$DOB','$Sex','$Category','$Nationality','$Admission','$Class','$RollNo','$LastSchool','$Father','$FatherEducation','$FatherOccupation','$MotherName','$MotherEducation','$MobileNo','$AlternatMobileNo','$Imei','$UserId','$Password','$email','$Route','$ProfilePic','$FYear','$PlaceOfBirth','$Age','$MotherTongue','$ResidentialAddress','$PermanentAddress','$sfatherage','$FatherDesignation','$FatherAnnualIncome','$FatherCompanyName','$FatherOfficeAddress','$FatherOfficePhoneNo','$MotherAge','$MotherOccupatoin','$MotherDesignation','$MontherAnnualIncome','$MotherCompanyName','$MotherOfficeAddress','$MotherOfficePhone','$GeneralInformation','$ContributionArea','$StudentWeeknessStrength','$SpecialAttentionDetail','$StudetnPreviousHistory','$RealBroSisName','$RealBroSisSchool','$RealBroSisClass')";

			mysql_query($ssql) or die(mysql_error());



			//$ssql1="INSERT INTO `user_master` (`sname`,`sadmission`,`sclass`,`srollno`,`sfathername`,`smobile`,`simei`,`suser`,`spassword`,`email`,`FinancialYear`) values ('$Name','$Admission','$Class','$RollNo','$Father','$MobileNo','$Imei','$UserId','$Password','$email','$FYear')";

			//mysql_query($ssql1) or die(mysql_error());

			

			$ssql1="INSERT INTO `AdmissionFees` (`sadmission`,`sname`,`sclass`,`srollno`,`amountpaid`,`AnnualAmtPaid`,`AdmissionFeeDiscType`,`AdmissionFeeDiscount`,`AnnualFeeDiscType`,`AnnualFeeDiscount`,`TotalDiscount`,`TotalAmtPayable`,`TotalAmoutPaid`,`BalanceAmt`,`FinancialYear`,`receipt`,`status`,`EntryDate`,`quarter`,`ReceiptFileName`,`ModeOfPayment`,`chequeno`,`bankname`) values ('$Admission','$Name','$Class','$RollNo','$AdmissionFeeAmt','$AnnualFeeAmt','$AdmissionDiscountType','$AdmissionDiscountFee','$AnnualFeeDiscountType','$AnnualFeeDiscount','$TotalDiscountFee','$TotalFeePayable','$TotalFeePaid','$TotalBalanceAmt','$FYear','$NewReciptNo','PAID','$currentdate','$Quarter','$PDFFileName','$ModeOfPayment','$chequeno','$bankname')";

			mysql_query($ssql1) or die(mysql_error());

						

			$Message1="<br><br><center><b>Student Registration successfully completed!<br>Click <a href='Fees/AdmissionFeesPayment.php'>here </a> to submit admission fee.";



		}

		else

		{

			$Message1="<br><br><center><b>Admission No:" . $Admission . " already exists!" ;
			echo $Message1;
			exit();
		}

		//echo $Message1;

//}

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

        //document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

		//document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.frmPDF.htmlcode.value = divElements ;

		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
 
        //Print Page
		
        //window.print();
        //var FileLocation="http://emeraldsis.com/Admin/StudentManagement/CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		//window.location.assign(FileLocation);
		//return;


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
</style>



	



</head>

<body onload="Javascript:CreatePDF();">

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >

	<p align="center">

	<font face="Cambria">

	<img border="0" src="../images/logo.png"  height="68" width="213"></font></p>
	<p align="center" ><b><font face="Cambria">Admission Fees 

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

				<font face="Cambria">Admission No</font></td>

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

				<font face="Cambria">Admission Fees Amount</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo ($AdmissionFeeAmt-$AdmissionDiscountFee); ?>

				</font>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<font face="Cambria">Annual Charges Amount</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo ($AnnualFeeAmt-$AnnualFeeDiscount); ?>

				</font>

				</td>

			</tr>

			<!--
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px;" >

				Waiver (If Applicable)</td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px;">

				<?php //echo $TotalDiscountFee; ?>

				</td>

			</tr>
			-->

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<font face="Cambria">Total Fees Payable</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo $TotalFeePayable; ?>

				</font>

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<b>

				<font face="Cambria">Total Fees Paid</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<b><font face="Cambria">

				<?php echo $TotalFeePaid; ?></font></b></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<b><font face="Cambria">Balance</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<b><font face="Cambria">

				<?php echo $TotalBalanceAmt; ?></font></b></td>

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
<form name="frmPDF" id="frmPDF" method="post" action="CreatePDF.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> || <a href="StudentManagementLandingPage.php">HOME</a>	
</font> 
	
</div>
</body>

</html>

