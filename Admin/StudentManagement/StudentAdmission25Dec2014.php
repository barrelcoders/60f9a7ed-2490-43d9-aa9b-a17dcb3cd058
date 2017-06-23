<?php
session_start();
include '../Header/Header3.php';
include '../../connection.php';
?>



<?php
	
	if ($_REQUEST["txtRegistrationId"] != "")
	{
		$RegistrationNo	= $_REQUEST["txtRegistrationId"];
		
		$ssql="select `FinancialYear`,`quarter`,`sname`,`DOB`,`PlaceOfBirth`,`Age`,`Nationality`,`sclass`,`Category`,`MotherTongue`,`Nationality`,`ResidentialAddress`,`PermanentAddress`,`PhoneNo`,`smobile`,`sclass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`GeneralInformation`,`ContributionArea`,`StudentWeeknessStrength`,`SpecialAttentionDetail`,`StudetnPreviousHistory`,`RealBroSisName`,`RealBroSisSchool`,`RealBroSisClass`,`RegistrationFormNo`,`Sex` from `NewStudentRegistration` where `RegistrationNo`='$RegistrationNo'";
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
		}
	}

$ssqlClass="SELECT distinct `class` FROM `class_master`";

$rsClass= mysql_query($ssqlClass);

$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";

$rsFY= mysql_query($ssqlFY);

	$ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";

	$rsRoute= mysql_query($ssqlRoute);

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

$ssqlDiscount="SELECT distinct `head` FROM `discounttable` where `discounttype`='tuitionfees'";
$rsDiscount= mysql_query($ssqlDiscount);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='admissionfees'";
$rsAdmissionFeeDiscount= mysql_query($sstr);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='annualcharges'";
$rsAnnualFeeDiscount= mysql_query($sstr);

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
	
?>

<script language="javascript">



function Validate()
{

	if (document.getElementById("txtAdmission").value != document.getElementById("txtUserId").value)
	{
		alert ("Admission ,User Id and Password should be same! Please check");
		return;
	}
	
	if (document.getElementById("txtAdmission").value != document.getElementById("txtPassword").value)
	{
		alert ("Admission ,User Id and Password should be same! Please check");
		return;
	}

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
	if (document.getElementById("txtAdmission").value=="")
	{
		alert("Admission is mandatory");
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



	if (document.getElementById("cboPaymentMode").value == "Cash")

	{

		document.getElementById("txtBankName").value="";

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
		document.getElementById("txtBankName").readOnly = true;

		document.getElementById("txtChequeNo").readOnly = true;

	}
	else
	{
		document.getElementById("txtBankName").value="";

		document.getElementById("txtChequeNo").value="";

		document.getElementById("txtBankName").readOnly = false;

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





			</tr>



			<tr>



				<td style="width: 157px" class="auto-style11">







		<font face="Cambria">Father's Company:</font></td>



				<td style="width: 78px" class="auto-style11">














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



				<td style="width: 157px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 78px" class="auto-style11">














		&nbsp;</td>



				<td class="auto-style11" colspan="4">







		&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Official Ph. no</font></span></td>



				<td style="width: 78px" class="auto-style11">














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



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				<font face="Cambria">Father's Annual Income:</font></td>



				<td style="width: 78px" class="auto-style26">















				<font face="Cambria">















<input name="txtFatherAnnualIncome" id="txtFatherAnnualIncome" type="text" value="<?php echo $FatherAnnualIncome;?>"></font></td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				<font face="Cambria">Mother's Annual Income:</font></td>



				<td style="width: 158px" class="auto-style26">







				<font face="Cambria">















<input name="txtMotherAnnualIncome" id="txtMotherAnnualIncome" type="text" value="<?php echo $MontherAnnualIncome;?>"></font></td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







<span class="auto-style25"><font face="Cambria">Father's Office Address:</font></span></td>



				<td style="width: 78px" class="auto-style26">















				<font face="Cambria">















<textarea name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" cols="20" rows="2"><?php echo $FatherOfficeAddress;?></textarea></font></td>



				<td class="auto-style26" colspan="2">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				<font face="Cambria">Mother's Office Address:</font></td>



				<td style="width: 158px" class="auto-style26">







				<font face="Cambria">















<textarea name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" cols="20" rows="2"><?php echo $MotherOfficeAddress;?></textarea></font></td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				General Information:</td>



				<td style="width: 78px" class="auto-style26">















<textarea name="txtGeneralInformation" id="txtGeneralInformation" rows="2" style="width: 260px" cols="20"><?php echo $GeneralInformation;?></textarea></td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				Contribution Area</td>



				<td style="width: 158px" class="auto-style26">















<textarea name="txtContributionArea" id="txtContributionArea" cols="20" rows="2"><?php echo $ContributionArea;?></textarea></td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







<span class="auto-style21">Student Weakness / Strength:</span></td>



				<td style="width: 78px" class="auto-style26">















<textarea name="txtStudentWeaknessStrength" id="txtStudentWeaknessStrength" rows="2" style="width: 260px" cols="20"><?php echo $StudentWeeknessStrength;?></textarea></td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







<span class="auto-style21">Special Attention Detail:</span></td>



				<td style="width: 158px" class="auto-style26">















<textarea name="txtStudentSpecialAttentionDetail" id="txtStudentSpecialAttentionDetail" cols="20" rows="2"><?php echo $SpecialAttentionDetail;?></textarea></td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







<span class="auto-style21">Student Previous History:</span></td>



				<td style="width: 78px" class="auto-style26">















<textarea name="txtStudentPreviousDetail" id="txtStudentPreviousDetail" rows="2" style="width: 260px" cols="20"><?php echo $StudetnPreviousHistory;?></textarea></td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







<span class="auto-style21">Real Brother / Sister Name:</span></td>



				<td style="width: 158px" class="auto-style26">















<input name="txtRealBroSisName" id="txtRealBroSisName" type="text" value="<?php echo $RealBroSisName;?>"></td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







<span class="auto-style21">Real Brother / Sister School:</span></td>



				<td style="width: 78px" class="auto-style26">















<input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" type="text" value="<?php echo $RealBroSisSchool;?>"></td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







<span class="auto-style21">Real Brother / Sister Class:</span></td>



				<td style="width: 158px" class="auto-style26">















<input name="txtRealBroSisClass" id="txtRealBroSisClass" type="text" value="<?php echo $RealBroSisClass;?>"></td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 78px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 43px" class="auto-style26">















				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style26">







				&nbsp;</td>



			</tr>



		</table>



		</td>



</tr>	







<tr>			



		







		<td style="height: 10;" class="auto-style47" colspan="8">







		<font face="Cambria">







		<strong>Contact Details:</strong></font></td>







			</tr>



		



		<tr>







		<td style="height: 29px;" colspan="8" class="auto-style23">







		<table style="width: 100%" class="style14">



			<tr>



				<td style="width: 62px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mobile</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 63px" class="auto-style11">







		<font face="Cambria">







		<input name="txtMobile" id="txtMobile" type="text" class="auto-style33" style="width: 143px" value="<?php echo $smobile;?>"></font></td>



				<td style="width: 134px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Alternate Mobile:</font></span></td>



				<td style="width: 157px" class="auto-style11">







		<font face="Cambria">







		<input name="txtAltMobile" id="txtAltMobile" type="text"></font></td>



				<td style="width: 29px" class="auto-style26">







		<span class="auto-style25"><font face="Cambria">Mobile IMEI</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 158px" class="auto-style26">







		<font face="Cambria">







		<input name="txtImei" id="txtImei" type="text" class="auto-style33" style="width: 131px"></font></td>



			</tr>



			<tr>



				<td style="width: 62px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 63px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 29px" class="auto-style26">&nbsp;</td>



				<td style="width: 158px" class="auto-style26">&nbsp;</td>



			</tr>



			<tr>



				<td style="width: 62px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">User Id</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 63px" class="auto-style11">















		<font face="Cambria">















		<input name="txtUserId" id="txtUserId" type="text" class="auto-style33" style="width: 141px" value="<?php echo $NewRistrationNo; ?>"></font></td>



				<td style="width: 134px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Password</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 157px" class="auto-style11">







		<font face="Cambria">







		<input name="txtPassword" id="txtPassword" type="text" class="auto-style33" style="width: 132px" value="<?php echo $NewRistrationNo; ?>"></font></td>



				<td style="width: 29px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Email</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 158px" class="auto-style11">







		<font face="Cambria">







		<input name="txtEmail" id="txtEmail" type="text" class="auto-style33" style="width: 154px"></font></td>



			</tr>



			<tr>



				<td style="width: 62px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 63px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 29px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style49" colspan="5" style="height: 10px">







				<font face="Cambria">







				<strong>Admission Fees Details:</strong></font></td>



				<td style="width: 158px; height: 10px;" class="auto-style48">







				</td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 29px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Admission fees Amount</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtAdmissionFees" id="txtAdmissionFees" type="text" class="auto-style33" style="width: 138px"></font></td>



				<td style="width: 134px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







				<font face="Cambria">Annual Fees Amount</font></td>



				<td class="auto-style11" colspan="2">







		<font face="Cambria">







		<input name="txtSecurityFeesAmount" id="txtSecurityFeesAmount" type="text" class="auto-style33" style="width: 93px"></font></td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td class="auto-style19">















				&nbsp;</td>



				<td style="width: 134px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style36">







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

				<td style="width: 134px; height: 18px;" class="auto-style11">
				&nbsp;</td>



				<td style="width: 157px; height: 18px;" class="auto-style39">







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



				<td style="width: 134px; height: 18px;" class="auto-style11">















				&nbsp;</td>



				<td style="width: 157px; height: 18px;" class="auto-style36">







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
		



				<td style="width: 134px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







				<font face="Cambria">Annual Fee Discount</font></td>



				<td class="auto-style11" colspan="2">







				<font face="Cambria">







				<input name="txtAnnualFeeDiscount" id="txtAnnualFeeDiscount" type="text" readonly="readonly" onkeyup="CalculateTotalDiscount();CalculatTotal();"></font></td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 63px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Total Discount</font></td>



				<td style="width: 63px" class="auto-style11">







		<font face="Cambria">







		<input name="txtTotalDiscount" id="txtTotalDiscount" type="text" readonly="readonly"></font></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 63px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				Total Fee Payable</td>



				<td style="width: 63px" class="auto-style11">







				<input name="txtTotal" id="txtTotal" type="text" readonly="readonly"></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







				Total Fee Paid</td>



				<td class="auto-style40">







				<input name="txtTotalAmtPaying" id="txtTotalAmtPaying" type="text" onkeyup="Javascript:CalculateBalance();"></td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 63px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				Balance</td>



				<td style="width: 63px" class="auto-style11">







				<input name="txtBalance" id="txtBalance" type="text" readonly="readonly"></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 63px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				Mode of Payment</td>



				<td style="width: 63px" class="auto-style11">







		<select name="cboPaymentMode" id="cboPaymentMode" style="width: 127px" class="auto-style38" onchange="Javascript:ChkPaymentMode();">

		<option selected="" value="Cash">Cash</option>

		<option value="Cheque">Cheque</option>

		<option value="Demand Draft">Demand Draft</option>

		</select></td>

				<td style="width: 134px" class="auto-style11">







				<span class="auto-style25">Cheque or DD#</span></td>



				<td style="width: 157px" class="auto-style39">







		<strong>



		<input name="txtChequeNo" id="txtChequeNo" type="text" class="auto-style17" style="width: 106px" readonly="readonly"></strong></td>



				<td class="auto-style40">







				Bank Name</td>



				<td class="auto-style11">







				<input name="txtBankName" id="txtBankName" type="text" readonly="readonly"></td>



			</tr>



			<tr>



				<td class="auto-style19">







				&nbsp;</td>



				<td style="width: 63px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="style16">







		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="auto-style32" style="width: 73px"></td>



				<td style="width: 63px" class="auto-style11">







		&nbsp;</td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 157px" class="auto-style39">







		&nbsp;</td>



				<td class="auto-style40">







				&nbsp;</td>



				<td class="auto-style11">




&nbsp;</td>



			</tr>
			</form>
</table>



<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>

</body>
</html>



