<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
if(isset($_POST['BtnSubmit']))
{
$sclass =$_POST['cboClass'];

$first_name =$_POST['txtName'];
$mid_name =$_POST['txtMiddleName'];
$l_name =$_POST['txtLastName'];
$place_birth =$_POST['txtPlaceOfBirth'];
$dob =$_POST['txtDOB'];
$age =$_POST['txtAge'];
$gender =$_POST['txtSex'];
$nationality =$_POST['txtNationality'];
$mother_tongue =$_POST['txtMotherTounge'];
$blood_group =$_POST['bloodgroup'];
$current_addr =$_POST['txtAddress'];
$landline_no =$_POST['residentialno'];
$perm_addr =$_POST['txtpermanentAddress'];
$perm_landline =$_POST['permanentno'];
$twin_triplett =$_POST['cboapplicable'];
$previous_name_school =$_POST['preSchoolName'];
$reason_for_leaving =$_POST['preLeaveReason'];
$attended_from =$_POST['preAttendForm'];
$attended_till =$_POST['preAttendTill'];
$english_grade1617 =$_POST['englishMark16'];
$hindi_grade1617 =$_POST['hindiMark16'];
$mathematics_grade1617 =$_POST['mathematicsMark16'];
$evs_grade1617 =$_POST['evsMark16'];
$socialscience_grade1617 =$_POST['socialMark16'];
$other_sub_name1617 =$_POST['anyOtherSubject16'];
$other_sub_grade1617 =$_POST['otherMark16'];
$english_grade1516 =$_POST['englishMark15'];
$hindi_grade1516 =$_POST['hindiMark15'];
$mathematics_grade1516 =$_POST['mathematicsMark15'];
$evs_grade1516 =$_POST['evsMark17'];
$socialscience_grade1516 =$_POST['socialMark15'];
$other_sub_name1516 =$_POST['anyOtherSubject15'];
$other_sub_grade1516 =$_POST['otherMark15'];
$academics_achv1 =$_POST['achievementAcademic1'];
$academics_achv2 =$_POST['achievementAcademic2'];
$academics_achv3 =$_POST['achievementAcademic3'];
$academics_achv4 =$_POST['achievementAcademic4'];
$cocurricular_act_achv1 =$_POST['achievementCoCurricular1'];
$cocurricular_act_achv2 =$_POST['achievementCoCurricular2'];
$cocurricular_act_achv3 =$_POST['achievementCoCurricular3'];
$cocurricular_act_achv4 =$_POST['achievementCoCurricular4'];
$sports_achv1 =$_POST['achievementSport1'];
$sports_achv2 =$_POST['achievementSport2'];
$sports_achv3 =$_POST['achievementSport3'];
$sports_achv4 =$_POST['achievementSport4'];
$olympiads_achv1 =$_POST['achievementOlympiad1'];
$olympiads_achv2 =$_POST['achievementOlympiad2'];
$olympiads_achv3 =$_POST['achievementOlympiad3'];
$olympiads_achv4 =$_POST['achievementOlympiad4'];
$sibling1 =$_POST['siblingName1'];
$s_name_school1 =$_POST['schoolName1'];
$s_class1 =$_POST['classSection1'];
$s_admn_no1 =$_POST['admissionNo1'];
$sibling2 =$_POST['siblingName2'];
$s_name_school2 =$_POST['schoolName2'];
$s_class2 =$_POST['classSection2'];
$s_admn_no2 =$_POST['admissionNo2'];
$sibling3 =$_POST['siblingName3'];
$s_name_school3 =$_POST['schoolName3'];
$s_class3 =$_POST['classSection3'];
$s_admn_no3 =$_POST['admissionNo3'];
$f_name =$_POST['txtFatherName'];
$f_age =$_POST['txtFatherAge'];
$f_high_aca_qual =$_POST['txtFatherAcademicEducation'];
$f_high_pro_qual =$_POST['txtFatherProEducation'];
$f_occupation =$_POST['txtFatherOccupation'];
$f_Business =$_POST['fatherbusiness'];
$f_Political =$_POST['fatherpolitical'];
$f_Ministry =$_POST['fatherministry'];
$f_Professional =$_POST['fatherprofssional'];
$f_Services =$_POST['fatherservices'];
$f_Others =$_POST['fatherothers'];
$f_designation =$_POST['txtFatherDesignation'];
$f_org_name =$_POST['txtFatherCompanyName'];
$f_mobile_no =$_POST['txtFatherMobileNo'];
$f_email =$_POST['txtFatherEmailId'];
$f_office_addr =$_POST['txtFatherOfficialAddress'];
$f_office_landline =$_POST['cboofficeno'];
$mother_name =$_POST['txtMotherName'];
$m_age =$_POST['txtMotherAge'];
$m_high_aca_qual =$_POST['txtMotherAcdEducation'];
$m_high_pro_qual =$_POST['txtMotherProEducation'];
$m_occupation =$_POST['txtMotherOccupation'];
$m_Business =$_POST['motherbusiness'];
$m_Political =$_POST['motherpolitical'];
$m_Ministry =$_POST['motherministry'];
$m_Professional =$_POST['motherprofssional'];
$m_Services =$_POST['motherservices'];
$m_Others =$_POST['motherothers'];
$m_designation =$_POST['txtMotherDesignation'];
$m_org_name =$_POST['txtMotherCompanyName'];
$m_mobile_no =$_POST['txtMotherMobileNo'];
$m_email =$_POST['txtMotherEmailId'];
$m_office_addr =$_POST['txtMotherOfficialAddress'];
$m_office_landline =$_POST['cbomotherofficeno'];
$previous_employment =$_POST['previousEmployment'];
$guardian_name =$_POST['txtGuradianName'];
$g_age =$_POST['txtGuradianAge'];
$g_qualification =$_POST['txtGuradinaEducation'];
$g_occupation =$_POST['txtGuradianOccupation'];
$g_Business =$_POST['guardianbusiness'];
$g_Political =$_POST['guardianpolitical'];
$g_Ministry =$_POST['guardianministry'];
$g_Professional =$_POST['guardianprofssional'];
$g_Services =$_POST['guardianservices'];
$g_Others =$_POST['guardianothers'];
$g_designation =$_POST['txtGuradianDesignation'];
$g_org_name =$_POST['txtGuradianCompanyName'];
$g_mobile_no =$_POST['txtGuradianMobileNo'];
$g_office_addr =$_POST['txtGuradianOfficialAddress'];
$g_office_landline =$_POST['txtguardianofficeno'];
$g_email =$_POST['txtguardianEmailId'];
$chk_father_dps_alumni =$_POST['chkFatherAlumni'];
$chk_mother_dps_alumni =$_POST['chkMotherAlumni'];
$chk_dps_rohini_staff =$_POST['chkDPSStaff'];
$chk_special_needs =$_POST['chkSpecialNeed'];
$chk_other_dps_staff =$_POST['otherdpsstaff'];
$f_alumni_name =$_POST['txtFatherAlumniName'];
$f_dps_branch_name =$_POST['txtDPSSchoolName'];
$f_passing_year =$_POST['txtYearOfPassing'];
$f_last_class_attended =$_POST['txtLastPassoutClassFather'];
$m_alumni_name =$_POST['txtMotherAlumniName'];
$m_dps_branch_name =$_POST['txtMotherDPSSchoolName'];
$m_passing_year =$_POST['txtMotherYearOfPassing'];
$m_last_class_attended =$_POST['txtLastPassoutClassMother'];
$special_needs =$_POST['cboSpecialNeed'];
$other_special_need =$_POST['txtSpecialNeedDetail'];
$select_category =$_POST['cbocatagory'];
$other_catagory =$_POST['txtothercatagory'];
$name_of_contact_person =$_POST['txtcontactpersonname'];
$contact_p_mobile =$_POST['txtemergencyMobile'];
$contact_p_email =$_POST['txtemergencyemail'];
$birth_certificate =$_FILES['F1']["name"];
$applicant_photo =$_FILES['F2']["name"];
$father_photo =$_FILES['F3']["name"];
$mother_photo =$_FILES['F4']["name"];
$guardian_photo =$_FILES['F5']["name"];
$catagory_certificate =$_FILES['F6']["name"];
$medical_certificate =$_FILES['F7']["name"];
$residence_proof =$_FILES['F8']["name"];
$term1_reportcard =$_FILES['F9']["name"];
$finalterm_reportcard =$_FILES['F10']["name"];
$remarks =$_POST['remark'];
$place_of_registration =$_POST['txtplaceofregistration'];
$date_of_registration =$_POST['txtdateofregistration'];
$residence_proof_type =$_POST['ResidenceProofType'];



    
     $CreteriaNo=""; //----------use to mapping creteria form to registration no--------------------
    //---------------GENERATE APPLICATION NO SERIES--------------------------------------------
    
    $lastInsertedIdSQLReg=mysql_query("SELECT application_no FROM application_no_series ORDER BY id DESC  LIMIT 1");
    $rows_count=  mysql_num_rows($lastInsertedIdSQLReg);
    if($rows_count>0){
  $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
       $finalRegistrationNO=$lastInsertIdReg['application_no']+1;

    }else{
        
      $finalRegistrationNO="8212";
    }
     
    //------------------GENERATE APPLICATION FORM NO SERIES--------SERIES STARTING FROM 8212------------------
$insertApplicationSeries=mysql_query("INSERT INTO application_no_series(application_no,creteria_no,class,status)VALUES('$finalRegistrationNO','$CreteriaNo','$sclass',1)");
  //echo "INSERT INTO application_no_series(application_no,creteria_no,class,status)VALUES('$finalRegistrationNO','$lastInsertCreteriaNo','$sclass',1)";die;
    
 $_SESSION['class']=$sclass;

$result=mysql_query("INSERT INTO `student_registration_others`(`registration_no`, `sclass`, `first_name`, `mid_name`, `l_name`, `place_birth`, `dob`, `age`, `gender`, `nationality`, `mother_tongue`, `blood_group`, `current_addr`, `landline_no`, `perm_addr`, `perm_landline`, `twin_triplett`, `previous_name_school`, `reason_for_leaving`, `attended_from`, `attended_till`, `english_grade1617`, `hindi_grade1617`, `mathematics_grade1617`, `evs_grade1617`, `socialscience_grade1617`, `other_sub_name1617`, `other_sub_grade1617`, `english_grade1516`, `hindi_grade1516`, `mathematics_grade1516`, `evs_grade1516`, `socialscience_grade1516`, `other_sub_name1516`, `other_sub_grade1516`, `academics_achv1`, `academics_achv2`, `academics_achv3`, `academics_achv4`, `cocurricular_act_achv1`, `cocurricular_act_achv2`, `cocurricular_act_achv3`, `cocurricular_act_achv4`, `sports_achv1`, `sports_achv2`, `sports_achv3`, `sports_achv4`, `olympiads_achv1`, `olympiads_achv2`, `olympiads_achv3`, `olympiads_achv4`, `sibling1`, `s_name_school1`, `s_class1`, `s_admn_no1`, `sibling2`, `s_name_school2`, `s_class2`, `s_admn_no2`, `sibling3`, `s_name_school3`, `s_class3`, `s_admn_no3`, `f_name`, `f_age`, `f_high_aca_qual`, `f_high_pro_qual`, `f_occupation`, `f_Business`, `f_Political`, `f_Ministry`, `f_Professional`, `f_Services`, `f_Others`, `f_designation`, `f_org_name`, `f_mobile_no`, `f_email`, `f_office_addr`, `f_office_landline`, `mother_name`, `m_age`, `m_high_aca_qual`, `m_high_pro_qual`, `m_occupation`, `m_Business`, `m_Political`, `m_Ministry`, `m_Professional`, `m_Services`, `m_Others`, `m_designation`, `m_org_name`, `m_mobile_no`, `m_email`, `m_office_addr`, `m_office_landline`, `previous_employment`, `guardian_name`, `g_age`, `g_qualification`, `g_occupation`, `g_Business`, `g_Political`, `g_Ministry`, `g_Professional`, `g_Services`, `g_Others`, `g_designation`, `g_org_name`, `g_mobile_no`, `g_office_addr`, `g_office_landline`, `g_email`, `chk_father_dps_alumni`, `chk_mother_dps_alumni`, `chk_dps_rohini_staff`, `chk_special_needs`, `chk_other_dps_staff`, `f_alumni_name`, `f_dps_branch_name`, `f_passing_year`, `f_last_class_attended`, `m_alumni_name`, `m_dps_branch_name`, `m_passing_year`, `m_last_class_attended`, `special_needs`, `other_special_need`, `select_category`, `other_catagory`, `name_of_contact_person`, `contact_p_mobile`, `contact_p_email`, `birth_certificate`, `applicant_photo`, `father_photo`, `mother_photo`, `guardian_photo`, `catagory_certificate`, `medical_certificate`, `residence_proof`, `term1_reportcard`, `finalterm_reportcard`, `remarks`, `place_of_registration`, `date_of_registration`, `residence_proof_type`)VALUES('$finalRegistrationNO', '$sclass', '$first_name', '$mid_name', '$l_name', '$place_birth', '$dob', '$age', '$gender', '$nationality', '$mother_tongue', '$blood_group', '$current_addr', '$landline_no', '$perm_addr', '$perm_landline', '$twin_triplett', '$previous_name_school', '$reason_for_leaving', '$attended_from', '$attended_till', '$english_grade1617', '$hindi_grade1617', '$mathematics_grade1617', '$evs_grade1617', '$socialscience_grade1617', '$other_sub_name1617', '$other_sub_grade1617', '$english_grade1516', '$hindi_grade1516', '$mathematics_grade1516', '$evs_grade1516', '$socialscience_grade1516', '$other_sub_name1516', '$other_sub_grade1516', '$academics_achv1', '$academics_achv2', '$academics_achv3', '$academics_achv4', '$cocurricular_act_achv1', '$cocurricular_act_achv2', '$cocurricular_act_achv3', '$cocurricular_act_achv4', '$sports_achv1', '$sports_achv2', '$sports_achv3', '$sports_achv4', '$olympiads_achv1', '$olympiads_achv2', '$olympiads_achv3', '$olympiads_achv4', '$sibling1', '$s_name_school1', '$s_class1', '$s_admn_no1', '$sibling2', '$s_name_school2', '$s_class2', '$s_admn_no2', '$sibling3', '$s_name_school3', '$s_class3', '$s_admn_no3', '$f_name', '$f_age', '$f_high_aca_qual', '$f_high_pro_qual', '$f_occupation', '$f_Business', '$f_Political', '$f_Ministry', '$f_Professional', '$f_Services', '$f_Others', '$f_designation', '$f_org_name', '$f_mobile_no', '$f_email', '$f_office_addr', '$f_office_landline', '$mother_name', '$m_age', '$m_high_aca_qual', '$m_high_pro_qual', '$m_occupation', '$m_Business', '$m_Political', '$m_Ministry', '$m_Professional', '$m_Services', '$m_Others', '$m_designation', '$m_org_name', '$m_mobile_no', '$m_email', '$m_office_addr', '$m_office_landline', '$previous_employment', '$guardian_name', '$g_age', '$g_qualification', '$g_occupation', '$g_Business', '$g_Political', '$g_Ministry', '$g_Professional', '$g_Services', '$g_Others', '$g_designation', '$g_org_name', '$g_mobile_no', '$g_office_addr', '$g_office_landline', '$g_email', '$chk_father_dps_alumni', '$chk_mother_dps_alumni', '$chk_dps_rohini_staff', '$chk_special_needs', '$chk_other_dps_staff', '$f_alumni_name', '$f_dps_branch_name', '$f_passing_year', '$f_last_class_attended', '$m_alumni_name', '$m_dps_branch_name', '$m_passing_year', '$m_last_class_attended', '$special_needs', '$other_special_need', '$select_category', '$other_catagory', '$name_of_contact_person', '$contact_p_mobile', '$contact_p_email', '$birth_certificate', '$applicant_photo', '$father_photo', '$mother_photo', '$guardian_photo', '$catagory_certificate', '$medical_certificate', '$residence_proof', '$term1_reportcard', '$finalterm_reportcard', '$remarks', '$place_of_registration', '$date_of_registration','$residence_proof_type')");

$target_dir = "document_others/";
        $target_file1 = $target_dir.basename($_FILES["F1"]["name"]);
        move_uploaded_file($_FILES["F1"]["tmp_name"], $target_file1);
        
         $target_fileF2 = $target_dir.basename($_FILES["F2"]["name"]);
        move_uploaded_file($_FILES["F2"]["tmp_name"], $target_fileF2);
        
         $target_fileF3 = $target_dir.basename($_FILES["F3"]["name"]);
        move_uploaded_file($_FILES["F3"]["tmp_name"], $target_fileF3);
        
         $target_fileF4 = $target_dir.basename($_FILES["F4"]["name"]);
        move_uploaded_file($_FILES["F4"]["tmp_name"], $target_fileF4);
        
         $target_fileF5 = $target_dir.basename($_FILES["F5"]["name"]);
        move_uploaded_file($_FILES["F5"]["tmp_name"], $target_fileF5);
        
         $target_fileF6 = $target_dir.basename($_FILES["F6"]["name"]);
        move_uploaded_file($_FILES["F6"]["tmp_name"], $target_fileF6);
        
         $target_fileF7 = $target_dir.basename($_FILES["F7"]["name"]);
        move_uploaded_file($_FILES["F7"]["tmp_name"], $target_fileF7);
        
         $target_fileF8 = $target_dir.basename($_FILES["F8"]["name"]);
        move_uploaded_file($_FILES["F8"]["tmp_name"], $target_fileF8);
        
        $target_fileF9 = $target_dir.basename($_FILES["F9"]["name"]);
        move_uploaded_file($_FILES["F9"]["tmp_name"], $target_fileF9);
        
         $target_fileF10 = $target_dir.basename($_FILES["F10"]["name"]);
        move_uploaded_file($_FILES["F10"]["tmp_name"], $target_fileF10);
		
		if($result)
		{
			include 'Citrus_Payment_other.php';
		}
		
}
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