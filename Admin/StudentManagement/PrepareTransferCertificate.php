<?php 

session_start();

include '../../connection.php';

include '../Header/Header3.php';
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



	if (document.getElementById("txtAdmission").value=="")



	{



		alert("Admission is mandatory");



		return;



	}



	if (document.getElementById("txtRollNo").value=="")



	{



		alert("Roll No is mandatory");



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



	document.getElementById("frmNewStudent").submit();



	



}






<html>







<head>



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Student Transfer Certificate</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">


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



.auto-style47 {
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	background-color: #FFFFFF;
}
.auto-style49 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	background-color: #FFFFFF;
}



.style13 {
	border-style: none;
	border-width: medium;
	font-size: 12pt;
	font-family: Calibri;
	text-align: right;
}



.auto-style50 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-align: center;
}
.auto-style51 {
	border-style: none;
	border-width: medium;
	color: #000000;
	font-weight: normal;
	font-size: 12pt;
	font-family: Calibri;
}
.auto-style52 {
	text-align: center;
}



</style>



</head>







<body>



<p>&nbsp;</p>



<table cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style7" style="width: 100%">



	



	

	<tr>

		<td class="auto-style30">

<p class="auto-style5" style="height: 12px"><font face="Cambria"><b>Issue Transfer Certificate</b></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<font face="Cambria">
<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

		</table>





	

	

	

	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">

	<form name="frmNewStudent" id="frmNewStudent" method="post" action="AdmissionFeeReceipt.php" enctype="multipart/form-data">

	<tr>



		<td style="height: 11px;" class="auto-style35">
		<font face="Cambria">
		<?php echo $Message1; ?></font></td>

	</tr>

	

		

	<tr>

	

	

	

		<td style="height: 10;" class="auto-style47">



		<font face="Cambria">



		<strong>Student Details:</strong></font></td>



		<font face="Cambria">



		<br class="auto-style31">

		

		<br class="auto-style31">

		</font>

		</tr>

		

		

		<tr>

		<td style="height: 29px;" class="auto-style23">



		<table style="width: 100%" class="auto-style1">

			<tr>

				<td class="auto-style11" colspan="2">



		<span class="auto-style25"><strong style="font-weight: 400">
		<font face="Cambria">Enter Admission No</font></strong></span><font face="Cambria"><span style="color: #000000" class="auto-style33">:</span><span style="font-weight: 700; color: #000000" class="auto-style33">&nbsp; </span>







		</font><font face="Cambria">







		<input type="text" name="txtAdmission" id="txtAdmission" size="15" style="color: #CC0033; width: 108px;" class="auto-style33"></font></td>

				<td style="width: 39px" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26">
				<button name="Abutton1"><font face="Cambria">Fill Details</button>
				</font></td>

				<td style="width: 74px" class="auto-style26">
				&nbsp;</td>

				<td style="width: 263px" class="style13">
				&nbsp;</td>

				<td style="width: 263px" class="auto-style26">
				&nbsp;</td>

				<td style="width: 223px" class="auto-style19">
				<font face="Cambria">Date</font></td>

				<td style="width: 159px" class="auto-style26">
				<font face="Cambria">
				<input name="txtDate" id="txtDate" class="tcal" style="width: 108px" type="text"></font></td>

			</tr>

			<tr>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

				<td style="width: 39px" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26">
				&nbsp;</td>

				<td style="width: 74px" class="auto-style26">
				&nbsp;</td>

				<td style="width: 263px" class="style13">
				&nbsp;</td>

				<td style="width: 263px" class="auto-style26">
				&nbsp;</td>

				<td style="width: 223px" class="auto-style19">&nbsp;</td>

				<td style="width: 159px" class="auto-style26">
				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

				<td style="width: 39px" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26">&nbsp;</td>

				<td style="width: 74px" class="auto-style26">&nbsp;</td>

				<td style="width: 263px" class="auto-style26" colspan="2">&nbsp;</td>

				<td style="width: 223px" class="auto-style26">&nbsp;</td>

				<td style="width: 159px" class="auto-style26">&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



		<span class="auto-style21"><font face="Cambria">Student Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span><span class="auto-style18"><font face="Cambria">
		</font>
				</span>



				</td>

				<td style="width: 222px" class="auto-style11">



		<font face="Cambria">



		<input name="txtName" id="txtName" type="text" class="auto-style33" style="width: 119px"></font></td>

				<td style="width: 39px" class="auto-style11">



				<span class="auto-style31"><font size="3" face="Cambria">
				&nbsp;</font></span></td>

				<td style="width: 159px" class="auto-style11">



		<span class="auto-style21"><font face="Cambria">Nationality</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span><span class="auto-style18"><font face="Cambria">
		</font>
				</span>



				</td>

				<td style="width: 74px" class="auto-style11">



		<font face="Cambria">



		<input name="txtNationality" id="txtNationality" type="text" class="auto-style25" value="Indian" style="width: 153px"></font></td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

				<td class="auto-style50" colspan="2">



				<font face="Cambria">Photograph&nbsp;</font></td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 222px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 39px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 74px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

				<td class="auto-style19" colspan="2" rowspan="6">



				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



		<span class="auto-style25"><font face="Cambria">Date Of Birth</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>

				<td style="width: 222px" class="auto-style11">



		<font face="Cambria">



		<input name="txtDOB" id="txtDOB" type="text" class="tcal" style="width: 117px"></font></td>

				<td style="width: 39px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style19">



		<font face="Cambria">Class:</font></td>

				<td style="width: 74px" class="auto-style11">



		<font face="Cambria">



		<input name="txtClass" id="txtDOB0" type="text" class="tcal" style="width: 117px"></font></td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 222px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 39px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style19">



				&nbsp;</td>

				<td style="width: 74px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style19">



				<font face="Cambria">Category</font></td>

				<td style="width: 222px" class="auto-style11">



		<font face="Cambria">



		<input name="txtCCategory" id="txtDOB1" type="text" class="tcal" style="width: 117px"></font></td>

				<td style="width: 39px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style19">



		<span class="auto-style25"><font face="Cambria">Roll No.</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>

				<td style="width: 74px" class="auto-style11">



		<font face="Cambria">



		<input name="txtRollNo" id="txtRollNo" type="text" class="auto-style33" style="width: 110px"></font></td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 222px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 39px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style19">



				&nbsp;</td>

				<td style="width: 74px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



				<span style="color: #000000" class="auto-style33">
				<font face="Cambria">Gender:</font></span><span class="auto-style31"><font size="3" face="Cambria"> </font>



				</span>



				</td>

				<td style="width: 222px" class="auto-style11">



		<font face="Cambria">



		<input name="txtSex" id="txtSex" type="text" class="auto-style33" style="width: 118px"></font></td>

				<td style="width: 39px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style19">



				&nbsp;</td>

				<td style="width: 74px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 222px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 39px" class="auto-style19">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 74px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 263px" class="auto-style11" colspan="2">



				&nbsp;</td>

				<td style="width: 223px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 159px" class="auto-style11">



				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 158px" class="auto-style11">



		<span class="auto-style25"><font face="Cambria">Address </font> </span>
				<span style="color: #000000" class="auto-style33">

				<font face="Cambria">:</font></span></td>

				<td class="auto-style11" colspan="8">







		<font face="Cambria">







		<input name="txtAddress" id="txtAddress" type="text" class="auto-style33" style="height: 57px; width: 687px"></font></td>

			</tr>

		</table>



		</td>



			</tr>

		

		<tr>

		



		<td class="auto-style33">



		&nbsp;</td>



			</tr>

		

		<tr>

		



		<td style="height: 10;" class="auto-style47">



		<font face="Cambria">Guardian Details:</font></td>



			</tr>

			

			

		

			<tr>

			

			

		



		<td style="height: 46px;" class="auto-style23">



		<table style="width: 100%" class="auto-style1">

			<tr>

				<td style="width: 157px" class="auto-style11">



		<span class="auto-style21"><font face="Cambria">Father's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>

				<td style="width: 78px" class="auto-style11">







		<font face="Cambria">







		<input name="txtFatherName" id="txtFatherName" type="text" class="auto-style25" style="width: 150px"></font></td>

				<td style="width: 157px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 43px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 158px" class="auto-style11">







				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 157px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 78px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 43px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 158px" class="auto-style11">







				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 157px" class="auto-style11">



		<span class="auto-style21"><font face="Cambria">Mother's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>

				<td style="width: 78px" class="auto-style11">







		<font face="Cambria">







		<input name="txtMotherName" id="txtMotherName" type="text" class="auto-style33" style="width: 150px"></font></td>

				<td class="auto-style11" colspan="4">



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

		



		<td style="height: 10;" class="auto-style47">



		<font face="Cambria">Conduct and behavior Details:</font></td>



			</tr>

		

		<tr>



		<td style="height: 29px;" class="auto-style23">



		<table style="width: 100%" class="auto-style1">

			<tr>

				<td style="width: 11%" class="auto-style51">



				<font face="Cambria">General Character</font></td>

				<td style="width: 11%" class="auto-style11">



		<font face="Cambria">



		<input name="txtMobile" id="txtMobile" type="text" class="auto-style33" style="width: 143px"></font></td>

				<td style="width: 5%" class="auto-style11">



				<span class="auto-style25"><font face="Cambria">&nbsp;Hobbies</font></span><font face="Cambria">&nbsp;</font></td>

				<td style="width: 12%" class="auto-style11">



		<font face="Cambria">



		<input name="txtAltMobile" id="txtAltMobile" type="text" style="width: 122px; height: 48px"></font></td>

				<td class="auto-style19" width="44%">



				<font face="Cambria">Awards won:</font></td>

				<td style="width: 14%" class="auto-style26">



		<font face="Cambria">



		<input name="txtImei" id="txtImei" type="text" class="auto-style33" style="width: 179px; height: 50px;"></font></td>

			</tr>

			<tr>

				<td style="width: 11%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 11%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 5%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 12%" class="auto-style11">



				&nbsp;</td>

				<td class="auto-style26" width="44%">&nbsp;</td>

				<td style="width: 14%" class="auto-style26">&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 11%" class="auto-style51">



				<font face="Cambria">Reason for Leaving School</font></td>

				<td class="auto-style11" colspan="5">







		<font face="Cambria">







		<input name="txtReasonForLeavingSchool" id="txtUserId" type="text" class="auto-style33" style="width: 623px; height: 60px;"></font></td>

			</tr>

			<tr>

				<td style="width: 11%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 11%" class="auto-style11">







				&nbsp;</td>

				<td style="width: 5%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 12%" class="auto-style11">



				&nbsp;</td>

				<td class="auto-style11" width="44%">



				&nbsp;</td>

				<td style="width: 14%" class="auto-style11">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style49" colspan="6" style="height: 9px">



				<font face="Cambria">Other Details <strong>:</strong></font></td>

			</tr>

			<tr>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

				<td style="width: 5%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 12%" class="auto-style11">



				&nbsp;</td>

				<td class="auto-style11" width="44%">



				&nbsp;</td>

				<td style="width: 14%" class="auto-style11">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				<font face="Cambria">Last Fees Paid</font></td>

				<td class="auto-style19" style="width: 11%">







		<font face="Cambria">







		<input name="txtLastFees" id="txtAdmissionFees" type="text" class="auto-style33" style="width: 138px"></font></td>

				<td style="width: 5%" class="auto-style11">







				&nbsp;</td>

				<td class="auto-style39" colspan="2">



				<font face="Cambria">Qualified for Promotion to next class</font></td>

				<td class="auto-style11">



				<font face="Cambria">



				<select name="Select1" style="width: 67px">
				<option selected="">Yes</option>
				<option>No</option>
				</select></font></td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				&nbsp;</td>

				<td class="auto-style19" style="width: 11%">







				&nbsp;</td>

				<td style="width: 5%" class="auto-style11">







				&nbsp;</td>

				<td style="width: 12%" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				<font face="Cambria">Board</font></td>

				<td class="auto-style19" style="width: 11%">







		<font face="Cambria">







		<input name="txtBoard" id="txtAdmissionFeesDiscount0" type="text" class="auto-style33" style="width: 138px"></font></td>

				<td style="width: 5%" class="auto-style11">







				&nbsp;</td>

				<td style="width: 12%" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				<font face="Cambria">Last Exam Given</font></td>

				<td class="auto-style19" style="width: 11%">







		<font face="Cambria">







		<input name="txtLastExam" id="txtAdmissionFeesDiscount" type="text" class="auto-style33" style="width: 138px"></font></td>

				<td style="width: 5%" class="auto-style11">







				&nbsp;</td>

				<td style="width: 12%" class="auto-style39">



				<font face="Cambria">Subjects Studied</font></td>

				<td class="auto-style11" colspan="2">



				<span class="auto-style25"><font face="Cambria">1.</font></span><font face="Cambria"><br class="auto-style25">
				</font>
				<span class="auto-style25"><font face="Cambria">2.</font></span><font face="Cambria"><br class="auto-style25">
				</font>
				<span class="auto-style25"><font face="Cambria">3.</font></span><font face="Cambria"><br class="auto-style25">
				</font>
				<span class="auto-style25"><font face="Cambria">4.</font></span><font face="Cambria"><br class="auto-style25">
				</font>
				<span class="auto-style25"><font face="Cambria">5.</font></span><font face="Cambria"><br class="auto-style25">
				</font>
				<span class="auto-style25"><font face="Cambria">6.</font></span><font face="Cambria"><br class="auto-style25">
				</font>
				<span class="auto-style25"><font face="Cambria">7.<br>8.</font></span></td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				&nbsp;</td>

				<td class="auto-style19" style="width: 11%">







				&nbsp;</td>

				<td style="width: 5%" class="auto-style11">







				&nbsp;</td>

				<td style="width: 12%" class="auto-style39">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				<font face="Cambria">Grade Obtained</font></td>

				<td style="width: 11%" class="auto-style11">



		<strong>

		<font face="Cambria">

		<input name="txtGrade" id="txtChequeNo" type="text" class="auto-style17" style="width: 139px"></font></strong></td>
				<td style="width: 5%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 12%" class="auto-style39">



				&nbsp;</td>

				<td class="auto-style40" width="44%">



				&nbsp;</td>

				<td class="auto-style11">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				&nbsp;</td>

				<td style="width: 11%" class="auto-style11">



				&nbsp;</td>
				<td style="width: 5%" class="auto-style11">



				&nbsp;</td>

				<td style="width: 12%" class="auto-style39">



				&nbsp;</td>

				<td class="auto-style40" width="44%">



				&nbsp;</td>

				<td class="auto-style11">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19" style="width: 11%">



				<font face="Cambria">Remarks</font></td>

				<td class="auto-style11" colspan="5">







		<font face="Cambria">







		<input name="txtRemarks" id="txtUserId0" type="text" class="auto-style33" style="width: 626px; height: 60px;"></font></td>

			</tr>

		</table>

		</td>

		

		</tr>

		

		<tr>

		

		

		<td class="auto-style52" style="height: 19px">



		<font face="Cambria">



		<input name="BtnGenerate" type="button" value="Generate" onclick="Validate();" class="auto-style32" style="width: 73px"><br class="auto-style31">

		</font>

</td>



</tr>

<tr>

		<td style="width: 158px; height: 29px;" class="style7">



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