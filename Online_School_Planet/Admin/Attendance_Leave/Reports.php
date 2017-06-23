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
   <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo">Reports for Student </button>
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
  &nbsp;
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
