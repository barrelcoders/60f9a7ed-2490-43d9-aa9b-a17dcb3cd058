<?php
include '../connection.php';
error_reporting(0);
session_start();
?>
<?php

$sql= "SELECT `srno`, `EmpId`, `Title`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `InstituteName`, `Specialization`, `DegreeFinalGrade`, `DegreeStartDate`, `DegreeEndDate`, `FatherName`, `Salary`, `Allowances`, `Address`, `City`, `State`, `Phoneno`, `PermanentAddress`, `Permanentcity`, `PermanentState`, `PermanentPhone`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `ConfirmationStatus`, `Grade`, `L1_Approver_Id`, `L2_Approver_Id`, `L3_Approver_Id`, `HR_Approver_Id`, `GlobalManager`, `Department`, `Designation`, `EmploymentType`, `ProbationPeriod`, `NoticePeriod`, `ConfirmationDueDate`, `RelievingDate`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder`, `EmpAccountNo`, `Location`, `PanNo`, `UanNo`, `PFNo`, `IFSCCode`, `LastWorkingDate`, `EmployeeCategory`, `HostelWarden`, `Form16FileName`, `BankName`, `AccountType`, `BankBranch`, `BankBranchAddress`, `PayeeName`, `ProfilePhoto`, `PersonalEmail`, `OrgUnit`, `WorkSite`, `StartDate`, `EndDate` FROM `employee_master` WHERE `EmpId`=`$ei`";
$result = $conn->query($sql);	
mysqli_fetch_row(result);
												
?>
<div class="employeemasterdetail">
 <div class="employeemasterdetail_outer">
  <div class="employeemasterdetail_head">Employee Datails</div>
  <div class="employeemasterdetail_inner">
   <div class="row top">  <!----------Important Details--------->
    <div class="col-md-3"><img src="../images/DPS Logo.png" class="img-responsive" width="130px" height="120px"  /></div>
    <div class="col-md-9">
     <div class="row">
      <div class="col-xs-3">Employee ID :</div>
      <div class="col-xs-3"><?php echo $row['EmpId']; ?></div>
      <div class="col-xs-6">&nbsp;</div>
     </div>
     <div class="row">
      <div class="col-xs-3">Employee Name :</div>
      <div class="col-xs-3"><?php echo $row['Name']; ?></div>
      <div class="col-xs-3">Father Name :</div>
      <div class="col-xs-3">ZXCV SDFGH</div>
     </div>
     <div class="row">
      <div class="col-xs-3">Gender :</div>
      <div class="col-xs-3">Male</div>
      <div class="col-xs-3">Date of Birth :</div>
      <div class="col-xs-3">31-07-1993</div>
     </div>
     <div class="row">
      <div class="col-xs-3">Mobile No. :</div>
      <div class="col-xs-3">9898989898</div>
      <div class="col-xs-3">E mail ID :</div>
      <div class="col-xs-3">sdf@fgh.com</div>
     </div>
     <div class="row">
      <div class="col-xs-3">Address :</div>
      <div class="col-xs-9">syhjsdfgh, dfghjk, fghjkl, sdfghjkl, sdfghjk, 100110 </div>
     </div>
    </div>
   </div>
   <div class="employeemasterdetail_other"><!------------Other Detail-------------->
    <div class="row">
     <div class="col-xs-3">UserId :</div>
     <div class="col-xs-3">DPS101</div>
     <div class="col-xs-3">Password :</div>
     <div class="col-xs-3">DPS101</div>
    </div>
    <div class="row"> 
     <div class="col-xs-3">Date of Joining :</div>
     <div class="col-xs-3">24-10-2016</div>
     <div class="col-xs-3">Employee Type :</div>
     <div class="col-xs-3">Reguler</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Category :</div>
     <div class="col-xs-3">OBC</div>
     <div class="col-xs-3">Nationality</div>
     <div class="col-xs-3">Indian</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Last School :</div>
     <div class="col-xs-3">BBS CET</div>
     <div class="col-xs-3">Class Teacher :</div>
     <div class="col-xs-3">ASDFG SDFGH</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Education Qualification :</div>
     <div class="col-xs-3">B.Tech</div>
     <div class="col-xs-3">Salary :</div>
     <div class="col-xs-3">0000000</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Pay Band :</div>
     <div class="col-xs-3">ASD000</div>
     <div class="col-xs-3">Allowances :</div>
     <div class="col-xs-3">ASDFGHJDF</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Imei :</div>
     <div class="col-xs-3">DA0101</div>
     <div class="col-xs-3">Role :</div>
     <div class="col-xs-3">0000</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Department :</div>
     <div class="col-xs-3">DFGHJK</div>
     <div class="col-xs-3">Designation :</div>
     <div class="col-xs-3">GHJKL</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Marital Status :</div>
     <div class="col-xs-3">Single</div>
     <div class="col-xs-3">Status :</div>
     <div class="col-xs-3">Active</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Spouse Name :</div>
     <div class="col-xs-3">ASDFGHJ</div>
     <div class="col-xs-3">Anniversary Date :</div>
     <div class="col-xs-3">01-01-1010</div>
    </div>
    <div class="row">
     <div class="col-xs-3">Manager Name :</div>
     <div class="col-xs-3">ASDFGHJK</div>
     <div class="col-xs-3">&nbsp;</div>
     <div class="col-xs-3">&nbsp;</div>
    </div>
   </div><!------End Other Details------------->
  </div>
 </div>
</div>
