<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
$registrationno=$_REQUEST['ApplicationNo'];
$data=mysql_query("SELECT `srno`, `registration_no`, `sclass`, `first_name`, `mid_name`, `l_name`, `place_birth`, `dob`, `age`, `gender`, `nationality`, `mother_tongue`, `blood_group`, `current_addr`, `landline_no`, `perm_addr`, `perm_landline`, `twin_triplett`, `previous_name_school`, `reason_for_leaving`, `attended_from`, `attended_till`, `english_grade1617`, `hindi_grade1617`, `mathematics_grade1617`, `evs_grade1617`, `socialscience_grade1617`, `other_sub_name1617`, `other_sub_grade1617`, `english_grade1516`, `hindi_grade1516`, `mathematics_grade1516`, `evs_grade1516`, `socialscience_grade1516`, `other_sub_name1516`, `other_sub_grade1516`, `academics_achv1`, `academics_achv2`, `academics_achv3`, `academics_achv4`, `cocurricular_act_achv1`, `cocurricular_act_achv2`, `cocurricular_act_achv3`, `cocurricular_act_achv4`, `sports_achv1`, `sports_achv2`, `sports_achv3`, `sports_achv4`, `olympiads_achv1`, `olympiads_achv2`, `olympiads_achv3`, `olympiads_achv4`, `sibling1`, `s_name_school1`, `s_class1`, `s_admn_no1`, `sibling2`, `s_name_school2`, `s_class2`, `s_admn_no2`, `sibling3`, `s_name_school3`, `s_class3`, `s_admn_no3`, `f_name`, `f_age`, `f_high_aca_qual`, `f_high_pro_qual`, `f_occupation`, `f_Business`, `f_Political`, `f_Ministry`, `f_Professional`, `f_Services`, `f_Others`, `f_designation`, `f_org_name`, `f_mobile_no`, `f_email`, `f_office_addr`, `f_office_landline`, `mother_name`, `m_age`, `m_high_aca_qual`, `m_high_pro_qual`, `m_occupation`, `m_Business`, `m_Political`, `m_Ministry`, `m_Professional`, `m_Services`, `m_Others`, `m_designation`, `m_org_name`, `m_mobile_no`, `m_email`, `m_office_addr`, `m_office_landline`, `previous_employment`, `guardian_name`, `g_age`, `g_qualification`, `g_occupation`, `g_Business`, `g_Political`, `g_Ministry`, `g_Professional`, `g_Services`, `g_Others`, `g_designation`, `g_org_name`, `g_mobile_no`, `g_office_addr`, `g_office_landline`, `g_email`, `chk_father_dps_alumni`, `chk_mother_dps_alumni`, `chk_dps_rohini_staff`, `chk_special_needs`, `chk_other_dps_staff`, `f_alumni_name`, `f_dps_branch_name`, `f_passing_year`, `f_last_class_attended`, `m_alumni_name`, `m_dps_branch_name`, `m_passing_year`, `m_last_class_attended`, `special_needs`, `other_special_need`, `select_category`, `other_catagory`, `name_of_contact_person`, `contact_p_mobile`, `contact_p_email`, `birth_certificate`, `applicant_photo`, `father_photo`, `mother_photo`, `guardian_photo`, `catagory_certificate`, `medical_certificate`, `residence_proof`, `term1_reportcard`, `finalterm_reportcard`, `remarks`, `place_of_registration`, `date_of_registration`, `TxnAmount`, `TxnStatus`, `pgTxnNo`, `TxRefNo`, `TxMsg`,`residence_proof_type` FROM `student_registration_others` WHERE `registration_no`='$registrationno'");
$result=mysql_fetch_assoc($data);
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
    <form name="frmNewStudent" id="frmNewStudent" method="post" action="" enctype="multipart/form-data"> 
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
  			<div class="col-xs-3"><input name="cboClass" id="cboClass" type="text" class="text-box" value="<?php echo $result['sclass'];?>" Readonly /></div>
  			<div class="col-xs-3"> Application No:</div>
  			<div class="col-xs-3"><input name="rgno" id="rgno" type="text" class="text-box" value="<?php echo $result['registration_no'];?>" Readonly /></div>
		    
 		</div>
 		<div class="row">
  			<div class="col-xs-3"> First Name of Applicant*: </div>
  			<div class="col-xs-3"> <input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $result['first_name'];?>" Readonly /> </div>
			<div class="col-xs-3 xs"> Middle Name of Applicant:</div>
  			<div class="col-xs-3 xs1"> <input name="txtMiddleName" id="txtMiddleName" type="text" class="text-box" value="<?php echo $result['mid_name'];?>" Readonly></div>
 		</div>
 		<div class="row">
  			<div class="col-xs-3 xs"> Last Name of Applicant:</div>
  			<div class="col-xs-3 xs1"> <input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20" value="<?php echo $result['l_name'];?>" Readonly></div>
 			<div class="col-xs-3"> Place of Birth:</div>
  			<div class="col-xs-3"> <input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text" value="<?php echo $result['place_birth'];?>" Readonly></div>
 		</div>
	 	<div class="row">
	 	    <div class="col-xs-3"> Date of Birth*:</div>
  			<div class="col-xs-3"> <input name="txtDOB" id="txtDOB" type="text" class="text-box" value="<?php echo $result['dob'];?>" Readonly></div>
  			<div class="col-xs-3 xs"> Age as on*:</div>
  			<div class="col-xs-3 xs1"> <input name="txtAge" id="txtAge" type="text" class="text-box" value="<?php echo $result['age'];?>" readonly/></div>
 		</div>
 		<div class="row">
   			<div class="col-xs-3"> Gender*:</div>
  			<div class="col-xs-3"> <input name="txtSex" id="txtSex" type="text" class="text-box" value="<?php echo $result['gender'];?>" readonly/></div>
  			<div class="col-xs-3"> Nationality*: </div>
  			<div class="col-xs-3"> <input name="txtNationality" id="txtNationality" type="text" class="text-box" value="<?php echo $result['nationality'];?>" readonly></div>
  		</div>
 		<div class="row">
  			<div class="col-xs-3"> Mother Tongue*: </div>
  			<div class="col-xs-3"> <input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text" value="<?php echo $result['mother_tongue'];?>" readonly></div>
  			<div class="col-xs-3">Blood Group*:</div>
	  		<div class="col-xs-3"><input name="bloodgroup" id="bloodgroup" class="text-box" type="text" value="<?php echo $result['blood_group'];?>" readonly></div>
	 	</div>
 		<div class="row">
  			<div class="col-xs-3 xs">Current Residential Address*: </div>
  			<div class="col-xs-3 xs1"><input name="txtAddress" id="txtAddress" class="text-box" type="text" value="<?php echo $result['current_addr'];?>" readonly></div>
  			<div class="col-xs-3">Residential Landline Number:</div>
  			<div class="col-xs-3"><input type="text" name="residentialno" id="residentialno" class="text-box" value="<?php echo $result['landline_no'];?>" readonly></div>
		</div>
 		<div class="row">
  			<div class="col-xs-3 xs"> Permanent Address: </div>
  			<div class="col-xs-3 xs1"> <input type="text" name="txtpermanentAddress" id="txtpermanentAddress" class="text-box" value="<?php echo $result['perm_addr'];?>" readonly></div>
  			<div class="col-xs-3">Permanent Landline Number:</div>
  			<div class="col-xs-3"><input type="text" name="permanentno" id="permanentno" class="text-box" value="<?php echo $result['perm_landline'];?>" readonly></div>
 		</div>
  		<div class="row">
  			<div class="col-xs-3">Select if Applicable:</div>
  			<div class="col-xs-3"><input type="text" name="cboapplicable" id="cboapplicable" class="text-box" value="<?php echo $result['twin_triplett'];?>" readonly></div>
			<div class="col-xs-6">&nbsp;</div>
 		</div>
 		<div> &nbsp;</div>
 		<div class="h h11" align="center"><strong> Previous School Details</strong></div>
		<div>&nbsp;</div>
        <div class="row">
        	<div class="col-xs-3">Name of School:</div>
        	<div class="col-xs-3"><input type="text" name="preSchoolName" id="preSchoolName" class="text-box" value="<?php echo $result['previous_name_school'];?>" readonly></div>
        	<div class="col-xs-3">Reason for Leaving:</div>
        	<div class="col-xs-3"><input type="text" name="preLeaveReason" id="preLeaveReason" class="text-box" value="<?php echo $result['reason_for_leaving'];?>" readonly></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Attended Form:</div>
        	<div class="col-xs-3"><input type="text" name="preAttendForm" id="preAttendForm" class="text-box" value="<?php echo $result['attended_from'];?>" readonly></div>
        	<div class="col-xs-3">Attended Till:</div>
        	<div class="col-xs-3"><input type="text" name="preAttendTill" id="preAttendTill" class="text-box" value="<?php echo $result['attended_till'];?>" readonly></div>
        </div>
        <hr class="hr">
        <div align="center" style="text-transform:uppercase;"><strong><u>Academic Record in the Last School Attended</u></strong></div>
        <div>&nbsp;</div>
        <div class="head3">Enter First Term Grade / Percentage of Marks obtained in Academic Session 2016-2017 for the following subjects - </div>
        <div class="row">
        	<div class="col-xs-3">English</div>
        	<div class="col-xs-3"><input type="text" name="englishMark16" id="englishMark16" class="text-box" value="<?php echo $result['english_grade1617'];?>" readonly></div>
        	<div class="col-xs-3">Hindi</div>
        	<div class="col-xs-3"><input type="text" name="hindiMark16" id="hindiMark16" class="text-box" value="<?php echo $result['hindi_grade1617'];?>" readonly></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Mathematics</div>
        	<div class="col-xs-3"><input type="text" name="mathematicsMark16" id="mathematicsMark16" class="text-box" value="<?php echo $result['mathematics_grade1617'];?>" readonly></div>
        	<div class="col-xs-3">General Science / EVS</div>
        	<div class="col-xs-3"><input type="text" name="evsMark16" id="evsMark16" class="text-box" value="<?php echo $result['evs_grade1617'];?>" readonly></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Social Science</div>
        	<div class="col-xs-3"><input type="text" name="socialMark16" id="socialMark16" class="text-box" value="<?php echo $result['socialscience_grade1617'];?>" readonly></div>
        	<div class="col-xs-3"><input type="text" name="anyOtherSubject16" id="anyOtherSubject16" class="text-box" value="<?php echo $result['other_sub_name1617'];?>" readonly></div>
        	<div class="col-xs-3"><input type="text" name="otherMark16" id="otherMark16" class="text-box" value="<?php echo $result['other_sub_grade1617'];?>" readonly></div>
        </div>
        <div class="head3">Enter Final Term Grade / Percentage of Marks obtained in Academic Session 2015-2016 - </div>
        <div class="row">
        	<div class="col-xs-3">English</div>
        	<div class="col-xs-3"><input type="text" name="englishMark15" id="englishMark15" class="text-box" value="<?php echo $result['english_grade1516'];?>" readonly></div>
        	<div class="col-xs-3">Hindi</div>
        	<div class="col-xs-3"><input type="text" name="hindiMark15" id="hindiMark15" class="text-box" value="<?php echo $result['hindi_grade1516'];?>" readonly></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Mathematics</div>
        	<div class="col-xs-3"><input type="text" name="mathematicsMark15" id="mathematicsMark15" class="text-box" value="<?php echo $result['mathematics_grade1516'];?>" readonly></div>
        	<div class="col-xs-3">General Science / EVS</div>
        	<div class="col-xs-3"><input type="text" name="evsMark17" id="evsMark17" class="text-box" value="<?php echo $result['evs_grade1516'];?>" readonly></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Social Science</div>
        	<div class="col-xs-3"><input type="text" name="socialMark15" id="socialMark15" class="text-box" value="<?php echo $result['socialscience_grade1516'];?>" readonly></div>
        	<div class="col-xs-3"><input type="text" name="anyOtherSubject15" id="anyOtherSubject15" class="text-box" value="<?php echo $result['other_sub_name1516'];?>" readonly></div>
        	<div class="col-xs-3"><input type="text" name="otherMark15" id="otherMark15" class="text-box" value="<?php echo $result['other_sub_grade1516'];?>" readonly></div>
        </div>
        <hr class="hr">
        <div class="head3">Outstanding Achievements in Academics (if any)</div>
        <div class="row">
        	<div class="col-xs-3"><b>1.</b>&nbsp; <input type="text" name="achievementAcademic1" id="achievementAcademic1" class="text-box" value="<?php echo $result['academics_achv1'];?>" readonly></div>
        	<div class="col-xs-3"><b>2.</b>&nbsp; <input type="text" name="achievementAcademic2" id="achievementAcademic2" class="text-box" value="<?php echo $result['academics_achv2'];?>" readonly></div>
        	<div class="col-xs-3"><b>3.</b>&nbsp; <input type="text" name="achievementAcademic3" id="achievementAcademic3" class="text-box" value="<?php echo $result['academics_achv3'];?>" readonly></div>
        	<div class="col-xs-3"><b>4.</b>&nbsp; <input type="text" name="achievementAcademic4" id="achievementAcademic4" class="text-box" value="<?php echo $result['academics_achv4'];?>" readonly></div>
        </div>
        <div class="head3">Outstanding Achievements Co-curricular activities (if any)</div>
        <div class="row">
        	<div class="col-xs-3"><b>1.</b>&nbsp; <input type="text" name="achievementCoCurricular1" id="achievementCoCurricular1" class="text-box" value="<?php echo $result['cocurricular_act_achv1'];?>" readonly></div>
        	<div class="col-xs-3"><b>2.</b>&nbsp; <input type="text" name="achievementCoCurricular2" id="achievementCoCurricular2" class="text-box" value="<?php echo $result['cocurricular_act_achv2'];?>" readonly></div>
        	<div class="col-xs-3"><b>3.</b>&nbsp; <input type="text" name="achievementCoCurricular3" id="achievementCoCurricular3" class="text-box" value="<?php echo $result['cocurricular_act_achv3'];?>" readonly></div>
        	<div class="col-xs-3"><b>4.</b>&nbsp; <input type="text" name="achievementCoCurricular4" id="achievementCoCurricular4" class="text-box" value="<?php echo $result['cocurricular_act_achv4'];?>" readonly></div>
        </div>
        <div class="head3">Achievements in Sports (if any)</div>
        <div class="row">
        	<div class="col-xs-3"><b>1.</b>&nbsp; <input type="text" name="achievementSport1" id="achievementSport1" class="text-box" value="<?php echo $result['sports_achv1'];?>" readonly></div>
        	<div class="col-xs-3"><b>2.</b>&nbsp; <input type="text" name="achievementSport2" id="achievementSport2" class="text-box" value="<?php echo $result['sports_achv2'];?>" readonly></div>
        	<div class="col-xs-3"><b>3.</b>&nbsp; <input type="text" name="achievementSport3" id="achievementSport3" class="text-box" value="<?php echo $result['sports_achv3'];?>" readonly></div>
        	<div class="col-xs-3"><b>4.</b>&nbsp; <input type="text" name="achievementSport4" id="achievementSport4" class="text-box" value="<?php echo $result['sports_achv4'];?>" readonly></div>
        </div>
        <div class="head3">Achievements in Olympiads (if any)</div>
        <div class="row">
        	<div class="col-xs-3"><b>1.</b>&nbsp; <input type="text" name="achievementOlympiad1" id="achievementOlympiad1" class="text-box" value="<?php echo $result['olympiads_achv1'];?>" readonly></div>
        	<div class="col-xs-3"><b>2.</b>&nbsp; <input type="text" name="achievementOlympiad2" id="achievementOlympiad2" class="text-box" value="<?php echo $result['olympiads_achv2'];?>" readonly></div>
        	<div class="col-xs-3"><b>3.</b>&nbsp; <input type="text" name="achievementOlympiad3" id="achievementOlympiad3" class="text-box" value="<?php echo $result['olympiads_achv3'];?>" readonly></div>
        	<div class="col-xs-3"><b>4.</b>&nbsp; <input type="text" name="achievementOlympiad4" id="achievementOlympiad4" class="text-box" value="<?php echo $result['olympiads_achv4'];?>" readonly></div>
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
        	<div class="col-xs-3"><b id="show">1. &nbsp;</b><input type="text" name="siblingName1" id="siblingName1" class="text-box" value="<?php echo $result['sibling1'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Name of the School</div>
        	<div class="col-xs-3"><input type="text" name="schoolName1" id="schoolName1" class="text-box" value="<?php echo $result['s_name_school1'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Class / Section</div>
        	<div class="col-xs-3"><input type="text" name="classSection1" id="classSection1" class="text-box" value="<?php echo $result['s_class1'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Admission Number <br>(only if Sibling is in DPS Rohini)</div>
        	<div class="col-xs-3"><input type="text" name="admissionNo1" id="admissionNo1" class="text-box" value="<?php echo $result['s_admn_no1'];?>" readonly></div>
        </div>
        <div class="row a">
        	<div class="col-xs-3 b" id="hidden">2.</div>
        	<div class="col-xs-3" id="hidden">Name of the Sibling</div>
        	<div class="col-xs-3"><b id="show">2. &nbsp;</b><input type="text" name="siblingName2" id="siblingName2" class="text-box" value="<?php echo $result['sibling2'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Name of the School</div>
        	<div class="col-xs-3"><input type="text" name="schoolName2" id="schoolName2" class="text-box" value="<?php echo $result['s_name_school2'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Class / Section</div>
        	<div class="col-xs-3"><input type="text" name="classSection2" id="classSection2" class="text-box" value="<?php echo $result['s_class2'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Admission Number <br>(only if Sibling is in DPS Rohini)</div>
        	<div class="col-xs-3"><input type="text" name="admissionNo2" id="admissionNo2" class="text-box" value="<?php echo $result['s_admn_no2'];?>" readonly></div>
        </div>
        <div class="row a">
        	<div class="col-xs-3 b" id="hidden">3.</div>
        	<div class="col-xs-3" id="hidden">Name of the Sibling</div>
        	<div class="col-xs-3"><b id="show">3. &nbsp;</b><input type="text" name="siblingName3" id="siblingName3" class="text-box" value="<?php echo $result['sibling3'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Name of the School</div>
        	<div class="col-xs-3"><input type="text" name="schoolName3" id="schoolName3" class="text-box" value="<?php echo $result['s_name_school3'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Class / Section</div>
        	<div class="col-xs-3"><input type="text" name="classSection3" id="classSection3" class="text-box" value="<?php echo $result['s_class3'];?>" readonly></div>
        	<div class="col-xs-3" id="hidden">Admission Number <br>(only if Sibling is in DPS Rohini)</div>
        	<div class="col-xs-3"><input type="text" name="admissionNo3" id="admissionNo3" class="text-box" value="<?php echo $result['s_admn_no3'];?>" readonly></div>
        </div>
 		<div> &nbsp;</div>
 		<div class="h h11" align="center"><strong> Family Details (Father / Mother / Guardian)</strong></div>
		<div>&nbsp;</div>
 		<div align="center"><strong><u>Father's Details</u></strong></div>
 		<div>&nbsp;</div>
 		<div class="row">
  			<div class="col-xs-3"> Name*:</div>
  			<div class="col-xs-3"> <input name="txtFatherName" id="txtFatherName" type="text" class="text-box" value="<?php echo $result['f_name'];?>"  readonly></div>
  			<div class="col-xs-3"> Age:</div>
  			<div class="col-xs-3"> <input name="txtFatherAge" id="txtFatherAge" class="text-box" type="text" value="<?php echo $result['f_age'];?>" readonly></div>
 		</div>
 		<div class="row">
  			<div class="col-xs-3"> Highest Academic Qualification*:</div>
  			<div class="col-xs-3"><input name="txtFatherAcademicEducation" id="txtFatherAcademicEducation" class="text-box" type="text" value="<?php echo $result['f_high_aca_qual'];?>" readonly></div>
  			<div class="col-xs-3"> Highest Professional Qualification*:</div>
  			<div class="col-xs-3"><input type="text" name="txtFatherProEducation" id="txtFatherProEducation" class="text-box" value="<?php echo $result['f_high_pro_qual'];?>" readonly></div>
 		</div>
  		<div class="row">
		    <div class="col-xs-3">Occupation:</div>
  			<div class="col-xs-3"><input type="text" name="txtFatherOccupation" id="txtFatherOccupation" class="text-box" value="<?php echo $result['f_occupation'];?>" readonly></div>
 			<div  id="fbusiness" >
  				<div class="col-xs-3">Business:</div>
  				<div class="col-xs-3"><input type="text" name="fatherbusiness" id="fatherbusiness" class="text-box" value="<?php echo $result['f_Business'];?>" readonly></div>
   			</div>
 			<div id="fpolitical" >
 				<div class="col-xs-3">Political:</div>
  				<div class="col-xs-3"><input type="text" name="fatherpolitical" id="fatherpolitical" class="text-box" readonly value="<?php echo $result['f_Political'];?>"></div>
 			</div>
  			<div  id="fministry" >
  				<div class="col-xs-3">Ministry:</div>
  				<div class="col-xs-3"><input type="text" name="fatherministry" id="fatherministry" class="text-box" readonly value="<?php echo $result['f_Ministry'];?>"></div>
 			</div>
 			<div id="fprofessional" >
  				<div class="col-xs-3">Professional:</div>
  				<div class="col-xs-3"><input type="text" name="fatherprofssional" id="fatherprofssional" class="text-box" readonly value="<?php echo $result['f_Professional'];?>"></div>
 			</div>
 			<div id="fservicess"  >
  				<div class="col-xs-3">Services:</div>
  				<div class="col-xs-3"><input type="text" name="fatherservices" id="fatherservices" class="text-box" readonly value="<?php echo $result['f_Services'];?>"></div>
 			</div>
 			<div id="fothers"  >
  				<div class="col-xs-3">Others:</div>
  				<div class="col-xs-3"><input type="text" name="fatherothers" id="fatherothers" class="text-box" readonly value="<?php echo $result['f_Others'];?>"></div> 
    		</div>
   		</div>
   		<div class="row">
  			<div class="col-xs-3 xs"> Designation: <br><font class="f">(If employed)</font> </div>
  			<div class="col-xs-3 xs1"> <input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text" readonly value="<?php echo $result['f_designation'];?>"></div>
  			<div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font> </div>
  			<div class="col-xs-3"> <input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text"  readonly value="<?php echo $result['f_org_name'];?>"></div>
   		</div>
   		<div class="row">
    		<div class="col-xs-3 xs"> Mobile No *:</div>
  			<div class="col-xs-3 xs1"> <input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" readonly value="<?php echo $result['f_mobile_no'];?>" ></div>
  			<div class="col-xs-3"> Email Id *:</div>
  			<div class="col-xs-3"> <input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="text"  readonly value="<?php echo $result['f_email'];?>"></div>
   		</div>
 		<div class="row">
   			<div class="col-xs-3">Office Address: <br><font class="f">(If employed)</font> </div>
  			<div class="col-xs-3"> <input name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box" type="text"  readonly value="<?php echo $result['f_office_addr'];?>"></div>
 			<div class="col-xs-3 xs">Office Landline No.</div>
  			<div class="col-xs-3 xs1"><input type="text" name="cboofficeno" id="cboofficeno" class="text-box" readonly value="<?php echo $result['f_office_landline'];?>"></div>
  		</div>
 	  	<div>&nbsp;</div>
 		<div align="center"><strong><u>Mother's Details</u></strong></div>
 		<div>&nbsp;</div>
	 	<div class="row">
  			<div class="col-xs-3"> Name*:</div>
  			<div class="col-xs-3"> <input name="txtMotherName" id="txtMotherName" type="text" class="text-box"  readonly value="<?php echo $result['mother_name'];?>"></div>
  			<div class="col-xs-3"> Age:</div>
  			<div class="col-xs-3"> <input name="txtMotherAge" id="txtMotherAge" class="text-box" type="text" readonly value="<?php echo $result['m_age'];?>"></div>
 		</div>
 			<div class="row">
  			<div class="col-xs-3"> Highest Academic Qualification*:</div>
  			<div class="col-xs-3"><input name="txtMotherAcdEducation" id="txtMotherAcdEducation" class="text-box" type="text" readonly value="<?php echo $result['m_high_aca_qual'];?>"></div>
  			<div class="col-xs-3"> Highest Professional Qualification*:</div>
  			<div class="col-xs-3"><input type="text" name="txtMotherProEducation" id="txtMotherProEducation" value="<?php echo $result['m_high_pro_qual'];?>" class="text-box" readonly></div>
		</div>
    	<div class="row">
  			<div class="col-xs-3">Occupation</div>
  			<div class="col-xs-3"><input type="text" name="txtMotherOccupation" id="txtMotherOccupation" value="<?php echo $result['m_occupation'];?>" class="text-box" readonly></div>
            <div id="mbusiness" >
                <div class="col-xs-3">Business:</div>
                <div class="col-xs-3"><input type="text" name="motherbusiness" id="motherbusiness" value="<?php echo $result['m_Business'];?>" class="text-box" readonly></div>
            </div>
            <div id="mpolitical" >
                <div class="col-xs-3">Political:</div>
                <div class="col-xs-3"><input type="text" name="motherpolitical" id="motherpolitical" class="text-box" readonly value="<?php echo $result['m_Political'];?>"></div>
            </div>
            <div  id="mministry"  >
                <div class="col-xs-3">Ministry:</div>
                <div class="col-xs-3"><input type="text" name="motherministry" id="motherministry" class="text-box" readonly value="<?php echo $result['m_Ministry'];?>"></div>
            </div>
            <div id="mprofessional" >
                <div class="col-xs-3">Professional:</div>
                <div class="col-xs-3"><input type="text" name="motherprofssional" id="motherprofssional" class="text-box" readonly value="<?php echo $result['m_Professional'];?>"></div>
            </div>
            <div id="mservicess" >
                <div class="col-xs-3">Services:</div>
                <div class="col-xs-3"><input type="text" name="motherservices" id="motherservices" class="text-box" readonly value="<?php echo $result['m_Services'];?>"></div> 
            </div>
            <div  id="mothers"  >
                <div class="col-xs-3">Others:</div>
                <div class="col-xs-3"><input type="text" name="motherothers" id="motherothers" class="text-box" readonly value="<?php echo $result['m_Others'];?>"></div>  
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 xs"> Designation: <br><font class="f">(If employed)</font></div>
            <div class="col-xs-3 xs1"> <input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text" readonly value="<?php echo $result['m_designation'];?>"></div>
            <div class="col-xs-3 xs"> Organization Name: <br><font class="f">(If employed)</font></div>
            <div class="col-xs-3 xs1"> <input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" class="text-box" readonly value="<?php echo $result['m_org_name'];?>"></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Mobile No.*:</div>
            <div class="col-xs-3"> <input name="txtMotherMobileNo" id="txtFatherOfficialPhNo1" class="text-box" type="text" readonly value="<?php echo $result['m_mobile_no'];?>"></div>
            <div class="col-xs-3"> Email id*:</div>
            <div class="col-xs-3"> <input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" type="text" readonly value="<?php echo $result['m_email'];?>"></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Office Address: <br><font class="f">(If employed)</font></div>
            <div class="col-xs-3"> <input name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box" type="text" readonly value="<?php echo $result['m_office_addr'];?>"></div>
            <div class="col-xs-3 xs">Office Landline No.</div>
            <div class="col-xs-3 xs1"><input type="text" name="cbomotherofficeno" id="cbomotherofficeno" class="text-box" readonly value="<?php echo $result['m_office_landline'];?>"></div>
        </div>
        <div class="row">
        	<div class="col-xs-3">Previous Employment (If applicable):</div>
            <div class="col-xs-3"><input type="text" name="previousEmployment" id="previousEmployment" class="text-box" value="<?php echo $result['previous_employment'];?>" readonly></div>
            <div class="col-xs-6">&nbsp;</div>
        </div>
        <div>&nbsp;</div><div>&nbsp;</div>
        <div align="center"><strong><u>Guardian's Details (If Applicable)</u></strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3"> Name:</div>
            <div class="col-xs-3"> <input name="txtGuradianName" id="txtGuradianName" type="text" class="text-box" value="<?php echo $result['guardian_name'];?>" readonly></div>
            <div class="col-xs-3"> Age: </div>
            <div class="col-xs-3"> <input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" value="<?php echo $result['g_age'];?>" readonly></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Qualification:</div>
            <div class="col-xs-3"> <input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" class="text-box" value="<?php echo $result['g_qualification'];?>" readonly></div>
            <div class="col-xs-3">Occupation:</div>
            <div class="col-xs-3"><input name="txtGuradianOccupation" id="txtGuradianOccupation" type="text" class="text-box" value="<?php echo $result['g_occupation'];?>" readonly></div>
        </div>
        <div class="row">
            <div id="gbusiness" >
                <div class="col-xs-3">Business:</div>
                <div class="col-xs-3"><input name="guardianbusiness" id="guardianbusiness" type="text" class="text-box" value="<?php echo $result['g_Business'];?>" readonly></div>
            </div>
            <div id="gpolitical"  >
                <div class="col-xs-3">Political:</div>
                <div class="col-xs-3"><input type="text" name="guardianpolitical" id="guardianpolitical" class="text-box" value="<?php echo $result['g_Political'];?>" readonly></div>
            </div>
            <div id="gministry"  >
                <div class="col-xs-3">Ministry:</div>
                <div class="col-xs-3"><input type="text" name="guardianministry" id="guardianministry" class="text-box" value="<?php echo $result['g_Ministry'];?>" readonly></div>
            </div>
            <div id="gprofessional" >
                <div class="col-xs-3">Professional:</div>
                <div class="col-xs-3"><input type="text" name="guardianprofssional" id="guardianprofssional" class="text-box" value="<?php echo $result['g_Professional'];?>" readonly></div>
            </div>
            <div id="gservicess"  >
                <div class="col-xs-3">Services:</div>
                <div class="col-xs-3"><input type="text" name="guardianservices" id="guardianservices" class="text-box" value="<?php echo $result['g_Services'];?>" readonly></div>
            </div>
            <div id="gothers"  >
                <div class="col-xs-3">Others:</div>
                <div class="col-xs-3"><input type="text" name="guardianothers" id="guardianothers" class="text-box" value="<?php echo $result['g_Others'];?>" readonly ></div> 
            </div>
            <div class="col-xs-3"> Designation:<br><font class="f"> (If employed)</font></div>
            <div class="col-xs-3"> <input name="txtGuradianDesignation" id="txtGuradianDesignation" class="text-box" type="text" value="<?php echo $result['g_designation'];?>" readonly ></div>
        </div>
        <div class="row">
            <div class="col-xs-3 xs"> Organization Name:<br><font class="f">(If employed)</font></div>
            <div class="col-xs-3 xs1"> <input name="txtGuradianCompanyName" id="txtGuradianCompanyName" type="text" class="text-box" value="<?php echo $result['g_org_name'];?>" readonly ></div>
            <div class="col-xs-3"> Mobile No.:</div>
            <div class="col-xs-3"> <input name="txtGuradianMobileNo" id="txtGuradianMobileNo" class="text-box" type="text"  value="<?php echo $result['g_mobile_no'];?>" readonly></div>  
        </div>
        <div class="row">
            <div class="col-xs-3 xs"> Office Address:<br><font class="f">(If employed):</font></div>
            <div class="col-xs-3 xs1"><input name="txtGuradianOfficialAddress" id="txtGuradianOfficialAddress" class="text-box" type="text"  value="<?php echo $result['g_office_addr'];?>" readonly></div>
            <div class="col-xs-3 xs"> Office Landline No:</div>
            <div class="col-xs-3 xs1"> <input type="text" name="txtguardianofficeno" id="txtguardianofficeno" class="text-box" value="<?php echo $result['g_office_landline'];?>" readonly></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Email id:</div>
            <div class="col-xs-3"> <input name="txtguardianEmailId" id="txtguardianEmailId" class="text-box" type="text" value="<?php echo $result['g_email'];?>" readonly></div>
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
		<div class="row">
            <div class="col-xs-3 xs">Father DPS Alumni:</div>
            <div class="col-xs-3 xs1"><input name="chkFatherAlumni" id="chkFatherAlumni" class="text-box" type="text"  value="<?php echo $result['chk_father_dps_alumni'];?>" readonly></div>
            <div class="col-xs-3 xs">Mother DPS Alumni:</div>
            <div class="col-xs-3 xs1"> <input type="text" name="chkMotherAlumni" id="chkMotherAlumni" class="text-box" value="<?php echo $result['chk_mother_dps_alumni'];?>" readonly></div>
        </div>
		<div class="row">
            <div class="col-xs-3 xs">DPS Rohini  Staff:</div>
            <div class="col-xs-3 xs1"><input name="chkDPSStaff" id="chkDPSStaff" class="text-box" type="text"  value="<?php echo $result['chk_dps_rohini_staff'];?>" readonly></div>
            <div class="col-xs-3 xs">Special  Needs:</div>
            <div class="col-xs-3 xs1"> <input type="text" name="chkSpecialNeed" id="chkSpecialNeed" class="text-box" value="<?php echo $result['chk_special_needs'];?>" readonly></div>
        </div>
		<div class="row">
            <div class="col-xs-3">Other DPS  Staff:</div>
            <div class="col-xs-3"> <input name="otherdpsstaff" id="otherdpsstaff" class="text-box" type="text" value="<?php echo $result['chk_other_dps_staff'];?>" readonly></div>
            <div class="col-xs-6">&nbsp;</div>
        </div>
        <div class="study">
            <div class="h h12" align="center">Details of Father / Mother, if Alumni of <font style="text-transform:uppercase">Delhi public school</font></div>
            <div>&nbsp;</div>
            <div align="center"><strong><u> Father Alumni Details</u></strong></div>
            <div>&nbsp;</div>
            <div class="row">
                <div class="col-xs-3"> Name of Father:</div>
                <div class="col-xs-3"> <input name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" type="text" readonly value="<?php echo $result['f_alumni_name'];?>"></div>
                <div class="col-xs-3"> Name of DPS Branch:</div>
                <div class="col-xs-3">  <input name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" type="text" readonly value="<?php echo $result['f_dps_branch_name'];?>"></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Passout Year:</div>
            <div class="col-xs-3"> <input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" value="<?php echo $result['f_passing_year'];?>" readonly></div>
            <div class="col-xs-3"> Last Class Attended:</div>
            <div class="col-xs-3"> <input name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box" type="text" value="<?php echo $result['f_last_class_attended'];?>" readonly></div>
        </div>
        <div>&nbsp; </div>
        <div align="center"><strong><u>Mother Alumni Details</u></strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3"> Name of Mother:</div>
            <div class="col-xs-3"> <input name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" type="text" readonly value="<?php echo $result['m_alumni_name'];?>"> </div>
            <div class="col-xs-3"> Name of DPS Branch:</div>
            <div class="col-xs-3">  <input name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" type="text" readonly value="<?php echo $result['m_dps_branch_name'];?>"></div>
        </div>
        <div class="row">	
            <div class="col-xs-3"> Passout Year:</div>
            <div class="col-xs-3"> <input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" type="text" readonly value="<?php echo $result['m_passing_year'];?>"></div>
            <div class="col-xs-3"> Last Class Attended:</div>
            <div class="col-xs-3"> <input name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box" type="text" readonly value="<?php echo $result['m_last_class_attended'];?>"></div>
        </div>
        <div>&nbsp; </div>
        <div align="center"><strong><u>Special Needs Details</u></strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3">Special Needs (if any):</div>
            <div class="col-xs-3"><input name="cboSpecialNeed" id="cboSpecialNeed" class="text-box" type="text" readonly value="<?php echo $result['special_needs'];?>"></div>
            <div class="col-xs-3">(If Others, please specify):</div>
            <div class="col-xs-3"><input type="text" name="txtSpecialNeedDetail" id="txtSpecialNeedDetail" class="text-box" readonly value="<?php echo $result['other_special_need'];?>"></div>
        </div>
        <div>&nbsp; </div>
        <div align="center"><strong><u>Category</u></strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3">Select Category*:</div>
            <div class="col-xs-3"><input type="text" name="cbocatagory" id="cbocatagory" class="text-box" readonly value="<?php echo $result['select_category'];?>"></div>
            <div class="col-xs-3">(If Others, please specify):</div>
            <div class="col-xs-3"><input type="text" name="txtothercatagory" id="txtothercatagory" class="text-box" readonly value="<?php echo $result['other_catagory'];?>"></div>
        </div>
        <div>&nbsp;</div>
        <div class="h" align="center"><strong>Contact Details for all Admission Related Information</strong> </div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3"> Name of the contact person*:</div>
            <div class="col-xs-3"> <input name="txtcontactpersonname" id="txtcontactpersonname"  class="text-box"  type="text"  readonly value="<?php echo $result['name_of_contact_person'];?>"></div>
            <div class="col-xs-3"> Mobile No*:</div>
            <div class="col-xs-3"> <input name="txtemergencyMobile" id="txtemergencyMobile" type="text" class="text-box" readonly value="<?php echo $result['contact_p_mobile'];?>"></div>
			</div>
			<div class="row">
            <div class="col-xs-3"> E-mail Id*:</div>
            <div class="col-xs-3"> <input name="txtemergencyemail" id="txtemergencyemail" type="text" class="text-box"  readonly value="<?php echo $result['contact_p_email'];?>"></div>
            <div class="col-xs-6">&nbsp;</div> 
        </div>
        <div>&nbsp;</div>
        <div class="h" align="center"><strong> Documents to be Uploaded <p>(Please note maximum file size allowed per upload is 250 KB.)</p> </strong></div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-xs-3"><b> 1. Copy of Birth Certificate issued by Municipal Corporation* :</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['birth_certificate'];?>" target="_blank"><?php echo $result['birth_certificate'];?></a></div>
            <div class="col-xs-3"><b> 2. Photograph of Applicant* :</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['applicant_photo'];?>" target="_blank"><?php echo $result['applicant_photo'];?></a></div>
        </div>
        <div class="row">
            <div class="col-xs-3"><b> 3. Photograph of Father* :</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['father_photo'];?>" target="_blank"><?php echo $result['father_photo'];?></a></div>
            <div class="col-xs-3"><b> 4. Photograph of Mother* :</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['mother_photo'];?>" target="_blank"><?php echo $result['mother_photo'];?></a></div>
        </div>
        <div class="row">
            <div class="col-xs-3"><b> 5. Photograph of Guardian (if applicable) :</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['guardian_photo'];?>" target="_blank"><?php echo $result['guardian_photo'];?></a></div>
            <div class="col-xs-3"> <b>6. Copy Of ST/SC/OBC Certificate (if applicable) :</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['catagory_certificate'];?>" target="_blank"><?php echo $result['catagory_certificate'];?></a></div>
        </div>
        <div class="row">
            <div class="col-xs-3"> <b>7. Copy of Medical Document/Certificate(if belongs to special need) (if applicable) :</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['medical_certificate'];?>" target="_blank"><?php echo $result['medical_certificate'];?></a></div>
            <div class="col-xs-3"> <b>8. Residence Proof* :</b></div>
			<div class="col-xs-3"><a href="document_others/<?php echo $result['residence_proof'];?>" target="_blank"><?php echo $result['residence_proof'];?></a></div>
		</div>
        <div class="row">
            <div class="col-xs-3">Residence Proof Type :</div>
            <div class="col-xs-3"> <input type="text" name="ResidenceProofType" class="text-box" id="ResidenceProofType" value="<?php echo $result['residence_proof_type'];?>" readonly> </div>
            <div class="col-xs-6">&nbsp;</div> 
        </div>
        <div class="row">
            <div class="col-xs-3"><b> 9. Report card of Term-I Exam of academic session 2016-17:</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['term1_reportcard'];?>" target="_blank"><?php echo $result['term1_reportcard'];?></a></div>
            <div class="col-xs-3"><b> 10. Report card of Final Term Exam of academic session 2015-16:</b></div>
            <div class="col-xs-3"><a href="document_others/<?php echo $result['finalterm_reportcard'];?>" target="_blank"><?php echo $result['finalterm_reportcard'];?></a></div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
        	<div class="col-xs-3">Remarks (If any):</div>
        	<div class="col-xs-3"><input type="text" name="remark" id="remark" readonly class="text-box" value="<?php echo $result['remarks'];?>"></div>
        	<div class="col-xs-6">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-xs-3"><b>Place :</b></div>
            <div class="col-xs-3"> <input type="text" name="txtplaceofregistration" id="txtplaceofregistration" class="text-box" value="<?php echo $result['place_of_registration'];?>" readonly> </div>
            <div class="col-xs-3"><b> Date :</b></div>
			<div class="col-xs-3"><input typr="text" name="txtdateofregistration" id="txtdateofregistration" class="text-box" value="<?php echo $result['date_of_registration'];?>" readonly></div>
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