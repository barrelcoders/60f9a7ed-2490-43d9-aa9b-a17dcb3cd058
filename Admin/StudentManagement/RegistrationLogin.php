<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
	
<?php

session_start();

if($_REQUEST["txtUserId"] !="")
{
	$UserId=$_REQUEST["txtUserId"];
	$Pwd=$_REQUEST["txtPwd"];
	$rsUser=mysql_query("select `Password4AdmissionFee` from `NewStudentRegistration` where `RegistrationNo`='$UserId'");
	if (mysql_num_rows($rsUser) > 0)
	{
		while($rowU = mysql_fetch_row($rsUser))
		{
			$DatabasePwd=$rowU[0];
			break;
		}
		if($DatabasePwd !=$Pwd)
		{
			$msg="User Id / Password does not match, Please try again!";
		}
		else
		{
			//header("Location: StudentAdmission.php?RegNo=$UserId");
			$_SESSION['userid']=$UserId;
			echo "<script type='text/javascript'>window.location.href = 'StudentAdmission.php?RegNo=".$UserId."';</script>";
			exit(0);
		}
	}
	else
	{
		$msg="User Id / Password does not match, Please try again!";
	}
}

?>







<script language="javascript">
function Validate()
{

	if (document.getElementById("txtUserId").value == "")
	{
		alert ("User Id is mandatory!");
		return;
	}
	if(document.getElementById("txtPwd").value=="")
	{
		alert("Password is mandatory!");
		return;
	}
	
	document.getElementById("frmUser").submit();

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



			var submiturl="GetFeeDiscount.php?discounttype=" + document.getElementById("cboAnnualFeeDiscountType").value + "&financialyear=" + document.getElementById("cboFinancialYear").value + "&discountreason=annualfees";

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);



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



			var submiturl="GetFeeDiscount.php?discounttype=" + document.getElementById("cboAdmissionDiscountType").value + "&financialyear=" + document.getElementById("cboFinancialYear").value + "&discountreason=admissionfees";

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);

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
						document.getElementById("txtTotal").value=arr_row[4];
			        	//document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						//CalculatTotal();
						//alert(rows);														

			        }

		      }



			var submiturl="../Fees/GetAdmissionFeeDetail.php?Class=" + document.getElementById("cboClass").value + "&financialyear=" + document.getElementById("cboFinancialYear").value;

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

function CalculateAgeInQC() 
{
    
        now = new Date();
        var txtValue = document.getElementById("txtDOB").value;
        if (txtValue != null)
            dob = txtValue.split('/');
        if (dob.length === 3) {
            born = new Date(dob[2], dob[1] * 1 , dob[0]);
            age = now.getTime() - (born.getTime()) / (365.25 * 24 * 60 * 60 * 1000);
            alert(" now.getTime  " + now.getTime());
            alert(" born.getTime  " + born.getTime());
            age = Math.floor((now.getTime() - born.getTime()) / (365.25 * 24 * 60 * 60 * 1000));
            if (isNaN(age) || age < 0) {
                // alert('Input date is incorrect!');
            }
            else 
            {
                document.getElementById("txtAge").value = age;
                document.getElementById("txtAge").focus();
            }
        }    
}
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







<title>Student Registration</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
		<script type="text/javascript" src="../tcal.js"></script>



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







.footer {

    height:40px; 
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

        height:40px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
         font-color:yellow;

}



.style15 {
	border-left-style: none;
	border-left-width: medium;
	text-align: left;
}



</style>







</head>















<body>





<div align="center">





<table width="100%">
<tr>
<td>
<h3 align="center"><b><font face="Cambria">
<img src="<?php echo $SchoolLogo; ?>" height="80" width="371"></font></b><font face="Cambria">
</font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b><?php echo $SchoolAddress; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b> </font>
</td>
</tr>
</table>

</div>

	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">

		<tr>



		<td style="height: 39px" class="style15">


		<p style="text-align: center"><strong><u>
		<font face="Cambria" style="font-size: 12pt">ADMISSION FORM ( SESSION 
		2016 - 17 )</font></u></strong></td>

	</tr>
	
	</table>
	<form name="frmUser" id="frmUser" method="post" action="StudentAdmission.php">
	<div align="center">
					     <table width="30%" style="border-collapse: collapse; border-width: 1px" cellpadding="0" bordercolorlight="#008000">
					     <tr>
							<td style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
							<td style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">
							&nbsp;</td></tr>
					     
					     <tr>
							<td style="border-left-style: solid; border-left-width: 1px; border-top-style: none; border-top-width: medium">
							<p align="left"><font face="Cambria"><b>&nbsp;&nbsp; Registration No.</b></font></td>
							<td style="border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium">
							<font face="Cambria"><input type=text name="txtUserId" id="txtUserId" value="" class="text-box"></font></td></tr>
					     
					     <tr>
							<td style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
							<td style="border-right-style: solid; border-right-width: 1px">&nbsp;</td></tr>
					  
					     <tr>
							<td style="border-left-style: solid; border-left-width: 1px">
							<p align="left"><font face="Cambria"><b>&nbsp;&nbsp; Password :</b></font></td>
							<td style="border-right-style: solid; border-right-width: 1px; border-bottom-style: none; border-bottom-width: medium">
							<font face="Cambria"><input type=text name="txtPwd" id="txtPwd" value="" class="text-box"></font></td></tr>
					  
					     <tr>
							<td align=center colspan=2 style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
							&nbsp;</td></tr>
					  
					     <tr>
							<td align=center colspan=2 style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: none; border-bottom-width: medium">
							<font face="Cambria">
							<input type=button name="btnSubmit" value="Submit " style="font-weight: 700" onclick="javascript:Validate();"></font></td></tr>
				
					 
							</div>
				
					 
					</td>
		</tr>
	
					     <tr>
							<td align=center colspan=2 style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px">
							&nbsp;</td></tr>
				
					 
							</table>

	<p align="left"><b><font face="Cambria">Please keep following documents 
	ready in scanned form before proceeding:</font></b></p>
	<p align="left"><i><font face="Cambria">&nbsp;&nbsp;&nbsp; - Father's 
	Photograph</font></i></p>
	<p align="left"><i><font face="Cambria">&nbsp;&nbsp;&nbsp; - Mother's 
	Photograph</font></i></p>
	<p align="left"><i><font face="Cambria">&nbsp;&nbsp;&nbsp; - Scanned copy of 
	Address Proof</font></i></p>
	<p align="left"><i><font face="Cambria">&nbsp;&nbsp;&nbsp; - Scanned copy of 
	Residential proof</font></i></div>

	</form>


<font face="Cambria">


</table>



</font>



<div class="footer" align="center">

    <div class="footer_contents" align="center" style="width: 1327px; height: 23px">

		<font color="#FFFF66" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>




</body>
</html>