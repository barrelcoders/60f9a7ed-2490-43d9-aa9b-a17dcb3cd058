<?php
session_start();
include '../Header/Header3.php';
include '../../connection.php';
?>
<?php
	if ($_REQUEST["txtRegistrationId"] != "")
	{
		$RegistrationNo	= $_REQUEST["txtRegistrationId"];	
		$ssql="select * from `NewStudentAdmission` where `RegistrationNo`='$RegistrationNo'";
		$rsChk=mysql_query($ssql);
		if(mysql_num_rows($rsChk)>0)
		{
			echo "<br><br><center><b>Admission already done!";
			exit();
		}
		
		$ssql="select `FinancialYear`,`quarter`,`sname`,`DOB`,`PlaceOfBirth`,`Age`,`Nationality`,`sclass`,`Category`,`MotherTongue`,`Nationality`,`ResidentialAddress`,`PermanentAddress`,`PhoneNo`,`smobile`,`sclass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`GeneralInformation`,`ContributionArea`,`StudentWeeknessStrength`,`SpecialAttentionDetail`,`StudetnPreviousHistory`,`RealBroSisName`,`RealBroSisSchool`,`RealBroSisClass`,`RegistrationFormNo`,`Sex`,`email` from `NewStudentRegistration` where `RegistrationNo`='$RegistrationNo'";
		$rsFetchDetail=mysql_query($ssql);
		while($row = mysql_fetch_row($rsFetchDetail))
		{
			$FinancialYear=$row[0];
			$quarter=$row[1];
			$sname=$row[2];
			$DOB=$row[3];
			$PlaceOfBirth=$row[4];
			$Age=$row[5];
			$Nationality=$row[6];
			$sclass=$row[7];
			$Category=$row[8];
			$MotherTongue=$row[9];
			$Nationality=$row[10];
			$ResidentialAddress=$row[11];
			$PermanentAddress=$row[12];
			$PhoneNo=$row[13];
			$smobile=$row[14];
			$sclass=$row[15];
			$LastSchool=$row[16];
			$sfathername=$row[17];
			$sfatherage=$row[18];
			$FatherEducation=$row[19];
			$FatherOccupation=$row[20];
			$FatherDesignation=$row[21];
			$FatherAnnualIncome=$row[22];
			$FatherCompanyName=$row[23];
			$FatherOfficeAddress=$row[24];
			$FatherOfficePhoneNo=$row[25];
			$MotherName=$row[26];
			$MotherAge=$row[27];
			$MotherEducation=$row[28];
			$MotherOccupatoin=$row[29];
			$MotherDesignation=$row[30];
			$MontherAnnualIncome=$row[31];
			$MotherCompanyName=$row[32];
			$MotherOfficeAddress=$row[33];
			$MotherOfficePhone=$row[34];
			$GeneralInformation=$row[35];
			$ContributionArea=$row[36];
			$StudentWeeknessStrength=$row[37];
			$SpecialAttentionDetail=$row[38];
			$StudetnPreviousHistory=$row[39];
			$RealBroSisName=$row[40];
			$RealBroSisSchool=$row[41];
			$RealBroSisClass=$row[42];
			$RegistrationFormNo=$row[43];
			$Gender=$row[44];
			$Email=$row[45];
		}
	}

$ssqlClass="SELECT distinct `class` FROM `class_master`";

$rsClass= mysql_query($ssqlClass);

$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";

$rsFY= mysql_query($ssqlFY);

	$ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";

	$rsRoute= mysql_query($ssqlRoute);

	//Admission no will be generated after sumission of form
	/*
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

	*/

$ssqlDiscount="SELECT distinct `head` FROM `discounttable` where `discounttype`='tuitionfees'";
$rsDiscount= mysql_query($ssqlDiscount);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='admissionfees'";
$rsAdmissionFeeDiscount= mysql_query($sstr);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='annualcharges'";
$rsAnnualFeeDiscount= mysql_query($sstr);

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$ssql="select distinct `bank_name` from `bank_master` where status='1'";
$rsBank	= mysql_query($ssql);
	
?>

<script language="javascript">



function Validate()
{

	if (document.getElementById("cboFinancialYear").value=="Select One")
	{
		alert("Please select financial year!");
		return;
	}

	if (document.getElementById("cboQuarter").value=="Select One")
	{
		alert("Please enter quarter!");
		return;
	}

	if (document.getElementById("txtName").value=="")
	{
		alert("Name is mandatory");
		return;
	}
	
	/*
	if (document.getElementById("txtRollNo").value=="")
	{
		alert("Roll No is mandatory");
		return;
	}
	*/

	if (document.getElementById("cboFeeSubmissionType").value == "Select One")
	{
		alert ("Fee Submission type Quarterly / Monthly is mandatory!");
		return;
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
	if (document.getElementById("cboTransport").value == "Yes")

	{	

		if (document.getElementById("cboRoute").value=="Select One")

		{

			alert("In case of Transport avail is Yes then Route is mandatory!");

			return;

		}

	}
	



	if (document.getElementById("cboPaymentMode").value == "Cash")

	{

		//document.getElementById("txtBankName").value="";
		document.getElementById("cboBank").value="Select One";
		document.getElementById("cboBank").disabled=false;
		
		document.getElementById("txtChequeNo").value="";

	}

	if (document.getElementById("txtTotalAmtPaying").value=="")
	{
		alert ("Please enter Total Fee Paid!");
		return;
	}

	document.getElementById("frmNewStudent").submit();

}







function ShowEdit(SrNo)







{







	//window.open "EditHoliday.php?srno" . SrNo;







	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");







}







function ShowDelete(SrNo)

{

	var r = confirm("Do you really want to delete the entry?");

	if (r == true)

 	 {

  		var myWindow = window.open("DeleteStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");

  	 }

	else

  	{

	  	return;

  	}

}



function GetAnnualFeeDiscount()

{

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

			        	

			        	//document.getElementById("txtAnnualFeeDiscount").value=rows;

			        	document.getElementById("txtAnnualFeeDiscount").value = (parseInt(document.getElementById("txtSecurityFeesAmount").value) * rows)/100;

						CalculateTotalDiscount();
						CalculatTotal();

						//alert(rows);														

			        }

		      }

			if (document.getElementById("cboAnnualFeeDiscountType").value=="Others")
			{
				document.getElementById("txtAnnualFeeDiscount").readOnly=false;
			}
			else
			{
				document.getElementById("txtAnnualFeeDiscount").readOnly=true;
			var submiturl="GetFeeDiscount.php?discounttype=" + document.getElementById("cboAnnualFeeDiscountType").value + "&financialyear=" + document.getElementById("cboFinancialYear").value + "&discountreason=annualfees";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
			}


}

function fnlGetAdmissionFeeDiscount()

{

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

			        	//alert(rows);

			        	//return;

			        	

			        	

			        	document.getElementById("txtAdmissionFeesDiscount").value = (parseInt(document.getElementById("txtAdmissionFees").value) * rows)/100;

						CalculateTotalDiscount();
						
						CalculatTotal();
						//alert(rows);														

			        }

		      }


		if (document.getElementById("cboAdmissionDiscountType").value=="Others")
		{
			document.getElementById("txtAdmissionFeesDiscount").readOnly=false;
		}
		else
		{
			document.getElementById("txtAdmissionFeesDiscount").readOnly=true;
			var submiturl="GetFeeDiscount.php?discounttype=" + document.getElementById("cboAdmissionDiscountType").value + "&financialyear=" + document.getElementById("cboFinancialYear").value + "&discountreason=admissionfees";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
		}	

}



function CalculateTotalDiscount()

{

	AdmissionFeeDiscount=0;

	AnnualFeeDiscount=0;

	TotalDiscount=0;

	if (isNaN(document.getElementById("txtAdmissionFeesDiscount").value) == "true" || document.getElementById("txtAdmissionFeesDiscount").value == "")

	{

		AdmissionFeeDiscount=0;

	}

	else

	{

		AdmissionFeeDiscount = parseInt(document.getElementById("txtAdmissionFeesDiscount").value);

	}

	

	if (isNaN(document.getElementById("txtAnnualFeeDiscount").value) == "true" || document.getElementById("txtAnnualFeeDiscount").value=="")

	{

		AnnualFeeDiscount=0;

	}

	else

	{

		AnnualFeeDiscount = parseInt(document.getElementById("txtAnnualFeeDiscount").value);

	}

	

	TotalDiscount = parseInt(AdmissionFeeDiscount) + parseInt(AnnualFeeDiscount) ;

	document.getElementById("txtTotalDiscount").value = TotalDiscount;

	

}



function GetFeeDetail()
{
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

			        	arr_row=rows.split(",");

			        	document.getElementById("txtAdmissionFees").value=arr_row[4];

			        	document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						CalculatTotal();
						//alert(rows);														

			        }

		      }


			var strClass=document.getElementById("cboClass").value;
			strClass=strClass.toUpperCase();
			var submiturl="../Fees/GetAdmissionFeeDetail.php?Class=" + strClass + "&financialyear=" + document.getElementById("cboFinancialYear").value;

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);

}

function CalculatTotal()
{
	TotalAmt=0;
	if(isNaN(document.getElementById("txtAdmissionFees").value)== true || document.getElementById("txtAdmissionFees").value == "")
	{
		AdmissionFee=0;
	}
	else
	{
		AdmissionFee=document.getElementById("txtAdmissionFees").value;
	}
	
	if(isNaN(document.getElementById("txtSecurityFeesAmount").value)== true || document.getElementById("txtSecurityFeesAmount").value=="")
	{
		AnnualFee=0;
	}
	else
	{
		AnnualFee=document.getElementById("txtSecurityFeesAmount").value;
	}
	
	if (document.getElementById("txtTotalDiscount").value !="")
	{
		Discnt=document.getElementById("txtTotalDiscount").value;
	}
	else
	{Discnt=0;}
	
	
	TotalAmt= parseInt(AdmissionFee) + parseInt(AnnualFee) - parseInt(Discnt);
	document.getElementById("txtTotal").value = parseInt(TotalAmt);
	
}

function CalculateBalance()
{
	Balance=0;
	
	if (document.getElementById("txtTotal").value != "")
	{
		Total=document.getElementById("txtTotal").value;
	}
	
	if (isNaN(document.getElementById("txtTotalAmtPaying").value)== "true" || document.getElementById("txtTotalAmtPaying").value=="")
	{AmountPaying=0;}
	else
	{
		if (parseInt(document.getElementById("txtTotalAmtPaying").value) > parseInt(document.getElementById("txtTotal").value))
		{
			alert ("Total Amount paid cant not be greater then Payable Amount!");
			return;
		}
		AmountPaying = document.getElementById("txtTotalAmtPaying").value;
	}
	
	document.getElementById("txtBalance").value = Total - AmountPaying;
}

function ValidateTransport()
{

	if (document.getElementById("cboTransport").value == "No")
	{	

		alert("In case of Transport avail is no then you can not select route!");

		document.getElementById("cboRoute").value="Select One";

	}
}

function ChkPaymentMode()
{

	if (document.getElementById("cboPaymentMode").value == "Cash")
	{
		//document.getElementById("txtBankName").readOnly = true;
		document.getElementById("cboBank").value="Select One";
		document.getElementById("cboBank").disabled=true;

		document.getElementById("txtChequeNo").readOnly = true;

	}
	else
	{
		//document.getElementById("txtBankName").value="";
		document.getElementById("cboBank").disabled=false;

		document.getElementById("txtChequeNo").value="";

		//document.getElementById("txtBankName").readOnly = false;

		document.getElementById("txtChequeNo").readOnly = false;

	}

}

</script>







<html>















<head>







<meta http-equiv="Content-Language" content="en-us">







<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">







<title>Student Registration</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>



<style type="text/css">







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

	font-family: Cambria;

}

.auto-style18 {

	font-weight: bold;

	font-size: 12pt;

	font-family: Cambria;

}

.auto-style19 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

}

.auto-style20 {

	font-weight: normal;

	font-size: 12pt;

	font-family: Cambria;

}

.auto-style21 {

	font-family: Cambria;

	font-weight: normal;

	font-size: 12pt;

	color: #000000;

}

.auto-style23 {

	font-size: 12pt;

}

.auto-style25 {

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

}

.auto-style26 {

	border-style: none;

	border-width: medium;

	font-size: 12pt;

	font-family: Cambria;

}







.auto-style30 {

	border: medium solid #FFFFFF;

	color: #000000;

}

.auto-style5 {

	text-align: left;

	font-family: Cambria;

	color: #000000;

	text-decoration: underline;

	font-size: medium;

}

.auto-style3 {

	color: #000000;

}

.auto-style31 {

	font-family: Cambria;

}

.auto-style32 {

	font-size: small;

	font-family: Cambria;

	color: #000000;

}

.auto-style33 {

	font-size: 12pt;

	font-family: Cambria;

}

.auto-style34 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

}

.auto-style35 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Cambria;

	font-weight: bold;

	font-size: 18px;

	color: #000000;

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



.auto-style36 {

	border-style: none;

	border-width: medium;

	text-align: right;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

}

.auto-style38 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Cambria;

	font-size: medium;

	color: #000000;

}

.auto-style17 {

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

}

.auto-style39 {

	border-style: none;

	border-width: medium;

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

}

.auto-style40 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

}

.auto-style41 {

	border-style: none;

	border-width: medium;

	text-align: left;

}







.auto-style47 {

	font-family: Cambria;

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

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #99CCFF;

}







.style13 {

	border-style: none;

	border-width: medium;

	font-size: 12pt;

	font-family: Cambria;

	text-align: right;

}







.style14 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;

}







.style15 {
	border-style: none;
	border-width: medium;
	text-align: right;
}







.style16 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	text-align: center;
}







</style>







</head>















<body onload="Javascript:GetFeeDetail();">







<p>&nbsp;</p>







<table cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style7" style="width: 100%">
	<tr>
		<td class="auto-style30">
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3"><strong>
New Student Admission</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<font face="Cambria">
<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>
</td></tr>
</table>

	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">
	<form name="frmNewStudent" id="frmNewStudent" method="post" action="AdmissionFeeReceipt.php" enctype="multipart/form-data">
	<tr>
		<td style="height: 11px;" colspan="8" class="auto-style35">
		<font face="Cambria">
		<?php echo $Message1; ?></font></td>
	</tr>
	<tr>
		<td style="height: 10; background-color:#95C23D" class="auto-style47" colspan="8">
		<font face="Cambria">
		<strong>Student Details:</strong></font></td>
		<font face="Cambria">
		<br class="auto-style31">
		<br class="auto-style31">
		</font>
	</tr>
	<tr>
		<td style="height: 29px;" colspan="8" class="auto-style23">
		<table style="width: 100%" class="style14">
			<tr>
				<td class="auto-style11" colspan="2">
			<span class="auto-style25"><strong><font face="Cambria">Admission No</font></strong></span><span style="font-weight: 700; color: #000000" class="auto-style33"><font face="Cambria">:&nbsp; 
			</font> </span>
		<font face="Cambria">
		
		<!--<input type="text" name="txtAdmission" id="txtAdmission" size="15" style="color: #CC0033; width: 108px;" class="auto-style33" value="<?php echo $NewRistrationNo; ?>">-->To be 
			allotted
		</font></td>
				<td style="width: 147px" class="auto-style34">&nbsp;</td>
				<td style="width: 147px" class="auto-style26">
				<span class="auto-style21"><font face="Cambria">Financial Year</font></span></td>
				<td style="width: 147px" class="auto-style26">
				<font face="Cambria">
				<select name="cboFinancialYear" id="cboFinancialYear">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($rowFY = mysql_fetch_row($rsFY))
				{
						$Year=$rowFY[0];
							$FYear=$rowFY[1];
				?>
				<option value="<?php echo $Year; ?>" <?php if ($FinancialYear==$Year) { ?>selected="selected" <?php } ?> ><?php echo $FYear; ?></option>

				<?php 

				}

				?>

				</select></font></td>



				<td style="width: 148px" class="style13">

				<p style="text-align: center">

				<span class="auto-style21"><font face="Cambria">Quarter</font></span></td>



				<td style="width: 92px" class="auto-style26">

				<font face="Cambria">

				<select name="cboQuarter" id="cboQuarter">

				<option selected="" value="Select One">Select One</option>

				<option value="Q1" <?php if($quarter=="Q1") { ?> selected="selected" <?php }?> >
				Q1</option>

				<option value="Q2" <?php if($quarter=="Q2") { ?> selected="selected" <?php }?> >
				Q2</option>

				<option value="Q3" <?php if($quarter=="Q3") { ?> selected="selected" <?php }?> >
				Q3</option>

				<option value="Q4" <?php if($quarter=="Q4") { ?> selected="selected" <?php }?> >
				Q4</option>

				</select></font></td>



				<td style="width: 169px" class="auto-style19">
				<font face="Cambria">Date</font></td>



				<td style="width: 148px" class="auto-style26">

				<font face="Cambria">

				<input name="txtDate" id="txtDate" class="tcal" style="width: 108px" type="text"></font></td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style34">&nbsp;</td>



				<td style="width: 147px" class="auto-style26">&nbsp;</td>



				<td style="width: 147px" class="auto-style26">&nbsp;</td>



				<td style="width: 218px" class="auto-style26" colspan="2">&nbsp;</td>



				<td style="width: 169px" class="auto-style26">&nbsp;</td>



				<td style="width: 148px" class="auto-style26">&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Student Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="width: 147px" class="auto-style11">







		<font face="Cambria">







		<input name="txtName" id="txtName" type="text" class="auto-style33" style="width: 119px" value="<?php echo $sname;?>"></font></td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







		<span class="auto-style21">







		<span class="auto-style25">Date Of Birth</span><span style="color: #000000" class="auto-style33">:</span></span></td>



				<td style="width: 147px" class="auto-style11">







		<font face="Cambria">







		<input name="txtDOB" id="txtDOB" type="text" class="tcal" style="width: 117px" value="<?php echo $DOB;?>"></font></td>



				<td class="style15" colspan="2" width="218">







				&nbsp;</td>



				<td class="style15" width="169">







				<p style="text-align: left">Place of Birth

				<span style="color: #000000" class="auto-style33">



				:</span></td>



				<td style="width: 148px" class="auto-style41">







				<input name="txtPlaceOfBirth" id="txtPlaceOfBirth" type="text" value="<?php echo $PlaceOfBirth;?>" size="15"></td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 218px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 169px" class="auto-style19">







				&nbsp;</td>



				<td style="width: 148px" class="auto-style41">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







				<span class="auto-style21">Age

				<span style="color: #000000" class="auto-style33">



				:</span></span></td>



				<td style="width: 147px" class="auto-style11">







				<input name="txtAge" id="txtAge" type="text" value="<?php echo $Age;?>"></td>



				<td style="width: 147px" class="auto-style11">







				<span class="auto-style31"><font size="3" face="Cambria">

				&nbsp;</font></span></td>



				<td style="width: 147px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Nationality</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="width: 147px" class="auto-style11">







		<font face="Cambria">







		<input name="txtNationality" id="txtNationality" type="text" class="auto-style25" value="<?php echo $Nationality;?>" style="width: 119; height:25"></font></td>



				<td style="width: 218px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 169px" class="auto-style19">







				<font face="Cambria">&nbsp;Upload Photo:&nbsp;</font></td>



				<td style="width: 148px" class="auto-style41">







				<font face="Cambria">







				<input type="file" name="file" id="file"></font></td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 218px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td class="auto-style19" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







		<font face="Cambria">Class:</font></td>



				<td style="width: 147px" class="auto-style11">







				<strong><em>







				<font face="Cambria">







		<select name="cboClass" id="cboClass" style="height: 22px" class="auto-style25" onchange="Javascript:GetFeeDetail();">







		<option selected="" value="Select One">Select One</option>

		<option value="PRE-NURSERY" <?php if ($sclass=="pre nursery") {?>selected="selected" <?php } ?> >
		pre nursery</option>

		<option value="NURSERY" <?php if ($sclass=="Nursery") {?>selected="selected" <?php } ?> >
		Nursery</option>

<option value="K.G" <?php if ($sclass=="K.G") {?>selected="selected" <?php } ?> >
		K.G</option>
		
		<option value="L.K.G" <?php if ($sclass=="L.K.G") {?>selected="selected" <?php } ?> >
		L.K.G</option>

		<option value="U.K.G" <?php if ($sclass=="U.K.G") {?>selected="selected" <?php } ?> >
		U.K.G</option>

		<option value="1" <?php if ($sclass=="1") {?>selected="selected" <?php } ?> >
		1</option>

		<option value="2" <?php if ($sclass=="2") {?>selected="selected" <?php } ?> >
		2</option>

		<option value="3" <?php if ($sclass=="3") {?>selected="selected" <?php } ?> >
		3</option>

		<option value="4" <?php if ($sclass=="4") {?>selected="selected" <?php } ?> >
		4</option>

		<option value="5" <?php if ($sclass=="5") {?>selected="selected" <?php } ?> >
		5</option>

		<option value="6" <?php if ($sclass=="6") {?>selected="selected" <?php } ?> >
		6</option>

		<option value="7" <?php if ($sclass=="7") {?>selected="selected" <?php } ?> >
		7</option>

		<option value="8" <?php if ($sclass=="8") {?>selected="selected" <?php } ?> >
		8</option>

		<option value="9" <?php if ($sclass=="9") {?>selected="selected" <?php } ?> >
		9</option>

		<option value="10" <?php if ($sclass=="10") {?>selected="selected" <?php } ?> >
		10</option>

		<option value="11" <?php if ($sclass=="11") {?>selected="selected" <?php } ?> >
		11</option>

		<option value="12" <?php if ($sclass=="12") {?>selected="selected" <?php } ?> >
		12</option>

		<option value="Test" <?php if ($sclass=="Test") {?>selected="selected" <?php } ?> >
		Test</option>

		</select></font></em></strong></td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







				<font face="Cambria">Discount Type:</font></td>



				<td style="width: 147px" class="auto-style11">







				<font face="Cambria">
				<select name="cboDiscountType" id="cboDiscountType">
				<option selected="" value="">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsDiscount))
				{
					$DiscountHead = $row[0];
				
				?>
				<option value="<?php echo $DiscountHead;?>"><?php echo $DiscountHead;?></option>
				<?php
				}
				?>
				</select></font></td>



				<td style="width: 218px" class="auto-style11" colspan="2">&nbsp;</td>
				<td style="width: 169px" class="auto-style26">
				<font face="Cambria">Reg. No:</font></td>



				<td style="width: 148px" class="auto-style11">
					<input name="txtRegNo" id="txtRegNo" readonly="readonly" type="text" value="<?php echo $RegistrationNo;?>">
			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 218px" class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style19">







				<font face="Cambria">Category</font></td>



				<td>
				<p align="left"><font face="Cambria"><select name="cboCategory" id="cboCategory" class="auto-style16">



		<option value="Select One">Select One</option>



		<option <?php if ($Category=="General") { ?>selected="selected" <?php }?>>
		General</option>



		<option value="SC" <?php if ($Category=="SC") { ?>selected="selected" <?php }?>>
		SC</option>



		<option value="ST" <?php if ($Category=="ST") { ?>selected="selected" <?php }?>>
		ST</option>



		<option value="OBC" <?php if ($Category=="OBC") { ?>selected="selected" <?php }?>>
		OBC</option>



		</select></font></td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







		<span class="auto-style25"><font face="Cambria">Roll No.</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 147px" class="auto-style11">







		<font face="Cambria">







		<input name="txtRollNo" id="txtRollNo" type="text" class="auto-style33" style="width: 110px" value="To be alloted" readonly="readonly" ></font></td>



				<td style="width: 218px" class="auto-style11" colspan="2"></td>
				<td style="width: 169px" class="auto-style26">
				<font face="Cambria">Fee Sub. Type:</font></td>				



				<td style="width: 148px" class="auto-style11">
				<font face="Cambria">
				<select name="cboFeeSubmissionType" id="cboFeeSubmissionType"> 
				<option value="">Select One</option>
				<option selected="" value="Monthly">Monthly</option>
				<option value="Quarterly">Quarterly</option>
				</select></font></td>				
			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 218px" class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







				<span style="color: #000000" class="auto-style33">

				<font face="Cambria">Gender:</font></span><span class="auto-style31"><font size="3" face="Cambria"> </font>







				</span>







				</td>



				<td style="width: 147px" class="auto-style11">







		<font face="Cambria">







		<input name="txtSex" id="txtSex" type="text" class="auto-style33" style="width: 118px" value="<?php echo $Gender;?>"></font></td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







				<span style="color: #000000" class="auto-style33">

				Mother Tongue :</span></td>



				<td style="width: 147px" class="auto-style11">







				<input name="txtMotherTounge" id="txtMotherTounge" type="text" value="<?php echo $MotherTongue; ?>" size="15"></td>



				<td style="width: 218px" class="auto-style11" colspan="2">&nbsp;</td>
				<td>







				<font face="Cambria">Last School Attended</font></td>
				<td>







		<font face="Cambria">







		<input name="txtLastSchool" id="txtLastSchool" type="text" class="auto-style33" style="height: 26px; width: 151px;" value="<?php echo $LastSchool;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 218px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 169px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 148px" class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Permanent Address </font> </span>

				<span style="color: #000000" class="auto-style33">



				<font face="Cambria">:</font></span></td>



				<td class="auto-style11" colspan="3">















		<font face="Cambria">















		<input name="txtPermanentAddress" id="txtPermanentAddress" type="text" class="auto-style33" style="height: 81; width: 411" size="1" value="<?php echo $PermanentAddress; ?>"></font></td>



				<td style="width: 147px" class="auto-style26">







		&nbsp;</td>



				<td class="auto-style26" colspan="3">







		<font face="Cambria">Correspondence Address:</font></td>



				<td style="width: 148px" class="auto-style26">















		<font face="Cambria">















		<input name="txtCorrespondenceAddress" id="txtCorrespondenceAddress" type="text" class="auto-style33" style="height: 57; width: 283" size="1" value="<?php echo $ResidentialAddress; ?>"></font></td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 147px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 147px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style26">







		&nbsp;</td>



				<td class="auto-style26" colspan="3">







		&nbsp;</td>



				<td style="width: 148px" class="auto-style26">















		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 147px" class="auto-style11">







		<font face="Cambria">Transport Availed</font></td>



				<td style="width: 147px" class="auto-style11">















		<font face="Cambria">







		<select name="cboTransport" id="cboTransport" class="auto-style16">



		<option value="Yes">Yes</option>



		<option value="No">No</option>



		</select></font></td>



				<td style="width: 147px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style19">







				&nbsp;</td>



				<td style="width: 147px" class="auto-style26">







		&nbsp;</td>



				<td class="auto-style26" colspan="3">







		<p align="left">







		<span class="auto-style21"><font face="Cambria">Transport Route</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 148px" class="auto-style26">















		<font face="Cambria">















		<select name="cboRoute" id="cboRoute" class="auto-style25" style="width: 104px" onchange="Javascript:ValidateTransport();">

		<option selected="">Select One</option>

		<?php

		while($rowRoute = mysql_fetch_row($rsRoute))

		{

					$RouteNo = $rowRoute[0];

		?>

		<option value="<?php echo $RouteNo; ?>"><?php echo $RouteNo; ?></option>

		<?php

		}

		?>

		

		

		</select></font></td>



			</tr>



		</table>







		</td>







			</tr>



		



		<tr>



		







		<td class="auto-style33">







		&nbsp;</td>







		<td style="width: 157px; height: 29px;" class="auto-style33">















		&nbsp;</td>



		



			



			<td style="width: 157px; height: 29px;" class="auto-style33">







			&nbsp;</td>







		<td style="height: 29px;" class="auto-style33">















		&nbsp;</td>



		



			



			



			<td style="width: 157px; height: 29px;" class="auto-style33">







			&nbsp;</td>







		<td style="width: 387px; height: 29px;" class="auto-style33">















		&nbsp;</td>



		<td></td>



		<td></td>



			</tr>



		



		<tr>



		







		<td style="height: 10; background-color:#95C23D" class="auto-style47" colspan="8">







		<font face="Cambria">







		<strong>Guardian Details:</strong></font></td>







			</tr>



			



			



		



			<tr>



			



			



		







		<td style="height: 46px;" colspan="8" class="auto-style23">







		<table style="width: 1327px" class="auto-style1">



			<tr>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Father's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 221px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherName" id="txtFatherName" type="text" class="auto-style25" style="width: 147; height:25" value="<?php echo $sfathername;?>"></font></td>



				<td class="auto-style11" colspan="2">







		&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 222px" class="auto-style11">















		<font face="Cambria">














		<input name="txtMotherName" id="txtMotherName" type="text" class="auto-style33" style="width: 147; height:25" value="<?php echo $MotherName;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">















				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style11">















				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







				<font face="Cambria">Father's Age:</font></td>



				<td style="width: 221px" class="auto-style11">















				<font face="Cambria">















<input name="txtFatherAge" id="txtFatherAge" type="text" value="<?php echo $sfatherage;?>"></font></td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				<font face="Cambria">Mother's Age:</font></td>



				<td style="width: 222px" class="auto-style11">















				<font face="Cambria">















<input name="txtMotherAge" id="txtMotherAge" type="text" value="<?php echo $MotherAge;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">















				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style11">















				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Occupation:</font></span></td>



				<td style="width: 221px" class="auto-style11">














		<font face="Cambria">















		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" class="auto-style33" style="width: 148; height:25" value="<?php echo $FatherOccupation;?>"></font></td>



				<td class="auto-style11" colspan="2">







		&nbsp;</td>



				<td class="auto-style11">







		<font face="Cambria">Mother's Occupation:</font></td>



				<td class="auto-style11">







		<font face="Cambria">















<input name="txtMotherOccupation" id="txtMotherOccupation" type="text" value="<?php echo $MotherOccupatoin;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 221px" class="auto-style11">














		&nbsp;</td>



				<td class="auto-style11" colspan="2">







		&nbsp;</td>



				<td class="auto-style11">







		&nbsp;</td>



				<td class="auto-style11">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Education:</font></span></td>



				<td style="width: 221px" class="auto-style11">














		<font face="Cambria">















		<input name="txtFatherEducation" id="txtFatherEducation" type="text" class="auto-style33" style="width: 150; height:25" value="<?php echo $FatherEducation;?>"></font></td>



				<td class="auto-style11" colspan="2">







		&nbsp;</td>



				<td class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Mother's Education:</font></span></td>



				<td class="auto-style11">







		<font face="Cambria">















		<input name="txtMotherEducation" id="txtMotherEducation" type="text" class="auto-style33" style="width: 148; height:25" value="<?php echo $MotherEducation;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 221px" class="auto-style11">














		&nbsp;</td>



				<td class="auto-style11" colspan="4">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">Father's Designation:</font></td>



				<td style="width: 221px" class="auto-style11">














		<font face="Cambria">















<input name="txtFatherDesignation" id="txtFatherDesignation" type="text" value="<?php echo $FatherDesignation;?>"></font></td>



				<td class="auto-style11" colspan="2">







		&nbsp;</td>



				<td class="auto-style11">







<span class="auto-style21"><font face="Cambria">Mother's Designation:</font></span></td>



				<td class="auto-style11">







		<font face="Cambria">















<input name="txtMotherDesignation" id="txtMotherDesignation" type="text" value="<?php echo $MotherDesignation;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 221px" class="auto-style11">














		&nbsp;</td>



				<td class="auto-style11" colspan="4">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">Father's Company:</font></td>



				<td style="width: 221px" class="auto-style11">














		<font face="Cambria">















<input name="txtFatherCompanyName" id="txtFatherCompanyName" type="text" size="20" style="height: 22px" value="<?php echo $FatherCompanyName;?>"></font></td>



				<td class="auto-style11" colspan="2">







		&nbsp;</td>



				<td class="auto-style11">







		<font face="Cambria">Mother's Company:</font></td>



				<td class="auto-style11">







		<font face="Cambria">















<input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" value="<?php echo $MotherCompanyName;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 221px" class="auto-style11">














		&nbsp;</td>



				<td class="auto-style11" colspan="4">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Official Ph. no</font></span></td>



				<td style="width: 221px" class="auto-style11">














		<font face="Cambria">















<input name="txtFatherOfficialPhNo" id="txtFatherOfficialPhNo" type="text" value="<?php echo $FatherOfficePhoneNo;?>"></font></td>



				<td class="auto-style11" colspan="2">







		<span class="auto-style25"><font face="Cambria">&nbsp;&nbsp; </font> </span>















				</td>



				<td class="auto-style11">







		<font face="Cambria">Mother's Official Phone No:</font></td>



				<td class="auto-style11">







		<font face="Cambria">















<input name="txtMotherOfficialPhNo" id="txtMotherOfficialPhNo" type="text" value="<?php echo $MotherOfficePhone;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				<font face="Cambria">Father's Annual Income:</font></td>



				<td style="width: 221px" class="auto-style26">















				<font face="Cambria">















<input name="txtFatherAnnualIncome" id="txtFatherAnnualIncome" type="text" value="<?php echo $FatherAnnualIncome;?>"></font></td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				<font face="Cambria">Mother's Annual Income:</font></td>



				<td style="width: 222px" class="auto-style26">







				<font face="Cambria">















<input name="txtMotherAnnualIncome" id="txtMotherAnnualIncome" type="text" value="<?php echo $MontherAnnualIncome;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







<span class="auto-style25"><font face="Cambria">Father's Office Address:</font></span></td>



				<td style="width: 221px" class="auto-style26">















				<font face="Cambria">















<textarea name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" cols="30" rows="2"><?php echo $FatherOfficeAddress;?></textarea></font></td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				<font face="Cambria">Mother's Office Address:</font></td>



				<td style="width: 222px" class="auto-style26">







				<font face="Cambria">















<textarea name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" cols="20" rows="2"><?php echo $MotherOfficeAddress;?></textarea></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				General Information:</td>



				<td style="width: 221px" class="auto-style26">















<textarea name="txtGeneralInformation" id="txtGeneralInformation" rows="2" style="width: 260px" cols="20"><?php echo $GeneralInformation;?></textarea></td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				Contribution Area</td>



				<td style="width: 222px" class="auto-style26">















<textarea name="txtContributionArea" id="txtContributionArea" cols="20" rows="2"><?php echo $ContributionArea;?></textarea></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







<span class="auto-style21">Student Weakness / Strength:</span></td>



				<td style="width: 221px" class="auto-style26">















<textarea name="txtStudentWeaknessStrength" id="txtStudentWeaknessStrength" rows="2" style="width: 260px" cols="20"><?php echo $StudentWeeknessStrength;?></textarea></td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







<span class="auto-style21">Special Attention Detail:</span></td>



				<td style="width: 222px" class="auto-style26">















<textarea name="txtStudentSpecialAttentionDetail" id="txtStudentSpecialAttentionDetail" cols="20" rows="2"><?php echo $SpecialAttentionDetail;?></textarea></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







<span class="auto-style21">Student Previous History:</span></td>



				<td style="width: 221px" class="auto-style26">















<textarea name="txtStudentPreviousDetail" id="txtStudentPreviousDetail" rows="2" style="width: 260px" cols="20"><?php echo $StudetnPreviousHistory;?></textarea></td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







<span class="auto-style21">Real Brother / Sister Name:</span></td>



				<td style="width: 222px" class="auto-style26">















<input name="txtRealBroSisName" id="txtRealBroSisName" type="text" value="<?php echo $RealBroSisName;?>"></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







<span class="auto-style21">Real Brother / Sister School:</span></td>



				<td style="width: 221px" class="auto-style26">















<input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" type="text" value="<?php echo $RealBroSisSchool;?>"></td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







<span class="auto-style21">Real Brother / Sister Class:</span></td>



				<td style="width: 222px" class="auto-style26">















<input name="txtRealBroSisClass" id="txtRealBroSisClass" type="text" value="<?php echo $RealBroSisClass;?>"></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style26">







				&nbsp;</td>



			</tr>



		</table>



		</td>



</tr>	







<tr>			



		







		<td style="height: 10; background-color:#95C23D" class="auto-style47" colspan="8">







		<font face="Cambria">







		<strong>Contact Details:</strong></font></td>







			</tr>



		



		<tr>







		<td style="height: 29px;" colspan="8" class="auto-style23">







		<table style="width: 1327px" class="style14">



			<tr>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mobile</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">







		<input name="txtMobile" id="txtMobile" type="text" class="auto-style33" style="width: 143px" value="<?php echo $smobile;?>"></font></td>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Alternate Mobile:</font></span></td>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">







		<input name="txtAltMobile" id="txtAltMobile" type="text"></font></td>



				<td style="width: 221px" class="auto-style26">







		<span class="auto-style25"><font face="Cambria">Mobile IMEI</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 222px" class="auto-style26">







		<font face="Cambria">







		<input name="txtImei" id="txtImei" type="text" class="auto-style33" style="width: 131px"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style26">&nbsp;</td>



				<td style="width: 222px" class="auto-style26">&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">User Id</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 221px" class="auto-style11">















		<font face="Cambria">















		<!--<input name="txtUserId" id="txtUserId" type="text" class="auto-style33" style="width: 141px" value="<?php echo $NewRistrationNo; ?>">-->
		To be allotted</font></td>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Password</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">







		<!--<input name="txtPassword" id="txtPassword" type="text" class="auto-style33" style="width: 147; height:25" value="<?php echo $NewRistrationNo; ?>">--> To be 
		allotted
		</font></td>



				<td style="width: 221px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Email</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 222px" class="auto-style11">







		<font face="Cambria">







		<input name="txtEmail" id="txtEmail" type="text" class="auto-style33" style="width: 206px; height:25" value="<?php echo $Email;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style49" colspan="5" style="height: 10px; background-color:#95C23D">







				<font face="Cambria">







				<strong>Admission Fees Details:</strong></font></td>



				<td style="width: 222px; height: 10px; background-color:#95C23D" class="auto-style48">







				</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 222px" class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Admission fees Amount</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtAdmissionFees" id="txtAdmissionFees" type="text" class="auto-style33" style="width: 138px" readonly="readonly"></font></td>



				<td style="width: 221px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







				<font face="Cambria">Annual Fees Amount</font></td>



				<td class="auto-style11" colspan="2">







		<font face="Cambria">







		<input name="txtSecurityFeesAmount" id="txtSecurityFeesAmount" type="text" class="auto-style33" style="width: 93px" readonly="readonly"></font></td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td class="auto-style19">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19" style="height: 18px">







				<font face="Cambria">Admission. Fee Disc. Type</font></td>



				<td class="auto-style19" style="height: 18px">







				<font face="Cambria">







				<select name="cboAdmissionDiscountType" id="cboAdmissionDiscountType" onchange="Javascript:fnlGetAdmissionFeeDiscount();">

				<option selected="" value="Select One">Select One</option>
				
				<?php
				while($row = mysql_fetch_row($rsAdmissionFeeDiscount))
				{
				?>
				<option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
				
				</select></font></td>

				<td style="width: 221px; height: 18px" class="auto-style11">
				&nbsp;</td>



				<td style="width: 221px; height: 18px" class="auto-style39">







				<font face="Cambria">Annual Fees Disc. Type</font></td>



				<td class="auto-style11" colspan="2" style="height: 18px">







				<font face="Cambria">







				<select name="cboAnnualFeeDiscountType" id="cboAnnualFeeDiscountType" onchange="Javascript:GetAnnualFeeDiscount();">

				<option selected="" value="Select One">Select One</option>
				
				<?php
				while($row = mysql_fetch_row($rsAnnualFeeDiscount))
				{
				?>
				<option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
				<!--
				<option value="sports quota - state level">sports quota - state level

				</option>

				<option value="sports quota - national level">sports quota - national level

				</option>

				<option value="EWS">EWS</option>

				<option value="BPL">BPL</option>
				-->
				</select></font></td>



			</tr>



			<tr>



				<td class="auto-style19" style="height: 18px">







				&nbsp;</td>



				<td class="auto-style19" style="height: 18px">







				&nbsp;</td>



				<td style="width: 221px; height: 18px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 221px; height: 18px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2" style="height: 18px">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Admission. Fee Discount</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtAdmissionFeesDiscount" id="txtAdmissionFeesDiscount" type="text" class="auto-style33" style="width: 138px" readonly="readonly" onkeyup="CalculateTotalDiscount();CalculatTotal();" ></font></td>
		



				<td style="width: 221px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







				<font face="Cambria">Annual Fee Discount</font></td>



				<td class="auto-style11" colspan="2">







				<font face="Cambria">







				<input name="txtAnnualFeeDiscount" id="txtAnnualFeeDiscount" type="text" readonly="readonly" onkeyup="CalculateTotalDiscount();CalculatTotal();"></font></td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Total Discount</font></td>



				<td style="width: 221px" class="auto-style11">







		<font face="Cambria">







		<input name="txtTotalDiscount" id="txtTotalDiscount" type="text" readonly="readonly"></font></td>

				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				Total Fee Payable</td>



				<td style="width: 221px" class="auto-style11">







				<input name="txtTotal" id="txtTotal" type="text" readonly="readonly"></td>

				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







				Total Fee Paid</td>



				<td class="auto-style40">







				<input name="txtTotalAmtPaying" id="txtTotalAmtPaying" type="text" onkeyup="Javascript:CalculateBalance();"></td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				Balance</td>



				<td style="width: 221px" class="auto-style11">







				<input name="txtBalance" id="txtBalance" type="text" readonly="readonly"></td>

				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				Mode of Payment</td>



				<td style="width: 221px" class="auto-style11">







		<select name="cboPaymentMode" id="cboPaymentMode" style="width: 127px" class="auto-style38" onchange="Javascript:ChkPaymentMode();">

		<option selected="" value="Cash">Cash</option>

		<option value="Cheque">Cheque</option>

		<option value="Demand Draft">Demand Draft</option>

		</select></td>

				<td style="width: 221px" class="auto-style11">







				<span class="auto-style25">Cheque or DD#</span></td>



				<td style="width: 221px" class="auto-style39">







		<strong>



		<input name="txtChequeNo" id="txtChequeNo" type="text" class="auto-style17" style="width: 106px" readonly="readonly"></strong></td>



				<td class="auto-style40">







				Bank Name</td>



				<td class="auto-style11">
				<!--<input name="txtBankName" id="txtBankName" type="text" readonly="readonly">-->
				<select name="cboBank" id="cboBank" disabled="true">
		<option value="" selected="selected" >Select One</option>
		<?php
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select></td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 221px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 221px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="style16" colspan="6">







		<font size="2">







		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="auto-style32" style="width: 73px; font-weight:700"></font></td>



			</tr>
			</form>
</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>

</html>


