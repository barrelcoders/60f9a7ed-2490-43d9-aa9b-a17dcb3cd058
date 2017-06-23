<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
<?php
$regno=$_REQUEST['ApplicationNo'];
$values=mysql_query("SELECT `srno`, `RegistrationNo`, `sclass`, `sname`, `middlename`, `slastname`, `PlaceOfBirth`, `dob`, `Age`, `Sex`, `MotherTongue`, `bloodgroup`, `Nationality`, `LastSchool`, `SecondLanguage`, `ResidentialAddress`, `ResidencePhoneNo`, `PermanentAddress`, `PermanentPhoneNo`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherOccupation`, `fatherbusiness`, `fatherpolitical`, `fatherministry`, `fatherprofssional`, `fatherservices`, `fatherothers`, `FatherDesignation`, `FatherCompanyName`, `FatherMobileNo`, `FatherEmailId`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `MotherName`, `MotherAge`, `MotherEducation`, `MotherOccupatoin`, `motherbusiness`, `motherpolitical`, `motherministry`, `motherprofssional`, `motherservices`, `motherothers`, `MotherDesignation`, `MotherCompanyName`, `MotherMobile`, `MotherEmail`, `MotherOfficeAddress`, `MotherOfficePhone`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `guardianbusiness`, `guardianpolitical`, `guardianministry`, `guardianprofssional`, `guardianservices`, `guardianothers`, `GuradianDesignation`, `GuradianCompanyName`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `GuardianEmailId`, `GuardiansAddress`, `GuradianOfficialAddress`, `Sibling`, `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `DPSRohiniStaff`, `OtherDPSStaff`, `Single_Parent`, `RealBroSisName`, `RealBroSisClass`, `RealBroSisAdmissionNo`, `RealBroSisName2`, `RealBroSisClass2`, `RealBroSisAdmissionNo2`, `Single_Parent_Reason`, `Other_single_parent`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `Category`, `OtherCatagoryDetail`, `EmergencyContactPersonName`, `EmergencyContactNo`, `EmergencyEmail`, `BirthCertificate`, `ProfilePhoto`, `FatherPhoto`, `MotherPhoto`, `GuardianPhoto`, `CatagoryCertificate`, `OtherCatagoryCertificate`, `ParentDPSStaff`, `ParentDPSAlumni`, `class8_trm1`, `class7_finlexm`, `AadharNumber`, `ResidenceProof`, `ResidenceProofType`, `RegistrationPlace`, `RegistrationDate`, `TxnAmount`, `TxnStatus`, `pgTxnNo`, `TxRefNo`, `TxMsg` FROM `NewStudentRegistration_temp_9th` WHERE `RegistrationNo`='$regno'");
$data=mysql_fetch_array($values);
$old_date = Date_create($reportData['dob']);
$new_date = Date_format($old_date, "d/m/Y");
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
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">
<title>Student Registration</title>
<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
    <script src="../../bootstrap/bootstrap.min.js"></script>
		<style> body{font-family:Arial, Helvetica, sans-serif!important;} .Header .img-responsive{width:40%; color:#000!important;}
		 .text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .row{padding-left:0%; margin:0;} .h{background-color:rgba(11, 70, 45, 0.84); padding:4px 0px; color:#FFFFFF;} .h11{ text-transform:uppercase;} .col-xs-6{ text-align:left; margin-top:1%!important;} .hr{width:99%; border:1px solid #CCCCCC; padding:0;} .col-xs-3, .col-xs-9{margin-top:1%; } .f{font-size:12px;} .col-xs-2{width:12%; padding:0; border:1px solid #0099ff; } .col-xs-2 li{list-style:none; padding:5%;} .info{ padding:1%; margin:0; line-height:0.5;} .tba{ width:90%; } .tbs{padding:2.5%;}
		 .col-xs-3:nth-child(odd){font-weight:600;} .col-xs-1{width:2%;}
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
		 .col-xs-1{width:2%; float:left;} .col-xs-10{width:70%; float:left;} .xs11{margin-top:8%;}
		 } 
		 @media only screen and (min-width:530px) and (max-width: 580px){ body{font-size:12px;} .Header .img-responsive{width:40%}
		 .col-xs-3{ width:50%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:49%; } .col-xs-2 .text-box{height:25px; }  .xss{width:45%!important; font-size:12px;} .xss1{ width:45%; font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:90%; } .info p{line-height:1.2;} .check table{width:45%; float:left;} .study{margin-top:40%;}
		  .col-xs-1{width:2%; float:left;} .col-xs-10{width:70%; float:left;} .xs11{margin-top:8%;}
		 } 
		 @media only screen and (min-width:445px) and (max-width: 530px){ body{font-size:14px; line-height:1;} .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .text-box{width:100%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:50%; margin-top:1%;  } .col-xs-2 .text-box{height:25px; } .xss{width:80%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:50%; }.info p{line-height:1.2;} .check table{width:95%; float:left;}
		  .col-xs-1{width:2%; float:left;} .col-xs-10{width:70%; float:left;} .xs11{margin-top:8%;}
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
 <form name="frmNewStudent" id="frmNewStudent" method="post" action="class_9th_payment.php" enctype="multipart/form-data">        
  <div>&nbsp;</div>
  <div align="center" class="h h11"><b><font >Student Details</font></b></div>
  <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Class Applied For*:</div>
  <div class="col-xs-3"> <input type="text" name="cboClass" id="cboClass" class="text-box" value="<?php echo $data['sclass']; ?>" readonly>  </div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div class="row" >
  <div class="col-xs-3"> First Name of Applicant*: </div>
  <div class="col-xs-3"> <input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $data['sname']; ?>" readonly/> </div>
  <div class="col-xs-3"> Middle Name of Applicant:</div>
  <div class="col-xs-3"> <input name="txtMiddleName" id="txtMiddleName" type="text" class="text-box" value="<?php echo $data['middlename']; ?>" readonly></div>  
 </div>
 <div class="row">
  <div class="col-xs-3"> Last Name of Applicant:</div>
  <div class="col-xs-3"> <input name="txtLastName" id="txtLastName" type="text" class="text-box" value="<?php echo $data['slastname']; ?>" readonly></div>
  <div class="col-xs-3"> Place of Birth:</div>
  <div class="col-xs-3"> <input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text" value="<?php echo $data['PlaceOfBirth']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Date of Birth*:</div>
  <div class="col-xs-3"> <input name="txtDOB" id="txtDOB" type="text" class="text-box" value="<?php echo $new_date; ?>" readonly></div>
  <div class="col-xs-3"> Age as on*:</div>
  <div class="col-xs-3"> <input name="txtAge" id="txtAge" type="text" class="text-box" value="<?php echo $data['Age']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Gender*:</div>
  <div class="col-xs-3"> <input type="text" name="txtSex" id="txtSex" class="text-box" value="<?php echo $data['Sex']; ?>" readonly></div>
  <div class="col-xs-3"> Mother Tongue*: </div>
  <div class="col-xs-3"> <input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text" value="<?php echo $data['MotherTongue']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Blood Group*:</div>
  <div class="col-xs-3"><input name="bloodgroup" id="bloodgroup" class="text-box" type="text" value="<?php echo $data['bloodgroup']; ?>" readonly></div>
  <div class="col-xs-3"> Nationality: </div>
  <div class="col-xs-3"> <input name="txtNationality" id="txtNationality" type="text" class="text-box" value="<?php echo $data['Nationality']; ?>" readonly></div>
 </div> 
 <div class="row">
  <div class="col-xs-3"> Last School Attended*: </div>
  <div class="col-xs-3"> <input name="txtLastSchool" id="txtLastSchool" type="text" class="text-box" value="<?php echo $data['LastSchool']; ?>" readonly></div>
  <div class="col-xs-3"> Choice of second language for class IX: </div>
  <div class="col-xs-3"> <input type="text" name="cbosecondlanguage" id="cbosecondlanguage" class="text-box" value="<?php echo $data['SecondLanguage']; ?>" readonly>  </div>
  </div> 
 <div class="row">
  <div class="col-xs-3"> Residential Address*: </div>
  <div class="col-xs-3"><input type="text" name="txtpermanentAddress" id="txtpermanentAddress" class="text-box" value="<?php echo $data['ResidentialAddress']; ?>" readonly></div>
  <div class="col-xs-3">Residential Landline Number:</div>
  <div class="col-xs-3"><input type="text" name="permanentno" id="permanentno" class="text-box" value="<?php echo $data['ResidencePhoneNo']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">  Permanent Address*:</div>
  <div class="col-xs-3"><input type="text" name="txtAddress" id="txtAddress" class="text-box" value="<?php echo $data['PermanentAddress']; ?>" readonly></div>
  <div class="col-xs-3">Permanent Landline Number:</div>
  <div class="col-xs-3"><input type="text" name="residentialno" id="residentialno" class="text-box" value="<?php echo $data['PermanentPhoneNo']; ?>" readonly></div>
 </div>
 <div> &nbsp;</div>
 <div class="h h11" align="center"><strong> Family Details (Father / Mother / Guardian)</strong></div>
 <div>&nbsp;</div>
 <div align="center"><strong><u>Father's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input name="txtFatherName" id="txtFatherName" type="text" class="text-box" value="<?php echo $data['sfathername']; ?>" readonly></div>
  <div class="col-xs-3">  Age:</div>
  <div class="col-xs-3"> <input name="txtFatherAge" id="txtFatherAge" class="text-box" type="text" value="<?php echo $data['sfatherage']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification*:</div>
  <div class="col-xs-3"><input name="txtFatherEducation" id="txtFatherEducation" class="text-box" type="text" value="<?php echo $data['FatherEducation']; ?>" readonly></div>  
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><input name="txtFatherOccupation" id="txtFatherOccupation" class="text-box" type="text" value="<?php echo $data['FatherOccupation']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input name="fatherbusiness" id="fatherbusiness" class="text-box" type="text" value="<?php echo $data['fatherbusiness']; ?>" readonly></div>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="fatherpolitical" id="fatherpolitical" class="text-box" value="<?php echo $data['fatherpolitical']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="fatherministry" id="fatherministry" value="<?php echo $data['fatherministry']; ?>" readonly class="text-box"></div>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="fatherprofssional" id="fatherprofssional" value="<?php echo $data['fatherprofssional']; ?>" readonly class="text-box"></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="fatherservices" id="fatherservices" value="<?php echo $data['fatherservices']; ?>" readonly class="text-box"></div>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="fatherothers" id="fatherothers" class="text-box" value="<?php echo $data['fatherothers']; ?>" readonly></div> 
 </div>
 <div class="row">
  <div class="col-xs-3"> Designation: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"> <input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text" value="<?php echo $data['FatherDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"> <input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text" value="<?php echo $data['FatherCompanyName']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mobile No *:</div>
  <div class="col-xs-3"> <input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" value="<?php echo $data['FatherMobileNo']; ?>" readonly></div>
  <div class="col-xs-3"> Email Id *:</div>
  <div class="col-xs-3"> <input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="text" value="<?php echo $data['FatherEmailId']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Office Address: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"> <input name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box" type="email" value="<?php echo $data['FatherOfficeAddress']; ?>" readonly></div>
  <div class="col-xs-3">Office Landline No. :</div>
  <div class="col-xs-3"><input type="text" name="cboofficeno" id="cboofficeno" class="text-box" value="<?php echo $data['FatherOfficePhoneNo']; ?>" readonly></div>
 </div>
 <div>&nbsp;</div>
 <div align="center"><strong><u>Mother's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input name="txtMotherName" id="txtMotherName" type="text" class="text-box" value="<?php echo $data['MotherName']; ?>" readonly></div>
  <div class="col-xs-3"> Age:</div>
  <div class="col-xs-3"> <input name="txtMotherAge" id="txtMotherAge" class="text-box" type="text" value="<?php echo $data['MotherAge']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification*:</div>
  <div class="col-xs-3"><input name="txtMotherEducation" id="txtMotherEducation" class="text-box" type="text" value="<?php echo $data['MotherEducation']; ?>" readonly></div>
  <div class="col-xs-3">Occupation</div>
  <div class="col-xs-3"><input name="txtMotherOccupation" id="txtMotherOccupation" class="text-box" type="text" value="<?php echo $data['MotherOccupatoin']; ?>" readonly></div>
 </div>
 <div class="row"> 
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input name="motherbusiness" id="motherbusiness" class="text-box" type="text" value="<?php echo $data['motherbusiness']; ?>" readonly></div>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="motherpolitical" id="motherpolitical" class="text-box" value="<?php echo $data['motherpolitical']; ?>" readonly></div>
 </div>  
 <div class="row"> 
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="motherministry" id="motherministry" class="text-box" value="<?php echo $data['motherministry']; ?>" readonly></div>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="motherprofssional" id="motherprofssional" class="text-box" value="<?php echo $data['motherprofssional']; ?>" readonly></div>
 </div>
 <div class="row">     
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="motherservices" id="motherservices" class="text-box" value="<?php echo $data['motherservices']; ?>" readonly></div>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="motherothers" id="motherothers" class="text-box" value="<?php echo $data['motherothers']; ?>" readonly></div>  
 </div>
 <div class="row"> 
  <div class="col-xs-3"> Designation: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text" value="<?php echo $data['MotherDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" class="text-box" value="<?php echo $data['MotherCompanyName']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mobile No.*:</div>
  <div class="col-xs-3"> <input name="txtMotherMobileNo" id="txtMotherMobileNo" class="text-box" type="text" value="<?php echo $data['MotherMobile']; ?>" readonly></div>
  <div class="col-xs-3"> Email id*:</div>
  <div class="col-xs-3"> <input name="txtMotherEmailId" id="txtMotherEmailId" class="text-box" type="email" value="<?php echo $data['MotherEmail']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Office Address: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box" type="email" value="<?php echo $data['MotherOfficeAddress']; ?>" readonly></div>
  <div class="col-xs-3">Office Landline No. :</div>
  <div class="col-xs-3"><input type="text" name="cbomotherofficeno" id="cbomotherofficeno" class="text-box" value="<?php echo $data['MotherOfficePhone']; ?>" readonly></div>
 </div>
 <div>&nbsp;</div>
 <div align="center"><strong><u>Guardian's Details (If Applicable)</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name:</div>
  <div class="col-xs-3"> <input name="txtGuradianName" id="txtGuradianName" type="text" class="text-box" value="<?php echo $data['GuradianName']; ?>" readonly></div>
  <div class="col-xs-3"> Age: </div>
  <div class="col-xs-3"> <input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" value="<?php echo $data['GuradianAge']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification:</div>
  <div class="col-xs-3"> <input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" class="text-box" value="<?php echo $data['GuradinaEducation']; ?>" readonly></div>
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><input name="txtGuradianOccupation" id="txtGuradianOccupation" type="text" class="text-box" value="<?php echo $data['GuradianOccupation']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><input name="guardianbusiness" id="guardianbusiness" type="text" class="text-box" value="<?php echo $data['guardianbusiness']; ?>" readonly></div>
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="guardianpolitical" id="guardianpolitical" class="text-box" value="<?php echo $data['guardianpolitical']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="text" name="guardianministry" id="guardianministry" class="text-box" value="<?php echo $data['guardianministry']; ?>" readonly></div>
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><input type="text" name="guardianprofssional" id="guardianprofssional" class="text-box" value="<?php echo $data['guardianprofssional']; ?>" readonly></div>
 </div>
 <div class="row"> 
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><input type="text" name="guardianservices" id="guardianservices" class="text-box" value="<?php echo $data['guardianservices']; ?>" readonly></div>
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="guardianothers" id="guardianothers" class="text-box" value="<?php echo $data['guardianothers']; ?>" readonly ></div> 
 </div>
 <div class="row">
  <div class="col-xs-3"> Designation:<br><font class="f"> (If employed)</font></div>
  <div class="col-xs-3"> <input name="txtGuradianDesignation" id="txtGuradianDesignation" class="text-box" type="text" value="<?php echo $data['GuradianDesignation']; ?>" readonly></div>
  <div class="col-xs-3"> Organization Name:<br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <input name="txtGuradianCompanyName" id="txtGuradianCompanyName" type="text" class="text-box" value="<?php echo $data['GuradianCompanyName']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Residence Landline. No: </div>
  <div class="col-xs-3"> <input name="txtGuradianOfficialPhNo" id="txtGuradianOfficialPhNo" class="text-box" type="text" value="<?php echo $data['GuradianOfficialPhNo']; ?>" readonly></div>
  <div class="col-xs-3"> Mobile No.:</div>
  <div class="col-xs-3"> <input name="txtGuradianMobileNo" id="txtGuradianMobileNo" class="text-box" type="text" value="<?php echo $data['GuradianMobileNo']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Email id:</div>
  <div class="col-xs-3"> <input name="txtguardianEmailId" id="txtguardianEmailId" class="text-box" type="text" value="<?php echo $data['GuardianEmailId']; ?>" readonly></div>
  <div class="col-xs-3"> Address:</div>
  <div class="col-xs-3"> <input name="txtGuradianAddress" id="txtGuradianAddress" class="text-box" type="text" value="<?php echo $data['GuardiansAddress']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Office Address:<br><font class="f">(If employed):</font></div>
  <div class="col-xs-3"> <input name="txtGuradianOfficialAddress" id="txtGuradianOfficialAddress" class="text-box" type="text" value="<?php echo $data['GuradianOfficialAddress']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Category</strong>*
		<i>(Please select the relevant Category / Categories and fill the details as applicable. 
		If you do not fall into any category, please select others. Parents are required to produce 
		the relevant documents at the time of admission. In case the documents are not produced, the candidature will be rejected)</i>
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"><strong>Sibling(s) studying in DPS, Rohini</strong></div>
  <div class="col-xs-3"> <input name="chkSibling" id="chkSibling" class="text-box" type="text" value="<?php echo $data['Sibling']; ?>" readonly></div>
  <div class="col-xs-3"><strong>Father DPS Alumni</strong></div>
  <div class="col-xs-3"> <input name="chkFatherAlumni" id="chkFatherAlumni" class="text-box" type="text" value="<?php echo $data['Father_DPS_Alumni']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><strong>Mother DPS Alumni</strong></div>
  <div class="col-xs-3"> <input name="chkMotherAlumni" id="chkMotherAlumni" class="text-box" type="text" value="<?php echo $data['Mother_DPS_Alumni']; ?>" readonly></div>
  <div class="col-xs-3"><strong>DPS Rohini Staff</strong></div>
  <div class="col-xs-3"> <input name="chkDPSStaff" id="chkDPSStaff" class="text-box" type="text" value="<?php echo $data['DPSRohiniStaff']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><strong>Other DPS Staff</strong></div>
  <div class="col-xs-3"> <input name="otherdpsstaff" id="otherdpsstaff" class="text-box" type="text" value="<?php echo $data['OtherDPSStaff']; ?>" readonly></div>
  <div class="col-xs-3"><strong>Single Parent</strong></div>
  <div class="col-xs-3"> <input name="chkSingleParent" id="chkSingleParent" class="text-box" type="text" value="<?php echo $data['Single_Parent']; ?>" readonly></div>
 </div> 
 <div>&nbsp;</div>
 <div class="study">
 <div align="center">
        <strong>Details of Sibling(s) studying in <?php echo $SchoolName; ?> 
		</strong> <p>(If there is more than one sibling, mention all)</p>
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" value="<?php echo $data['RealBroSisName']; ?>" readonly> </div>
  <div class="col-xs-3"> Brother / Sister's Class:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box" type="text" value="<?php echo $data['RealBroSisClass']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" type="text" readonly value="<?php echo $data['RealBroSisAdmissionNo']; ?>"></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName2" id="txtRealBroSisName2" class="text-box" type="text" readonly value="<?php echo $data['RealBroSisName2']; ?>"> </div>
  <div class="col-xs-3"> Brother / Sister's Class: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisClass2" id="txtRealBroSisClass2" class="text-box" type="text" readonly value="<?php echo $data['RealBroSisClass2']; ?>"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName2" id="txtRealBroSisSchoolName2" class="text-box" type="text" readonly value="<?php echo $data['RealBroSisAdmissionNo2']; ?>"></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3">Single Parent:</div>
  <div class="col-xs-3"><input name="cbosingleparent" id="cbosingleparent" class="text-box" type="text" readonly value="<?php echo $data['Single_Parent_Reason']; ?>"></div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtsingleparent" id="txtsingleparent" class="text-box" readonly value="<?php echo $data['Other_single_parent']; ?>"></div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center">Details of Father / Mother, if Alumni of <font style="text-transform:uppercase"><?php echo $SchoolName; ?></font></div>
 <div>&nbsp;</div>
 
 <div align="center"><strong><u> Father Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Father:</div>
  <div class="col-xs-3"> <input name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" type="text" value="<?php echo $data['AlumniFatherName']; ?>" readonly></div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input type="text" name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" value="<?php echo $data['AlumniSchoolName']; ?>" readonly></div>	
 </div>
 <div class="row">
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" value="<?php echo $data['AlumniPassingYear']; ?>" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> <input name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box" type="text" value="<?php echo $data['AlumniFatherPassingClass']; ?>" readonly></div>
 </div>
 <div>&nbsp; </div>
 <div align="center"><strong><u>Mother Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Mother:</div>
  <div class="col-xs-3"> <input name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" type="text" value="<?php echo $data['AlumniMotherName']; ?>" readonly> </div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" type="text" value="<?php echo $data['AlumniMotherSchoolName']; ?>" readonly></div>
 </div>
 <div class="row">	
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" type="text" value="<?php echo $data['AlumniMotherPassingYear']; ?>" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> <input name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box" type="text" value="<?php echo $data['AlumniMotherPassingClass']; ?>" readonly></div>
 </div>
 <div>&nbsp; </div>
 <div align="center"><strong><u>Category</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3">Select Category:</div>
  <div class="col-xs-3"><input name="cbocatagory" id="cbocatagory" class="text-box" type="text" value="<?php echo $data['Category']; ?>" readonly></div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtothercatagory" id="txtothercatagory" class="text-box" value="<?php echo $data['OtherCatagoryDetail']; ?>" readonly></div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Contact details for all admission related information.</strong> </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of the contact person*:</div>
  <div class="col-xs-3"> <input name="txtcontactpersonname" id="txtcontactpersonname"  class="text-box"  type="text" value="<?php echo $data['EmergencyContactPersonName']; ?>" readonly></div>
  <div class="col-xs-3"> Mobile No*:</div>
  <div class="col-xs-3"> <input name="txtemergencyMobile" id="txtemergencyMobile" type="text" class="text-box" value="<?php echo $data['EmergencyContactNo']; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> E-mail Id*:</div>
  <div class="col-xs-3"> <input name="txtemergencyemail" id="txtemergencyemail" type="text" class="text-box" value="<?php echo $data['EmergencyEmail']; ?>" readonly></div>
  <div class="col-xs-6">&nbsp;</div> 
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center"><strong> Documents to be Uploaded </strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"><b> 1. Copy of Birth Certificate issued by Municipal Corporation* :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['BirthCertificate']; ?>" target="_blank"><?php echo $data['BirthCertificate']; ?></a></div>
  <div class="col-xs-3"><b> 2. Photograph of Applicant* :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['ProfilePhoto']; ?>" target="_blank"><?php echo $data['ProfilePhoto']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 3. Photograph of Father* :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['FatherPhoto']; ?>" target="_blank"><?php echo $data['FatherPhoto']; ?></a></div>
  <div class="col-xs-3"><b> 4. Photograph of Mother* :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['MotherPhoto']; ?>" target="_blank"><?php echo $data['MotherPhoto']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 5. Photograph of Guardian (if applicable)  :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['GuardianPhoto']; ?>" target="_blank"><?php echo $data['GuardianPhoto']; ?></a></div>
  <div class="col-xs-3"><b> 6. Copy Of ST/SC/OBC Certificate (if applicable) :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['CatagoryCertificate']; ?>" target="_blank"><?php echo $data['CatagoryCertificate']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 7. Proof of Any Other Category (if applicable) :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['OtherCatagoryCertificate']; ?>" target="_blank"><?php echo $data['OtherCatagoryCertificate']; ?></a></div>
  <div class="col-xs-3"><b> 8. Proof of Parent being DPS Staff (if applicable) :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['ParentDPSStaff']; ?>" target="_blank"><?php echo $data['ParentDPSStaff']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b> 9. Proof of Parent being DPS Alumni (if applicable) :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['ParentDPSAlumni']; ?>" target="_blank"><?php echo $data['ParentDPSAlumni']; ?></a></div>
  <div class="col-xs-3"><b> 10. Marksheet of Term-I Exam of Class VIII*:</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['class8_trm1']; ?>" target="_blank"><?php echo $data['class8_trm1']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"><b>11. Marksheet of Final Exam of Class VII : </b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['class7_finlexm']; ?>" target="_blank"><?php echo $data['class7_finlexm']; ?></a></div>
  <div class="col-xs-3"><b>12. Copy of Aadhar Card of Applicant : </b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['AadharNumber']; ?>" target="_blank"><?php echo $data['AadharNumber']; ?></a></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> <b>13. Residence Proof* :</b></div>
  <div class="col-xs-3"> <a href="Documents/<?php echo $data['ResidenceProof']; ?>" target="_blank"><?php echo $data['ResidenceProof']; ?></a></div>
  <div class="col-xs-3"> <b>13. Residence Proof Type:</b></div>
  <div class="col-xs-3"> <input type="text" name="ResidenceProofType" value="<?php echo $data['ResidenceProofType']; ?>" class="text-box" readonly> </div>
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"><b>Place :</b></div>
  <div class="col-xs-3"> <input type="text" name="txtplaceofregistration" id="txtplaceofregistration" class="text-box" value="<?php echo $data['RegistrationPlace']; ?>" readonly > </div>
  <div class="col-xs-3"><b> Date :</b> </div>
  <div class="col-xs-3"><input type="text" name="txtdateofregistration" id="txtdateofregistration" value="<?php echo $data['RegistrationDate']; ?>" class="text-box" readonly></div>
 </div>
 <div>&nbsp;</div>
	 <div align="center"><a href="#" onClick="window.print();">Print</a></div>
	</form>
</div>
</body>

<style>
@media print
{
  a[href]:after
  {
    content: none !important;
  }
}
@media print
{
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>


</html>