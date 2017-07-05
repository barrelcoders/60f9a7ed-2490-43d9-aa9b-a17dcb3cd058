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
	   $this->query['TodayHomeworkByClassAndStatus'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.homeworkdate=curdate() AND a.sclass=? AND a.Status=?";
	   $this->query['YesterdayClassworkHomeworkByClass'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.homeworkdate=curdate()-1 AND a.sclass=?";// AND a.Status=?
	   
	   $this->query['SubjectsByClass'] = "SELECT DISTINCT subject FROM subject_master WHERE class=?";
	   
	   $this->query['HomeworkBySubject'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.subject=?";
	   $this->query['HomeworkWithoutSubjectAndDate'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject";
														
	   $this->query['HomeworkBySubjectAndFromDate'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.subject=? AND a.homeworkdate >= ?";
	   $this->query['HomeworkBySubjectAndToDate'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.subject=? AND a.homeworkdate <= ?";
	   $this->query['HomeworkBySubjectAndFromAndToDate'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.subject=? AND a.homeworkdate BETWEEN ? and ?";
														
	   $this->query['HomeworkByFromDate'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.homeworkdate >= ?";
	   $this->query['HomeworkByToDate'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.homeworkdate <= ?";
	   $this->query['HomeworkByFromAndToDate'] = "SELECT a.sclass, a.subject, a.homework,  b.classwork , a.homeworkdate as date FROM homework_master a, classwork_master b WHERE 
														a.homeworkdate=b.classworkdate AND a.subject=b.subject AND a.homeworkdate BETWEEN ? and ?";
	   
		$this->query['Classes'] = "SELECT distinct class FROM class_master";
		$this->query['AttendanceMonthYearsByRollNoAndClass'] = "SELECT DISTINCT DATE_FORMAT( attendancedate , '%M-%Y' ) as monthyear FROM attendance WHERE srollno=? AND sclass=?";
		$this->query['AttendancePresentCountByMonthYearAndRollNoAndClass'] = "select count(distinct attendancedate) as count from attendance where attendance='P' and DATE_FORMAT( attendancedate , '%M-%Y' )=? and srollno=? AND sclass=?";
		$this->query['AttendanceAbsentCountByMonthYearAndRollNoAndClass'] = "select count(distinct attendancedate) as count from attendance where attendance='L' and DATE_FORMAT( attendancedate , '%M-%Y' )=? and srollno=? AND sclass=?";
		$this->query['AttendanceWorkingDaysCountByMonthYearAndClass'] = "select count(distinct attendancedate) as count from attendance where DATE_FORMAT( attendancedate , '%M-%Y' )=? AND sclass=?";
		$this->query['LatecomersByClassAndRollNo'] ="SELECT Date, Reason, Time FROM late_comers where (Class=? and Rollno=?) order by Date desc";
	}
}
?>