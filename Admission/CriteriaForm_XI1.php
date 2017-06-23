<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
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

	
<html>
<script>
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



function fnlselectsubjectDetail()
{
    
	
	if((document.getElementById("cbostream").value =="Science"))
	{
	       document.getElementById("div1").style.display ="block";
               document.getElementById("cbohuminitiessubject2").required = false;
               document.getElementById("cbohuminitiessubject3").required = false;
               document.getElementById("cbohuminitiessubject4").required = false;
               document.getElementById("cbohuminitiessubject5").required = false;
                
                
                
	}
	else
	{
		
		document.getElementById("div1").style.display ="none";
		
	}
	if((document.getElementById("cbostream").value =="Commerce"))
	{
	       document.getElementById("div2").style.display ="block";
               document.getElementById("cbohuminitiessubject2").required = false;
               document.getElementById("cbohuminitiessubject3").required = false;
               document.getElementById("cbohuminitiessubject4").required = false;
               document.getElementById("cbohuminitiessubject5").required = false;
               document.getElementById("cbosciiencesubject5").required = false;
	}
	else
	{
		
		document.getElementById("div2").style.display ="none";
		
	}
	if((document.getElementById("cbostream").value =="Humanities"))
	{
		document.getElementById("div3").style.display ="block";
                  document.getElementById("cbosciiencesubject5").required = false;
	}
	else
	{
		
		document.getElementById("div3").style.display ="none";
		
	}
}
</script>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">

<title>Criteria Form</title>
<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
    <script src="../bootstrap/bootstrap.min.js"></script>
    
	
	
	
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
 <form name="criteriaform" id="criteriaform" method="post" action="StudentRegistration_XI.php">
		
 
  <div>&nbsp;</div>
  <div style="background-color: #0b462d; padding:2px 0; color:#FFFFFF;">
    <h4 align="center">ACADEMIC PROFILE - XI (Session 2017 - 18)</h4>
  </div>
 <!-- <div class="info">
  	<h4>Parents are requested to note : </h4>
	<p><font size="+2">&raquo;</font>  This is not an Admission Form. Submission of this form does not guarantee admission to school.</p>
	<p><font size="+2">&raquo;</font>  This form is non-transferable and Registration fee is <strong>INR 25/-</strong> </p>
  </div>
  <div align="center" class="h h11"><b><font >Student Detail</font></b></div>-->
  <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Class Applied For*:</div>
  <div class="col-xs-3"><input type="text" name="cboClass" id="cboClass" class="text-box" value="Class XI" onChange="Javascript:GetFeeDetail();" required="true" readonly>
  </div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div class="row" >
  <div class="col-xs-3"> First Name of Applicant*: </div>
  <div class="col-xs-3"> <input name="txtfirstName" id="txtfirstName" type="text" class="text-box" required="true"> </div>
  <div class="col-xs-3 xs"> Middle Name of Applicant:</div>
  <div class="col-xs-3 xs1"> <input name="txtMiddleName" id="txtMiddleName" type="text" class="text-box" size="20"></div>  
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Last Name of Applicant:</div>
  <div class="col-xs-3 xs1"> <input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20"></div>
  <div class="col-xs-3"> Place of Birth:</div>
  <div class="col-xs-3"> <input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Date of Birth*:<!--<br><font class="f">(mm/dd/yyyy)</font>--></div>
  <div class="col-xs-3"> <input name="txtDOB" id="txtDOB" type="date" class="text-box" placeholder="mm/dd/yyyy" required="true"></div>
  <div class="col-xs-3 xs"> Age as on*:<!--<br><font class="f"> (01.04.2016)</font>--></div>
  <div class="col-xs-3 xs1"> <input name="txtAge" id="txtAge" type="text" class="text-box" onClick="javascript:CalculateAgeInQC();" readonly placeholder="31-Mar-2017" required="true"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Gender*:</div>
  <div class="col-xs-3"> 
  	<select size="1" name="txtSex" id="txtSex" class="text-box tbs" required="true">
		<option selected value="">Select One</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select>
  </div>
  <div class="col-xs-3"> Mother Tongue*: </div>
  <div class="col-xs-3"> <input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text" required="true"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Nationality: </div>
  <div class="col-xs-3"> <input name="txtNationality" id="txtNationality" type="text" class="text-box" value="Indian"></div>
  <div class="col-xs-3"> Last School Attended*: </div>
  <div class="col-xs-3"> <input name="txtLastSchool" id="txtLastSchool" type="text" class="text-box" required="true"></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Residential Address*: </div>
  <div class="col-xs-3 xs1"> <textarea name="txtAddress" id="txtAddress" class="text-box-address text-box tba" rows="2" required="true"></textarea></div>
   <div class="col-xs-3">Residential Landline Number:</div>
  <div class="col-xs-3"><input type="number" name="residentialno" id="residentialno" class="text-box tba"></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Permanent Address: </div>
  <div class="col-xs-3 xs1"> <textarea name="txtpermanentAddress" id="txtpermanentAddress" class="text-box-address text-box tba" rows="2"></textarea></div>
  <div class="col-xs-3">Permanent Landline Number:</div>
  <div class="col-xs-3"><input type="number" name="permanentno" id="permanentno" class="text-box tba"></div>
 
 </div>
<div>&nbsp;</div>

<div>&nbsp;</div>
<div align="center" class="h h11"><b><font >Enter your grades in Class X Term-I Exam</font></b></div>
  <div class="row">
  <div class="col-xs-3 xs"> English</div>
  <div class="col-xs-3 xs1"> <select name="cboenglish" id="cboenglish" class="text-box" required="true">
  	<option value="">Select One</option>
  	<option value="A1">A1</option>
  	<option value="A2">A2</option>
  	<option value="B1">B1</option>
  	</select></div>
  <div class="col-xs-3">Science</div>
  <div class="col-xs-3"><select name="cbogeneralscience" id="cbogeneralscience" class="text-box" required="true">
  	<option value="">Select One</option>
  	<option value="A1">A1</option>
  	<option value="A2">A2</option>
  	<option value="B1">B1</option>
  	</select></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Social Science</div>
  <div class="col-xs-3"><select name="cbosocialscience" id="cbosocialscience" class="text-box" required="true">
  	<option value="">Select One</option>
  	<option value="A1">A1</option>
  	<option value="A2">A2</option>
  	<option value="B1">B1</option>
  	<option value="B2">B2</option>
  	<option value="C1">C1</option>
  	</select></div>
  <div class="col-xs-3 xs"> Mathematics</div>
  <div class="col-xs-3 xs1"> <select name="cbomath" id="cbomath" class="text-box" required="true">
  	<option value="">Select One</option>
  	<option value="A1">A1</option>
  	<option value="A2">A2</option>
  	<option value="B1">B1</option>
  	</select></div>
	 </div>
	<div class="row">
  <div class="col-xs-3">IInd Language</div>
  <div class="col-xs-3"><select name="cbosecondlanguage" id="cbosecondlanguage" class="text-box" required="true">
  	<option value="">Select One</option>
  	<option value="A1">A1</option>
  	<option value="A2">A2</option>
  	<option value="B1">B1</option>
  	<option value="B2">B2</option>
  	<option value="C1">C1</option>
  	</select></div>
 </div>
 
 <div>&nbsp;</div>
<div align="center" class="h h11" style="text-transform:capitalize;"><b>SPECIAL ACHIEVEMENTS (Sports, Cultural, Public Speaking, Olympiads, Exhibition/ Model Making etc)</b></div>
  
       <div class="row" >
  <div class="col-xs-3 xs"> Sr. No. </div>
  <div class="col-xs-3 xs"> <b>Special Achievements</b> </div>
  <div class="col-xs-3 xs"> Level</div>
  <div class="col-xs-3 xs"><b> Position/Rank</b></div>  
 </div>
        <div class="row" >
  <div class="col-xs-3"> 1</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement1" id="SpecialAchievement1" class="text-box tba"></div>
  <div class="col-xs-3 xs"> <input type="text" name="AchievementLevel1" id="AchievementLevel1" class="text-box tba"></div>
  <div class="col-xs-3 xs1"> <input type="text" name="AchievementRenk1" id="AchievementRenk1" class="text-box tba"></div>  
 </div>
          <div class="row" >
  <div class="col-xs-3"> 2</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement2" id="SpecialAchievement2" class="text-box tba"></div>
  <div class="col-xs-3 xs"> <input type="text" name="AchievementLevel2" id="AchievementLevel2" class="text-box tba"></div>
  <div class="col-xs-3 xs1"> <input type="text" name="AchievementRenk2" id="AchievementRenk2" class="text-box tba"></div>  
 </div>
         <div class="row" >
  <div class="col-xs-3"> 3</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement3" id="SpecialAchievement3" class="text-box tba"></div>
  <div class="col-xs-3 xs"> <input type="text" name="AchievementLevel3" id="AchievementLevel3" class="text-box tba"></div>
  <div class="col-xs-3 xs1"> <input type="text" name="AchievementRenk3" id="AchievementRenk3" class="text-box tba"></div>  
 </div>
          <div class="row" >
  <div class="col-xs-3"> 4</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement4" id="SpecialAchievement4" class="text-box tba"></div>
  <div class="col-xs-3 xs"> <input type="text" name="AchievementLevel4" id="AchievementLevel4" class="text-box tba"></div>
  <div class="col-xs-3 xs1"> <input type="text" name="AchievementRenk4" id="AchievementRenk4" class="text-box tba"></div>  
 </div>
          <div class="row" >
  <div class="col-xs-3"> 5</div>
  <div class="col-xs-3"><input type="text" name="SpecialAchievement5" id="SpecialAchievement5" class="text-box tba"></div>
  <div class="col-xs-3 xs"> <input type="text" name="AchievementLevel5" id="AchievementLevel5" class="text-box tba"></div>
  <div class="col-xs-3 xs1"> <input type="text" name="AchievementRenk5" id="AchievementRenk5" class="text-box tba"></div>  
 </div>
 
  <div class="row" >
  <div class="col-xs-12"><b> **To be supportedby documentary evidence if shortlisted for admission.</b></div>
  </div>
 
 <div>&nbsp;</div>
 <div align="center" class="h h11"><b><font >Select Stream and Subject to apply for</font></b></div>
 <div class="subject" id="frmMyform">
  <div class="row">
   <div class="col-xs-3">Select Stream</div>
   <div class="col-xs-3"><strong><select name="cbostream" id="cbostream" class="text-box" required="true" onChange="Javascript:fnlselectsubjectDetail();" >
  	<option value="" selected>Select One</option>
  	<option id="Science" value="Science" ><b>Science</b></option>
  	<option id="Commerce" value="Commerce"><b>Commerce</b></option>
  	<option id="Humanities" value="Humanities"><b>Humanities</b></option>
  	</select></strong></div>
   <div class="col-xs-6">&nbsp;</div>
  </div>
 <div id="div1" style="display:none">
  <div class="row"> 
   <div class="col-xs-3">Subject 1</div>
   <div class="col-xs-3"><input type="text" name="cbosciiencesubject1" id="cbosciiencesubject1" class="text-box" value="English Core"  readonly ></div>
   <div class="col-xs-3">Subject 2</div>
   <div class="col-xs-3"><input type="text" name="cbosciiencesubject2" id="cbosciiencesubject2" class="text-box" value="Physics"  readonly ></div>
  </div>
  <div class="row"> 
   <div class="col-xs-3">Subject 3</div>
   <div class="col-xs-3"><input type="text" name="cbosciiencesubject3" id="cbosciiencesubject3" class="text-box" value="Chemistry" readonly ></div>
   <div class="col-xs-3">Subject 4</div>
   <div class="col-xs-3"><input type="text" name="cbosciiencesubject4" id="cbosciiencesubject4" class="text-box" value="Mathematics/Physical Education"  readonly ></div>
  </div>
  <div class="row">
   <div class="col-xs-3">Subject 5</div>
   <div class="col-xs-3"><select name="cbosciiencesubject5" id="cbosciiencesubject5" class="text-box" required="true">
  	<option value="">Select One</option>
    <option value="Computer Science" >Computer Science</option>
    <option value="Physical Education" >Physical Education</option>
    <option value="Bio" >Economics</option>
    <option value="Math" >Biology</option>
  	</select></div>
   <div class="col-xs-6">&nbsp;</div>
  
  </div>
 </div>
 <div id="div2" style="display:none;">
  <div class="row"> 
   <div class="col-xs-3">Subject 1</div>
   <div class="col-xs-3"><input type="text" name="cbocommercesubject1" id="cbocommercesubject1" class="text-box" value="English Core"  readonly ></div>
   <div class="col-xs-3">Subject 2</div>
   <div class="col-xs-3"><input type="text" name="cbocommercesubject2" id="cbocommercesubject2" class="text-box" value="Business Studies" readonly ></div>
  </div>
  <div class="row"> 
   <div class="col-xs-3">Subject 3</div>
   <div class="col-xs-3"><input type="text" name="cbocommercesubject3" id="cbocommercesubject3" class="text-box" value="Accountancy"  readonly ></div>
   <div class="col-xs-3">Subject 4</div>
   <div class="col-xs-3"><input type="text" name="cbocommercesubject4" id="cbocommercesubject4" class="text-box" value="Mathematics"  readonly ></div>
  </div>
  <div class="row">
   <div class="col-xs-3">Subject 5</div>
   <div class="col-xs-3"><input type="text" name="cbocommercesubject5" id="cbocommercesubject5" class="text-box" value="Economics"  readonly ></div>
   <div class="col-xs-6">&nbsp;</div>
  </div>
 </div>
 <div id="div3" style="display:none;">
  <div class="row"> 
   <div class="col-xs-3">Subject 1</div>
   <div class="col-xs-3"><input type="text" name="cbohuminitiessubject1" id="cbohuminitiessubject1" class="text-box" value="English Core"  readonly ></div>
   <div class="col-xs-3">Subject 2</div>
   <div class="col-xs-3"><select name="cbohuminitiessubject2" id="cbohuminitiessubject2" class="text-box" required="true" >
  	<option value="">Select One</option>
  	<option value="History" >History</option>
	<option value="Geography" >Geography</option>
  	</select></div>
  </div>
  <div class="row"> 
   <div class="col-xs-3">Subject 3</div>
   <div class="col-xs-3"><select name="cbohuminitiessubject3" id="cbohuminitiessubject3" class="text-box" required="true" >
  	<option value="">Select One</option>
  	<option value="Economics" >Economics</option>
	<option value="Sociology" >Sociology</option>
  	</select></div>
   <div class="col-xs-3">Subject 4</div>
   <div class="col-xs-3"><select name="cbohuminitiessubject4" id="cbohuminitiessubject4" class="text-box" required="true" >
  	<option value="">Select One</option>
  	<option value="Mathematics" >Mathematics</option>
	<option value="Political Science" >Political Science</option>
	<option value="Physical Education" >Physical Education</option>
	<option value="Commercial Art" >Commercial Art</option>
  	</select></div>
  </div>
  <div class="row"> 
   <div class="col-xs-3">Subject 5</div>
   <div class="col-xs-3"><select name="cbohuminitiessubject5" id="cbohuminitiessubject5" class="text-box" required="true" >
  	<option value="">Select One</option>
  	<option value="Psychology" >Psychology</option>
	<option value="Informatics Practices" >Informatics Practices</option>
	<option value="Human Rights & Gender Studies" >Human Rights & Gender Studies</option>
  	</select></div>
   <div class="col-xs-6">&nbsp;</div>
  </div>
 </div>
</div>

 <div>&nbsp;</div>
  <div class="col-xs-12" align="center"> <input name="BtnSubmitCreteria" type="submit" value="Submit" /></div>
 </form>
 </div>
 


</head>
<body>
 

 </body>
 </html>
 
 
