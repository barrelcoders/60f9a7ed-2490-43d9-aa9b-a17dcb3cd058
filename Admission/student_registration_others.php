<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>


<?php
$currentdate=date("d-m-Y");

$rsfatherBusiness=mysql_query("SELECT distinct `catagory` FROM `Business_master`");
$rsmotherBusiness=mysql_query("SELECT distinct `catagory` FROM `Business_master`");
$rsguardianBusiness=mysql_query("SELECT distinct `catagory` FROM `Business_master`");

$rsfatherProfession=mysql_query("SELECT distinct `catagory` FROM `professional_master`");
$rsmotherProfession=mysql_query("SELECT distinct `catagory` FROM `professional_master`");
$rsguardianProfession=mysql_query("SELECT distinct `catagory` FROM `professional_master`");

$rsfatherService=mysql_query("SELECT distinct `catagory` FROM `service_master`");
$rsmotherService=mysql_query("SELECT distinct `catagory` FROM `service_master`");
$rsguardianService=mysql_query("SELECT distinct `catagory` FROM `service_master`");

$rsSchooListFather=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");
$rsSchooListMother=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");

$rsEducation=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation1=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation2=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
?>
<script type="text/javascript">
    function clickIE4(){
    if (event.button==2){
    return false;
    }
    }
    function clickNS4(e){
    if (document.layers||document.getElementById&&!document.all){
    if (e.which==2||e.which==3){
    return false;
    }
    }
    }
    if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    //if IE4+
    document.onselectstart=new Function ("return false")
    //if NS6
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
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
   <script>
   function fnlChkCategory(ctrlname)
{
    if(ctrlname=="chkgirlCategory")
	{
          
		//alert(document.getElementById("lifecheck").checked);
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			
			document.getElementById("F13").disabled = false;
			document.getElementById("F13").required=true;;
			document.getElementById("F13").checked=false;
			
			return;
		}
		else
		{
			document.getElementById("F13").disabled = true;
			document.getElementById("F13").required=false;;
			
			return;
		}
	}
        
         if(ctrlname=="chkSingleParent")
	{
           
		//alert(document.getElementById("lifecheck").checked);
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			
			document.getElementById("F14").disabled = false;
			document.getElementById("F14").required=true;
			document.getElementById("F14").checked=false;
			document.getElementById("hSingleParent").value="Yes";
			document.getElementById("cbosingleparent").disabled=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			
			return;
		}
		else
		{
			document.getElementById("F14").disabled = true;
			document.getElementById("F14").required=false;
			document.getElementById("hSingleParent").value="No";
			document.getElementById("cbosingleparent").value="";
			document.getElementById("cbosingleparent").disabled=true;
			
			return;
		}
	}
	if(ctrlname=="chkSibling")
	{
           
		//alert(document.getElementById("lifecheck").checked);
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			
			document.getElementById("F9").disabled = false;
			document.getElementById("F9").required=true;;
			document.getElementById("F9").checked=false;
			document.getElementById("hSibling").value="Yes";
			document.getElementById("txtRealBroSisName").readOnly=false;
			document.getElementById("txtRealBroSisClass").disabled=false;
			document.getElementById("txtRealBroSisSchoolName").readOnly=false;
			document.getElementById("txtRealBroSisName2").readOnly=false;
			document.getElementById("txtRealBroSisClass2").disabled=false;
			document.getElementById("txtRealBroSisSchoolName2").readOnly=false;
			
   
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			

			return;
		}
		else
		{
			document.getElementById("F9").disabled = true;
			document.getElementById("F9").required=false;
			document.getElementById("hSibling").value="No";
			document.getElementById("txtRealBroSisName").value="";
			document.getElementById("txtRealBroSisClass").value="";
			document.getElementById("txtRealBroSisSchoolName").value="";
			document.getElementById("txtRealBroSisName2").value="";
			document.getElementById("txtRealBroSisClass2").value="";
			document.getElementById("txtRealBroSisSchoolName2").value="";
			document.getElementById("txtRealBroSisName").readOnly=true;
			document.getElementById("txtRealBroSisClass").disabled=true;
			document.getElementById("txtRealBroSisSchoolName").readOnly=true;
			document.getElementById("txtRealBroSisName2").readOnly=true;
			document.getElementById("txtRealBroSisClass2").disabled=true;
			document.getElementById("txtRealBroSisSchoolName2").readOnly=true;
  
			
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
			document.getElementById("txtDPSSchoolName").disabled=false;
			document.getElementById("txtYearOfPassing").readOnly=false;
			document.getElementById("txtLastPassoutClassFather").disabled=false;
                        //document.getElementById("F6").disabled = false;
			//document.getElementById("F6").required=true;
			
			//document.getElementById("txtDPSSchoolName").readOnly=false;
			
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hFatherAlumni").value="No";
			document.getElementById("txtFatherAlumniName").value="";
			document.getElementById("txtFatherAlumniName").readOnly=true;
			document.getElementById("txtDPSSchoolName").value="";
			document.getElementById("txtDPSSchoolName").disabled=true;
			document.getElementById("txtYearOfPassing").value="";
			document.getElementById("txtYearOfPassing").readOnly=true;
			document.getElementById("txtLastPassoutClassFather").value="";
			document.getElementById("txtLastPassoutClassFather").disabled=true;
			//document.getElementById("F6").disabled = true;
			//document.getElementById("F6").required=false;
			

			//document.getElementById("txtDPSSchoolName").disabled=true;

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
			//document.getElementById("F6").disabled = false;
			//document.getElementById("F6").required=true;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hMotherAlumni").value="No";
			document.getElementById("txtMotherAlumniName").value="";
			document.getElementById("txtMotherAlumniName").readOnly=true;
			document.getElementById("txtMotherDPSSchoolName").value="";
			document.getElementById("txtMotherDPSSchoolName").disabled=true;
			document.getElementById("txtMotherYearOfPassing").value="";
			document.getElementById("txtMotherYearOfPassing").readOnly=true;
			document.getElementById("txtLastPassoutClassMother").value="";
			document.getElementById("txtLastPassoutClassMother").disabled=true;
			
			
			//document.getElementById("txtMotherDPSSchoolName").readOnly=true;
			
			
			//document.getElementById("F6").disabled = true;
			//document.getElementById("F6").required=false;
			return;
		}
	}
	
	if(ctrlname=="chkSingleParent")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hSingleParent").value="Yes";
			document.getElementById("cbosingleparent").disabled=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hSingleParent").value="No";
			document.getElementById("cbosingleparent").value="";
			document.getElementById("cbosingleparent").disabled=true;
			return;
		}
	}
	
	if(ctrlname=="chkSpecialNeed")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hSpecialNeed").value="Yes";
			document.getElementById("cboSpecialNeed").disabled=false;
			document.getElementById("F7").disabled = false;
			document.getElementById("F7").required=true;
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hSpecialNeed").value="No";
			document.getElementById("F7").disabled = true;
			document.getElementById("F7").required=false;
			document.getElementById("cboSpecialNeed").value="";
			document.getElementById("cboSpecialNeed").disabled=true;
			
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
                        document.getElementById("F7").disabled = false;
			document.getElementById("F7").required=true;
			
			return;
		}
		else
		{
			//alert("Sibling not selected!");
                         document.getElementById("F7").disabled = true;
			document.getElementById("F7").required=false;
			document.getElementById("hDPSStaff").value="No";			
			return;
		}
	}
	
        	
	if(ctrlname=="chkOtherdpsCategory")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
                        
			document.getElementById("chkOtherdpsCategory").value="Yes";
			document.getElementById("hOtherCategory").value="No";
                        document.getElementById("F7").disabled = false;
			document.getElementById("F7").required=true;
			
			return;
		}
		else
		{
			//alert("Sibling not selected!");
                         document.getElementById("F7").disabled = true;
			document.getElementById("F7").required=false;
			document.getElementById("chkOtherdpsCategory").value="No";			
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
function CalculateAgeInQC() 
{
    
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


function fnlChkCatagory()
{
	
	if((document.getElementById("cbocatagory").value =="Others"))
	{
		
		
		document.getElementById("txtothercatagory").style.display ="";
	}
	else
	{
		
		document.getElementById("txtothercatagory").style.display ="none";
		
	}
	
	
}




   </script>



<html>

<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
   <script src="../bootstrap/bootstrap.min.js"></script>

	
	
<style>

		
		 body{font-family:Arial, Helvetica, sans-serif!important;} .Header .img-responsive{width:40%}
		 .text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .row{padding-left:0%; margin:0;} .h{background-color:rgba(11, 70, 45, 0.84); padding:4px 0px; color:#FFFFFF;} .h11{ text-transform:uppercase;} .col-xs-6{ text-align:left; margin-top:1%!important;} .hr{width:99%; border:1px solid #CCCCCC; padding:0;} .col-xs-3, .col-xs-9{margin-top:1%; } .f{font-size:12px;} .col-xs-2{width:12%; padding:0; border:1px solid #0099ff; } .col-xs-2 li{list-style:none; padding:5%;} .info{ padding:1%; margin:0; line-height:0.5;} .tba{ width:90%; } .tbs{padding:2.5%;}
		 .col-xs-1{width:2%;}
		 .table1 tr td{padding:1%;}  .row_1{ border-bottom: 2px solid #999999; } 
		 .col-xs-12 table td{ padding:1% 0.5%; border:1px solid #0099ff; border-radius:2px; } 
		 .col{ text-align:left; }  .check{padding:0 0 0 3%;} .study{margin-top:3%;}
		 .check table{width:20%; float:left;} .check table td{ padding:3% 1%!important; font-size:13px;} .check table td:nth-child(odd){width:20px;}
		 .table_detai .row{width:100%;} .table_detail .col-xs-2, .table_detail .col-xs-3{padding:1% 1%; margin:0; border:1px solid #0099ff; } .table_detail .col-xs-2{ width:17%;} .table_detail .head1{font-weight:700; padding:1%; background-color:#0099ff; margin:0; border:1px solid #0099ff;} .table_detail .col-xs-2 .text-box{ width:95%; border-radius:3px; border:1px solid #0099ff;} .table_detail .head2{ padding-bottom:1.3%; } 
		 #hidden{display:none;} #show .col-xs-3{font-weight:bold;}
		 .btn{color:#fff; background:#0b462d; border:1px solid Transparent; border-radius:3px;}
		 .btn:hover{background:#097b4d; color:#fff;} p{ text-align: justify;}
		 .head3{margin:1% 0; font:14px; font-weight:bold; padding:0 1%;}
		 @media only screen and (min-width:1235px) and (max-width: 1935px){.col{text-align:center; } .study{margin-top:4%;} }
		 
		 @media only screen and (min-width:800) and (max-width: 934px){ .check table td{ font-size:11px!important;}}
		 @media only screen and (min-width:870px) and (max-width: 1235px){	 .col-xs-2{width:20%;} .tba{ width:90%; } 	 }
		 @media only screen and (min-width:1051px) and (max-width: 1235px){.table_detail .l{ font-size:12px; padding-bottom:1.7%;}}
		 @media only screen and (min-width:870px) and (max-width: 1051px){ .table_detail .l{ font-size:12px; padding-bottom:0.5%; padding-top:0.5%;} }
		 @media only screen and (min-width:928px) and (max-width: 1080px){ .table_detail .l2{ font-size:12px; padding-bottom:1.3%; } }
		 @media only screen and (min-width:870px) and (max-width: 928px){ .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.2%; } .study{margin-top:7%;} }
		 @media only screen and (min-width:720px) and (max-width: 870px){ .col-xs-2{width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.4%; padding-top:0.4%;} .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.1%; } .tba{ width:90%; } .check table{width:33%; float:left;} .study{margin-top:20%;} }		 
		 @media only screen and (min-width:580px) and (max-width: 720px){
		 .col-xs-3{ width:50%; margin-top:1%; } .col-xs-6{ text-align:left; margin-top:1%!important;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:50%;} .col-xs-2 .text-box{height:25px; } .xss{width:50%!important; text-align: justify;} .table_detail .head1{ display:none;} .table_detail .col-xs-3 {width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.1%; padding-top:0.1%;} .table_detail .l2{ font-size:9px; padding:0; padding-bottom:0%; padding-top:0%; } .table_detail .col-xs-2 { padding:0.8% 1%; width:20%;} .table_detail .l3{padding:1%;} table_detail .head1{padding-bottom:0.5%;} .tba{ width:90%; }.info p{line-height:1.2;} .check table{width:30%; float:left;} .study{margin-top:12%;}.col-xs-1{width:2%; float:left} .col-xs-10{width:70%; float:left}
		 .head3{margin:2% 0;} #show{display:none;} #hidden{display:block;} .a{border-top:1px solid #0b462d; margin-top:3%;} .b{width:100% !important}
		 .h12{margin-top:10%;} p{ text-align: justify;}
		 } 
		 @media only screen and (min-width:530px) and (max-width: 580px){ body{font-size:12px;} .Header .img-responsive{width:40%}
		 .col-xs-3{ width:50%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:49%; } .col-xs-2 .text-box{height:25px; }  .xss{width:45%!important; font-size:12px; text-align: justify;} .xss1{ width:45%; font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:90%; } .info p{line-height:1.2;} .check table{width:45%; float:left;} .study{margin-top:20%;}.col-xs-1{width:2%; float:left} .col-xs-10{width:70%; float:left}
		 .head3{margin:2% 0;} #show{display:none;} #hidden{display:block;} .a{border-top:1px solid #0b462d; margin-top:3%;}  .b{width:100% !important}
		 .h12{margin-top:10%;} p{ text-align: justify;}
		 } 
		 @media only screen and (min-width:445px) and (max-width: 530px){ body{font-size:14px; line-height:1;} .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .text-box{width:100%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:50%; margin-top:1%;  } .col-xs-2 .text-box{height:25px; } .xss{width:80%!important; text-align: justify; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:50%; }.info p{line-height:1.2;} .check table{width:95%; float:left;}.col-xs-1{width:2%; float:left} .col-xs-10{width:70%; float:left}
		  p{ text-align: justify;}
		 } 
		 @media only screen and (min-width:334px) and (max-width: 445px){ body{font-size:14px; line-height:1.5;} .tba{ width:100%; } .row{padding:0 5%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:100%;} .col-xs-6 .text-box{ width:78%!important;  margin-left:-3%; } .col-xs-2{ width:95%; margin-top:1%;} .xss{width:100%!important; text-align: justify; } .xss1{ width:100%;} .col-xs-2 li{ padding:2%;} .table1{font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .info p{line-height:1.2;} .check table{width:95%; float:left;} 
		 .head3{margin:5% 0; text-align:center;} #show{display:none;} #hidden{display:block;} .a{border-top:1px solid #0b462d; margin-top:3%;}
		 .h12{margin-top:60%;} p{ text-align: justify;}
		 
		 }	
		  @media only screen and (min-width:240px) and (max-width: 334px){ body{font-size:14px; line-height:1;} .tba{ width:100%; } .row{padding:0 5%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:3%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:100%;} .col-xs-6 .text-box{ width:100%!important; } .col-xs-2{ width:95%; margin-top:1%;} .col-xs-2 .text-box{height:25px; } .xss{width:85%!important; text-align: justify; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;}.info p{line-height:1.2;} .check table{width:95%; float:left;}
		 .head3{margin:5% 0; text-align:center;} #show{display:none;} #hidden{display:block;} .a{border-top:1px solid #0b462d; margin-top:3%;}
		 .h12{margin-top:60%;} p{ text-align: justify;}
		 }		 
		
		</style>
	</head>
<body>
<div id="container">
 	<div class="row ">
  		<div class="Header" align="center" >
        	<img src="../Admin/images/logo.png" class="img-responsive"><br />
 		    <div class="table1">
	  			<b>Sector-24, Phase III, Rohini, New Delhi - 110085</b><br />
		    	<b>(011)27055942, 27055943</b><br />
	  	    	<b>mail@dpsrohini.com, principal@dpsrohini.com</b>
			</div>
  		</div>
 	</div>
    <form name="frmNewStudent" id="frmNewStudent" method="post" action="registration_others_payment.php" enctype="multipart/form-data">
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
    		<h4 align="center">APPLICATION FORM OTHER THAN NURSERY- (Session 2017 - 2018)</h4>
  		</div>
  		<div class="info">
  			<h4>Parents are requested to note : </h4>
			<p><font size="+2">&raquo;</font>  This is not an Admission Form. Submission of this form does not guarantee admission.</p>
			<p><font size="+2">&raquo;</font>  This form is non-transferable and Registration Fee is <strong>INR 25/-</strong> </p>
  		</div>
  		<div align="center" class="h h11"><b><font >Student Details</font></b></div>
  		<div>&nbsp;</div>
  		<div class="row" >
   			<div class="col-xs-3"> Class Applied For*:</div>
  			<div class="col-xs-3"><select size="1" name="cboClass" id="cboClass" class="text-box tbs" required="true">
						<option selected value="">Select One</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
                </select>
            </div>
		    <div class="col-xs-6">&nbsp;</div>
 		</div>
 		<div class="row">
  			<div class="col-xs-3"> First Name of Applicant*: </div>
  			<div class="col-xs-3"> <input name="txtName" id="txtName" type="text" class="text-box" value="" required /> </div>
			<div class="col-xs-3 xs"> Middle Name of Applicant:</div>
  			<div class="col-xs-3 xs1"> <input name="txtMiddleName" id="txtMiddleName" type="text" class="text-box" size="20" value=""></div>
 		</div>
 		<div class="row">
  			<div class="col-xs-3 xs"> Last Name of Applicant:</div>
  			<div class="col-xs-3 xs1"> <input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20" value=""></div>
 			<div class="col-xs-3"> Place of Birth:</div>
  			<div class="col-xs-3"> <input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text" value=""></div>
 		</div>
	 	<div class="row">
	 	    <div class="col-xs-3"> Date of Birth*:<!--<br><font class="f">(mm/dd/yyyy)</font>--></div>
  			<div class="col-xs-3"> <input name="txtDOB" id="txtDOB" type="date" class="text-box" placeholder="mm/dd/yyyy" required value=""></div>
  			<div class="col-xs-3 xs"> Age as on*:</div>
  			<div class="col-xs-3 xs1"> <input name="txtAge" id="txtAge" type="text" class="text-box" onClick="javascript:CalculateAgeInQC();" readonly placeholder="31-Mar-2017" required value=""/></div>
 		</div>
 		<div class="row">
   			<div class="col-xs-3"> Gender*:</div>
  			<div class="col-xs-3"> 
  				<select size="1" name="txtSex" id="txtSex" class="text-box tbs" required="true" value="">
					<option selected value="">Select One</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
  			</div>
  			<div class="col-xs-3"> Nationality*: </div>
  			<div class="col-xs-3"> <input name="txtNationality" id="txtNationality" type="text" class="text-box" value="Indian" required></div>
  		</div>
 		<div class="row">
 			<!--<div class="col-xs-3 xs"> Enter Distance from school*: </div>
	  		<div class="col-xs-3 xs1"> <!--<input type="number" name="txtLocality" id="txtLocality" class="text-box" required="true"  step="any"/>-->
  				<!--<select name="txtLocality" id="txtLocality" class="text-box">
  					<option value="">Select One</option>
  					<option value="0-1 KM">0-1 KM</option>
  					<option value="1-3 KM">1-3 KM</option>
  					<option value="3-6 KM">3-6 KM</option>
  					<option value="Beyond 6 KM">Beyond 6 KM</option>
  				</select>
                <br><a href="https:www.freemaptools.com/how-far-is-it-between.htm" target="_blank">Click here to know the distance</a>
            </div>-->
  			<div class="col-xs-3"> Mother Tongue*: </div>
  			<div class="col-xs-3"> <input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text" required value=""></div>
  			<div class="col-xs-3">Blood Group*:</div>
	  		<div class="col-xs-3">
            	<select name="bloodgroup" id="bloodgroup" class="text-box" required="true">
  					<option value="">Select One</option>
  					<option value="A+">A+</option>
  					<option value="A-">A-</option>
  					<option value="B+">B+</option>
  					<option value="B-">B-</option>
  					<option value="AB+">AB+</option>
  					<option value="AB-">AB-</option>
  					<option value="O+">O+</option>
  					<option value="O-">O-</option>
  				</select>
            </div>
	 	</div>
 		<div class="row">
  			<div class="col-xs-3 xs">Current Residential Address*: </div>
  			<div class="col-xs-3 xs1"> <textarea name="txtAddress" id="txtAddress" class="text-box-address text-box tba" rows="1" required value="" /></textarea></div>
  			<div class="col-xs-3">Residential Landline Number:</div>
  			<div class="col-xs-3"><input type="number" name="residentialno" id="residentialno" class="text-box tba" value=""></div>
		</div>
 		<div class="row">
  			<div class="col-xs-3 xs"> Permanent Address: </div>
  			<div class="col-xs-3 xs1"> <textarea name="txtpermanentAddress" id="txtpermanentAddress" class="text-box-address text-box tba" rows="1"  /></textarea></div>
  			<div class="col-xs-3">Permanent Landline Number:</div>
  			<div class="col-xs-3"><input type="number" name="permanentno" id="permanentno" class="text-box tba" value=""></div>
 		</div>
  		<div class="row">
  			<div class="col-xs-3">Select if Applicable:</div>
  			<div class="col-xs-3">
            	<select name="cboapplicable" id="cboapplicable" class="text-box">
  					<option value="">Select One</option>
  					<option value="Twin">Twin</option>
  					<option value="Tripplet">Tripplet</option>
  				</select>
   			</div>
 		</div>
 		<div> &nbsp;</div>
 		<div class="h h11" align="center"><strong> Previous School Details</strong></div>
		<div>&nbsp;</div>
        <div class="row">
        	<div class="col-xs-3">Name of School:</div>
        	<div class="col-xs-3"><input type="text" name="preSchoolName" id="preSchoolName" class="text-box" value=""></div>
        	<div class="col-xs-3">Reason for Leaving:</div>
        	<div class="col-xs-3"><input type="text" name="preLeaveReason" id="preLeaveReason" class="text-box" value=""></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Attended From:</div>
        	<div class="col-xs-3"><input type="text" name="preAttendForm" id="preAttendForm" class="text-box" value=""></div>
        	<div class="col-xs-3">Attended Till:</div>
        	<div class="col-xs-3"><input type="text" name="preAttendTill" id="preAttendTill" class="text-box" value=""></div>
        </div>
        <hr class="hr">
        <div align="center" style="text-transform:uppercase;"><strong><u>Academic Record in the Last School Attended</u></strong></div>
        <div>&nbsp;</div>
        <div class="head3">Enter First Term Grade / Percentage of Marks obtained in Academic Session 2016-2017 for the following subjects - </div>
        <div class="row">
        	<div class="col-xs-3">English</div>
        	<div class="col-xs-3"><input type="text" name="englishMark16" id="englishMark16" class="text-box" value=""></div>
        	<div class="col-xs-3">Hindi</div>
        	<div class="col-xs-3"><input type="text" name="hindiMark16" id="hindiMark16" class="text-box" value=""></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Mathematics</div>
        	<div class="col-xs-3"><input type="text" name="mathematicsMark16" id="mathematicsMark16" class="text-box" value=""></div>
        	<div class="col-xs-3">General Science / EVS</div>
        	<div class="col-xs-3"><input type="text" name="evsMark16" id="evsMark16" class="text-box" value=""></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Social Science</div>
        	<div class="col-xs-3"><input type="text" name="socialMark16" id="socialMark16" class="text-box" value=""></div>
        	<div class="col-xs-3"><input type="text" name="anyOtherSubject16" id="anyOtherSubject16" class="text-box"  placeholder="Any Other Subject" value=""></div>
        	<div class="col-xs-3"><input type="text" name="otherMark16" id="otherMark16" class="text-box" value=""></div>
        </div>
        <div class="head3">Enter Final Term Grade / Percentage of Marks obtained in Academic Session 2015-2016 - </div>
        <div class="row">
        	<div class="col-xs-3">English</div>
        	<div class="col-xs-3"><input type="text" name="englishMark15" id="englishMark15" class="text-box" value=""></div>
        	<div class="col-xs-3">Hindi</div>
        	<div class="col-xs-3"><input type="text" name="hindiMark15" id="hindiMark15" class="text-box" value=""></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Mathematics</div>
        	<div class="col-xs-3"><input type="text" name="mathematicsMark15" id="mathematicsMark15" class="text-box" value=""></div>
        	<div class="col-xs-3">General Science / EVS</div>
        	<div class="col-xs-3"><input type="text" name="evsMark17" id="evsMark17" class="text-box" value=""></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Social Science</div>
        	<div class="col-xs-3"><input type="text" name="socialMark15" id="socialMark15" class="text-box" value=""></div>
        	<div class="col-xs-3"><input type="text" name="anyOtherSubject15" id="anyOtherSubject15" class="text-box" placeholder="Any Other Subject" value=""></div>
        	<div class="col-xs-3"><input type="text" name="otherMark15" id="otherMark15" class="text-box" value=""></div>
        </div>
        <hr class="hr">
        <div class="head3">Outstanding Achievements in Academics (if any)</div>
        <div class="row">
        	<div class="col-xs-3">
            	<b>1.</b>&nbsp; <input type="text" name="achievementAcademic1" id="achievementAcademic1" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>2.</b>&nbsp; <input type="text" name="achievementAcademic2" id="achievementAcademic2" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>3.</b>&nbsp; <input type="text" name="achievementAcademic3" id="achievementAcademic3" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>4.</b>&nbsp; <input type="text" name="achievementAcademic4" id="achievementAcademic4" class="text-box" value=""></div>
        </div>
        <div class="head3">Outstanding Achievements Co-curricular activities (if any)</div>
        <div class="row">
        	<div class="col-xs-3">
            	<b>1.</b>&nbsp; <input type="text" name="achievementCoCurricular1" id="achievementCoCurricular1" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>2.</b>&nbsp; <input type="text" name="achievementCoCurricular2" id="achievementCoCurricular2" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>3.</b>&nbsp; <input type="text" name="achievementCoCurricular3" id="achievementCoCurricular3" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>4.</b>&nbsp; <input type="text" name="achievementCoCurricular4" id="achievementCoCurricular4" class="text-box" value=""></div>
        </div>
        
        <div class="head3">Achievements in Sports (if any)</div>
        <div class="row">
        	<div class="col-xs-3">
            	<b>1.</b>&nbsp; <input type="text" name="achievementSport1" id="achievementSport1" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>2.</b>&nbsp; <input type="text" name="achievementSport2" id="achievementSport2" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>3.</b>&nbsp; <input type="text" name="achievementSport3" id="achievementSport3" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>4.</b>&nbsp; <input type="text" name="achievementSport4" id="achievementSport4" class="text-box" value=""></div>
        </div>
        <div class="head3">Achievements in Olympiads (if any)</div>
        <div class="row">
        	<div class="col-xs-3">
            	<b>1.</b>&nbsp; <input type="text" name="achievementOlympiad1" id="achievementOlympiad1" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>2.</b>&nbsp; <input type="text" name="achievementOlympiad2" id="achievementOlympiad2" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>3.</b>&nbsp; <input type="text" name="achievementOlympiad3" id="achievementOlympiad3" class="text-box" value=""></div>
        	<div class="col-xs-3">
            	<b>4.</b>&nbsp; <input type="text" name="achievementOlympiad4" id="achievementOlympiad4" class="text-box" value=""></div>
        </div>
 		<div> &nbsp;</div>
 		<div class="h h11" align="center"><strong> Details Of Any Real Siblings, if Any (Not Cousins)</strong></div>
		<div>&nbsp;</div>
        <div class="row" id="show">
        	<div class="col-xs-3">Name of the Sibling</div>
        	<div class="col-xs-3">Name of the School</div>
        	<div class="col-xs-3">Class / Section</div>
        	<div class="col-xs-3">Admission Number <br>(only if Sibling is in DPS Rohini)</div>
        </div>
        <div class="row">
        	<div class="col-xs-3 b" id="hidden">1.</div>
        	<div class="col-xs-3" id="hidden">Name of the Sibling</div>
        	<div class="col-xs-3"><b id="show">1. &nbsp;</b><input type="text" name="siblingName1" id="siblingName1" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Name of the School</div>
        	<div class="col-xs-3"><input type="text" name="schoolName1" id="schoolName1" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Class / Section</div>
        	<div class="col-xs-3"><input type="text" name="classSection1" id="classSection1" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Admission Number <br>(only if Sibling is in DPS Rohini)</div>
        	<div class="col-xs-3"><input type="text" name="admissionNo1" id="admissionNo1" class="text-box" value=""></div>
        </div>
        <div class="row a">
        	<div class="col-xs-3 b" id="hidden">2.</div>
        	<div class="col-xs-3" id="hidden">Name of the Sibling</div>
        	<div class="col-xs-3"><b id="show">2. &nbsp;</b><input type="text" name="siblingName2" id="siblingName2" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Name of the School</div>
        	<div class="col-xs-3"><input type="text" name="schoolName2" id="schoolName2" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Class / Section</div>
        	<div class="col-xs-3"><input type="text" name="classSection2" id="classSection2" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Admission Number <br>(only if Sibling is in DPS Rohini)</div>
        	<div class="col-xs-3"><input type="text" name="admissionNo2" id="admissionNo2" class="text-box" value=""></div>
        </div>
        <div class="row a">
        	<div class="col-xs-3 b" id="hidden">3.</div>
        	<div class="col-xs-3" id="hidden">Name of the Sibling</div>
        	<div class="col-xs-3"><b id="show">3. &nbsp;</b><input type="text" name="siblingName3" id="siblingName3" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Name of the School</div>
        	<div class="col-xs-3"><input type="text" name="schoolName3" id="schoolName3" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Class / Section</div>
        	<div class="col-xs-3"><input type="text" name="classSection3" id="classSection3" class="text-box" value=""></div>
        	<div class="col-xs-3" id="hidden">Admission Number <br>(only if Sibling is in DPS Rohini)</div>
        	<div class="col-xs-3"><input type="text" name="admissionNo3" id="admissionNo3" class="text-box" value=""></div>
        </div>
 		<div> &nbsp;</div>
 		<div class="h h11" align="center"><strong> Family Details (Father / Mother / Guardian)</strong></div>
		<div>&nbsp;</div>
 		<div align="center"><strong><u>Father's Details</u></strong></div>
 		<div>&nbsp;</div>
 		<div class="row">
  			<div class="col-xs-3"> Name*:</div>
  			<div class="col-xs-3"> <input name="txtFatherName" id="txtFatherName" type="text" class="text-box" value="" required></div>
  			<div class="col-xs-3"> Age:</div>
  			<div class="col-xs-3"> <input name="txtFatherAge" id="txtFatherAge" class="text-box" type="text" value=""></div>
 		</div>
 		<div class="row">
  			<div class="col-xs-3"> Highest Academic Qualification*:</div>
  			<div class="col-xs-3"><select size="1" name="txtFatherAcademicEducation" id="txtFatherAcademicEducation" class="text-box tbs" required="true">
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
		
	</select></div>
  			<div class="col-xs-3"> Highest Professional Qualification:</div>
  			<div class="col-xs-3"><input type="text" name="txtFatherProEducation" id="txtFatherProEducation" class="text-box" value=""></div>
 		</div>
  		<div class="row">
		    <div class="col-xs-3">Occupation:</div>
  			<div class="col-xs-3">
            	<select name="txtFatherOccupation" id="txtFatherOccupation" class="text-box">
  					<option value="">Select One</option>
  					<option value="Business">Business</option>
  					<option value="Political">Politics</option>
  					<option value="Ministry">Ministry</option>
  					<option value="Professional">Professional</option>
  					<option value="Services">Services</option>
  					<option value="Others">Others</option>
  				</select>
            </div>
 			<div  id="fbusiness" style="display: none;">
  				<div class="col-xs-3">Business:</div>
  				<div class="col-xs-3">
                	<select name="fatherbusiness" id="fatherbusiness" class="text-box tbs">
                    	<option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsfatherBusiness))
		{
					$fatherbusiness=$row1[0];
		?>
		<option value="<?php echo $fatherbusiness; ?>"><?php echo $fatherbusiness; ?></option>
		<?php 
		}
		?>
                    </select>
  				</div>
   			</div>
 			<div id="fpolitical" style="display: none;">
 				<div class="col-xs-3">Political:</div>
  				<div class="col-xs-3"><input type="text" name="fatherpolitical" id="fatherpolitical" class="text-box"></div>
 			</div>
  			<div  id="fministry" style="display: none;">
  				<div class="col-xs-3">Ministry:</div>
  				<div class="col-xs-3"><input type="radio" name="fatherministry" id="fatherministry" value="External Affairs">External Affairs
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="fatherministry" id="fatherministry" value="SSI">SSI
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="fatherministry" id="fatherministry" value="Others">Others
                </div>
 			</div>
 			<div id="fprofessional" style="display: none;">
  				<div class="col-xs-3">Professional:</div>
  				<div class="col-xs-3">
                	<select name="fatherprofssional" id="fatherprofssional" class="text-box">
                    	 <option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsfatherProfession))
		{
					$fatherprofession=$row1[0];
		?>
		<option value="<?php echo $fatherprofession; ?>"><?php echo $fatherprofession; ?></option>
		<?php 
		}
		?>
					</select>
				</div>
 			</div>
 			<div id="fservicess" style="display: none;" >
  				<div class="col-xs-3">Services:</div>
  				<div class="col-xs-3">
                	<select name="fatherservices" id="fatherservices" class="text-box">
                    	<option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsfatherService))
		{
					$fatherservice=$row1[0];
		?>
		<option value="<?php echo $fatherservice; ?>"><?php echo $fatherservice; ?></option>
		<?php 
		}
		?>
                    </select>               
  				</div>
 			</div>
 			<div id="fothers" style="display: none;" >
  				<div class="col-xs-3">Others:</div>
  				<div class="col-xs-3"><input type="text" name="fatherothers" id="fatherothers" class="text-box" ></div> 
    		</div>
   		</div>
   		<div class="row">
  			<div class="col-xs-3 xs"> Designation: <br><font class="f">(If employed)</font> </div>
  			<div class="col-xs-3 xs1"> <input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text"></div>
  			<div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font> </div>
  			<div class="col-xs-3"> <input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text"></div>
   		</div>
   		<div class="row">
    		<div class="col-xs-3 xs"> Mobile No *:</div>
  			<div class="col-xs-3 xs1"> <input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="tel"  pattern="[0-9]{10}" title="9999999999" ></div>
  			<div class="col-xs-3"> Email Id *:</div>
  			<div class="col-xs-3"> <input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="email" required></div>
   		</div>
 		<div class="row">
   			<div class="col-xs-3">Office Address: <br><font class="f">(If employed)</font> </div>
  			<div class="col-xs-3"> <textarea name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box-address text-box" rows="1"></textarea></div>
 			<div class="col-xs-3 xs">Office Landline No.</div>
  			<div class="col-xs-3 xs1"><input type="number" name="cboofficeno" id="cboofficeno" class="text-box"></div>
  		</div>
 	  	<div>&nbsp;</div>
 		<div align="center"><strong><u>Mother's Details</u></strong></div>
 		<div>&nbsp;</div>
	 	<div class="row">
  			<div class="col-xs-3"> Name*:</div>
  			<div class="col-xs-3"> <input name="txtMotherName" id="txtMotherName" type="text" class="text-box" required></div>
  			<div class="col-xs-3"> Age:</div>
  			<div class="col-xs-3"> <input name="txtMotherAge" id="txtMotherAge" class="text-box" type="text"></div>
 		</div>
 			<div class="row">
  			<div class="col-xs-3"> Highest Academic Qualification*:</div>
  			<div class="col-xs-3"><select size="1" name="txtMotherAcdEducation" id="txtMotherAcdEducation" class="text-box tbs" required="true">
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
	</select></div>
  			<div class="col-xs-3"> Highest Professional Qualification:</div>
  			<div class="col-xs-3">
            	<input type="text" name="txtMotherProEducation" id="txtMotherProEducation" value="" class="text-box" >
  			</div>
		</div>
    	<div class="row">
  			<div class="col-xs-3">Occupation</div>
  			<div class="col-xs-3">
        		<select name="txtMotherOccupation" id="txtMotherOccupation" class="text-box">
  					<option value="">Select One</option>
  					<option value="Business">Business</option>
              	  	<option value="Political">Politics</option>
             	   	<option value="Ministry">Ministry</option>
                	<option value="Professional">Professional</option>
                	<option value="Services">Services</option>
                	<option value="Others">Others</option>
  				</select>
        	</div>
            <div id="mbusiness" style="display: none;">
                <div class="col-xs-3">Business:</div>
                <div class="col-xs-3">
                    <select name="motherbusiness" id="motherbusiness" class="text-box">
 <option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsmotherBusiness))
		{
					$motherbusiness=$row1[0];
		?>
		<option value="<?php echo $motherbusiness; ?>"><?php echo $motherbusiness; ?></option>
		<?php 
		}
		?>                    </select>
                </div>
            </div>
            <div id="mpolitical" style="display: none;">
                <div class="col-xs-3">Political:</div>
                <div class="col-xs-3"><input type="text" name="motherpolitical" id="motherpolitical" class="text-box"></div>
            </div>
            <div  id="mministry" style="display: none;" >
                <div class="col-xs-3">Ministry:</div>
                <div class="col-xs-3"><input type="radio" name="motherministry" id="motherministry" value="External Affairs">External Affairs
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="motherministry" id="motherministry" value="SSI">SSI
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="motherministry" id="motherministry" value="Others">Others
                </div>
            </div>
            <div id="mprofessional" style="display: none;">
                <div class="col-xs-3">Professional:</div>
                <div class="col-xs-3">
                    <select name="motherprofssional" id="motherprofssional" class="text-box">
<option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsmotherProfession))
		{
					$motherprofession=$row1[0];
		?>
		<option value="<?php echo $motherprofession; ?>"><?php echo $motherprofession; ?></option>
		<?php 
		}
		?>                    </select>
                </div>
            </div>
            <div id="mservicess" style="display: none;">
                <div class="col-xs-3">Services:</div>
                <div class="col-xs-3">
                    <select name="motherservices" id="motherservices" class="text-box">
<option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsmotherService))
		{
					$motherservice=$row1[0];
		?>
		<option value="<?php echo $motherservice; ?>"><?php echo $motherservice; ?></option>
		<?php 
		}
		?>                    </select>               
                </div> 
            </div>
            <div  id="mothers" style="display: none;" >
                <div class="col-xs-3">Others:</div>
                <div class="col-xs-3"><input type="text" name="motherothers" id="motherothers" class="text-box" ></div>  
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 xs"> Designation: <br><font class="f">(If employed)</font></div>
            <div class="col-xs-3 xs1"> <input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text"></div>
            <div class="col-xs-3 xs"> Organization Name: <br><font class="f">(If employed)</font></div>
            <div class="col-xs-3 xs1"> <input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" class="text-box"></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Mobile No.*:</div>
            <div class="col-xs-3"> <input name="txtMotherMobileNo" id="txtFatherOfficialPhNo1" class="text-box" type="text"  pattern="[0-9]{10}" title="9999999999" required></div>
            <div class="col-xs-3"> Email id*:</div>
            <div class="col-xs-3"> <input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" type="email" required></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Office Address: <br><font class="f">(If employed)</font></div>
            <div class="col-xs-3"> <textarea name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box-address text-box" rows="1"></textarea></div>
            <div class="col-xs-3 xs">Office Landline No.</div>
            <div class="col-xs-3 xs1"><input type="number" name="cbomotherofficeno" id="cbomotherofficeno" class="text-box"></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Previous Employment (If applicable):</div>
            <div class="col-xs-3"><input type="text" name="previousEmployment" id="previousEmployment" class="text-box" value=""></div>
            <div class="col-xs-6">&nbsp;</div>
        </div>
        <div>&nbsp;</div><div>&nbsp;</div>
        <div align="center"><strong><u>Guardian's Details (If Applicable)</u></strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3"> Name:</div>
            <div class="col-xs-3"> <input name="txtGuradianName" id="txtGuradianName" type="text" class="text-box" ></div>
            <div class="col-xs-3"> Age: </div>
            <div class="col-xs-3"> <input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" ></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Qualification:</div>
            <div class="col-xs-3"> <input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" class="text-box" ></div>
            <div class="col-xs-3">Occupation:</div>
            <div class="col-xs-3">
                <select name="txtGuradianOccupation" id="txtGuradianOccupation" class="text-box">
                    <option value="">Select One</option>
                    <option value="Business">Business</option>
                    <option value="Political">Politics</option>
                    <option value="Ministry">Ministry</option>
                    <option value="Professional">Professional</option>
                    <option value="Services">Services</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div id="gbusiness" style="display: none;">
                <div class="col-xs-3">Business:</div>
                <div class="col-xs-3">
                    <select name="guardianbusiness" id="guardianbusiness" class="text-box">
 <option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsguardianBusiness))
		{
					$guardianbusiness=$row1[0];
		?>
		<option value="<?php echo $guardianbusiness; ?>"><?php echo $guardianbusiness; ?></option>
		<?php 
		}
		?>                    </select>
                </div>
            </div>
            <div id="gpolitical" style="display: none;" >
                <div class="col-xs-3">Political:</div>
                <div class="col-xs-3"><input type="text" name="guardianpolitical" id="guardianpolitical" class="text-box"></div>
            </div>
            <div id="gministry" style="display: none;" >
                <div class="col-xs-3">Ministry:</div>
                <div class="col-xs-3"><input type="radio" name="guardianministry" id="guardianministry" value="External Affairs">External Affairs
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="guardianministry" id="guardianministry" value="SSI">SSI
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="guardianministry" id="guardianministry" value="Others">Others
                </div>
            </div>
            <div id="gprofessional" style="display: none;">
                <div class="col-xs-3">Professional:</div>
                <div class="col-xs-3">
                    <select name="guardianprofssional" id="guardianprofssional" class="text-box">
 <option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsguardianProfession))
		{
					$guardianprofession=$row1[0];
		?>
		<option value="<?php echo $guardianprofession; ?>"><?php echo $guardianprofession; ?></option>
		<?php 
		}
		?>                    </select>
                </div>
            </div>
            <div id="gservicess" style="display: none;" >
                <div class="col-xs-3">Services:</div>
                <div class="col-xs-3">
                    <select name="guardianservices" id="guardianservices" class="text-box">
 <option selected="" value="">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsguardianService))
		{
					$guardianservice=$row1[0];
		?>
		<option value="<?php echo $guardianservice; ?>"><?php echo $guardianservice; ?></option>
		<?php 
		}
		?>                    </select>               
                </div>
            </div>
            <div id="gothers" style="display: none;" >
                <div class="col-xs-3">Others:</div>
                <div class="col-xs-3"><input type="text" name="guardianothers" id="guardianothers" class="text-box" ></div> 
            </div>
            <div class="col-xs-3"> Designation:<br><font class="f"> (If employed)</font></div>
            <div class="col-xs-3"> <input name="txtGuradianDesignation" id="txtMotherDesignation0" class="text-box" type="text" ></div>
        </div>
        <div class="row">
            <div class="col-xs-3 xs"> Organization Name:<br><font class="f">(If employed)</font></div>
            <div class="col-xs-3 xs1"> <input name="txtGuradianCompanyName" id="txtMotherCompanyName0" type="text" class="text-box" ></div>
            <div class="col-xs-3"> Mobile No.:</div>
            <div class="col-xs-3"> <input name="txtGuradianMobileNo" id="txtFatherOfficialPhNo4" class="text-box" type="text"  pattern="[0-9]{10}" title="9999999999" ></div>  
        </div>
        <div class="row">
            <div class="col-xs-3 xs"> Office Address:<br><font class="f">(If employed):</font></div>
            <div class="col-xs-3 xs1"> <textarea name="txtGuradianOfficialAddress" id="txtMotherOfficialAddress0" class="text-box-address text-box" rows="2"></textarea> </div>
            <div class="col-xs-3 xs"> Office Landline No:</div>
            <div class="col-xs-3 xs1"> <input type="text" name="txtguardianofficeno" id="txtguardianofficeno" class="text-box"></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Email id:</div>
            <div class="col-xs-3"> <input name="txtguardianEmailId" id="txtguardianEmailId" class="text-box" type="email" ></div>
            <div class="col-xs-6">&nbsp;</div>
        </div>
        <div>&nbsp;</div><div>&nbsp;</div>
        <div class="h" align="center">
            <strong>Category</strong>*
            <i>(Please select the relevant Category / Categories and fill the details as applicable. 
             Parents are required to produce 
            the relevant documents at the time of Admission. In case the documents are not produced, the candidature will be rejected)</i>
        </div>
        <div>&nbsp;</div>
        <div class="check check1" >
            <table>
                <tr> 
                    <td><input name="chkFatherAlumni" id="chkFatherAlumni" type="checkbox" value="YES" onClick="javascript:fnlChkCategory('chkFatherAlumni');"></td> 
                    <td class="col1"><strong>Father DPS Alumni</strong></td> 
                </tr>
            </table>
            <table> 
                <tr> 
                    <td><input name="chkMotherAlumni" id="chkMotherAlumni" type="checkbox" value="YES" onClick="javascript:fnlChkCategory('chkMotherAlumni');"></td>
                    <td class="col1"><strong>Mother DPS Alumni</strong></td>  
                </tr>
            </table>
            <table>
                <tr> 
                    <td><input name="chkDPSStaff" id="chkDPSStaff" type="checkbox" value="YES" onClick="javascript:fnlChkCategory('chkDPSStaff');"></td>
                    <td class="col1"><strong>DPS Rohini  Staff</strong></td> </tr>
            </table>
            <table>
                <tr> 
                    <td><input name="chkSpecialNeed" id="chkSpecialNeed" type="checkbox" value="YES" onClick="javascript:fnlChkCategory('chkSpecialNeed');"></td>
                    <td class="col1"><strong>Special  Needs</strong></td> 
                </tr>
            </table> 
            <table>
                <tr>
                    <td><input name="otherdpsstaff" id="chkOtherdpsCategory" type="checkbox" value="YES" onClick="javascript:fnlChkCategory('chkOtherdpsCategory');"></td>
                    <td class="col1"><strong>Other DPS  Staff</strong></td> 
                </tr>
            </table>
        </div> 
        <div class="study">
            <div class="h h12" align="center">Details of Father / Mother, if Alumni of <font style="text-transform:uppercase">Delhi public school</font></div>
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
		<?php
			while($rowSchoolList = mysql_fetch_row($rsSchooListFather))
			{
				$SchoolList=$rowSchoolList [0];
		?>
		<option value="<?php echo $SchoolList;?>"><?php echo $SchoolList;?></option>
		<?php
			}
		?>                    </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Passout Year:</div>
            <div class="col-xs-3"> <input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" size="20" readonly></div>
            <div class="col-xs-3"> Last Class Attended:</div>
            <div class="col-xs-3"> <select size="1" name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box tbs" disabled>
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
            </div>
        </div>
        <div class="row">	
            <div class="col-xs-3"> Passout Year:</div>
            <div class="col-xs-3"> <input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" type="text" readonly></div>
            <div class="col-xs-3"> Last Class Attended:</div>
            <div class="col-xs-3"> 
                <select size="1" name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box tbs" disabled="disabled">
                    <option value="">Select One</option>
                    <option value="10th">10th</option>
                    <option value="12th">12th</option>
                </select>
            </div>
        </div>
        <div>&nbsp; </div>
        <div align="center"><strong><u>Special Needs Details</u></strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3">Special Needs (if any):</div>
            <div class="col-xs-3">
                <select size="1" name="cboSpecialNeed" id="cboSpecialNeed" class="text-box tbs"  onchange="Javascript:fnlChkSpecialNeedDetail();" disabled="disabled">
                    <option value="">Select One</option>
                    <option value="Low Vision">Low Vision</option>
                    <option value="Locomotor Disability">Locomotor Disability</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="col-xs-3">(If Others, please specify):</div>
            <div class="col-xs-3"><input type="text" name="txtSpecialNeedDetail" id="txtSpecialNeedDetail" class="text-box"   style="display: none;"></div>
        </div>
        <div>&nbsp; </div>
        <div align="center"><strong><u>Category</u></strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3">Select Category*:</div>
            <div class="col-xs-3">
                <select size="1" name="cbocatagory" id="cbocatagory" class="text-box tbs"  onchange="Javascript:fnlChkCatagory();" required="true">
                    <option value="">Select One</option>
                    <option value="General">General</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                    <option value="OBC">OBC</option>
                    <option value="Minority">Minority</option>
                    <option value="Others">Other(Specify)</option>
                </select>
            </div>
            <div class="col-xs-3">(If Others, please specify):</div>
            <div class="col-xs-3"><input type="text" name="txtothercatagory" id="txtothercatagory" class="text-box"   style="display: none;"></div>
        </div>
        <div>&nbsp;</div>
        <div class="h" align="center"><strong>Contact Details for all Admission Related Information</strong> </div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3"> Name of the contact person*:</div>
            <div class="col-xs-3"> <input name="txtcontactpersonname" id="txtcontactpersonname"  class="text-box"  type="text" required></div>
            <div class="col-xs-3"> Mobile No*:</div>
            <div class="col-xs-3"> <input name="txtemergencyMobile" id="txtemergencyMobile" type="text" class="text-box" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" required></div>
            <div class="col-xs-3"> E-mail Id*:</div>
            <div class="col-xs-3"> <input name="txtemergencyemail" id="txtemergencyemail" type="email" class="text-box" required></div>
            <div class="col-xs-6">&nbsp;</div> 
        </div>
        <div>&nbsp;</div>
        <div class="h" align="center"><strong> Documents to be Uploaded <p>(Please note maximum file size allowed per upload is 250 KB.)</p> </strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-6 xss"><b> 1. Copy of Birth Certificate issued by Municipal Corporation* :</b></div>
            <div class="col-xs-6 xss1"> <input type="file" name="F1"  id="F1" required /><span style="color:red;" id="errorMessageF1"></span> </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"><b> 2. Photograph of Applicant*</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
            <div class="col-xs-6 xss1"> <input type="file" name="F2" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif" required><span style="color:red;" id="errorMessageF1"></span> </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"><b> 3. Photograph of Father*</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
            <div class="col-xs-6 xss1"> <input type="file" name="F3" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif" required><span style="color:red;" id="errorMessageF2"></span> </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"><b> 4. Photograph of Mother*</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
            <div class="col-xs-6 xss1"> <input type="file" name="F4" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif" required><span style="color:red;" id="errorMessageF1"></span> </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"><b> 5. Photograph of Guardian (if applicable)</b> (Kindly upload only GIF, JPEG, PNG, BMP format):</div>
            <div class="col-xs-6 xss1"> <input type="file" name="F5" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"><span style="color:red;" id="errorMessageF1"></span> </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"> <b>6. Copy Of ST/SC/OBC Certificate (if applicable) :</b></div>
            <div class="col-xs-6 xss1"> <input type="file" name="F6" > </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"> <b>7. Copy of Medical Document/Certificate(if belongs to special need) (if applicable) :</b></div>
            <div class="col-xs-6 xss1"> <input type="file" name="F7" id="F7" disabled="true"> </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"> <b>8. Residence Proof* :</b><br>
                <div class="row">
                    <div class="col-xs-1">&nbsp;</div>
                    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Ration Card" required> </div>
                    <div class="col-xs-10">Ration Card issued in the name of parents(mother / father having name of the child)</div> 
                </div>
                <div class="row">
                    <div class="col-xs-1">&nbsp;</div>
                    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Domicile" required> </div>
                    <div class="col-xs-10">Domicile Certificate of child or his/her parents.</div> 
                </div>
                <div class="row">
                    <div class="col-xs-1">&nbsp;</div>
                    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Voter ID" required> </div>
                    <div class="col-xs-10">Voter Identity Card / EPIC of any of the parents or child.</div> 
                </div>
                <div class="row">
                    <div class="col-xs-1">&nbsp;</div>
                    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Electric Bill" required> </div>
                    <div class="col-xs-10">Electricity bill / MTNL telephone bill / Water bill / Passport in the name of any of the parents or child.</div> 
                </div>
                <div class="row">
                    <div class="col-xs-1">&nbsp;</div>
                    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Aadhar Card" required> </div>
                    <div class="col-xs-10">Aadhar Card / Unique Identity Card of Mother / Father / Child issued by the Government of India.</div> 
                </div>
            </div>
            <div class="col-xs-6 xss1"> <input type="file" name="F8" required> </div> 
        </div>
        <div class="row">
            <div class="col-xs-6 xss"><b> 9. Report card of Term-I Exam of academic session 2016-17:</b></div>
            <div class="col-xs-6 xss1"> <input type="file" name="F9" id="F9"> </div>
        </div>
        <div class="row">
            <div class="col-xs-6 xss"><b> 10. Report card of Final Term Exam of academic session 2015-16*:</b></div>
            <div class="col-xs-6 xss1"> <input type="file" name="F10" id="F10" required> </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
        	<div class="col-xs-3">Remarks (If any):</div>
        	<div class="col-xs-3"><textarea name="remark" id="remark" class="text-box tba" rows="2"></textarea></div>
        	<div class="col-xs-6">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="padding:0 4%;">
                <strong>Undertaking:</strong>
                <p><b>1.</b> I understand that the registration fee of <span style="font-weight: 400">INR 25</span>/- 
                    ( as applicable ) is towards the processing fee for the admission process. It is 
                    non-refundable and registration does not guarantee admission.</p>
                <p><b>2.</b> I understand that rendering false / incorrect or misleading 
                    information shall disqualify the applicant for admission to this school and  
                    also that an incomplete form will be rejected without assigning any reason.</p>
                <p><b>3.</b> I 
                    understand that no change/re submission will be entertained by the school in case of an incorrect entry.</p>
                <p><b>4.</b> I 
                    understand that the decision of the Management of the School shall be 
                    final and binding on me for which I will not file any objection / case 
                    in any court of law or with any other Authority anywhere in India.</p>
                <p><b>5.</b> I hereby confirm the above declarations.</p>
            </div>
        </div>
        <div class="row" style="padding-left:3%;">
            <div class="col-xs-3"><b>Place :</b></div>
            <div class="col-xs-3"> <input type="text" name="txtplaceofregistration" class="text-box" > </div>
            <div class="col-xs-6">&nbsp;</div>
        </div>
        <div class="row" style="padding-left:3%;"> 
            <div class="col-xs-3"><b> Date :</b> </div>
            <div class="col-xs-3"><input typr="text" name="txtdateofregistration" value="<?php echo $currentdate;?>" style="border:none"></div>
            <div class="col-xs-6">&nbsp;</div>
        </div>
        <div class="col-xs-12" align="center"> <input name="BtnSubmit" type="submit" value="I Agree" class="btn"/></div>
	</div>
	<div>&nbsp;</div>
	</form>
</div>
</body>
</html>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
$('#F1').bind('change', function() {
    var f1Size=(this.files[0].size/1024);
    if(f1Size >300){
       $("#errorMessageF1").html("Maximum file size limit is 300kb");
    }
});
$('#F2').bind('change', function() {
    var f2Size=(this.files[0].size/1024);
    if(f2Size >300){
       $("#errorMessageF2").html("Maximum file size limit is 300kb");
    }
});
$('#F3').bind('change', function() {
    var f3Size=(this.files[0].size/1024);
    if(f3Size >300){
       $("#errorMessageF3").html("Maximum file size limit is 300kb");
    }
});
$('#F4').bind('change', function() {
    var f4Size=(this.files[0].size/1024);
    if(f4Size >300){
       $("#errorMessageF4").html("Maximum file size limit is 300kb");
    }
});
$('#F5').bind('change', function() {
    var f5Size=(this.files[0].size/1024);
    if(f5Size >300){
       $("#errorMessageF5").html("Maximum file size limit is 300kb");
    }
});
$('#F6').bind('change', function() {
    var f6Size=(this.files[0].size/1024);
    if(f6Size >300){
       $("#errorMessageF6").html("Maximum file size limit is 300kb");
    }
});
$('#F7').bind('change', function() {
    var f7Size=(this.files[0].size/1024);
    if(f7Size >300){
       $("#errorMessageF7").html("Maximum file size limit is 300kb");
    }
});
$('#F6').bind('change', function() {
    var f6Size=(this.files[0].size/1024);
    if(f7Size >300){
       $("#errorMessageF6").html("Maximum file size limit is 300kb");
    }
});
$('#F7').bind('change', function() {
    var f7Size=(this.files[0].size/1024);
    if(f7Size >300){
       $("#errorMessageF7").html("Maximum file size limit is 300kb");
    }
});
$('#F8').bind('change', function() {
    var f8Size=(this.files[0].size/1024);
    if(f8Size >300){
       $("#errorMessageF8").html("Maximum file size limit is 300kb");
    }
});
$('#F9').bind('change', function() {
    var f9Size=(this.files[0].size/1024);
    if(f9Size >300){
       $("#errorMessageF9").html("Maximum file size limit is 300kb");
    }
});
$('#F13').bind('change', function() {
    var f13Size=(this.files[0].size/1024);
    if(f13Size >300){
       $("#errorMessageF13").html("Maximum file size limit is 300kb");
    }
});
  $('#F14').bind('change', function() {
    var f14Size=(this.files[0].size/1024);
    if(f14Size >300){
       $("#errorMessageF14").html("Maximum file size limit is 300kb");
    }
});      
    });
    </script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
      $("#txtFatherOccupation").change(function(){
        var accupation=$("#txtFatherOccupation").val();
        
      if(accupation=="Business"){
          $("#fbusiness").css("display", "block");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
          
       }else if(accupation=="Political"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "block");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
       }else if(accupation=="Ministry"){
           $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "block");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
       }else if(accupation=="Professional"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "block");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
       }else if(accupation=="Services"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "block");
          $("#fothers").css("display", "none");
       }else if(accupation=="Others"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "block");
       }
      });  
       
       $("#txtMotherOccupation").change(function(){
         
        var maccupation=$("#txtMotherOccupation").val();
        
      if(maccupation=="Business"){
          $("#mbusiness").css("display", "block");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");

       }else if(maccupation=="Political"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "block");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Ministry"){

           $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "block");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Professional"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "block");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Services"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "block");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Others"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "block");
       }
    });
    
    $("#txtGuradianOccupation").change(function(){
         
        var gaccupation=$("#txtGuradianOccupation").val();
        
      if(gaccupation=="Business"){

          $("#gbusiness").css("display", "block");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");

       }else if(gaccupation=="Political"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "block");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Ministry"){
           $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "block");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Professional"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "block");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Services"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "block");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Others"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "block");
       }
    });
    
    });
    
    </script>
   