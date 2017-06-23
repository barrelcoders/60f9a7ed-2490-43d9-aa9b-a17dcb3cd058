<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
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

$rsSchooListFather=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");
$rsSchooListMother=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");

$rsLocation=mysql_query("select distinct `Sector` from `NewStudentRegistrationDistanceMaster` order by `Sector`");

$currentdate=date("d-m-Y");

	$ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";

	$rsRoute= mysql_query($ssqlRoute);
	
	/*
	$ssqlRegi="SELECT max(CAST(`RegistrationNo` AS SIGNED INTEGER)) FROM `NewStudentRegistration`";	
	$rsRegiNo= mysql_query($ssqlRegi);

	if (mysql_num_rows($rsRegiNo) > 0)
	{
		while($row2 = mysql_fetch_row($rsRegiNo))
		{

					$NewRistrationNo=$row2[0]+1;

		}
	}
	else
	{
		$ssqlRegi="SELECT max(CAST(`sadmission` AS SIGNED INTEGER))+1 FROM `student_master`";	
		$rsRegiNo= mysql_query($ssqlRegi);
		if (mysql_num_rows($rsRegiNo) > 0)
		{
			while($row2 = mysql_fetch_row($rsRegiNo))
			{	
						$NewRistrationNo=$row2[0];	
			}
		}
	}
	*/

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
	
	//if(document.getElementById("txtLastSchool").value.trim()=="")
	//{
	//	alert("Last School is mandatory!");
	//	return;
	//}
	
	//if(document.getElementById("hSibling").value=="Yes")
	//{
	//	if(document.getElementById("txtRealBroSisName").value.trim()=="" || document.getElementById("txtRealBroSisClass").value.trim()=="" || document.getElementById("txtRealBroSisSchoolName").value.trim()=="")
	//	{
	//		alert("Please enter the details of Sibling currently studying in DPS");
	//		return;
	//	}
	//}
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
	//if(document.getElementById("txtFatherAnnualIncome").value.trim()=="")
	//{
	//	alert("Father's annual income!");
	//	return;
	//}
	
	/*
	if(document.getElementById("txtFatherAge").value=="")
	{
		alert("Falter's Age is mandatory!");
		return;
	}
	*/
	//if(document.getElementById("txtFatherEducation").value.trim()=="")
	//{
	//	alert("Father's Education is mandatory!");
	////	return;
//	}
//	if(document.getElementById("cboDuration").value.trim()=="")
	//{
	//	alert("Father's Qualification Duration is mandatory!");
	//	return;
//	}
	//if(document.getElementById("txtFatherOccupation").value.trim()=="")
	//{
	//	alert("Father's occupation is mandatory!");
	//	return;
	//}
	
	//if(document.getElementById("txtFatherMobileNo").value.trim()=="")
	//{
	//	alert("Father's Mobile No is mandatory!");
	//	return;
	//}
	//if(document.getElementById("txtFatherEmailId").value.trim()=="")
	//{
	//	alert("Father's Email Id is mandatory!");
	//	return;
//	}
	
	//if(document.getElementById("txtMotherName").value.trim()=="")
	//{
	//	alert("Mother's Name is mandatory!");
	//	return;
	//}
	
	//if(document.getElementById("txtMotherEducation").value.trim()=="")
	//{
	//	alert("Mother's Education is mandatory!");
	//	return;
	//}
//	if(document.getElementById("cboMotherQualificationDuration").value.trim()=="")
//	{
//		alert("Mother's Qualification Duration is mandatory!");
//		return;
//	}
	
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
//	if(document.getElementById("txtEmergencyNo").value.trim()=="")
//	{
//		alert("Emergency Contact No is mandatory!");
//		return;
//	}
//	if(document.getElementById("txtMobile").value.trim()=="")
//	{
//		alert("Mobile No is mandatory!");
//		return;
//	}
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
//	if(document.getElementById("txtemail").value.trim()=="")
//	{
//		alert("Email is mandatory!");
//		return;
//	}
//	if(document.frmNewStudent.F1.value=="")
//	{
//		alert("Birth Certificate Photo is mandatory!");
//		return;
//	}
//	if(document.frmNewStudent.F2.value=="")
//	{
//		alert("Child Photograph is mandatory!");
//		return;
//	}
//	if(document.getElementById("cboClass").value !="Nursery")
//	{
	//	if(document.frmNewStudent.F3.value=="")
	//	{
	//		alert("Previous Class Score Card is mandatory!");
	//		return;
	//	}
	//}
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
			
			document.getElementById("txtRealBroSisName").readOnly=true;
			document.getElementById("txtRealBroSisClass").readOnly=true;
			document.getElementById("txtRealBroSisSchoolName").readOnly=true;
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
			if(document.getElementById("hDPSStaff").value=="Yes" || document.getElementById("hSpecialNeed").value=="Yes" || document.getElementById("hSingleParent").value==="Yes" || document.getElementById("hMotherAlumni").value=="Yes" || document.getElementById("hFatherAlumni").value=="Yes" || document.getElementById("hSibling").value=="Yes" || document.getElementById("hEWSCategory").value=="Yes")
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



.style27 {
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



.style31 {
	border-style: none;
	border-width: medium;
	text-align: right;
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
<font face="Cambria" style="font-size: 14pt"><strong>REGISTRATION 
FORM (Session 2016 - 17)</strong></font></p>
<p  style="height: 12px" align="left"><strong><font face="Cambria">Parents are 
requested to note:</font></strong></p>
<ul>
	<li>
	<p  style="height: 12px" align="left"><strong style="font-weight: 400">
	<font face="Cambria">This is not 
an Admission Form. Submission of this form does not guarantee admission to 
School.</font></strong></p></li>
	<li>
	<p  style="height: 12px" align="left">
	<font face="Cambria"><strong style="font-weight: 400">
	This form is 
non-transferable and Registration Fee is </strong><strong>INR 750/-(1 to IX and 
	XI).</strong></font></p>
	</li>
</ul>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
		</table>
	<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">
	<form name="frmNewStudent" id="frmNewStudent" method="post" action="RegistrationFeePaymentCounter.php" enctype="multipart/form-data">
		<input type="hidden" name="hSibling" id="hSibling" value="No">
		<input type="hidden" name="hFatherAlumni" id="hFatherAlumni" value="No">
		<input type="hidden" name="hMotherAlumni" id="hMotherAlumni" value="No">
		<input type="hidden" name="hSingleParent" id="hSingleParent" value="No">
		<input type="hidden" name="hSpecialNeed" id="hSpecialNeed" value="No">
		<input type="hidden" name="hDPSStaff" id="hDPSStaff" value="No">
		<input type="hidden" name="hEWSCategory" id="hEWSCategory" value="No">
		<input type="hidden" name="hOtherCategory" id="hOtherCategory" value="No">
		<input type="hidden" name="txtOptionalSubject" id="txtOptionalSubject" value="">
		<tr>
		<td style="height: 10; border-top-style:solid; border-top-width:1px" class="style28">
		<font face="Cambria">
		<strong>Student Details:</strong></font></td>

		<font face="Cambria">
		<br class="auto-style31">

		<br class="auto-style31">
		</font>

		</tr>


		<tr>



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



				<td style="width: 16%" class="auto-style11">

		<span class="auto-style21"><font face="Cambria">1. First Name of Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span><span class="auto-style18"><font face="Cambria">
		</font>

				</span>







				</td>



				<td style="width: 16%" class="auto-style11">

		<font face="Cambria">

		<input name="txtName" id="txtName" type="text" class="text-box"></font></td>
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







		<input name="txtDOB" id="txtDOB" type="text" class="tcal" readonly="readonly"></font></td>



				<td style="width: 263px" class="auto-style11" colspan="2">







				&nbsp;</td>



				<td style="width: 223px" class="auto-style19">







				<font face="Cambria">3. Place of Birth</font><span style="color: #000000" class="auto-style33"><font face="Cambria">:</font></span></td>



				<td style="width: 20%" class="auto-style41">







				<font face="Cambria">







				<input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text"></font></td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







				<span class="auto-style21"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp; 
				Last Name of Applicant</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>



				<td style="width: 16%" class="auto-style11">







				<font face="Cambria">

		<input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20"></font></td>



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







				<span class="auto-style21"><font face="Cambria">4. Age as on 
				(01.04.2016)*

				</font>

				<span style="color: #000000" class="auto-style33">



				<font face="Cambria">:</font></span></span></td>



				<td style="width: 16%" class="auto-style11">


				<font face="Cambria">

				<input name="txtAge" id="txtAge" type="text" class="text-box" onclick="javascript:CalculateAgeInQC();" readonly="readonly"></font></td>
				<td style="width: 3%" class="auto-style11">
				&nbsp;</td>
				<td style="width: 159px" class="auto-style11" colspan="2">
				<span class="auto-style33"><font face="Cambria">5</font></span><span style="color: #000000" class="auto-style33"><font face="Cambria">. Gender*:</font></span><span class="auto-style31"><font size="3" face="Cambria"> </font>







				</span>







				</td>



				<td style="width: 13%" class="auto-style11">







		<select size="1" name="txtSex" id="txtSex" class="text-box">
		<option selected value="">Select One</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		</select></td>



				<td style="width: 263px" class="auto-style11" colspan="2">

				&nbsp;</td>
				<td class="auto-style19">

				<span style="color: #000000" class="auto-style33">

				<font face="Cambria">6. Mother Tongue*



				:</font></span></td>



				<td class="auto-style19">







				<font face="Cambria">







				<input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text"></font></td>



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







		<span class="auto-style21"><font face="Cambria">7. Nationality</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 16%" class="auto-style11">







		<font face="Cambria">







		<input name="txtNationality" id="txtNationality" type="text" class="text-box" value="Indian"></font></td>



				<td style="width: 3%" class="auto-style11">







				&nbsp;</td>



				<td style="width: 159px" class="auto-style19" colspan="2">







		<font face="Cambria">8. Class

				</font>

				<span style="color: #000000" class="auto-style33">



				<font face="Cambria">Applied For*:</font></span></td>



				<td class="auto-style11">







				<strong><em style="font-style: normal">







				<font face="Cambria">







		<select name="cboClass" id="cboClass" class="text-box" onchange="Javascript:GetFeeDetail();" size="1">
		<option selected="" value="Select One">Select One</option>

		
		<option value="1">1st</option>
		<option value="2">2nd</option>
		<option value="3">3rd</option>
		<option value="4">4th</option>
		<option value="5">5th</option>
		<option value="6">6th</option>
		<option value="7">7th</option>
		<option value="8">8th</option>
		<option value="9">9th</option>


		
		<option value="Nursery">Nursery</option>

	<option value="Prep">Prep</option>

				
		

		<option value="11th">11th</option>

		

		</select></font></em></strong></td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



				<td class="auto-style11" id="tdSelectStream" style="display: none;">
				<span class="auto-style33">
				<font face="Cambria"><span style="color: #000000">Select Stream*:</span></font></span>
				</td>
				<td class="auto-style11" id="tdStream" style="display: none;">
				<select size="1" name="cboStream" id="cboStream" class="text-box" onchange="javascript:fnlMandatoruShowHide();">
				<option value="">Select One</option>
				<option value="Medical">Medical</option>
				<option value="Non-Medical">Non-Medical</option>
				<option value="Commerce">Commerce</option>
				<option value="Humanities">Humanities</option>
				</select></td>



			</tr>

			<tr id="trOptionalSubject" style="display: none;">
				<td style="width: 16%" class="auto-style11">
		&nbsp;</td>
				<td class="style31" colspan="4" valign="top">


		&nbsp;</td>



				<td class="style32" colspan="2" valign="top" >
		&nbsp;</td>
	<td class="style32" colspan="2" valign="top" id="tdMandatorySubject">
				</td>
				<td style="width: 20%" class="style32">


		<span class="style34"><font face="Cambria"><strong>Optional Subjects 
		(Select Any Two Only):</strong></font><strong><br>
				</strong></span>
				<br>
				<select size="10" name="cboOptionalSubject" id="cboOptionalSubject" multiple="multiple" onclick="fnlSelectionCheck();">
				<option value="Economics">Economics</option>
				<option value="Economics">Maths</option>
				<option value="Informatic Practices">Informatic Practices
				</option>
				<option value="Computer Science">Computer Science</option>
				<option value="Physical Education">Physical Education</option>
				<option value="Psychology">Psychology</option>
				<option value="Entrepreneurship">Entrepreneurship</option>
				<option value="Fine Arts">Fine Arts</option>
				<option value="French">French</option>
				</select><br>
				<span class="style33"><strong><br>
				Press ctrl button for multiple selection</strong></span></td>



			</tr>



			<tr>



				<td style="width: 16%" class="auto-style11">







				<font face="Cambria">9. Last School Attended*:</font></td>



				<td class="auto-style11" colspan="9" align="left">







				<font face="Cambria">







		<input name="txtLastSchool" id="txtLastSchool" type="text" class="text-box"></font></td>



			</tr>



			<tr>



				<td class="auto-style11" colspan="10">

				</td>



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







				<textarea name="txtAddress" id="txtAddress"class="text-box-address" rows="3" cols="45"></textarea></font></td>



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



			<tr>



				<td style="width: 16%" class="style35">







		12. Hostel Facility required:</td>



				<td class="auto-style11" colspan="8">







		<select name="cboHostelFacility" id="cboHostelFacility">
		<option selected="" value="No">No</option>
		<option value="Yes">Yes</option>
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







		<span class="auto-style21"><font face="Cambria">Father's Name*</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherName" id="txtFatherName" type="text" class="text-box"></font></td>



				<td style="width: 157px" class="auto-style11">







		&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















		&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Age:</font></span></td>



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







		<span class="auto-style25">Father's Qualification*:<br>







		<span class="style26"><strong>(Select Highest Qualification)</strong></span></span></font></td>



				<td style="width: 172px" class="auto-style11">















		<select size="1" name="txtFatherEducation" id="txtFatherEducation" class="text-box">
		<option selected="selected" value="">Select One</option>
		<?php
			while($rowEdu = mysql_fetch_row($rsEducation))
			{
				$Qualification=$rowEdu[0];
		?>
		<option value="<?php echo $Qualification;?>"><?php echo $Qualification;?></option>
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







		<span class="auto-style25"><font face="Cambria">Father's Occupation*:</font></span></td>



				<td style="width: 158px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" class="text-box"></font></td>



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







		<span class="auto-style25"><font face="Cambria">Father's Designation:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style25"><font face="Cambria">Father's Annual Income*:</font></span></td>



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















		<input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" size="20"></font></td>



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















		<input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="text" size="20"></font></td>



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







		<span class="auto-style21"><font face="Cambria">Mother's Name</font></span><span style="color: #000000" class="auto-style20"><font face="Cambria">*:</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherName" id="txtMotherName" type="text" class="text-box"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Age:</font></span></td>



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







		<span class="auto-style25">Mother's Qualification*:<br></span>







		<span class="style26"><strong>(Select Highest Qualification)</strong></span></font></td>



				<td style="width: 172px" class="auto-style11">















		
		
		<select size="1" name="txtMotherEducation" id="txtMotherEducation" class="text-box">
		<option selected="selected" value="">Select One</option>
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







		<span class="auto-style21"><font face="Cambria">Mother's Occupation*:</font></span></td>



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







		<span class="auto-style21"><font face="Cambria">Mother's Designation <br>(If 
		employed):</font></span></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text"></font></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Mother's Annual Income<br> 
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







		<font face="Cambria">Email id*:</font></td>



				<td style="width: 172px" class="auto-style11">















		<font face="Cambria">















		<input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" type="text" size="20"></font></td>



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







		<span class="style30">Residence</span><span class="auto-style21"><font face="Cambria"> Address 
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







		<font face="Cambria"><b>14. </b>School Transport required</font></td>



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
				<td class="auto-style11" colspan="6" bgcolor="#A9D0F5">
		<font face="Cambria"><strong>15. Category</strong></font><span style="color: #000000" class="auto-style33"><font face="Cambria">*
		<i>(Please select the relevant Category / Categories and fill the details as applicable. 
		If you do not fall into any category, please select Others. Parents are required to produce 
		the relevant documents at the time of Admission. In case the documents are not produced, the candidature will be rejected)</i></font></span>
		</td>
				</tr>
			<tr>



				<td class="auto-style11" colspan="6">

		<table style="width: 100%" cellpadding="0" class="style15">
			<tr>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>Sibling(s) Studying in DPS</strong></td>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>Father DPS Alumni</strong></td>
				<td style="border-style:solid; border-width:1px; width: 178px; background-color:#FFFFFF" class="style24"><strong>Mother DPS Alumni</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style22">S<span class="style25"><strong>ingle 
				Parent</strong></span></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>Special Needs</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>DPS 
				Fbd. Staff</strong></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24">
				<b>EWS</b></td>
				<td style="border-style:solid; border-width:1px; width: 179px; background-color:#FFFFFF" class="style24"><strong>Others</strong></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkSibling" id="chkSibling" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkSibling');"></td>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkFatherAlumni" id="chkFatherAlumni" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkFatherAlumni');"></td>
				<td style="border-style:solid; border-width:1px; width: 178px" class="style23">
				<input name="chkMotherAlumni" id="chkMotherAlumni" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkMotherAlumni');"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkSingleParent" id="chkSingleParent" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkSingleParent');"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkSpecialNeed" id="chkSpecialNeed" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkSpecialNeed');"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkDPSStaff" id="chkDPSStaff" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkDPSStaff');"></td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkEWSCategory" id="chkEWSCategory" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkEWSCategory');">
				</td>
				<td style="border-style:solid; border-width:1px; width: 179px" class="style23">
				<input name="chkOtherCategory" id="chkOtherCategory" type="checkbox" value="1" onclick="javascript:fnlChkCategory('chkOtherCategory');"></td>
			</tr>
		</table>
		</td>



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



				<td class="auto-style11" colspan="6">







		<font face="Cambria"><b>16.</b> <strong>Details of Sibling(s) studying in <?php echo $SchoolName; ?>, 
		FARIDABAD (If there is more than one sibling, mention any one)</strong></font></td>



			</tr>
			<tr>



				<td style="width: 212px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Brother / Sister's Name:</font></span></td>



				<td class="auto-style11" colspan="2">















		<font face="Cambria">















		<input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" readonly="readonly"></font></td>



				<td style="width: 28px" class="auto-style11">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11">







		<span class="auto-style21"><font face="Cambria">Brother / Sister's Class:</font></span></td>



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







		<span class="auto-style21"><font face="Cambria">Brother / Sister's 
		Adm. 
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
			


			<tr>



				<td style="border-top-style:none; border-top-width:medium" class="auto-style11" height="23" colspan="6">







		<font face="Cambria"><b>17. Details of Father / Mother, if Alumni of <?php echo $SchoolName; ?></b></font></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td class="auto-style11" height="23" colspan="6">







		<u><b><font face="Cambria">Father Alumni Details:</font></b></u></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Name of Father</font></td>



				<td style="width: 172px" class="auto-style11" height="23">















		<font face="Cambria">















		<input name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" type="text" size="20" readonly="readonly"></font></td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		<font face="Cambria">Name of DPS Branch</font></td>



				<td style="width: 158px" class="auto-style11" height="23">















		<font face="Cambria">

		<!--<input name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" type="text" size="20" readonly="readonly">-->
		</font>
		<select name="txtDPSSchoolName" id="txtDPSSchoolName" disabled="disabled" class="text-box">
		<option value="" selected="selected">Select One</option>
		<?php
			while($rowSchoolList = mysql_fetch_row($rsSchooListFather))
			{
				$SchoolList=$rowSchoolList [0];
		?>
		<option value="<?php echo $SchoolList;?>"><?php echo $SchoolList;?></option>
		<?php
			}
		?>
		</select></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">















		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Passout Year</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<font face="Cambria">
		<input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" size="20" readonly="readonly"></font></td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Last Passout Class</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<font face="Cambria">
		<select size="1" name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box" disabled="disabled">
		<option selected value="">Select One</option>
		<option value="10th">10th</option>
		<option value="12th">12th</option>
		</select></font></td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<u><font face="Cambria"><b>Mother Alumni Details:</b></font></u></td>



				<td style="width: 172px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>
				<td style="width: 28px" class="auto-style11" height="23">
				&nbsp;</td>
				<td style="width: 217px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">
		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Name of Mother</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<input name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" type="text" size="20" readonly="readonly">
		</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>
				<td style="width: 28px" class="auto-style11" height="23">
				&nbsp;</td>
				<td style="width: 217px" class="auto-style11" height="23">
		<font face="Cambria">Name of DPS Branch</font></td>



				<td style="width: 158px" class="auto-style11" height="23">
		<!--<input name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" type="text" size="20" readonly="readonly">-->
		<select name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" disabled="disabled" class="text-box">
		<option value="" selected="selected">Select One</option>
		<?php
			while($rowSchoolList = mysql_fetch_row($rsSchooListMother))
			{
				$SchoolList=$rowSchoolList[0];
		?>
		<option value="<?php echo $SchoolList;?>"><?php echo $SchoolList;?></option>
		<?php
			}
		?>
		</select>
		
			</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 172px" class="auto-style11" height="23">
		&nbsp;</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 217px" class="auto-style11" height="23">







		&nbsp;</td>



				<td style="width: 158px" class="auto-style11" height="23">















		&nbsp;</td>



			</tr>
			


			<tr>



				<td style="width: 212px" class="auto-style11" height="23">







		<font face="Cambria">Passout Year</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" type="text" size="20" readonly="readonly">
		</td>



				<td style="width: 157px" class="auto-style11" height="23">







				&nbsp;</td>



				<td style="width: 28px" class="auto-style11" height="23">















				&nbsp;</td>



				<td style="width: 212px" class="auto-style11" height="23">
		<font face="Cambria">Last Passout Class</font></td>



				<td style="width: 172px" class="auto-style11" height="23">
		<font face="Cambria">
		<select size="1" name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box" disabled="disabled">
		<option selected value="">Select One</option>
		<option value="10th">10th</option>
		<option value="12th">12th</option>
		</select></font></td>



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







		<strong>18. Contact Details for all Admission Related Information:</strong></font></td>







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

		</tr>


		<tr>



		<td style="border-top-width: 1px">
		<b><font face="Cambria">19. Documents to be Uploaded: <span class="style27">
		(Please note maximum file size allowed is 250 Kb.)</span></font></b><p>
		<font face="Cambria">1. Copy of Birth Certificate issued by Municipal Corporation* : <input type="file" name="F1" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font><p>
		<font face="Cambria">2. Photograph of Applicant* :<input type="file" name="F2" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font>
		<p>
		<font face="Cambria">3. Previous Class Score Card (Applicable Only for 
		Admission to Class Prep to IX and Class XIth) :<input type="file" name="F3" size="20"></font>
		</td>

</tr>



		<tr>



		<td style="border-bottom-width: 1px">
		&nbsp;</td>


</tr>



		<tr>



		<td style="border-bottom-width: 1px">
		&nbsp;</td>


</tr>



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
				<input type="text" name="txtEnglishMarks" id="txtEnglishMarks" size="20"></td>
				<td width="295" align="center" style="height: 27px">
				<input type="text" name="txtEnglishGradePoint" id="txtEnglishGradePoint" size="20"></td>
				<td width="295" align="center" style="height: 27px">
				<input type="text" name="txtEnglishMarksPercent" id="txtEnglishMarksPercent" size="20"></td>
			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">2</font></b></td>
				<td width="362"><font face="Cambria"><b>Maths</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtMathsMarks" id="txtMathsMarks" size="20"></td>
				<td width="295" align="center">
				<input type="text" name="txtMathsGradePoints" id="txtMathsGradePoints" size="20"></td>
				<td width="295" align="center">
				<input type="text" name="txtMathsMarksPercent" id="txtMathsMarksPercent" size="20"></td>
			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">3</font></b></td>
				<td width="362"><font face="Cambria"><b>General Science</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtGeneralScience" size="20" id="txtGeneralScience"></td>
				<td width="295" align="center">
				<input type="text" name="txtScienceGradePoint" id="txtScienceGradePoint" size="20"></td>
				<td width="295" align="center">
				<input type="text" name="txtScienceMarksPercent" id="txtScienceMarksPercent" size="20"></td>
			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">4</font></b></td>
				<td width="362"><font face="Cambria"><b>Social Science</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtSocialScience" size="20" id="txtSocialScience"></td>
				<td width="295" align="center"> 
				<input type="text" name="txtSocialScienceMarksPercent" id="txtSocialScienceMarksPercent" size="20" style="height: 22px"></td>
				<td width="295" align="center">
				<input type="text" name="txtSocialScienceGradePoints" id="txtSocialScienceGradePoints" size="20"></td>

			</tr>
			<tr>
				<td width="61" align="center"><b><font face="Cambria">5</font></b></td>
				<td width="362"><font face="Cambria"><b>Hindi / Sanskrit / 
				French / Other Language</b></font></td>
				<td width="295" align="center">
				<input type="text" name="txtLanguageMarks" id="txtLanguageMarks"  size="20"></td>
				<td width="295" align="center">
				<input type="text" name="txtLanguageGradePoint" id="txtLanguageGradePoint" size="20"></td>
				<td width="295" align="center">
				<input type="text" name="txtLanguageMarksPercent" id="txtLanguageMarksPercent" size="20"></td>
			</tr>
		</table>
		</td>


</tr>



		<tr>
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;">
		&nbsp;</td>


</tr>



		<tr>
		<td style="border-top-style: solid; border-top-width: 1px; width: 100%;">
		<u><b><font face="Cambria">Declaration:</font></b></u><p>
		<font face="Cambria">1. I understand that the registration fee of 
		<span style="font-weight: 400">
		INR 500</span>/- 
	(NURSERY) &amp; INR 750/-(Prep to IX) 
		( as applicable ) is towards the processing fee for the admission process. It is 
		non-refundable and registration does not guarantee admission.</font></p>
		<p><font face="Cambria">2. I understand that rendering false / incorrect or misleading 
		information shall disqualify the applicant for admission to this school and 
		also that an incomplete form will be rejected without assigning any reason.</font></p>
		<p><font face="Cambria">3. I have carefully read the rules, regulations and procedures laid 
		down by the school and being desirous of having my child / ward educated 
		in <?php echo $SchoolName; ?>, FARIDABAD, I hereby agree to abide by them in all respects. I 
		understand that the decision of the management of the School shall be 
		final and binding on me for which I will not file any objection / case 
		in any court of law anywhere in India.</font></p>
		<p><font face="Cambria">4. I hereby certify that my ward and I shall 
		follow all the rules, regulations and procedures laid down by the School 
		from time to time.</font></p>
		<p><font face="Cambria">5. I hereby put my signatures to confirm the 
		above declarations.</font></p>
		<p><font face="Cambria"><b>Place</b></font> :
		<input type="text" name="T1" size="20"><p><b><font face="Cambria">Date :<?php echo $currentdate;?>
		</font></b>
		<p>&nbsp;</td>


</tr>



		<tr>



		<td>
		<p align="center">


		<font face="Cambria">
		<input name="BtnSubmit" type="button" value="I Agree" onclick="Validate();" style="font-weight: 700" class="text-box">
		</font>
		</td>


</tr>



<tr>



		<td style="height: 29px" class="style7">

		&nbsp;</td>


	</tr>

<tr>
		<td style="height: 29px" class="style7">


		&nbsp;</td>

	</tr>


	</form>


</table>


<!--
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>

-->


</body>
</html>