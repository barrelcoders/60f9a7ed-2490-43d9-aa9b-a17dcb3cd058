<?php

class QueryManager {

    public $query;
    
    public function __construct()
    {
       $this->query = array();
       $this->loadQueries();
    }

    public function loadQueries(){
       $this->query['StudentDetailsByAdmissionNo'] = "select suser,spassword,sname,sclass,srollno,sfathername from student_master where sadmission = ?";
       $this->query['NoticesByStudentClassAndRollNo'] = "select srno, DATE_FORMAT(NoticeDate,'%d-%b-%y') as datetime,notice,noticetitle from student_notice where	sclass='All'  or srollno='All' or (sclass =? and srollno=?) order by NoticeDate desc";
       $this->query['ClassList'] = "SELECT distinct class FROM class_master";
	   $this->query['FinancialYearByStatus'] = "SELECT distinct year,financialyear,Status FROM FYmaster where Status=?";
	   
    }
}
?>