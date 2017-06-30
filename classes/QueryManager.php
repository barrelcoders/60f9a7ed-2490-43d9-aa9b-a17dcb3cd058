<?php

class QueryManager {

    public $query;
    
    public function __construct()
    {
       $this->query = array();
       $this->loadQueries();
    }

    public function loadQueries(){
       $this->query['StudentDetailsByAdmissionNo'] = "select suser, spassword, sname, sclass, srollno, sfathername from student_master where sadmission = ?";
       $this->query['NoticesByStudentClassAndRollNo'] = "select srno, DATE_FORMAT(NoticeDate,'%d-%b-%y') as datetime, notice, noticetitle from student_notice where	sclass='All'  or srollno='All' or (sclass =? and srollno=?) order by NoticeDate desc";
	   $this->query['News'] = "select srno, newstitle, news, imageurl, DATE_FORMAT(date,'%d-%b-%y') as date from school_news order by date desc";
       $this->query['ClassList'] = "SELECT distinct class FROM class_master";
	   $this->query['FinancialYearByStatus'] = "SELECT distinct year, financialyear, Status FROM FYmaster where Status=?";
	   $this->query['NoticeDetailByID'] = "SELECT srno, sname, sclass, srollno, notice, ParentAcknowledge, noticetitle FROM student_notice a  where srno=?";
	   $this->query['NewsDetailByID'] = "SELECT srno , news,datetime,imageurl,newstitle FROM school_news a  where srno=?";
	   $this->query['StudentFullDetailsByAdmissionNo'] = "SELECT srno, sname, DOB, Sex, Category, Nationality, sadmission, sclass, previous_sclass, previous_admission, MasterClass, previous_MasterClass, srollno, 
														   LastSchool, sfathername, FatherEducation, FatherOccupation, MotherName, MotherEducation, Address, smobile, AlternateMobile, simei, suser, spassword, email, routeno, ProfilePhoto,
														   GCMAccountId, status, FeeSubmissionType, DiscontType, DocumentFileName, FinancialYear, DateOfAdmission, AdmissionClass, Caste, SchoolId, Hostel, discountamount, RouteForFees, FatherDesignation,
														   FatherAnnualIncome, FatherCompanyName, FatherOfficeAddress, FatherMobileNo, FatherEmailId, MotherOccupatoin, MotherDesignation, MontherAnnualIncome, MotherCompanyName, MotherMobile, MotherEmail, Religion, 
														   BloodGroup, Sibling, Single_Parent, Special_Needs, Staff, OtherCategory, GuradianName, GuradianOccupation, GuradianDesignation, GuradianAnnualIncome, GuradianCompanyName, GuradianMobileNo, RealBroSisName,
														   RealBroSisAdmissionNo, RealBroSisClass, BirthCertificate, ScoreCard, FatherPhoto, MotherPhoto, AddressProofPhoto, MedicalCertificatePhoto, RegistrationNo, RegistrationDate, Age, sfatherage, FatherQualificationDuration,
														   FatherOfficePhoneNo, MotherAge, MotherQualificationDuration, MotherOfficeAddress, MotherOfficePhone, GuradianAge, GuradinaEducation, GuradianOfficialAddress, GuradianOfficialPhNo, GuradianEmailId, EmergencyContactDetail1,
														   EmergencyContactDetail2, EWSCategory, BirthPlace, MotherTongue, PreviousSchoolClass FROM student_master WHERE sadmission = ?";
	   $this->query['UpdateStudentSelfDetails'] = "UPDATE student_master SET FatherEducation=?, FatherOccupation=?, MotherEducation=?, Address=?, smobile=?, simei=?, spassword=?, email=? WHERE sadmission = ?";
	   $this->query['UpdateStudentSelfLoginDetails'] = "UPDATE user_master SET smobile=?, simei=?, spassword=?, email=? WHERE sadmission = ?";
    }
}
?>