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
        
    }
}
?>