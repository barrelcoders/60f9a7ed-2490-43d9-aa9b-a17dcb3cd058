<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Student Registration Report</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<!----Pagein------->
  <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />  
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../../bootstrap/bootstrap.min.js"></script> 
   <script src="../js/jquery.min.js"></script> 
   <script src="../js/dataTables-data.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
<!---->
<style type="text/css">
.row{padding:0; margin:0;}
.top{padding:0.5% 2% 2.5% 2%; border-bottom:1px solid #0b462d; margin:0.5% 0;}
.top div{float:left; width:50%;}
.top .head{font-size:16px; font-weight:bold;}
thead th{text-align:center;}
.btns .col-xs-6{padding:0;}
.btns .col-xs-6 a .btn{width:100%; background:#097b4d; color:#fff; border-radius:0;}
.btns .col-xs-6 a .btn:hover{background:#097b4d;}
.btns .col-xs-6 a button.active{background:#0b462d;}
.table>thead>tr>th{padding:1px 8px !important;}

</style>

</head>



<body>
 <div class="top">
  <div class="head">&nbsp;</div>
  <div align="right"><a href="javascript:history.back(1)"> 
               <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a>
  </div>
 </div>
 <div id="MasterDiv">
 <!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >										
												<thead>
													<tr>
<th rowspan="3" style="border:1px solid #0b462d;" align="center"><b>Sr. No.</b></th>
<th rowspan="3" style="border:1px solid #0b462d;" align="center"><b>Date of Registration</b></th>
<th rowspan="3" style="border:1px solid #0b462d;" align="center">Application No.</th>
<th colspan="16" style="border:1px solid #0b462d;"><b>Applicant Details</b></th>
<th colspan="4" style="border:1px solid #0b462d;"><b>Applicant Previous School Details</b></th>
<th colspan="30" style="border:1px solid #0b462d;"><b>Applicant Academic Details</b></th>
<th colspan="12" style="border:1px solid #0b462d;"><b> Sibiling Details</b></th>
<th colspan="11" style="border:1px solid #0b462d;"><b>Father Details</b></th>
<th colspan="12" style="border:1px solid #0b462d;"><b>Mother Details</b></th>                                                    
<th colspan="10" style="border:1px solid #0b462d;"><b>Guardian Details</b></th>
<th colspan="3" style="border:1px solid #0b462d;"><b>Father DPS Alumni</b></th>
<th colspan="3" style="border:1px solid #0b462d;"><b>Mother DPS Alumni</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Special Need</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Category</b></th>
<th colspan="3" style="border:1px solid #0b462d;"><b>Contact Person</b></th>
<th colspan="10" style="border:1px solid #0b462d;"><b>Attached Files</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Place</b></th>
<th rowspan="3" style="border:1px solid #0b462d;"><b>Remarks</b></th>
</tr>

<tr>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Class Applied For  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> First Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Middle Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Last Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Place of Birth  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Date of Birth  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Gender  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Nationality  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mother Tongue  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Blood Group  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Current Residential Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Residential Landline Number  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Permanent Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Permanent Landline Number  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Twin/ Triplet  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Name of Previous School  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Reason for Leaving  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Attended Form  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Attended Till  </th>

<th colspan="7" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> First Term Marks obtained in Academic Session 2016-2017  </th>
<th colspan="7" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Final Term Marks obtained in Academic Session 2015-2016  </th>
<th colspan="4" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Achievements in Academics  </th>
<th colspan="4" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Achievements in Co-Curricular  </th>
<th colspan="4" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Achievements in Sports  </th>
<th colspan="4" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Achievements in Olympiads  </th>

<th colspan="4" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Sibling 1  </th>
<th colspan="4" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Sibling 2  </th>
<th colspan="4" style="border:1px solid #0b462d; background:#fff; color:#097b4d;"> Sibling 3  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Fathers Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Highest Academic Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Highest Professional Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Occupation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Designation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Organization Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile No.  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email Id  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Landline No  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mothers Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Highest Academic Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Highest Professional Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Occupation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Designation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Organization Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile No.  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email Id  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Landline No  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Previous Employment   </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Guardian Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Age  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Qualification  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Occupation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Designation  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Organization Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile No.  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Address  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Office Landline No  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email Id  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> DPS Branch  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Passout Year  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Last Class  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> DPS Branch  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Passout Year  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Last Class  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Name  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Mobile  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Email  </th>

<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Birth Certificate  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Applicant  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Father  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Mother  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Photograph of Guardian  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> ST/SC/OBC Certificate  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Special Need Document  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Residence Proof  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Report card of Term-I Exam of academic session 2016-17  </th>
<th rowspan="2" style="border:1px solid #0b462d; background:#097b4d; color:#fff;"> Report card of Final Term Exam of academic session 2015-16  </th>
</tr>
<tr>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">English</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Hindi</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Mathemetics</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">General Studies / EVS</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Social Science</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Other Subject Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Other Subject Marks/ Grade</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">English</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Hindi</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Mathemetics</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">General Studies / EVS</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Social Science</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Other Subject Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Other Subject Marks/ Grade</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 1</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 2</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 3</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 4</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 1</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 2</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 3</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 4</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 1</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 2</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 3</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 4</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 1</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 2</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 3</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Achievement 4</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Sibling Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">School</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Class / Section</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Admission Number</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Sibling Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">School</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Class / Section</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Admission Number</th>

<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Sibling Name</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">School</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Class / Section</th>
<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Admission Number</th>

</tr>
												</thead>
												<tbody>
												
												<?php
$class=$_REQUEST['class'];
 $sqlReport="SELECT `srno`, `registration_no`, `sclass`, `first_name`, `mid_name`, `l_name`, `place_birth`, `dob`, `age`, `gender`, `nationality`, `mother_tongue`, `blood_group`, `current_addr`, `landline_no`, `perm_addr`, `perm_landline`, `twin_triplett`, `previous_name_school`, `reason_for_leaving`, `attended_from`, `attended_till`, `english_grade1617`, `hindi_grade1617`, `mathematics_grade1617`, `evs_grade1617`, `socialscience_grade1617`, `other_sub_name1617`, `other_sub_grade1617`, `english_grade1516`, `hindi_grade1516`, `mathematics_grade1516`, `evs_grade1516`, `socialscience_grade1516`, `other_sub_name1516`, `other_sub_grade1516`, `academics_achv1`, `academics_achv2`, `academics_achv3`, `academics_achv4`, `cocurricular_act_achv1`, `cocurricular_act_achv2`, `cocurricular_act_achv3`, `cocurricular_act_achv4`, `sports_achv1`, `sports_achv2`, `sports_achv3`, `sports_achv4`, `olympiads_achv1`, `olympiads_achv2`, `olympiads_achv3`, `olympiads_achv4`, `sibling1`, `s_name_school1`, `s_class1`, `s_admn_no1`, `sibling2`, `s_name_school2`, `s_class2`, `s_admn_no2`, `sibling3`, `s_name_school3`, `s_class3`, `s_admn_no3`, `f_name`, `f_age`, `f_high_aca_qual`, `f_high_pro_qual`, `f_occupation`, `f_Business`, `f_Political`, `f_Ministry`, `f_Professional`, `f_Services`, `f_Others`, `f_designation`, `f_org_name`, `f_mobile_no`, `f_email`, `f_office_addr`, `f_office_landline`, `mother_name`, `m_age`, `m_high_aca_qual`, `m_high_pro_qual`, `m_occupation`, `m_Business`, `m_Political`, `m_Ministry`, `m_Professional`, `m_Services`, `m_Others`, `m_designation`, `m_org_name`, `m_mobile_no`, `m_email`, `m_office_addr`, `m_office_landline`, `previous_employment`, `guardian_name`, `g_age`, `g_qualification`, `g_occupation`, `g_Business`, `g_Political`, `g_Ministry`, `g_Professional`, `g_Services`, `g_Others`, `g_designation`, `g_org_name`, `g_mobile_no`, `g_office_addr`, `g_office_landline`, `g_email`, `chk_father_dps_alumni`, `chk_mother_dps_alumni`, `chk_dps_rohini_staff`, `chk_special_needs`, `chk_other_dps_staff`, `f_alumni_name`, `f_dps_branch_name`, `f_passing_year`, `f_last_class_attended`, `m_alumni_name`, `m_dps_branch_name`, `m_passing_year`, `m_last_class_attended`, `special_needs`, `other_special_need`, `select_category`, `other_catagory`, `name_of_contact_person`, `contact_p_mobile`, `contact_p_email`, `birth_certificate`, `applicant_photo`, `father_photo`, `mother_photo`, `guardian_photo`, `catagory_certificate`, `medical_certificate`, `residence_proof`, `term1_reportcard`, `finalterm_reportcard`, `remarks`, `place_of_registration`, `date_of_registration`, `TxnAmount`, `TxnStatus`, `pgTxnNo`, `TxRefNo`, `TxMsg`, `residence_proof_type` FROM student_registration_others WHERE `sclass`='$class' AND `TxnStatus`='SUCCESS' order by srno DESC";


  $sqlQuery=  mysql_query($sqlReport);
  $i=1;
  
 
  
  while($reportData=  mysql_fetch_array($sqlQuery)){
   $old_date = Date_create($reportData['DOB']);
$new_date = Date_format($old_date, "d/m/Y");
?>
												
													<tr>
<td style="border:1px solid #0b462d;"><?php echo $i; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['date_of_registration']; ?></td>
<td style="border:1px solid #0b462d;"><a href="RegistrationFeeResponseother_preview.php?ApplicationNo=<?php echo $reportData['registration_no']; ?>" target="_blank"><?php echo $reportData['registration_no']; ?></a></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sclass']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['first_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['mid_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['l_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['place_birth']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['dob']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['age']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['gender']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['nationality']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['mother_tongue']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['blood_group']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['current_addr']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['landline_no']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['perm_addr']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['perm_landline']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['twin_triplett']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['previous_name_school']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['reason_for_leaving']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['attended_from']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['attended_till']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['english_grade1617']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['hindi_grade1617']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['mathematics_grade1617']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['evs_grade1617']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['socialscience_grade1617']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['other_sub_name1617']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['other_sub_grade1617']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['english_grade1516']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['hindi_grade1516']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['mathematics_grade1516']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['evs_grade1516']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['socialscience_grade1516']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['other_sub_name1516']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['other_sub_grade1516']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['academics_achv1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['academics_achv2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['academics_achv3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['academics_achv4']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['cocurricular_act_achv1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['cocurricular_act_achv2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['cocurricular_act_achv3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['cocurricular_act_achv4']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sports_achv1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sports_achv2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sports_achv3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sports_achv4']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['olympiads_achv1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['olympiads_achv2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['olympiads_achv3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['olympiads_achv4']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sibling1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_name_school1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_class1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_admn_no1']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sibling2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_name_school2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_class2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_admn_no2']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['sibling3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_name_school3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_class3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['s_admn_no3']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_age']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_high_aca_qual']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_high_pro_qual']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_occupation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_designation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_org_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_mobile_no']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_email']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_office_addr']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_office_landline']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['mother_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_age']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_high_aca_qual']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_high_pro_qual']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_occupation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_designation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_org_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_mobile_no']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_email']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_office_addr']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_office_landline']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['previous_employment']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['guardian_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_age']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_qualification']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_occupation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_designation']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_org_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_mobile_no']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_office_addr']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_office_landline']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['g_email']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_dps_branch_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_passing_year']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['f_last_class_attended']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_dps_branch_name']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_passing_year']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['m_last_class_attended']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['special_needs']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['select_category']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['name_of_contact_person']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['contact_p_mobile']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['contact_p_email']; ?></td>

<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['birth_certificate'];?>" target="_blank"><?php echo $reportData['birth_certificate']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['applicant_photo'];?>" target="_blank"><?php echo $reportData['applicant_photo']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['father_photo'];?>" target="_blank"><?php echo $reportData['father_photo']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['mother_photo'];?>" target="_blank"><?php echo $reportData['mother_photo']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['guardian_photo'];?>" target="_blank"><?php echo $reportData['guardian_photo']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['catagory_certificate'];?>" target="_blank"><?php echo $reportData['catagory_certificate']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['medical_certificate'];?>" target="_blank"><?php echo $reportData['medical_certificate']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['residence_proof'];?>" target="_blank"><?php echo $reportData['residence_proof']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['term1_reportcard'];?>" target="_blank"><?php echo $reportData['term1_reportcard']; ?></td>
<td style="border:1px solid #0b462d;"><a href="../../Admission/document_others/<?php echo $reportData['finalterm_reportcard'];?>" target="_blank"><?php echo $reportData['finalterm_reportcard']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData['place_of_registration']; ?></td>
<td style="border:1px solid #0b462d;"><?php echo $reportData[' remarks']; ?></td>
</tr>
													<?php $i++;  } ?>
											  </tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>
				<!-- /Row -->


 </div>

 <div align ="center"><input type="button" name ="btnExcel" value ="Export To Excel" onclick ="javascript:fnlExcel();"></div>

 <div class="footer" align="center">
    <div class="footer_contents" align="center">
  <font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
 </div>
</body>
</html>
<div align ="center">
<form name ="frmExcel" id="frmExcel" method ="post" action ="ExportToExcel.php">
<input type ="hidden" name ="htmlCode" id="htmlCode" value ="">
</form>
</div>
<script language ="javascript">
function fnlExcel()
{
	document.getElementById("htmlCode").value=document.getElementById("MasterDiv").innerHTML;
	document.getElementById("frmExcel").submit();
}
</script>