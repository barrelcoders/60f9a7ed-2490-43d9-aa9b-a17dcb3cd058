<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Attendence and Leave Manegement </title><link rel="icon" href="../l.png" type="image/x-icon">
   
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
   <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo">Student</button>
  		 <div id="demo" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="Student_ClassAttendance.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Class Attendance 
</button></a></li>
           <li style="margin-left:1%;"><a href="Student_BulkClassAttendance.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Bulk Class Attendance 
</button></a></li>
          </ul>
         </div>
  </li>
  <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo1">Employee</button>
  		 <div id="demo1" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="Employee_Attendance.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Employee Attendance 
</button></a></li>
           <li style="margin-left:1%;"><a href="Employee_RowAttendanceLog.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Raw Attendance Logs 
</button> </a></li>
          </ul>
         </div>
   </li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="classattendance">
   <div class="classattendance_top">Student Attendance Reports</div>
   <div class="classattendance_bottom"> 
    <form action="#" method="post" >
     <div class="row">
      <div class="col-xs-3">Select Class</div>
      <div class="col-xs-3"><select name="class" id="class" class="text-box">
     					   		<option value="">Select One</option>
                           </select>
      </div>
      <div class="col-xs-3">Select Roll No.</div>
      <div class="col-xs-3"><select name="rollno" id="rollno" class="text-box">
     					   		<option value="">Select One</option>
                           </select>
      </div>
     </div>
     <div class="row">
     <div class="col-xs-3">From Date</div>
     <div class="col-xs-3"><input type="date" name="fromdate" id="fromdate" class="text-box"></div>
     <div class="col-xs-3">To Date</div>
     <div class="col-xs-3"><input type="date" name="todate" id="todate" class="text-box"></div>
    </div>
    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
   </form>
  </div>
  <div class="attandance_table">
   <form action="#" method="post">
    <table>
     <tr class="col">
      <td>Sr.No.</td><td>Name</td><td>Roll No</td><td>Class</td><td>Attendance Date</td><td>Attendance</td><td>Upload Date &amp; Time</td>
     </tr>
     <tr>
      <td>Sr.No.</td><td>Name</td><td>Roll No</td><td>Class</td><td>Attendance Date</td><td>Attendance</td><td>Upload Date &amp; Time</td>
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
