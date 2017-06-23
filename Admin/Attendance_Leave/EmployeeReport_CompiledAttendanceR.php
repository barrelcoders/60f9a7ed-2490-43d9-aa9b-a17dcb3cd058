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
          <!-- <li style="margin-left:1%;"><a href="EmployeeReport_AttendanceR.php">
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
   <div class="attendancereport_top">Employee Attendance (Compiled Attendance) Reports </div>
   <div class="attendancereport_bottom"> 
    <form action="#" method="post" >
     <div class="row">
     <div class="col-xs-3" align="right">Month &nbsp;:</div>
     <div class="col-xs-3"><input type="month" name="month" id="month" class="text-box"></div>
     <div class="col-xs-3"><input type="submit" name="submit" id="submit" class="btn" value="Check On" style="height:27px; padding:0 3%;"></div>
     <div class="col-xs-3">&nbsp;</div>
    </div>
   </form>
  </div>
  <form action="#" method="post">
   <div style="text-align:center; font-weight:600; margin-top:2%; border-top:1px solid #0b462d; padding:0.5% 0;">Employee Attendance for Month</div>
   <div class="attendancereport_table at1">
    <table>
     <tr class="col">
      <td>EmpID</td><td>Employee Name</td>
      <td><input type="text" name="date" value="01" readonly> <input type="text" name="week" value="Thu" readonly></td>
      <td><input type="text" name="date" value="02" readonly> <input type="text" name="week" value="Fri" readonly></td>
      <td><input type="text" name="date" value="03" readonly> <input type="text" name="week" value="Sat" readonly></td>
      <td><input type="text" name="date" value="04" readonly> <input type="text" name="week" value="Sun" readonly></td>
      <td><input type="text" name="date" value="05" readonly> <input type="text" name="week" value="Mon" readonly></td>
      <td><input type="text" name="date" value="06" readonly> <input type="text" name="week" value="Tue" readonly></td>
      <td><input type="text" name="date" value="07" readonly> <input type="text" name="week" value="Wed" readonly></td>
      <td><input type="text" name="date" value="08" readonly> <input type="text" name="week" value="Thu" readonly></td>
      <td><input type="text" name="date" value="09" readonly> <input type="text" name="week" value="Fri" readonly></td>
      <td><input type="text" name="date" value="10" readonly> <input type="text" name="week" value="Sat" readonly></td>
      <td><input type="text" name="date" value="11" readonly> <input type="text" name="week" value="Sun" readonly></td>
      <td><input type="text" name="date" value="12" readonly> <input type="text" name="week" value="Mon" readonly></td>
      <td><input type="text" name="date" value="13" readonly> <input type="text" name="week" value="Tue" readonly></td>
      <td><input type="text" name="date" value="14" readonly> <input type="text" name="week" value="Wed" readonly></td>
      <td><input type="text" name="date" value="15" readonly> <input type="text" name="week" value="Thu" readonly></td>
      <td><input type="text" name="date" value="16" readonly> <input type="text" name="week" value="Fri" readonly></td>
      <td><input type="text" name="date" value="17" readonly> <input type="text" name="week" value="Sat" readonly></td>
      <td><input type="text" name="date" value="18" readonly> <input type="text" name="week" value="Sun" readonly></td>
      <td><input type="text" name="date" value="19" readonly> <input type="text" name="week" value="Mon" readonly></td>
      <td><input type="text" name="date" value="20" readonly> <input type="text" name="week" value="Tue" readonly></td>
      <td><input type="text" name="date" value="21" readonly> <input type="text" name="week" value="Wed" readonly></td>
      <td><input type="text" name="date" value="22" readonly> <input type="text" name="week" value="Thu" readonly></td>
      <td><input type="text" name="date" value="23" readonly> <input type="text" name="week" value="Fri" readonly></td>
      <td><input type="text" name="date" value="24" readonly> <input type="text" name="week" value="Sat" readonly></td>
      <td><input type="text" name="date" value="25" readonly> <input type="text" name="week" value="Sun" readonly></td>
      <td><input type="text" name="date" value="26" readonly> <input type="text" name="week" value="Mon" readonly></td>
      <td><input type="text" name="date" value="27" readonly> <input type="text" name="week" value="Tue" readonly></td>
      <td><input type="text" name="date" value="28" readonly> <input type="text" name="week" value="Wed" readonly></td>
      <td><input type="text" name="date" value="29" readonly> <input type="text" name="week" value="Thu" readonly></td>
      <td><input type="text" name="date" value="30" readonly> <input type="text" name="week" value="Fri" readonly></td>
      <td><input type="text" name="date" value="31" readonly> <input type="text" name="week" value="Sat" readonly></td>
     </tr>
     <tr>
      <td>EmpID</td><td width="150px;">Employee Name</td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
      <td><input type="text" name="attendance" value="" readonly></td>
     </tr>
    </table>
   </div>
  </form>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</div>
</body>
</html>
