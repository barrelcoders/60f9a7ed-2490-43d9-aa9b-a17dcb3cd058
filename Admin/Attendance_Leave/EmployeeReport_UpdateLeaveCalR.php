<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Attendence and Leave Manegement</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <ul>
   <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo">Reports for Student</button>
  		 <div id="demo" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="StudentReport_ClassAttendanceR.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Class Attendance Report
</button></a></li>
           <!--<li style="margin-left:1%;"><a href="StudentReport_AttendanceR.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; "> Attendance Report </button></a></li>-->
          </ul>
         </div>
  </li>
  <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo1">Reports for Employee</button>
  		 <div id="demo1" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="EmployeeReport_UpdateLeaveCalR.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Update Leave Calculation </button></a></li>
           <!--<li style="margin-left:1%;"><a href="EmployeeReport_AttendanceR.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Attendance Report </button> </a></li>-->
            <li style="margin-left:1%;"><a href="EmployeeReport_CompiledAttendanceR.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:13px; ">Compiled Attendance Report </button> </a></li>
            <li style="margin-left:1%;"><a href="EmployeeReport_DaiilAbsenceR.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Daily Absentee Report 
 </button> </a></li>
          </ul>
         </div>
   </li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="attendancereport">
   <div class="attendancereport_top">Employee Leave Calculation Reports </div>
   <div class="attendancereport_bottom"> 
    <form action="#" method="post" >
     <div class="row">
      <div class="col-xs-3">Employee Department</div>
      <div class="col-xs-3"><select name="empldepartment" class="text-box" id="empldepartment">
      							<option value="">Select One</option>
                            </select></div>
      <div class="col-xs-6">&nbsp;</div>
     </div>
     <div class="row">
     <div class="col-xs-3">Select Month</div>
     <div class="col-xs-3"><select name="month" class="text-box" id="month">
      							<option value="">Select One</option>
                            </select></div>
     <div class="col-xs-3">Select Date</div>
     <div class="col-xs-3"><input type="date" name="date" id="date" class="text-box"></div>
    </div>
    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
   </form>
  </div>
  <div class="attendancereport_table">
   <form action="#" method="post">
    <table>
     <tr class="col">
      <td>Sr.No.</td><td>EmpID</td><td>Employee Name</td><td>Department</td><td>Date</td><td>Mark LOP</td><td>Remarks</td>
     </tr>
     <tr>
      <td>Sr.No.</td><td>EmpID</td><td>Employee Name</td><td>Department</td><td>Date</td><td>Mark LOP</td><td>Remarks</td>
     </tr>
    </table>
   </form>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</div>
</body>
</html>
