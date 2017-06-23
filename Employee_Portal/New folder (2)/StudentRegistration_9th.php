<?php
	session_start();
	include 'connection.php';
	include 'AppConf.php';
?>
<?php
session_start();
$class=$_SESSION['StudentClass'];
$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);
$rsEducation=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation1=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation2=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");

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
	//if(document.frmNewStudent.F1.value !="")
	//{
		//getSize();
	//}
	
	if (document.getElementById("txtName").value.trim()=="")
	{
		alert("Name is mandatory");
		return;
	}
	
	if(document.getElementById("txtLastName").value.trim() =="")
	{
		alert("Last name is mandatory");
		return;
	}
	
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
	if(document.getElementById("cboClass").value=="11th")
	{
		if(document.getElementById("cboStream").value=="")
		{
			alert("Stream  is mandatory for Class XI!");
			return;
		}
		if(document.getElementById("txtEnglishMarks").value=="" || document.getElementById("txtEnglishGradePoint").value=="" || document.getElementById("txtEnglishMarksPercent").value=="")
		{
			alert("English Marks,Grade Point and Percent are mandatory!");
			return;
		}
		if(document.getElementById("txtMathsMarks").value=="" || document.getElementById("txtMathsGradePoints").value=="" || document.getElementById("txtMathsMarksPercent").value=="")
		{
			alert("Maths Marks,Grade Point and Percent are mandatory!");
			return;
		}
		if(document.getElementById("txtGeneralScience").value=="" || document.getElementById("txtScienceGradePoint").value=="" || document.getElementById("txtScienceMarksPercent").value=="")
		{
			alert("General Science Marks,Grade Point and Percent are mandatory!");
			return;
		}
		if(document.getElementById("txtSocialScience").value=="" || document.getElementById("txtSocialScienceGradePoints").value=="" || document.getElementById("txtSocialScienceMarksPercent").value=="")
		{
			alert("Social Science Marks,Grade Point and Percent are mandatory!");
			return;
		}
		if(document.getElementById("txtLanguageMarks").value=="" || document.getElementById("txtLanguageGradePoint").value=="" || document.getElementById("txtLanguageMarksPercent").value=="")
		{
			alert("Other Language Marks,Grade Point and Percent are mandatory!");
			return;
		}
	}
	
	if(document.getElementById("txtLastSchool").value.trim()=="")
	{
		alert("Last School is mandatory!");
		return;
	}
	
	if(document.getElementById("hSibling").value=="Yes")
	{
		if(document.getElementById("txtRealBroSisName").value.trim()=="" || document.getElementById("txtRealBroSisClass").value.trim()=="" || document.getElementById("txtRealBroSisSchoolName").value.trim()=="" || document.getElementById("txtRealBroSisName2").value.trim()=="" || document.getElementById("txtRealBroSisClass2").value.trim()=="" || document.getElementById("txtRealBroSisSchoolName2").value.trim()=="" || document.getElementById("txtRealBroSisName3").value.trim()=="" || document.getElementById("txtRealBroSisClass3").value.trim()=="" || document.getElementById("txtRealBroSisSchoolName3").value.trim()=="")
		{
			alert("Please enter the details of Sibling currently studying in DPS");
			return;
		}
	}
	
	if(document.getElementById("hFatherAlumni").value=="Yes")
	{
		if(document.getElementById("txtFatherAlumniName").value.trim()=="" || document.getElementById("txtDPSSchoolName").value.trim()=="" || document.getElementById("txtYearOfPassing").value.trim()=="")
		{
			alert("Please enter the details of Father's alumni details!");
			return;
		}
	}
	if(document.getElementById("hMotherAlumni").value=="Yes")
	{
		if(document.getElementById("txtMotherAlumniName").value.trim()=="" || document.getElementById("txtMotherDPSSchoolName").value.trim()=="" || document.getElementById("txtMotherYearOfPassing").value.trim()=="")
		{
			alert("Please enter the details of Mother's alumni details!");
			return;
		}
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
	
	/*
	if(document.getElementById("txtFatherAge").value=="")
	{
		alert("Falter's Age is mandatory!");
		return;
	}
	*/
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
	
	/*
	if(document.getElementById("txtMotherAge").value=="")
	{
		alert("Mother's age is mandatory!");
		return;
	}
	
	if(document.getElementById("txtGuradianName").value=="")
	{
		alert("Guradian's Name is mandatory!");
		return;
	}
	if(document.getElementById("txtGuradianAge").value=="")
	{
		alert("Guradian's Age is mandatory!");
		return;
	}
	*/
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
	if(document.frmNewStudent.F1.value=="")
	{
		alert("Birth Certificate Photo is mandatory!");
		return;
	}
	if(document.frmNewStudent.F2.value=="")
	{
		alert("Child Photograph is mandatory!");
		return;
	}
	if(document.getElementById("cboClass").value !="Nursery")
	{
		if(document.frmNewStudent.F3.value=="")
		{
			alert("Previous Class Score Card is mandatory!");
			return;
		}
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
function fnlChkSpecialNeedDetail()
{
	
	if((document.getElementById("cboSpecialNeed").value =="Others"))
	{
		
		
		document.getElementById("txtSpecialNeedDetail").style.display ="";
	}
	else
	{
		
		document.getElementById("txtSpecialNeedDetail").style.display ="none";
		
	}
	
	
}
function fnlChksingleparentDetail()
{
	
	if((document.getElementById("cbosingleparent").value =="Others"))
	{
		
		
		document.getElementById("txtsingleparent").style.display ="";
	}
	else
	{
		
		document.getElementById("txtsingleparent").style.display ="none";
		
	}
	
	
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
function fnlChkCategory(ctrlname)
{
	if(ctrlname=="chkSibling")
	{
		//alert(document.getElementById("lifecheck").checked);
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hSibling").value="Yes";
			document.getElementById("txtRealBroSisName").readOnly=false;
			document.getElementById("txtRealBroSisClass").readOnly=false;
			document.getElementById("txtRealBroSisSchoolName").readOnly=false;
			document.getElementById("txtRealBroSisName2").readOnly=false;
			document.getElementById("txtRealBroSisClass2").readOnly=false;
			document.getElementById("txtRealBroSisSchoolName2").readOnly=false;
			document.getElementById("txtRealBroSisName3").readOnly=false;
			document.getElementById("txtRealBroSisClass3").readOnly=false;
			document.getElementById("txtRealBroSisSchoolName3").readOnly=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hSibling").value="No";
			document.getElementById("txtRealBroSisName").value="";
			document.getElementById("txtRealBroSisClass").value="";
			document.getElementById("txtRealBroSisSchoolName").value="";
			document.getElementById("txtRealBroSisName2").value="";
			document.getElementById("txtRealBroSisClass2").value="";
			document.getElementById("txtRealBroSisSchoolName2").value="";
			document.getElementById("txtRealBroSisName3").value="";
			document.getElementById("txtRealBroSisClass3").value="";
			document.getElementById("txtRealBroSisSchoolName3").value="";
			
			document.getElementById("txtRealBroSisName").readOnly=true;
			document.getElementById("txtRealBroSisClass").readOnly=true;
			document.getElementById("txtRealBroSisSchoolName").readOnly=true;
			document.getElementById("txtRealBroSisName2").readOnly=true;
			document.getElementById("txtRealBroSisClass2").readOnly=true;
			document.getElementById("txtRealBroSisSchoolName2").readOnly=true;
			document.getElementById("txtRealBroSisName3").readOnly=true;
			document.getElementById("txtRealBroSisClass3").readOnly=true;
			document.getElementById("txtRealBroSisSchoolName3").readOnly=true;
			return;
		}
	}
	
	if(ctrlname=="chkFatherAlumni")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hFatherAlumni").value="Yes";
			document.getElementById("txtFatherAlumniName").readOnly=false;
			//document.getElementById("txtDPSSchoolName").readOnly=false;
			document.getElementById("txtDPSSchoolName").disabled=false;
			document.getElementById("txtYearOfPassing").readOnly=false;
			document.getElementById("txtLastPassoutClassFather").disabled=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hFatherAlumni").value="No";
			
			document.getElementById("txtFatherAlumniName").value="";
			document.getElementById("txtDPSSchoolName").value="";
			document.getElementById("txtYearOfPassing").value="";
			document.getElementById("txtFatherAlumniName").readOnly=true;
			document.getElementById("txtLastPassoutClassFather").value="";
			document.getElementById("txtDPSSchoolName").disabled=true;
			document.getElementById("txtLastPassoutClassFather").disabled=true;
			
			
			document.getElementById("txtFatherAlumniName").readOnly=true;
			//document.getElementById("txtDPSSchoolName").disabled=true;
			document.getElementById("txtYearOfPassing").readOnly=true;
			return;
		}
	}
	if(ctrlname=="chkMotherAlumni")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hMotherAlumni").value="Yes";
			document.getElementById("txtMotherAlumniName").readOnly=false;
			document.getElementById("txtMotherDPSSchoolName").disabled=false;
			document.getElementById("txtMotherYearOfPassing").readOnly=false;
			document.getElementById("txtLastPassoutClassMother").disabled=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hMotherAlumni").value="No";
			
			document.getElementById("txtMotherAlumniName").value="";
			document.getElementById("txtMotherDPSSchoolName").value="";
			document.getElementById("txtMotherYearOfPassing").value="";
			document.getElementById("txtLastPassoutClassMother").value="";
			document.getElementById("txtLastPassoutClassMother").disabled=true;
			
			document.getElementById("txtMotherAlumniName").readOnly=true;
			//document.getElementById("txtMotherDPSSchoolName").readOnly=true;
			document.getElementById("txtMotherDPSSchoolName").disabled=true;
			document.getElementById("txtMotherYearOfPassing").readOnly=true;
			return;
		}
	}
	
	if(ctrlname=="chkSingleParent")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hSingleParent").value="Yes";
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hSingleParent").value="No";
			return;
		}
	}
	
	if(ctrlname=="chkSpecialNeed")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hSpecialNeed").value="Yes";
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hSpecialNeed").value="No";
			return;
		}
	}
	
	
		
	if(ctrlname=="chkDPSStaff")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hDPSStaff").value="Yes";
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hDPSStaff").value="No";			
			return;
		}
	}
	
	if(ctrlname=="chkEWSCategory")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hEWSCategory").value="Yes";
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hEWSCategory").value="No";			
			return;
		}
	}
	if(ctrlname=="chkOtherCategory")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hOtherCategory").value="Yes";
			if(document.getElementById("hDPSStaff").value=="Yes" || document.getElementById("hSpecialNeed").value=="Yes" || document.getElementById("hSingleParent").value==="Yes" || document.getElementById("hMotherAlumni").value=="Yes" || document.getElementById("hFatherAlumni").value=="Yes" || document.getElementById("hSibling").value=="Yes" || document.getElementById("hEWSCategory").value=="Yes" || document.getElementById("hotherCategory").value=="Yes")
			{
				document.getElementById("hOtherCategory").value="No";
				document.getElementById(ctrlname).checked=false;
				alert("Other can be selected only if other categories not selected!");
				return;
			}
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hOtherCategory").value="No";
			return;
		}
	}	
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
		document.getElementById("tdMandatorySubject").innerHTML ="<b><u><font face='Cambria'>Mandatory Subjects :</u></b> <br><br>1. English Core<br>2. History<br>3. Political Science<br>4*. (a) Economics<br>    (a) Psychology</font>";
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Registration</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <script src="bootstrap/bootstrap.min.js"></script>
	
	
	
		<style> body{font-family:Arial, Helvetica, sans-serif!important;} .Header .img-responsive{width:40%; color:#000!important;}
		 .text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .row{padding-left:0%; margin:0;} .h{background-color:rgba(11, 70, 45, 0.84); padding:4px 0px; color:#FFFFFF;} .h11{ text-transform:uppercase;} .col-xs-6{ text-align:left; margin-top:1%!important;} .hr{width:99%; border:1px solid #CCCCCC; padding:0;} .col-xs-3, .col-xs-9{margin-top:1%; } .f{font-size:12px;} .col-xs-2{width:12%; padding:0; border:1px solid #0099ff; } .col-xs-2 li{list-style:none; padding:5%;} .info{ padding:1%; margin:0; line-height:0.5;} .tba{ width:90%; } .tbs{padding:2.5%;}
		 .col-xs-3:nth-child(odd){font-weight:600;}
		 .table1 tr td{padding:1%;}  .row_1{ border-bottom: 2px solid #999999; } 
		 .col-xs-12 table td{ padding:1% 0.5%; border:1px solid #0099ff; border-radius:2px; } 
		 .col{ text-align:left; }  .check{padding:0 0 0 3%;} .study{margin-top:3%;}
		 .check table{width:20%; float:left;} .check table td{ padding:3% 1%!important; font-size:13px;} .check table td:nth-child(odd){width:20px;}
		 .table_detai .row{width:100%;} .table_detail .col-xs-2, .table_detail .col-xs-3{padding:1% 1%; margin:0; border:1px solid #0099ff; } .table_detail .col-xs-2{ width:17%;} .table_detail .head1{font-weight:700; padding:1%; background-color:#0099ff; margin:0; border:1px solid #0099ff;} .table_detail .col-xs-2 .text-box{ width:95%; border-radius:3px; border:1px solid #0099ff;} .table_detail .head2{ padding-bottom:1.3%; } 
		 @media only screen and (min-width:1235px) and (max-width: 1935px){.col{text-align:center; } .study{margin-top:4%;} }
		 
		 @media only screen and (min-width:800) and (max-width: 934px){ .check table td{ font-size:11px!important;}}
		 @media only screen and (min-width:870px) and (max-width: 1235px){	 .col-xs-2{width:20%;} .tba{ width:90%; } 	 }
		 @media only screen and (min-width:1051px) and (max-width: 1235px){.table_detail .l{ font-size:12px; padding-bottom:1.7%;}}
		 @media only screen and (min-width:870px) and (max-width: 1051px){ .table_detail .l{ font-size:12px; padding-bottom:0.5%; padding-top:0.5%;} }
		 @media only screen and (min-width:928px) and (max-width: 1080px){ .table_detail .l2{ font-size:12px; padding-bottom:1.3%; } }
		 @media only screen and (min-width:870px) and (max-width: 928px){ .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.2%; } .study{margin-top:7%;} }
		 @media only screen and (min-width:720px) and (max-width: 870px){ .col-xs-2{width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.4%; padding-top:0.4%;} .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.1%; } .tba{ width:90%; } .check table{width:33%; float:left;} .study{margin-top:20%;} }		 
		 @media only screen and (min-width:580px) and (max-width: 720px){
		 .col-xs-3{ width:50%; margin-top:1%; } .col-xs-6{ text-align:left; margin-top:1%!important;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:50%;} .col-xs-2 .text-box{height:25px; } .xss{width:50%!important;} .table_detail .head1{ display:none;} .table_detail .col-xs-3 {width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.1%; padding-top:0.1%;} .table_detail .l2{ font-size:9px; padding:0; padding-bottom:0%; padding-top:0%; } .table_detail .col-xs-2 { padding:0.8% 1%; width:20%;} .table_detail .l3{padding:1%;} table_detail .head1{padding-bottom:0.5%;} .tba{ width:90%; }.info p{line-height:1.2;} .check table{width:30%; float:left;} .study{margin-top:25%;}
		 } 
		 @media only screen and (min-width:530px) and (max-width: 580px){ body{font-size:12px;} .Header .img-responsive{width:40%}
		 .col-xs-3{ width:50%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:49%; } .col-xs-2 .text-box{height:25px; }  .xss{width:45%!important; font-size:12px;} .xss1{ width:45%; font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:90%; } .info p{line-height:1.2;} .check table{width:45%; float:left;} .study{margin-top:40%;}
		 } 
		 @media only screen and (min-width:445px) and (max-width: 530px){ body{font-size:14px; line-height:1;} .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .text-box{width:100%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:50%; margin-top:1%;  } .col-xs-2 .text-box{height:25px; } .xss{width:80%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:50%; }.info p{line-height:1.2;} .check table{width:95%; float:left;}
		 } 
		 @media only screen and (min-width:334px) and (max-width: 445px){ body{font-size:14px; line-height:1.5;} .tba{ width:100%; } .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:100%;} .col-xs-6 .text-box{ width:78%!important;  margin-left:-3%; } .col-xs-2{ width:95%; margin-top:1%;} .xss{width:100%!important; } .xss1{ width:100%;} .col-xs-2 li{ padding:2%;} .table1{font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .info p{line-height:1.2;} .check table{width:95%; float:left;} 
		 
		 }	
		  @media only screen and (min-width:240px) and (max-width: 334px){ body{font-size:14px; line-height:1;} .tba{ width:100%; } .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:3%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:80%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:95%; margin-top:1%;} .col-xs-2 .text-box{height:25px; } .xss{width:85%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;}.info p{line-height:1.2;} .check table{width:95%; float:left;}
		 }		 
		
		</style>
	</head>
<body>

<div id="container">
 <div class="row ">
  <div class="Header" align="center" ><img src="<?php echo $SchoolLogo; ?>" class="img-responsive"><br />
 
    <div class="table1">
	  <b><?php echo $SchoolAddress; ?></b><br />
	 <b> <?php echo $SchoolPhoneNo; ?></b><br />
	  <b> <?php echo $SchoolEmailId; ?></b>
	</div>
  </div>
 </div>
 <form name="frmNewStudent" id="frmNewStudent" method="post" action="Admin/StudentManagement/RegistrationFeePaymentCounter.php" enctype="multipart/form-data">
		<input type="hidden" name="hSibling" id="hSibling" value="No">
		<input type="hidden" name="hFatherAlumni" id="hFatherAlumni" value="No">
		<input type="hidden" name="hMotherAlumni" id="hMotherAlumni" value="No">
		<input type="hidden" name="hSingleParent" id="hSingleParent" value="No">
		<input type="hidden" name="hSpecialNeed" id="hSpecialNeed" value="No">
		<input type="hidden" name="hDPSStaff" id="hDPSStaff" value="No">
		<input type="hidden" name="hEWSCategory" id="hEWSCategory" value="No">
		<input type="hidden" name="hOtherCategory" id="hOtherCategory" value="No">
		<input type="hidden" name="txtOptionalSubject" id="txtOptionalSubject" value="">
 
  <div>&nbsp;</div>
  <div style="background-color: #0b462d; padding:2px 0; color:#FFFFFF;">
    <h4 align="center">REGISTRATION FORM (Session 2017 - 18)</h4>
  </div>
  <div class="info">
  	<h4>Parents are requested to note : </h4>
	<p><font size="+2">&raquo;</font>  This is not an Admission Form. Submission of this form does not guarantee admission to school.</p>
	<p><font size="+2">&raquo;</font>  This form is non-transferable and Registration fee is <strong>INR 25/-</strong> </p>
  </div>
  <div align="center" class="h h11"><b><font >Student Detail</font></b></div>
  <div>&nbsp;</div>
  <div class="row" >
  
  <div class="col-xs-3"> First Name of Applicant*: </div>
  <div class="col-xs-3"> <input name="txtName" id="txtName" type="text" class="text-box"> </div>
  <div class="col-xs-3 xs"> Last Name of Applicant:</div>
  <div class="col-xs-3 xs1"> <input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20"></div>  
 </div>
 <div class="row">
  <div class="col-xs-3"> Date of Birth*:<!--<br><font class="f">(mm/dd/yyyy)</font>--></div>
  <div class="col-xs-3"> <input name="txtDOB" id="txtDOB" type="date" class="text-box" placeholder="mm/dd/yyyy"></div>
  <div class="col-xs-3 xs"> Age as on*:<!--<br><font class="f"> (01.04.2016)</font>--></div>
  <div class="col-xs-3 xs1"> <input name="txtAge" id="txtAge" type="text" class="text-box" onClick="javascript:CalculateAgeInQC();" readonly placeholder="31-Mar-2017"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Place of Birth:</div>
  <div class="col-xs-3"> <input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text"></div>
  <div class="col-xs-3"> Gender*:</div>
  <div class="col-xs-3"> 
  	<select size="1" name="txtSex" id="txtSex" class="text-box tbs">
		<option selected value="">Select One</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select>
  </div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mother Tongue*: </div>
  <div class="col-xs-3"> <input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text"></div>
  <div class="col-xs-3"> Nationality: </div>
  <div class="col-xs-3"> <input name="txtNationality" id="txtNationality" type="text" class="text-box" value="Indian"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Class Applied For*:</div>
  <div class="col-xs-3"> 
  	<select name="cboClass" id="cboClass" class="text-box tbs" onChange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>
		
		<option value="Class_IX" selected>Class IX</option>
     	
	</select>
  </div>

  <div class="col-xs-3"> Last School Attended*: </div>
  <div class="col-xs-3"> <input name="txtLastSchool" id="txtLastSchool" type="text" class="text-box"></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Residential Address*: </div>
  <div class="col-xs-3 xs1"> <textarea name="txtAddress" id="txtAddress" class="text-box-address text-box tba" rows="2" ></textarea></div>
  <div class="col-xs-3">Residential Landline Number*:</div>
  <div class="col-xs-3"><input type="number" name="residentialno." id="residentialno" class="text-box tba"></div>
 </div>
 <div> &nbsp;</div>
 <div class="h h11" align="center"><strong> Family Details (Father / Mother / Guardian)</strong></div>
 <div>&nbsp;</div>
 <div align="center"><strong><u>Father's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Father's Name*:</div>
  <div class="col-xs-3"> <input name="txtFatherName" id="txtFatherName" type="text" class="text-box"></div>
  <div class="col-xs-3"> Father's Age:</div>
  <div class="col-xs-3"> <input name="txtFatherAge" id="txtFatherAge" class="text-box" type="text"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Father's Qualification*:<!--<br><font class="f">(Select Highest Qualification)</font>--></div>
  <div class="col-xs-3">
	<select size="1" name="txtFatherEducation" id="txtFatherEducation" class="text-box tbs">
		<option selected="selected" value="">Select Highest Qualification</option>
		<?php
			while($rowEdu = mysql_fetch_row($rsEducation))
			{
				$Qualification=$rowEdu[0];
		?>
		<option value="<?php echo $Qualification;?>"><?php echo $Qualification;?></option>
		<?php
			}
		?>
		
	</select>
  </div>
  <div class="col-xs-3"> Father's Highest Qualification’*: </div>
  <div class="col-xs-3"> <input name="txtFatherhighestqualification" id="txtFatherhighestqualification" type="text" class="text-box"></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Father's Designation: </div>
  <div class="col-xs-3 xs1"> <input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text"></div>
  <div class="col-xs-3"> Father's Occupation*: </div>
  <div class="col-xs-3"> <input name="txtFatherOccupation" id="txtFatherOccupation" type="text" class="text-box"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mobile No *:</div>
  <div class="col-xs-3"> <input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" ></div>
  <div class="col-xs-3"> Organization Name: </div>
  <div class="col-xs-3"> <input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Address: </div>
  <div class="col-xs-3"> <textarea name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box-address text-box" rows="2"></textarea></div>
  <div class="col-xs-3"> Email Id *:</div>
  <div class="col-xs-3"> <input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="text" ></div>
 </div>
 
 <div>&nbsp;</div>
 <div align="center"><strong><u>Mother's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Mother's Name*:</div>
  <div class="col-xs-3"> <input name="txtMotherName" id="txtMotherName" type="text" class="text-box"></div>
  <div class="col-xs-3"> Mother's Age:</div>
  <div class="col-xs-3"> <input name="txtMotherAge" id="txtMotherAge" class="text-box" type="text"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mother's Qualification*:<!--<br><font class="f">(Select Highest Qualification)</font>--> </div>
  <div class="col-xs-3">
	<select size="1" name="txtMotherEducation" id="txtMotherEducation" class="text-box tbs">
		<option selected="selected" value="">Select Highest Qualification</option>
		<?php
			while($rowEdu1 = mysql_fetch_row($rsEducation1))
			{
				$Qualification1=$rowEdu1[0];
		?>
		<option value="<?php echo $Qualification1;?>"><?php echo $Qualification1;?></option>
		<?php
			}
		?>
	</select>
  </div>
  <div class="col-xs-3"> Mother's Highest Qualification’*: </div>
  <div class="col-xs-3"> <input name="txtmotherhighestqualification" id="txtmotherhighestqualification" type="text" class="text-box"></div>	
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Mother's Designation: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3 xs1"> <input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text"></div>
  <div class="col-xs-3"> Mother's Occupation*: </div>
  <div class="col-xs-3"> <input name="txtMotherOccupation" id="txtMotherOccupation" class="text-box" type="text"> </div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mobile No.:</div>
  <div class="col-xs-3"> <input name="txtMotherMobileNo" id="txtFatherOfficialPhNo1" class="text-box" type="text" ></div>
  <div class="col-xs-3 xs"> Organization Name: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3 xs1"> <input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" class="text-box"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Office Address: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <textarea name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box-address text-box" rows="2"></textarea></div>
  <div class="col-xs-3"> Email id*:</div>
  <div class="col-xs-3"> <input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" type="email" ></div>
 </div>
 
 <div>&nbsp;</div>
 <div align="center"><strong><u>Guardian's Details (If Applicable)</u></strong></div>
 <div>&nbsp;</div>
 
 <div class="row">
  <div class="col-xs-3"> Guardian's Name:</div>
  <div class="col-xs-3"> <input name="txtGuradianName" id="txtGuradianName" type="text" class="text-box" ></div>
  <div class="col-xs-3"> Guardian's Age: </div>
  <div class="col-xs-3"> <input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Guardian's Qualification:</div>
  <div class="col-xs-3"> <input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" class="text-box" ></div>
  <div class="col-xs-3"> Guardian's Occupation: </div>
  <div class="col-xs-3"> <input name="txtGuradianOccupation" id="txtGuradianOccupation" class="text-box" type="text" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Guardian's Designation:<br><font class="f"> (If employed)</font></div>
  <div class="col-xs-3"> <input name="txtGuradianDesignation" id="txtMotherDesignation0" class="text-box" type="text" ></div>
  <div class="col-xs-3 xs"> Organization Name:<br><font class="f">(If employed)</font></div>
  <div class="col-xs-3 xs1"> <input name="txtGuradianCompanyName" id="txtMotherCompanyName0" type="text" class="text-box" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Residence Landline. No: </div>
  <div class="col-xs-3 xs1"> <input name="txtGuradianOfficialPhNo" id="txtMotherOfficialPhNo0" class="text-box" type="text" ></div>
  <div class="col-xs-3"> Mobile No.:</div>
  <div class="col-xs-3"> <input name="txtGuradianMobileNo" id="txtFatherOfficialPhNo4" class="text-box" type="text" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Office Address:<br><font class="f">(If employed):</font></div>
  <div class="col-xs-3 xs1"> <textarea name="txtGuradianOfficialAddress" id="txtMotherOfficialAddress0" class="text-box-address text-box" class="text-box-address" rows="2"></textarea> </div>
  <div class="col-xs-3 xs"> Office Address:<br><font class="f">(If employed):</font></div>
  <div class="col-xs-3 xs1"> <textarea name="txtGuradianOfficialAddress" id="txtMotherOfficialAddress0" class="text-box-address text-box" class="text-box-address" rows="2"></textarea> </div>
  </div>
 <div class="row">
  <div class="col-xs-3"> Email id*:</div>
  <div class="col-xs-3"> <input name="txtguardianEmailId" id="txtguardianEmailId" class="text-box" type="email" ></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Category</strong>*
		<i>(Please select the relevant Category / Categories and fill the details as applicable. 
		If you do not fall into any category, please select others. Parents are required to produce 
		the relevant documents at the time of admission. In case the documents are not produced, the candidature will be rejected)</i>
 </div>
 <div>&nbsp;</div>
 <div class="check check1" >
  <table>
   <tr> <td><input name="chkSibling" id="chkSibling" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkSibling');"></td> 
   		<td class="col1"><strong>Sibling(s) studying in DPS</strong></td> </tr>
   <tr><td><input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkOtherCategory');"></td>
   		<td><strong>SC</strong></td> </tr>
  </table>
  <table>
   <tr> <td><input name="chkFatherAlumni" id="chkFatherAlumni" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkFatherAlumni');"></td> 
   		<td class="col1"><strong>Father DPS  Core Alumni</strong></td> </tr>
   <tr><td><input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkOtherCategory');"></td>
   		<td><strong>ST</strong></td> </tr>
  </table>
  <table> 
   <tr> <td><input name="chkMotherAlumni" id="chkMotherAlumni" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkMotherAlumni');"></td>
   		<td class="col1"><strong>Mother DPS  Core Alumni</strong></td>  </tr>
   <tr><td><input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkOtherCategory');"></td>
   		<td><strong>OBC</strong></td> </tr>
  </table>
  <table>
   <tr> <td><input name="chkDPSStaff" id="chkDPSStaff" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkDPSStaff');"></td>
   		<td class="col1"><strong>DPS Rohini  Staff</strong></td> </tr>
   <tr><td><input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkOtherCategory');"></td>
        <td class="col1"><strong>Any Other (Specify)</strong></td> </tr>
  </table>
  <table>
   <tr><td><input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkOtherCategory');"></td>
   		<td class="col1"><strong>Other DPS  Staff</strong></td> </tr>
  </table> 
 </div> 
 
 <div>&nbsp;</div>
 <div class="study">
 <div align="center">
        <strong>Details of Sibling(s) studying in <?php echo $SchoolName; ?>, 
		</strong> <p>(If there is more than one sibling, mention all)</p>
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" readonly> </div>
  <div class="col-xs-3"> Brother / Sister's Class:</div>
  <div class="col-xs-3"> 
  		<select name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box tbs" readonly>
        	<option value="">Select One</option>
            <option value=""></option>
        </select>
  </div>
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" type="text" readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" readonly> </div>
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> 
  		<select name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box tbs" readonly>
        	<option value="">Select One</option>
            <option value=""></option>
        </select>
  </div>
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" type="text" readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" readonly> </div>
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> 
  		<select name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box tbs" readonly>
        	<option value="">Select One</option>
            <option value=""></option>
        </select>
  </div>
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" type="text" readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 </div>
 
 <div>&nbsp;</div>
 <div class="h" align="center"><font style="text-transform:uppercase">Details of Father / Mother, if Alumni of </font><?php echo $SchoolName; ?> </div>
 <div>&nbsp;</div>
 
 <div align="center"><strong><u> Father Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Father:</div>
  <div class="col-xs-3"> <input name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" type="text" readonly></div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> 
  	<select name="txtDPSSchoolName" id="txtDPSSchoolName" disabled="disabled" class="text-box tbs">
		<option value="" selected="selected">Select One</option>
		
	</select>
  </div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" size="20" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> 
  	<select size="1" name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box tbs" disabled="disabled">
		<option selected value="">Select One</option>
		<option value="10th">10th</option>
		<option value="12th">12th</option>
	</select>
  </div>
 </div>
 
 <div>&nbsp; </div>
 <div align="center"><strong><u>Mother Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Mother:</div>
  <div class="col-xs-3"> <input name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" type="text" readonly> </div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> 
    <select name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" disabled="disabled" class="text-box tbs">
		<option value="" selected="selected">Select One</option>
		

	</select>
  </div>
 </div>
 <div class="row">	
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" type="text" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> 
    <select size="1" name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box tbs" disabled="disabled">
		<option selected value="">Select One</option>
		<option value="10th">10th</option>
		<option value="12th">12th</option>
	</select>
  </div>
 </div>
 
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Contact details for all admission related information.</strong> </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Contact Person Name*:</div>
  <div class="col-xs-3"> <input name="txtcontactpersonname" id="txtcontactpersonname"  class="text-box" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" type="text"></div>
  <div class="col-xs-3"> Mobile No*:</div>
  <div class="col-xs-3"> <input name="txtMobile" id="txtMobile" type="text" class="text-box" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" ></div>
 
  <div class="col-xs-3"> E-mail Id*:</div>
  <div class="col-xs-3"> <input name="txtemail" id="txtemail" type="text" class="text-box"></div>
  <div class="col-xs-6">&nbsp;</div> 
 </div>
 
 <div>&nbsp;</div>
 <div class="h" align="center"><strong> Documents to be Uploaded <p>(Please note maximum file size allowed is 250 Kb.)</p> </strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 1. Copy of Birth Certificate issued by Municipal Corporation* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F1" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 2. Photograph of Applicant* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F2" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 3. Photograph of Father* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F3" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 4. Photograph of Mother* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F4" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 5. Copy Of ST/SC/OBC Certificate* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F5" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 6. Proof of Parent being DPS Staff* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F6" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 7. Proof of Parent being DPS Core Alumni* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F7" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 8. Proof of Any Other Category* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F8" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 9. Previous Class Score Card*:</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F9" ></div>
 </div>

 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-12" style="padding:0 4%;"><strong>Declaration:</strong>
    <p><b>1.</b>I understand that the registration fee of <span style="font-weight: 400">INR 25</span>/- (IX Class) 
		( as applicable ) is towards the processing fee for the admission process. It is 
		non-refundable and registration does not guarantee admission.</p>
	<p><b>2.</b> I understand that rendering false / incorrect or misleading 
		information shall disqualify the applicant for admission to this school and 
		also that an incomplete form will be rejected without assigning any reason.</p>
	<p><b>3.</b> I have carefully read the rules, regulations and procedures laid 
		down by the school and being desirous of having my child / ward educated 
		in <?php echo $SchoolName; ?>, I hereby agree to abide by them in all respects. I 
		understand that the decision of the management of the School shall be 
		final and binding on me for which I will not file any objection / case 
		in any court of law anywhere in India.</p>
	<p><b>4.</b> I hereby certify that my ward and I shall 
		follow all the rules, regulations and procedures laid down by the School 
		from time to time.</p>
	<p><b>5.</b> I hereby put my signatures to confirm the 
		above declarations.</p>
  </div>
 </div>
 
 <div class="row" style="padding-left:3%;">
  <div class="col-xs-3"><b>Place :</b></div>
  <div class="col-xs-3"> <input type="text" name="T1" class="text-box" > </div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div class="row" style="padding-left:3%;"> 
  <div class="col-xs-3"><b> Date :</b> </div>
  <div class="col-xs-3"><?php echo $currentdate;?></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 
 <div class="col-xs-12" align="center"> <input name="BtnSubmit" type="button" value="I Agree" onClick="Validate();" ></div>
</div>
<div>&nbsp;</div>

</form>
</div>

</body>
</html>