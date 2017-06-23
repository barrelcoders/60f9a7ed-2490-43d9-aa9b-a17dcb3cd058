<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
session_start();
$class=$_SESSION['StudentClass'];
$sadmission=$_SESSION['userid'];

	if($sadmission== "")
	{
		echo "<br><br><center><b>You are not logged-in!<br>Please click <a href='http://dpsfsis.com/'>here</a> to login into parent portal!";
		exit();
	}

$rsChk=mysql_query("select * from `StudentMasterInfo` where `sadmission`='$sadmission'");
if(mysql_num_rows($rsChk)>0)
{
	echo "<br><br><center><b>Already Submitted!";
	exit();
}
//$sadmission="10328";
$rsStudentDetail=mysql_query("select `sname`,`DOB`,`PlaceOfBirth`,`Sex`,`sclass`,`LastSchool`,`Address`,`Hostel`,`sfathername`,`FatherEducation`,`FatherOccupation`,`smobile`,`email`,`MotherName`,`MotherEducation` from `student_master` where `sadmission`='$sadmission'");
while($rowS=mysql_fetch_row($rsStudentDetail))
{
	$sname=$rowS[0];
	
	$DOB=$rowS[1];
	$arr=explode('-',$DOB);
	$DOB= $arr[1] . "/" . $arr[2] . "/" . $arr[0];
	
	$PlaceOfBirth=$rowS[2];
	$Sex=$rowS[3];
	$sclass=$rowS[4];
	$LastSchool=$rowS[5];
	$Address=$rowS[6];
	$Hostel=$rowS[7];
	$sfathername=$rowS[8];
	$FatherEducation=$rowS[9];
	$FatherOccupation=$rowS[10];
	$smobile=$rowS[11];
	$email=$rowS[12];
	$MotherName=$rowS[13];
	$MotherEducation=$rowS[14];
	break;
}

$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
{
}

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

function getSize()
{
    var myFSO = new ActiveXObject("Scripting.FileSystemObject");
    var filepath = document.frmNewStudent.F1.value;
     
    var thefile = myFSO.getFile(filepath);
    var size = thefile.size;
 
    if(size > 250000)
    {
            alert("file must be select < 250 Kb");
    }        
}

function Validate()
{
	
	if (document.getElementById("txtName").value.trim()=="")
	{
		alert("Name is mandatory");
		return;
	}
	
	/*
	if(document.getElementById("txtLastName").value.trim() =="")
	{
		alert("Last name is mandatory");
		return;
	}
	*/
	
	if(document.getElementById("txtDOB").value.trim()=="")
	{
		alert ("Date of birth is mandatory!");
		return;
	}
	if(document.getElementById("txtSex").value.trim() == "")
	{
		alert ("Gender is mandatory!");
		return;
	}
	
	if(document.getElementById("txtAge").value.trim()=="")
	{
		alert("Age is mandatory!");
		return;
	}
	if(document.getElementById("cboClass").value=="Select One")
	{
		alert("Class is mandatory!");
		return;
	}
	
	if(document.getElementById("cboStream").value=="")
	{
		alert("Stream is mandatory!");
		return;
	}
	if(document.getElementById("txtOptionalSubject").value=="")
	{
		alert("Optional Subjects are mandatory!");
		return;
	}
	if(document.getElementById("txtAddress").value.trim()=="")
	{
		alert("Residential Address is mandatory!");
		return;
	}
	if(document.getElementById("cboLocation").value.trim()=="")
	{
		alert("Location is mandatory!");
		return;
	}
	
	if (document.getElementById("txtFatherName").value.trim()=="")
	{
		alert("Father's name is mandatory");
		return;
	}
	if(document.getElementById("txtFatherAnnualIncome").value.trim()=="")
	{
		alert("Father's annual income!");
		return;
	}
	
	if(document.getElementById("txtFatherEducation").value.trim()=="")
	{
		alert("Father's Education is mandatory!");
		return;
	}
	if(document.getElementById("cboDuration").value.trim()=="")
	{
		alert("Father's Qualification Duration is mandatory!");
		return;
	}
	if(document.getElementById("txtFatherOccupation").value.trim()=="")
	{
		alert("Father's occupation is mandatory!");
		return;
	}
	
	if(document.getElementById("txtFatherMobileNo").value.trim()=="")
	{
		alert("Father's Mobile No is mandatory!");
		return;
	}
	if(document.getElementById("txtFatherEmailId").value.trim()=="")
	{
		alert("Father's Email Id is mandatory!");
		return;
	}
	
	if(document.getElementById("txtMotherName").value.trim()=="")
	{
		alert("Mother's Name is mandatory!");
		return;
	}
	
	if(document.getElementById("txtMotherEducation").value.trim()=="")
	{
		alert("Mother's Education is mandatory!");
		return;
	}
	if(document.getElementById("cboMotherQualificationDuration").value.trim()=="")
	{
		alert("Mother's Qualification Duration is mandatory!");
		return;
	}
	
	if(document.getElementById("txtEmergencyNo").value.trim()=="")
	{
		alert("Emergency Contact No is mandatory!");
		return;
	}
	if(document.getElementById("txtMobile").value.trim()=="")
	{
		alert("Mobile No is mandatory!");
		return;
	}
	var strMobile=document.getElementById("txtMobile").value.trim();
	if(strMobile.length !=10)
	{
		alert("Mobile No length should be 10 digit!");
		return;
	}
	if(isNaN(strMobile)==true)
	{
		alert("Alphabets and non numeric caharacters are not allowed in mobile no!");
		return;
	}
	if(document.getElementById("txtemail").value.trim()=="")
	{
		alert("Email is mandatory!");
		return;
	}
	/*
	if(document.frmNewStudent.F1.value=="")
	{
		alert("Birth Certificate Photo is mandatory!");
		return;
	}
	*/
	if(document.frmNewStudent.F2.value=="")
	{
		alert("Child Photograph is mandatory!");
		return;
	}
	
	if(document.frmNewStudent.F1.value=="")
	{
		alert("Class X Marksheet is mandatory!");
		return;
	}


	document.getElementById("frmNewStudent").submit();
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
function fnlChkTransport()
{
	if(document.getElementById("cboTransport").value =="No")
	{
		document.getElementById("cboSafeTransport").style.display ="";
		document.getElementById("tdTransport").innerHTML='<font face="Cambria">If No, can you ensure safe commuting of the applicant  to and fro School :</font>';

	}
	else
	{
		document.getElementById("cboSafeTransport").value ="Yes";
		document.getElementById("cboSafeTransport").style.display ="none";
		document.getElementById("tdTransport").innerHTML='';
	}
}
function GetFeeDetail()
{
	if(document.getElementById("cboClass").value=="11th")
	{
		document.getElementById("trOptionalSubject").style.display ="";
		document.getElementById("tdSelectStream").style.display ="";
		document.getElementById("tdStream").style.display ="";
		document.getElementById("trSubjectMarks").style.display ="";
		document.getElementById("trSubjectMarksTitle").style.display ="";
		
	}
	else
	{
		var src = document.getElementById("cboOptionalSubject");
		for(var count=0; count < src.options.length; count++) 
			{
				if(src.options[count].selected == true) 
				{
					src.options[count].selected = false;
				}
			}
			SelectedValue="";
			document.getElementById("trOptionalSubject").style.display ="none";
			document.getElementById("tdSelectStream").style.display ="none";
			document.getElementById("tdStream").style.display ="none";
			document.getElementById("trSubjectMarks").style.display ="none";
			document.getElementById("trSubjectMarksTitle").style.display ="none";
			document.getElementById("txtOptionalSubject").value=SelectedValue;
	}
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
    /*
        now = new Date();
        var txtValue = document.getElementById("txtDOB").value;
        if (txtValue != null)
            dob = txtValue.split('/');
        if (dob.length === 3) {
            born = new Date(dob[2], dob[1] * 1 , dob[0]);
            age = now.getTime() - (born.getTime()) / (365.25 * 24 * 60 * 60 * 1000);
            //alert(" now.getTime  " + now.getTime());
            //alert(" born.getTime  " + born.getTime());
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
     */
     if(document.getElementById("txtDOB").value=="")
     {
     	alert("Please enter Date of Birth!");
     	return;
     }
     document.getElementById("txtAge").value="Please Wait";
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
						document.getElementById("txtAge").value=rows;
			        	//arr_row=rows.split(",");

			        	//document.getElementById("txtAdmissionFees").value=arr_row[4];
						//document.getElementById("txtTotal").value=arr_row[4];
			        	//document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						//CalculatTotal();
						//alert(rows);														
			        }
		      }
			var submiturl="CalculateAge.php?DateOfBirth=" + document.getElementById("txtDOB").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}

function fnlSelectionCheck()
{
	var src = document.getElementById("cboOptionalSubject");
		SelectedCount=0;
		SelectedValue="";
		for(var count=0; count < src.options.length; count++) 
		{
			if(src.options[count].selected == true) 
			{
				var option = src.options[count];
				
				SelectedCount=SelectedCount + 1;
				SelectedValue=SelectedValue + option.value +",";
			}
		}
		//alert(SelectedValue);
		if(SelectedCount>2)
		{
			for(var count=0; count < src.options.length; count++) 
			{
				if(src.options[count].selected == true) 
				{
					src.options[count].selected = false;
				}
			}
			SelectedValue="";
			alert("Maximum two optional subjects can be selected!");
			return;
		}
		document.getElementById("txtOptionalSubject").value=SelectedValue;		
}
function fnlMandatoruShowHide()
{
	if(document.getElementById("cboStream").value=="Non-Medical")
	{
		document.getElementById("tdMandatorySubject").innerHTML ="<b><u><font face='Cambria'>Mandatory Subjects :</u></b> <br><br>1. English Core<br>2. Physics<br>3. Chemistry<br>4. Mathematics</font>";
	}
	if(document.getElementById("cboStream").value=="Medical")
	{
		document.getElementById("tdMandatorySubject").innerHTML ="<b><u><font face='Cambria'>Mandatory Subjects :</u></b> <br><br>1. English Core<br>2. Physics<br>3. Chemistry<br>4. Biology</font>";
	}
	if(document.getElementById("cboStream").value=="Commerce")
	{
		document.getElementById("tdMandatorySubject").innerHTML ="<b><u><font face='Cambria'>Mandatory Subjects :</u></b> <br><br>1. English Core<br>2. Accountancy<br>3. Business Studies<br>4. Economics</font>";
	}
	if(document.getElementById("cboStream").value=="Humanities")
	{
		document.getElementById("tdMandatorySubject").innerHTML ="<b><u><font face='Cambria'>Mandatory Subjects :</u></b> <br><br>1. English Core<br>2. History/Geography<br>3. Political Science/Geography<br>4*.Economics</font>";
	}
	if(document.getElementById("cboStream").value=="Select One")
	{
		document.getElementById("tdMandatorySubject").innerHTML ="";
	}
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
<title>Student Registration</title>

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
.style36 {
	color: #FF0000;
	text-decoration: underline;
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
<strong><font face="Cambria" style="font-size: 14pt">&nbsp;STREAM&nbsp; OPTION 
FORM FOR CLASS XI (2016-17)</font></strong></p>
<p  style="height: 12px" align="left"><strong><font face="Cambria">Parents are 
requested to note:</font></strong></p>
<ul>
	<li>
	<p  style="height: 12px" align="left"><strong style="font-weight: 400">
	<font face="Cambria">This is not 
an Admission Form.</font></strong></p></li>
	<li>
	<p  style="height: 12px" align="left"><strong style="font-weight: 400">
	<font face="Cambria">This form is designed for all the classes for 
	submitting the latest information to School</font></strong></p></li>
	<li>
	<p  style="height: 12px" align="left">
	<font face="Cambria"><strong style="font-weight: 400">
	This form is non-chargeable and does not carry any fees</strong></font></p>
	</li>
</ul>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
		</table>
	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">
	<form name="frmNewStudent" id="frmNewStudent" method="post" action="SubmitfrmStudentMasterInfo.php" enctype="multipart/form-data">
		<input type="hidden" name="hSibling" id="hSibling" value="No">
		<input type="hidden" name="hFatherAlumni" id="hFatherAlumni" value="No">
		<input type="hidden" name="hMotherAlumni" id="hMotherAlumni" value="No">
		<input type="hidden" name="hSingleParent" id="hSingleParent" value="No">
		<input type="hidden" name="hSpecialNeed" id="hSpecialNeed" value="No">
		<input type="hidden" name="hDPSStaff" id="hDPSStaff" value="No">
		<input type="hidden" name="hEWSCategory" id="hEWSCategory" value="No">
		<input type="hidden" name="hOtherCategory" id="hOtherCategory" value="No">
		<input type="hidden" name="txtOptionalSubject" id="txtOptionalSubject" value="">
		<input type="hidden" name="hsadmission" id="hsadmission" value="<?php echo $sadmission; ?>">
		<tr>
		<td style="height: 10; border-top-style:solid; border-top-width:1px" class="style28">
		<font face="Cambria">
		<strong>Student Details:</strong></font></td>

		<font face="Cambria">
		<br class="auto-style31">

		<br class="auto-style31">
		</font>

		</tr>		<tr>
		<td style="height: 29px;" class="auto-style23">
		<table style="width: 100%" class="style14">
			<tr>

				<td class="auto-style11" colspan="2">

				&nbsp;</td>

				<td style="width: 3%" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 13%" class="auto-style26">&nbsp;</td>
				<td style="width: 263px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 223px" class="auto-style26">&nbsp;</td>
				<td style="width: 20%" class="auto-style26">&nbsp;</td>

			</tr>
			<tr>

				<td class="auto-style11">

				Admission No:</td>

				<td class="auto-style11">

		<font face="Cambria">

		<input name="txtAdmission" id="txtAdmission" type="text" class="text-box" value="<?php echo $sadmission;?>" readonly></font></td>

				<td style="width: 3%" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 13%" class="auto-style26">&nbsp;</td>
				<td style="width: 263px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 223px" class="auto-style26">&nbsp;</td>
				<td style="width: 20%" class="auto-style26">&nbsp;</td>

			</tr>
			<tr>

				<td class="auto-style11" colspan="2">

				&nbsp;</td>

				<td style="width: 3%" class="auto-style34">&nbsp;</td>

				<td style="width: 159px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 13%" class="auto-style26">&nbsp;</td>
				<td style="width: 263px" class="auto-style26" colspan="2">&nbsp;</td>
				<td style="width: 223px" class="auto-style26">&nbsp;</td>
				<td style="width: 20%" class="auto-style26">&nbsp;</td>

			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">

		<span class="auto-style21"><font face="Cambria">1. First Name of Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>
				</td>
				<td style="width: 16%" class="auto-style11">

		<font face="Cambria">

		<input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $sname;?>" readonly></font></td> 
				<td style="width: 3%" class="auto-style11">

				<span class="auto-style31"><font size="3" face="Cambria">

				&nbsp;</font></span></td>
				<td style="width: 159px" class="auto-style11" colspan="2">

		<span class="auto-style21">

		<span class="auto-style25"><font face="Cambria">2. Date of Birth*</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:<br>(mm/dd/yyyy)</font></span></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>
				</td>
				<td style="width: 13%" class="auto-style11">
		<font face="Cambria">
		<input name="txtDOB" id="txtDOB" type="text" readonly="readonly" value="<?php echo $DOB;?>"></font></td>
				<td style="width: 263px" class="auto-style11" colspan="2">
				&nbsp;</td>
				<td style="width: 223px" class="auto-style19">
				<font face="Cambria">3.</font><span class="auto-style21"><font face="Cambria">Age 
				as on (01.04.2016)</font></span></td>
				<td style="width: 20%" class="auto-style41">
				<font face="Cambria">

				<input name="txtAge" id="txtAge" type="text" class="text-box" onclick="javascript:CalculateAgeInQC();" readonly="readonly"></font></td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
				<span class="auto-style21"><font face="Cambria">&nbsp;Last Name</font></span></td>
				<td style="width: 16%" class="auto-style11">
				<font face="Cambria">

		<input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20" style="display: none;"></font></td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style11" colspan="2">
				&nbsp;</td>
				<td style="width: 13%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 263px" class="auto-style11" colspan="2">
				&nbsp;</td>
				<td class="auto-style19" colspan="2">
				&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 16%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style11" colspan="2">
				&nbsp;</td>
				<td style="width: 13%" class="auto-style11">
		&nbsp;</td>
				<td style="width: 263px" class="auto-style11" colspan="2">

				&nbsp;</td>
				<td class="auto-style19">

				&nbsp;</td>
				<td class="auto-style19">
				&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
				<span class="auto-style21"><font face="Cambria">4. 

				</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">
				Gender</font></span><span class="auto-style21"><font face="Cambria">*</font><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></span></td>
				<td style="width: 16%" class="auto-style11">				
		<select size="1" name="txtSex" id="txtSex" class="text-box" readonly>
		<option selected value="">Select One</option>
		<option value="Male" <?php if($Sex=="M") {?> selected="selected" <?php } ?>>Male</option>
		<option value="Female" <?php if($Sex=="F") {?> selected="selected" <?php } ?>>Female</option>
		</select></td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style11" colspan="2">
				<span class="auto-style33"><font face="Cambria">5</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">.</font></span><font face="Cambria">Class</font><span class="auto-style33"><font face="Cambria"> Currently Studying</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria"> 
				in*:</font></span><span class="auto-style31"><font size="3" face="Cambria"> </font>
				</span>
				</td>
				<td style="width: 13%" class="auto-style11">
				<strong><em style="font-style: normal">
				<font face="Cambria">
		<select name="cboClass" id="cboClass" class="text-box" onchange="Javascript:GetFeeDetail();" size="1">
		<option value="Select One">Select One</option>

		<!--
		<option value="Nursery">Nursery</option>
		<option value="Prep">Prep</option>
		<option value="1">1st</option>
		<option value="2">2nd</option>
		<option value="3">3rd</option>
		<option value="4">4th</option>
		<option value="5">5th</option>
		<option value="6">6th</option>
		<option value="7">7th</option>
		<option value="8">8th</option>
		<option value="9">9th</option>-->
		<!--<option value="10th">10th</option> -->
		<option value="11th">11th</option>
		
				
		</select></font></em></strong></td>
				<td style="width: 263px" class="auto-style11" colspan="2">

				&nbsp;</td>
				<td class="auto-style19">

				<span style="color: #000000" class="auto-style33">

				<font face="Cambria">6. </font></span>
				<span class="auto-style33">
				<font face="Cambria"><span style="color: #000000">Select Stream</span></font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">*
				:</font></span></td>
				<td class="auto-style19">
				<select size="1" name="cboStream" id="cboStream" class="text-box" onchange="javascript:fnlMandatoruShowHide();">
				<option value="">Select One</option>
				<option value="Medical">Medical</option>
				<option value="Non-Medical">Non-Medical</option>
				<option value="Commerce">Commerce</option>
				<option value="Humanities">Humanities</option>
				</select></td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style19" colspan="2">
		&nbsp;</td>
				<td class="auto-style11">
				&nbsp;</td>
				<td class="auto-style11" colspan="2">
				&nbsp;</td>
				<td class="auto-style11" id="tdSelectStream" style="display: none;">
				&nbsp;</td>
				<td class="auto-style11" id="tdStream" style="display: none;">
				&nbsp;</td>
			</tr>

			<tr>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style19" colspan="2">
		&nbsp;</td>
				<td class="auto-style11">
				&nbsp;</td>
				<td class="auto-style11" colspan="2">
				&nbsp;</td>
				<td class="auto-style11" id="tdSelectStream" style="display: none;">
				&nbsp;</td>
				<td class="auto-style11" id="tdStream" style="display: none;">
				&nbsp;</td>
			</tr>

			<tr>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style19" colspan="2">
		&nbsp;</td>
				<td class="auto-style11">
				&nbsp;</td>
				<td class="auto-style11" colspan="2">
				&nbsp;</td>
				<td class="auto-style11" id="tdSelectStream" style="display: none;">
				&nbsp;</td>
				<td class="auto-style11" id="tdStream" style="display: none;">
				&nbsp;</td>
			</tr>

			<tr id="trOptionalSubject" style="display: none;">
				<td class="auto-style11" colspan="5">
		&nbsp;<p style="text-align: left"><font face="Cambria"><u><b>Stream 
		Selection Notes::</b></u></font></p>
		<p style="text-align: left"><font face="Cambria">&nbsp;<span class="style36"><strong>- Stream / 
		Subject allocation will be done on basis of final result of Class X</strong></span></font></p>
		<p style="text-align: left" class="style36"><font face="Cambria">
		<strong>- Stream option form is 
		to be submitted latest&nbsp; by Dec. 12, 2015</strong></font></p>
		<p style="text-align: left" class="style36"><font face="Cambria">
		<strong>- A Subject shall be 
		offered only, if a minimum of 10 students opt for that subject</strong></font></p>
		<p style="text-align: left" class="style36"><font face="Cambria">
		<strong>- Any one of the 
		subject mentioned in options box has to be chosen as optional subject</strong></font></p>
		<p style="text-align: left" class="style34"><font face="Cambria" color="#FF0000">
		<strong>- 
		Mathematics is a compulsory subject for Non-Medical stream and should 
		not be selected as optional subject</strong></font></p>
		<p style="text-align: left" class="style34"><font face="Cambria" color="#FF0000">
		<strong>- 
		Computer Science is offered only for Non-Medical Stream and should not 
		be selected as optional subject by other Streams</strong></font></td>
				<td class="style32" colspan="2" valign="top" >
		&nbsp;</td>
	<td class="style32" colspan="2" valign="top" id="tdMandatorySubject">
				</td>
				<td style="width: 20%" class="style32">		<span class="style34"><font face="Cambria"><strong>Optional Subjects 
		(Select Any Two Only):</strong></font><strong><br>
				</strong></span>
				<br>
				<select size="19" name="cboOptionalSubject" id="cboOptionalSubject" onclick="fnlSelectionCheck();" multiple>
				<option value="Economics">Economics</option>
				<option value="Hindi">Hindi</option>
				<option value="Music">Music</option>
				<option value="Geography">Geography</option>
				<option value="Home Science">Home Science</option>
				
				<option value="Physical Education">Physical Education</option>
				<option value="Sanskrit">Sanskrit</option>
				<option value="Mathematics">Mathematics</option>
				<option value="Informatic Practices">Informatic Practices
				</option>
				<option value="Computer Science">Computer Science</option>
				
				<option value="Psychology">Psychology</option>
				<option value="Entrepreneurship">Entrepreneurship</option>
				<option value="Fine Arts">Fine Arts</option>
				<option value="French">French</option>
				<option value="Human Rights">Human Rights</option>
				<option value="Typography">Typography</option>
				<option value="Sculpture">Sculpture</option>
				<option value="First Aid and Emergency Media Care">First Aid and Emergency Media Care</option>

				</select><br>
				<span class="style33"><strong><br>
			Press ctrl button for multiple selection</strong></span></td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
				&nbsp;</td>
				<td class="auto-style11" colspan="9" align="left">
				&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td class="auto-style11" colspan="8">
		&nbsp;</td>
				<td style="width: 20%" class="auto-style11">
				&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">10. Residential 
		Address* 
			</font></span>

				</td>
				<td class="auto-style11" colspan="3">
				<font face="Cambria">
				<textarea name="txtAddress" id="txtAddress"class="text-box-address" rows="3" cols="45"><?php echo $Address;?></textarea></font></td>
				<td class="style21" colspan="3">
				11. Select Locality*</td>
				<td class="auto-style11" colspan="3">
		<font face="Cambria">
				<select name="cboLocation" id="cboLocation" class="text-box" size="1">
		<option value="">Select One</option>
		<?php
		while($rowL=mysql_fetch_row($rsLocation))
		{
			$Sector=$rowL[0];
		?>
		<option value="<?php echo $Sector;?>"><?php echo $Sector;?></option>
		<?php
		}
		?>
		
		</select></font></td>
			</tr>
			<tr>
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td class="auto-style11" colspan="8">
		&nbsp;</td>
				<td style="width: 20%" class="auto-style11">
				&nbsp;</td>
			</tr>
			<tr style="display:none;">
				<td style="width: 16%" class="style35">
		12. Hostel Facility required:</td>
				<td class="auto-style11" colspan="8">
		<select name="cboHostelFacility" id="cboHostelFacility">
		<option <?php if($Hostel=="") {?> selected="" <?php } ?> value="No">No</option>
		<option <?php if($Hostel=="Yes") {?> selected="" <?php } ?> value="Yes">Yes</option>
		</select></td>
				<td style="width: 20%" class="auto-style11">
				&nbsp;</td>
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
		<span class="auto-style21"><font face="Cambria">&nbsp;Name*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtFatherName" id="txtFatherName" type="text" class="text-box" value="<?php echo $sfathername;?>" readonly></font></td>
				<td style="width: 157px" class="auto-style11">
		&nbsp;</td>
				<td style="width: 28px" class="auto-style11">

		&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">&nbsp;Age:</font></span></td>
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
		<font face="Cambria">
		<span class="auto-style25">&nbsp;Qualification*:<br>
		<span class="style26"><strong>(Select Highest Qualification)</strong></span></span></font></td>
				<td style="width: 172px" class="auto-style11">

		<select size="1" name="txtFatherEducation" id="txtFatherEducation" class="text-box">
		<option selected="selected" value="">Select One</option>
		<?php
			while($rowEdu = mysql_fetch_row($rsEducation))
			{
				$Qualification=$rowEdu[0];
		?>
		<option value="<?php echo $Qualification;?>" <?php if ($FatherEducation==$Qualification) {?>selected="selected" <?php } ?>><?php echo $Qualification;?></option>
		<?php
			}
		?>
		
		</select></td>
				<td style="width: 157px" class="auto-style11">
				<table style="width: 100%" cellpadding="0" class="style15">
					<tr>
						<td><span class="auto-style25"><font face="Cambria">
						Highest Qualification
						Duration*: </font></span></td>
						<td><select name="cboDuration" id="cboDuration" class="text-box">
						<option selected="selected" value="">Select One</option>
						<option value="Less than 2 Year">Less than 2 Year</option>
						<option value="More than 2 Years">More than 2 Years</option>
						</select></td>
					</tr>
				</table>
				</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">&nbsp;Occupation*:</font></span></td>
				<td style="width: 158px" class="auto-style11">

		<font face="Cambria">

		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" class="text-box" value="<?php echo $FatherOccupation;?>"></font></td>
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
		<span class="auto-style25"><font face="Cambria">&nbsp;Designation:</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text"></font></td>
				<td style="width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">&nbsp;Annual Income*:</font></span></td>
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
		<span class="auto-style25"><font face="Cambria">Organization&nbsp; Name :</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text"></font></td>
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
		<font face="Cambria">Mobile No *:</font></td>
				<td style="width: 158px" class="auto-style11">

		<font face="Cambria">

		<input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" size="20" value="<?php echo $smobile;?>"></font></td>
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

		<input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="text" size="20" value="<?php echo $email;?>"></font></td>
				<td style="width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		Aa<font face="Cambria">dhar Card No:</font></td>
				<td style="width: 158px" class="auto-style11">

		<input name="txtFatherAadharCardNo" id="txtFatherAadharCardNo" type="text"></td>
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
		<span class="auto-style21"><font face="Cambria">&nbsp;Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtMotherName" id="txtMotherName" type="text" class="text-box" value="<?php echo $MotherName;?>" readonly></font></td>
				<td style="width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="auto-style21"><font face="Cambria">&nbsp;Age:</font></span></td>
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
		<font face="Cambria">
		<span class="auto-style25">&nbsp;Qualification*:<br></span>
		<span class="style26"><strong>(Select Highest Qualification)</strong></span></font></td>
				<td style="width: 172px" class="auto-style11">

		
		
		<select size="1" name="txtMotherEducation" id="txtMotherEducation" class="text-box">
		<option selected="selected" value="">Select One</option>
		<?php
			while($rowEdu1 = mysql_fetch_row($rsEducation1))
			{
				$Qualification1=$rowEdu1[0];
		?>
		<option value="<?php echo $Qualification1;?>" <?php if($MotherEducation==$Qualification1) {?>selected="selected" <?php }?>><?php echo $Qualification1;?></option>
		<?php
			}
		?>
		</select>
		
		</td>
				<td style="width: 157px" class="auto-style11">
				<table style="width: 100%">
					<tr>
						<td><span class="auto-style25"><font face="Cambria">
						Highest Qualification
						Duration*:</font></span></td>
						<td>
						<select name="cboMotherQualificationDuration" id="cboMotherQualificationDuration" class="text-box">
						<option selected="selected" value="">Select One</option>
						<option value="Less than 2 Year">Less than 2 Year</option>
						<option value="More than 2 Years">More than 2 Years</option>
						</select></td>
					</tr>
				</table>
				</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="auto-style21"><font face="Cambria">&nbsp;Occupation*:</font></span></td>
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
		<span class="auto-style21"><font face="Cambria">&nbsp;Designation <br>(If 
		employed):</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text"></font></td>
				<td style="width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="auto-style21"><font face="Cambria">&nbsp;Annual Income<br> 
		(If employed):</font></span></td>
				<td style="width: 158px" class="auto-style11">
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
				<td style="width: 212px" class="auto-style11">
	</td>
				<td style="width: 172px" class="auto-style11">
&nbsp;&nbsp;</td>
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
		<span class="auto-style21"><font face="Cambria">Organization Name <br>(If 
		employed):</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" class="text-box"></font></td>
				<td style="width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="style30">Office</span><span class="auto-style21"><font face="Cambria"> Address 
		(If employed):</font></span></td>
				<td style="width: 158px" class="auto-style11">

		<font face="Cambria">

		<textarea name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box-address" cols="16" rows="2"></textarea></font></td>
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
		<span class="auto-style21"><font face="Cambria">Residence 
		Landline. no :</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtMotherOfficialPhNo" id="txtMotherOfficialPhNo" class="text-box" type="text"></font></td>
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
				<td style="width: 212px" class="auto-style11">
		<font face="Cambria">Email id:</font></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtMotherEmailId" id="txtMotherEmailId" class="text-box" type="text" size="20"></font></td>
				<td style="width: 157px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<font face="Cambria">Aadhar Card No.</font></td>
				<td style="width: 158px" class="auto-style11">

		<input name="txtMotherAadharCardNo" id="txtMotherAadharCardNo" type="text"></td>
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
		Details (If Applicable):</b></font></td>
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
		<span class="style30">Office</span><span class="auto-style21"><font face="Cambria"> Address 
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
			<tr>
				<td style="width: 212px; " class="auto-style11">
		<font face="Cambria"><b14.</b>School TransportRequired</font></td>
				<td class="auto-style11" colspan="2">

		<font face="Cambria">
				<select name="cboTransport" id="cboTransport" class="text-box" size="1" onchange="javascript: fnlChkTransport();">
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		</select></font></td>
				<td style="width: 28px; " class="auto-style11">
				&nbsp;</td>
				<td style="width: 217px;" class="auto-style11" id="tdTransport">
				<!--<font face="Cambria">If No, are you in position to provide safe transportation to the applicant to and fro from School :</font>-->
				</td>
				<td style="width: 158px; " class="auto-style11">
		<font face="Cambria">
				<select name="cboSafeTransport" id="cboSafeTransport" class="text-box" size="1" style="display: none;">
		<option>Yes</option>
		<option>No</option>
		</select></font></td>
			</tr>
			<tr>
				<td style="width: 212px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
		&nbsp;</td>
				<td class="auto-style11" colspan="2" style="border-bottom-style: solid; border-bottom-width: 1px">
		&nbsp;</td>
				<td style="width: 28px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
				&nbsp;</td>
				<td style="width: 217px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
		&nbsp;</td>
				<td style="width: 158px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style11">
		&nbsp;</td>
			</tr>
			
			<tr>
				<td class="auto-style11" colspan="6">
		<font face="Cambria"><b>16.</b> <strong>Details of Sibling(s) studying in <?php echo $SchoolName; ?>, 
		FARIDABAD (If there is more than one sibling, mention any one)</strong></font></td>
			</tr>
			<tr>
				<td style="width: 212px" class="auto-style11">
		<span class="auto-style21"><font face="Cambria">&nbsp;Name::</font></span></td>
				<td class="auto-style11" colspan="2">

		<font face="Cambria">

		<input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" readonly="readonly"></font></td>
				<td style="width: 28px" class="auto-style11">

				&nbsp;</td>
				<td style="width: 217px" class="auto-style11">
		<span class="auto-style21"><font face="Cambria">&nbsp;Class:</font></span></td>
				<td style="width: 158px" class="auto-style11">

		<font face="Cambria">

		<input name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box" type="text" readonly="readonly"></font></td>
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
		<span class="auto-style21"><font face="Cambria">&nbsp;Adm. 
		No:</font></span></td>
				<td style="width: 172px" class="auto-style11">

		<font face="Cambria">

		<input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" type="text" readonly="readonly"></font></td>
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
				<td style="width: 212px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">
		&nbsp;</td>
				<td style="width: 172px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">

		&nbsp;</td>
				<td style="width: 157px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">
				&nbsp;</td>
				<td style="width: 28px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">

				&nbsp;</td>
				<td style="width: 217px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">
		&nbsp;</td>
				<td style="width: 158px; border-bottom-style:none; border-bottom-width:medium" class="auto-style11" height="23">

		&nbsp;</td>
			</tr>
						</table>
		</td>
</tr>	
			
		
			<tr>
			
			
		
		<td style="height: 46px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style23">
		&nbsp;</td>
</tr>	
<tr>			
		
		<td style="height: 10; border-top-width:1px; background-color:#A9D0F5" class="style28">
		<font face="Cambria">
		<strong>18. Emergency Contact Details:</strong></font></td>
			</tr>
		
		<tr>
		<td style="height: 29px; border-bottom-style:solid; border-bottom-width:1px" class="auto-style23">
		<table style="width: 100%" class="style14">
			<tr>
				<td style="width: 221px" class="auto-style11">
		<span class="auto-style25"><font face="Cambria">Contact No*:</font></span></td>
				<td style="width: 221px" class="auto-style11">
		<font face="Cambria">
		<input name="txtEmergencyNo" id="txtEmergencyNo"  class="text-box" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" type="text"></font></td>
				<td style="width: 221px" class="auto-style11">
		<span class="auto-style21"><font face="Cambria">Mobile No*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>
				<td style="width: 221px" class="auto-style11">
		<font face="Cambria">
		<input name="txtMobile" id="txtMobile" type="text" class="text-box" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" style="width: 143px"></font></td>
				<td style="width: 221px" class="auto-style26">
		<span class="auto-style25"><font face="Cambria">E-mail Id*</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>
				<td style="width: 222px" class="auto-style26">
		<font face="Cambria">
		<input name="txtemail" id="txtemail" type="text" class="text-box"></font></td>
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
		</table>
		</td>

		</tr>		<tr>
		<td style="border-top-width: 1px">
		<b><font face="Cambria">19. Documents to be Uploaded: </font></b><p>
		<font face="Cambria">1. Copy of Marksheet Class X * : <input type="file" name="F1" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font><p>
		<font face="Cambria">2. Photograph of Applicant* :<input type="file" name="F2" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font>
		<p>
		&nbsp;</td>

</tr>
		<tr>
		<td style="border-bottom-width: 1px">
		&nbsp;</td></tr>
		<tr>
		<td style="border-bottom-width: 1px">
		&nbsp;</td></tr>
		<tr id="trSubjectMarksTitle" style="display: none;">
		<td style="border-bottom-width: 1px" bgcolor="#A9D0F5">
		<font face="Cambria"><b>20. Marks / Grades Obtained for Class X : </b>
		</font></td>
</tr>



		<tr>



		<td style="border-bottom-width: 1px">
		&nbsp;</td>


</tr>
		<tr id="trSubjectMarks" style="display: none;">
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;">
		<table border="1" width="100%" style="border-collapse: collapse">
			<tr>
				<td align="center" width="61"><b><font face="Cambria">Sr No</font></b></td>
				<td align="center" width="362"><b><font face="Cambria">Subject</font></b></td>
				<td align="center" width="295"><b><font face="Cambria">Marks</font></b></td>
				<td align="center" width="295"><b><font face="Cambria">Grade 
				Point</font></b></td>
				<td align="center" width="295"><b><font face="Cambria">% Marks 
				(Other Boards)</font></b></td>
			</tr>
			<tr>
				<td width="61" align="center" style="height: 27px"><b>
				<font face="Cambria">1</font></b></td>
				<td width="362" style="height: 27px"><font face="Cambria"><b>English</b></font></td>
				<td width="295" align="center" style="height: 27px">
				<input type="text" name="txtEnglishMarks" id="txtEnglishMarks" size="20" class="text-box"></td>
				<td width="295" align="center" style="height: 27px">
				<input type="text" name="txtEnglishGradePoint" id="txtEnglishGradePoint" size="20" class="text-box"></td>
				<td width="295" align="center" style="height: 27px">
				<input type="text" name="txtEnglishMarksPercent" id="txtEnglishMarksPercent" size="20" class="text-box"></td>
			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">2</font></b></td>
				<td width="362"><font face="Cambria"><b>Maths</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtMathsMarks" id="txtMathsMarks" size="20" class="text-box"></td>
				<td width="295" align="center">
				<input type="text" name="txtMathsGradePoints" id="txtMathsGradePoints" size="20" class="text-box"></td>
				<td width="295" align="center">
				<input type="text" name="txtMathsMarksPercent" id="txtMathsMarksPercent" size="20" class="text-box"></td>
			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">3</font></b></td>
				<td width="362"><font face="Cambria"><b>General Science</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtGeneralScience" size="20" id="txtGeneralScience" class="text-box"></td>
				<td width="295" align="center">
				<input type="text" name="txtScienceGradePoint" id="txtScienceGradePoint" size="20" class="text-box"></td>
				<td width="295" align="center">
				<input type="text" name="txtScienceMarksPercent" id="txtScienceMarksPercent" size="20" class="text-box"></td>
			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">4</font></b></td>
				<td width="362"><font face="Cambria"><b>Social Science</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtSocialScience" size="20" id="txtSocialScience" class="text-box"></td>
				<td width="295" align="center"> 
				<input type="text" name="txtSocialScienceGradePoints" id="txtSocialScienceGradePoints" size="20"  class="text-box"></td>
				<td width="295" align="center">
				<input type="text" name="txtSocialScienceMarksPercent" id="txtSocialScienceMarksPercent" size="20" class="text-box"></td>

			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">5</font></b></td>
				<td width="362"><font face="Cambria"><b>Hindi / Sanskrit / 
				French / Other Language</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtLanguageMarks" id="txtLanguageMarks"  size="20" class="text-box"></td>
				<td width="295" align="center">
				<input type="text" name="txtLanguageGradePoint" id="txtLanguageGradePoint" size="20" class="text-box"></td>
				<td width="295" align="center">
				<input type="text" name="txtLanguageMarksPercent" id="txtLanguageMarksPercent" size="20" class="text-box"></td>
			</tr>
		</table>
		</td>


</tr>



		<tr>
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;">
		&nbsp;</td>


</tr>
		</table>
		</td></tr>
		<tr>
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;">
		&nbsp;</td></tr>
		<tr>
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;">
		<p><font face="Cambria"><b>Place</b></font> :
		<input type="text" name="T1" size="20"><p><b><font face="Cambria">Date :<?php echo $currentdate;?>
		</font></b>
		<p>&nbsp;</td></tr>
		<tr>
		<td height="30">
		<p align="center">		<font face="Cambria">
		<input name="BtnSubmit" type="button" value="I Agree &amp; Submit" onclick="Validate();" style="font-weight: 700" class="text-box">
		</font>
		</td></tr>
<tr>
		<td style="height: 29px" class="style7">

		&nbsp;</td>	</tr>

<tr>
		<td style="height: 29px" class="style7">		&nbsp;</td>

	</tr>	</form></table><!--
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>

--></body>
</html>